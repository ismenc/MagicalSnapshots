<?php 
    ob_start();
    session_start();
    require 'database.php';
    extract($_POST);

    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
    if (mysqli_connect_errno()) {
            printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{

        $consulta = "SELECT ID, NOMBRE, PRECIO FROM articulos WHERE ID=".$id;
                
        if ($result = mysqli_query($link, $consulta)) {
                    
            $row = mysqli_fetch_row($result);

            if(isset($_SESSION['carro'])){
                $carro=$_SESSION['carro'];
                $carro[$id]=array('id'=>$row[0],'cantidad'=>$cantidad);
                $_SESSION['carro']=$carro;
                //$carro[$id]=array('id'=>$row[0],'nombre'=>$row[1],'cantidad'=>$cantidad,'precio'=>$row[2]);
                
            }else {
                $carro[$id]=array('id'=>$row[0],'cantidad'=>$cantidad);
                session_cache_limiter();
                $_SESSION['carro'] = $carro;
            }
            mysqli_free_result($result);
        }
    }
    mysqli_close($link);
    ob_end_flush();
    header('Location: ../ver_carrito.php');
?>
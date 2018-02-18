<?php
  session_start();
  $rutaCss = "../../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Editar un artículo</header>

<?php 
if (isset($_SESSION['admin'])){

    extract($_GET);

    // Conectamos y comprobamos conexión
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
    if (mysqli_connect_errno()) {
        printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{
                
        // Protegemos, ejecutamos y guardamos la consulta
        $id = mysqli_real_escape_string($link, $id);
        $query="SELECT * FROM ".TABLA_FAMILIA." WHERE ID = ".$id;
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_row($result);

        // Comprobamos que exista el objeto solicitado
        if(is_null($row)){
            printf("<header>Objeto no encontrado. Deja de intentarlo</header>", mysqli_connect_error());
        }
        else{ 
            // Mostramos los datos de la consulta
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Familia ".$row[0]."\" /><br>";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Nombre: ".$row[1]."\" /><br>";
            echo "<textarea class=\"botonEstatico\" readonly >Descripción: ".$row[2]."</textarea>";
            echo '<br><a href="../editar-datos.php?idfamilia='.$id.'">Editar este artículo</a>';

            mysqli_free_result($result);  
        }
        mysqli_close($link);
    }

    
    echo '</form>';

} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>

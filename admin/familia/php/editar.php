<?php
  session_start();
  $rutaCss = "../../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Editar un artículo</header>

<?php 
if (isset($_SESSION['admin'])){

    // Inicializamos y conectamos
    extract($_POST);
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);


    // Comprobación de conexión
    if (mysqli_connect_errno()) {
        printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{
        // Comprobamos que seleccione una familia
        if(empty($idfamilia)){
            printf("<header>Debe seleccionar una familia</header>");
        }
        else{
    
            // Evitar la inyeccción de codigo
            $idfamilia = mysqli_real_escape_string($link, $idfamilia);
            $nombre = mysqli_real_escape_string($link, $nombre);
            $descripcion = mysqli_real_escape_string($link, $descripcion);

            // Updatea en la tabla
            $update="UPDATE ".TABLA_FAMILIA." SET NOMBRE='$nombre', DESCRIPCION='$descripcion' WHERE ID='$idfamilia'";

            $resultado = mysqli_query($link, $update);

            // Interpretación de resultados
            if ($resultado){
                echo "<header>Familia editada con éxito</header><br>";
            }
            else{
                echo "<header>No fue posible editar la familia</header><br>";
            }
        }
            
        mysqli_close($link);
    }
    echo '<!-- ------------------ Fin PHP ------------------ -->
		
    <form id="form">
        <input class="botonAzul" type="button" onclick="location.href=\'../editar.php\';" value="Editar otra familia" />
    </form>';
    
    } ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>

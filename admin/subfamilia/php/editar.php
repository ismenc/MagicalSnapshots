<?php
  session_start();
  $rutaCss = "../../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Insertar un artículo</header>

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
        // Comprobamos que seleccione una familia y subfamilia
        if(empty($idsubfamilia) || empty($idfamilia)){
            printf("<header>Debe seleccionar una subfamilia y familia ".$idsubfamilia." o ".$idfamilia."</header>");
        }
        else{
            // Evitar la inyeccción de codigo PERSONALIZABLE DE AQUI ABAJO
            $idsubfamilia = mysqli_real_escape_string($link, $idsubfamilia);
            $nombre = mysqli_real_escape_string($link, $nombre);
            $descripcion = mysqli_real_escape_string($link, $descripcion);
            $idfamilia = mysqli_real_escape_string($link, $idfamilia);

            // Updatea en la tabla
            $update="UPDATE ".TABLA_SUBFAMILIA." SET NOMBRE='$nombre', DESCRIPCION='$descripcion', IDFAMILIA='$idfamilia' WHERE ID='$idsubfamilia'";

            $resultado = mysqli_query($link, $update);

            // Interpretación de resultados
            if ($resultado){
                echo "<header>Subfamilia editada con éxito</header>";
            }
            else{
                echo "<header>No fue posible editar la subfamilia<br/>Asegúrate de que la familia referenciada existe.</header>";
            }

        }
        mysqli_close($link);
        
    }
    
} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>

<?php
  session_start();
  $rutaCss = "../../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Insertar una subfamilia</header>

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

        // Comprobamos que se haya seleccionado una familia
        if(empty($idfamilia)){
            printf("<header>Debe seleccionar una familia de referencia</header>");
        }
        else{
            //  Evitar la inyeccción de codigo y encriptamos
            $nombre = mysqli_real_escape_string($link, $nombre);
            $descripcion = mysqli_real_escape_string($link, $descripcion);
            $idfamilia = mysqli_real_escape_string($link, $idfamilia);

            // Inserta en la tabla
            $insert="INSERT INTO ".TABLA_SUBFAMILIA." (".COLUMNAS_SUBFAMILIA.") VALUES ('$nombre','$descripcion', '$idfamilia')";

            $resultado = mysqli_query($link, $insert);

            // Interpretación de resultados
            if ($resultado){
                echo "<header>Subamilia insertada con éxito</header>";
            }
            else{
                echo "<header>No fue posible insertar la subfamilia: $resultado</header>";
            }
        }
        mysqli_close($link);
    }
    
		
    echo '<form id="form">
        <input class="botonAzul" type="button" onclick="location.href=\'../insertar.php\';" value="Insertar otra subfamilia" />
    </form>';

} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>

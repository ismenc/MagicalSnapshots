<?php
  session_start();
  $rutaCss = "../../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Insertar una familia</header>

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
        
        // Evitar la inyeccción de codigo y encriptamos
        $nombre = mysqli_real_escape_string($link, $nombre);
        $descripcion = mysqli_real_escape_string($link, $descripcion);

        if(empty($nombre) && empty($descripcion)){
            // Inserta en la tabla
            $insert="INSERT INTO ".TABLA_FAMILIA." (".COLUMNAS_FAMILIA.") VALUES ('$nombre','$descripcion')";

            $resultado = mysqli_query($link, $insert);

            // Interpretación de resultados
            echo "<header>Familia insertada con éxito</header>";
        }else{
            echo "<header>No fue posible insertar la familia: $resultado</header>";
        }

        mysqli_close($link);
    }
    
    echo '<form id="form">
        <input class="botonAzul" type="button" onclick="location.href=\'../insertar.html\';" value="Insertar otra familia" />

    </form>';

} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>



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

        // Comprobamos que se seleccionen los spinners
        if(empty($idsubfamilia)){
                printf("<header>Debe seleccionar una subfamilia</header>");
        }
        else{
            // Evitar la inyeccción de codigo y encriptamos
            $nombre = mysqli_real_escape_string($link, $nombre);
            $descripcion = mysqli_real_escape_string($link, $descripcion);
            $precio = mysqli_real_escape_string($link, $precio);
            $stock = mysqli_real_escape_string($link, $stock);

            // Consultamos la id para renombrar imagen y que no sobreescriba
            $consulta=mysqli_query($link, "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".SERVERMYSQL."' AND TABLE_NAME = '".TABLA_ARTICULO."'");
            $cursor = mysqli_fetch_row($consulta);
            $maxId=$cursor[0];

            /* ----------- Procesamos la imagen ----------- */
            $directorioImagenes = "../../images/articulos/";//RAIZ_WEB."/images/articulos/";
            $nombreArchivo = $directorioImagenes . basename($_FILES["foto"]["name"]);
            $tipoImagen = pathinfo($nombreArchivo,PATHINFO_EXTENSION);
            $nuevoNombre=$maxId.".".$tipoImagen;


            // Si no se sube mostramos error y finaliza
            if (!move_uploaded_file($_FILES["foto"]["tmp_name"],    $directorioImagenes.$nuevoNombre)) {
                echo "<header>Error subiendo la imagen</header>";
                
            // Bloque para insertar en base de datos
            } else {
                
                // Inserta en la tabla
                $insert="INSERT INTO ".TABLA_ARTICULO." (".COLUMNAS_ARTICULO.") VALUES ('$nombre','$nuevoNombre', '$descripcion', '$precio', '$stock', '$idsubfamilia')";

                $resultado = mysqli_query($link, $insert);

                // Interpretación de resultados
                if ($resultado){
                    echo "<header>Artículo insertado con éxito</header>";
                }
                else{
                    echo "<header>No fue posible insertar el artículo.<br>Comprueba las referencias a ID de otras tablas</header>";
                }
            }
        }
        mysqli_close($link);
    }
    
		
    echo '<form id="form">
        <input class="botonAzul" type="button" onclick="location.href=\'../insertar.php\';" value="Insertar otro artículo" />

    </form>';
} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>

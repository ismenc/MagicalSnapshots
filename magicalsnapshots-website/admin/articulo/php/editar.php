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

        // Comprobamos que se seleccionen los spinners
        if(empty($idsubfamilia) || empty($idarticulo)){
            printf("<header>Debe seleccionar un artículo y su subfamilia</header>");
        }
        else{
            // Evitar la inyeccción de codigo y encriptamos
            $nombre = mysqli_real_escape_string($link, $nombre);
            $descripcion = mysqli_real_escape_string($link, $descripcion);
            $precio = mysqli_real_escape_string($link, $precio);
            $stock = mysqli_real_escape_string($link, $stock);

            // ID a la que se renombra la imagen
            $maxId=$idarticulo;

            /* ----------- Procesamos la imagen ----------- */
            $directorioImagenes = "../../images/articulos/";//RAIZ_WEB."/images/articulos/";
            $nombreArchivo = $directorioImagenes . basename($_FILES["foto"]["name"]);
            $tipoImagen = pathinfo($nombreArchivo,PATHINFO_EXTENSION);
            $nuevoNombre=$maxId.".".$tipoImagen;

            // Movemos al directorio de imagenes y muestra erorr si falla
            if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $directorioImagenes.$nuevoNombre)) {

                echo "<header>Error subiendo la imagen</header>";

            // Bloque para insertar en base de datos
            } else {

                // Inserta en la tabla
                $update="UPDATE ".TABLA_ARTICULO." SET NOMBRE ='$nombre', FOTO='$nuevoNombre', DESCRIPCION='$descripcion', PRECIO='$precio', STOCK='$stock', IDSUBFAMILIA='$idsubfamilia' WHERE ID='$idarticulo'";

                $resultado = mysqli_query($link, $update);

                // Interpretación de resultados
                if ($resultado){
                    echo "<header>Artículo actualizado con éxito</header>";
                }
                else{
                    echo "<header>No fue posible actualizar el artículo.<br>Comprueba las referencias a ID de otras tablas</header>";
                }
            }
        }
        mysqli_close($link);
    }
} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>

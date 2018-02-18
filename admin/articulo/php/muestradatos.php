<?php
  session_start();
  $rutaCss = "../../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Ver un artículo</header>

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
        $query="SELECT * FROM ".TABLA_ARTICULO." WHERE ID = ".$id;
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_row($result);

        // Comprobamos que exista el objeto solicitado
        if(is_null($row)){
            printf("<header>Objeto no encontrado. Deja de intentarlo</header>", mysqli_connect_error());
        }
        else{ 
            // Mostramos los datos de la consulta
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Artículo ".$row[0]."\" /><br>";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Nombre: ".$row[1]."\" /><br>";
            echo "<img class=\"imgArticulo\" src=\"../../images/articulos/".$row[2]."\"></img><br>";
            echo "<textarea class=\"botonEstatico\" readonly >Descripción: ".$row[3]."</textarea><br>";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Precio: ".$row[4]."\" /><br>";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Stock: ".$row[5]."\" /><br>";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"ID subfamilia: ".$row[6]."\" /><br>";
            echo '<a href="../editar-datos.php?idarticulo='.$id.'">Editar este artículo</a>';



            mysqli_free_result($result);
        }
        mysqli_close($link);
    }
} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>

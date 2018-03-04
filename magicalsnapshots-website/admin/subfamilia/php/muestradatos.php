<?php
  session_start();
  $rutaCss = "../../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Ver una subfamilia</header>

<?php 
if (isset($_SESSION['admin'])){

    extract($_GET);

    // Conectamos y comprobamos la conexión
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
    if (mysqli_connect_errno()) {
        printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{

        // Protegemos, ejecutamos y guardamos la consulta
        $id = mysqli_real_escape_string($link, $id);
        
        $query="SELECT * FROM ".TABLA_SUBFAMILIA." WHERE ID = ".$id;
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_row($result);

        // Comprobamos que existe la el objeto buscado
        if(is_null($row)){
            printf("<header>Objeto no encontrado. Deja de intentarlo</header>", mysqli_connect_error());
        }
        else{
            // Mostramos los datos de subfamilia
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Subamilia ".$row[0]."\" /><br>";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Nombre: ".$row[1]."\" /><br>";
            echo "<textarea class=\"botonEstatico\" readonly >Descripción: ".$row[2]."</textarea><br>";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Familia Padre: ".$row[3]."\" /><br>";
            echo '<a href="../editar-datos.php?idsubfamilia='.$id.'">Editar esta subfamilia</a>';

            mysqli_free_result($result);
        }
        mysqli_close($link);
    }
    
    echo '</form>';

} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>


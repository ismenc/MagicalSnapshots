<?php
  session_start();
  $rutaCss = "../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Listado de articulos</header>

<?php 
if (isset($_SESSION['admin'])){
  echo '
    <form id="form">

<!-- ------------------ PHP ------------------ -->';


    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);

    if (mysqli_connect_errno()) {
            printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{

        $query="SELECT ID, NOMBRE FROM ".TABLA_ARTICULO;

        // Comprobamos que la consulta no esté vacía
        if ($result = mysqli_query($link, $query)) {

            // Imprimimos un boton con enlace a cada artículo
            while ($row = mysqli_fetch_row($result)) {
                echo "<input class=\"boton\" type=\"button\" onclick=\"location.href='./php/muestradatos.php?id=".$row[0]."';\" value=\"".$row[1]."\" /><br>";
            }
            mysqli_free_result($result);
        }
        mysqli_close($link);

    }
    
    echo '<!-- ------------------ PHP ------------------ -->

        <input class="botonAzul" type="button" onclick="location.href=\'./php/listadoPdf.php\';" value="Generar listado PDF" /><br>
        <input id="ultimo" type="button" onclick="location.href=\'./index.html\';" value="Volver a administración de artículos" />
    </form>';

} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>

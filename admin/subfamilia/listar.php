<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Respuesta listar</title>

<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>

    <form id="form">

<!-- ------------------ PHP ------------------ -->

<?php       
        
    // Conectamos y comprobamos conexión
    require '../databasename.php';
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);

    if (mysqli_connect_errno()) {
            printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{

        // Consultamos y comprobamos que tenga datos
        $query="SELECT * FROM ".TABLA_SUBFAMILIA;
        if ($result = mysqli_query($link, $query)) { 

            // Imprimimos código html para ir a cada subfamilia
            while ($row = mysqli_fetch_row($result)) {
                echo "<input class=\"boton\" type=\"button\" onclick=\"location.href='./php/muestradatos.php?id=".$row[0]."';\" value=\"".$row[1]."\" />";
            }
            mysqli_free_result($result);
        }
        mysqli_close($link);
    }
?>      
    
    <!-- ------------------ PHP ------------------ -->

        <input class="botonAzul" type="button" onclick="location.href='./php/listadoPdf.php';" value="Generar listado PDF" />
        <input id="ultimo" type="button" onclick="location.href='./index.html';" value="Volver a administración de subfamilias" />
    </form>

    <canvas></canvas>
    <script  src="../index.js"></script>

</body>
</html>

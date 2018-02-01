<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Respuesta editar</title>

<link rel="stylesheet" type="text/css" href="../../styles.css">
</head>
<body>
            
            <!-- ------------------ PHP ------------------ -->
            
<?php

    // Inicializamos y conectamos
    extract($_POST);
    require '../../databasename.php';
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);

    // Comprobación de conexión
    if (mysqli_connect_errno()) {
        printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{
        
        // Evitar la inyeccción de codigo y encriptamos
        $nombre = mysqli_real_escape_string($link, $nombre);
        $descripcion = mysqli_real_escape_string($link, $descripcion);

        // Inserta en la tabla
        $insert="INSERT INTO ".TABLA_FAMILIA." (".COLUMNAS_FAMILIA.") VALUES ('$nombre','$descripcion')";

        $resultado = mysqli_query($link, $insert);

        // Interpretación de resultados
        if ($resultado){
            echo "<header>Familia insertada con éxito</header>";
        }
        else{
            echo "<header>No fue posible insertar la familia: $resultado</header>";
        }
        mysqli_close($link);
    }
?>     
    
    <!-- ------------------ Fin PHP ------------------ -->
		
    <form id="form">
        <input class="botonAzul" type="button" onclick="location.href='../insertar.html';" value="Insertar otra familia" />

        <input id="ultimo" type="button" onclick="location.href='../index.html';" value="Volver a administración de familias" />
    </form>

    <canvas></canvas>
    <script  src="../../index.js"></script>
    
</body>
</html>


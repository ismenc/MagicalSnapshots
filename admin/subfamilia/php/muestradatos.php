<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Respuesta editar</title>

<link rel="stylesheet" type="text/css" href="../../styles.css">
</head>
<body>
    
    <form id="form">

        <!-- ------------------ PHP ------------------ -->

<?php    

    require '../../databasename.php';    
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
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Subamilia ".$row[0]."\" />";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Nombre: ".$row[1]."\" />";
            echo "<textarea class=\"botonEstatico\" readonly >Descripción: ".$row[2]."</textarea>";
            echo "<input class=\"botonEstatico\" type=\"button\" value=\"Familia Padre: ".$row[3]."\" />";

            mysqli_free_result($result);
        }
        mysqli_close($link);
    }
?>      
    
    <!-- ------------------ PHP ------------------ -->
        
        <input class="botonAzul" type="button" onclick="location.href='../listar.php';" value="Volver al listado de subfamilias" />

        <input id="ultimo" type="button" onclick="location.href='../index.html';" value="Volver a administración de subfamilias" />
    </form>

    <canvas></canvas>
    <script  src="../../index.js"></script>

</body>
</html>


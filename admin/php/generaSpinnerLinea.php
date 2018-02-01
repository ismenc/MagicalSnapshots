<?php       
        
    // Conectamos y comprobamos la conexión
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
    if (mysqli_connect_errno()) {
            printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{

        // Consultamos e imprimimos las opciones
        $query="SELECT ID FROM ".TABLA_LINEA;
        if ($result = mysqli_query($link, $query)) {
            
            echo"<select name=\"idlinea\" class=\"spinner\">";
            echo "<option value=\"\" disabled selected>ID del carrito</option>";
                
            while ($row = mysqli_fetch_row($result)) {
                echo "<option value=\"".$row[0]."\">Carrito ".$row[0]."</option>";
            }
            echo "</select>";
            mysqli_free_result($result);
        }
        mysqli_close($link);
    }
?>
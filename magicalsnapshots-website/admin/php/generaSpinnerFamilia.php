<?php       
        
    // Conectamos y comprobamos la conexión
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
    if (mysqli_connect_errno()) {
            printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{

        // Consultamos e imprimimos las opciones
        $query="SELECT ID, NOMBRE FROM ".TABLA_FAMILIA;
        if ($result = mysqli_query($link, $query)) {
            
            echo"<select name=\"idfamilia\" class=\"spinner\">";
            echo "<option value=\"\" disabled selected>ID de familia</option>";
                
            while ($row = mysqli_fetch_row($result)) {
                echo "<option value=\"".$row[0]."\">".$row[0]." - ".$row[1]."</option>";
            }
            echo "</select>";
            mysqli_free_result($result);
        }
        mysqli_close($link);
    }
?>
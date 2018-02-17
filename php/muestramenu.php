<?php
        // Guarda la contraseña archivo. Para no cambiar todos los mysqli
        require 'database.php';
        $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);

        if (mysqli_connect_errno()) {
                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
        }
        else{

            // Consultamos y recorremos familias
            $consultaFamilia="SELECT ID, NOMBRE FROM ".TABLA_FAMILIA;
            if ($result = mysqli_query($link, $consultaFamilia)) { 
                echo"<ul>\n";
                while ($row = mysqli_fetch_row($result)) {
                    // Imprime familia
                    echo "\t<li><a href=\"./products.php?cat=".$row[0]."\" target=\"_top\">".$row[1]."</a>\n";
                    
                    // Recorre e imprime subfamilias de esa familia
                    $consultaSubamilia="SELECT ID, NOMBRE FROM ".TABLA_SUBFAMILIA." WHERE IDFAMILIA=".$row[0];
                    if($result2 = mysqli_query($link, $consultaSubamilia)){
                        echo"\t\t<ul>\n";
                        while ($row2 = mysqli_fetch_row($result2)) {
                            echo "\t\t\t<li><a href=\"./products.php?subcat=".$row2[0]."\" target=\"_top\">".$row2[1]."</a></li>\n";
                        }
                        echo"\t\t</ul>\n\t</li>\n";
                        mysqli_free_result($result2);
                    }
                    
                }
                echo"</ul>\n";
                mysqli_free_result($result);
                
            }

            mysqli_close($link);
        }
?>
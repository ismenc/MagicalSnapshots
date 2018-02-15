<?php
        // Guarda la contraseña archivo. Para no cambiar todos los mysqli
        //require 'database.php';
        $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);

        if (mysqli_connect_errno()) {
                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
        }
        else{

            // Consultamos y recorremos familias
            $consultaArticulo="SELECT ID, FOTO, NOMBRE, DESCRIPCION, PRECIO FROM ".TABLA_ARTICULO." LIMIT 4";
            if ($result = mysqli_query($link, $consultaArticulo)) { 
                /*echo"<ul>\n";
                while ($row = mysqli_fetch_row($result)) {
                    // Imprime familia
                    echo "\t<li><a href=\"./products.html\" target=\"_top\">".$row[1]."</a>\n";
                    
                    // Recorre e imprime subfamilias de esa familia
                    $consultaSubamilia="SELECT ID, NOMBRE FROM ".TABLA_SUBFAMILIA." WHERE IDFAMILIA=".$row[0];
                    if($result2 = mysqli_query($link, $consultaSubamilia)){
                        echo"\t\t<ul>\n";
                        while ($row2 = mysqli_fetch_row($result2)) {
                            echo "\t\t\t<li><a href=\"./products.html\" target=\"_top\">".$row2[1]."</a></li>\n";
                        }
                        echo"\t\t</ul>\n\t</li>\n";
                        mysqli_free_result($result2);
                    }
                    
                }
                echo"</ul>\n";*/
                while ($row = mysqli_fetch_row($result)) {
                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
                    echo "<p><a href=\"product_detail.php?id=".$row[0];
                    echo "\"><img src=\"admin/images/articulos/".$row[1];
                    echo "\" alt=\"\" /></a></p>";
                    echo "<a href=\"product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
                    echo "<a href=\"product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
                    echo "<p class=\"price\">".$row[4]." €</p></div></li>";
                }





                mysqli_free_result($result);
                
            }

            mysqli_close($link);
        }
?>

<!--div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="product_detail.html"><img src="themes/images/ladies/1.jpg" alt="" /></a></p>
                                                        <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                                        <a href="products.html" class="category">Commodo consequat</a>
                                                        <p class="price">$17.25</p>
                                                    </div-->
<?php
    ob_start();
    session_start();
    require('fpdf.php');
    require ('database.php');
    extract($_GET);
        
    // Conectamos y comprobamos la conexión
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
    if (mysqli_connect_errno()) {
            printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{
        // Comprobación de que la factura es de este usuario
        $consulta = mysqli_query($link, "SELECT ID, ".COLUMNAS_USUARIO." FROM usuario WHERE USUARIO='".$_SESSION['username']."'");
        $usuario = mysqli_fetch_row($consulta);

        $consulta = mysqli_query($link, "SELECT IDUSUARIO, FECHA FROM factura WHERE ID=".$idfactura);
        $factura = mysqli_fetch_row($consulta);

        if($usuario[0] != $factura[0]){
            echo '<h4>No deberías estar aquí.</h4>';
        }
        else{

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);

            // Imprimos cabecera habiéndola pasado al formato correcto
            $pdf->Ln(10);$pdf->cell(3, 0);
            $str = iconv('UTF-8', 'windows-1252', 'MagicalSnapshots: Factura de compra');
            $pdf->Cell(185, 20, $str, 1, 1, 'C');
            $pdf->Ln(15);
            $pdf->SetFont('Courier', '', 12);

            // Datos del comprador
            $str = iconv('UTF-8', 'windows-1252', 'Datos del comprador');
            $pdf->cell(10, 0); $pdf->Cell(80, 5, $str, 1, 1, 'C');
            $pdf->Ln(3);
            $str = iconv('UTF-8', 'windows-1252', 'Nombre: '.$usuario[2]);   
            $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);
            $str = iconv('UTF-8', 'windows-1252', 'Apellidos: '.$usuario[3]);   
            $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);
            $str = iconv('UTF-8', 'windows-1252', 'email: '.$usuario[4]);   
            $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);
            $str = iconv('UTF-8', 'windows-1252', 'Dirección: '.$usuario[6]);   
            $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);
            $str = iconv('UTF-8', 'windows-1252', 'Localidad: '.$usuario[7]);   
            $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);
            $str = iconv('UTF-8', 'windows-1252', 'Usuario: '.$usuario[1]);   
            $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);

            $pdf->Ln(10);

            // Datos del pedido
            $str = iconv('UTF-8', 'windows-1252', 'Datos del pedido');   
            $pdf->cell(10, 0); $pdf->Cell(80, 5, $str, 1, 1, 'C');
            $pdf->Ln(3);
            $str = iconv('UTF-8', 'windows-1252', 'Número de pedido: '.$idfactura);   
            $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);
            $str = iconv('UTF-8', 'windows-1252', 'Fecha: '.$factura[1]);   
            $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);

            $pdf->Ln(10);

            $str = iconv('UTF-8', 'windows-1252', 'Artículos comprados');
            $pdf->cell(10, 0); $pdf->Cell(80, 5, $str, 1, 1, 'C');
            $pdf->Ln(3);
            
            // Consultamos y generamos lista con enlaces a cada familia
            if ($Qlineas = mysqli_query($link, "SELECT ID, PRECIO, CANTIDAD, IDFACTURA, IDARTICULO FROM lineas WHERE IDFACTURA = ".$idfactura)) {

                // Imprimimos cada artículo
                $precioTotal = 0;
                $espaciado=40;
                while ($lineas = mysqli_fetch_row($Qlineas)) {

                    $Qarticulos = mysqli_query($link, "SELECT ID, NOMBRE, FOTO, PRECIO FROM articulos WHERE ID = ".$lineas[4]);
                    $articulos = mysqli_fetch_row($Qarticulos);

                    // Imprimimos para cada dato un espacio y la cadena en formato correcto
                    $str = iconv('UTF-8', 'windows-1252', 'Nombre: '.$articulos[1]);
                    $pdf->cell(12, 0); $pdf->Cell(80,5, $str, 0, 1);
                    
                    $pdf->Image('../admin/images/articulos/'.$articulos[2], 150, $pdf->GetY()-6, 20);
                    
                    $str = iconv('UTF-8', 'windows-1252', 'Precio por ud: '.$articulos[3].' €');
                    $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);

                    $str = iconv('UTF-8', 'windows-1252', 'Cantidad: '.$lineas[2].' uds');
                    $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);

                    $str = iconv('UTF-8', 'windows-1252', 'Subtotal: '.($articulos[3]*$lineas[2]).' €');
                    $pdf->cell(12, 0); $pdf->Cell(80, 5, $str, 0, 1);
                    
                    $pdf->Line(20, $pdf->GetY()+5, 210-20, $pdf->GetY()+5);
                    $pdf->Ln(10);
                    
                    $espaciado=45+$espaciado;
                    $precioTotal = $precioTotal + ($articulos[3]*$lineas[2]);
                }
                $str = iconv('UTF-8', 'windows-1252', 'Total: '.$precioTotal.' €');
                $pdf->cell(10, 0); $pdf->Cell(80, 5, $str, 0, 1);
            }
            $pdf->Output();
        }
        mysqli_close($link);
        
    }
    ob_end_flush();
?>
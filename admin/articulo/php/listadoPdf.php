<?php
    ob_start();
    require('../../../php/fpdf.php');
    require ('../../../php/database.php');
        
    // Conectamos y comprobamos la conexión
    $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
    if (mysqli_connect_errno()) {
            printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Consultamos y generamos lista con enlaces a cada familia
        $query="SELECT * FROM ".TABLA_ARTICULO;
        if ($result = mysqli_query($link, $query)) {

            // Imprimos cabecera habiéndola pasado al formato correcto
            $str = iconv('UTF-8', 'windows-1252', 'Listado de artículos');
            $pdf->Cell(185, 15, $str, 1, 1, 'C');
            $pdf->Ln(15);
            $pdf->SetFont('Courier', '', 12);

            // Imprimimos cada artículo
            $espaciado=40;
            while ($row = mysqli_fetch_row($result)) {
                // Imprimimos para cada dato un espacio y la cadena en formato correcto
                $str = iconv('UTF-8', 'windows-1252', 'Artículo '.$row[0]);
                $pdf->cell(10, 0); $pdf->Cell(80,5, $str, 0, 1);
                $str = iconv('UTF-8', 'windows-1252', 'Nombre: '.$row[1]);
                $pdf->cell(10, 0); $pdf->Cell(80,5, $str, 0, 1);
                
                $pdf->Image('../../images/articulos/'.$row[2], 150, $pdf->GetY()-10, 32);
                
                $str = iconv('UTF-8', 'windows-1252', 'Descripción: '.$row[3]);
                $pdf->cell(10, 0); $pdf->Cell(80, 5, $str, 0, 1);
                $str = iconv('UTF-8', 'windows-1252', 'Precio: '.$row[4].' €');
                $pdf->cell(10, 0); $pdf->Cell(80, 5, $str, 0, 1);
                $str = iconv('UTF-8', 'windows-1252', 'Stock: '.$row[5]);
                $pdf->cell(10, 0); $pdf->Cell(80, 5, $str, 0, 1);
                $str = iconv('UTF-8', 'windows-1252', 'Subfamilia: '.$row[6]);
                $pdf->cell(10, 0); $pdf->Cell(80, 5, $str, 0, 1);
                
                $pdf->Line(20, $pdf->GetY()+5, 210-20, $pdf->GetY()+5);
                $pdf->Ln(10);
                
                $espaciado=45+$espaciado;
            }
            mysqli_free_result($result);
        }

        mysqli_close($link);
        $pdf->Output();
    }
    ob_end_flush();
?>
<?php
	include('fpdf182/fpdf.php');

	$result = $_GET['numOrder']; 

	class PDF extends FPDF{

		// Cabecera de página
        function Header()
        {
        	$name="Orden del pedido";
            // Logo
            $this->Image('pdfImages/logo_cafe.png',170,8,25);

            $this->SetFont('Arial','B',35);
            $this->SetTextColor(205, 164, 94);
            $this->Text(45,25,'Cafe Cannela Mx', );


            $this->Ln(30);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1.5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','B',9);
            // Número de página
            $this->Cell(0,20,'Pag. '.$this->PageNo(), 0, 0, 'R');
        }
	}

	//Conexión a la BD y extracción de la información de nuestro interes
    $conexion = mysqli_connect("localhost","root","","Cannela");
    $sql = "SELECT * FROM Orden WHERE numero = '".$result."'";
    $res = mysqli_query($conexion, $sql);
    $Orden = mysqli_fetch_row($res);


	$pdf = new PDF();
	$pdf->AddPage();
	$pdf->SetFont('Helvetica', 'B', 15);
	$pdf->Cell(40, 15, 'Orden del pedido No.'.$result,0,1);
	$pdf->Cell(40, 15, 'Correo del usuario: :{$Orden['correo']}',0,1);
	$pdf->Cell(40, 15, 'Nombre: :{$Orden['cliente']}',0,1);
	$pdf->Cell(40, 15, 'Estatus: :{$Orden['correo']}',0,1);
	$pdf->Cell(40, 15, 'Hora del pedido: :{$Orden['correo']}',0,1);
	$pdf->Cell(40, 15, 'Precio: $ :{$Orden['correo']}',0,1);

	$pdf->SetY(135);
	$pdf->SetX(55);
	$pdf->Cell(40, 15, 'Muchas gracias por su compra !!!!',0, 1);
	$pdf->SetX(30);
	$pdf->Cell(40, 15, 'Pase a pagar en caja en la sucursal de Cafe Cannela Mx',0, 1);
	
	$str = iconv('UTF-8', 'windows-1252', 'Eje Central Lázaro Cárdenas 42');
	$pdf->Cell(40, 15, $str,0, 1);

	$str = iconv('UTF-8', 'windows-1252', 'Centro Histórico de la Cdad. de México, Centro, Cuauhtémoc');
	$pdf->Cell(40, 15, $str,0, 1);

	$pdf->SetX(90);
	$pdf->Cell(40, 15, 'Contacto',0, 1);


	$pdf->Cell(40, 15, 'Correo'.chr(58).' Cafeteria'.chr(95).'cannela'.chr(95).'mx'.chr(64).'gmail'.chr(46).'com',0, 1);
	$pdf->Cell(40, 15, 'Numero'.chr(58).' '.chr(43).'044 5589 8855',0, 1);

	$pdf->Output('D', 'Ticket.pdf');

?>
<?php
	include('fpdf182/fpdf.php');
    include("../connection/db-connection.php");

	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

	$numOrder = $_POST['numOrder']; 
	$Correo = $_POST['mail'];
    $Precio  = $_POST['total'];
    $Mensaje = $_POST['msj'];

    order(conection(), $Correo, $Mensaje, $Precio);

	class PDF extends FPDF{

		// Cabecera de página
        function Header()
        {
        	
            // Logo
            $this->Image('pdfImages/logo_cafe.png',170,8,25);

            $this->SetFont('Arial','B',35);
            $this->SetTextColor(205, 164, 94);
            $this->Text(45,25,'Cafe Cannela Mx');


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

    date_default_timezone_set('America/Mexico_City');
	$pdf = new PDF();
	$pdf->AddPage();
	$pdf->SetFont('Helvetica', 'B', 12);
	$pdf->Cell(40, 7, '=========================================================================',0, 1);
	$pdf->Cell(40, 15, 'Nombre: David Oaxaca',0,1);
	$pdf->Cell(40, 15, 'Orden del pedido No.'.$numOrder,0,1);
	$pdf->Cell(40, 15, 'Correo del usuario: '.$Correo,0,1);
	$pdf->Cell(40, 15, 'Estatus: Entregado',0,1);
	$pdf->Cell(40, 15, 'Hora del pedido: '.date("Y/m/d").' a las '.date("H:i:s"),0,1);
    $pdf->MultiCell(150, 15,  htmlspecialchars($_POST['msj']), 0, 1);
	$pdf->Cell(40, 15, 'Precio: $ '.$Precio,0,1);

	$pdf->Cell(40, 7, '=========================================================================',0, 1);
	$pdf->SetX(65);
	$pdf->Cell(40, 15, 'Muchas gracias por su compra !!!!',0, 1);
	$pdf->Cell(40, 7, '=========================================================================',0, 1);
	$pdf->SetX(30);
	$pdf->Cell(40, 15, 'Pase a pagar en caja en la sucursal de Cafe Cannela Mx',0, 1);
	
	$str = iconv('UTF-8', 'windows-1252', 'Eje Central Lázaro Cárdenas 42');
	$pdf->Cell(40, 15, $str,0, 1);

	$str = iconv('UTF-8', 'windows-1252', 'Centro Histórico de la Cdad. de México, Centro, Cuauhtémoc');
	$pdf->Cell(40, 15, $str,0, 1);

	$pdf->Cell(40, 7, '=========================================================================',0, 1);
	
	$pdf->SetX(90);
	$pdf->Cell(40, 15, 'Contacto',0, 1);


	$pdf->Cell(40, 15, 'Correo'.chr(58).' CafeteriaCannelaMx'.chr(64).'gmail'.chr(46).'com',0, 1);
	$pdf->Cell(40, 15, 'Numero'.chr(58).' '.chr(43).'044 5589 8855',0, 1);

	$pdf->Cell(40, 7, '=========================================================================',0, 1);

	$doc = $pdf->Output('', 'S');

	$mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'cafeteriacannelamx@gmail.com';                     // SMTP username
        $mail->Password   = 'CafeCanela123';
        $mail->SMTPSecure = 'tls';      
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );                        
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('CafeCannelaMx@gmail.com', 'Cafe Cannela');
        $mail->addAddress($Correo, 'David Oaxaca');  

        // Attachments
        
        $mail->addStringAttachment($doc, 'Ticket.pdf');
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Recibo de compra en Cafe Cannela Mx';
        $mail->Body    = '<strong>Presente este ticket de compra cuando pase a pagar en Cafe Cannela Mx</strong>';
        $mail->send();

        echo 'Message has been sent';
        header("location: Orden.php");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
	//$pdf->Output('D', 'Ticket.pdf');


?>



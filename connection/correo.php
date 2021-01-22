<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require("../PDF/PHPMailer-master/src/PHPMailer.php");
    require("../PDF/PHPMailer-master/src/SMTP.php");
    require("../PDF/PHPMailer-master/src/Exception.php");

    function enviarCorreoCatering($nombre_cliente, $email, $paquete, $lugar, $descripcion){
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
            $mail->SMTPSecure = 'tls';                               // SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
            //Recipients
            $mail->setFrom('cafecannelamx@gmail.com', 'Cafe Cannela');
            $mail->addAddress('cafecannelamx@gmail.com', 'Cafe Cannela');  
    
            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Servicio de Catering";
            $mail->Body    = 'Se te notifica que el cliente: ' . $nombre_cliente . ", con el correo: " . $email . "<br />" .
            'Ha solicitado el paquete ' . $paquete . ", en " . $lugar . ", con esta descripci&oacute;n: " . $descripcion;
            $mail->send();
    
            echo 'Message has been sent';
            header("location: /Reservacion2.html");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
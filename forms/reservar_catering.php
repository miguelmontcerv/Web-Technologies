<?php
    include("../connection/db-connection.php");
    if(!isset($_SESSION)) {
        //echo "<script>alert('Sesión no reconocida');</script>";
        //header("Location: http://google.com/search?Sesión%20No%20Reconocida");
        //die();
    }
    $email= "madrigal.bd@gmail.com";//$_SESSION['data'];

    $lugar= $_POST['lugar'];
    $tipo_evento= $_POST['tipo_evento'];
    $descripcion= $_POST['descripcion'];

    //conexion con BD
    $con= conection();
    $response= registrarCatering($con, $email, $tipo_evento);
    //traemos datos cliente
    $nombre_cliente= "David";
    echo "Registro exitoso";

    //enviar correo a empresa
    /*$destinatario= "madrigal.bd@gmail.com";
    $asunto= "Servicio de Catering";
    $mensaje= "El cliente $nombre ha solicitado el paquete n&uacute;mero $tipo_evento " +
        "en $lugar, con descripci&oacute;n: $descripcion\n $email";

    mail($destinatario, $asunto, $mensaje);*/
?>
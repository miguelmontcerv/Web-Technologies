<?php
    if(!isset($_SESSION)) {
        echo "<script>alert('Sesión no reconocida');</script>";
        //header("Location: http://google.com/search?Sesión%20No%20Reconocida");
        //die();
    }
    $email= $_SESSION['data'];

    $lugar= $_POST['lugar'];
    $tipo_evento= $_POST['tipo_evento'];
    $descripcion= $_POST['descripcion'];

    //conexion con BD
    /*$insert= "INSERT INTO Catering (correo, n_paq) VALUES(?,?);";
    $sql= $conn->prepare($insert);
    $sql->bind_param("ss", $email, $tipo_evento);
    $sql->exec();
*/
    //traemos datos cliente
    $nombre_cliente= "David";

    //enviar correo a empresa
    $destinatario= "madrigal.bd@gmail.com";
    $asunto= "Servicio de Catering";
    $mensaje= "El cliente $nombre ha solicitado el paquete n&uacute;mero $tipo_evento " +
        "en $lugar, con descripci&oacute;n: $descripcion\n $email";

    mail($destinatario, $asunto, $mensaje);
?>
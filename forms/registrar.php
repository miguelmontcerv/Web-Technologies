<?php
    include("../connection/db-connection.php");
    $con= conection();
    $mail= $_POST['email'];
    $pass= $_POST['contrasenia'];
    $name= $_POST['name'];
    $lstname= $_POST['lastname'];
    $tel= $_POST['phone'];

    register($con, $mail, $pass, $name, $lstname, $tel);
    echo "Registro exitoso";
?>

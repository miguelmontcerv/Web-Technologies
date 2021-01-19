<?php
    include("../connection/db-connection.php");
    $con= conection();
    $mail= $_POST['email'];
    $pass= $_POST['contrasenia'];
    $name= $_POST['name'];
    $lstname= $_POST['lastname'];
    $tel= $_POST['phone'];

    $list= [$mail, $pass, $name, $lstname, $tel];

    register($con, $list);
    echo "Registro exitoso";
?>

<?php
    include("db-connection.php");

    $option = $_POST['opt'];
    echo $option;

    $con = conection();
    
    switch($option){
        case 1:
            listmenu($con);
            break;
        case 2:
            $name = $_POST['prod'];
            menuitem($con, $name);
            break;
        case 3:
            $name = $_POST['mail']; $registro=$_POST['reg'];
            data($con, $name, $reg);
            break; 
        case 4:
            $name = $_POST['mail'];
            usrdata($con, $name);  
            break; 
        case 5:
            reg($con);   
            break;
        default:
            echo "Error";            
    }

    function listmenu($con){
        $result =request(1, $con, NULL);
        #(solo pueba) muestra en una lista los productos que se encuentran en el menu
        while($row = mysqli_fetch_array($result)){
            $product = $row["prod"];
            echo "Producto: ".$product."<br/>";
        }
    }

    function menuitem($con, $name,$registro){
        $result = request(2, $con, $name);
        $row = mysqli_fetch_row($result);
        #muestra un atrubuto de la tabla 'menu', definido por $reg en $row["{$reg}"].
        #$reg = columna que se desea visualizar: 0-nombre del producto, 1-precio del producto
        echo $row["{$registro}"];
        return $row["{$registro}"];
    }
    
    function data($con, $name, $registro){
        $result = request(3, $con, $name);
        $row = mysqli_fetch_row($result);
        #muestra un atrubuto de la tabla 'profiledata', definido por $reg en $row["{$reg}"].
        #$reg = columna que se desea visualizar: 0-correo, 1-contraseña, 2-rol, 3-nombre, 4-apellido, 5-telefono
        echo $row["{$registro}"];
        return $row["{$registro}"];
    }

    function usrdata($con){
        $result =request(4, $con, NULL);
        #(solo prueba) Muestra en una lista los registros de la tabla "profiledata"
        while($row = mysqli_fetch_array($result)){
            $usr = $row["nom"];
            echo $usr."<br/ >";
            $usr = $row["ln"];
            echo $usr."<br/ >";
            $usr = $row["mail"];
            echo $usr."<br/ >";
            $usr = $row["rol"];
            echo $usr."<br/ >";
            $usr = $row["phone"];
            echo $usr."<br/ >";
        }
    }

    function reg($con){
        #obtiene los valores del formulario 
        $mail = $_POST['mail'];        
        $pass = $_POST['psw'];
        $nom = $_POST['nom'];
        $ap = $_POST['ap'];
        $tel= $_POST['tel'];
        register($con,$mail, $pass, $nom, $ap, $tel);
    }

    mysqli_close($con);
?>
<?php
    include("db-connection.php");

    $option = $_POST['opt'];

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
            $name = $_POST['mail'];
            $registro=$_POST['reg'];
            usrdata($con, $name, $registro);
            break; 
        case 4:
            sregister($con);  
            break; 
        case 5:
            sorder($con);
            break;
        case 6:
            scater($con);
            break;
        case 7:
            spublication($con);
            break;
        case 8:
            $name = $_POST['mail'];
            $registro=$_POST['reg'];
            corder($con, $name, $registro);  
            break;
        case 9:
            $name = $_POST['mail'];
            $registro=$_POST['reg'];
            ccatering($con, $name, $registro);
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

    #obtiene el valor de una campo especificado previamente
    function menuitem($con, $name,$registro){
        $result = request(2, $con, $name);
        $row = mysqli_fetch_row($result);
        #muestra un atrubuto de la tabla 'menu', definido por $reg en $row["{$reg}"].
        #$reg = columna que se desea visualizar: 0-nombre del producto, 1-precio del producto
        echo $row["{$registro}"];
        return $row["{$registro}"];
    }

   #obtiene la información de 1 usuario en específico.  
    function usrdata($con, $name, $registro){
        $result = request(3, $con, $name);
        $row = mysqli_fetch_row($result);
        $vars=array('nom', 'ln', 'mail', 'rol', 'phone');

        #muestra un atrubuto de la tabla 'profiledata', definido por $reg en $row["{$reg}"].
        #$reg = columna que se desea visualizar: 0-correo, 1-contraseña, 2-rol, 3-nombre, 4-apellido, 5-telefono
        echo $row["{$registro}"];

        #se muestra toda la información del usuario
        while($row = mysqli_fetch_array($result)){
            for ($i=0; $i<5; $i++){
                $list[$i] = $row["{$vars[$i]}"];
                echo $list[$i]."<br/ >";
            }
        }  
        #return $row;
    }

    #registra a un usuario
    function sregister($con){
        $vars=array('mail', 'psw', 'nom', 'ln', 'tel');
        #obtiene los valores del formulario para registro (nombre de los campos)
        for ($i=0; $i<5; $i++){
            $list[$i] = $_POST["{$vars[$i]}"];
        }
        register($con,$list);
    }

    #guarda una orden
    function sorder($con){
        $vars=array('mail', 'msj', 'total');
        #obtiene los valores del formulario para orden (nombre de los campos)
        for ($i=0; $i<3; $i++){
            $list[$i] = $_POST["{$vars[$i]}"];
        }
        order($con,$list);
    }

    #obtiene la información de una orden específica
    function corder($con, $name, $registro){
        $result = request(4, $con, $name);
        $vars=array('norder','omail', 'stat', 'msg', 'bill');

        #(prueba)se muestra toda la información del usuario
        while($row = mysqli_fetch_array($result)){
            for ($i=0; $i<5; $i++){
                $list[$i] = $row["{$vars[$i]}"];
                echo $list[$i]."<br/ >";
            }
        }  
        #return $row;
    }

    #guarda orden de catering
    function scater($con){
        $vars=array('mail', 'no_paquete');
        #obtiene los valores del formulario para orden (nombre de los campos)
        for ($i=0; $i<3; $i++){
            $list[$i] = $_POST["{$vars[$i]}"];
        }
        registrarCatering($con,$list);
    }

    #muestra la informaición de 1 orden de catering especifica
    function ccatering($con, $name, $registro){
        $result = request(5, $con, $name);
        $vars=array('nsolic','cmail', 'npack', 'dtime', 'stat');

        #se muestra toda la información del usuario
        while($row = mysqli_fetch_array($result)){
            for ($i=0; $i<5; $i++){
                $list[$i] = $row["{$vars[$i]}"];
                echo $list[$i]."<br/ >";
            }
        }  
    }

    function spublication($con){   
        if (count($_FILES) > 0) {
			if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
				$imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
				$query = "INSERT INTO pubs(pmail, img) VALUES('{$_POST['mail']}','{$imgData}')";
				$result = mysqli_query($con, $query) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
				if (isset($current_id)) {
					header("Location: listImages.php");
				}
			}
		}
    }
    
    function cpublication($con){
        $result = mysqli_query();
    }
    mysqli_close($con);
?>
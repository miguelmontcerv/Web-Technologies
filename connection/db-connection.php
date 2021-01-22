<?php
	//Sintaxis de conexión de la base de datos de muestra para PHP y MySQL.
	//Conectar a la base de datos
	function conection(){
		$username="root";
		$psw="n0m3l0";
		$server="localhost";
		$dbname="cannela";
	
		if(!($con = mysqli_connect($server, $username, $psw, $dbname))){
			echo "error al conectar la BD";
			exit();
		}
	return $con;
	}

	function request($option, $con, $value){
		switch($option){
			case 1:
				#gets menu products
				$query = 'SELECT * FROM menu';
				break;
			case 2:
				#gets row from menu according to product
				$query = "SELECT * FROM menu WHERE prod='{$value}'";
				break;
			case 3:
				#gets row profile data
				$query = "SELECT * FROM profiledata WHERE mail='{$value}'";
				break;
			case 4:
				#gets row data from order
				$query = "SELECT * FROM orders WHERE omail='{$value}'";
				break;
			case 5:	
				#gets row data from catering
				$query = "SELECT * FROM catering WHERE cmail='{$value}'";
				break; 
			case 6:
				$query = "SELECT img FROM pubs WHERE nimg='{$value}'";
				break;	
			default: 
				echo "Erroooor";
				break;
		}

		$result = mysqli_query($con, $query);
		error($result);

		return $result;
	}

	function getPedidosCatering($con, $inferior, $superior) {
		$query= "SELECT * FROM catering LIMIT " . strval($inferior) . ", " . strval($superior) . ";";
		$result = mysqli_query($con, $query);
		error($result);
		return $result;
	}

	function getNombreCliente($con, $email) {
		$query= "SELECT nom FROM profiledata WHERE mail='{$email}';";
		$result = mysqli_query($con, $query);
		error($result);
		return $result;
	}

	function actualizarEstadoCateringBD($con, $no_solicitud, $estado) {
		$update= "UPDATE catering SET state='{$estado}' WHERE nsolic='{$no_solicitud}';";
		$result = mysqli_query($con, $update);
		error($result);
	}

	function register($con, $list){
		$query = "INSERT INTO profiledata VALUES ('{$list[0]}', '{$list[1]}', 'client', '{$list[2]}', '{$list[3]}', '{$list[4]}')";
		$result=mysqli_query($con, $query);
		error($result);
	}

	function login_f($con, $mail, $contr){
		
		$query = "SELECT count(*) as cuenta FROM profiledata WHERE mail = '$mail' and  psw = '$contr'";
		$result=mysqli_query($con, $query);
		error($result);
		$array = mysqli_fetch_array($result);

		if($array['cuenta'] > 0){

			if($mail == 'mokef2000@gmail.com'){
				echo "Inicio de Sesión Exitoso, Bienvenido Administrador";
				echo '<br><a href="Modulo_Control/Control.html">¡Comienza a Administrar!</a>';
			}
			else{
				echo "Inicio de Sesión Exitoso";
				echo '<br><a href="PDF/Orden.php">¡Ordena y Reserva Ahora!</a>';
			}				
		} else{
			echo "Datos Incorrectos";
		}
	}

	function order ($con, $list){
		$query ="INSERT INTO orders (omail, stat,msg, bill) VALUES ('{$list[0]}','recibido','{$list[1]}', '{$list[2]}')";
		$result=mysqli_query($con, $query);
		error($result);
	}

	function registrarCatering ($con, $email, $no_paquete){
		$insert = "INSERT INTO catering (cmail, npack) VALUES (?,?)";
		$sql= $con->prepare($insert);
		$sql->bind_param("sd", $email, $no_paquete);
		$result= $sql->execute();
	}

	function error($result){
		if(!$result){
			echo "Error de BD, no se pudo consultar la base de datos\n";
			exit;
		}
	}
?>

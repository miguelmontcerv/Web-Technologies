<?php
	//Sintaxis de conexión de la base de datos de muestra para PHP y MySQL.
	//Conectar a la base de datos
	function conection(){
		$username="root";
		$psw="marino";
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
			default: 
				echo "Erroooor";
				break;
		}

		$result = mysqli_query($con, $query);
		error($result);

		return $result;
	}

	function register($con, $list){
		$query = "INSERT INTO profiledata VALUES ('{$list[0]}', '{$list[1]}', 'client', '{$list[2]}', '{$list[3]}', '{$list[4]}')";
		$result=mysqli_query($con, $query);
		error($result);
	}

	function order ($con, $list){
		$query ="INSERT INTO orders (omail, stat,msg, bill) VALUES ('{$list[0]}','recibido','{$list[1]}', '{$list[2]}')";
		$result=mysqli_query($con, $query);
		error($result);
	}

	function registrarCatering ($con, $list){
		$insert = "INSERT INTO Catering (cmail, npack) VALUES (?,?)";
		$sql= $con->prepare($insert);
		$sql->bind_param("sd", $list[0], $list[1]);
		$result= $sql->execute();
	}
	/*
	function register($con, $mail, $pass, $name, $lstname,$tel){
		$query = "INSERT INTO profiledata VALUES ('{$mail}', '{$pass}', 'client', '{$name}', '{$lstname}', '{$tel}')";
		$result= mysqli_query($con, $query);
		error($result);
	}*/

	function error($result){
		if(!$result){
			echo "Error de BD, no se pudo consultar la base de datos\n";
			exit;
		}
	}
?>
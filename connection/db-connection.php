<?php
	//Sintaxis de conexión de la base de datos de muestra para PHP y MySQL.
	//Cambiar datos a los requeridos particularmente
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
				if(!($query))
					error();
				break;
			case 3:
				#gets row profile data
				$query = "SELECT * FROM profiledata WHERE mail='{$value}'";
				if(!($query))
					error();
				break;
			case 4:
				#gets all rows profile data  
				$query = 'SELECT * FROM profiledata';
				if(!($query))
					error();
				break;		
			default: 
				echo "Erroooor";
				break;
		}

		$result = mysqli_query($con, $query);
		error($result);

		return $result;
	}

	function register($con, $mail, $pass, $name, $lstname,$tel){
		$query = "INSERT INTO profiledata VALUES ('{$mail}', '{$pass}', 'client', '{$name}', '{$lstname}', '{$tel}')";
		$result=mysqli_query($con, $query);
		error($result);
	}
	
	function error($result){
		if(!$result){
			echo "Error de BD, no se pudo consultar la base de datos\n";
			exit;
		}
	}
?>


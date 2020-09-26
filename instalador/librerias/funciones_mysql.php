<?php

function executarQuerry($preparate, $servidor  = ""){
	
	include('instalador/configuracion/configuracion.php');
	try{

		$conexion = new PDO("mysql:host=".$basesDatos['MySQL']['host'].";
				dbname=".$basesDatos['MySQL']['base']."", 
				$basesDatos['MySQL']['usuario'], 
				$basesDatos['MySQL']['clave']);				
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$arrayExecute = array();
		$sql = $conexion->prepare($preparate);
		$sql->execute($arrayExecute);
		//$conexion->closeCursor();
		
	}catch(PDOException $e){
		
		echo "Fallo Conexion: \n";
		echo "ERROR: " . $e->getMessage();
		die();
		
	}
	
	
}


?>
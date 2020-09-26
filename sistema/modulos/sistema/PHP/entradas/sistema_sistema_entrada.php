<?php
	
	include("configuracion/globales.php");
	include_once("interfaces/interface_gt/PHP/alertas_modelo.php");
	include_once("modulos/sistema/PHP/controlador/sistema_sistema_controlador.php");

	$objAlerta = new alertas_modelo();
	$mensaje = "";
	
	
	$arraySistema = array(
			"idRegistro"=>"0",
			"idModulo"=>"",
			"idUsuario"=>"",
			"idPermiso"=>"",
			"nombre"=>"",
			"parametro"=>"",
			"motivo"=>"",
			"idEstado"=>"",
			"motivo"=>""
	);
	
	if(isset($_POST["idRegistro"])){
		$arraySistema['idRegistro'] = $_POST["idRegistro"];
	}
	if(isset($_POST["id"])){
		$arraySistema['id'] = $_POST["id"];
	}
	if(isset($_POST["idModulo"])){
		$arraySistema['idModulo'] = $_POST["idModulo"];
	}
	if(isset($_POST["idGestion"])){
		$arraySistema['idGestion'] = $_POST["idGestion"];
	}
	if(isset($_POST["txtMotivo"])){
		$arraySistema['motivo'] = $_POST["txtMotivo"];
	}
	$codigoTransaccion = '';
	if(isset($_POST["codigoTransaccion"])){
		$codigoTransaccion = $_POST["codigoTransaccion"];
	}
	
	$ObjControladorSistema = new sistema_sistema_controlador();
	$ObjControladorSistema->constructor($MODULO, $GESTION, $ACCION, $FORMULARIO, $arraySistema, $IDIOMA, $SISUSER, $CLAVE, $codigoTransaccion);
		
	// Su la accion no es vacia o nula se ejecuta
	if($ACCION != null && $ACCION != ""){
		
		$ObjControladorSistema->acciones();
		$mensaje =  $ObjControladorSistema->obtenerMensaje();
		$validar = $ObjControladorSistema->obtenerRespuesta();
		// Finalizamos el proceso de transaccion si corresponde
		if($mensaje !="" && $FORMULARIO != ""){
			$objAlerta->mostrar($mensaje,$validar);
		}
		
	}
	
	if ($FORMULARIO != ""){
		//Obtenemos el formulario a utilizar
		$form = $ObjControladorSistema->interfaz($INTERFACE);	
		// Este tipo de respuesta solo se va a dar cuando no se aya ejecutado la accion
		$mensaje =  $ObjControladorSistema->obtenerMensaje();
		$validar = $ObjControladorSistema->obtenerRespuesta();
		// En caso de tener mensaje lo mostramos
		if($mensaje!=""){
			$objAlerta->mostrar($mensaje,$validar);
		}
		
		// Se retornamos 
		if ($form != "" && $FORMULARIO != ""){
			include ("$form");
		}
	}

	if ($WEBSERVICES != ""){
		
		//$form = $ObjControladorSistema->webservices($WEBSERVICES);
		
		if($mensaje!=""){			
			$objAlerta->respuestaWSXML($mensaje,$validar);
		}
		
	}
?>








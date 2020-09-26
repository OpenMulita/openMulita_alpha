<?php

	include("configuracion/globales.php");
	include_once("interfaces/interface_gt/PHP/alertas_modelo.php");
	include_once("modulos/sistema/PHP/modelos/sistema_usuariosTransacciones_modelo.php");
	include_once("modulos/perfil/PHP/controlador/perfil_usuarios_controlador.php");
	
	$objAlerta = new alertas_modelo();
	// Cargamos el array de los usuarios 
	$arrayUsuario = array(
			"idRegistro"=>"",
			"idUsuario"=>"",
			"nombre"=>"",
			"mail"=>"",
			"clave"=>"",
			"imagen"=>"",
			"descripcion"=>"",
			"idEstado"=>"",
			"motivo"=>"",
			"claveVieja"=>"",
			"claveNueva"=>"",
			"idLogin"=>"",
    	    "fechaLogin"=>"",
    	    "horaLogin"=>"",
    	    "tipoLogin"=>""
	);
	
	if(isset($_POST["idRegistro"])){
		$arrayUsuario['idRegistro'] = $_POST["idRegistro"];
	}
	if(isset($_POST["idUsuario"])){
		$arrayUsuario['idUsuario'] = $_POST["idUsuario"];
	}	
	if(isset($_POST["txtNombre"])){
		$arrayUsuario['nombre'] = $_POST["txtNombre"];
	}
	if(isset($_POST["txtMail"])){
		$arrayUsuario['mail'] = $_POST["txtMail"];
	}
	if(isset($_POST["passClave"])){
		$arrayUsuario['clave'] = $_POST["passClave"];
	}
	if(isset($_POST["rbutonAvatar"])){
		$arrayUsuario['imagen'] = $_POST["rbutonAvatar"];
	}
	if(isset($_POST["txtDescripcion"])){
		$arrayUsuario['descripcion'] = $_POST["txtDescripcion"];
	}
	if(isset($_POST["txtEstado"])){
		$arrayUsuario['idEstado'] = $_POST["txtEstado"];
	}
	if(isset($_POST["txtMotivo"])){
		$arrayUsuario['motivo'] = $_POST["txtMotivo"];
	}	
	if(isset($_POST["passClaveVieja"])){
		$arrayUsuario['claveVieja'] = $_POST["passClaveVieja"];
	}
	if(isset($_POST["passClaveNueva"])){
		$arrayUsuario['claveNueva'] = $_POST["passClaveNueva"];
	}
	
	
	$ObjControladorUsuarios = new perfil_usuarios_controlador();
	$ObjControladorUsuarios->constructor($MODULO, $GESTION, $ACCION, $FORMULARIO, $arrayUsuario, $IDIOMA, $SISUSER, $CLAVE);
	
	if(isset($_POST["transaccion"])){
		
		$objTransacciones = new sistema_usuariosTransacciones_modelo();
		$objTransacciones->constructor($SISUSER,'0','0');
		
		if(isset($_POST["idTransaccion"])){
			$idTransaccion = $_POST["idTransaccion"];
		}else{				
			$idTransaccion = $objTransacciones->ingresarTransaccion($MODULO, $GESTION, $ACCION);
		}
		$objTransacciones->inicarProceso($idTransaccion);
	}	
	
	
	// En este parte solo se va a entar cuando se este ejecutando una accion
	if($ACCION=!null && $ACCION!=""){
		
		$ObjControladorUsuarios -> acciones();
		$mensaje =  $ObjControladorUsuarios->obtenerMensaje();
		$validar = $ObjControladorUsuarios->obtenerRespuesta();		
		if(isset($_POST["transaccion"])){
			$detalle = $validar."-".$mensaje;
			$objTransacciones->finalizarProceso($idTransaccion,$detalle);
		}
		if($mensaje!=null){
			$objAlerta-> mostrar($mensaje,$validar);
		}
		
	}
	
	
	$form = $ObjControladorUsuarios->interfaz($INTERFACE);
	// ESte tipo de respuesta solo se va a dar cuando no se aya ejecutado la accion
	$mensaje =  $ObjControladorUsuarios->obtenerMensaje();
	$validar = $ObjControladorUsuarios->obtenerRespuesta();
	// En caso de tener mensaje lo mostramos
	if($mensaje!=null && $mensaje!=""){
		$objAlerta-> mostrar($mensaje,$validar);
	}
	// Se retornamos
	if ($form!=""){
		include ("$form");
	}
	

?>
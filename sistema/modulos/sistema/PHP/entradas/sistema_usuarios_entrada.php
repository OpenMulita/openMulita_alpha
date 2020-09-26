<?php

	include("configuracion/globales.php");
	include_once("interfaces/interface_gt/PHP/alertas_modelo.php");
	include_once("modulos/sistema/PHP/controlador/sistema_usuarios_controlador.php");
	

	$objAlerta = new alertas_modelo();
	// Cargamos el array de los usuarios 
	$arrayUsuario = array(
			"idRegistro"=>"",
			"idUsuario"=>"",
			"idCategoria"=>"",
			"idAsociacion"=>"",
			"idModulo"=>"",
			"idGestion"=>"",
			"idPermiso"=>"",
			"idPermisoModulo"=>"",
			"nombre"=>"",
			"mail"=>"",
			"clave"=>"",
			"imagen"=>"",
			"descripcion"=>"",
			"idEstado"=>"",
			"motivo"=>"",
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
	if(isset($_POST["idCategoria"])){
		$arrayUsuario['idCategoria'] = $_POST["idCategoria"];
	}
	if(isset($_POST["idModulo"])){
		$arrayUsuario['idModulo'] = $_POST["idModulo"];
	}
	if(isset($_POST["idGestion"])){
		$arrayUsuario['idGestion'] = $_POST["idGestion"];
	}
	if(isset($_POST["idPermiso"])){
		$arrayUsuario['idPermiso'] = $_POST["idPermiso"];
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
	if(isset($_POST["selProvilegio"])){
		$arrayUsuario['idCategoria'] = $_POST["selProvilegio"];
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
	
	if(isset($_POST["idLogin"])){
		$arrayUsuario['idLogin'] = $_POST["idLogin"];
	}
	if(isset($_POST["txtFechaLogin"])){
		$fechaLogin = $_POST["txtFechaLogin"];
		$date = new DateTime($fechaLogin);
		$arrayUsuario['fechaLogin'] = $date->format('Y-m-d');
	}
	if(isset($_POST["selHoraLogin"]) && isset($_POST["selMinutoLogin"])){
		$arrayUsuario['horaLogin'] = $_POST["selHoraLogin"].":".$_POST["selMinutoLogin"].":00";
	}
	if(isset($_POST["selTipo"])){
		$arrayUsuario['tipoLogin'] = $_POST["selTipo"];
	}
	
	$codigoTransaccion = '';
	if(isset($_POST["codigoTransaccion"])){
		$codigoTransaccion = $_POST["codigoTransaccion"];
	}
	$ObjControladorUsuarios = new sistema_usuarios_controlador();
	$ObjControladorUsuarios->constructor($MODULO, $GESTION, $ACCION, $FORMULARIO, $arrayUsuario, $IDIOMA, $SISUSER, $CLAVE, $codigoTransaccion);
	
	// En este parte solo se va a entar cuando se este ejecutando una accion
	if($ACCION=!null && $ACCION!=""){
		
	    
		$ObjControladorUsuarios -> acciones();
		$mensaje =  $ObjControladorUsuarios->obtenerMensaje();
		$validar = $ObjControladorUsuarios->obtenerRespuesta();		
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
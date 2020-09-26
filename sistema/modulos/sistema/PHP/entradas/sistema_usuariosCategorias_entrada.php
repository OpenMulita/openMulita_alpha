<?php

	include("configuracion/globales.php");
	include_once("interfaces/interface_gt/PHP/alertas_modelo.php");
	include_once("modulos/sistema/PHP/controlador/sistema_usuariosCategorias_controlador.php");
	
	$objAlerta = new alertas_modelo();
	
	$arrayCategoria = array(
			"idRegistro"=>"",
			"idUsuario"=>"",
			"idCategoria"=>"",
			"idAsociacion"=>"",
			"idModulo"=>"",
			"idGestion"=>"",
			"idPermiso"=>"",
			"idPermisoModulo"=>"",
			"nombre"=>"",
			"descripcion"=>"",
			"idEstado"=>"",
			"motivo"=>"",
			
	);
	
	if(isset($_POST["idRegistro"])){
		$arrayCategoria['idRegistro'] = $_POST["idRegistro"];
	}
	if(isset($_POST["idUsuario"])){
		$arrayCategoria['idUsuario'] = $_POST["idUsuario"];
	}	
	if(isset($_POST["idCategoria"])){
		$arrayCategoria['idCategoria'] = $_POST["idCategoria"];
	}
	if(isset($_POST["idModulo"])){
		$arrayCategoria['idModulo'] = $_POST["idModulo"];
	}
	if(isset($_POST["idGestion"])){
		$arrayCategoria['idGestion'] = $_POST["idGestion"];
	}
	if(isset($_POST["idPermiso"])){
		$arrayCategoria['idPermiso'] = $_POST["idPermiso"];
	}
	if(isset($_POST["txtNombre"])){
		$arrayCategoria['nombre'] = $_POST["txtNombre"];
	}
	if(isset($_POST["txtDescripcion"])){
		$arrayCategoria['descripcion'] = $_POST["txtDescripcion"];
	}
	if(isset($_POST["txtEstado"])){
		$arrayCategoria['idEstado'] = $_POST["txtEstado"];
	}
	if(isset($_POST["txtMotivo"])){
		$arrayCategoria['motivo'] = $_POST["txtMotivo"];
	}
	if(isset($_POST["idPermiso"])){
		$arrayUsuario['idPermiso'] = $_POST["idPermiso"];
	}
	
	$codigoTransaccion = '';
	if(isset($_POST["codigoTransaccion"])){
		$codigoTransaccion = $_POST["codigoTransaccion"];
	}
	
	$ObjControladorCategoria = new sistema_usuariosCategorias_controlador();
	$ObjControladorCategoria->constructor($MODULO, $GESTION, $ACCION, $FORMULARIO, $arrayCategoria, $IDIOMA, $SISUSER, $CLAVE, $codigoTransaccion);
	
	if($ACCION=!null && $ACCION!=""){
		$ObjControladorCategoria->acciones();
		$mensaje =  $ObjControladorCategoria->obtenerMensaje();
		$validar = $ObjControladorCategoria->obtenerRespuesta();

		if($mensaje != null){
			$objAlerta->mostrar($mensaje,$validar);
		}
	}
	
	
	$form = $ObjControladorCategoria->interfaz($INTERFACE);
	// Cargamos las variables con las respuestas
	$mensaje =  $ObjControladorCategoria->obtenerMensaje();
	$validar = $ObjControladorCategoria->obtenerRespuesta();
	// En caso de tener mensaje lo mostramos
	if($mensaje!=null && $mensaje!=""){
		$objAlerta-> mostrar($mensaje,$validar);
	}
	// Se retornamos
	if ($form!=""){
		include ("$form");
	}
	
	

?>
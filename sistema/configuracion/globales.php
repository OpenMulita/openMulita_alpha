<?php

include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
include_once("modulos/sistema/PHP/dao/sistema_usuariosTransacciones_dao.php");


@header('Cache-Control: no cache'); //no cache
@session_cache_limiter('private_no_expire'); // works

if(!isset($_SESSION)){
	session_start();
} 

@$INTEGRACION 	= "modulos";
@$MODULO 		= $_REQUEST['modulo'];
@$GESTION		= $_REQUEST['gestion'];
@$ACCION 		= $_POST["accion"];
@$ACCIONAUX 	= $_POST["accionAux"];
@$FORMULARIO	= $_POST["formulario"];
@$WEBSERVICES	= $_POST["WEBSERVICES"];
@$IDFICHA		= $_POST["idFicha"];
@$RETORNO		= $_POST["retorno"];
@$RETORNOAUX	= $_POST["retornoAux"];
@$IDRETORNO 	= $_POST["idRetorno"];
@$IDREGISTRO	= $_POST["idRegistro"];

@$IDIOMA 		= $_REQUEST["idioma"];

if(isset($PERFILVISTA) && $PERFILVISTA == "OK"){
	@$INTEGRACION 	= "modulos";
	@$MODULO 		= "perfil";
	@$GESTION		= "usuario";
	@$ACCION 		=  "perfilFicha";
}

if($IDIOMA=="es" || $IDIOMA=="en"){
}else{
	$IDIOMA = "es";
}
@$SISUSER  = $_SESSION['UID'];
@$CLAVE = $_POST["passClave"];

//echo("Yo paso clave -".$_SESSION['UID']."- Hay variable");
@$FORMULARIOPRINCIPAL = "sistema.php";
@$INTERFACE = "interface_gt";


if(!isset($_SESSION['suPoder']) && $SISUSER!=''){
	
	$objUsuario = new sistema_usuarios_dao();
	$objUsuario->cargarUsuarioSistema($SISUSER);
	$validar = $objUsuario->obtenerPoderUsuario($SISUSER);
	$_SESSION['suPoder'] = $validar;
	
	
}else{
	
}

@$PODER = $_SESSION['suPoder'];

$objTransacciones = new sistema_usuariosTransacciones_dao();

@$CODIGOTRANSACCION = $objTransacciones->generarCodigo();

// Esto momentaneo para probar order despues cambiar en todas las tablas
$ORDERID = '';


?>
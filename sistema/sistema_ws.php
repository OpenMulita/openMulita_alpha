<?php 



$_POST["txtNombre"] = "admin";
$_POST["passClave"] = "admin";
$_POST["modulo"] = "sistema";
$_POST["gestion"] = "sistema";
$_POST["accion"] = "moduloActivar";
$_POST["idRegistro"] = "1";
$_POST["txtMotivo"] = "activado por ws";
$_POST["idiona"] = "es";
$_POST["codigoTransaccion"] = "ywEQ7u7k4url3UVG6Pj1RiQjmco8tOY2";
$_POST["WEBSERVICES"] = TRUE;

include_once("modulos/sistema/PHP/modelos/sistema_usuarios_modelo.php");
$objUsuario = new sistema_usuarios_modelo();

$usuario=array(
		"idRegistro"=>"0",
		"nombre"=>"0",
		"mail"=>"0",
		"idCategoria"=>"0",
		"motivo"=>"0",
		"idEstado"=>"0",
		"descripcion"=>"0",
		"clave"=>"0",
		"imagen"=>"0",
		"idLogin"=>"",
		"fechaLogin"=>"",
		"horaLogin"=>"",
		"tipoLogin"=>""
);

$usuario['nombre'] = '';
$usuario['clave'] = '';

if(isset($_POST["txtNombre"])){
	$usuario['nombre'] = $_POST["txtNombre"];
}
if(isset($_POST["passClave"])){
	$usuario['clave'] = $_POST["passClave"];
}
@$MODULO = $_POST['modulo'];
@$GESTION = $_POST['gestion'];
@$ACCION = $_POST["accion"];

if($usuario['nombre'] != '' && $usuario['clave'] != ''){
	
	$objUsuario->constructor($usuario);
	$login = $objUsuario->loginUsuario();
	if($login==TRUE){
		
		
		$rutaControladorModulo = "modulos/".$MODULO."/PHP/entradas/".$MODULO."_".$GESTION."_entrada.php";
		include ("$rutaControladorModulo");
		
	}	
}





?>

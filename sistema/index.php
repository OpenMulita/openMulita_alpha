<?php 


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

include_once('modulos/sistema/PHP/modelos/sistema_usuarios_modelo.php');
$objUsuario = new sistema_usuarios_modelo();
$objUsuario->constructor($usuario);

@session_start();

if(isset($_SESSION['UID']) && $_SESSION['UID'] != ''){
	
	$tipoSalida = "Salida";
	if(isset($_POST["descanso"])){
		$tipoSalida = "Descanso";
	}
	
	$usuario['idRegistro'] = $_SESSION['UID'];
	$objUsuario->constructor($usuario);
	$exit = $objUsuario->salidaUsuario($tipoSalida);
	
}


$_SESSION['UID'] = '';
$_SESSION['desarollador'] = '';
@session_destroy();

$usuario['nombre'] = '';
$usuario['clave'] = '';


if(isset($_POST["txtNombre"])){
	$usuario['nombre'] = $_POST["txtNombre"];
}
if(isset($_POST["passClave"])){
	$usuario['clave'] = $_POST["passClave"];
}

if($usuario['nombre'] != '' && $usuario['clave'] != ''){
						
	
	$objUsuario->constructor($usuario);
	$login = $objUsuario->loginUsuario();	
	if($login==TRUE){
		include("sistema.php");
	}else{
		include("configuracion/globales.php");
		echo("<script type='text/javascript'>alert('El Usuario y/o Contraseña son incorrectos'); </script>");
		$interfaz = 'interfaces/'.$INTERFACE.'/templatePHP/generico/form_inicio.php';
		include("$interfaz");
	}						
							
}else{							
								
	include_once("configuracion/globales.php");
	$interfaz = 'interfaces/'.$INTERFACE.'/templatePHP/generico/form_inicio.php';
	///interfaces/interface_gt/templatePHP/sistema/form_inicio.php
	include("$interfaz");		
}



?>
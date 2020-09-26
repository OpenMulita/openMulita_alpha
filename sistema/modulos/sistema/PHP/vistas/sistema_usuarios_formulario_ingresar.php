<?php
	
	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	//Cargamos el contenido para los lenguages
	$objUsuarios = new sistema_usuarios_dao();
	$xmlFormulario = $objUsuarios->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	
	include ("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_usuarios_formulario_ingresar_template.php");
	
?>	

<?php

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objUsuarios = new sistema_usuarios_dao();
	$xmlFormulario = $objUsuarios->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	$objUsuarios->cargarHistorial($IDFICHA);	

	include ("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_usuarios_formulario_fichaHistorial_template.php");
?>

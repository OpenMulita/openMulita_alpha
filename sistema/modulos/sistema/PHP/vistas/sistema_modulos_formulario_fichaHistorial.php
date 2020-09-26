<?php

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_modulos_dao.php");
	
	$objModulos = new sistema_modulos_dao();
	$xmlFormulario = $objModulos->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	$objModulos->cargarHistorial($IDFICHA);	

	include ("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_modulos_formulario_fichaHistorial_template.php");
?>
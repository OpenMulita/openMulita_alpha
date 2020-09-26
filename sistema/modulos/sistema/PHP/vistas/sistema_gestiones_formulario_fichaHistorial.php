<?php

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_gestiones_dao.php");
	
	$objGestion = new sistema_gestiones_dao();
	$xmlFormulario = $objGestion->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	$objGestion->cargarHistorial($IDFICHA);	

	include ("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_gestiones_formulario_fichaHistorial_template.php");
	
?>
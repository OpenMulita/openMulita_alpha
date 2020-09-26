<?php
	
	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_gestiones_dao.php");
	
	$objGestion = new sistema_gestiones_dao();
	$xmlFormulario = $objGestion->formularioIdioma("sistema","sistema",$IDIOMA);
	$objGestion->cargarGestion($IDFICHA,$SISUSER);
	
	switch($objGestion->obtenerIdEstado()){
		case 1:
		case 3:
			$nombreA = 'fa fa-arrow-up';
			$btnColor = 'btn btn-success';
			$nombreBoton = $xmlFormulario->botones->activar;
			$accionFinal= 'gestionActivar';
			$tituloModal = $xmlFormulario->titulosG->activar;
			break;
		case 2:
		case 5:
			$nombreA = 'fa fa-arrow-down';
			$btnColor = 'btn btn-warning';
			$nombreBoton = $xmlFormulario->botones->desactivar;
			$accionFinal = 'gestionDesactivar';
			$tituloModal = $xmlFormulario->titulosG->activar;
			break;
	}
								
	include ("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_gestiones_formulario_ficha_template.php");
?>
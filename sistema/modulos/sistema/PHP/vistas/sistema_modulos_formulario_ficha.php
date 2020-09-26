<?php
	
	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_modulos_dao.php");
		
	$objModulo = new sistema_modulos_dao();
	$xmlFormulario = $objModulo->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	$objModulo->cargarModulos($IDFICHA);
	
	switch($objModulo->obtenerIDEstado()){
		case 1:
		case 3:
			$nombreA = 'fa fa-arrow-up';
			$btnColor = 'btn btn-success';
			$nombreBoton = $xmlFormulario->botones->activar;
			$accionFinal = "moduloActivar";
			$tituloModal = $xmlFormulario->titulosM->activar;
			break;
		case 2:
		case 5:
			$nombreA = 'fa fa-arrow-down';
			$btnColor = 'btn btn-warning';
			$nombreBoton = $xmlFormulario->botones->desactivar;
			$accionFinal = "moduloDesactivar";
			$tituloModal = $xmlFormulario->titulosM->desactivar;
			break;
	}

	include ("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_modulos_formulario_ficha_template.php");
	
?>

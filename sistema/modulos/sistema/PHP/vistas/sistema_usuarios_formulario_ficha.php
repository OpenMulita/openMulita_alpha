<?php
	
	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_modulos_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_gestiones_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_acciones_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosCategorias_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosAsociacionCategorias_dao.php");
	
	
	// Cargo los textos de los formularios 
	
	$objUsuario = new sistema_usuarios_dao();
	$objUsuario->cargar($IDFICHA);
	
	$xmlFormulario = $objUsuario->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	
	$objUsaCategoria = new sistema_usuariosCategorias_dao();
	$objModulos = new sistema_modulos_dao();
	$objGestiones = new sistema_gestiones_dao();
	$objPermiso = new sistema_acciones_dao();
	
	switch($objUsuario->obtenerIDEstado()){
		case 1:
		case 3:
			$nombreA = 'fa fa-arrow-up';
			$btnColor = 'btn btn-success';
			$nombreBoton = $xmlFormulario->botones->activar;
			$accionFinal = 'usuariosActivar';
			$tituloModal = $xmlFormulario->titulos->activarUsuario;
			break;
		case 2:
		case 5:
			$nombreA = 'fa fa-arrow-down';
			$btnColor = 'btn btn-warning';
			$nombreBoton = $xmlFormulario->botones->desactivar;
			$accionFinal = 'usuariosDesactivar';
			$tituloModal = $xmlFormulario->titulos->desactivarUsuario;
			break;
	}
						
	include ("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_usuarios_formulario_ficha_template.php");
?>



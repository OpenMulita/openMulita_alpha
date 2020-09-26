<?php
	/*
	 * sistema_gestiones_dao::tablasIdioma
	 * */
	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_modulos_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_gestiones_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_acciones_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosCategorias_dao.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objCategoria = new sistema_usuariosCategorias_dao();
	$xmlFormulario = $objCategoria->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	$objCategoria->cargar($IDFICHA);
	
	$objUsuario = new sistema_usuarios_dao();
	
	$objModulos = new sistema_modulos_dao();
	$objGestiones = new sistema_gestiones_dao();
	$objPermiso = new sistema_acciones_dao();
	
	$accionBoton = '';
	$nombreBoton = '';
	switch($objCategoria->obtenerIDEstado()){
		case 1:
		case 3:
			$nombreA = 'fa fa-arrow-up';
			$btnColor = 'btn btn-success';
			$nombreBoton = $xmlFormulario->botones->activar;
			$accionFinal = "usuariosCategoriasActivar";
			$tituloModal = $xmlFormulario->titulos->activarCategoria;
			break;
		case 2:
		case 5:
			$nombreA = 'fa fa-arrow-down';
			$btnColor = 'btn btn-warning';
			$nombreBoton = $xmlFormulario->botones->desactivar;
			$accionFinal = "usuariosCategoriasDesactivar";
			$tituloModal = $xmlFormulario->titulos->desactivarCategoria;
			break;
	}

	include("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_usuariosCategoria_formulario_ficha_template.php");
?>

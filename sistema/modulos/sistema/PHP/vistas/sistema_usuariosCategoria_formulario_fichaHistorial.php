<?php

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosCategorias_dao.php");
	
	$objUsuCategoria = new sistema_usuariosCategorias_dao();
	$xmlFormulario = $objUsuCategoria->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	$objUsuCategoria->cargarHistorial($IDFICHA);	

	include("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_usuariosCategoria_formulario_ficha_template.php");
?>

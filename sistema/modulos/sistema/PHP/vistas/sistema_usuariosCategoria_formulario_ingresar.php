<?php
	
	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosCategorias_dao.php");
	
	//Cargamos el contenido para los lenguages
	$objCategoria = new sistema_usuariosCategorias_dao();
	$xmlFormulario = $objCategoria->formularioIdioma($MODULO,$GESTION,$IDIOMA);

	include("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_usuariosCategoria_formulario_ingresar_template.php");
?>	
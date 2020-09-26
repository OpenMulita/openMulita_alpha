<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objTabla = new sistema_usuarios_dao();
	$xmlFormulario = $objTabla->tablasIdioma($MODULO,$GESTION,"usuariosListar",$IDIOMA);
	
	$listaTabla = $objTabla->listas("tabla", 0, 0);
	
	$campACCIONES = TRUE;
	$campFICHA = TRUE;
	$botonINGRESAR = TRUE;
	$modalCLAVE = TRUE;
	
	$FICHA = "usuarioFicha";
	$ACTIVAR = "usuariosActivar";
	$DESACTIVAR = "usuariosDesactivar";
	$INGRESAR = "usuariosIngresar";
	$CANTIDADCAMPOS = "4";
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_generica.php");
	
	
?>
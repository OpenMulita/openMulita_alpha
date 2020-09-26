<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosCategorias_dao.php");
	
	$objTabla = new sistema_usuariosCategorias_dao();
	$xmlFormulario = $objTabla->tablasIdioma($MODULO,$GESTION,"usuariosCategoriasListar",$IDIOMA);
	
	$listaTabla = $objTabla->listas("tabla", 0, 0);
	
	$campACCIONES = TRUE;
	$campFICHA = TRUE;
	$botonINGRESAR = TRUE;
	$modalCLAVE = TRUE;
	
	
	$FICHA = "usuariosCategoriasFicha";
	$ACTIVAR = "usuariosCategoriasActivar";
	$DESACTIVAR = "usuariosCategoriasDesactivar";
	$INGRESAR = "usuariosCategoriasIngresar";
	$CANTIDADCAMPOS = "4";
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_generica.php");
	
?>
		
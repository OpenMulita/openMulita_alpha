<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosTransacciones_dao.php");
	
	$objTabla = new sistema_usuariosTransacciones_dao();
	$xmlFormulario = $objTabla->tablasIdioma($MODULO,$GESTION,"usuariosTransaccionesListar",$IDIOMA);
	
	$listaTabla = $objTabla->listas("tabla", 0, 0);
	
	$campACCIONES = FALSE;
	$campFICHA = FALSE;
	$botonINGRESAR = FALSE;
	$modalCLAVE = TRUE;
	
	$FICHA = "";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$INGRESAR = "";
	$CANTIDADCAMPOS = "5";
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_generica.php");
	
?>
	
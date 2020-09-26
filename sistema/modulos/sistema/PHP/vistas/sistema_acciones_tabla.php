<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_acciones_dao.php");
	
	$objTabla = new sistema_acciones_dao();
	$xmlFormulario = $objTabla->tablasIdioma($MODULO,$GESTION,$FORMULARIO,$IDIOMA);
	
	$objTabla->cargarUsuarioSistema($SISUSER);
	$listaTabla = $objTabla->listas("tabla", 0, 0);
	
	$campACCIONES = FALSE;
	$campFICHA = FALSE;
	$botonINGRESAR = FALSE;
	$modalCLAVE = TRUE;
	
	$FICHA = "";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$INGRESAR = "";
	$CANTIDADCAMPOS = "4";
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_generica.php");
	
?>
	
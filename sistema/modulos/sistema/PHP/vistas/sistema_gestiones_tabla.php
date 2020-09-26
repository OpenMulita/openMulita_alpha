<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_gestiones_dao.php");
	
	$objTabla = new sistema_gestiones_dao();
	$xmlFormulario = $objTabla->tablasIdioma($MODULO,$GESTION,$FORMULARIO,$IDIOMA);
	
	$objTabla->cargarUsuarioSistema($SISUSER);
	$listaTabla = $objTabla->listas("tabla", 0, 0);
	
	$campACCIONES = TRUE;
	$campFICHA = TRUE;
	$botonINGRESAR = FALSE;
	$modalCLAVE = TRUE;
	
	$FICHA = "gestionFicha";
	$ACTIVAR = "gestionActivar";
	$DESACTIVAR = "gestionDesactivar";
	$INGRESAR = "";
	$CANTIDADCAMPOS = "4";
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_generica.php");
	
?>


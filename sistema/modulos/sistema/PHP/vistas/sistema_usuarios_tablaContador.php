<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objTabla = new sistema_usuarios_dao();
	$xmlFormulario = $objTabla->tablasIdioma($MODULO,$GESTION,"usuariosListarContador",$IDIOMA);

	$listaTabla = $objTabla->listaContador();
	
	$campACCIONES = FALSE;
	$campFICHA = FALSE;
	$modalCLAVE = TRUE;
	
	$FICHA = "";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$CANTIDADCAMPOS = "4";
	$botonINGRESAR  = "";
	
	$idTabla = "datatable3";
	$ORDERID = '[[ 0, "desc" ]]';
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_generica.php");
	
?>	


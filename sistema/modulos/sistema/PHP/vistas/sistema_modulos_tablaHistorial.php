<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_modulos_dao.php");
	
	$objModulo = new sistema_modulos_dao();
	$xmlTabla = $objModulo->tablasIdioma($MODULO,$GESTION,"modulosListarHistorial",$IDIOMA);
	
	$objModulo->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objModulo->listas("tablaHistorial", $IDFICHA, 0);

	$campACCIONES = FALSE;
	$campFICHA = TRUE;
	$modalCLAVE = TRUE;
	
	$FICHA = "moduloFichaHistorial";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$CANTIDADCAMPOS = "4";
	$idTabla = "datatable3";
	$ORDERID = '[[ 0, "desc" ]]';
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");
	
?>	


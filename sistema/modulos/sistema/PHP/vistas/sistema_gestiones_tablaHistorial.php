<?php 


	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_gestiones_dao.php");
	
	$objGestiones = new sistema_gestiones_dao();
	$xmlTabla = $objGestiones->tablasIdioma($MODULO,$GESTION,"gestionesListarHistorial",$IDIOMA);
	
	$objGestiones->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objGestiones->listas("tablaHistorial", $IDFICHA, 0);
	
	$campACCIONES = FALSE;
	$campFICHA = TRUE;
	$modalCLAVE = TRUE;
	
	$FICHA = "gestionFichaHistorial";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$CANTIDADCAMPOS = "4";
	$idTabla = "datatable2";
	$ORDERID = '[[ 0, "desc" ]]';
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");
	
?>	
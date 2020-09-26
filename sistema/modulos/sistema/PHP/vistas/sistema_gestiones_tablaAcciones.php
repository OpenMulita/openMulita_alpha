<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_gestiones_dao.php");
	
	$objGestiones= new sistema_gestiones_dao();
	$xmlTabla = $objGestiones->tablasIdioma($MODULO,$GESTION,"gestionesListarAcciones",$IDIOMA);
	
	$objGestiones->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objGestiones->listas("tablaAcciones", $IDFICHA, 0);
	$campACCIONES = FALSE;
	$campFICHA = FALSE;
	$modalCLAVE = TRUE;
	
	$FICHA = "";
	$ACTIVAR = "gestionesActivar";
	$DESACTIVAR = "gestionesDesactivar";
	$CANTIDADCAMPOS = "3";
	$idTabla = "datatable3";
	$ORDERID = '[[ 0, "desc" ]]';
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");
	
?>	
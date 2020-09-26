<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objUsuarioTabla= new sistema_usuarios_dao();
	$xmlTabla = $objUsuarioTabla->tablasIdioma($MODULO,$GESTION,"usuariosListarTransacciones",$IDIOMA);
	
	$objUsuarioTabla->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objUsuarioTabla->listas("tablaTransacciones", $IDFICHA, 0);
	
	$campACCIONES = FALSE;
	$campFICHA = FALSE;
	$modalCLAVE = TRUE;
	
	$FICHA = "";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$CANTIDADCAMPOS = "4";
	$idTabla = "datatable4";	
	$ORDERID = '[[ 0, "desc" ]]';
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");
	
?>
<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objUsuarioTabla= new sistema_usuarios_dao();
	$xmlTabla = $objUsuarioTabla->tablasIdioma($MODULO,$GESTION,"usuariosListarHistorial",$IDIOMA);
	
	$objUsuarioTabla->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objUsuarioTabla->listas("tablaHistorial", $SISUSER, 0);
	
	$campACCIONES = FALSE;
	$campFICHA = TRUE;
	
	$FICHA = "usuarioFichaHistorial";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$CANTIDADCAMPOS = "4";
	$idTabla = "datatable";

	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");


?>
	
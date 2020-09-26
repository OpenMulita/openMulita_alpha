<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objUsuarioTabla = new sistema_usuarios_dao();
	$xmlTabla = $objUsuarioTabla->tablasIdioma($MODULO,$GESTION,"usuariosListarAsociacionCategorias",$IDIOMA);
	
	$objUsuarioTabla->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objUsuarioTabla->listas("tablaAsociacionCategorias", $SISUSER, 0);

	
	$campACCIONES = FALSE;
	$campFICHA = FALSE;
	
	$FICHA = "";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$CANTIDADCAMPOS = "4";
	$idTabla = "datatable2";
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");
	
?>

	
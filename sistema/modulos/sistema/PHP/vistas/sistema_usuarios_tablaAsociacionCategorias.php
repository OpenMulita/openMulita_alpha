<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objUsuarioTabla = new sistema_usuarios_dao();
	$xmlTabla = $objUsuarioTabla->tablasIdioma($MODULO,$GESTION,"usuariosListarAsociacionCategorias",$IDIOMA);
	
	$objUsuarioTabla->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objUsuarioTabla->listas("tablaAsociacionCategorias", $IDFICHA, 0);
	
	$campACCIONES = TRUE;
	$campFICHA = FALSE;
	$modalCLAVE = TRUE;
	
	$FICHA = "";
	$ACTIVAR = "asociacionCategoriaActivar";
	$DESACTIVAR = "asociacionCategoriaDesactivar";
	$CANTIDADCAMPOS = "4";
	$idTabla = "datatable2";
	$ORDERID = '[[ 0, "desc" ]]';
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");
	
?>
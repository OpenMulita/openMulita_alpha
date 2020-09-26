<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosCategorias_dao.php");
	
	$objUsuarioCategoria= new sistema_usuariosCategorias_dao();
	$xmlTabla = $objUsuarioCategoria->tablasIdioma($MODULO,$GESTION,"usuariosCategoriasListarPermisos",$IDIOMA);
	
	$objUsuarioCategoria->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objUsuarioCategoria->listas("tablaPermisos", $IDFICHA, 0);

	$campACCIONES = TRUE;
	$campFICHA = FALSE;
	$modalCLAVE = TRUE;
	
	$FICHA = "";
	$ACTIVAR = "permisosActivar";
	$DESACTIVAR = "permisosDesactivar";
	$CANTIDADCAMPOS = "4";
	$idTabla = "datatable3";
	$ORDERID = '[[ 0, "desc" ]]';
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");
	
?>
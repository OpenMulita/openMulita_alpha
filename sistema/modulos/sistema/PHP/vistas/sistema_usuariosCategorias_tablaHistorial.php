<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuariosCategorias_dao.php");
	
	$objUsuarioCategoria= new sistema_usuariosCategorias_dao();
	$xmlTabla = $objUsuarioCategoria->tablasIdioma($MODULO,$GESTION,"usuariosCategoriasListarHistorial",$IDIOMA);
	
	$objUsuarioCategoria->cargarUsuarioSistema($SISUSER);
	$listarTabla = $objUsuarioCategoria->listas("tablaHistorial", $IDFICHA, 0);

	$campACCIONES = FALSE;
	$campFICHA = TRUE;
	$modalCLAVE = TRUE;
	
	$FICHA = "usuariosCategoriasFichaHistorial";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$CANTIDADCAMPOS = "4";
	$idTabla = "datatable";
	$ORDERID = '[[ 0, "desc" ]]';
	
	include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");
	
?>
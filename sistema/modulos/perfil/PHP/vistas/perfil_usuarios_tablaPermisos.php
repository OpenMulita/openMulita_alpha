<?php

	include("configuracion/globales.php");
    include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
    
    $objUsuarioTabla= new sistema_usuarios_dao();
    $xmlTabla = $objUsuarioTabla->tablasIdioma($MODULO,$GESTION,"usuariosListarPermisos",$IDIOMA);
    
    $objUsuarioTabla->cargarUsuarioSistema($SISUSER);
    $listarTabla = $objUsuarioTabla->listas("tablaPermisos", $SISUSER, 0);
    
    $campACCIONES = FALSE;
    $campFICHA = FALSE;
    
    $FICHA = "";
    $ACTIVAR = "permisosActivar";
    $DESACTIVAR = "permisosDesactivar";
    $CANTIDADCAMPOS = "4";
    $idTabla = "datatable3";
    
    include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_template_tabla_mini.php");

?>
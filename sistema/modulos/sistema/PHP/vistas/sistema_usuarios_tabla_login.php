<?php 

	include("configuracion/globales.php");
	include_once("modulos/sistema/PHP/dao/sistema_usuarios_dao.php");
	
	$objUsuario = new sistema_usuarios_dao();
	$xmlTabla = $objUsuario->tablasIdioma($MODULO,$GESTION,$FORMULARIO,$IDIOMA);
	
	$objUsuario->cargarUsuarioSistema($SISUSER);
	$listaTabla = $objUsuario->listas("tablaLogin", 0, 0);
		
	$campACCIONES = TRUE;
	$campFICHA = TRUE;
	$botonINGRESAR = TRUE;
	$modalCLAVE = TRUE;
	
	$FICHA = "";
	$ACTIVAR = "";
	$DESACTIVAR = "";
	$INGRESAR = "";
	$CANTIDADCAMPOS = "5";
	
	$listaHoras = array();
	$listaMinutos = array();
	
	for($i=1; $i<=24; $i++  ){
		$casteo = $i;
		if($casteo < 10){
			$casteo = "0".$i;
		}
		$listaHoras[] = $casteo;
	}
	for($i=1; $i<=59; $i++  ){
		$casteo = $i;
		if($casteo < 10){
			$casteo = "0".$i;
		}
		$listaMinutos[] = $casteo;
	}
	
	$arrayTipoLogin = array('Entrada','Salida','Descanso','Retorno','Error');

	include ("interfaces/".$INTERFACE."/templatePHP/sistema/sistema_usuarios_tabla_login_template.php");
	
?>
	
<?php


if( TABLA ){

	include('instalador/modulos/sistema/sistema_instalacion_tablas_mysql.php');
	
}

IF( TABLA || TRIGGER){
	
	include('instalador/modulos/sistema/sistema_instalacion_triggers_mysql.php');
	
}

IF( TABLA || FUNCIONES){
	
	include('instalador/modulos/sistema/sistema_instalacion_funciones_mysql.php');
	
}

IF( TABLA || CONFIGURACION){
	
	include('instalador/modulos/sistema/sistema_instalacion_configuraciones_mysql.php');
	
}


?>


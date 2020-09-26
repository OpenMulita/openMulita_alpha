<?php

//C:\PHP5\php.exe -f "C:\xampp\htdocs\uruapps\uruerp\uruerp_desa\script_instalacion_php.php" 
// & "C:\xampp\php.exe" -f "script_instalacion_php.php"


require_once('instalador/librerias/funciones_mysql.php');
require_once('instalador/configuracion/configuracion.php');

ini_set('max_execution_time', 500);


define("IFDEBUGGIN", TRUE);
define("RUTAARCHIVO", "");

define("TABLA", TRUE);
define("TRIGGER", TRUE);
define("FUNCIONES", TRUE);
define("CONFIGURACION", TRUE);

$horaInicio = date("Y-m-d h:i:s");

if(TRUE){

	echo("*** Iniciando Instalacion ***");
	
	// Modulos Sistema 
	if( file_exists('instalador/modulos/sistema/_sistema_instalacion_mysql.php')){
		echo("\n\n <br><br> ************************  Instalacion Modulo Sistema  ************************* <br> \n ");
		require_once('instalador/modulos/sistema/_sistema_instalacion_mysql.php');
	}
	
	
}

$horaFin = date("Y-m-d h:i:s");
$fecha1 = new DateTime($horaInicio);
$fecha2 = new DateTime($horaFin);
$diferencia = $fecha1->diff($fecha2);
printf(" \n %d horas, %d minutos, %d segundos", $diferencia->h, $diferencia->i, $diferencia->s);

?>


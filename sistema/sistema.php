
<?php 

include("configuracion/globales.php");


if(isset($SISUSER)){
		
	$interfaz = "interfaces/".$INTERFACE."/interface.php";
	include("$interfaz");
	
}else{
	
	include('index.php');
	
}




?>

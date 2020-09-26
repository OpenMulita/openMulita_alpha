<?php



	include("configuracion/globales.php");
	switch ($GESTION){
		case "perfil":
			include("modulos/perfil/PHP/entradas/perfil_usuarios_entrada.php");
			break;
		default:
			break;
	}







?>
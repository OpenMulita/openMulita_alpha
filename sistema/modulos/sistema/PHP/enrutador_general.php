<?php

include("configuracion/globales.php");

$rutaControladorModulo = "modulos/".$MODULO."/PHP/entradas/".$MODULO."_".$GESTION."_entrada.php";
include ("$rutaControladorModulo");


?>
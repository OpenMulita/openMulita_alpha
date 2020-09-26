<?php


$idGestion = $_POST['idGestion'];
require_once ("modulos/sistema/PHP/dao/sistema_acciones_dao.php");

$objAcciones = new sistema_acciones_dao();
echo("<option value=''>Ninguno</option>");
if($idGestion!=0){
	
	$listas = $objAcciones->listaSelect($idGestion);
	
	foreach ($listas AS $lista){
		echo("<option value='".$lista['sa_idAccion']."'>".$lista['sa_nombreAccion']."</option>");
	}
	
}

?>
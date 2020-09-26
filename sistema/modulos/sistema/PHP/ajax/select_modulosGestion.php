<?php


$idModulo = $_POST['idModulo'];
require_once ("modulos/sistema/PHP/dao/sistema_gestiones_dao.php");

$objGestiones = new sistema_gestiones_dao();
echo("<option value=''>Ninguno</option>");

if($idModulo!=0){
	
	$listas = $objGestiones->listaSelect($idModulo);
	
	foreach ($listas AS $lista){
		echo("<option value='".$lista['sg_idGestion']."'>".$lista['sg_nombreGestion']."</option>");
	}
	
}

?>
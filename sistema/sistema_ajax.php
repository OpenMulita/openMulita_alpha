<?php 

include("modulos/sistema/PHP/globales.php");

@$paramtro  = $_POST['parametro'];


if($paramtro == 'listaGestiones'){
	require_once ("modulos/sistema/PHP/ajax/select_modulosGestion.php");
}

if($paramtro == 'listaPermisos'){
	require_once ("modulos/sistema/PHP/ajax/select_gestionPermisos.php");
}

if($paramtro == 'listaSubdivisionesGrandes'){
	require_once ("modulos/geolocalizacion/PHP/ajax/geolocalizacion_paisesSubdivisionGrandes.php");
}

if($paramtro == 'listaSubdivisionesChicas'){
	require_once ("modulos/geolocalizacion/PHP/ajax/geolocalizacion_subdivisionGrandesSubdivisionesChicas.php");
}

if($paramtro == 'listaZonas'){
	require_once ("modulos/geolocalizacion/PHP/ajax/geolocalizacion_subdivisionesChicasZonas.php");
}

if($paramtro == 'listaMascotas'){
	require_once("modulos/animales/PHP/ajax/animales_socios_ajax_mascotas.php");
}

if($paramtro == 'articulosProductos'){
	require_once("interfaces/interface_gt/templatePHP/inventario/ajax/ajax_formularioProductos.php");
}

if($paramtro == 'formularioEditarNoticias'){
	require_once("integraciones/blog/interfaces/interface_gt/ajax_formularioEdit.php");
}



if(isset($_POST['idEspecie'])){
	require_once ("modulos/animales/PHP/ajax/select_especiesRazas.php");
}
if(isset($_POST['idSociosTiposCuotas'])){
	require_once("modulos/socios/PHP/ajax/socios_socios_ajax_tipoCuotas.php");
}
if(isset($_POST['idSociosPrecio'])){
	require_once("modulos/socios/PHP/ajax/socios_socios_ajax_precio.php");
}
if(isset($_POST['idSociosMoneda'])){
	require_once("modulos/socios/PHP/ajax/socios_socios_ajax_monedas.php");
}
if(isset($_POST['idTipoCuotaMoneda'])){
	require_once("modulos/socios/PHP/ajax/socios_tiposCuotas_ajax_monedas.php");
}
if(isset($_POST['idTipoCuotaPrecio'])){
	require_once("modulos/socios/PHP/ajax/socios_tiposCuotas_ajax_precio.php");
}




// cargarAjax

?>
















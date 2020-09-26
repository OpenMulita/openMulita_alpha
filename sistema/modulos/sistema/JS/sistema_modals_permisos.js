

function modalIngresarPermiso(){
	document.getElementById('perModulo').value = "";
	document.getElementById('perGestion').value = "";
	document.getElementById('perPermisos').value = "";
	$("#modalIngresarPermiso").modal('show');	
}	

function ajaxModulosGestiones(idModulo){
    var parametros = {
    		"parametro" : "listaGestiones",
            "idModulo" : idModulo
    };
    $.ajax({
            data:  parametros,
            url:   'sistema_ajax.php',
            type:  'post',
            beforeSend: function () {
                    $("#perGestion").html("Procesando, espere por favor...");
            },
            success:  function (response) {
            	document.getElementById("perGestion").innerHTML = response;
            	document.getElementById('perPermisos').innerHTML = "";
            }
    });
}

function ajaxGestionesAcciones(idGestion){
    var parametros = {
    		"parametro" : "listaPermisos",
            "idGestion" : idGestion
    };
    $.ajax({
            data:  parametros,
            url:   'sistema_ajax.php',
            type:  'post',
            beforeSend: function () {
                    $("#perPermisos").html("Procesando, espere por favor...");
            },
            success:  function (response) {
            	document.getElementById("perPermisos").innerHTML = response;
            }
    });
}


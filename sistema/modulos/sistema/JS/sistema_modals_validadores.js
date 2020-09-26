

function modalValidador(accion,idRegistro,titulo){
	
	document.getElementById('valTitulo').innerHTML = titulo;
	document.getElementById('valAccion').value = accion;
	document.getElementById('valIdRegistro').value = idRegistro;
	$("#modalValidador").modal('show');	
	
}

function modalValidadorClave(accion,idRegistro,titulo){
	
	document.getElementById('claTitulo').innerHTML = titulo;	
	document.getElementById('claAccion').value = accion;
	document.getElementById('claIdRegistro').value = idRegistro;
	$("#modalValidadorClave").modal('show');		
	
}

function modalModificarFicha(){
	
	$("#modalModificarFicha").modal('show');
	
}



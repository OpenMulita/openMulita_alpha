<?php
	
require_once ("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");
require_once ("modulos/sistema/PHP/modelos/sistema_usuarios_modelo.php");
require_once ("modulos/sistema/PHP/modelos/sistema_usuariosTransacciones_modelo.php");
require_once ("modulos/sistema/PHP/modelos/sistema_permisos_modelo.php");
require_once ("modulos/sistema/PHP/modelos/sistema_modulos_modelo.php");
require_once ("modulos/sistema/PHP/modelos/sistema_gestiones_modelo.php");


class sistema_sistema_controlador{
	
	// Es el modulo que se encuentra
	protected $modulo;
	// es la gestion de el sistema que se esta trabajanado
	protected $gestion;
	// Es el parametro que indica la accion la accion que se va a tomar
	protected $accion;
	// Es el parametro que nos va a indicar que formulario vamos a ir
	protected $formulario;
	// Es donde se contiene los datos del usuario
	protected $arrayDatos;
	// es el idioma a emplearse
	protected $idioma;
	// Es la respuesta a la accion
	protected $respuesta;
	// Es el mensaje obtenido de la respuesta
	protected $mensaje;
	// Es el identificador de el usuario que esta realizando cambios en el sistema
	protected $idUsuario;
	// es la clave a validar 
	protected $clave;
	// Es el codigo de transaccion para evitar repetidos y marcar los movimientos de los usuarios
	protected $codigoTransaccion;
	// Objeto transaccion
	protected  $objTransaccion;
	// ES el objeto de permisos
	protected $objPermiso;
	
	public function constructor($modulo,$gestion,$accion,$formulario,$arrayDatos,$idioma,$idUsuario,$clave = '', $codigo=''){
		
		$this->modulo = $modulo;
		$this->gestion = $gestion;
		$this->accion = $accion;
		$this->formulario = $formulario;
		$this->arrayDatos = $arrayDatos;
		$this->idioma = $idioma;
		$this->respuesta = null;
		$this->idUsuario = $idUsuario;
		$this->clave = $clave ;
		$this->codigoTransaccion = $codigo;
		$this->objPermiso = new sistema_permisos_modelo();
		$this->objTransaccion = new sistema_usuariosTransacciones_modelo();
			
	}

	public function obtenerMensaje(){
		return $this->mensaje;
	}
	public function obtenerRespuesta(){
		return $this->respuesta;
	}
		

	public function acciones(){
		
		$this->respuesta = "";
		$this->mensaje = "";
		
		$objSistema = new sistema_sistema_modelo();
		$objSistema->constructor($this->arrayDatos,$this->idUsuario);
		
		$objModulo = new sistema_modulos_modelo();
		$objModulo->constructor($this->arrayDatos,$this->idUsuario);
			
		$objGestion = new sistema_gestiones_modelo();
		$objGestion->constructor($this->arrayDatos,$this->idUsuario);
		
		$this->objTransaccion->constructor($this->idUsuario);
		$respuesta = $this->objTransaccion->ingresarTransaccion($this->modulo, $this->gestion, $this->accion,$this->codigoTransaccion);
					
		if($respuesta != "1009" ){
			switch ($this->accion) {
				case "moduloActivar":
					// Activamos el usario
					if($this->controlPermiso($this->accion)){
						if($this->validadorClave($this->clave)){
							$this->respuesta = $objModulo -> cambioEstado(2);
						}else{
							$this->respuesta = '1004';
						}
					}else{
						$this->respuesta = '1002';
					}
					break;
				case "moduloDesactivar":
					// Desactivamos el usuario
					if($this->controlPermiso($this->accion)){
						if($this->validadorClave($this->clave)){
							$this->respuesta = $objModulo -> cambioEstado(3);
						}else{
							$this->respuesta = '1004';
						}
					}else{
						$this->respuesta = '1002';
					}
					break;
				case "gestionActivar":
					// Activamos el usario
					if($this->controlPermiso($this->accion)){
						if($this->validadorClave($this->clave)){
							$this->respuesta = $objGestion -> cambioEstado(2);
						}else{
							$this->respuesta = '1004';
						}
					}else{
						$this->respuesta = '1002';
					}
					break;
				case "gestionDesactivar":
					// Desactivamos el usuario
					if($this->controlPermiso($this->accion)){
						if($this->validadorClave($this->clave)){
							$this->respuesta = $objGestion -> cambioEstado(3);
						}else{
							$this->respuesta = '1004';
						}
					}else{
						$this->respuesta = '1002';
					}
					break;
			}
			// Finalizo la trasaccion
			$this->objTransaccion->finalizarTransaccion($this->codigoTransaccion, $this->mensaje, $this->respuesta);
			
		}else{
			
			$this->respuesta = '1009';
		}
		
		// Se va a levantar el mensaje si corresponde
		$this->alertas($this->accion);	
		return;
	}

	public function respuesta(){

	}

	public function interfaz($intefaces){
	
		$this->respuesta = "";
		$this->mensaje = "";
		$form = '';
		switch ($this->formulario) {
// Fichas ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//				
			case "moduloFicha":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_modulos_formulario_ficha.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "moduloFichaHistorial":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_modulos_formulario_fichaHistorial.php';
				}else{
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_modulos_formulario_ficha.php';
					$this->respuesta = '1002';
				}
				break;
			case "gestionFicha":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_gestiones_formulario_ficha.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "gestionFichaHistorial":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_gestiones_formulario_fichaHistorial.php';
				}else{
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_gestiones_formulario_ficha.php';
					$this->respuesta= '1002';
				}
				break;
// Listas ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
			case "modulosListar":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_modulos_tabla.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "gestionesListar":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_gestiones_tabla.php';
				}else{
					$this->respuesta = '1002';
				}
				break;				
			case "accionesListar":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_acciones_tabla.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			default:
				break;
		}
		// Se va a levantar el mensaje si corresponde
		$this->alertas($this->formulario);
		return $form;
					
	}

	public function alertas($parametro){
		// Funcion que se encarga de  carga el mensaje correspondiendo la accion que se esta intentando ejecutar o
		// al formuario que se esta intentando acceder
		if($this->respuesta != ""){
			$objSistema = new sistema_sistema_modelo();
			$objSistema->constructor($this->arrayDatos,$this->idUsuario);
			$xmlMensaje = $objSistema->alertasIdioma($this->modulo,$this->gestion,$this->idioma,$parametro,$this->respuesta);
			$this->mensaje = "$xmlMensaje";
		}	
	}
	
	
	protected function formulariosGenericos($intefaces){
		
		$form = "";
		switch ($this->formulario){
			// Socios ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
			case "sociosFicha":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/socios/interfaces/'.$intefaces.'/formularios/socios_socios_formulario_ficha.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "sociosFicha":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/socios/interfaces/'.$intefaces.'/formularios/socios_socios_formulario_fichaHistorial.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "tratamientosFicha":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/tratamientos/interfaces/'.$intefaces.'/formularios/tratamientos_tratamientos_formulario_ficha.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "tratamientosFichaHistorial":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/tratamientos/interfaces/'.$intefaces.'/formularios/tratamientos_tratamientos_formulario_fichaHistorial.php';
				}else{
					$this->respuesta = '1002';
				}
				break;				
			case "especiesFicha":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/animales/interfaces/'.$intefaces.'/formularios/animales_especies_formulario_ficha.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "especiesFichaHistorial":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/animales/interfaces/'.$intefaces.'/formularios/animales_especies_formulario_fichaHistorial.php';
				}else{
					$this->respuesta = '1002';
				}
				break;	
			case "razasFicha":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/animales/interfaces/'.$intefaces.'/formularios/animales_razas_formulario_ficha.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "razasFichaHistorial":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/animales/interfaces/'.$intefaces.'/formularios/animales_mascotas_formulario_fichaHistorial.php';
				}else{
					$this->respuesta = '1002';
				}
				break;				
			case "mascotasFicha":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/animales/interfaces/'.$intefaces.'/formularios/animales_mascotas_formulario_ficha.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			case "mascotasFichaHistorial":
				if($this->controlPermiso($this->formulario)){
					$form = 'modulos/animales/interfaces/'.$intefaces.'/formularios/animales_mascotas_formulario_fichaHistorial.php';
				}else{
					$this->respuesta = '1002';
				}
				break;
			default:				
				break;
		}
		return $form;
		
	}
	
	
	public function controlPermiso($accion){
		/*
		 * Este metodo recive la clave de validar el usuario
		 *
		 * */
		
		// Validamos los permiso de los usuarios 
		$pemisosUsuario = $this->objPermiso->validarPermisoUsuario($this->idUsuario, $this->modulo, $this->gestion, $accion);
		// Se controla que el usuario sea desarrollador o tenga permiso para ingresar al formulario o realizar la accion
		if($pemisosUsuario==1000){
			return TRUE;
		}else{
			return FALSE;
		}
			
	}
	
	public function validadorClave(){
		/*
		 * Este metodo recive la clave de validar el usuario
		 * 
		 * */		
		$objUsuario = new sistema_usuarios_modelo();
		$objUsuario->cargar($this->idUsuario);
		$respuesta = $objUsuario->validacionClaveControler($this->clave);
		return $respuesta;
			
	}
	
	
	
	
	
	
	
	
}

?>
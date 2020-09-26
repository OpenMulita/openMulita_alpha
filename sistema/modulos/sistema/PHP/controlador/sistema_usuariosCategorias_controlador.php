<?php
	/*
	 * Este controlador va gestionar el comportamientos de los usuarios y sus categorias
	 * utilizando 3 modelos modelo_usuarios,modelo_usuariosCategorias,modelo_usuariosAsociacionCategorias
	 */
	require_once ("modulos/sistema/PHP/controlador/sistema_sistema_controlador.php");
	require_once ("modulos/sistema/PHP/modelos/sistema_usuarios_modelo.php");
	require_once ("modulos/sistema/PHP/modelos/sistema_usuariosCategorias_modelo.php");
	require_once ("modulos/sistema/PHP/modelos/sistema_usuariosAsociacionCategorias_modelo.php");
		
	class sistema_usuariosCategorias_controlador extends sistema_sistema_controlador{
	
		public function acciones(){
			
			$xmlMensaje='';
						
			$objCategoria = new sistema_usuariosCategorias_modelo();
			$objCategoria->constructor($this->arrayDatos,$this->idUsuario);
			
			$objUsuAsociacionCat = new sistema_usuariosAsociacionCategorias_modelo();
			$objUsuAsociacionCat->constructor($this->arrayDatos,$this->idUsuario);
			
			
			$this->objPermiso->constructor($this->arrayDatos, $this->idUsuario);
			
			
			$this->objTransaccion->constructor($this->idUsuario);
			$respuesta = $this->objTransaccion->ingresarTransaccion($this->modulo, $this->gestion, $this->accion,$this->codigoTransaccion);
			
			if($respuesta != "1009" ){
		
				switch ($this->accion) {
	// Categorias ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//				
					case "usuariosCategoriasIngresar":					
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $objCategoria->ingresar();
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosCategoriasModificar":
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $objCategoria->guardar();
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosCategoriasActivar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objCategoria->cambioEstado(2);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosCategoriasDesactivar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objCategoria->cambioEstado(3);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosCategoriasBorrar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objCategoria->cambioEstado(4);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosCategoriasReactivar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objCategoria->cambioEstado(5);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
		// Asociacion Categoria ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
					case "asociacionCategoriaIngresar":
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $objUsuAsociacionCat->ingresar();
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "asociacionCategoriaActivar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objUsuAsociacionCat->cambioEstado(2);						
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "asociacionCategoriaDesactivar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objUsuAsociacionCat->cambioEstado(3);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
	// Permiso Categoria ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
					case "permisosIngresar":
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $this->objPermiso->ingresarPermisoCategoria();
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "permisosActivar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $this->objPermiso->cambioEstadoCategoria(2);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "permisosDesactivar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $this->objPermiso->cambioEstadoCategoria(3);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
				}
			
			}else{
				$this->respuesta = '1009';
			}
			// Se va a levantar el mensaje si corresponde
			$this->alertas($this->accion);
			// Finalizo la trasaccion
			$this->objTransaccion->finalizarTransaccion($this->codigoTransaccion, $this->mensaje, $this->respuesta);
			return;
		}
	
		
		public function interfaz($intefaces){
			
			$this->respuesta = "";
			$this->mensaje = "";
			$form = '';
			
			switch ($this->formulario){

// Categorias ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//				
				case "usuariosCategoriasIngresar":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuariosCategoria_formulario_ingresar.php';
					}else{
						$this->respuesta = 1002;
					}
					break;
				case "usuariosCategoriasFicha":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuariosCategoria_formulario_ficha.php';
					}else{
						$this->respuesta = 1002;
					}
					break;
				case "usuariosCategoriasFichaHistorial":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuariosCategoria_formulario_fichaHistorial.php';
					}else{
						$this->respuesta = 1002;
					}
					break;
				case "usuariosCategoriasListar":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuariosCategorias_tabla.php';
					}else{
						$this->respuesta = 1002;
					}
					break;
	// Default ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
				default:
					$form = $this->formulariosGenericos($intefaces);
					break;
			}
			$this->alertas($this->formulario);
			// Retornamos el fomulario
			return $form;
		}
		

	
	}

?>
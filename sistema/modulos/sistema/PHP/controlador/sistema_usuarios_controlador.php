<?php
	/*
	 * Este controlador va gestionar el comportamientos de los usuarios y sus categorias
	 * utilizando 3 modelos modelo_usuarios,modelo_usuariosCategorias,modelo_usuariosAsociacionCategorias
	 */
	require_once ("modulos/sistema/PHP/controlador/sistema_sistema_controlador.php");
	require_once ("modulos/sistema/PHP/modelos/sistema_usuarios_modelo.php");
	require_once ("modulos/sistema/PHP/modelos/sistema_usuariosCategorias_modelo.php");
	require_once ("modulos/sistema/PHP/modelos/sistema_usuariosAsociacionCategorias_modelo.php");
		
	class sistema_usuarios_controlador extends sistema_sistema_controlador{
	
		public function acciones(){
			
			
			$this->respuesta='';
			
			$objUsuario = new sistema_usuarios_modelo();
			$objUsuario->constructor($this->arrayDatos,$this->idUsuario);
			
			$objUsuAsociacionCat = new sistema_usuariosAsociacionCategorias_modelo();
			$objUsuAsociacionCat->constructor($this->arrayDatos,$this->idUsuario);
			
			$this->objPermiso->constructor($this->arrayDatos, $this->idUsuario);
			
			$this->objTransaccion->constructor($this->idUsuario);
			$respuesta = $this->objTransaccion->ingresarTransaccion($this->modulo, $this->gestion, $this->accion,$this->codigoTransaccion);
			
			if($respuesta != "1009" ){
				switch ($this->accion) {
					case "usuariosIngresar":
						// Ingresamos el usaurios
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $objUsuario -> ingresar();
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosModificar":
						// Guardamos el Usuario
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $objUsuario -> guardar();
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosActivar":
						// Activamos el usario 
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objUsuario -> cambioEstado(2);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosDesactivar":
						// Desactivamos el usuario
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objUsuario -> cambioEstado(3);
							}else{
								$this->respuesta = '1004';
							}	
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosBorrar":
						// Borramos el usuario
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objUsuario -> cambioEstado(4);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosReactivar":
						// Reactivamos el usaurio
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objUsuario -> cambioEstado(5) ;
							}else{
								$this->respuesta = '1004';
							}	
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuariosResetearClave":
						// Resetea la clave de le usaurio
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objUsuario -> reseteoClave();
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
	// Permiso Usuario ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
					case "permisosIngresar":
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $this->objPermiso->ingresarPermisoUsuario();
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "permisosActivar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $this->objPermiso->cambioEstadoUsuario(2);
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
								$this->respuesta = $this->objPermiso->cambioEstadoUsuario(3);
							}else{
								$this->respuesta = '1004';
							}
						}else{
							$this->respuesta = '1002';
						}
						break;
	// Login Usuario ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
					case "usuarioLoginIngresar":
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $objUsuario->loginUsuarioIngresar();
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuarioLoginModificar":
						if($this->controlPermiso($this->accion)){
							$this->respuesta = $objUsuario->loginUsuarioGuardar();						
						}else{
							$this->respuesta = '1002';
						}
						break;
					case "usuarioLoginBorrar":
						if($this->controlPermiso($this->accion)){
							if($this->validadorClave($this->clave)){
								$this->respuesta = $objUsuario->loginUsuarioCambioEstado(4);
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
			
			$this->alertas($this->accion);
			
			// Finalizo la trasaccion
			$this->objTransaccion->finalizarTransaccion($this->codigoTransaccion, $this->mensaje, $this->respuesta);
			return $this->respuesta;
				
		}
	
		
		public function interfaz($intefaces){
			
			$this->respuesta = "";
			$this->mensaje = "";
			$form = '';
			
			switch ($this->formulario){
// Validadores ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//				
				case "validador":
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_formulario_validador.php';
					break;
				case "validadorClave":
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_formulario_validadorClave.php';
					break;
// Usuarios ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//				
				case "usuariosIngresar":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuarios_formulario_ingresar.php';
					}else{
						$this->respuesta = 1002;	
					}
					break;
				case "usuarioFicha":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuarios_formulario_ficha.php';
					}else{
						$this->respuesta = 1002;
					}
					break;
				case "usuarioFichaHistorial":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuarios_formulario_fichaHistorial.php';
					}else{
						$this->respuesta = 1002;
					}
					break;
				case "usuariosListar":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuarios_tabla.php';
					}else{
						$this->respuesta = 1002;	
					}
					break;
				case "usuariosTransaccionesListar":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuarios_tabla_transacciones.php';
					}else{
						$this->respuesta = 1002;
					}
					break;
				case "usuariosLoginListar":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/sistema_usuarios_tabla_login.php';
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
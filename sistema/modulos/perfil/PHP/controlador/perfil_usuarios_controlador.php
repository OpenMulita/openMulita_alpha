<?php
	/*
	 * Este controlador va gestionar el comportamientos de los usuarios y sus categorias
	 * utilizando 3 modelos modelo_usuarios,modelo_usuariosCategorias,modelo_usuariosAsociacionCategorias
	 */
	require_once ("modulos/sistema/PHP/controlador/sistema_sistema_controlador.php");
	require_once ("modulos/perfil/PHP/modelos/perfil_usuarios_modelo.php");
	
	
	class perfil_usuarios_controlador extends sistema_sistema_controlador{
	
		public function acciones(){
			
			
			$this->respuesta='';
			
			$objUsuario = new perfil_usuarios_modelo();
			$objUsuario->constructor($this->arrayDatos,$this->idUsuario);
			
			switch ($this->accion) {
				case "perfilModificar":
					// Guardamos el Usuario
					$this->respuesta = $objUsuario->guardar();
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
				case "perfilCambioClave":
					// Resetea la clave de le usaurio
					$claves = array();
					$claves["anteriror"] = $this->arrayDatos['claveVieja'];
					$claves["nueva"] = $this->arrayDatos['claveNueva'];					
					$this->respuesta = $objUsuario->cambioClave($claves);
					break;
			}
			$this->alertas($this->accion);
			return $this->respuesta;
				
		}
	
		
		public function interfaz($intefaces){
			
			$this->respuesta = "";
			$this->mensaje = "";
			$form = '';

			switch ($this->formulario){
// Usuarios ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//				
				case "perfilFicha":
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/perfil_usuarios_formulario_ficha.php';
					break;							
				case "usuarioFichaHistorial":
					if($this->controlPermiso($this->formulario)){
						$form = 'modulos/'.$this->modulo.'/PHP/vistas/perfil_usuarios_formulario_fichaHistorial.php';
					}else{
						$this->respuesta = 1002;
					}
					break;				
// Default ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
				default:
					$form = 'modulos/'.$this->modulo.'/PHP/vistas/perfil_usuarios_formulario_ficha.php';
					break;
					
			}			
			$this->alertas($this->formulario);	
			// Retornamos el fomulario
			return $form;
		}
	
	}

?>
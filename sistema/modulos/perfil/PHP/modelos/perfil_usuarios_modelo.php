<?php
	/*Creada por Damian Delgado
	 * 
	 * Esta clase se encarga de administrar los movimientos de la base de las usuarios 
	 * 
	 */
	require_once("modulos/sistema/PHP/modelos/sistema_usuarios_modelo.php");

	class perfil_usuarios_modelo extends sistema_usuarios_modelo{
		
		
//*************************************************************************************************************************************************//
//******************************************************/  Ingresamos el Registro  /***************************************************************//
//*************************************************************************************************************************************************//
		
		// Metodo para Ingresar el usuario por primera ves 
		public function ingresar(){
			
		} 
		

		//Metodo usado para gardar los cambio echos en el usuario excepto la clave
		public function guardar(){
			
			$this->idTipoEdicion = 2;
			$preparate = "SELECT fun_sistema_usuarios_guardar(:idUsuario, :mail, :imagen, :descripcion, :idTipoEdicion , :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idUsuario' => $this->idUsuario,
					'mail' => $this->mail,
					'imagen' => $this->imagen,
					'descripcion' => $this->descripcion,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
		
		}
		
		
		// Metodo que se encarga de cambiar los estados del usuario
		public function cambioEstado($estado){
				
		}


		public function reseteoClave(){
		
		}		
		
		
//*************************************************************************************************************************************************//
//**********************************************************/  Login  /****************************************************************************//
//*************************************************************************************************************************************************//
		
		public function loginUsuario(){
			
		}

//*************************************************************************************************************************************************//
//**********************************************************/  Idiomas  /**************************************************************************//
//*************************************************************************************************************************************************//


	
	}
?>		
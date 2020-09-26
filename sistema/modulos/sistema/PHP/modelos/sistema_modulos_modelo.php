<?php

	require_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");

	class sistema_modulos_modelo extends sistema_sistema_modelo{

		//Id del modulo
		protected $idModulo;
		//Es el Nombre de el modulo
		protected $nombre;
		// Es el parametro de el modulo
		protected $parametro;
		// Es la descripcion de el modulo
		protected $descripcion;
		// Es el estado que se encuentra el registros;
		protected $idEstado;
		//Es el motivo por el cual se modifica el registro
		protected $motivo;
		// Es la variable de sistema
		protected $sisUsuarios;

//*************************************************************************************************************************************************//
//***************************************************************/  CONSTRUCTOR  /*****************************************************************//
//*************************************************************************************************************************************************//
		
		
		public function constructor($modulo,$sisUsuario){
				
			$this->idModulo = $modulo['idRegistro'];
			$this->nombre = $modulo['nombre'];
			$this->motivo = $modulo['motivo'];
			$this->sisUsuarios = $sisUsuario;	
			$this->modelo = 'modelo_modulos';
			
		}


//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargarModulos($idModulo){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			
		}

		
//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerIDModulo(){
			return $this->idModulo;
		}
		public function obtenerNombreModulo(){
			return $this->nombre;
		}
		public function obtenerParametro(){
			return $this->parametro;
		}
		public function obtenerDescripcion(){
			return $this->descripcion;
		}		
		public function obtenerIdEstado(){
			return $this->idEstado;
		}		
		public function obtenerMotivo(){
			return $this->motivo;
		}
		
//*************************************************************************************************************************************************//
//**********************************************************/  Acciones  /*************************************************************************//
//*************************************************************************************************************************************************//
		
		
		public function cambioEstado($idEstado){
		
			$this->idTipoEdicion = 3;
			$this->idEstado = $idEstado;
			$preparate = "SELECT fun_sistema_modulos_cambioEstado( :idModulo, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idModulo' => $this->idModulo,
								'idEstado' => $this->idEstado,
								'idTipoEdicion' => $this->idTipoEdicion,
								'motivo' => $this->motivo,
								'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
				
		}
		
		
//*************************************************************************************************************************************************//
//*********************************************************/  Idiomas  /***************************************************************************//
//*************************************************************************************************************************************************//
	
		



	}
	
?>
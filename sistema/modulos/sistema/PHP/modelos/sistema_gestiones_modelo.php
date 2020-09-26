<?php

	require_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");

	class sistema_gestiones_modelo extends sistema_sistema_modelo{

		// Es el identificador de la gestion
		protected $idGestion;
		// Es el nombre de la gestion
		protected $nombreGestion;
		// Es el identificador de el modulo a la cual la gestion pertenece
		protected $idModulo;
		// Es el parametro de la gestion
		protected $parametro;				
		// Es la descripcion de la gestion
		protected $descripcion;					
		// Es el identificador en el estado que se encuentra
		protected $idEstado;				
		// Es el mitivo por el cual se realiza el cambio
		protected $motivo;
		// Es la variable de el usuario sistema
		protected $sisUsuarios;

//*************************************************************************************************************************************************//
//***************************************************************/  CONSTRUCTOR  /*****************************************************************//
//*************************************************************************************************************************************************//

		public function constructor($gestion,$idUsuario){
				
			$this->idGestion = $gestion['idRegistro'];
			$this->nombreGestion = $gestion['nombre'];
			$this->idModulo = $gestion['idModulo'];
			$this->parametro = $gestion['parametro'];
			$this->motivo = $gestion['motivo'];
			$this->sisUsuarios = $idUsuario;
			$this->modelo = 'modelo_gestiones';
				
		}


//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargarGestion($idGestion){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 */
		}
		
//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerIDGestion(){
			return $this->idGestion;
		}
		public function obtenerNombreGestion(){
			return $this->nombreGestion;
		}
		public function obtenerMotivo(){
			return $this->motivo;
		}
		public function obtenerIdEstado(){
			return $this->idEstado;
		}
		public function obtenerIdModulo(){
			return $this->idModulo;
		}
		public function obtenerParametro(){
			return $this->parametro;
		}
		public function obtenerDescripcion(){
			return $this->descripcion;
		}

//*************************************************************************************************************************************************//
//**********************************************************/  Acciones  /*************************************************************************//
//*************************************************************************************************************************************************//
		
		public function cambioEstado($idEstado){
			
			$idTipoEdicion = 3;
			$preparate = "SELECT fun_sistema_gestiones_cambioEstado ( :idGestion, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idGestion' => $this->idGestion,
								'idEstado' => $idEstado,
								'idTipoEdicion' => $idTipoEdicion,
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
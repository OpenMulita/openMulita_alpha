<?php

	require_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");

	class sistema_acciones_modelo extends sistema_sistema_modelo{

		//Id del modulo
		protected $idAccion;
		//Es el Nombre de el modulo
		protected $nombreAccion;
		// Es el parametro para realizar esa accion
		protected $parametro;
		// IDentificador del modulo que pertenece la accion
		protected $idModulo;
		// Identificador del gestion de la accion
		protected $idGestion;
		// Es la descripcion de la accion
		protected $descripcion;

		
//*************************************************************************************************************************************************//
//***************************************************************/  CONSTRUCTOR  /*****************************************************************//
//*************************************************************************************************************************************************//
		
		public function constructor($accion,$idUsuario){
				
			$this->idAccion = $accion['idRegistro'];
			$this->nombreAccion = $accion['nombre'];
			$this->parametro = $accion['parametro'];
			$this->idModulo = $accion['idModulo'];
			$this->idGestion = $accion['idGestion'];
			$this->descripcion = $accion['descripcion'];
			
		}


//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargar($idAccion){
	
			$tabla = $this->tabla();
			$ssql="SELECT * FROM sistema_acciones WHERE sa_idAccion = :idAccion";			
			$arrayDatos = array('idAccion' => $idAccion);
			$listaPdo = $this->traerResultadoPDO($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				
				$this->idAccion = $resultado['sa_idAccion'];
				$this->nombreAccion = $resultado['sa_nombreAccion'];
				$this->parametro = $resultado['sa_parametroAccion'];
				$this->idModulo = $resultado['sa_idModulo'];
				$this->idGestion = $resultado['sa_idGestion'];
				$this->descripcion = $resultado['sa_descripcionAccion'];
				
			}
			
		}
		
//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerIDAccion(){
			return $this->idAccion;
		}
		
		public function obtenerNombreAccion(){
			return $this->nombreAccion;
		}
		
		public function obtenerParametroAccion(){
			return $this->nombreParametro;
		}
		
		public function obtenerIdModulo(){
			return $this->idModulo;
		}
		
		public function obtenerIdGestion(){
			return $this->idGestion;
		}
		
		public function obtenerDescripocion(){
			return $this->descripcion;
		}
		
	
//*************************************************************************************************************************************************//
//*********************************************************/  IDIOMAS  /***************************************************************************//
//*************************************************************************************************************************************************//
		
	
		
		
	}

	
?>
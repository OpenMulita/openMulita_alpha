<?php

	require_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");

	class sistema_usuariosCategorias_modelo extends sistema_sistema_modelo{

		//Id del modulo
		protected $idCategoria;
		//Es el Nombre de el modulo
		protected $nombre;
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
		
		public function constructor($usuarioCategoria = null ,$sisUsuario = null){
				
			$this->idCategoria = $usuarioCategoria['idRegistro'];
			$this->nombre = $usuarioCategoria['nombre'];
			$this->descripcion = $usuarioCategoria['descripcion'];
			$this->motivo = $usuarioCategoria['motivo'];
			$this->sisUsuarios = $sisUsuario;
			$this->modelo = "modelo_usuariosCategorias";
			
		}
		
	
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargar($idUsuarioCategoria){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$preparate = "SELTCT * FROM sistema_usuarios_categorias WHERE suc_idUSuarioCategoria = :idUsuarioCategoria";
			$arrayDatos = array('idUsuarioCategoria' => $idUsuarioCategoria);
			$listaPdo = $this->traerResultadoPDO($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idCategoria = $resultado['suc_idUsuarioCategoria'];
				$this->nombre = $resultado['suc_nombreUsuarioCategoria'];
				$this->descripcion = $resultado['suc_descripcionUsuarioCategoria'];
				$this->idEstado = $resultado['suc_idEstado'];
				$this->motivo = $resultado['suc_motivoUsuarioCategoria'];
			}
			$baseObj->cerrarConexion();
		}
		
//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerID(){
			return $this->idCategoria;
		}
		public function obtenerNombre(){
			return $this->nombre;
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
		
		public function ingresar(){
			
			/**
			 * Metodo para ingresar el usuario al sistema
			 * */
			
			// Primero valido si las claves son identica con la confirmacion
			$retorno = array();
			$this->idEstado = 1;
			$this->idTipoEdicion = 1;

			$preparate = "SELECT fun_sistema_usuarios_categorias_ingresar( :nombre, :descripcion, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array('nombre' => $this->nombre,
					'descripcion' => $this->descripcion,
					'idEstado' => $this->idEstado,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
			
		}
		
		public function guardar(){
		
			$retorno = 0;
			$this->idTipoEdicion = 2;
			$preparate = "SELECT fun_sistema_usuarios_categorias_guardar(:idCategoria, :nombre, :descripcion, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array('idCategoria' => $this->idCategoria,
					'nombre' => $this->nombre,
					'descripcion' => $this->descripcion,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
				
		}
		
		public function cambioEstado($idEstado){
		  
			$retorno = 0;
			$this->idTipoEdicion = 3;
			$this->idEstado = $idEstado;
			$preparate = "SELECT fun_sistema_usuarios_categorias_cambioEstado( :idCategoria, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array('idCategoria' => $this->idCategoria,
					'idEstado' => $this->idEstado,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
			
		}

//*************************************************************************************************************************************************//
//**********************************************************/  Idiomas  /**************************************************************************//
//*************************************************************************************************************************************************//



		
	}
?>
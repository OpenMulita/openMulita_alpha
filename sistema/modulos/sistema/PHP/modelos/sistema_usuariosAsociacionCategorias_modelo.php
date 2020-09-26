<?php

	require_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");

	class sistema_usuariosAsociacionCategorias_modelo extends sistema_sistema_modelo{

		//Id de la asociacion
		protected $id;
		// Es el identificador de usario
		protected $idUsuario;
		// Es el identificador de la categoria
		protected $idCategoria;
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
				
			$this->id = $usuarioCategoria['idRegistro'];
			$this->idUsuario = $usuarioCategoria['idUsuario'];
			$this->idCategoria = $usuarioCategoria['idCategoria'];
			$this->idEstado =  $usuarioCategoria['idEstado'];
			$this->motivo = $usuarioCategoria['motivo'];
			$this->sisUsuarios = $sisUsuario;	
			$this->modelo = "modelo_usuariosAsociacionCategorias";
			
		}
		

//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargar($idUsuarioCategoria){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$preparate = "SELECT * FROM sistema_usuarios_asociacion_categorias WHERE suac_idUSuarioCategoria = :idUsuarioCategoria";
			$arrayDatos = array('idUsuarioCategoria' => $idUsuarioCategoria);
			$listaPdo = $this->traerResultadoPDO($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->id = $resultado['suc_idUsuarioCategoria'];
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
			return $this->id;
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
			
			$retorno = 0;
			$this->idEstado = 2;
			$this->idTipoEdicion = 1;
			$preparate = "SELECT fun_sistema_usuarios_asociacion_categorias_ingresar( :idUsuario, :idCategoria, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array('idUsuario' => $this->idUsuario,
					'idCategoria' => $this->idCategoria,
					'idEstado' => $this->idEstado,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
						
		}
		
		
		public function guardar(){
		
		
		}
		
		public function cambioEstado($idEstado){
			
			$retorno = 0;
			$this->idTipoEdicion = 3;
			$preparate = "SELECT fun_sistema_usuarios_asociacion_categorias_cambioEstado( :idAsociacion, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array('idAsociacion' => $this->id,
					'idEstado' => $idEstado,
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
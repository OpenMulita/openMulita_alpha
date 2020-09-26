<?php

	require_once("modulos/sistema/PHP/modelos/sistema_acciones_modelo.php");

	class sistema_permisos_modelo extends sistema_acciones_modelo{
		
		//Id identificador de la asociacion de las empresa con un local
		protected $id;
		//Es el identificado de el usaurio que se le van a dar permisos
		protected $idUsuario;
		// Es el identificador de la categoria
		protected $idCategoria;
		//Indetificar de el modulo
		protected $idModulo;
		// Identificador de la gestion
		protected $idGestion;
		//Identificador de el registro que el usuario va a tener privilegio
		protected $idPermiso;
		// ES el id de el estado que se encuetra
		protected $idEstado;
		// Motivo de la modificacion
		protected $motivo;
		
//*************************************************************************************************************************************************//
//***************************************************************/  CONSTRUCTOR  /*****************************************************************//
//*************************************************************************************************************************************************//
		
		public function constructor($permiso,$idUsuario){
			
			$this->id = $permiso['idRegistro'];
			$this->idUsuario = $permiso['idUsuario'];
			$this->idCategoria = $permiso['idCategoria'];
			$this->idModulo = $permiso['idModulo'];
			$this->idGestion = $permiso['idGestion'];
			$this->idPermiso = $permiso['idPermiso'];
			$this->idEstado = $permiso['idEstado'];
			$this->motivo = $permiso['motivo'];
			$this->sisUsuarios = $idUsuario;
			$this->modelo = "modelo_usuariosPermisos";			
							
		}
				
//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerID(){
			return $this->id;
		}
		public function obtenerIdUsuario(){
			return $this->idUsuario;
		}
		public function obtenerIdCategoria(){
			return $this->idCategoria;
		}
		
		public function obtenerIdGestion(){
			return $this->idGestion;
		}
		public function obtenerIdPermiso(){
			return $this->idPermiso;
		}	
		public function obtenerIdEstado(){
			return $this->idEstado;
		}
		public function obtenerMotivo(){
			return $this->motivo;
		}
		
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargarUsuario($idPermiso){
			/**
			 * Este metodo se va a encargar de cargar los datos para el registro
			 * ya almacenado en la base de datos 
			 */

		}		
	
//*************************************************************************************************************************************************//
//**********************************************************/  Acciones  /*************************************************************************//
//*************************************************************************************************************************************************//

		public function ingresarPermisoUsuario(){
			
			$retorno = 0;
			$this->idEstado = 2;
			$idTipoEdicion = 1;
			
			$preparate = "SELECT fun_sistema_usuarios_permisos_ingresar(:idUsuario, :idModulo, :idGestion, :idPermiso, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array('idUsuario' => $this->idUsuario,
								'idModulo' => $this->idModulo,
								'idGestion' => $this->idGestion,
								'idPermiso' => $this->idPermiso,
								'idEstado' => $this->idEstado,
								'idTipoEdicion' => $idTipoEdicion,
								'motivo' => $this->motivo,
								'sisUsuarios' => $this->sisUsuarios);			
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
			
		}
		
		public function ingresarPermisoCategoria(){
			
			$retorno = 0;
			$this->idEstado = 2;
			$idTipoEdicion = 1;
			$preparate = "SELECT fun_sistema_usuarios_categorias_permisos_ingresar(:idCategoria, :idModulo, :idGestion, :idPermiso, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array('idCategoria' => $this->idCategoria,
								'idModulo' => $this->idModulo,
								'idGestion' => $this->idGestion,
								'idPermiso' => $this->idPermiso,
								'idEstado' => $this->idEstado,
								'idTipoEdicion' => $idTipoEdicion,
								'motivo' => $this->motivo,
								'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
			
		}


		public function cambioEstadoUsuario($estado){
	
			$retorno = 0;
			$idTipoEdicion = 3;
			$preparate = "SELECT fun_sistema_usuarios_permisos_cambioEstado(:idRegistro, :estado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array("idRegistro" => $this->id,
					"estado" => $estado,
					"idTipoEdicion" => $idTipoEdicion,
					"motivo" => $this->motivo,
					"sisUsuarios" => $this->sisUsuarios
			);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
			
		}
		
		public function cambioEstadoCategoria($estado){
			
			$retorno = 0;
			$idTipoEdicion = 3;
			$preparate = "SELECT fun_sistema_usuarios_categorias_permisos_cambioEstado( :idRegistro, :estado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno;";
			$arrayDatos = array("idRegistro" => $this->id,
					"estado" => $estado,
					"idTipoEdicion" => $idTipoEdicion,
					"motivo" => $this->motivo,
					"sisUsuarios" => $this->sisUsuarios
			);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
			
		}

//*************************************************************************************************************************************************//
//******************************************************/  Validar el Registro  /******************************************************************//
//*************************************************************************************************************************************************//

		public function validarPermisoUsuario($idUsuario,$modulo,$gestion,$accion){
			
			$this->sisUsuarios = $idUsuario;
			$preparate = "SELECT fun_sistema_permisos_verificar( :idUsuario, :modulo, :gestion, :accion) AS funcion_retorno;";
			$arrayDatos = array("idUsuario" => $idUsuario,
								"modulo" => $modulo,
								"gestion" => $gestion,
								"accion" => $accion);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			//$retorno = "1000";
			return $retorno;
		
		}
		
		
//*************************************************************************************************************************************************//
//*********************************************************/  Idiomas  /***************************************************************************//
//*************************************************************************************************************************************************//

	
	}
	
?>	
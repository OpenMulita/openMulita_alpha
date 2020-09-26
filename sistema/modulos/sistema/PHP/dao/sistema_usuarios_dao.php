<?php
	/*Creada por Damian Delgado
	 * 
	 * Esta clase se encarga de administrar los movimientos de la base de las usuarios 
	 * 
	 * 
	 */
	require_once("modulos/sistema/PHP/modelos/sistema_usuarios_modelo.php");		
	//Cargamos el objeto
	class sistema_usuarios_dao extends sistema_usuarios_modelo{
		
		// Es el nombre de el estado
		protected $nombreEstado;
		// Es la fecha que se modifico el modulo
		protected $fechaEdicion;
		//Es el nombre de el usuario que edito el modulo
		protected $nombreUsuario;
		//Es el nombre de el usuario que edito el modulo
		protected $nombreTipoEdicion;
		//ES el identiicar de el registro en el historial
		protected $idHistorial;
				
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
		
		
		//Cargamos el usuario
		public function cargar($idUsuario){
					
			$preparate = "SELECT 	su_idUsuario, 
							su_nombreUsuario, 
							su_mailUsuario, 
							su_imagenUsuario, 
							su_descripcionUsuario, 
							se_nombreEstado, 
							su_idEstado, 
							su_motivoUsuario
						FROM sistema_usuarios su
						INNER JOIN sistema_estados ON se_idEstado = su_idEstado
						WHERE su_idUsuario= :idUsuario";			
			$arrayDatos = array('idUsuario' => $idUsuario);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idUsuario = $resultado['su_idUsuario'];
				$this->nombre = $resultado['su_nombreUsuario'];
				$this->mail = $resultado['su_mailUsuario'];
				$this->descripcion = $resultado['su_descripcionUsuario'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->idEstado = $resultado['su_idEstado'];
				$this->imagen = $resultado['su_imagenUsuario'];
				$this->motivo = $resultado['su_motivoUsuario'];
			}			
		}		
		
		
		public function cargarHistorial($idHistorial){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$preparate = "SELECT 	suh_idUsuarioHistorial,
							ste_nombreTipoEdicion,
							su_nombreUsuario,
							DATE_FORMAT(suh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') as fechaEdicion,
							suh_idUsuario,
							suh_nombreUsuario,
							suh_mailUsuario,
							suh_imagenUsuario,
                            suh_descripcionUsuario,
							suh_idEstado,
							se_nombreEstado,
							suh_motivoUsuario
						FROM sistema_usuarios_historial
						INNER JOIN sistema_estados ON se_idEstado = suh_idEstado
						INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = suh_idTipoEdicion
						INNER JOIN sistema_usuarios ON su_idUsuario = suh_idUsuarioEdito
						WHERE suh_idUsuarioHistorial = :idHistorial;
			";
			$arrayDatos = array('idHistorial' => $idHistorial);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idHistorial = $resultado['suh_idUsuarioHistorial'];
				$this->nombreTipoEdicion = $resultado['ste_nombreTipoEdicion'];
				$this->fechaEdicion = $resultado['fechaEdicion'];
				$this->nombreUsuario = $resultado['su_nombreUsuario'];					
				$this->idUsuario = $resultado['suh_idUsuario'];
				$this->nombre = $resultado['suh_nombreUsuario'];
				$this->mail = $resultado['suh_mailUsuario'];
				$this->imagen = $resultado['suh_imagenUsuario'];
				$this->descripcion = $resultado['suh_descripcionUsuario'];					
				$this->idEstado = $resultado['suh_idEstado'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->motivo = $resultado['suh_motivoUsuario'];
			}
		}
		
		protected function motorBase(){
			/*
			 * Este metodo se encarga de seleccionar que motor de base se va a usar
			 * */
			$retorno = "mysqlpdo";
			return $retorno;
			
		}
		

//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerNombreEstado(){
			return $this->nombreEstado;
		}
		
		public function obtenerNombreTipoEdicion(){
			return $this->nombreTipoEdicion;
		}
		
		public function obtenerFechaEdicion(){
			return $this->fechaEdicion;
		}
		
		public function obtenerNombreUsuario(){
			return $this->nombreUsuario;
		}
		
		public function obtenerIdHistorial(){
			return $this->idHistorial;
		}
		
		public function obtenerPoderUsuario($idUsuario){
			/*
			 * Esta Funcion se encarga de validad si el usuario es desarrollador
			 * si lo tiene permiso de realizar todas las pruebas disponibles
			 * */
			$preparate = "SELECT su_poder FROM sistema_usuarios WHERE su_idUsuario = :idUsuario;";
			$arrayDatos = array('idUsuario' => $idUsuario);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$respuesta = $listaPdo['registros'];
			$retorno = $respuesta[0][0];
			return $retorno;
			
		}
		
//*************************************************************************************************************************************************//
//**********************************************************/  Listas  /***************************************************************************//
//*************************************************************************************************************************************************//

		public function listaSelect(){
			
			$preparate = "SELECT	su_idUsuario,
							su_nombreUsuario 
						FROM sistema_usuarios 
						WHERE su_poder = 'estandar'
						AND su_idEstado in (2,4) 
						ORDER BY su_nombreUsuario";
			$arrayDatos = array('idUsuario' => "");
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			return $lista;
		}
		
		
		public function listaSelectCategoria($idCategoria){
			/*
			 * Este metodo statico se encarga de imprimir en pantalla los campos de un select
			 * para que el usuario puede elegir una opcion.
			 * */		
			$preparate = "SELECT	suc_idUsuarioCategoria,
							suc_nombreUsuarioCategoria 
						FROM sistema_usuarios_categorias 
						ORDER BY suc_nombreUsuarioCategoria";
			$arrayDatos = array('idUsuario' => "");
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			return $lista;
		}
		
		
		public function listas($consulta,$idUsuario,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas
			 * */
			switch ($consulta){
				case "tabla":
					$preparate = "SELECT su_idUsuario AS idRegistro, 
									su_nombreUsuario AS campoUno, 
									su_descripcionUsuario AS campoDos,
									su_motivoUsuario AS campoTres,
									se_nombreEstado AS campoCuatro, 
									su_idEstado AS idEstado
								FROM sistema_usuarios 
								INNER JOIN sistema_estados ON se_idEstado = su_idEstado
								WHERE su_poder IN ('estandar','administrador');";
					break;
				case "tablaHistorial":
					$preparate = "SELECT	suh_idUsuarioHistorial AS idRegistro,
									ste_nombreTipoEdicion AS campoUno,
									DATE_FORMAT(suh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') AS campoDos,
									su_nombreUsuario AS campoTres,
									suh_motivoUsuario AS campoCuatro,
									suh_idEStado AS idEstado
								FROM sistema_usuarios_historial
								INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = suh_idTipoEdicion
								INNER JOIN sistema_estados ON se_idEstado = suh_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = suh_idUsuario
								WHERE suh_idUsuario = :idUsuario;";
					break;
				case "tablaAsociacionCategorias":	
					$preparate = "SELECT 	suac_idUsuarioAsociacionCategoria AS idRegistro,
									suc_nombreUsuarioCategoria AS campoUno, 
									su_nombreUsuario AS campoDos,
									suac_motivoAsociacion AS campoTres,
									se_nombreEstado AS campoCuatro, 
									suac_idEstado AS idEstado
								FROM sistema_usuarios_asociacion_categorias 
								INNER JOIN sistema_estados ON se_idEstado = suac_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = suac_idUsuario
								INNER JOIN sistema_usuarios_categorias ON suc_idUsuarioCategoria = suac_idUsuarioCategoria
								WHERE suac_idUsuario = :idUsuario;";
					break;
				case "tablaPermisos":
					$preparate = "SELECT 	sup_idPermisoUsuario  AS idRegistro,
									sm_nombreModulo AS campoUno,
									sg_nombreGestion AS campoDos,
									sa_nombreAccion AS campoTres, 
									se_nombreEstado AS campoCuatro, 
									sup_idEstado AS idEstado	
								FROM sistema_usuarios_permisos 
								INNER JOIN sistema_usuarios ON su_idUsuario = sup_idUsuario
								INNER JOIN sistema_modulos ON sm_idModulo = sup_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sup_idGestion
								INNER JOIN sistema_acciones ON sa_idAccion = sup_idAccion
								INNER JOIN sistema_estados ON se_idEstado = sup_idEstado
								WHERE sup_idUsuario = :idUsuario";
					break;
				case "tablaLogin":
					$preparate = "SELECT sl_idLogin  AS idRegistro,
									su_nombreUsuario AS campoUno,
									DATE_FORMAT(sl_fechaLogin, '%d-%m-%Y') AS campoDos,
									sl_horaLogin AS campoTres,
									sl_tipoLogin AS campoCuatro,
									se_nombreEstado AS campoCinco,
									sl_idEstado AS idEstado
								FROM sistema_login
								INNER JOIN sistema_usuarios ON su_idUsuario = sl_idUsuario
								INNER JOIN sistema_estados ON se_idEstado = sl_idEstado
								WHERE sl_idEstado = 2";
					break;
				case "tablaTransacciones":
					$preparate = "SELECT	sut_idTransaccionUsuario as idRegistro,								
									sm_nombreModulo as campoUno,
									sg_nombreGestion as campoDos,
									sa_nombreAccion as campoTres,
									se_nombreEstado as campoCuatro,
									sut_idEstado as idEstado,
									sut_detalle as detalle
								FROM sistema_usuarios_transaccion
								INNER JOIN sistema_modulos ON sm_idModulo = sut_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sut_idGestion
								INNER JOIN sistema_acciones ON sa_idAccion = sut_idAccion
								INNER JOIN sistema_usuarios ON su_idUsuario = sut_idUsuario
								INNER JOIN sistema_estados ON se_idEstado = sut_idEstado
								WHERE sut_idUsuario = :idUsuario 
								ORDER BY idRegistro LIMIT 1000";
					break;					
				default:
					break;
			}
			$arrayDatos = array('idUsuario' => $idUsuario);
			$lista = $this->traerResultado($preparate,$arrayDatos);
			return $lista;			
		}
		
		
		
		
		
		
}

?>		
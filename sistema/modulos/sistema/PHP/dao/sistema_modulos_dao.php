<?php

	require_once("modulos/sistema/PHP/modelos/sistema_modulos_modelo.php");	
	
	class sistema_modulos_dao extends sistema_modulos_modelo{

		
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargarModulos($idModulo){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$preparate = "SELECT sm_idModulo,sm_nombreModulo,sm_parametroModulo,sm_descripcionModulo,sm_idEstado,se_nombreEstado,sm_motivoModulo 
					FROM sistema_modulos 
					INNER JOIN sistema_estados ON se_idEstado = sm_idEstado
					WHERE sm_idModulo = :idModulo;";
			$arrayDatos = array('idModulo' => $idModulo);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idModulo = $resultado['sm_idModulo'];
				$this->nombre = $resultado['sm_nombreModulo'];
				$this->parametro = $resultado['sm_parametroModulo'];
				$this->descripcion = $resultado['sm_descripcionModulo'];
				$this->idEstado = $resultado['sm_idEstado'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->motivo = $resultado['sm_motivoModulo'];
			}
		}
		
		
		public function cargarHistorial($idHistorial){
			/*
			 * Este metodo se encarga de cargar los datos del historial de la clase para poderse manipular
			 * */
			$preparate = "SELECT 	smh_idModuloHistorial,
							ste_nombreTipoEdicion,
							su_nombreUsuario,
							DATE_FORMAT(smh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') as fechaEdicion,
							smh_idModulo,
							smh_nombreModulo,
							smh_parametroModulo,
							smh_descripcionModulo,
							smh_idEstado,
							se_nombreEstado,
							smh_motivoModulo
						FROM sistema_modulos_historial
						INNER JOIN sistema_estados ON se_idEstado = smh_idEstado
						INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = smh_idTipoEdicion
						INNER JOIN sistema_usuarios ON su_idUsuario = smh_idUsuarioEdito
						WHERE smh_idModuloHistorial=:idHistorial;
			";
			$arrayDatos = array('idHistorial' => $idHistorial);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idHistorial = $resultado['smh_idModuloHistorial'];
				$this->nombreTipoEdicion = $resultado['ste_nombreTipoEdicion'];
				$this->fechaEdicion = $resultado['fechaEdicion'];
				$this->nombreUsuario = $resultado['su_nombreUsuario'];				
				$this->nombre = $resultado['smh_nombreModulo'];
				$this->idModulo = $resultado['smh_idModulo'];
				$this->parametro = $resultado['smh_parametroModulo'];
				$this->descripcion = $resultado['smh_descripcionModulo'];
				$this->idEstado = $resultado['smh_idEstado'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->motivo = $resultado['smh_motivoModulo'];
			}
		}
		
		protected function motorBase(){
			/*
			 * Este metodo se encarga de seleccionar que motor de base se va a usar
			 * */
			$retorno = "mysqlpdo";
			return $retorno;
			
		}
		
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
		
		
		
//*************************************************************************************************************************************************//
//**********************************************************/  Listas  /***************************************************************************//
//*************************************************************************************************************************************************//
		
		public function listas($consulta,$modulo,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas  
			 * */			
			switch ($consulta){
				case "tabla":
					$preparate= "SELECT sm_idModulo AS idRegistro,
									sm_nombreModulo AS campoUno,
									sm_descripcionModulo AS campoDos,
									sm_parametroModulo AS campoTres,
									se_nombreEstado AS campoCuatro,
									sm_idEstado AS idEstado
								FROM sistema_modulos
								INNER JOIN sistema_estados ON se_idEstado = sm_idEstado;";
					break;
				case "tablaHistorial":
					$preparate= "SELECT	smh_idModuloHistorial AS idRegistro,
									ste_nombreTipoEdicion AS campoUno,
									DATE_FORMAT(smh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') AS campoDos,
									su_nombreUsuario AS campoTres,
									smh_motivoModulo AS campoCuatro,
									smh_idEstado AS idEstado
								FROM sistema_modulos_historial
								INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = smh_idTipoEdicion
								INNER JOIN sistema_estados ON se_idEstado = smh_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = smh_idUsuarioEdito
								WHERE smh_idModulo = :idModulo;
						";
					break;
				case "tablaGestiones":
					$preparate= "SELECT 	sg_idGestion AS idRegistro,
									sg_nombreGestion AS campoUno,
									sg_descripcionGestion AS campoDos,
									sg_motivoGestion AS campoTres,
									se_nombreEstado AS campoCuatro,
									sg_idEstado AS idEstado
								FROM sistema_gestiones
								INNER JOIN sistema_estados ON se_idEstado = sg_idEstado
								WHERE sg_idModulo = :idModulo;
					";
					break;
				case "tablaAcciones":
					$preparate= "SELECT 	sa_idAccion AS idRegistro,
									sg_nombreGestion AS campoUno,
									sa_nombreAccion AS campoDos,
									sa_descripcionAccion AS campoTres,
									'' as campoCuatro
								FROM sistema_acciones
								INNER JOIN sistema_modulos ON sm_idModulo = sa_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sa_idGestion
								WHERE sa_idModulo = :idModulo;";
					break;
				case "lista":
					$preparate= "SELECT sm_idModulo,
									sm_nombreModulo
								FROM sistema_modulos;";
					break;
				default:
					break;
			}
			
			$arrayDatos = array('idModulo' => $modulo);
			$lista = $this->traerResultado($preparate,$arrayDatos);
			return $lista;
		}
		
		
		public function listaSelect(){
			/*
			 * Este metodo statico se encarga de imprimir en pantalla los campos de un select 
			 * para que el usuario puede elegir una opcion.
			 * */		
			$preparate = "SELECT	sm_idModulo,
							sm_nombreModulo
						FROM sistema_modulos
						WHERE sm_idEstado = 2";
			$arrayDatos = array('idModulo' => "");
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			return $lista;
		}
		
		
		public function obtenerTotalModulos(){
		
			$preparate = "SELECT count(sm_idModulo) FROM sistema_modulos;";
			$arrayDatos = array('idSistema' => '');
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$respuesta = $listaPdo['registros'];
			$retorno = $respuesta[0][0];
			return $retorno;
		}

			
	}

	
?>
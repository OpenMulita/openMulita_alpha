<?php

	require_once("modulos/sistema/PHP/modelos/sistema_gestiones_modelo.php");

	class sistema_gestiones_dao extends sistema_gestiones_modelo{

		// Es el nombre del modulo
		protected $nombreModulo;
		// Es el parametro que identifica al modulo
		protected $parametroModulo;
		
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargarGestion($idGestion){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$preparate= "SELECT sg.*,sm.sm_nombreModulo,sm.sm_parametroModulo,se.se_nombreEstado FROM sistema_gestiones sg
							INNER JOIN sistema_estados se on se.se_idEstado = sg.sg_idEstado
							INNER JOIN sistema_modulos sm on sm.sm_idModulo = sg.sg_idModulo
						WHERE sg.sg_idGestion = :idGestion";
			$arrayDatos = array('idGestion' => $idGestion);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idGestion = $resultado['sg_idGestion'];
				$this->nombreGestion = $resultado['sg_nombreGestion'];
				$this->idModulo = $resultado['sg_idModulo'];
				$this->parametro = $resultado['sg_parametroGestion'];				
				$this->descripcion = $resultado['sg_descripcionGestion'];					
				$this->idEstado = $resultado['sg_idEstado'];				
				$this->motivo = $resultado['sg_motivoGestion'];				
				$this->nombreModulo = $resultado['sm_nombreModulo'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->parametroModulo = $resultado['sm_parametroModulo'];
			}
		}
		
		
		public function cargarHistorial($idHistorial){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$preparate = "SELECT 	sgh_idGestionHistorial,
							ste_nombreTipoEdicion,
							su_nombreUsuario,
							DATE_FORMAT(sgh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') as fechaEdicion,
							sgh_idModulo,
							sm_nombreModulo,
                            sgh_idGestion,
							sg_nombreGestion,                            
							sgh_parametroGestion,
							sgh_descripcionGestion,
							sgh_idEstado,
							se_nombreEstado,
							sgh_motivoGestion
						FROM sistema_gestiones_historial
						INNER JOIN sistema_estados ON se_idEstado = sgh_idEstado
                        INNER JOIN sistema_modulos ON sm_idModulo = sgh_idModulo
						INNER JOIN sistema_gestiones ON sg_idGestion = sgh_idGestion						
                        INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = sgh_idTipoEdicion
						INNER JOIN sistema_usuarios ON su_idUsuario = sgh_idUsuarioEdito
						WHERE sgh_idGestionHistorial = :idHistorial;
			";
			$arrayDatos = array('idHistorial' => $idHistorial);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idHistorial = $resultado['sgh_idGestionHistorial'];
				$this->nombreTipoEdicion = $resultado['ste_nombreTipoEdicion'];
				$this->fechaEdicion = $resultado['fechaEdicion'];
				$this->nombreUsuario = $resultado['su_nombreUsuario'];
				$this->idGestion = $resultado['sgh_idGestion'];
				$this->nombreGestion = $resultado['sg_nombreGestion'];
				$this->idModulo = $resultado['sgh_idModulo'];
				$this->nombreModulo = $resultado['sm_nombreModulo'];
				$this->parametro = $resultado['sgh_parametroGestion'];
				$this->descripcion = $resultado['sgh_descripcionGestion'];
				$this->idEstado = $resultado['sgh_idEstado'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->motivo = $resultado['sgh_motivoGestion'];
				
			}
		}
		

//*************************************************************************************************************************************************//
//*************************************************/  Devolvemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerNombreModulo(){
			return $this->nombreModulo;
		}
		public function obtenerParametroModulo(){
			return $this->parametroModulo;
		}
		
//*************************************************************************************************************************************************//
//**********************************************************/  Listas  /***************************************************************************//
//*************************************************************************************************************************************************//

		public function listas($consulta,$idGestion,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas
			 * */
			switch ($consulta){
				case "tabla":
					$preparate = "SELECT	sg_idGestion AS idRegistro,
									sg_nombreGestion AS campoUno,
									sm_nombreModulo AS campoDos,
									sg_descripcionGestion AS campoTres,
									se_nombreEstado AS campoCuatro,
									se_nombreEstado AS nombreEstado,
									sg_idEstado AS idEstado
								FROM sistema_gestiones
								INNER JOIN sistema_estados ON se_idEstado = sg_idEstado
								INNER JOIN sistema_modulos ON sm_idModulo = sg_idModulo;";
					break;
				case "tablaHistorial":
					$preparate = "SELECT sgh_idGestionHistorial AS idRegistro,
									ste_nombreTipoEdicion AS campoUno,
									DATE_FORMAT(sgh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') AS campoDos,
									su_nombreUsuario AS campoTres,
									sgh_motivoGestion AS campoCuatro,
									sgh_idEstado as idEstado
								FROM sistema_gestiones_historial
								INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = sgh_idTipoEdicion
								INNER JOIN sistema_estados ON se_idEstado = sgh_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = sgh_idUsuarioEdito
								WHERE sgh_idGestion = :idGestion";
					break;
				case "tablaAcciones":
					$preparate = "SELECT 	sa_idAccion AS idRegistro,
									sg_nombreGestion AS campoUno,
									sa_nombreAccion AS campoDos,
									sa_descripcionAccion AS campoTres,
									'' as campoCuatro,
									'' as idEstado
								FROM sistema_acciones
								INNER JOIN sistema_modulos ON sm_idModulo = sa_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sa_idGestion
								WHERE sa_idGestion = :idGestion;";
					break;
				default:
					break;
			}
			$arrayDatos = array('idGestion' => $idGestion);
			$lista = $this->traerResultado($preparate,$arrayDatos);
			return $lista;
		}
		
		public function listaSelect($idModulo){
			/*
			 * Este metodo statico se encarga de imprimir en pantalla los campos de un select
			 * para que el usuario puede elegir una opcion.
			 * */
			$preparate = "SELECT	sg_idGestion,
							sg_nombreGestion
						FROM sistema_gestiones
						WHERE sg_idEstado = 2";
			if($idModulo != 0){
				$preparate.= " AND sg_idModulo = :idModulo;";
			}
			$arrayDatos = array('idModulo' => $idModulo);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			return $lista;
		}
		
	
		
		public function obtenerTotalGestiones(){
			
			$preparate = "SELECT count(sg_idGestion) FROM sistema_gestiones;";
			$arrayDatos = array('idSistema' => '');
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$respuesta = $listaPdo['registros'];
			$retorno = $respuesta[0][0];
			return $retorno;
		}
		
		
			
	}

	
?>
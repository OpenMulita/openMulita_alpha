<?php
	/*Creada por Damian Delgado
	 * 
	 * Esta clase se encarga de administrar los movimientos de la base de las usuarios 
	 * 
	 * 
	 */
	require_once("modulos/sistema/PHP/modelos/sistema_usuariosCategorias_modelo.php");	

	//Cargamos el objeto
	class sistema_usuariosCategorias_dao extends sistema_usuariosCategorias_modelo{
		
		
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
	
		
		//Cargamos el usuario
		public function cargar($idCategoria){
			
			$preparate = "SELECT	suc_idUsuarioCategoria, 
							suc_nombreUsuarioCategoria, 
							suc_descripcionUsuarioCategoria, 
							se_nombreEstado, 
							suc_idEstado, 
							suc_motivoUsuarioCategoria
						FROM sistema_usuarios_categorias 
						INNER JOIN sistema_estados ON se_idEstado = suc_idEstado
					WHERE suc_idUsuarioCategoria= :idCategoria ";			
			$arrayDatos = array('idCategoria' => $idCategoria);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idCategoria = $resultado['suc_idUsuarioCategoria'];
				$this->nombre = $resultado['suc_nombreUsuarioCategoria'];
				$this->descripcion = $resultado['suc_descripcionUsuarioCategoria'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->idEstado = $resultado['suc_idEstado'];
				$this->motivo = $resultado['suc_motivoUsuarioCategoria'];
			}			
		}		

		
		public function cargarHistorial($idHistorial){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$preparate= "SELECT 	such_idUsuariosCategoriasHistorial,
							ste_nombreTipoEdicion,
							su_nombreUsuario,
							DATE_FORMAT(such_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') AS fechaEdicion,
							such_idUsuarioCategoria,
							such_nombreUsuarioCategoria,
							such_descripcionUsuarioCategoria,
							such_idEstado,
							se_nombreEstado,
							such_motivoUsuarioCategoria
						FROM sistema_usuarios_categorias_historial
						INNER JOIN sistema_estados ON se_idEstado = such_idEstado
						INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = such_idTipoEdicion
						INNER JOIN sistema_usuarios ON su_idUsuario = such_idUsuarioEdito                        
						WHERE such_idUsuariosCategoriasHistorial = :idHistorial;
			";
			$arrayDatos = array('idHistorial' => $idHistorial);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idHistorial = $resultado['such_idUsuariosCategoriasHistorial'];
				$this->nombreTipoEdicion = $resultado['ste_nombreTipoEdicion'];
				$this->fechaEdicion = $resultado['fechaEdicion'];
				$this->nombreUsuario = $resultado['su_nombreUsuario'];
				$this->idCategoria = $resultado['such_idUsuarioCategoria'];
				$this->nombre = $resultado['such_nombreUsuarioCategoria'];				
				$this->descripcion = $resultado['such_descripcionUsuarioCategoria'];
				$this->idEstado = $resultado['such_idEstado'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->motivo = $resultado['such_motivoUsuarioCategoria'];
			}
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
		
		
		
//*************************************************************************************************************************************************//
//**********************************************************/  Listas  /***************************************************************************//
//*************************************************************************************************************************************************//


		public function listaSelect(){
				 
			$preparate = "SELECT	suc_idUsuarioCategoria,
							suc_nombreUsuarioCategoria
						FROM sistema_usuarios_categorias
						WHERE suc_idEstado in (2,5)
						ORDER BY suc_nombreUsuarioCategoria";			
			$arrayDatos = array('idUsuario' => "");
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			return  $lista;
		}
		
		
		public function listas($consulta,$idCategoria,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas
			 * */
			switch ($consulta){
				case "tabla":
					$preparate = "SELECT suc_idUsuarioCategoria AS idRegistro, 
									suc_nombreUsuarioCategoria AS campoUno, 
									suc_descripcionUsuarioCategoria AS campoDos,
									suc_motivoUsuarioCategoria AS campoTres,
									se_nombreEstado AS campoCuatro, 
									suc_idEstado as idEstado 
								FROM sistema_usuarios_categorias suc
								INNER JOIN sistema_estados se ON se_idEstado = suc_idEstado;";
					break;
				case "tablaHistorial":
					$preparate = "SELECT	such_idUsuariosCategoriasHistorial AS idRegistro,
									ste_nombreTipoEdicion AS campoUno,
									DATE_FORMAT(such_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') AS campoDos,
									su_nombreUsuario AS campoTres,
									such_motivoUsuarioCategoria AS campoCuatro
								FROM sistema_usuarios_categorias_historial
								INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = such_idTipoEdicion
								INNER JOIN sistema_estados ON se_idEstado = such_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = such_idUsuarioEdito
								WHERE such_idUsuarioCategoria = :idCategoria;";
					break;
				case "tablaAsociacionUsuarios":
					$preparate = "SELECT 	suac_idUsuarioAsociacionCategoria as idRegistro,
									suc_nombreUsuarioCategoria as campoUno,
									su_nombreUsuario as campoDos,
									suac_motivoAsociacion as campoTres,
									se_nombreEstado as campoCuatro,
									suac_idEstado as idEstado
								FROM sistema_usuarios_asociacion_categorias
								INNER JOIN sistema_estados ON se_idEstado = suac_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = suac_idUsuario
								INNER JOIN sistema_usuarios_categorias ON suc_idUsuarioCategoria = suac_idUsuarioCategoria
								WHERE suac_idUsuarioCategoria = :idCategoria";
					break;
					
				case "tablaPermisos":
					$preparate = " SELECT sucp_idPermisoCategoria as idRegistro,
									sm_nombreModulo as campoUno,
									sg_nombreGestion as campoDos,
									sa_nombreAccion as campoTres,
									se_nombreEstado as campoCuatro,
									sucp_idEstado as idEstado
								FROM sistema_usuarios_categorias_permisos
								INNER JOIN sistema_usuarios_categorias ON suc_idUsuarioCategoria = sucp_idUsuarioCategoria
								INNER JOIN sistema_estados ON se_idEstado = sucp_idEstado
								INNER JOIN sistema_modulos ON sm_idModulo = sucp_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sucp_idGestion
								INNER JOIN sistema_acciones ON sa_idAccion = sucp_idAccion
								WHERE sucp_idUsuarioCategoria = :idCategoria;";
					break;
					
					
				default:
					break;
			}
			$arrayDatos = array('idCategoria' => $idCategoria);
			$lista = $this->traerResultado($preparate,$arrayDatos);
			return $lista;
			
		}

}

?>		
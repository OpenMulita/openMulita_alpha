<?php
	/*Creada por Damian Delgado
	 * 
	 * Esta clase se encarga de administrar los movimientos de la base de las usuarios 
	 * 
	 */
	require_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");		
	//Cargamos el objeto
	
	class sistema_tablaDinamica_dao extends sistema_sistema_modelo{
	
		public function listas($consulta,$valor,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas
			 * */
			$tabla = "tabla_dinamica";
			switch ($consulta){
				case "modulosListar":
					$sql = "SELECT sm_idModulo as idRegistro,
									sm_nombreModulo as campoUno,
									sm_descripcionModulo as campoDos,
									sm_parametroModulo as campoTres,
									se_nombreEstado as nombreEstado,
									sm_idEstado as idEstado
								FROM sistema_modulos
								INNER JOIN sistema_estados ON se_idEstado = sm_idEstado;";
					break;
				case "gestionesListar":
					$sql = "SELECT sg_idGestion as idRegistro,
								sg_nombreGestion as campoUno,
								sm_nombreModulo as campoDos,
								sg_descripcionGestion as campoTres,
								se_nombreEstado as nombreEstado,
								sg_idEstado as idEstado
							FROM sistema_gestiones
							INNER JOIN sistema_estados ON se_idEstado = sg_idEstado
							INNER JOIN sistema_modulos ON sm_idModulo = sg_idModulo;";
					break;
				case "accionesListar":
					$sql = "SELECT 	sa_idAccion as idRegistro,
									sm_nombreModulo as campoUno,
									sg_nombreGestion as campoDos,
									sa_nombreAccion as campoTres,
									sa_descripcionAccion as nombreEstado,
									'' as idEstado
								FROM sistema_acciones
								INNER JOIN sistema_modulos ON sm_idModulo = sa_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sa_idGestion;";
					break;
				case "usuariosListar":
					$sql = "SELECT su_idUsuario as idRegistro, 
									su_nombreUsuario as campoUno, 
									su_descripcionUsuario as campoDos,
									su_motivoUsuario as campoTres,
									se_nombreEstado as nombreEstado, 
									su_idEstado as idEstado
								FROM sistema_usuarios 
								INNER JOIN sistema_estados ON se_idEstado = su_idEstado
								WHERE su_idUsuario !=1;";
					break;
				case "usuariosCategoriasListar":
					$sql = "SELECT suc_idUsuarioCategoria as idRegistro, 
									suc_nombreUsuarioCategoria as campoUno, 
									suc_descripcionUsuarioCategoria as campoDos,
									suc_motivoUsuarioCategoria as campoTres,
									se_nombreEstado as nombreEstado, 
									suc_idEstado as idEstado 
								FROM sistema_usuarios_categorias suc
								INNER JOIN sistema_estados se ON se_idEstado = suc_idEstado";
					break;

			}
			$lista = $this->traerResultado($sql);
			return $lista;
			
		}	
	
		
		public function listarHistorial($consulta,$valor,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas
			 * */
			$tabla = "tabla_dinamica";
			switch ($consulta){
				case "moduloFicha":
				case "moduloFichaHistorial":
					$sql = "SELECT smh_idModuloHistorial as idRegistro,
									ste_nombreTipoEdicion as campoUno,
                                    DATE_FORMAT(smh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') as campoDos,
									su_nombreUsuario as campoTres,
									smh_motivoModulo as motivo
								FROM sistema_modulos_historial
                                INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = smh_idTipoEdicion
								INNER JOIN sistema_estados ON se_idEstado = smh_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = smh_idUsuarioEdito
								WHERE smh_idModulo = $valor;		
						";
					break;
				case "gestionFicha":
				case "gestionFichaHistorial":
					$sql = "SELECT sgh_idGestionHistorial as idRegistro,
									ste_nombreTipoEdicion as campoUno,
									DATE_FORMAT(sgh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') as campoDos,
									su_nombreUsuario as campoTres,
									sgh_motivoGestion as motivo
								FROM sistema_gestiones_historial
								INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = sgh_idTipoEdicion
								INNER JOIN sistema_estados ON se_idEstado = sgh_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = sgh_idUsuarioEdito
								WHERE sgh_idGestion = $valor;
						";
					break;
				case "usuarioFicha":
				case "usuariosModificar":
					$sql = "SELECT	suh_idUsuarioHistorial as idRegistro,
									ste_nombreTipoEdicion as campoUno,
									DATE_FORMAT(suh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') as campoDos,
									su_nombreUsuario as campoTres,
									suh_motivoUsuario as motivo
								FROM sistema_usuarios_historial
								INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = suh_idTipoEdicion
								INNER JOIN sistema_estados ON se_idEstado = suh_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = suh_idUsuarioEdito
								WHERE suh_idUsuario = $valor;
						";
						break;
				case "usuariosCategoriasModificar":
				case "usuariosCategoriasFicha":
					$sql = "SELECT	such_idUsuariosCategoriasHistorial as idRegistro,
									ste_nombreTipoEdicion as campoUno,
									DATE_FORMAT(such_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') as campoDos,
									su_nombreUsuario as campoTres,
									such_motivoUsuarioCategoria as motivo
								FROM sistema_usuarios_categorias_historial
								INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = such_idTipoEdicion
								INNER JOIN sistema_estados ON se_idEstado = such_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = such_idUsuarioEdito
								WHERE such_idUsuarioCategoria = $valor;
							";
							break;
			}
			$lista = $this->traerResultado($sql);
			return $lista;
				
		}
		
		
		public function listasAux($consulta,$valor,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas
			 * */
			$tabla = "tabla_dinamica";
			switch ($consulta){
				case "gestionesModulo":
					$sql = "SELECT 	sg_idGestion as idRegistro,
									sg_nombreGestion as campoUno,
									sg_descripcionGestion campoDos,
									sg_motivoGestion as campoTres,
									se_nombreEstado as campoCuatro,
									sg_idEstado as idEstado
								FROM sistema_gestiones
								INNER JOIN sistema_estados ON se_idEstado = sg_idEstado
								WHERE sg_idModulo = $valor;
					";
					break;
				case "accionesModulo":
					$sql = "SELECT 	sa_idAccion as idRegistro,
									sg_nombreGestion as campoUno,
									sa_nombreAccion as campoDos,
									sa_descripcionAccion as campoTres,
									'' as campoCuatro,
			                        '' as idEstado
								FROM sistema_acciones 
								INNER JOIN sistema_modulos ON sm_idModulo = sa_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sa_idGestion
								WHERE sa_idModulo = $valor;
					";
					break;
				case "accionesGestiones":
					$sql = "SELECT 	sa_idAccion as idRegistro,
									sg_nombreGestion as campoUno,
									sa_nombreAccion as campoDos,
									sa_descripcionAccion as campoTres,
									'' as campoCuatro,
									'' as idEstado
								FROM sistema_acciones
								INNER JOIN sistema_modulos ON sm_idModulo = sa_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sa_idGestion
								WHERE sa_idGestion = $valor;
					";
					break;							
				case "asociacionUsuarioCategorias":
					$sql = "SELECT 	suac_idUsuarioAsociacionCategoria as idRegistro,
									suc_nombreUsuarioCategoria as campoUno, 
									su_nombreUsuario as campoDos,
									suac_motivoAsociacion as campoTres,
									se_nombreEstado as campoCuatro, 
									suac_idEstado as idEstado
								FROM sistema_usuarios_asociacion_categorias 
								INNER JOIN sistema_estados ON se_idEstado = suac_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = suac_idUsuario
								INNER JOIN sistema_usuarios_categorias ON suc_idUsuarioCategoria = suac_idUsuarioCategoria
								WHERE suac_idUsuario = $valor;
					";
					break;
				case "usuarioPermisos":
					$sql = "SELECT 	sup_idPermisoUsuario  as idRegistro,
									sm_nombreModulo as campoUno,
									sg_nombreGestion as campoDos,
									sa_nombreAccion as campoTres, 
									se_nombreEstado as campoCuatro, 
									sup_idEstado as idEstado	
								FROM sistema_usuarios_permisos 
								INNER JOIN sistema_usuarios ON su_idUsuario=sup_idUsuario
								INNER JOIN sistema_modulos ON sm_idModulo=sup_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion=sup_idGestion
								INNER JOIN sistema_acciones ON sa_idAccion=sup_idAccion
								INNER JOIN sistema_estados ON se_idEstado=sup_idEstado
								WHERE sup_idUsuario=$valor";
					break;
				case "asociacionCategoriaUsuarios":					
					$sql = "SELECT 	suac_idUsuarioAsociacionCategoria as idRegistro,
									suc_nombreUsuarioCategoria as campoUno,
									su_nombreUsuario as campoDos,
									suac_motivoAsociacion as campoTres,
									se_nombreEstado as campoCuatro,
									suac_idEstado as idEstado
								FROM sistema_usuarios_asociacion_categorias
								INNER JOIN sistema_estados ON se_idEstado = suac_idEstado
								INNER JOIN sistema_usuarios ON su_idUsuario = suac_idUsuario
								INNER JOIN sistema_usuarios_categorias ON suc_idUsuarioCategoria = suac_idUsuarioCategoria
								WHERE suac_idUsuarioCategoria = $valor;
						";
					break;
				case "permisosCategoriaUsuarios":
					$sql = " SELECT sucp_idPermisoCategoria as idRegistro,
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
								WHERE sucp_idUsuarioCategoria = $valor;
					";
					break;
			}
			$lista = $this->traerResultado($sql);
			return $lista;
		
		}
		
		public function tablasIdioma($modulos,$gestion,$tabla,$idioma){
			
			$xmlform = simplexml_load_file('modulos/'.$modulos.'/XML/tablas/sistema_tablaDinamica.xml');
			$xpath = "//".$modulos."/".$gestion."/tablas[@idioma='$idioma']/".$tabla."";
			$xmlTabla = $xmlform->xpath($xpath)[0];
			return $xmlTabla;
		
		}
		
		public function tablasIdiomaHistorial($modulos,$gestion,$formulario,$idioma){
			
			$xmlform = simplexml_load_file('modulos/'.$modulos.'/XML/tablas/sistema_tablaDinamicaHistorial.xml');
			$xpath = "//".$modulos."/".$gestion."/tablas[@idioma='$idioma']/".$formulario."";
			$xmlTabla = $xmlform->xpath($xpath)[0];
			return $xmlTabla;
		
		}
		
		public function tablasIdiomaAux($modulos,$gestion,$formulario,$idioma){
				
			$xmlform = simplexml_load_file('modulos/'.$modulos.'/XML/tablas/sistema_tablaDinamicaAux.xml');
			$xpath = "//".$modulos."/".$gestion."/tablas[@idioma='$idioma']/".$formulario."";
			$xmlTabla = $xmlform->xpath($xpath)[0];
			return $xmlTabla;
		
		}
		
		
	}
?>		
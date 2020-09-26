<?php
	/*Creada por Damian Delgado
	 * 
	 * Esta clase se encarga de administrar los movimientos de la base de las usuarios 
	 * 
	 * 
	 */
	require_once("modulos/sistema/PHP/modelos/sistema_usuariosTransacciones_modelo.php");		
	//Cargamos el objeto
	class sistema_usuariosTransacciones_dao extends sistema_usuariosTransacciones_modelo{
		

		
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		//Cargamos el usuario
		public function cargar($idUsuario){
	
		}		
		
		
		public function cargarHistorial($idHistorial){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
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

		
	
		public function listas($consulta,$valor,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas
			 * */
			$tabla = "sistema_usuarios_transacciones";
			switch ($consulta){
				case "tabla":
					$preparate = "SELECT	sut_idTransaccionUsuario as idRegistro,								
									su_nombreUsuario as campoUno,
									sm_nombreModulo as campoDos,
									sg_nombreGestion as campoTres,
									sa_nombreAccion as campoCuatro,
									se_nombreEstado as campoCinco,
									sut_idEstado as idEstado,
									sut_detalle as detalle
								FROM sistema_usuarios_transaccion
								INNER JOIN sistema_modulos ON sm_idModulo = sut_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sut_idGestion
								INNER JOIN sistema_acciones ON sa_idAccion = sut_idAccion
								INNER JOIN sistema_usuarios ON su_idUsuario = sut_idUsuario
								INNER JOIN sistema_estados ON se_idEstado = sut_idEstado;";
					break;
				case "usuarioFicha":
				case "usuariosModificar":
				case "perfilFicha":					
					$preparate = "SELECT	sut_idTransaccionUsuario as idRegistro,
									su_nombreUsuario as campoUno,
									sm_nombreModulo as campoDos,
									sg_nombreGestion as campoTres,
									sa_nombreAccion as campoCuatro,
									se_nombreEstado as nombreEstado,
									sut_idEstado as idEstado,
									sut_detalle as detalle
								FROM sistema_usuarios_transaccion
								INNER JOIN sistema_modulos ON sm_idModulo = sut_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sut_idGestion
								INNER JOIN sistema_acciones ON sa_idAccion = sut_idAccion
								INNER JOIN sistema_usuarios ON su_idUsuario = sut_idUsuario
								INNER JOIN sistema_estados ON se_idEstado = sut_idEstado
								WHERE sut_idUsuario = $valor;";
						break;
			}
			$arrayDatos = array('idModulo' => '');
			$lista = $this->traerResultado($preparate,$arrayDatos);
			return $lista;
		
		}
	
	}
?>		
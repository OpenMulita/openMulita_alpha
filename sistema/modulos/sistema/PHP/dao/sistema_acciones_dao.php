<?php

	require_once("modulos/sistema/PHP/modelos/sistema_acciones_modelo.php");

	class sistema_acciones_dao extends sistema_acciones_modelo{

		

		
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//

//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//
		
		
//*************************************************************************************************************************************************//
//**********************************************************/  Listas  /***************************************************************************//
//*************************************************************************************************************************************************//
		
		public function listas($consulta,$accion,$limite){
			/*
			 * Este metodo se encarga de devolver una matriz para recorrer con un fetch_assoc()
			 * es mayormente usado para los listados y las tablas
			 * */
			switch ($consulta){
				case "tabla":
					$preparate = "SELECT	sa_idAccion AS idRegistro,
									sa_nombreAccion AS campoUno,
									sm_nombreModulo AS campoDos,
									sg_nombreGestion AS campoTres,
									sa_descripcionAccion AS campoCuatro,
									'' AS idEstado
								FROM sistema_acciones
								INNER JOIN sistema_modulos ON sm_idModulo = sa_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sa_idGestion
                                ";
					break;
				default:
					break;
			}
			$arrayDatos = array('idAccion' => $accion);
			$lista = $this->traerResultado($preparate,$arrayDatos);
			return $lista;
		}
		
		public function listaSelect($idGestion){
			/*
			 * Este metodo statico se encarga de imprimir en pantalla los campos de un select
			 * para que el usuario puede elegir una opcion.
			 * */
			$preparate = "SELECT	sa_idAccion,
							sa_nombreAccion
						FROM sistema_acciones";
			if($idGestion!= 0){
				$preparate.= " WHERE sa_idGestion = :idGestion;";
			}
			$arrayDatos = array('idGestion' => $idGestion);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			return $lista;
		}
		
		public function obtenerTotalAcciones(){
			
			$preparate = "SELECT count(sa_idAccion) FROM sistema_acciones;";
			$arrayDatos = array('idSistema' => '');
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$respuesta = $listaPdo['registros'];
			$retorno = $respuesta[0][0];
			return $retorno;
		}
		
	}

	
?>
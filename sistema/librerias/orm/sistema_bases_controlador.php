<?php
	
	require_once("librerias/orm/sistema_bases_pdoMysql_modelo.php");
	
	class sistema_bases_controlador{
		
		// es el motor de base de datos a utilizar
		protected $motor;
		// Es el servidor donde se va a ejecutar las consuta
		protected $servidor;
		// Es la preparacion de la consulta
		protected $preparate;
		// Son los parametros de la execucion	
		protected $arrayExecucion;
		// Es el usuario que va a realizar las consulta
		protected  $idUsuario;
		
		
		
		public function constructor($motor=null,$servidor=null,$preparate=null,$execucion,$idUsuario=null){
						
			$this->motor = $motor;
			$this->servidor = $servidor;
			$this->preparate = $preparate;
			$this->arrayExecucion = $execucion;
			$this->idUsuario = $idUsuario;
			
		}


//*************************************************************************************************************************************************//
//******************************************************/  Listas Directas  /**********************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerListas(){
				
			switch ($this->motor){
				case "mysqlpdo":
					$respuesta = $this->obtenerRegistrosMysqlPDO();
					break;
				default:
					return 2;
					break;
			}
			return $respuesta;
		}	
		
		protected function obtenerRegistrosMysqlPDO(){
			
			$objBase = new sistema_bases_pdoMysql_modelo();
			$objBase->executarSelectPDO($this->servidor,$this->preparate,$this->arrayExecucion,$this->idUsuario);
			$retrono = array(
					'registros' => $objBase->obtenerListaRegistros(),
					'totalRegistros' => $objBase->obtenerTotalRegistros()
			);
			return $retrono;
			
		}
		
//*************************************************************************************************************************************************//
//******************************************************/  Funciones  /****************************************************************************//
//*************************************************************************************************************************************************//
		
		 function ejecutarFunction(){
				
			switch ($this->motor){
				case "mysqlpdo":
					$respuesta = $this->fuctionMysqlPDO();
					break;
				case "postgres":
					break;
				default:
					return "FALLIDO NO HAY MOTOR SELECCIONADO";
					break;
			}
			return $respuesta;
		}
		
		protected function fuctionMysqlPDO(){
		
			$objBase = new sistema_bases_pdoMysql_modelo();
			//echo($this->preparate);
			//print_r($this->arrayExecucion);
			//echo("<br><br>");
			
			$objBase->executarFuncionPDO($this->servidor,$this->preparate,$this->arrayExecucion,$this->idUsuario);
			$respuesta = $objBase->obtenerRespuesta();
			return $respuesta;
				
		}
		
		
		
		
	}

?>
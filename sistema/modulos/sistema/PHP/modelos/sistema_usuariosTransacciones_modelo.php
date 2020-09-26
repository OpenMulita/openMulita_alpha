<?php
	/*Creada por Damian Delgado
	 * 
	 * Esta clase se encarga de administrar los movimientos de la base de las usuarios 
	 * 
	 */
	require_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");

	class sistema_usuariosTransacciones_modelo extends sistema_sistema_modelo{
		
		
		// Es el identificador de la transaccion que realizo el usuario
		protected $idTransaccion;
		//Es un codigo generado para eviatar que se repita la transaccion
		protected $codigo;
		//Es el identificador de el usuario que realizoa la transaccion
		protected $idUsuario;
		// ES el identificador de modulo donde se realizao la trnasaccion
		protected $idModulo;
		// Es el identificador de la gestion que se realizo la trnasaccion
		protected $idGestion;
		// Es el tipo de transaccion que se intento haccer que esta relacionadad con la accion de el sistema
		protected $idAccion;
		//Imagen de avatar 
		protected $idRegistros;
		// Codigo de la respuesta del accion
		protected  $codigoRespuesta;
		//estado en que se encuentra el usuarios (por el momento solo se encuentra 2 estado "Activo" o "Inactivo")
		protected $idEstado;
		//Motivo por que se realizo el cambio
		protected $detalle;
		
		//Contructor de la clase donde cargan las variables
		public function constructor($idUsuario,$idTransaccion=null,$idRegistros=null){	
			
			$this->idTransaccion = $idTransaccion;
			$this->idUsuario = $idUsuario;
			$this->idRegistros = $idRegistros;
			$this->sisUsuarios = $idUsuario;
			$this->modelo = "modelo_usuariosTransacciones";
				
		}
		
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
		
		//Cargamos el usuario
		public function cargar($idUsuario){
		
		}		

//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//
		
		public function obtenerIDTransaccion(){
			return $this->idTransaccion;
		}		
		public function obtenerIDModulo(){				
			return $this->idModulo;	
		}
		public function obtenerIDGestion(){
			return $this->idGestion;
		}
		public function obtenerIDAccion(){
			return $this->idAccion;
		}
		public function obtenerIDRegistro(){
			return $this->idRegistros;
		}
		public function obtenerIDEstado(){				
			return $this->idEstado;	
		}
		public function obtenerMotivo(){
			return $this->motivo;
		}
		
		
//*************************************************************************************************************************************************//
//**********************************************************/  Acciones  /*************************************************************************//
//*************************************************************************************************************************************************//

		// Metodo para Ingresar el usuario por primera ves 
		
		private function cargarParametros($parModulo,$parGestion,$parAccion){
		
			$preparate = "SELECT 	sa_idModulo,
									sa_idGestion,
									sa_idAccion 
								FROM sistema_acciones 
								INNER JOIN sistema_modulos ON sm_idModulo = sa_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sa_idGestion
								WHERE sm_parametroModulo = :parModulo
								AND sg_parametroGestion = :parGestion
								AND sa_parametroAccion = :parAccion; ";
			$arrayDatos = array('parModulo' => $parModulo,
					'parGestion' => $parGestion,
					'parAccion' => $parAccion
			);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idModulo = $resultado['sa_idModulo'];
				$this->idGestion = $resultado['sa_idGestion'];
				$this->idAccion = $resultado['sa_idAccion'];
			};			
		}
		
		
		
		public function ingresarTransaccion($parModulo,$parGestion,$parAccion,$codigoTransaccion){
			
			$retorno = 0;
			$this->cargarParametros($parModulo, $parGestion, $parAccion);
			$this->idEstado = 11;
			$this->detalle = 'No se continuo con el proceso';
			$this->codigo = $codigoTransaccion;
			
			$preparateCodigo = "SELECT stu_codigoTransaccion FROM sistema_usuarios_transaccion
									WHERE  stu_codigoTransaccion = :codigo;";	 
			$arrayDatos = array('codigo' => $this->codigo);
			$resultado = $this->traerResultado($preparateCodigo,$arrayDatos);
			
			if($resultado['totalRegistros'] == 0){
				$preparate = "SELECT fun_sistema_usuarios_transaccion_ingresar( :idUsuario, :codigo, :idModulo, :idGestion, :idAccion, :idRegistros, :idEstado, :detalle) AS funcion_retorno;";
				//echo("$sql");
				$arrayDatos = array('idUsuario' => $this->idUsuario,
						'codigo' => $this->codigo,
						'idModulo' => $this->idModulo,
						'idGestion' => $this->idGestion,
						'idAccion' => $this->idAccion,
						'idRegistros' =>  $this->idRegistros,
						'idEstado' => $this->idEstado,
						'detalle' => $this->detalle);
				$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			
			}else{
				$retorno = "1009";
			}
			return $retorno;
			
		} 
		
		public function generarCodigo(){
			
			for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 32; $x = rand(0,$z), $s .= $a{$x}, $i++);
			$codigo = $s;
			return $codigo;
			
		}
		
		
		public function inicarProceso($idTransaccion){
			
			$this->idTransaccion = $idTransaccion;
			$this->detalle = '';			
			$this->idEstado = 12;			
			$retorno = $this->cambioEstado($this->idEstado);
			return $retorno;
				
		}
		
		public function finalizarTransaccion($codTransaccion,$detalle,$codigoRespuesta){
				
			$this->codigo = $codTransaccion;
			$this->detalle = $detalle;
			$this->idEstado = 14;
			$this->codigoRespuesta = $codigoRespuesta;
			$retorno = $this->cambioEstado($this->idEstado);
			return $retorno;
		
		}
		
		// Metodo que se encarga de cambiar los estados del usuario
		public function cambioEstado($idEstado){
			
			$this->idEstado = $idEstado;
			$retorno = 0;
			$preparate = "SELECT fun_sistema_usuarios_transaccion_cambioEstado( :codTransaccion, :codigoRespuesta, :idEstado, :detalle) AS funcion_retorno;";
			$arrayDatos = array('codTransaccion' => $this->codigo,
					'codigoRespuesta' =>  $this->codigoRespuesta,
					'idEstado' => $this->idEstado,
					'detalle' => $this->detalle);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			
			
			return $retorno;
		
		}
				
//*************************************************************************************************************************************************//
//**********************************************************/  Idiomas  /**************************************************************************//
//*************************************************************************************************************************************************//
	

	
	}
?>		
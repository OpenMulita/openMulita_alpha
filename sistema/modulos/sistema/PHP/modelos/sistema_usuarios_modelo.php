<?php
	/*Creada por Damian Delgado
	 * 
	 * Esta clase se encarga de administrar los movimientos de la base de las usuarios 
	 * 
	 */
	require_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");

	class sistema_usuarios_modelo extends sistema_sistema_modelo{
		
		//Id del usuari
		protected $idUsuario;
		//nombre dle usuario e identificador unico
		protected $nombre;
		//Direccion de correo electronico
		protected $mail;
		//Clave del usuario para ingresar sistema 
		protected $clave;
		//Imagen de avatar 
		protected $imagen;
		//ES la descripcion del usaurio
		protected $descripcion;
		//estado en que se encuentra el usuarios (por el momento solo se encuentra 2 estado "Activo" o "Inactivo")
		protected $idEstado;
		//Motivo por que se realizo el cambio
		protected $motivo;
		//Fecha que se ingreso el usuario
		protected $fechaIngreso;
		//Fecha que se Modifico  el usuario
		protected $fechaEdicion;
		// Usuario que ingro al usuario
		protected $usuarioIngreso;
		// Usuario que modifico al usuario
		protected $usuarioEdito;
//--------------------------- LOGIN-------------------------------------//
		// Identificador del login
		protected $idLogin;
		// Fecha que se realizo el login
		protected $fechaLogin;
		// hora que se realizo el login
		protected $horaLogin;
		// el tipo de login que se realizo
		protected $tipoLogin;
		
//*************************************************************************************************************************************************//
//***************************************************************/  CONSTRUCTOR  /*****************************************************************//
//*************************************************************************************************************************************************//
		
		
		//Contructor de la clase donde cargan las variables
		public function constructor($usuario,$idUsuario=null){	
			
			$this->idUsuario = $usuario['idRegistro'];
			$this->nombre = $usuario['nombre'];
			$this->mail = $usuario['mail'];
			$this->clave = $usuario['clave'];
			$this->descripcion = $usuario['descripcion'];
			$this->idEstado = $usuario['idEstado'];
			$this->motivo = $usuario['motivo'];	
			$this->imagen = $usuario['imagen'];
			$this->sisUsuarios = $idUsuario;
			$this->modelo = "sistema_usuarios";
			$this->idLogin = $usuario['idLogin'];
			$this->fechaLogin = $usuario['fechaLogin'];
			$this->horaLogin = $usuario['horaLogin'];
			$this->tipoLogin = $usuario['tipoLogin'];
		}
		
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
		
		//Cargamos el usuario
		public function cargar($idUsuario){
		
			$preparate= "SELECT * FROM sistema_usuarios WHERE su_idUsuario = :idUsuario";
			$arrayDatos = array('idUsuario' => $idUsuario);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idUsuario = $resultado['su_idUsuario'];
				$this->nombre = $resultado['su_nombreUsuario'];
				$this->mail = $resultado['su_mailUsuario'];
				$this->descripcion = $resultado['su_descripcionUsuario'];
				$this->idEstado = $resultado['su_idEstado'];
				$this->imagen = $resultado['su_imagenUsuario'];
				$this->motivo = $resultado['su_motivoUsuario'];
				$this->fechaIngreso = $resultado['su_fechaIngreso'];
				$this->fechaEdicion = $resultado['su_fechaEdicion'];
				$this->usuarioIngreso = $resultado['su_idUsuarioIngreso'];
				$this->usuarioEdito = $resultado['su_idUsuarioEdito'];
				$this->clave = $resultado['su_claveUsuario'];
			}
		}		
			
//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//
		
		public function obtenerID(){
			return $this->idUsuario;
		}		
		public function obtenerNombre(){				
			return $this->nombre;	
		}
		public function obtenerDescripcion(){
			return $this->descripcion;
		}
		public function obtenerIDEstado(){				
			return $this->idEstado;	
		}
		public function obtenerMotivo(){
			return $this->motivo;
		}
		public function obtenerFechaIngreso(){
			return $this->fechaIngreso;
		}
		public function obtenerFechaEdicion(){
			return $this->fechaEdicion;
		}
		public function obtenerUsuarioIngreso(){
			return $this->usuarioIngreso;
		}
		public function obtenerUsuarioEdito(){
			return $this->usuarioEdito;
		}
		public function obtenerImagen(){
			return $this->imagen;
		}
		public function obtenerMail(){
			return $this->mail;
		}		
		
		
//*************************************************************************************************************************************************//
//**********************************************************/  Acciones  /*************************************************************************//
//*************************************************************************************************************************************************//

		// Metodo para Ingresar el usuario por primera ves 
		public function ingresar(){
            	
			$retorno = 0;
			$clave = $this->codificacionClave($this->clave);
			$this->idEstado = 1;
			$this->idTipoEdicion = 1;
			$preparate = "SELECT fun_sistema_usuarios_ingresar(:nombre, :mail, :clave, :imagen, :descripcion, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios, 'estandar') AS funcion_retorno;";
			$arrayDatos = array('nombre' => $this->nombre,
								'mail' => $this->mail,
								'clave' => $clave,								
								'imagen' => $this->imagen,
								'descripcion' => $this->descripcion,
								'idEstado' => $this->idEstado,
								'idTipoEdicion' => $this->idTipoEdicion,
								'motivo' => $this->motivo,
								'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
            	
        } 
		

		//Metodo usado para gardar los cambio echos en el usuario excepto la clave
		public function guardar(){	
			
			$this->idTipoEdicion = 2;
			$preparate = "SELECT fun_sistema_usuarios_guardar( :idUsuario, :mail, :imagen, :descripcion, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idUsuario' => $this->idUsuario,
					'mail' => $this->mail,
					'imagen' => $this->imagen,
					'descripcion' => $this->descripcion,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
		
		}
		
		
		// Metodo que se encarga de cambiar los estados del usuario
		public function cambioEstado($estado){
			
			$this->idTipoEdicion = 3;
			$preparate = "SELECT fun_sistema_usuarios_cambioEstado ( :idUsuario, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idUsuario' => $this->idUsuario,
					'idEstado' => $estado,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
		
		}
		
		public function reseteoClave(){
			
			$retorno = 0;
			//Se le asigna una clave automaica clave1234
			$this->clave = "clave1234";
			$this->clave = $this->codificacionClave($this->clave);
			$this->idTipoEdicion = 6;
			// se ejecuta la funcion para restablecer la clave
			$preparate = "SELECT fun_sistema_usuarios_cambioClave ( :idUsuario, :clave, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idUsuario' => $this->idUsuario,
					'clave' => $this->clave,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
			
		}
		
		public function cambioClave($claves){
			/**
			 * Este metododo se encarga de cambia la clave de el usuario a traves de el perfil
			 */
			// Primero validamos si la clave anterior es igual a la actual
			$validar = $this->validacionClave($claves);
			if($validar){
				// Una ves validada se codifica la nueva clave
				$claveNueva = $this->codificacionClave($claves["nueva"]);
				// Se ejecuta la funcion(de la base) para que realice la modificacion
				$this->idTipoEdicion = 5;
				$preparate = "SELECT fun_sistema_usuarios_cambioClave ( :idUsuario, :clave, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
				$arrayDatos = array('idUsuario' => $this->idUsuario,
						'clave' => $this->clave,
						'idTipoEdicion' => $this->idTipoEdicion,
						'motivo' => $this->motivo,
						'sisUsuarios' => $this->sisUsuarios);
				$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			}else{
				$retorno = 1004;
			}
			return $retorno;
		}
		
				
//*************************************************************************************************************************************************//
//*********************************************************/  Codificacion de clave  /*************************************************************//
//*************************************************************************************************************************************************//

		protected function codificacionClave($clave){
		
			for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 32; $x = rand(0,$z), $s .= $a{$x}, $i++);
			$alg1 = substr($s, -5);
			$alg2 = substr($s, 0, -29);
			$clave = base64_encode($clave);
			$clave = md5($clave);
			$clave = $alg2."".$clave."".$alg1;
			return $clave;
			
		}		

//*************************************************************************************************************************************************//
//***********************************************************/  Validados Claves  /****************************************************************//
//*************************************************************************************************************************************************//
	
		public function validacionClave($claves){
			/**
			 * Este metodo se encarga de comprar la clave de verificacion con la que esta en la base 
			 * */
			// Se carga el usuario para traer la clave almacenada
			$this->cargar($this->sisUsuarios);
			// Se le saca caracteres sobrantes a las claves
			$claveVieja = substr($this->clave, 3, -5);
			// Se codifica la clave anterior 	
			$claveAnterior = $this->codificacionClave($claves["anteriror"]);
			// Se quita los caracteres sobrantes 
			$claveAnterior = substr($claveAnterior, 3, -5);
			// Se evaluan si las claves son identicas o no 
			if($claveVieja==$claveAnterior){
				return true;
			}else{
				return false;
			}
		}
		
		
		public function validacionClaveControler($claves){
			/**
			 * Este metodo se encarga de comprar la clave de verificacion con la que esta en la base
			 * */
			// Se le saca caracteres sobrantes a las claves
			$clavePosta = substr($this->clave, 3, -5);
			// Se codifica la clave anterior
			$claveValidacion = $this->codificacionClave($claves);
			// Se quita los caracteres sobrantes
			$claveValidacion = substr($claveValidacion, 3, -5);
			// Se evaluan si las claves son identicas o no
			if($clavePosta==$claveValidacion){
				return true;
			}else{
				return false;
			}
		}
		
		
		
		
//*************************************************************************************************************************************************//
//**********************************************************/  Login  /****************************************************************************//
//*************************************************************************************************************************************************//
		
		public function loginUsuarioIngresar(){
			
			$this->idTipoEdicion = 2;
			$this->idEstado = 2;
			
			$preparate = "SELECT fun_sistema_usuarios_login_ingresar(
							:idUsuario, :horaLogin,  :fechaLogin,  :tipoLogin, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idUsuario' => $this->idUsuario,
					'horaLogin' => $this->horaLogin,
					'fechaLogin' => $this->fechaLogin,
					'tipoLogin' => $this->tipoLogin,
					'idEstado' => $this->idEstado,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
		
			return $retorno;
			
		}
		
		public function loginUsuarioGuardar(){
			
			$this->idTipoEdicion = 2;
			
			$preparate = "SELECT fun_sistema_usuarios_login_guardar (
							:idLogin, :horaLogin,  :fechaLogin,  :tipoLogin, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idLogin' => $this->idLogin,
					'horaLogin' => $this->horaLogin,
					'fechaLogin' => $this->fechaLogin,
					'tipoLogin' => $this->tipoLogin,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);

			return $retorno;
			
		}
			
		public function loginUsuarioCambioEstado($idEstado){
			
			$this->idTipoEdicion = 3;
			$this->idEstado = $idEstado;
			$preparate = "SELECT fun_sistema_usuarios_login_cambioEstado (
							:idLogin, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idLogin' => $this->idLogin,
					'idEstado' => $this->idEstado,
					'idTipoEdicion' => $this->idTipoEdicion,
					'motivo' => $this->motivo,
					'sisUsuarios' => $this->sisUsuarios);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
			
		}
		
		public function loginUsuario(){
			/**
			 * Este metodo se encarga de validar el ingreso de usuario al sistema
 			 * 
			 * */	
			$paso = FALSE;
			$preparate = "SELECT su_idUsuario,su_nombreUsuario,su_claveUsuario FROM sistema_usuarios WHERE su_idEstado IN (1,2,5)";
			$arrayDatos = array('idUsuario' => 0);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				
				$nombre = $resultado['su_nombreUsuario'];
				$clave = $resultado['su_claveUsuario'];
				$UID = $resultado['su_idUsuario'];
				//Esta la Parte de encriptacion
				$claveEntra = $this->codificacionClave($this->clave);
				//Igualamos las claves
				$claveEntra = substr($claveEntra, 3, -5);
				$clave = substr($clave, 3, -5);
				
				$hora = date("h:i:s");
				$fecha = date("Y-m-d");
				// Valido que el nombre ingresado concuerde con uno de la base 
				if($this->nombre==$nombre){
					// Verifico que la contrase�a concuerde con el nombre
					if($claveEntra==$clave){
						
						// En caso en que usuario y contrase�a sean correctas guardo el ingreso del usuario en la base 
						// Tambien guardo en session el identificador del usuario
						$paso = TRUE;
						@session_start();
						$_SESSION['UUSER'] = $this->nombre;
						$_SESSION['UID'] = $UID;
						
						//echo("Yo paso clave -".$_SESSION['UID']."- Hay variable");
						
						$this->sisUsuarios = $UID;		
						// Verifico el ultimo movimiento que tuvo el logeo 
						$preparate = "SELECT sl_tipoLogin FROM sistema_login WHERE sl_idUsuario = $this->sisUsuarios ORDER BY sl_idLogin DESC LIMIT 1";
						$arrayDatos = array('idUsuario' => 0);
						$listaPdo = $this->traerResultado($preparate,$arrayDatos);
						$lista = $listaPdo['registros'];
						if(isset($lista[0][0])){
							$registro = $lista[0][0];
						}
						
						// Verifico si es un movimiento de descaso le agrego el retorno
						$tipoLogin = "Entrada";
						if ( isset($registro) && $registro == "Descanso" ){
							$tipoLogin = "Retorno";
						}
						
						$arrayDatos = array('idUsuario' => $this->sisUsuarios,
								'horaLogin' => $hora,
								'fechaLogin' => $fecha,
								'tipoLogin' => $tipoLogin,
								'idEstado' => 2,
								'idTipoEdicion' => 1,
								'motivo' => "Entrada al sistema por el usuario",
								'sisUsuarios' => $this->sisUsuarios);
												
					}else{
						
						// En caso que la contrase�a no concuerde guardo el login fallido
						$this->sisUsuarios = $UID;
						$arrayDatos = array('idUsuario' => $this->sisUsuarios,
								'horaLogin' => $hora,
								'fechaLogin' => $fecha,
								'tipoLogin' => "Error",
								'idEstado' => 2,
								'idTipoEdicion' => 1,
								'motivo' => "Error al loguearse por el usuario",
								'sisUsuarios' => $this->sisUsuarios);
						$errores = $this->cantidadErroresUsuarioLogin($this->sisUsuarios);	
						// Verifico si hay mas tres intentos erroneo si los hay procedo a bloquear el usuario
						if( $errores >= 3){
							
							$this->idUsuario = $UID;
							$this->motivo = "Errores en el login intento entrar mas de 3 veces con clave incorrecta";
							$this->cambioEstado(6);
							
						}
					}
					$preparate = "SELECT fun_sistema_usuarios_login_ingresar (
							:idUsuario, :horaLogin,  :fechaLogin,  :tipoLogin, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";

					$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
					
				}
				
			}
			return $paso;					
		}
		
		
		public function salidaUsuario($tipoSalida){
			/**
			 * Este metodo se encarga de validar el ingreso de usuario al sistema
			 *
			 * */
			@session_start();
			$this->sisUsuarios = $_SESSION['UID'];
			$hora = date("h:i:s");
			$fecha = date("Y-m-d");
			//echo("EL USER ID QUE SE CARGA $UID");
			$preparate = "SELECT fun_sistema_usuarios_login_ingresar (
				:idUsuario, :horaLogin,  :fechaLogin,  :tipoLogin, :idEstado, :idTipoEdicion, :motivo, :sisUsuarios) AS funcion_retorno";
			$arrayDatos = array('idUsuario' => $this->sisUsuarios,
					'horaLogin' => $hora,
					'fechaLogin' => $fecha,
					'tipoLogin' => $tipoSalida,
					'idEstado' => 2,
					'idTipoEdicion' => 1,
					'motivo' => "Salida del sistema por el usuario",
					'sisUsuarios' => $this->sisUsuarios);

			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
		}
		
		public function cantidadErroresUsuarioLogin($idUsuario){
			/*
			 * Trae la cantidad de intentos fallidos despues de la ultima entrada 
			 * exitosa al sistema
			 * */
			$preparate = "SELECT count(sl_idLogin) FROM sistema_login
							WHERE sl_idUsuario = :idUsuario
							AND sl_tipoLogin = 'Error'
							AND sl_fechaIngreso >= (
									SELECT sl_fechaIngreso FROM sistema_login
									WHERE sl_idUsuario = :idUsuarioDos
									AND sl_tipoLogin = 'Entrada'
									ORDER BY sl_fechaIngreso DESC LIMIT 1
									);";
			$arrayDatos = array('idUsuario' => $idUsuario,
								'idUsuarioDos' => $idUsuario);

			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$respuesta = $listaPdo['registros'];
			$retorno = $respuesta[0][0];
			return $retorno;
		}
	
		
	}
?>		
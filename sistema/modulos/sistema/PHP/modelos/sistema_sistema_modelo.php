<?php
	/*Creada por Damian Delgado
	 * 
	 * Es la clase padre de todas 
	 * 
	 */
	require_once("librerias/orm/sistema_bases_controlador.php");
	
	class sistema_sistema_modelo{
		
		// Es el nombre de la tabla donde se realiza el cambio 
		protected $nombreTabla;
		// Es el modelos que va a ejecutar las consulta
		protected $modelo;
		// Es el identificar de el usario que esta trabajando en el sistema
		protected $sisUsuarios;
		// Es el motivo por el cual se realizao el cambio se pone aca por que todos los modelo lo usan
		protected $motivo;
		// Son los Estado que contiene el sistema
		protected $idEstado;
		// ES el nombre de el Estado
		protected $nombreEstado;
		// Es la fecha que se Ingreso el registro
		protected $fechaIngreso;
		// Es el identificador usuario que ingreso el registro
		protected $idUsuarioIngreso;
		// Es el nombre usuario que ingreso el registro
		protected $nombreUsuarioIngreso;
		// Es la fecha que se modifico el registro 
		protected $fechaEdicion;
		//Es el nombre de el usuario que edito el registro
		protected $idUsuarioEdito;
		//Es el nombre de el usuario que edito el registro
		protected $nombreUsuarioEdito;
		//Es el identificador del tipo ediciion
		protected $idTipoEdicion;
		//Es el nombre de el usuario que edito el socio
		protected $nombreTipoEdicion;
		//ES el identiicar de el registro en el historial
		protected $idHistorial;
		
		// Estas variable es para ver el ancho que se va a utilizar en la imagen
		protected $imgAncho = 800;
		// Variable es para saber el alto que se va a utilizar en la imagen 
		protected $imgAlto = 600;
		
//*************************************************************************************************************************************************//
//*********************************************************/  CONSTRUCTOR  /***********************************************************************//
//*************************************************************************************************************************************************//
		
		
		public function constructor($datos,$idUsuario){	
			/*
			 * Este metodo se encarga de construir el objeto a utilizar
			 * */
			$this->sisUsuarios = $idUsuario;
		}
		
	
		
		public function cargarUsuarioSistema($idUsuario){
			/*
			 * Este metodo se encarga cargar el usuario de sistema en el modelo
			 * */
			$this->sisUsuarios = $idUsuario;
		}
		
//*************************************************************************************************************************************************//
//******************************************************/  RETORNAMOS VALORES  /*******************************************************************//
//*************************************************************************************************************************************************//
		
		public function obtenerSisUsuarios(){
			return $this->sisUsuarios;
		}
		public function obtenerMotivo(){
			return $this->motivo;
		}
		public function obtenerIdEstado(){
			return $this->idEstado;
		}
		public function obtenerNombreEstado(){
			return $this->nombreEstado;
		}
		public function obtenerFechaIngreso(){			
			$fechaIngreso = $this->fechaIngreso;
			$fechaIngreso= new DateTime($fechaIngreso);
			$retorno = $fechaIngreso->format('d-m-Y');
			return $retorno;
		}
		public function obtenerIdUsuarioIngreso(){
			return $this->idUsuarioIngreso;
		}
		public function obtenerNombreUsuarioIngreso(){
			return $this->nombreUsuarioIngreso;
		}
		public function obtenerFechaEdicion(){						
			$fechaEdicion = $this->fechaEdicion;
			$fechaEdicion= new DateTime($fechaEdicion);
			$retorno = $fechaEdicion->format('d-m-Y');
			return $retorno;			
		}
		public function obtenerIdUsuarioEdito(){
			return $this->idUsuarioEdito;
		}
		public function obtenerNombreUsuarioEdito(){
			return $this->nombreUsuarioEdito;
		}
		public function obtenerIdTipoEdicion(){
			return $this->idTipoEdicion;
		}		
		public function obtenerNombreTipoEdicion(){
			return $this->nombreTipoEdicion;
		}
		public function obtenerIdHistorial(){
			return $this->idHistorial;
		}


//*************************************************************************************************************************************************//
//***********************************************************/  ACCIONES  /************************************************************************//
//*************************************************************************************************************************************************//
				
		public function cargar($idSistema){
			/*
			 * Este metodo se encarga de cargar datos de un registro teniedo el id de el mismo
			 * */
		}		
	
		public function ingresar(){
			/*
			 * Este metodo se encarga de relizar el ingreso los datos en la base
			 * */
		} 
		
		public function guardar(){
			/*
			 * Este metodo se encarga de guardar los cambios en base de datos 
			 * */
		}
		
		public function cambioEstado($estado){
			/*
			 * Este metodo se encarga de cambiar los distintos estados en el sistema 
			 **/
		}		

//*************************************************************************************************************************************************//
//*********************************************************/  VALIDACIONES  /**********************************************************************//
//*************************************************************************************************************************************************//
		
		
		public function validarNuemero($dato, $largoMaximo, $largoMinimo , $codError){
			
			$largo = strlen($dato);
			if($largo <= $largoMaximo){
				if($largo >= $largoMinimo){
					if(is_numeric ($dato)){
						$retorno = TRUE;
					}else{
						$retorno = $codError[1];
					}
				}else{
					$retorno = $codError[2];
				}	
			}else{
				$retorno = $codError[3];
			}
			return $retorno;
		}
	
		public function validarTexto($idSistema){
				
		}
		
		public function validarFecha($idSistema){
		
		}
		
		
//*************************************************************************************************************************************************//
//*************************************************/  Usuarop Desarrollador  /*********************************************************************//
//*************************************************************************************************************************************************//
		
		
		public function validarDesarrollador($idUsuario){
			/*
			 * Esta Funcion se encarga de validad si el usuario es desarrollador 
			 * si lo tiene permiso de realizar todas las pruebas disponibles
			 * */
			$preparate = "SELECT fun_sistema_usuarios_validarDesarrollador(:idUsuario) AS funcion_retorno;";
			$arrayDatos = array('idUsuario' => $idUsuario);
			$retorno = $this->ejecutarFuncion($preparate,$arrayDatos);
			return $retorno;
	
		}
		
		
		
//*************************************************************************************************************************************************//
//***********************************************/  Ejecuciones en la base  /**********************************************************************//
//*************************************************************************************************************************************************//
		
		protected function motorBase(){
			/*
			 * Este metodo se encarga de seleccionar que motor de base se va a usar
			 * */
			$retorno = "mysqlpdo";
			return $retorno;
			
		}
		
		
		protected function servidor(){
			/*
			 * Este metodo se encarga de seleccionar que servidor se esta corriendo
			 * */
			$retorno = "produccion";
			return $retorno;
			
		}		
		
		protected function traerResultado($preparate,$arrayDatos) {
			
			$conMysql = new sistema_bases_controlador();
			$conMysql->constructor($this->motorBase(),$this->servidor(),$preparate,$arrayDatos,$this->sisUsuarios);
			$retorno = $conMysql->obtenerListas();
			return $retorno;
			
		}
		
		protected  function ejecutarFuncion($preparate,$arrayDatos){			
			
			$conMysql = new sistema_bases_controlador();
			$conMysql->constructor($this->motorBase(),$this->servidor(),$preparate,$arrayDatos,$this->sisUsuarios);
			$retorno = $conMysql->ejecutarFunction();
			return $retorno;
			
		}
		
//*************************************************************************************************************************************************//
//****************************************************/  Subir Archivos  /*************************************************************************//
//*************************************************************************************************************************************************//
		
		public function rutasImagenes(){
			
			return "archivos/imagenes/prod/";
			
		}
		
		public function rutasPdf(){
			
			return "archivos/pdf/prod/";
			
		}	
		
		
		public function subirImagen($preTabla, $nomContinuacion = ""){
			// Este metodo se encarga de subir imagenes al sistema y ajustarlas para que queden todas en igual resolucion
			
			$nombreArchivo = "archivo".$nomContinuacion;
			if( isset($_POST["fotos"]) && $_POST["fotos"] == "subir" && isset($_FILES[$nombreArchivo]['name'])) {
				//aca empiezo a subir el archivo
				//aca medimos el tamaño del archivo
				$tamano = $_FILES[$nombreArchivo]['size'];
				//aca medimos el tipo del archivo
				$tipos = $_FILES[$nombreArchivo]['type'];
				
				//echo("TIPOS AQUI".$tipos);
				$tipo = '';
				switch ($tipos){
					case "image/png":
						$tipo = "png";
						break;
					case "image/jpeg":
						$tipo = "jpg";
						break;
					case "image/jpg":
						$tipo = "jpg";
						break;
					case "image/PNG":
						$tipo = "PNG";
						break;
					case "image/JPEG":
						$tipo = "jpg";
						break;
					case "image/JPG":
						$tipo = "JPG";
						break;
						
				}
				//Generamos un nombre nuevo a traves de
				$prefijo = substr(md5(uniqid(rand())),0,20);
				// Armo el nombre que va a llevar la foto
				$nombre = $preTabla."_".$prefijo.".".$tipo;
				//echo("NOMBRE PREFIJO $nombre");
				//Aca tomamos el nombre del archivo original
				$archivo = $_FILES[$nombreArchivo]['name'];
				if($archivo != "" && $tipo != "" ){
					//Generamos el destino de donde alojamos el archivo temporalmente
					$destino = "temp/$nombre";
					//Aca mientra preguntamos Subimos al archivo al servidor y el destino va esta generado por la var $destino(se usa temporalmente)
					if (copy($_FILES[$nombreArchivo]['tmp_name'],$destino)) {
						//Generamos el Destino final de donde va Guardado finalmente el archivo
						$destino_2 = $this->rutasImagenes()."".$this->modelo."/".$nombre;
						$imagen = $destino;
						
						//Cargo en memoria la imagen que quiero redimensionar
						// antes de cargar verifico si la imagen es png  
						if($tipo == "png" || $tipo == "PNG"){
							$imagen_original = imagecreatefrompng($imagen);
						}else{
							$imagen_original = imagecreatefromjpeg($imagen);
						}
						//Obtengo el ancho de la imagen quecargue
						$ancho_original = imagesx($imagen_original);
						//Obtengo el alto de la imagen que cargue
						$alto_original = imagesy($imagen_original);
						//Va el alto y el ancho con que el que queda la foto
						$alto_final = $this->imgAlto;
						$ancho_final = $this->imgAlto;
						//Creo una imagen vacia, con el alto y el ancho que tendrla imagen redimensionada
						$imagen_redimensionada = imagecreatetruecolor($ancho_final, $alto_final);
						//Copio la imagen original con las nuevas dimensiones a la imagen en blanco que creamos en la linea anterior
						imagecopyresampled($imagen_redimensionada, $imagen_original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_original, $alto_original);
						//Guardo la imagen ya redimensionada
						// antes de guardar la imagen valido si la misma es png
						if($tipo == "png" || $tipo == "PNG"){
							imagepng($imagen_redimensionada,$destino_2);
						}else{
							imagejpeg($imagen_redimensionada,$destino_2);
						}
						//Libero recursos, destruyendo las imagenes que estaban en memoria
						imagedestroy($imagen_original);
						imagedestroy($imagen_redimensionada);
						//Borramos la primera imagen subida al servidor
						unlink($destino);
						return $nombre;
						
					}else{
						$retorno = "1007";
						return $retorno;
					}
				}else{
					$retorno = "1006";
					return $retorno;
				}
			}else{
				$retorno = "1006";
				return $retorno;
			}
		}
		
		public function subirPDF($nombre){
			/* 
			 * Metodo que se encarga de subir los archivos pdf al sistema
			 * 
			 * */
			if( isset($_POST["pdf"]) && $_POST["pdf"] == "subir") {
				//aca empiezo a subir el archivo
				//aca medimos el tamaño del archivo
				$tamano = $_FILES["archivo"]['size'];
				//aca medimos el tipo del archivo
				$tipos = $_FILES["archivo"]['type'];
				
				$tipo = '';
				switch ($tipos){
					case "application/pdf":
						$tipo = "pdf";
						break;
					default:
						break;
				}
				//Generamos un nombre nuevo a traves de
				$nombre = strtolower(str_replace( " ", "_" , $nombre)).".pdf";
				//Aca tomamos el nombre del archivo original
				$archivo = $_FILES["archivo"]['name'];
				// Evaluo si los datos de envio tiene el archivo
				if($archivo != "" && $tipo != "" ){
					//Generamos el destino de donde alojamos el archivo temporalmente
					$destino = $this->rutasPdf()."".$this->modelo."/$nombre";
					//Aca mientra preguntamos Subimos al archivo al servidor y el destino va esta generado por la var $destino(se usa temporalmente)
					if (copy($_FILES['archivo']['tmp_name'],$destino)) {
						
						return $nombre;
						
					}else{
						$retorno = "1011";
						return $retorno;
					}
				}else{
					$retorno = "1006";
					return $retorno;
				}
			}else{
				$retorno = "1006";
				return $retorno;
			}
		}
		
		
		
//*************************************************************************************************************************************************//
//***************************************************/  Codigo Respuesta  /************************************************************************//
//*************************************************************************************************************************************************//
				
		public function codigoRespuesta($codigo){
			// Obtenemos el nombre de las respuesta dadas por el sitema 
			$mensaje='';
			switch ($codigo){
			// Errores genericos
				case 1000:
					$mensaje = "exitosa";
					break;
				case 1001:
					$mensaje = "fallida";
					break;
				case 1002:
					$mensaje = "permisos";
					break;
				case 1003:
					$mensaje = "duplicado";
					break;
				case 1004:
					$mensaje = "clave";
					break;	
				case 1005:
					$mensaje = "fotoExitosa";
					break;
				case 1006:
					$mensaje = "fotoNo";
					break;
				case 1007:
					$mensaje = "fotoError";
					break;
				case 1008:
					$mensaje = "errorClave";
					break;	
				case 1009:
					$mensaje = "errorTransaccion";
					break;
				case 1010:
					$mensaje = "errorTransaccion";
					break;
				case 1011:
					$mensaje = "errorArchivo";
					break;
				case 1012:
					// Es total maximo de registros dentro el sistema
					$mensaje = "maximoRegistros";
					break;
			// Errores especificos		
				case 2001:
					$mensaje = "idErrorNumero";
					break;
				case 2002:
					$mensaje = "idErrorLargoMaximo";
					break;
				case 2003:
					$mensaje = "idErrorLargoMaximo";
					break;
				case 3001:	
					$mensaje = "duplicadoContacto";
					break;
				default:				
			}
			return $mensaje;
		}
		

//*************************************************************************************************************************************************//
//**********************************************************/  Textos  /***************************************************************************//
//*************************************************************************************************************************************************//


		public function formularioIdioma($modulos,$gestion,$idioma){
			
			$xmlform = simplexml_load_file('modulos/'.$modulos.'/XML/formularios/'.$modulos.'_'.$gestion.'_formularios.xml');
			$xmlFormulario = $xmlform->xpath("//".$modulos."/".$gestion."/formularios[@idioma='$idioma']")[0];
			return $xmlFormulario;
			
		}
		
		public function tablasIdioma($modulos,$gestion,$tabla,$idioma){
			
			$xmlform = simplexml_load_file('modulos/'.$modulos.'/XML/tablas/'.$modulos.'_'.$gestion.'_tablas.xml');			
			$xpath = "//".$modulos."/".$gestion."/tablas[@idioma='$idioma']/".$tabla."";
			$xmlTabla = $xmlform->xpath($xpath)[0];
			return $xmlTabla;
			
		}
		
		public function alertasIdioma($modulos,$gestion,$idioma,$parametro,$codigo){
			
			$mensaje = $this->codigoRespuesta($codigo);
			
			$xml = simplexml_load_file('modulos/'.$modulos.'/XML/alertas/'.$modulos.'_'.$gestion.'_alertas.xml');
			$path = "//".$modulos."/".$gestion."/alertas[@idioma='$idioma']/".$parametro."/".$mensaje;
			//echo($path);
			$respuesta = $xml->xpath("$path");
			$xmlMensaje = $respuesta[0];
			return $xmlMensaje;
			
		}
		
		
		
		static function formularioIdiomaIntegracion($integracion,$idioma){
			
			$xmlform = simplexml_load_file("integraciones/".$integracion."/XML/integracion_".$integracion."_formularios.xml");
			$xmlFormulario = $xmlform->xpath("//integraciones/".$integracion."/formularios[@idioma='".$idioma."']")[0];
			return $xmlFormulario;
			
		}
		
		static function tablasIdiomaIntegracion($integracion,$tabla,$idioma){
			
			$xmlform = simplexml_load_file("integraciones/".$integracion."/XML/integracion_".$integracion."_tablas.xml");
			$xmlTabla = $xmlform->xpath("//integraciones/".$integracion."/tablas[@idioma='$idioma']/".$tabla."")[0];
			return $xmlTabla;
			
		}
		
		static function alertasIdiomaIntegracion($integracion,$idioma,$parametro,$respuesta){
						
			$xmlform = simplexml_load_file("integraciones/".$integracion."/XML/integracion_".$integracion."_alertas.xml");
			$path = "//integracion/".$integracion."/alertas[@idioma='$idioma']/".$parametro."/".$respuesta;
			//echo($path);
			$mensaje = $xmlform->xpath("$path");
			$xmlMensaje = $mensaje[0];
			return $xmlMensaje;
			
		}
		
		
		
	}
?>		
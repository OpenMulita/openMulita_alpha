<?php
	/*Creada por Damian Delgado
	 * 
	 * Esta clase se encarga de administrar los movimientos de la base de las usuarios 
	 * 
	 * 
	 */
	require_once("modulos/perfil/PHP/modelos/perfil_usuarios_modelo.php");		
	
	class perfil_usuarios_dao extends perfil_usuarios_modelo{
		
		// Es el nombre de el estado
		var $nombreEstado;
		// Es la fecha que se modifico el modulo
		var $fechaEdicion;
		//Es el nombre de el usuario que edito el modulo
		var $nombreUsuario;
		//Es el nombre de el usuario que edito el modulo
		var $nombreTipoEdicion;
		//ES el identiicar de el registro en el historial
		var $idHistorial;
				
//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		//Cargamos el usuario
		public function cargar($idUsuario){
					
			$preparate = "SELECT 	su.su_idUsuario, 
									su.su_nombreUsuario, 
									su.su_mailUsuario, 
									su.su_imagenUsuario, 
									su_descripcionUsuario, 
									se.se_nombreEstado, 
									su.su_idEstado, 
									su.su_motivoUsuario
								FROM sistema_usuarios su
								INNER JOIN sistema_estados se ON se.se_idEstado = su.su_idEstado
								WHERE su.su_idUsuario = :idUsuario ";	
			$arrayDatos = array('idUsuario' => $idUsuario);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idUsuario = $resultado['su_idUsuario'];
				$this->nombre = $resultado['su_nombreUsuario'];
				$this->mail = $resultado['su_mailUsuario'];
				$this->descripcion = $resultado['su_descripcionUsuario'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->idEstado = $resultado['su_idEstado'];
				$this->imagen = $resultado['su_imagenUsuario'];
				$this->motivo = $resultado['su_motivoUsuario'];
			}			
		}		
		
		
		public function cargarHistorial($idHistorial){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$arrayDatos = "SELECT 	suh_idUsuarioHistorial,
									ste_nombreTipoEdicion,
									su_nombreUsuario,
									DATE_FORMAT(suh_fechaEdicionHistorial, '%d-%m-%Y %H:%i:%S') as fechaEdicion,
									suh_idUsuario,
									suh_nombreUsuario,
									suh_mailUsuario,
									suh_imagenUsuario,
		                            suh_descripcionUsuario,
									suh_idEstado,
									se_nombreEstado,
									suh_motivoUsuario
								FROM sistema_usuarios_historial
								INNER JOIN sistema_estados ON se_idEstado = suh_idEstado
								INNER JOIN sistema_tipo_edicion ON ste_idTipoEdicion = suh_idTipoEdicion
								INNER JOIN sistema_usuarios ON su_idUsuario = suh_idUsuarioEdito
								WHERE suh_idUsuarioHistorial = :idHistorial;
			";
			$arrayDatos = array('idHistorial' => $idHistorial);
			$listaPdo = $this->traerResultado($preparate,$arrayDatos);
			$lista = $listaPdo['registros'];
			foreach ( $lista as $resultado){
				$this->idHistorial = $resultado['suh_idUsuarioHistorial'];
				$this->nombreTipoEdicion = $resultado['ste_nombreTipoEdicion'];
				$this->fechaEdicion = $resultado['fechaEdicion'];
				$this->nombreUsuario = $resultado['su_nombreUsuario'];					
				$this->idUsuario = $resultado['suh_idUsuario'];
				$this->nombre = $resultado['suh_nombreUsuario'];
				$this->mail = $resultado['suh_mailUsuario'];
				$this->imagen = $resultado['suh_imagenUsuario'];
				$this->descripcion = $resultado['suh_descripcionUsuario'];					
				$this->idEstado = $resultado['suh_idEstado'];
				$this->nombreEstado = $resultado['se_nombreEstado'];
				$this->motivo = $resultado['suh_motivoUsuario'];
			}
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
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

	
		public function listaSelect($idUsuario){
			
			$sql = "SELECT	su_idUsuario,
							su_nombreUsuario 
						FROM sistema_usuarios 
						WHERE su_idUSuario!=1 
						AND su_idEstado!='1' 
						AND su_idEstado!='4' 
						ORDER BY su_nombreUsuario";
			$lista = $this->traerResultado($sql);				
			while($resultado=$lista->fetch_assoc()){
		
				$id = $resultado['su_idUsuario'];
				$nombre = $resultado['su_nombreUsuario'];
				if($idUsuario==$id){
					echo("
							<option value='$id' selected>$nombre</option>
					");
				}else{
					echo("
							<option value='$id'>$nombre</option>
					");
				}
			}
		}
		
		
		public function listaSelectCategoria($idCategoria){
			/*
			 * Este metodo statico se encarga de imprimir en pantalla los campos de un select
			 * para que el usuario puede elegir una opcion.
			 * */		
			$sql = "SELECT	suc_idUsuarioCategoria,
							suc_nombreUsuarioCategoria 
						FROM sistema_usuarios_categorias 
						ORDER BY suc_nombreUsuarioCategoria";
			$lista = $this->traerResultado($sql);				
			while($resultado=$lista->fetch_assoc()){
				
				$id=$resultado['suc_idUsuarioCategoria'];
				$nombre=$resultado['suc_nombreUsuarioCategoria'];
				
				$seleccionada='';
				if($idCategoria==$id){
					$seleccionada = 'selected';
				}
				echo("
						<option value='$id' $seleccionada >$nombre</option>
				");				
			}
		}
		

}
?>		
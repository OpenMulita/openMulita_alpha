<?php

	require_once("modulos/sistema/PHP/modelos/sistema_usuariosAsociacionCategorias_modelo.php");

	class sistema_usuariosAsociacionCategorias_dao extends sistema_usuariosAsociacionCategorias_modelo{

		// Es el nombre de el usuario
		protected $nombreUsuario;
		// Es el nombre de la categoria
		protected $nombreCategoria;
		


//*************************************************************************************************************************************************//
//***********************************************************/  Cargamos datos   /*****************************************************************//
//*************************************************************************************************************************************************//
			
		public function cargar($idUsuarioCategoria){
			/*
			 * Este metodo se encarga de cargar los datos de la clase para poderse manipular
			 * */
			$sql="select * FROM sistema_usuarios_asociacion_categorias where suc_idUSuarioCategoria=$idUsuarioCategoria";
			$lista = $this->traerResultado($sql);
			while($resultado=$lista->fetch_assoc()){
				$this->id = $resultado['suc_idUsuarioCategoria'];
				$this->nombre = $resultado['suc_nombreUsuarioCategoria'];
				$this->descripcion = $resultado['suc_descripcionUsuarioCategoria'];
				$this->idEstado = $resultado['suc_idEstado'];
				$this->motivo = $resultado['suc_motivoUsuarioCategoria'];
			}
			$baseObj->cerrarConexion();
		}
		
//*************************************************************************************************************************************************//
//***********************************************/  Devolvovemos los datos obtenidos  /************************************************************//
//*************************************************************************************************************************************************//

		public function obtenerNombreUsuario(){
			return $this->nombreUsuario;
		}
		public function obtenerNombreCategoria(){
			return $this->nombreCategoria;
		}
		


	}
?>
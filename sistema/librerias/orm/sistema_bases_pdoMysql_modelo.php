<?php


class sistema_bases_pdoMysql_modelo{
	
	
	// Variable atributo donde se guarda la conecion
	protected $conexion;
	// Es la respuesta despues de ejecutado una funcion
	protected $respuesta;
	// Es el listado de los registros 
	protected $listaRegistros;
	// Total de registros
	protected $totalRegistros;
	
	protected function conectarPDO($servidor){
			
	    include('configuracion/configuracion.php');
	
		try{
			
			if($servidor == "produccion"){
			
				$this->conexion = new PDO("mysql:host=".MYSQL_MASTER_SERVIDOR.";dbname=".MYSQL_MASTER_BASE."", MYSQL_MASTER_USUARIO, MYSQL_MASTER_CLAVE);
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			
			}elseif($servidor == "replica"){
				
				$this->conexion = new PDO("mysql:host=".MYSQL_MASTER_SERVIDOR.";dbname=".MYSQL_MASTER_BASE."", MYSQL_MASTER_USUARIO, MYSQL_MASTER_CLAVE);
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			}
			
		}catch(PDOException $e){
			
			echo "Fallo Conexion con la base: \n";
			echo "ERROR: " . $e->getMessage() ."\n";
			
		}		
		
	}
	
	public function executarFuncionPDO($servidor,$preparate,$arrayExecute,$idUsuario){
		
		$codigo = $this->validoDesarollador($idUsuario);
		if($codigo==1000){
			echo("\n".$preparate."<br>");
			print_r($arrayExecute);
		}
		
		$this->conectarPDO($servidor);
		$sql = $this->conexion->prepare($preparate);		
		$execucion = $sql->execute($arrayExecute);
		$respuesta = $sql->fetchAll();
		$this->conexion = null;
		$this->respuesta = $respuesta[0][0];	
		return;
		
	}
	
	public function executarSelectPDO($servidor,$preparate,$arrayExecute,$idUsuario){
		
		$codigo = $this->validoDesarollador($idUsuario);
		if($codigo==1000){
			echo("\n".$preparate."<br>");
			print_r($arrayExecute);
		}
		
		$this->conectarPDO($servidor);
		$sql = $this->conexion->prepare($preparate);
		$sql->execute($arrayExecute);
		$this->listaRegistros = $sql->fetchAll();
		$this->totalRegistros = $sql->rowCount();
		$this->conexion = null;		
		return;
	}
	
	
	public function obtenerRespuesta(){
		return $this->respuesta;
	}
	public function obtenerListaRegistros(){
		return $this->listaRegistros;
	}
	public function obtenerTotalRegistros(){
		return $this->totalRegistros;
	}
	
	
	protected function validoDesarollador($idUsuario){
		
		$codigo = 1003;
		
		$preparate = "SELECT fun_sistema_usuarios_validarDesarrollador(:idUsuario) AS funcion_retorno;";
		$arrayUsuario = array('idUsuario' => $idUsuario);
		
		$this->conectarPDO("produccion");
		$sql = $this->conexion->prepare($preparate);
		$execucion = $sql->execute($arrayUsuario);
		$respuesta = $sql->fetchAll();
		$this->conexion = null;
		$respuesta = $respuesta[0][0];
		return $respuesta; 
			
	}
	
	
}

?>
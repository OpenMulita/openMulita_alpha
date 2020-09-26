<?php


class modelo_log{

	var $nombre;
	var $modo;
	var $archivo;
	var $encendido;
	
	function  Log($nombre,$modo){		
		
		$nomModulos='sistema';
		$this->nombre="modulos/".$nomModulos."/log/".$nombre.".txt";
		$this->modo = $modo;
				
	}


	function AbrirLog(){

		//echo($this->nombre);
		if($this->nombre != ""){
			$this->archivo = fopen($this->nombre, $this->modo);
			
		}

	}

	function EscribirLog($texto,$aprobacion){

		
		if($this->nombre != ""){
			if($aprobacion){
				$escribir = $texto."\r\n";
				fwrite($this->archivo,$escribir);
			}
		}
		
	}

	function CerrarLog(){

		if($this->nombre != ""){
			fclose($this->archivo);
		}
	}
}

?>
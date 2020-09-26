<?php


class alertas_modelo{

	// Es el parametro que nos va a indicar que formulario vamos a ir
	var $alerta;
	
	var $icono;
	
	public function alertas_modelo(){

	}
	
	public function mostrar($mensaje,$parametro){
		
		$this->formulario($parametro);
		echo("
			<div class='$this->alerta'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<h4><i class='$this->icono'></i> $mensaje </h4> 
			</div>
		");				
	}
	
	public function formulario($paramentro){
	
		switch ($paramentro){
			case "1000":
				$this->alerta = "alert alert-success alert-dismissable";
				$this->icono = "icon fa fa-check";
				break;
			case "1001":
				$this->alerta = "alert alert-danger alert-dismissable";
				$this->icono = "icon fa fa-ban";
				break;
			case "1002":
			case "1003":
			case "1004":
				$this->alerta = "alert alert-warning alert-dismissable";
				$this->icono = "icon fa fa-warning";
				break;	
			default:
				$this->alerta = "alert alert-info alert-dismissable";
				$this->icono = "icon fa fa-warning";
				break;
		}
		
	}
	
	public function respuestaWSXML($mensaje,$parametro){
		
		echo('
			<?xml version="1.0" encoding="UTF-8" ?>
			<!DOCTYPE Edit_Mensaje SYSTEM "Edit_Mensaje.dtd">
			<mulita>
			     <mensaje>
			          <Codigo>
			               '.$parametro.'
			          </Codigo>
			          <texto>
			               '.$mensaje.'
			          </texto>
				</mensaje>
			</mulita>
		');
	}
	
}	





























?>
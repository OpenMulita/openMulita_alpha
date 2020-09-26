<?php

@define(MYSQL_MASTER_SERVIDOR, "localhost");
@define(MYSQL_MASTER_USUARIO, "root");
@define(MYSQL_MASTER_CLAVE, "");
@define(MYSQL_MASTER_BASE, "_openmulita_alpha");


$datosGeneral = [
	"version" => [
			"nombre"=>"Delta",
			"numero"=>"",
			"fecha"=>"",			
	],
];

$rutasConfiguracion = [
	"base" => "../",
];

$basesDatos = [
	"MySQL" => [
		"host"=>"localhost",	
		"puerto"=>"3306",
		"base"=>"_openmulita_alpha",
		"usuario"=>"root",
		"clave"=>"",
	],		
	"SQLLite" => [
		"host"=>"localhost",
		"puerto"=>"3306",
		"base"=>"testDamian",
		"usuario"=>"ddelgado",
		"clave"=>"dami1234",
			
	],
	"PostgreSQL" => [
		"host"=>"localhost",
		"puerto"=>"5432",
		"base"=>"testdamian",
		"usuario"=>"ddelgado",
		"clave"=>"dami1234",
			
	],
];

$test = [
	"servidor" => "http://localhost:2020/",
];












SET SESSION FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS agenda_contactos;
DROP TABLE IF EXISTS agenda_contactos_compromisos;
DROP TABLE IF EXISTS agenda_contactos_compromisos_historial;
DROP TABLE IF EXISTS agenda_contactos_extras;
DROP TABLE IF EXISTS agenda_contactos_extras_historial;
DROP TABLE IF EXISTS agenda_contactos_historial;
DROP TABLE IF EXISTS agenda_contactos_llamadas;
DROP TABLE IF EXISTS agenda_contactos_llamadas_historial;
DROP TABLE IF EXISTS agenda_contactos_notas;
DROP TABLE IF EXISTS agenda_contactos_notas_historial;
DROP TABLE IF EXISTS agenda_contactos_residencias;
DROP TABLE IF EXISTS agenda_contactos_residencias_historial;
DROP TABLE IF EXISTS animales_especies;
DROP TABLE IF EXISTS animales_especies_historial;
DROP TABLE IF EXISTS animales_mascotas;
DROP TABLE IF EXISTS animales_mascotas_historial;
DROP TABLE IF EXISTS animales_razas;
DROP TABLE IF EXISTS animales_razas_historial;
DROP TABLE IF EXISTS caja_cierre_dia_historial;
DROP TABLE IF EXISTS cajas_cierre_dia;
DROP TABLE IF EXISTS cajas_movimientos;
DROP TABLE IF EXISTS cajas_movimientos_historial;
DROP TABLE IF EXISTS clientes_categorias;
DROP TABLE IF EXISTS clientes_categorias_historial;
DROP TABLE IF EXISTS clientes_clientes;
DROP TABLE IF EXISTS clientes_clientes_historial;
DROP TABLE IF EXISTS externo_usuarios_web;
DROP TABLE IF EXISTS externo_usuarios_web_historial;
DROP TABLE IF EXISTS finanzas_impuestos;
DROP TABLE IF EXISTS finanzas_impuestos_historial;
DROP TABLE IF EXISTS finanzas_medios_pagos;
DROP TABLE IF EXISTS finanzas_medios_pagos_historial;
DROP TABLE IF EXISTS finanzas_monedas;
DROP TABLE IF EXISTS finanzas_monedas_historial;
DROP TABLE IF EXISTS geolocalizacion_paises;
DROP TABLE IF EXISTS geolocalizacion_paises_historial;
DROP TABLE IF EXISTS geolocalizacion_subdivisiones_chicas;
DROP TABLE IF EXISTS geolocalizacion_subdivisiones_chicas_historial;
DROP TABLE IF EXISTS geolocalizacion_subdivisiones_grandes;
DROP TABLE IF EXISTS geolocalizacion_subdivisiones_grandes_historial;
DROP TABLE IF EXISTS geolocalizacion_zonas;
DROP TABLE IF EXISTS geolocalizacion_zonas_historial;
DROP TABLE IF EXISTS inventario_articulos;
DROP TABLE IF EXISTS inventario_articulos_asociacion_categorias;
DROP TABLE IF EXISTS inventario_articulos_asociacion_categorias_historial;
DROP TABLE IF EXISTS inventario_articulos_asociacion_propiedades;
DROP TABLE IF EXISTS inventario_articulos_asociacion_propiedades_historial;
DROP TABLE IF EXISTS inventario_articulos_categorias;
DROP TABLE IF EXISTS inventario_articulos_categorias_historial;
DROP TABLE IF EXISTS inventario_articulos_colores;
DROP TABLE IF EXISTS inventario_articulos_colores_historial;
DROP TABLE IF EXISTS inventario_articulos_fotos;
DROP TABLE IF EXISTS inventario_articulos_historial;
DROP TABLE IF EXISTS inventario_articulos_movimientos_stock;
DROP TABLE IF EXISTS inventario_articulos_precios;
DROP TABLE IF EXISTS inventario_articulos_precios_historial;
DROP TABLE IF EXISTS inventario_articulos_propiedades;
DROP TABLE IF EXISTS inventario_articulos_propiedades_historial;
DROP TABLE IF EXISTS inventario_articulos_stock;
DROP TABLE IF EXISTS inventario_articulos_talles;
DROP TABLE IF EXISTS inventario_articulos_talles_historial;
DROP TABLE IF EXISTS inventario_marcas;
DROP TABLE IF EXISTS inventario_marcas_historial;
DROP TABLE IF EXISTS mensajeria_contactos;
DROP TABLE IF EXISTS mensajeria_mensajes_historial;
DROP TABLE IF EXISTS noticias_boletin_suscripciones;
DROP TABLE IF EXISTS noticias_boletin_suscripciones_historial;
DROP TABLE IF EXISTS noticias_carrusel;
DROP TABLE IF EXISTS noticias_carrusel_historial;
DROP TABLE IF EXISTS noticias_carrusel_imagenes;
DROP TABLE IF EXISTS noticias_carrusel_imagenes_historial;
DROP TABLE IF EXISTS noticias_catalogos;
DROP TABLE IF EXISTS noticias_catalogos_historial;
DROP TABLE IF EXISTS noticias_noticias;
DROP TABLE IF EXISTS noticias_noticias_historial;
DROP TABLE IF EXISTS sistema_acciones;
DROP TABLE IF EXISTS sistema_codigo_campo_uruerp;
DROP TABLE IF EXISTS sistema_codigos_respuestas;
DROP TABLE IF EXISTS sistema_estados;
DROP TABLE IF EXISTS sistema_gestiones;
DROP TABLE IF EXISTS sistema_gestiones_historial;
DROP TABLE IF EXISTS sistema_login;
DROP TABLE IF EXISTS sistema_modulos;
DROP TABLE IF EXISTS sistema_modulos_historial;
DROP TABLE IF EXISTS sistema_tipo_edicion;
DROP TABLE IF EXISTS sistema_usuarios;
DROP TABLE IF EXISTS sistema_usuarios_asociacion_categorias;
DROP TABLE IF EXISTS sistema_usuarios_asociacion_categorias_historial;
DROP TABLE IF EXISTS sistema_usuarios_categorias;
DROP TABLE IF EXISTS sistema_usuarios_categorias_historial;
DROP TABLE IF EXISTS sistema_usuarios_categorias_permisos;
DROP TABLE IF EXISTS sistema_usuarios_categorias_permisos_historial;
DROP TABLE IF EXISTS sistema_usuarios_historial;
DROP TABLE IF EXISTS sistema_usuarios_permisos;
DROP TABLE IF EXISTS sistema_usuarios_permisos_historial;
DROP TABLE IF EXISTS sistema_usuarios_transaccion;
DROP TABLE IF EXISTS socios_cuotas;
DROP TABLE IF EXISTS socios_socios;
DROP TABLE IF EXISTS socios_socios_historial;
DROP TABLE IF EXISTS socios_tipos_cuotas;
DROP TABLE IF EXISTS socios_tipos_cuotas_historial;
DROP TABLE IF EXISTS tratamientos_imagenes;
DROP TABLE IF EXISTS tratamientos_tipos;
DROP TABLE IF EXISTS tratamientos_tipos_historial;
DROP TABLE IF EXISTS tratamientos_tratamientos;
DROP TABLE IF EXISTS tratamientos_tratamientos_historial;
DROP TABLE IF EXISTS ventas_envios_mail;
DROP TABLE IF EXISTS ventas_ordenes;
DROP TABLE IF EXISTS ventas_ordenes_envios;
DROP TABLE IF EXISTS ventas_ordenes_productos;

/* Create Tables */

-- Esta tabla se encarga de guardar los contantos
CREATE TABLE agenda_contactos
(
	-- Es el identificador y llave de la persona
	ac_idContacto bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador y llave de la persona',
	-- Es el primer nombre o unico nombre que lleva la persona 
	ac_primerNombreContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el primer nombre o unico nombre que lleva la persona ',
	-- Es el segundo nombre que lleva la persona
	ac_segundoNombreContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el segundo nombre que lleva la persona',
	-- Es el primer apellido que lleva la persona
	ac_primerApellidoContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el primer apellido que lleva la persona',
	-- Es el segundo apellido que lleva la persona
	ac_segundoApellidoContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el segundo apellido que lleva la persona',
	-- NombreEmpresa Contacto
	ac_empresaContacto varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'NombreEmpresa Contacto',
	-- Es el genero del contacto 
	ac_sexoContacto enum('Masculino','Femenino','Transexual') CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el genero del contacto ',
	-- Es la fecha que nacio el usuario
	ac_fechaNacimientoContacto date COMMENT 'Es la fecha que nacio el usuario',
	-- Es la nombre de la imagen que usa el usuario
	ac_fotoContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la nombre de la imagen que usa el usuario',
	-- Es otro telefono de contacto de la persona
	ac_telefonoContacto varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es otro telefono de contacto de la persona',
	-- Es el numero de celular utilizado por la persona
	ac_celularContacto varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el numero de celular utilizado por la persona',
	-- Es la direccion donde vive la persona
	ac_direccionContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la direccion donde vive la persona',
	-- Es el mail de conacto de la persona
	ac_mailContacto varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el mail de conacto de la persona',
	-- Es la descripcion del contacto
	ac_descripcionContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion del contacto',
	-- Es el identificador de el estado que se encuentra los registros
	ac_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registros
	ac_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registros',
	-- Es el identificador de los usuarios
	ac_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ac_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el registros
	ac_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se modifico el registros',
	-- Es el identificador de los usuarios
	ac_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registros
	ac_motivoContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registros',
	PRIMARY KEY (ac_idContacto)
) COMMENT = 'Esta tabla se encarga de guardar los contantos' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;


-- En esta tabla se guarda los compromisos con los distintos co
CREATE TABLE agenda_contactos_compromisos
(
	-- ES el identificador de los compromisos
	acc_idCompromiso bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'ES el identificador de los compromisos',
	-- Es el identificador y llave de la persona
	acc_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es la fecha que se pacta el compromiso
	acc_fechaCompromiso date NOT NULL COMMENT 'Es la fecha que se pacta el compromiso',
	-- Es la hora que inicia el compromiso 
	acc_horaInicioCompromiso time NOT NULL COMMENT 'Es la hora que inicia el compromiso ',
	-- Es la hora que finaliza el compromiso
	acc_horaFinCompromiso time NOT NULL COMMENT 'Es la hora que finaliza el compromiso',
	-- Es el detalle a tratar del compromiso
	acc_detalleCompromiso text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el detalle a tratar del compromiso',
	-- Es el identificador de el estado que se encuentra los registros
	acc_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	acc_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	acc_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	acc_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	acc_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	acc_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo el por que 
	acc_motivoCompromiso text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo el por que ',
	PRIMARY KEY (acc_idCompromiso)
) COMMENT = 'En esta tabla se guarda los compromisos con los distintos co' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE agenda_contactos_compromisos_historial
(
	-- Es el identificador del compromiso historico
	acch_idCompromisoHistorial bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del compromiso historico',
	-- Es el identificador de tipo de edicion
	acch_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el registro
	acch_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se modifico el registro',
	-- Es el identificador de los usuarios
	acch_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- ES el identificador de los compromisos
	acch_idCompromiso bigint(250) NOT NULL COMMENT 'ES el identificador de los compromisos',
	-- Es el identificador y llave de la persona
	acch_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es la fecha que se realiza el compromiso
	acch_fechaCompromiso date NOT NULL COMMENT 'Es la fecha que se realiza el compromiso',
	-- Es la hora que se inicia el compromiso
	acch_horaInicioCompromiso time NOT NULL COMMENT 'Es la hora que se inicia el compromiso',
	-- Es la hora que se finaliza el compromiso
	acch_horaFinCompromiso time NOT NULL COMMENT 'Es la hora que se finaliza el compromiso',
	-- Es historico de la razon por que se realiza el compromiso
	acch_detalleCompromiso text CHARACTER SET utf8 COLLATE utf8_spanish_ci COMMENT 'Es historico de la razon por que se realiza el compromiso',
	-- Es el identificador de el estado que se encuentra los registros
	acch_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se modifica el compromiso
	acch_motivoCompromiso text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifica el compromiso',
	PRIMARY KEY (acch_idCompromisoHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacio de contacto no primera donde
CREATE TABLE agenda_contactos_extras
(
	-- Es el identificador del dato contacto extra
	ace_idContactoExtra bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del dato contacto extra',
	-- Es el identificador y llave de la persona
	ace_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el timo de datos qque se va a  almacenar 
	ace_tipoDatoContactoExtra text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el timo de datos qque se va a  almacenar ',
	-- ES el dato que se va a almacenar
	ace_datoContactoExtra text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'ES el dato que se va a almacenar',
	-- Es el identificador de el estado que se encuentra los registros
	ace_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- ES la fecha que se ingreso el registro
	ace_fechaIngreso datetime NOT NULL COMMENT 'ES la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	ace_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ace_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- ES la fecha que se edito el registro
	ace_fechaEdicion datetime COMMENT 'ES la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	ace_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo el cambio
	ace_motivoContactoExtra text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (ace_idContactoExtra)
) COMMENT = 'Esta tabla guarda la informacio de contacto no primera donde' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historico de lo datos extras de los con
CREATE TABLE agenda_contactos_extras_historial
(
	-- ES el identificador del registro del historia del contacto extra
	aceh_idContactoExtraHistorial bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'ES el identificador del registro del historia del contacto extra',
	-- Es el identificador de tipo de edicion
	aceh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- ES la fecha que se edito el registros
	aceh_fechaEdicionHistorial datetime NOT NULL COMMENT 'ES la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	aceh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del dato contacto extra
	aceh_idContactoExtra bigint(250) NOT NULL COMMENT 'Es el identificador del dato contacto extra',
	-- Es el identificador y llave de la persona
	aceh_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el historial del tipo de dato no configurado 
	aceh_tipoDatoContactoExtra text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del tipo de dato no configurado ',
	-- Historia lde ldato extra del contacto
	aceh_datoContactoExtra text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Historia lde ldato extra del contacto',
	-- Es el identificador de el estado que se encuentra los registros
	aceh_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial del motivo por el cual se realizo el cambio
	aceh_motivoContactoExtra text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del motivo por el cual se realizo el cambio',
	PRIMARY KEY (aceh_idContactoExtraHistorial)
) COMMENT = 'Esta tabla guarda el historico de lo datos extras de los con' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de guardar el historial de los cantact
CREATE TABLE agenda_contactos_historial
(
	-- Es el identificador de los registros del historial
	ach_idContactoHistorial bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de los registros del historial',
	-- 
	-- 
	ach_idTipoEdicion int(3) NOT NULL COMMENT '
',
	-- Es la fecha que se edito el registros
	ach_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	ach_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador y llave de la persona
	ach_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es historial el primer nombre del contacto
	ach_primerNombreContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es historial el primer nombre del contacto',
	-- Es el historial de segundo nombre Contacto
	ach_segundoNombreContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de segundo nombre Contacto',
	-- Es el historial del primer apellido del contacto
	ach_primerApellidoContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del primer apellido del contacto',
	-- Es el historial del segundo apellido del contacto
	ach_segundoApellidoContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del segundo apellido del contacto',
	-- Historial del nombre de la empresa
	ach_empresaContacto varchar(200) COMMENT 'Historial del nombre de la empresa',
	-- Es el sexo del contacto
	ach_sexoContacto enum('Masculino','Femenino','Transexual') COMMENT 'Es el sexo del contacto',
	-- Es el historial de la fecha de nacimiento del contacto
	ach_fechaNacimientoContacto date COMMENT 'Es el historial de la fecha de nacimiento del contacto',
	-- es el historial de la foto de contacto
	ach_fotoContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'es el historial de la foto de contacto',
	-- Es el numero de telefono de contacto
	ach_telefonoContacto varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el numero de telefono de contacto',
	-- Es el historial del celular del contacto
	ach_celularContacto varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del celular del contacto',
	-- Es el historial de la direccion de contacto
	ach_direccionContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la direccion de contacto',
	-- Es el historial de mail del contacto
	ach_mailContacto varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de mail del contacto',
	-- Es el historial de la descripcion del contacto
	ach_descripcionContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion del contacto',
	-- Es el identificador de el estado que se encuentra los registros
	ach_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de los motivos por el cual se realizaron los cambios
	ach_motivoContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de los motivos por el cual se realizaron los cambios',
	PRIMARY KEY (ach_idContactoHistorial)
) COMMENT = 'Esta tabla se encarga de guardar el historial de los cantact' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion de llamadas que se le hacen
CREATE TABLE agenda_contactos_llamadas
(
	-- Es de la llamada al contacto
	acl_idContactoLlamada bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'Es de la llamada al contacto',
	-- Es el identificador y llave de la persona
	acl_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el tipo de llada uno para las llamadas entrantes y otras para las llamadas que sales
	acl_tipoLlamada enum('Entrada','Salida') NOT NULL COMMENT 'Es el tipo de llada uno para las llamadas entrantes y otras para las llamadas que sales',
	-- Es la fecha que se realizo la llamada 
	acl_fechaLlamada date NOT NULL COMMENT 'Es la fecha que se realizo la llamada ',
	-- Es la hora que se realizo la llamada
	acl_horaLlamada time NOT NULL COMMENT 'Es la hora que se realizo la llamada',
	-- Es el tiempo que dura la llamada en minutos redondo
	acl_tiempoLlamada int(4) COMMENT 'Es el tiempo que dura la llamada en minutos redondo',
	-- Es nota de la llamada
	acl_notaLlamada text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es nota de la llamada',
	-- Es la fecha para cuando llamar de nuevo
	acl_fechaProximaLlamada date NOT NULL COMMENT 'Es la fecha para cuando llamar de nuevo',
	-- Es la hora de la proxima llamada 
	acl_horaProximaLlamada time NOT NULL COMMENT 'Es la hora de la proxima llamada ',
	-- Es el identificador de el estado que se encuentra los registros
	acl_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	acl_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	acl_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	acl_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registros
	acl_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	acl_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se edito el registro de la llamada
	acl_motivoLlamada text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se edito el registro de la llamada',
	PRIMARY KEY (acl_idContactoLlamada)
) COMMENT = 'Esta tabla guarda la informacion de llamadas que se le hacen' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion del historial de las llamad
CREATE TABLE agenda_contactos_llamadas_historial
(
	-- Es el identificador del historial de la llamada
	aclh_idContactoLlamadaHistorial bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de la llamada',
	-- Es el identificador de tipo de edicion
	aclh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	-- 
	aclh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro
',
	-- Es el identificador de los usuarios
	aclh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es de la llamada al contacto
	aclh_idContantoLlamada bigint(255) COMMENT 'Es de la llamada al contacto',
	-- Es el identificador y llave de la persona
	aclh_idContacto bigint(200) COMMENT 'Es el identificador y llave de la persona',
	-- Es el tipo de llamada de contacto con el usuario 
	aclh_tipoLlamada enum('Entrada','Salida') COMMENT 'Es el tipo de llamada de contacto con el usuario ',
	-- Es el historial de la fecha de la llamada
	aclh_fechaLlamada date NOT NULL COMMENT 'Es el historial de la fecha de la llamada',
	-- Es la hora de la llamada
	aclh_horaLlamada time COMMENT 'Es la hora de la llamada',
	-- Es el tiemplo empleado en una llamada el valor es en minutos redondos
	aclh_tiempoLlamada int(4) COMMENT 'Es el tiemplo empleado en una llamada el valor es en minutos redondos',
	-- Es la hora de la proxima llamada
	aclh_fechaProximaLLamada date COMMENT 'Es la hora de la proxima llamada',
	-- Es el historial de la hora de la proxima llamada
	aclh_horaProximaLlamada time COMMENT 'Es el historial de la hora de la proxima llamada',
	-- Es el historial de la nota de llamada
	aclh_notaLlamada text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la nota de llamada',
	-- Es el identificador de el estado que se encuentra los registros
	aclh_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es historial del motivo de la llamada
	-- 
	aclh_motivoLlamada text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es historial del motivo de la llamada
',
	PRIMARY KEY (aclh_idContactoLlamadaHistorial)
) COMMENT = 'Esta tabla guarda la informacion del historial de las llamad' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;


-- Esta tabla guarda las notas del acerca de los contactos
CREATE TABLE agenda_contactos_notas
(
	-- Es el identificador de la nota
	acn_idNota bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la nota',
	-- Es el identificador y llave de la persona
	acn_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el texto de la nota
	acn_nota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el texto de la nota',
	-- Es la fecha y hora de las notas.
	acn_fechaNota datetime NOT NULL COMMENT 'Es la fecha y hora de las notas.',
	-- Es el identificador de el estado que se encuentra los registros
	acn_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha de ingreso de la nota
	acn_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha de ingreso de la nota',
	-- Es el identificador de los usuarios
	acn_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	acn_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registros
	acn_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	acn_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se edito la nota
	acn_motivoNota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se edito la nota',
	PRIMARY KEY (acn_idNota)
) COMMENT = 'Esta tabla guarda las notas del acerca de los contactos' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE agenda_contactos_notas_historial
(
	-- ES el identificador del historial de la notas
	acnh_idNotaHistorial bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'ES el identificador del historial de la notas',
	-- Es el identificador de tipo de edicion
	acnh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	acnh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	acnh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la nota que se 
	acnh_idNota bigint(255) NOT NULL COMMENT 'Es el identificador de la nota que se ',
	-- Es el identificador y llave de la persona
	acnh_idContacto bigint(200) COMMENT 'Es el identificador y llave de la persona',
	-- Es el  historial de nota
	acnh_nota text COMMENT 'Es el  historial de nota',
	-- Es la fecha de la nota
	acnh_fechaNota datetime NOT NULL COMMENT 'Es la fecha de la nota',
	-- Es el identificador de el estado que se encuentra los registros
	acnh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo de las notas
	acnh_motivoNota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo de las notas',
	PRIMARY KEY (acnh_idNotaHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE agenda_contactos_residencias
(
	-- Es el identificador del dato de la recidencia
	acr_idResidencia bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del dato de la recidencia',
	-- Es el identificador y llave de la persona
	acr_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador del pais
	acr_idPais int(4) NOT NULL COMMENT 'Es el identificador del pais',
	-- Es el identificador del subdivision mayor del pais
	acr_idSubdivisionGrande int(10) NOT NULL COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el identificador de la subdivision dos 
	acr_idSubdivisionChica int(15) COMMENT 'Es el identificador de la subdivision dos ',
	-- Es el identificador de la zona
	acr_idZona int(200) COMMENT 'Es el identificador de la zona',
	-- Es la calle donde esta la revicencia
	acr_calleResidencia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la calle donde esta la revicencia',
	-- Es el numero de puerta de la recidencia 
	acr_numeroResidencia varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el numero de puerta de la recidencia ',
	-- Son las esquina con la cruzan 
	acr_esquinasResidencia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Son las esquina con la cruzan ',
	-- Son otros detalles a tener en cuenta
	acr_otrosResidencia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Son otros detalles a tener en cuenta',
	-- Es el identificador de el estado que se encuentra los registros
	acr_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	acr_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	acr_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	acr_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	acr_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	acr_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se edito la recidencia
	acr_motivoResidencia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se edito la recidencia',
	PRIMARY KEY (acr_idResidencia)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE agenda_contactos_residencias_historial
(
	-- Es el identificador del historial de la recidencia
	acrh_idResidenciaHistorial bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de la recidencia',
	-- Es el identificador de tipo de edicion
	acrh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha del historial
	acrh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha del historial',
	-- Es el identificador de los usuarios
	acrh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del dato de la recidencia
	acrh_idResidencia bigint(250) NOT NULL COMMENT 'Es el identificador del dato de la recidencia',
	-- Es el identificador y llave de la persona
	acrh_idContacto bigint(200) COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador del pais
	acrh_idPais int(4) COMMENT 'Es el identificador del pais',
	-- Es el identificador del subdivision mayor del pais
	acrh_idSubdivisionGrande int(10) COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el identificador de la subdivision dos 
	acrh_idSubdivisionChica int(15) COMMENT 'Es el identificador de la subdivision dos ',
	-- Es el identificador de la zona
	acrh_idZona int(200) COMMENT 'Es el identificador de la zona',
	-- Es el historial de la calles de la recidencia
	acrh_calleResidencia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la calles de la recidencia',
	-- Es el historial del numero de la recidencia
	acrh_numeroResidencia varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del numero de la recidencia',
	-- Es el historial de las esquinas de la recidencia
	acrh_esquinasResidencia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de las esquinas de la recidencia',
	-- Es el historial de los otros detalles de la recidencia
	acrh_otrosResidencia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de los otros detalles de la recidencia',
	-- Es el identificador de el estado que se encuentra los registros
	acrh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	acrh_motivoResidencia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	PRIMARY KEY (acrh_idResidenciaHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla va a gestionar los distintas clases de animales q
CREATE TABLE animales_especies
(
	-- Es el identificar de las distintas clases de animales a tratar
	ane_idEspecie int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificar de las distintas clases de animales a tratar',
	-- Es el nombre de la clase que de los distintos animales que se van a ingresar en el sistema
	ane_nombreEspecie varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de la clase que de los distintos animales que se van a ingresar en el sistema',
	-- Es la descripcion de los distintos animales que contine la epecie
	ane_descripcionEspecie text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de los distintos animales que contine la epecie',
	-- Es el identificador de el estado que se encuentra los registros
	ane_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fehca que se ingreso el registros
	ane_fechaIngreso datetime NOT NULL COMMENT 'Es la fehca que se ingreso el registros',
	-- Es el identificador de los usuarios
	ane_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ane_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la ultima fecha que se edito el registro
	-- 
	ane_FechaEdicion datetime NOT NULL COMMENT 'Es la ultima fecha que se edito el registro
',
	-- Es el identificador de los usuarios
	ane_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico la clase
	ane_motivoEspecie text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico la clase',
	PRIMARY KEY (ane_idEspecie)
) COMMENT = 'Esta tabla va a gestionar los distintas clases de animales q' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla maneja los historiales de las clases de animales 
CREATE TABLE animales_especies_historial
(
	-- ES el identificador del  historial de la especies animales
	aneh_idEspecieHistorial int(15) NOT NULL AUTO_INCREMENT COMMENT 'ES el identificador del  historial de la especies animales',
	-- Es el identificador de tipo de edicion
	aneh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizo el cambio en el registro
	aneh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se realizo el cambio en el registro',
	-- Es el identificador de los usuarios
	aneh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificar de las distintas especies de animales a tratar
	aneh_idEspecie int(5) NOT NULL COMMENT 'Es el identificar de las distintas especies de animales a tratar',
	-- ES el historal de los nombres que llevo la clase
	aneh_nombreEspecie varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'ES el historal de los nombres que llevo la clase',
	-- Es ell historial de descricpion de la clase 
	-- 
	aneh_descripcionEspecie text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es ell historial de descricpion de la clase 
',
	-- Es el identificador de el estado que se encuentra los registros
	aneh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial del motivo por el cual se realizo el cambio
	aneh_motivoEspecie text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del motivo por el cual se realizo el cambio',
	PRIMARY KEY (aneh_idEspecieHistorial)
) COMMENT = 'Esta tabla maneja los historiales de las clases de animales ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Tabla que guarda la informacion de las mascotas dentros del 
CREATE TABLE animales_mascotas
(
	-- Es el identificador de la mascota
	anm_idMascota bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la mascota',
	-- Es el nombre de la mascota
	anm_nombreMascota varchar(150) NOT NULL COMMENT 'Es el nombre de la mascota',
	-- Es el sexo de la mascota en este caso va un campo enumen
	anm_sexoMascota enum('Macho','Hembra') NOT NULL COMMENT 'Es el sexo de la mascota en este caso va un campo enumen',
	-- Es la fecha que nacio la mascota
	anm_fechaNacimientoMascota date NOT NULL COMMENT 'Es la fecha que nacio la mascota',
	-- Es el identificar de las distintas clases de animales a tratar
	anm_idEspecie int(5) NOT NULL COMMENT 'Es el identificar de las distintas clases de animales a tratar',
	-- Es el identificador de la raza de los animales
	anm_idRaza int(10) NOT NULL COMMENT 'Es el identificador de la raza de los animales',
	-- Es el color de pelo o piel de la mascota
	anm_colorMascota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el color de pelo o piel de la mascota',
	-- Son los datos externo de la mascota
	anm_descripcionMascota text COMMENT 'Son los datos externo de la mascota',
	-- Es la foto de perfil de la mascota
	anm_fotoMascota varchar(100) NOT NULL COMMENT 'Es la foto de perfil de la mascota',
	-- Es el identificador y llave de la persona
	anm_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador de el estado que se encuentra los registros
	anm_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	anm_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es la fecha de ingresado
	anm_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es la fecha de ingresado',
	-- Es el identificador de tipo de edicion
	anm_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	anm_fechaEdicion date NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	anm_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cualr se modifico el registro
	anm_motivoMascota text COMMENT 'Es el motivo por el cualr se modifico el registro',
	PRIMARY KEY (anm_idMascota)
) COMMENT = 'Tabla que guarda la informacion de las mascotas dentros del ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Tabla donde se guarda la inforamcion del historial de la mas
CREATE TABLE animales_mascotas_historial
(
	-- Es el identificador del historial de los registros de las mascotas 
	anmh_idMascotasHistorial bigint(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de los registros de las mascotas ',
	-- Es el identificador de tipo de edicion
	anmh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	anmh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	anmh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la mascota
	anmh_idMascota bigint(100) NOT NULL COMMENT 'Es el identificador de la mascota',
	-- ES el historial del nombre de la mascota
	anmh_nombreMascota varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el historial del nombre de la mascota',
	-- Es el historial de el nombre de la mascota
	anmh_fechaNacimientoMascota datetime NOT NULL COMMENT 'Es el historial de el nombre de la mascota',
	-- ES le historial del sexo de la mascota
	anmh_sexoMascota enum('Macho','Hembra') NOT NULL COMMENT 'ES le historial del sexo de la mascota',
	-- Es el historial de la fecha de nacimiento
	anmh_fechaNacimiento date COMMENT 'Es el historial de la fecha de nacimiento',
	-- Es el identificar de las distintas clases de animales a tratar
	anmh_idEspecie int(5) NOT NULL COMMENT 'Es el identificar de las distintas clases de animales a tratar',
	-- Es el identificador de la raza de los animales
	anmh_idRaza int(10) NOT NULL COMMENT 'Es el identificador de la raza de los animales',
	-- Es el color de pelo de la mascota
	anmh_colorMascota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el color de pelo de la mascota',
	-- Es el historial de la descripcion de la mascotas 
	anmh_descripcionMascota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion de la mascotas ',
	-- es el historial de las fotos de las mascotas 
	anmh_fotoMascota varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'es el historial de las fotos de las mascotas ',
	-- Es el identificador y llave de la persona
	anmh_idContacto bigint(200) COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador de el estado que se encuentra los registros
	anmh_idEStado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizaron los cambios de las mascotas
	anmh_motivoMascota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizaron los cambios de las mascotas',
	PRIMARY KEY (anmh_idMascotasHistorial)
) COMMENT = 'Tabla donde se guarda la inforamcion del historial de la mas' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE animales_razas
(
	-- Es el identificador de la raza de los animales
	anr_idRaza int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la raza de los animales',
	-- ES el nombre de la raza de las mascotas
	anr_nombreRaza varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'ES el nombre de la raza de las mascotas',
	-- Es el identificar de las distintas clases de animales a tratar
	anr_idEspecie int(5) NOT NULL COMMENT 'Es el identificar de las distintas clases de animales a tratar',
	-- Es la descripcion de la raza de las mascotas 
	anr_descripcionRaza text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la raza de las mascotas ',
	-- Es el identificador de el estado que se encuentra los registros
	anr_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	anr_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	anr_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	anr_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se ingreo el registro
	anr_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se ingreo el registro',
	-- Es el identificador de los usuarios
	anr_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo un cambio en registro
	anr_motivoRaza text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo un cambio en registro',
	PRIMARY KEY (anr_idRaza)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE animales_razas_historial
(
	-- Es el identificar de registro del historial dae la raza
	anrh_idRazaHistorial int(15) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificar de registro del historial dae la raza',
	-- Es el identificador de tipo de edicion
	anrh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizo una modificacion en el registro
	anrh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se realizo una modificacion en el registro',
	-- Es el identificador de los usuarios
	anrh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la raza de los animales
	anrh_idRaza int(10) NOT NULL COMMENT 'Es el identificador de la raza de los animales',
	-- ES el historial de los distinto nombre que tubo la raza
	anrh_nombreRaza varchar(100) NOT NULL COMMENT 'ES el historial de los distinto nombre que tubo la raza',
	-- Es el identificar de las distintas clases de animales a tratar
	anrh_idEspecie int(5) NOT NULL COMMENT 'Es el identificar de las distintas clases de animales a tratar',
	-- Es la descripcio de la raza de el animal
	anrh_descripcionRaza text COMMENT 'Es la descripcio de la raza de el animal',
	-- Es el identificador de el estado que se encuentra los registros
	anrh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizaron cambio en la raza
	anrh_motivoRaza text COMMENT 'Es el motivo por el cual se realizaron cambio en la raza',
	PRIMARY KEY (anrh_idRazaHistorial)
) DEFAULT CHARACTER SET utf8;


-- En esta tabla se guarda el total de movimientos generados en
CREATE TABLE cajas_cierre_dia
(
	-- Es el identificador del cierre del movimiento del dia
	cacd_idCierreDia int(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del cierre del movimiento del dia',
	cacd_fechaCierre date NOT NULL,
	-- Es el identificador de la moneda con la se va a pagar
	cacd_idMoneda int(4) NOT NULL COMMENT 'Es el identificador de la moneda con la se va a pagar',
	cacd_tipoMovimiento enum('Entrada','Salida') NOT NULL,
	-- Es el total de los movimientos que se realizaron de entrada
	cacd_totalMovimientos int(7) COMMENT 'Es el total de los movimientos que se realizaron de entrada',
	-- Es el monto total de salida 
	cacd_montoMovimientos int(100) COMMENT 'Es el monto total de salida ',
	-- Es el identificador de el estado que se encuentra los registros
	cacd_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	cacd_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	cacd_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	cacd_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro por ultima ves
	cacd_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro por ultima ves',
	-- Es el identificador de los usuarios
	cacd_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registro a mano
	cacd_motivoCierre text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro a mano',
	PRIMARY KEY (cacd_idCierreDia)
) COMMENT = 'En esta tabla se guarda el total de movimientos generados en' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de almacenar la informacion de los mov
CREATE TABLE cajas_movimientos
(
	-- Es el identificador del movimiento de la caja
	cam_idMovimiento bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del movimiento de la caja',
	-- Es el tipo de movimiento que se va a realizar 
	cam_tipoMovimiento enum('Entrada','Salida') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el tipo de movimiento que se va a realizar ',
	-- Es el identificador de la moneda con la se va a pagar
	cam_idMoneda int(4) NOT NULL COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es valor del movimiento
	cam_valorMovimiento int(200) NOT NULL COMMENT 'Es valor del movimiento',
	-- Es la fecha que se realiza el movimiento
	cam_fechaMovimiento date NOT NULL COMMENT 'Es la fecha que se realiza el movimiento',
	-- Es el detalle por que se realiza el movimiento
	cam_detalleMovimiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el detalle por que se realiza el movimiento',
	-- Es el identificador de el estado que se encuentra los registros
	cam_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	cam_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	cam_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	cam_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro por ultima ves
	cam_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro por ultima ves',
	-- Es el identificador de los usuarios
	cam_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realiza el movimiento
	cam_motivoMovimiento text COMMENT 'Es el motivo por el cual se realiza el movimiento',
	PRIMARY KEY (cam_idMovimiento)
) COMMENT = 'Esta tabla se encarga de almacenar la informacion de los mov' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historiala de los movimientos de caja r
CREATE TABLE cajas_movimientos_historial
(
	-- Es el identificador del historial de los movimientos
	camh_idMovimientoHistorial bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de los movimientos',
	-- Es el identificador de tipo de edicion
	camh_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	camh_fechaEdicionHistorial datetime COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	camh_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del movimiento de la caja
	camh_idMovimiento bigint(200) COMMENT 'Es el identificador del movimiento de la caja',
	-- Es el historila del topo movimiento realizado en la caja
	camh_tipoMovimiento enum('Entrada','Salida') CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historila del topo movimiento realizado en la caja',
	-- Es el identificador de la moneda con la se va a pagar
	camh_idMoneda int(4) COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el moto historico del movimiento
	camh_valorMovimiento int(200) COMMENT 'Es el moto historico del movimiento',
	-- Es el historico de la fecha de movimiento
	camh_fechaMovimiento date COMMENT 'Es el historico de la fecha de movimiento',
	-- Es el historico del detalle del movimiento
	camh_detalleMovimiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historico del detalle del movimiento',
	-- Es el identificador de el estado que se encuentra los registros
	camh_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es le motivo por el cual se cambio el registro
	camh_motivoMovimiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es le motivo por el cual se cambio el registro',
	PRIMARY KEY (camh_idMovimientoHistorial)
) COMMENT = 'Esta tabla guarda el historiala de los movimientos de caja r' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Es el historial del caja_cierre_dia, pero esta no contiene t
CREATE TABLE caja_cierre_dia_historial
(
	-- Es el identificador de los movimientos del historial
	cacdh_idCierreDiaHistorial int(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de los movimientos del historial',
	-- Es el identificador de tipo de edicion
	cacdh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se relizo ma modificacion
	cacdh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se relizo ma modificacion',
	-- Es el identificador de los usuarios
	cacdh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del cierre del movimiento del dia
	cacdh_idCierreDia int(100) NOT NULL COMMENT 'Es el identificador del cierre del movimiento del dia',
	-- Es el identificador de el estado que se encuentra los registros
	cacdh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	cacdh_motivoCierre text,
	PRIMARY KEY (cacdh_idCierreDiaHistorial)
) COMMENT = 'Es el historial del caja_cierre_dia, pero esta no contiene t' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda las categorias que pueden tener los client
CREATE TABLE clientes_categorias
(
	-- Es el identificador de la categoria del cliente
	cca_idClienteCategoria int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la categoria del cliente',
	-- Es el nombre de la categoria del cliente
	cca_nombreClienteCategoria varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de la categoria del cliente',
	-- Es la descripcion de la categoria de clientes
	cca_descripcionClienteCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la categoria de clientes',
	-- Es el identificador de el estado que se encuentra los registros
	cca_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	cca_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	cca_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	cca_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	cca_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	cca_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- es el motivo por el cual se realizaron cambios
	cca_motivoClienteCategoria text COMMENT 'es el motivo por el cual se realizaron cambios',
	PRIMARY KEY (cca_idClienteCategoria)
) COMMENT = 'Esta tabla guarda las categorias que pueden tener los client' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE clientes_categorias_historial
(
	-- ES el identificador historico de la categoria de clientes
	ccah_idClienteCategoriaHistorial int(7) NOT NULL AUTO_INCREMENT COMMENT 'ES el identificador historico de la categoria de clientes',
	-- Es el identificador de tipo de edicion
	ccah_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el registro
	ccah_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se modifico el registro',
	-- Es el identificador de los usuarios
	ccah_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la categoria del cliente
	ccah_idClienteCategoria int(5) NOT NULL COMMENT 'Es el identificador de la categoria del cliente',
	-- Es el historico del nombre del la categoria del cliente
	ccah_nombreClienteCategoria varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historico del nombre del la categoria del cliente',
	-- Es el historico de la descripcion del la categoria del cliente
	ccah_descripcionClienteCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historico de la descripcion del la categoria del cliente',
	-- Es el identificador de el estado que se encuentra los registros
	ccah_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se modifico el registro en ese momento
	ccah_motivoClienteCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro en ese momento',
	PRIMARY KEY (ccah_idClienteCategoriaHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta table gestiona los clienetes del sistema.
CREATE TABLE clientes_clientes
(
	-- Es el identificador unico de cliente
	cc_idCliente bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador unico de cliente',
	-- Es el serial del documeto del cliente
	cc_documentoCliente varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el serial del documeto del cliente',
	-- Es el identificador y llave de la persona
	cc_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador de la categoria del cliente
	cc_idClienteCategoria int(5) COMMENT 'Es el identificador de la categoria del cliente',
	-- Es el identificador de el estado que se encuentra los registros
	cc_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	cc_fechaIngreso date NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	cc_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	cc_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	cc_fechaEdicion date NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	cc_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo el cambio en el cliente
	cc_motivoCliente text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio en el cliente',
	PRIMARY KEY (cc_idCliente)
) COMMENT = 'Esta table gestiona los clienetes del sistema.' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historial de los clientes en el sistema
CREATE TABLE clientes_clientes_historial
(
	-- Es el identificador del historial del cliente
	cch_idClienteHistorial bigint(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial del cliente',
	-- Es el identificador de tipo de edicion
	cch_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizaron cambios
	cch_fechaEdicionHistorial date NOT NULL COMMENT 'Es la fecha que se realizaron cambios',
	-- Es el identificador de los usuarios
	cch_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador unico de cliente
	cch_idCliente bigint(100) NOT NULL COMMENT 'Es el identificador unico de cliente',
	-- ES el historial del documento del cliente
	cch_documentoCliente varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'ES el historial del documento del cliente',
	-- Es el identificador y llave de la persona
	cch_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador de la categoria del cliente
	cch_idClienteCategoria int(5) COMMENT 'Es el identificador de la categoria del cliente',
	-- Es el identificador de el estado que se encuentra los registros
	cch_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de los motivos del cliente
	cch_motivoCliente text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de los motivos del cliente',
	PRIMARY KEY (cch_idClienteHistorial)
) COMMENT = 'Esta tabla guarda el historial de los clientes en el sistema' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla gestiona usuarios externos al sistema
-- usualmente
CREATE TABLE externo_usuarios_web
(
	-- Es el identificador del usuario externo
	euw_idUsuarioWeb bigint(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del usuario externo',
	-- Es el nombre de usuario es idenpendiente 
	-- al nombre propio
	euw_nombreUsuarioWeb varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de usuario es idenpendiente 
al nombre propio',
	-- Es el identificador y llave de la persona
	euw_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es ele mail del usuario externo
	-- sirve para loguearse
	euw_mailUsuarioWeb varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es ele mail del usuario externo
sirve para loguearse',
	-- Es la clave utilizada por el usuario externo
	euw_claveUsuarioWeb text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es la clave utilizada por el usuario externo',
	-- Es la informacion extra del usuario 
	-- como horarios de entrega,
	-- dias de la semana, etc
	euw_descripcionUsuarioWeb text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la informacion extra del usuario 
como horarios de entrega,
dias de la semana, etc',
	-- Es el identificador de el estado que se encuentra los registros
	euw_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registros
	euw_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registros',
	-- Es el identificador de los usuarios
	euw_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	euw_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que edito por ultima ves el registros
	euw_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que edito por ultima ves el registros',
	-- Es el identificador de los usuarios
	euw_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registro 
	euw_motivoUsuarioWeb text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro ',
	PRIMARY KEY (euw_idUsuarioWeb)
) COMMENT = 'Esta tabla gestiona usuarios externos al sistema
usualmente' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla gestiona el historial de los usuarios externos de
CREATE TABLE externo_usuarios_web_historial
(
	-- Es el identificador del historial para los usuarios externos
	euwh_idUsuarioWebHistorial bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial para los usuarios externos',
	-- Es el identificador de tipo de edicion
	euwh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizo el ingreso
	euwh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se realizo el ingreso',
	-- Es el identificador de los usuarios
	euwh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del usuario externo
	euwh_idUsuarioWeb bigint(150) NOT NULL COMMENT 'Es el identificador del usuario externo',
	-- Es el historial del nombre del usuario
	euwh_nombreUsuarioWeb varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del nombre del usuario',
	-- Es el identificador y llave de la persona
	euhw_idContacto bigint(200) COMMENT 'Es el identificador y llave de la persona',
	-- Es el historial del mail del usuario externo
	euwh_mailUsuarioWeb varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del mail del usuario externo',
	-- Es el historial de clave usuada por el usuario Externo
	euwh_claveUsuarioWeb text COMMENT 'Es el historial de clave usuada por el usuario Externo',
	-- Es el historial de la descripcion del usuario externo solo es interno del sistema
	euwh_descripcionUsuarioWeb text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion del usuario externo solo es interno del sistema',
	-- Es el identificador de el estado que se encuentra los registros
	euwh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de los distintos motivo por el cual se realizaron las modificaciones
	euwh_motivoUsuarioWeb text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de los distintos motivo por el cual se realizaron las modificaciones',
	PRIMARY KEY (euwh_idUsuarioWebHistorial)
) COMMENT = 'Esta tabla gestiona el historial de los usuarios externos de' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda los distintos tipos de impuesto para el si
CREATE TABLE finanzas_impuestos
(
	-- Es el identificador del impuesto
	fi_idImpuesto int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del impuesto',
	-- Es el nombre que se le atribulle el impuesto
	fi_nombreImpuesto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre que se le atribulle el impuesto',
	-- Son las siglas que se le atribullen al impuesto
	fi_siglasImpuesto varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Son las siglas que se le atribullen al impuesto',
	-- Es el valor de porcentage a agregar o a descontar
	fi_porcentajeImpuesto int(3) NOT NULL COMMENT 'Es el valor de porcentage a agregar o a descontar',
	-- ES la descripcion del impuesto
	fi_descripcionImpuesto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES la descripcion del impuesto',
	-- Es el identificador de el estado que se encuentra los registros
	fi_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el impuesto
	fi_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el impuesto',
	-- Es el identificador de los usuarios
	fi_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	fi_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- ES la fecha que edito el registro por ultima ves
	fi_fechaEdicion datetime NOT NULL COMMENT 'ES la fecha que edito el registro por ultima ves',
	-- Es el identificador de los usuarios
	fi_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifia el registro
	fi_motivoImpuesto text NOT NULL COMMENT 'Es el motivo por el cual se modifia el registro',
	PRIMARY KEY (fi_idImpuesto)
) COMMENT = 'Esta tabla guarda los distintos tipos de impuesto para el si' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- ESta tabla guarda la informacion historicas de los impuestos
CREATE TABLE finanzas_impuestos_historial
(
	-- Es identificador historico de los impuestos
	fih_idImpuestoHistorial int(200) NOT NULL AUTO_INCREMENT COMMENT 'Es identificador historico de los impuestos',
	-- Es la fecha que se realizo el cambio
	fih_idTipoEdicion int(3) COMMENT 'Es la fecha que se realizo el cambio',
	-- Es la fecha que se edito el registro
	fih_fechaEdicionHistorial datetime COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	fih_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del impuesto
	fih_idImpuesto int(3) COMMENT 'Es el identificador del impuesto',
	-- Es el historial del nombre del impuesto
	fih_nombreImpuesto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del nombre del impuesto',
	-- Es el historial de las siglas del impuesto
	fih_siglasImpuesto varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de las siglas del impuesto',
	-- ES el historial del porcentaje del impuesto
	fih_porcentajeImpuesto int(3) COMMENT 'ES el historial del porcentaje del impuesto',
	-- Es el historial de la deschipcion de impuesto
	fih_descripcionImpuesto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la deschipcion de impuesto',
	-- Es el identificador de el estado que se encuentra los registros
	fih_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- ES el motivo por el cual se modifico el impuesto
	fih_motivoImpuesto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el motivo por el cual se modifico el impuesto',
	PRIMARY KEY (fih_idImpuestoHistorial)
) COMMENT = 'ESta tabla guarda la informacion historicas de los impuestos' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE finanzas_medios_pagos
(
	-- Es el identificador por el cual se va a utilizar el medio de pago
	fmp_idMedioPago int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador por el cual se va a utilizar el medio de pago',
	-- Es el nombre de le medio de pago que se va a utilizar
	fmp_nombreMedioPago varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de le medio de pago que se va a utilizar',
	-- Es la descripcion de el medio de por el cual se va a pagar
	fmp_descripcionMedioPago text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de el medio de por el cual se va a pagar',
	-- Es el identificador de el estado que se encuentra los registros
	fmp_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el medio de pago
	fmp_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el medio de pago',
	-- Es el identificador de los usuarios
	fmp_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	fmp_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el registro de medios de pago
	fmp_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se modifico el registro de medios de pago',
	-- Es el identificador de los usuarios
	fmp_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- ES el motivo por el cual se edito el registro
	fmp_motivoMedioPago text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el motivo por el cual se edito el registro',
	PRIMARY KEY (fmp_idMedioPago)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de almacenar los historiales de los ca
CREATE TABLE finanzas_medios_pagos_historial
(
	-- Es el identificar del registro de el historial de los medios de pago
	fmph_idMedioPagoHistorial int(20) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificar del registro de el historial de los medios de pago',
	-- Es el identificador de tipo de edicion
	fmph_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el registro del medios de pagos
	-- 
	fmph_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se modifico el registro del medios de pagos
',
	-- Es el identificador de los usuarios
	fmph_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador por el cual se va a utilizar el medio de pago
	fmph_idMedioPago int(5) NOT NULL COMMENT 'Es el identificador por el cual se va a utilizar el medio de pago',
	-- Es el nombre que tenia el medio de pago antes de la modificaciones
	fmph_nombreMedioPago varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre que tenia el medio de pago antes de la modificaciones',
	-- Se guarda la informacion de la descripcion de los medios de pago 
	fmph_descripcionMedioPago text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Se guarda la informacion de la descripcion de los medios de pago ',
	-- Es el identificador de el estado que se encuentra los registros
	fmph_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Se guardan los motivos por el cual se modifico el registro
	fmph_motivoMedioPago text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Se guardan los motivos por el cual se modifico el registro',
	PRIMARY KEY (fmph_idMedioPagoHistorial)
) COMMENT = 'Esta tabla se encarga de almacenar los historiales de los ca' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de gestionar las monedas del sistema
CREATE TABLE finanzas_monedas
(
	-- Es el identificador de la moneda con la se va a pagar
	fm_idMoneda int(4) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el nombre de como se llama la moneda 
	fm_nombreMoneda varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de como se llama la moneda ',
	-- Es el simbolo con el cual se representa la moneda
	fm_simboloMoneda varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el simbolo con el cual se representa la moneda',
	-- Es el codigo internacional de la moneda
	fm_codigoIsoMoneda varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el codigo internacional de la moneda',
	-- Es la descripcion de la moneda utilizada
	fm_descripcionMoneda text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la moneda utilizada',
	-- Es el identificador de el estado que se encuentra los registros
	fm_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso la moneda
	fm_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso la moneda',
	-- Es el identificador de los usuarios
	fm_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	fm_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	fm_fechaEdicion datetime NOT NULL,
	-- Es el identificador de los usuarios
	fm_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo el cambio
	fm_motivoMoneda text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (fm_idMoneda)
) COMMENT = 'Esta tabla se encarga de gestionar las monedas del sistema' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de guardar el historal las de la moned
CREATE TABLE finanzas_monedas_historial
(
	-- Es el identificador del registro en el historial de las monedas
	fmh_idMonedaHistorial int(6) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del registro en el historial de las monedas',
	-- Es el identificador de tipo de edicion
	fmh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que edito el registro 
	fmh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que edito el registro ',
	-- Es el identificador de los usuarios
	fmh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la moneda con la se va a pagar
	fmh_idMoneda int(4) NOT NULL COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el historial de nombre que tuvo la moneda
	fmh_nombreMoneda varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el historial de nombre que tuvo la moneda',
	-- Es el historal de los simbolos que va teniendo la moneda
	fmh_simboloMoneda varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el historal de los simbolos que va teniendo la moneda',
	-- ES el historial de codio iso de la moneda
	fmh_codigoIsoMoneda varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'ES el historial de codio iso de la moneda',
	-- ES el historial de la descripcion de la moneda
	fmh_descripcionMoneda text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el historial de la descripcion de la moneda',
	-- Es el identificador de el estado que se encuentra los registros
	fmh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio en la moneda
	fmh_motivoMoneda text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio en la moneda',
	PRIMARY KEY (fmh_idMonedaHistorial)
) COMMENT = 'Esta tabla se encarga de guardar el historal las de la moned' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla gestiona los distintos paises que  existen
-- 
-- Lis
CREATE TABLE geolocalizacion_paises
(
	-- Es el identificador del pais
	gp_idPais int(4) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del pais',
	-- Es el nombre del pais
	gp_nombrePais varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre del pais',
	gp_nombreContinente enum('af','eu','as','no','su','oc','an') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
	-- Es el codigo de iso de 2 digito 
	gp_countryIsoPaisDos varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el codigo de iso de 2 digito ',
	-- Es el codigo iso de 3 digito
	gp_countryIsoPaisTres varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el codigo iso de 3 digito',
	-- Es le codigo de telefono para llamar al pais
	gp_codigoTelefonicoPais varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es le codigo de telefono para llamar al pais',
	-- Es el nombre que lleva la divicion mas grande del pais
	gp_nombreSubdivisionesGrandes varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre que lleva la divicion mas grande del pais',
	-- Es la imagen de la bandera del pais
	gp_banderaPais varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la imagen de la bandera del pais',
	-- Es la imagen del escudo del pais
	gp_escudoPais varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la imagen del escudo del pais',
	-- Es la imagen del mapa del pais 
	gp_mapaPais varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la imagen del mapa del pais ',
	-- Es la descripcion del pais
	gp_descripcionPais text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion del pais',
	-- Es el identificador de el estado que se encuentra los registros
	gp_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registros
	gp_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registros',
	-- Es el identificador de los usuarios
	gp_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	gp_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifica el registro
	gp_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se modifica el registro',
	-- Es el identificador de los usuarios
	gp_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registros
	-- 
	gp_motivoPais text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registros
',
	PRIMARY KEY (gp_idPais)
) COMMENT = 'Esta tabla gestiona los distintos paises que  existen

Lis' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Es el historial de la geolocalizacion de paises
CREATE TABLE geolocalizacion_paises_historial
(
	-- Es el identificador del historial del pais 
	gph_idPaisHistorial int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial del pais ',
	-- Es el identificador de tipo de edicion
	gph_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se idito el registros
	gph_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se idito el registros',
	-- Es el identificador de los usuarios
	gph_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del pais
	gph_idPais int(4) NOT NULL COMMENT 'Es el identificador del pais',
	-- Es el historial del nombre del pais
	gph_nombrePais varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el historial del nombre del pais',
	-- Es el historial del nombre del continente
	gph_nombreContinente enum('af','eu','as','no','su','oc','an') CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del nombre del continente',
	-- Es el historial del codigo de pais de 2 digito
	gph_countryIsoPaisDos varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del codigo de pais de 2 digito',
	-- Es el codigo de pais de 3 digito
	gph_countryIsoPaisTres varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el codigo de pais de 3 digito',
	-- Es el codigo de telefono del pais
	gph_codigoTelefonicoPais varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el codigo de telefono del pais',
	-- Es el historial de la subdivision del pais
	gph_nombreSubdivisionesGrandes varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la subdivision del pais',
	-- Es el historial de la bandera del pais
	gph_banderaPais varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la bandera del pais',
	-- Es el historial del escudo del pais
	gph_escudoPais varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del escudo del pais',
	-- Este guarda el historial de la imagen del mapa del pais
	gph_mapaPais varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Este guarda el historial de la imagen del mapa del pais',
	-- Es la descripcion del pais
	-- 
	gph_descripcionPais text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion del pais
',
	-- Es el identificador de el estado que se encuentra los registros
	gph_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial del motivo del pais
	gph_motivoPais text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del motivo del pais',
	PRIMARY KEY (gph_idPaisHistorial)
) COMMENT = 'Es el historial de la geolocalizacion de paises' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;


CREATE TABLE geolocalizacion_subdivisiones_chicas
(
	-- Es el identificador de la subdivision dos 
	gsc_idSubdivisionChica int(15) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la subdivision dos ',
	-- ES el nombre de la subdivisionDos
	gsc_nombreSubdivisionChica varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'ES el nombre de la subdivisionDos',
	-- Es el identificador del pais
	gsc_idPais int(4) NOT NULL COMMENT 'Es el identificador del pais',
	-- Es el identificador del subdivision mayor del pais
	gsc_idSubdivisionGrande int(10) NOT NULL COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el nombre que utiliza identifica la zona
	gsc_nombreZonas varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre que utiliza identifica la zona',
	-- Es la descripcion de la subdivision dos 
	-- 
	gsc_descripcionSubdivisionChica text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la subdivision dos 
',
	gsc_mapaSubdivisionChica text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	-- Es el identificador de el estado que se encuentra los registros
	gsc_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	gsc_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	gsc_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	gsc_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es fecha de idicion del registros
	gsc_fechaEdicion datetime NOT NULL COMMENT 'Es fecha de idicion del registros',
	-- Es el identificador de los usuarios
	gsc_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registro
	-- 
	gsc_motivoSubdivisionChica text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro
',
	PRIMARY KEY (gsc_idSubdivisionChica)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE geolocalizacion_subdivisiones_chicas_historial
(
	-- Es el identificador del historial del subdivision chica
	gsch_idSubdivisionChicaHistorial int(20) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial del subdivision chica',
	-- Es el identificador de tipo de edicion
	gsch_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- ES la fecha que se edio el registros
	gsch_fechaEdicionHistorial datetime NOT NULL COMMENT 'ES la fecha que se edio el registros',
	-- Es el identificador de los usuarios
	gsch_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la subdivision dos 
	gsch_idSubdivisionChica int(15) NOT NULL COMMENT 'Es el identificador de la subdivision dos ',
	-- Es el historial del nombre de la subdivision
	gsch_nombreSubdivisionChica varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el historial del nombre de la subdivision',
	-- Es el identificador del pais
	gsch_idPais int(4) NOT NULL COMMENT 'Es el identificador del pais',
	-- Es el identificador del subdivision mayor del pais
	gsch_idSubdivisionGrande int(10) NOT NULL COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el nombre de las zonas que estan cubieras por las subdivision
	gsch_nombreZonas varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de las zonas que estan cubieras por las subdivision',
	-- Es el historial de la subdivision Dos
	gsch_descripcionSubdivisionChica text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la subdivision Dos',
	gsch_mapaSubdivisionChica text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	-- Es el identificador de el estado que se encuentra los registros
	gsch_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizaron los cambios
	gsch_motivoSubdivisionChica text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizaron los cambios',
	PRIMARY KEY (gsch_idSubdivisionChicaHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la inforacion de la subdivision mas grande
CREATE TABLE geolocalizacion_subdivisiones_grandes
(
	-- Es el identificador del subdivision mayor del pais
	gsg_idSubdivisionGrande int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el nombre de la subdivision mas grande del pais
	gsg_nombreSubdivisionGrande varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de la subdivision mas grande del pais',
	-- Es el identificador del pais
	gsg_idPais int(4) NOT NULL COMMENT 'Es el identificador del pais',
	-- Es el nombre generico que identifica a la subdivision dos
	gsg_nombreSubdivisionesChicas varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre generico que identifica a la subdivision dos',
	-- Es la descripcion de la subdivision uno
	gsg_descripcionSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la subdivision uno',
	-- Es la el archivo que contiene la imagen del escudo de la subdivsion mas grande del pais
	gsg_escudoSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la el archivo que contiene la imagen del escudo de la subdivsion mas grande del pais',
	-- Es el nombre del archivo que contiene la imagen de la bandera de la subdivsion mas grande del pais
	gsg_banderaSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre del archivo que contiene la imagen de la bandera de la subdivsion mas grande del pais',
	-- Es el nombre de la imagen del mapa de la subdivision del pais
	gsg_mapaSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de la imagen del mapa de la subdivision del pais',
	-- Es el identificador de el estado que se encuentra los registros
	gsg_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	gsg_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	gsg_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	gsg_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- es la fecha que se ingreso el registro
	gsg_fechaEdicion datetime NOT NULL COMMENT 'es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	gsg_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizaron los cambios
	gsg_motivoSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizaron los cambios',
	PRIMARY KEY (gsg_idSubdivisionGrande)
) COMMENT = 'Esta tabla guarda la inforacion de la subdivision mas grande' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la inforacion del historias de las subdivi
CREATE TABLE geolocalizacion_subdivisiones_grandes_historial
(
	-- Es el identificador del historial de las subdivision uno
	gsgh_idSubdivisionGrandeHistorial int(20) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de las subdivision uno',
	-- Es el identificador de tipo de edicion
	gsgh_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registros
	gsgh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	gsgh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del subdivision mayor del pais
	gsgh_idSubdivisionGrande int(10) NOT NULL COMMENT 'Es el identificador del subdivision mayor del pais',
	-- ES el historial de nombre de la subivision mayor
	gsgh_nombreSubdivisionGrande varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el historial de nombre de la subivision mayor',
	-- Es el identificador del pais
	gsgh_idPais int(4) NOT NULL COMMENT 'Es el identificador del pais',
	-- Es el historial de la subdivision mas chica
	gsgh_nombreSubdivisionesChicas varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la subdivision mas chica',
	-- Es el historial de la descriopcion
	gsgh_descripcionSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descriopcion',
	-- Es el historial del la imagen del escudo de la bandera
	gsgh_escudoSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del la imagen del escudo de la bandera',
	-- Es el historial de la imagen de la bandera
	gsgh_banderaSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la imagen de la bandera',
	-- Es el historial del mapa de la subdivision mas grande 
	gsgh_mapaSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del mapa de la subdivision mas grande ',
	-- Es el identificador de el estado que se encuentra los registros
	gsgh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- El es historial de la subdivision uno
	gsgh_motivoSubdivisionGrande text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'El es historial de la subdivision uno',
	PRIMARY KEY (gsgh_idSubdivisionGrandeHistorial)
) COMMENT = 'Esta tabla guarda la inforacion del historias de las subdivi' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion de la subdivision de las zo
CREATE TABLE geolocalizacion_zonas
(
	-- Es el identificador de la zona
	gz_idZona int(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la zona',
	-- Es el nombre de la zona 
	gz_nombreZona varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de la zona ',
	-- Es el identificador del pais
	gz_idPais int(4) NOT NULL COMMENT 'Es el identificador del pais',
	-- Es el identificador del subdivision mayor del pais
	gz_idSubdivisionGrande int(10) NOT NULL COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el identificador de la subdivision dos 
	gz_idSubdivisionChica int(15) NOT NULL COMMENT 'Es el identificador de la subdivision dos ',
	-- ES la descripcion de la zonas 
	gz_descripcionZona text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES la descripcion de la zonas ',
	-- Es la imagen del mapa de la zona
	gz_mapaZona text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la imagen del mapa de la zona',
	-- Es el identificador de el estado que se encuentra los registros
	gz_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registros
	gz_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registros',
	-- Es el identificador de los usuarios
	gz_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	gz_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	gz_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	gz_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registro
	gz_motivoZona text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro',
	PRIMARY KEY (gz_idZona)
) COMMENT = 'Esta tabla guarda la informacion de la subdivision de las zo' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historial de la zona
CREATE TABLE geolocalizacion_zonas_historial
(
	-- Es el identificador del historial de las zonas 
	gzh_idZonasHistorial int(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de las zonas ',
	-- Es el identificador de tipo de edicion
	gzh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha de edicion historial
	gzh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha de edicion historial',
	-- Es el identificador de los usuarios
	gzh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la zona
	gzh_idZona int(200) NOT NULL COMMENT 'Es el identificador de la zona',
	-- Es el historial de del nombre de las zonas
	gzh_nombreZona varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de del nombre de las zonas',
	-- Es el identificador del pais
	gzh_idPais int(4) NOT NULL COMMENT 'Es el identificador del pais',
	-- Es el identificador del subdivision mayor del pais
	gzh_idSubdivisionGrande int(10) NOT NULL COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el identificador de la subdivision dos 
	gzh_idSubdivisionChica int(15) NOT NULL COMMENT 'Es el identificador de la subdivision dos ',
	-- Es  la descripcion de al zona
	gzh_descripcionZona text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es  la descripcion de al zona',
	-- Es el historial del mapa de la zona
	gzh_mapaZona text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del mapa de la zona',
	-- Es el identificador de el estado que se encuentra los registros
	gzh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial del motivo de la zona
	gzh_motivoZona text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del motivo de la zona',
	PRIMARY KEY (gzh_idZonasHistorial)
) COMMENT = 'Esta tabla guarda el historial de la zona' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla gestiona los articulos del inventarios es una de 
CREATE TABLE inventario_articulos
(
	-- Es el identificador del articulo
	ia_idArticulo int(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del articulo',
	-- Es el nombre del articulo
	ia_nombreArticulo varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre del articulo',
	-- Es el identificador de la marca 
	ia_idMarca int(10) NOT NULL COMMENT 'Es el identificador de la marca ',
	-- Es el modelo del articulo o la serie del mismo
	ia_modeloArticulo varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el modelo del articulo o la serie del mismo',
	-- Es el codigo de barra que contiene cada articulo
	ia_codigoBarraArticulo varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el codigo de barra que contiene cada articulo',
	-- Es el identificador de la moneda con la se va a pagar
	ia_idMoneda int(4) NOT NULL COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es es el precio del articulo 
	ia_precioArticulo float(10,2) COMMENT 'Es es el precio del articulo ',
	-- Es la foto del articulo
	ia_imagenArticulo varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la foto del articulo',
	-- Es la descripcion que lleva el articulo
	ia_descripcionArticulo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion que lleva el articulo',
	-- Es el identificador de el estado que se encuentra los registros
	ia_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingresa el registro
	ia_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingresa el registro',
	-- Es el identificador de los usuarios
	ia_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ia_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el archivo
	ia_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el archivo',
	-- Es el identificador de los usuarios
	ia_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo un cambio en el registro
	ia_motivoArticulo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo un cambio en el registro',
	PRIMARY KEY (ia_idArticulo)
) COMMENT = 'Esta tabla gestiona los articulos del inventarios es una de ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- En esta tabla se guarda la relacion que hay entres los artic
CREATE TABLE inventario_articulos_asociacion_categorias
(
	-- Es el ide que identifica la asociacion del articulo con la categoria
	iaac_idArticuloAsociacionCategoria bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el ide que identifica la asociacion del articulo con la categoria',
	-- Es el identificador del articulo
	iaac_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el identificador de las categorias de los articulos
	iaac_idArticuloCategoria int(10) NOT NULL COMMENT 'Es el identificador de las categorias de los articulos',
	-- Es el identificador de el estado que se encuentra los registros
	iaac_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso la asociacion
	iaac_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso la asociacion',
	-- Es el identificador de los usuarios
	iaac_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iaac_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	iaac_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	iaac_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizaron los cambios
	iaac_motivoArticuloAsociacionCategoria text COMMENT 'Es el motivo por el cual se realizaron los cambios',
	PRIMARY KEY (iaac_idArticuloAsociacionCategoria)
) COMMENT = 'En esta tabla se guarda la relacion que hay entres los artic' DEFAULT CHARACTER SET utf8;


CREATE TABLE inventario_articulos_asociacion_categorias_historial
(
	-- Es el identificador del historial de la articulos asociados a una categoria
	iaach_idArticuloAsociacionCategoriaHistorial int(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de la articulos asociados a una categoria',
	-- Es el identificador de tipo de edicion
	iaach_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	iaach_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	iaach_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el ide que identifica la asociacion del articulo con la categoria
	iaach_idArticuloAsociacionCategoria bigint(100) NOT NULL COMMENT 'Es el ide que identifica la asociacion del articulo con la categoria',
	-- Es el identificador del articulo
	iaach_idArticulo int(100) COMMENT 'Es el identificador del articulo',
	-- Es el identificador de las categorias de los articulos
	iaach_idArticuloCategoria int(10) NOT NULL COMMENT 'Es el identificador de las categorias de los articulos',
	-- Es el identificador de el estado que se encuentra los registros
	iaach_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio
	iaach_motivoArticuloAsociacionCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (iaach_idArticuloAsociacionCategoriaHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la relacion que hay entre los articulos y 
CREATE TABLE inventario_articulos_asociacion_propiedades
(
	-- Es el identificador de la asociacion de los articulos con sus priopedades
	iaap_idArticuloAsociacionPropiedad bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la asociacion de los articulos con sus priopedades',
	-- Es el identificador del articulo
	iaap_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el identificador de la propiedades de los articulos
	iaap_idArticuloPropiedad int(10) NOT NULL COMMENT 'Es el identificador de la propiedades de los articulos',
	-- Es el datos cuantitativo o identificaor de lap propiedad 
	iaap_valorArticuloAsociacionPropiedad text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el datos cuantitativo o identificaor de lap propiedad ',
	-- Es el identificador de el estado que se encuentra los registros
	iaap_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	iaap_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	iaap_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iaap_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	iaap_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	iaap_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	iaap_motivoArticuloAsociacionPropiedad text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	PRIMARY KEY (iaap_idArticuloAsociacionPropiedad)
) COMMENT = 'Esta tabla guarda la relacion que hay entre los articulos y ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE inventario_articulos_asociacion_propiedades_historial
(
	-- Es el identificador del historial de la asociacion de articulos categoria
	iaaph_idArticuloAsociacionPropiedadHistorial int(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de la asociacion de articulos categoria',
	-- Es el identificador de tipo de edicion
	iaaph_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	iaaph_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	iaaph_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la asociacion de los articulos con sus priopedades
	iaaph_idArticuloAsociacionPropiedad bigint(100) NOT NULL COMMENT 'Es el identificador de la asociacion de los articulos con sus priopedades',
	-- Es el identificador del articulo
	iaaph_idArticulo int(100) COMMENT 'Es el identificador del articulo',
	-- Es el identificador de la propiedades de los articulos
	iaaph_idArticuloPropiedad int(10) NOT NULL COMMENT 'Es el identificador de la propiedades de los articulos',
	-- Es el identificador de el estado que se encuentra los registros
	iaaph_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de los motivo por el cual se realizo el cambio
	iaaph_motivoArticuloAsociacionPropiedad text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de los motivo por el cual se realizo el cambio',
	PRIMARY KEY (iaaph_idArticuloAsociacionPropiedadHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla gestiona las distintas categorias que pueden tene
CREATE TABLE inventario_articulos_categorias
(
	-- Es el identificador de las categorias de los articulos
	iac_idArticuloCategoria int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de las categorias de los articulos',
	-- Es el nombre de la categoria de los articulos
	iac_nombreArticuloCategoria varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de la categoria de los articulos',
	-- Es la descripcion de las categorias de los articulos 
	iac_descripcionArticuloCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de las categorias de los articulos ',
	-- Es el identificador de el estado que se encuentra los registros
	iac_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el regitro
	iac_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el regitro',
	-- Es el identificador de los usuarios
	iac_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iac_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro por ultima vez
	iac_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro por ultima vez',
	-- Es el identificador de los usuarios
	iac_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo el cambio
	iac_motivoArticuloCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (iac_idArticuloCategoria)
) COMMENT = 'Esta tabla gestiona las distintas categorias que pueden tene' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- En esta tabla se guarda el historial de las categorias de lo
CREATE TABLE inventario_articulos_categorias_historial
(
	iach_idArticuloCategoriaHistorial int(100) NOT NULL AUTO_INCREMENT,
	-- Es el identificador de tipo de edicion
	iach_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	iach_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	iach_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de las categorias de los articulos
	iach_idArticuloCategoria int(10) COMMENT 'Es el identificador de las categorias de los articulos',
	-- Es el historial del nombre de la categorai de los articulos
	iach_nombreArticuloCategoria varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del nombre de la categorai de los articulos',
	-- Es el historial de la descripcion de la categoria de los articulos
	iach_descripcionArticuloCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion de la categoria de los articulos',
	-- Es el identificador de el estado que se encuentra los registros
	iach_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se modifico la categoria
	iach_motivoArticuloCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico la categoria',
	PRIMARY KEY (iach_idArticuloCategoriaHistorial)
) COMMENT = 'En esta tabla se guarda el historial de las categorias de lo' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion de los colores para los art
CREATE TABLE inventario_articulos_colores
(
	-- Es el identificador de los colores de los articulos
	iaco_idArticuloColor bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de los colores de los articulos',
	-- Es el identificador del articulo
	iaco_idArticulo int(100) COMMENT 'Es el identificador del articulo',
	-- Es el nombre del color 
	iaco_nombreArticuloColor varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre del color ',
	-- Es la descripcion del color para el articulo
	iaco_descripcionArticuloColor text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion del color para el articulo',
	-- Es el identificador de el estado que se encuentra los registros
	iaco_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el articulo
	iaco_fechaIngreso datetime COMMENT 'Es la fecha que se ingreso el articulo',
	-- Es el identificador de los usuarios
	iaco_idUsuarioIngreso int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iaco_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registros
	iaco_fechaEdicion datetime COMMENT 'Es la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	iaco_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	iaco_motivoArticuloColor text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	PRIMARY KEY (iaco_idArticuloColor)
) COMMENT = 'Esta tabla guarda la informacion de los colores para los art' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion del historial de los colore
CREATE TABLE inventario_articulos_colores_historial
(
	-- Es el identificador del historial de los colores para los articulos 
	iacoh_idArticuloColorHistorial bigint(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de los colores para los articulos ',
	-- Es el identificador de tipo de edicion
	iacoh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registros
	-- 
	iacoh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registros
',
	-- Es el identificador de los usuarios
	iacoh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de los colores de los articulos
	iacoh_idArticuloColor bigint(100) NOT NULL COMMENT 'Es el identificador de los colores de los articulos',
	-- Es el identificador del articulo
	iacoh_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el historial del nombre del color para los articulos 
	iacoh_nombreArticuloColor varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del nombre del color para los articulos ',
	-- Es el historial de la descripcion de los calores para los articulos 
	iacoh_descripcionArticuloColor text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion de los calores para los articulos ',
	-- Es el identificador de el estado que se encuentra los registros
	iacoh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de motivo por el cual se realizaron modificacion en los colores para los articulos
	iacoh_motivoArticuloColor text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de motivo por el cual se realizaron modificacion en los colores para los articulos',
	PRIMARY KEY (iacoh_idArticuloColorHistorial)
) COMMENT = 'Esta tabla guarda la informacion del historial de los colore' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de administrar las distintas 
-- fotos q
CREATE TABLE inventario_articulos_fotos
(
	-- Es el identificador de la fotos que estan asosciadas a un articulo
	iaf_idArticuloFoto bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la fotos que estan asosciadas a un articulo',
	-- Es el identificador del articulo
	iaf_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el nombre que se le da a la foto a suber 
	-- se obtiene a traves de una semilla
	iaf_nombreArticuloFoto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre que se le da a la foto a suber 
se obtiene a traves de una semilla',
	-- Es la descripcion que lleva la foto
	iaf_descripcionArticuloFoto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion que lleva la foto',
	-- Es el identificador de el estado que se encuentra los registros
	iaf_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el la foto
	iaf_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el la foto',
	-- Es el identificador de los usuarios
	iaf_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iaf_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito la foto
	iaf_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito la foto',
	-- Es el identificador de los usuarios
	iaf_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el mitovo por el cual se modifica el registros
	iaf_motivoArticuloFoto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el mitovo por el cual se modifica el registros',
	PRIMARY KEY (iaf_idArticuloFoto)
) COMMENT = 'Esta tabla se encarga de administrar las distintas 
fotos q' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historial de los articulos
CREATE TABLE inventario_articulos_historial
(
	-- Es el identificador del historial del articulo
	iah_idArticuloHistorial int(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial del articulo',
	-- Es el identificador de tipo de edicion
	iah_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se ingreso el registro
	iah_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	iah_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del articulo
	iah_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el historial del nombre del articulo
	iah_nombreArticulo varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del nombre del articulo',
	-- Es el identificador de la marca 
	iah_idMarca int(10) NOT NULL COMMENT 'Es el identificador de la marca ',
	-- Es el jistorial de el modelo del articulo
	iah_modeloArticulo varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el jistorial de el modelo del articulo',
	-- Es el historial del codigo de barra del articulo
	iah_codigoBarraArticulo varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del codigo de barra del articulo',
	-- Es el identificador de la moneda con la se va a pagar
	iah_idMoneda int(4) COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el historial del precio del articulo
	iah_precioArticulo float(10,2) COMMENT 'Es el historial del precio del articulo',
	-- Es el historial de la fotos del articulo
	iah_imagenArticulo varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la fotos del articulo',
	-- Es el historial de la descripcion del articulo
	iah_descripcionArticulo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion del articulo',
	-- Es el identificador de el estado que se encuentra los registros
	iah_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el caul se realizo el cambio en el articulo
	iah_motivoArticulo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el caul se realizo el cambio en el articulo',
	PRIMARY KEY (iah_idArticuloHistorial)
) COMMENT = 'Esta tabla guarda el historial de los articulos' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla administra los movimientos del stock
-- guardo cuan
CREATE TABLE inventario_articulos_movimientos_stock
(
	-- Es el identificador del movimiento del stock 
	iams_idMovimientoStock bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del movimiento del stock ',
	-- Es el identificador del articulo
	iams_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el identificador de los colores de los articulos
	iams_idArticuloColor bigint(100) COMMENT 'Es el identificador de los colores de los articulos',
	-- Es el talle del articulo usado especialmente para ropa
	iams_idArticuloTalle bigint(200) COMMENT 'Es el talle del articulo usado especialmente para ropa',
	-- Es el tipo de movimiento que se realiza
	iams_tipoMovimiento enum('alta','baja','reserva') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el tipo de movimiento que se realiza',
	-- Es el valor del monvimiento 
	iams_movimientoStock bigint(200) NOT NULL COMMENT 'Es el valor del monvimiento ',
	-- Es la fecha que se realiza el movimiento
	iams_fechaMovimiento date NOT NULL COMMENT 'Es la fecha que se realiza el movimiento',
	-- Es el identificador de el estado que se encuentra los registros
	iams_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el movimiento
	-- 
	iams_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el movimiento
',
	-- Es el identificador de los usuarios
	iams_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iams_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registros
	iams_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	iams_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se relizo un movimiento
	iams_motivoStock text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se relizo un movimiento',
	PRIMARY KEY (iams_idMovimientoStock)
) COMMENT = 'Esta tabla administra los movimientos del stock
guardo cuan' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion de los distintos precios qu
CREATE TABLE inventario_articulos_precios
(
	-- Es el identificador del precio en el articulo
	iapr_idArticuloPrecio bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del precio en el articulo',
	-- Es el identificador del articulo
	iapr_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el identificador de la categoria del cliente
	iapr_idClienteCategoria int(5) NOT NULL COMMENT 'Es el identificador de la categoria del cliente',
	-- Es el talle del articulo usado especialmente para ropa
	iapr_idArticuloTalle bigint(200) COMMENT 'Es el talle del articulo usado especialmente para ropa',
	-- Es la cantidad de articulo que tiene que tener para aplicar ese precio
	iapr_catidadArticulos int(6) NOT NULL COMMENT 'Es la cantidad de articulo que tiene que tener para aplicar ese precio',
	-- Es el identificador de la moneda con la se va a pagar
	iapr_idMoneda int(4) COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el precio que lleva esa convinacion
	iapr_precio float(10,2) COMMENT 'Es el precio que lleva esa convinacion',
	-- Es la descripcion para llevar ese tipo de precio
	iapr_descripcionPrecio text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion para llevar ese tipo de precio',
	-- Es el identificador de el estado que se encuentra los registros
	iapr_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	iapr_fechaIngreso date NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	iapr_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iapr_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	iapr_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	iapr_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	iapr_motivoPrecio text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	PRIMARY KEY (iapr_idArticuloPrecio)
) COMMENT = 'Esta tabla guarda la informacion de los distintos precios qu' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE inventario_articulos_precios_historial
(
	-- Es el identificador del historico de los distintos precios de los articulos
	iaprh_idArticuloPrecioHistorial bigint(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historico de los distintos precios de los articulos',
	-- Es el identificador de tipo de edicion
	iaprh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizo la modificacion
	iaprh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se realizo la modificacion',
	-- Es el identificador de los usuarios
	iaprh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del precio en el articulo
	iaprh_idArticuloPrecio bigint(100) NOT NULL COMMENT 'Es el identificador del precio en el articulo',
	-- Es el identificador del articulo
	iaprh_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el identificador de la categoria del cliente
	iaprh_idClienteCategoria int(5) NOT NULL COMMENT 'Es el identificador de la categoria del cliente',
	-- Es el talle del articulo usado especialmente para ropa
	iaprh_idArticuloTalle bigint(200) COMMENT 'Es el talle del articulo usado especialmente para ropa',
	-- Es la catidad de articulos que tiene que comprar para obtener ese precio
	iaprh_catidadArticulos int(6) NOT NULL COMMENT 'Es la catidad de articulos que tiene que comprar para obtener ese precio',
	-- Es el identificador de la moneda con la se va a pagar
	iaprh_idMoneda int(4) COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el precio que recibe por esa cantidad de artiuclos y la categoria de cliente
	iaprh_precio float(10,2) NOT NULL COMMENT 'Es el precio que recibe por esa cantidad de artiuclos y la categoria de cliente',
	-- Es la descripcion de la para obtener ese tipo de precio
	iaprh_descripcionPrecio text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la para obtener ese tipo de precio',
	-- Es el identificador de el estado que se encuentra los registros
	iaprh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- es el motivo por el cual quedo el registro asi
	iaprh_motivoPrecio text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'es el motivo por el cual quedo el registro asi',
	PRIMARY KEY (iaprh_idArticuloPrecioHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guardas las distintas propiedades que pueden tene
CREATE TABLE inventario_articulos_propiedades
(
	-- Es el identificador de la propiedades de los articulos
	iap_idArticuloPropiedad int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la propiedades de los articulos',
	-- Es el nombre de las propiedades de los articulos
	iap_nombreArticuloPropiedad varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de las propiedades de los articulos',
	-- Es el tipo de campo que se va a utilizar en esta parte
	iap_campoArticuloPropiedad varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el tipo de campo que se va a utilizar en esta parte',
	-- ES la unidad utilizada por las propiedades 
	-- Ej mentro, Kilo, Gramos, Centimetros Cubicos
	-- MB, 
	iap_unidadArticuloPropiedad varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES la unidad utilizada por las propiedades 
Ej mentro, Kilo, Gramos, Centimetros Cubicos
MB, ',
	-- Es la descripcion de la propiedad del articulo
	iap_descripcionArticuloPropiedad text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la propiedad del articulo',
	-- Es el identificador de el estado que se encuentra los registros
	iap_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el articulo
	iap_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el articulo',
	-- Es el identificador de los usuarios
	iap_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iap_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	iap_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	iap_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizaron cambios en el registros
	iap_motivoArticuloPropiedad text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizaron cambios en el registros',
	PRIMARY KEY (iap_idArticuloPropiedad)
) COMMENT = 'Esta tabla guardas las distintas propiedades que pueden tene' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE inventario_articulos_propiedades_historial
(
	-- Es el identificador del historial de la propiedades
	iaph_idArticuloPropiedadHistorial int(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de la propiedades',
	-- Es el identificador de tipo de edicion
	iaph_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	iaph_fechaEdicionHistorial datetime NOT NULL,
	-- Es el identificador de la propiedades de los articulos
	iaph_idArticuloPropiedad int(10) COMMENT 'Es el identificador de la propiedades de los articulos',
	-- Es el identificador de los usuarios
	iaph_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el historial de la propiedad del articulo
	iaph_nombreArticuloPropiedad varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el historial de la propiedad del articulo',
	-- es el historial del campo de la propiedad de los articulos
	iaph_campoArticuloPropiedad varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'es el historial del campo de la propiedad de los articulos',
	-- Es el historial de la unidad de la propiedad de los articulos 
	iaph_unidadArticuloPropiedad varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la unidad de la propiedad de los articulos ',
	-- Es el historial de la descripcion del articulo
	iaph_descripcionArticuloPropiedad text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion del articulo',
	-- Es el identificador de el estado que se encuentra los registros
	iaph_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo los cambios 
	iaph_motivoArticuloPropiedad tinytext CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo los cambios ',
	PRIMARY KEY (iaph_idArticuloPropiedadHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Es tabla guarda el movimiento actual del stok y sus estado
CREATE TABLE inventario_articulos_stock
(
	-- Es el identificador del stock del articulo
	ias_idArticuloStock bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del stock del articulo',
	-- Es el identificador del historial del articulo
	ias_idArticulo int(150) NOT NULL COMMENT 'Es el identificador del historial del articulo',
	-- Es el identificador de los colores de los articulos
	ias_idArticuloColor bigint(100) COMMENT 'Es el identificador de los colores de los articulos',
	-- Es el talle del articulo usado especialmente para ropa
	ias_idArticuloTalle bigint(200) COMMENT 'Es el talle del articulo usado especialmente para ropa',
	-- Es el tipo movimiento que se hace referencia
	ias_tipoMovimiento enum('alta','baja','reserva') NOT NULL COMMENT 'Es el tipo movimiento que se hace referencia',
	-- Es el stock total de los Articulos que hay
	ias_totalMovimientos bigint(200) NOT NULL COMMENT 'Es el stock total de los Articulos que hay',
	-- Es el identificador de el estado que se encuentra los registros
	ias_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	ias_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	ias_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ias_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el historial
	ias_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el historial',
	-- Es el identificador de los usuarios
	ias_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico 
	ias_motivoStock text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico ',
	PRIMARY KEY (ias_idArticuloStock)
) COMMENT = 'Es tabla guarda el movimiento actual del stok y sus estado' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion de los talle de los articul
CREATE TABLE inventario_articulos_talles
(
	-- Es el talle del articulo usado especialmente para ropa
	iat_idArticuloTalle bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el talle del articulo usado especialmente para ropa',
	-- Es el nombre del talle que usa el articulo
	iat_nombreArticuloTalle varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre del talle que usa el articulo',
	-- Es el identificador del articulo
	iat_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es la descripcion del talle
	iat_descripcionArticuloTalle text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion del talle',
	-- Es el identificador de el estado que se encuentra los registros
	iat_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es al fecha que se ingreso el registro
	iat_fechaIngreso datetime NOT NULL COMMENT 'Es al fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	iat_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	iat_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	-- 
	iat_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro
',
	-- Es el identificador de los usuarios
	iat_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifica el registro
	iat_motivoArticuloTalle text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifica el registro',
	PRIMARY KEY (iat_idArticuloTalle)
) COMMENT = 'Esta tabla guarda la informacion de los talle de los articul' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE inventario_articulos_talles_historial
(
	-- Es el identificador del historico de los talles
	iath_idArticuloTalleHistorial bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historico de los talles',
	-- Es el identificador de tipo de edicion
	iath_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	iath_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	iath_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el talle del articulo usado especialmente para ropa
	iath_idArticuloTalle bigint(200) NOT NULL COMMENT 'Es el talle del articulo usado especialmente para ropa',
	-- Es el historial del articulo talle
	iath_nombreArticuloTalle varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del articulo talle',
	-- Es el identificador del articulo
	iath_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el historico de la descripcion del talle
	iath_descripcionArticuloTalle text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historico de la descripcion del talle',
	-- Es el identificador de el estado que se encuentra los registros
	iath_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es historial del motivo por el cual se realizan los cambios
	iath_motivoArticuloTalle text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es historial del motivo por el cual se realizan los cambios',
	PRIMARY KEY (iath_idArticuloTalleHistorial)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla almacena la informacion de las marcas de los arti
CREATE TABLE inventario_marcas
(
	-- Es el identificador de la marca 
	im_idMarca int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la marca ',
	-- Es es el nombre de la marca 
	im_nombreMarca varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es es el nombre de la marca ',
	-- Es el logo de la marca
	im_logoMarca varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el logo de la marca',
	-- Es la descripon de la marca
	im_descripcionMarca text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripon de la marca',
	-- Es el identificador de el estado que se encuentra los registros
	im_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	im_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	im_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	im_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registros
	im_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	im_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registro
	im_motivoMarca text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro',
	PRIMARY KEY (im_idMarca)
) COMMENT = 'Esta tabla almacena la informacion de las marcas de los arti' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Tabla que guarda el historico de las marcas
CREATE TABLE inventario_marcas_historial
(
	-- Es el identificador del historial
	imh_idMarcaHistorial int(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial',
	-- Es el identificador de tipo de edicion
	imh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registros
	imh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registros',
	-- Es el identificador de los usuarios
	imh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la marca 
	imh_idMarca int(10) NOT NULL COMMENT 'Es el identificador de la marca ',
	-- Es el del nombre de la marca
	imh_nombreMarca varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el del nombre de la marca',
	-- Es el historial del logo de la marca
	-- 
	imh_logoMarca varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del logo de la marca
',
	-- Es el historial de la descripcion de la marca
	imh_descripcionMarca text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion de la marca',
	-- Es el identificador de el estado que se encuentra los registros
	imh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de los motivos de la marca
	imh_motivoMarca text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de los motivos de la marca',
	PRIMARY KEY (imh_idMarcaHistorial)
) COMMENT = 'Tabla que guarda el historico de las marcas' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion que llega desde los formula
CREATE TABLE mensajeria_contactos
(
	-- Es el identificador de el mensaje
	mc_idMensajeContacto bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de el mensaje',
	-- Es el primer nombre del contacto
	mc_nombreContacto varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el primer nombre del contacto',
	-- Es el apellido del contacto
	mc_apellidoContacto varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el apellido del contacto',
	-- Es el nombre de la empresa que se contacta
	mc_empresaContacto varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de la empresa que se contacta',
	-- Es el telefono al cual se le puede contactar
	mc_telefonoContacto varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el telefono al cual se le puede contactar',
	-- Es la direccion fisica del contacto
	mc_direccionContacto text COMMENT 'Es la direccion fisica del contacto',
	-- Es la direccion de coreo del contacto
	mc_mailContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la direccion de coreo del contacto',
	-- Es el cuerpo de el mensaje
	mc_mensajeContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el cuerpo de el mensaje',
	-- Es el identificador del pais
	mc_idPaisContacto int(4) COMMENT 'Es el identificador del pais',
	-- Es el identificador del subdivision mayor del pais
	mc_idSubdivisionGrande int(10) COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el identificador de la subdivision dos 
	mc_idSubdivisionChica int(15) COMMENT 'Es el identificador de la subdivision dos ',
	-- Es el identificador de la zona
	mc_idZona int(200) COMMENT 'Es el identificador de la zona',
	-- Es el identificador de el estado que se encuentra los registros
	mc_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	mc_fechaIngreso datetime COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	mc_idUsuarioIngreso int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	mc_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	mc_fechaEdicion datetime COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	mc_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registro
	mc_motivoContacto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro',
	PRIMARY KEY (mc_idMensajeContacto)
) COMMENT = 'Esta tabla guarda la informacion que llega desde los formula' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE mensajeria_mensajes_historial
(
	-- Es el identificador de el historial de las modificaciones de los mensajes 
	mmh_idMensajeHistorial bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de el historial de las modificaciones de los mensajes ',
	-- Es la fecha que se ingresa o se realiza cambios en el registros
	mmh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se ingresa o se realiza cambios en el registros',
	-- Es el identificador de el mensaje
	mc_idMensajeContacto bigint(255) COMMENT 'Es el identificador de el mensaje',
	-- Es el titulo de el mensaje
	mmh_titulo varchar(150) COMMENT 'Es el titulo de el mensaje',
	-- Es el mensaje a presentar
	mmh_mensaje text COMMENT 'Es el mensaje a presentar',
	-- ES el motivo por el cual se modifico el mensaje
	mmh_motivoMensaje text COMMENT 'ES el motivo por el cual se modifico el mensaje',
	PRIMARY KEY (mmh_idMensajeHistorial)
) DEFAULT CHARACTER SET utf8;


-- Es tabla guarda la informacion de los email que se suscriben
CREATE TABLE noticias_boletin_suscripciones
(
	-- Es el identificador de usarios que se suscribe al boletin
	nbs_idBoletinSus bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de usarios que se suscribe al boletin',
	-- Nombre completo de usario que se suscrive al boletin
	nbs_nombreBoletinSus text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre completo de usario que se suscrive al boletin',
	-- Mail de usario que se suscribe al boletin
	nbs_mailBoletinSus text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Mail de usario que se suscribe al boletin',
	-- Es el identificador de el estado que se encuentra los registros
	nbs_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que el usuario se suscribio al boletin
	nbs_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que el usuario se suscribio al boletin',
	-- Es el identificador de los usuarios
	nbs_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	nbs_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es el identificador de los usuarios
	nbs_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es la fecha que se edito el boletin
	nbs_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el boletin',
	-- Es el motivo por el cual se modifica el registro
	nbs_motivoBoletinSus text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifica el registro',
	PRIMARY KEY (nbs_idBoletinSus)
) COMMENT = 'Es tabla guarda la informacion de los email que se suscriben' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guardamos los moviemntos de las suscripciones de 
CREATE TABLE noticias_boletin_suscripciones_historial
(
	-- Es el identificador de la suscripcion al boletin
	nbsh_idBoletinSusHistorial bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la suscripcion al boletin',
	-- Es el identificador de tipo de edicion
	nbsh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizo el movimiento
	nbsh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se realizo el movimiento',
	-- Es el identificador de los usuarios
	nbsh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de usarios que se suscribe al boletin
	nbsh_idBoletinSus bigint(200) NOT NULL COMMENT 'Es el identificador de usarios que se suscribe al boletin',
	-- Es el nombre de la persona suscripta al  boletin
	nbsh_nombreBoletinSus text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de la persona suscripta al  boletin',
	-- Es el mail al cual va a llegar el boletin
	nbsh_mailBoletinSus text NOT NULL COMMENT 'Es el mail al cual va a llegar el boletin',
	-- Es el identificador de el estado que se encuentra los registros
	nbsh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de motivo del boletin
	nbsh_motivoBoletinSus text COMMENT 'Es el historial de motivo del boletin',
	PRIMARY KEY (nbsh_idBoletinSusHistorial)
) COMMENT = 'Esta tabla guardamos los moviemntos de las suscripciones de ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda los distintos tipos de carruceles a admini
CREATE TABLE noticias_carrusel
(
	-- Es el identificador del tipo de carrucel
	ncal_idCarrusel int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del tipo de carrucel',
	-- Es el nombre de los tipos de carrucel
	ncal_nombreCarrusel varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de los tipos de carrucel',
	-- Es la descripcion del tipo de carrusel a configurar
	ncal_descripcionCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion del tipo de carrusel a configurar',
	-- Es el identificador de el estado que se encuentra los registros
	ncal_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	ncal_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	ncal_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ncal_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro por ultima vez
	ncal_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro por ultima vez',
	-- Es el identificador de los usuarios
	ncal_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es la descripcion de la imagen que se esta viendo
	ncal_motivoCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la imagen que se esta viendo',
	PRIMARY KEY (ncal_idCarrusel)
) COMMENT = 'Esta tabla guarda los distintos tipos de carruceles a admini' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historial de los carruseles
CREATE TABLE noticias_carrusel_historial
(
	-- Es el identificador del historial de los tipos de carruseles  que hay en el sistema
	ncalh_idCarruselHistorial int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de los tipos de carruseles  que hay en el sistema',
	-- Es el identificador de tipo de edicion
	ncalh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	ncalh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	ncalh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del tipo de carrucel
	ncalh_idCarrusel int(3) NOT NULL COMMENT 'Es el identificador del tipo de carrucel',
	-- es el historial de lnombre del carrucel
	ncalh_nombreCarrusel varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'es el historial de lnombre del carrucel',
	-- Es el historial de la descripcion del tipo del carrusel
	ncalh_descripcionCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion del tipo del carrusel',
	-- Es el identificador de el estado que se encuentra los registros
	ncalh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de motivo por el cual se modifico el  carrucel
	ncalh_motivoCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de motivo por el cual se modifico el  carrucel',
	PRIMARY KEY (ncalh_idCarruselHistorial)
) COMMENT = 'Esta tabla guarda el historial de los carruseles' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta talba guarda la informacion de las imagenes para los di
CREATE TABLE noticias_carrusel_imagenes
(
	-- Es el identificador de la imagen que se guarda en el carrusel
	ncai_idImagenCarrusel int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la imagen que se guarda en el carrusel',
	-- Es el identificador del tipo de carrucel
	ncai_idCarrusel int(3) NOT NULL COMMENT 'Es el identificador del tipo de carrucel',
	-- Es la descruion de la imagen que esta subida
	ncai_descripcionImagenCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descruion de la imagen que esta subida',
	-- Es el nombre que se de le da a la imagen del carrusel
	ncai_nombreArchivo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre que se de le da a la imagen del carrusel',
	-- Es el link a donde deve redirigir la imagen puesta en el carrusel
	ncai_linkCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el link a donde deve redirigir la imagen puesta en el carrusel',
	-- Es el identificador de el estado que se encuentra los registros
	ncai_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fehca que se ingreso la imagen al carrusel
	ncai_fechaIngreso datetime NOT NULL COMMENT 'Es la fehca que se ingreso la imagen al carrusel',
	-- Es el identificador de los usuarios
	ncai_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ncai_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que edito por ultima ves la imagen
	ncai_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que edito por ultima ves la imagen',
	-- Es el identificador de los usuarios
	ncai_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	ncai_motivoImagenCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	PRIMARY KEY (ncai_idImagenCarrusel)
) COMMENT = 'Esta talba guarda la informacion de las imagenes para los di' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion historica de las imagenes d
CREATE TABLE noticias_carrusel_imagenes_historial
(
	-- Es el identificador del historial de las imagnes del carruseles
	ncaih_idImagenCarruselHistorial int(15) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de las imagnes del carruseles',
	-- Es el identificador de tipo de edicion
	ncaih_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	ncaih_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	ncaih_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- 
	-- 
	ncaih_idImagenCarrusel int(10) NOT NULL COMMENT '
',
	-- Es el identificador del tipo de carrucel
	ncaih_idCarrusel int(3) NOT NULL COMMENT 'Es el identificador del tipo de carrucel',
	-- Es el historial de la descrpcion de la imagen del carrusel
	ncaih_descripcionImagenCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descrpcion de la imagen del carrusel',
	-- Es el nombre de archivo que contiene la imagen del carrusel historica
	ncaih_nombreArchivo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de archivo que contiene la imagen del carrusel historica',
	-- Es historico del link donde el carrusel deve apuntar
	ncaih_linkCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es historico del link donde el carrusel deve apuntar',
	-- Es el identificador de el estado que se encuentra los registros
	ncaih_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historico del motivo de imagen de carrusel
	ncaih_motivoImagenCarrusel text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historico del motivo de imagen de carrusel',
	PRIMARY KEY (ncaih_idImagenCarruselHistorial)
) COMMENT = 'Esta tabla guarda la informacion historica de las imagenes d' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion de archivos que se suben co
CREATE TABLE noticias_catalogos
(
	-- Es el identificador de calago a subir
	nco_idCatalogo int(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de calago a subir',
	-- Es el nombre de el catalogo a subi
	nco_nombreCatalogo varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de el catalogo a subi',
	-- Es el nombre con cual se sube el archivo
	nco_nombreArchivo varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre con cual se sube el archivo',
	-- Es la descripcion del catalogo
	nco_descripcionCatalogo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion del catalogo',
	-- Es el identificador de el estado que se encuentra los registros
	nco_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	nco_fechaIngreso datetime COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	nco_idUsuarioIngreso int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	nco_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	nco_fechaEdicion datetime COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	nco_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se edito el registro
	nco_motivoCatalogo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se edito el registro',
	PRIMARY KEY (nco_idCatalogo)
) COMMENT = 'Esta tabla guarda la informacion de archivos que se suben co' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE noticias_catalogos_historial
(
	-- Es el identificador del historial del catalogo
	ncoh_idCatalogoHistorial int(150) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial del catalogo',
	-- Es el identificador de tipo de edicion
	ncoh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	ncoh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	ncoh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de calago a subir
	ncoh_idCatalogo int(100) NOT NULL COMMENT 'Es el identificador de calago a subir',
	-- Es el historial del nombre del catalogo
	ncoh_nombreCatalogo varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el historial del nombre del catalogo',
	-- Es el nombre del arvhivo del catalago
	ncoh_nombreArchivo varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre del arvhivo del catalago',
	ncoh_descripcionCatalogo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	-- Es el identificador de el estado que se encuentra los registros
	ncoh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se modifico el catalago
	ncoh_motivoCatalogo text COMMENT 'Es el motivo por el cual se modifico el catalago',
	PRIMARY KEY (ncoh_idCatalogoHistorial)
) DEFAULT CHARACTER SET utf8;


-- Esta tabla maneja la informacion de las noticias
CREATE TABLE noticias_noticias
(
	-- Es el identificador de la noticia
	nn_idNoticia bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la noticia',
	-- ES el titulo del encabezado de las noticias
	nn_tituloNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el titulo del encabezado de las noticias',
	-- Es la fecha que se realiza el evento
	nn_fechaEventoNoticia date COMMENT 'Es la fecha que se realiza el evento',
	-- Es el adelanto de la noticias sin formatos especiales.
	nn_adelantoNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el adelanto de la noticias sin formatos especiales.',
	-- Es el cuerpo donde se guarda el contenido principal de la noticia
	nn_cuerpoNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el cuerpo donde se guarda el contenido principal de la noticia',
	-- ES el lugar donde se extrajo la noticias
	nn_fuenteNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el lugar donde se extrajo la noticias',
	-- Es la direccion url donde se extrajo la noticia
	nn_urlFuenteNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la direccion url donde se extrajo la noticia',
	-- Es la foto principal de la noticia
	nn_fotoNoticia varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la foto principal de la noticia',
	-- Es el identificador de el estado que se encuentra los registros
	nn_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso la noticia
	nn_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso la noticia',
	-- Es el identificador de los usuarios
	nn_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	nn_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	nn_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de la accion que se puede realizar en el sistema
	nn_idUsuarioEdito int(5) NOT NULL COMMENT 'Es el identificador de la accion que se puede realizar en el sistema',
	-- Es el motivo por el cual se edito la noticia
	nn_motivoNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se edito la noticia',
	PRIMARY KEY (nn_idNoticia)
) COMMENT = 'Esta tabla maneja la informacion de las noticias' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla es el historico de las noticias
CREATE TABLE noticias_noticias_historial
(
	-- Es el identificador del historial de la noticia
	nnh_idNoticiaHistorial bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de la noticia',
	-- Es el identificador de tipo de edicion
	nnh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	nnh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	nnh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la noticia
	nnh_idNoticia bigint(200) NOT NULL COMMENT 'Es el identificador de la noticia',
	-- Es el titulo de la noticia
	nnh_tituloNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el titulo de la noticia',
	-- Es la fecha que se va a realizar el evento
	nnh_fechaEventoNoticia date COMMENT 'Es la fecha que se va a realizar el evento',
	-- Es el adelanto de la noticia
	nnh_adelantoNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el adelanto de la noticia',
	-- Es el historial del cuerpo principal de la noticia
	nnh_cuerpoNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del cuerpo principal de la noticia',
	-- Es el historial de la fuente de la noticia
	nnh_fuenteNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la fuente de la noticia',
	-- Es la url donde proviene la fuente de la noticia
	nnh_urlFuenteNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la url donde proviene la fuente de la noticia',
	-- Es la foto principal de la noticia
	nnh_fotoNoticia varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la foto principal de la noticia',
	-- Es el identificador de el estado que se encuentra los registros
	nnh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo cambios en la noticias
	nnh_motivoNoticia text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo cambios en la noticias',
	PRIMARY KEY (nnh_idNoticiaHistorial)
) COMMENT = 'Esta tabla es el historico de las noticias' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la inforacion de las distintas acciones qu
CREATE TABLE sistema_acciones
(
	-- Es el identificador de la accion que se puede realizar en el sistema
	sa_idAccion int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la accion que se puede realizar en el sistema',
	-- Esta tabla contiene los nombre de los permisos 
	sa_nombreAccion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Esta tabla contiene los nombre de los permisos ',
	-- Es el identicador de modulo
	sa_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el identificador de la gestion
	sa_idGestion int(5) NOT NULL COMMENT 'Es el identificador de la gestion',
	-- Es el parametro y la accion a ejecutar
	sa_parametroAccion varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el parametro y la accion a ejecutar',
	-- Este campo contiene la descripcion de las acciones del sistema
	sa_descripcionAccion text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Este campo contiene la descripcion de las acciones del sistema',
	PRIMARY KEY (sa_idAccion)
) COMMENT = 'Esta tabla guarda la inforacion de las distintas acciones qu' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla cuarda los distinto codigo de respuesta del siste
CREATE TABLE sistema_codigos_respuestas
(
	-- Es el numero identificador de codigo, Este mismo no es autoincremar sino asignado a mano
	scr_idCodigo varchar(5) NOT NULL COMMENT 'Es el numero identificador de codigo, Este mismo no es autoincremar sino asignado a mano',
	-- Es el nombre de el codigo
	scr_nombreCodigo varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de el codigo',
	scr_parametroCodigo varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
	-- es la descripcion de el codigo
	scr_descripcionCodigo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'es la descripcion de el codigo',
	-- Es el tipo de codigo 
	scr_tipoCodigo enum('positivo','negativo') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el tipo de codigo ',
	PRIMARY KEY (scr_idCodigo)
) COMMENT = 'Esta tabla cuarda los distinto codigo de respuesta del siste' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda los codigo iniciales de los campos de la t
CREATE TABLE sistema_codigo_campo_uruerp
(
	-- Es el identificador del codigo 
	sccu_idCodigo int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del codigo ',
	PRIMARY KEY (sccu_idCodigo)
) COMMENT = 'Esta tabla guarda los codigo iniciales de los campos de la t' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla tiene la informacion de los distintos estado que 
CREATE TABLE sistema_estados
(
	-- Es el identificador de el estado que se encuentra los registros
	se_idEstado int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el nombre de el estado
	se_nombreEstado varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de el estado',
	-- Es la descripcion de los estados de el sistema
	-- 
	se_descripcionEstado text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de los estados de el sistema
',
	PRIMARY KEY (se_idEstado)
) COMMENT = 'Esta tabla tiene la informacion de los distintos estado que ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarada la inforacion de las gestiones que hay en
CREATE TABLE sistema_gestiones
(
	-- Es el identificador de la gestion
	sg_idGestion int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la gestion',
	-- Es el nombre de la gestion
	sg_nombreGestion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de la gestion',
	-- Es el identicador de modulo
	sg_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el parametro que identifica la gestion que se esta trabajando
	sg_parametroGestion varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el parametro que identifica la gestion que se esta trabajando',
	-- Es la descripcion de la gestion
	sg_descripcionGestion text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la gestion',
	-- Es el identificador de el estado que se encuentra los registros
	sg_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	sg_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	sg_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	sg_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se ingreso el registro
	sg_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	sg_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo el cambio
	sg_motivoGestion text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (sg_idGestion)
) COMMENT = 'Esta tabla guarada la inforacion de las gestiones que hay en' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historial de las gestiones del sistema
CREATE TABLE sistema_gestiones_historial
(
	-- Es el identificador de registro de el historial
	sgh_idGestionHistorial int(6) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de registro de el historial',
	-- Es el identificador de tipo de edicion
	sgh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizo la modificacion
	-- 
	sgh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se realizo la modificacion
',
	-- Es el identificador de los usuarios
	sgh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la gestion
	sgh_idGestion int(5) NOT NULL COMMENT 'Es el identificador de la gestion',
	-- Es el Nombre de la gestion
	sgh_nombreGestion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el Nombre de la gestion',
	-- Es el identicador de modulo
	sgh_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	sgh_parametroGestion varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
	-- Es la descripcion de la gestion
	sgh_descripcionGestion text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la gestion',
	-- Es el identificador de el estado que se encuentra los registros
	sgh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio
	sgh_motivoGestion text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (sgh_idGestionHistorial)
) COMMENT = 'Esta tabla guarda el historial de las gestiones del sistema' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- En esta tabla se guarda el las entradas y salida del sistema
CREATE TABLE sistema_login
(
	-- Es el identificador del los registors del login
	sl_idLogin bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del los registors del login',
	-- Es el identificador de los usuarios
	sl_idUsuario int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	sl_horaLogin time NOT NULL,
	-- Es la fecha que pertenece el logeo
	sl_fechaLogin date NOT NULL COMMENT 'Es la fecha que pertenece el logeo',
	-- Es el tipo de movimiento de 
	sl_tipoLogin enum('Entrada','Salida','Descanso','Retorno', 'Error') NOT NULL COMMENT 'Es el tipo de movimiento de ',
	-- Es el identificador de el estado que se encuentra los registros
	sl_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	sl_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	sl_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	sl_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	sl_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	sl_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo el cambio
	sl_motivoLogin text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (sl_idLogin)
) COMMENT = 'En esta tabla se guarda el las entradas y salida del sistema' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla maneja los registros de los distintos modulos ins
CREATE TABLE sistema_modulos
(
	-- Es el identicador de modulo
	sm_idModulo int(4) NOT NULL AUTO_INCREMENT COMMENT 'Es el identicador de modulo',
	-- Es el nombre Oficial de el modiulo
	sm_nombreModulo varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre Oficial de el modiulo',
	-- Es el nombre de el paramatro que se envia para en los request y habilita a los permisos 
	sm_parametroModulo varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de el paramatro que se envia para en los request y habilita a los permisos ',
	-- Es la descripcion de el modulo
	sm_descripcionModulo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de el modulo',
	-- Es el estado que se encuentra el modulo dependiendo si se muestra en pantalla o si se puede acceder a sus funciones 
	-- 
	sm_idEstado int(3) NOT NULL COMMENT 'Es el estado que se encuentra el modulo dependiendo si se muestra en pantalla o si se puede acceder a sus funciones 
',
	-- Es la fecha que se ingreso el modulo
	sm_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el modulo',
	-- Es el identificador de tipo de edicion
	sm_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	sm_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	sm_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo la modificacion
	sm_motivoModulo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo la modificacion',
	PRIMARY KEY (sm_idModulo)
) COMMENT = 'Esta tabla maneja los registros de los distintos modulos ins' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se esncarga de guardar los historiales de los cam
CREATE TABLE sistema_modulos_historial
(
	-- Este el identificardor de el historial
	smh_idModuloHistorial int(5) NOT NULL AUTO_INCREMENT COMMENT 'Este el identificardor de el historial',
	-- Es el identificador de tipo de edicion
	smh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el registro de los modulos
	-- 
	smh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se modifico el registro de los modulos
',
	-- Es el identificador de los usuarios
	smh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identicador de modulo
	smh_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el nombre de el modulo
	smh_nombreModulo varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de el modulo',
	-- Es el nombre de el paramatro que se envia para en los request y habilita a los permisos 
	smh_parametroModulo varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de el paramatro que se envia para en los request y habilita a los permisos ',
	-- Es la descriopcion de el modulo
	smh_descripcionModulo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descriopcion de el modulo',
	-- Es el identificador de el estado que se encuentra los registros
	smh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realiza el cambio
	smh_motivoModulo text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realiza el cambio',
	PRIMARY KEY (smh_idModuloHistorial)
) COMMENT = 'Esta tabla se esncarga de guardar los historiales de los cam' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de administrar los tipo de edicion que
CREATE TABLE sistema_tipo_edicion
(
	-- Es el identificador de tipo de edicion
	ste_idTipoEdicion int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de tipo de edicion',
	-- Es el nombre que lleva la edicion 
	ste_nombreTipoEdicion varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre que lleva la edicion ',
	-- Es la descripcion de el registro
	ste_descripcion text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de el registro',
	PRIMARY KEY (ste_idTipoEdicion)
) COMMENT = 'Esta tabla se encarga de administrar los tipo de edicion que' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de administra los usuarios que funcion
CREATE TABLE sistema_usuarios
(
	-- Es el identificador de los usuarios
	su_idUsuario int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de los usuarios',
	su_nombreUsuario varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
	-- Es el mail de le usuario
	su_mailUsuario varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el mail de le usuario',
	-- Es la clave de el usuario la misma siempre se encuentra cifrada
	su_claveUsuario text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es la clave de el usuario la misma siempre se encuentra cifrada',
	-- Es el nombre de la imagen que utiliza el usaurio
	su_imagenUsuario varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de la imagen que utiliza el usaurio',
	-- Este campo se utiliza para la descriopcion de el usuario
	su_descripcionUsuario text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Este campo se utiliza para la descriopcion de el usuario',
	-- Es el identificador de el estado que se encuentra los registros
	su_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreo el registros y que usuario tiene permiso sobre el
	su_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreo el registros y que usuario tiene permiso sobre el',
	-- Es el identificador de los usuarios
	su_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	su_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizo el ultima modificacion
	su_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se realizo el ultima modificacion',
	-- Es el identificador de los usuarios
	su_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo el cambio en el registros
	su_motivoUsuario text COMMENT 'Es el motivo por el cual se realizo el cambio en el registros',
	-- Es el identificador que se utiliza para saber si un usuario es desarrollador o super administrador  importate por que todo el sistema se basa en esto
	su_poder enum('desarrollador','administrador','estandar','tester') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el identificador que se utiliza para saber si un usuario es desarrollador o super administrador  importate por que todo el sistema se basa en esto',
	PRIMARY KEY (su_idUsuario)
) COMMENT = 'Esta tabla se encarga de administra los usuarios que funcion' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion de la asociacion que tiene 
CREATE TABLE sistema_usuarios_asociacion_categorias
(
	-- Es el identificador que une la categoria 
	suac_idUsuarioAsociacionCategoria int(15) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador que une la categoria ',
	-- Es el identificador de los usuarios
	suac_idUsuario int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la categoria de usuarios
	suac_idUsuarioCategoria int(3) NOT NULL COMMENT 'Es el identificador de la categoria de usuarios',
	-- Es el identificador de el estado que se encuentra los registros
	suac_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registros
	suac_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registros',
	-- Es el identificador de los usuarios
	suac_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	suac_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el registros
	suac_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se modifico el registros',
	-- Es el identificador de los usuarios
	suac_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se ingreso el registros
	suac_motivoAsociacion text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se ingreso el registros',
	PRIMARY KEY (suac_idUsuarioAsociacionCategoria)
) COMMENT = 'Esta tabla guarda la informacion de la asociacion que tiene ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historial de la asociacion de los usuar
CREATE TABLE sistema_usuarios_asociacion_categorias_historial
(
	-- Es el identificador de la asocias categira
	suach_idUsuarioAsociacionCategoriaHistorial int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la asocias categira',
	-- Es el identificador de tipo de edicion
	suach_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizo el cambio
	suach_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se realizo el cambio',
	-- Es el identificador de los usuarios
	suach_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador que une la categoria 
	suach_idUsuarioAsociacionCategoria int(15) NOT NULL COMMENT 'Es el identificador que une la categoria ',
	-- Es el identificador de los usuarios
	suach_idUsuario int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de la categoria de usuarios
	suach_idUsuarioCategoria int(3) NOT NULL COMMENT 'Es el identificador de la categoria de usuarios',
	-- Es el identificador de el estado que se encuentra los registros
	suach_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio 
	suach_motivoAsociacion text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio ',
	PRIMARY KEY (suach_idUsuarioAsociacionCategoriaHistorial)
) COMMENT = 'Esta tabla guarda el historial de la asociacion de los usuar' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla Administra las categorias de los distintos usuari
CREATE TABLE sistema_usuarios_categorias
(
	-- Es el identificador de la categoria de usuarios
	suc_idUsuarioCategoria int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la categoria de usuarios',
	-- Es el nombre de la categoria de el usuario
	suc_nombreUsuarioCategoria varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de la categoria de el usuario',
	-- Es la descripcion de las categorias de los usuarios
	suc_descripcionUsuarioCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de las categorias de los usuarios',
	-- Es el identificador de el estado que se encuentra los registros
	suc_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso la categoria
	suc_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso la categoria',
	-- Es el identificador de los usuarios
	suc_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	suc_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	suc_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	suc_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo un cambio
	-- 
	suc_motivoUsuarioCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo un cambio
',
	PRIMARY KEY (suc_idUsuarioCategoria)
) COMMENT = 'Esta tabla Administra las categorias de los distintos usuari' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion del historial de las distin
CREATE TABLE sistema_usuarios_categorias_historial
(
	-- Es el identificador de la categoria historial
	such_idUsuariosCategoriasHistorial int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la categoria historial',
	-- Es el identificador de tipo de edicion
	such_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se ingresa el registro
	-- 
	such_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se ingresa el registro
',
	-- Es el identificador de los registros historiales de los usuarios
	such_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los registros historiales de los usuarios',
	-- Es el identificador de la categoria de usuarios
	such_idUsuarioCategoria int(3) NOT NULL COMMENT 'Es el identificador de la categoria de usuarios',
	-- es el nombre de la categoria de los usuarios
	such_nombreUsuarioCategoria varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'es el nombre de la categoria de los usuarios',
	-- Es la descripcion de la categoria de los usuarios
	such_descripcionUsuarioCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la categoria de los usuarios',
	-- Es el identificador de el estado que se encuentra los registros
	such_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio 
	such_motivoUsuarioCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio ',
	PRIMARY KEY (such_idUsuariosCategoriasHistorial)
) COMMENT = 'Esta tabla guarda la informacion del historial de las distin' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la inforacion de los permisos que pueden t
CREATE TABLE sistema_usuarios_categorias_permisos
(
	-- Es el identificador del permiso que tiene la categoria
	sucp_idPermisoCategoria bigint(15) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del permiso que tiene la categoria',
	-- Es el identificador de la categoria de usuarios
	sucp_idUsuarioCategoria int(3) NOT NULL COMMENT 'Es el identificador de la categoria de usuarios',
	-- Es el identicador de modulo
	sucp_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el identificador de la gestion
	sucp_idGestion int(5) NOT NULL COMMENT 'Es el identificador de la gestion',
	-- Es el identificador de la accion que se puede realizar en el sistema
	sucp_idAccion int(5) NOT NULL COMMENT 'Es el identificador de la accion que se puede realizar en el sistema',
	-- Es el identificador de el estado que se encuentra los registros
	sucp_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el egistro
	sucp_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el egistro',
	-- Es el identificador de los usuarios
	sucp_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	sucp_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	sucp_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	sucp_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo que por el cual se modifico el registro
	sucp_motivoPermisoCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo que por el cual se modifico el registro',
	PRIMARY KEY (sucp_idPermisoCategoria)
) COMMENT = 'Esta tabla guarda la inforacion de los permisos que pueden t' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historial de los permosos que contiene 
CREATE TABLE sistema_usuarios_categorias_permisos_historial
(
	-- Es el identificador del historial de permiso en la categoria
	sucph_idPermisoCategoriaHistoria bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial de permiso en la categoria',
	-- Es el identificador de tipo de edicion
	sucph_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	sucph_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	sucph_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del permiso que tiene la categoria
	sucph_idPermisoCategoria bigint(15) NOT NULL COMMENT 'Es el identificador del permiso que tiene la categoria',
	-- Es el identificador de la categoria de usuarios
	sucph_idUsuarioCategoria int(3) NOT NULL COMMENT 'Es el identificador de la categoria de usuarios',
	-- Es el identicador de modulo
	sucph_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el identificador de la gestion
	sucph_idGestion int(5) NOT NULL COMMENT 'Es el identificador de la gestion',
	-- Es el identificador de la accion que se puede realizar en el sistema
	sucph_idAccion int(5) NOT NULL COMMENT 'Es el identificador de la accion que se puede realizar en el sistema',
	-- Es el identificador de el estado que se encuentra los registros
	sucph_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- ES el motivo por el cual que se me modifico el registro
	sucph_motivoPermisoCategoria text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el motivo por el cual que se me modifico el registro',
	PRIMARY KEY (sucph_idPermisoCategoriaHistoria)
) COMMENT = 'Esta tabla guarda el historial de los permosos que contiene ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de guardar los cambios cambios que se 
CREATE TABLE sistema_usuarios_historial
(
	-- Es el identificador de los registros historiales de los usuarios
	suh_idUsuarioHistorial int(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de los registros historiales de los usuarios',
	-- Es el identificador de tipo de edicion
	suh_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se registro el registros 
	suh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se registro el registros ',
	-- Es el identificador de los usuarios
	suh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de los usuarios
	suh_idUsuario int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el nombre de el usuario
	suh_nombreUsuario varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre de el usuario',
	-- Es el mail utilizado por el usuario
	suh_mailUsuario varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el mail utilizado por el usuario',
	-- Es el avatar usado por el usuario
	suh_imagenUsuario varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el avatar usado por el usuario',
	-- Es la descipcion de los usuarios sirve para agregar atributos que no estan definidos
	-- 
	suh_descripcionUsuario text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descipcion de los usuarios sirve para agregar atributos que no estan definidos
',
	-- Es el identificador de el estado que se encuentra los registros
	suh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio
	-- 
	suh_motivoUsuario text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio
',
	-- Es el identificador que se utiliza para saber si un usuario es desarrollador o no es importate por que todo el sistema se basa en esto
	suh_poder enum('desarrollador','administrador','estandar','tester') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el identificador que se utiliza para saber si un usuario es desarrollador o no es importate por que todo el sistema se basa en esto',
	PRIMARY KEY (suh_idUsuarioHistorial)
) COMMENT = 'Esta tabla se encarga de guardar los cambios cambios que se ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de almacenar los permisos de los usuar
CREATE TABLE sistema_usuarios_permisos
(
	-- Es el identificar de permiso en el sistema
	-- 
	sup_idPermisoUsuario int(15) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificar de permiso en el sistema
',
	-- Es el identificador de los usuarios
	sup_idUsuario int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identicador de modulo
	sup_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el identificador de la gestion
	sup_idGestion int(5) NOT NULL COMMENT 'Es el identificador de la gestion',
	-- Es el permiso que tiene el usuario 
	sup_idAccion int(5) NOT NULL COMMENT 'Es el permiso que tiene el usuario ',
	-- Es el identificador de el estado que se encuentra el permiso
	-- 
	sup_idEstado  int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra el permiso
',
	-- Es la fecha que se ingreso el permiso
	-- 
	sup_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el permiso
',
	-- Es el identificador de los usuarios
	sup_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	sup_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- ES la fecha que se edito el registro
	sup_fechaEdicion datetime NOT NULL COMMENT 'ES la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	sup_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es la fecha que se edito el registro
	-- 
	sup_motivoPermisoUsuario text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la fecha que se edito el registro
',
	PRIMARY KEY (sup_idPermisoUsuario)
) COMMENT = 'Esta tabla se encarga de almacenar los permisos de los usuar' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla se encarga de almanezar la informacion de los dis
CREATE TABLE sistema_usuarios_permisos_historial
(
	-- Es el identificador de el historial de que asocia el usuario con el permiso en la gestion
	-- 
	suph_idPermisoUsuarioHistorial int(20) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de el historial de que asocia el usuario con el permiso en la gestion
',
	-- Es el identificador de el cambio que se genero en el registros
	-- 
	suph_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de el cambio que se genero en el registros
',
	-- Es la fecha que se ingreso el registro a el historial
	suph_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro a el historial',
	-- Es el identificador de los usuarios
	suph_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificar de permiso en el sistema
	-- 
	suph_idPermisoUsuario int(15) NOT NULL COMMENT 'Es el identificar de permiso en el sistema
',
	-- Es el identificador de los usuarios
	suph_idUsuario int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identicador de modulo
	suph_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el identificador de la gestion
	suph_idGestion int(5) NOT NULL COMMENT 'Es el identificador de la gestion',
	-- Es el identificador de la accion que se puede realizar en el sistema
	suph_idAccion int(5) NOT NULL COMMENT 'Es el identificador de la accion que se puede realizar en el sistema',
	-- Es el identificador de el estado que se encuentra los registros
	suph_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio
	suph_motivoPermisoUsuario text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (suph_idPermisoUsuarioHistorial)
) COMMENT = 'Esta tabla se encarga de almanezar la informacion de los dis' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- En esta tabla se guardan todas las transacciones que reaiza 
CREATE TABLE sistema_usuarios_transaccion
(
	-- Es el identificador de la transaccion realizada 
	sut_idTransaccionUsuario bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la transaccion realizada ',
	-- Es un codigo aleatoreamente se que genra para no repetir la transaccion
	stu_codigoTransaccion varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es un codigo aleatoreamente se que genra para no repetir la transaccion',
	-- Es el identificador de el usuario que realizo la transaccion
	sut_idUsuario int(10) NOT NULL COMMENT 'Es el identificador de el usuario que realizo la transaccion',
	-- Es el modulo que se intento relizar la transaccion
	sut_idModulo int(4) NOT NULL COMMENT 'Es el modulo que se intento relizar la transaccion',
	-- Es la gestion que se intento realizar la transaccion
	sut_idGestion int(5) NOT NULL COMMENT 'Es la gestion que se intento realizar la transaccion',
	-- Es el identificador de la accion que se puede realizar en el sistema
	sut_idAccion int(5) NOT NULL COMMENT 'Es el identificador de la accion que se puede realizar en el sistema',
	-- Es el registro que intento modificar el usuario no lleva llave foranea por que puede ser cualqueriera
	sut_idRegistro bigint(255) COMMENT 'Es el registro que intento modificar el usuario no lleva llave foranea por que puede ser cualqueriera',
	-- Es el codigo de respuesta de la transaccion
	sut_codigoRespuesta bigint(100) COMMENT 'Es el codigo de respuesta de la transaccion',
	-- Es el estado que se encuentra la transaccion
	sut_idEstado int(3) NOT NULL COMMENT 'Es el estado que se encuentra la transaccion',
	-- Es la fecha que se inicio la transaccion
	sut_fechaInicioTransaccion datetime NOT NULL COMMENT 'Es la fecha que se inicio la transaccion',
	-- Es la fecha que se competa la transaccion
	sut_fechaFinTransaccion datetime NOT NULL COMMENT 'Es la fecha que se competa la transaccion',
	-- Es el detalle de la transaccion es propio de el sistema
	sut_detalle text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el detalle de la transaccion es propio de el sistema',
	PRIMARY KEY (sut_idTransaccionUsuario)
) COMMENT = 'En esta tabla se guardan todas las transacciones que reaiza ' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- En esta tabla se gestionar  las cuotas de los socios
CREATE TABLE socios_cuotas
(
	-- Es el identificador de le registro de la cuota
	soc_idCuota bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de le registro de la cuota',
	-- ES el identificado de el socio
	soc_idSocio int(100) NOT NULL COMMENT 'ES el identificado de el socio',
	-- ES el identificador de identificas las categorias cuotas
	soc_idTipoCuota int(10) NOT NULL COMMENT 'ES el identificador de identificas las categorias cuotas',
	-- Es el identificador de la moneda por el momento no ha gestion asi que queda provisiocio este campo
	soc_idMoneda int(4) COMMENT 'Es el identificador de la moneda por el momento no ha gestion asi que queda provisiocio este campo',
	-- Es el valor de la cuota
	soc_precioCuota int(10) NOT NULL COMMENT 'Es el valor de la cuota',
	-- Es el identificador por el cual se va a utilizar el medio de pago
	soc_idMedioPago int(5) COMMENT 'Es el identificador por el cual se va a utilizar el medio de pago',
	-- ES el mes que pertence la cuota
	-- 
	soc_mesCuota int(2) NOT NULL COMMENT 'ES el mes que pertence la cuota
',
	-- Es el anio que pertenece a la cuota
	-- 
	soc_anioCuota year(4) NOT NULL COMMENT 'Es el anio que pertenece a la cuota
',
	-- Es la fecha que se vence la cuota
	soc_fechaVencimiento date COMMENT 'Es la fecha que se vence la cuota',
	-- Es la fecha que se pago la cuota
	soc_fechaPago date COMMENT 'Es la fecha que se pago la cuota',
	-- Es el identificador de el estado que se encuentra los registros
	soc_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	soc_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	soc_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	soc_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edit el registro
	soc_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edit el registro',
	-- Es el identificador de los usuarios
	soc_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifo el registro
	soc_motivoCuota text COMMENT 'Es el motivo por el cual se modifo el registro',
	PRIMARY KEY (soc_idCuota)
) COMMENT = 'En esta tabla se gestionar  las cuotas de los socios' DEFAULT CHARACTER SET utf8;


-- Esta tabla guarda la informacion unica del socio
-- EJ documen
CREATE TABLE socios_socios
(
	-- ES el identificado de el socio
	sos_idSocio int(100) NOT NULL AUTO_INCREMENT COMMENT 'ES el identificado de el socio',
	-- Es el numero de documento de el socio
	sos_documentoSocio varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el numero de documento de el socio',
	-- Es el identificador y llave de la persona
	sos_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- ES el identificador de identificas las categorias cuotas
	sos_idTipoCuota int(10) NOT NULL COMMENT 'ES el identificador de identificas las categorias cuotas',
	-- Es el identificador por el cual se va a utilizar el medio de pago
	sos_idMedioPago int(5) COMMENT 'Es el identificador por el cual se va a utilizar el medio de pago',
	-- ES al fecha que se pago la ultima cuota
	sos_ultimaCuotaPagaSocio datetime COMMENT 'ES al fecha que se pago la ultima cuota',
	-- Es el identificador de el estado que se encuentra los registros
	sos_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el socio
	sos_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el socio',
	-- Es el identificador de los usuarios
	sos_idUSuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	sos_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el ultimo dato de el socio
	sos_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se modifico el ultimo dato de el socio',
	-- Es el motivo por el cual se realizo algun cambio
	sos_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el motivo por el cual se realizo algun cambio',
	-- Es el motivo por el cual se esta realizando el cambio en el sistema
	sos_motivoSocio text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se esta realizando el cambio en el sistema',
	PRIMARY KEY (sos_idSocio)
) COMMENT = 'Esta tabla guarda la informacion unica del socio
EJ documen' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion en las modificaciones reali
CREATE TABLE socios_socios_historial
(
	-- Es el identificador de el historial de el socio
	sosh_idSociosHistorial bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de el historial de el socio',
	-- Es el identificador de tipo de edicion
	sosh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se realizao cambio en el registro
	sosh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se realizao cambio en el registro',
	-- Es el identificador de los usuarios
	sosh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- ES el identificado de el socio
	sosh_idSocio int(100) NOT NULL COMMENT 'ES el identificado de el socio',
	-- Es el historial del documento del socio
	sosh_documentoSocio varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el historial del documento del socio',
	-- Es el identificador y llave de la persona
	sosh_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- ES el identificador de identificas las categorias cuotas
	sosh_idTipoCuota int(10) NOT NULL COMMENT 'ES el identificador de identificas las categorias cuotas',
	-- Es el identificador por el cual se va a utilizar el medio de pago
	sosh_idMedioPago int(5) COMMENT 'Es el identificador por el cual se va a utilizar el medio de pago',
	-- Es el historial de la ultima uota paga
	sosh_ultimaCuotaPagaSocio datetime COMMENT 'Es el historial de la ultima uota paga',
	-- Es el identificador de el estado que se encuentra los registros
	sosh_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- es el historial de los motivos de los socios
	sosh_motivoSocio text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'es el historial de los motivos de los socios',
	PRIMARY KEY (sosh_idSociosHistorial)
) COMMENT = 'Esta tabla guarda la informacion en las modificaciones reali' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion de los distintos tipos de c
CREATE TABLE socios_tipos_cuotas
(
	-- ES el identificador de identificas las categorias cuotas
	sotc_idTipoCuota int(10) NOT NULL AUTO_INCREMENT COMMENT 'ES el identificador de identificas las categorias cuotas',
	-- Es el nombre Utilizado en el valor de la cuota
	sotc_nombreTipoCuota varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre Utilizado en el valor de la cuota',
	-- Es el valor de precio asignado para la cuota
	sotc_precioTipoCuota int(10) NOT NULL COMMENT 'Es el valor de precio asignado para la cuota',
	-- Es el identificador de la moneda con la se va a pagar
	sotc_idMoneda int(4) COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- ES la drescrion del tipo de la cuota que se va a abonar 
	sotc_descripcionTipoCuota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES la drescrion del tipo de la cuota que se va a abonar ',
	-- Es el identificador de el estado que se encuentra los registros
	sotc_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- ES la fecha que se ingreso el registro
	sotc_fechaIngreso datetime NOT NULL COMMENT 'ES la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	sotc_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	sotc_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- ES la fecha que se realizao la edicion de el registro 
	sotc_fechaEdicion datetime NOT NULL COMMENT 'ES la fecha que se realizao la edicion de el registro ',
	-- Es el identificador de los usuarios
	sotc_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	sotc_motivoTipoCuota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
	PRIMARY KEY (sotc_idTipoCuota)
) COMMENT = 'Esta tabla guarda la informacion de los distintos tipos de c' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda los cambios realizados a los tipos de cuot
CREATE TABLE socios_tipos_cuotas_historial
(
	-- ES el identificador del historial del tipo cuota
	sotch_idTipoCuotaHistorial int(15) NOT NULL AUTO_INCREMENT COMMENT 'ES el identificador del historial del tipo cuota',
	-- Es el identificador de tipo de edicion
	sotch_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es el historial de la fecha de edicion de los tipos de cuotas
	sotch_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es el historial de la fecha de edicion de los tipos de cuotas',
	-- Es el identificador de los usuarios
	sotch_idUSuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- ES el identificador de identificas las categorias cuotas
	sotch_idTipoCuota int(10) COMMENT 'ES el identificador de identificas las categorias cuotas',
	-- ES el historial de los nombre de las tipo cuotas
	sotch_nombreTipoCuota varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el historial de los nombre de las tipo cuotas',
	-- Es el historial de precio de los tipos de cuotas 
	sotch_precioTipoCuota int(10) COMMENT 'Es el historial de precio de los tipos de cuotas ',
	-- Es el identificador de la moneda con la se va a pagar
	sotch_idMoneda int(4) COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el historial de la descripcion de los tipo de cuotas
	sotch_descripcionTipoCuota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de la descripcion de los tipo de cuotas',
	-- Es el identificador de el estado que se encuentra los registros
	sotch_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial de motivo por el cual se realizao el cambio en las tipos de cuotas
	sotch_motivoTipoCuota text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial de motivo por el cual se realizao el cambio en las tipos de cuotas',
	PRIMARY KEY (sotch_idTipoCuotaHistorial)
) COMMENT = 'Esta tabla guarda los cambios realizados a los tipos de cuot' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda las distintas imagenes o fotos relacionada
CREATE TABLE tratamientos_imagenes
(
	-- Es el identificador de las imagenes de los tratamientos
	ti_idImagen bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de las imagenes de los tratamientos',
	-- Es el identificar del tratamiento realizado
	ti_idTratamiento bigint(200) NOT NULL COMMENT 'Es el identificar del tratamiento realizado',
	-- Es el nombre del archivo que guarda la imagenes
	ti_nombreImagen varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre del archivo que guarda la imagenes',
	-- Es la descripcion de la imagen que se esta viendo
	ti_descripcionImagen text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcion de la imagen que se esta viendo',
	-- Es el identificador de el estado que se encuentra los registros
	ti_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	ti_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	ti_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ti_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro por ultima ves
	ti_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro por ultima ves',
	-- Es el identificador de los usuarios
	ti_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registro
	ti_motivoImagen text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro',
	PRIMARY KEY (ti_idImagen)
) COMMENT = 'Esta tabla guarda las distintas imagenes o fotos relacionada' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Son los tipos de tratamientos que se pueden realizar
CREATE TABLE tratamientos_tipos
(
	-- Es el identificador del tipo de tratamiento
	tt_idTipoTratamiento int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del tipo de tratamiento',
	-- Es el nombre que llega la categoria del tratamiento
	tt_nombreTipoTratamiento varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es el nombre que llega la categoria del tratamiento',
	-- ES la descripcion de la categoria del tratamiento
	tt_descripcionTipoTratamiento text COMMENT 'ES la descripcion de la categoria del tratamiento',
	-- Es el identificador de el estado que se encuentra los registros
	tt_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- ES la fecha que se ingreso el registro
	tt_fechaIngreso datetime NOT NULL COMMENT 'ES la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	tt_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	tt_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	tt_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	tt_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se realizo el cambio en el tipo de tratamiento
	tt_motivoTipoTratamiento text COMMENT 'Es el motivo por el cual se realizo el cambio en el tipo de tratamiento',
	PRIMARY KEY (tt_idTipoTratamiento)
) COMMENT = 'Son los tipos de tratamientos que se pueden realizar' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la informacion historica de los tipos de t
CREATE TABLE tratamientos_tipos_historial
(
	-- Es el identificador de el historial de la categagoria del tratamiento
	tth_idTipoTratamientoHistorial int(15) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de el historial de la categagoria del tratamiento',
	-- Es el identificador de tipo de edicion
	tth_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	tth_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	tth_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador del tipo de tratamiento
	tth_idTipoTratamiento int(10) NOT NULL COMMENT 'Es el identificador del tipo de tratamiento',
	-- Es el nombre de la categoria del tratamiento
	tth_nombreTipoTratamiento varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nombre de la categoria del tratamiento',
	-- ES el historial de la descripcion de la categorias de los tratamientos 
	tth_descripcionTipoTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'ES el historial de la descripcion de la categorias de los tratamientos ',
	-- Es el identificador de el estado que se encuentra los registros
	tth_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el historial del motivo de los modificaciones de los registros
	tth_motivoTipoTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el historial del motivo de los modificaciones de los registros',
	PRIMARY KEY (tth_idTipoTratamientoHistorial)
) COMMENT = 'Esta tabla guarda la informacion historica de los tipos de t' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el tratamiento que se realizo
CREATE TABLE tratamientos_tratamientos
(
	-- Es el identificar del tratamiento realizado
	ttr_idTratamiento bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificar del tratamiento realizado',
	-- Es el identificador del tipo de tratamiento
	ttr_idTipoTratamiento int(10) NOT NULL COMMENT 'Es el identificador del tipo de tratamiento',
	-- Es el identificador y llave de la persona
	ttr_idContacto bigint(200) COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador de la mascota
	ttr_idMascota bigint(100) COMMENT 'Es el identificador de la mascota',
	-- Es la razon por el cual se solcita el tratamieto
	ttr_causaTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la razon por el cual se solcita el tratamieto',
	-- Es la descripcio de lo hechos en el tratamiento 
	ttr_diagnosticoTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la descripcio de lo hechos en el tratamiento ',
	-- Es tratamiento para curar los sintomas o la enfermedad
	ttr_solucionTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es tratamiento para curar los sintomas o la enfermedad',
	-- Es la fecha que se realiza el tratamiento
	ttr_fechaRealizacion date NOT NULL COMMENT 'Es la fecha que se realiza el tratamiento',
	-- Es la fecha que se vence el tratamiento
	ttr_fechaVencimiento date NOT NULL COMMENT 'Es la fecha que se vence el tratamiento',
	-- Es el identificador de el estado que se encuentra los registros
	ttr_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	ttr_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	ttr_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	ttr_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifica el registro
	ttr_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se modifica el registro',
	-- Es el identificador de los usuarios
	ttr_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se ralizo la modificacion
	-- 
	ttr_motivoTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se ralizo la modificacion
',
	PRIMARY KEY (ttr_idTratamiento)
) COMMENT = 'Esta tabla guarda el tratamiento que se realizo' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda el historial de los tratamientos
CREATE TABLE tratamientos_tratamientos_historial
(
	-- Es el identificador del historial
	ttrh_idTratamientosHistorial bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del historial',
	-- Es el identificador de tipo de edicion
	ttrh_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es el identificador y llave de la persona
	ttrh_idContacto bigint(200) COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador de la mascota
	ttrh_idMascota bigint(100) COMMENT 'Es el identificador de la mascota',
	-- Es en la cual se edito el registro
	ttrh_fechaEdicionHistorial datetime NOT NULL COMMENT 'Es en la cual se edito el registro',
	-- Es el identificador de los usuarios
	ttrh_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificar del tratamiento realizado
	ttrh_idTratamiento bigint(200) NOT NULL COMMENT 'Es el identificar del tratamiento realizado',
	-- Es el identificador del tipo de tratamiento
	ttrh_idTipoTratamiento int(10) NOT NULL COMMENT 'Es el identificador del tipo de tratamiento',
	-- Es la causa por el cual se lleva a realizar el tratamiento
	ttrh_causaTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la causa por el cual se lleva a realizar el tratamiento',
	-- Es lehistoria del diagnostico que se realizao al paciente
	ttrh_diagnosticoTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es lehistoria del diagnostico que se realizao al paciente',
	-- Es la solucion al problmea en si es el tratamiento
	ttrh_solucionTratamiento text COMMENT 'Es la solucion al problmea en si es el tratamiento',
	-- Es el historial de la fecha qeu se realizo el tratamiento
	ttrh_fechaRealizacion date NOT NULL COMMENT 'Es el historial de la fecha qeu se realizo el tratamiento',
	-- Es la fecha que se vence el tratamiento
	ttrh_fechaVencimiento date NOT NULL COMMENT 'Es la fecha que se vence el tratamiento',
	-- Es el identificador de el estado que se encuentra los registros
	ttrh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizaron cambios en el tratamiento
	ttrh_motivoTratamiento text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se realizaron cambios en el tratamiento',
	PRIMARY KEY (ttrh_idTratamientosHistorial)
) COMMENT = 'Esta tabla guarda el historial de los tratamientos' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla almacena si losmail fueron enviadoso no
CREATE TABLE ventas_envios_mail
(
	-- Es el identificador si se enviaron los mail por la compra
	vem_idEnvioMail bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador si se enviaron los mail por la compra',
	-- Es el identificador del carro
	vem_idOrden bigint(200) COMMENT 'Es el identificador del carro',
	-- Es el mail destinatario donde va llegar la informacion
	vem_destinatario text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el mail destinatario donde va llegar la informacion',
	-- Es el identificador de el estado que se encuentra los registros
	vem_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	vem_fechaIngreso int(10) COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	vem_idUsuarioIngreso int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	vem_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- Es el identificador de los usuarios
	vem_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el registro de envio del mail
	vem_motivoEnvioMail text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el registro de envio del mail',
	PRIMARY KEY (vem_idEnvioMail)
) COMMENT = 'Esta tabla almacena si losmail fueron enviadoso no' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla almacenas los distintos pedidos de carros
CREATE TABLE ventas_ordenes
(
	-- Es el identificador del carro
	vo_idOrden bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del carro',
	-- Es la fecha que pertenece la orden
	vo_fechaOrden date NOT NULL COMMENT 'Es la fecha que pertenece la orden',
	-- Es tipo de orden de donde se esta realizando que se esta realizando
	vo_tipoOrden enum('local','online') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Es tipo de orden de donde se esta realizando que se esta realizando',
	-- Es el identificador por el cual se va a utilizar el medio de pago
	vo_idMedioPago int(5) NOT NULL COMMENT 'Es el identificador por el cual se va a utilizar el medio de pago',
	-- Es el identificador y llave de la persona
	vo_idContacto bigint(200) NOT NULL COMMENT 'Es el identificador y llave de la persona',
	-- Es el identificador de la moneda con la se va a pagar
	vo_idMoneda int(4) COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el monto total sumando los productos
	vo_subTotalOrden float(100,2) NOT NULL COMMENT 'Es el monto total sumando los productos',
	-- Es el desuento que se le hace al total de la compra y es en porcentange sobre 
	vo_descuentosOrden float(3,2) NOT NULL COMMENT 'Es el desuento que se le hace al total de la compra y es en porcentange sobre ',
	-- Es el impuesto total que se esta abonando de los productos
	vo_impuestosOrden float(100,2) NOT NULL COMMENT 'Es el impuesto total que se esta abonando de los productos',
	-- Es la suma del subtotal + impuesto - el descuento aplicado
	vo_totalOrden float(100,2) NOT NULL COMMENT 'Es la suma del subtotal + impuesto - el descuento aplicado',
	-- Es informacion extra que no esta conteplada en los campos, como detalle de los de los impuestos y los dosdecuentos aplicados
	vo_detalleOrden text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es informacion extra que no esta conteplada en los campos, como detalle de los de los impuestos y los dosdecuentos aplicados',
	-- Es el identificador de el estado que se encuentra los registros
	vo_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	vo_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	vo_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	vo_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	vo_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	vo_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico la orden
	vo_motivoOrden text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico la orden',
	PRIMARY KEY (vo_idOrden)
) COMMENT = 'Esta tabla almacenas los distintos pedidos de carros' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


CREATE TABLE ventas_ordenes_envios
(
	-- Es el identificador de envio
	voe_idOrdenEnvio bigint(200) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de envio',
	-- Es el identificador del carro
	voe_idOrden bigint(200) COMMENT 'Es el identificador del carro',
	-- Es el identificador del pais
	voe_idPais int(4) COMMENT 'Es el identificador del pais',
	-- Es el identificador del subdivision mayor del pais
	voe_idSubdivisionGrande int(10) COMMENT 'Es el identificador del subdivision mayor del pais',
	-- Es el identificador de la subdivision dos 
	voe_idSubdivisionChica int(15) COMMENT 'Es el identificador de la subdivision dos ',
	-- Es el identificador de la zona
	voe_idZona int(200) COMMENT 'Es el identificador de la zona',
	-- Es la calle donde se va a envia el pedido
	voe_calleEnvio text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es la calle donde se va a envia el pedido',
	-- Es el nuemero de puerta donde va el envio
	voe_numero varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el nuemero de puerta donde va el envio',
	-- Es la esquina para mejor ubicaciones de la zona
	voe_esquinaEnvio text COMMENT 'Es la esquina para mejor ubicaciones de la zona',
	-- Es el identificador de el estado que se encuentra los registros
	voe_idEstado int(3) COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- es la fecha que se ingreso el registro
	voe_fechaIngreso datetime COMMENT 'es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	voe_idUsuarioIngreso int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	voe_idTipoEdicion int(3) COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se edito el registro
	voe_fechaEdicion datetime COMMENT 'Es la fecha que se edito el registro',
	-- Es el identificador de los usuarios
	voe_idUsuarioEdito int(10) COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifico el envio
	voe_motivoEnvio text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifico el envio',
	PRIMARY KEY (voe_idOrdenEnvio)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;


-- Esta tabla guarda la inforamcion de los productos que se ens
CREATE TABLE ventas_ordenes_productos
(
	-- Es el identificador de los productos de las ventas
	vop_idProducto bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de los productos de las ventas',
	-- Es el identificador del carro
	vop_idOrden bigint(200) NOT NULL COMMENT 'Es el identificador del carro',
	-- Es el identificador del articulo
	vop_idArticulo int(100) NOT NULL COMMENT 'Es el identificador del articulo',
	-- Es el identificador de la moneda con la se va a pagar
	vop_idMoneda int(4) COMMENT 'Es el identificador de la moneda con la se va a pagar',
	-- Es el precio del articulo 
	vop_precioProducto float(100,2) NOT NULL COMMENT 'Es el precio del articulo ',
	-- Es la cantidad de articulos que tiene la compra
	vop_cantidadProducto int(20) NOT NULL COMMENT 'Es la cantidad de articulos que tiene la compra',
	-- Es el sub total de la cantidad producto y los precios 
	vop_subTotalProducto float(100,2) NOT NULL COMMENT 'Es el sub total de la cantidad producto y los precios ',
	-- Es el descunto que se el hace al articulo
	vop_descuentosProducto float(10,2) NOT NULL COMMENT 'Es el descunto que se el hace al articulo',
	-- Es el total de impuestos abonado por ese producto
	vop_impuestosProducto float(100,2) NOT NULL COMMENT 'Es el total de impuestos abonado por ese producto',
	-- Es el total de las ventas realizadas por el ese producto. Se calcula multiplicando el precio por la cantidad mas los impuestos
	vop_totalProducto float(100,10) NOT NULL COMMENT 'Es el total de las ventas realizadas por el ese producto. Se calcula multiplicando el precio por la cantidad mas los impuestos',
	-- Es el identificador de el estado que se encuentra los registros
	vop_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es la fecha que se ingreso el registro
	vop_fechaIngreso datetime NOT NULL COMMENT 'Es la fecha que se ingreso el registro',
	-- Es el identificador de los usuarios
	vop_idUsuarioIngreso int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el identificador de tipo de edicion
	vop_idTipoEdicion int(3) NOT NULL COMMENT 'Es el identificador de tipo de edicion',
	-- Es la fecha que se modifico el registro
	vop_fechaEdicion datetime NOT NULL COMMENT 'Es la fecha que se modifico el registro',
	-- Es el identificador de los usuarios
	vop_idUsuarioEdito int(10) NOT NULL COMMENT 'Es el identificador de los usuarios',
	-- Es el motivo por el cual se modifoco el producto
	vop_motivoProducto text CHARACTER SET utf8 COLLATE utf8_spanish2_ci COMMENT 'Es el motivo por el cual se modifoco el producto',
	PRIMARY KEY (vop_idProducto)
) COMMENT = 'Esta tabla guarda la inforamcion de los productos que se ens' DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;



/* Create Foreign Keys */

ALTER TABLE agenda_contactos_compromisos
	ADD FOREIGN KEY (acc_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos_historial
	ADD FOREIGN KEY (acch_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras
	ADD FOREIGN KEY (ace_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras_historial
	ADD FOREIGN KEY (aceh_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_historial
	ADD FOREIGN KEY (ach_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas
	ADD FOREIGN KEY (acl_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas_historial
	ADD FOREIGN KEY (aclh_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas
	ADD FOREIGN KEY (acn_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas_historial
	ADD FOREIGN KEY (acnh_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas
	ADD FOREIGN KEY (anm_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas_historial
	ADD FOREIGN KEY (anmh_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes
	ADD FOREIGN KEY (cc_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes_historial
	ADD FOREIGN KEY (cch_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web
	ADD FOREIGN KEY (euw_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web_historial
	ADD FOREIGN KEY (euhw_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios
	ADD FOREIGN KEY (sos_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios_historial
	ADD FOREIGN KEY (sosh_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos
	ADD FOREIGN KEY (ttr_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos_historial
	ADD FOREIGN KEY (ttrh_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes
	ADD FOREIGN KEY (vo_idContacto)
	REFERENCES agenda_contactos (ac_idContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos_historial
	ADD FOREIGN KEY (acch_idCompromiso)
	REFERENCES agenda_contactos_compromisos (acc_idCompromiso)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras_historial
	ADD FOREIGN KEY (aceh_idContactoExtra)
	REFERENCES agenda_contactos_extras (ace_idContactoExtra)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas_historial
	ADD FOREIGN KEY (aclh_idContantoLlamada)
	REFERENCES agenda_contactos_llamadas (acl_idContactoLlamada)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas_historial
	ADD FOREIGN KEY (acnh_idNota)
	REFERENCES agenda_contactos_notas (acn_idNota)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idResidencia)
	REFERENCES agenda_contactos_residencias (acr_idResidencia)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_especies_historial
	ADD FOREIGN KEY (aneh_idEspecie)
	REFERENCES animales_especies (ane_idEspecie)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas
	ADD FOREIGN KEY (anm_idEspecie)
	REFERENCES animales_especies (ane_idEspecie)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas_historial
	ADD FOREIGN KEY (anmh_idEspecie)
	REFERENCES animales_especies (ane_idEspecie)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas
	ADD FOREIGN KEY (anr_idEspecie)
	REFERENCES animales_especies (ane_idEspecie)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas_historial
	ADD FOREIGN KEY (anrh_idEspecie)
	REFERENCES animales_especies (ane_idEspecie)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas_historial
	ADD FOREIGN KEY (anmh_idMascota)
	REFERENCES animales_mascotas (anm_idMascota)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos
	ADD FOREIGN KEY (ttr_idMascota)
	REFERENCES animales_mascotas (anm_idMascota)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos_historial
	ADD FOREIGN KEY (ttrh_idMascota)
	REFERENCES animales_mascotas (anm_idMascota)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas
	ADD FOREIGN KEY (anm_idRaza)
	REFERENCES animales_razas (anr_idRaza)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas_historial
	ADD FOREIGN KEY (anmh_idRaza)
	REFERENCES animales_razas (anr_idRaza)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas_historial
	ADD FOREIGN KEY (anrh_idRaza)
	REFERENCES animales_razas (anr_idRaza)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE caja_cierre_dia_historial
	ADD FOREIGN KEY (cacdh_idCierreDia)
	REFERENCES cajas_cierre_dia (cacd_idCierreDia)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos_historial
	ADD FOREIGN KEY (camh_idMovimiento)
	REFERENCES cajas_movimientos (cam_idMovimiento)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_categorias_historial
	ADD FOREIGN KEY (ccah_idClienteCategoria)
	REFERENCES clientes_categorias (cca_idClienteCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes
	ADD FOREIGN KEY (cc_idClienteCategoria)
	REFERENCES clientes_categorias (cca_idClienteCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes_historial
	ADD FOREIGN KEY (cch_idClienteCategoria)
	REFERENCES clientes_categorias (cca_idClienteCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios
	ADD FOREIGN KEY (iapr_idClienteCategoria)
	REFERENCES clientes_categorias (cca_idClienteCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios_historial
	ADD FOREIGN KEY (iaprh_idClienteCategoria)
	REFERENCES clientes_categorias (cca_idClienteCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes_historial
	ADD FOREIGN KEY (cch_idCliente)
	REFERENCES clientes_clientes (cc_idCliente)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web_historial
	ADD FOREIGN KEY (euwh_idUsuarioWeb)
	REFERENCES externo_usuarios_web (euw_idUsuarioWeb)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_impuestos_historial
	ADD FOREIGN KEY (fih_idImpuesto)
	REFERENCES finanzas_impuestos (fi_idImpuesto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_medios_pagos_historial
	ADD FOREIGN KEY (fmph_idMedioPago)
	REFERENCES finanzas_medios_pagos (fmp_idMedioPago)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_cuotas
	ADD FOREIGN KEY (soc_idMedioPago)
	REFERENCES finanzas_medios_pagos (fmp_idMedioPago)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios
	ADD FOREIGN KEY (sos_idMedioPago)
	REFERENCES finanzas_medios_pagos (fmp_idMedioPago)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios_historial
	ADD FOREIGN KEY (sosh_idMedioPago)
	REFERENCES finanzas_medios_pagos (fmp_idMedioPago)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes
	ADD FOREIGN KEY (vo_idMedioPago)
	REFERENCES finanzas_medios_pagos (fmp_idMedioPago)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_cierre_dia
	ADD FOREIGN KEY (cacd_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos
	ADD FOREIGN KEY (cam_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos_historial
	ADD FOREIGN KEY (camh_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_monedas_historial
	ADD FOREIGN KEY (fmh_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos
	ADD FOREIGN KEY (ia_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_historial
	ADD FOREIGN KEY (iah_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios
	ADD FOREIGN KEY (iapr_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios_historial
	ADD FOREIGN KEY (iaprh_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_cuotas
	ADD FOREIGN KEY (soc_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas
	ADD FOREIGN KEY (sotc_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas_historial
	ADD FOREIGN KEY (sotch_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes
	ADD FOREIGN KEY (vo_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_productos
	ADD FOREIGN KEY (vop_idMoneda)
	REFERENCES finanzas_monedas (fm_idMoneda)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_paises_historial
	ADD FOREIGN KEY (gph_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas
	ADD FOREIGN KEY (gsc_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas_historial
	ADD FOREIGN KEY (gsch_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes
	ADD FOREIGN KEY (gsg_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes_historial
	ADD FOREIGN KEY (gsgh_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas
	ADD FOREIGN KEY (gz_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas_historial
	ADD FOREIGN KEY (gzh_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_contactos
	ADD FOREIGN KEY (mc_idPaisContacto)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idPais)
	REFERENCES geolocalizacion_paises (gp_idPais)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idSubdivisionChica)
	REFERENCES geolocalizacion_subdivisiones_chicas (gsc_idSubdivisionChica)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idSubdivisionChica)
	REFERENCES geolocalizacion_subdivisiones_chicas (gsc_idSubdivisionChica)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas_historial
	ADD FOREIGN KEY (gsch_idSubdivisionChica)
	REFERENCES geolocalizacion_subdivisiones_chicas (gsc_idSubdivisionChica)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas
	ADD FOREIGN KEY (gz_idSubdivisionChica)
	REFERENCES geolocalizacion_subdivisiones_chicas (gsc_idSubdivisionChica)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas_historial
	ADD FOREIGN KEY (gzh_idSubdivisionChica)
	REFERENCES geolocalizacion_subdivisiones_chicas (gsc_idSubdivisionChica)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_contactos
	ADD FOREIGN KEY (mc_idSubdivisionChica)
	REFERENCES geolocalizacion_subdivisiones_chicas (gsc_idSubdivisionChica)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idSubdivisionChica)
	REFERENCES geolocalizacion_subdivisiones_chicas (gsc_idSubdivisionChica)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas
	ADD FOREIGN KEY (gsc_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas_historial
	ADD FOREIGN KEY (gsch_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes_historial
	ADD FOREIGN KEY (gsgh_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas
	ADD FOREIGN KEY (gz_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas_historial
	ADD FOREIGN KEY (gzh_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_contactos
	ADD FOREIGN KEY (mc_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idSubdivisionGrande)
	REFERENCES geolocalizacion_subdivisiones_grandes (gsg_idSubdivisionGrande)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idZona)
	REFERENCES geolocalizacion_zonas (gz_idZona)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idZona)
	REFERENCES geolocalizacion_zonas (gz_idZona)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas_historial
	ADD FOREIGN KEY (gzh_idZona)
	REFERENCES geolocalizacion_zonas (gz_idZona)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_contactos
	ADD FOREIGN KEY (mc_idZona)
	REFERENCES geolocalizacion_zonas (gz_idZona)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idZona)
	REFERENCES geolocalizacion_zonas (gz_idZona)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias
	ADD FOREIGN KEY (iaac_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias_historial
	ADD FOREIGN KEY (iaach_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades
	ADD FOREIGN KEY (iaap_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades_historial
	ADD FOREIGN KEY (iaaph_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores
	ADD FOREIGN KEY (iaco_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores_historial
	ADD FOREIGN KEY (iacoh_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_fotos
	ADD FOREIGN KEY (iaf_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_historial
	ADD FOREIGN KEY (iah_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_movimientos_stock
	ADD FOREIGN KEY (iams_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios
	ADD FOREIGN KEY (iapr_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios_historial
	ADD FOREIGN KEY (iaprh_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles
	ADD FOREIGN KEY (iat_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles_historial
	ADD FOREIGN KEY (iath_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_productos
	ADD FOREIGN KEY (vop_idArticulo)
	REFERENCES inventario_articulos (ia_idArticulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias_historial
	ADD FOREIGN KEY (iaach_idArticuloAsociacionCategoria)
	REFERENCES inventario_articulos_asociacion_categorias (iaac_idArticuloAsociacionCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades_historial
	ADD FOREIGN KEY (iaaph_idArticuloAsociacionPropiedad)
	REFERENCES inventario_articulos_asociacion_propiedades (iaap_idArticuloAsociacionPropiedad)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias
	ADD FOREIGN KEY (iaac_idArticuloCategoria)
	REFERENCES inventario_articulos_categorias (iac_idArticuloCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias_historial
	ADD FOREIGN KEY (iaach_idArticuloCategoria)
	REFERENCES inventario_articulos_categorias (iac_idArticuloCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_categorias_historial
	ADD FOREIGN KEY (iach_idArticuloCategoria)
	REFERENCES inventario_articulos_categorias (iac_idArticuloCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores_historial
	ADD FOREIGN KEY (iacoh_idArticuloColor)
	REFERENCES inventario_articulos_colores (iaco_idArticuloColor)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_movimientos_stock
	ADD FOREIGN KEY (iams_idArticuloColor)
	REFERENCES inventario_articulos_colores (iaco_idArticuloColor)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_stock
	ADD FOREIGN KEY (ias_idArticuloColor)
	REFERENCES inventario_articulos_colores (iaco_idArticuloColor)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_stock
	ADD FOREIGN KEY (ias_idArticulo)
	REFERENCES inventario_articulos_historial (iah_idArticuloHistorial)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios_historial
	ADD FOREIGN KEY (iaprh_idArticuloPrecio)
	REFERENCES inventario_articulos_precios (iapr_idArticuloPrecio)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades
	ADD FOREIGN KEY (iaap_idArticuloPropiedad)
	REFERENCES inventario_articulos_propiedades (iap_idArticuloPropiedad)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades_historial
	ADD FOREIGN KEY (iaaph_idArticuloPropiedad)
	REFERENCES inventario_articulos_propiedades (iap_idArticuloPropiedad)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_propiedades_historial
	ADD FOREIGN KEY (iaph_idArticuloPropiedad)
	REFERENCES inventario_articulos_propiedades (iap_idArticuloPropiedad)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_movimientos_stock
	ADD FOREIGN KEY (iams_idArticuloTalle)
	REFERENCES inventario_articulos_talles (iat_idArticuloTalle)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios
	ADD FOREIGN KEY (iapr_idArticuloTalle)
	REFERENCES inventario_articulos_talles (iat_idArticuloTalle)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios_historial
	ADD FOREIGN KEY (iaprh_idArticuloTalle)
	REFERENCES inventario_articulos_talles (iat_idArticuloTalle)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_stock
	ADD FOREIGN KEY (ias_idArticuloTalle)
	REFERENCES inventario_articulos_talles (iat_idArticuloTalle)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles_historial
	ADD FOREIGN KEY (iath_idArticuloTalle)
	REFERENCES inventario_articulos_talles (iat_idArticuloTalle)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos
	ADD FOREIGN KEY (ia_idMarca)
	REFERENCES inventario_marcas (im_idMarca)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_historial
	ADD FOREIGN KEY (iah_idMarca)
	REFERENCES inventario_marcas (im_idMarca)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_marcas_historial
	ADD FOREIGN KEY (imh_idMarca)
	REFERENCES inventario_marcas (im_idMarca)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_mensajes_historial
	ADD FOREIGN KEY (mc_idMensajeContacto)
	REFERENCES mensajeria_contactos (mc_idMensajeContacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_boletin_suscripciones_historial
	ADD FOREIGN KEY (nbsh_idBoletinSus)
	REFERENCES noticias_boletin_suscripciones (nbs_idBoletinSus)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_historial
	ADD FOREIGN KEY (ncalh_idCarrusel)
	REFERENCES noticias_carrusel (ncal_idCarrusel)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes
	ADD FOREIGN KEY (ncai_idCarrusel)
	REFERENCES noticias_carrusel (ncal_idCarrusel)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes_historial
	ADD FOREIGN KEY (ncaih_idCarrusel)
	REFERENCES noticias_carrusel (ncal_idCarrusel)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes_historial
	ADD FOREIGN KEY (ncaih_idImagenCarrusel)
	REFERENCES noticias_carrusel_imagenes (ncai_idImagenCarrusel)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_catalogos_historial
	ADD FOREIGN KEY (ncoh_idCatalogo)
	REFERENCES noticias_catalogos (nco_idCatalogo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_noticias_historial
	ADD FOREIGN KEY (nnh_idNoticia)
	REFERENCES noticias_noticias (nn_idNoticia)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_noticias
	ADD FOREIGN KEY (nn_idUsuarioEdito)
	REFERENCES sistema_acciones (sa_idAccion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos
	ADD FOREIGN KEY (sucp_idAccion)
	REFERENCES sistema_acciones (sa_idAccion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos_historial
	ADD FOREIGN KEY (sucph_idAccion)
	REFERENCES sistema_acciones (sa_idAccion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos
	ADD FOREIGN KEY (sup_idAccion)
	REFERENCES sistema_acciones (sa_idAccion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos_historial
	ADD FOREIGN KEY (suph_idAccion)
	REFERENCES sistema_acciones (sa_idAccion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_transaccion
	ADD FOREIGN KEY (sut_idAccion)
	REFERENCES sistema_acciones (sa_idAccion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos
	ADD FOREIGN KEY (ac_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos
	ADD FOREIGN KEY (acc_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos_historial
	ADD FOREIGN KEY (acch_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras
	ADD FOREIGN KEY (ace_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras_historial
	ADD FOREIGN KEY (aceh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_historial
	ADD FOREIGN KEY (ach_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas
	ADD FOREIGN KEY (acl_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas_historial
	ADD FOREIGN KEY (aclh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas
	ADD FOREIGN KEY (acn_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas_historial
	ADD FOREIGN KEY (acnh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_especies
	ADD FOREIGN KEY (ane_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_especies_historial
	ADD FOREIGN KEY (aneh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas
	ADD FOREIGN KEY (anm_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas_historial
	ADD FOREIGN KEY (anmh_idEStado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas
	ADD FOREIGN KEY (anr_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas_historial
	ADD FOREIGN KEY (anrh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_cierre_dia
	ADD FOREIGN KEY (cacd_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos
	ADD FOREIGN KEY (cam_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos_historial
	ADD FOREIGN KEY (camh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE caja_cierre_dia_historial
	ADD FOREIGN KEY (cacdh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_categorias
	ADD FOREIGN KEY (cca_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_categorias_historial
	ADD FOREIGN KEY (ccah_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes
	ADD FOREIGN KEY (cc_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes_historial
	ADD FOREIGN KEY (cch_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web
	ADD FOREIGN KEY (euw_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web_historial
	ADD FOREIGN KEY (euwh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_impuestos
	ADD FOREIGN KEY (fi_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_impuestos_historial
	ADD FOREIGN KEY (fih_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_medios_pagos
	ADD FOREIGN KEY (fmp_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_medios_pagos_historial
	ADD FOREIGN KEY (fmph_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_monedas
	ADD FOREIGN KEY (fm_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_monedas_historial
	ADD FOREIGN KEY (fmh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_paises
	ADD FOREIGN KEY (gp_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_paises_historial
	ADD FOREIGN KEY (gph_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas
	ADD FOREIGN KEY (gsc_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas_historial
	ADD FOREIGN KEY (gsch_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes
	ADD FOREIGN KEY (gsg_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes_historial
	ADD FOREIGN KEY (gsgh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas
	ADD FOREIGN KEY (gz_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas_historial
	ADD FOREIGN KEY (gzh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos
	ADD FOREIGN KEY (ia_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias
	ADD FOREIGN KEY (iaac_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias_historial
	ADD FOREIGN KEY (iaach_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades
	ADD FOREIGN KEY (iaap_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades_historial
	ADD FOREIGN KEY (iaaph_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_categorias
	ADD FOREIGN KEY (iac_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_categorias_historial
	ADD FOREIGN KEY (iach_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores
	ADD FOREIGN KEY (iaco_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores_historial
	ADD FOREIGN KEY (iacoh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_fotos
	ADD FOREIGN KEY (iaf_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_historial
	ADD FOREIGN KEY (iah_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_movimientos_stock
	ADD FOREIGN KEY (iams_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios
	ADD FOREIGN KEY (iapr_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios_historial
	ADD FOREIGN KEY (iaprh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_propiedades
	ADD FOREIGN KEY (iap_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_propiedades_historial
	ADD FOREIGN KEY (iaph_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_stock
	ADD FOREIGN KEY (ias_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles
	ADD FOREIGN KEY (iat_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles_historial
	ADD FOREIGN KEY (iath_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_marcas
	ADD FOREIGN KEY (im_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_marcas_historial
	ADD FOREIGN KEY (imh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_contactos
	ADD FOREIGN KEY (mc_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_boletin_suscripciones
	ADD FOREIGN KEY (nbs_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_boletin_suscripciones_historial
	ADD FOREIGN KEY (nbsh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel
	ADD FOREIGN KEY (ncal_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_historial
	ADD FOREIGN KEY (ncalh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes
	ADD FOREIGN KEY (ncai_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes_historial
	ADD FOREIGN KEY (ncaih_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_catalogos
	ADD FOREIGN KEY (nco_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_catalogos_historial
	ADD FOREIGN KEY (ncoh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_noticias
	ADD FOREIGN KEY (nn_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_noticias_historial
	ADD FOREIGN KEY (nnh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones
	ADD FOREIGN KEY (sg_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones_historial
	ADD FOREIGN KEY (sgh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_login
	ADD FOREIGN KEY (sl_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_modulos
	ADD FOREIGN KEY (sm_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_modulos_historial
	ADD FOREIGN KEY (smh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios
	ADD FOREIGN KEY (su_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias
	ADD FOREIGN KEY (suac_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias_historial
	ADD FOREIGN KEY (suach_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias
	ADD FOREIGN KEY (suc_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_historial
	ADD FOREIGN KEY (such_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos
	ADD FOREIGN KEY (sucp_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos_historial
	ADD FOREIGN KEY (sucph_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_historial
	ADD FOREIGN KEY (suh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos
	ADD FOREIGN KEY (sup_idEstado )
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos_historial
	ADD FOREIGN KEY (suph_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_transaccion
	ADD FOREIGN KEY (sut_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_cuotas
	ADD FOREIGN KEY (soc_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios
	ADD FOREIGN KEY (sos_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios_historial
	ADD FOREIGN KEY (sosh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas
	ADD FOREIGN KEY (sotc_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas_historial
	ADD FOREIGN KEY (sotch_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_imagenes
	ADD FOREIGN KEY (ti_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tipos
	ADD FOREIGN KEY (tt_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tipos_historial
	ADD FOREIGN KEY (tth_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos
	ADD FOREIGN KEY (ttr_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos_historial
	ADD FOREIGN KEY (ttrh_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_envios_mail
	ADD FOREIGN KEY (vem_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes
	ADD FOREIGN KEY (vo_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_productos
	ADD FOREIGN KEY (vop_idEstado)
	REFERENCES sistema_estados (se_idEstado)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_acciones
	ADD FOREIGN KEY (sa_idGestion)
	REFERENCES sistema_gestiones (sg_idGestion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones_historial
	ADD FOREIGN KEY (sgh_idGestion)
	REFERENCES sistema_gestiones (sg_idGestion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos
	ADD FOREIGN KEY (sucp_idGestion)
	REFERENCES sistema_gestiones (sg_idGestion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos_historial
	ADD FOREIGN KEY (sucph_idGestion)
	REFERENCES sistema_gestiones (sg_idGestion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos
	ADD FOREIGN KEY (sup_idGestion)
	REFERENCES sistema_gestiones (sg_idGestion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos_historial
	ADD FOREIGN KEY (suph_idGestion)
	REFERENCES sistema_gestiones (sg_idGestion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_transaccion
	ADD FOREIGN KEY (sut_idGestion)
	REFERENCES sistema_gestiones (sg_idGestion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_acciones
	ADD FOREIGN KEY (sa_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones
	ADD FOREIGN KEY (sg_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones_historial
	ADD FOREIGN KEY (sgh_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_modulos_historial
	ADD FOREIGN KEY (smh_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos
	ADD FOREIGN KEY (sucp_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos_historial
	ADD FOREIGN KEY (sucph_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos
	ADD FOREIGN KEY (sup_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos_historial
	ADD FOREIGN KEY (suph_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_transaccion
	ADD FOREIGN KEY (sut_idModulo)
	REFERENCES sistema_modulos (sm_idModulo)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos
	ADD FOREIGN KEY (ac_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos
	ADD FOREIGN KEY (acc_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos_historial
	ADD FOREIGN KEY (acch_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras
	ADD FOREIGN KEY (ace_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras_historial
	ADD FOREIGN KEY (aceh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_historial
	ADD FOREIGN KEY (ach_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas
	ADD FOREIGN KEY (acl_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas_historial
	ADD FOREIGN KEY (aclh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas
	ADD FOREIGN KEY (acn_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas_historial
	ADD FOREIGN KEY (acnh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_especies
	ADD FOREIGN KEY (ane_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_especies_historial
	ADD FOREIGN KEY (aneh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas
	ADD FOREIGN KEY (anm_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas_historial
	ADD FOREIGN KEY (anmh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas
	ADD FOREIGN KEY (anr_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas_historial
	ADD FOREIGN KEY (anrh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_cierre_dia
	ADD FOREIGN KEY (cacd_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos
	ADD FOREIGN KEY (cam_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos_historial
	ADD FOREIGN KEY (camh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE caja_cierre_dia_historial
	ADD FOREIGN KEY (cacdh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_categorias
	ADD FOREIGN KEY (cca_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_categorias_historial
	ADD FOREIGN KEY (ccah_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes
	ADD FOREIGN KEY (cc_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes_historial
	ADD FOREIGN KEY (cch_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web
	ADD FOREIGN KEY (euw_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web_historial
	ADD FOREIGN KEY (euwh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_impuestos
	ADD FOREIGN KEY (fi_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_impuestos_historial
	ADD FOREIGN KEY (fih_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_medios_pagos
	ADD FOREIGN KEY (fmp_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_medios_pagos_historial
	ADD FOREIGN KEY (fmph_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_monedas
	ADD FOREIGN KEY (fm_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_monedas_historial
	ADD FOREIGN KEY (fmh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_paises
	ADD FOREIGN KEY (gp_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_paises_historial
	ADD FOREIGN KEY (gph_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas
	ADD FOREIGN KEY (gsc_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas_historial
	ADD FOREIGN KEY (gsch_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes
	ADD FOREIGN KEY (gsg_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes_historial
	ADD FOREIGN KEY (gsgh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas
	ADD FOREIGN KEY (gz_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas_historial
	ADD FOREIGN KEY (gzh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos
	ADD FOREIGN KEY (ia_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias
	ADD FOREIGN KEY (iaac_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias_historial
	ADD FOREIGN KEY (iaach_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades
	ADD FOREIGN KEY (iaap_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades_historial
	ADD FOREIGN KEY (iaaph_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_categorias
	ADD FOREIGN KEY (iac_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_categorias_historial
	ADD FOREIGN KEY (iach_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores
	ADD FOREIGN KEY (iaco_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores_historial
	ADD FOREIGN KEY (iacoh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_fotos
	ADD FOREIGN KEY (iaf_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_historial
	ADD FOREIGN KEY (iah_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_movimientos_stock
	ADD FOREIGN KEY (iams_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios
	ADD FOREIGN KEY (iapr_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios_historial
	ADD FOREIGN KEY (iaprh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_propiedades
	ADD FOREIGN KEY (iap_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_propiedades_historial
	ADD FOREIGN KEY (iaph_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_stock
	ADD FOREIGN KEY (ias_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles
	ADD FOREIGN KEY (iat_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles_historial
	ADD FOREIGN KEY (iath_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_marcas
	ADD FOREIGN KEY (im_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_marcas_historial
	ADD FOREIGN KEY (imh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_contactos
	ADD FOREIGN KEY (mc_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_boletin_suscripciones
	ADD FOREIGN KEY (nbs_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_boletin_suscripciones_historial
	ADD FOREIGN KEY (nbsh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel
	ADD FOREIGN KEY (ncal_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_historial
	ADD FOREIGN KEY (ncalh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes
	ADD FOREIGN KEY (ncai_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes_historial
	ADD FOREIGN KEY (ncaih_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_catalogos
	ADD FOREIGN KEY (nco_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_catalogos_historial
	ADD FOREIGN KEY (ncoh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_noticias
	ADD FOREIGN KEY (nn_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_noticias_historial
	ADD FOREIGN KEY (nnh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones
	ADD FOREIGN KEY (sg_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones_historial
	ADD FOREIGN KEY (sgh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_login
	ADD FOREIGN KEY (sl_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_modulos
	ADD FOREIGN KEY (sm_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_modulos_historial
	ADD FOREIGN KEY (smh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios
	ADD FOREIGN KEY (su_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias
	ADD FOREIGN KEY (suac_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias_historial
	ADD FOREIGN KEY (suach_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias
	ADD FOREIGN KEY (suc_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_historial
	ADD FOREIGN KEY (such_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos
	ADD FOREIGN KEY (sucp_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos_historial
	ADD FOREIGN KEY (sucph_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_historial
	ADD FOREIGN KEY (suh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos
	ADD FOREIGN KEY (sup_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos_historial
	ADD FOREIGN KEY (suph_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_cuotas
	ADD FOREIGN KEY (soc_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios
	ADD FOREIGN KEY (sos_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios_historial
	ADD FOREIGN KEY (sosh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas
	ADD FOREIGN KEY (sotc_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas_historial
	ADD FOREIGN KEY (sotch_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_imagenes
	ADD FOREIGN KEY (ti_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tipos
	ADD FOREIGN KEY (tt_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tipos_historial
	ADD FOREIGN KEY (tth_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos
	ADD FOREIGN KEY (ttr_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos_historial
	ADD FOREIGN KEY (ttrh_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_envios_mail
	ADD FOREIGN KEY (vem_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes
	ADD FOREIGN KEY (vo_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_productos
	ADD FOREIGN KEY (vop_idTipoEdicion)
	REFERENCES sistema_tipo_edicion (ste_idTipoEdicion)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos
	ADD FOREIGN KEY (ac_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos
	ADD FOREIGN KEY (ac_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos
	ADD FOREIGN KEY (acc_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos
	ADD FOREIGN KEY (acc_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_compromisos_historial
	ADD FOREIGN KEY (acch_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras
	ADD FOREIGN KEY (ace_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras
	ADD FOREIGN KEY (ace_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_extras_historial
	ADD FOREIGN KEY (aceh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_historial
	ADD FOREIGN KEY (ach_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas
	ADD FOREIGN KEY (acl_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas
	ADD FOREIGN KEY (acl_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_llamadas_historial
	ADD FOREIGN KEY (aclh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas
	ADD FOREIGN KEY (acn_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas
	ADD FOREIGN KEY (acn_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_notas_historial
	ADD FOREIGN KEY (acnh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias
	ADD FOREIGN KEY (acr_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE agenda_contactos_residencias_historial
	ADD FOREIGN KEY (acrh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_especies
	ADD FOREIGN KEY (ane_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_especies
	ADD FOREIGN KEY (ane_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_especies_historial
	ADD FOREIGN KEY (aneh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas
	ADD FOREIGN KEY (anm_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas
	ADD FOREIGN KEY (anm_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_mascotas_historial
	ADD FOREIGN KEY (anmh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas
	ADD FOREIGN KEY (anr_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas
	ADD FOREIGN KEY (anr_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE animales_razas_historial
	ADD FOREIGN KEY (anrh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_cierre_dia
	ADD FOREIGN KEY (cacd_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_cierre_dia
	ADD FOREIGN KEY (cacd_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos
	ADD FOREIGN KEY (cam_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos
	ADD FOREIGN KEY (cam_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE cajas_movimientos_historial
	ADD FOREIGN KEY (camh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE caja_cierre_dia_historial
	ADD FOREIGN KEY (cacdh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_categorias
	ADD FOREIGN KEY (cca_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_categorias
	ADD FOREIGN KEY (cca_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_categorias_historial
	ADD FOREIGN KEY (ccah_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes
	ADD FOREIGN KEY (cc_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes
	ADD FOREIGN KEY (cc_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE clientes_clientes_historial
	ADD FOREIGN KEY (cch_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web
	ADD FOREIGN KEY (euw_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web
	ADD FOREIGN KEY (euw_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE externo_usuarios_web_historial
	ADD FOREIGN KEY (euwh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_impuestos
	ADD FOREIGN KEY (fi_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_impuestos
	ADD FOREIGN KEY (fi_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_impuestos_historial
	ADD FOREIGN KEY (fih_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_medios_pagos
	ADD FOREIGN KEY (fmp_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_medios_pagos
	ADD FOREIGN KEY (fmp_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_medios_pagos_historial
	ADD FOREIGN KEY (fmph_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_monedas
	ADD FOREIGN KEY (fm_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_monedas
	ADD FOREIGN KEY (fm_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE finanzas_monedas_historial
	ADD FOREIGN KEY (fmh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_paises
	ADD FOREIGN KEY (gp_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_paises
	ADD FOREIGN KEY (gp_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_paises_historial
	ADD FOREIGN KEY (gph_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas
	ADD FOREIGN KEY (gsc_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas
	ADD FOREIGN KEY (gsc_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_chicas_historial
	ADD FOREIGN KEY (gsch_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes
	ADD FOREIGN KEY (gsg_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes
	ADD FOREIGN KEY (gsg_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_subdivisiones_grandes_historial
	ADD FOREIGN KEY (gsgh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas
	ADD FOREIGN KEY (gz_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas
	ADD FOREIGN KEY (gz_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE geolocalizacion_zonas_historial
	ADD FOREIGN KEY (gzh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos
	ADD FOREIGN KEY (ia_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos
	ADD FOREIGN KEY (ia_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias
	ADD FOREIGN KEY (iaac_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias
	ADD FOREIGN KEY (iaac_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_categorias_historial
	ADD FOREIGN KEY (iaach_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades
	ADD FOREIGN KEY (iaap_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades
	ADD FOREIGN KEY (iaap_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_asociacion_propiedades_historial
	ADD FOREIGN KEY (iaaph_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_categorias
	ADD FOREIGN KEY (iac_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_categorias
	ADD FOREIGN KEY (iac_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_categorias_historial
	ADD FOREIGN KEY (iach_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores
	ADD FOREIGN KEY (iaco_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores
	ADD FOREIGN KEY (iaco_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_colores_historial
	ADD FOREIGN KEY (iacoh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_fotos
	ADD FOREIGN KEY (iaf_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_fotos
	ADD FOREIGN KEY (iaf_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_historial
	ADD FOREIGN KEY (iah_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_movimientos_stock
	ADD FOREIGN KEY (iams_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_movimientos_stock
	ADD FOREIGN KEY (iams_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios
	ADD FOREIGN KEY (iapr_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios
	ADD FOREIGN KEY (iapr_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_precios_historial
	ADD FOREIGN KEY (iaprh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_propiedades
	ADD FOREIGN KEY (iap_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_propiedades
	ADD FOREIGN KEY (iap_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_propiedades_historial
	ADD FOREIGN KEY (iaph_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_stock
	ADD FOREIGN KEY (ias_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_stock
	ADD FOREIGN KEY (ias_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles
	ADD FOREIGN KEY (iat_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles
	ADD FOREIGN KEY (iat_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_articulos_talles_historial
	ADD FOREIGN KEY (iath_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_marcas
	ADD FOREIGN KEY (im_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_marcas
	ADD FOREIGN KEY (im_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inventario_marcas_historial
	ADD FOREIGN KEY (imh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_contactos
	ADD FOREIGN KEY (mc_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mensajeria_contactos
	ADD FOREIGN KEY (mc_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_boletin_suscripciones
	ADD FOREIGN KEY (nbs_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_boletin_suscripciones
	ADD FOREIGN KEY (nbs_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_boletin_suscripciones_historial
	ADD FOREIGN KEY (nbsh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel
	ADD FOREIGN KEY (ncal_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel
	ADD FOREIGN KEY (ncal_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_historial
	ADD FOREIGN KEY (ncalh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes
	ADD FOREIGN KEY (ncai_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes
	ADD FOREIGN KEY (ncai_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_carrusel_imagenes_historial
	ADD FOREIGN KEY (ncaih_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_catalogos
	ADD FOREIGN KEY (nco_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_catalogos
	ADD FOREIGN KEY (nco_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_catalogos_historial
	ADD FOREIGN KEY (ncoh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_noticias
	ADD FOREIGN KEY (nn_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE noticias_noticias_historial
	ADD FOREIGN KEY (nnh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones
	ADD FOREIGN KEY (sg_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones
	ADD FOREIGN KEY (sg_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_gestiones_historial
	ADD FOREIGN KEY (sgh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_login
	ADD FOREIGN KEY (sl_idUsuario)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_login
	ADD FOREIGN KEY (sl_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_login
	ADD FOREIGN KEY (sl_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_modulos
	ADD FOREIGN KEY (sm_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_modulos_historial
	ADD FOREIGN KEY (smh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios
	ADD FOREIGN KEY (su_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios
	ADD FOREIGN KEY (su_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias
	ADD FOREIGN KEY (suac_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias
	ADD FOREIGN KEY (suac_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias
	ADD FOREIGN KEY (suac_idUsuario)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias_historial
	ADD FOREIGN KEY (suach_idUsuario)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias_historial
	ADD FOREIGN KEY (suach_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias
	ADD FOREIGN KEY (suc_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias
	ADD FOREIGN KEY (suc_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_historial
	ADD FOREIGN KEY (such_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos
	ADD FOREIGN KEY (sucp_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos
	ADD FOREIGN KEY (sucp_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos_historial
	ADD FOREIGN KEY (sucph_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_historial
	ADD FOREIGN KEY (suh_idUsuario)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_historial
	ADD FOREIGN KEY (suh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos
	ADD FOREIGN KEY (sup_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos
	ADD FOREIGN KEY (sup_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos
	ADD FOREIGN KEY (sup_idUsuario)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos_historial
	ADD FOREIGN KEY (suph_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos_historial
	ADD FOREIGN KEY (suph_idUsuario)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_transaccion
	ADD FOREIGN KEY (sut_idUsuario)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_cuotas
	ADD FOREIGN KEY (soc_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_cuotas
	ADD FOREIGN KEY (soc_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios
	ADD FOREIGN KEY (sos_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios
	ADD FOREIGN KEY (sos_idUSuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios_historial
	ADD FOREIGN KEY (sosh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas
	ADD FOREIGN KEY (sotc_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas
	ADD FOREIGN KEY (sotc_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas_historial
	ADD FOREIGN KEY (sotch_idUSuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_imagenes
	ADD FOREIGN KEY (ti_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_imagenes
	ADD FOREIGN KEY (ti_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tipos
	ADD FOREIGN KEY (tt_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tipos
	ADD FOREIGN KEY (tt_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tipos_historial
	ADD FOREIGN KEY (tth_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos
	ADD FOREIGN KEY (ttr_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos
	ADD FOREIGN KEY (ttr_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos_historial
	ADD FOREIGN KEY (ttrh_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_envios_mail
	ADD FOREIGN KEY (vem_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_envios_mail
	ADD FOREIGN KEY (vem_fechaIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_envios_mail
	ADD FOREIGN KEY (vem_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes
	ADD FOREIGN KEY (vo_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes
	ADD FOREIGN KEY (vo_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_productos
	ADD FOREIGN KEY (vop_idUsuarioIngreso)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_productos
	ADD FOREIGN KEY (vop_idUsuarioEdito)
	REFERENCES sistema_usuarios (su_idUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias_historial
	ADD FOREIGN KEY (suach_idUsuarioAsociacionCategoria)
	REFERENCES sistema_usuarios_asociacion_categorias (suac_idUsuarioAsociacionCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias
	ADD FOREIGN KEY (suac_idUsuarioCategoria)
	REFERENCES sistema_usuarios_categorias (suc_idUsuarioCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_asociacion_categorias_historial
	ADD FOREIGN KEY (suach_idUsuarioCategoria)
	REFERENCES sistema_usuarios_categorias (suc_idUsuarioCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_historial
	ADD FOREIGN KEY (such_idUsuarioCategoria)
	REFERENCES sistema_usuarios_categorias (suc_idUsuarioCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos
	ADD FOREIGN KEY (sucp_idUsuarioCategoria)
	REFERENCES sistema_usuarios_categorias (suc_idUsuarioCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos_historial
	ADD FOREIGN KEY (sucph_idUsuarioCategoria)
	REFERENCES sistema_usuarios_categorias (suc_idUsuarioCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_categorias_permisos_historial
	ADD FOREIGN KEY (sucph_idPermisoCategoria)
	REFERENCES sistema_usuarios_categorias_permisos (sucp_idPermisoCategoria)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE sistema_usuarios_permisos_historial
	ADD FOREIGN KEY (suph_idPermisoUsuario)
	REFERENCES sistema_usuarios_permisos (sup_idPermisoUsuario)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_cuotas
	ADD FOREIGN KEY (soc_idSocio)
	REFERENCES socios_socios (sos_idSocio)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios_historial
	ADD FOREIGN KEY (sosh_idSocio)
	REFERENCES socios_socios (sos_idSocio)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_cuotas
	ADD FOREIGN KEY (soc_idTipoCuota)
	REFERENCES socios_tipos_cuotas (sotc_idTipoCuota)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios
	ADD FOREIGN KEY (sos_idTipoCuota)
	REFERENCES socios_tipos_cuotas (sotc_idTipoCuota)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_socios_historial
	ADD FOREIGN KEY (sosh_idTipoCuota)
	REFERENCES socios_tipos_cuotas (sotc_idTipoCuota)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE socios_tipos_cuotas_historial
	ADD FOREIGN KEY (sotch_idTipoCuota)
	REFERENCES socios_tipos_cuotas (sotc_idTipoCuota)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tipos_historial
	ADD FOREIGN KEY (tth_idTipoTratamiento)
	REFERENCES tratamientos_tipos (tt_idTipoTratamiento)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos
	ADD FOREIGN KEY (ttr_idTipoTratamiento)
	REFERENCES tratamientos_tipos (tt_idTipoTratamiento)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos_historial
	ADD FOREIGN KEY (ttrh_idTipoTratamiento)
	REFERENCES tratamientos_tipos (tt_idTipoTratamiento)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_imagenes
	ADD FOREIGN KEY (ti_idTratamiento)
	REFERENCES tratamientos_tratamientos (ttr_idTratamiento)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE tratamientos_tratamientos_historial
	ADD FOREIGN KEY (ttrh_idTratamiento)
	REFERENCES tratamientos_tratamientos (ttr_idTratamiento)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_envios_mail
	ADD FOREIGN KEY (vem_idOrden)
	REFERENCES ventas_ordenes (vo_idOrden)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_envios
	ADD FOREIGN KEY (voe_idOrden)
	REFERENCES ventas_ordenes (vo_idOrden)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE ventas_ordenes_productos
	ADD FOREIGN KEY (vop_idOrden)
	REFERENCES ventas_ordenes (vo_idOrden)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;




<?php


$sqlTabla = "
SET SESSION FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS sistema_acciones;
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

/* Create Tables */

-- Esta tabla guarda la inforacion de las distintas acciones qu
CREATE TABLE sistema_acciones
(
	-- Es el identificador de la accion que se puede realizar en el sistema
	sa_idAccion int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la accion que se puede realizar en el sistema',
	-- Esta tabla contiene los nombre de los permisos 
	sa_nombreAccion varchar(100) NOT NULL COMMENT 'Esta tabla contiene los nombre de los permisos ',
	-- Es el identicador de modulo
	sa_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el identificador de la gestion
	sa_idGestion int(5) NOT NULL COMMENT 'Es el identificador de la gestion',
	-- Es el parametro y la accion a ejecutar
	sa_parametroAccion varchar(40) NOT NULL COMMENT 'Es el parametro y la accion a ejecutar',
	-- Este campo contiene la descripcion de las acciones del sistema
	sa_descripcionAccion text COMMENT 'Este campo contiene la descripcion de las acciones del sistema',
	PRIMARY KEY (sa_idAccion)
) COMMENT = 'Esta tabla guarda la inforacion de las distintas acciones qu' DEFAULT CHARACTER SET utf8;


-- Esta tabla cuarda los distinto codigo de respuesta del siste
CREATE TABLE sistema_codigos_respuestas
(
	-- Es el numero identificador de codigo, Este mismo no es autoincremar sino asignado a mano
	scr_idCodigo varchar(5) NOT NULL COMMENT 'Es el numero identificador de codigo, Este mismo no es autoincremar sino asignado a mano',
	-- Es el nombre de el codigo
	scr_nombreCodigo varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'Es el nombre de el codigo',
	scr_parametroCodigo varchar(20) CHARACTER SET utf8 NOT NULL,
	-- es la descripcion de el codigo
	scr_descripcionCodigo text CHARACTER SET utf8 COMMENT 'es la descripcion de el codigo',
	-- Es el tipo de codigo 
	scr_tipoCodigo enum('positivo','negativo') CHARACTER SET utf8 NOT NULL COMMENT 'Es el tipo de codigo ',
	PRIMARY KEY (scr_idCodigo)
) COMMENT = 'Esta tabla cuarda los distinto codigo de respuesta del siste' DEFAULT CHARACTER SET utf8;


-- Esta tabla tiene la informacion de los distintos estado que 
CREATE TABLE sistema_estados
(
	-- Es el identificador de el estado que se encuentra los registros
	se_idEstado int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el nombre de el estado
	se_nombreEstado varchar(30) NOT NULL COMMENT 'Es el nombre de el estado',
	-- Es la descripcion de los estados de el sistema
	-- 
	se_descripcionEstado text COMMENT 'Es la descripcion de los estados de el sistema
',
	PRIMARY KEY (se_idEstado)
) COMMENT = 'Esta tabla tiene la informacion de los distintos estado que ' DEFAULT CHARACTER SET utf8;


-- Esta tabla guarada la inforacion de las gestiones que hay en
CREATE TABLE sistema_gestiones
(
	-- Es el identificador de la gestion
	sg_idGestion int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la gestion',
	-- Es el nombre de la gestion
	sg_nombreGestion varchar(100) NOT NULL COMMENT 'Es el nombre de la gestion',
	-- Es el identicador de modulo
	sg_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	-- Es el parametro que identifica la gestion que se esta trabajando
	sg_parametroGestion varchar(30) NOT NULL COMMENT 'Es el parametro que identifica la gestion que se esta trabajando',
	-- Es la descripcion de la gestion
	sg_descripcionGestion text COMMENT 'Es la descripcion de la gestion',
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
	sg_motivoGestion text COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (sg_idGestion)
) COMMENT = 'Esta tabla guarada la inforacion de las gestiones que hay en' DEFAULT CHARACTER SET utf8;


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
	sgh_nombreGestion varchar(100) NOT NULL COMMENT 'Es el Nombre de la gestion',
	-- Es el identicador de modulo
	sgh_idModulo int(4) NOT NULL COMMENT 'Es el identicador de modulo',
	sgh_parametroGestion varchar(30) NOT NULL,
	-- Es la descripcion de la gestion
	sgh_descripcionGestion text COMMENT 'Es la descripcion de la gestion',
	-- Es el identificador de el estado que se encuentra los registros
	sgh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio
	sgh_motivoGestion text COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (sgh_idGestionHistorial)
) COMMENT = 'Esta tabla guarda el historial de las gestiones del sistema' DEFAULT CHARACTER SET utf8;


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
	sl_motivoLogin text COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (sl_idLogin)
) COMMENT = 'En esta tabla se guarda el las entradas y salida del sistema' DEFAULT CHARACTER SET utf8;


-- Esta tabla maneja los registros de los distintos modulos ins
CREATE TABLE sistema_modulos
(
	-- Es el identicador de modulo
	sm_idModulo int(4) NOT NULL AUTO_INCREMENT COMMENT 'Es el identicador de modulo',
	-- Es el nombre Oficial de el modiulo
	sm_nombreModulo varchar(40) NOT NULL COMMENT 'Es el nombre Oficial de el modiulo',
	-- Es el nombre de el paramatro que se envia para en los request y habilita a los permisos 
	sm_parametroModulo varchar(20) NOT NULL COMMENT 'Es el nombre de el paramatro que se envia para en los request y habilita a los permisos ',
	-- Es la descripcion de el modulo
	sm_descripcionModulo text COMMENT 'Es la descripcion de el modulo',
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
	sm_motivoModulo text COMMENT 'Es el motivo por el cual se realizo la modificacion',
	PRIMARY KEY (sm_idModulo)
) COMMENT = 'Esta tabla maneja los registros de los distintos modulos ins' DEFAULT CHARACTER SET utf8;


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
	smh_nombreModulo varchar(40) NOT NULL COMMENT 'Es el nombre de el modulo',
	-- Es el nombre de el paramatro que se envia para en los request y habilita a los permisos 
	smh_parametroModulo varchar(20) COMMENT 'Es el nombre de el paramatro que se envia para en los request y habilita a los permisos ',
	-- Es la descriopcion de el modulo
	smh_descripcionModulo text COMMENT 'Es la descriopcion de el modulo',
	-- Es el identificador de el estado que se encuentra los registros
	smh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realiza el cambio
	smh_motivoModulo text COMMENT 'Es el motivo por el cual se realiza el cambio',
	PRIMARY KEY (smh_idModuloHistorial)
) COMMENT = 'Esta tabla se esncarga de guardar los historiales de los cam' DEFAULT CHARACTER SET utf8;


-- Esta tabla se encarga de administrar los tipo de edicion que
CREATE TABLE sistema_tipo_edicion
(
	-- Es el identificador de tipo de edicion
	ste_idTipoEdicion int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de tipo de edicion',
	-- Es el nombre que lleva la edicion 
	ste_nombreTipoEdicion varchar(30) NOT NULL COMMENT 'Es el nombre que lleva la edicion ',
	-- Es la descripcion de el registro
	ste_descripcion text COMMENT 'Es la descripcion de el registro',
	PRIMARY KEY (ste_idTipoEdicion)
) COMMENT = 'Esta tabla se encarga de administrar los tipo de edicion que' DEFAULT CHARACTER SET utf8;


-- Esta tabla se encarga de administra los usuarios que funcion
CREATE TABLE sistema_usuarios
(
	-- Es el identificador de los usuarios
	su_idUsuario int(10) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de los usuarios',
	su_nombreUsuario varchar(30) NOT NULL,
	-- Es el mail de le usuario
	su_mailUsuario varchar(50) NOT NULL COMMENT 'Es el mail de le usuario',
	-- Es la clave de el usuario la misma siempre se encuentra cifrada
	su_claveUsuario text NOT NULL COMMENT 'Es la clave de el usuario la misma siempre se encuentra cifrada',
	-- Es el nombre de la imagen que utiliza el usaurio
	su_imagenUsuario varchar(10) COMMENT 'Es el nombre de la imagen que utiliza el usaurio',
	-- Este campo se utiliza para la descriopcion de el usuario
	su_descripcionUsuario text COMMENT 'Este campo se utiliza para la descriopcion de el usuario',
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
	su_motivoUsuario text CHARACTER SET utf8 COMMENT 'Es el motivo por el cual se realizo el cambio en el registros',
	-- Es el identificador que se utiliza para saber si un usuario es desarrollador o super administrador  importate por que todo el sistema se basa en esto
	su_poder enum('desarrollador','administrador','estandar','tester') CHARACTER SET utf8 NOT NULL COMMENT 'Es el identificador que se utiliza para saber si un usuario es desarrollador o super administrador  importate por que todo el sistema se basa en esto',
	PRIMARY KEY (su_idUsuario)
) COMMENT = 'Esta tabla se encarga de administra los usuarios que funcion' DEFAULT CHARACTER SET utf8;


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
	suac_motivoAsociacion text COMMENT 'Es el motivo por el cual se ingreso el registros',
	PRIMARY KEY (suac_idUsuarioAsociacionCategoria)
) COMMENT = 'Esta tabla guarda la informacion de la asociacion que tiene ' DEFAULT CHARACTER SET utf8;


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
	suach_motivoAsociacion text COMMENT 'Es el motivo por el cual se realizo el cambio ',
	PRIMARY KEY (suach_idUsuarioAsociacionCategoriaHistorial)
) COMMENT = 'Esta tabla guarda el historial de la asociacion de los usuar' DEFAULT CHARACTER SET utf8;


-- Esta tabla Administra las categorias de los distintos usuari
CREATE TABLE sistema_usuarios_categorias
(
	-- Es el identificador de la categoria de usuarios
	suc_idUsuarioCategoria int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la categoria de usuarios',
	-- Es el nombre de la categoria de el usuario
	suc_nombreUsuarioCategoria varchar(30) NOT NULL COMMENT 'Es el nombre de la categoria de el usuario',
	-- Es la descripcion de las categorias de los usuarios
	suc_descripcionUsuarioCategoria text COMMENT 'Es la descripcion de las categorias de los usuarios',
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
	suc_motivoUsuarioCategoria text COMMENT 'Es el motivo por el cual se realizo un cambio
',
	PRIMARY KEY (suc_idUsuarioCategoria)
) COMMENT = 'Esta tabla Administra las categorias de los distintos usuari' DEFAULT CHARACTER SET utf8;


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
	such_nombreUsuarioCategoria varchar(20) NOT NULL COMMENT 'es el nombre de la categoria de los usuarios',
	-- Es la descripcion de la categoria de los usuarios
	such_descripcionUsuarioCategoria text COMMENT 'Es la descripcion de la categoria de los usuarios',
	-- Es el identificador de el estado que se encuentra los registros
	such_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio 
	such_motivoUsuarioCategoria text COMMENT 'Es el motivo por el cual se realizo el cambio ',
	PRIMARY KEY (such_idUsuariosCategoriasHistorial)
) COMMENT = 'Esta tabla guarda la informacion del historial de las distin' DEFAULT CHARACTER SET utf8;


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
	sucp_motivoPermisoCategoria text COMMENT 'Es el motivo que por el cual se modifico el registro',
	PRIMARY KEY (sucp_idPermisoCategoria)
) COMMENT = 'Esta tabla guarda la inforacion de los permisos que pueden t' DEFAULT CHARACTER SET utf8;


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
	sucph_motivoPermisoCategoria text COMMENT 'ES el motivo por el cual que se me modifico el registro',
	PRIMARY KEY (sucph_idPermisoCategoriaHistoria)
) COMMENT = 'Esta tabla guarda el historial de los permosos que contiene ' DEFAULT CHARACTER SET utf8;


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
	suh_nombreUsuario varchar(50) NOT NULL COMMENT 'Es el nombre de el usuario',
	-- Es el mail utilizado por el usuario
	suh_mailUsuario varchar(50) NOT NULL COMMENT 'Es el mail utilizado por el usuario',
	-- Es el avatar usado por el usuario
	suh_imagenUsuario varchar(10) COMMENT 'Es el avatar usado por el usuario',
	-- Es la descipcion de los usuarios sirve para agregar atributos que no estan definidos
	-- 
	suh_descripcionUsuario text COMMENT 'Es la descipcion de los usuarios sirve para agregar atributos que no estan definidos
',
	-- Es el identificador de el estado que se encuentra los registros
	suh_idEstado int(3) NOT NULL COMMENT 'Es el identificador de el estado que se encuentra los registros',
	-- Es el motivo por el cual se realizo el cambio
	-- 
	suh_motivoUsuario text COMMENT 'Es el motivo por el cual se realizo el cambio
',
	-- Es el identificador que se utiliza para saber si un usuario es desarrollador o no es importate por que todo el sistema se basa en esto
	suh_poder enum('desarrollador','administrador','estandar','tester') NOT NULL COMMENT 'Es el identificador que se utiliza para saber si un usuario es desarrollador o no es importate por que todo el sistema se basa en esto',
	PRIMARY KEY (suh_idUsuarioHistorial)
) COMMENT = 'Esta tabla se encarga de guardar los cambios cambios que se ' DEFAULT CHARACTER SET utf8;


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
	sup_motivoPermisoUsuario text COMMENT 'Es la fecha que se edito el registro
',
	PRIMARY KEY (sup_idPermisoUsuario)
) COMMENT = 'Esta tabla se encarga de almacenar los permisos de los usuar' DEFAULT CHARACTER SET utf8;


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
	suph_motivoPermisoUsuario text CHARACTER SET utf8 COMMENT 'Es el motivo por el cual se realizo el cambio',
	PRIMARY KEY (suph_idPermisoUsuarioHistorial)
) COMMENT = 'Esta tabla se encarga de almanezar la informacion de los dis' DEFAULT CHARACTER SET utf8;


-- En esta tabla se guardan todas las transacciones que reaiza 
CREATE TABLE sistema_usuarios_transaccion
(
	-- Es el identificador de la transaccion realizada 
	sut_idTransaccionUsuario bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la transaccion realizada ',
	-- Es un codigo aleatoreamente se que genra para no repetir la transaccion
	stu_codigoTransaccion varchar(200) NOT NULL COMMENT 'Es un codigo aleatoreamente se que genra para no repetir la transaccion',
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
	sut_detalle text NOT NULL COMMENT 'Es el detalle de la transaccion es propio de el sistema',
	PRIMARY KEY (sut_idTransaccionUsuario)
) COMMENT = 'En esta tabla se guardan todas las transacciones que reaiza ' DEFAULT CHARACTER SET utf8;



/* Create Foreign Keys */

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


ALTER TABLE sistema_gestiones
	ADD FOREIGN KEY (sg_idUsuarioIngreso)
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
	ADD FOREIGN KEY (su_idUsuarioEdito)
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


ALTER TABLE sistema_usuarios_asociacion_categorias
	ADD FOREIGN KEY (suac_idUsuarioEdito)
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


ALTER TABLE sistema_usuarios_asociacion_categorias
	ADD FOREIGN KEY (suac_idUsuarioIngreso)
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


ALTER TABLE sistema_usuarios_asociacion_categorias_historial
	ADD FOREIGN KEY (suach_idUsuario)
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
	ADD FOREIGN KEY (suph_idUsuario)
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


ALTER TABLE sistema_usuarios_transaccion
	ADD FOREIGN KEY (sut_idUsuario)
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


";

echo("\n <br> *** Instalando Base Datos *** \n");
//executarQuerry($sqlBaseDatos);
echo("\n <br> *** Instalando Tablas *** \n");
executarQuerry($sqlTabla);
echo("\n <br> *** Tablas Instaladas *** <br> \n");



?>
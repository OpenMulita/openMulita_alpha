

-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- **********************   Modulo Sistema   ********************************
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

-- Codigos de respuesta
INSERT INTO sistema_codigos_respuestas VALUES
(1000,'Transaccion Exitosa','exitosa','Es Cuando las transacciones son exitosas, se puedo realizar la acci&#243;n','positivo'),
(1001,'Transaccion Fallida','falliida','Es cuando una transacci&#243;n falla','negativo'),
(1002,'Falta Permiso','permisos','No tiene permiso para realizar la acci&#243;n','negativo'),
(1003,'Registro Duplicado','duplicado','Es cuando se intenta ingresar un registro que ya ingresado','negativo'),
(1004,'Clave Incorrecta','clave','Es cuando la clave de confirmar la acci&#243;n es err&#243;nea','negativo'),
(1005,'Foto subida correctamente','fotoExitosa','Es cuando se sube la foto correctamente','positivo'),
(1006,'No hay foto','fotoNo','Es cuando se sube intenta subir una foto sin imagen','negativo'),
(1007,'Error en subir la foto','fotoError','Es se produce un error al subir la foto','negativo'),
(1008,'Error Clave','errorClave','Error en la validaci&#243;n de la contrase&#241;a','negativo'),
(1009,'Error en la transacci&#243;n','errorTransaccion','Es el error de da cuando se duplica el c&#243;digo transaccional','negativo'),
(3001,'Duplicado en contacto','duplicadoContacto','Este error se da cuando se intenta ingresar el mismo contacto a dos registros diferentes','negativo');
		
-- Estados de el sistema
INSERT INTO sistema_estados VALUES
(1,'Ingresado','Es estado que reci&#233;n se ingresa el registro'),
(2,'Activado','Es el estado que el registro esta en funcionamiento'),
(3,'Desactivado','Es el estado que el registro esta esta moment&#225;neamente fuera de servicio'),
(4,'Borrado','Es el estado que no esta accesible'),
(5,'Reactivado','Es el estado que se vuelve a poner en funcionamiento despu&#233;s de ser borrado'),
(6,'Cancelado','Es el estado que se corta un proceso'),
(7,'Confirmado','Es el esta donde se verifica que el registro es el indicado'),
(8,'Aceptado','Es el estado donde se rechaza la petici&#243;n'),
(9,'Rechazado','Es el estado donde se rechaza la petici&#243;n'),
(10,'Liberado','Es el estado que se libero un registro'),
(11,'Iniciado','Es estado cuando un proceso se inicio'),
(12,'Procesando','Es el estado que cuando un registro se esta procesado'),
(13,'Completado','Es cuando un proceso se completa'),
(14,'Finalizado','Es cuando un proceso Finaliza'),
(15,'No Pago','Es el estado que no pago de la factura'),
(16,'Pagado','Es el estado que el registro quedo pago'),
(17,'Cancelado','Es el estado que fue cancelado el registro'),
(18,'Vencido','Es el estado que se vencen los registros'),
(19,'Anulado','Es el estado que se anulan los registros'),
(20,'Fallido','Es el estado que fallo los ingreso a la base posteriores'),
(21,'Terminado','Es el estado que termina un proceso');


-- Tipos de edicion en el sistema
INSERT INTO sistema_tipo_edicion VALUES
(1,'Alta','Es cuando se realiza el ingreso de un registro'),
(2,'Actualizacion de Datos','Es cuando se realiza una modificaci&#243;n en los datos de los registros'),
(3,'Cambio Estado','Es cuando un registro solo cambia de estado'),
(4,'Cambio Clave','Es es cuando el usuario cambia la clave a través de el perfil'),
(5,'Automatica','Es cuando se realiza a través de un proceso automatizado'),
(6,'Reseteo Clave','Es cuando el administrador le asigna una clave predetermina al usuario');

-- Usuario Maestro
INSERT INTO sistema_usuarios  VALUES
(1,'mulitaAdmin','mulAdmin@mulita.com' ,'EOJ922b97066a9293cbc5389e3eb82c28e5NYyzC', 'avatar5', 'Es el Usuario Principal', 2, now(), 1, 1,now(), 1, 'Pre Carga','administrador'),
(2,'mulitaDesa','damisintesis109@gmail.com' ,'EOJ922b97066a9293cbc5389e3eb82c28e5NYyzC', 'avatar5', 'Es el Usuario Desarrolador', 2, now(), 1, 1,now(), 1, 'Pre Carga','desarrollador'),
(3,'mulitaExterno','usuarioExterno@uruerp.com' ,'Xksjen865493ujjfsndfsbnmkjkBBddek3242', 'avatar1', 'Es el Usuario usado en caso que la transaccion haya sido de afuera', 2, now(), 1, 1,now(), 1, 'Pre Carga','estandar');


/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * +++++++++++++++++++++++++++++ MODULO SISTEMA +++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

INSERT INTO sistema_modulos (sm_nombreModulo,sm_parametroModulo,sm_descripcionModulo,sm_idEstado,sm_fechaIngreso,sm_idTipoEdicion,sm_fechaEdicion,sm_idUsuarioEdito,sm_motivoModulo) values 
('Sistema','sistema','Es el modulo principal del sistema',1,now(),1,now(),1,'nuevo');

SET @idModulo = (select sm_idModulo from sistema_modulos order by sm_idModulo desc limit 1);

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++ GESTION SISTEMA +++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

INSERT INTO sistema_gestiones (sg_nombreGestion,sg_idModulo,sg_parametroGestion,sg_descripcionGestion,sg_idEstado,sg_fechaIngreso,sg_idUsuarioIngreso,sg_idTipoEdicion,sg_fechaEdicion,sg_idUsuarioEdito,sg_motivoGestion) values
('Sistema',@idModulo,'sistema','Es la gestión que gestiona lo mas general de el sistema',1,now(),1,1,now(),1,'');

SET @idGestion = (SELECT sg_idGestion FROM sistema_gestiones ORDER BY sg_idGestion DESC LIMIT 1);

INSERT INTO sistema_acciones (sa_nombreAccion,sa_idModulo,sa_idGestion,sa_parametroAccion,sa_descripcionAccion) VALUES
('Listar m&#243;dulo',@idModulo,@idGestion,'modulosListar','Esta acci&#243;n te permite listar los m&#243;dulos que est&#225;n en el sistema'),
('Ficha del m&#243;dulo',@idModulo,@idGestion,'moduloFicha','Esta acci&#243;n te permite acceder la ficha en el modulo'),
('Ficha historial del m&#243;dulo',@idModulo,@idGestion,'moduloFichaHistorial','Esta acci&#243;n te permite acceder la ficha historial en el modulo'),
('Activar m&#243;dulos',@idModulo,@idGestion,'moduloActivar','Esta acci&#243;n te permite Activar los distintos m&#243;dulos'),
('Desactivar m&#243;dulo',@idModulo,@idGestion,'moduloDesactivar','Esta acci&#243;n te permite desactivar los distintos m&#243;dulos'),
('Listar gestiones',@idModulo,@idGestion,'gestionesListar','Esta acci&#243;n te permite listar las gestiones de el sistema'),
('Ficha gestiones',@idModulo,@idGestion,'gestionFicha','Esta acción te permite acceder a la ficha de la gestión'),
('Ficha historial de la gesti&#243;n',@idModulo,@idGestion,'gestionFichaHistorial','Esta acci&#243;n te permite ver el historial de la gesti&#243;n'),
('Activa gestiones',@idModulo,@idGestion,'gestionActivar','Esta acci&#243;n te permite activar la gesti&#243;n'),
('Desactivar gestiones',@idModulo,@idGestion,'gestionDesactivar','Esta acci&#243;n te permite desactivar la gesti&#243;n'),
('Acciones listar',@idModulo,@idGestion,'accionesListar','Esta acci&#243;n te permite Listar las acciones');

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++ GESTION USUARIOS ++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

INSERT INTO  sistema_gestiones (sg_nombreGestion,sg_idModulo,sg_parametroGestion,sg_descripcionGestion,sg_idEstado,sg_fechaIngreso,sg_idUsuarioIngreso,sg_idTipoEdicion,sg_fechaEdicion,sg_idUsuarioEdito,sg_motivoGestion) values
('Usuario',@idModulo,'usuarios','Es la gesti&#243;n que controla los usuarios de el sistema',1,now(),1,1,now(),1,'');

SET @idGestion = (SELECT sg_idGestion FROM sistema_gestiones ORDER BY sg_idGestion DESC LIMIT 1);

INSERT INTO  sistema_acciones (sa_nombreAccion,sa_idModulo,sa_idGestion,sa_parametroAccion,sa_descripcionAccion) VALUES
('Listado usuarios',@idModulo,@idGestion,'usuariosListar','Esta acci&#243;n te permite listar los usuarios'),
('Ficha usuario',@idModulo,@idGestion,'usuarioFicha','Esta acci&#243;n te permite ver la ficha de los usuarios'),
('Ingresar usuarios',@idModulo,@idGestion,'usuariosIngresar','Esta acci&#243;n te permite el ingreso Usuario'),
('Modificar usuario',@idModulo,@idGestion,'usuariosModificar','Esta acci&#243;n te permite acceder al formulario de modificar'),
('Listado historial usuarios ',@idModulo,@idGestion,'usuarioListaHistorial','Esta acci&#243;n te permite listar el historial de los usuarios'),
('Ficha historial usuario',@idModulo,@idGestion,'usuarioFichaHistorial','Esta acci&#243;n te permite ver la ficha de los usuarios'),
('Activar usuario',@idModulo,@idGestion,'usuariosActivar','Esta acci&#243;n te permite activar el usuario'),
('Desactivar usuario',@idModulo,@idGestion,'usuariosDesactivar','Esta acci&#243;n te permite desactivar el usuario'),
('Borrar usuario',@idModulo,@idGestion,'usuariosBorrar','Esta acci&#243;n te permite borrar el usuario'),
('Reactivar usuario',@idModulo,@idGestion,'usuariosReactivar','Esta acci&#243;n te permite reactivar el usuario'),
('Resetear clave',@idModulo,@idGestion,'usuariosResetearClave','Esta acci&#243;n te permite restablecer la clave de los usuario'),
('Listado categor&#237;a usuarios',@idModulo,@idGestion,'asociacionCategoriaListar','Esta acci&#243;n te permite listar la asociaci&#243;n de la categor&#237;as de los usuarios'),
('Usuario categor&#237;a ingresar',@idModulo,@idGestion,'asociacionCategoriaIngresar','Esta acci&#243;n te permite ingresar la asociaci&#243;n de la categor&#237;as de los usuarios'),
('Activar categor&#237;a usuarios',@idModulo,@idGestion,'asociacionCategoriaActivar','Esta acción te permite activar la asociación de la categoría usuarios'),
('Desactivar categor&#237;a usuarios',@idModulo,@idGestion,'asociacionCategoriaDesactivar','Esta acción te permite desactivar la asociación de la categoría usuarios'),
('Ingresar permisos usuario',@idModulo,@idGestion,'permisosIngresar','Esta acci&#243;n te permite ingresar permisos a los usuarios'),
('Activar permisos usuarios',@idModulo,@idGestion,'permisosActivar','Esta acci&#243;n te permite activar los permisos a los usuarios'),
('Desactivar permisos usuarios',@idModulo,@idGestion,'permisosDesactivar','Esta acci&#243;n te permite desactivar los permisos en los usuarios');

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * +++++++++++++++++++++ GESTION USUARIOS CATEGORIAS ++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

INSERT INTO sistema_gestiones (sg_nombreGestion,sg_idModulo,sg_parametroGestion,sg_descripcionGestion,sg_idEstado,sg_fechaIngreso,sg_idUsuarioIngreso,sg_idTipoEdicion,sg_fechaEdicion,sg_idUsuarioEdito,sg_motivoGestion) VALUES
('Usuarios Categor&#237;a',@idModulo,'usuariosCategorias','Es la gesti&#243;n que controla las categor&#237;as de los usuarios',1,now(),1,1,now(),1,'');

SET @idGestion = (SELECT sg_idGestion FROM sistema_gestiones ORDER BY sg_idGestion DESC limit 1);

INSERT INTO sistema_acciones (sa_nombreAccion,sa_idModulo,sa_idGestion,sa_parametroAccion,sa_descripcionAccion) VALUES
('Ficha Categor&#237;a Usuarios',@idModulo,@idGestion,'usuariosCategoriasFicha','Esta acci&#243;n te permite acceder a la ficha de categor&#237;a de los usuarios'),
('Listar Categor&#237;a Usuarios',@idModulo,@idGestion,'usuariosCategoriasListar','Esta acci&#243;n te permite listar la categor&#237;a de los usuarios'),
('Ingresar Categor&#237;a',@idModulo,@idGestion,'usuariosCategoriasIngresar','Esta acci&#243;n te permite listar la categor&#237;as de los usuarios'),
('Modificar Categor&#237;a',@idModulo,@idGestion,'usuariosCategoriasModificar','Esta acci&#243;n te permite ingresar las categor&#237;as de los usuarios'),
('Activar Categor&#237;a',@idModulo,@idGestion,'usuariosCategoriasActivar','Esta acci&#243;n te permite activar la categor&#237;a usuarios'),
('Desactivar Categor&#237;a',@idModulo,@idGestion,'usuariosCategoriasDesactivar','Esta acci&#243;n te permite desactivar la categor&#237;a usuarios'),
('Borrar Categor&#237;a',@idModulo,@idGestion,'usuariosCategoriasBorrar','Esta acci&#243;n te permite borrar la categor&#237;a usuarios'),
('Reactivar Categor&#237;a',@idModulo,@idGestion,'usuariosCategoriasReactivar','Esta acci&#243;n te permite reactivar la categor&#237;a de los usuarios'),
('Listado Categor&#237;a Usuarios',@idModulo,@idGestion,'asociacionCategoriaListar','Esta acci&#243;n te permite listar la asociaci&#243;n de la categor&#237;as de los usuarios'),
('Usuario Categor&#237;a Ingresar',@idModulo,@idGestion,'asociacionCategoriaIngresar','Esta acci&#243;n te permite ingresar la asociaci&#243;n de la categor&#237;as de los usuarios'),
('Activar Categor&#237;a Usuarios',@idModulo,@idGestion,'asociacionCategoriaActivar','Esta acci&#243;n te permite activar la asociaci&#243;n de la categor&#237;a usuarios'),
('Desactivar Categor&#237;a Usuarios',@idModulo,@idGestion,'asociacionCategoriaDesactivar','Esta acci&#243;n te permite desactivar la asociaci&#243;n de la categor&#237;a usuarios'),
('Ingresar permisos usuario',@idModulo,@idGestion,'permisosIngresar','Esta acci&#243;n te permite ingresar permisos a las categor&#237;as'),
('Activar permisos usuarios',@idModulo,@idGestion,'permisosActivar','Esta acci&#243;n te permite activar los permisos a las categor&#237;as'),
('Desactivar permisos usuarios',@idModulo,@idGestion,'permisosDesactivar','Esta acci&#243;n te permite desactivar los permisos en las categor&#237;as');







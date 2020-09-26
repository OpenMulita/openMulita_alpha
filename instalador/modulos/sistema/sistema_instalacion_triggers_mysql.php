<?php

$sqlTriggers = array();


$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_modulos_ingresar;";
$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_modulos_actualizar;";

$sqlTriggers[] = "CREATE TRIGGER trg_sistema_modulos_ingresar 
						AFTER INSERT ON sistema_modulos
						FOR EACH ROW BEGIN
							DECLARE maxId INT;	    
							SET maxId=(SELECT MAX(sm_idModulo) FROM sistema_modulos);	
							INSERT INTO sistema_modulos_historial SET
								smh_idTipoEdicion = NEW.sm_idTipoEdicion, 
								smh_fechaEdicionHistorial = NEW.sm_fechaIngreso, 
								smh_idUsuarioEdito = NEW.sm_idUsuarioEdito, 
								smh_idModulo = maxId, 
								smh_nombreModulo =  NEW.sm_nombreModulo, 
								smh_parametroModulo =  NEW.sm_parametroModulo, 
								smh_descripcionModulo = NEW.sm_descripcionModulo, 
								smh_idEstado = NEW.sm_idEstado, 
								smh_motivoModulo = NEW.sm_motivoModulo; 	
						END;";

$sqlTriggers[] = "CREATE TRIGGER trg_sistema_modulos_actualizar 
						AFTER UPDATE ON sistema_modulos
						FOR EACH ROW BEGIN
							INSERT INTO sistema_modulos_historial SET
								smh_idTipoEdicion = NEW.sm_idTipoEdicion, 
								smh_fechaEdicionHistorial = NEW.sm_fechaEdicion, 
								smh_idUsuarioEdito = NEW.sm_idUsuarioEdito, 
								smh_idModulo = NEW.sm_idModulo, 
								smh_nombreModulo =  NEW.sm_nombreModulo, 
								smh_parametroModulo =  NEW.sm_parametroModulo, 
								smh_descripcionModulo = NEW.sm_descripcionModulo, 
								smh_idEstado = NEW.sm_idEstado, 
								smh_motivoModulo = NEW.sm_motivoModulo; 		
						END;";

$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_gestiones_ingresar;";
$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_gestiones_actualizar;";

$sqlTriggers[] = "CREATE TRIGGER trg_sistema_gestiones_ingresar AFTER INSERT ON sistema_gestiones
FOR EACH ROW BEGIN
	DECLARE maxId INT;
	SET maxId=(SELECT MAX(sg_idGestion) FROM sistema_gestiones);
	INSERT INTO sistema_gestiones_historial SET
		sgh_idTipoEdicion = NEW.sg_idTipoEdicion, 
		sgh_fechaEdicionHistorial = NEW.sg_fechaIngreso, 
		sgh_idUsuarioEdito = NEW.sg_idUsuarioEdito, 
		sgh_idGestion = maxId, 
		sgh_nombreGestion = NEW.sg_nombreGestion, 
		sgh_idModulo = NEW.sg_idModulo, 
		sgh_parametroGestion = NEW.sg_parametroGestion, 
		sgh_descripcionGestion = NEW.sg_descripcionGestion, 
		sgh_idEstado = NEW.sg_idEstado, 
		sgh_motivoGestion = NEW.sg_motivoGestion;
END;";

$sqlTriggers[] = "CREATE TRIGGER trg_sistema_gestiones_actualizar AFTER UPDATE ON sistema_gestiones
FOR EACH ROW BEGIN
		INSERT INTO sistema_gestiones_historial SET
		sgh_idTipoEdicion = NEW.sg_idTipoEdicion, 
		sgh_fechaEdicionHistorial = NEW.sg_fechaEdicion, 
		sgh_idUsuarioEdito = NEW.sg_idUsuarioEdito, 
		sgh_idGestion = NEW.sg_idGestion, 
		sgh_nombreGestion = NEW.sg_nombreGestion, 
		sgh_idModulo = NEW.sg_idModulo, 
		sgh_parametroGestion = NEW.sg_parametroGestion, 
		sgh_descripcionGestion = NEW.sg_descripcionGestion, 
		sgh_idEstado = NEW.sg_idEstado, 
		sgh_motivoGestion = NEW.sg_motivoGestion;
END; ";

$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_ingresar;";
$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_actualizar;";

$sqlTriggers[] = "
CREATE TRIGGER trg_sistema_usuarios_ingresar AFTER INSERT ON sistema_usuarios
FOR EACH ROW BEGIN
	DECLARE maxId INT;
	SET maxId = (SELECT MAX(su_idUsuario) FROM sistema_usuarios WHERE su_idUsuarioIngreso = NEW.su_idUsuarioIngreso);
	INSERT INTO sistema_usuarios_historial SET
		suh_idTipoEdicion = NEW.su_idTipoEdicion, 
		suh_fechaEdicionHistorial = NEW.su_fechaIngreso, 
		suh_idUsuarioEdito = NEW.su_idUsuarioIngreso, 
		suh_idUsuario = maxId, 
		suh_nombreUsuario =  NEW.su_nombreUsuario, 
		suh_mailUsuario = NEW.su_mailUsuario, 
		suh_imagenUsuario = NEW.su_imagenUsuario, 
		suh_descripcionUsuario = NEW.su_descripcionUsuario, 
		suh_idEstado = NEW.su_idEstado, 
		suh_motivoUsuario = NEW.su_motivoUsuario, 
		suh_poder = NEW.su_poder;    
END;";

$sqlTriggers[] = "
CREATE TRIGGER trg_sistema_usuarios_actualizar AFTER UPDATE ON sistema_usuarios
FOR EACH ROW BEGIN
	INSERT INTO sistema_usuarios_historial SET
		suh_idTipoEdicion = NEW.su_idTipoEdicion, 
		suh_fechaEdicionHistorial = NEW.su_fechaEdicion, 
		suh_idUsuarioEdito = NEW.su_idUsuarioIngreso, 
		suh_idUsuario = NEW.su_idUsuario, 
		suh_nombreUsuario =  NEW.su_nombreUsuario, 
		suh_mailUsuario = NEW.su_mailUsuario, 
		suh_imagenUsuario = NEW.su_imagenUsuario, 
		suh_descripcionUsuario = NEW.su_descripcionUsuario, 
		suh_idEstado = NEW.su_idEstado, 
		suh_motivoUsuario = NEW.su_motivoUsuario, 
		suh_poder = NEW.su_poder;  
END;";

$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_categoria_ingresar;";
$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_categoria_actualizar;";

$sqlTriggers[] = "CREATE TRIGGER trg_sistema_usuarios_categoria_ingresar AFTER INSERT ON sistema_usuarios_categorias
FOR EACH ROW BEGIN
	DECLARE maxId INT;
	SET maxId=(SELECT MAX(suc_idUsuarioCategoria) FROM sistema_usuarios_categorias WHERE suc_idUsuarioIngreso = NEW.suc_idUsuarioIngreso);
	INSERT INTO sistema_usuarios_categorias_historial SET
		such_idTipoEdicion = NEW.suc_idTipoEdicion, 
		such_fechaEdicionHistorial = NEW.suc_fechaIngreso, 
		such_idUsuarioEdito = NEW.suc_idUsuarioIngreso, 
		such_idUsuarioCategoria = maxId, 
		such_nombreUsuarioCategoria = NEW.suc_nombreUsuarioCategoria, 
		such_descripcionUsuarioCategoria = NEW.suc_descripcionUsuarioCategoria, 
		such_idEstado = NEW.suc_idEstado, 
		such_motivoUsuarioCategoria  = NEW.suc_motivoUsuarioCategoria; 
END;";

$sqlTriggers[] = "CREATE TRIGGER trg_sistema_usuarios_categoria_actualizar AFTER UPDATE ON sistema_usuarios_categorias
FOR EACH ROW BEGIN
	INSERT INTO sistema_usuarios_categorias_historial SET
		such_idTipoEdicion = NEW.suc_idTipoEdicion, 
		such_fechaEdicionHistorial = NEW.suc_fechaEdicion, 
		such_idUsuarioEdito = NEW.suc_idUsuarioIngreso, 
		such_idUsuarioCategoria = NEW.suc_idUsuarioCategoria, 
		such_nombreUsuarioCategoria = NEW.suc_nombreUsuarioCategoria, 
		such_descripcionUsuarioCategoria = NEW.suc_descripcionUsuarioCategoria, 
		such_idEstado = NEW.suc_idEstado, 
		such_motivoUsuarioCategoria = NEW.suc_motivoUsuarioCategoria;
END;";


$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_asociacion_categoria_ingresar;";
$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_asociacion_categoria_actualizar;";

$sqlTriggers[] = "
CREATE TRIGGER trg_sistema_usuarios_asociacion_categoria_ingresar AFTER INSERT ON sistema_usuarios_asociacion_categorias
FOR EACH ROW BEGIN
	DECLARE maxId INT;
	SET maxId = (SELECT MAX(suac_idUsuarioAsociacionCategoria) FROM sistema_usuarios_asociacion_categorias WHERE suac_idUsuarioIngreso = NEW.suac_idUsuarioIngreso);
	INSERT INTO sistema_usuarios_asociacion_categorias_historial SET
		suach_idTipoEdicion = NEW.suac_idTipoEdicion, 
		suach_fechaEdicionHistorial = NEW.suac_fechaIngreso, 
		suach_idUsuarioEdito = NEW.suac_idUsuarioIngreso, 
		suach_idUsuarioAsociacionCategoria = maxId, 
		suach_idUsuario = NEW.suac_idUsuario, 
		suach_idUsuarioCategoria = NEW.suac_idUsuarioCategoria, 
		suach_idEstado = NEW.suac_idEstado, 
		suach_motivoAsociacion = NEW.suac_motivoAsociacion;
END;";

$sqlTriggers[] = "
CREATE TRIGGER trg_sistema_usuarios_asociacion_categoria_actualizar AFTER UPDATE ON sistema_usuarios_asociacion_categorias
FOR EACH ROW BEGIN
	INSERT INTO sistema_usuarios_asociacion_categorias_historial SET
		suach_idTipoEdicion = NEW.suac_idTipoEdicion, 
		suach_fechaEdicionHistorial = NEW.suac_fechaEdicion, 
		suach_idUsuarioEdito = NEW.suac_idUsuarioIngreso, 
		suach_idUsuarioAsociacionCategoria = new.suac_idUsuarioAsociacionCategoria, 
		suach_idUsuario = NEW.suac_idUsuario, 
		suach_idUsuarioCategoria = NEW.suac_idUsuarioCategoria, 
		suach_idEstado = NEW.suac_idEstado, 
		suach_motivoAsociacion = NEW.suac_motivoAsociacion;		
END;";


$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_permisos_ingresar;";
$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_permisos_actualizar;";

$sqlTriggers[] = "CREATE TRIGGER trg_sistema_usuarios_permisos_ingresar AFTER INSERT ON sistema_usuarios_permisos
FOR EACH ROW BEGIN
	DECLARE maxId INT;
	SET maxId=(SELECT MAX(sup_idPermisoUsuario) FROM sistema_usuarios_permisos WHERE sup_idUsuarioIngreso = NEW.sup_idUsuarioIngreso);
	INSERT INTO sistema_usuarios_permisos_historial SET
		suph_idTipoEdicion = NEW.sup_idTipoEdicion, 
		suph_fechaEdicionHistorial = NEW.sup_fechaIngreso, 
		suph_idUsuarioEdito = NEW.sup_idUsuarioIngreso,  
		suph_idPermisoUsuario = maxId, 
		suph_idUsuario = NEW.sup_idUsuario, 
		suph_idModulo = NEW.sup_idModulo,
		suph_idGestion = NEW.sup_idGestion, 
		suph_idAccion = NEW.sup_idAccion, 
		suph_idEstado = NEW.sup_idEstado, 
		suph_motivoPermisoUsuario = NEW.sup_motivoPermisoUsuario;
END;";
$sqlTriggers[] = "CREATE TRIGGER trg_sistema_usuarios_permisos_actualizar AFTER UPDATE ON sistema_usuarios_permisos
FOR EACH ROW BEGIN
	INSERT INTO sistema_usuarios_permisos_historial SET
		suph_idTipoEdicion = NEW.sup_idTipoEdicion, 
		suph_fechaEdicionHistorial = NEW.sup_fechaEdicion, 
		suph_idUsuarioEdito = NEW.sup_idUsuarioIngreso,  
		suph_idPermisoUsuario =  NEW.sup_idPermisoUsuario, 
		suph_idUsuario = NEW.sup_idUsuario, 
		suph_idModulo = NEW.sup_idModulo,
		suph_idGestion = NEW.sup_idGestion, 
		suph_idAccion = NEW.sup_idAccion, 
		suph_idEstado = NEW.sup_idEstado, 
		suph_motivoPermisoUsuario = NEW.sup_motivoPermisoUsuario;			
END;";


$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_categorias_permisos_ingresar;";
$sqlTriggers[] = "DROP TRIGGER IF EXISTS trg_sistema_usuarios_categorias_permisos_actualizar;";
$sqlTriggers[] = "CREATE TRIGGER trg_sistema_usuarios_categorias_permisos_ingresar AFTER INSERT ON sistema_usuarios_categorias_permisos
FOR EACH ROW BEGIN
	DECLARE maxId INT;
	SET maxId=(SELECT MAX(sucp_idPermisoCategoria) FROM sistema_usuarios_categorias_permisos WHERE sucp_idUsuarioIngreso = NEW.sucp_idUsuarioIngreso);
	INSERT INTO sistema_usuarios_categorias_permisos_historial SET
		sucph_idTipoEdicion = NEW.sucp_idTipoEdicion, 
		sucph_fechaEdicionHistorial = NEW.sucp_fechaIngreso, 
		sucph_idUsuarioEdito = NEW.sucp_idUsuarioIngreso,  
		sucph_idPermisoCategoria = maxId, 
		sucph_idUsuarioCategoria = NEW.sucp_idUsuarioCategoria, 
		sucph_idModulo = NEW.sucp_idModulo,
		sucph_idGestion = NEW.sucp_idGestion, 
		sucph_idAccion = NEW.sucp_idAccion, 
		sucph_idEstado = NEW.sucp_idEstado, 
		sucph_motivoPermisoCategoria = NEW.sucp_motivoPermisoCategoria;
END;";
$sqlTriggers[] = "
CREATE TRIGGER trg_sistema_usuarios_categorias_permisos_actualizar AFTER UPDATE ON sistema_usuarios_categorias_permisos
FOR EACH ROW BEGIN
	INSERT INTO sistema_usuarios_categorias_permisos_historial SET
		sucph_idTipoEdicion = NEW.sucp_idTipoEdicion, 
		sucph_fechaEdicionHistorial = NEW.sucp_fechaEdicion, 
		sucph_idUsuarioEdito = NEW.sucp_idUsuarioIngreso,  
		sucph_idPermisoCategoria =  NEW.sucp_idPermisoCategoria, 
		sucph_idUsuarioCategoria = NEW.sucp_idUsuarioCategoria, 
		sucph_idModulo = NEW.sucp_idModulo,
		sucph_idGestion = NEW.sucp_idGestion, 
		sucph_idAccion = NEW.sucp_idAccion, 
		sucph_idEstado = NEW.sucp_idEstado, 
		sucph_motivoPermisoCategoria = NEW.sucp_motivoPermisoCategoria;			
END;";



echo("\n <br> *** Instalando Triggers Sistema*** ");

foreach($sqlTriggers as $trigger){
	executarQuerry($trigger);
}

echo("\n <br> *** Trigger Sistema Instalados *** <br> \n");




?>
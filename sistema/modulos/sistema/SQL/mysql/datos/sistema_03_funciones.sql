
/* Create Triggers */

-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- **********************   Modulo Sistema   ********************************
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


--  GESTION USUARIOS
DROP FUNCTION IF EXISTS fun_sistema_usuarios_validarDesarrollador;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_guardar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_cambioEstado;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_cambioClave;

-- GESTION USUARIOS CATEGORIAS
DROP FUNCTION IF EXISTS fun_sistema_usuarios_categorias_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_categorias_guardar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_categorias_cambioEStado;

-- ASOCIACION USUARIOS CATEGORIAS 
DROP FUNCTION IF EXISTS fun_sistema_usuarios_asociacion_categorias_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_asociacion_categorias_cambioEstado;

-- PERMISOS 
DROP FUNCTION IF EXISTS fun_sistema_usuarios_permisos_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_permisos_cambioEstado;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_categorias_permisos_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_categorias_permisos_cambioEstado;
DROP FUNCTION IF EXISTS fun_sistema_permisos_verificar;

-- Transacciones
DROP FUNCTION IF EXISTS fun_sistema_transaccion_usuarios_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_transaccion_usuarios_cambioEstado;


/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++ VALIDAR DESARROLLADOR +++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

DROP FUNCTION IF EXISTS fun_sistema_usuarios_validarDesarrollador;

--  Esto evalua si el usuario tiene permiso de desarrollador
DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_validarDesarrollador(
    
    idUsuario VARCHAR(10))
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE numero INT;
        -- Evalua que no halla resgistros repetidos en el sistema 
        SET numero = (SELECT count(1) FROM sistema_usuarios WHERE su_idUsuario=idUsuario and su_poder = "desarrollador" );
        IF numero>0 THEN
            SET retorno = '1000';
        ELSE
            SET retorno = '1003';
        END IF;
        
        RETURN retorno;
    END
//
DELIMITER ; 

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * +++++++++++++++++++++++++++++++++ GESTION SISTEMA ++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

--  GESTION MODULOS
DROP FUNCTION IF EXISTS fun_sistema_modulos_cambioEstado;
DROP FUNCTION IF EXISTS fun_sistema_gestiones_cambioEstado;

DELIMITER //
CREATE FUNCTION fun_sistema_modulos_cambioEstado(
    
    idModulo INT(7),
    idEstado INT(3),     
    idTipoEdicion INT(3), 
    motivo TEXT, 
    idSisUsuario INT(10)) 
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE fecha datetime;		
		SET fecha = now();
        UPDATE sistema_modulos SET
            sm_idEstado = idEstado,
            sm_idTipoEdicion = idTipoEdicion,
            sm_fechaEdicion = fecha,
            sm_idUsuarioEdito = idSisUsuario,
            sm_motivoModulo = motivo 
            WHERE sm_idModulo = idModulo;
         SET retorno = '1000';
        RETURN retorno;
    END
//
DELIMITER ;        

DELIMITER //
CREATE FUNCTION fun_sistema_gestiones_cambioEstado(
        
    idGestion INT(7),
    idEstado INT(3),     
    idTipoEdicion INT(3), 
    motivo TEXT, 
    idSisUsuario INT(10)) 
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE fecha datetime;		
		SET fecha = now();
        UPDATE sistema_gestiones SET
            sg_idEstado = idEstado,
            sg_idTipoEdicion = idTipoEdicion,
            sg_fechaEdicion = fecha,
            sg_idUsuarioEdito = idSisUsuario,
            sg_motivoGestion = motivo 
            WHERE sg_idGestion = idGestion;
         SET retorno = '1000';
        RETURN retorno;
    END
//
DELIMITER ;        



/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++ GESTION USUARIOS ++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

DROP FUNCTION IF EXISTS fun_sistema_usuarios_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_guardar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_cambioEstado;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_cambioClave;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_login_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_login_borrar;

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_ingresar(
   
    nombreUsuario VARCHAR(30), 
    mailUsuario VARCHAR(50), 
    claveUsuario VARCHAR(100), 
    imagenUsuario VARCHAR(10), 
    descripcionUsuario TEXT, 
    idEstado INT(3), 
    idTipoEdicion INT(3), 
    motivosUsuarios TEXT, 
    idSisUsuario INT(10), 
    poder VARCHAR(20)
    )
    
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 

    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE numero INT;
        DECLARE fecha datetime;		
		SET fecha = now();
        -- Evalua que no halla resgistros repetidos en el sistema 
        SET numero = (SELECT count(1) FROM sistema_usuarios WHERE su_nombreUsuario = nombreUsuario);
        IF numero<1 THEN
            INSERT INTO sistema_usuarios SET 
            su_nombreUsuario = nombreUsuario, 
            su_mailUsuario = mailUsuario, 
            su_claveUsuario = claveUsuario, 
            su_imagenUsuario = imagenUsuario, 
            su_descripcionUsuario = descripcionUsuario, 
            su_idEstado = idEstado, 
            su_fechaIngreso = fecha, 
            su_idUsuarioIngreso = idSisUsuario, 
            su_idTipoEdicion = idTipoEdicion, 
            su_fechaEdicion = fecha, 
            su_idUsuarioEdito = idSisUsuario, 
            su_motivoUsuario = motivosUsuarios, 
            su_poder = poder;
            SET retorno = '1000';
        ELSE
            SET retorno = '1003';
        END IF;
        
        RETURN retorno;
    END
//
DELIMITER ;        

-- Esta  funcion se encarga de guardar los cambios de los usuarios en el sistema

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_guardar(
    
    idUsuario INT(10), 
    mailUsuario VARCHAR(50), 
    imagenUsuario VARCHAR(10), 
    descripcionUsuario TEXT, 
    idTipoEdicion INT(3), 
    motivosUsuarios TEXT, 
    idSisUsuario INT(10))
     
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE fecha datetime;		
		SET fecha = now();
        UPDATE sistema_usuarios SET                 
                su_mailUsuario = mailUsuario, 
                su_imagenUsuario = imagenUsuario,
                su_descripcionUsuario = descripcionUsuario,
                su_idTipoEdicion = idTipoEdicion, 
                su_fechaEdicion = fecha, 
                su_idUsuarioEdito = idSisUsuario,
                su_motivoUsuario = motivosUsuarios 
                WHERE su_idUsuario = idUsuario;
        SET retorno = '1000';
        RETURN retorno;
    END
//
DELIMITER ;    
     
-- Esta  funcion se encarga de cambiar el estado de los usuarios de el sistema

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_cambioEstado(
    
    idUsuario INT(10),
    idEstado INT(3),     
    idTipoEdicion INT(3), 
    motivosUsuarios TEXT, 
    idSisUsuario INT(10)) 
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE fecha datetime;		
		SET fecha = now();
        UPDATE sistema_usuarios SET                 
            su_idEstado = idEstado,
            su_idTipoEdicion = idTipoEdicion,
            su_fechaEdicion = fecha,
            su_idUsuarioEdito = idSisUsuario,
            su_motivoUsuario = motivosUsuarios 
            WHERE su_idUsuario = idUsuario;
         SET retorno = '1000';
        RETURN retorno;
    END
//
DELIMITER ;        

-- Esta  funcion se encarga de resetear la clave de el sistema

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_cambioClave(
    
    idUsuario INT(10),
    clave VARCHAR(50),
    idTipoEdicion INT(3), 
    motivosUsuarios TEXT, 
    idSisUsuario INT(10)) 
    
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE fecha datetime;		
		SET fecha = now();
        UPDATE sistema_usuarios set                 
            su_claveUsuario = clave,
            su_idTipoEdicion = idTipoEdicion,
            su_fechaEdicion = fecha,
            su_motivoUsuario = motivosUsuarios,
            su_idUsuarioEdito = idSisUsuario
            where su_idUsuario = idUsuario;
         SET retorno = '1000';
        RETURN retorno;
    END
//
DELIMITER ;      


DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_login_ingresar(
    
	idUsuario INT(10), 
	horaLogin TIME,  
	fechaLogin DATE, 
	tipoLogin VARCHAR(100),
	idEstado INT(3),
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)) 

	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE fecha datetime;		
		SET fecha = now();
		INSERT INTO sistema_login SET 
			sl_idUsuario = idUsuario, 
			sl_horaLogin = horaLogin, 
			sl_fechaLogin = fechaLogin,  
			sl_tipoLogin = tipoLogin,
			sl_idEstado = idEstado, 
			sl_fechaIngreso = fecha, 
			sl_idUsuarioIngreso = idSisUsuario, 
			sl_idTipoEdicion = idTipoEdicion, 
			sl_fechaEdicion = fecha, 
			sl_idUsuarioEdito = idSisUsuario, 
			sl_motivoLogin = motivos,;
			SET retorno = '1000';
		RETURN retorno;
	END
//
DELIMITER ;      


DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_login_guardar(
    
	idLogin BIGINT(250), 
	horaLogin TIME,  
	fechaLogin DATE, 
	tipoLogin VARCHAR(100),
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)) 

	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE fecha datetime;		
		SET fecha = now();
		UPDATE sistema_login SET 
			sl_horaLogin = horaLogin, 
			sl_fechaLogin = fechaLogin,  
			sl_tipoLogin = tipoLogin,
			sl_idTipoEdicion = idTipoEdicion, 
			sl_fechaEdicion = fecha, 
			sl_idUsuarioEdito = idSisUsuario, 
			sl_motivoLogin = motivos
			WHERE sl_idLogin = idLogin;
			SET retorno = '1000';
		RETURN retorno;
	END
//
DELIMITER ;     

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_login_cambioEstado(
    
	idLogin BIGINT(250), 
	idEstado INT(3),
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)) 

	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE fecha datetime;		
		SET fecha = now();
		UPDATE sistema_login SET 
			sl_idEstado = idEstado, 
			sl_idTipoEdicion = idTipoEdicion, 
			sl_fechaEdicion = fecha, 
			sl_idUsuarioEdito = idSisUsuario, 
			sl_motivoLogin = motivos
			WHERE sl_idLogin = idLogin;
			SET retorno = '1000';
		RETURN retorno;
	END
//
DELIMITER ;     

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++ GESTION USUARIOS CATEGORIA ++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_categorias_ingresar(
   
    nombre VARCHAR(30), 
    descripcion TEXT, 
    idEstado INT(3), 
    idTipoEdicion INT(3), 
    motivos TEXT, 
    idSisUsuario INT(10)
    )
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE numero INT;
        DECLARE fecha datetime;		
		SET fecha = now();		
        -- Evalua que no halla resgistros repetidos en el sistema 
        SET numero = (SELECT count(1) FROM sistema_usuarios_categorias WHERE suc_nombreUsuarioCategoria=nombre);
        IF numero<1 THEN
			INSERT INTO sistema_usuarios_categorias SET
				suc_nombreUsuarioCategoria = nombre, 
				suc_descripcionUsuarioCategoria = descripcion, 
				suc_idEstado = idEstado, 
				suc_fechaIngreso = fecha, 
				suc_idUsuarioIngreso = idSisUsuario, 
				suc_idTipoEdicion = idTipoEdicion, 
				suc_fechaEdicion = fecha, 
				suc_idUsuarioEdito = idSisUsuario, 
				suc_motivoUsuarioCategoria = motivos;
            SET retorno = '1000';
        ELSE
            SET retorno = '1003';
        END IF;
        
        RETURN retorno;
    END
//
DELIMITER ;        

-- Este metodo se encarga de guardar los cambios 

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_categorias_guardar(
    id INT(5),
    nombre VARCHAR(30), 
    descripcion TEXT, 
    idTipoEdicion INT(3), 
    motivos TEXT, 
    idSisUsuario INT(10)
    )
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
		DECLARE retorno VARCHAR(5);
        DECLARE numero INT;
        DECLARE fecha datetime;		
		SET fecha = now();		
        -- Evalua que no halla resgistros repetidos en el sistema 
        SET numero = (SELECT count(1) FROM sistema_usuarios_categorias WHERE suc_nombreUsuarioCategoria=nombre AND suc_idUsuarioCategoria!=id);
        IF numero<1 THEN
            UPDATE sistema_usuarios_categorias SET 
                    suc_nombreUsuarioCategoria = nombre,
                    suc_descripcionUsuarioCategoria = descripcion,
                    suc_idTipoEdicion = idTipoEdicion,
                    suc_motivoUsuarioCategoria = motivos, 
                    suc_idUsuarioEdito = idSisUsuario, 
                    suc_fechaEdicion = fecha  
                    WHERE suc_idUsuarioCategoria = id;            
            SET retorno = '1000';
        ELSE
            SET retorno = '1003';
        END IF;
        
        RETURN retorno;
    END
//
DELIMITER ;   

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_categorias_cambioEstado(
  
    id INT(10),
    idEstado INT(3),     
    idTipoEdicion INT(3), 
    motivos TEXT, 
    idSisUsuario INT(10)) 
    RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
    BEGIN 
        DECLARE retorno VARCHAR(5);
        DECLARE fecha datetime;		
		SET fecha = now();	
        UPDATE sistema_usuarios_categorias SET 
            suc_idEstado = idEstado,
            suc_idTipoEdicion = idTipoEdicion,
            suc_motivoUsuarioCategoria = motivos, 
            suc_idUsuarioEdito = idSisUsuario, 
            suc_fechaEdicion = fecha  
            WHERE suc_idUsuarioCategoria = id;
        SET retorno = '1000';
        RETURN retorno;
    END
//
DELIMITER ;        

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * +++++++++++++++++ GESTION USUARIOS ASOCIACION CATEGORIAS +++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_asociacion_categorias_ingresar(
   
	idUsuario INT(10), 
	idCategoria INT(10), 
	idEstado INT(3), 
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)
	)
	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE numero INT;
		DECLARE fecha datetime;		
		SET fecha = now();
		-- Evalua que no halla resgistros repetidos en el sistema 
		SET numero = (SELECT COUNT(1) FROM sistema_usuarios_asociacion_categorias WHERE suac_idUsuario=idUsuario AND suac_idUsuarioCategoria=idCategoria);
		IF numero<1 THEN
			INSERT INTO sistema_usuarios_asociacion_categorias SET
			suac_idUsuario = idUsuario,
			suac_idUsuarioCategoria = idCategoria,
			suac_idEstado = idEstado,
			suac_fechaIngreso = fecha,
			suac_idUsuarioIngreso = idSisUsuario,
			suac_idTipoEdicion = idTipoEdicion,
			suac_fechaEdicion = fecha,
			suac_idUsuarioEdito = idSisUsuario,
			suac_motivoAsociacion = motivos;
			SET retorno = '1000';
		ELSE
			SET retorno = '1003';
		END IF;
		RETURN retorno;
	END
//
DELIMITER ;        

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_asociacion_categorias_cambioEstado(

	id INT(10),
	idEstado INT(3),     
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)) 
	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE fecha datetime;		
		SET fecha = now();
		UPDATE sistema_usuarios_asociacion_categorias SET                 
			suac_idEstado = idEstado,
			suac_idTipoEdicion = idTipoEdicion,
			suac_fechaEdicion = fecha,
			suac_idUsuarioEdito = idSisUsuario,
			suac_motivoAsociacion = motivos 
			WHERE suac_idUsuarioAsociacionCategoria = id;
		SET retorno = '1000';
		RETURN retorno;
	END
//
DELIMITER ; 


/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * +++++++++++++++++++++++++++++++ GESTION PERMISOS +++++++++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_permisos_ingresar(
   
	idUsuario INT(10),
	idModulo INT(10),
	idGestion INT(10), 
	idAccion INT(5),
	idEstado INT(3),
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)
	)
	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE numero INT;
		DECLARE fecha datetime;		
		SET fecha = now();
		-- Evalua que no halla resgistros repetidos en el sistema 
		SET numero = (SELECT COUNT(1) FROM sistema_usuarios_permisos WHERE sup_idUsuario=idUsuario AND sup_idModulo=idModulo AND sup_idGestion=idGestion AND sup_idAccion=idAccion);
		IF numero<1 THEN
			INSERT INTO sistema_usuarios_permisos SET
			sup_idUsuario = idUsuario, 
			sup_idModulo = idModulo, 
			sup_idGestion = idGestion, 
			sup_idAccion = idAccion, 
			sup_idEstado = idEstado, 
			sup_fechaIngreso = fecha, 
			sup_idUsuarioIngreso = idSisUsuario, 
			sup_idTipoEdicion = idTipoEdicion, 
			sup_fechaEdicion = fecha, 
			sup_idUsuarioEdito = idSisUsuario,  
			sup_motivoPermisoUsuario = motivos;
			SET retorno = '1000';
		ELSE
			SET retorno = '1003';
		END IF;
		RETURN retorno;
	END
//
DELIMITER ;  


DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_permisos_cambioEstado(

	id INT(10),
	idEstado INT(3),     
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)) 
	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE fecha datetime;		
		SET fecha = now();
		UPDATE sistema_usuarios_permisos SET                 
			sup_idEstado = idEstado,
			sup_idTipoEdicion = idTipoEdicion,
			sup_fechaEdicion = fecha,
			sup_idUsuarioEdito = idSisUsuario,
			sup_motivoPermisoUsuario = motivos 
			WHERE sup_idPermisoUsuario = id;
		SET retorno = '1000';
		RETURN retorno;
	END
//
DELIMITER ; 


DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_categorias_permisos_ingresar(
   
	idCategoria INT(10),
	idModulo INT(10),
	idGestion INT(10), 
	idAccion INT(5),
	idEstado INT(3),
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)
	)
	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE numero INT;
		DECLARE fecha datetime;		
		SET fecha = now();
		-- Evalua que no halla resgistros repetidos en el sistema 
		SET numero = (SELECT COUNT(1) FROM sistema_usuarios_categorias_permisos WHERE sucp_idUsuarioCategoria=idCategoria AND sucp_idModulo=idModulo AND sucp_idGestion=idGestion AND sucp_idAccion=idAccion);
		IF numero<1 THEN
			INSERT INTO sistema_usuarios_categorias_permisos SET
			sucp_idUsuarioCategoria = idCategoria, 
			sucp_idModulo = idModulo, 
			sucp_idGestion = idGestion, 
			sucp_idAccion = idAccion, 
			sucp_idEstado = idEstado, 
			sucp_fechaIngreso = fecha, 
			sucp_idUsuarioIngreso = idSisUsuario, 
			sucp_idTipoEdicion = idTipoEdicion, 
			sucp_fechaEdicion = fecha, 
			sucp_idUsuarioEdito = idSisUsuario,  
			sucp_motivoPermisoCategoria = motivos;
			SET retorno = '1000';
		ELSE
			SET retorno = '1003';
		END IF;
		RETURN retorno;
	END
//
DELIMITER ; 

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_categorias_permisos_cambioEstado(

	id INT(10),
	idEstado INT(3),     
	idTipoEdicion INT(3), 
	motivos TEXT, 
	idSisUsuario INT(10)) 
	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE fecha datetime;		
		SET fecha = now();
		UPDATE sistema_usuarios_categorias_permisos SET                 
			sucp_idEstado = idEstado,
			sucp_idTipoEdicion = idTipoEdicion,
			sucp_fechaEdicion = fecha,
			sucp_idUsuarioEdito = idSisUsuario,
			sucp_motivoPermisoCategoria = motivos 
			WHERE sucp_idPermisoCategoria = id;
		SET retorno = '1000';
		RETURN retorno;
	END
//
DELIMITER ; 




DELIMITER //
CREATE FUNCTION fun_sistema_permisos_verificar(
   
	idUsuario INT(255),
	modulo VARCHAR(100),
	gestion VARCHAR(100),
	accion VARCHAR(100)
	
    )
	RETURNS VARCHAR(5) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		DECLARE numRow INT(255);
		
		
		SET numRow = (SELECT COUNT(sucp_idPermisoCategoria) FROM sistema_usuarios_categorias_permisos
			INNER JOIN sistema_modulos ON sm_idModulo = sucp_idModulo
			INNER JOIN sistema_gestiones ON sg_idGestion = sucp_idGestion
            INNER JOIN sistema_acciones ON sa_idAccion = sucp_idAccion
            INNER JOIN sistema_usuarios_categorias ON suc_idUsuarioCategoria = sucp_idUsuarioCategoria
			INNER JOIN sistema_usuarios_asociacion_categorias ON suac_idUsuarioCategoria = suc_idUsuarioCategoria
            WHERE suac_idUsuario = idUsuario
				AND sm_parametroModulo = modulo
				AND sg_parametroGestion = gestion
				AND sa_parametroAccion = accion
				AND suac_idEstado in (1,2));		
		IF numRow > 0 THEN
			SET retorno = '1000';
	    ELSE
	    	SET numRow = (SELECT COUNT(sup_idPermisoUsuario) FROM sistema_usuarios_permisos
			INNER JOIN sistema_modulos on sm_idModulo = sup_idModulo
			INNER JOIN sistema_gestiones on sg_idGestion = sup_idGestion
			INNER JOIN sistema_acciones on sa_idAccion = sup_idAccion
			WHERE sup_idUsuario = idUsuario
				AND sm_parametroModulo = modulo
				AND sg_parametroGestion = gestion
				AND sa_parametroAccion = accion
				AND sup_idEstado in (1,2));
			IF numRow > 0 THEN
				SET retorno = '1000';
		    ELSE
			    SET numRow = (SELECT count(1) FROM sistema_usuarios WHERE su_idUsuario = idUsuario and su_poder in ("desarrollador","administrador") );
				IF numRow > 0 THEN
					SET retorno = '1000';
				ELSE
					SET retorno = '1003';
				END IF;
            END IF;	
        END IF;
        RETURN retorno;
	END
//
DELIMITER ;  

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * +++++++++++++++++++++++++++++++ TRANSACCIONES USUARIOS +++++++++++++++++++++++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */


-- Transacciones
DROP FUNCTION IF EXISTS fun_sistema_usuarios_transaccion_ingresar;
DROP FUNCTION IF EXISTS fun_sistema_usuarios_transaccion_cambioEstado;

DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_transaccion_ingresar(
   
	idUsuario INT(10),
	codigo VARCHAR(200),
	idModulo INT(10),
	idGestion INT(10), 
	idAccion INT(5),
	idRegistro INT (255),
	idEstado INT(3),
	detalle TEXT
	)
	RETURNS VARCHAR(255) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(255);
		DECLARE numero INT;
		DECLARE fecha datetime;		
		SET fecha = now();
		-- Evalua que no halla resgistros repetidos en el sistema 
		-- SET numero = (SELECT count(1) FROM sistema_usuarios_permisos WHERE sup_idUsuario=idUsuario AND sup_idModulo=idModulo AND sup_idGestion=idGestion AND sup_idAccion=idAccion);
		INSERT INTO sistema_usuarios_transaccion SET
		sut_idUsuario = idUsuario, 
		stu_codigoTransaccion = codigo,
		sut_idModulo = idModulo, 
		sut_idGestion = idGestion, 
		sut_idAccion = idAccion, 
		sut_idRegistro = idRegistro, 
		sut_fechaInicioTransaccion = fecha, 
		sut_idEstado = idEstado, 
		sut_fechaFinTransaccion = fecha, 
		sut_detalle= detalle;	
		SET retorno = (SELECT sut_idTransaccionUsuario FROM sistema_usuarios_transaccion WHERE sut_idUsuario=idUsuario AND sut_idModulo=idModulo AND sut_idGestion=idGestion AND sut_idAccion=idAccion order by sut_idTransaccionUsuario desc limit 1);
		RETURN retorno;
	END
//
DELIMITER ;  


DELIMITER //
CREATE FUNCTION fun_sistema_usuarios_transaccion_cambioEstado(
   
	codigo VARCHAR(255),
	codigoRespuesta BIGINT(200),
	idEstado INT(3),
	detalle TEXT
	)
	RETURNS VARCHAR(255) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
	BEGIN 
		DECLARE retorno VARCHAR(5);
		UPDATE sistema_usuarios_transaccion SET                 
			sut_idEstado = idEstado,
			sut_codigoRespuesta = codigoRespuesta,
			sut_detalle = detalle 
			WHERE stu_codigoTransaccion = codigo;
		SET retorno = '1000';
		RETURN retorno;
	END
//
DELIMITER ;  












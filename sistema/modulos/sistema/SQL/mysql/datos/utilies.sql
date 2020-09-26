

SELECT 	sa_idModulo,
									sa_idGestion,
									sa_idAccion 
								FROM sistema_acciones 
								INNER JOIN sistema_modulos ON sm_idModulo = sa_idModulo
								INNER JOIN sistema_gestiones ON sg_idGestion = sa_idGestion
								WHERE sm_parametroModulo = :parModulo
								AND sg_parametroGestion = :parGestion
								AND sa_parametroAccion = :parAccion;
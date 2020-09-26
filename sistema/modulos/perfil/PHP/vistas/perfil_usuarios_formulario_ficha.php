<?php
	
	include("configuracion/globales.php");
	include_once("modulos/perfil/PHP/dao/perfil_usuarios_dao.php");
	
	// Cargo los textos de los formularios 
	
	
	$objUsuario = new perfil_usuarios_dao();
	$objUsuario->cargar($SISUSER);
	
	$xmlFormulario = $objUsuario->formularioIdioma($MODULO,$GESTION,$IDIOMA);
	
	switch($objUsuario->obtenerIDEstado()){
		case 1:
		case 3:
			$nombreBoton = $xmlFormulario->botones->activar;
			$accion = $xmlFormulario->acciones->activar;
			break;
		case 2:
		case 5:
			$nombreBoton = $xmlFormulario->botones->desactivar;
			$accion = $xmlFormulario->acciones->desactivar;
			break;
	}
		
?>

<script type="text/javascript">

	function modalModificarUsuario(){
		$("#modalModificarUsuario").modal('show');
	
	}modificar
	
	function modalCambioClaveUsuario(){
		$("#modalCambioClaveUsuario").modal('show');
	
	}
	
</script>	


<script type="text/javascript">
	function ajaxModificarUsuario(){
	
		$.ajax({
			url: "sistema.php",
			type: "post",
			data: {	"integracion": "<?=$INTEGRACION?>", 
					"modulo": "<?=$MODULO?>", 
					"gestion": "<?=$GESTION?>",
					"accion": "<?= $xmlFormulario->acciones->modificar; ?>",	
					"formulario": "",
					"idRegistro": "<?=$objUsuario->obtenerID()?>",
					"transaccion": "true",
					"idioma":"<?=$IDIOMA?>",
					"txtDescripcion": "<?=$objUsuario->obtenerDescripcion() ?>",									 		
					"txtMotivo": $("#txtMotivo").val(),
					"rbutonAvatar": $("#rbutonAvatar").val(),
					"txtMail": $("#txtMail").val()

			},
			success: function(data){
				showUserTelemNotes();
				//close popup
				$("#modalModificarUsuario").modal('toggle');
				//actualizo lista de notas
			},
			error: function(data, errmsg, objerror){
				//$("#users_notes_list").html(data.responseText);
				return false;
			}
		});
	};	
</script>

<div class='row'>
	<div class='col-md-12 col-sm-12 col-xs-12'>
		<div class='x_panel'>
			<div class='x_title'>
				<h2>
					<?=$xmlFormulario->titulos->fichaUsuario;?>:<?=$SISUSER?><small></small>
				</h2>
				<ul class='nav navbar-right panel_toolbox'>
					<li>
					</li>
				</ul>
				<div class='clearfix'></div>
			</div>
			<div class='x_content'>
				<div class='col-md-3 col-sm-3 col-xs-12 profile_left'>
					<div class='profile_img'>
						<div id='crop-avatar'>
							<!-- Current avatar -->
							<img class='img-responsive avatar-view' src='modulos/sistema/imagenes/avatares/<?=$objUsuario->obtenerImagen()?>.png' alt='Avatar' title='Change the avatar'>
						</div>
					</div>
					<h3><?=$objUsuario->obtenerNombre()?></h3>
					<ul class='list-unstyled user_data'>
						<li>
							<i class='fa fa-map-marker user-profile-icon'></i>
							<?=$objUsuario->obtenerNombreEstado()?>
						</li>
						<li class='m-top-xs'>
							<i class='fa fa-envelope-o user-profile-icon'></i>
							<a href='#'><?=$objUsuario->obtenerMail()?></a>
						</li>
					</ul>
					<button  class='btn btn-primary' onclick='modalModificarUsuario()'>
						<i class='fa fa-edit m-right-xs'></i>
						<?=$xmlFormulario->botones->modificar?>
					</button>
					<br>
					<button  class='btn btn-primary' onclick='modalCambioClaveUsuario()'>
						<i class='fa fa-key m-right-xs'></i>
						<?=$xmlFormulario->botones->cambioClave?>
					</button>
					<br>
					<br/>
				</div>
				<div class='col-md-9 col-sm-9 col-xs-12'>
					<div id='tablaTransacciones' class='profile_title'>
<?php
						//include ("modulos/perfil/interfaces/interface_gt/tablas/perfil_tablaUsuariosTransacciones.php"); 
?> 
					</div>
					<div class='' role='tabpanel' data-example-id='togglable-tabs'>
						<ul id='myTab' class='nav nav-tabs bar_tabs' role='tablist'>
							<li role='presentation' class='active'>
								<a href='#tab_mas'	id='home-tab' role='tab' data-toggle='tab' aria-expanded='true'><?=$xmlFormulario->pestanias->detalles?></a>
							</li>
							<li role='presentation' class=''>
								<a href='#tab_historial'	id='profile-tab' role='tab' data-toggle='tab' aria-expanded='false'><?=$xmlFormulario->pestanias->historial?></a>
							</li>
							<li role='presentation' class=''>
								<a href='#tab_categorias' id='profile-tab2' role='tab' data-toggle='tab' aria-expanded='false'><?=$xmlFormulario->pestanias->categoria?></a>
							</li>
							<li role='presentation' class=''>
								<a href='#tab_permisos' id='profile-tab3' role='tab'  data-toggle='tab' aria-expanded='false'><?=$xmlFormulario->pestanias->permisos?></a>
							</li>							
						</ul>
						<div id='myTabContent' class='tab-content'>
							<div role='tabpanel' class='tab-pane fade active in' id='tab_mas' aria-labelledby='home-tab'>
								<div class='x_panel' style='height: auto;'>
									<div class='x_title'>
										<h2>
											<?=$xmlFormulario->subMenusTitulos->detalles?><small></small>
										</h2>
										<div class='clearfix'></div>
									</div>
									<div class='x_content' >
										<form id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
													<?=$xmlFormulario->campos->nombre?> : <span class='required'>*</span>
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<input 
														class='form-control col-md-8 col-xs-12'
														value='<?=$objUsuario->obtenerNombre()?>'
														disabled='disabled'>
												</div>
											</div> 
											<div class='clearfix'></div>
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
													<?=$xmlFormulario->campos->mail?> : <span class='required'>*</span>
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<input 
														class='form-control col-md-8 col-xs-12'
														value='<?=$objUsuario->obtenerMail()?>'
														disabled='disabled'>
												</div>
											</div> 
											<div class='clearfix'></div>
											
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
													<?=$xmlFormulario->campos->descripcion?> : <span class='required'>*</span>
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<textarea 
														class='form-control' 
														disabled='disabled'><?=$objUsuario->obtenerDescripcion()?></textarea>
												</div>
											</div>
											<div class='clearfix'></div>
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
													<?=$xmlFormulario->campos->estado?> : <span class='required'>*</span>
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<input 
														class='form-control col-md-8 col-xs-12'
														value='<?=$objUsuario->obtenerNombreEstado()?>'
														disabled='disabled'>
												</div>
											</div> 
											<div class='clearfix'></div>
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
													<?=$xmlFormulario->campos->motivo?> : <span class='required'>*</span>
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<textarea 
														id='message' 
														class='form-control' 
														disabled='disabled'><?=$objUsuario->obtenerMotivo()?></textarea>
												</div>
											</div>
										</form>
									</div>
								</div>	
							</div>
							<div role='tabpanel' class='tab-pane fade' id='tab_historial' aria-labelledby='home-tab'>
								<div class='x_panel' style='height: auto;'>
									<div class='x_title'>
										<h2>
											<?=$xmlFormulario->subMenusTitulos->historial?><small></small>
										</h2>
										<div class='clearfix'></div>
									</div>
									<div class='x_content' >
							
<?php 						
                                include ("modulos/perfil/PHP/vistas/perfil_usuarios_tablaHistorial.php"); 
?>
									</div>
								</div>


							</div>
							<div role='tabpanel' class='tab-pane fade' id='tab_categorias' aria-labelledby='profile-tab'>
								<div class='x_panel' style='height: auto;'>
									<div class='x_title'>
										<h2>
											<?=$xmlFormulario->subMenusTitulos->categorias?><small></small>
										</h2>
										<div class='clearfix'></div>
									</div>
									<div class='x_content' >
							
<?php 						
                                include ("modulos/perfil/PHP/vistas/perfil_usuarios_tablaAsociacionCategorias.php"); 
?>
									</div>
								</div>

							</div>
							<div role='tabpanel' class='tab-pane fade' id='tab_permisos' aria-labelledby='profile-tab'>
								<div class='x_panel' style='height: auto;'>
									<div class='x_title'>
										<h2>
											<?=$xmlFormulario->subMenusTitulos->permisos?><small></small>
										</h2>
										<div class='clearfix'></div>
									</div>
									<div class='x_content' >
<?php 						
								include ("modulos/perfil/PHP/vistas/perfil_usuarios_tablaPermisos.php"); 
?>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='col-md-6 col-sm-12 col-xs-12'></div>
		<div class='clearfix'></div>
	</div>
</div>
<?php 
/*
 * Modal para modificar el usuario solo utiliza los cambos de mail e imagen los demas campos solo el administrador puede utilizar
 * 
 */
$imgUno=$imgDos=$imgTres=$imgCuatro=$imgCinco="";
switch ($objUsuario->obtenerImagen()) {
	case "avatar1":
		$imgUno = 'checked';
		break;
	case "avatar2":
		$imgDos = 'checked';
		break;
	case "avatar3":
		$imgTres = 'checked';
		break;
	case "avatar4":
		$imgCuatro = 'checked';
		break;
	case "avatar5":
		$imgCinco = 'checked';
		break;
}
?>

<div id='modalModificarUsuario' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'><?=$xmlFormulario->titulos->modificarPerfil;?></h4>
			</div>
			<div class='modal-body'>
				<form name='formdatos' method='post' action='sistema.php' id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
							<?=$xmlFormulario->campos->mail?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								name='txtMail' 
								id='txtMail'
								type='email' 
								id='last-name' 
								name='last-name' 
								required='required' 
								class='form-control col-md-7 col-xs-12'								
								value='<?=$objUsuario->obtenerMail()?>'>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12'><?=$xmlFormulario->campos->imagen?> : <span class='required'>*</span></label>  
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<label>
								<img  src='modulos/sistema/imagenes/avatares/avatar1.png' height='50' width='50'>
								<input id='rbutonAvatar'  type='radio' name='rbutonAvatar' value='avatar1' class='flat' <?=$imgUno?>/>
							</label>
							<label>
								<img  src='modulos/sistema/imagenes/avatares/avatar2.png' height='50' width='50'>
								<input id='rbutonAvatar' type='radio' name='rbutonAvatar' value='avatar2' class='flat' <?=$imgDos?>/>
							</label>
							<label>
								<img  src='modulos/sistema/imagenes/avatares/avatar3.png' height='50' width='50'>
								<input id='rbutonAvatar' type='radio' name='rbutonAvatar' value='avatar3' class='flat' <?=$imgTres?>/>
							</label>
							<label>
								<img  src='modulos/sistema/imagenes/avatares/avatar4.png' height='50' width='50'>
								<input id='rbutonAvatar' type='radio' name='rbutonAvatar' value='avatar4' class='flat' <?=$imgCuatro?>/>
							</label>
							<label>
								<img  src='modulos/sistema/imagenes/avatares/avatar5.png' height='50' width='50'>
								<input id='rbutonAvatar' type='radio' name='rbutonAvatar' value='avatar5' class='flat' <?=$imgCinco?>/>
							</label>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->motivo?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<textarea 
								name='txtMotivo'
								id='txtMotivo' 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								class='form-control' 
								data-parsley-trigger='keyup' 
								data-parsley-minlength='10' 
								data-parsley-maxlength='150' 
								data-parsley-minlength-message='<?=$xmlFormulario->mensajes->areaAlerta?>' 
								data-parsley-validation-threshold='10'><?=$objUsuario->obtenerMotivo()?></textarea>
								<label for='message'><?=$xmlFormulario->mensajes->areaMensaje?>:</label>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>		
							<input type='hidden' name='accion' value='perfilModificar'>
							<input type='hidden' name='formulario' value='perfilFicha'>
							<input type='hidden' name='idFicha' value='<?=$objUsuario->obtenerID()?>'>				
							<input type='hidden' name='idRegistro' value='<?=$objUsuario->obtenerID()?>'>	
							<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>		
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<button type='submit' class='btn btn-success'><?=$xmlFormulario->botones->modificar?></button>
						</div>
					</div>
				</form>
			</div>			
		</div>
	</div>
</div>



<div id='modalCambioClaveUsuario' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'><?=$xmlFormulario->titulos->cambioClave?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form name='formdatos' method='post' action='sistema.php' id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->claveActual?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								name='passClaveVieja'
								type='password' 
								id='passClave'
								data-parsley-required='required' 
								data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								class='form-control col-md-7 col-xs-12'
								data-validate-length='6,8'>
						</div>
					</div>	
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->claveNueva?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								name='passClaveNueva'
								type='password' 
								id='passClave'
								data-parsley-required='required' 
								data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								class='form-control col-md-7 col-xs-12'
								data-validate-length='6,8'>
						</div>
					</div>	
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->claveConfirmacion?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								name='passClaveRepeticion'
								type='password' 
								id='passClave'
								data-parsley-required='required' 
								data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								class='form-control col-md-7 col-xs-12'
								data-validate-length='6,8'>
						</div>
					</div>						
					<div class='ln_solid'></div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' name='accion' value='perfilCambioClave'>		
							<input type='hidden' name='formulario' value='perfilFicha'>		
							<input type='hidden' name='idFicha' value='<?=$IDFICHA?>'>	
							<input type='hidden' name='idRegistro' value='<?=$IDFICHA?>'>
							<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>		
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>	
							<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->aceptar?></button>									
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>			
















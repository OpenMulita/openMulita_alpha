
<script src='modulos/sistema/JS/sistema_modals_validadores.js'></script>
<script src='modulos/sistema/JS/sistema_modals_permisos.js'></script>
<script type="text/javascript">

	function modalIngresarCategoria(){
		$("#modalIngresarCategoria").modal('show');	
	}
	
</script>	

<div class='row'>
	<div class='col-md-12 col-sm-12 col-xs-12'>
		<div class='x_panel'>
			<div class='x_title'>
				<h2>
					<?=$xmlFormulario->titulos->fichaUsuario?>: <?= $objUsuario->obtenerID() ?><small></small>
				</h2>
				<ul class='nav navbar-right panel_toolbox'>
					<li>
						<form name='formdatos' method='POST' action='sistema.php' class='btn-group'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' name='formulario' value='usuariosListar'>
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->lista?></button>
						</form>
					</li>
				</ul>
				<div class='clearfix'></div>
			</div>
			<div class='x_content'>
				<div class='col-md-3 col-sm-3 col-xs-12 profile_left'>
					<div class='profile_img'>
						<div id='crop-avatar'>
							<!-- Current avatar -->
							<img class='img-responsive avatar-view' src='interfaces/interface_gt/imagenes/avatares/<?=$objUsuario->obtenerImagen()?>.png' alt='Avatar' title='Change the avatar'>
						</div>
					</div>
					<h3><?=$objUsuario->obtenerNombre() ?></h3>
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
					<button  class='btn btn-primary' onclick='modalModificarFicha()'>
						<i class='fa fa-edit m-right-xs'></i>
						<?=$xmlFormulario->botones->modificar?>
					</button>
					<br/>										
<?php 			if($objUsuario->obtenerIDEstado()!=4){ ?>						
					<button  class='<?=$btnColor?>' onclick='modalValidadorClave("<?=$accionFinal?>","<?=$IDFICHA?>","<?=$tituloModal?>")'>
						<i class='<?=$nombreA?> m-right-xs'></i>
						<?=$nombreBoton?>
					</button>
					<br/>
					<button  class='btn btn-danger' onclick='modalValidadorClave("usuariosBorrar","<?=$IDFICHA?>","<?=$xmlFormulario->modals->borrar?>")'>
						<i class='fa fa-trash-o m-right-xs'></i>
						<?=$xmlFormulario->botones->borrar?>
					</button>			
					<br/>	
<?php 			}else{  ?>
					<button  class='btn btn-danger' onclick='modalValidadorClave("usuariosReactivar","<?=$IDFICHA?>","<?=$xmlFormulario->modals->reactivar?>")'>
						<i class='fa fa-edit m-right-xs'></i>
						<?=$xmlFormulario->botones->reactivar?>
					</button>
					<br/>	
<?php 			}		?>
					<button  class='btn btn-info' onclick='modalValidadorClave("usuariosResetearClave","<?=$IDFICHA?>","<?=$xmlFormulario->modals->restablecerClave?>")'>
						<i class='fa fa-key'></i>
						<?=$xmlFormulario->botones->resetearClave?>
					</button>
					<!-- start skills
					<h4>Skills</h4>
					<ul class='list-unstyled user_data'>
						<li>
							<p>Web Applications</p>
							<div class='progress progress_sm'>
								<div class='progress-bar bg-green' role='progressbar'
									data-transitiongoal='50'></div>
							</div>
						</li>
						<li>
							<p>Website Design</p>
							<div class='progress progress_sm'>
								<div class='progress-bar bg-green' role='progressbar'
									data-transitiongoal='70'></div>
							</div>
						</li>
						<li>
							<p>Automation  Testing</p>
							<div class='progress progress_sm'>
								<div class='progress-bar bg-green' role='progressbar'
									data-transitiongoal='30'></div>
							</div>
						</li>
						<li>
							<p>UI / UX</p>
							<div class='progress progress_sm'>
								<div class='progress-bar bg-green' role='progressbar'
									data-transitiongoal='50'></div>
							</div>
						</li>
					</ul>
					<!-- end of skills -->

				</div>
				<div class='col-md-9 col-sm-9 col-xs-12'>
					<div class='x_panel' style='height: auto;'>
						<div class='x_title'>
							<h2>
								<?=$xmlFormulario->subMenusTitulos->transacciones?><small></small>
							</h2>										
							<div class='clearfix'></div>
						</div>
<?php 													
						include ("modulos/sistema/PHP/vistas/sistema_usuarios_tablaTransacciones.php"); 
?>
					</div>	
					<div class='' role='tabpanel' data-example-id='togglable-tabs'>
						<ul id='myTab' class='nav nav-tabs bar_tabs' role='tablist'>
							<li role='presentation' class='active'>
								<a href='#tab_detalles'	id='home-tab' role='tab' data-toggle='tab' aria-expanded='true'><?=$xmlFormulario->pestanias->detalles?></a>
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
							<div role='tabpanel' class='tab-pane fade active in' id='tab_detalles' aria-labelledby='home-tab'>
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
													<?=$xmlFormulario->campos->nombre?> :
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
													<?=$xmlFormulario->campos->mail?> :
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
													<?=$xmlFormulario->campos->descripcion?> :
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
													<?=$xmlFormulario->campos->estado?> :
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
													<?=$xmlFormulario->campos->motivo?> :
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<textarea 
														class='form-control' 
														disabled='disabled'><?=$objUsuario->obtenerMotivo()?></textarea>
												</div>
											</div>
										</form>
									</div>
								</div>	
							</div>
							<div role='tabpanel' class='tab-pane fade in' id='tab_historial' aria-labelledby='home-tab'>
								<div class='x_panel' style='height: auto;'>
									<div class='x_title'>
										<h2>
											<?=$xmlFormulario->subMenusTitulos->historial?><small></small>
										</h2>										
										<div class='clearfix'></div>
									</div>
<?php 													
										include ("modulos/sistema/PHP/vistas/sistema_usuarios_tablaHistorial.php"); 
?>
								</div>							
							</div>
							<div role='tabpanel' class='tab-pane fade' id='tab_categorias' aria-labelledby='profile-tab'>
								<div class='x_panel'>
									<div class='x_title'>
										<h2>
											<i class='fa fa-align-left'></i> <?=$xmlFormulario->titulos->categorias?>  <small></small>
										</h2>
										<ul class='nav navbar-right panel_toolbox'>
											<li>
												<button  class='btn btn-round btn-primary' onclick='modalIngresarCategoria()'>
													<i class='fa fa-edit m-right-xs'></i>
													<?=$xmlFormulario->botones->ingresar?>
												</button>
											</li>
										</ul>
										<div class='clearfix'></div>
									</div>

<?php 						
										include ("modulos/sistema/PHP/vistas/sistema_usuarios_tablaAsociacionCategorias.php");
?>										

								</div>
							
							</div>
							<div role='tabpanel' class='tab-pane fade' id='tab_permisos' aria-labelledby='profile-tab'>
								<div class='x_panel'>
									<div class='x_title'>
										<h2>
											<i class='fa fa-align-left'></i><?=$xmlFormulario->titulos->permisos?> <small></small>
										</h2>
										<ul class='nav navbar-right panel_toolbox'>
											<li>
												<button  class='btn btn-round btn-primary' onclick='modalIngresarPermiso()'>
													<i class='fa fa-edit m-right-xs'></i>
													<?=$xmlFormulario->botones->ingresar?>
												</button>
											</li>
										</ul>
										<div class='clearfix'></div>
									</div>
									<div class='x_content'>
<?php 
										$TABLA = 'usuarioPermisos';
										include ("modulos/sistema/PHP/vistas/sistema_usuarios_tablaPermisos.php"); 
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
include ("interfaces/".$INTERFACE."/templatePHP/generico/sistema_modal_validador_ficha.php");
?>

<?php 

$uno=$dos=$tres=$cuatro=$cinco="";
switch ($objUsuario->obtenerImagen()) {
	case "avatar1":
		$uno = 'checked';
		break;
	case "avatar2":
		$dos = 'checked';
		break;
	case "avatar3":
		$tres = 'checked';
		break;
	case "avatar4":
		$cuatro = 'checked';
		break;
	case "avatar5":
		$cinco = 'checked';
		break;
}
// trash-o
?>
<div id='modalModificarFicha' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'><?=$xmlFormulario->modals->modificar?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form name='formdatos' method='post' action='<?=$FORMULARIOPRINCIPAL?>' id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
						<?=$xmlFormulario->campos->nombre?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
							 	name='txtNombre' 
								type='text' 
								class='form-control col-md-7 col-xs-12'
								value='<?=$objUsuario->obtenerNombre()?>'
								disabled='disabled'>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
							<?=$xmlFormulario->campos->mail?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								name='txtMail' 
								type='email' 
								required='required' 
								class='form-control col-md-7 col-xs-12'								
								value='<?=$objUsuario->obtenerMail()?>'>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->descripcion?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<textarea 
								name='txtDescripcion'
								id='message' 
								class='form-control' 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								data-parsley-trigger='keyup' 
								data-parsley-minlength='10' 
								data-parsley-maxlength='150' 
								data-parsley-minlength-message='<?=$xmlFormulario->mensajes->areaAlerta?>' 
								data-parsley-validation-threshold='10'><?=$objUsuario->obtenerDescripcion()?></textarea>
								<label for='message'><?=$xmlFormulario->mensajes->areaMensaje?>:</label>
						</div>
					</div> 
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->motivo?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<textarea 
								name='txtMotivo'
								id='message' 
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
						<label class='control-label col-md-3 col-sm-3 col-xs-12'><?=$xmlFormulario->campos->imagen?> : </label>  
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar1.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar1' class='flat' <?=$uno?>/>
							</label>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar2.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar2' class='flat' <?=$dos?>/>
							</label>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar3.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar3' class='flat' <?=$tres?>/>
							</label>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar4.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar4' class='flat' <?=$cuatro?>/>
							</label>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar5.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar5' class='flat' <?=$cinco?>/>
							</label>
						</div>
					</div>	
					<div class='ln_solid'></div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>		
							<input type='hidden' name='accion' value='usuariosModificar'>
							<input type='hidden' name='formulario' value='<?=$FORMULARIO?>'>
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
		
<div id='modalIngresarCategoria' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title' ><?=$xmlFormulario->modals->ingresarCategorias?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form method='POST' class='form-horizontal' action='<?=$FORMULARIOPRINCIPAL?>' data-parsley-validate >
					<div class='form-group'>
						<label class='control-label col-md-3'>
							<?=$xmlFormulario->campos->categoria?> <span class='required'>*</span>
						</label>
						<select 
							class='select2_single form-control' 
							style='width:200px' 
							tabindex='-1' 
							name='idCategoria'
							data-parsley-required='true'
						 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'>
							<option></option>
<?php 
							foreach ($objUsaCategoria->listaSelect()AS $lista){
?>			
							<option value='<?=$lista['suc_idUsuarioCategoria']?>'><?=$lista['suc_nombreUsuarioCategoria']?></option>
<?php 
							}
?>								
						</select>
					</div>
					<div class='form-group'></div>
					<div class='form-group' >
						<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>
						<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
						<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
						<input type='hidden' name='gestion' value='<?=$GESTION?>'>
						<input type='hidden' name='accion' value='asociacionCategoriaIngresar'>
						<input type='hidden' name='formulario' value='<?=$FORMULARIO?>'>
						<input type='hidden' name='retorno' value='<?=$FORMULARIO?>'>	
						<input type='hidden' name='idUsuario' value='<?=$IDFICHA?>'>
						<input type='hidden' name='idFicha' value='<?=$IDFICHA; ?>'>
						<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>																
						<input type='hidden' name='idioma' value='<?=$IDIOMA; ?>'>
						<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->ingresar?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	

<div id='modalIngresarPermiso' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title' ><?=$xmlFormulario->modals->ingresarPermiso?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form method='POST' class='form-horizontal' action='<?=$FORMULARIOPRINCIPAL?>' data-parsley-validate >
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12'>
							<?=$xmlFormulario->campos->modulo?> : <span class='required'>*</span> 
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<select 
								name='idModulo'
								id='perModulo'
								class='select2_single form-control' 
								tabindex='-1' 
								style='width:200px'
								data-parsley-required='true'
								data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
							 	onchange='ajaxModulosGestiones(this.value)'>
								<option></option>
<?php 
								foreach ($objModulos->listaSelect() AS $lista){
?>			
								<option value='<?=$lista['sm_idModulo']?>'><?=$lista['sm_nombreModulo']?></option>
<?php 
								}
?>								
								
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12'>
							<?=$xmlFormulario->campos->gestion?> : <span class='required'>*</span> 
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<select 
								name='idGestion'
								id='perGestion'
								class='select2_single form-control' 
								tabindex='-1' 
								style='width:200px'
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								onchange='ajaxGestionesAcciones(this.value)'>
								<option></option>
<?php 
								foreach ($objGestiones->listaSelect(0) AS $lista){
?>			
								<option value='<?=$lista['sg_idGestion']?>'><?=$lista['sg_nombreGestion']?></option>
<?php 
								}
?>								
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12'>
							<?=$xmlFormulario->campos->permiso?> : <span class='required'>*</span> 
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<select 
								name='idPermiso'
								id='perPermisos'
								class='select2_single form-control' 
								tabindex='-1' 
								style='width:200px'
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'>
								<option></option>
<?php 
								foreach ($objPermiso->listaSelect(0) AS $lista){
?>			
								<option value='<?=$lista['sa_idAccion']?>'><?=$lista['sa_nombreAccion']?></option>
<?php 
								}
?>								
							</select>
						</div>
					</div>
					<div class='form-group'></div>
					<div class='form-group' >
						<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>
						<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
						<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
						<input type='hidden' name='gestion' value='<?=$GESTION?>'>
						<input type='hidden' name='accion' value='permisosIngresar'>
						<input type='hidden' name='formulario' value='<?=$FORMULARIO?>'>
						<input type='hidden' name='idFicha' value='<?=$IDFICHA?>'>
						<input type='hidden' name='retorno' value='<?=$FORMULARIO?>'>							
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>
						<input type='hidden' name='idUsuario' value='<?=$IDFICHA?>'>
						<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->ingresar?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	




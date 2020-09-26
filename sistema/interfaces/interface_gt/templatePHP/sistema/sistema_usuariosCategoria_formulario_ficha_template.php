
<script src='modulos/sistema/JS/sistema_modals_validadores.js'></script>
<script src='modulos/sistema/JS/sistema_modals_permisos.js'></script>

<script type="text/javascript">
	
	function modalIngresarAsociacionUsuario(){
		$("#modalIngresarAsociacionUsuario").modal('show');	
	}
	
</script>

<div class='row'>
	<div class='col-md-12 col-sm-12 col-xs-12'>
		<div class='x_panel'>
			<div class='x_title'>
				<h2>
					<?=$xmlFormulario->titulos->fichaCategoria?><small></small>
				</h2>
				<ul class='nav navbar-right panel_toolbox'>
					<li>
						<form name='formdatos' method='POST' action='sistema.php' class='btn-group'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' name='formulario' value='usuariosCategoriasListar'>
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
							<img class='img-responsive avatar-view' src='interfaces/interface_gt/imagenes/gestion_usuariosCategorias.jpg' alt='Avatar'  width="500" height="500">
						</div>
					</div>
					<h3><?=$objCategoria->obtenerNombre()?></h3>
					<ul class='list-unstyled user_data'>
					</ul>
					<button  class='btn btn-primary' onclick='modalModificarFicha()'>
						<i class='fa fa-edit m-right-xs'></i>
						<?=$xmlFormulario->botones->modificar?>
					</button>
					<br/>										
<?php 			if($objCategoria->obtenerIDEstado()!=4){ ?>						
					<button  class='<?=$btnColor?>' onclick='modalValidadorClave("<?=$accionFinal?>","<?=$IDFICHA?>","<?=$tituloModal?>")'>
						<i class='<?=$nombreA?> m-right-xs'></i>
						<?=$nombreBoton?>
					</button>
					<br/>
					<button  class='btn btn-danger' onclick='modalValidadorClave("usuariosCategoriasBorrar","<?=$IDFICHA?>","<?=$xmlFormulario->titulos->borrarCategoria?>")'>
						<i class='fa fa-trash-o m-right-xs'></i>
						<?=$xmlFormulario->botones->borrar?>
					</button>			
					<br/>	
<?php 			}else{  ?>
					<br/>
					<button  class='btn btn-danger' onclick='modalValidadorClave("usuariosCategoriasReactivar","<?=$IDFICHA?>","<?=$xmlFormulario->titulos->reactivarCategoria?>")'>   
						<i class='fa fa-edit m-right-xs'></i>
						<?=$xmlFormulario->botones->reactivar?>
					</button>	
<?php 			}		?>
					<br/>
				</div>
				<div class='col-md-9 col-sm-9 col-xs-12'>
					<div class='' role='tabpanel' data-example-id='togglable-tabs'>
						<ul id='myTab' class='nav nav-tabs bar_tabs' role='tablist'>
							<li role='presentation' class='active'>
								<a href='#tab_detalles'	id='home-tab' role='tab' data-toggle='tab' aria-expanded='true'><?=$xmlFormulario->pestanias->detalles?></a>
							</li>
							<li role='presentation' class=''>
								<a href='#tab_historial'	id='profile-tab' role='tab' data-toggle='tab' aria-expanded='false'><?=$xmlFormulario->pestanias->historial?></a>
							</li>
							<li role='presentation' class=''>
								<a href='#tab_categorias' id='profile-tab2' role='tab' data-toggle='tab' aria-expanded='false'><?=$xmlFormulario->pestanias->usuarios?></a>
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
											<div class='clearfix'></div>
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
													<?=$xmlFormulario->campos->nombre?> : 
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<input 
														class='form-control col-md-8 col-xs-12'
														value='<?=$objCategoria->obtenerNombre()?>'
														disabled='disabled'>
												</div>
											</div> 
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
													<?=$xmlFormulario->campos->descripcion?> :
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<textarea 
														class='form-control' 
														disabled='disabled'><?=$objCategoria->obtenerDescripcion()?></textarea>
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
														value='<?=$objCategoria->obtenerNombreEstado()?>'
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
														disabled='disabled'><?=$objCategoria->obtenerMotivo()?></textarea>
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
										include ("modulos/sistema/PHP/vistas/sistema_usuariosCategorias_tablaHistorial.php"); 
?>
								</div>							
							</div>
							<div role='tabpanel' class='tab-pane fade' id='tab_categorias' aria-labelledby='profile-tab'>
								<div class='x_panel'>
									<div class='x_title'>
										<h2>
											<i class='fa fa-align-left'></i> <?=$xmlFormulario->titulos->usuarios?>  <small></small>
										</h2>
										<ul class='nav navbar-right panel_toolbox'>
											<li>
												<button  class='btn btn-round btn-primary' onclick='modalIngresarAsociacionUsuario()'>
													<i class='fa fa-edit m-right-xs'></i>
													<?=$xmlFormulario->botones->ingresar?>
												</button>
											</li>
										</ul>
										<div class='clearfix'></div>
									</div>
									<div class='x_content'>
<?php 						
										include ("modulos/sistema/PHP/vistas/sistema_usuariosCategorias_tablaAsociacion.php"); 
?>
									
									</div>
								</div>
							</div>
							<div role='tabpanel' class='tab-pane fade' id='tab_permisos' aria-labelledby='profile-tab'>
								<div class='x_panel'>
									<div class='x_title'>
										<h2>
											<i class='fa fa-align-left'></i> <?=$xmlFormulario->titulos->permisos?>  <small></small>
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
									 include ("modulos/sistema/PHP/vistas/sistema_usuariosCategorias_tablaPermisos.php"); 
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


<div id='modalModificarFicha' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'><?=$xmlFormulario->titulos->modificarCategoria?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form name='formdatos' method='post' action='sistema.php' id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
						<?=$xmlFormulario->campos->nombre?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
							 	name='txtNombre' 
								type='text' 
								class='form-control col-md-7 col-xs-12'
								data-parsley-pattern='[A-Za-z &#241;&#209;&#225;&#233;&#237;&#243;&#250;&#193;&#201;&#205;&#211;&#218;0-9]{2,30}'
								data-parsley-pattern-message='<?=$xmlFormulario->mensajes->nombreCategoria?>'	
								data-parsley-required='true'
								data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								value='<?=$objCategoria->obtenerNombre()?>'
								>
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
								data-parsley-validation-threshold='10'><?=$objCategoria->obtenerDescripcion()?></textarea>
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
								class='form-control' 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								data-parsley-trigger='keyup' 
								data-parsley-minlength='10' 
								data-parsley-maxlength='150' 
								data-parsley-minlength-message='<?=$xmlFormulario->mensajes->areaAlerta?>' 
								data-parsley-validation-threshold='10'><?=$objCategoria->obtenerMotivo()?></textarea>
								<label for='message'><?=$xmlFormulario->mensajes->areaMensaje?>:</label>
						</div>
					</div>	
					<div class='ln_solid'></div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>		
							<input type='hidden' name='accion' value='usuariosCategoriasModificar'>
							<input type='hidden' name='formulario' value='usuariosCategoriasFicha'>
							<input type='hidden' name='idFicha' value='<?=$objCategoria->obtenerID()?>'>				
							<input type='hidden' name='idRegistro' value='<?=$objCategoria->obtenerID()?>'>	
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

<div id='modalIngresarAsociacionUsuario' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'><?=$xmlFormulario->titulos->asociacionUsuario?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form method='POST' class='form-horizontal' data-parsley-validate >
					<div class='form-group'>
						<label class='control-label col-md-3'>
							<?=$xmlFormulario->campos->usuario?>: <span class='required'>*</span>
						</label>
						<select 
							class='select2_single form-control' 
							style='width:200px' 
							tabindex='-1' 
							name='idUsuario'
							data-parsley-required='true'
						 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'>
							<option></option>
<?php 
							foreach ($objUsuario->listaSelect() AS $lista){
?>			
							<option value='<?=$lista['su_idUsuario']?>'><?=$lista['su_nombreUsuario']?></option>
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
						<input type='hidden' name='idCategoria' value='<?=$IDFICHA?>'>
						<input type='hidden' name='idFicha' value='<?=$IDFICHA?>'>		
						<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>														
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
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
				<h4 class='modal-title' ><?=$xmlFormulario->titulo->ingresarPermiso?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form method='POST' class='form-horizontal' data-parsley-validate >
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
						<input type='hidden' name='idCategoria' value='<?=$IDFICHA?>'>
						<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->ingresar?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	












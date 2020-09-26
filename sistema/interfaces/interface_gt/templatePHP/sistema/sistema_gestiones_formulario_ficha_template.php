
<script src='modulos/sistema/JS/sistema_modals_validadores.js'></script>

<div class='row'>
	<div class='col-md-12 col-sm-12 col-xs-12'>
		<div class='x_panel'>
			<div class='x_title'>
				<h2>
					<?=$xmlFormulario->titulosG->ficha?>: <?=$objGestion->obtenerIDGestion()?>
				</h2>
				<ul class='nav navbar-right panel_toolbox'>
					<li>
						<form name='formdatos' method='POST' action='sistema.php' class='btn-group'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='sistema'>	
							<input type='hidden' name='gestion' value='sistema'>
							<input type='hidden' name='formulario' value='moduloFicha'>
							<input type='hidden' name='idFicha' value='<?=$objGestion->obtenerIdModulo()?>'>							
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->modulos?></button>
						</form>
					</li>
					<li>
						<form name='formdatos' class='btn-group'>							
						</form>
					</li>
					<li>
						<form name='formdatos' method='POST' action='sistema.php' class='btn-group'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' name='formulario' value='gestionesListar'>
							<input type='hidden' name='idFicha' value='<?=$IDRETORNO?>'>
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->listaGestiones?></button>
						</form>
					</li>
				</ul>
				<div class='clearfix'></div>
			</div>
			<div class='x_content'>
				<div class='col-md-3 col-sm-3 col-xs-12 profile_left'>
					<h3><?=$objGestion->obtenerNombreGestion()?></h3>
					<div class='profile_img'>
						<div id='crop-avatar'>
							<!-- Current avatar -->
							<img class='img-responsive avatar-view' src='interfaces/interface_gt/imagenes/gestion_<?=$objGestion->obtenerParametro()?>.jpg' 
									alt='Avatar' 
									title='Imagen del gestion'
									width="500" height="500">
						</div>
					</div>		
					<ul class='list-unstyled user_data'>
						<li>
						</li>
						<li class='m-top-xs'>
						</li>
					</ul>
					<button  class='<?=$btnColor?>' onclick='modalValidadorClave("<?=$accionFinal?>","<?=$IDFICHA?>","<?=$tituloModal?>")'>
						<i class='<?=$nombreA?> m-right-xs'></i>
						<?=$nombreBoton?>
					</button>						
					<br/>
				</div>
				<div class='col-md-9 col-sm-9 col-xs-12'>
					<div class='' role='tabpanel' data-example-id='togglable-tabs'>
						<ul id='myTab' class='nav nav-tabs bar_tabs' role='tablist'>
							<li role='presentation' class='active'>
								<a href='#tab_detalle'	id='home-tab' role='tab' data-toggle='tab' aria-expanded='true'><?=$xmlFormulario->pestanias->detalles?></a>
							</li>
							<li role='presentation' class=''>
								<a href='#tab_historial'	id='profile-tab' role='tab' data-toggle='tab' aria-expanded='false'><?=$xmlFormulario->pestanias->historial?></a>
							</li>
							<li role='presentation' class=''>
								<a href='#tab_acciones' id='profile-tab2' role='tab' data-toggle='tab' aria-expanded='false'><?=$xmlFormulario->pestanias->acciones?></a>
							</li>			
						</ul>
						<div id='myTabContent' class='tab-content'>
							<div role='tabpanel' class='tab-pane fade active in' id='tab_detalle' aria-labelledby='home-tab'>
								<div class='x_panel' style='height: auto;'>
									<div class='x_title'>
										<h2>
											<?=$xmlFormulario->subMenusTitulosG->datos?><small></small>
										</h2>
										<div class='clearfix'></div>
									</div>
									<div class='x_content' >
										<form id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
													<?=$xmlFormulario->campos->gestion?> :
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<input  
														class='form-control col-md-8 col-xs-12'
														value='<?=$objGestion->obtenerNombreGestion()?>'
														disabled='disabled'>
												</div>
											</div> 
											<div class='form-group'>
												<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
													<?=$xmlFormulario->campos->modulo?> :
												</label>
												<div class='col-md-8 col-sm-6 col-xs-12'>
													<input  
														class='form-control col-md-8 col-xs-12'
														value='<?=$objGestion->obtenerNombreModulo()?>'
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
														disabled='disabled'><?=$objGestion->obtenerDescripcion()?></textarea>
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
														value='<?=$objGestion->obtenerNombreEstado()?>'
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
														disabled='disabled'><?=$objGestion->obtenerMotivo()?></textarea>
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
											<?=$xmlFormulario->subMenusTitulosG->historial?><small></small>
										</h2>										
										<div class='clearfix'></div>
									</div>
<?php 								
									include ('modulos/sistema/PHP/vistas/sistema_gestiones_tablaHistorial.php'); 
?>
								</div>
							</div>
							<div role='tabpanel' class='tab-pane fade' id='tab_acciones' aria-labelledby='profile-tab'>
								<div class='x_panel' style='height: auto;'>
									<div class='x_title'>
										<h2>
											<?=$xmlFormulario->subMenusTitulosG->acciones?><small></small>
										</h2>										
										<div class='clearfix'></div>
									</div>
<?php 								
									$TABLA = 'accionesGestiones';
									include ("modulos/sistema/PHP/vistas/sistema_gestiones_tablaAcciones.php"); 
?>
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
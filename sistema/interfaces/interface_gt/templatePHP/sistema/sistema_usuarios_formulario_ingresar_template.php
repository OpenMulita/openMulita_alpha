

<div class='row'>
	<div class='col-md-12 col-sm-12 col-xs-12'>
		<div class='x_panel'>
			<div class='x_title'>
				<h2>
					<?=$xmlFormulario->titulos->ingresarUsuario?><small></small>
				</h2>
				<ul class='nav navbar-right panel_toolbox'>
					<li>
						<form name='formdatos' method='POST' action='sistema.php' class='btn-group'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' name='formulario' value='usuariosListar'>
							<input type='hidden' name='idFicha' value=''>
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->lista?></button>
						</form>
					</li>
				</ul>
				<div class='clearfix'></div>
			</div>
			<div class='x_content'>
				<br />
				<!--  data-parsley-validate ' -->
				<form name='formdatos' method='post' action='sistema.php' id='form-ing' class='form-horizontal form-label-left' data-parsley-validate >
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
						<?=$xmlFormulario->campos->nombre?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
								name='txtNombre'
								id='nombre' 
								type='text' 
								class='form-control col-md-7 col-xs-12'
								data-parsley-pattern='[A-Za-z]{2,30}'
								data-parsley-pattern-message='<?=$xmlFormulario->mensajes->nombreUsuario?>'	
								data-parsley-required='true'
								data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
							>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
							<?=$xmlFormulario->campos->mail?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								name='txtMail' 
								id='mail' 
								type='email'
								class='form-control col-md-7 col-xs-12'
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
							 >
							
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->clave?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								name='passClave'
								id='passClave'
								type='password' 
								class='form-control col-md-7 col-xs-12'
								data-parsley-pattern='[A-Za-z0-9]{5,30}'
								data-parsley-pattern-message='<?=$xmlFormulario->mensajes->nombreUsuario?>'	
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->confirmacion?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
								name='passClaveConf' 
								id='passClaveConf' 
								type='password' 
								class='form-control col-md-7 col-xs-12'
								data-parsley-equalto='#passClave'
								data-parsley-equalto-message='<?=$xmlFormulario->mensajes->campoClave?>'
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
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
								id='txtDescripcion' 
								class='form-control' 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'
								data-parsley-trigger='keyup' 
								data-parsley-minlength='10' 
								data-parsley-maxlength='150' 
								data-parsley-minlength-message='<?=$xmlFormulario->mensajes->areaAlerta?>' 
								data-parsley-validation-threshold='10'></textarea>
								<label for='message'><?=$xmlFormulario->mensajes->areaMensaje?>:</label>
						</div>
					</div> 
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12'><?=$xmlFormulario->campos->imagen?> : <span class='required'>*</span></label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar1.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar1' class='flat blue' checked/>
							</label>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar2.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar2' class='flat' />
							</label>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar3.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar3' class='flat'/>
							</label>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar4.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar4' class='flat'/>
							</label>
							<label>
								<img  src='interfaces/interface_gt/imagenes/avatares/avatar5.png' height='50' width='50'>
								<input type='radio' name='rbutonAvatar' value='avatar5' class='flat'/>
							</label>
						</div>
					</div>	
					<div class='ln_solid'></div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>		
							<input type='hidden' name='accion' value='usuariosIngresar'>
							<input type='hidden' name='formulario' value='usuariosListar'>
							<input type='hidden' name='retorno' value='<?=$RETORNO?>'>	
							<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<button type='submit' class='btn btn-success'><?=$xmlFormulario->botones->ingresar?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


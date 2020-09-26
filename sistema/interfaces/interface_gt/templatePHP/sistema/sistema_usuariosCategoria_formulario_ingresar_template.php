
<div class='row'>
	<div class='col-md-12 col-sm-12 col-xs-12'>
		<div class='x_panel'>
			<div class='x_title'>
				<h2>
					<?=$xmlFormulario->titulos->ingresarCategoria?><small></small>
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
							 	data-parsley-pattern='[A-Za-z &#241;&#209;&#225;&#233;&#237;&#243;&#250;&#193;&#201;&#205;&#211;&#218;0-9]{2,30}'
								data-parsley-pattern-message='<?=$xmlFormulario->mensajes->nombreCategoria?>'	
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
								id='message' 
								class='form-control' 
								data-parsley-trigger='keyup' 
								data-parsley-minlength='10' 
								data-parsley-maxlength='150' 
								data-parsley-minlength-message='<?=$xmlFormulario->mensajes->areaAlerta?>' 
								data-parsley-validation-threshold='10'
								data-parsley-required='true'
								data-parsley-required-message='<?=$xmlFormulario->mensajes->campoRequerido?>'></textarea>
								<label for='message'><?=$xmlFormulario->mensajes->areaMensaje?> :</label>
							
						</div>
					</div> 
					<div class='ln_solid'></div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>		
							<input type='hidden' name='accion' value='usuariosCategoriasIngresar'>
							<input type='hidden' name='formulario' value='usuariosCategoriasListar'>
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


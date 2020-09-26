
<div class='row'>
	<div class='col-md-12 col-sm-12 col-xs-12'>
		<div class='x_panel'>
			<div class='x_title'>
				<h2>
					<?=$xmlFormulario->titulosG->fichaHistorial?>: <?=$objGestion->obtenerIdHistorial()?><small></small>
				</h2>
				<ul class='nav navbar-right panel_toolbox'>
					<li>
						<form name='formdatos' method='POST' action='sistema.php' class='btn-group'>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' name='formulario' value='<?=$RETORNO?>'>
							<input type='hidden' name='idFicha' value='<?=$objGestion->obtenerIDGestion()?>'>
							<input type='hidden' name='retorno' value='listarModulos'>
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlFormulario->botones->atras?></button>
						</form>
					</li>
				</ul>				
				<div class='clearfix'></div>
			</div>
			<div class='x_content' >
				<br />
				<form id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
						<?=$xmlFormulario->campos->tipoEdicion?> :
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
								class='form-control col-md-7 col-xs-12'
								value='<?=$objGestion->obtenerNombreTipoEdicion()?>' 
								disabled='disabled'>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
						<?=$xmlFormulario->campos->fechaEdicion?> : 
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
								class='form-control col-md-7 col-xs-12'
								value='<?=$objGestion->obtenerFechaEdicion()?>' 
								disabled='disabled'>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
						<?=$xmlFormulario->campos->gestion?> : 
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
								class='form-control col-md-7 col-xs-12'
								value='<?=$objGestion->obtenerNombreGestion()?>' 
								disabled='disabled'>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
						<?=$xmlFormulario->campos->modulo?> : 
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
								class='form-control col-md-7 col-xs-12'
								value='<?=$objGestion->obtenerNombreModulo()?>' 
								disabled='disabled'>
						</div>
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->descripcion?> :
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<textarea 
								class='form-control' 
								disabled='disabled'><?=$objGestion->obtenerDescripcion()?></textarea>
						</div>
					</div>
					
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='last-name'>
							<?=$xmlFormulario->campos->estado?> : 
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								class='form-control col-md-7 col-xs-12'
								value='<?=$objGestion->obtenerNombreEstado()?>'
								disabled='disabled'>
						</div>
					</div> 
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlFormulario->campos->motivo?> : 
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<textarea 
								class='form-control' 
								disabled='disabled'><?=$objGestion->obtenerMotivo()?></textarea>
						</div>
					</div>
					<div class='ln_solid'></div>
				</form>
			</div>
		</div>
	</div>
</div>



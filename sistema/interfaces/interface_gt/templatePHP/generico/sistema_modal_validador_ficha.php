

<div id="modalValidador" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" ><span id="valTitulo"></span></h4>
			</div>
			<div class="modal-body">
				<br />
				<form name="formdatos" method="post" action="sistema.php" id="form-ing" data-parsley-validate class="form-horizontal form-label-left">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							<?=$xmlFormulario->campos->motivo?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea 
								name="txtMotivo"
								id="message" 
								class="form-control" 
								data-parsley-required="required"
								data-parsley-required-message="<?=$xmlFormulario->mensajes->campoRequerido?> " 
								data-parsley-trigger="keyup" 
								data-parsley-minlength="10" 
								data-parsley-maxlength="150" 
								data-parsley-minlength-message="<?=$xmlFormulario->mensajes->motivoAlerta?>" 
								data-parsley-validation-threshold="10"></textarea>
								<label for="message"><?=$xmlFormulario->mensajes->motivoMensaje?> :</label>
						</div>
					</div> 
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
							<input type="hidden" name="integracion" value="<?=$INTEGRACION?>">	
							<input type="hidden" name="modulo" value="<?=$MODULO?>">	
							<input type="hidden" name="gestion" value="<?=$GESTION?>">
							<input type="hidden" id="valAccion" name="accion" value="">		
							<input type="hidden" name="formulario" value="<?=$FORMULARIO?>">
							<input type="hidden" id="valIdRegistro" name="idRegistro" value="">
							<input type="hidden" name="idFicha" value="<?=$IDFICHA?>">
							<input type="hidden" name="codigoTransaccion" value="<?=$CODIGOTRANSACCION?>">																
							<input type="hidden" name="idioma" value="<?=$IDIOMA?>">
							<button type="submit" class="btn btn-primary"><?=$xmlFormulario->botones->aceptar?></button>								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	

<div id="modalValidadorClave" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" ><span id="claTitulo"></span></h4>
			</div>
			<div class="modal-body">
				<br />
								<form name="formdatos" method="post" action="sistema.php" id="form-ing" data-parsley-validate class="form-horizontal form-label-left">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							<?=$xmlFormulario->campos->clave?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input 
								name="passClave"
								type="password" 
								id="passClave"
								data-parsley-required="required" 
								data-parsley-required-message="<?=$xmlFormulario->mensajes->campoRequerido?>"
								class="form-control col-md-7 col-xs-12"
								data-validate-length="6,8">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							<?=$xmlFormulario->campos->motivo?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea 
								name="txtMotivo"
								id="message" 
								class="form-control" 
								data-parsley-required="required"
								data-parsley-required-message="<?=$xmlFormulario->mensajes->campoRequerido?> " 
								data-parsley-trigger="keyup" 
								data-parsley-minlength="10" 
								data-parsley-maxlength="150" 
								data-parsley-minlength-message="<?=$xmlFormulario->mensajes->motivoAlerta?>" 
								data-parsley-validation-threshold="10"></textarea>
								<label for="message"><?=$xmlFormulario->mensajes->motivoMensaje?> :</label>
						</div>
					</div> 
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
							<input type="hidden" name="integracion" value="<?=$INTEGRACION?>">	
							<input type="hidden" name="modulo" value="<?=$MODULO?>">	
							<input type="hidden" name="gestion" value="<?=$GESTION?>">
							<input type="hidden" id="claAccion" name="accion" value="">		
							<input type="hidden" name="formulario" value="<?=$FORMULARIO?>">
							<input type="hidden" id="claIdRegistro" name="idRegistro" value="">
							<input type="hidden" name="idFicha" value="<?=$IDFICHA?>">
							<input type="hidden" name="codigoTransaccion" value="<?=$CODIGOTRANSACCION?>">																
							<input type="hidden" name="idioma" value="<?=$IDIOMA?>">
							<button type="submit" class="btn btn-primary"><?=$xmlFormulario->botones->aceptar?></button>								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	

	
<script type="text/javascript">

	function modalValidadorTabla(accion,idRegistro,titulo){
		document.getElementById('txtTitulo').innerHTML = titulo;
		document.getElementById('valAccion').value = accion;
		document.getElementById('valIdRegistro').value = idRegistro;
		$("#modalValidadorTabla").modal('show');		
	}

	function modalModificarFicha(idRegistro,tipo,fecha,horas,minutos){

		document.getElementById('selTipos').value = tipo;
		document.getElementById('birthday').value = fecha;
		document.getElementById('selHoras').value = horas;
		document.getElementById('selMinutos').value = minutos;
		document.getElementById('valIdLogin').value = idRegistro;		
		$("#modalModificarFicha").modal('show');	
		
	}	
	
	function modalIngresarLogin(){

		$("#modalIngresarLogin").modal('show');	
		
	}		
</script>

<div class='col-md-12 col-sm-12 col-xs-12'>
	<div class='x_panel'>
		<div class='x_title'>
			<h2>
				<?=$xmlTabla->titulos->titulo?><small></small>
			</h2>
			<div class='nav navbar-right panel_toolbox' >
				<?PHP if($botonINGRESAR){  ?>
				<!-- cosas del form -->
				<button class='btn btn-primary nav-right' onclick='modalIngresarLogin()'>
					<?=$xmlTabla->botones->ingresar?>
				</button>

				<?PHP }?>	
			</div>
			<div class='clearfix'></div>
		</div>
		<div class='x_content'>
			<div class='row'>
				<div class='card-box table-responsive'>
					<table id='datatable' data-order='[[ 0, "desc" ]]' class='table table-striped table-bordered' style='width:100%'>
						<thead>
							<tr>
								<th><?=$xmlTabla->columnas->idRegistro?></th>
								<th><?=$xmlTabla->columnas->campoUno?></th>
								<th><?=$xmlTabla->columnas->campoDos?></th>
								<th><?=$xmlTabla->columnas->campoTres?></th>
								<th><?=$xmlTabla->columnas->campoCuatro?></th>
								<?PHP if($CANTIDADCAMPOS >= 5){  ?>
								<th><?=$xmlTabla->columnas->campoCinco?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 6){  ?>
								<th><?=$xmlTabla->columnas->campoSeis?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 7){  ?>
								<th><?=$xmlTabla->columnas->campoSiete?></th>
								<?PHP }?>
								<?PHP if($campFICHA){  ?>
								<th><?=$xmlTabla->columnas->ficha?></th>
								<?PHP }?>
								<?PHP if($campACCIONES){  ?>
								<th><?=$xmlTabla->columnas->acciones?></th>		
								<?PHP }?>	
							</tr>
						</thead>
						<tbody>
<?php 	
	
	foreach( $listaTabla['registros'] as $resultado){

		if($campACCIONES){
			
			$boton = $xmlTabla->botones->borrar;
			$accion = "usuarioLoginBorrar";
			$nombreA = 'fa fa-arrow-down';
			$btnColor = 'btn btn-warning';
			$titulo = $xmlTabla->modals->borrar;
			
		}
		
		$horas = explode(":", $resultado['campoTres']);

		
?>					
								<tr>
									<td><?=$resultado['idRegistro']?></td>
									<td><?=$resultado['campoUno']?></td>
									<td><?=$resultado['campoDos']?></td>
									<td><?=$resultado['campoTres']?></td>
									<td><?=$resultado['campoCuatro']?></td>	
									<?PHP if($CANTIDADCAMPOS >= 5){  ?>
									<td><?=$resultado['campoCinco']?></td>
									<?PHP }?>	
									<?PHP if($CANTIDADCAMPOS >= 6){  ?>
									<td><?=$resultado['campoSeis']?></td>
									<?PHP }?>
									<?PHP if($CANTIDADCAMPOS >= 7){  ?>
									<td><?=$resultado['campoSiete']?></td>
									<?PHP }?>		
								<?PHP if($campFICHA){  ?>									
									<td>
										<button type='submit' class='btn btn-primary btn-xs' onclick='modalModificarFicha("<?=$resultado['idRegistro']?>","<?=$resultado['campoCuatro']?>","<?=$resultado['campoDos']?>","<?=$horas[0]?>","<?=$horas[1]?>")'>
											<i class='fa fa-folder'></i><?=$xmlTabla->botones->ficha?>
										</button>
									</td>
								<?PHP } ?>
								
								<?PHP if($campACCIONES){  ?>
									<td>
								<?php		
										if( $resultado['idEstado'] == 2){		 ?>												
										<button  class='<?=$btnColor?> btn-xs' onclick='modalValidadorTabla("<?=$accion?>",<?=$resultado['idRegistro']?>,"<?=$titulo?>")'>
											<i class='<?=$nombreA?> m-right-xs'></i><?=$boton?>
										</button>
								<?php	}else{ ?>
								<?php	}  ?>
									</td>
								<?PHP } ?>	
							</tr>	
	<?php 	}	?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id='modalValidadorTabla' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title' > <span id='txtTitulo'></span></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form name='formdatos' method='post' action='sistema.php' id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlTabla->campos->clave?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input 
								name='passClave'
								type='password' 
								id='passClave'
								data-parsley-required='required' 
								data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
								class='form-control col-md-7 col-xs-12'
								data-validate-length='6,8'>
						</div>
					</div>	
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlTabla->campos->motivo?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<textarea 
								name='txtMotivo'
								id='message' 
								class='form-control' 
								data-parsley-required='required'
								data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?> ' 
								data-parsley-trigger='keyup' 
								data-parsley-minlength='10' 
								data-parsley-maxlength='150' 
								data-parsley-minlength-message='<?=$xmlTabla->mensajes->motivoAlerta?>' 
								data-parsley-validation-threshold='10'></textarea>
								<label for='message'><?=$xmlTabla->mensajes->motivoMensaje?> :</label>
						</div>
					</div> 
					<div class='ln_solid'></div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' id='valAccion' name='accion' value=''>		
							<input type='hidden' name='formulario' value='<?=$FORMULARIO?>'>
							<input type='hidden' id='valIdRegistro' name='idLogin' value=''>													
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlTabla->botones->aceptar?></button>								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	

<div id='modalModificarFicha' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'><?=$xmlTabla->titulos->modificar?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form name='formdatos' method='post' action='sistema.php' id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<div class="form-group">
						<label class="control-label col-md-3">
							<?=$xmlTabla->campos->tipos?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select 
								name='selTipo'
								id='selTipos'
								class="form-control" 
								tabindex="-1" 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	style='width:100%'>
								<option></option>
<?php 
								foreach ($arrayTipoLogin AS $lista){
?>			
								<option value='<?=$lista?>' id='<?=$lista?>' ><?=$lista?></option>
<?php 
								}
?>																
							</select>
						</div>	
					</div>
					<div class='form-group'>	
						<label class='control-label col-md-3 col-sm-3 col-xs-12'>
							<?=$xmlTabla->campos->fecha?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
								name='txtFechaLogin'
								id='birthday' 
								type='text' 
								class='form-control col-md-7 col-xs-12'
								data-parsley-pattern='[0-9]{1}[0-9]{1}-[0-9]{1}[0-9]{1}-[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}'
								data-parsley-pattern-message='La fecha de nacimiento tiene que tener el siguente formato dd-mm-aaaa'	
							 	data-parsley-required='true'
							 	data-parsley-americandate='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	value=''
							>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">
							<?=$xmlTabla->campos->horas?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select 
								name='selHoraLogin'
								id='selHoras'
								class="form-control" 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	style='width:100%'>
								<option></option>
<?php 
								foreach ($listaHoras AS $lista){
?>			
								<option value='<?=$lista?>' ><?=$lista?></option>
<?php 
								}
?>																
							</select>
						</div>	
					</div>		
					<div class="form-group">
						<label class="control-label col-md-3">
							<?=$xmlTabla->campos->minutos?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">		
							<select 
								name='selMinutoLogin'
								id='selMinutos'
								class=" form-control" 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	style='width:100%'>
								<option></option>
<?php 
								foreach ($listaMinutos AS $lista){
?>			
								<option value='<?=$lista?>' ><?=$lista?></option>
<?php 
								}
?>																
							</select>
						</div>	
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlTabla->campos->motivo?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<textarea 
								name='txtMotivo'
								id='message' 
								class='form-control' 
								data-parsley-required='required'
								data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?> ' 
								data-parsley-trigger='keyup' 
								data-parsley-minlength='10' 
								data-parsley-maxlength='150' 
								data-parsley-minlength-message='<?=$xmlTabla->mensajes->motivoAlerta?>' 
								data-parsley-validation-threshold='10'></textarea>
								<label for='message'><?=$xmlTabla->mensajes->motivoMensaje?> :</label>
						</div>
					</div> 
					<div class='ln_solid'></div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' name='accion' value='usuarioLoginModificar'>		
							<input type='hidden' name='formulario' value='<?=$FORMULARIO?>'>
							<input type='hidden' id='valIdLogin' name='idLogin' value=''>													
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlTabla->botones->aceptar?></button>								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	

<div id='modalIngresarLogin' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title' ><?=$xmlTabla->titulos->ingresar?></h4>
			</div>
			<div class='modal-body'>
				<br />
				<form name='formdatos' method='post' action='sistema.php' id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<div class='form-group'>
						<label  class='control-label col-md-3'>
							<?=$xmlTabla->campos->usuarios?>: <span class='required'>*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select 
								name='idRegistro'
								class='select2_single form-control' 
								style='width:200px' 
								tabindex='-1' 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	style='width:100%'>
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
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">
							<?=$xmlTabla->campos->tipos?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select 
								name='selTipo'
								id='selTipos'
								class="select2_single form-control" 
								tabindex="-1" 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	style='width:100%'>
								<option></option>
<?php 
								foreach ($arrayTipoLogin AS $lista){
?>			
								<option value='<?=$lista?>' id='<?=$lista?>' ><?=$lista?></option>
<?php 
								}
?>																
							</select>
						</div>	
					</div>
					<div class='form-group'>	
						<label class='control-label col-md-3 col-sm-3 col-xs-12'>
							<?=$xmlTabla->campos->fecha?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<input
								name='txtFechaLogin'
								id='calFecha' 
								type='text' 
								class='form-control col-md-7 col-xs-12'
								data-parsley-pattern='[0-9]{1}[0-9]{1}-[0-9]{1}[0-9]{1}-[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}'
								data-parsley-pattern-message='La fecha de nacimiento tiene que tener el siguente formato dd-mm-aaaa'	
							 	data-parsley-required='true'
							 	data-parsley-americandate='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	value=''
							>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">
							<?=$xmlTabla->campos->horas?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select 
								name='selHoraLogin'
								id='selHoras'
								class="select2_single form-control" 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	style='width:100%'>
								<option></option>
<?php 
								foreach ($listaHoras AS $lista){
?>			
								<option value='<?=$lista?>' ><?=$lista?></option>
<?php 
								}
?>																
							</select>
						</div>	
					</div>		
					<div class="form-group">
						<label class="control-label col-md-3">
							<?=$xmlTabla->campos->minutos?> : <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">		
							<select 
								name='selMinutoLogin'
								id='selMinutos'
								class="select2_single form-control" 
								data-parsley-required='true'
							 	data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?>'
							 	style='width:100%'>
								<option></option>
<?php 
								foreach ($listaMinutos AS $lista){
?>			
								<option value='<?=$lista?>' ><?=$lista?></option>
<?php 
								}
?>																
							</select>
						</div>	
					</div>
					<div class='form-group'>
						<label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>
							<?=$xmlTabla->campos->motivo?> : <span class='required'>*</span>
						</label>
						<div class='col-md-6 col-sm-6 col-xs-12'>
							<textarea 
								name='txtMotivo'
								id='message' 
								class='form-control' 
								data-parsley-required='required'
								data-parsley-required-message='<?=$xmlTabla->mensajes->campoRequerido?> ' 
								data-parsley-trigger='keyup' 
								data-parsley-minlength='10' 
								data-parsley-maxlength='150' 
								data-parsley-minlength-message='<?=$xmlTabla->mensajes->motivoAlerta?>' 
								data-parsley-validation-threshold='10'></textarea>
								<label for='message'><?=$xmlTabla->mensajes->motivoMensaje?> :</label>
						</div>
					</div> 
					<div class='ln_solid'></div>
					<div class='form-group'>
						<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>
							<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>
							<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
							<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
							<input type='hidden' name='gestion' value='<?=$GESTION?>'>
							<input type='hidden' name='accion' value='usuarioLoginIngresar'>		
							<input type='hidden' name='formulario' value='<?=$FORMULARIO?>'>												
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlTabla->botones->aceptar?></button>								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
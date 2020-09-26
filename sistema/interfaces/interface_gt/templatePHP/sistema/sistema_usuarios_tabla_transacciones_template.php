
	
<script type="text/javascript">

	function modalValidadorTabla(accion,idRegistro,titulo){

		document.getElementById('tituloModal').innerHTML = titulo;
		document.getElementById('valAccion').value = accion;
		document.getElementById('valIdRegistro').value = idRegistro;
		$("#modalValidadorTabla").modal('show');		
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
				<form id='form1' action='sistema.php' method='POST'>
					<!-- cosas del form -->
					<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
					<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
					<input type='hidden' name='gestion' value='<?=$GESTION?>'>
					<input type='hidden' name='formulario' value='<?=$INGRESAR?>'>
					<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
					<button class='btn btn-primary nav-right'>
						<?=$xmlTabla->botones->ingresar?>
					</button>
				</form>
				<?PHP }?>	
			</div>
			<div class='clearfix'></div>
		</div>
		<div class='x_content'>
			<div class='row'>
				<div class='card-box table-responsive'>
					<table id='datatable' class='table table-striped table-bordered' style='width:100%'>
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
								<?PHP if($CANTIDADCAMPOS >= 8){  ?>
								<th><?=$xmlTabla->columnas->campoOcho?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 9){  ?>
								<th><?=$xmlTabla->columnas->campoNueve?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 10){  ?>
								<th><?=$xmlTabla->columnas->campoDiez?></th>
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
	
	
	foreach ($listaTabla['registros'] as $resultado){

		if($campACCIONES){
			switch ($resultado['idEstado']){
				case 1:
				case 3:
					$boton = $xmlTabla->botones->activar;
					$accion = $ACTIVAR;
					$nombreA = 'fa fa-arrow-up';
					$btnColor = 'btn btn-success';
					$titulo = $xmlTabla->modals->activar;
					break;
				case 2:
				case 5:
					$boton = $xmlTabla->botones->desactivar;
					$accion = $DESACTIVAR;
					$nombreA = 'fa fa-arrow-down';
					$btnColor = 'btn btn-warning';
					$titulo = $xmlTabla->modals->desactivar;
					break;
			}
		}
		

		
?>					
								<tr>
									<td><?=$resultado['idRegistro']?></td>
									<td><?=$resultado['campoUno']?></td>
									<td><?=$resultado['campoDos']?></td>
									<td><?=$resultado['campoTres']?></td>
									<td><?=$resultado['campoCuatro']?></td>	
									<?PHP if($CANTIDADCAMPOS >= 5){  ?>
									<th><?=$resultado['campoCinco']?></th>
									<?PHP }?>	
									<?PHP if($CANTIDADCAMPOS >= 6){  ?>
									<th><?=$resultado['campoSeis']?></th>
									<?PHP }?>
									<?PHP if($CANTIDADCAMPOS >= 7){  ?>
									<th><?=$resultado['campoSiete']?></th>
									<?PHP }?>
									<?PHP if($CANTIDADCAMPOS >= 8){  ?>
									<th><?=$resultado['campoOcho']?></th>
									<?PHP }?>
									<?PHP if($CANTIDADCAMPOS >= 9){  ?>
									<th><?=$resultado['campoNueve']?></th>
									<?PHP }?>
									<?PHP if($CANTIDADCAMPOS >= 10){  ?>
									<th><?=$resultado['campoDiez']?></th>
									<?PHP }?>			
								<?PHP if($campFICHA){  ?>
									
									<td>
										<form method='POST' action='sistema.php' class='btn-group'>
											<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
											<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
											<input type='hidden' name='gestion' value='<?=$GESTION?>'>
											<input type='hidden' name='formulario' value='<?=$FICHA?>'>	
											<input type='hidden' name='idFicha' value='<?=$resultado['idRegistro']?>'>	
											<input type='hidden' name='retorno' value='<?=$FORMULARIO?>'>
											<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>	
											<button type='submit' class='btn btn-primary btn-xs'><i class='fa fa-folder'></i><?=$xmlTabla->botones->ficha?></button>
										</form>
									</td>
								<?PHP } ?>
								<?PHP if($campACCIONES){  ?>
									
									
									<td>
<?php		
							if( $resultado['idEstado']==1 || $resultado['idEstado']==2 || $resultado['idEstado']==3 || $resultado['idEstado']==5){		 ?>												
										<button  class='<?=$btnColor?> btn-xs' onclick='modalValidadorTabla("<?=$accion?>",<?=$resultado['idRegistro']?>,"<?=$titulo?>")'>
											<i class='<?=$nombreA?> m-right-xs'></i><?=$boton?>
										</button>
<?php						}else{ ?>
<?php						}  ?>

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
				<h4 class='modal-title' ><span id='tituloModal'></span></h4>
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
							<input type='hidden' name='retorno' value='<?=$FORMULARIO?>'>	
							<input type='hidden' id='valIdRegistro' name='idRegistro' value=''>
							<input type='hidden' name='idFicha' value='<?=$IDFICHA?>'>	
							<input type='hidden' name='codigoTransaccion' value='<?=$CODIGOTRANSACCION?>'>															
							<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
							<button type='submit' class='btn btn-primary'><?=$xmlTabla->botones->aceptar?></button>								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	


<script src='modulos/sistema/JS/sistema_modals_validadores.js'></script>
<div class='col-md-12 col-sm-12 col-xs-12'>
	<div class='x_panel'>
		<div class='x_title'>
			<h2>
				<?=$xmlFormulario->titulos->titulo?><small></small>
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
						<?=$xmlFormulario->botones->ingresar?>
					</button>
				</form>
				<?PHP }?>	
			</div>
			<div class='clearfix'></div>
		</div>
		<div class='x_content'>
			<div class='row'>
				<div class='card-box table-responsive'>
					<table id='datatable'  data-order='[[ 0, "desc" ]]'  class='table table-striped table-bordered' style='width: 100%'>
						<thead>
							<tr>
								<th><?=$xmlFormulario->columnas->idRegistro?></th>
								<th><?=$xmlFormulario->columnas->campoUno?></th>
								<th><?=$xmlFormulario->columnas->campoDos?></th>
								<th><?=$xmlFormulario->columnas->campoTres?></th>
								<th><?=$xmlFormulario->columnas->campoCuatro?></th>
								<?PHP if($CANTIDADCAMPOS >= 5){  ?>
								<th><?=$xmlFormulario->columnas->campoCinco?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 6){  ?>
								<th><?=$xmlFormulario->columnas->campoSeis?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 7){  ?>
								<th><?=$xmlFormulario->columnas->campoSiete?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 8){  ?>
								<th><?=$xmlFormulario->columnas->campoOcho?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 9){  ?>
								<th><?=$xmlFormulario->columnas->campoNueve?></th>
								<?PHP }?>
								<?PHP if($CANTIDADCAMPOS >= 10){  ?>
								<th><?=$xmlFormulario->columnas->campoDiez?></th>
								<?PHP }?>
								<?PHP if($campFICHA){  ?>
								<th><?=$xmlFormulario->columnas->ficha?></th>
								<?PHP }?>
								<?PHP if($campACCIONES){  ?>
								<th><?=$xmlFormulario->columnas->acciones?></th>		
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
					$boton = $xmlFormulario->botones->activar;
					$accion = $ACTIVAR;
					$nombreA = 'fa fa-arrow-up';
					$btnColor = 'btn btn-success';
					$titulo = $xmlFormulario->modals->activar;
					break;
				case 2:
				case 5:
					$boton = $xmlFormulario->botones->desactivar;
					$accion = $DESACTIVAR;
					$nombreA = 'fa fa-arrow-down';
					$btnColor = 'btn btn-warning';
					$titulo = $xmlFormulario->modals->desactivar;
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
											<button type='submit' class='btn btn-primary btn-xs'><i class='fa fa-folder'></i><?=$xmlFormulario->botones->ficha?></button>
										</form>
									</td>
								<?PHP } ?>
<?PHP 					if($campACCIONES){  ?>
									
									<td>
<?php		
							if( $resultado['idEstado']==1 || $resultado['idEstado']==2 || $resultado['idEstado']==3 || $resultado['idEstado']==5){
								if($modalCLAVE){
?>									
									<button  class='<?=$btnColor?> btn-xs' onclick='modalValidadorClave("<?=$accion?>",<?=$resultado['idRegistro']?>,"<?=$titulo?>")'>
										<i class='<?=$nombreA?> m-right-xs'></i><?=$boton?>
									</button>
<?php 									
								}else{
?>												
									<button  class='<?=$btnColor?> btn-xs' onclick='modalValidador("<?=$accion?>",<?=$resultado['idRegistro']?>,"<?=$titulo?>")'>
										<i class='<?=$nombreA?> m-right-xs'></i><?=$boton?>
									</button>
<?php						
								}
							}
?>

									</td>
<?PHP					 } ?>	
							</tr>	
<?php 				}	?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 								
include ("interfaces/interface_gt/templatePHP/generico/sistema_modal_validador_ficha.php");
?>

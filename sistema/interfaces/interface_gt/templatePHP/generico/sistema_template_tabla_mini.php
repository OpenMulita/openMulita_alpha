

<div class='card-box table-responsive'>
	<table id='<?=$idTabla?>'  data-order='<?=$ORDERID?>' class='table table-striped table-bordered' style='width: 100%'>
		<thead>
			<tr>
				<th><?=$xmlTabla->columnas->idRegistro?></th>
				<th><?=$xmlTabla->columnas->campoUno?></th>
				<th><?=$xmlTabla->columnas->campoDos?></th>
				<th><?=$xmlTabla->columnas->campoTres?></th>
<?PHP 	if($CANTIDADCAMPOS >= 4){  ?>
				<th><?=$xmlTabla->columnas->campoCuatro?></th>
<?php	}?>
<?PHP 	if($CANTIDADCAMPOS >= 5){  ?>
				<th><?=$xmlTabla->columnas->campoCinco?></th>
<?php	}?>
<?PHP 	if($CANTIDADCAMPOS >= 6){  ?>
				<th><?=$xmlTabla->columnas->campoSeis?></th>
<?php	}?>
<?PHP 	if($CANTIDADCAMPOS >= 7){  ?>
				<th><?=$xmlTabla->columnas->campoSiete?></th>
<?php	}?>
<?PHP	if($campFICHA) { ?>					
				<th><?=$xmlTabla->columnas->ficha?></th>
<?PHP	} ?>					
<?PHP	if($campACCIONES) { ?>					
				<th><?=$xmlTabla->columnas->accion?></th>
<?PHP	} ?>
			</tr>
		</thead>								
		<tbody>
<?php 								
		foreach ($listarTabla['registros'] as $resultado){
		
		
			$idRegistro = $resultado['idRegistro'];
			$campoUno = $resultado['campoUno'];
			$campoDos = $resultado['campoDos'];
			$campoTres = $resultado['campoTres'];
			$campoCuatro = $resultado['campoCuatro'];
						
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
				<td scope='row'><?=$idRegistro?></td>
				<td><?=$campoUno?></td>
				<td><?=$campoDos?></td>
				<td><?=$campoTres?></td>
				<?PHP if($CANTIDADCAMPOS >= 4){  ?>
				<td><?=$campoCuatro?></td>
				<?php }?>
				<?PHP if($CANTIDADCAMPOS >= 5){  ?>
				<td><?=$resultado['campoCinco']?></td>
				<?php }?>
				<?PHP if($CANTIDADCAMPOS >= 6){  ?>
				<td><?=$resultado['campoSeis']?></td>
				<?php }?>
				<?PHP if($CANTIDADCAMPOS >= 7){  ?>
				<td><?=$resultado['campoSiete']?></td>
				<?php }?>
<?PHP		if($campFICHA) { ?>						
				<td>
		
					<form method='POST' action='sistema.php' class='btn-group'>
						<input type='hidden' name='integracion' value='<?=$INTEGRACION?>'>	
						<input type='hidden' name='modulo' value='<?=$MODULO?>'>	
						<input type='hidden' name='gestion' value='<?=$GESTION?>'>
						<input type='hidden' name='formulario' value='<?=$FICHA?>'>
						<input type='hidden' name='retorno' value='<?=$FORMULARIO?>'>
						<input type='hidden' name='idFicha' value='<?=$idRegistro?>'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>	
						<button type='submit' class='btn btn-primary btn-xs'>
							<i class='fa fa-folder'></i>
							<?=$xmlTabla->botones->ficha?>
						</button>
					</form>					
				</td>
<?PHP		} ?>						
<?PHP		if($campACCIONES) { ?>						
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
<?PHP		} ?>

			</tr>
<?php 
		}
?>									
		</tbody>
	</table>
</div>
	
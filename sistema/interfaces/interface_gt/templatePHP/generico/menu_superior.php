<?php 

	include("configuracion/globales.php");
	include("modulos/perfil/PHP/dao/perfil_usuarios_dao.php");
	
	$objUsuario = new perfil_usuarios_dao();
	$objUsuario->constructor(null,null);
	$objUsuario->cargar($SISUSER)

?>

<script type="text/javascript">

	function modalLoginSalir(){
		$("#modalLoginSalir").modal('show');		
	}
	
</script>
<nav class="" role="navigation">
	<div class="nav toggle">
		<a id="menu_toggle"><i class="fa fa-bars"></i></a>
	</div>
	<!-- 
	<div class="nav toggle">
		<form id="form1" action="sistema.php" method="POST">
			<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
			<button class='btn btn-link'>
				<i class='fa fa-desktop'></i>
			</button>
		</form>
	</div>
	-->
	<!-- 
	<div class="nav toggle">
		<form id="form1" action="sistema.php" method="POST">
			<input type='hidden' name='integracion' value='modulos'>	
			<input type='hidden' name='modulo' value='socios'>	
			<input type='hidden' name='gestion' value='socios'>
			<input type='hidden' name='formulario' value='sociosListar'>
			<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
			<button class='btn btn-link'>
				<i class='fa fa-users'></i>
			</button>
		</form>
	</div>
	 -->
	<ul class="nav navbar-nav navbar-right">
		<li class="">
			<a href="javascript:;"	class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
				<img src="modulos/sistema/imagenes/avatares/<?=$objUsuario->obtenerImagen()?>.png" alt="">
				<?=$objUsuario->obtenerNombre()?>
				<span class=" fa fa-angle-down"></span>
			</a>
			<ul class="dropdown-menu dropdown-usermenu pull-right">
				<li>
					<a href="perfil.php">
						<i class="fa fa-user pull-right"></i>
						Perfil
					</a>
				</li>
				<!-- li>
					<a href="sistema.php?integracion=modulos&modulo=perfil&clase=perfil&accion=null&formulario=clave&idioma=<?=$IDIOMA?>">
					 	<i class="fa fa-terminal pull-right"></i>
						<span>Cambio Clave</span>
					</a>
				</li -->
				<li>
					<a href="sistema.php">
						<i class="fa fa-file-word-o pull-right"></i>
						Manual
					</a>
				</li>
				<li>
					<a href="#" onclick="modalLoginSalir()">
						<i class="fa fa-sign-out pull-right"></i>
						Descanso
					</a>
				</li>
				<li>
					<a href="index.php">
						<i class="fa fa-sign-out pull-right"></i>
						Salir
					</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>

<div id='modalLoginSalir' class='modal fade' role='dialog'>
	<div class='modal-dialog'>
		<!-- Modal content-->
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title' id=''>Salir al descanso</h4>
			</div>
			<div class='modal-body'>
				<form name='formdatos' method='post' action='index.php' id='form-ing' data-parsley-validate class='form-horizontal form-label-left'>
					<input type='hidden' name='descanso' value='ok'>	
					<button type='submit' class='btn btn-primary'>Salir</button>								
				</form>
			</div>
		</div>
	</div>
</div>
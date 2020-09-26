<?php 

	include("configuracion/globales.php");

?>


<!-- el link -->
<li>
	<a>
		<i class='fa fa-desktop'></i> Sistema 
		<span class='fa fa-chevron-down'></span>
	</a>
	<ul class='nav child_menu'>
		<li>
			<a><i class='fa fa-desktop'></i>Gestion Sistema 
				<span class='fa fa-chevron-down'></span>
			</a>
			<ul class='nav child_menu'>
				<li>
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='sistema'>
						<input type='hidden' name='formulario' value='modulosListar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-table'></i>
							Modulos
						</button>
					</form>	
				</li>
				<li>
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='sistema'>
						<input type='hidden' name='formulario' value='gestionesListar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-table'></i>
							Gestiones
						</button>
					</form>	
				</li>
				<li>
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='sistema'>
						<input type='hidden' name='formulario' value='accionesListar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-table'></i>
							Acciones
						</button>
					</form>
				</li>
			</ul>
		</li>
		<li>
			<a><i class='fa fa-users'></i> Gestion Usuarios
				<span class='fa fa-chevron-down'></span>
			</a>
			<ul class='nav child_menu'>
				<li class='sub_menu'>
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='usuarios'>
						<input type='hidden' name='formulario' value='usuariosIngresar'>
						<input type='hidden' name='retorno' value='usuariosListar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-plus'></i>
							Usuario
						</button>
					</form>
				</li>
				<li>	
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='usuarios'>
						<input type='hidden' name='formulario' value='usuariosListar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-table'></i>
							Usuarios
							
						</button>
					</form>
				</li>
				<li>		
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='usuarios'>
						<input type='hidden' name='formulario' value='usuariosTransaccionesListar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-table'></i>
							Transacciones
						</button>
					</form>	
				</li>
				<li>		
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='usuarios'>
						<input type='hidden' name='formulario' value='usuariosLoginListar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-table'></i>
							Login
						</button>
					</form>	
				</li>				
			</ul>
		</li>
		<li>
			<a><i class='fa fa-sitemap'></i>Gestion Categor&#237;as
				<span class='fa fa-chevron-down'></span>
			</a>
			<ul class='nav child_menu'>
				<li class='sub_menu'>
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='usuariosCategorias'>
						<input type='hidden' name='formulario' value='usuariosCategoriasIngresar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-plus'></i>
							Categor&#237;as
						</button>
					</form>	
				</li>
				<li>
					<form id="form1" action="sistema.php" method="POST">
						<!-- cosas del form -->
						<input type='hidden' name='integracion' value='modulos'>	
						<input type='hidden' name='modulo' value='sistema'>	
						<input type='hidden' name='gestion' value='usuariosCategorias'>
						<input type='hidden' name='formulario' value='usuariosCategoriasListar'>
						<input type='hidden' name='idioma' value='<?=$IDIOMA?>'>
						<button class='btn btn-link' style="color:white;">
							<i class='fa fa-table'></i>
							Categor&#237;as
						</button>
					</form>	
				</li>
			</ul>
		</li>
	</ul>
</li>
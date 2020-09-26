<?php 


?>

<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>OpenMulita</title>
		<!-- Bootstrap -->
		<link href='interfaces/<?=$INTERFACE?>/extras/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
		<!-- Font Awesome -->
		<link href='interfaces/<?=$INTERFACE?>//extras/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
		<!-- Animate.css -->
		<link href='https://colorlib.com/polygon/gentelella/css/animate.min.css' rel='stylesheet'>
		<!-- Custom Theme Style -->
		<link href='interfaces/<?=$INTERFACE?>//build/css/custom.min.css' rel='stylesheet'>
	</head>
	<body class='login' style="background: #19a1b7;">
		<div>
			<a class='hiddenanchor' id='signup'></a>
			<a class='hiddenanchor' id='signin'></a>
			<div class='login_wrapper'>				
				<div class='animate form login_form'>					
					<section class='login_content'>
						<form name='formLogin' method='post' action='index.php' >						
							<h1 style = "color:#1e3b77;" >Login</h1>
							<img alt="" src="archivos/imagenes/estaticas/logo_mulita_wide.jpg" width="250" height="100"/>
							<br>
							<br>
							<div>
								<input name='txtNombre' type='text' class='form-control' placeholder='usuario' required />
							</div>
							<div>
								<input name='passClave' type='password' class='form-control' placeholder='Clave' required />
							</div>
							<div>
								<button class='btn btn-default submit' >Entrar</button>
								<!--   a class='reset_pass' href='#'>Lost your password?</a -->
							</div>
							<div class='clearfix'></div>
							<div class='separator'>
								<div class='clearfix'></div>
								<br />
								<div>
	 								<h1 style = "color:#1e3b77;" >OpenMulita</h1>
									<p style = "color:#1e3b77;" >&#169;2016 All Rights Reserved. MulitaERP </p>
								</div>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</body>
</html>


<?php 

include("configuracion/globales.php");
include_once("modulos/sistema/PHP/modelos/sistema_sistema_modelo.php");

$objUsuario = new sistema_sistema_modelo();
$objUsuario->constructor("", $SISUSER);

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>OpenMulita</title>
		<!-- Bootstrap -->
		<link href="interfaces/<?=$INTERFACE?>/extras/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="interfaces/<?=$INTERFACE?>/extras/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- Custom Theme Style -->
		<link href="interfaces/<?=$INTERFACE?>/build/css/custom.min.css" rel="stylesheet">
		<!-- Select con buscador -->
	    <link href="interfaces/<?=$INTERFACE?>/extras/select2/dist/css/select2.min.css" rel="stylesheet">
		<!-- Radion buttom -->
		<link href="interfaces/<?=$INTERFACE?>/extras/iCheck/skins/flat/green.css" rel="stylesheet">
		<!-- Datatables -->
		<link href="interfaces/<?=$INTERFACE?>/extras/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="interfaces/<?=$INTERFACE?>/extras/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
		<link href="interfaces/<?=$INTERFACE?>/extras/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
		<link href="interfaces/<?=$INTERFACE?>/extras/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">	    
		<link href="interfaces/<?=$INTERFACE?>/extras/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	    <!-- Tinymce -->
	    <script src='interfaces/<?=$INTERFACE?>/extras/tinymce/js/tinymce/tinymce.min.js'></script> 	
		    <script type="text/javascript">
		    function deshabilitaRetroceso(){
		        window.location.hash="no-back-button";
		        window.location.hash="Again-No-back-button" //chrome
		        window.onhashchange=function(){window.location.hash="no-back-button";}
			}
	    </script>	
	</head>
	<body class="nav-md" onload="deshabilitaRetroceso()">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="sistema.php" class="site_title">
								<img alt="" src="archivos/imagenes/estaticas/logo_mulita.jpg" width="50" height="50"/>
								<span>OpenMulita</span>
							</a>
						</div>
						<div class="clearfix"></div>
						<!-- /menu profile quick info -->
						<br />
						<!-- sidebar menu -->
						<div id="sidebar-menu"	class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								
<?php
							if(($PODER == "administrador" || $PODER == "estandar") && $INTEGRACION != "modulos" ){
?>
								<h3>Menu <?=$INTEGRACION?></h3>
								<ul class="nav side-menu">
<?php 																	
									//include ('integraciones/'.$INTEGRACION.'/interfaces/interface_gt/menu_izquierda.php');	
								}
?>								
<?php
								if($PODER == "administrador" || $PODER == "test" || $PODER == "desarrollador" ){
?>									
								</ul>
								<br>
								<h3>Menu Modulos</h3>
								<ul class="nav side-menu">
									<?php
									
									if($PODER == "administrador"){
										
										include ('interfaces/interface_gt/templatePHP/sistema/menu_izquierda.php');	

									}
									if($PODER == "test"){
										
										include ('interfaces/interface_gt/templatePHP/sistema/menu_izquierda.php');
			
										
									}	
									if($PODER == "desarrollador"){
										
										include ('interfaces/interface_gt/templatePHP/sistema/menu_izquierda.php');
										
									}										
										
									?>
								</ul>
<?php 
								}
?>								
							</div>
						</div>
						<!-- 
						<div class="sidebar-footer hidden-small">
							<a data-toggle="tooltip" data-placement="top" title="Settings"> 
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</a> 
							<a data-toggle="tooltip" data-placement="top" title="FullScreen"> 
								<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
							</a> 
							<a data-toggle="tooltip" data-placement="top" title="Lock"> 
								<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
							</a> 
							<a data-toggle="tooltip" data-placement="top" title="Logout">
								<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
							</a>
						</div>
					<!-- /menu footer buttons -->
					</div>
				</div>
				<!-- top navigation -->
				<div class="top_nav">
					<div class="nav_menu">
						<?php 
							include ('interfaces/interface_gt/templatePHP/generico/menu_superior.php');
						?>						
					</div>
				</div>
				<!-- /top navigation -->
	
				<!-- page content -->
				<div class="right_col" role="main">
					<div class="">
						<div class="page-title">
							<div class="title_right navbar-right">
								<h1><!-- MulitaERP Sistema  img alt="" src="integracion/marcandoHuellas/imagenes/escudonuevo.jpg" width="100" height="100" --></h1>
							</div>
						</div>
						<div class="clearfix"></div>
						
					<?php 
		
					 if($MODULO != ''){
					 	
					 	include ('modulos/sistema/PHP/enrutador_general.php');
					 	
					 }else{
					 	
					 	//include ('integraciones/'.$INTEGRACION.'/PHP/enrutador_integracion.php');
					 	
					 }
					
					?>
					</div>
					<div class="row">
					</div>
					<div class="row">
					</div>
					<div class="row">
					</div>
					<div class="row">
					</div>
		
				</div>
			<!-- /page content -->

			<!-- footer content -->
				<footer>
					<div class="pull-right">
						OpenMulita - Bootstrap Admin Template by <a
							href="http://www.uru-apps.com">UruApps</a>
					</div>
					<div class="clearfix"></div>
				</footer>
			<!-- /footer content -->
			</div>
		</div>

		<!-- jQuery -->
		<script src="interfaces/<?=$INTERFACE?>/extras/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="interfaces/<?=$INTERFACE?>/extras/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="interfaces/<?=$INTERFACE?>/extras/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="interfaces/<?=$INTERFACE?>/extras/nprogress/nprogress.js"></script>
		<!-- Chart.js -->
		<script src="interfaces/<?=$INTERFACE?>/extras/Chart.js/dist/Chart.min.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="interfaces/<?=$INTERFACE?>/extras/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- iCheck -->
		<script src="interfaces/<?=$INTERFACE?>/extras/iCheck/icheck.min.js"></script>
		<!-- Custom Theme Scripts -->
		<script src="interfaces/<?=$INTERFACE?>/build/js/custom.min.js"></script>	
		
		
		
		<!-- text box con clanedario  -->
		<script src="interfaces/<?=$INTERFACE?>/js/moment/moment.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/js/datepicker/daterangepicker.js"></script>
		<script>
			$(document).ready(
				function() {
					$('#fecha').daterangepicker(
						{
							singleDatePicker: true,
							calender_style: "picker_4",
							format: 'DD-MM-YYYY',
							locale: {
								 daysOfWeek: ["Do","Lu", "Ma","Mi","Ju","Vi","Sa"],
								 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octobre', 'Noviembre', 'Diciembre'],
					        }	
						}, 
						function(start, end, label) {
							console.log(start.toISOString(), end.toISOString(), label);
						}
					);
				}
			);
	    </script>
	    <script>
			$(document).ready(
				function() {
					$('#fechaDos').daterangepicker(
						{
							singleDatePicker: true,
							calender_style: "picker_1",
							format: 'DD-MM-YYYY',
							locale: {
								 daysOfWeek: ["Do","Lu", "Ma","Mi","Ju","Vi","Sa"],
								 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octobre', 'Noviembre', 'Diciembre'],
					        }								
						}, 
						function(start, end, label) {
							console.log(start.toISOString(), end.toISOString(), label);
						}
					);
				}
			);
	    </script>
		<script>
			$(document).ready(
				function() {
					$('#fechaTres').daterangepicker(
						{
							singleDatePicker: true,
							calender_style: "picker_1",
							format: 'DD-MM-YYYY',
							locale: {
								 daysOfWeek: ["Do","Lu", "Ma","Mi","Ju","Vi","Sa"],
								 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octobre', 'Noviembre', 'Diciembre'],
					        }
							
						}, 
						function(start, end, label) {
							console.log(start.toISOString(), end.toISOString(), label);
						}
					);


					
				}
			);
	    </script>
	    <script>
			$(document).ready(
				function() {
					$('#fechaCuatro').daterangepicker(
						{
							singleDatePicker: true,
							calender_style: "picker_1",
							format: 'DD-MM-YYYY',
							locale: {
								 daysOfWeek: ["Do","Lu", "Ma","Mi","Ju","Vi","Sa"],
								 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octobre', 'Noviembre', 'Diciembre'],
					        }
							
						}, 
						function(start, end, label) {
							console.log(start.toISOString(), end.toISOString(), label);
						}
					);


					
				}
			);
	    </script>
	     <script>
			$(document).ready(
				function() {
					$('#fechaCinco').daterangepicker(
						{
							singleDatePicker: true,
							calender_style: "picker_3",
							format: 'DD-MM-YYYY',
							locale: {
								 daysOfWeek: ["Do","Lu", "Ma","Mi","Ju","Vi","Sa"],
								 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octobre', 'Noviembre', 'Diciembre'],
					        }
							
						}, 
						function(start, end, label) {
							console.log(start.toISOString(), end.toISOString(), label);
						}
					);


					
				}
			);
	    </script>
	<!-- /text box con clanedario -->
	  	
	  	<!-- Select con buscador -->
	  	<script src="interfaces/<?=$INTERFACE?>/extras/select2/dist/js/select2.full.min.js"></script>
		<script>
	      $(document).ready(function() {
	        $(".select2_single").select2({
	          allowClear: true,
	          placeholder: "Selecione una Opcion"
	        });
	      });
	    </script>
		<!-- Select con buscador -->
	  	
	  	
		<!-- Parsley -->
    	<!-- Esta clase se encarga de controlar las validaciones de los campos  -->
    	<script src="interfaces/<?=$INTERFACE?>/extras/parsleyjs/dist/parsley.min.js"></script>
    	<script>	     
	      $(document).ready(function() {
	        $.listen('parsley:field:validate', function() {
	          validateFront();
	        });
	        $('#form-ing .btn').on('click', function() {
	          $('#form-ing').parsley().validate();
	          validateFront();
	        });
	        var validateFront = function() {
	          if (true === $('#form-ing').parsley().isValid()) {
	            $('.bs-callout-info').removeClass('hidden');
	            $('.bs-callout-warning').addClass('hidden');
	          } else {
	            $('.bs-callout-info').addClass('hidden');
	            $('.bs-callout-warning').removeClass('hidden');
	          }
	        };
	      });
	      try {
	        hljs.initHighlightingOnLoad();
	      } catch (err) {}
	    </script>
	    <!-- /Parsley -->
	   
	   
	    <!-- /Tinimce -->
	    <script>
			tinymce.init({
				selector: '#mytextarea',
				themes: "modern"
			});
		</script>
	    <script>
			tinymce.init({
				selector: '#mytimytextarea',
				themes: "modern"
			});
		</script>
    	<!--  Radion Buttom -->
   	    <script src="interfaces/<?=$INTERFACE?>/extras/iCheck/icheck.min.js"></script>
   	   	<script>
			$(document).ready(function(){
			  $('input').iCheck({
			    checkboxClass: 'icheckbox_flat',
			    radioClass: 'iradio_flat'
			  });
			});
		</script>
   	   	<!--  Radion Buttom -->
    	    	<!--  Data Table -->
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-buttons/js/buttons.flash.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-buttons/js/buttons.html5.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-buttons/js/buttons.print.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
		<!-- script src="extras/datatables.net-scroller/js/datatables.scroller.min.js"></script -->
		<script src="interfaces/<?=$INTERFACE?>/extras/jszip/dist/jszip.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/pdfmake/build/pdfmake.min.js"></script>
		<script src="interfaces/<?=$INTERFACE?>/extras/pdfmake/build/vfs_fonts.js"></script>
		<!-- jQuery Smart Wizard -->
		<script src="interfaces/<?=$INTERFACE?>/extras/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
		<script type="text/javascript">
		      $(document).ready(function() {

		    	  $('#wizard').smartWizard({
						labelNext:'Siguente', 
						labelPrevious:'Anterior', 
						labelFinish:'', 
						includeFinishButton:false,
						reverseButtonsOrder:true
		    	  });		    	  
		          $('.buttonNext').addClass('btn btn-success');
		          $('.buttonPrevious').addClass('btn btn-primary');
		          
		          
		      });
    	</script>
		<!-- Datatables -->
<?php 	include("interfaces/interface_gt/dataTable.php");	?>
		

	    
	</body>
</html>

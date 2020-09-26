
<script type="text/javascript">
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable").length){
            $("#datatable").DataTable({
				responsive: true,
				dom: "Bfrtip",
             	buttons: [
                	{
                	  extend: "copy",
                	  className: "btn-sm"
                	},
                	{
                	  extend: "csv",
                	  className: "btn-sm"
                	},
                	{
                	  extend: "excel",
                	  className: "btn-sm"
                	},
                	{
                	  extend: "pdfHtml5",
                	  className: "btn-sm"
                	},
                	{
                	  extend: "print",
                	  className: "btn-sm"
                	},
              	],
              
              	language: {
		            "lengthMenu": " _MENU_ Lineas por pagina",
		            "zeroRecords": "No se han encontrados registros",
		            "info": "Numero de pagina _PAGE_ de _PAGES_",
		            "infoEmpty": "No records available",
		            "infoFiltered": "(filtered from _MAX_ total records)",
					"paginate": {
						"first":"Primera",
						"last":"Ultima",
						"next":"Siguiente",
						"previous":"Anterior",
					},
					"search":"Buscar:",  
					"buttons": {
						"copy": 'Copiar',
						"csv": 'Exportar a CSV',
						"print": 'Imprimir'						
					}				            
		      	},
			  	keys: true
		      });
          }
        };

        var handleDataTableButtons2 = function() {
	          if ($("#datatable2").length){
	            $("#datatable2").DataTable({
					responsive: true,
					dom: "Bfrtip",
	             	buttons: [
	                	{
	                	  extend: "copy",
	                	  className: "btn-sm"
	                	},
	                	{
	                	  extend: "csv",
	                	  className: "btn-sm"
	                	},
	                	{
	                	  extend: "excel",
	                	  className: "btn-sm"
	                	},
	                	{
	                	  extend: "pdfHtml5",
	                	  className: "btn-sm"
	                	},
	                	{
	                	  extend: "print",
	                	  className: "btn-sm"
	                	},
	              	],
	              
	              	language: {
			            "lengthMenu": " _MENU_ Lineas por pagina",
			            "zeroRecords": "No se han encontrados registros",
			            "info": "Numero de pagina _PAGE_ de _PAGES_",
			            "infoEmpty": "No records available",
			            "infoFiltered": "(filtered from _MAX_ total records)",
						"paginate": {
							"first":"Primera",
							"last":"Ultima",
							"next":"Siguiente",
							"previous":"Anterior",
						},
						"search":"Buscar:",  
						"buttons": {
							"copy": 'Copiar',
							"csv": 'Exportar a CSV',
							"print": 'Imprimir'						
						}	  			            
			      	},
				  	keys: true
			      });
	          }
	        };

	        var handleDataTableButtons3 = function() {
		          if ($("#datatable3").length){
		            $("#datatable3").DataTable({
						responsive: true,
						dom: "Bfrtip",
		             	buttons: [
		                	{
		                	  extend: "copy",
		                	  className: "btn-sm"
		                	},
		                	{
		                	  extend: "csv",
		                	  className: "btn-sm"
		                	},
		                	{
		                	  extend: "excel",
		                	  className: "btn-sm"
		                	},
		                	{
		                	  extend: "pdfHtml5",
		                	  className: "btn-sm"
		                	},
		                	{
		                	  extend: "print",
		                	  className: "btn-sm"
		                	},
		              	],
		              
		              	language: {
				            "lengthMenu": " _MENU_ Lineas por pagina",
				            "zeroRecords": "No se han encontrados registros",
				            "info": "Numero de pagina _PAGE_ de _PAGES_",
				            "infoEmpty": "No records available",
				            "infoFiltered": "(filtered from _MAX_ total records)",
							"paginate": {
								"first":"Primera",
								"last":"Ultima",
								"next":"Siguiente",
								"previous":"Anterior",
							},
							"search":"Buscar:",  
							"buttons": {
								"copy": 'Copiar',
								"csv": 'Exportar a CSV',
								"print": 'Imprimir'						
							}	  			            
				      	},
					  	keys: true
				      });
		          }
		        }; 
		        var handleDataTableButtons4 = function() {
			          if ($("#datatable4").length){
			            $("#datatable4").DataTable({
							responsive: true,
							dom: "Bfrtip",
			             	buttons: [
			                	{
			                	  extend: "copy",
			                	  className: "btn-sm"
			                	},
			                	{
			                	  extend: "csv",
			                	  className: "btn-sm"
			                	},
			                	{
			                	  extend: "excel",
			                	  className: "btn-sm"
			                	},
			                	{
			                	  extend: "pdfHtml5",
			                	  className: "btn-sm"
			                	},
			                	{
			                	  extend: "print",
			                	  className: "btn-sm"
			                	},
			              	],
			              
			              	language: {
					            "lengthMenu": " _MENU_ Lineas por pagina",
					            "zeroRecords": "No se han encontrados registros",
					            "info": "Numero de pagina _PAGE_ de _PAGES_",
					            "infoEmpty": "No records available",
					            "infoFiltered": "(filtered from _MAX_ total records)",
								"paginate": {
									"first":"Primera",
									"last":"Ultima",
									"next":"Siguiente",
									"previous":"Anterior",
								},
								"search":"Buscar:",  
								"buttons": {
									"copy": 'Copiar',
									"csv": 'Exportar a CSV',
									"print": 'Imprimir'						
								}	  			            
					      	},
						  	keys: true
					      });
			          }
			        };
			        var handleDataTableButtons5 = function() {
				          if ($("#datatable5").length){
				            $("#datatable5").DataTable({
								responsive: true,
								dom: "Bfrtip",
				             	buttons: [
				                	{
				                	  extend: "copy",
				                	  className: "btn-sm"
				                	},
				                	{
				                	  extend: "csv",
				                	  className: "btn-sm"
				                	},
				                	{
				                	  extend: "excel",
				                	  className: "btn-sm"
				                	},
				                	{
				                	  extend: "pdfHtml5",
				                	  className: "btn-sm"
				                	},
				                	{
				                	  extend: "print",
				                	  className: "btn-sm"
				                	},
				              	],
				              
				              	language: {
						            "lengthMenu": " _MENU_ Lineas por pagina",
						            "zeroRecords": "No se han encontrados registros",
						            "info": "Numero de pagina _PAGE_ de _PAGES_",
						            "infoEmpty": "No records available",
						            "infoFiltered": "(filtered from _MAX_ total records)",
									"paginate": {
										"first":"Primera",
										"last":"Ultima",
										"next":"Siguiente",
										"previous":"Anterior",
									},
									"search":"Buscar:",  
									"buttons": {
										"copy": 'Copiar',
										"csv": 'Exportar a CSV',
										"print": 'Imprimir'						
									}	  			            
						      	},
							  	keys: true
						      });
				          }
				        };     	
        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
              handleDataTableButtons2();
              handleDataTableButtons3();
              handleDataTableButtons4();
              handleDataTableButtons5();
            }
          };
        }();
        TableManageButtons.init();
		
      });
</script>


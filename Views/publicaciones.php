<?php 

	if(empty($_SESSION['email'])){
		
		header("location: Controllers/UsuarioController.php?action=login");
	}

 ?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Administración de Publicaciones</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="../Css/Style.css">
		</head>
		<body>
			<header>
				<nav class="navbar navbar-light bg-light">
					<a class="btn btn-primary" href="../Controllers/PublicacionAdminController.php?action=logout">
						LOGOUT
					</a>
				</nav>		
			</header>
			<div class="container mb-3 border" id="all">
				<div class="container">					
					<h3>LISTA DE POSTS</h3>	
					<div id="lista"></div>
				</div>
			</div>
			

			<!--SCRIPTS-->
			<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<script type="text/javascript">
	   			$(document).ready(function () {  
	   				
	   				$.ajax({
					    type: "GET",
					    url: "PublicacionAdminController.php?action=lista",
					    success: function(data) {
					    	console.log("data");
					    	data.replace("	", " ")
					    	.replace(/\\n/g, "\\n")
					    	.replace(/\\'/g, "\\'")
					    	.replace(/\\"/g, '\\"')
					    	.replace(/\\&/g, "\\&")
					    	.replace(/\\r/g, "\\r")
					    	.replace(/\\t/g, "\\t")
					    	.replace(/\\b/g, "\\b")
					    	.replace(/\\f/g, "\\f")
					    	.replace(/[\u0000-\u0019]+/g,"");

					    	data = JSON.parse(data);
					    	show(data);
					  		}

				  		});

	   				
	   				

		   			function show(data) {
		   				let list=$("#lista");
		   					list.html("");

					    	for(i=0; i < data.length; i++){
		                        var row = data[i];
		                        let html =  `<div class="row mb-3 detalle">
		                        				<div class="col md-12">
													<div class="row mb-3">
			                        					<nav class="navbar navbar-light bg-light">			                        						
															<a class="btn btn-secondary" href="../Controllers/PublicacionAdminController.php?action=publicacion&id=${row.id}">
																Ver Detalle Publicación
															</a>
														</nav>	
													</div>
												</div>
												<div class="col md-12">
													<div class="row mb-3">
														<div class="col md-1">
															<span class="left"><b>${row.titulo}</b></span>
														</div>
														<div class="col md-10"></div>
														<div class="col md-1">
															<span class="right">${row.fecha}</span>
														</div>								
													</div>
													<div class="row mb-3">
														<div class="col md-3">
														<img src='../imagenes/${row.imagen}'>
														</div>
														<div class="col md-8">
															${row.contenido}
														</div>
													</div>
												</div>						
											</div>`;
							    	list.append(html);
						  		}
						  	}

	   			});

	  		</script>
		</body>
	</html>


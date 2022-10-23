
	<!DOCTYPE html>
	<html>
		<head>
			<title>Publicaciones</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

			<link rel="stylesheet" type="text/css" href="Css/Style.css">
		</head>
		<body>
    <header>
     	<div class=" container header">
     		<a href="index.php" class="logo">Prueba</a>
     		<div class="menuToggle">
     			<i class="fas fa-bars"></i>
     		</div>
     		<ul class="navigation">
     			<li ><a href="./Views/login.php">Login</a></li>
     	
     		</ul>
     	</div>
     </header>
			<div class="container" id="all"> 
				
				<form action="Controllers/PublicacionController.php" method="POST" id="myform"  enctype="multipart/form-data">

					<input type="hidden" name="action" value="insert">

				  <div class="mb-3 mt-3">				  	
		

<input type="text"  class="form-control mb-3" name="titulo" placeholder="Titulo" required>
<input type="email" class="form-control mb-3" name="correo" placeholder="Email" required>
<input type="file"  class="form-control mb-3" name="imagen" placeholder="Imagen" required>
<textarea type="text" class="form-control mb-3" name="contenido" cols="40" rows="5" placeholder="contenido" required></textarea>
				  </div>
				  <div class="mb-3">
	            	<div class="g-recaptcha" data-sitekey="6LfMmuofAAAAAEeeWIwCXd3wPaETGvkHPXxpjqNi"></div>
	              </div>				  
				  <button type="submit" class="btn btn-primary mb-3">Guardar</button>
				</form>

			

				<div class="container">					
					<h3>LISTA DE POSTS</h3>	
					<div id="lista"></div>
				</div>
			</div>

	
			<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			<script type="text/javascript">
	   			$(document).ready(function () {  
	   				
	   				$.ajax({
					    type: "GET",
					    url: "Controllers/PublicacionController.php?action=lista",
					    success: function(data) {
					    	
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

					    	$.ajax({
							    type: "GET",
							    url: "Controllers/PublicacionController.php?action=lista",
							    success: function(data) {
							    	
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
		                        let html =  `<div class="row mb-3 border">
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
															<img src='./imagenes/${row.imagen}'>
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




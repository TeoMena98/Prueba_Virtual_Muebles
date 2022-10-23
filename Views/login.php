<?php 
	

	if(!empty($_SESSION['email'])){

		header("location: Controllers/PublicacionAdminController.php?action=insert");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN VIRTUAL MUEBLES</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../Css/themes/Login.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-light bg-light">
			<a class="btn btn-primary" href="../index.php">
				Atras
			</a>
		</nav>		
	</header>
    <div class="container" id="container">         
            
        <div class="form-container sign-in-container">
          <form action="../Controllers/UsuarioController.php" method="POST">
            <h1>LOGIN ADMINISTRADOR</h1>
            <input type="hidden" name="action" value="login">
            <input name="email" class="form-control mb-3" type="email" placeholder="Email" />
            <input name="password" class="form-control mb-3" type="password" placeholder="Password" />
            <div class="mb-3">
            	<div class="g-recaptcha" data-sitekey="6LfMmuofAAAAAEeeWIwCXd3wPaETGvkHPXxpjqNi"></div>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
          </form>
        </div>

      </div>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </body>


</html>
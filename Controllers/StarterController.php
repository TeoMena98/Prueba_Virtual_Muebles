<?php 

class StarterController{

	public function __construct(){
		session_start();
	}

	public function redirectlogin(){
		header("location: UsuarioController.php?action=login");
	}

	public function redirectPublicacionAdmin(){
		header("location: PublicacionController.php?action=admin");
	}


}


 ?>
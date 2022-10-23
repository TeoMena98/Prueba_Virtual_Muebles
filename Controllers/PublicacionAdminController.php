<?php
	
	require '../Models/Publicacion.php';
	require 'StarterController.php';

	$is = new StarterController();

	if(empty($_SESSION['email'])){
		$is->redirectlogin();

	}

	class PublicacionAdminController extends Publicacion {
		
		public function AdminView(){
			require '../Views/publicaciones.php';
		}

		public function DetalleView($id){
			require '../Views/Detalle.php';
		}

		public function RedirectLogin(){
			require '../Views/login.php';
		}

		public function Detalle($id){
			$this->id = $id;
			echo $this->Publicacion();			
		}

		public function Listar(){
			$this->ListPublicaciones = $this->ListPublicaciones();
			echo $this->ListPublicaciones;
		}

		public function closeSession(){
			session_destroy();
			header("location: ../index.php");
			
		}
		

	}


	if(isset($_GET['action']) && $_GET['action']=='admin'){
		$instanciacontrolador = new PublicacionAdminController();
		$instanciacontrolador->AdminView();
	}

	if(isset($_GET['action']) && $_GET['action']=='publicacion'){
		$instanciacontrolador = new PublicacionAdminController();
		$id = $_GET['id'];
		$instanciacontrolador->DetalleView($id);
	}

	if(isset($_GET['action']) && $_GET['action']=='lista'){
		$instanciacontrolador = new PublicacionAdminController();
		$instanciacontrolador->Listar();
	}

	if(isset($_GET['action']) && $_GET['action']=='detalle'){
		$instanciacontrolador = new PublicacionAdminController();
		$id = $_GET['id'];
		$instanciacontrolador->Detalle($id);
	}

	if(isset($_GET['action']) && $_GET['action']=='logout'){
		$instanciacontrolador = new PublicacionAdminController();
		$instanciacontrolador->closeSession();
	}


?>
<?php


require '../Models/Publicacion.php';

	class PublicacionController extends Publicacion {
		
		
		
		public function Listar(){
			$this->ListPublicaciones = $this->ListPublicaciones();
			echo $this->ListPublicaciones;
		}


		public function saveInfoForModel($titulo,$imagen,$contenido,$correo){
			$this->titulo = $titulo;
			$this->imagen = $imagen ;
			$this->contenido = $contenido;
			$this->correo = $correo;
			
			$this->insertPublicacion();
			
			return $this->ListPublicaciones();
			
		}
		

	}




	if(isset($_GET['action']) && $_GET['action']=='lista'){
		$instanciacontrolador = new PublicacionController();
		$instanciacontrolador->Listar();
	}

	if(isset($_POST['action']) && $_POST['action']=='insert'){
		$instanciacontrolador = new PublicacionController();

		$titulo=$_POST['titulo'];
		$correo=$_POST['correo'];
		
		$contenido=$_POST['contenido'];
		
		$imagens=$_FILES['imagen']['name'];
		$n_temporal=$_FILES['imagen']['tmp_name'];
		$tipo_archivo=$_FILES['imagen']['type'];
		$destino = "../imagenes/".$imagens;
		move_uploaded_file($n_temporal, $destino);
	
	
		
		//Validacion reCAPTCHA
		$ip = $_SERVER['REMOTE_ADDR'];
		$captcha = $_POST['g-recaptcha-response'];
		$secretkey = "6LfMmuofAAAAANCiI15-LkC-vVdUdJNeqHsiCjNm";

		$respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

		$atributos = json_decode($respuesta, TRUE);

		if (!$atributos['success']) {
			$errors[] = 'Verificar Captcha';
			header("location: ../index.php");
		}else {
			$instanciacontrolador->saveInfoForModel(
				$titulo,
				$imagens,
				$contenido,
				$correo
			);
			header("location: ../index.php");
		}
	}


?>
<?php
//El modelo que manejará las operaciones crud de los usuarios conectados o registrados
//require_once 'models/usuario.php';

class doctorController{
	
	public function operaciones(){

		require_once ('./views/doctor/homeVideo.php');

	}

	public function perfil(){

		require_once ('./views/doctor/homePerfil.php');

	}

	public function solicitarVideo(){

		$_SESSION['identityDoctor']['video'] = 'si';

		header('Location:'.base_url.'doctor/video');

	}

	public function video(){

		require_once ('views/doctor/roomVideo.php');

	}

	public function terminarVideo(){

		$_SESSION['identityDoctor']['video'] = 'no';

		header('Location:'.base_url.'doctor/operaciones');


	}
	
	public function save(){
		if(isset($_POST)){
			
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			
			if($nombre && $apellidos && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);

				$save = $usuario->save();
				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url.'usuario/registro');
	}
	
	
	public function logout(){

		if(isset($_SESSION['identityDoctor'])){
			unset($_SESSION['identityDoctor']);
		}

		//Cerrar sesión cuando exista un administrador logueado
		// if(isset($_SESSION['admin'])){
		// 	unset($_SESSION['admin']);
		// }
		
		header("Location:".base_url."loginDoctor/inicio");
	}
	
} // fin clase
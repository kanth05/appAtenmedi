<?php
//El modelo que manejará las operaciones crud de los usuarios conectados o registrados
//require_once 'models/usuario.php';

class pacienteController{
	
	public function menuVideo(){

		if(isset($_SESSION['servicio'])){
			unset($_SESSION['servicio']);
		}
		require_once ('./views/paciente/homeVideo.php');

	}

	public function menuChat(){

		if(isset($_SESSION['servicio'])){
			unset($_SESSION['servicio']);
		}
		require_once ('./views/paciente/homeChat.php');

	}

	public function menuServ(){

		if(isset($_SESSION['servicio'])){
			unset($_SESSION['servicio']);
		}
		if(!isset($_POST['tipoServicio'])){
			require_once ('./views/paciente/homeServicios.php');
		}else{
			$servicio = $_POST['tipoServicio'];
			$_SESSION['servicio'] = $servicio;
			require_once ('./views/paciente/homeServicios.php');
		}

	}

	public function menuPerfil(){

		if(isset($_SESSION['servicio'])){
			unset($_SESSION['servicio']);
		}
		require_once ('./views/paciente/homePerfil.php');

	}

	public function solicitarServicio(){

		unset($_SESSION['servicio']);
		require_once ('./views/paciente/homeVideo.php');

	}

	public function solicitarVideo(){

		$_SESSION['identity']['video'] = 'si';

		header('Location:'.base_url.'paciente/video');

	}

	public function video(){

		require_once ('views/paciente/roomVideo.php');

	}

	public function terminarVideo(){

		$_SESSION['identity']['video'] = 'no';

		header('Location:'.base_url.'paciente/menuVideo');


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

	public function validaProducto(){
		//Valida que la cédula insertada exista en l bd del cliente para el producto que usa

		if(isset($_POST)){
			
			$nombre     = isset($_POST['nombre'])     ? $_POST['nombre']     : false;
			$cedula     = isset($_POST['cedula'])     ? $_POST['cedula']     : false;
			$tipoComp   = isset($_POST['tipo'])       ? $_POST['tipo']       : false;
			$correo     = isset($_POST['correo'])     ? $_POST['correo']     : false;
			$password   = isset($_POST['password'])   ? $_POST['password']   : false;
			$repassword = isset($_POST['repassword']) ? $_POST['repassword'] : false;
			$terminos   = isset($_POST['terminos'])   ? $_POST['terminos'] : false;

			//Validación de los campos recibidos por POST

			// Array de errores
			$errores = array();
			
			// Validar los datos antes de guardarlos en la base de datos

			// Validar campo nombre
			if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){

				$errores['nombre'] = "El nombre no puede estar vacío o poseer números.";
			}

			//Validar si la cédula fue registrada
			if(empty($cedula)){
				$errores['cedula'] = 'El número de cédula no puede estár vacio.';
			}


			if(empty($tipoComp)){
				$errores['tipo'] = 'Debe elegir el tipo de compañia que posee.';
			}
						
			// Validar el email
			if(empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)){
				
				$errores['correo'] = "El correo no es válido.";
			}
			
			// Validar la contraseña
			if(empty($password)){

				$errores['password'] = "La contraseña está vacía.";

			}

			// Validar confirmación de contraseña
			if(empty($repassword)){

				$errores['repassword'] = "Falta confirmar la contraseña.";
				
			}

			if(empty($terminos)){
				$errores['terminos'] = 'Debe aceptar los terminos para registrarse.';
			}

			if(count($errores) == 0){

				
				if($password != $repassword){

					$_SESSION['errorPassword'] = "La contraseña tiene que ser igual en ambos campos.";
					header('Location:'.base_url.'loginPaciente/registro');
				}
				

				if($cedula == 20127909){
					//$usuario->save();
					$_SESSION['register'] = 'completed';
					header('Location:'.base_url.'loginPaciente/registro');
				}else{
					$_SESSION['register'] = 'failed';
					header('Location:'.base_url.'loginPaciente/registro');
				}

			}else{
				$_SESSION['error'] = $errores;
				header('Location:'.base_url.'loginPaciente/registro');
			}

		}else{
			$_SESSION['register'] = 'failed';
			header('Location:'.base_url.'loginPaciente/registro');
		}
	}
	
	public function logout(){

		if(isset($_SESSION['identity'])){

			unset($_SESSION['identity']);
			unset($_SESSION['control']);

		}

		//Cerrar sesión cuando exista un administrador logueado
		// if(isset($_SESSION['admin'])){
		// 	unset($_SESSION['admin']);
		// }
		
		header('Location:'.base_url);
		ob_end_flush();
	}
	
} // fin clase
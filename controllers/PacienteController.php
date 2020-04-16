<?php
//El modelo que manejará las operaciones crud de los usuarios conectados o registrados
//require_once 'models/usuario.php';

class pacienteController{
	
	public function menuVideo(){

		if(isset($_SESSION['servicio'])){
			unset($_SESSION['servicio']);
		}

		if(isset($_SESSION['identity'])){

			$_SESSION['identity']['chat'] = 'no';
			require_once ('./views/paciente/homeVideo.php');

		}else{

			header('Location:'.base_url);

		}

	}

	public function menuChat(){

		if(isset($_SESSION['servicio'])){
			unset($_SESSION['servicio']);
		}

		if(isset($_SESSION['identity'])){

			$_SESSION['identity']['chat'] = 'no';
			require_once ('./views/paciente/homeChat.php');

		}else{

			header('Location:'.base_url);

		}

	}

	public function menuServ(){

		if(isset($_SESSION['identity'])){

			if(!isset($_POST['tipoServicio'])){
				$_SESSION['identity']['chat'] = 'no';
				require_once ('./views/paciente/homeServicios.php');
			}else{
				$_SESSION['servicio'] = $_POST['tipoServicio'];
				require_once ('./views/paciente/homeServicios.php');
			}

		}else{

			header('Location:'.base_url);

		}

	}
	
	public function menuServSet(){

		if(isset($_SESSION['servicio'])){
			unset($_SESSION['servicio']);
		}

		if(isset($_SESSION['identity'])){
			header('Location:'.base_url.'paciente/menuServ');
		}else{
			header('Location:'.base_url);
		}
	}

	public function menuPerfil(){

		if(isset($_SESSION['servicio'])){
			unset($_SESSION['servicio']);
		}

		if(isset($_SESSION['identity'])){

			$_SESSION['identity']['chat'] = 'no';
			require_once ('./views/paciente/homePerfil.php');

		}else{

			header('Location:'.base_url);

		}

	}

	public function solicitarServicio(){

		if(isset($_POST)){

			//Validación de los campos recibidos por POST

			// Array de errores
			$errores = array();

			// Validar los datos antes de guardarlos en la base de datos
			$causa     = isset($_POST['causa'])     ? $_POST['causa']     : false;
			$sintoma   = isset($_POST['sintoma'])   ? $_POST['sintoma']     : false;
			$fecha     = isset($_POST['fecha'])     ? $_POST['fecha']     : false;


			// Validar campo causa
			if(empty($causa)){

				$errores['causa'] = "El campo causa no puede estar vacío.";
			}

			// Validar campo sintoma
			if(empty($sintoma)){

				$errores['sintoma'] = "El campo sintoma no puede estar vacío.";
			}

			// Validar campo fecha
			if(empty($fecha)){

				$errores['causa'] = "El campo fecha no puede estar vacío.";
			}

			if($_SESSION['servicio'] == '1'){

				
				$Dsalida   = isset($_POST['Dsalida'])   ? $_POST['Dsalida']     : false;
				$Dllegada   = isset($_POST['Dllegada'])   ? $_POST['Dllegada']     : false;

				// Validar campo Dsalida
				if(empty($Dsalida)){

					$errores['Dsalida'] = "El campo Dsalida no puede estar vacío.";
				}
	
				// Validar campo Dllegada
				if(empty($Dllegada)){
	
					$errores['Dllegada'] = "El campo Dllegada no puede estar vacío.";
				}

			}else{

				$direccion   = isset($_POST['direccion'])   ? $_POST['direccion']     : false;

				// Validar campo direccion
				if(empty($direccion)){

					$errores['direccion'] = "El campo direccion no puede estar vacío.";
				}

			}	

			if(count($errores) == 0){

				//De momento redirigimos hacia la pantalla de video, porque no se envía aún ninguna información.
				header('Location:'.base_url.'paciente/menuVideo');
				

			}else{
				$_SESSION['error'] = $errores;
				header('Location:'.base_url.'paciente/menuServ');
			}

		}else{
			$_SESSION['error'] = 'failed';
			header('Location:'.base_url.'loginPaciente/menuServ');
		}

	}

	public function solicitarVideo(){

		//Valida los campos de causa y sintomas
		if(isset($_POST)){
			
			$causa     = isset($_POST['causa'])     ? $_POST['causa']     : false;
			$sintoma   = isset($_POST['sintoma'])   ? $_POST['sintoma']     : false;

			//Validación de los campos recibidos por POST

			// Array de errores
			$errores = array();
			
			// Validar los datos antes de guardarlos en la base de datos

			// Validar campo causa
			if(empty($causa)){

				$errores['causa'] = "El campo causa no puede estar vacío.";
			}

			// Validar campo sintoma
			if(empty($sintoma)){

				$errores['sintoma'] = "El campo sintoma no puede estar vacío.";
			}

			if(count($errores) == 0){

				$_SESSION['identity']['video'] = 'si';

				header('Location:'.base_url.'paciente/video');
				

			}else{
				$_SESSION['error'] = $errores;
				header('Location:'.base_url.'paciente/menuVideo');
			}

		}else{
			$_SESSION['error'] = $errores;
			header('Location:'.base_url.'loginPaciente/menuVideo');
		}

	}

	public function solicitarChat(){

		//Valida los campos de causa y sintomas
		if(isset($_POST)){
			
			$causa     = isset($_POST['causa'])     ? $_POST['causa']     : false;
			$sintoma   = isset($_POST['sintoma'])   ? $_POST['sintoma']   : false;

			//Validación de los campos recibidos por POST

			// Array de errores
			$errores = array();
			
			// Validar los datos antes de guardarlos en la base de datos

			// Validar campo causa
			if(empty($causa)){

				$errores['causa'] = "El campo causa no puede estar vacío.";
			}

			// Validar campo sintoma
			if(empty($sintoma)){

				$errores['sintoma'] = "El campo sintoma no puede estar vacío.";
			}

			if(count($errores) == 0){

				$_SESSION['identity']['chat'] = 'si';


				header('Location:'.base_url.'paciente/chat');
				

			}else{
				$_SESSION['error'] = $errores;
				header('Location:'.base_url.'paciente/menuChat');
			}

		}else{
			$_SESSION['error'] = 'failed';
			header('Location:'.base_url.'loginPaciente/menuChat');
		}	

	}

	public function video(){

		require_once ('views/paciente/roomVideo.php');

	}

	public function chat(){

		require_once ('./views/paciente/roomChat.php');

	}

	public function terminarVideo(){

		$_SESSION['identity']['video'] = 'no';

		header('Location:'.base_url.'paciente/menuVideo');


	}

	public function terminarChat(){

		$_SESSION['identity']['chat'] = 'no';

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

		$espCaracteres = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

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

			//Validacion de contraseña, si son iguales, tienen la cantidad establecida y no poseen caracteres especiales
			if($password != $repassword){

				$errores['errorClave'] = "La contraseña tiene que ser igual en ambos campos.";
				$errores['password'] = "No coincide";
				$errores['repassword'] = "No coincide";
				
			}else{

				$longitudClave = strlen($password);

				if($longitudClave < 8 || $longitudClave > 12){
 
					$errores['errorClave'] = "La contraseña debe tener entre 8 a 12 caracteres.";
					$errores['password']   = "No es apta";
					$errores['repassword'] = "No es apta";

				}

				if(preg_match($espCaracteres, $password)){

					$errores['errorClave'] = "La contraseña no debe tener caracteres como: $%&_-:; .";
					$errores['password']   = "No es apta";
					$errores['repassword'] = "No es apta";
				}

			}

			if(count($errores) == 0){

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
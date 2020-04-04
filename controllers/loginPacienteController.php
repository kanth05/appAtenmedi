<?php

class loginPacienteController{

    public function inicio(){

        require_once ('./views/loginPaciente/login.php');

    }

    public function registro(){

        require_once ('./views/loginPaciente/register.php');

    }

    public function olvidoContraseña(){

        require_once ('./views/loginPaciente/forgot-password.php');

    }

    public function inicioSesion(){

		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos

			//Cuando se tenga el modelo para consultar los datos del usuario, se crea un nuevo objeto usuario usando la clase Usuario y se usan los setters para envíar los datos que vienen del formulario.

			// $usuario = new Usuario();
			// $usuario->setEmail($_POST['email']);
			// $usuario->setPassword($_POST['password']);

			//Luego, se usa el metodo login de la clase usuario para validar si dichos datos existen en la bd
			// $identity = $usuario->login();

			//Estos datos están en código duro mientras se realiza el modelo usuario
			$cedula   = $_POST['cedula'];
			$password = $_POST['password'];

			if($cedula == 20127909 && $password == 'hola'){

				$identity =[
					'nombre'   => "Andrew Duran",
					'cedula'   => 20127909,
					'compania' => "Seguros universitas",
					'correo'   => "azure_05@hotmail.com",
					'video'    => 'no',
					'rol'      => "paciente"
				];

				$_SESSION['identity'] = $identity;
				
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}

				header("Location:".base_url."paciente/Menuvideo");

			}else{
				$_SESSION['identity'] = 'failed';
				header("Location:".base_url);
			}
			
		}
	}

}
//Fin clase
?>
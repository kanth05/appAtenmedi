<?php

class loginDoctorController{

    public function inicio(){

        require_once ('./views/loginDoctor/login.php');

    }

    public function olvidoContraseña(){

        require_once ('./views/loginDoctor/forgot-password.php');

    }

    public function login(){

		if(isset($_POST)){
			// Identificar al doctor
			// Consulta a la base de datos

			//Cuando se tenga el modelo para consultar los datos del doctor, se crea un nuevo objeto doctor usando la clase Doctor y se usan los setters para envíar los datos que vienen del formulario.

			// $doctor = new Doctor();
			// doctor->setCedula($_POST['cedula']);
			// doctor->setPassword($_POST['password']);

			//Luego, se usa el metodo login de la clase usuario para validar si dichos datos existen en la bd
			// $identity = $doctor->login();

			//Estos datos están en código duro mientras se realiza el modelo usuario
			$cedula   = $_POST['cedula'];
			$password = $_POST['password'];

			if($cedula == 19712365 && $password == 'hola'){

				$identity =[
					'nombre'   => "Pedro Alcantara",
					'cedula'   => 19712365,
					'correo'   => 'pedro_alcantara@hmoservisalud.com',
                    'cargo'    => "Doctor",
					'status'   => "Conectado",
					'video'    => 'no',
					'rol'      => 'doctor'
				];

				$_SESSION['identityDoctor'] = $identity;
	
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}

				header("Location:".base_url."doctor/operaciones");

			}else{
				$_SESSION['identityDoctor'] = 'failed';
				header("Location:".base_url."loginDoctor/inicio");
			}
			
		}
	}

}
//Fin clase
?>
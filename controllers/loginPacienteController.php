<?php

require_once ('models/usuario.php');
require_once ('models/usrprod.php');

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
			}else{
				$longitudClave = strlen($password);

				if($longitudClave < 8 || $longitudClave > 12){
					$errores['errorClave'] = "La contraseña debe tener entre 8 a 12 caracteres.";
				}

				if(preg_match($espCaracteres, $password)){
					$errores['errorClave'] = "La contraseña no debe tener caracteres como: $%&_-:; .";
				}
			}

			//Si no existen errores en los campos, se procede a validar y registrar usuario
			if(count($errores) == 0){
				//Se valida si la cedula se encuentra registrada en la BD de la compania para dicho producto
				$usuario = new Usuario;
				$usuario->setCodCompania($tipoComp);
				$usuario->setNombre($nombre);
				$usuario->setCorreo($correo);
				$usuario->setCedula($cedula);
				$usuario->setPassword($password);

				$result = $usuario->validaProducto();
				$objeto = $result->fetch_object(); //Se extrae la información del objeto 
				$cod_producto = $objeto->cod_producto;

				if($objeto){
					//Si el usuario existe en la bd del proveedor, se procede con su registro
					$resultUsr = $usuario->registro();

					//Una vez registrado el usuario, se crea la relación entre su id y el producto que posee
					if($resultUsr){
						$usrProd = new UsrProd;
						$usrProd->setCodProducto($cod_producto);
						$usrProd->setIdusr($resultUsr);

						$resultProd = $usrProd->registro();

						if($resultProd){
							//Si ambos registros están bien, se procede a regresar a la pantalla de registro.
							$_SESSION['register'] = 'completed';
							header('Location:'.base_url.'loginPaciente/registro');					
						}else{
							//Si fallo el registro de producto, se emite el mensaje de error.
							$_SESSION['register'] = 'failed';
							$_SESSION['error']    = 'Falló el registro del producto en el sistema. Notificar al soporte de aplicaciones.';
							header('Location:'.base_url.'loginPaciente/registro');
						}
					}else{
						//Si falló el registro de usuario, se emite el mensaje de error.
						$_SESSION['register'] = 'failed';
						$_SESSION['error']    = 'Falló el registro del usuario en el sistema. Notificar al soporte de aplicaciones.';
						header('Location:'.base_url.'loginPaciente/registro');
					}		
				}else{
					//Se regresa a la pantalla notificando que el usuario no posee cedula en la bd del cliente
					$_SESSION['register'] = 'failed';
					$_SESSION['error']    = 'La cédula que colocó no posee un servicio contratado para usar la aplicación. Póngase en contacto con su prestador de servicio.';
					header('Location:'.base_url.'loginPaciente/registro');
				}
			}else{
				//El formulario posee algún campo vacío o con error.
				$_SESSION['error'] = $errores;
				header('Location:'.base_url.'loginPaciente/registro');
			}
		}else{
			//Error de datos envíados por post
			$_SESSION['register'] = 'failed';
			header('Location:'.base_url.'loginPaciente/registro');
		}
	}//Fin de la función

    public function inicioSesion(){

		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$cedula     = isset($_POST['cedula'])     ? $_POST['cedula']     : false;
			$password   = isset($_POST['password'])   ? $_POST['password']   : false;

			$usuario = new Usuario();
			$usuario->setCedula($cedula);
			$usuario->setPassword($password);
			$result = $usuario->login();	

			if($result){
				$operaciones = ['video' => 'no',
						        'chat' => 'no'];
				
				$_SESSION['identity'] = $result;
				$_SESSION['identityOp'] = $operaciones;
				// var_dump($_SESSION['identityOp']);
				// die();
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
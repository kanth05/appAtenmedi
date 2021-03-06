<?php

class Usuario{
	private $id;
	private $cod_rol;
	private $cod_compania;
	private $nombre;
	private $correo;
	private $cedula;
	private $password;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getCedula() {
		return $this->cedula;
	}

	function getCorreo() {
		return $this->correo;
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function getCodRol() {
		return $this->cod_rol;
	}

	function getCodCompania() {
		return $this->cod_compania;
	}

	function setId($id) {
		$this->id = $id;
	} 

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setCedula($cedula) {
		$this->cedula = $cedula;
	}

	function setCorreo($correo) {
		$this->correo = $this->db->real_escape_string($correo);
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function setCodRol($cod_rol) {
		$this->cod_rol = $this->db->real_escape_string($cod_rol);
	}

	function setCodCompania($cod_compania) {
		$this->cod_compania = $this->db->real_escape_string($cod_compania);
	}

	public function registro(){

		$result = false;

		//Sección de código que se usará únicamente para Mysql, al usar oracle, se manejará de forma diferente
		//Se consulta primero el último id generado en la tabla para generar uno nuevo

		$sql       = "SELECT MAX(idusr) as maxid FROM usuarios";
		$resultado = $this->db->query($sql);
		
		$sqIdusr = $resultado->fetch_object();
		$sqIdusr = (int)$sqIdusr->maxid;
		$sqIdusr++;

		$sql = "INSERT INTO usuarios VALUES(
			{$sqIdusr}, '02', '{$this->getCodCompania()}', '{$this->getNombre()}',
			'{$this->getCorreo()}', {$this->getCedula()}, '{$this->getPassword()}');";

		// var_dump($sql);
		// die();
		$save = $this->db->query($sql);

		if($save){
			//Regresamos el id que se usó para registrar al usuario para que sea usado en otro proceso
			$result = $sqIdusr;
		}
		return $result;
	}
	
	public function login(){

		$result   = false;
		$cedula   = (int)$this->cedula;
		$password = $this->password;
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE cedula = {$cedula}";
		$usuarios = $this->db->query($sql);
		if($usuarios && $usuarios->num_rows == 1){
			$usuario = $usuarios->fetch_object();
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->contrasena);
			if($verify){
				$result = $usuario;
			}
		}
		return $result;
	}

	public function validaProducto(){

		$result = false;
		$cedula = $this->cedula;
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios_producto WHERE cedula = $cedula";
		$result = $this->db->query($sql);
		//Si el usuario existe regresará un true, de lo contrario será un false
		return $result;
	}
	
	
	
}
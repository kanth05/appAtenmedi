<?php

class Medico{
	private $idmedi;
	private $idusr;
	private $stsmedi;
	private $turno;
	private $fec_ult_conec;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getIdmedi() {
		return $this->idmedi;
	}

	function getIdusr() {
		return $this->idusr;
	}

	function getStsmedi() {
		return $this->stsmedi;
	}

	function getTurno() {
		return $this->turno;
    }
    
    function getFec_ult_conec() {
		return $this->fec_ult_conec;
	}

	function setIdmedi($idmedi) {
		$this->idmedi = $idmedi;
	}

	function setIdusr($idusr) {
		$this->idusr = $idusr;
	}

	function setStsmedi($stsmedi) {
		$this->stsmedi = $stsmedi;
	}

	function setTurno($turno) {
		$this->turno = $turno;
    }

    function setFec_ult_conec($fec_ult_conec) {
		$this->fec_ult_conec = $fec_ult_conec;
	}

    public function buscaMedicoAct(){

		$sql    = "SELECT idmedi FROM medicos WHERE stsmedi = 'ACT'";
		$result = $this->db->query($sql);

		

	}

	public function registro(){

		$result = false;

		//Sección de código que se usará únicamente para Mysql, al usar oracle, se manejará de forma diferente
		//Se consulta primero el último id generado en la tabla para generar uno nuevo

		$sql       = "SELECT MAX(idusr) as maxid FROM usuarios";
		$resultado = $this->db->query($sql);
		
		$sqIdusr = $resultado->fetch_object();
		$sqIdusr = intval($sqIdusr->maxid);
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

		$result = false;
		$cedula = $this->cedula;
		$password = $this->password;
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
		$login = $this->db->query($sql);
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
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
<?php

require_once 'config/bd.php';

class Usuario{
	private $id;
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $bd;
	
	public function __construct() {
		$this->bd = Database::conectar();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellido() {
		return $this->apellido;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return password_hash($this->bd->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function getRol() {
		return $this->rol;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->bd->real_escape_string($nombre);
	}

	function setApellido($apellido) {
		$this->apellido = $this->bd->real_escape_string($apellido);
	}

	function setEmail($email) {
		$this->email = $this->bd->real_escape_string($email);
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function setRol($rol) {
		$this->rol = $rol;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function guardar(){
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getEmail()}', '{$this->getPassword()}', 'usuario', null);";
		$guardar = $this->bd->query($sql);
		
		$resultado = false;
		if($guardar){
			$resultado = true;
		}
		return $resultado;
	}
	
	
	
	
}
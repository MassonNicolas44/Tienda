<?php

require_once 'config/bd.php';

class Categoria
{
	private $id;
	private $nombre;
	private $bd;

    public function __construct()
	{
		$this->bd = Database::conectar();
	}

    function getId()
	{
		return $this->id;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->bd->real_escape_string($nombre);
	}

public function getCategorias(){
    $getCategorias=$this->bd->query("SELECT * FROM categorias ORDER BY id_Categoria desc");
    return $getCategorias;
}

public function guardar(){

	$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
	$guardar = $this->bd->query($sql);

	$resultado = false;
	if ($guardar) {
		$resultado = true;
	}
	return $resultado;
}

}
?>
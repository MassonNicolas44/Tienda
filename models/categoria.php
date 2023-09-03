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

	//Consulta para traer todas las categorias ordenas por el Id de manera descendiente

	public function getCategorias()
	{
		$getCategorias = $this->bd->query("SELECT * FROM categorias ORDER BY id_Categoria desc");
		return $getCategorias;
	}

	//Consulta para traer todos los datos de una categoria en particular

	public function getCategoria()
	{
		$getCategoria = $this->bd->query("SELECT * FROM categorias WHERE id_Categoria={$this->getId()}");
		return $getCategoria->fetch_object();
	}

	//Agregar 1 categoria a la Base de Datos

	public function guardar()
	{

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
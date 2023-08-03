<?php

require_once 'config/bd.php';

class Producto
{
	private $id_Producto;
	private $id_Categoria;
	private $nombre;
	private $descripcion;
	private $precio;
	private $stock;
	private $fecha;
	private $imagen;
	private $bd;

	public function __construct()
	{
		$this->bd = Database::conectar();
	}

	function getId_Producto()
	{
		return $this->id_Producto;
	}

	function getId_Categoria()
	{
		return $this->id_Categoria;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getDescripcion()
	{
		return $this->descripcion;
	}

	function getPrecio()
	{
		return $this->precio;
	}

	function getStock()
	{
		return $this->stock;
	}

	function getImagen()
	{
		return $this->imagen;
	}

	function setId_Producto($id_Producto)
	{
		$this->id_Producto = $id_Producto;
	}

	function setId_Categoria($id_Categoria)
	{
		$this->id_Categoria = $id_Categoria;
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->bd->real_escape_string($nombre);
	}

	function setDescripcion($descripcion)
	{
		$this->descripcion = $this->bd->real_escape_string($descripcion);
	}

	function setPrecio($precio)
	{
		$this->precio = $this->bd->real_escape_string($precio);
	}

	function setStock($stock)
	{
		$this->stock = $this->bd->real_escape_string($stock);
	}

	function setImagen($imagen)
	{
		$this->imagen = $imagen;
	}

	public function getProductos()
	{
		$getProductos = $this->bd->query("SELECT * FROM productos ORDER BY id_Producto desc");
		return $getProductos;
	}

	public function getAzar()
	{
		$getProducto = $this->bd->query("SELECT * FROM productos WHERE id_Producto={$this->getId_Producto()}");
		return $getProducto->fetch_object();
	}

	public function getProducto()
	{
		$getProducto = $this->bd->query("SELECT * FROM productos WHERE id_Producto={$this->getId_Producto()}");
		return $getProducto->fetch_object();
	}

	public function guardar()
	{

		$sql = "INSERT INTO productos VALUES(NULL, {$this->getId_Categoria()},'{$this->getNombre()}','{$this->getDescripcion()}','{$this->getPrecio()}','{$this->getStock()}',CURDATE(),'{$this->getImagen()}');";
		$guardar = $this->bd->query($sql);

		//Mostrar error
		//echo $sql;
		//echo $this->bd->error;
		//die();

		$resultado = false;
		if ($guardar) {
			$resultado = true;
		}
		return $resultado;
	}

	public function editar()
	{

		$sql = "UPDATE productos SET id_Categoria='{$this->getId_Categoria()}',nombre='{$this->getNombre()}',descripcion='{$this->getDescripcion()}',precio='{$this->getPrecio()}',stock='{$this->getStock()}' ";
		
		if($this->getImagen() != null){
			$sql .= ", imagen='{$this->getImagen()}'";
		}
		
		$sql .= " WHERE id={$this->id_Producto};";
		
		$editar = $this->bd->query($sql);

		//Mostrar error
		//echo $sql;
		//echo $this->bd->error;
		//die();

		$resultado = false;
		if ($editar) {
			$resultado = true;
		}
		return $resultado;
	}

	public function eliminar(){

		$sql = "DELETE FROM productos WHERE id_Producto={$this->id_Producto}";
		$eliminar = $this->bd->query($sql);

		$resultado = false;
		if ($eliminar) {
			$resultado = true;
		}
		return $resultado;
	}



}


?>
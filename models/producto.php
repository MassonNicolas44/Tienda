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

	//Consulta para traer todos los productos ordenados por Id de manera descendiente

	public function getProductos()
	{
		$getProductos = $this->bd->query("SELECT * FROM productos ORDER BY id_Producto desc");
		return $getProductos;
	}

	//Consulta para traer todos los productos de una categoria

	public function getProductosCategoria()
	{
		$getProductosCategoria = $this->bd->query("SELECT P.*,C.nombre as CategoriaNombre FROM productos as P INNER JOIN categorias as C ON C.id_Categoria=P.id_Categoria WHERE P.id_categoria={$this->getId_Categoria()} ORDER BY id_Producto desc");
		return $getProductosCategoria;
	}

	//Consulta para traer productos al azar

	public function getAzar($limite)
	{
		$getAzar = $this->bd->query("SELECT * FROM productos WHERE stock>0 ORDER BY RAND() LIMIT $limite");
		return $getAzar;
	}

	//Consulta para traer los datos de un producto seleccionado

	public function getProducto()
	{
		$getProducto = $this->bd->query("SELECT * FROM productos WHERE id_Producto={$this->getId_Producto()}");
		return $getProducto->fetch_object();
	}

	//Agregar un nuevo producto

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

	//Editar un producto seleccionado

	public function editar()
	{

		$sql = "UPDATE productos SET id_Categoria='{$this->getId_Categoria()}',nombre='{$this->getNombre()}',descripcion='{$this->getDescripcion()}',precio='{$this->getPrecio()}',stock='{$this->getStock()}' ";

		if ($this->getImagen() != null) {
			$sql .= ", imagen='{$this->getImagen()}'";
		}

		$sql .= " WHERE id_Producto={$this->id_Producto};";

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

	//Eliminar un producto eleccionado

	public function eliminar()
	{

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
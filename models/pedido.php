<?php

require_once 'config/bd.php';

class Pedido
{
	private $id_Pedido;
	private $id_Usuario;
	private $provincia;
	private $localidad;
	private $cp;
	private $direccion;
	private $costo;
	private $estado;
	private $fecha;
	private $hora;
	private $bd;

	public function __construct()
	{
		$this->bd = Database::conectar();
	}



	public function getId_Pedido()
	{
		return $this->id_Pedido;
	}

	public function setId_Pedido($id_Pedido)
	{
		$this->id_Pedido = $id_Pedido;

	}

	public function getId_Usuario()
	{
		return $this->id_Usuario;
	}


	public function setId_Usuario($id_Usuario)
	{
		$this->id_Usuario = $id_Usuario;

	}


	public function getProvincia()
	{
		return $this->provincia;
	}

	public function setProvincia($provincia)
	{
		$this->provincia = $this->bd->real_escape_string($provincia);

	}



	public function getLocalidad()
	{
		return $this->localidad;
	}

	public function setLocalidad($localidad)
	{
		$this->localidad = $this->bd->real_escape_string($localidad);

	}

	public function getCp()
	{
		return $this->cp;
	}

	public function setCp($cp)
	{
		$this->cp = $cp;

	}


	public function getDireccion()
	{
		return $this->direccion;
	}


	public function setDireccion($direccion)
	{
		$this->direccion = $this->bd->real_escape_string($direccion);


	}

	public function getCosto()
	{
		return $this->costo;
	}


	public function setCosto($costo)
	{
		$this->costo = $costo;

	}

	public function getEstado()
	{
		return $this->estado;
	}


	public function setEstado($estado)
	{
		$this->estado = $estado;

	}


	public function getFecha()
	{
		return $this->fecha;
	}


	public function setFecha($fecha)
	{
		$this->fecha = $fecha;

	}


	public function getHora()
	{
		return $this->hora;
	}


	public function setHora($hora)
	{
		$this->hora = $hora;

	}

	//Consulta para traer todos los pedidos y ordenarlos por Id de manera descendiente

	public function getPedidos()
	{
		$getPedidos = $this->bd->query("SELECT * FROM pedidos ORDER BY id_Pedido desc");
		return $getPedidos;
	}

	//Consulta para traer 1 pedido en particular

	public function getPedido()
	{
		$getPedido = $this->bd->query("SELECT * FROM pedidos WHERE id_Pedido={$this->getId_Pedido()}");
		return $getPedido->fetch_object();
	}

	//Consulta para traer el ultimo pedido de 1 usuario en particular

	public function getPedidoUsuario()
	{
		$getPedidoUsuario = $this->bd->query("SELECT P.Id_Pedido,P.Costo FROM pedidos AS P
		WHERE P.id_Usuario={$this->getId_Usuario()} ORDER BY Id_Pedido DESC LIMIT 1");

		return $getPedidoUsuario->fetch_object();
	}

	//Consulta para traer todos los pedidos de 1 usuario en particular

	public function getTodoPedidoUsuario()
	{
		$getTodoPedidoUsuario = $this->bd->query("SELECT P.* FROM pedidos AS P
		WHERE P.id_Usuario={$this->getId_Usuario()} ORDER BY Id_Pedido DESC");

		return $getTodoPedidoUsuario;
	}

	//Consulta para traer los productos de 1 pedido en particular

	public function getPedidoProductos($IdPedido)
	{
		$sql = "SELECT pr.*, pp.unidades FROM productos as pr INNER JOIN pedidos_productos as pp ON pr.id_Producto=pp.id_Producto where pp.id_Pedido={$IdPedido}";
		$getPedidoProductos = $this->bd->query($sql);

		return $getPedidoProductos;
	}

	//Agregar pedido a la Base de Datos

	public function guardar()
	{

		$sql = "INSERT INTO pedidos VALUES(NULL, {$this->getId_Usuario()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getCp()}','{$this->getDireccion()}','{$this->getCosto()}','Confirmado',CURDATE(),CURTIME());";
		$guardar = $this->bd->query($sql);

		$resultado = false;
		if ($guardar) {
			$resultado = true;
		}
		return $resultado;
	}


	//Agregar relacion entre Pedido-Producto a la Base de Datos

	public function guardar_Pedido_Producto()
	{
		//Retoma el ultimo ID insertado en la BD
		$sql = "SELECT LAST_INSERT_ID() AS 'UltimoIdPedido';";
		$query = $this->bd->query($sql);
		$pedido_id = $query->fetch_object()->UltimoIdPedido;

		//Recorrer la session donde esta guardado los productos con los datos de (Id y cantidad)
		//Inserta cada producto con sus cantidades respectivamente con el pedido a agregar

		foreach ($_SESSION['compra'] as $indice => $elemento) {

			$producto = $elemento['DatosProducto'];

			$insertar = "INSERT INTO pedidos_productos VALUES(NULL,{$pedido_id},{$producto->id_Producto},'{$_SESSION['compra'][$indice]['unidades']}')";

			$guardar = $this->bd->query($insertar);

		}

		$resultado = false;
		if ($guardar) {
			$resultado = true;
		}
		return $resultado;
	}

	//Actualizar stock al realizar o anular un pedido

	public function actualizarStock()
	{

		//Recorrer la session donde esta guardado los productos con los datos de (Id y cantidad)
		//Actualiza el stock de cada producto

		foreach ($_SESSION['compra'] as $indice => $elemento) {

			$actualizarStock = "UPDATE productos SET stock='{$_SESSION['compra'][$indice]['stock']}' WHERE Id_Producto={$_SESSION['compra'][$indice]['idProducto']} ";

			$actualizarStock = $this->bd->query($actualizarStock);

		}

		$resultado = false;
		if ($actualizarStock) {
			$resultado = true;
		}
		return $resultado;
	}

	//Actualiza el estado del pedido

	public function actualizarPedido()
	{
		$sql = "UPDATE pedidos SET estado='{$this->getEstado()}' WHERE Id_Pedido={$this->getId_Pedido()} ";

		$actualizarPedido = $this->bd->query($sql);

		//Mostrar error
		//echo $sql;
		//echo $this->bd->error;
		//die();

		$resultado = false;
		if ($actualizarPedido) {
			$resultado = true;
		}
		return $resultado;
	}

	//Devolucion de un pedido

	public function devolucionPedido()
	{

		//Recorrer la session donde esta guardado los productos a devolver a stock y actualiza los valores mismos

		foreach ($_SESSION['devolucion'] as $indice => $elemento) {

			$idProducto = $_SESSION['devolucion'][$indice]['idProducto'];
			$unidadesPedido = $_SESSION['devolucion'][$indice]['unidades'];
			$unidadeStockInicial = $_SESSION['devolucion'][$indice]['stock'];

			$unidadesStockFinal = $unidadesPedido + $unidadeStockInicial;

			$devolucionStock = "UPDATE productos SET stock='{$unidadesStockFinal}' WHERE Id_Producto={$idProducto} ";

			$devolucionStock = $this->bd->query($devolucionStock);

		}

		//Borra la session de los datos de productos a devolver

		unset($_SESSION['devolucion']);

		//Actualiza el estado del pedido

		$sql = "UPDATE pedidos SET estado='{$this->getEstado()}' WHERE Id_Pedido={$this->getId_Pedido()} ";

		$devolucionPedido = $this->bd->query($sql);

		$resultado = false;
		if ($devolucionPedido && $devolucionStock) {
			$resultado = true;
		}
		return $resultado;
	}

}
?>
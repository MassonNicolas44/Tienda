<?php
require_once 'models/pedido.php';

class pedidoController
{

    public function realizar()
    {
        require_once 'views/pedido/realizar.php';
    }

    //Funcion para insertar el pedido del usuario en la Base de Datos (Guardar datos de envio - Productos con Cantidades - Ajustar Stock de cada producto)

    public function agregar()
    {
        if (isset($_SESSION['identificacion'])) {
            $id_Usuario = $_SESSION['identificacion']->id_Usuario;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $cp = isset($_POST['cp']) ? $_POST['cp'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            if ($provincia && $localidad && $cp && $direccion) {
                $pedido = new Pedido();
                $pedido->setId_Usuario($id_Usuario);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setCp($cp);
                $pedido->setDireccion($direccion);
                $pedido->setCosto($_SESSION['PrecioTotal']);

                $guardar = $pedido->guardar();

                $guardarLinea = $pedido->guardar_Pedido_Producto();

                $actualizarStock = $pedido->actualizarStock();

                if ($guardar && $guardarLinea && $actualizarStock) {
                    $_SESSION['pedido'] = "Completado";
                    unset($_SESSION['compra']);
                } else {
                    $_SESSION['pedido'] = "Fallo";
                }

            } else {
                $_SESSION['pedido'] = "Fallo";
            }

            header("Location:" . base_url . '?controller=pedido&accion=confirmado');

        } else {
            header("Location:" . base_url);
        }

    }

    //Funcion para mostrar el pedido seleccionado por el usuario logeado

    public function confirmado()
    {

        if (isset($_SESSION['identificacion'])) {
            $identificacion = $_SESSION['identificacion'];
            $pedido = new Pedido();
            $pedido->setId_Usuario($identificacion->id_Usuario);

            $pedido = $pedido->getPedidoUsuario();

            $pedidoProductos = new Pedido();

            $Productos = $pedidoProductos->getPedidoProductos($pedido->Id_Pedido);

        }
        require_once 'views/pedido/confirmado.php';
    }

    //Trae todos los pedidos de la Base de Datos.
//Si es un administrador la persona logeada, se mostraran todos los pedidos de todos los usuarios
//Si es un usuario la persona logeada, se mostraran todos sus pedidos unicamente

    public function misPedidos()
    {

        if ($_SESSION['rol'] == "administrador") {
            utilidades::esAdministrador();
            $gestion = true;

            $pedido = new Pedido();
            $pedidos = $pedido->getPedidos();
        }

        if ($_SESSION['rol'] == "usuario") {
            utilidades::esUsuario();
            $gestion = false;
            $identificacion = $_SESSION['identificacion'];
            $pedido = new Pedido();
            $pedido->setId_Usuario($identificacion->id_Usuario);

            $pedidos = $pedido->getTodoPedidoUsuario();
        }

        require_once 'views/pedido/misPedidos.php';
    }

    //Trae desde la Base de Datos el pedido seleccionado junto a todos los productos dentro del mismo

    public function detallePedido()
    {

        utilidades::esUsuario();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            //Pedido
            $pedido = new Pedido();
            $pedido->setId_Pedido($id);
            $pedido = $pedido->getPedido();

            //Producto
            $pedidoProductos = new Pedido();
            $Productos = $pedidoProductos->getPedidoProductos($id);

            require_once 'views/pedido/detallePedido.php';

        } else {
            header("Location:" . base_url . '?controller=pedido&accion=misPedidos');
        }
    }

    //Cambia el estado del pedido seleccionado y lo guarda en la Base de Datos

    public function estadoPedido()
    {
        utilidades::esAdministrador();

        if (isset($_POST['Id_Pedido']) && isset($_POST['estadoPedido'])) {

            $id = $_POST['Id_Pedido'];
            $estado = $_POST['estadoPedido'];

            $pedido = new Pedido();
            $pedido->setId_Pedido($id);
            $pedido->setEstado($estado);

            //En caso del estado del pedido a cambiar sea "Devolucion Pedido", devuelve a cada producto las unidades del pedido

            if ($_POST['estadoPedido'] == "Devolucion Pedido") {

                $traerProductos = $pedido->getPedidoProductos($id);

                while ($producto = $traerProductos->fetch_object()) {
                    $_SESSION['devolucion'][] = array("idProducto" => $producto->id_Producto, "unidades" => $producto->unidades, "stock" => $producto->stock);
                }

                $pedido->devolucionPedido();
            } else {
                $pedido->actualizarPedido();
            }

            unset($_SESSION['devolucion']);

        }

        header("Location:" . base_url . '?controller=pedido&accion=misPedidos');

    }
}

?>
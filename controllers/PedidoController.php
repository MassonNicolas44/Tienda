<?php
require_once 'models/pedido.php';

class pedidoController
{

    public function realizar()
    {
        require_once 'views/pedido/realizar.php';
    }

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

                //$guardarLinea = $pedido->guardar_Pedido_Producto();

                if ($guardar) {
                    $_SESSION['pedido'] = "Completado";
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

    public function confirmado()
    {

        if (isset($_SESSION['identificacion'])) {
            $identificacion = $_SESSION['identificacion'];
            $pedido = new Pedido();
            $pedido->setId_Usuario($identificacion->id_Usuario);

            $pedido = $pedido->getPedidoUsuario();
            $pedidoProductos = new Pedido();

            var_dump($_GET['id']);

var_dump($pedido->Id_Pedido);
            
            $Productos = $pedidoProductos->getPedidoProductos($pedido->Id_Pedido);
        }
        require_once 'view/pedido/confirmado.php';
    }

    public function misPedidos()
    {

        utilidades::esAdministrador();

        $identificacion = $_SESSION['identificacion'];
        $pedido = new Pedido();
        $pedido->setId_Usuario($identificacion->id_Usuario);

        $pedidos = $pedido->getTodoPedidoUsuario();

        require_once 'views/pedido/misPedidos.php';
    }

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

            require_once 'view/pedido/detallePedido.php';

        } else {
            header("Location:" . base_url . '?controller=pedido&accion=misPedidos');
        }
    }

    public function gestionPedidos()
    {
        utilidades::esAdministrador();
        $gestion = true;

        $pedido = new Pedido();
        $todosPedidos = $pedido->getPedidos();

        header("Location:" . base_url . '?controller=pedido&accion=misPedidos');
    }

    public function estadoPedido()
    {
        utilidades::esAdministrador();

        if (isset($_POST['Id_Pedido']) && isset($_POST['estadoPedido'])) {

            $id=$_POST['Id_Pedido'];
            $estado=$_POST['estadoPedido'];

            $pedido=new Pedido();
            $pedido->setId_Pedido($id);
            $pedido->setEstado($estado);
            $pedido->actualizarPedido();

            header("Location:" . base_url . '?controller=pedido&accion=detallePedido&id='.$id);
        } else {
            header("Location:" . base_url . '?controller=pedido&accion=misPedidos');
        }

    }
}

?>
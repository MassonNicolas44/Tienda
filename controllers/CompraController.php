<?php
require_once 'models/producto.php';
class compraController
{

//Añade al array "Compra" todos los productos del pedido actual

    public function index()
    {
        if (isset($_SESSION['compra']) && count($_SESSION['compra']) >= 1) {
            $compra = $_SESSION['compra'];
        } else {
            $compra = array();
        }

        require_once 'views/compra/index.php';
    }

    //Añadir o aumentar la cantidad del producto a sumar al pedido

    public function añadir()
    {
        if (isset($_GET['id'])) {
            $idProducto = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        //En caso que el producto ya exista en el pedido, aumenta en 1 la cantidad del producto mismo

        if (isset($_SESSION['compra'])) {

            $contador = 0;
            foreach ($_SESSION['compra'] as $indice => $elemento) {
                if ($elemento['idProducto'] == $idProducto) {
                    $_SESSION['compra'][$indice]['unidades']++;
                    $contador++;
                }
            }

        }

        //Caso contrario, agrega el producto al pedido
        if (!isset($contador) || $contador == 0) {

            $producto = new Producto();
            $producto->setId_Producto($idProducto);
            $producto = $producto->getProducto();

            if (is_object($producto)) {
                $_SESSION['compra'][] = array("idProducto" => $producto->id_Producto, "precio" => $producto->precio, "unidades" => 1, "DatosProducto" => $producto);
            }

        }

        header("Location:" . base_url . '?controller=compra&accion=index');

    }

    //Aumenta las cantidades del producto seleccionado

    public function aumentar()
    {

        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['compra'][$index]['unidades']++;

            header("Location:" . base_url . '?controller=compra&accion=index');
        }

    }

    //Disminuye las cantidades del producto seleccionado

    public function disminuir()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['compra'][$index]['unidades']--;

            if ($_SESSION['compra'][$index]['unidades'] == 0) {
                unset($_SESSION['compra'][$index]);
            }

            header("Location:" . base_url . '?controller=compra&accion=index');
        }

    }

    //Elimina el producto seleccionado en proceso de pedido

    public function modificar()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['compra'][$index]);
            header("Location:" . base_url . '?controller=compra&accion=index');
        }

    }

    //Elimina todo el pedido en proceso

    public function eliminar()
    {
        unset($_SESSION['compra']);
        header("Location:" . base_url . '?controller=compra&accion=index');
    }

}

?>
<?php
require_once 'models/producto.php';
class compraController
{

    public function index()
    {
        if (isset($_SESSION['compra']) && count($_SESSION['compra']) >= 1) {
            $compra = $_SESSION['compra'];
        } else {
            $compra = array();
        }

        require_once 'views/compra/index.php';
    }

    public function añadir()
    {
        if (isset($_GET['id'])) {
            $idProducto = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        if (isset($_SESSION['compra'])) {

            $contador = 0;
            foreach ($_SESSION['compra'] as $indice => $elemento) {
                if ($elemento['idProducto'] == $idProducto) {
                    $_SESSION['compra'][$indice]['unidades']++;
                    $contador++;
                }
            }

        }

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

    public function aumentar()
    {

        if(isset($_GET['index'])){
            $index=$_GET['index'];
            $_SESSION['compra'][$index]['unidades']++;

            header("Location:" . base_url . '?controller=compra&accion=index');
        }

    }
    public function disminuir()
    {
        if(isset($_GET['index'])){
            $index=$_GET['index'];
            $_SESSION['compra'][$index]['unidades']--;

            if ($_SESSION['compra'][$index]['unidades']==0){
                unset($_SESSION['compra'][$index]);
            }

            header("Location:" . base_url . '?controller=compra&accion=index');
        }

    }

    public function modificar()
    {
        if(isset($_GET['index'])){
            $index=$_GET['index'];
            unset($_SESSION['compra'][$index]);
            header("Location:" . base_url . '?controller=compra&accion=index');
        }

    }

    public function eliminar()
    {
        unset($_SESSION['compra']);
        header("Location:" . base_url . '?controller=compra&accion=index');
    }

}

?>
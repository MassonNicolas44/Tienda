<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';
require_once 'helper/utilidades.php';

class categoriaController
{

    public function index()
    {
        utilidades::esAdministrador();
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();
        require_once 'views/categoria/index.php';
    }

    public function ver()
    {

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            //Conseguir la categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getCategoria();

            //Conseguir los productos
            $producto = new Producto();
            $producto->setId_Categoria($id);
            $productos = $producto->getProductosCategoria();




        }

        require_once 'views/categoria/ver.php';
    }

    public function crear()
    {
        utilidades::esAdministrador();
        require_once 'views/categoria/crear.php';
    }

    public function guardar()
    {
        utilidades::esAdministrador();

        if ((isset($_POST)) && (isset($_POST['nombre']))) {


            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $guardar = $categoria->guardar();
        }
        header("Location:" . base_url . '?controller=categoria&accion=index');

    }

}

?>
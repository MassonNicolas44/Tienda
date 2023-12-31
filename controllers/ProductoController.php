<?php

require_once 'models/producto.php';

class productoController
{

    //Guarda en una variable 6 productos, seleccionados al azar desde la Base de Datos

    public function index()
    {

        $producto = new Producto;
        $productosAzar = $producto->getAzar(6);

        require_once 'views/producto/destacados.php';
    }

    //Recoge los datos de todos los productos de la Base de Datos

    public function gestion()
    {
        utilidades::esAdministrador();

        $producto = new Producto();
        $productos = $producto->getProductos();

        require_once 'views/producto/gestion.php';
    }

    //Pagina donde se crea un nuevo producto

    public function crear()
    {
        utilidades::esAdministrador();
        require_once 'views/producto/crear.php';
    }

    //Recoge los datos del Producto seleccionado desde la Base de Datos

    public function ver()
    {
        utilidades::esAdministrador();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId_Producto($id);
            $traerProducto = $producto->getProducto();
        }
        require_once 'views/producto/ver.php';
    }

    //Funcion para guardar el producto en cuestion

    public function guardar()
    {
        utilidades::esAdministrador();

        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($_POST['nombre']);
                $producto->setDescripcion($_POST['descripcion']);
                $producto->setPrecio($_POST['precio']);
                $producto->setStock($_POST['stock']);
                $producto->setId_Categoria($_POST['categoria']);

                //Guardar imagen
                if (isset($_FILES['imagen'])) {
                    $archivoImagen = $_FILES['imagen'];
                    $nombreArchivo = $archivoImagen['name'];
                    $tipoArchivo = $archivoImagen['type'];

                    if ($tipoArchivo == "image/jpg" || "image/jpeg" || "image/png" || "image/gif") {
                        //Si no existe el directorio, lo crea
                        if (!is_dir('uploads/imagenes')) {
                            mkdir('uploads/imagenes', 0777, true);
                        }
                        $producto->setImagen($nombreArchivo);
                        move_uploaded_file($archivoImagen['tmp_name'], 'uploads/imagenes/' . $nombreArchivo);

                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId_Producto($id);
                    $guardar = $producto->editar();
                } else {
                    $guardar = $producto->guardar();
                }

            } else {
                $_SESSION['guardarProducto'] = "fallo";
            }
        } else {
            $_SESSION['guardarProducto'] = "fallo";
        }


        header("Location:" . base_url . '?controller=producto&accion=gestion');

    }

    //Funcion para editar el producto seleccionado

    public function editar()
    {
        utilidades::esAdministrador();

        if (isset($_GET['id'])) {
            $editarProducto = true;

            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId_Producto($id);
            $traerProducto = $producto->getProducto();


            require_once 'views/producto/crear.php';

        } else {
            header("Location:" . base_url . '?controller=producto&accion=gestion');
        }

    }

    //Funcion para eliminar el producto seleccionado

    public function eliminar()
    {
        utilidades::esAdministrador();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId_Producto($id);
            $eliminar = $producto->eliminar();

            if ($eliminar) {
                $_SESSION['eliminarProducto'] = 'completo';
            } else {
                $_SESSION['eliminarProducto'] = 'fallo';
            }
        } else {
            $_SESSION['eliminarProducto'] = 'fallo';
        }
        header("Location:" . base_url . '?controller=producto&accion=gestion');
    }

}

?>
<?php

require_once 'models/categoria.php';
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

    public function crear()
    {
        utilidades::esAdministrador();
        require_once 'views/categoria/crear.php';
    }

    public function guardar()
    {
        utilidades::esAdministrador();

        if ((isset($_POST)) && (isset($_POST['nombre']))) {
  

        $categoria=new Categoria();
        $categoria->setNombre($_POST['nombre']);
        $guardar=$categoria->guardar();
        }
        header("Location:". base_url . '?controller=categoria&accion=index');

    }

}

?>
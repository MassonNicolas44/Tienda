<?php

session_start();
//Acceso a todos los controladores
require_once 'autoload.php';
require_once 'config/parametros.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

//Mostrar error (Funcion)
function mostrarError()
{
    $error = new errorController();
    $error->index();
}

//Comprobacion si llega el controlador por la url
if (isset($_GET['controller'])) {
    //se genera la variable en caso que si llega
    $nom_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['accion'])) {
    $nom_controlador = controlador_base;
} else {
    mostrarError();
    exit();
}


//Comprobacion si existe el controlador y si existe la clase
if (class_exists($nom_controlador)) {
    //Si existe la clase se crea el objeto
    $controlador = new $nom_controlador();

    //Comprobacion si llega la accion y si existe el metodo dentro del controlador
    if (isset($_GET['accion']) && method_exists($controlador, $_GET['accion'])) {
        //Se invoca el metodo
        $accion = $_GET['accion'];
        $controlador->$accion();
    } elseif (!isset($_GET['controller']) && !isset($_GET['accion'])) {
        $accionBase = accion_base;
        $controlador->$accionBase();
    } else {
        mostrarError();
    }
} else {
    mostrarError();
}


require_once 'views/layout/footer.php';
?>
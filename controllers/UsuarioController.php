<?php
require_once 'models/usuario.php';

class usuarioController
{

	public function index()
	{
		echo "Controlador Usuarios, Accion index";
	}

	public function registrar()
	{
		require_once 'views/usuario/registrar.php';
	}

	public function guardar()
	{

		if (isset($_POST)) {



			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$rol = isset($_POST['rol']) ? $_POST['rol'] : false;

			if ($nombre && $apellido && $email && $password) {
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellido($apellido);
				$usuario->setEmail($email);
				$usuario->setPassword($password);
				$usuario->setRol($rol);
				$guardar = $usuario->guardar();
				if ($guardar) {
					$_SESSION['registrar'] = "completo";
				} else {
					$_SESSION['registrar'] = "fallo";
				}
			} else {
				$_SESSION['registrar'] = "fallo";
			}
		} else {
			$_SESSION['registrar'] = "fallo";
		}

		header("Location:" . base_url . '?controller=usuario&accion=registrar');

	}
	public function login()
	{

		if (isset($_POST)) {


			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);
			$identificacion = $usuario->login();


			if ($identificacion==true && is_object($identificacion)) {
				$_SESSION['identificacion'] = $identificacion;


				if ($identificacion->rol == "administrador") {
					$_SESSION['rol'] = "administrador";
	
				} elseif ($identificacion->rol == "usuario") {
					$_SESSION['rol'] = "usuario";
				
				}

			} else {
				$_SESSION['error_login'] = "Identificacion fallida";
			}


			header("Location:" .base_url);
		}

	}


	
	public function cerrarSession(){
		//Borrar identificacion, siempre que exista

			unset($_SESSION['identificacion']);

			//Borrar rol usuario, siempre que exista

			unset($_SESSION['rol']);

		header("Location:" . base_url);

	}


}

?>
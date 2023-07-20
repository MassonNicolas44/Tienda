<?php
require_once 'models/usuario.php';

class usuarioController{

    public function index(){
        echo "Controlador Usuarios, Accion index";
    }

    public function registrar(){
        require_once 'views/usuario/registrar.php';
    }

    public function guardar(){

        if(isset($_POST)){



            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;

			if($nombre && $apellido && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellido($apellido);
				$usuario->setEmail($email);
				$usuario->setPassword($password);
				$guardar = $usuario->guardar();
				if($guardar){
					$_SESSION['registrar'] = "completo";
				}else{
					$_SESSION['registrar'] = "fallo";
				}
			}else{
				$_SESSION['registrar'] = "fallo";
			}
		}else{
			$_SESSION['registrar'] = "fallo";
		}
        var_dump($_SESSION['registrar']);

		header("Location:".base_url.'?controller=usuario&accion=registrar');
        
    }
}

?>
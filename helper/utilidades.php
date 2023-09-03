<?php

class utilidades
{

	//Borrar Session
	public static function borrarSession($nombre)
	{
		if (isset($_SESSION[$nombre])) {
			$_SESSION[$nombre] = null;
			unset($_SESSION[$nombre]);
		}

		return $nombre;
	}

	//Verificacion de administrador

	public static function esAdministrador()
	{
		if (!isset($_SESSION['rol'])) {
			header("Location:" . base_url);
		} else {
			return true;
		}
	}

	//Verificacion de usuario

	public static function esUsuario()
	{
		if (!isset($_SESSION['rol'])) {
			header("Location:" . base_url);
		} else {
			return true;
		}
	}

	//Mostrar las categorias en la aprte superior de la pagina

	public static function mostrarCategorias()
	{

		require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->getCategorias();
		return $categorias;
	}

}
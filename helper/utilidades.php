<?php

class utilidades
{

	public static function borrarSession($nombre)
	{
		if (isset($_SESSION[$nombre])) {
			$_SESSION[$nombre] = null;
			unset($_SESSION[$nombre]);
		}

		return $nombre;
	}

	public static function esAdministrador()
	{
		if (!isset($_SESSION['rol'])) {
			header("Location:" . base_url . "?controller=categoria&accion=crear");
		} else {
			return true;
		}
	}

	public static function mostrarCategorias()
	{

		require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->getCategorias();
		return $categorias;
	}

}
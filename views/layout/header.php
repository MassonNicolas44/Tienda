<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Tienda</title>
    <link rel="stylesheet" href="<?= base_url ?>css/styles.css" />
</head>

<body>
    <div id="contenedor">
        <!-- CABECERA -->
        <header id="header">
            <div id="imagen">
                <img src="<?= base_url ?>img/tienda.jpg" alt="Imagen Tienda">
                <a href="index.php">Tienda</a>
            </div>

        </header>
        <!-- MENU -->

        <?php
        require_once 'helper/utilidades.php';

        $categorias = utilidades::mostrarCategorias(); ?>

        <nav id="menu">

            <ul>
                <li>
                    <a href="<?= base_url ?>index.php">Inicio</a>
                </li>

                <?php while ($cate = $categorias->fetch_object()): ?>

                    <li>
                        <a href="<?= base_url ?>?controller=categoria&accion=ver&id=<?=$cate->id_Categoria?>"><?= $cate->nombre ?></a>
                    </li>

                <?php endwhile; ?>


            </ul>

        </nav>
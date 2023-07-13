<!DOCTYPE HTML>

<html lang="es">

<head>
    <meta carset="utf-8" />

    <title>Tienda</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
<div id="contenedor">

    <!-- CABECERA -->

    <header id="header">
        <div id="imagen">
            <img src="img/tienda.jpg" alt="Imagen Tienda" width="160" alt="">
            <a href="index.php">Tienda</a>
        </div>

    </header>
    <!-- MENU -->

    <nav id="menu">

        <ul>
            <li>
                <a href="a">Inicio</a>
            </li>

            <li>
                <a href="a">Categoria 1</a>
            </li>

            <li>
                <a href="a">Categoria 2</a>
            </li>

        </ul>

    </nav>

    <!-- BARRA LATERAL -->

    <div>

        <div class="block_aside">
            <form action="" method="post">

                <label>Email</label>
                <input type="email" name="email"></input>

                <label>Contraseña</label>
                <input type="password" name="password"></input>

                <input type="submit" value="Enviar"></input>

            </form>

            <a href="Pedidos.php">Pedidos</a>
            <a href="GestionPedidos.php">Gestion Pedidos</a>
            <a href="GestionCategorias.php">Gestion Categorias</a>

        </div>
        <!-- CONTENIDO PRINCIPAL -->

        <div>

            <div class="product">

                <img src="img/tienda.jpg" alt="Imagen Tienda" width="160" alt="">
                <h2>Mueble</h2>
                <p>$10.000</p>
                <a href="index.php">Mueble</a>

            </div>

            <div class="product">

                <img src="img/tienda.jpg" alt="Imagen Tienda" width="160" alt="">
                <h2>Sillon</h2>
                <p>$5.000</p>
                <a href="index.php">Sillon</a>

            </div>

            <div class="product">

                <img src="img/tienda.jpg" alt="Imagen Tienda" width="160" alt="">
                <h2>Silla</h2>
                <p>$2.000</p>
                <a href="index.php">Silla</a>

            </div>

            <div class="product">

                <img src="img/tienda.jpg" alt="Imagen Tienda" width="160" alt="">
                <h2>Mesa</h2>
                <p>$1.000</p>
                <a href="index.php">Mesa</a>

            </div>
        </div>

        <!-- PIE DE PAGINA -->

        <footer>

            <p>Desarrolado por Nicolas Masson &copy
                <?php echo date('Y') ?>
            </p>

        </footer>
</div>
</body>

</hmtl>
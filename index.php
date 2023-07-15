<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
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
                    <a href="#">Inicio</a>
                </li>

                <li>
                    <a href="#">Categoria 1</a>
                </li>

                <li>
                    <a href="#">Categoria 2</a>
                </li>

            </ul>

        </nav>

        <!-- BARRA LATERAL -->


        <div id="contenido">
            <aside id="barra">
                <div id="login" class="block_aside">
                    <h3>Entrar en la Web</h3>
                    <form action="#" method="post">

                        <label>Email</label>
                        <input type="email" name="email"></input>

                        <label>Contraseña</label>
                        <input type="password" name="password"></input>

                        <input type="submit" value="Enviar"></input>

                    </form>
                    <ul>
                        <li><a href="#">Pedidos</a></li>
                        <li><a href="#">Gestion Pedidos</a></li>
                        <li><a href="#">Gestion Categorias</a></li>
                    </ul>
                </div>
            </aside>


            <!-- CONTENIDO PRINCIPAL -->

            <div id="central">
            <h1>Productos Destacados</h1>
                <div class="product">
                    <img src="img/tienda.jpg" alt="Imagen Tienda">
                    <h2>Mueble</h2>
                    <p>$10.000</p>
                    <a href="index.php" class="button" >Mueble</a>

                </div>

                <div class="product">

                    <img src="img/tienda.jpg" alt="Imagen Tienda">
                    <h2>Sillon</h2>
                    <p>$5.000</p>
                    <a href="index.php" class="button" >Sillon</a>

                </div>

                <div class="product">

                    <img src="img/tienda.jpg" alt="Imagen Tienda">
                    <h2>Silla</h2>
                    <p>$2.000</p>
                    <a href="index.php" class="button" >Silla</a>

                </div>

                <div class="product">

                    <img src="img/tienda.jpg" alt="Imagen Tienda">
                    <h2>Mesa</h2>
                    <p>$1.000</p>
                    <a href="index.php" class="button" >Mesa</a>

                </div>
            </div>
        </div>
        <!-- PIE DE PAGINA -->

        <footer id="footer">

            <p>Desarrolado por Nicolas Masson &copy
                <?php echo date('Y') ?>
            </p>

        </footer>
    </div>
</body>

</hmtl>
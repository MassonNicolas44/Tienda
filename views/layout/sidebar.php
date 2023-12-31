<!-- BARRA LATERAL -->


<div id="contenido">
    <aside id="barra">

        <?php if ((isset($_SESSION['rol'])) && $_SESSION['rol'] == "usuario") { ?>

            <div id="compra" class="block_aside">

                <h3>Lista de Compra</h3>
                <ul>
                    <li><a href="<?= base_url ?>?controller=compra&accion=index">Ver Compras</a></li>
                </ul>

            </div>

        <?php }
        ; ?>
        <div id="login" class="block_aside">

            <?php

            if (!isset($_SESSION['identificacion'])) { ?>

                <h3>Entrar en la Web</h3>
                <form action="<?= base_url ?>?controller=usuario&accion=login" method="post">

                    <label>Email</label>
                    <input type="email" name="email"></input>

                    <label>Contraseña</label>
                    <input type="password" name="password"></input>

                    <input type="submit" value="Enviar"></input>

                </form>

            <?php } else { ?>


                <h3>
                    <?php
                    //Muestra el nombre y apellido de la persona logeada (Sea usuario o administrador)
                    echo $_SESSION['identificacion']->nombre . " " . $_SESSION['identificacion']->apellido ?>
                </h3>

            <?php }
            ; ?>


            <ul>
                <?php

                if (isset($_SESSION['rol'])) {
                    //Dependiendo si es Administrador o Usuario, mostrara distintas opciones a seleccionar
                    if ($_SESSION['rol'] == "administrador") { ?>

                        <li><a href="<?= base_url ?>?controller=categoria&accion=index">Gestionar categorias</a></li>
                        <li><a href="<?= base_url ?>?controller=producto&accion=gestion">Gestionar productos</a></li>
                        <li><a href="<?= base_url ?>?controller=pedido&accion=misPedidos">Gestionar pedidos</a></li>
                        <li><a href="<?= base_url ?>?controller=usuario&accion=cerrarSession">Cerrar Session</a></li>

                    <?php }
                    if ($_SESSION['rol'] == "usuario") { ?>

                        <li><a href="<?= base_url ?>?controller=pedido&accion=misPedidos">Mis pedidos</a></li>
                        <li><a href="<?= base_url ?>?controller=usuario&accion=cerrarSession">Cerrar Session</a></li>

                    <?php }
                } else { ?>

                    <li><a href="<?= base_url ?>?controller=usuario&accion=registrar">Registrate aqui</a></li>

                <?php } ?>

            </ul>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->

    <div id="central">
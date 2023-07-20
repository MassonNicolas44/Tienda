<!-- BARRA LATERAL -->


<div id="contenido">
    <aside id="barra">
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
                    <?php echo $_SESSION['identificacion']->nombre . " " . $_SESSION['identificacion']->apellido . " " . $_SESSION['rol'] ?>
                </h3>

            <?php }
            ; ?>


            <ul>
                <?php

                if (isset($_SESSION['rol'])) { 
                    if ($_SESSION['rol'] == "administrador"){ ?>

                    <li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
                    <li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
                    <li><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
                    <li><a href="<?= base_url ?>?controller=usuario&accion=cerrarSession">Cerrar Session</a></li>

                <?php } elseif ($_SESSION['rol'] == "usuario") { ?>   
                    
                    <li><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li> 
                    <li><a href="<?= base_url ?>?controller=usuario&accion=cerrarSession">Cerrar Session</a></li>  

                <?php }  } else{ ?>
    
                    <li><a href="<?= base_url ?>?controller=usuario&accion=registrar">Registrate aqui</a></li>

                <?php } ?>
                
            </ul>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->

    <div id="central">
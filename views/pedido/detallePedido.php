<h1>Detalle de Pedido</h1>

<?php if (isset($pedido)) { ?>

    <?php if ($_SESSION['rol'] == "administrador") { ?>
        <h3>Cambiar estado de Pedido</h3>

        <form action="<?= base_url ?>?controller=pedido&accion=estadoPedido" method="POST">
            <input type="hidden" value="<?= $pedido->id_Pedido ?>" name="Id_Pedido">
            <select name="estadoPedido">


                <?php if ($pedido->estado == "Devolucion Pedido") {
                    ?>

                    <option value="Devolucion Pedido" <?= $pedido->estado == "Devolucion Pedido" ? 'selected' : '' ?> disabled>
                        Devolucion Pedido
                    </option>

                    <?php
                } else {
                    ?>

                    <option value="Confirmado" <?= $pedido->estado == "Confirmado" ? 'selected' : '' ?>>Confirmado</option>
                    <option value="En preparacion" <?= $pedido->estado == "En preparacion" ? 'selected' : '' ?>>En preparacion</option>
                    <option value="Listo para enviar" <?= $pedido->estado == "Listo para enviar" ? 'selected' : '' ?>>Listo para enviar</option>
                    <option value="Enviado" <?= $pedido->estado == "Enviado" ? 'selected' : '' ?>>Enviado</option>
                    <option value="" <?= $pedido->estado == "" ? 'selected' : '' ?> disabled>
                        ------------------------------------------------</option>
                    <option value="Devolucion Pedido" <?= $pedido->estado == "Devolucion Pedido" ? 'selected' : '' ?>>Devolucion Pedido
                    </option>

                    <?php

                }
                ;
                ?>

            </select>
            <input type="submit" <?php if ($pedido->estado == "Devolucion Pedido") {?> disabled <?php
            } else { } ?> enabled
                value="Cambiar estado pedido" />
        </form>
    <?php }
    ; ?>
    </br>
    <h3>Datos de Envio</h3>
    </br>
    <em><u>Provincia:</u></em>
    <?= $pedido->provincia ?> </br>
    <em><u>Localidad:</u></em>
    <?= $pedido->localidad ?> </br>
    <em><u>Direccion:</u></em>
    <?= $pedido->direccion ?> </br>
    <em><u>Codigo Postal:</u></em>
    <?= $pedido->cp ?> </br>
    </br>
    <h3>Datos de Pedido:</h3>
    </br>
    <em><u>Estado:</u></em>
    <?= $pedido->estado ?>
    </br>
    <em><u> Numero Pedido:</u></em>
    <?= $pedido->id_Pedido ?> <br />
    <em><u>Total a Pagar:</u></em>
    <?= $pedido->costo ?> $ <br />
    <u><em> Productos:</u></em>
    </br> </br>
    <?php while ($producto = $Productos->fetch_object()) {
        ?>
        <ul>
            <li>
                <b>Nombre:</b>
                <?= $producto->nombre ?> ----
                <b>Precio:</b>
                <?= $producto->precio ?> $ ----
                <b>Cantidad:</b>
                <?= $producto->unidades ?>
            </li>
        </ul>

    <?php }
    ;
}
; ?>
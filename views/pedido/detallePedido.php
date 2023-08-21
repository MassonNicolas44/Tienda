<h1>Detalle de Pedido</h1>

<?php if (isset($pedido)) { ?>


    <?php if ($_SESSION['rol'] == "administrador") { ?>
        <h3>Cambiar estado de Pedido</h3>

        <form action="<?= base_url ?>?controller=pedido&accion=estado" method="POST">
            <input type="hidden" value="<?= $pedido->id_Pedido ?>" name="Id_Pedido">
            <select name="estadoPedido">
                <option value="Confirmado" <?= $pedido->estado == "Confirmado" ? 'selected' : '' ?>>Pendiente</option>
                <option value="Preparacion" <?= $pedido->estado == "Preparacion" ? 'selected' : '' ?>>En preparacion</option>
                <option value="Listo" <?= $pedido->estado == "Listo" ? 'selected' : '' ?>>Listo para enviar</option>
                <option value="Enviado" <?= $pedido->estado == "Enviado" ? 'selected' : '' ?>>Enviado</option>

            </select>
            <input type="submit" value="Cambiar estado pedido" />
        </form>
    <?php }
    ; ?>

    <h3>Datos de Envio</h3>

    Provincia:
    <?= $pedido->provincia ?> </br>
    Localidad:
    <?= $pedido->localidad ?> </br>
    Codigo Postal:
    <?= $pedido->cp ?> </br>
    Direccion:
    <?= $pedido->direccion ?> </br>

    <h3>Datos de Pedido:</h3>
    Estado:<?= $pedido->estado ?>
    Numero Pedido:
    <?= $pedido->id_Pedido ?> <br />
    Total a Pagar:
    <?= $pedido->costo ?> $ <br />
    Productos:

    <?php while ($producto = $Productos->fetch_object()) {
        ?>
        <ul>
            <li>
                <?= $producto->nombre ?> //
                <?= $producto->costo ?> //
                <?= $producto->unidades ?>
            </li>
        </ul>

    <?php }
    ;
}
; ?>
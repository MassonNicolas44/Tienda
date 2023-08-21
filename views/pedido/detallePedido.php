<h1>Detalle de Pedido</h1>

<?php if (isset($pedido)) { ?>

    <?php if ($_SESSION['rol'] == "administrador") { ?>
        <h3>Cambiar estado de Pedido</h3>

        <form action="<?= base_url ?>?controller=pedido&accion=estadoPedido" method="POST">
            <input type="hidden" value="<?= $pedido->id_Pedido ?>" name="Id_Pedido">
            <select name="estadoPedido">
                <option value="Confirmado" <?= $pedido->estado == "Confirmado" ? 'selected' : '' ?>>Confirmado</option>
                <option value="Preparacion" <?= $pedido->estado == "Preparacion" ? 'selected' : '' ?>>En preparacion</option>
                <option value="Listo" <?= $pedido->estado == "Listo" ? 'selected' : '' ?>>Listo para enviar</option>
                <option value="Enviado" <?= $pedido->estado == "Enviado" ? 'selected' : '' ?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado pedido" />
        </form>
    <?php }
    ; ?>

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
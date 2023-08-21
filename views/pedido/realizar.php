<?php if (isset($_SESSION['identificacion'])) { ?>

    <h1>Realizar Pedido</h1>

    <a href="<?= base_url ?>?controller=compra&accion=index">Ver Productos del Pedido</a>
    </br>
    <h3>Direccion para envio del Pedido:</h3>
    </br>
    <form action="<?= base_url ?>?controller=pedido&accion=agregar" method="POST">

        <label>Provincia</label>
        <input type="text" name="provincia" required />

        <label>Localidad</label>
        <input type="text" name="localidad" required />

        <label>Codigo Postal</label>
        <input type="text" name="cp" required />

        <label>Direccion</label>
        <input type="text" name="direccion" required />

        <input type="submit" value="Finalizar Pedido"/>

</form>

<?php } else { ?>
    <h1>Necesita estar Identificado para poder finalizar tu pedido</h1>
<?php }
; ?>
<?php if (isset($gestion)) { ?>
    <h1>Gestion Pedidos</h1>
<?php } else { ?>
    <h1>Mis Pedidos</h1>
<?php }
; ?>
<table>
    <tr>
        <th>Numero de Pedido</th>
        <th>Costo Total</th>
        <th>Fecha</th>
        <th>Estado Pedido</th>
    </tr>

    <?php
    $_SESSION['PrecioTotal'] = 0;
    $PrecioTotal = 0;
    foreach ($_SESSION['compra'] as $producto):

        $PrecioTotal += $producto['precio'] * $producto['cantidad'];

    endforeach;

    $_SESSION['PrecioTotal'] = $PrecioTotal;
    ?>

    <?php while ($ped = $todosPedidos->fetch_object()) { ?>


        <tr>

            <td>
                <a href="<?= base_url ?>?controller=pedido&accion=detallePedido&id=<?= $ped->id_Pedido ?>"><?= $ped->id_Pedido ?></a>
            </td>

            <td>
                <?= $_SESSION['PrecioTotal'] ?>$
            </td>
            <td>
                <?= $ped->fecha ?>
            </td>
            <td>
                <?= $ped->estado ?>
            </td>


        </tr>

    <?php }
    ; ?>
</table>
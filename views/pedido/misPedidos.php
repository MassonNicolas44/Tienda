<?php 

if (isset($gestion) && ($gestion==true)) { ?>
    <h1>Gestion Pedidos</h1>
<?php } else { ?>
    <h1>Mis Pedidos</h1>
<?php }
; ?>
<table>
    <tr>
        <th>Numero de Pedido</th>
        <th>Id Usuario</th>
        <th>Costo Total</th>
        <th>Fecha</th>
        <th>Estado Pedido</th>
    </tr>

    <?php while ($ped = $pedidos->fetch_object()) {  
        ?>

        <tr>

            <td>
                <a href="<?= base_url ?>?controller=pedido&accion=detallePedido&id=<?= $ped->id_Pedido ?>"><?= $ped->id_Pedido ?></a>
            </td>

            <td>
                <?= $ped->id_Usuario ?>
            </td>

            <td>
                <?= $ped->costo ?>$
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
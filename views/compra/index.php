<h1>Lista Productos en Carrito</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
    </tr>

    <?php
    $PrecioTotal = 0;
    foreach ($_SESSION['compra'] as $producto):

        $PrecioTotal += $producto['precio'] * $producto['cantidad'];

    endforeach;
    ?>

    <?php foreach ($_SESSION['compra'] as $indice => $elemento):
        $producto = $elemento['DatosProducto']; ?>


        <tr>

            <td>
                <?php if ($producto->imagen != null) { ?>
                    <img src="<?= base_url ?>/uploads/imagenes/<?= $producto->imagen ?>" alt="Imagen Tienda" width="100"
                        alt="200">
                <?php } else { ?>
                    <img src="<?= base_url ?>/img/tienda.jpg" alt="Imagen Tienda" width="160" alt="" class="imagen_compra">
                <?php }
                ; ?>
            </td>



            <td> <a
                    href="<?= base_url ?>?controller=producto&accion=ver&id=<?= $producto->id_Producto ?>"><?= $producto->nombre ?></a>
            </td>
            <td><?= $producto->precio ?></td>
            <td>
                <?= $producto['cantidad'] ?>
            </td>

        </tr>

    <?php endforeach; ?>
</table>

</br>

<div class="total_Compra">

<h3>Precio Total de la Compra:
    <?= $PrecioTotal ?>$
</h3>
<a href="" class="button boton_Pedido">Finalizar Pedido</a>
                </div>
<h1>Lista Productos en Carrito</h1>

<?php if (isset($_SESSION['compra']) && count($_SESSION['compra']) >= 1): ?>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Stock</th>
            <th>Eliminar Producto</th>
        </tr>

        <?php
        $_SESSION['PrecioTotal'] = 0;
        $PrecioTotal = 0;

//Recorre la session de compra y va calculando el precio total de cada producto (Cantidad x Precio)

        foreach ($_SESSION['compra'] as $producto):
            $PrecioTotal += $producto['precio'] * $producto['unidades'];
        endforeach;

//Recorre la session de compra y asigna a las variables los valores que va recolectando

        foreach ($_SESSION['compra'] as $indice => $elemento):

            $stockProducto = $elemento['DatosProducto']->stock;
            $unidadesProducto = $_SESSION['compra'][$indice]['unidades'];
            $resultado = $stockProducto - $unidadesProducto;
            $_SESSION['compra'][$indice]['stock'] = $resultado;

        endforeach;

        $_SESSION['PrecioTotal'] = $PrecioTotal;
        ?>

        <?php 
        
        //Recorre la session de compra y va mostrando los productos a comprar, junto con sus cantidades, precio y stock del mismo

        foreach ($_SESSION['compra'] as $indice => $elemento):
            $producto = $elemento['DatosProducto'];

            ?>

            <tr>

                <td>
                    <?php if ($producto->imagen != null) { ?>
                        <img src="<?= base_url ?>/uploads/imagenes/<?= $producto->imagen ?>" alt="Imagen Tienda"
                            class="imagen_compra">
                    <?php } else { ?>
                        <img src="<?= base_url ?>/img/tienda.jpg" alt="Imagen Tienda" class="imagen_compra">
                    <?php }
                    ; ?>
                </td>


                <td> <a href="<?= base_url ?>?controller=producto&accion=ver&id=<?= $producto->id_Producto ?>"><?= $producto->nombre ?></a>
                </td>
                <td>
                    <?= $producto->precio ?> $
                </td>
                <td>
                    <?= $_SESSION['compra'][$indice]['unidades']; ?>
                    <div class="updown-unidades">
                        <a href="<?= base_url ?>?controller=compra&accion=disminuir&index=<?= $indice ?>" class="button">-</a>
                        <a href="<?= base_url ?>?controller=compra&accion=aumentar&index=<?= $indice ?>" class="button">+</a>
                    </div>
                </td>

                <td>

                    <?php

                    if ($_SESSION['compra'][$indice]['stock'] >= 0) {
                        echo $producto->stock;
                    } else {
                        echo "No hay Stock";
                    }

                    ?>

                </td>

                <td>
                    <a href="<?= base_url ?>?controller=compra&accion=modificar&index=<?= $indice ?>"
                        class="button boton_Pedido_2">Quitar</a>
                </td>

            </tr>

        <?php endforeach; ?>
    </table>

    </br>

    <div class="total_Compra">

        <h3>Precio Total de la Compra:
            <?= $_SESSION['PrecioTotal'] ?>$
        </h3>

        <?php

        $valorStock = true;

//Recorre la session de compra y verifica que las unidades a comprar sea menor o igual al stock del producto. Caso contrario no deja Finalizar el pedido

        foreach ($_SESSION['compra'] as $indice => $elemento):
            if ($_SESSION['compra'][$indice]['stock'] < 0) {
                $valorStock = false;
            }
            ;
        endforeach;

        if ($valorStock == true) { ?>
            <a href="<?= base_url ?>?controller=pedido&accion=realizar" class="button boton_Pedido">Finalizar Pedido</a>
        <?php } else { ?>
            <a name="" class="button boton_Pedido">No hay Stock</a>
        <?php }
        ; ?>

        <a href="<?= base_url ?>?controller=compra&accion=eliminar" class="button boton_Pedido">Borrar Pedido</a>

    </div>

<?php else: ?>
    <p>El carrito está vacio, añade algun producto</p>
<?php endif; ?>
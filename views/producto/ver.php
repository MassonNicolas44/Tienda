<?php
if (isset($traerProducto)): ?>
    <h1>
        <?= $traerProducto->nombre ?>
    </h1>

    <?php if ($traerProducto->imagen != null) { ?>
        <img src="<?= base_url ?>/uploads/imagenes/<?= $traerProducto->imagen ?>" alt="Imagen Tienda" width="100" alt="200">
    <?php } else { ?>
        <img src="<?= base_url ?>/img/tienda.jpg" alt="Imagen Tienda" width="160" alt="">
    <?php }
    ; ?>

    </a>
    <p>
        <?= "Descripcion:" . $traerProducto->descripcion ?>
    </p>
    <p>
        <?= "Precio: $" . $traerProducto->precio ?>
    </p>
    <p>
        <?= "Stock: " . $traerProducto->stock . " Unidades" ?>
    </p>
    <a href="index.php" class="button">Comprar</a>

<?php else: ?>
    <h1>El producto seleccionado no existe</h1>
<?php endif; ?>
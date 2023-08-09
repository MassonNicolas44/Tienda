<h1>Alguno de nuestros productos</h1>

<?php while ($azar = $productosAzar->fetch_object()): ?>

    <div class="product">
        <a href="<?= base_url ?>?controller=producto&accion=ver&id=<?= $azar->id_Producto ?>">
            <?php if ($azar->imagen != null) { ?>
                <img src="<?= base_url ?>/uploads/imagenes/<?= $azar->imagen ?>" alt="Imagen Tienda" width="100" alt="200">
            <?php } else { ?>
                <img src="<?= base_url ?>/img/tienda.jpg" alt="Imagen Tienda" width="160" alt="">
            <?php }
            ; ?>

            <h2>
                <?= $azar->nombre ?>
            </h2>
        </a>
        <p>
            <?= "Precio: $" . $azar->precio ?>
        </p>
        <p>
            <?= "Stock: " . $azar->stock . " Unidades" ?>
        </p>
        <a href="index.php" class="button">Ver</a>
    </div>

<?php endwhile; ?>
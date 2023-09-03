<h1>Alguno de nuestros productos</h1>

<?php

//Muestra productos al azar tomados desde la Base de Datos (Imagen,Nombre,Precio,Stock)

while ($azar = $productosAzar->fetch_object()): ?>

    <div class="product">
        <a href="<?= base_url ?>?controller=producto&accion=ver&id=<?= $azar->id_Producto ?>">
            <?php if ($azar->imagen != null) { ?>
                <img src="<?= base_url ?>/uploads/imagenes/<?= $azar->imagen ?>" alt="Imagen Tienda">
            <?php } else { ?>
                <img src="<?= base_url ?>/img/tienda.jpg" alt="Imagen Tienda"">
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
        <a href=" <?= base_url ?>?controller=producto&accion=ver&id=<?= $azar->id_Producto ?>" class="button">Ver</a>
    </div>

<?php endwhile; ?>
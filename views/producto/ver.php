<?php

//Muestra los datos del producto seleccionado (Nombre,Imagen,Descripcion,Precio,Stock)

if (isset($traerProducto)): ?>
    <h1>
        <?= $traerProducto->nombre ?>
    </h1>

    <div id="VerProducto">
        <div class="imagen">
            <?php if ($traerProducto->imagen != null) { ?>
                <img src="<?= base_url ?>/uploads/imagenes/<?= $traerProducto->imagen ?>" alt="Imagen Tienda"  >
            <?php } else { ?>
                <img src="<?= base_url ?>/img/tienda.jpg" alt="Imagen Tienda" >
            <?php }
            ; ?>
        </div>
        <div class="data">
            </a>
            <p class="descripcion">
                <?= "Descripcion:" . $traerProducto->descripcion ?>
            </p>
            <p class="precio">
                <?= "Precio: $" . $traerProducto->precio ?>
            </p>
            <p class="stock">
                <?= "Stock: " . $traerProducto->stock . " Unidades" ?>
            </p>
            <a href="<?=base_url?>?controller=compra&accion=añadir&id=<?=$traerProducto->id_Producto?>" class="button">Comprar</a>
        </div>
    </div>
    </div>
<?php else: ?>
    <h1>El producto seleccionado no existe</h1>
<?php endif; ?>
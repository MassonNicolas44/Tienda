<?php if (isset($editarProducto) && isset($traerProducto) && is_object($traerProducto)) { ?>
    <h1>Editar Producto "<?= $traerProducto->nombre ?>"</h1>
    <?php $URLaccion = base_url . "?controller=producto&accion=guardar&id=".$traerProducto->id_Producto ?>
<?php } else { ?>
    <h1>Crear Nuevo Producto</h1>
    <?php $URLaccion = base_url . "?controller=producto&accion=guardar" ?>
<?php }
; ?>



<form action="<?= $URLaccion ?>" method="POST" enctype="multipart/form-data">

    <label>Nombre</label>
    <input type="text" name="nombre" style="width: 400px;" value="<?= isset($traerProducto) && is_object($traerProducto) ? $traerProducto->nombre : ''; ?>"> </br>

    <label>Descripcion</label> </br>
    <textarea name="descripcion" style="width: 400px;"> <?= isset($traerProducto) && is_object($traerProducto) ? $traerProducto->descripcion : ''; ?></textarea> </br> </br>

    <label>Precio</label> </br>
    <input type="number" name="precio" style="width: 400px;" value="<?= isset($traerProducto) && is_object($traerProducto) ? $traerProducto->precio : ''; ?>"> </br> </br>

    <label>Stock</label> </br>
    <input type="number" name="stock" style="width: 400px;" value="<?= isset($traerProducto) && is_object($traerProducto) ? $traerProducto->stock : ''; ?>"> </br> </br>

    <label>Categoria</label>
    <?php $mostrarCategoria = utilidades::mostrarCategorias(); ?>
    <Select name="categoria" style="width: 400px;">
        <?php while ($cate = $mostrarCategoria->fetch_object()): ?>
            <option value="<?= $cate->id_Categoria ?>" <?= isset($traerProducto) && is_object($traerProducto) && ($cate->id_Categoria==$traerProducto->id_Categoria)? 'selected' : ''; ?>>
                <?= $cate->nombre ?>
                    </option>
        <?php endwhile; ?>

    </Select> </br>

    <label for="imagen">Imagen</label> </br>
    <?php if(isset($traerProducto) && is_object($traerProducto) && !empty($traerProducto->imagen)): ?>
			<img src="<?=base_url?>uploads/imagenes/<?=$traerProducto->imagen?>" width="160" alt="" /> 
		<?php endif; ?>
    <input type="file" name="imagen"> </br>

    <input type="submit" value="guardar">

</form>
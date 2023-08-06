<h1>Gestion Producto</h1>
<a href="<?=base_url?>?controller=producto&accion=crear" class="button button-small">
	Crear producto
</a>

<?php require_once 'helper/utilidades.php'; ?>

<?php if(isset($_SESSION['guardarProducto']) && $_SESSION['guardarProducto'] == 'completo'): ?>
	<strong>Producto Agregado correctamente</strong>
<?php elseif(isset($_SESSION['guardarProducto']) && $_SESSION['guardarProducto'] == 'fallo'): ?>
	<strong>Producto no Agregado</strong>
<?php endif; ?>
<?php utilidades::borrarSession('guardarProducto'); ?>

<?php if(isset($_SESSION['eliminarProducto']) && $_SESSION['eliminarProducto'] == 'completo'): ?>
	<strong>Producto Eliminado correctamente</strong>
<?php elseif(isset($_SESSION['eliminarProducto']) && $_SESSION['eliminarProducto'] == 'fallo'): ?>
	<strong>Producto no Eliminado</strong>
<?php endif; ?>
<?php utilidades::borrarSession('eliminarProducto'); ?>

<table border="1">

    <tr>

        <th>ID</th>

        <th>NOMBRE</th>

        <th>DESCRIPCION</th>

        <th>PRECIO</th>

        <th>STOCK</th>

        <th>ACCIONES</th>

    </tr>

    <?php while ($produ = $productos->fetch_object()): ?>

        <tr>
            <td>
                <?php echo $produ->id_Producto; ?>
            </td>
            <td>
                <?php echo $produ->nombre; ?>
            </td>
            <td>
                <?php echo $produ->descripcion; ?>
            </td>
            <td>
                <?php echo $produ->precio; ?>
            </td>
            <td>
                <?php echo $produ->stock; ?>
            </td>
            <td>
                <a href="<?=base_url?>?controller=producto&accion=editar&id=<?=$produ->id_Producto?>" class="button button-small">Editar</a>
                <a href="<?=base_url?>?controller=producto&accion=eliminar&id=<?=$produ->id_Producto?>" class="button button-small">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
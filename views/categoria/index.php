<h1>Gestion Categoria</h1>

<a href="<?= base_url ?>?controller=categoria&accion=crear" class="button button-small">
    Crear categoria
</a>

<table border="1">

    <tr>

        <th>ID</th>

        <th>NOMBRE</th>

    </tr>

    <?php
    //Recorre y muestras las categorias creadas con el Id correspondiente
    while ($cate = $categorias->fetch_object()): ?>

        <tr>
            <td>
                <?php echo $cate->id_Categoria; ?>
            </td>
            <td>
                <?php echo $cate->nombre; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
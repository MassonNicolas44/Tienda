<h1>Crear Nueva Categoria</h1>

<form action="<?=base_url?>?controller=categoria&accion=guardar" method="POST">

<label>Nombre</label>
<input type="text" name="nombre" required>

<input type="submit" value="guardar">

</form>
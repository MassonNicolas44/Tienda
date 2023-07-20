<h1>Registrar Usuario</h1>

<?php require_once 'helper/utilidades.php'; ?>

<?php if(isset($_SESSION['registrar']) && $_SESSION['registrar'] == 'completo'): ?>
	<strong>Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['registrar']) && $_SESSION['registrar'] == 'fallo'): ?>
	<strong>Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php utilidades::borrarSession('registrar'); ?>

<form action="index.php?controller=usuario&accion=guardar" method="POST">

    <label>Nombre</label>
    <input type="text" name="nombre" required></input>
    <label>Apellido</label>
    <input type="text" name="apellido" required></input>
    <label>Email</label>
    <input type="email" name="email" required></input>
    <label>Contraseña</label>
    <input type="password" name="password" required></input>
    <label>Rol</label>
    <input type="text" name="rol" required></input>
    <input type="submit" value="Registrar"></input>


</form>
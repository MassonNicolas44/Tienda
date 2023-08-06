<?php
if (isset($categoria)): ?>
	<h1>
		<?= $categoria->nombre ?>
	</h1>
	<?php if ($productos->num_rows == 0) { ?>
		<p>No hay productos</p>
	<?php } else { ?>

		<?php while ($azar = $productos->fetch_object()): ?>

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
					<?= "Precio: $".$azar->precio ?>
				</p>
				<p>
					<?= "Stock: ".$azar->stock." Unidades" ?>
				</p>
				<a href="index.php" class="button">Mueble</a>
			</div>

		<?php endwhile; ?>


	<?php } else: ?>
	<h1>La categoría no existe</h1>
<?php endif; ?>
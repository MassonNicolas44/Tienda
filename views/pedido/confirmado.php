<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'Completado') { ?>
	<h1>Tu pedido ha sido confirmado</h1>
	<p>
		Tu pedido ha sido guardado con exito, una vez realizada la transferencia
		bancaria a la cuenta ....... con el coste del pedido, será procesado y luego enviado.
	</p>
	<br />

	<?php if (isset($pedido)) { ?>
		<h3>Datos de Pedido:</h3>

		Numero Pedido: <?= $pedido->id_Pedido ?> <br />
		Total a Pagar: <?= $pedido->costo ?> $ <br />
		Productos:

		<?php while ($producto = $Productos) {
			?>
			<ul>
				<li>
					<?= $producto->nombre ?> // <?= $producto->costo ?> // <?= $producto->unidades ?>
				</li>
			</ul>

		<?php }
		; ?>
	<?php } elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'Completado') { ?>
		<h1>Tu pedido no se ha podido procesar</h1>
	<?php }
	;
}
; ?>
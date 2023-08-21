<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'Completado') { ?>
	<h1>Tu pedido ha sido confirmado</h1>
	<p>
		Tu pedido ha sido guardado con exito, una vez realizada la transferencia
		bancaria a la cuenta ....... con el costo final del pedido, será procesado y luego enviado.
	</p>
	<br />

	<?php if (isset($pedido)) { ?>
		<h3>Datos de Pedido:</h3>

		<em><u>Numero Pedido:</em></u> <?= $pedido->Id_Pedido ?> <br />
		<em><u>Total a Pagar:</em></u> <?= $pedido->Costo ?> $ <br />
		<em><u>Productos:</em></u>
		<br /><br />

		<?php while ($producto = $Productos->fetch_object()) 
					
		{
			?>
			<ul>
				<li>
				<b>Nombre:</b>
                <?= $producto->nombre ?> ---- 
                <b>Precio:</b>
                <?= $producto->precio ?> $ ---- 
                <b>Cantidad:</b>
                <?= $producto->unidades ?>
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
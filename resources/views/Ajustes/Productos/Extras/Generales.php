<div class="content_general">
	<br>

	<label>
		<form id="form_productos">
			<h5>
				<?php foreach($ajustes as $rec){ ?>
					<input type="number" id="cantidad_enc" class="input_count" value="<?php echo $rec->cantidadColEnc; ?>">
				<?php } ?>
				Cantidad Máxima de Campos de Encabezado: 
				<span data-toggle="tooltip" title="Cantidad de columnas que se mostrará en la tabla de productos." class="pointer"><i class="fa fa-question-circle"></i></span>
				
			</h5>

			<h5>
				<?php foreach($ajustes as $rec){ ?>
					<input type="number" id="cantidad_det" class="input_count" value="<?php echo $rec->cantidadColDet; ?>">
				<?php } ?>
				Cantidad Máxima de Campos de Detalle: 
				<span data-toggle="tooltip" title="Cantidad de columnas que se mostrará en la tabla de detalle." class="pointer"><i class="fa fa-question-circle"></i></span>
			</h5>

			<butotn class="btn btn-radius">Guardar</butotn>
		</form>
	</label>
</div>
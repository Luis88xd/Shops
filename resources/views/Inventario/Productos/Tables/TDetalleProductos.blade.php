<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered display" id="tabla_detalle">
		<thead>
			<!-- <th style="width: 150px;">Acción</th> -->
			<tr>
				<?php $max_cont = 5; $cont = 1; ?>
				<?php foreach($detalles as $rec){ ?>
					<?php if ($cont <= $max_cont): ?>
						<?php $replace = str_replace('_',' ',$rec->cdpNombre); ?>
						<th style="text-transform: capitalize;"><?php echo $replace; ?></th>
						<?php $cont++; ?>
					<?php endif ?>
				<?php } ?>
				<th style="width: 150px;">Acción</th>
			</tr>
		</thead>
		
		<tbody class="tbody_detalle">
		</tbody>
	</table>
</div>
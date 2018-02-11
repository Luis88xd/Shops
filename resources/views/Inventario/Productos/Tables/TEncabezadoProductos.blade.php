<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered display" id="tabla_producto">
		<thead>
			<?php $max_cont = 5; $cont = 1; ?>
			<?php foreach($encabezados as $rec){ ?>
				<?php if ($cont <= $max_cont): ?>
					<?php //$replace = str_replace('_',' ',$rec->encNombre); ?>
					<th style="text-transform: capitalize;"><?php echo $rec->cepNombre;?></th>
					<?php $cont++; ?>
				<?php endif ?>
			<?php } ?>
			<th style="width: 150px;">Acción</th>
		</thead>
		
		<tbody class="tbody_producto">
			
		</tbody>
	</table>
</div>
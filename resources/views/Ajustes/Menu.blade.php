
@include('Ajustes.Generales.Header')

<div class="w300px float_left menu_left">
	
	<!-- Items -->
	<div class="w100 content_menu">
		<nav>
			<ul>
				<?php foreach($menu as $record){ ?>
					<li id="<?php echo $record->url; ?>"><?php echo $record->nombre; ?></li>
				<?php } ?>
			</ul>
		</nav>
	</div>
</div>
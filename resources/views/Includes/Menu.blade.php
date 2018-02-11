<div class="w300px float_left menu_left">
	
	<!-- Items -->
	<div class="w100 content_menu">
		<nav>
			<ul>
				<li>
					<div class="right"><i class="fa icon_bar fa-bars white"></i></div>
				</li>
				<?php foreach($menu as $record){ ?>
					<a href="<?php echo $record->url; ?>" class="content_menu_items">
						<li><?php echo $record->nombre; ?></li>
					</a>
				<?php } ?>
			</ul>
		</nav>
	</div>
</div>
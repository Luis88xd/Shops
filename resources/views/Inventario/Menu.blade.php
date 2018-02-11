<div class="w300px float_left menu_left">
	
	<!-- Items -->
	<div class="w100 content_menu">
		<nav>
			<ul>

				<?php foreach($menu as $record){ ?>
					<li id="<?php echo $record->url;?>"><?php echo $record->nombre; ?></li>
				<?php } ?>

				<!-- <li id="item_productos">Productos</li>
				<li id="item_sucursales">Sucursales <span class="icon_star"><i class="fa fa-star dorado"></i></span></li>
				<li>Clientes</li>
				<li id="item_categorias">Categorías</li>
				<li id="item_proveedores">Proveedores</li>
				<li>Movimientos</li> -->
				<!-- <li>Reportes</li> -->

			</ul>
		</nav>
	</div>
</div>
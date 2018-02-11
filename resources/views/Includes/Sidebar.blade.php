<div class="w100 content_sidebar">
	<p class="text_title" id="item_home"><?php echo Cache::get('conNombre'); ?></p>

	<div class="content_icons">
		<p>
			<!-- <i class="fa fa-book white fa-2x"></i>&#160; -->
			<!-- <i class="fa fa-user white fa-2x open_list_user"></i> -->
			<div class="open_list_user">
				<img class="radius mini_picture" src="<?php echo URL::to('/img/default.png'); ?>">
				<div class="content_list_user">
					<nav>
						<ul>
							<li><a href="Cuenta">Mi Cuenta</a></li>
							<!-- <li><a href=""><COLGROUP></COLGROUP>nfiguración</a></li> -->
							<li><a href="cerrarSesion">Cerrar Sesión</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</p>
	</div>
</div>
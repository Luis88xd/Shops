@include('Includes.Header')
@include('Inventario.Categoria.Header')

<body>
	<div class="content_float">
		@include('Includes.Menu')
		<div class="float_left content_panel_flex">
			<div class="content_panel">
				<p class="title">Categorías</p>
				
				<div class="w95 margin">
					<button id="btn_modal_agregar" class="btn btn-success" data-toggle="modal" data-target="#agregar">Nuevo</button><br><br>
					@include('Inventario.Categoria.Tables.TCategorias')
				</div>
			</div>
		</div>
	</div>
</body>

<!--Modals-->
@include('Inventario.Categoria.Modals.Agregar')
@include('Inventario.Categoria.Modals.Editar')
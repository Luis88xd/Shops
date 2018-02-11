@include('Includes.Header')
@include('Inventario.Proveedores.Header')

<body>
	<div class="content_float">
		@include('Includes.Menu')
		<div class="float_left content_panel_flex">
			<div class="content_panel">
				<p class="title">Proveedores</p>
				
				<div class="w95 margin">
					<button id="btn_modal_agregar" class="btn btn-success" data-toggle="modal" data-target="#agregar">Nuevo</button><br><br>
					@include('Inventario.Proveedores.Tables.TProveedores')
				</div>
			</div>
		</div>
	</div>
</body>

@include('Inventario.Proveedores.Modals.Agregar')
@include('Inventario.Proveedores.Modals.Editar')
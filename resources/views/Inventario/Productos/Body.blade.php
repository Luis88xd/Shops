@include('Includes.Header')
@include('Inventario.Productos.Header')

<body>
	<div class="content_float">
		@include('Includes.Menu')
		<div class="float_left content_panel_flex">
			<div class="content_panel">
				<p class="title">Productos</p>
				
				<div class="w95 margin contenedor_enc">
					<button id="btn_modal_agregar" class="btn btn-radius" data-toggle="modal" data-target="#agregar">Nuevo</button><br><br>
					@include('Inventario.Productos.Tables.TEncabezadoProductos')
				</div>

				<div class="w95 margin contenedor_det">
					<button id="btn_modal_agregar" class="btn btn-radius" data-toggle="modal" data-target="#agregarDetalle">Nuevo</button>&#160;
					<button id="btn_modal_regresar" class="btn btn-radius">Regresar</button>
					<br><br>
					@include('Inventario.Productos.Tables.TDetalleProductos')
				</div>
			</div>
		</div>
	</div>
</body>

@include('Inventario.Productos.Modals.AgregarEncabezado')
@include('Inventario.Productos.Modals.EditarEncabezado')
@include('Inventario.Productos.Modals.AgregarDetalle')
@include('Inventario.Productos.Modals.EditarDetalle')

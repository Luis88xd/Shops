@include('Includes.Header')
@include('Inventario.Sucursales.Header')
<body>

<div class="content_float">
	@include('Includes.Menu')
	<div class="float_left content_panel_flex">
		<div class="content_panel">
			<p class="title">Sucursales</p>
			<div class="w95 margin">
				<button id="btn_modal_agregar" class="btn btn-success" data-toggle="modal" data-target="#agregar">Nuevo</button><br><br>
				@include('Inventario.Sucursales.Tables.TSucursal')
			</div>
		</div>
	</div>
</div>

</body>
</html>

@include('Inventario.Sucursales.Modals.Agregar')
@include('Inventario.Sucursales.Modals.Editar')
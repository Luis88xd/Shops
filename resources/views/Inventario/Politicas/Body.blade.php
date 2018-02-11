@include('Includes.Header')
@include('Inventario.Politicas.Header')

<body>
	<div class="content_float">
		@include('Includes.Menu')
		<div class="float_left content_panel_flex">
			<div class="content_panel">
				<p class="title">Políticas</p>
				
				<div class="w95 margin">
					@include('Inventario.Politicas.Tables.TPoliticas')
				</div>
			</div>
		</div>
	</div>
</body>

@include('Inventario.Politicas.Modals.Agregar')
@include('Inventario.Politicas.Modals.Editar')

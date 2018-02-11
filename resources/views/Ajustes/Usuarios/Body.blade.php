@include('Includes.Header')
@include('Ajustes.Usuarios.Header')

<body>
	<div class="content_float">
		@include('Includes.Menu')
		<div class="float_left content_panel_flex">
			<div class="content_panel">
				<p class="title">Usuarios</p>
				
				<div class="w95 margin">
					<button id="btn_modal_agregar" class="btn btn-success" data-toggle="modal" data-target="#MAgregar">Nuevo</button><br><br>
					@include('Ajustes.Usuarios.Tables.TUsuarios')
				</div>
			</div>
		</div>	
	</div>
</body>

@include('Ajustes.Usuarios.Modals.Agregar')
@include('Ajustes.Usuarios.Modals.Editar')
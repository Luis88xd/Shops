@include('Includes.Header')
@include('Ajustes.Productos.Header')

<body>
	<div class="content_float">
		@include('Includes.Menu')
		<div class="float_left content_panel_flex">
			<div class="content_panel">
				<p class="title">Configuración de Productos</p>
				
				<div class="w95 margin">
					<ul id="tabs" class="nav nav-tabs" role="tablist">
					  <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab">Generales</a></li>
					  <li role="presentation"><a href="#online" role="tab" data-toggle="tab">Personalizar</a></li>
					  <li role="presentation"><a href="#offline" role="tab" data-toggle="tab">Políticas</a></li>
					</ul>

					<div class="tab-content">
						<!-- General -->
						<div role="tabpanel" class="tab-pane fade in active" id="all">
							@include('Ajustes.Productos.Extras.Generales')
						</div>
						<!-- Fin de general -->

						<!-- Campos Personalizados-->
						<div role="tabpanel" class="tab-pane fade" id="online">
							@include('Ajustes.Productos.Extras.Personalizados')
						</div>
						<!-- Fin de Campos Personalizados -->

						<!-- Politicas -->
						<div role="tabpanel" class="tab-pane fade" id="offline">
					  		@include('Ajustes.Productos.Extras.Politicas.Politicas')
						</div>
						<!-- Fin de Politicas -->

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
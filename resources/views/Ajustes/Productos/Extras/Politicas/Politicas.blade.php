<!-- Panel de politicas -->
  	<!-- <div class="panel-group"> -->
		<!-- <div class="panel panel-default">	
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" href="#politicas">Politicas</a>
		      </h4>
		    </div>
			<div id="politicas" class="panel-collapse collapse">
				<div class="panel-body">

				</div>
			</div>
		</div> -->
	<!-- </div> -->

@include('Ajustes.Productos.Extras.Politicas.Modals.MAgregarPoliticas')
@include('Ajustes.Productos.Extras.Politicas.Modals.MEditarPoliticas')

<br>
<button data-toggle="modal" data-target="#agregarPoliticas" type="text" class="btn-radius">Agregar</button>
<br><br>

<div class="table-responsive" style="overflow:auto;height: 80vh;">
	<table id="tabla_politicas" class="table table-striped table-bordered table-hover">
		<thead>
			<th id="select_all" style="width:60px;"><input type="checkbox"></th>
			<th>Fecha</th>
			<th>Título</th>
			<th>Autor</th>
			<th>Descripción</th>
			<th style="width:150px;">Acción</th>
		</thead>
		<tbody class="tbody_politicas">
			
		</tbody>
	</table>
</div>
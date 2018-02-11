<!DOCTYPE html>
<html>
<body>
<!-- Modal editar -->
	<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Categoría</h4>
      </div>
      <div class="modal-body">
        <form id="actualizarCategoria" method="POST">

          <input type="hidden" id="e_id">

        	<h5>Categoría: </h5>
        	<input type="text" id="e_categoria" class="form-control w100" placeholder="Categoría" required="true">

      </div>
      <div class="modal-footer">

        <!-- Mensaje de respuesta -->
        <div class="left left10">
          <p class="text-danger" id="mensaje_registro"></p>
        </div>

        <div class="float_left red" id="table_response">

        </div>

      	<!-- <input type="submit" class="btn btn-success" value="Agregar"> -->
      	<button class="btn btn-success" id="btn_respuesta">Actualizar</button>

      	</form>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin de modal para agregar -->

</body>
</html>
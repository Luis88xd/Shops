<!DOCTYPE html>
<html>
<body>
<!-- Modal agregar -->
	<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Agregar proveedor</h4>
      </div>
      <div class="modal-body">
        <form id="actualizarProveedor" method="POST">

          <input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>">

          <input type="hidden" id="e_id">

        	<h5>Nombre: </h5>
        	<input type="text" id="e_nombre" class="form-control w100" placeholder="Nombre del proveedor" required="true">

        	<h5>Dirección: </h5>
        	<input type="text" id="e_direccion" class="form-control w100" placeholder="Dirección" required="true">

        	<h5>Teléfono: </h5>
        	<input type="text" id="e_telefono" class="form-control w100" placeholder="Teléfono" required="true">

        	<h5>Correo: </h5>
        	<input type="email" id="e_correo" class="form-control w100" placeholder="Correo" required="true">

      </div>
      <div class="modal-footer">

        <!-- Mensaje de respuesta -->
        <div class="left left10">
          <p class="text-danger" id="mensaje_registro"></p>
        </div>

        <div class="float_left red" id="table_response">

        </div>

      	<!-- <input type="submit" class="btn btn-success" value="Agregar"> -->
      	<button class="btn btn-success" id="btn_respuesta">Agregar</button>

      	</form>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin de modal para agregar -->

</body>
</html>
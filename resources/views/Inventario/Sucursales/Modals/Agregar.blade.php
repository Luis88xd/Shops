<!DOCTYPE html>
<html>
<body>
<!-- Modal agregar -->
	<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Agregar proveedor</h4>
      </div>
      <div class="modal-body">
        <form id="agregarProveedor" method="POST">

          <input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>">

          <div class="content_float">
            <div class="float_left w48">
              <h5>Nombre: </h5>
              <input type="text" id="nombre" class="form-control">
            </div>
            <div class="float_left w4">&#160;</div>
            <div class="float_left w48">
              <h5>Dirección: </h5>
              <input type="text" id="direccion" class="form-control">
            </div>
          </div>

          <div class="content_float">
            <div class="float_left w48">
              <h5>Teléfono: </h5>
              <input type="text" id="telefono" class="form-control">
            </div>
            <div class="float_left w4">&#160;</div>
            <div class="float_left w48">
              <h5>Localidad: </h5>
              <input type="text" id="localidad" class="form-control">
            </div>
          </div>

          <h5>Horario de atención: </h5>
          <div class="content_float">
            <div class="float_left w48">
              De: <input type="time" id="hora_entrada" class="form-control">
            </div>
            <div class="float_left w4">&#160;</div>
            <div class="float_left w48">
              A: <input type="time" id="hora_salida" class="form-control">
            </div>
          </div>

          <h5>Nombre del encargado: </h5>
          <input type="text" id="nombre_encargado" class="form-control">

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
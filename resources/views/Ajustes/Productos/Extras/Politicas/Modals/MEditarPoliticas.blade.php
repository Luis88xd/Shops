<!DOCTYPE html>
<html>
<body>
  <div class="modal fade" id="editarPoliticas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
  <!-- modal-lg -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="actualizarPoliticas" method="POST">
      
          
        <!-- <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cart-plus"></i></h4> -->
        <input type="text" name="titulo" id="e_titulo" class="f20 capitalize bold input_form w100" placeholder="Título..." style="font-size:30px;outline:0px;margin-top:15px;  "><br><br>
      </div>
      <div class="modal-body">


        <h5>Descripción: </h5>
        <textarea name="descripcion" class="resize_none form-control w100" id="e_descripcion" name="descripcion" rows="20"></textarea>
  
      </div>
      <div class="modal-footer">

        <!-- Mensaje de respuesta -->
        <div class="left left10">
          <p class="text-danger" id="mensaje_registro"></p>
        </div>

        <div class="float_left red" id="table_response"></div>
        <button class="btn btn-success" id="btn_respuesta">Agregar</button>

        </form>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        <input type="hidden" id="count">
      </div>
    </div>
  </div>
</div>
<!-- Fin de modal para agregar -->

</html>
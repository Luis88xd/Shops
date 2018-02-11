<!DOCTYPE html>
<html>
<body>
  <div class="modal fade" id="editarEncabezado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
  <!-- modal-lg -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="actualizarEncabezado" method="POST" enctype="multipart/form-data">
        <!-- Token -->
        <input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>">
        <input type="hidden" name="encAutor" id="e_autor" value="<?php echo Cache::get('idUsuario'); ?>">
          
        <!-- <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cart-plus"></i></h4> -->
        <input type="text" name="encNombre" id="e_nombre" class="f20 bold input_form w100" placeholder="Nombre..." style="font-size:30px;outline:0px;margin-top:15px;  "><br><br>
      </div>
      <div class="modal-body">

          <output id="e_list" class="_galeria"></output>
          <div class="input-group w25">
              <label class="input-group-btn">
                  <span class="btn btn_galery">
                      Agregar&hellip; <input type="file" id="target" name="target[]" style="display: none;" accept="image/jpeg,image/png" multiple>
                  </span>
              </label>
              <!-- <input type="text" class="form-control" readonly> -->
          </div>

          <br>

          <div class="content_float" style="margin-top:35px;">
            <div class="float_left w48">
              <h5 class="pink bold">Categoría: </h5>
              <select class="input_form w100" name="encCategoria" id="e_categoria">
                <optgroup label="Eliga una categoría">
                  <?php foreach($categorias as $record){ ?>
                    <option value="<?php echo $record->idCategoria; ?>"><?= $record->catCategoria; ?></option>
                  <?php } ?>
                </optgroup>
              </select>
            </div>
            <div class="float_left w4">&#160;</div>
            <div class="float_left w48">
              <h5 class="pink bold">Proveedor: </h5>
              <select class="input_form w100" name="encProveedor" id="e_proveedor">
                <optgroup label="Elia un proveedor">
                  <?php foreach($proveedores as $record){ ?>
                    <option value="<?php echo $record->idProveedor ?>"><?php echo $record->proNombre; ?></option>
                  <?php } ?>
                </optgroup>
              </select>
            </div>
          </div>

          <br><br>
          <!-- Descripción -->
          <h5 class="pink bold">Descripción</h5>
          <textarea class="form-control resize_none" rows="8" name="encDescripcion" id="e_descripcion"></textarea>

          <!-- Extracto -->
          <h5 class="pink bold">Extracto <span data-toggle="tooltip" title="El extracto es una descripción resumida que se mostrará como contenido rápido" class="pointer"><i class="fa fa-question-circle"></i></span></h5>
          <textarea class="form-control resize_none" rows="5" id="e_extracto" name="encExtracto"></textarea>

          <!-- Recorrer los campos guardados -->
          <?php //foreach($encabezados as $record){ ?>
            <!-- <h5><?php //echo $record->nombre; ?></h5> -->
            <!-- <input type="<?php //echo $record->tipoCampo; ?>" name="<?php //echo $record->nombre; ?>" id="<?php //echo $record->nombre; ?>" class="form-control"> -->
          <?php //} ?>

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


</body>

<script src="<?php echo URL::to('/js/file_upload/js/vendor/jquery.ui.widget.js');?>"></script>
<script src="<?php echo URL::to('/js/file_upload/js/jquery.iframe-transport.js');?>"></script>
<script src="<?php echo URL::to('/js/file_upload/js/jquery.fileupload.js');?>"></script>

</html>
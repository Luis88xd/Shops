<!DOCTYPE html>
<html>
<body>
	<div class="modal fade" id="editarDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
  <!-- modal-lg -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="agregarEncabezado" method="POST" enctype="multipart/form-data">
        <!-- Token -->
        <input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>">
        <input type="hidden" name="encAutor" id="autor" value="<?php echo Cache::get('idUsuario'); ?>">
          
        <!-- <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cart-plus"></i></h4> -->
        <input type="text" name="encNombre" id="nombre" class="f20 bold input_form w100" placeholder="Nombre..." style="font-size:30px;outline:0px;margin-top:15px;  "><br><br>
      </div>
      <div class="modal-body">

          <output id="list2" class="_galeria"></output>
          <div class="input-group w25">
              <label class="input-group-btn">
                  <span class="btn btn_galery">
                      Agregar&hellip; <input type="file" id="target2" name="target" style="display: none;" accept="image/jpeg,image/png">
                  </span>
              </label>
              <!-- <input type="text" class="form-control" readonly> -->
          </div>

          <input type="hidden" id="e_idEncabezadoProducto">          

          <h5>Politicas: </h5>
          <select class="form-control" id="politicas" name="idPolitica">
            <optgroup label="Eliga las políticas para este producto">
              <option value=""></option>
            </optgroup>
          </select>

          <br>
          <h5>Estado: </h5>
          <select class="form-control" id="estado" name="detEstado">
            <option value=""></option>
          </select>

          <br>
          <h5>Precio Costo: </h5>
          <input class="form-control" id="precio_costo" name="detPrecioCosto">

          <br>
          <h5>Precio Venta: </h5>
          <input class="form-control" id="precio_venta" name="detPrecioVenta">

          <br>
          <h5>Disponibilidad: </h5>
          <input class="form-control" id="disponibilidad" name="detDisponibilidad">

          <br>
          <h5>SKU: </h5>
          <input class="form-control" id="sku" name="detSku">

          <br>
          <h5>Descuento: </h5>
          <input class="form-control" id="descuento" name="detDescuento">

          <br>
          <h5>Nota Interna: </h5>
          <textarea name="detNotaInterna" class="form-control resize_none" rows="5"></textarea>

          <br>
          <h5>Color: </h5>
          <select class="form-control" name="detColor">
            <option></option>
          </select>

          <br>
          <h5>Talla: </h5>
          <input class="form-control" name="detTallla" id="talla">

          <br><br>
          <!-- Recorrer los campos guardados -->
          <h3 class="pink bold">Campos Adicionales</h3>

          <?php $_cont = 0;?>
          <?php foreach($detalles as $record){ ?>
            <?php if($record->cdpCategoria == "Adicional"){?>
              <?php $_cont++;?>
              <h5 class="pink bold"><?php echo $record->cdpNombre; ?></h5>
              <input type="<?php echo $record->cepTipoCampo; ?>" name="<?php echo $record->cepAlias; ?>" id="<?php echo $record->cepNombre; ?>" class="form-control">
            <?php }?>
          <?php } ?>

          <?php if($_cont == 0){?>
            <a href="#" class="decoration_none">
              <div class="center"><i class="fa fa-star fa-2x yellow"></i></div>
              <h5 class="yellow bold center">Obtener Premium</h5>
            </a>
            <!-- <h5 class="pink bold center">No tienes campos adicionales</h5> -->
          <?php }?>

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

<script>

      function archivo(evt) {

      var files = evt.target.files; // FileList object
    
      // Obtenemos la imagen del campo "file".
      for (var i = 0, f; f = files[i]; i++) {
        //Solo admitimos imágenes.
        if (!f.type.match('image.*')) {
        continue;
        }
    
        var reader = new FileReader();
    
        reader.onload = (function(theFile) {
        return function(e) {
          document.getElementById("list2").innerHTML = ['<li id="orden_'+orden+'" value="'+e.target.result+'" class="li_small"><div style="background:url(', e.target.result,');background-size:cover;" title="', escape(theFile.name), '"></div></li>'].join('');
        };
        })(f);
    
        reader.readAsDataURL(f);
      }
    }
      document.getElementById('target2').addEventListener('change', archivo, false);
</script>
</body>

<script src="<?php echo URL::to('/js/file_upload/js/vendor/jquery.ui.widget.js');?>"></script>
<script src="<?php echo URL::to('/js/file_upload/js/jquery.iframe-transport.js');?>"></script>
<script src="<?php echo URL::to('/js/file_upload/js/jquery.fileupload.js');?>"></script>

</html>
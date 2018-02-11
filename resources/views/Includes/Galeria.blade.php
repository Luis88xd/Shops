<!DOCTYPE html>
<html>
<body>
	<div class="modal fade" id="Mgaleria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999 !important;">
  <div class="modal-dialog modal-lg" role="document">
  <!-- modal-lg -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="formAgregarDetalle" method="POST" enctype="multipart/form-data">
          <!-- <input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>"> -->
        <h3 class="pink bold">Galeria de imágenes</h3>
      </div>
      <div class="modal-body" style="overflow:hidden;">
        <div id="content_galery_modal"></div>
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
          document.getElementById("content_galery_modal").innerHTML += ['<li class="li_galery item_galery" value="'+e.target.result+'"><div style="background:url(', e.target.result,');background-size:cover;" title="', escape(theFile.name), '"></div></li>'].join('');
        };
        })(f);
    
        reader.readAsDataURL(f);
      }
    }

      <!-- document.getElementById('target').addEventListener('change', archivo, false); -->
    
</script>

<script src="<?php echo URL::to('/js/file_upload/js/vendor/jquery.ui.widget.js');?>"></script>
<script src="<?php echo URL::to('/js/file_upload/js/jquery.iframe-transport.js');?>"></script>
<script src="<?php echo URL::to('/js/file_upload/js/jquery.fileupload.js');?>"></script>

</html>
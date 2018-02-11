<!DOCTYPE html>
<html>
<body>
<!-- Modal agregar -->
  <div class="modal fade" id="MAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
        <form id="formAgregarUsuario" method="POST">

          <input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>">

          <output id="list2" class="_galeria"></output>
          <div class="input-group w25">
              <label class="input-group-btn">
                  <span class="btn btn_galery">
                      Agregar&hellip; <input type="file" id="target2" name="target" style="display: none;" accept="image/jpeg,image/png">
                  </span>
              </label>
              <!-- <input type="text" class="form-control" readonly> -->
          </div>

          <h5>Nombre: </h5>
          <input type="text" name="usuNombre" id="usuario" placeholder="Usuario" class="form-control">

          <h5>Apellidos: </h5>
          <input type="text" name="usuApellido" id="apellido" placeholder="Apellidos" class="form-control">

          <h5>Teléfono: </h5>
          <input type="text" name="usuTelefono" id="telefono" placeholder="Teléfono" class="form-control">

          <h5>Correo: </h5>
          <input type="email" name="usuCorreo" id="correo" placeholder="Correo" class="form-control">

          <h5>Puesto: </h5>
          <select class="form-control" id="puesto" name="usuPuesto">
            <optgroup label="Eliga el cargo del usuario">
              <option value="Administrador">Administrador</option>
              <option value="Encargado">Encargado</option>
              <option value="Vendedor">Vendedor</option>
              <option value="Visualizador">Visualizador de Reportes</option>
              <option value="Editor">Editor de productos</option>
            </optgroup>
          </select>

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
          document.getElementById("list2").innerHTML = ['<li value="'+e.target.result+'" class="li_small"><div style="background:url(', e.target.result,');background-size:cover;" title="', escape(theFile.name), '"></div></li>'].join('');
        };
        })(f);
    
        reader.readAsDataURL(f);
      }
    }
      document.getElementById('target2').addEventListener('change', archivo, false);
</script>

</body>
</html>
@include('Home.Cuenta.Header')

<!-- Procesos -->
<?php 
	$fechaHora = "";

	foreach($usuarios as $rec){
		$fechaHora = $rec->usuFechaInicio;
	}

	$rec_fechaHora = explode(' ',$fechaHora);
	$fecha = str_replace('-','/',$rec_fechaHora[0]);

 ?>

<div class="content_profile">
	<div class="w90 margin">
		<br><br>
		<div class="content_float">
			<div class="w40 float_left">
				<!-- imagen -->
				<div class="picture">
					<label class="pointer">
						<input id="target" name="target" type="file" style="visibility:hidden;position:absolute;" accept="image/jpeg,image/png">
						<img id="picture" src="<?php echo URL::to('/img/default.png'); ?>" >
						<div id="list"></div>
					</label>
					<?php foreach($usuarios as $rec){ ?>
						<h3><?php echo $rec->usuNombre." ".$rec->usuApellido; ?></h3>
					<?php } ?>
				</div>
				<br><br>
				<div class="content_float">
					<div class="w50 float_left">
						<h5 class="pb10px pink bold">Fecha de inicio: </h5>	
						<h5 class="pb10px pink bold">Hora: </h5>
					</div>
					<div class="w50 float_left">
						<h5 class="pb10px"><?php echo $fecha; ?></h5>
						<h5 class="pb10px"><?php echo date("g:i a", strtotime($rec_fechaHora[1])); ?></h5>
					</div>
				</div>
			</div>
			
			<div class="w60 float_left">
				<div class="content_float">
					<div class="float_left w50">
						<h5 class="pb10px pink bold">Cargo: </h5>
						<h5 class="pb10px pink bold">Teléfono: </h5>
						<h5 class="pb10px pink bold">Correo: </h5>
					</div>
					<div class="float_left w50">
						<h5 class="pb10px">Vendedor</h5>
						<h5 class="pb10px"><?php foreach($usuarios as $rec){echo $rec->usuTelefono;} ?></h5>
						<h5 class="pb10px"><?php foreach($usuarios as $rec){echo $rec->usuCorreo;} ?></h5>
					</div>
				</div>

				<hr>

				<!-- Cambiar contraseña -->
				<div class="content_float">
					<div class="float_left w50">
						<h5 class="pb20px pink bold">Contraseña actual: </h5>
						<h5 class="pb20px pink bold">Contraseña nueva: </h5>
						<h5 class="pb20px pink bold">Repetir contraseña: </h5>
					</div>
					<div class="float_left w50">
						<h5 class="pb10px"><input type="password" class="w100 _input"></h5>
						<h5 class="pb10px"><input type="password" class="w100 _input"></h5>
						<h5 class="pb10px"><input type="password" class="w100 _input"></h5>
					<br><br>
					<div class="right">
						<button class="btn btn-radius">Actualizar</button>
					</div>
					</div>
				</div>
			</div>

		</div>

		<br><br>
		<h3 class="pink bold">Actividad Reciente</h3>
		<hr>

		<!-- Actividad reciente -->

	</div>
</div>


<script>
      var orden = 0;

      function archivo(evt) {

      var files = evt.target.files; // FileList object
    
      for (var i = 0, f; f = files[i]; i++) {
        
        if (!f.type.match('image.*')) {
  	      continue;
        }
    
        var reader = new FileReader();
    
        reader.onload = (function(theFile) {
        return function(e) {
        	$('#picture').hide();
            document.getElementById("list").innerHTML = ['<div class="img_profile" style="background: url('+e.target.result+');"></div>'].join('');
        };
        })(f);
    
        reader.readAsDataURL(f);
      }
    }
      document.getElementById('target').addEventListener('change', archivo, false);
</script>
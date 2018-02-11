<?php include("Header.php"); ?>
<body>
<div class="w100">
	<div class="w40 float_left _100vh content_banner">
		<?php include('banner.php'); ?>
	</div>
	<div class="w60 float_left flex_center">
		<div class="w60 margin">
			<form id="form_install" class="w100">
				<h1 class="pink bold">Bienvenido</h1>

				<input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>">

				<h5>Nombre del proyecto: </h5><br>
				<input type="text" class="form-control" placeholder="Nombre" id="conNombre" required="true">
				<br><br>

				<h5>Tipo de cuenta</h5><br>
				<select class="form-control" id="conTipo">
					<optgroup label="Eliga el tipo de cuenta">
						<option value="Normal">Normal</option>
						<option value="Premium">Premium</option>
					</optgroup>
				</select>

				<br><br>

				<h3 class="pink bold">Datos de Sesión</h3>
				<hr>

				<br><br>

				<div class="w100 content_float">
					<div class="w48 float_left">
						<h5>Nombres: </h5><br>
						<input type="text" id="usuNombre" class="form-control" placeholder="Nombres">
					</div>
					<div class="w4 float_left">&#160;</div>
					<div class="w48 float_left">
						<h5>Apellidos: </h5><br>
						<input type="text" id="usuApellido" class="form-control" placeholder="Apellidos">
					</div>
				</div>
				<br>

				<h5>Correo: </h5><br>
				<input type="text" id="usuCorreo" class="form-control" placeholder="Correo"><br><br>

				<h5>Contraseña: </h5><br>
				<input type="password" id="usuClave" class="form-control" placeholder="Contraseña"><br><br>

				<h5>Repita la contraseña: </h5><br>
				<input type="password" id="rclave" class="form-control" placeholder="Repita la contraseña">

				<br><br>
				<!-- <h5>Tipo de instalación: </h5>
				<input type="checkbox" id="procesos"><span> Procesos</span><br>
				<input type="checkbox" id="tienda"><span> Tienda en línea</span>
				<br><br> -->
				<div class="center">
					<input type="submit" value="Comenzar" class="btn btn-radius">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
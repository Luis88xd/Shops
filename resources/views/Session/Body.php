<?php include('Header.php'); ?>
<body>

<div class="w100 content_float _container">
	<div class="w40 float_left _100vh content_banner">
		<?php include('banner.php'); ?>
	</div>

	<div class="w60 float_left flex_center">
		<form id="form_login" class="w100">
			<div class="w60 margin">
				<?php foreach($data as $record){ ?>
					<h3><?php echo $record->conNombre; ?> </h3>
				<?php } ?>

				<p>Ingresar la siguiente información</p><br>

				<input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>">

				<h5>Correo: </h5><br>
				<input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" required="true"><br><br>

				<h5>Contraseña: </h5><br>
				<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required="true">
				<div class="top1 right">
					<span>Olvidé mi contraseña</span>
				</div>

				<div class="center">
					<button class="btn btn-radius top5" id="btn_login">
						INGRESAR
						<!-- <img src="<?php //echo URL::asset('/img/load.gif'); ?>" class="icon_just"> -->
					</button>					
				</div>
			</div>
		</form>
	</div>
</div>

</body>
</html>
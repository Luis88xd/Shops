<?php 
	$token = Cache::get('idUsuario');

	if($token == null){
		// return redirect('Session/Body');
	?>
		<script type="text/javascript">
			window.location.href="Login";
		</script>
	<?php 
		}
		// Cache::forget('session');

	?>

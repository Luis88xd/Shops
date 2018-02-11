	
var notification = window.Notification || window.mozNotification || window.webkitNotification;

if ('undefined' === typeof notification){
	alert('Tu navegador no soporta notificaciones');
}else{
	notification.requestPermission(function(permission){});
}
if ('undefined' === typeof notification){
	alert('Tu navegador no soporta notificaciones');
}else{
	notification.requestPermission(function(permission){});
}

$(document).ready(function(){

	var notificar = new notification(
	"titulo", {
			body: "contenido", //el texto o resumen de lo que deseamos notificar
			dir: 'auto', // izquierda o derecha (auto) determina segun el idioma y region
			lang: 'ES', //El idioma utilizado en la notificación
			tag: 'notificationPopup', //Un ID para el elemento para hacer get/set de ser necesario
			icon: '' //El URL de una imágen para usarla como icono
		}
	);

	$('#form_login').submit(function(){

		var correo = $('#correo').val();
		var clave = $('#clave').val();
		var token = $('#token').val();

		$('#btn_login').html('<img src="../img/load.gif" class="icon_just">');

		// setTimeout(function() {
			$.ajax({
				url:'validarUsuario',
				type:'POST',
				dataType:'JSON',
				data:{
					'correo':correo,
					'clave':clave,
					'_token':token
				},

				success:function(data){
					if(data){
						window.location.href="Home";
					}else{
						$('#btn_login').html('INGRESAR');
						alertify.error("Usuario o contraseña incorrecta");
					}
				},error:function(error){
					alertify.error("Error al conectar con el servidor");
				}
			});

		// }, 3000);

		return false;
	});
});
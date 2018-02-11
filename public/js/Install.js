$(document).ready(function(){

	$('#form_install').submit(function(){

		var nombre = $('#conNombre').val();
		var token = $('#token').val();
		var correo = $('#usuCorreo').val();
		var clave = $('#usuClave').val();
		var nombreUsuario = $('#usuNombre').val();
		var apellido = $('#usuApellido').val();
		var tipo  =$('#conTipo').val();

		if($('#usuClave').val() == $('#rclave').val()){

			$('#clave').css('border-color','green');
			$('#rclave').css('border-color','green');

			$.ajax({
				url:'agregarConfiguracion',
				type:'POST',
				dataType:'JSON',
				data:{
					'nombre':nombre,
					'_token':token,
					'nombreUsuario':nombreUsuario,
					'apellido':apellido,
					'tipo':tipo,
					'correo':correo,
					'clave':clave,
					'tipo':tipo
				},
				success:function(data){
					if(data){
						location.reload();
					}else{

					}
				},error:function(error){
					console.log("error " + error);
				}
			});
		}else{
			alertify.error("Las contraseñas no coinciden");
			$('#clave').css('border-color','red');
			$('#rclave').css('border-color','red');
		}
		return false;
	});

});
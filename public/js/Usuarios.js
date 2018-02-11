$(document).ready(function(){

	var tabla_usuario = "";

	function recorrer(data,option){
		if(option){
			tabla_usuario.destroy();
			$('.tr_usuarios').remove();
		}

		$.each(data,function(i,item){
			$('.tbody_usuarios').append('<tr class="tr_usuarios"><td>'+item.usuFoto+'</td><td>'+item.usuNombre+'</td><td>'+item.usuApellido+'</td><td>'+item.usuTelefono+'</td><td>'+item.usuCorreo+'</td><td>'+item.usuPuesto+'</td><td><button class="btn btn-radius-mini editarUsuario" data-toggle="modal" data-target="#editarUsuario" value='+item.idUsuario+'><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarUsuario" value='+item.idUsuario+'><i class="fa fa-eraser"></i></button></tr>');
		});
	}

	var tabla = "";
	// Listar usuarios
	$.ajax({
		url:'listarUsuarios',
		type:'GET',
		dataType:'JSON',

		success:function(data){
			if(data != null && data != false){
				recorrer(data,false);
			}else{
				alertify.error("Hubo un error al listar los usuarios");
		}
		},error:function(error){
		alertify.error("Error al conectar con el servidor");
		}
	});

	// var id = $('#sortable').find('li:last-child').val();
	// $("#sortable").sortable({
	// 	change:function(){

	// 	},update:function(){
	// 		for(var x = 0;x <= id;x++){
	// 			$('#sortable > li:nth-child('+x+')').val(x);
	// 		}
	// 	}
	// });

	// $("#sortable").disableSelection();

	$('body').on('click','.editarUsuario',function(){
		var id  = $(this).val();

		$.ajax({
			url:'editarUsuario',
			type:'POST',
			dataType:'JSON',
			data:{
				id:id
			},success:function(data){
				if(data != null && data != false){
					$('#e_nombre').val(item.usuNombre);
					$('#e_apellido').val(item.usuApellido);
					$('#e_telefono').val(item.usuTelefono);
					$('#e_correo').val(item.usuCorreo);
				}else{
					alertify.error("Hubo un error al obtener la información");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});
	});

	$('#formAgregarUsuario').submit(function(){

		var formData = new FormData($('#formAgregarUsuario')[0]);

		$.ajax({
			url:'agregarUsuario',
			type:'POST',
			dataType:'JSON',
			data: formData,
			cache:false,
			processData:false,
			contentType:false,

			success:function(data){
				if(data != null && data != false){
					recorrer(data,true);
					alertify.success("Usuario agregado correctamente");
				}else{
					alertify.error("Hubo un error al agregar el usuario");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}

		});

		return false;
	});

	$('#formActualizarUsuario').submit(function(){

		var formData = new FormData($('#formActualizarUsuario')[0]);

		$.ajax({
			url:'actualizarUsuario',
			type:'POST',
			dataType:'JSON',
			data:formData,
			processData:false,
			cache:false,
			contentType:false,

			success:function(data){
				if(data != null && data != false){
					recorrer(data,true);
					alertify.success("Usuario actualizado correctamente");
				}else{
					alertify.error("Hubo un error al actualizar el usuario");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});

		return false;
	});

	$('body').on('click','.eliminarUsuario',function(){
		var id = $(this).val();

		$.ajax({
			url:'eliminarUsuario',
			type:'POST',
			dataType:'JSON',
			data:{
				id:id
			},

			success:function(data){
				if(data != null && data != false){
					recorrer(data,true);
					tabla = $('#tabla_usuarios').DataTable();

				}else{
					alertify.error("Hubo un error al eliminar el usuario");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});
	});

});
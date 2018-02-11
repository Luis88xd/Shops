$(document).ready(function(){

	var tabla = "";
	var token = $('#token').val();

	$.ajax({
		url:'listarProveedores',
		type:'GET',
		dataType:'JSON',

		success:function(data){
			if(data != false && data != null){
				$.each(data,function(i,item){
					$('.tbody_proveedor').append('<tr class="tr_dinamico"><td>'+item.proNombre+'</td><td>'+item.proDireccion+'</td><td>'+item.proTelefono+'</td><td>'+item.proCorreo+'</td><td><button class="btn btn-primary editarProveedor" data-toggle="modal" data-target="#editar" value='+item.idProveedor+'><img src="img/editar.png" class="w24px"></button><button class="btn btn-danger eliminarProveedor" value='+item.idProveedor+'><img src="img/eliminar.png" class="w24px"></button></td></tr>');
				});

				tabla = $('#tabla_proveedor').DataTable();

			}else{
				alertify.error("No tienes proveedores agregados");
			}
		},error:function(error){
			alertify.error("No tienes proveedores agregados");
		}
	});

	// Agregar un nuevo proveedor
	$('#agregarProveedor').submit(function(){

		var nombre = $('#nombre').val();
		var telefono = $('#telefono').val();
		var correo = $('#correo').val();
		var direccion = $('#direccion').val();
		// var token = $('#token').val();

		$.ajax({
			url:'agregarProveedor',
			type:'POST',
			dataType:'JSON',
			data:{
				'nombre':nombre,
				'telefono':telefono,
				'correo':correo,
				'direccion':direccion,
				'_token':token
			},
			success:function(data){

				tabla.destroy();
				$('.tr_dinamico').remove();

				$.each(data,function(i,item){
					$('.tbody_proveedor').append('<tr class="tr_dinamico"><td>'+item.proNombre+'</td><td>'+item.proDireccion+'</td><td>'+item.proTelefono+'</td><td>'+item.proCorreo+'</td><td><button class="btn btn-primary editarProveedor" data-toggle="modal" data-target="#editar" value='+item.idProveedor+'><img src="img/editar.png" class="w24px"></button><button class="btn btn-danger eliminarProveedor" value='+item.idProveedor+'><img src="img/eliminar.png" class="w24px"></button></td></tr>');
				});

				alertify.success("Proveedor agregado correctamente");
				tabla = $('#tabla_proveedor').DataTable();
				$('#agregar').modal('toggle');

			},error:function(error){
				alertify.error("Error al agregar el proveedor");
			}
		});

		return false;
	});

	// Obtener un proveedor en especifico
	$('body').on('click','.editarProveedor',function(){
		var id = $(this).val();

		$.ajax({
			url:'obtenerProveedor',
			type:'POST',
			dataType:'JSON',
			data:{
				'id':id,
				'_token':token
			},
			success:function(data){
				$.each(data,function(i,item){
					$('#e_id').val(item.idProveedor);
					$('#e_nombre').val(item.proNombre);
					$('#e_direccion').val(item.proDireccion);
					$('#e_telefono').val(item.proTelefono).val();
					$('#e_correo').val(item.proCorreo).val();
				});
			},error:function(error){
				console.log("Error: " + error);
			}
		});
	});

	// Actualizar un proveedor
	$('#actualizarProveedor').submit(function(){

		var idProveedor = $('#e_id').val();
		var nombre = $('#e_nombre').val();
		var telefono = $('#e_telefono').val();
		var correo = $('#e_correo').val();
		var direccion = $('#e_direccion').val();

		$.ajax({
			url:'actualizarProveedor',
			type:'POST',
			dataType:'JSON',
			data:{
				'idProveedor':idProveedor,
				'nombre':nombre,
				'telefono':telefono,
				'correo':correo,
				'direccion':direccion,
				'_token':token
			},
			success:function(data){
				if(data != false && data != null) {
					tabla.destroy();
					$('.tr_dinamico').remove();

					$.each(data,function(i,item){
						$('.tbody_proveedor').append('<tr class="tr_dinamico"><td>'+item.proNombre+'</td><td>'+item.proDireccion+'</td><td>'+item.proTelefono+'</td><td>'+item.proCorreo+'</td><td><button class="btn btn-primary editarProveedor" data-toggle="modal" data-target="#editar" value='+item.idProveedor+'><img src="img/editar.png" class="w24px"></button><button class="btn btn-danger eliminarProveedor" value='+item.idProveedor+'><img src="img/eliminar.png" class="w24px"></button></td></tr>');
					});

					alertify.success("Proveedor actualizado correctamente");
					tabla = $('#tabla_proveedor').DataTable();
					$('#editar').modal('toggle');
				}else{
					alertify.error("No se han actualizado los campos");
				}
			},error:function(error){
				alertify("Error al conectar con el servidor");
			}
		});

		return false;
	});

	// Eliminar un proveedor
	$('body').on('click','.eliminarProveedor',function(){
		var id = $(this).val();

		alertify.confirm("¿Está seguro de eliminar este proveedor?",function(){
			$.ajax({
				url:'eliminarProveedor',
				type:'POST',
				dataType:'JSON',
				data:{
					'idProveedor':id,
					'_token':token
				},
				success:function(data){
					if(data != false && data != null){
						tabla.destroy();
						$('.tr_dinamico').remove();

						$.each(data,function(i,item){
							$('.tbody_proveedor').append('<tr class="tr_dinamico"><td>'+item.proNombre+'</td><td>'+item.proDireccion+'</td><td>'+item.proTelefono+'</td><td>'+item.proCorreo+'</td><td><button class="btn btn-primary editarProveedor" data-toggle="modal" data-target="#editar" value='+item.idProveedor+'><img src="img/editar.png" class="w24px"></button><button class="btn btn-danger eliminarProveedor" value='+item.idProveedor+'><img src="img/eliminar.png" class="w24px"></button></td></tr>');
						});

						alertify.success("Proveedor eliminado correctamente");
						tabla = $('#tabla_proveedor').DataTable();
					}else{
						alertify.error("Hubo un error al eliminar el proveedor");
					}
				},error:function(error){
					alertify.error("Error al conectar con el servidor");
				}
			});
		},function(){});
	});
});
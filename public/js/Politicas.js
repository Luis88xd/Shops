$(document).ready(function(){

	var token = $('#token').val();

	// Listar Políticas
	$.ajax({
		url:'listarPoliticas',
		type:'GET',
		dataType:'JSON',

		success:function(data){
			if(data != false && data != false){

				$.each(data,function(i,item){
					var desc = item.polDescripcion;

					// Filtro
					if(desc.length > 100){
						var data = item.polDescripcion;
						desc = "";
						for(var x = 0;x <= 100; x++){
							desc += data[x];
						}

						desc += "...";
					}

					$('.tbody_politicas').append('<tr class="tr_politicas"><td>'+item.polFechaCreacion+'</td><td>'+item.polTitulo+'</td><td>'+item.usuNombre+" "+item.usuApellido+'</td><td>'+item.polTipo+'</td><td>'+desc+'</td><td><button class="btn btn-radius-mini editarPoliticas" data-toggle="modal" data-target="#editarPoliticas" value="'+item.idPoliticas+'"><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarPoliticas" value="'+item.idPoliticas+'"><i class="fa fa-eraser"></i></button></td></tr>');
				});

			}else{
				alertify.error("Hubo un error al obtener la información");
			}
		},error:function(error){
			alertify.error("Error al conectar con el servidor");
		}
	});

	// Agregar políticas
	$('#formAgregarPoliticas').submit(function(){

		var titulo = $('#titulo').val();
		var descripcion = $('#descripcion').val();
		var autor = $('#autor').val();
		var tipo = $('#tipo').val();

		$.ajax({
			url:'agregarPoliticas',
			type:'POST',
			dataType:'JSON',
			data:{
				_token:token,
				titulo:titulo,
				descripcion:descripcion,
				tipo:tipo,
				autor:autor
			},

			success:function(data){
				if(data != null && data != false){
					tabla_politicas.destroy();
					$('.tr_politicas').remove();

					$.each(data,function(i,item){
						var desc = item.descripcion;

						// Filtro
						if(desc.length > 100){
							var data = item.descripcion;
							desc = "";
							for(var x = 0;x <= 100; x++){
								desc += data[x];
							}

							desc += "...";
						}

						$('.tbody_politicas').append('<tr class="tr_politicas"><td>'+item.polFechaCreacion+'</td><td>'+item.polTitulo+'</td><td>'+item.usuNombre+" "+item.usuApellido+'</td><td>'+item.polTipo+'</td><td>'+desc+'</td><td><button class="btn btn-radius-mini editarPoliticas" data-toggle="modal" data-target="#editarPoliticas" value="'+item.idPoliticas+'"><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarPoliticas" value="'+item.idPoliticas+'"><i class="fa fa-eraser"></i></button></td></tr>');
						tabla_politicas = $('#tabla_politicas').DataTable();
					});

					$('#agregarPoliticas').modal('toggle');
					alertify.success("Registro agregado correctamente");

				}else{
					alertify.error("Hubo un error al agregar el registro");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});

		return false;
	});

	// Obtener información de políticas
	$('body').on('click','.editarPoliticas',function(){
		var id = $(this).val();

		$.ajax({
			url:'editarPoliticas',
			type:'POST',
			dataType:'JSON',
			data:{
				_token:token,
				id:id
			},

			success:function(data){
				if(data != null && data != false){
					$.each(data,function(i,item){
						$('#e_titulo').val(item.polTitulo);
						$('#e_descripcion').val(item.polDescripcion);
						$('#e_id').val(item.idPoliticas);
						$('#e_tipo option[value='+item.tipo+']').attr('selected','selected');
					});
				}else{
					alertify.error("Hubo un error al obtener el registro");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});
	});

	// Actualizar Información de las políticas
	$('#actualizarPoliticas').submit(function(){

		var titulo = $('#e_titulo').val();
		var descripcion = $('#e_descripcion').val();
		var id = $('#e_id').val();

		$.ajax({
			url:'actualizarPoliticas',
			type:'POST',
			dataType:'JSON',
			data:{
				_token:token,
				id:id,
				titulo:titulo,
				descripcion:descripcion
			},

			success:function(data){
				if(data != null && data != false){
					tabla_politicas.destroy();
					$('.tr_politicas').remove();

					$.each(data,function(i,item){
						var desc = item.descripcion;

						// Filtro
						if(desc.length > 100){
							var data = item.descripcion;
							desc = "";
							for(var x = 0;x <= 100; x++){
								desc += data[x];
							}

							desc += "...";
						}

						$('.tbody_politicas').append('<tr class="tr_politicas"><td>'+item.polFechaCreacion+'</td><td>'+item.polTitulo+'</td><td>'+item.usuNombre+" "+item.usuApellido+'</td><td>'+item.polTipo+'</td><td>'+desc+'</td><td><button class="btn btn-radius-mini editarPoliticas" data-toggle="modal" data-target="#editarPoliticas" value="'+item.idPoliticas+'"><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarPoliticas" value="'+item.idPoliticas+'"><i class="fa fa-eraser"></i></button></td></tr>');
						tabla_politicas = $('#tabla_politicas').DataTable();
					});

					$('#actualizarPoliticas').modal('toggle');
					alertify.success("Registro actualizado correctamente");

				}else{
					alertify.error("Hubo un error al actualizar la información");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});

		return false;
	});

	// Eliminar información de políticas
	$('body').on('click','.eliminarPoliticas',function(){
		var id = $(this).val();

		alertify.confirm('¿Está seguro de eliminar este registro?',function(){
			$.ajax({
				url:'eliminarPoliticas',
				type:'POST',
				dataType:'JSON',
				data:{
					_token:token,
					id:id
				},

				success:function(data){
					if(data != null && data != false){
						tabla_politicas.destroy();
						$('.tr_politicas').remove();

						$.each(data,function(i,item){
							var desc = item.descripcion;

							// Filtro
							if(desc.length > 100){
								var data = item.descripcion;
								desc = "";
								for(var x = 0;x <= 100; x++){
									desc += data[x];
								}

								desc += "...";
							}

							$('.tbody_politicas').append('<tr class="tr_politicas"><td>'+item.polFechaCreacion+'</td><td>'+item.polTitulo+'</td><td>'+item.usuNombre+" "+item.usuApellido+'</td><td>'+item.polTipo+'</td><td>'+desc+'</td><td><button class="btn btn-radius-mini editarPoliticas" data-toggle="modal" data-target="#editarPoliticas" value="'+item.idPoliticas+'"><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarPoliticas" value="'+item.idPoliticas+'"><i class="fa fa-eraser"></i></button></td></tr>');
						});

						tabla_politicas = $('#tabla_politicas').DataTable();
						alertify.success("Registro eliminado correctamente");
					}else{
						alertify.error("Hubo un error al eliminar el registro");
					}
				},error:function(error){
					alertify.error("Error al conectar con el servidor");
				}
			});
		},function(){});
	});
});
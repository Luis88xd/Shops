$(document).ready(function(){

	var token = $('#token').val();
	var tabla = "";

	// Listar categorias
	$.ajax({
		url:'listarCategorias',
		type:'GET',
		dataType:'JSON',

		success:function(data){
			$.each(data,function(i,item){
				$('.tbody_categorias').append('<tr class="tr_dinamico"><td>'+item.catCategoria+'</td><td><button class="btn btn-primary editarCategoria" data-toggle="modal" data-target="#editar" value='+item.idCategoria+'><img src="img/editar.png" class="w24px"></button><button class="btn btn-danger eliminarCategoria" value='+item.idCategoria+'><img src="img/eliminar.png" class="w24px"></button></td></tr>');
			});

			tabla = $('#tabla_categorias').DataTable();

		},error:function(error){
			alertify.error("Error al conectar con el servidor");
		}
	});

	// Agregar nueva categoría
	$('#agregarCategoria').submit(function(){
		
		var categoria = $('#categoria').val();

		$.ajax({
			url:'agregarCategoria',
			type:'POST',
			dataType:'JSON',
			data:{
				'nombre':categoria,
				'_token':token
			},

			success:function(data){
				tabla.destroy();
				$('.tr_dinamico').remove();

				$.each(data,function(i,item){
					$('.tbody_categorias').append('<tr class="tr_dinamico"><td>'+item.catCategoria+'</td><td><button class="btn btn-primary editarCategoria" data-toggle="modal" data-target="#editar" value='+item.idCategoria+'><img src="img/editar.png" class="w24px"></button><button class="btn btn-danger eliminarCategoria" value='+item.idCategoria+'><img src="img/eliminar.png" class="w24px"></button></td></tr>');
				});

				tabla = $('#tabla_categorias').DataTable();

				$('#agregar').modal('toggle');
				alertify.success("Categoría agregada correctamente");

			},error:function(){
				alertify.error("Error al conectar con el servidor");
			}
		});

		return false;
	});

	// Obtener una categoria en especifico
	$('body').on('click','.editarCategoria',function(i,item){
		var id = $(this).val();

		$.ajax({
			url:'obtenerCategoria',
			type:'POST',
			dataType:'JSON',
			data:{
				'id':id,
				'_token':token
			},

			success:function(data){
				$.each(data,function(i,item){
					$('#e_categoria').val(item.catCategoria);
					$('#e_id').val(item.idCategoria);
				});
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});
	});

	// Actualizar una categoría
	$('#actualizarCategoria').submit(function(){

		var categoria = $('#e_categoria').val();
		var id = $('#e_id').val();

		$.ajax({
			url:'actualizarCategoria',
			type:'POST',
			dataType:'JSON',
			data:{
				'nombre':categoria,
				'_token':token,
				'id':id
			},

			success:function(data){
				if(data != null && data != false){
					tabla.destroy();
					$('.tr_dinamico').remove();

					$.each(data,function(i,item){
						$('.tbody_categorias').append('<tr class="tr_dinamico"><td>'+item.catCategoria+'</td><td><button class="btn btn-primary editarCategoria" data-toggle="modal" data-target="#editar" value='+item.idCategoria+'><img src="img/editar.png" class="w24px"></button><button class="btn btn-danger eliminarCategoria" value='+item.idCategoria+'><img src="img/eliminar.png" class="w24px"></button></td></tr>');
					});

					tabla = $('#tabla_categorias').DataTable();
					$('#editar').modal('toggle');

					alertify.success("Categoria actualizada correctamente");
				}else{
					alertify.error("Hubo un error al actualizar la categoría");
				}
			},error:function(error){
				alertify.error("Error al actualizar la categoria");
			}
		});

		return false;
	});

	// Eliminar una categoria
	$('body').on('click','.eliminarCategoria',function(){
		var id = $(this).val();

		alertify.confirm('¿Está seguro de eliminar esta categoría?',function(){
			$.ajax({
				url:'eliminarCategoria',
				type:'POST',
				dataType:'JSON',
				data:{
					'id':id,
					'_token':token
				},

				success:function(data){
					tabla.destroy();
					$('.tr_dinamico').remove();

					$.each(data,function(i,item){
						$('.tbody_categorias').append('<tr class="tr_dinamico"><td>'+item.catCategoria+'</td><td><button class="btn btn-primary editarCategoria" data-toggle="modal" data-target="#editar" value='+item.idCategoria+'><img src="img/editar.png" class="w24px"></button><button class="btn btn-danger eliminarCategoria" value='+item.idCategoria+'><img src="img/eliminar.png" class="w24px"></button></td></tr>');
					});

					tabla = $('#tabla_categorias').DataTable();

					alertify.success("Categoria eliminada correctamente");
				},error:function(error){
					alertify.error("Error al conectar con el servidor");
				}
			});
		},function(){});
	});
});
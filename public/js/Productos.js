$(document).ready(function(){

	var tabla_encabezado = "";
	var tabla_detalle = "";
	var token = $('#token').val();
	$('.contenedor_det').hide();

	 $('[data-toggle="tooltip"]').tooltip(); 


// ----------------------------- Funciones de Encabezado -----------------------------------------
function filtrarInformacion(data){
	desc = "";
	if(data.length > 50){
		for(var x = 0;x <= 50; x++){
			desc += data[x];
		}

		desc += "...";		
		return desc;
	}else{
		return data;
	}
}

function recorrerEncabezado(data,option){
	if(option){
		tabla_encabezado.destroy();
		$('.tr_encabezado').remove();
	}

	var producto = "";
	var desc = "";

	for(x = 0; x < data.length; x++){
		var id_encabezado = 0;
		producto += "<tr class='tr_encabezado'>";
			$.each(data[x],function(i,item){
				if(i == 'idEncabezadoProducto'){
					id_encabezado = item;
				}else if(i == 'encDescripcion'){
					producto += '<td>'+filtrarInformacion(item)+'</td>';
				}else{
					producto += '<td>'+item+'</td>';
				}
			});
		producto += '<td><button class="btn btn-radius-mini listarDetalles" value="'+id_encabezado+'"><i class="fa fa-plus"></i></button>&#160;<button class="btn btn-radius-mini editarEncabezado" data-toggle="modal" data-target="#editarEncabezado" value='+id_encabezado+'><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarEncabezado" value='+id_encabezado+'><i class="fa fa-eraser"></i></button></td>';
		producto += "</tr>";
	}

	$('.tbody_producto').append(producto);
	tabla_encabezado = $('#tabla_producto').DataTable();

}

// ----------------------------- Fin de funciones de encabezado -----------------------------------------

// Listar productos
	$.ajax({
		url:'listarEncabezado',
		type:'GET',
		dataType:'JSON',

		success:function(data){
			if(data != null && data != false){
				recorrerEncabezado(data,false);				
			}else{
				alertify.error("Hubo un error al obtener los datos");
			}

		},error:function(error){
			alertify.error("Error al conectar con el servidor");
		}
	});


	$("._galeria").sortable({

		change:function(){

		},update:function(){

			var id = $('#count').val();
			var data_galeria = [];

			// Cambiar el orden de los li en encabezadoProducto
			for(var x = 1;x <= id;x++){
				// $('._galeria > li:nth-child('+x+')').val(x);
				data_galeria.push($('#orden_'+x).val());
			}

			$('._galeria > li').removeClass('li_big');

			$('._galeria > li:first-child').remove('li_small');
			$('._galeria > li:first-child').addClass('li_big');
		}
	});

	$('#agregarEncabezado').submit(function(){

		var formData = new FormData($('#agregarEncabezado')[0]);

		$.ajax({
			url:'agregarEncabezado',
			type:'POST',
			dataType:'JSON',
			data: formData,
			cache:false,
			processData:false,
			contentType:false,

			success:function(data){
				if(data != null && data != false){
					recorrerEncabezado(data,true);

					$('#agregar').modal('toggle');
					$('#agregarEncabezado')[0].reset();
					$('._galeria').empty();
					
					alertify.success("Producto agregado correctamente");
				}else{
					alertify.error("Hubo un error al agregar el encabezado");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});	
		return false;
	});

	// Obtener información de un encabezado
	$('body').on('click','.editarEncabezado',function(){
		var id = $(this).val();

		$.ajax({
			url:'obtenerEncabezado',
			type:'POST',
			dataType:'JSON',
			data:{
				_token:token,
				id:id
			},

			success:function(data){
				if(data != false && data != null){
					// Recorrer la información
					$.each(data['informacion'],function(i,item){
						$('#e_autor').val(item.usuNombre + " " + item.usuApellido);
						$('#e_nombre').val(item.encNombre);
						$('#e_categoria').val(item.encCategoria).change();
						$('#e_proveedor').val(item.encProveedor).change();
						$('#e_descripcion').val(item.encDescripcion);
						$('#e_extracto').val(item.encExtracto);
					});

					// Recorrer las galerias
					$.each(data['galeria'],function(i,item){
						orden++;
						if(orden == 1){
							$('#e_list').append('<li id="e_orden_'+item.galOrden+'" class="li_big e_li"><div style="background:url(uploads/products/'+item.galFoto+');background-size:cover;"></div></li>');
						}else{
							$('#e_list').append('<li id="e_orden_'+item.galOrden+'" class="li_small e_li"><div style="background:url(uploads/products/'+item.galFoto+');background-size:cover;"></div></li>');
						}
					});

				}else{
					alertify.error("Hubo un error al obtener la información");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});
	});

	// Eliminar producto
	$('body').on('click','.eliminarEncabezado',function(){

		var id = $(this).val();

		// $.ajax({
		// 	url:'obtenerEDetalle',
		// 	type:'POST',
		// 	dataType:'JSON',
		// 	data:{
		// 		_token:token,
		// 		id: id
		// 	},

		// 	success:function(data){
		// 		$('._detalles').append(data);
		// 	},error:function(error){
		// 		console.log(error);
		// 	}
		// });

		alertify.confirm("¿Está seguro de eliminar este producto? <div class='_detalles'><input type='checkbox'> Borrar los detalles.</div>",function(){
			$.ajax({
				url:'eliminarDetalle',
				type:'POST',
				dataType:'JSON',
				data:{
					_token:token,
					id:id
				},

				success:function(data){
					if(data != null && data != false){
						recorrerEncabezado(data,true);
					}else{
						alertify.error("Hubo un error al eliminar el registro");
					}
				},error:function(error){
					alertify.error("Error la conectar con el servidor");
				}
			});
		},function(){});
	});


// ---------------------------------------------- Detalles --------------------------------------------------------------------------

	//--------------- Function para recorrer los detalles
	function recorrerDetalle(data,option){
		if(option == true){
			tabla_detalle.destroy();
			$('.tr_detalle').remove();
		}

		var producto = "";
		for(x = 0; x < data.length; x++){
			var id_detalle = 0;
			producto += "<tr class='tr_detalle'>";
				$.each(data[x],function(i,item){
					if(i != 'idDetalleProducto'){
						producto += '<td>'+item+'</td>';
					}else{
						id_detalle = item;
					}
				});
			producto += '<td><button class="btn btn-radius-mini editarDetalle" data-toggle="modal" data-target="#editarDetalle" value='+id_detalle+'><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarDetalle" value='+id_detalle+'><i class="fa fa-eraser"></i></button></td>';
			producto += "</tr>";
		}

		$('.tbody_detalle').append(producto);
		tabla_detalle = $('#tabla_detalle').DataTable();
	}
	//--------------- Fin de la función para recorrer los detalles


	$('#btn_modal_regresar').click(function(){
		$('.contenedor_det').hide();
		$('.contenedor_enc').show();
	});

	// Obtener detalle de productos
	$('body').on('click','.listarDetalles',function(){
		var id = $(this).val();

		$('.contenedor_enc').hide();
		$('.contenedor_det').show();

		$.ajax({
			url:'listarDetalles',
			type:'POST',
			dataType:'JSON',
			data:{
				_token:token,
				id:id
			},

			success:function(data){
				recorrerDetalle(data,false);
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});
	});

	// Agregar detalle
	$('#formAgregarDetalle').submit(function(){

		var formData = new FormData($('#formAgregarDetalle')[0]);

		$.ajax({
			url:'agregarDetalle',
			type:'POST',
			datatype:'JSON',
			data: formData,
			cache:false,
			processData:false,
			contentType:false,

			success:function(data){
				if(data != null && data != false){
					recorrerDetalle(data,true);
					$('#formAgregarDetalle').modal('toggle');
					alertify.success("Registro agregado correctamente");
				}else{
					alertify.error("Hubo un error al agregar el detalle");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});

		return false;
	});

	// Actualizar detalle
	$('#formActualizarDetalle').submit(function(){

		var formData = new FormData($('#formActualizarDetalle')[0]);

		$.ajax({
			url:'actualizarDetalle',
			type:'POST',
			dataType:'JSON',
			data:formData,
			cache:false,
			processData:false,
			contentType:false,

			success:function(data){
				if(data != null && data != false){
					recorrerDetalle(data);
					$('#formActualizarDetalle').modal('toggle');
					alertify.success("Registro actualizado correctamente");
				}else{
					alertify.error("Hubo un error al actualizar el registro");
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});

		return false;
	});


	// Eliminar detalle
	$('body').on('click','.eliminarDetalle',function(){
		var id = $(this).val();
		console.log("ID: " + id);
		
		alertify.confirm('¿Está seguro de eliminar este registro?',function(){
			$.ajax({
				url:'eliminarDetalle',
				type:'POST',
				dataType:'JSON',
				data:{
					_token:token,
					id:id
				},

				success:function(data){
					if(data != null && data != false){
						recorrerDetalle(data,true);
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
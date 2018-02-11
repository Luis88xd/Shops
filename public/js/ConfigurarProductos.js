$(document).ready(function(){

	var token = $('#token').val();
	$('[data-toggle="tooltip"]').tooltip();

	$('.inputs_selects').hide();
	$('.input_dselects').hide();
	$('.mas_detalles').hide();

	var id_encabezado = $('#ul_encabezado').find('li:last-child').val();
	// var id_detalle = $('#ul_detalle').find('li:last-child').val();
	var id_detalle = $('#det_contador').val();

	// Volver los campos reordenables
	$(".sortable_encabezado").sortable({
		change:function(){

		},update:function(){
			// Cambiar el orden de los li en encabezado
			for(var x = 0;x <= id_encabezado;x++){
				$('#ul_encabezado > li:nth-child('+x+')').val(x);
			}
		}
	});


	$(".sortable_detalle").sortable({

		
		change:function(){

		},update:function(){
			// Cambiar el orden de los li en detalle
			for(var x = 0;x <= id_detalle;x++){
				$('#ul_detalle > li:nth-child('+x+')').val(x);
			}
		}
	});

	var encabezado = [];
	var detalle = [];

	// Listar Configuracion
	$.ajax({
		url:'listarConfiguracion',
		type:'GET',
		dataType:'JSON',

		success:function(data){

			if(data != null && data != false){
				$.each(data['ceproducto'],function(i,item){
					encabezado.push(item);
				});

				$.each(data['cdproducto'],function(i,item){
					detalle.push(item);
				});

			}else{
				alertify.error("Hubo un error al obtener los datos");
			}
		},error:function(error){
			alertify.error("Error al conectar con el servidor");
		}
	});

	// Guardar datos de encabezado
	$('.guardar_encabezado').click(function(){

		$(this).html('<img src="../img/load.gif" class="icon_25px">');

		var id = [];
		var estado = [];
		var nombre = [];
		var valor = [];
		var orden = [];

		// Obtener los datos en un arreglo
		for(var x = 1; x <= encabezado.length; x++){
			if($('.ch_'+x).is(':checked')){
				estado.push('Activo');
			}else{
				estado.push('Inactivo');
			}

			id.push($('#id_'+x).val());
			orden.push($('.li_encabezado_'+x).val());
			nombre.push($('#nombre_'+x).val());
			valor.push($('#valor_'+x).val());

		}

		$.ajax({
			url:'actualizarCampoEncabezado',
			type:'POST',
			dataType:'JSON',
			data:{
				id:id,
				cepEstado:estado,
				cepNombre:nombre,
				cepValue:valor,
				cepOrden:orden,
				_token:token
			},

			success:function(data){
				if(data != null && data != false){
					alertify.success("Cambios Guardados Correctamente");
					$('.guardar_encabezado').html('<i class="fa fa-save pointer"></i>');
				}else{
					alertify.error("Hubo un error al actualizar los datos");
					$('.guardar_encabezado').html('<i class="fa fa-save pointer"></i>');
				}
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
				$('.guardar_encabezado').html('<i class="fa fa-save pointer"></i>');
			}
		});
	});

	// Guardar datos de detalle
	$('.guardar_detalle').click(function(){
		$(this).html('<img src="../img/load.gif" class="icon_25px">');

		var id = [];
		var estado = [];
		var nombre = [];
		var valor = [];
		var orden = [];
		var tipoCampo = [];

		// Guardar la información de los campos en un arreglo
		for(var x = 1; x <= detalle.length; x++){
			if($('.cd_'+x).is(':checked')){
				estado.push('Activo');
			}else{
				estado.push('Inactivo');
			}

			id.push($('#d_id_'+x).val());
			orden.push($('.li_detalle_'+x).val());
			nombre.push($('#d_nombre_'+x).val());
			valor.push($('#d_valor_'+x).val());
		}

		$.ajax({
			url:'actualizarCampoDetalle',
			type:'POST',
			dataType:'JSON',
			data:{
				id:id,
				cdpEstado:estado,
				cdpNombre:nombre,
				cdpValue:valor,
				cdpOrden:orden,
				_token:token
			},

			success:function(data){

				$('.guardar_detalle').html('<i class="fa fa-save pointer"></i>');

				if(data != null && data != false){
					alertify.success("Cambios Guardados Correctamente");
				}else{
					alertify.error("Hubo un error al guardar la información");
				}

			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});
	});

	// Eliminar un campo de encabezado
	$('.sortable').on('click','.trash_encabezado',function(){
		var id = $(this).val();
		alertify.confirm('¿Está seguro de eliminar este campo? <br><span class="red">Esta acción no se puede revertir</span>',function(){
			$.ajax({
				url:'eliminarCampoEncabezado',
				type:'POST',
				dataType:'JSON',
				data:{
					id:id,
					_token:token
				},success:function(data){
					if(data != null && data != false){
						alertify.success("Campo eliminado correctamente");
					}else{
						alertify.error("Hubo un error al eliminar el campo");
					}
				},error:function(error){
					alertify.error("Error al conectar con el servidor");
				}
			});
		},function(){});
	});

	// Eliminar un campo de detalle
	$('.sortable').on('click','.trash_detalle',function(){
		var id = $(this).val();

		alertify.confirm('¿Está seguro de eliminar este campo? <br><span class="red">Esta acción no se puede revertir</span>',function(){
			$.ajax({
				url:'eliminarCampoDetalle',
				type:'POST',
				dataType:'JSON',
				data:{
					id:id
				},success:function(data){
					if(data != null && data != false){

					}else{
						alertify.error("Hubo un error al eliminar el campo");
					}
				},error:function(error){
					alertify.error("Error al conectar con el servidor");
				}
			});
		},function(){});
	});

	// Mostrar mas detalles
	$('.content_target').on('click','.mostrar_detalles',function(){
		$(this).closest('.content_target').find('span.mas_detalles').toggle();
	});

	// Cambiar el color cuando se desactive o active el check
	$('body').on('click','.input_check',function(){
		if ($(this).is(':checked')) {
			$(this).closest('.content_target').removeClass('bg_danger');
			$(this).closest('.content_target').addClass('bg_success');
			// $(this).closest('.contet_target').toggleClass('bg_danger');
		}else{
			$(this).closest('.content_target').removeClass('bg_success');
			$(this).closest('.content_target').addClass('bg_danger');
		}
	});

	$('#agregar_tipoCampo').change(function(){
		var value = $(this).val();

		if(value == "select"){			
			$('.por_defecto').fadeOut(500,function(){
				$('.inputs_selects').fadeIn(500);
			});
		}else{
			$('.inputs_selects').fadeOut(500,function(){
				$('.por_defecto').fadeIn(500);
			});
		}
	});

	$('#select_detalle').change(function(){
		var value = $(this).val();
		if(value == "select"){
			$('.input_dselects').fadeIn(500);
		}else{
			$('.input_dselects').fadeOut(500);
		}
	});

	$('#agregarCampo').submit(function(){

		var split = null;

		if($('#agregar_tipoCampo').val() == "select"){
			var data = $('#opciones').val();
			var split = data.split('|');
		}

		// Datos
		var ubicacion = $('#ubicacion').val();
		var valor = $('#valor').val();
		var nombre = $('#nombre').val();
		var tipo = $('#agregar_tipoCampo').val();
		var opciones = $('#opciones').val();

		var url = "";

		if(ubicacion == 1){
			url = "agregarNuevoCampo";
		}else{
			url = "agregarCampoDetalle";
		}

		$.ajax({
			url:url,
			type:'POST',
			dataType:'JSON',
			data:{
				'ubicacion':ubicacion,
				'valor':valor,
				'nombre':nombre,
				'tipo':tipo,
				'opciones':opciones,
				'_token':token
			},

			success:function(data){
				if(data != null && data != false){
					if(ubicacion == 1){
						var id = id_encabezado + 1;
						
						$.each(data,function(a,item){					
							$('#ul_encabezado').append('<li class="li_encabezado_'+id+'" value="'+id+'"><input type="hidden" id="id_'+id+'" value="item.idCEProducto"><br><div class="content_float content_target relative p20 bg_success"><div class="float_left w48"><br><br><h5 class="b20">Nombre: </h5><h5 class="b20">Tipo de campo: </h5><p>&#160;</p><span class="mas_detalles"><h5>Valor por defecto: </h5></span></div><div class="float_left w4">&#160;</div><div class="float_left w48"><div class="w100 right"><button value="'+item.idCEProducto+'" class="trash_encabezado icon_trash"><i class="fa fa-trash white fa-2x"></i></button><label class="switch"><input type="checkbox" checked class="input_check ch_'+id+'"><span class="slider round"></span></label></div><input type="text" value="'+item.nombre+'" class="form-control b6" id="nombre_'+id+'"><input class="form-control select_campo b6" id="tipoCampo_'+id+'" value="'+item.tipoCampo+'" disabled><p class="white right pointer mostrar_detalles">Más detalles</p><span class="mas_detalles"><input type="text" class="form-control select_campo b6" value="'+item._value+'" id="valor_'+id+'"></span></div></div></li>');
						});

						alertify.success("Campo agregado correctamente");
					}else{
						$.each(data,function(a,item){					
							$('#ul_detalle').append('<li class="li_encabezado_'+id+'" value="'+id+'"><input type="hidden" id="id_'+id+'" value="item.idCEProducto"><br><div class="content_float content_target relative p20 bg_success"><div class="float_left w48"><br><br><h5 class="b20">Nombre: </h5><h5 class="b20">Tipo de campo: </h5><p>&#160;</p><span class="mas_detalles"><h5>Valor por defecto: </h5></span></div><div class="float_left w4">&#160;</div><div class="float_left w48"><div class="w100 right"><button value="'+item.idCEProducto+'" class="trash_encabezado icon_trash"><i class="fa fa-trash white fa-2x"></i></button><label class="switch"><input type="checkbox" checked class="input_check ch_'+id+'"><span class="slider round"></span></label></div><input type="text" value="'+item.nombre+'" class="form-control b6" id="nombre_'+id+'"><input class="form-control select_campo b6" id="tipoCampo_'+id+'" value="'+item.tipoCampo+'" disabled><p class="white right pointer mostrar_detalles">Más detalles</p><span class="mas_detalles"><input type="text" class="form-control select_campo b6" value="'+item._value+'" id="valor_'+id+'"></span></div></div></li>');
						});						
					}
				}else{
					alertify.error("Hubo un error al intentar agregar el campo");
				}

			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});

		return false;
	});


// ------------------------------------ POLÍTICAS --------------------------------------------------


	var tabla_politicas

	$('#select_all').click(function(){
		if($(this).is(':checked')){
			console.log("true");
			$('.all_check').prop('checked', true);
		}else{
			console.log("false");
			$('.all_check').prop('checked', false);
		}
		
	});

	// Listar Polítias
	$.ajax({
		url:'ppListarPoliticas',
		type:'GET',
		dataType:'JSON',

		success:function(data){
			if(data != null && data != false){

				$.each(data,function(i,item){
					var desc = item.ppDescripcion;

					// Filtro
					if(desc.length > 100){
						var data = item.ppDescripcion;
						desc = "";
						for(var x = 0;x <= 100; x++){
							desc += data[x];
						}

						desc += "...";
					}

					$('.tbody_politicas').append('<tr class="tr_politicas"><td><input class="all_check" type="checkbox"></td><td>'+item.ppFechaCreacion+'</td><td>'+item.ppTitulo+'</td><td>'+item.usuNombre+" "+item.usuApellido+'</td><td>'+desc+'</td><td><button class="btn btn-radius-mini editarPoliticas" data-toggle="modal" data-target="#editarPoliticas" value="'+item.idPoliticaProducto+'"><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarPoliticas" value="'+item.idPoliticaProducto+'"><i class="fa fa-eraser"></i></button></td></tr>');
				});
			}

			tabla_politicas = $('#tabla_politicas').DataTable();

		},error:function(error){
			alertify.error("Hubo un error al listar las políticas")
		}
	});

	// Agregar políticas
	$('#formAgregarPoliticas').submit(function(){

		var titulo = $('#titulo').val();
		var descripcion = $('#descripcion').val();
		var autor = $('#autor').val();
		var tipo = $('#tipo').val();

		$.ajax({
			url:'ppAgregarPoliticas',
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
						var desc = item.ppDescripcion;

						// Filtro
						if(desc.length > 100){
							var data = item.ppDescripcion;
							desc = "";
							for(var x = 0;x <= 100; x++){
								desc += data[x];
							}

							desc += "...";
						}

						$('.tbody_politicas').append('<tr class="tr_politicas"><td>'+item.ppFechaCreacion+'</td><td>'+item.ppTitulo+'</td><td>'+item.usuNombre+" "+item.usuApellido+'</td><td>'+desc+'</td><td><button class="btn btn-radius-mini editarPoliticas" data-toggle="modal" data-target="#editarPoliticas" value="'+item.idPoliticaProducto+'"><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarPoliticas" value="'+item.idPoliticaProducto+'"><i class="fa fa-eraser"></i></button></td></tr>');
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
			url:'ppEditarPoliticas',
			type:'POST',
			dataType:'JSON',
			data:{
				_token:token,
				id:id
			},

			success:function(data){
				if(data != null && data != false){
					$.each(data,function(i,item){
						$('#e_titulo').val(item.ppTitulo);
						$('#e_descripcion').val(item.ppDescripcion);
						$('#e_id').val(item.idPoliticaProducto);
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
			url:'ppActualizarPoliticas',
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
						var desc = item.ppDescripcion;

						// Filtro
						if(desc.length > 100){
							var data = item.ppDescripcion;
							desc = "";
							for(var x = 0;x <= 100; x++){
								desc += data[x];
							}

							desc += "...";
						}

						$('.tbody_politicas').append('<tr class="tr_politicas"><td>'+item.ppFechaCreacion+'</td><td>'+item.ppTitulo+'</td><td>'+item.usuNombre+" "+item.usuApellido+'</td><td>'+desc+'</td><td><button class="btn btn-radius-mini editarPoliticas" data-toggle="modal" data-target="#editarPoliticas" value="'+item.idPoliticaProducto+'"><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarPoliticas" value="'+item.idPoliticaProducto+'"><i class="fa fa-eraser"></i></button></td></tr>');
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
				url:'ppEliminarPoliticas',
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
							var desc = item.ppDescripcion;

							// Filtro
							if(desc.length > 100){
								var data = item.ppDescripcion;
								desc = "";
								for(var x = 0;x <= 100; x++){
									desc += data[x];
								}

								desc += "...";
							}

							$('.tbody_politicas').append('<tr class="tr_politicas"><td>'+item.ppFechaCreacion+'</td><td>'+item.ppTitulo+'</td><td>'+item.usuNombre+" "+item.usuApellido+'</td><td>'+desc+'</td><td><button class="btn btn-radius-mini editarPoliticas" data-toggle="modal" data-target="#editarPoliticas" value="'+item.idPoliticaProducto+'"><i class="fa fa-pencil"></i></button>&#160;<button class="btn btn-radius-mini eliminarPoliticas" value="'+item.idPoliticaProducto+'"><i class="fa fa-eraser"></i></button></td></tr>');
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
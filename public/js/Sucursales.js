$(document).ready(function(){

	var token = $('#token').val();
	var arreglo = [];

	$.ajax({
		url:'listarUsuarios',
		type:'GET',
		dataType:'JSON',

		success:function(data){
			if(data !=  null && data != false){
				$.each(data,function(i,item){
					arreglo.push(item.usuNombre + " " + item.usuApellido);
				});

				$("#nombre_encargado").autocomplete({
			      source: arreglo
			    });
			}

		},error:function(error){}
	});

	$.ajax({
		url:'listarSucursales',
		type:'GET',
		dataType:'JSON',

		success:function(data){

			$.each(data,function(i,item){
				$('.tbody_sucursal').append('<tr></tr>');
			});
		},error:function(error){
			alertify.error("Error al conectar con el servidor");
		}
	});

	// Agregar sucursal
	$('#agregarSucursal').submit(function(){
		$.ajax({
			url:'agregarSucursal',
			type:'POST',
			dataType:'JSON',
			data:{
				
			},

			success:function(data){
				
			},error:function(error){
				alertify.error("Error al conectar con el servidor");
			}
		});
	});
});
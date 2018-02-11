$(document).ready(function(){

	var tabla = "";

	// Functions
	function recorrer(data){
		$.each(data,function(i,item){
			$('.tbody_empleado').append('<tr class="tr_empleado"><td>'+item.+'</td></tr>');
		});
	}

	// Listar Empleados
	$.ajax({
		url:'listarEmpleados',
		type:'GET',
		dataType:'JSON',

		success:function(data){
			if(data != null && data != false){

			}
		},error:function(error){
			alertify.error("Error al conectar con el servidor");
		}

	});
});
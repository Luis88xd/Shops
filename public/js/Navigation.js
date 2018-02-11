$(document).ready(function(){
	$('#item_home').click(function(){
		window.location.href="Home";
	});

	$('#item_pos').click(function(){
		window.location.href="POS";
	});

	$('#item_inventario').click(function(){
		window.location.href="Inventario";
	});

	$('#item_reportes').click(function(){
		window.location.href="";
	});

	$('#item_ajustes').click(function(){
		window.location.href="Ajustes";
	});

	var contador = 0;

	$('.icon_bar').click(function(){
		if(contador == 0){
			$('.menu_left').addClass('change_menu');
			$('.content_menu_items').css('visibility','hidden');
			contador = 1;
		}else{
			contador = 0;
			$('.content_menu_items').css('visibility','visible');
			$('.menu_left').removeClass('change_menu');
		}

	});

	// --------------------------- Galeria -----------------------------------

	var token = $('#token').val();
	var contador = 0;


	$('body').on('change','#input_target',function(e){
		
		var imagenes = [];

	// function archivo(evt) {

      //var files = evt.target.files; // FileList object
      // var files = document.getElementById('input_target').target.files;
      var files = e.target.files;
    
      // Obtenemos la imagen del campo "file".
      for (var i = 0, f; f = files[i]; i++) {
        //Solo admitimos imágenes.
        if (!f.type.match('image.*')) {
        continue;
        }
    
        var reader = new FileReader();
    
        reader.onload = (function(theFile) {
        return function(e) {
        		
        	imagenes.push(e.target.result);

        };
        })(f);
        reader.readAsDataURL(f);
      }

      // var array_token = [{
      // 	_token:token
      // }];

      // imagenes.push(array_token);

      var formData = new FormData(imagenes);

      // document.getElementById("content_galery_modal").innerHTML += ['<li class="li_galery item_galery" style="background:url(', e.target.result,');background-size:cover;" title="', escape(theFile.name), '"></li>'].join('');
      // Guardar las imagenes
      $.ajax({
      	url:'subirImagen',
      	type:'POST',
      	dataType:'JSON',
      	data:formData,
		cache:false,
		processData:false,
		contentType:false,

      	// data:{
      	// 	_token:token,
      	// 	arreglo:imagenes
      	// },

      	success:function(data){
      		console.log(data);
      		if(data != null && data != false){

      		}
      	},
      	error:function(error){
      		alertify.error("Error al conectar con el servidor");
      	}
      });

    // }

       //addEventListener('change', archivo, false);


 	 	// var files = document.getElementById('input_target').files[0];
 		//  	for (var i = 0, f; f = files[i]; i++) {
		//     if (files) {
		//         var reader = new FileReader();
		//         reader.readAsText(files);
		//         reader.onload = function(e) {
		//             console.log(e.target.result);
		//         };
		//     }
		// }
	});


	$('.select_galery').click(function(){
		$('#Mgaleria').modal('toggle');

		$.ajax({
			url:'listarGaleria',
			type:'POST',
			dataType:'JSON',
			data:{
				_token:token,
				contador:contador
			},

			success:function(data){

				$('.li_galery').remove();

				if(data != null && data != false){
					var record = "";
					record += '<ul>';
							record += '<li class="li_galery"><label class="pointer"><span class="btn_galery2">Agregar&hellip; <input type="file" id="input_target" name="target[]" style="display: none;" accept="image/jpeg,image/png" multiple></span></label></li>';
						$.each(data,function(i,item){
							record += '<li class="li_galery item_galery" style="background-size:cover;background-image: url(uploads/products/'+item.galFoto+');"></li>';
						});
					record += '<ul>';

					$('#content_galery_modal').append(record);
				}else{

				}
			},error:function(error){

			}
		});
	});

	$('body').on('click','.item_galery',function(){
		// $('.li_galery').css('border-color','#FFF');

		$(this).css('border-color','#fa2d64');
	});
});
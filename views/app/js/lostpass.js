function goLostpass(){
	var connect, form, response, result,correo;

	correo = __('email').value;

	result = '<div class="alert alert-dismissible alert-danger">';
	result += '<button type="button" class="close" data-dismiss="alert">x</button>';
	result += '<h4>ERROR</h4>';
	if(correo == ''){
		result += '<p><strong>El campo correo no debe estar vacio</strong><p>';
		result += '</div>';
		__('_AJAX_LOSTPASS_').innerHTML = result;
	}else{
		var cadena = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i //correos	
		resp = cadena.test(correo);
		if(!resp){
			result += '<p><strong>El campo correo es incorrecto porfavor verificar</strong><p>';
			__('_AJAX_LOSTPASS_').innerHTML = result;
		}else{

			var base_url = window.location.origin;
			var parametros = {
            	"correo" : correo
            };
			var direct = base_url+"/correos/ajax.php?mode=lost";
			$.ajax({
		        data:  parametros, //datos que se envian a traves de ajax
		        url:   direct, //archivo que recibe la peticion
		        type:  'post', //método de envio
		        dataType:"json",
		        beforeSend: function () {
		        	result = '<div class="alert alert-dismissible alert-warning">';
					result += '<button type="button" class="close" data-dismiss="alert">x</button>';
					result += '<h4>Procesando...</h4>';
					result += '<p><strong>Estamos procesando tu registro...</strong></p>';
					result += '</div>';
					$('#_AJAX_LOSTPASS_').html(result);
		        },
		        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
		        	if(response.data == 1){
		        		result = '<div class="alert alert-dismissible alert-success">';
						result += '<h4>Correo enviado!</h4>';
						result += '<p><strong>Estamos redireccionandote...</strong></p>';
						result += '</div>';
						$("#_AJAX_LOSTPASS_").html(result);
		    			location.href = response.link;
		        	}else{
						$("#_AJAX_LOSTPASS_").html(response.data);
		        	}
		        }
			});
		}
	}
}

function runScriptLost(e) {
	if(e.keyCode == 13) {
		goLostpass();
	}
}
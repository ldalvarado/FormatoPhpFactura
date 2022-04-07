function eliminardatauser(parametro){
	swal({
	  	title: '¿Desea anular el usuario?',
	  	text: "Usted esta apunto de eliminar...",
	  	type: 'warning',
	  	showCancelButton: true,
	  	confirmButtonColor: 'red',
	  	cancelButtonColor: '#F44336',
	  	confirmButtonText: 'Si, Deseo eliminarlo!',
	  	cancelButtonText: 'No, Cancelar!'
	}).then(function () {
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=actdatastatus";
		$.ajax({
	        data:  parametro, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post', //método de envio
	        beforeSend: function () {
	        	var result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos intentando procesar su solicitud....</strong></p>';
				result += '</div>'
	            $("#_AJAX_TICK_").html(result);
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response == 1){
	        		var dato = '<div class="alert alert-dismissible alert-success">';
					dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
					dato += '<h4>CORRECTO</h4>';
					dato += '<p><strong>Usuario eliminado.</strong></p>';
					dato += '</div>';
					$("#_AJAX_TICK_").html(dato);
	    			location.reload();
	        	}else{
	        		var dato = '<div class="alert alert-dismissible alert-danger">';
					dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
					dato += '<h4>ERROR</h4>';
					dato += '<p><strong>El usuario no ha podido ser eliminado.</strong></p>';
					dato += '</div>';
					$("#_AJAX_TICK_").html(dato);
	        	}
	        }
		});
	});
}

function eliminardata(id){
	var parametro = {
		 "id" : id
	};
	eliminardatauser(parametro);
}



/*function enviar(form) {
    var persona = new FormData(form);
    var req = ajaxRequest("ajax.php?mode=regisfact");
    req.send(persona);
}

function ajaxRequest(url) {
  if (window.XMLHttpRequest) {
     var request = new XMLHttpRequest();
  } else if(window.ActiveXObject) {
     var request = new ActiveXObject("Microsoft.XMLHTTP");
  }

  request.onload = function(Event) {
	if (request.status == 200) {
		var response = JSON.parse(request.responseText);
			if(response.success){
				alert("Persona procesada exitosamente");
			} else {
				alert("Hubo un problema al procesar, codigo: " + response.status);
			}
		} 
	};
}
function enviar1(){
	//datos = new FormData($("#formfile")[0]);
	
	var direct = base_url+"/correos/ajax.php?mode=regisfact";
	datos = "hola";
	$.ajax({
        data:  datos, //datos que se envian a traves de ajax
        url:   direct, //archivo que recibe la peticion
        type:  'post', //método de envio
        contentType: false,
		processData: false,
        beforeSend: function () {
        	result = '<div class="alert alert-dismissible alert-warning">';
			result += '<button type="button" class="close" data-dismiss="alert">x</button>';
			result += '<h4>Procesando...</h4>';
			result += '<p><strong>Estamos procesando tu registro...</strong></p>';
			result += '</div>';
			$('#_AJAX_AGREGAR_ACCION').html(result);
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        	if(response.data == 1){
        		result = '<div class="alert alert-dismissible alert-success">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>CORRECTO</h4>';
				result += '<p><strong>Nia encontrado.</strong></p>';
				result += '</div>';
        		$("#_AJAX_AGREGAR_ACCION").html(result);
        	}else{
				
        	}
        }
	});
}*/

/*function enviar(){
	alert('hola');
}

function goRegistrarNia(data){
	var result;

	if(data == ''){
		result = '<div class="alert alert-dismissible alert-danger">';
		result += '<button type="button" class="close" data-dismiss="alert">x</button>';
		result += '<h4>ERROR</h4>';
		result += '<p><strong>Rellene el campo nia.</strong></p>';
		result += '</div>';
		__('_AJAX_AGREGAR_').innerHTML = result;
	}else{
		var parametro = {
			"data" : data
		};
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=regisfact";
		$.ajax({
	        data:  parametro, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post', //método de envio
	        beforeSend: function () {
	        	var result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos intentando logearte....</strong></p>';
				result += '</div>'
	            $("#_AJAX_AGREGAR_ACCION").html(result);
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response == 1){
	        		var dato = '<div class="alert alert-dismissible alert-success">';
					dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
					dato += '<h4>CORRECTO</h4>';
					dato += '<p><strong>Registro completado.</strong></p>';
					dato += '</div>';
					$("#_AJAX_AGREGAR_ACCION").html(dato);
	        	}else{
	        		var dato = '<div class="alert alert-dismissible alert-danger">';
					dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
					dato += '<h4>ERROR</h4>';
					dato += '<p><strong>'+response+'.</strong></p>';
					dato += '</div>';
					$("#_AJAX_AGREGAR_ACCION").html(dato);
	        	}
	        }
		});
	}
}*/







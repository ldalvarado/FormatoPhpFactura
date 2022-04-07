function goBuscarNia(){
	var result;
	var nia = __('nia').value;

	if(nia == ''){
		result = '<div class="alert alert-dismissible alert-danger">';
		result += '<button type="button" class="close" data-dismiss="alert">x</button>';
		result += '<h4>ERROR</h4>';
		result += '<p><strong>Rellene el campo nia.</strong></p>';
		result += '</div>';
		__('_AJAX_AGREGAR_').innerHTML = result;
	}else{
		var parametros = {
			"nia" : nia
		};
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=afi";
		$.ajax({
	        data:  parametros, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post', //método de envio
	        dataType:"json",
	        beforeSend: function () {
	        	result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos procesando...</strong></p>';
				result += '</div>';
				$('#_AJAX_AGREGAR_ACCION').html(result);
				$("#_AJAX_AGREGAR_").html('');
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response.data == 1){
	        		result = '<div class="alert alert-dismissible alert-success">';
					result += '<button type="button" class="close" data-dismiss="alert">x</button>';
					result += '<h4>CORRECTO</h4>';
					result += '<p><strong>Nia encontrado.</strong></p>';
					result += '</div>';
	        		$("#_AJAX_AGREGAR_ACCION").html(result);
	        		$("#_AJAX_AGREGAR_").html(response.tabla);
	        	}else{
					$("#_AJAX_AGREGAR_ACCION").html(response.data);
	        	}
	        }
		});
	}
}

function goBuscarNia(){
	var result;
	var nia = __('nia').value;

	if(nia == ''){
		result = '<div class="alert alert-dismissible alert-danger">';
		result += '<button type="button" class="close" data-dismiss="alert">x</button>';
		result += '<h4>ERROR</h4>';
		result += '<p><strong>Rellene el campo nia.</strong></p>';
		result += '</div>';
		__('_AJAX_AGREGAR_').innerHTML = result;
	}else{
		var parametros = {
			"nia" : nia
		};
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=afi";
		$.ajax({
	        data:  parametros, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post', //método de envio
	        dataType:"json",
	        beforeSend: function () {
	        	result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos procesando tu busqueda...</strong></p>';
				result += '</div>';
				$('#_AJAX_AGREGAR_ACCION').html(result);
				$("#_AJAX_AGREGAR_").html('');
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response.data == 1){
	        		result = '<div class="alert alert-dismissible alert-success">';
					result += '<button type="button" class="close" data-dismiss="alert">x</button>';
					result += '<h4>CORRECTO</h4>';
					result += '<p><strong>Nia encontrado.</strong></p>';
					result += '</div>';
	        		$("#_AJAX_AGREGAR_ACCION").html(result);
	        		$("#_AJAX_AGREGAR_").html(response.tabla);
	        	}else{
					$("#_AJAX_AGREGAR_ACCION").html(response.data);
	        	}
	        }
		});
	}
}

function runScriptBuscarNia(e) {
	if(e.keyCode == 13) {
		goBuscarNia();
	}
}

function agregarNia(nia){
	var niareal = __('niaid').value;
	var parametros = {
		"nia" : niareal
	};
	var base_url = window.location.origin;
	var direct = base_url+"/correos/ajax.php?mode=agre";
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
			$('#_AJAX_AGREGAR_ACCION').html(result);
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        	if(response.data == 1){
        		result = '<div class="alert alert-dismissible alert-success">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>CORRECTO</h4>';
				result += '<p><strong>Nia agregado.</strong></p>';
				result += '</div>';
        		$("#_AJAX_AGREGAR_ACCION").html(result);
        		location.reload();
        	}else{
				$("#_AJAX_AGREGAR_ACCION").html(response.data);
        	}
        }
	});
}

function actiondel(nia){
	swal({
	  	title: '¿Desea eliminar el nia de sus afiliaciones?',
	  	text: "Usted esta apunto de eliminar...",
	  	type: 'warning',
	  	showCancelButton: true,
	  	confirmButtonColor: '#03A9F4',
	  	cancelButtonColor: '#03A9F4',
	  	confirmButtonText: 'Si, Deseo eliminarlo!',
	  	cancelButtonText: 'No, Cancelar!'
	}, function() {

		var parametros = {
			"nia" : nia
		};
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=elimnia";
		$.ajax({
	        data:  parametros, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post', //método de envio
	        dataType:"json",
	        beforeSend: function () {
	        	result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos procesando...</strong></p>';
				result += '</div>';
				$('#_AJAX_AGREGAR_ACCION').html(result);
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response.data == 1){
	        		result = '<div class="alert alert-dismissible alert-success">';
					result += '<button type="button" class="close" data-dismiss="alert">x</button>';
					result += '<h4>CORRECTO</h4>';
					result += '<p><strong>Nia eliminado.</strong></p>';
					result += '</div>';
	        		$("#_AJAX_AGREGAR_ACCION").html(result);
	        		location.reload();
	        	}else{
					$("#_AJAX_AGREGAR_ACCION").html(response.data);
	        	}
	        }
		});
	});
}

function goConsultarNia(nia){
	var result;

	if(nia == ''){
		result = '<div class="alert alert-dismissible alert-danger">';
		result += '<button type="button" class="close" data-dismiss="alert">x</button>';
		result += '<h4>ERROR</h4>';
		result += '<p><strong>Rellene el campo nia.</strong></p>';
		result += '</div>';
		__('_AJAX_AGREGAR_').innerHTML = result;
	}else{
		var parametros = {
			"nia" : nia
		};
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=consul";
		$.ajax({
	        data:  parametros, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post', //método de envio
	        dataType:"json",
	        beforeSend: function () {
	        	result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos procesando tu consulta...</strong></p>';
				result += '</div>';
				$('#_AJAX_AGREGAR_ACCION').html(result);
				$("#_AJAX_AGREGAR_").html('');
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response.data == 1){
	        		result = '<div class="alert alert-dismissible alert-success">';
					result += '<button type="button" class="close" data-dismiss="alert">x</button>';
					result += '<h4>CORRECTO</h4>';
					result += '<p><strong>Nia encontrado.</strong></p>';
					result += '</div>';
	        		$("#_AJAX_AGREGAR_ACCION").html(result);
	        		$("#_AJAX_AGREGAR_").html(response.tabla);
	        	}else{
					$("#_AJAX_AGREGAR_ACCION").html(response.data);
					$("#_AJAX_AGREGAR_").html('');
	        	}
	        }
		});
	}
}

function goConsolaConsulta(){
	var nia;
	nia = __('consulta').value;
	goConsultarNia(nia);
}

function runScriptConsult(e) {
  	if(e.keyCode == 13) {
  		var nia = __('consulta').value;
    	goConsultarNia(nia);
  	}
}

function goBuscarActualizarNia(nia){
	var result;
	var nia = nia;

	if(nia == ''){
		result = '<div class="alert alert-dismissible alert-danger">';
		result += '<button type="button" class="close" data-dismiss="alert">x</button>';
		result += '<h4>ERROR</h4>';
		result += '<p><strong>Rellene el campo nia.</strong></p>';
		result += '</div>';
		__('_AJAX_AGREGAR_').innerHTML = result;
	}else{
		var parametros = {
			"nia" : nia
		};
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=buscact";
		$.ajax({
	        data:  parametros, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post', //método de envio
	        dataType:"json",
	        beforeSend: function () {
	        	result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos procesando...</strong></p>';
				result += '</div>';
				$('#_AJAX_AGREGAR_ACCION').html(result);
				$("#_AJAX_AGREGAR_").html('');
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response.data == 1){
	        		result = '<div class="alert alert-dismissible alert-success">';
					result += '<button type="button" class="close" data-dismiss="alert">x</button>';
					result += '<h4>CORRECTO</h4>';
					result += '<p><strong>Nia encontrado.</strong></p>';
					result += '</div>';
	        		$("#_AJAX_AGREGAR_ACCION").html(result);
	        		$("#_AJAX_AGREGAR_").html(response.tabla);
	        	}else{
					$("#_AJAX_AGREGAR_ACCION").html(response.data);
	        	}
	        }
		});
	}
}

function goBuscarNiaAct(nia_act){
	var result;
	var nia_busc = __('nia').value;

	if(nia == ''){
		result = '<div class="alert alert-dismissible alert-danger">';
		result += '<button type="button" class="close" data-dismiss="alert">x</button>';
		result += '<h4>ERROR</h4>';
		result += '<p><strong>Rellene el campo nia.</strong></p>';
		result += '</div>';
		__('_AJAX_AGREGAR_').innerHTML = result;
	}else{
		var parametros = {
			"nia_busc" : nia_busc,
			"nia_act" : nia_act
		};
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=actbusc";
		$.ajax({
	        data:  parametros, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post', //método de envio
	        dataType:"json",
	        beforeSend: function () {
	        	result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos procesando...</strong></p>';
				result += '</div>';
				$('#_AJAX_AGREGAR_ACCION').html(result);
				$("#_AJAX_ACT_NIA").html('');
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response.data == 1){
	        		result = '<div class="alert alert-dismissible alert-success">';
					result += '<button type="button" class="close" data-dismiss="alert">x</button>';
					result += '<h4>CORRECTO</h4>';
					result += '<p><strong>Nia encontrado.</strong></p>';
					result += '</div>';
	        		$("#_AJAX_AGREGAR_ACCION").html(result);
	        		$("#_AJAX_ACT_NIA").html(response.tabla);
	        	}else{
					$("#_AJAX_AGREGAR_ACCION").html(response.data);
	        	}
	        }
		});
	}
}
function runScriptBuscarActNia(e,nia){
	if(e.keyCode == 13) {
		goBuscarNiaAct(nia);
	}
}

function actualizarNia(nia_nuev,nia_act){
	var result;

	if(nia_nuev == '' || nia_act==''){
		result = '<div class="alert alert-dismissible alert-danger">';
		result += '<button type="button" class="close" data-dismiss="alert">x</button>';
		result += '<h4>ERROR</h4>';
		result += '<p><strong>Campos vacios.</strong></p>';
		result += '</div>';
		__('_AJAX_AGREGAR_').innerHTML = result;
	}else{
		var parametros = {
			"nia_nuev" : nia_nuev,
			"nia_act" : nia_act
		};
		var base_url = window.location.origin;
		var direct = base_url+"/correos/ajax.php?mode=actnia";
		$.ajax({
	        data:  parametros, //datos que se envian a traves de ajax
	        url:   direct, //archivo que recibe la peticion
	        type:  'post',
	        beforeSend: function () {
	        	var result = '<div class="alert alert-dismissible alert-warning">';
				result += '<button type="button" class="close" data-dismiss="alert">x</button>';
				result += '<h4>Procesando...</h4>';
				result += '<p><strong>Estamos intentando actualización....</strong></p>';
				result += '</div>'
	            $("#_AJAX_AGREGAR_ACCION").html(result);
	        },
	        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	        	if(response == 1){
	        		var dato = '<div class="alert alert-dismissible alert-success">';
					dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
					dato += '<h4>CORRECTO</h4>';
					dato += '<p><strong>Actualizado nia completado.</strong></p>';
					dato += '</div>';
					location.reload();
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
}
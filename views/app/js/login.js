
function goLogin() {

	var user = __('user_login').value;
	var pass = __('pass_login').value;
	var direct = base_url+"/correos/ajax.php?mode=login";
	
	var parametros = {
		'user' : user,
		'pass' : pass
	}

	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   direct, //archivo que recibe la peticion
		type:  'post',
        beforeSend: function () {
        	var result = '<div class="alert alert-dismissible alert-warning">';
			result += '<button type="button" class="close" data-dismiss="alert">x</button>';
			result += '<h4>Procesando...</h4>';
			result += '<p><strong>Estamos intentando logearte....</strong></p>';
			result += '</div>'
            $("#_AJAX_LOGIN_").html(result);
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        	if(response == 1){
        		var dato = '<div class="alert alert-dismissible alert-success">';
				dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
				dato += '<h4>CORRECTO</h4>';
				dato += '<p><strong>Usuario logeado.</strong></p>';
				dato += '</div>';
				location.reload();
				$("#_AJAX_LOGIN_").html(dato);
        	}else{
				$("#_AJAX_LOGIN_").html(response);
        	}
        }
	});
}

function runScriptLogin(e) {
  if(e.keyCode == 13) {
    goLogin();
  }
}
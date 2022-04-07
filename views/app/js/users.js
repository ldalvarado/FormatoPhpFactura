function goCambioData(){
	var connect, form, response, result;
	var login,ced,primer_nombre,primer_apellido,segundo_nombre,segundo_apellido,primer_contra,segunda_contra;

	login = __('users_act').value;
	correo = __('email').value;
	ced = __('ced_act').value;
	primer_nombre = __('primer_nom_act').value;
	segundo_nombre = __('seg_nom_act').value;
	primer_apellido = __('primer_ape_act').value;
	segundo_apellido = __('seg_ape_act').value;
	primer_contra = __('pri_con_act').value;
	segunda_contra = __('seg_con_act').value;
	telefono = __('telf_act').value;

	var sexo = $('input:radio[name=optionsSex]:checked').val();
	var fecha = $('#fecha').val();

	result = '<div class="alert alert-dismissible alert-danger">';
	result += '<button type="button" class="close" data-dismiss="alert">x</button>';
	result += '<h4>ERROR</h4>';

	if(primer_contra == '' || segunda_contra==''){
		result += '<p><strong>Revisar campos contraseña original no deben estar vacios.</strong></p>';
		result += '</div>';
		__('_AJAX_ACT_').innerHTML = result;
	}
	else{
		if(primer_contra != segunda_contra){
			result += '<p><strong>Revisar campos contraseña original no son iguales.</strong></p>';
			result += '</div>';
			__('_AJAX_ACT_').innerHTML = result;
		}else{
			var cadena_login = /[a-zA-Z]{5,20}/;
			var cadena = /[A-Za-z]{4,20}/;
			var cadena2 = /[A-Za-z0-9]{5,20}/;
			var i = 0;

			var resp = cadena_login.test(login);

			if(!resp || (login.length < 5 || login.length > 20)){
				result += '<p><strong>El Login solo contendra letras y tiene que contener entre 5 y 20 letras.</strong></p>';
				i = 1;
			}
			if (i == 1) {
				result += '</div>';
				__('_AJAX_ACT_').innerHTML = result;
			}
			resp = cadena.test(primer_nombre);
			if(!resp){
				result += ' <p><strong>Segundo nombre solo tiene caracteres y tiene que contener entre 4 y 20 letras.</strong></p> ';
				i = 1;
			}
			if(segundo_nombre != ''){
				resp = cadena.test(segundo_nombre);
				if(!resp){
					result += ' <p><strong>Segundo nombre solo tiene caracteres y tiene que contener entre 4 y 20 letras.</strong></p> ';
					i = 1;
				}
			}
			resp = cadena.test(primer_apellido);
			if(!resp){
				result += ' <p><strong>Segundo nombre solo tiene caracteres y tiene que contener entre 4 y 20 letras.</strong></p> ';
				i = 1;
			}
			if(segundo_apellido != ''){
				resp = cadena.test(segundo_apellido);
				if(!resp){
					result += ' <p><strong>Segundo apellido solo tiene caracteres y tiene que contener entre 4 y 20 letras.</strong></p> ';
					i = 1;
				}
			}
			resp = cadena2.test(primer_contra);
			if(!resp){
				result += ' <p><strong>Campo de contraseña incorrecto por favor verifique si esta usando letras y/o numero. Ademas de contener mas de 5 longitudes y no mayor a 20</strong></p> ';
				i = 1;
			}
			resp = cadena2.test(segunda_contra);
			if(!resp){
				result += ' <p><strong>Campo de contraseña incorrecto por favor verifique si esta usando letras y/o numero. Ademas de contener mas de 5 longitudes y no mayor a 20</strong></p> ';
				i = 1;
			}
			var variable = validate(fecha);
			if(variable == false){
				result += '<p><strong>Verifique la fecha porfavor</strong></p>';
				i = 1;
			}
			if (i == 1) {
				result += '</div>';
				__('_AJAX_ACT_').innerHTML = result;
			}
			else{
				var nacionalidad =  $("#nacionalidad option:selected").text();

				form = {
					'login' : login,
					'password' : segunda_contra,
					'nacionalidad' : nacionalidad,
					'cedula' : ced,
					'primer_nombre' : primer_nombre,
					'primer_apellido' : primer_apellido,
					'segundo_nombre' : segundo_nombre,
					'segundo_apellido' : segundo_apellido,
					'correo' : correo,
					'telefono' : telefono,
					'nacimiento' : fecha,
					'sexo' : sexo
				};

				var direct = "http://localhost/correos/ajax.php?mode=actuser";
		        $.ajax({
		            data:  form, //datos que se envian a traves de ajax
			        url:   direct, //archivo que recibe la peticion
			        type:  'post',
			        beforeSend: function () {
			        	var result = '<div class="alert alert-dismissible alert-warning">';
						result += '<button type="button" class="close" data-dismiss="alert">x</button>';
						result += '<h4>Procesando...</h4>';
						result += '<p><strong>Estamos intentando logearte....</strong></p>';
						result += '</div>'
			            $("#_AJAX_ACT_").html(result);
			        },
		            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			        	if(response == 1){
			        		var dato = '<div class="alert alert-dismissible alert-success">';
							dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
							dato += '<h4>CORRECTO</h4>';
							dato += '<p><strong>Actualizado los datos del usuario.</strong></p>';
							dato += '</div>';
							$("#_AJAX_ACT_").html(dato);
			        	}else{
			        		var dato = '<div class="alert alert-dismissible alert-danger">';
							dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
							dato += '<h4>ERROR</h4>';
							dato += '<p><strong>'+response+'.</strong></p>';
							dato += '</div>';
							$("#_AJAX_ACT_").html(dato);
			        	}
			        }
		        });
			}
		}
	}
	
}
function runScriptActData(e) {
	if(e.keyCode == 13) {
		goCambioData();
	}
}

function goCambioContra(){
	var result;
	var primer_contra,segunda_contra,original;

	primer_contra = __('nuev_pass').value;
	segunda_contra = __('confir_nuev').value;
	original = __('actual_pass').value;

	result = '<div class="alert alert-dismissible alert-danger">';
	result += '<button type="button" class="close" data-dismiss="alert">x</button>';
	result += '<h4>ERROR</h4>';

	if(primer_contra != '' && segunda_contra != '' && original != ''){
		if(primer_contra != segunda_contra){
			result += '<p><strong>Las contraseñas deben coincidir.</strong></p>';
			result += '</div>';
			__('_AJAX_ACT_').innerHTML = result;
		}else{
			var cadena = /[A-Za-z0-9]{5,20}/
			var validador = 0;
			var resp = cadena.test(primer_contra);
			if(!resp){
				result += '<p><strong>La primera contraseña solo contendra letras y tiene que contener entre 5 y 20 letras.</strong></p>';
				validador = 1;
			}
			resp = cadena.test(segunda_contra);
			if(!resp){
				result += '<p><strong>La segunda contraseña solo contendra letras y tiene que contener entre 5 y 20 letras.</strong></p>';
				validador = 1;
			}
			resp = cadena.test(original);
			if(!resp){
				result += '<p><strong>La tercera contraseña solo contendra letras y tiene que contener entre 5 y 20 letras.</strong></p>';
				validador = 1;
			}
			if(validador == 1){
				result += '</div>';
				__('_AJAX_ACT_').innerHTML = result;
			}else{
				var parametros = {
                	"actual_pass" : original,
                	"nuev_pass" : primer_contra
				};
				var direct = base_url+"/correos/ajax.php?mode=actpass";

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
			            $("#_AJAX_ACT_").html(result);
			        },
			        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			        	if(response == 1){
			        		var dato = '<div class="alert alert-dismissible alert-success">';
							dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
							dato += '<h4>CORRECTO</h4>';
							dato += '<p><strong>Actualizado la contraseña.</strong></p>';
							dato += '</div>';
							location.reload();
							$("#_AJAX_ACT_").html(dato);
			        	}else{
			        		var dato = '<div class="alert alert-dismissible alert-danger">';
							dato += '<button type="button" class="close" data-dismiss="alert">x</button>';
							dato += '<h4>ERROR</h4>';
							dato += '<p><strong>'+response+'.</strong></p>';
							dato += '</div>';
							$("#_AJAX_ACT_").html(dato);
			        	}
			        }
				});
			}
		}
	}else{
		result += '<p><strong>Error llene todos los campos.</strong></p>';
		result += '</div>';
		__('_AJAX_ACT_').innerHTML = result;
	}
}

function runScriptActContra(e) {
	if(e.keyCode == 13) {
		goCambioContra();
	}
}
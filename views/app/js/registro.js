function goRegistro(){
	var result;
	var login,ced,primer_nombre,primer_apellido,segundo_nombre,segundo_apellido,primer_contra,segunda_contra,correo;

	login = __('users_reg').value;
	correo = __('correo').value;
	ced = __('ced_reg').value;
	primer_nombre = __('primer_nom_reg').value;
	segundo_nombre = __('seg_nom_reg').value;
	primer_apellido = __('primer_ape_reg').value;
	segundo_apellido = __('seg_ape_reg').value;
	primer_contra = __('primer_con_reg').value;
	segunda_contra = __('seg_con_reg').value;
	telefono = __('telf_reg').value;

	var sexo = $('input:radio[name=optionsSex]:checked').val();
	var fecha = $('#fecha_reg').val();
	var verificador = 0;
	if(((primer_nombre != "" && segundo_nombre != "") || (primer_nombre != "" && segundo_apellido != "")) && primer_apellido==""){
		verificador = 1;
	}
	if(((primer_apellido != "" && segundo_nombre != "") || (primer_apellido != "" && segundo_apellido != "")) && primer_nombre==""){
		verificador = 2;
	}
	if(verificador == 0 && login != '' && ced != '' && primer_nombre != '' && primer_apellido!='' && 
		 primer_contra !='' && segunda_contra!=''){

		result = '<div class="alert alert-dismissible alert-danger">';
		result += '<button type="button" class="close" data-dismiss="alert">x</button>';
		result += '<h4>ERROR</h4>';

		if(primer_contra != segunda_contra){
			result += '<p><strong>Las contraseñas deben coincidir.</strong></p>';
			result += '</div>';
			__('_AJAX_REG_').innerHTML = result;
		}else{
			var cadena1 = /[A-Za-z]{5,20}/; //login
			var cadena2 = /[0-9]{6,10}/;    //cedula
			var cadena3 = /[A-Za-z0-9]{9,20}/ //contraseña
			var cadena4 = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i //correos
			var cadena5 = /[0-9]{11}/
			var cadena6 = /[A-Za-z]{3,20}/
			var i = 0;

			resp = cadena1.test(login);
			if(!resp){
				result += '<p><strong>El Login solo contendra letras y tiene que contener entre 5 y 20 letras.</strong></p>';
				i = 1;
			}

			//9559658
			//424-577179

			resp = cadena2.test(ced);
			if(!resp){
				result += '<p><strong>La cedula solo contendra numeros ademas tiene que contener entre 7 y 10 numeros.</strong></p>';
				i = 1;
			}
			resp = cadena6.test(primer_nombre);						
			if(!resp){
				result += '<p><strong>Primer nombre tiene que contener entre 4 y 20 letras.</strong></p>';
				i = 1;
			}
			if(segundo_nombre != ''){
				resp = cadena6.test(segundo_nombre);
				if(!resp){
					result += '<p><strong>Segundo nombre tiene que contener entre 4 y 20 letras.</strong></p>';
					i = 1;
				}
			}
			resp = cadena6.test(primer_apellido);
			if(!resp){
				result += '<p><strong>Primer apellido tiene que contener entre 4 y 20 letras.</strong></p>';
				i = 1;
			}
			if(segundo_apellido != ''){
				resp = cadena6.test(segundo_apellido);
				if(!resp){
					result += '<p><strong>Segundo apellido tiene que contener entre 4 y 20 letras.</strong></p>';
					i = 1;
				}
			}
			resp = cadena3.test(primer_contra);
			if(!resp){
				result += '<p><strong>La contraseña solo contendra letras y numeros ademas tiene que contener entre 9 y 20 alfanumericos.</strong></p>';
				i = 1;
			}
			resp = cadena4.test(correo);
			if(!resp){
				result += '<p><strong>El campo correo es incorrecto porfavor verificar</strong><p>';
				i = 1;
			}
			if(fecha != ''){
				var variable = validate(fecha);
				if(variable == false){
					result += '<p><strong>Verifique la fecha porfavor</strong></p>';
					i = 1;
				}
			}
			resp = cadena5.test(telefono);
			if(!resp){
				result += '<p><strong>El telefono no puede tener letras o ser mayor a 11 digitos</strong></p>';
				i = 1;
			}
			var base_url = window.location.origin;

			result += '</div>';
			if(i == 1){
				__('_AJAX_REG_').innerHTML = result;
			}else{
				var nacionalidad =  $("#nacionalidad option:selected").text();
				
				var parametros = {
                	"login" : login,
                	"password" : primer_contra,
                	"correo" : correo,
                	"primer_nombre" : primer_nombre,
                	"segundo_nombre" : segundo_nombre,
                	"primer_apellido" : primer_apellido,
                	"segundo_apellido" : segundo_apellido,
                	"nacimiento" : fecha,
                	"nacionalidad" : nacionalidad,
                	"sexo" : sexo,
                	"cedula" : ced,
                	"telefono" : telefono
				};
				var direct = base_url+"/correos/ajax.php?mode=reg";
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
						$('#_AJAX_REG_').html(result);
			        },
			        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			        	if(response.data == 1){
			        		result = '<div class="alert alert-dismissible alert-success">';
							result += '<button type="button" class="close" data-dismiss="alert">x</button>';
							result += '<h4>CORRECTO</h4>';
							result += '<p><strong>Registro completo.</strong></p>';
							result += '</div>';
							$("#_AJAX_REG_").html(result);
			    			location.href = response.link;
			        	}else{
							$("#_AJAX_REG_").html(response.data);
			        	}
			        }
				});
			}
		}
	}else{
		if(verificador == 0){
			result = '<div class="alert alert-dismissible alert-danger">';
			result += '<button type="button" class="close" data-dismiss="alert">x</button>';
			result += '<h4>ERROR</h4>';
			result += '<p><strong>Todos los campos deben estar llenos.</strong></p>';
			result += '</div>';
			__('_AJAX_REG_').innerHTML = result;
		}else if(verificador==1){
			result = '<div class="alert alert-dismissible alert-danger">';
			result += '<button type="button" class="close" data-dismiss="alert">x</button>';
			result += '<h4>ERROR</h4>';
			result += '<p><strong>Rellene el primer apellido.</strong></p>';
			result += '</div>';
			__('_AJAX_REG_').innerHTML = result;
		}else if(verificador == 2){
			result = '<div class="alert alert-dismissible alert-danger">';
			result += '<button type="button" class="close" data-dismiss="alert">x</button>';
			result += '<h4>ERROR</h4>';
			result += '<p><strong>Rellene el primer nombre.</strong></p>';
			result += '</div>';
			__('_AJAX_REG_').innerHTML = result;
		}
	}
}

function runScriptReg(e) {
	if(e.keyCode == 13) {
		goRegistro();
	}
}





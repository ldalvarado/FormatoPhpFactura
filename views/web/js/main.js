$(document).ready(function() {
    $('#form').validate({
        rules: {
            input1: {
                required: true
            },
            input2: {
                minlength: 5,
                required: true
            },
            input3: {
                maxlength: 5,
                required: true
            },
            input4: {
                required: true,
                minlength: 4,
                maxlength: 8
            },
            input5: {
                required: true,
                min: 5
            },
            input6: {
                required: true,
                range: [5, 50]
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
            input10: {
                required: true,
                url: true
            },
            input11: {
                required: true,
                digits: true
            },
            input12: {
                required: true,
                phoneUS: true
            },
            input13: {
                required: true,
                minlength: 5
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.text('CORRECTO').addClass('valid')
                .closest('.form-group').removeClass('error').addClass('success');
        },
        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            login: {
                required: "Ingrese su login",
                minlength: "Su login debe ser superior a 5 o mas letras"
            },
            password: {
                required: "Ingrese una contraseña valido",
                minlength: "Tu contraseña debe ser superior a 5 letras o numeros"
            },
            confirm_password: {
                required: "Ingrese una contraseña valido",
                minlength: "Tu contraseña debe ser superior a 5 letras o numeros",
                equalTo: "Las contraseñas deben ser iguales"
            },
            email: "Ingrese un correo electronico valido",
            agree: "Please accept our policy",
            topic: "Please select at least 2 topics"
        }
    });
});
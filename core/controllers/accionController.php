<?php 

	if(isset($_GET)){
		decode_get2($_SERVER["REQUEST_URI"]);
		if(isset($_GET['validacion'])){
			$validar = $_GET['validacion'];
			if($validar == 'true'){
				$accion = "Registro de cuenta";
				$variable = "Su cuenta ha sido verificada";
				include(HTML_DIR . 'public/accion.php');
			}elseif($validar == 'false'){
				$accion = "Registro de cuenta";
				$variable = "Su cuenta ya ha sido verificada";
				include(HTML_DIR . 'public/accion.php');
			}else{
				$accion = "ERROR FATAL";
				$variable = "ERROR";
				include(HTML_DIR . 'public/accion.php');
			}
		}elseif(isset($_GET['confirmacion'])){
			$accion = "Confirmacion de cuenta";
			$variable = "Su cuenta ha sido registrada por favor confirme su correo";
			include(HTML_DIR . 'public/accion.php');
		}elseif(isset($_GET['recuperacion'])){
			$accion = "Restablecimiento de contraseña";
			$variable = "Se ha enviado un correo de verificacion para el cambio de su contraseña";
			include(HTML_DIR . 'public/accion.php');
		}
		else{
			header('location: ?view=error');
		}
	}else{
		header('location: ?view=index');
	}
	

?>

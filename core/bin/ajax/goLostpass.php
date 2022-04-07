<?php 

	
	$db = new Conexion();
	$correo = $db->real_escape_string($_POST['correo']);
	$sql = $db->query("SELECT id,login FROM usuario WHERE correo='$correo' LIMIT 1;");
	$HTML = array(
		'data'  => "",
		'link'   => ""
	);
	if($db->rows($sql) > 0) {
		$data = $db->recorrer($sql);
		$id = $data[0];
		$login = $data[1];
		$keypass = md5(time());
		$new_pass = strtoupper(substr(sha1(time()),0,8));
		$link = APP_URL . 'correo.php?view=recuperacion&key=' . $keypass;

		$mail = new PHPMailer;

		if (empty($errors)) {
	    	$mail = new PHPMailer(true); 
			try {
			    $mail->isSMTP();
			    $mail->CharSet = "UTF-8";                                 
			    $mail->SMTPDebug = 0;
				$mail->Host = PHPMAILER_HOST;
				$mail->Port = PHPMAILER_PORT;
				$mail->SMTPSecure = 'tls';
				$mail->SMTPAuth = true;

				$mail->Username = PHPMAILER_USER;
				$mail->Password = PHPMAILER_PASS;

			    $mail->SetFrom(PHPMAILER_USER, APP_TITLE);;
			    $mail->AddAddress($correo, $login);    // Add a recipient

			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject =  "Recuperación de la contraseña";
				$mail->Body    = LostpassTemplate($login,$link);
				$mail->AltBody = 'Hola ' . $login . ' para recuperar tu contraseña debes ir a este enlace: ' . $link . ' , si no has solicitado un cambio de contraseña no necesitas hacer nada.';

			    if(!$mail->send()) {
			        $HTML['data'] = 'El mensaje no se a enviado a su correo.';
			        $HTML['data'] = 'Error: ' . $mail->ErrorInfo;
			    } else {
			    	$db->query("UPDATE usuario SET keypass='$keypass', new_pass='$new_pass' WHERE id='$id';");	
			        $HTML['data'] = 1;
			        $datos2= encode_this("recuperacion=true&correo=$correo");
		        	$HTML['link'] = APP_URL .'correo.php?view=accion&'. $datos2;
			    }			    
			    $errors[] = "Send mail sucsessfully";
			} catch (phpmailerException $e) {
			    $errors[] = $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
			    $errors[] = $e->getMessage(); //Boring error messages from anything else!
			}
		}
	}else{
		$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<h4>ERROR:</h4> <p>
			El email colocado no existe en el sistema
		</p></div>';
	}
	$db->liberar($sql);
	$db->close();

	echo json_encode($HTML);


?>
<?php 

$db = new Conexion();

$pass = Encrypt($_POST['password']);
$login = $db->real_escape_string($_POST['login']);
$cedula = $_POST['nacionalidad'];
$cedula .= '-';
$cedula .= $db->real_escape_string($_POST['cedula']);
$correo = $db->real_escape_string($_POST['correo']);

$HTML = array(
	'data'  => "",
	'link'   => ""
);

$sql = $db->query("SELECT login,cedula FROM usuario WHERE login='".$login."' OR correo='".$correo."' OR cedula= '".$cedula."' LIMIT 1;");

if($db->rows($sql) == 0) {
	$keyreg = md5(date("Y-m-d H:i:s"));

	$datos= encode_this("key=$keyreg&usuario=$login");
	$link = APP_URL . 'correo.php?view=activar&' . $datos;

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
		    //$mail->addReplyTo($fields['email'], $fields['name']);
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject =  "Activación de tu cuenta";
			$mail->Body    = EmailTemplate($login,$link);
			$mail->AltBody = 'Hola ' . $login . ' para activar tu cuenta accede al siguiente elance: ' . $link;

		    if(!$mail->send()) {
		        $HTML['data'] = 'El mensaje no se a enviado a su correo.';
		        $HTML['data'] ='Error: ' . $mail->ErrorInfo;
		    } else {
		    	$primer_nombre = $db->real_escape_string($_POST['primer_nombre']);
				$segundo_nombre = $db->real_escape_string($_POST['segundo_nombre']);
				$primer_apellido = $db->real_escape_string($_POST['primer_apellido']);
				$segundo_apellido = $db->real_escape_string($_POST['segundo_apellido']);
				$telefono = "+58";
				$telefono .= $db->real_escape_string($_POST['telefono']);
				$nacimiento = $_POST['nacimiento'];
				$sexo = $_POST['sexo'];

				$fecha_reg = date("Y-m-d H:i:s");
			    $db->query("INSERT INTO usuario (id,login,cedula,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,nacimiento,sexo,password,status,keyreg,keypass,new_pass,fecha_creacion,nivel,correo,telefono) VALUES ('','".$login."','".$cedula."','".$primer_nombre."','".$segundo_nombre."','".$primer_apellido."','".$segundo_apellido."','".$nacimiento."','".$sexo."','".$pass."','2','".$keyreg."','','','".$fecha_reg."','1','".$correo."','".$telefono."');");

			    $sql_2 = $db->query("SELECT MAX(id) AS id FROM usuario;");
			    $id = $db->recorrer($sql_2)[0];
			    $db->liberar($sql_2);
			    
		        $HTML['data'] = 1;
		        $datos2= encode_this("confirmacion=true&correo=$correo");
		        $HTML['link'] = APP_URL .'correo.php?view=accion&'. $datos2;
		    }
		    $errors[] = "Send mail sucsessfully";
		} catch (phpmailerException $e) {
		    $errors[] = $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
		    $errors[] = $e->getMessage(); //Boring error messages from anything else!
		}
	}

} else {
	$usuario = $db->recorrer($sql)[0];
	$ced = $db->recorrer($sql)[1];
	if(strtolower($login) == strtolower($usuario)){
    	$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
    	<button type="button" class="close" data-dismiss="alert">x</button>
    	<strong>ERROR:</strong> El usuario ingresado ya existe.
  		</div>';
  	} elseif(strtolower($ced) == strtolower($cedula)) {
  		$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
    	<button type="button" class="close" data-dismiss="alert">x</button>
    	<strong>ERROR:</strong> La cedula del usuario ya existe.
  		</div>';
  	}
  	else {
	    $HTML['data'] = '<div class="alert alert-dismissible alert-danger">
	    <button type="button" class="close" data-dismiss="alert">x</button>
	    <strong>ERROR:</strong> El email ingresado ya existe.
	  	</div>';
  	}
}
$db->liberar($sql);
$db->close();

echo json_encode($HTML);

?>
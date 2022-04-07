<?php 

	
	if(!empty($_POST['user']) and !empty($_POST['pass'])) {
		$db = new Conexion();
		$HTML = "";
		$data = $db->real_escape_string($_POST['user']);
		$pass = Encrypt($_POST['pass']);
		$sql = $db->query("SELECT id FROM usuario WHERE (login='".$data."' OR correo='".$data."') AND password='".$pass."' LIMIT 1;");
		if($db->rows($sql) > 0) {
			if($_POST['sesion']) { ini_set('session.cookie_lifetime', time() + (60*60*24)); }
		    $_SESSION['app_id'] = $db->recorrer($sql)[0];
		    $_SESSION['time_online'] = time() - (60*6);
			$HTML = 1;
		}else{
			$HTML = '<div class="alert alert-dismissible alert-danger">
	  		<button type="button" class="close" data-dismiss="alert">x</button>
	  		<strong>ERROR:</strong> Credenciales incorrectas.
			</div>';
		}
		$db->liberar($sql);
  		$db->close();
	}else{
		$HTML = '<div class="alert alert-dismissible alert-danger">
	  	<button type="button" class="close" data-dismiss="alert">x</button>
	  	<strong>ERROR:</strong> Todos los datos deben estar llenos.
		</div>';
	}

	echo $HTML;


?>
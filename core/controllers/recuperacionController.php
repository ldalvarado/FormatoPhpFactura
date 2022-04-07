<?php 

	if(!isset($_SESSION['app_id']) and isset($_GET['key'])) {
		$db = new Conexion();
		$keypass = $db->real_escape_string($_GET['key']);
		$sql = $db->query("SELECT id,new_pass FROM usuario WHERE keypass='$keypass' LIMIT 1;");
		$new_pass = 'ASASASSAS';
		if($db->rows($sql) > 0) {
			$data = $db->recorrer($sql);
			$id_user = $data[0];
			$new_pass = Encrypt($data[1]);
			$password = $data[1];
			$accion = "Contraseña restablecida";
	    	$db->query("UPDATE usuario SET keypass='',new_pass='',password='$new_pass' WHERE id='$id_user';");
	   		include('html/lostpass_mensaje.php');
		}else{
			header('location: correo.php?view=index');
		}
		$db->liberar($sql);
	  	$db->close();
  	}else{
  		header('location: correo.php?view=index');
  	}
?>
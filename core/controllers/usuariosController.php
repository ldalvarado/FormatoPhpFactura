<?php 

	
	
	if(!isset($_SESSION['app_id'])) {
		header('location: correo.php?view=index');
	}else{
		$db = new Conexion();
		if($_users[$_SESSION['app_id']]['nivel'] == 3){
			$id = $_SESSION['app_id'];
			$sql_users = $db->query("SELECT * FROM usuario WHERE id!='$id';");
			include(HTML_DIR . 'admi/usuarios.php');
		}else{
			header('location: correo.php?view=index');
		}
		$db->close();
	}
	


?>
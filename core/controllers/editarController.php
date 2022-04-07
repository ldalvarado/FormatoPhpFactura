<?php 

	if(!isset($_SESSION['app_id'])) {
		header('location: correo.php?view=index');
	}else{
		$db = new Conexion();
		if($_users[$_SESSION['app_id']]['nivel'] == 3){
			decode_get2($_SERVER["REQUEST_URI"]);
			$id = $_GET['id'];
			include(HTML_DIR . 'admi/data.php');
		}else{
			header('location: correo.php?view=index');
		}
		$db->close();
	}

?>
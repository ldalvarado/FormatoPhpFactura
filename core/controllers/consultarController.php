<?php 

	if(!isset($_SESSION['app_id'])) {
		include(HTML_DIR . 'public/login.php');
	}else{
		$db = new Conexion();
		$nias = new Nias();
		$sql_datos = $nias->Consulta($_SESSION['app_id'],'activos');
		include(HTML_DIR . 'users/consulta.php');
		$db->liberar($sql_datos);
		$db->close();
	}
	



?>
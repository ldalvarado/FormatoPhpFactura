<?php 

	
	
	if(!isset($_SESSION['app_id'])) {
		header('location: correo.php?view=index');
		
	}else{
		$db = new Conexion();
		$nias = new Nias();
		$sql_datos = $nias->Consulta($_SESSION['app_id'],'activos');
		include(HTML_DIR . 'users/afiliados.php');
		$db->liberar($sql_datos);
    	$db->close();
	}



?>
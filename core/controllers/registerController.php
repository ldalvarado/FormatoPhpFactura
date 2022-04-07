<?php 

if(!isset($_SESSION['app_id'])) {
	$db = new Conexion();
	include(HTML_DIR . 'index/registro.php');
	$db->close();
}else {
	header('location: correo.php?view=index');
}

?>
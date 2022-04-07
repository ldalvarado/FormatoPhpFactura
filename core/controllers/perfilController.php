<?php 

$db = new Conexion();
if(!isset($_SESSION['app_id'])) {
	include(HTML_DIR . 'public/login.php');
	
}else{
	include(HTML_DIR . 'users/perfil.php');
}
$db->close();


?>
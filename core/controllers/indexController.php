<?php

$db = new Conexion();
if(!isset($_SESSION['app_id'])) {
	include(HTML_DIR . 'public/login.php');
}else{
	include(HTML_DIR . 'index/index.php');
}
$db->close();

?>

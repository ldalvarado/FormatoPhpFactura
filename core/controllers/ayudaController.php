<?php 

	if (!isset($_SESSION['app_id'])) {
		header('location: ?view=index');
	}else{
		include(HTML_DIR . 'users/ayuda.php');
	}

?>
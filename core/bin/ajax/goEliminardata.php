<?php 

	if(isset($_SESSION['app_id'])){
		$db = new Conexion();
		if($_users[$_SESSION['app_id']]['nivel'] == 3){
			$id = $_POST['id'];
			$query = $db->query("SELECT id FROM solicitud_nia WHERE id='".$id."' AND estado='1' LIMIT 1;");
			if($db->rows($query) > 0){
				$db->query("UPDATE `usuario` SET `status`='0' WHERE id='$id';");
				echo 1;
			}else{
				echo '<div class="alert alert-dismissible alert-danger">'
					'<button type="button" class="close" data-dismiss="alert">x</button>'
					'<h4>ERROR</h4>'
		 		 	'<p><strong>Este usuario no existe o ya ha sido eliminado.</strong></p>'
			     '</div>';
			}
		}else{
			echo '<div class="alert alert-dismissible alert-danger">'
					'<button type="button" class="close" data-dismiss="alert">x</button>'
					'<h4>ERROR</h4>'
		 		 	'<p><strong>Usted no cumple con los requisitos necesarios para esta función.</strong></p>'
			     '</div>';
		}
		$db->close();
	}else{
		echo '<div class="alert alert-dismissible alert-danger">'
				'<button type="button" class="close" data-dismiss="alert">x</button>'
				'<h4>ERROR</h4>'
		 		'<p><strong>Usted no cumple con los requisitos necesarios para esta función.</strong></p>'
			 '</div>';
	}

?>
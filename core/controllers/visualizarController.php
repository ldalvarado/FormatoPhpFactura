<?php 

	if(isset($_GET)){
		decode_get2($_SERVER["REQUEST_URI"]);
		try {
			if(isset($_GET['nia'])){
				$data = $_GET['nia'];
				$db = new Conexion();
				$sql = $db->query("SELECT n.id FROM usuario u INNER JOIN solicitud_nia n ON u.id = n.usuario_id WHERE u.id = '".$_SESSION['app_id']."' AND n.estado='1' AND n.nia = '".$data."' LIMIT 1;");
				if($db->rows($sql) > 0){
					Ver_factura($data);
				}else{
					echo '<div class="alert alert-dismissible alert-danger">
				    <button type="button" class="close" data-dismiss="alert">x</button>
				    <strong>ERROR:</strong> El nia del sistema no esta asociado a su cuenta.
				 	</div>';
				}
				$db->liberar($sql);
			}else{
				header('location: correo.php?view=error');
			}
		} catch (Exception $e) {
			header('location: correo.php?view=error');
		}
	}else{
		header('location: correo.php?view=error');
	}


?>
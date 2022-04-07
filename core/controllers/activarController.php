<?php 
	if(isset($_GET)){
		decode_get2($_SERVER["REQUEST_URI"]);
		if(isset($_GET['key'],$_GET['usuario'])){	
			$db = new Conexion();
			$key = $_GET['key'];
			$login = $_GET['usuario'];

			$sql = $db->query("SELECT id FROM usuario WHERE login='$login'  LIMIT 1;");
			if($db->rows($sql) > 0) {
				$sql = $db->query("SELECT id FROM usuario WHERE status= '1' and login='$login' LIMIT 1;");
				if($db->rows($sql) > 0){
					$datos= encode_this("validacion=false");
					header('location: ?view=accion&' . $datos);
				}else{
					$datos= encode_this("validacion=true");
					$db->query("UPDATE usuario SET status='1', codigoKEY_Reg='' WHERE login='$login';");
					header('location: ?view=accion&' . $datos);
				}
			}else{
				header('location: correo.php?view=error');
			}
		}
	}else {
		header('location: correo.php?view=error');
	}
	

	

?>
<?php 
	
	if($_POST){
		if(isset($_POST['actual_pass'],$_POST['nuev_pass'])){
			$pass = Encrypt($_POST['actual_pass']);
			$pass_new = Encrypt($_POST['nuev_pass']);
			$db = new Conexion();
			$sql = $db->query("SELECT usuario.id FROM usuario WHERE usuario.id='".$_SESSION['app_id']."' AND password='".$pass."' LIMIT 1;");
			if($db->rows($sql) > 0){
				if($pass_new ==  $pass){
					echo "Error contraseña nueva no puede ser la misma";
				}else{
					$id = $_SESSION['app_id'];
					$db->query("UPDATE `usuario` SET `password`='$pass_new'  WHERE id='$id'");
					echo 1;
				}
			}else{
				echo "Error contraseña actual es incorrecta";
			}
			$db->liberar($sql);
			$db->close();
		}else{
			echo "Error con los campos";
		}
	}else{
		echo "Error fatal 404";
	}

	
?>
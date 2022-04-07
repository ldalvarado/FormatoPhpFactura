<?php 


	if($_POST){
		if(isset($_POST['login'],$_POST['password'],$_POST['nacionalidad'],$_POST['cedula'],$_POST['primer_nombre'],$_POST['primer_apellido'],$_POST['segundo_nombre'],$_POST['segundo_apellido'],$_POST['correo'],$_POST['telefono'],$_POST['nacimiento'],$_POST['sexo'])){
		
			$db = new Conexion();
			$id = $_SESSION['app_id'];
			$pass = Encrypt($_POST['password']);
			$login = $db->real_escape_string($_POST['login']);
			$cedula = $_POST['nacionalidad'];
			$cedula .= '-';
			$cedula .= $db->real_escape_string($_POST['cedula']);
			$correo = $db->real_escape_string($_POST['correo']);

			$HTML = array(
				'data'  => "",
				'link'   => ""
			);

			$sql = $db->query("SELECT login,cedula FROM usuario WHERE id != '$id' AND login='$login' OR correo='$correo' OR cedula= '$cedula' ' LIMIT 1;");

			if($db->rows($sql) <= 0) {
				$sql_2 = $db->query("SELECT id FROM usuario WHERE password='$pass' AND id='$id' LIMIT 1;");
				if($db->rows($sql_2) > 0){
					
					$primer_nombre = $db->real_escape_string($_POST['primer_nombre']);
					$segundo_nombre = $db->real_escape_string($_POST['segundo_nombre']);
					$primer_apellido = $db->real_escape_string($_POST['primer_apellido']);
					$segundo_apellido = $db->real_escape_string($_POST['segundo_apellido']);
					$telefono = "+58";
					$telefono .= $db->real_escape_string($_POST['telefono']);
					$nacimiento = $_POST['nacimiento'];
					$sexo = $_POST['sexo'];

					$db->query("UPDATE `usuario` SET `login`='$login',`cedula`='$cedula',`primer_nombre`='$primer_nombre',`segundo_nombre`='$segundo_nombre',`primer_apellido`='$primer_apellido',`segundo_apellido`='$segundo_apellido',`nacimiento`='$nacimiento',`sexo`='$sexo',`password`='$pass',`status`='1',`correo`='$correo',`telefono`='$telefono' WHERE id='$id';");
					echo 1;
				}else{
					echo 'Error contraseña: '.$pass.' es incorrecta';
				}
				$db->liberar($sql_2);
			}else{
				$usuario = $db->recorrer($sql)[0];
				$ced = $db->recorrer($sql)[1];
				if(strtolower($login) == strtolower($usuario)){
			    	echo 'El usuario ingresado ya existe';
			  	} elseif(strtolower($ced) == strtolower($cedula)) {
			  		echo 'La cedula del usuario ya existe';
			  	}
			  	else {
				    echo 'El email ingresado ya existe';
			  	}
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
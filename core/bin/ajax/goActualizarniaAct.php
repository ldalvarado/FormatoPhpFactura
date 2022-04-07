<?php 


	if($_POST){
		$db = new Conexion();
		$HTML = '';
		$data = intval($_POST['nia_nuev']);
		$data2 = intval($_POST['nia_act']);
		$o="";
		//$file=fopen("http://192.168.253.7/utilidades/json/hidrolara/consnia.php?nia=1",'r');
		$file=fopen("http://192.168.253.7/utilidades/json/hidrolara/consnia.php?nia=$data",'r');
		if($file){
			
			while(!feof($file))$o.=fgets($file);fclose($file);
			if(strpos($o,'{json}')!==false){$o=explode('{json}',$o);$o=$o[1];}
			$o=json_decode($o);

			if($o->nombre != ''){
				$sql_2 = $db->query("SELECT id FROM solicitud_nia WHERE nia='".$data."' AND estado='1' LIMIT 1;");
				if($db->rows($sql_2) > 0){
					$HTML = 'El nia ya se encuentra asociado a otra cuenta';
				}else{
					$sql_3 = $db->query("SELECT n.id FROM usuario u INNER JOIN solicitud_nia n ON u.id = n.usuario_id WHERE u.id = '".$_SESSION['app_id']."' AND n.estado='1' AND n.nia = '".$data2."' LIMIT 1;");
					if($db->rows($sql_3) > 0){
						$fecha_actual = date('Y-m-d');
						$db->query("UPDATE solicitud_nia SET estado='0' WHERE nia='$data2';");
						$db->query("INSERT INTO `solicitud_nia`(`id`, `nia`, `nombre_nia`, `usuario_id`, `fecha_creacion` ,`ultima_consulta`, `estado` ) VALUES ('','".$data."','".$o->nombre."','".$_SESSION['app_id']."','".$fecha_actual."','".$fecha_actual."','1');");
						$HTML = 1;
					}else{
						$HTML = 'El nia del sistema no esta asociado a su cuenta';
					}
					$db->liberar($sql_3);
				}
				$db->liberar($sql_2);
			}else{
				$HTML = 'El nia no se encuentra registrado en el sistema';
			}
		}else{
			$HTML = 'Fallo con el servidor de noticias';
		}
  		$db->close();
	}else{
		$HTML = 'No esta enviando datos';
	}

	echo $HTML;


?>
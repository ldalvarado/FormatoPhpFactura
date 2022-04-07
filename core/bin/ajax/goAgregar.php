<?php 

	//if(!isset($_SESSION['app_id'])) {
		if($_POST){
			$db = new Conexion();
			$HTML = array(
				'data'  => "",
				'tabla'   => ""
			);
			$data = intval($_POST['nia']);
			$o="";
			//$file=fopen("http://192.168.253.7/utilidades/json/hidrolara/consnia.php?nia=1",'r');
			$file=fopen("http://192.168.253.7/utilidades/json/hidrolara/consnia.php?nia=$data",'r');
			if($file){

				$sql = $db->query("SELECT count(u.id) as contador FROM usuario INNER JOIN solicitud_nia ON usuario.id = solicitud_nia.usuario_id WHERE usuario.id='".$_SESSION['app_id']."' AND estado='1';");
				$contador = $db->recorrer($sql)[0];
				$nivel = $_users[$_SESSION['app_id']]['nivel'];
				if($nivel == 1){
					if($contador >= 1){
						while(!feof($file))$o.=fgets($file);fclose($file);
						if(strpos($o,'{json}')!==false){$o=explode('{json}',$o);$o=$o[1];}
						$o=json_decode($o);

						if($o->nombre != ''){
							$sql_2 = $db->query("SELECT id FROM solicitud_nia WHERE nia='".$data."' AND estado='1' AND usuario.id != '".$_SESSION['app_id']."' LIMIT 1;");
							if($db->rows($sql_2) > 0){
								$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
							    <button type="button" class="close" data-dismiss="alert">x</button>
							    <strong>ERROR:</strong> El nia ya se encuentra afiliado a otro usuario.
							 	</div>';
							}else{
								$fecha_actual = date('Y-m-d');
								$db->query("INSERT INTO `solicitud_nia`(`id`, `nia`, `nombre_nia`, `usuario_id`, `fecha_creacion` ,`ultima_consulta`, `estado` ) VALUES ('','".$data."','".$o->nombre."','".$_SESSION['app_id']."','".$fecha_actual."','".$fecha_actual."','1');");
								$HTML['data'] = 1;
							}
							$db->liberar($sql_2);
						}else{
							$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
						    <button type="button" class="close" data-dismiss="alert">x</button>
						    <strong>ERROR:</strong> El nia no se encuentra registrado en el sistema.
						 	</div>';
						}
					}else{
						$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
					    <button type="button" class="close" data-dismiss="alert">x</button>
					    <strong>ERROR:</strong> Usted ya tiene mas de 1 nia asociado a su cuenta.
					 	</div>';
					}
				}else{
					if($contador >= 100){
						while(!feof($file))$o.=fgets($file);fclose($file);
						if(strpos($o,'{json}')!==false){$o=explode('{json}',$o);$o=$o[1];}
						$o=json_decode($o);

						if($o->nombre != ''){
							$sql_2 = $db->query("SELECT id FROM solicitud_nia WHERE nia='".$data."' AND estado='1' AND usuario.id != '".$_SESSION['app_id']."' LIMIT 1;");
							if($db->rows($sql_2) > 0){
								$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
							    <button type="button" class="close" data-dismiss="alert">x</button>
							    <strong>ERROR:</strong> El nia ya se encuentra afiliado a otro usuario.
							 	</div>';
							}else{
								$fecha_actual = date('Y-m-d');
								$db->query("INSERT INTO `solicitud_nia`(`id`, `nia`, `nombre_nia`, `usuario_id`, `fecha_creacion` ,`ultima_consulta`, `estado` ) VALUES ('','".$data."','".$o->nombre."','".$_SESSION['app_id']."','".$fecha_actual."','".$fecha_actual."','1');");
								$HTML['data'] = 1;
							}
							$db->liberar($sql_2);
						}else{
							$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
						    <button type="button" class="close" data-dismiss="alert">x</button>
						    <strong>ERROR:</strong> El nia no se encuentra registrado en el sistema.
						 	</div>';
						}
					}else{
						$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
					    <button type="button" class="close" data-dismiss="alert">x</button>
					    <strong>ERROR:</strong> Usted ya tiene mas de 100 nia asociado a su cuenta.
					 	</div>';
					}
				}
				$db->liberar($sql);
				$db->close();
			}else{
				$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
			    <button type="button" class="close" data-dismiss="alert">x</button>
			    <strong>ERROR:</strong> El nia no se encuentra registrado en el sistema.
			 	</div>';
			}
	  		
		}else{
			$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
		    <button type="button" class="close" data-dismiss="alert">x</button>
		    <strong>ERROR:</strong> No esta enviando datos.
		 	</div>';
		}

		echo json_encode($HTML);
	/*}else{
		header('location: ?view=index');
	}*/
	

?>

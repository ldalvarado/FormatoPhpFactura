<?php 

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

				while(!feof($file))$o.=fgets($file);fclose($file);
				if(strpos($o,'{json}')!==false){$o=explode('{json}',$o);$o=$o[1];}
				$o=json_decode($o);

				if($o->nombre != ''){
					$sql = $db->query("SELECT n.id FROM usuario u INNER JOIN solicitud_nia n ON u.id = n.usuario_id WHERE u.id = '".$_SESSION['app_id']."' AND n.estado='1' AND n.nia = '".$data."' LIMIT 1;");
					if($db->rows($sql) > 0){
						$fecha_actual = date('Y-m-d');
						$HTML['tabla'] = ListaConsultaNia($o);
						$HTML['data'] = 1;
					}else{
						$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
					    <button type="button" class="close" data-dismiss="alert">x</button>
					    <strong>ERROR:</strong> El nia del sistema no esta asociado a su cuenta.
					 	</div>';
					}
				}else{
					$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
				    <button type="button" class="close" data-dismiss="alert">x</button>
				    <strong>ERROR:</strong> El nia no se encuentra registrado en el sistema.
				 	</div>';
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


?>
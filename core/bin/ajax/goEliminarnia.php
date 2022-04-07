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
				$sql = $db->query("SELECT u.id as contador FROM usuario INNER JOIN solicitud_nia ON usuario.id = solicitud_nia.usuario_id WHERE usuario.id != '".$_SESSION['app_id']."' AND estado='1';");
				if($db->rows($sql) > 0){
					$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
				    <button type="button" class="close" data-dismiss="alert">x</button>
				    <strong>ERROR:</strong> El nia del sistema no esta asociado a su cuenta.
				 	</div>';
				}else{
					$fecha_actual = date('Y-m-d');
					$db->query("UPDATE solicitud_nia SET estado='0' WHERE nia='$data';");
					$HTML['data'] = 1;
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
		    <strong>ERROR:</strong> Error al cargar la base de datos.
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
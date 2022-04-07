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
		//if($file){
			
			while(!feof($file))$o.=fgets($file);fclose($file);
			if(strpos($o,'{json}')!==false){$o=explode('{json}',$o);$o=$o[1];}
			$o=json_decode($o);

			if($o->nombre != ''){
				$sql_2 = $db->query("SELECT id FROM solicitud_nia WHERE nia='".$data."' AND estado='1' LIMIT 1;");
				if($db->rows($sql_2) > 0){
					$HTML['data'] = 1;
					$HTML['tabla'] = ListaAgregarNia($o->nia,$o->nombre,'No disponible','red');
				}else{
					$HTML['data'] = 1;
					$HTML['tabla'] = ListaAgregarNia($o->nia,$o->nombre,'Disponible','green');
				}
				$db->liberar($sql_2);
			}else{
				$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
			    <button type="button" class="close" data-dismiss="alert">x</button>
			    <strong>ERROR:</strong> El nia no se encuentra registrado en el sistema.
			 	</div>';
			}

			
		/*}else{
			$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
		    <button type="button" class="close" data-dismiss="alert">x</button>
		    <strong>ERROR:</strong> Fallo con el servidor de noticias.
		 	</div>';
		}*/
  		$db->close();
	}else{
		$HTML['data'] = '<div class="alert alert-dismissible alert-danger">
	    <button type="button" class="close" data-dismiss="alert">x</button>
	    <strong>ERROR:</strong> No esta enviando datos.
	 	</div>';
	}

	echo json_encode($HTML);
	
	
?>
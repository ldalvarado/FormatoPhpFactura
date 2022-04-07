<?php 

class Nias {

	private $db;
	private $id;
	private $nombre;

	public function __construct() {
		$this->db = new Conexion();
	}

	private function Errors($url) {
		try {
			if(empty($_POST['nombre'])) {
				throw new Exception(1);
			} else {
				$this->nombre = $this->db->real_escape_string($_POST['nombre']);
			}
		} catch(Exception $error) {
			// header('location: '.$url .$error->getMessage());
			exit;
		}
	}

	public function Consulta($id,$accion) {
		if($accion == 'todos'){
			$sql = $this->db->query("SELECT n.* FROM solicitud_nia n INNER JOIN usuario u ON n.usuario_id = u.id WHERE u.id = '$id'");
		}elseif ($accion == 'eliminados') {
			$sql = $this->db->query("SELECT n.* FROM solicitud_nia n INNER JOIN usuario u ON n.usuario_id = u.id WHERE u.id = '$id' AND n.estado = '0'");
		}else{
			$sql = $this->db->query("SELECT n.* FROM solicitud_nia n INNER JOIN usuario u ON n.usuario_id = u.id WHERE u.id = '$id' AND n.estado = '1'");
		}
		return $sql;
	}

	public function Factura($nia){
		
	}

	/*public function Edit() {
		$this->id = intval($_GET['id']);
		$this->Errors('?view=categorias&mode=add&id='.$this->id.'&error=');
		$this->db->query("UPDATE categorias SET nombre='$this->nombre' WHERE id='$this->id';");
		header('location: ?view=categorias&mode=edit&id='.$this->id.'&success=true');
	}

	public function Delete() {
		$this->id = intval($_GET['id']);

		$q = "DELETE FROM categorias WHERE id='$this->id';";
		$q .= "DELETE FROM foros WHERE id_categoria='$this->id';";

		$sql = $this->db->query("SELECT id FROM foros WHERE id_categoria='$this->id';");
		if($this->db->rows($sql) > 0) {
			while($data = $this->db->recorrer($sql)) {
				$id_foro = $data[0];
				$q .= "DELETE FROM temas WHERE id_foro='$id_foro';";
			}
		}
		$this->db->liberar($sql);
		$this->db->multi_query($q);
		header('location: ?view=categorias');
	}*/

  public function __destruct() {
    $this->db->close();
  }

}


?>
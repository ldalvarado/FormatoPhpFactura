<?php 
	
	function Nombredelmes($mes){
		$nombre = '';
		switch ($mes) {
			case '01':
				$nombre = 'Enero';
				break;
			case '02':
				$nombre = 'Febrero';
				break;
			case '03':
				$nombre = 'Marzo';
				break;
			case '04':
				$nombre = 'Abril';
				break;
			case '05':
				$nombre = 'Mayo';
				break;
			case '06':
				$nombre = 'Junio';
				break;
			case '07':
				$nombre = 'Julio';
				break;
			case '08':
				$nombre = 'Agosto';
				break;
			case '09':
				$nombre = 'Septiembre';
				break;
			case '10':
				$nombre = 'Octubre';
				break;
			case '11':
				$nombre = 'Noviembre';
				break;
			case '12':
				$nombre = 'Diciembre';
				break;
			default:
				$nombre = 'error';
				break;
		}
		return $nombre;
	}

?>
<?php

	/*Este metodo es para calcular el porcentaje*/
	class calcular{

		public $arreglo;
		private $arraux1,$arraux2;
		public $verificar = true;

		/*Este es el constructor el verificara si el los valores son numeros para hacer calculos de no ser asi dira que es falso es decir que no se puede hacer, respectivamente se guardan todos esos datos en un arreglo*/
		public function __construct($con_ant01,$con_ant02,$con_ant03,$con_ant04){
			if(is_numeric($con_ant01) and is_numeric($con_ant02) and is_numeric($con_ant03) and is_numeric($con_ant04)){
				$this->arreglo = array($con_ant01,$con_ant02,$con_ant03,$con_ant04);
			}else{
				$verificar = false;
			}
		}

		/*
			Esta funcion es para calcular el porcentaje, primero instaciamos los arreglos, luego guardamos los valores del arreglo que tiene todos los datos, para ordenarlo en forma ascendente y en la ultima posicion ubicar el valor mayor que sera el 100%, por ultimo almacenamos esos datos en otro arreglo auxiliar y calculamos el porcentaje en el orden como corresponde todos los numeros y lo ponemos como un entero lo retornamos y solo queda llamarlos
		*/
		public function porcentaje(){
			$this->arreaux1 = array();
			$this->arreaux2 = array();

			$this->arraux1 = $this->arreglo;
			sort($this->arraux1);

			$mayor =  $this->arraux1[3];


			for($x = 0;$x<4;$x++){
				$this->arraux2[$x] = (int)((100*$this->arreglo[$x])/$mayor);
			}

			return $this->arraux2;
		}
	}
?>


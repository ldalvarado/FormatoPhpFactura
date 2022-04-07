<?php

function Encrypt($string) {
  $long = strlen($string);
  $str = '';
  for($x = 0; $x < $long; $x++) {
    $str .= ($x % 2) != 0 ? md5($string[$x]) : $x;
  }
  return md5($str);
}

function encode_this($string){
	$string = utf8_encode($string);
	$control = "qwerty"; 
	$string = $control.$string.$control; 
	$string = base64_encode($string);
	return($string);
}

function decode_get2($string)
{
	$cad = preg_split("/[&]+/",$string); //separo la url desde el ?
	$string = $cad[1]; //capturo la url desde el separador ? en adelante
	$string = base64_decode($string); //decodifico la cadena
	$control = "qwerty"; //defino la llave con la que fue encriptada la cadena,, cambiarla por la que deseamos usar
	$string = str_replace($control, "", "$string"); //quito la llave de la cadena

	//procedo a dejar cada variable en el $_GET
	$cad_get = preg_split("/[&]/",$string); //separo la url por &
	foreach($cad_get as $value){
		$val_get = preg_split("/[=]/",$value); //asigno los valosres al GET
		$_GET[$val_get[0]]=utf8_decode($val_get[1]);
	}
}

?>

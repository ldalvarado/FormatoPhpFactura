<?php

	class Funcion {

		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//----- IMAGENES BASE 64 ----------------------------------------------------------------------------------------------------------------------------------------

			function check_radio($opcion){
				if($opcion=='check_true'){
					$cheked_true		= '<img width="12" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAABt0lEQVRIS72W/XWCMBTFjSzgCHQDCgvoBJUJrBvgBD2dAEZwg9oJdAGQDeoGZQGg93ISTxpIwYLmHzkS3u+9+z4SMcPyPG8xn8/f8PgqhFjwv7GrrusCNvZVVb3neV4IQhzHOZI31rjl+7wsy5XwfT9GFBE3wYsEHnzCg9MYKJxfQqEX3S5B35SLkCzLdmMA5rcqCMoogiCouYHhjYkEUXiIYg1FEuZE5t5DWs58voLSNBX/jUYW05dUpsDvFvYOtKcCmQQEYx+wudYdVY5PBoIhAgjS1wmg1WQR6ZIpChOPPD0jT5fJQF2SAbRD9SYKPFq6PskmAQ2RbBBIGor0ntAzbZFsC8n2ZotYpTNmXzOnVAPSCLo9Qp/EhsEDqizs6kMrCC/YyfqAvcLghIvuP+sTXlbZk+6MEX0zeVoNC4/Z4a7hXQPDOGG/LI13oZoCN0UkZ9bRPJeawdg+q6ySDS0GDsgWTPe4T7JBIG6yRabB/pRsMKgH1ivZTaAuGCS7yFnWnDl9q1XeqCoOwrzrQ8qIiosBcQEJbfvMb3mky/vI7HFH+Z0uJ6zaza/LycOuWzLhd79A/gBRCoFupnRmGgAAAABJRU5ErkJggg==" />';
					return $cheked_true;
				}else if($opcion=='check_false'){
					$cheked_false		= '<img width="12" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAA30lEQVRIS+2W0RGCMBBEudAApURoQCuwBC1BK3CsQEuwBSvQBhLTiTQAcXdGHMTxA6PxJ3wxmeT29oXhVjI8WutCKbXB61JECq6FPt77GjUObdtunXO1UCTP8xP1Qou/Oe+applJWZY7uFhxE7rYo4MjOjiHiKL5KQjN+3UpdCUuilhr1yECw7OdCWKUqqo8N9BeqJOhEJxpXMuF6w8hY4x8001XqzOShEbTTehGI0tf3cfIErqE7oXA/35BGHwTDD4XfCm9Ahzp9zySxRvlPwonGuFk8RROosUtIo0RIG9ls89fBE41kAAAAABJRU5ErkJggg==" />';
					return $cheked_false;
				}else if($opcion=='radio_true'){
					$radiobutton_true 	= '<img width="12" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AcUDgIF/wkW/QAABC1JREFUWMOdl02IHFUQx3/V3a972NmZbOKaZF2JiuJBPUT0ogaFNRIUQUQ8xIMeJCKIHzmKJ73mICJ4EE8qQjyZwyIYiIgBY0BNwG8DahB2RfAjWTY76dl+HrbebM2bnk4yDb3TW69e/evrVdUT9HEufJGUJdU4WtPjXPPeOpqYBQEcUAJeGQVwZclF/f9RYB+wG7ge6AAXgGXgW+AYcBj4L8sQkXp5gVaWCu4c4hxT+jugtVoUwBzwngrxRmB4K6Af0T4HFgBEGjEGH7ldyDKS6Wkc8EYkOAYf9wa+T4Guym7HBjpHKs6RmI1UFYn3zFUVJ4BrTYgrIAFOqOCfRVj1nhS4AbgLeFh5fQgvUInwgPccMzkgQAGsDRLQOUhTEhFu1IXYoleAHGDbNrAWhWdmhhTYrzkRe+MRxZKRvep2yTJmgZUI/GgANq6rc2fbOSRJBvq8ZnIkyLq7Ftw5ZO9eBDgVgR+qSaSx4DUJvBAla0+EjpG38SfPyYFnI/C3bHgCkOq9RV16AHgSuNnUgoFCSrrfhKICFg1fiiYh5ihVwOkYvChoAbcBX0RWhe9lYP/8PIn1hnrwUGTcbudo2fx5LmLYZcOjR/LFSxzJoMwiQJKMeO1vw/dxVBn5ThdK4CMLnudMAU9dRj2wtCMqw4biQMSXBfBCCSEEC5okQfvuFYKH9/E4FNH6Y2m6QXwoWohd9/oE4CXwi/Vkt0sGHLdJPjeHJMCtptr9qL9TwKp+P2GSNIsaYBPtJuAqrXpT587R1yoanluWlvAJMGuIZzXhVk0H2z4BeHjuDMaou3/XU7EOXI3W9sLEZ21lZbN9igzWJgFHhJlgjFbIC4D3ngRoBQVWTLPZYvd7T69m7rhcbwD8ZmcBEbZrSAQ4HxT4VRlSkw+irgM4OQF4H8B7vgzykoTC+82KGXAT4BtDnBWhG+KWbYh9cwLwFPjQGtPrsaZlOTyn7CZ7hF7K85HzeyYqu03HL/BtjfrCrsAnggfusJXwsKmES3Hr1Yy9eAXg+zqdkUr4juE7bzM1HBcr7Onp6SHtBdgK/FDThKxCPeAeW4ZV/jUR36uDXmDccNIKFWE+y0jsnLhnD6KT8ScKFpT5GjgYt2MznPwUeS0ZasdZNhwjZV7WZBoSKtJ4L6jjOxJNzc+028hQOzZeOBi59k9gR56PjuxNk5HR6WgUrs9seEbGsp07SYD3ox5fAc/XWdkAfi/wV2T52aIYM5DaS4OS363J9n+Al0WGiolN5raOZ6dr9p4RoahRfPRiEno08ELNUQsWretV7DjwFfBv5DV7JD+I3W4vJjg3PMNFs8AOve95Efrx8RtDC5b/AdzXAN6Kw2AXhi4cOoy+HbrZJd5F4EHYuGtYeXUYEl3PU3UvZblJ8571fn+gzHXA7frb0Xa7LML33m/W9yZ5lvY/A5nOo+TF7DkAAAAASUVORK5CYII=" />';
					return $radiobutton_true;
				}else if($opcion=='radio_false'){
					$radiobutton_false 	= '<img width="12" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AcUDgMLAaoKuwAAA39JREFUWMO1l8+LHUUQxz/V0/1msjFodiEhKCwmEQ9qDsnJwOYSRfCggj9uSsRLyNU/QPAfiIKIOYQcklOQRfOLBCQQxBAieBJUIir+DEFDxESTzLzXHrZ6rNfO250sbxuGGap76ltd9e3qKkFHCOkLV9eMJsn6jr76nJkQYADEEMZlurgCDgCngKtAzJ7vgGPAywB1DZP0JVlraQhICMzou5VVFSUwDywaoDoDHgFNh0EHRShXwGg/BnbCe9zcHAXwTqa0VsC4wmONfFWNWJ9vMAQKCQFnFhMjDtjYNFwGtpqwjjRkHwPngC9F+CtGGmALsBN4DtjdQYlF4EUR8L4NRQnctmHAe5z3bAJu5C4W4U1DMMl3VJaIem0j8IH5N3njYte/YzyoKirgt8zNn6q11nVd7lwfAlIU7a4fUbJaXYvz87hO8NlZCuDDLJZHAUT6gecy53DAV5nON6zX00cJ7MkWngYoitWBh4CILBmvnrDEXJdIiJIQ4IqJ2+8Azq0e3PLKOR7NNvd+VRFMYuLJbMGzfWPeR6YY72YYNjNy1DD2x2mCh4Do0VuX5Yh9bSoGnlcDPPCeygSYAf5OFq9Wpjz4B/gEKAwmDngA2GAmToQwPfAk01Cc1HmU9Djg8SxrfT1tcCO7bHBmkwGzRnhb32sBHoGfNa8Mdf4+ByQuRuCO+Z42OLAErPcNQHDAn+ayud94Y+o8EOFBM48INxzwrQoTCefWAhyYiZHtZoPDGIkO+CEj4TNrAV7X3AKeNjif2zxwwcT+dV08bR4AvGZIeMYacMSQ5ClgS9NMD7yq2srIA02MFMDhvHq9a/L0+WXKqHuSOdfqv2lKulScUBQFeE8YDrkL7NXFDwO/jkZcMgXGqrwxXDrxx4En1AMCvOA9V0X0OtbUi6mG0oWxMKkE63kBAbyd3YLHVWc1VhXp2Gpqgraq3bbtvzKqD7hh+qEM/Hoe2rGybDBgRo9hzAw5q/kB73uB7wK+V1InXUNg80Tw1DSYXNDVhHwkwkupSM3GZq33vuj49xbwUIfh3Y3JwgKI8BhwbZmG4w7wE/BLR6dkG5jPRCgnNSYtCXN3et/miLe0qBjlXZEITYcsGfkH8Moyx7nKw2AnxDSUVBUDYL+mz5XasjOp2inL/+vLMSRrp4t0Zdb1uEy73TR2ANu1mmqA6yJ8EyNX+upLsn8B/OWTXBgSeYYAAAAASUVORK5CYII=" />';
					return $radiobutton_false;
				}
			}

		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//----- DATOS GENERALES -----------------------------------------------------------------------------------------------------------------------------------------

			function cadena_similar($cadena1, $cadena2, $pct=80){
				$a		= array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
				$b		= array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');

				$cadena1	= mb_strtoupper(str_replace($a, $b, $cadena1));
				$cadena2	= mb_strtoupper(str_replace($a, $b, $cadena2));

				similar_text($cadena1, $cadena2, $similitud);

				$similitud = ($similitud>=$pct)?true:false;
				return $similitud;
			}
			function completar_digitos($cadena,$digitos,$relleno,$posicion=STR_PAD_LEFT){
				//--------------- Completar cantidad de caracteres ---------------------------------------------------
				$cadena = str_pad($cadena,$digitos,$relleno,$posicion);
				return $cadena;
			}
			function emitir_mensaje($msg){
				$info = array('success' => false, 'msg' => $msg);
				echo json_encode($info);
			}
			function limpiar_direccion($cadena){
				//--------------- Limpiar dirección ------------------------------------------------------------------
				$cadena = preg_replace('/[^0-9A-Za-záéíóúñüÁÉÍÓÚÑÜ \.\(\)\°\|\#\/\"\-_]/','',trim($cadena));
				return $cadena;
			}
			function limpiar_rif($cadena){
				//--------------- Limpiar RIF / Cedula ---------------------------------------------------------------
				$cadena = preg_replace('/[^0-9A-Z-_]/','',trim($cadena));
				return $cadena;
			}
			function mes_letras($mes_numero, $tipo='' /*(miniscula/mayuscula)*/, $longitud=''){
				$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

				$mes = ($longitud)	?	(substr($meses[$mes_numero],0,$longitud))	:	$meses[$mes_numero];
				if(substr($tipo,0,3)=='may'){
					$mes = strtoupper($mes);
				}else if(substr($tipo,0,3)=='min'){
					$mes = strtolower($mes);
				}
				return $mes;
			}
			function plural_singular($monto, $plural, $singular){
				$cadena = $monto.' '.(($monto==1) ? $singular : $plural);
				return $cadena;
			}
			function sesion_false(){
				$info = array('success' => false, 'msg' => 'No existe sesión activa, debe iniciar sesión.');
				return json_encode($info);
			}
			function solo_texto($cadena){
				//--------------- Dejar solo texto -------------------------------------------------------------------
				$cadena = preg_replace('/[^A-Za-z áéíóúñüÁÉÍÓÚÑÜ]/','',trim($cadena));
				return $cadena;
			}
			function texto_alfanumerico($cadena){
				//--------------- Limpiar texto alfanumerico ---------------------------------------------------------
				$cadena = preg_replace('/[^0-9A-Za-záéíóúñüÁÉÍÓÚÑÜ \.\(\)\°\|\#\/\-_,]/','',trim($cadena));
				return $cadena;
			}
			function texto_alfanumerico_simple($cadena){
				//--------------- Limpiar texto alfanumerico simple --------------------------------------------------
				$cadena = preg_replace('/[^0-9A-Za-z \.\,\/]/','',trim($cadena));
				return $cadena;
			}

		//----- FIN DATOS GENERALES -------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//----- NUMEROS -------------------------------------------------------------------------------------------------------------------------------------------------

			function formato_cuenta_presupuestaria($cuenta_codigo){
				//----- ejemplo (4.01.01.01.00) ----------------------------------------------------------------------
				$cuenta_codigo = preg_replace('/[^0-9]/','',$cuenta_codigo);
				$cuenta_codigo = $cuenta_codigo[0].'.'.wordwrap(substr($cuenta_codigo,1), 2, '.', true);
				return $cuenta_codigo;
			}
			function formato_telefono($cadena){
				//--------------- formato para numeros telefonicos ---------------------------------------------------
				$cadena = trim($cadena);
				if($cadena){
					$cadena = '0'.substr($cadena,0,3).'-'.substr($cadena,3);
				}else{
					$cadena = '';
				}
				return $cadena;
			}
			function solo_numero($cadena){
				//--------------- Dejar solo número ------------------------------------------------------------------
				$cadena = preg_replace('/[^0-9]/','',$cadena);
				return $cadena;
			}
			function validar_telefono($cadena){
				//--------------- validar numeros telefonicos --------------------------------------------------------
				$cadena = preg_replace('/[^0-9]/','',$cadena);
				if(strlen($cadena) >= 7){
					$cadena = $cadena;
				}else{
					$cadena = '';
				}
				return $cadena;
			}
			function limpiar_telefono($cadena){
				$cadena = preg_replace('/[^0-9]/','',$cadena);
				$cadena = $cadena * 1;
				if(strlen($cadena) >= 7){
					$cadena = $cadena;
				}else{
					$cadena = '';
				}
				return $cadena;
			}

		//----- FIN NUMEROS ---------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//----- FECHAS Y HORAS ------------------------------------------------------------------------------------------------------------------------------------------

			function antiguedad($fecha_ingreso, $fecha_egreso){
				$cbd	= new Conexion();
				//$idcon	= $cbd->conectarSBD();

				$result 		= $cbd->query("SELECT DATE_SUB('".$fecha_ingreso."',interval 1 day) AS dia_anterior FROM `factura_online` ");
				$row 			= $cbd->recorrer($result);
				$fecha_ingreso 	= $row['dia_anterior'];

				$anio_ingreso 	= (integer) substr($fecha_ingreso,0,4);
				$mes_ingreso 	= (integer) substr($fecha_ingreso,5,2);
				$dia_ingreso 	= (integer) substr($fecha_ingreso,8,2);
				$anio_egreso 	= (integer) substr($fecha_egreso,0,4);
				$mes_egreso 	= (integer) substr($fecha_egreso,5,2);
				$dia_egreso 	= (integer) substr($fecha_egreso,8,2);

				$result = $cbd->ejecutar("SELECT
					(TIMESTAMPDIFF(YEAR,'".$fecha_ingreso."','".$fecha_egreso."')) AS anios,
					(TIMESTAMPDIFF(MONTH,'".$fecha_ingreso."','".$fecha_egreso."')) AS meses,
					(TIMESTAMPDIFF(DAY,'".$fecha_ingreso."','".$fecha_egreso."')) AS dias 
					FROM `factura_online` ");
				$row 	= mysqli_fetch_array($result);

				$anios 			= $row['anios'];
				$meses 			= $row['meses'] % 12;
				$dias 			= $row['dias'];

				$total_meses	= $row['meses'];
				$total_dias		= $row['dias'];


				if($dia_ingreso <= $dia_egreso){
					$dias 		= $dia_egreso - $dia_ingreso;
				}else{
					$anio 	= $anio_egreso;
					$mes 	= $mes_egreso;
					$dia 	= $dia_ingreso;
					if($mes==1){
						$mes 	= 12;
						$anio 	= $anio - 1;
					}else{
						$mes 	= $mes - 1;
						$mes 	= str_pad($mes,2,'0',STR_PAD_LEFT);
					}

					$fecha_inicial 	= $this->ultimo_dia_mes($anio.'-'.$mes.'-'.$dia);
					$result 		= $cbd->query("SELECT (TIMESTAMPDIFF(DAY,'".$fecha_inicial."','".$fecha_egreso."')) AS dias FROM `factura_online` ");
					$row 			= $cbd->recorrer($result);
					$dias 			= $row['dias'];
				}

				return array('anios' => $anios, 'meses' => $meses, 'dias' => $dias, 'total_meses' => $total_meses, 'total_dias' => $total_dias);
			}
			function completar_hora($cadena){
				//--------------- Completar cantidad de caracteres ---------------------------------------------------
				$explode_cadena = explode(':',$cadena);
				$hora 			= $explode_cadena[0];
				$minuto 		= $explode_cadena[1];
				if($hora > 1 && $hora < 7){
					$hora += 12;
				}
				$cadena = $hora.':'.$hora;
				return $cadena;
			}
			function diferencia_fechas($fecha_desde, $fecha_hasta){
				$cbd	= new Conexion();
				//$idcon	= $cbd->conectarSBD();

				$anio_desde = (integer) substr($fecha_desde,0,4);
				$mes_desde 	= (integer) substr($fecha_desde,5,2);
				$dia_desde 	= (integer) substr($fecha_desde,8,2);
				$anio_hasta = (integer) substr($fecha_hasta,0,4);
				$mes_hasta 	= (integer) substr($fecha_hasta,5,2);
				$dia_hasta 	= (integer) substr($fecha_hasta,8,2);

				$result = $cbd->query("SELECT
					(TIMESTAMPDIFF(YEAR,'".$fecha_desde."','".$fecha_hasta."')) AS anios,
					(TIMESTAMPDIFF(MONTH,'".$fecha_desde."','".$fecha_hasta."')) AS meses,
					(TIMESTAMPDIFF(DAY,'".$fecha_desde."','".$fecha_hasta."')) AS dias
					 FROM `factura_online` ");
				$row 	= $cbd->recorrer($result);
				$anios 	= $row['anios'];
				$meses 	= $row['meses'];
				$dias 	= $row['dias'];

				return array('anios' => $anios, 'meses' => $meses, 'dias' => $dias);
			}
			function fecha($formato='Y-m-d'){
				date_default_timezone_set('America/Aruba');
				$fecha 		= date($formato);
				return $fecha;
			}
			function fecha_anterior_php($fecha, $anios_diferencia=0, $meses_diferencia=0, $semanas_diferencia=0, $dias_diferencia=0){
				$fecha_anterior = date('Y-m-d', strtotime("-".$anios_diferencia." year -".$meses_diferencia." month -".$semanas_diferencia." week -".$dias_diferencia." day", strtotime($fecha)));
				return $fecha_anterior;
			}
			//----- No utilizar mas de ahora en adelante ------------------------------------------
			function fecha_anterior($fecha, $anios_diferencia='', $meses_diferencia='', $dias_diferencia=''){
				$cbd	= new Conexion();
				//$idcon	= $cbd->conectarSBD();

				if($anios_diferencia){
					$result 		= $cbd->query("SELECT DATE_SUB('".$fecha."',interval ".$anios_diferencia." year) AS fecha_anterior FROM `factura_online` ");
				}else if($meses_diferencia){
					$result 		= $cbd->query("SELECT DATE_SUB('".$fecha."',interval ".$meses_diferencia." month) AS fecha_anterior FROM `factura_online` ");
				}else if($dias_diferencia){
					$result 		= $cbd->query("SELECT DATE_SUB('".$fecha."',interval ".$dias_diferencia." day) AS fecha_anterior FROM `factura_online` ");
				}
				$row 			= $cbd->recorrer($result);
				$fecha_anterior = $row['fecha_anterior'];
				return $fecha_anterior;
			}
			//-------------------------------------------------------------------------------------
			function fecha_posterior_php($fecha, $anios_diferencia=0, $meses_diferencia=0, $semanas_diferencia=0, $dias_diferencia=0){
				$fecha_posterior = date('Y-m-d', strtotime("+".$anios_diferencia." year +".$meses_diferencia." month +".$semanas_diferencia." week +".$dias_diferencia." day", strtotime($fecha)));
				return $fecha_posterior;
			}
			//----- No utilizar mas de ahora en adelante ------------------------------------------
			function fecha_posterior($fecha, $anios_diferencia='', $meses_diferencia='', $dias_diferencia=''){
				$cbd	= new Conexion();

				//$idcon	= $cbd->conectarSBD();

				if($anios_diferencia){
					$result 		= $cbd->query("SELECT DATE_ADD('".$fecha."',interval ".$anios_diferencia." year) AS fecha_posterior FROM `factura_online`");
				}else if($meses_diferencia){
					$result 		= $cbd->ejecutar("SELECT DATE_ADD('".$fecha."',interval ".$meses_diferencia." month) AS fecha_posterior FROM `factura_online`");
				}else if($dias_diferencia){
					$result 		= $cbd->ejecutar("SELECT DATE_ADD('".$fecha."',interval ".$dias_diferencia." day) AS fecha_posterior FROM `factura_online`");
				}
				$row 			= $cbd->recorrer($result);
				$fecha_posterior = $row['fecha_posterior'];
				return $fecha_posterior;
			}
			//-------------------------------------------------------------------------------------
			function formato_fecha_php($fecha, $formato='Y-m-d h:i:s A'){
				$fecha = str_replace('/','-',trim($fecha));
				$fecha = date_create($fecha);
				return date_format($fecha, $formato);
				//ejemplo: echo formato_fecha_php('18/02/2011 18:40:35','Y-m-d'); resultado: "2011-02-18";
			}
			//----- No utilizar mas de ahora en adelante ------------------------------------------
			function formato_fecha($fecha, $formato_entrada='d-m-Y', $formato_salida='d-m-Y'){
				$formato_entrada	= preg_replace('/[^a-zA-Z]/','',$formato_entrada);
				$fecha				= preg_replace('/[^0-9]/','',$fecha);
				if($formato_entrada[0]=='d'){
					$dia = substr($fecha,0,2);
					$mes = substr($fecha,2,2);
				}else if($formato_entrada[2]=='d'){
					$dia = substr($fecha,-2);
					$mes = substr($fecha,-4,2);
				}
				if($formato_entrada[0]=='Y'){
					$anio = substr($fecha,0,4);
				}else if($formato_entrada[2]=='Y'){
					$anio = substr($fecha,-4);
				}
				$fecha_salida = str_replace(array('d','m','Y'),array($dia,$mes,$anio),$formato_salida);
				return $fecha_salida;
			}
			//-------------------------------------------------------------------------------------
			function formato_hora($hora,$formato_entrada,$formato_salida){
				$hora = strtotime($hora);

				if($formato_entrada=='normal' && $formato_salida=='militar'){
					$hora = date("H:i:s", $hora);
				}else if($formato_entrada=='militar' && $formato_salida=='normal'){
					$hora = date("h:i:s A", $hora);
				}

				return $hora;
			}
			function hora($formato='h:i:s'){
				date_default_timezone_set('America/Aruba');
				$hora 		= date($formato, time());
				return $hora;
			}
			//-------------------------------------------------------------------------------------
			function hora_posterior_php($hora, $horas_diferencia=0, $minutos_diferencia=0, $segundos_diferencia=0){
				$hora_posterior = date('H:i:s', strtotime("+".$horas_diferencia." hour +".$minutos_diferencia." minute +".$segundos_diferencia." second", strtotime($hora)));
				return $hora_posterior;
			}
			function primer_dia_mes($fecha){
				$fecha 	= substr($fecha,0,7).'-01';
				return $fecha;
			}
			function ultimo_dia_mes($fecha){
				$fecha = $this->fecha_posterior_php($fecha,0,1,0,0);
				$fecha = $this->primer_dia_mes($fecha);
				$fecha = $this->fecha_anterior_php($fecha,0,0,0,1);
				return $fecha;
			}

		//----- FIN FECHAS Y HORAS --------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//----- MANEJO DE ARCHIVOS --------------------------------------------------------------------------------------------------------------------------------------

			/*function reducir_img($archivo,$alto=200,$ancho=200){
				//include('lib/resize-image/resize-class.php');
				if(!class_exists('resize')){
					include('lib/resize-image/resize-class.php');
				}
				$resizeObj = new resize($archivo);
				$resizeObj->resizeImage($alto,$ancho);
				$resizeObj->saveImage($archivo, 100);
				return true;
			}*/
			function separador_CSV($archivo,$separador,$columnas){
				$fp = fopen($archivo, 'r');
				while(($data = fgetcsv($fp, 1000, $separador)) !== FALSE){
					if(count($data) >= $columnas){
						$respuesta = true;
					}else{
						$respuesta = false;
					}
					break;
				}
				fclose($fp);
				return $respuesta;
			}
			function subir_img($tmp_name, $tmp_type, $foto_nombre, $ruta_carpeta){
				if($tmp_name!=''){
					if($tmp_type=='image/gif' || $tmp_type=='image/jpeg' || $tmp_type=='image/png'){
						$img_tipo 	= explode('/',$tmp_type);
						$foto 		= $foto_nombre.'.'.$img_tipo[1];
						$ruta_foto 	= $ruta_carpeta.$foto;
						if(move_uploaded_file($tmp_name,$ruta_foto)){
							$mensaje = '</br>* Se guardó la imagen ('.$foto_nombre.') correctamente.';
							//$reducir_img 	= $funcion->reducir_img($ruta_foto,400,400);
							//if($reducir_img){
							//	$mensaje = '</br>* Se guardó la imagen correctamente.';
							//}
						}else{
							$mensaje = '</br>* No se guardó la imagen ('.$foto_nombre.'), debido a un problema en la misma.';
						}
					}else if($tmp_type!='image/gif' && $tmp_type!='image/jpeg' && $tmp_type!='image/png'){
						$mensaje = '</br>* No se guardó la imagen ('.$foto_nombre.'), debe estar en formato (jpeg ó png).';
					}
				}else{
					$mensaje = '</br>* Imagen ('.$foto_nombre.') vacia.';
				}
				return $mensaje;
			}

		//----- FIN MANEJO DE ARCHIVOS ----------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------




		function caducidad_reposo($fecha1, $fecha2){
			$dias = date_diff($fecha1, $fecha2);
			if($dias > 0){
				$caducidad = 'VIGENTE';
			}else{
				$caducidad = 'CADUCADO';
			}
			return $caducidad;
		}
		function date_diff($date1, $date2) {
			$current 	= $date1;
			$datetime2 	= date_create($date2);
			$count 		= 0;
			while(date_create($current) < $datetime2){
				$current = gmdate("Y-m-d", strtotime("+1 day", strtotime($current)));
				$count++;
			}
			return $count;
		}
		function semanas_dias($nro_dias){
			$nro_semanas= floor($nro_dias / 7);
			$nro_dias	= $nro_dias % 7;
			if($nro_semanas>0 && $nro_dias>0){
				$total = $nro_semanas.' semana'.(($nro_semanas>1)?'s':'').', '.$nro_dias.' dia'.(($nro_dias>1)?'s':'');
			}else if($nro_semanas>0 && $nro_dias==0){
				$total = $nro_semanas.' semana'.(($nro_semanas>1)?'s':'');
			}else if($nro_semanas==0 && $nro_dias>0){
				$total = $nro_dias.' dia'.(($nro_dias>1)?'s':'');
			}
			return $total;
		}
		function semanas_dias_numero($nro_dias){
			$total = $nro_dias / 7;
			return $total;
		}
	}

?>
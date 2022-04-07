<?php 

/*
  EL NÚCLEO DE LA APLICACIÓN!
*/

session_start();
setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Caracas');

#Constantes de conexión
define('DB_HOST','localhost');
define('DB_USER','informatica');
define('DB_PASS','infor');
define('DB_NAME','web_factura');
//define('DB_HOST','localhost');
//define('DB_USER','root');
//define('DB_PASS','Gtpr2015');
//define('DB_NAME','web_factura');

#Constantes de PHPMailer
define('PHPMAILER_HOST','smtp.gmail.com');
define('PHPMAILER_USER','facturahidrolara@gmail.com');
define('PHPMAILER_PASS','Gtpr2015');
define('PHPMAILER_PORT',587);

#Constantes de la APP
define('HTML_DIR','html/');
define('APP_TITLE','Registro Hidrolara');
//define('APP_URL','http://localhost/correos/');
define('APP_URL','http://hidrolara.gob.ve/correos/'); //Adaptado a mi nuevo entorno con Ubuntu
define('APP_URL_FACTURA','http://hidrolara.gob.ve/correos/core/facturas');

#Estructura
//require('vendor/autoload.php');
require('core/models/class.Conexion.php');
require('core/models/class.Nias.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/NiasAgregar.php');
require('core/bin/functions/NiasConsulta.php');
require('core/bin/functions/mesNombre.php');
require('core/bin/functions/ActualizarNia.php');
require('core/bin/functions/Users.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/LostpassTemplate.php');
require('html/library/class.phpmailer.php');

require('factura_online/factura_online_original.php');
//require('html/library/dompdf/autoload.inc.php');
require('core/bin/functions/Porcentaje.php');
require('core/bin/functions/Funcion.php');


$_users = Users();


?>

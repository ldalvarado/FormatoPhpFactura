<?php

  if($_POST) {

    require('core/core.php');

    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'login':
          require('core/bin/ajax/goLogin.php');
        break;
        case 'reg':
          require('core/bin/ajax/goReg.php');
        break;
        case 'env':
          require('core/bin/ajax/prueba.php');
        break;
        case 'lost':
          require('core/bin/ajax/goLostpass.php');
        break;
        case 'afi':
          require('core/bin/ajax/goAfiliacion.php');
        break;
        case 'agre':
          require('core/bin/ajax/goAgregar.php');
        break;
        case 'consul':
          require('core/bin/ajax/goConsulta.php');
        break;
        case 'elimnia':
          require('core/bin/ajax/goEliminarnia.php');
        break;
        case 'regisfact':
          require('core/bin/ajax/cargarArchivos.php');
        break;
        case 'buscact':
          require('core/bin/ajax/goActualizarnia.php');
        break;
        case 'actbusc':
          require('core/bin/ajax/goBusquedaActNia.php');
        break;
        case 'actnia':
          require('core/bin/ajax/goActualizarniaAct.php');
        break;
        case 'actpass':
          require('core/bin/ajax/goActualizarpass.php');
        break;
        case 'actuser':
          require('core/bin/ajax/goActualizardata.php');
        break;
        case 'actdatauser':
          require('core/bin/ajax/goActualizardatauser.php');
        break;
        case 'actdatapass':
          require('core/bin/ajax/goActualizardatapass.php');
        break;
        case 'actdatastatus':
          require('core/bin/ajax/goEliminardata.php');
        break;
        default:
          header('location: index.php');
        break;
    }
  } else {
    header('location: correo.php');
  }

?>

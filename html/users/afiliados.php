<?php include(HTML_DIR . 'private/header.php'); ?>
<?php include(HTML_DIR . 'private/topnav.php'); ?>
         <section class="main-content-wrapper">
            <section id="main-content">
                <div id="_AJAX_AGREGAR_ACCION"></div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="?view=index">Inicio</a></li>
                            <li><a href="#">Datos de usuario</a></li>
                            <li class="active">Nias afiliados</li>
                        </ul>
                        <div class="container-fluid">
                            <h1 class="h1">Nias afiliados</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="_AJAX_AGREGAR_">
                            <?php 
                                $status = $_users[$_SESSION['app_id']]['status'];
                                if($status == '3'){ ?>
                                    <div class="alert alert-dismissible alert-warning">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>ADVERTENCIA:</strong> Correo no verificado.
                                    </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Nias actualmente afiliados</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <a href="?view=nia" style="margin-bottom: 20px;color: white;" class="btn btn-success btn-3d btn-xs"><i class="fa fa-plus"></i> Agregar</a>
                                <?php 
                                    if($db->rows($sql_datos) > 0) {
                                        $i = 1;
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>Nia : </th>
                                                <th>Nombre : </th>
                                                <th class="hidden-sm">Fecha de registro : </th>
                                                <th class="hidden-sm">Ultima consulta : </th>
                                                <th>Actualizar nia : </th>
                                                <th>Eliminar Nia : </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($nias = $db->recorrer($sql_datos)) { ?>
                                            <tr>
                                                <th><?php echo $i; ?></th>
                                                <td><?php echo $nias['nia']; ?></td>
                                                <td><?php echo $nias['nombre_nia']; ?></td>
                                                <td class="hidden-sm"><?php echo $nias['fecha_creacion']; ?></td>
                                                <td class="hidden-sm"><?php echo $nias['ultima_consulta']; ?></td>
                                                
                                                <?php 
                                                    $datos =  encode_this("update=2&nia=1");
                                                    $link = APP_URL .'correo.php?view=action&'. $datos; 
                                                    //link de actualizar codificado
                                                ?>
                                                <td><button onclick="goBuscarActualizarNia(<?php echo $nias['nia']; ?>);" class="btn btn-success btn-3d btn-block"><i class="fa fa-floppy-o"></i> Actualizame</button></td>
                                                <td><button type="button" onclick="actiondel(<?php echo $nias['nia']; ?>);" class="btn btn-danger btn-3d btn-block"><i class="fa fa-times-circle" ></i> Eliminame</button></td>
                                            </tr>
                                            <?php
                                                    $i++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php 
                                    }else{
                                        echo "<h2>No hay nias afiliados a esta cuenta</h2>";
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
<?php include(HTML_DIR . 'private/footer.php'); ?>

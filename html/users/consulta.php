<?php include(HTML_DIR . 'private/header.php'); ?>
<?php include(HTML_DIR . 'private/topnav.php'); ?>
         <section class="main-content-wrapper">
            <section id="main-content">
                
                
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="?view=index">Inicio</a>
                            </li>
                            <li><a href="#">Datos de usuario</a></li>
                            <li class="active">Nias afiliados</li>
                        </ul>
                        <div class="container-fluid">
                            <h1 class="h1">Consultas de nias</h1>
                        </div>
                    </div>
                </div>
                
                <div id="_AJAX_AGREGAR_ACCION">
                    <?php 
                        $status = $_users[$_SESSION['app_id']]['status'];
                        if($status == '3'){ ?>
                            <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>ADVERTENCIA:</strong> Correo no verificado.
                            <!--<button type="button">x</button>-->
                            </div>
                    <?php }
                    ?>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Consultar NIA</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div role="form" onkeypress="return runScriptConsult(event)">
                                            <div class="form-group">
                                                <input id="consulta" type="text" class="form-control" placeholder="Escriba aqui el nia a consultar">
                                            </div>
                                            <div class="form-group">
                                                <button id="todo-enter" onclick="goConsolaConsulta();" class="btn btn-primary pull-right">Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Nias a consultar</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php if($db->rows($sql_datos) > 0) { $i = 1; ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>Nia : </th>
                                                <th>Nombre : </th>
                                                <th>Ultima visualizacion : </th>
                                                <th>Visualizar factura : </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($nias = $db->recorrer($sql_datos)) { ?>
                                            <tr>
                                                <th><?php echo $i; ?></th>
                                                <td><?php echo $nias['nia']; ?></td>
                                                <td><?php echo $nias['nombre_nia']; ?></td>
                                                <td><?php echo $nias['ultima_consulta']; ?></td>
                                                <td><button type="button" onclick="goConsultarNia(<?php echo $nias['nia']; ?>)" class="btn btn-info btn-3d btn-block"><i class="fa fa-search"></i> Consultame</button></td>
                                            </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php }else{ 
                                    echo "<h2>No hay nias afiliados a esta cuenta</h2>";;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="_AJAX_AGREGAR_"></div>
            </section>
        </section>
    </section>
<?php include(HTML_DIR . 'private/footer.php'); ?>
<?php include(HTML_DIR . 'private/header.php'); ?>
<?php include(HTML_DIR . 'private/topnav.php'); ?>
        <section class="main-content-wrapper" >
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb">
                            <li><a href="?view=index">Inicio</a></li>
                            <li>Administrador</li>
                            <li class="active">Lista de usuarios</li>
                        </ul>
                        <!--breadcrumbs end -->
                    <h1 class="h1">Lista de usuarios</h1>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div id="_AJAX_ACT_">
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
                                <h3 class="panel-title">Lista de usuarios</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table id="userdata" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Login</th>
                                            <th>Nombre</th>
                                            <th>Cedula</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Fecha creacion</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($db->rows($sql_users) > 0) { 
                                            while($users = $db->recorrer($sql_users)) { 
                                                $id = $users["id"];
                                                $datos = encode_this("id=$id");
                                                $link = APP_URL . 'correo.php?view=editar&' . $datos;
                                            ?>
                                            <tr>
                                                <td><?php echo $users['login'] ?></td>
                                                <td><?php echo $users['primer_nombre']." ".$users['primer_apellido'] ?></td>
                                                <td><?php echo $users['cedula'] ?></td>
                                                <td><?php echo $users['correo'] ?></td>
                                                <td><?php echo $users['telefono'] ?></td>
                                                <td><?php echo $users['fecha_creacion'] ?></td>
                                                <td><a href="<?php echo $link ?>" class="btn btn-success" title="Actualizar"><i class="fa fa-gear"></i></a> <button class="btn btn-danger" title="Eliminar" onclick="eliminardata(<?php echo $id ?>)"><i class="fa fa-trash-o"></i></button></td>
                                            </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
    
<?php include(HTML_DIR . 'private/footer.php'); ?>
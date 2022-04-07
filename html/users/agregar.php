<?php include(HTML_DIR . 'private/header.php'); ?>
<?php include(HTML_DIR . 'private/topnav.php'); ?>
        <section class="main-content-wrapper" style="min-height: 650px;">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="?view=afiliados">Nias del usuario</a>
                            </li>
                            <li><a href="#">Modificaciones de nias</a></li>
                            <li class="active">Agregar Nias</li>
                        </ul>
                        <div class="container-fluid">
                            <h1 class="h1">Agregar nias</h1>
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
                            </div>
                    <?php }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Agregar NIA: </h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-horizontal form-border" id="form" role="form" onkeypress="return runScriptBuscarNia(event)">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nia para agregar : </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="nia" id="nia" required="" placeholder="Nia a agregar">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-6 col-sm-4">
                                            <button type="submit" class="btn btn-block btn-primary" onclick="goBuscarNia()">Verificar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="_AJAX_AGREGAR_"></div>
                    </div>
                </div>

                <div style="padding-bottom: 250px;"></div>
            </section>
        </section>
    </section>
    
<?php include(HTML_DIR . 'private/footer.php'); ?>
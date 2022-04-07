<?php include(HTML_DIR . 'private/header.php'); ?>
<?php include(HTML_DIR . 'private/topnav.php'); ?>
        <section class="main-content-wrapper">
            <section id="main-content">
                <br><br>
                <center>
                    <h1 style="color: white;text-shadow: rgb(26, 26, 26) 2px 2px 0px, rgb(17, 85, 153) -2px -2px 0px, rgb(102, 179, 255) 0px 0px 6px, rgb(26, 26, 26) 3px 3px 5px;padding-bottom: 50px;    font-size: 44px;">BIENVENIDO AL SISTEMA DE FACTURA ONLINE DE HIDROLARA</h1>

                </center>     
                
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Buscar NIA</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="new-todo" type="text" class="form-control" placeholder="Escriba aqui el nia a buscar">
                                            <section id='main'>
                                                <ul id='todo-list'></ul>
                                            </section>
                                        </div>
                                        <div class="form-group">
                                            <button id="todo-enter" class="btn btn-primary pull-right">Buscar</button>
                                            <div id='todo-count'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <br><br>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-red">
                            <div class="content">
                                <h1 style="padding-top: 15px;padding-bottom: 15px;">Perfil de usuario</h1>
                                <a href="?view=perfil" style="color: white;"><i class="fa fa-user" ></i> Click aqui</a>
                            </div>
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-turquoise">
                            <div class="content">
                                <h1 style="padding-top: 15px;padding-bottom: 15px;">NIAS afiliados</h1>
                                <a href="?view=afiliados" style="color: white;"><i class="fa fa-user"></i> Click aqui</a>
                            </div>
                            <div class="icon"><i class="fa fa-comments"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="dashboard-tile detail tile-blue">
                            <div class="content">
                                <h1 style="padding-top: 15px;padding-bottom: 15px;">Consulta de nia</h1>
                                <a href="?view=consultar" style="color: white;"><i class="fa fa-user"></i> Click aqui</a>
                            </div>
                            <div class="icon"><i class="fa fa-comments"></i></div>
                        </div>
                    </div>
                </div>                
            </section>
        </section>
    </section>
<?php include(HTML_DIR . 'private/footer.php'); ?>
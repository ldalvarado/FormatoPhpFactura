    <body>
        <section id="container">
            <header id="header">
                <div class="brand">
                    <a href="?view=index" class="logo"><span>Hidro</span>lara</a>
                </div>
                <div class="toggle-navigation toggle-left">
                    <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Boton de navegacion">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="user-nav">
                    <ul>
                        <li class="profile-photo">
                            <img src="views/web/assets/img/hombre.png" style="height: 40px;width: 40px;" alt="" class="img-circle">
                        </li>
                        <li class="dropdown settings">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                          <?php echo strtoupper($_users[$_SESSION['app_id']]['login']); ?>  <i class="fa fa-angle-down"></i>
                        </a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li>
                                    <a href="?view=perfil"><i class="fa fa-user"></i> Perfil</a>
                                </li>
                                <li>
                                    <a href="?view=logout"><i class="fa fa-power-off"></i> Salir</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>
            <aside class="sidebar">
                <div id="leftside-navigation" class="nano">
                    <ul class="nano-content">
                        <li>
                            <a href="?view=index"><i class="fa fa-dashboard"></i><span>Inicio</span></a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:void(0);"><i class="fa fa-users"></i><span>Datos usuario</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                            <ul>
                                <li><a href="?view=afiliados">Nias afiliados</a>
                                </li>
                                <li><a href="?view=consultar">Consulta de Nia</a>
                                </li>
                                <li><a href="?view=logout">Salir</a>
                                </li>
                            </ul>
                        </li>
                        <?php if($_users[$_SESSION['app_id']]['nivel'] == 3){ ?>
                        <li class="sub-menu">
                            <a href="javascript:void(0);"><i class="fa fa-cogs"></i><span>Administraciones</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                            <ul>
                                <li><a href="?view=usuarios">Usuarios</a>
                                </li>
                                <li><a href="?view=gestores">Gestores</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li class="sub-menu">
                            <a href="javascript:void(0);"><i class="fa fa-question-circle"></i><span>Ayuda</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                            <ul>
                                <li><a href="?view=ayuda">Ayuda del sistema</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>
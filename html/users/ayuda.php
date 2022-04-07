<?php include(HTML_DIR . 'private/header.php'); ?>
<?php include(HTML_DIR . 'private/topnav.php'); ?>
	<section class="main-content-wrapper" style="min-height: 650px;">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="?view=afiliados">Ayuda del sistema</a>
                            </li>
                            <li class="active">Ayuda</li>
                        </ul>
                        <div class="container-fluid">
                            <h1 class="h1">Ayuda sobre el sistema</h1>
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
                                <h3 class="panel-title">Ayuda del sistema: </h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                            	<div class="container">
                            		<div class="row">
                            			<div class="col-lg-4">
                            				<img src="" alt="">
                            			</div>	
                            			<div class="col-lg-4">
                            				<img src="" alt="">
                            			</div>
                            			<div class="col-lg-4">
                            				<img src="" alt="">
                            			</div>
                            		</div>
                            	</div>
                                <div class="container-fluid">
                                	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit praesentium voluptate hic reiciendis porro at ipsam mollitia consequuntur minus nobis sed sint dignissimos eius, maiores laborum, voluptas adipisci numquam rerum!</div>
                                	<div>Rem quisquam, tenetur fuga dolorem praesentium vitae nisi quam obcaecati ex explicabo aliquam non eveniet pariatur, cum corporis ullam sapiente accusantium ratione officia. Perspiciatis possimus quibusdam quisquam harum ipsum et!</div>
                                	<div><h3>Una factura para todas las industrias</h3>
									Un error común es considerar que las plantillas de factura gratuitas online se limitan a una sola industria. La verdad es que, con el avanzado generador de facturas gratuito que está disponible a través de Invoice Home, usted tiene la capacidad de crear una factura que cumpla con las necesidades de su negocio. Esto significa que si usted está trabajando en un consultorio médico y necesita hacer facturación de todo, desde inyecciones a exámenes físicos, puede crear una factura que funcione para usted.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="padding-bottom: 250px;"></div>
            </section>
        </section>
    </section>
<?php include(HTML_DIR . 'private/footer.php'); ?>
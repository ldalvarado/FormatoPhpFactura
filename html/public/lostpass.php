	<?php include(HTML_DIR . 'overall/header.php'); ?>

	<body>
		<div class="body-login">
	        <div class="form-signin" style="max-width: 400px;">
	            <br>
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h4 style="color:blue;"><span class="glyphicon glyphicon-lock"></span> Recuperar contraseña</h4>
	                </div>
	                <div id="_AJAX_LOSTPASS_"></div>
	                <div class="modal-body">
	                    <div class="form-group" onkeypress="return runScriptLost(event)">
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-wrench"></span> Email de registro <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="email" placeholder="Introducir Correo">
                            </div>
	                        <button type="button" class="btn btn-default btn-primary btn-block" onclick="goLostpass()" id="recuperacion"><span class="glyphicon glyphicon-off"></span> Recuperar contraseña</button>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                	<div class="row">
							<div class="col-5" style="padding-right: 125px;">
								<a  href="?view=index" class="btn btn-outline-primary"  data-dismiss="modal"><span class="glyphicon glyphicon-chevron-left"></span> Iniciar Sesión</a>
							</div>
							<div class="col-7">
								<a href="?view=register" style="padding-left: 90px;line-height: 35px;">Registrarse</a>
							</div>
						</div>
	                </div>
	            </div>
	        </div>   
	    </div>

	    <?php include(HTML_DIR . 'overall/footer.php'); ?>
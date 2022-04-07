	<?php include(HTML_DIR . 'overall/header.php'); ?>

	<body>
		<div class="body-login">
	        <div class="form-signin" style="max-width: 400px;">
	            <br>
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h4 style="color:blue;"><span class="glyphicon glyphicon-lock"></span> Iniciar Sesión</h4>
	                </div>
	                <div id="_AJAX_LOGIN_"></div>
	                <div class="modal-body">
	                    <div role="form" onkeypress="return runScriptLogin(event)">
	                            <div class="form-group">
	                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Usuario</label>
	                                <input type="text" class="form-control" id="user_login" placeholder="Introducir Usuario">
	                            </div>
	                            <div class="form-group">
	                                <label for="psw"><span class="glyphicon glyphicon-wrench"></span> Contraseña</label>
	                                <input type="password" class="form-control" id="pass_login" placeholder="Introducir Contraseña">
	                            </div>
	                            <!--<div class="form-group">
	                            	<div class="g-recaptcha" style="width: 100%;" data-sitekey="6LcaWFgUAAAAAAJlvPFbf8vFxNWU6tnlinunDoYV"></div>
	                            </div>-->
	                        <button type="button" class="btn btn-default btn-primary btn-block" onclick="goLogin()" id="iniciar_sesion"><span class="glyphicon glyphicon-off"></span> Iniciar Sesión</button>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                	<div class="row">
							<div class="col-5" style="padding-right: 45px;">
								<a  href="?view=register" class="btn btn-outline-primary"  data-dismiss="modal"><span class="glyphicon glyphicon-chevron-left"></span> Registrarse</a>
							</div>
							<div class="col-7">
								<a href="?view=lostpass" style="line-height: 35px;">¿Perdiste la contraseña?</a>
							</div>
						</div>
						
						

	                </div>
	                <!--
						<button
						class="g-recaptcha"
						data-sitekey="6LdIT1gUAAAAAMit2nRU_YrSvFC3CXl0d7fl5FwK"
						data-callback="YourOnSubmitFn">
						Submit
						</button>
	                -->
	            </div>
	        </div>   
	    </div>

	    <?php include(HTML_DIR . 'overall/footer.php'); ?>
	

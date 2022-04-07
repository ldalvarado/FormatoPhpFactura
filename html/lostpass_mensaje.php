	<?php include(HTML_DIR . 'overall/header.php'); ?>

	<body>
		<div class="body-login">
	        <div class="form-signin" style="max-width: 400px;">
	            <br>
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h4 style="color:blue;"><span class="glyphicon glyphicon-lock"></span> <?php echo $accion; ?></h4>
	                </div>
					<div class="modal-body">
	                    <div class="form-group">
					      <strong>¡Contraseña cambiada!</strong> se ha generado una nueva contraseña <strong><?php echo $password; ?></strong> , prueba <a data-toggle="modal" data-target="#Login">iniciar sesión</a> con ella y podrás cambiarla una vez estes dentro.
					  
	                </div>
	                <div class="modal-footer">
	                	<a href="?view=index" class="btn btn-default btn-primary btn-block" onclick="goLogin()" id="iniciar_sesion"><span class="glyphicon glyphicon-off"></span> Volver al inicio</a>
	                </div>
	            </div>
	        </div>   
	    </div>

	    <?php include(HTML_DIR . 'overall/footer.php'); ?>

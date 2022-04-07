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
	                        <h6><?php echo $variable; ?><span class="glyphicon glyphicon-lock"></span></h6>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                	<a href="?view=index" class="btn btn-default btn-primary btn-block" onclick="goLogin()" id="iniciar_sesion"><span class="glyphicon glyphicon-off"></span> Volver al inicio</a>
	                </div>
	            </div>
	        </div>   
	    </div>

	    <?php include(HTML_DIR . 'overall/footer.php'); ?>
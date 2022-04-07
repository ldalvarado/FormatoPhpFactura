	<?php include(HTML_DIR . 'overall/header.php'); ?>

	<body>
		<div class="body-register">
            <div class="form-signin">
                <br>
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 style="color:blue;"><img src="views/app/img/LogoSin.png" alt="" width="30px" height="35px"> Registro de Hidrolara</h4>
                    </div>
                    <div id="_AJAX_REG_" class="_AJAX_REG_"></div>
                    <div class="modal-body">
                        <div role="form" onkeypress="return runScriptReg(event)">
                        	<div class="form-group">
							  	<label class="control-label" >Nombre de usuario <span style="color:red;">*</span></label>
							  	<input class="form-control" type="text" id="users_reg" title="obligatorio" required pattern="[A-Za-z]{5,20}" placeholder="Introduzca nombre usuario">
							</div>

							<div class="form-group">
								<label for="correo">Correo <span style="color:red;">*</span></label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">@</div>
									</div>
									<input class="form-control " id="correo" required type="email" placeholder="ejemplo@ejemplo.com">
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-2 col-md-2 col-sm-3">
									<div class="form-group">
										<label for="nacionalidadform">Nacionalidad <span style="color:red;">*</span></label>
										<select style="height: 45px;width: 85px;" class="form-control" name="nacionalidad" id="nacionalidad">
											<option value="V">V</option>
											<option value="E">E</option>
											<option value="J">J</option>
											<option value="G">G</option>
										</select>
									</div>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-9">
									<div class="form-group">
										<div class="tooltipindex">
											<label for="cedula">Cedula o rif <span style="color:red;">*</span></label>
								 			<input class="form-control" type="text" pattern="[0-9]{7,10}" required maxlength="10" minlength="7" id="ced_reg" placeholder="Introduzca la cedula">
								 			<span class="tooltiptext">Solo numeros</span>
								 		</div>
									</div>
								</div>
							</div>

                        	<div class="row">
                        		<div class="col-xs-12 col-lg-6">
                        			<div class="form-group">
	                        			<div class="tooltipindex">
		                        			<label for="usrname"><span class="glyphicon glyphicon-user"></span> Primer nombre<span style="color:red;">*</span></label>
		                                    <input class="form-control" type="text" id="primer_nom_reg" placeholder="Escriba su primer nombre">
		                                    <span class="tooltiptext">Solo caracteres</span>
	                        			</div>
                        			</div>
                        		</div>
                        		<div class="col-xs-12 col-lg-6">
                        			<div class="tooltipindex">
                        				<label for="usrname"><span class="glyphicon glyphicon-user"></span> Segundo nombre</label>
                                    	<input class="form-control" type="text" id="seg_nom_reg" placeholder="Escriba su segundo nombre">
                                    	<span class="tooltiptext">Solo caracteres</span>
                                	</div>
                        		</div>
                        	</div>
                        	<div class="row">
                        		<div class="col-xs-12 col-lg-6">
                        			<div class="tooltipindex">
                        				<label for="psw"><span class="glyphicon glyphicon-wrench"></span> Primer apellido<span style="color:red;">*</span></label>
                                    	<input type="text" class="form-control" id="primer_ape_reg" placeholder="Escriba su primer apellido">
                                    	<span class="tooltiptext">Solo caracteres</span>
                        			</div>
								</div>
                        		<div class="col-xs-12 col-lg-6">
                        			<div class="form-group">
	                        			<div class="tooltipindex">
		                        			<label for="psw"><span class="glyphicon glyphicon-wrench"></span> Segundo apellido</label>
		                                    <input type="text" class="form-control" id="seg_ape_reg" placeholder="Escriba su segundo apellido">
		                                    <span class="tooltiptext">Solo caracteres</span>
	                                	</div>
                                	</div>
                        		</div>
                        	</div>

                        	<div class="form-group">
								<label for="telfono" >Numero de telefono <span style="color:red;">*</span></label>
								<div class="tooltipindex">
						 			<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">+58</div>
										</div>
										<input class="form-control" type="text" pattern="[0-9]{11}" required size="11" maxlength="11" id="telf_reg" placeholder="04161234567">
										<span class="tooltiptext">Solo numeros y maximo 11</span>
									</div>
					 			</div>
							</div>

                        	<div class="form-group">
							  	<label>Fecha de nacimiento</label>
							 	<input type="date" class="form-control" style="height: 45px;" required id="fecha_reg" name="fecha_reg" min="1950-01-01" max="2000-01-01" value="2000-01-01">
							</div>

							<label for="sex1">Sexo </label>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-3">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="optionsSex" id="optionsSex1" value="0" checked> 
											<label class="form-check-label" for="sex1">
										    	Mujer
										  	</label>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="optionsSex" id="optionsSex2" value="1"> 
											<label class="form-check-label" for="sex1">
										    	Hombre
										  	</label>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="optionsSex" id="optionsSex3" value="2"> 
											<label class="form-check-label" for="sex2">
										    	Otros
										  	</label>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="optionsSex" id="optionsSex4" value="3"> 
											<label class="form-check-label" for="sex3">
										    	No mencionar
										  	</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<div class="tooltipindex">
										  	<label class="control-label">Contraseña <span style="color:red;">*</span></label>
										  	<input class="form-control" id="primer_con_reg" type="password" required pattern="[A-Za-z0-9]{9,20}" id="primer_con_reg">
										  	<span class="tooltiptext">Solo numeros y letras</span>
									  	</div>
									</div>
								</div>
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<div class="tooltipindex">
									  		<label>Confirmar Contraseña <span style="color:red;">*</span></label>
									  		<input class="form-control" id="seg_con_reg" type="password" required pattern="[A-Za-z0-9]{9,20}" id="seg_con_reg">
									  		<span class="tooltiptext">Solo numeros y letras</span>
									  	</div>
									</div>
								</div>
							</div>

                            <button type="button" class="btn btn-default btn-primary btn-block" onclick="goRegistro()" id="iniciar_sesion"><span class="glyphicon glyphicon-off"></span> Registrarse</button>
                        </div>
                    </div>

                    <div class="modal-footer">

                    	<div class="container">
                    		<div class="row">
								<div class="col">
									<a href="?view=index" class="btn btn-outline-primary"  data-dismiss="modal"><span class="glyphicon glyphicon-chevron-left"></span> Regresar</a>
								</div>
								<div class="col-3">
									<!--<a href="?view=lostpass" style="line-height: 35px;" >¿Perdiste la contraseña?</a>-->
								</div>
							</div>
                    	</div>
                    </div>
                </div>
            </div>   
        </div>
        <?php include(HTML_DIR . 'overall/footer.php'); ?>
    </body>
</html>
<?php include(HTML_DIR . 'private/header.php'); ?>
<?php include(HTML_DIR . 'private/topnav.php'); ?>
        <section class="main-content-wrapper" style="min-height: 650px;">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="?view=index">Inicio</a>
                            </li>
                            <li><a href="#">Datos de usuario</a></li>
                            <li class="active">Peril de usuario</li>
                        </ul>
                        <div class="container-fluid">
                            <h1 class="h1">Perfil del usuario</h1>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div id="_AJAX_ACT_">
                            <?php 
                                $status = $_users[$id]['status'];
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
                                <h3 class="panel-title">Perfil</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-horizontal form-border" role="form" onkeypress="return runScriptActData(event)">
                                    <div class="form-group">
                                        <?php 
                                            $cedula = explode('-',$_users[$id]['cedula']);
                                            $telefono = explode('+58',$_users[$id]['telefono']);
                                        ?>
                                        <label class="col-sm-3 control-label">Cedula : </label>
                                        <div class="col-sm-2 col-md-2 col-lg-1">
                                            <select class="form-control">
                                                <?php if($cedula[0] == "V"){ ?>
                                                <option value="V" selected>V</option>
                                                <option value="E">E</option>
                                                <option value="J">J</option>
                                                <option value="G">G</option>
                                                <?php }elseif($cedula[0] == "E"){ ?>
                                                <option value="V" >V</option>
                                                <option value="E" selected>E</option>
                                                <option value="J">J</option>
                                                <option value="G">G</option>
                                                <?php }elseif($cedula[0] == "J"){ ?>
                                                <option value="V">V</option>
                                                <option value="E">E</option>
                                                <option value="J" selected>J</option>
                                                <option value="G">G</option>
                                                <?php }else{ ?>
                                                <option value="V">V</option>
                                                <option value="E">E</option>
                                                <option value="J">J</option>
                                                <option value="G" selected>G</option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="col-sm-4 col-lg-7">
                                            <input type="text" class="form-control" required="" name="ced_act" id="ced_act" placeholder="Ingrese la cedula" value="<?php echo $cedula[1]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Login : </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="users_act" id="users_act" required="" placeholder="Login" value="<?php echo $_users[$id]['login']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Correo electronico : </label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control " required="" name="email" id="email" placeholder="Correo electronico" value="<?php echo $_users[$id]['correo']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Primer nombre : </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="primer_nom_act" id="primer_nom_act" required="" placeholder="Primer nombre" value="<?php echo $_users[$id]['primer_nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Segundo nombre : </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="seg_nom_act" id="seg_nom_act" required="" placeholder="Segundo nombre" value="<?php echo $_users[$id]['segundo_nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Primer apellido : </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" required="" name="primer_ape_act" id="primer_ape_act" placeholder="Primer apellido" value="<?php echo $_users[$id]['primer_apellido']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Segundo apellido : </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" required="" name="seg_ape_act" id="seg_ape_act" placeholder="Segundo apellido" value="<?php echo $_users[$id]['segundo_apellido']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Numero de telefono : </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control " name="telf_act" id="telf_act" required="" placeholder="Numero de telefono" value="<?php echo $telefono['1']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Fecha de nacimiento : </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" required="" name="fecha" id="fecha" value="<?php echo $_users[$id]['nacimiento']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Sexo : </label>
                                        <div class="col-sm-6">
                                            <?php if($_users[$id]['sexo'] == '0'){ ?>
                                            <div class="radio">
                                                <input class="icheck" type="radio" checked="" name="optionsSex" id="optionsSex1" value="0" >
                                                <label>Mujer</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio"  name="optionsSex" id="optionsSex2" value="1">
                                                <label>Hombre</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex3" value="2">
                                                <label>Sin especificar</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex4" value="3">
                                                <label>No mencionar</label>
                                            </div>
                                            <?php }elseif($_users[$id]['sexo'] == '1'){ ?>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex1" value="0" >
                                                <label>Mujer</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" checked="" name="optionsSex" id="optionsSex2" value="1">
                                                <label>Hombre</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex3" value="2">
                                                <label>Sin especificar</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex4" value="3">
                                                <label>No mencionar</label>
                                            </div>
                                            <?php }elseif($_users[$id]['sexo'] == '2'){ ?>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex1" value="0" >
                                                <label>Mujer</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio"  name="optionsSex" id="optionsSex2" value="1">
                                                <label>Hombre</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" checked="" name="optionsSex" id="optionsSex3" value="2">
                                                <label>Sin especificar</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex4" value="3">
                                                <label>No mencionar</label>
                                            </div>
                                            <?php }elseif($_users[$id]['sexo'] == '3'){ ?>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex1" value="0" >
                                                <label>Mujer</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" checked="" name="optionsSex" id="optionsSex2" value="1">
                                                <label>Hombre</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" name="optionsSex" id="optionsSex3" value="2">
                                                <label>Sin especificar</label>
                                            </div>
                                            <div class="radio">
                                                <input class="icheck" type="radio" checked="" name="optionsSex" id="optionsSex4" value="3">
                                                <label>No mencionar</label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nivel de usuario : </label>
                                        <div class="col-sm-8">
                                            <select class="form-control">
                                                <?php if($_users[$id]['nivel'] == "3"){ ?>
                                                <option value="3" selected>Administrador</option>
                                                <option value="2">Organización</option>
                                                <option value="1">Corriente</option>
                                                <?php }elseif($_users[$id]['nivel'] == "2"){ ?>
                                                <option value="3" >Administrador</option>
                                                <option value="2" selected>Organización</option>
                                                <option value="J">J</option>
                                                <?php }elseif($_users[$id]['nivel'] == "1"){ ?>
                                                <option value="3">Administrador</option>
                                                <option value="2">Organización</option>
                                                <option value="1" selected>Corriente</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contraseña del administrador : </label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" name="pri_con_act" id="pri_con_act" required="" placeholder="Contraseña del administrador">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" required="" name="seg_con_act" id="seg_con_act" placeholder="Repetir Contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-7 col-sm-4">
                                            <button type="submit" onclick="goCambioDataAdmi()" class="btn btn-block btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cambio de contraseña</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-horizontal form-border" role="form" id="form" onkeypress="return runScriptActContra(event)">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contraseña del administrador : </label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="actual" id="actual_pass" required="" placeholder="Contraseña actual" title="obligatorio">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contraseña nueva : </label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" name="nuev_pass" id="nuev_pass" required="" placeholder="Contraseña nueva" title="obligatorio">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" name="confir_nuev" id="confir_nuev" required="" placeholder="Repetir contraseña" title="obligatorio">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-7 col-sm-4">
                                            <button type="button" class="btn btn-block btn-primary" onclick="goCambioContra();">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
<?php include(HTML_DIR . 'private/footer.php'); ?>
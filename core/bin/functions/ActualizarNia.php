<?php 


	function ListaActualizarBusquedaNia($nia){
		$HTML = '
			<div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title">Nia a actualizar: </h3>
	            </div>
	            <div class="panel-body">
					<div class="form-horizontal form-border" id="form" role="form" onkeypress="return runScriptBuscarActNia(event,'.$nia.')">
				        <div class="form-group">
				            <label class="col-sm-3 control-label">Nia a actualizar : </label>
				            <div class="col-sm-6">
				                <input type="text" class="form-control" name="nia" id="nia" required="" placeholder="Nia a actualizar" value="'.$nia.'">
				            </div>
				            <div class="col-sm-3">
				            	<button type="submit" class="btn btn-primary" onclick="goBuscarNiaAct('.$nia.')">Verificar</button>
				            </div>
				        </div>
				        <div class="form-group">
				            <div class="container-fluid">
				                <div id="_AJAX_ACT_NIA"></div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
	    ';
	    return $HTML;
	}
	function ListaAgregarNiaAct($nia_nuev,$nombre,$estado,$color,$nia_act){

		$HTML = '
			<div class="table-responsive">
	            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nia : </th>
                            <th>Nombre : </th>
                            <th>Estado : </th>
                            <th>Verificacion : </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>'.$nia_nuev.'</td>
                            <th>'.$nombre.' </th>
                            <th><i class="fa fa-circle" style="color: '.$color.';"></i> '.$estado.' </th>
                            ';
		if($estado == 'No disponible'){
			$HTML .= '		<td><p style="color:red;"><strong>¡No disponible!</strong></p></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>';
		
		}else{
			$HTML .= 		'<td><button onclick="actualizarNia('.$nia_nuev.','.$nia_act.');" type="button" class="btn btn-success btn-3d btn-block"><i class="fa fa-check"></i> Actualizar</button></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>';
		}

		return $HTML;

	}

 ?>
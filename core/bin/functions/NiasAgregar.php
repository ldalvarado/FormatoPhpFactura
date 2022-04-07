<?php 


	function ListaAgregarNia($nia,$nombre,$estado,$color){

		$HTML = '
			<div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title">Verificar NIA</h3>
	                <div class="actions pull-right">
	                    <i class="fa fa-chevron-down"></i>
	                </div>
	            </div>
	            <div class="panel-body">
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
	                                <td>'.$nia.'</td>
	                                <th>'.$nombre.' </th>
	                                <th><i class="fa fa-circle" style="color: '.$color.';"></i> '.$estado.' </th>
	                                ';
		if($estado == 'No disponible'){
			$HTML .= '				<td><p style="color:red;"><strong>¡No disponible!</strong></p></td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>';
		
		}else{
			$HTML .= 				'<td><button onclick="agregarNia('.$nia.');" type="button" class="btn btn-success btn-3d btn-block"><i class="fa fa-check"></i> Agregar</button></td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            ';
	        $HTML .= 	'<input type="hidden" value='.$nia.' id="niaid" name="niaid">
	        	</div>
	       	</div>';
		}


		return $HTML;

	}

?>
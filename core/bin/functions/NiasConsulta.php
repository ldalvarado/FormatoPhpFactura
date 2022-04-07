<?php 


	function ListaConsultaNia($o){
		$HTML = '
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Consulta de nia</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p><strong>Número de Identificación de Abonado: </strong></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p style="text-align: right;"><strong>'.$o->nia.'</strong></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p><strong>Nombre: </strong>'.$o->nombre.'</p>
                                            <p><strong>Domicilio: </strong>'.$o->domicilio.'</p>
                                            <p><strong>R.I.F.: </strong>'.$o->rif.'</p>
                                            <p><strong>Estado de Cuenta: </strong>'.$o->estado.'</p>
                                            <p><strong>Uso del Servicio: </strong>'.$o->uso.'</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <img class="hidden-md hidden-sm hidden-xs" style="float: right;" src="views/app/img/factura.png" class="img-responsive img-rounded" alt="">
                                        </div>
                                    </div>
                                </div>';
        if(!$o->nroRecibos){
        	$HTML .= '<h3>Ud. se encuentra solvente con la Hidrológica.<br /> Gracias por mantener su pago al Día.</span></div></H3>';
        }else{
        	$HTML .=    '<div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">#</th>
                                        <th style="text-align:center;">Año - Mes </th>
                                        <th style="text-align:center;">Factura</th>
                                        <th style="text-align:center;">Monto total </th>
                                        <!--<td>Visualizar factura</td>-->
                                    </tr>
                                </thead>';
            foreach($o->facturas as $y =>$r){
            	$HTML .= '      <tbody>
                                    <tr>
                                        <td style="text-align:center;">'.($y+1).'</td>
                                        <td>'.$r[0].'</td>
                                        <td>'.$r[1].'</td>
                                        <td>'.number_format($r[2]*1,2).' Bs.F</td>';
                if($y == 0){
                    $HTML .= '<!--<td><button type="button" class="btn btn-info btn-3d" title="ver factura"><i class="fa fa-search"></i> </button></td>-->
                                <td style="text-align:center;"><a href="?view=visualizar&nia='.$o->nia.'" target="_blank" title="ver factura"><i class="fa fa-search"></i> </a></td>
                    ';
                }
                $HTML .= '          </tr>
                                </tbody>';
           	}
            $HTML .= '  </table>
                    </div>';
            
        }
        $HTML .= '          
						        <div class="container-fluid">
						        	<p><span class="fa fa-warning"></span> Importante:</p>
									<p><span>Los datos presentados son de carácter informativo, no representan compromiso legal o administrativo por parte de Hidrolara C.A</span></p>
						        </div>
       						 </div>
                        </div>
                    </div>
                </div>
            
			
		';

		return $HTML;
	}


?>
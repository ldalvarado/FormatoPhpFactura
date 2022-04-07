<?php
	require_once('factura_online/dompdf/autoload.inc.php');
	use Dompdf\Adapter\CPDF;
	use Dompdf\Dompdf;
	use Dompdf\Exception;

	function Ver_factura($nia){
		error_reporting(E_ALL);
		ini_set('display_errors', '1');

		//$GLOBALS['path_utilidades'] = '../utilidades';

		//include($GLOBALS['path_utilidades'].'/src/ControlaBDMysql.php');
		//require_once($GLOBALS['path_utilidades'].'/src/Funcion.php');
		
		//use Dompdf\Adapter\CPDF;
		//use Dompdf\Dompdf;
		//use Dompdf\Exception;


		//session_start();
		//set_time_limit(0);
		ini_set('memory_limit','1204M');

		$cbd		= new Conexion();
		//$idcon		= $cbd->conectarSBD();
		//$bd			= $cbd->selectBD('web_factura');
		$funcion	= new Funcion();


		/*

		$facnia=='00115473'
		$facnia=='00115495'*/
		 //$_GET['nia'];


		$result = $cbd->query("SELECT * FROM factura_online WHERE facnia = '$nia'");
		$row 	= $cbd->recorrer($result);

		$cliente_nombre 		= utf8_encode($row['fac002']);
		$cliente_cedula_rif 	= $row['fac003'];
		$cliente_direccion 		= utf8_encode($row['fac004']);
		$cliente_codigo_postal 	= $row['fac005'];
		$cliente_poblacion 		= $row['fac006'].'/'.$row['fac007'];
		$cliente_num_fact_ruta 	= substr($row['fac008'],0,-5);
		$cliente_num_impresion 	= substr($row['fac008'],-5);
		$cliente_cod_situacion 	= $row['fac009'];
		$cliente_ruta 			= substr($row['fac008'],0,3);


		$explode_fac017 				= explode(' ',trim($row['fac017']));	//O2017FC1768375 3/08/2017 17/08 16.683,26

		$factura_nia 					= $row['facnia'];
		$factura_nro_factura 			= $explode_fac017[0]; //substr($row['fac017'],0,15);

		$factura_periodo_factura = 'vacio';
		$factura_fecha_emision = 'vacio';

		if( isset($explode_fac017[2])){
			$fecha_mes_anterior_emision 	= $funcion->fecha_anterior_php($funcion->formato_fecha_php($explode_fac017[2],'Y-m-d'),0,1,0,0);
			$desde_hasta 					= $funcion->formato_fecha_php($funcion->primer_dia_mes($fecha_mes_anterior_emision),'d/m/y').' al '.$funcion->formato_fecha_php($funcion->ultimo_dia_mes($fecha_mes_anterior_emision),'d/m/y');

			$factura_periodo_factura 		= (trim($row['fac042'])) ? $row['fac042'].' al '.$row['fac047'] : $desde_hasta;
			$factura_fecha_emision			= $funcion->formato_fecha_php($explode_fac017[2],'d/m/Y');
		}
		
		$factura_hora 					= $row['fac116'];
		$factura_condiciones 			= 'Contado';
		$factura_fecha_lim_pago			= $row['fac023'];
		$factura_sub_nia				= $row['fasnia'];


		$servicio_dotacion 				= number_format(($row['fac117'] / 100),2,',','.');
		$servicio_uso 					= $row['fac118'];
		$servicio_tipo_suministro 		= $row['fac119'];
		$servicio_tarifa_aplicada 		= $row['fac120'];

		$consumo_dotacion 				= number_format($row['fac059'],2,',','.').' '.$row['fac060'].'/Mes';


		$detalle_descripcion 			= $row['fac057'].'&nbsp;<br/>'.$row['fac062'].'&nbsp;<br/>'.$row['fac067'].'&nbsp;<br/>'.$row['fac072'].'&nbsp;';
		$detalle_cantidad 				= $row['fac059'].' '.$row['fac060'].'&nbsp;<br/>'.$row['fac064'].' '.$row['fac065'].'&nbsp;<br/>'.$row['fac069'].' '.$row['fac070'].'&nbsp;<br/>&nbsp;';
		$detalle_unitario 				= $row['fac058'].'&nbsp;<br/>'.$row['fac063'].'&nbsp;<br/>'.$row['fac068'].'&nbsp;<br/>&nbsp;';
		$detalle_subtotal 				= $row['fac061'].'&nbsp;<br/>'.$row['fac066'].'&nbsp;<br/>'.$row['fac071'].'&nbsp;<br/>'.$row['fac076'];

		$detalle_base_imponible 		= trim($row['fac088']);
		$detalle_base_exenta 			= (trim($row['fac092'])?$row['fac092']:'0,00');

		//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$detalle_monto_iva 				= 9;//trim($row['fac090']); //--- 9
		//-------------------------------------------------------------------------------------------------------------------------------------------------------------------

		$detalle_total_esta_factura 	= $row['fac105'];
		$detalle_saldo_anterior 		= $row['fac106']; //---
		$detalle_factura_pendiente 		= (integer) $row['fac125'];
		$detalle_total_pagar 			= $row['fac107']; //---

		$detalle_fecha_lim_pago 		= $factura_fecha_lim_pago;


		$detalle_base_imponible_limpio	= str_replace(array('.',','),array('','.'),$detalle_base_imponible);
		$detalle_base_exenta_limpia		= str_replace(array('.',','),array('','.'),$detalle_base_exenta);
		$detalle_monto_iva_limpio		= str_replace(array('.',','),array('','.'),$detalle_monto_iva);
		$detalle_saldo_anterior_limpio	= str_replace(array('.',','),array('','.'),$detalle_saldo_anterior);

		//----- SI EL IVA SIGUE ESTANDO EN 12% ------------------------------------------------------------------------------------------------------------------------------
		$detalle_monto_iva_12 			= 12;
		//-------------------------------------------------------------------------------------------------------------------------------------------------------------------

		$detalle_iva_12 				= ($detalle_base_imponible_limpio * $detalle_monto_iva_12 / 100);
		$detalle_total_antes_rebaja 	= $detalle_base_imponible_limpio + $detalle_base_exenta + $detalle_iva_12;

		//----- SI EXISTE REBAJA DEL IVA ------------------------------------------------------------------------------------------------------------------------------------
		//$detalle_monto_iva_rebaja 		= $detalle_monto_iva_12 - $detalle_monto_iva;
		$detalle_monto_iva_rebaja 		= $detalle_monto_iva_12 - $detalle_monto_iva;
		$detalle_total_rebaja 			= round(($detalle_base_imponible_limpio * $detalle_monto_iva_rebaja / 100),2);
		$detalle_total_despues_rebaja 	= $detalle_total_antes_rebaja - $detalle_total_rebaja;
		$detalle_total_pagar 			= number_format(($detalle_total_despues_rebaja + $detalle_saldo_anterior_limpio),2,',','.');
		//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$detalle_total_pagar_bsS = (float)str_replace(array('.',','),array('','.'),$detalle_total_pagar);
		$detalle_total_pagar_bsS = (float)$detalle_total_pagar_bsS/100000;
		$detalle_total_pagar_bsS = number_format($detalle_total_pagar_bsS,2,',','.');
		
		$data = true;
		if($servicio_tipo_suministro != null){
			$porciento = '';

			$medidor = '';
			$consumo = '';
			$diametro = '';

			$inicial = 0;
			$final = 0;

			$fac024 = '';
			$fac025 = '';
			$fac026 = '';
			$fac027 = '';

			$explode_fac024 = '';
			$explode_fac025 = '';
			$explode_fac026 = '';
			$explode_fac027 = '';
			$arr01 = '';

			if ($servicio_tipo_suministro != 'TAR.PLANAN') {
				$data = false;

				$medidor = $row['fac052'];
				$consumo = $row['fac050'];
				$diametro = $row['fac054'];

				$inicial = $row['fac044'];
				$final = $row['fac048'];

				$explode_fac024 = explode(' ',trim($row['fac024']));
				$explode_fac025 = explode(' ',trim($row['fac025']));
				$explode_fac026 = explode(' ',trim($row['fac026']));
				$explode_fac027 = explode(' ',trim($row['fac027']));

				$fac024 = (integer) $explode_fac024[1];
				$fac025 = (integer) $explode_fac025[1];
				$fac026 = (integer) $explode_fac026[1];
				$fac027 = (integer) $explode_fac027[1];

				$porciento = '';
				if($fac024 != '0' && $fac025 != '0' && $fac026 != '0'  && $fac027 != '0' ){
					$porciento = new calcular($fac024,$fac025,$fac026,$fac027);
				}else{
					$porciento = new calcular("100","100","100","100");
				}
				$arr01 = $porciento->porcentaje();
				$servicio_tipo_suministro = "MEDICIÓN";
			}
			
		}
		$detalleConsumo = '';

		if($data==true){
			$detalleConsumo='
				<table style="border:1px solid blue;border-collapse: collapse;">
		            <tr>
		                <th style="border-bottom: 1px solid blue;padding:3px">
		                    <center>DETALLE DEL CONSUMO</center>
		                </th>
		            </tr>
		            <tr>
		                <td style="border-bottom: 1px solid blue;">
		                    <table style="margin: 0 auto;">
		                        <tr>
		                            <td style="text-align: left; vertical-align:top;">
		                                <strong>
		                                   	<br/>
		                                    Tarifa Plana <br/>
		                                    Dotación: <br/>
		                                    <!--texto--><br/>
		                                    <!--texto--><br/>
		                                </strong>
		                            </td>
		                            <td style="text-align: left; vertical-align:top;">
		                                <br/>
		                                <br/>
		                                '.$consumo_dotacion.'<br/>
		                                <br/>
		                                <br/>
		                            </td>
		                        </tr>
		                    </table>
		                </td>
		            </tr>
		            <tr>
		                <td style="text-align: center;padding-bottom:6px;">
		                    <br/>
		                    <br/>
		                    <br/>
		                    <br/>
		                    Su consumo está siendo<br/>
		                    Facturado según lo estipulado en la<br/>
		                    Ley de Reforma Parcial de la<br/>
		                    Ley Orgánica para la Prestación<br/>
		                    De los Servicios de Agua Potable<br/>
		                    y Saneamiento, Gaceta Oficial<br/>
		                    N°38.763 de fecha 06 de Septiembre<br/>
		                    del Año 2007<br/>
		                    en su Capitulo I, Articulo 86.<br/>
		                    <br/>
		                    <br/>
		                    <br/>
		                    <br/>
		                </td>
		            </tr>
		        </table>
		    ';
		}else{
		    $detalleConsumo='
		        <table style="border:1px solid blue;border-collapse: collapse;">
		            <tr>
		                <th style="border-bottom: 1px solid blue;padding:3px;">
		                    <center>DETALLE DEL CONSUMO</center>
		                </th>
		            </tr>
		            <tr>
		                <td style="border-bottom: 1px solid blue;padding-top:30px;padding-bottom:30px;">
		                    <table style="margin: 0 auto;">
		                        <tr>
		                            <td style="text-align:right;vertical-align:top;">
		                                <strong>
		                                    Medidor: <br>
		                                    Lectura Inicial: <br>
		                                    Lectura Final: <br>
		                                    Consumo: <br>
		                                    Diámetro: <br>
		                                </strong>
		                            </td>
		                            <td style="text-align: justify; vertical-align:top;">
		                                '.$medidor.'<br/>
		                                '.$inicial.'<br/>
		                                '.$final.'<br/>
		                                '.$consumo.' m3<br/>
		                                '.$diametro.'<br/>
		                            </td>
		                        </tr>
		                    </table>
		                </td>
		            </tr>
		            <tr>
		                <td id="div1" style="text-align: center;padding:8px;padding-bottom:47px;">
		                    <span style="text-align=center;font-size=7px;">Último consumo facturados en m3</span><br />
		                    <table style="margin:0 auto; text-align:center;">
		                        <tr>
		                            <td>'.$fac027.'</td>
		                            <td>'.$fac026.'</td>
		                            <td>'.$fac025.'</td>
		                            <td>'.$fac024.'</td>
		                        </tr>
		                        <tr>
		                            <td style="vertical-align: bottom;height:106px;padding:5px;">
		                            	<div style="height:'.$arr01[3].'px;"></div>
		                            </td>
		                            <td style="vertical-align: bottom;padding:5px;">
		                            	<div style="height:'.$arr01[2].'px;"></div>
		                            </td>
		                            <td style="vertical-align: bottom;padding:5px;">
		                            	<div style="height:'.$arr01[1].'px;"></div>
		                            </td>
		                            <td style="vertical-align: bottom;padding:5px;">
		                            	<div style="height:'.$arr01[0].'px;"></div></span>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td>'.$explode_fac027[0].'</td>
		                            <td>'.$explode_fac026[0].'</td>
		                            <td>'.$explode_fac025[0].'</td>
		                            <td>'.$explode_fac024[0].'</td>
		                        </tr>
		                    </table>
		                </td>
		            </tr>
		        </table>
		    ';
		}


		$codigoFactura = '
				<table id="tableprimary" style="border: 1px solid blue; margin: 0 auto; border-collapse: collapse;">
					<tr>
						<td style="padding-right:10px; padding-left:10px;">
							<table style="margin: 0 auto;">
								<tr>
									<td>
										<table style="border-collapse: collapse;">
											<tr>
												<td>
													<table>
														<tr>
															<td width="30%">
																<img src="factura_online/img/hidrolara.png" height="50">
															</td>
															<td width="70%"style="font-size:15px">
																<strong>HIDROLARA C.A.</strong><br>
																<span style="font-size:10px; text-align:justify;">
																	<strong>
																		Calle 48 con carrera 13, Edif. Hidrolara, Piso 2 local S/N<br>
																		Sector San Vicente, Caja de Agua, Barquisimeto, Edo. Lara
																	</strong>
																	<br><a href="#">www.hidrolara.gob.ve</a>
																	<br>Twitter: @HidrolaraCA<br>
																	<strong>Atención al cliente 0800-HIDROLA (4437652)</strong>
																</span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr style="background-color: rgb(142, 180, 227);border-radius: 2px;text-align:center;">
												<th style="text-align:center;font-size: 12px"><strong>DATOS DEL ABONADO</strong></th>
											</tr>
											<tr>
												<td>
													<table>
														<tr>
															<td style="font-size:11px"><b>Nombre:</b></td>
															<td style="font-size:11px">'.$cliente_nombre.'</td>
														</tr>
														<tr>
															<td style="font-size:11px"><b>Cédula o Rif:</b></td>
															<td style="font-size:11px">'.$cliente_cedula_rif.'</td>
														</tr>
														<tr>
															<td style="font-size:11px"><b>Domicilio Fiscal:</b></td>
															<td style="font-size:11px">'.$cliente_direccion.'</td>
														</tr>
														<tr>
															<td style="font-size:11px"><b>Codigo Postal:</b></td>
															<td style="font-size:11px">'.$cliente_codigo_postal.'</td>
														</tr>
														<tr>
															<td style="font-size:11px"><b>Población:</b></td>
															<td style="font-size:11px">'.$cliente_poblacion.'</td>
														</tr>
														<tr>
															<td style="font-size:11px"><b>Núm.Fact.Ruta:</b></td>
															<td style="font-size:11px">'.$cliente_num_fact_ruta.'</td>
														</tr>
														<tr>
															<td style="font-size:11px"><b>Núm.Impresión:</b></td>
															<td style="font-size:11px">'.$cliente_num_impresion.'</td>
														</tr>
														<tr>
															<td style="font-size:11px"><b>Cod.Situación:</b></td>
															<td style="font-size:11px">'.$cliente_cod_situacion.'</td>
														</tr>
														<tr>
															<td style="font-size:11px"><b>Ruta:</b></td>
															<td style="font-size:11px">'.$cliente_ruta.'</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td style="padding-left:  5px;">
										<table style="border-collapse: collapse;">
											<tr style="background-color: rgb(142, 180, 227);border-radius: 2px;text-align:center;">
												<th style="font-size: 20px" colspan="2"><strong>FACTURA</strong></th>
											</tr>
											<tr>
												<td style="font-size:16px"><b>NIA:</b></td>
												<td style="font-size:16px"><b>'.$factura_nia.'</b></td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Nro.Factura:</b></td>
												<td style="font-size:11px">'.$factura_nro_factura.'</td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Período de Factura:</b></td>
												<td style="font-size:11px">'.$factura_periodo_factura.'</td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Fecha de Emisión:</b></td>
												<td style="font-size:11px">'.$factura_fecha_emision.'</td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Hora:</b></td>
												<td style="font-size:11px">'.$factura_hora.'</td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Condiciones:</b></td>
												<td style="font-size:11px">'.$factura_condiciones.'</td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Fecha Lím. Pago:</b></td>
												<td style="font-size:11px">'.$factura_fecha_lim_pago.'</td>
											</tr>
											<tr>
												<td style="font-size:14px"><b>SUB-NIA:</b></td>
												<td style="font-size:14px"><b>'.$factura_sub_nia.'</b></td>
											</tr>
		                                    <tr style="background-color: rgb(142, 180, 227);border-radius: 2px;text-align:center;">
		                                        <th style="font-size: 18px;" colspan="2">
		                                                DATOS DEL SERVICIO
		                                        </th>
		                                    </tr>
											<tr>
												<td style="font-size:11px"><b>Dotación:</b></td>
												<td style="font-size:11px">'.$servicio_dotacion.'</td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Uso:</b></td>
												<td style="font-size:11px">'.$servicio_uso.'</td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Tipo Suministro:</b></td>
												<td style="font-size:11px">'.$servicio_tipo_suministro.'</td>
											</tr>
											<tr>
												<td style="font-size:11px"><b>Tarifa aplicada:</b></td>
												<td style="font-size:11px">'.$servicio_tarifa_aplicada.'</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td >
							<table style="margin: 0 auto;">
								<tr>
									<td>
										'.$detalleConsumo.'
									</td>
									<td style="padding-left:  5px;">
										<table style="border:1px solid blue; border-color:blue;border-collapse: collapse;vertical-align: top; ">
											<tr>
												<th style="border-bottom: 1px solid blue;border-top: 1px solid blue;text-align:center;padding-bottom:5px;" colspan="4">DETALLE DE LA FACTURACIÓN</th>
											</tr>
											<tr>
												<th style="border-right: 1px solid blue;border-bottom: 1px solid blue; text-align:left;">Descripción</th>
												<th style="border-right: 1px solid blue;border-bottom: 1px solid blue;text-align: center;">Cantidad</th>
												<th style="padding-left:15px;border-right: 1px solid blue;border-bottom: 1px solid blue;text-align: right;">Unitario</th>
												<th style="padding-left:25px;border-bottom: 1px solid blue;text-align: right;">SubTotal</th>
											</tr>
											<tr>
												<td style="border-right: 1px solid blue; vertical-align: top; border-bottom: 1px solid blue;">'.$detalle_descripcion.'</td>
												<td style="border-right: 1px solid blue; vertical-align: top; border-bottom: 1px solid blue;text-align: center;">'.$detalle_cantidad.'</td>
												<td style="border-right: 1px solid blue; vertical-align: top; border-bottom: 1px solid blue;text-align: right;">'.$detalle_unitario.'</td>
												<td style="border-right: 1px solid blue; vertical-align: top; border-bottom: 1px solid blue;text-align: right;">'.$detalle_subtotal.'
													<br/>
													<br/>
													<br/>
													<br/>
													<br/>
													<br/>
													<br/>
													<br/>
													</td>
											</tr>
											<tr>
												<td colspan="3" style="text-align: right;padding-bottom:29px;padding-top:12px;">
													<strong>
														Base Imponible: <br>
														Base Exenta: <br>
														I.V.A '.number_format($detalle_monto_iva_12,2,',','.').'% de ('.$detalle_base_imponible.'): <br/>
														Total esta Factura: <br/>
														<!--Rebaja I.V.A ('.number_format($detalle_monto_iva_rebaja,2,',','.').') %<br/>-->
														<!--Total después de Rebaja esta Factura: <br/>-->
														(+) Saldo Anterior ('.$detalle_factura_pendiente.' Facturas) <br>
														(+) Cargos o Créditos: <br>
														Total a pagar: <br>
														Fecha Límite de Pago: <br>
													</strong>
												</td>
												<td style="border-right: 1px solid blue; text-align: right;padding:5px;padding-bottom:29px;padding-top:12px;">
													'.$detalle_base_imponible.'<br/>
													'.$detalle_base_exenta.'<br/>
													<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($detalle_iva_12,2,',','.').'</u><br/>
													<!--'.number_format($detalle_total_antes_rebaja,2,',','.').'<br/>-->
													<!--<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($detalle_total_rebaja,2,',','.').'</u><br/>-->
													'.number_format($detalle_total_despues_rebaja,2,',','.').'<br/>
													'.//aa'.$detalle_total_esta_factura.'<br/>
													''.$detalle_saldo_anterior.'<br/>
													<strong>
														<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br/>
														'.$detalle_total_pagar.'<br/>
														'.$detalle_fecha_lim_pago.'
													</strong>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>'.
		           	/*<tr id="tr02">
		                <td style="padding-left:10px;">
		                    <table >
		                        <tr>
		                            <th>
		                                <u>Información para pago por Taquilla Bancaria:<u>
		                            </th>
		                        </tr>
		                    </table>
		                    <table style="">
		                        <tr>
		                            <th>
		                                Abonado:
		                            </th>
		                            <th>
		                                Mes:
		                            </th>
		                            <th>
		                                Monto:
		                            </th>
		                        </tr>
		                    </table>
		                </td>
		            </tr>*/
		            '<tr>
		                <td style="font-size:9px;">
		                    <div style="text-align:center;">
								<table width="95%" style="border: 1px solid blue; border-collapse: collapse; margin: 0 auto;">
									<tr>
										<th style="text-align:center;border-bottom: 1px solid blue;">INFORMACION ADICIONAL</th>
									</tr>
									<tr>
										<td style="text-align: center;">
											<table style="border: 0px solid blue; border-collapse: collapse;margin: 0 auto;">
												<tr>
													<td width="50%" style="text-align: center;">
														<strong>ESTIMADO SUSCRIPTOR, PARA MAYOR COMODIDAD TENEMOS DISPONIBLE<br>
															VARIAS OPCIONES DE PAGO EN LINEA:<br></strong>
															<a href="#">MIS-FACTURAS.COM : BANESCO ON LINE</a><br>
															<a href="#">MIS PAGOSPROVINCIAL.COM : PROVINCIAL NET CASH</a><br>
															PARA MAS INFORMACIÓN VISITA NUESTRA PAGINA <strong>WEB HIDROLARA.GOB.VE<br>
														</strong>
													</td>
													<td width="50%" style="text-align: center;">
														<strong>ESTIMADO SUSCRIPTOR, PARA MAYOR COMODIDAD TENEMOS DISPONIBLE<br>
															VARIAS OPCIONES DE PAGO EN LINEA:<br></strong>
															<a href="#">MIS-FACTURAS.COM : BANESCO ON LINE</a><br>
															<a href="#">MIS PAGOSPROVINCIAL.COM : PROVINCIAL NET CASH</a><br>
															PARA MAS INFORMACIÓN VISITA NUESTRA PAGINA <strong>WEB HIDROLARA.GOB.VE<br>
														</strong>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
		                    </div>
		                </td>
		            </tr>
		            <tr>
		                <td>
		                    <table style="margin: 0 auto;">
		                        <tr>
		                            <th style="font-size: 10px;padding-right:11px;">
		                                <strong><u>EVITE EL CORTE DE SUMINISTRO</u></strong>
		                            </th>
		                            <td>
		                                <table style="font-size: 11px;">
		                                    <tr>
		                                        <th colspan="2" style="align: right;">
		                                            N.I.A.: '.$factura_nia.'/'.$factura_sub_nia.' (Número de Cliente)<br/>
		                                        </th>
		                                    </tr>
		                                    <tr>
		                                        <td>
		                                            Saldo Anterior: <br/>
		                                            Saldo Actual:  <br/>
		                                            <strong>Total a pagar: </strong>
		                                        </td>
		                                        <td>
		                                            Bs.F '.$detalle_saldo_anterior.'<br/>
		                                            Bs.F '.number_format($detalle_total_despues_rebaja,2,',','.').'<br/>
		                                            <strong>Bs.F '.$detalle_total_pagar.' / Bs.S '.$detalle_total_pagar_bsS.'</strong>
		                                        </td>
		                                    </tr>
		                                    <tr>
		                                        <td colspan="2" style="text-align:right;">
		                                            Fecha de Emision: '.$factura_fecha_emision.'
		                                        </td>
		                                    </tr>
		                                </table>
		                            </td>
		                        </tr>
		                    </table>
		                </td>
		            </tr>
		            <tr>
		                <td>
		                    <div style="text-align:center;">
		                         <img src="factura_online/img/footer.png" width="690px;height:72px;"><br>
		                         <span style="font-size:9px;">De conformidad con lo dispuesto en los artículos 3 y 15 de la Providencia N° 0091 del 08/09/2009, publicada en la Gaceta Oficial N° 39259 de la Republica Bolivariana de Venezuela</span>
		                    </div>
		                </td>
		            </tr>
		        </table>';

		$codigoHTML='
			<html>
				<head>
				<meta charset="UTF-8">
				<style type="text/css">
					html{
						margin: 30;
					}
					body{
						font-size: 14px;
					}
					.texto-vertical-1{
						border: 1px solid blue;
						transform: rotate(90deg);
						font-size:14px;
					}
					#div1 td div{
						background: #61EAF4;
					}

				</style>
				</head>
				<body>
					'.$codigoFactura.'
				</body>
			</html>';
		//'.$codigoFactura.''.$codigoCertificado.'
		//'.$codigoCertificado.'<td style="">'.$codigoFactura.'</td>*/

		
		
		$dompdf=new Dompdf();

		$dompdf->load_html($codigoHTML);
		ini_set("memory_limit","128M");

		$dompdf->render();
		//$dompdf->setPaper('A4','portrait');
		echo $dompdf->stream("mipdf.pdf", array("Attachment" => 0));
		exit(0);
		
	}

	

?>
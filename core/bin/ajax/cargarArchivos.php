<?php
	//11 - 12
	//24 - 25
//30-34 35-36 
	$variable = '1';
	$errores = "";
	$completados = "";
	$db = new Conexion();
	for ($i=39; $i <= 40 ; $i++) { 
		$file = fopen(APP_URL_FACTURA."/FH18040201".$i.".txt", "r");
	    if(!feof($file)){
	    	$completados += "Comenzamos en la factura : /FH18040201".$i."<br>";
			while(!feof($file)) {
				$linea = fgets($file);
				//echo $linea . "<br />". "<br />";
				$facnia = substr($linea,0,8);
				$fasnia = substr($linea,8,3);
				$fac001 = substr($linea,11,20);
				$fac002 = substr($linea,31,40);
				$fac003 = substr($linea,71,11);
				$fac004 = substr($linea,82,60);
				$fac005 = substr($linea,142,5);
				$fac006 = substr($linea,147,20);
				$fac007 = substr($linea,167,10);
				$fac008 = substr($linea,177,22);
				$fac009 = substr($linea,199,20);
				$fac010 = substr($linea,219,30);
				$fac011 = substr($linea,249,6);
				$fac012 = substr($linea,255,12);
				$fac013 = substr($linea,267,2);
				$fac014 = substr($linea,269,6);
				$fac015 = substr($linea,275,15);
				$fac016 = substr($linea,290,15);
				$fac017 = substr($linea,305,81);
				$fac018 = substr($linea,386,35);
				$fac019 = substr($linea,421,15);
				$fac020 = substr($linea,436,50);
				$fac021 = substr($linea,486,45);
				$fac022 = substr($linea,531,10);
				$fac023 = substr($linea,541,10);
				$fac024 = substr($linea,551,15);
				$fac025 = substr($linea,566,15);
				$fac026 = substr($linea,581,15);
				$fac027 = substr($linea,596,15);
				$fac028 = substr($linea,611,2);
				$fac029 = substr($linea,613,2);
				$fac030 = substr($linea,615,3);
				$fac031 = substr($linea,618,2);
				$fac032 = substr($linea,620,2);
				$fac033 = substr($linea,622,4);
				$fac034 = substr($linea,626,14);
				$fac035 = substr($linea,640,18);
				$fac036 = substr($linea,658,13);
				$fac037 = substr($linea,671,6);
				$fac038 = substr($linea,677,12);
				$fac039 = substr($linea,689,7);
				$fac040 = substr($linea,696,10);
				$fac041 = substr($linea,706,5);
				$fac042 = substr($linea,711,8);
				$fac043 = substr($linea,719,11);
				$fac044 = substr($linea,730,9);
				$fac045 = substr($linea,739,3);
				$fac046 = substr($linea,742,5);
				$fac047 = substr($linea,747,8);
				$fac048 = substr($linea,755,9);
				$fac049 = substr($linea,764,11);
				$fac050 = substr($linea,775,9);
				$fac051 = substr($linea,784,9);
				$fac052 = substr($linea,793,10);
				$fac053 = substr($linea,803,9);
				$fac054 = substr($linea,812,3);
				$fac055 = substr($linea,815,58);
				$fac056 = substr($linea,873,20);
				$fac057 = substr($linea,893,25);
				$fac058 = substr($linea,918,13);
				$fac059 = substr($linea,931,7);
				$fac060 = substr($linea,938,2);
				$fac061 = substr($linea,940,15);
				$fac062 = substr($linea,955,25);
				$fac063 = substr($linea,980,13);
				$fac064 = substr($linea,993,7);
				$fac065 = substr($linea,1000,2);
				$fac066 = substr($linea,1002,15);
				$fac067 = substr($linea,1017,25);
				$fac068 = substr($linea,1042,13);
				$fac069 = substr($linea,1055,7);
				$fac070 = substr($linea,1062,2);
				$fac071 = substr($linea,1064,15);
				$fac072 = substr($linea,1079,25);
				$fac073 = substr($linea,1104,13);
				$fac074 = substr($linea,1117,7);
				$fac075 = substr($linea,1124,2);
				$fac076 = substr($linea,1126,15);
				$fac077 = substr($linea,1141,25);
				$fac078 = substr($linea,1166,13);
				$fac079 = substr($linea,1179,7);
				$fac080 = substr($linea,1186,2);
				$fac081 = substr($linea,1188,15);
				$fac082 = substr($linea,1203,25);
				$fac083 = substr($linea,1228,13);
				$fac084 = substr($linea,1241,7);
				$fac085 = substr($linea,1248,2);
				$fac086 = substr($linea,1250,15);
				$fac087 = substr($linea,1265,25);
				$fac088 = substr($linea,1290,15);
				$fac089 = substr($linea,1305,6);
				$fac090 = substr($linea,1311,6);
				$fac108 = substr($linea,1317,1);
				$fac091 = substr($linea,1318,15);
				$fac092 = substr($linea,1333,25);
				$fac093 = substr($linea,1358,11);
				$fac094 = substr($linea,1369,7);
				$fac095 = substr($linea,1376,2);
				$fac096 = substr($linea,1378,15);
				$fac097 = substr($linea,1393,15);
				$fac098 = substr($linea,1408,15);
				$fac099 = substr($linea,1423,25);
				$fac100 = substr($linea,1448,15);
				$fac101 = substr($linea,1463,63);
				$fac102 = substr($linea,1526,63);
				$fac103 = substr($linea,1589,63);
				$fac104 = substr($linea,1652,63);
				$fac105 = substr($linea,1715,15);
				$fac106 = substr($linea,1730,15);
				$fac107 = substr($linea,1745,15);
				$fac109 = substr($linea,1760,15);
				$fac110 = substr($linea,1775,60);
				$fac111 = substr($linea,1835,4);
				$fac112 = substr($linea,1839,12);
				$fac113 = substr($linea,1851,35);
				$fac114 = substr($linea,1886,60);
				$fac115 = substr($linea,1946,1);
				$fac116 = substr($linea,1947,11);
				$fac117 = substr($linea,1958,9);
				$fac118 = substr($linea,1967,12);
				$fac119 = substr($linea,1979,10);
				$fac120 = substr($linea,1989,40);
				$fac121 = substr($linea,2029,3);
				$fac122 = substr($linea,2032,2);
				$fac123 = substr($linea,2034,3);
				$fac124 = substr($linea,2037,10);
				$fac125 = substr($linea,2047,4);
				$fac126 = substr($linea,2051,4);
				$fac127 = substr($linea,2055,15);
				$fac128 = substr($linea,2070,1);

				$sql = $db->query("SELECT facnia FROM `factura_online` WHERE facnia = '$facnia'");
				if($db->rows($sql) > 0) {
					$db->query("DELETE FROM `factura_online` WHERE facnia='$facnia'");
				}
				$db->liberar($sql);

				$a = $db->query("INSERT INTO `factura_online`(`id`, `facnia`, `fasnia`, `fac001`, `fac002`, `fac003`, `fac004`, `fac005`, `fac006`, `fac007`, `fac008`, `fac009`, `fac010`, `fac011`, `fac012`, `fac013`, `fac014`, `fac015`, `fac016`, `fac017`, `fac018`, `fac019`, `fac020`, `fac021`, `fac022`, `fac023`, `fac024`, `fac025`, `fac026`, `fac027`, `fac028`, `fac029`, `fac030`, `fac031`, `fac032`, `fac033`, `fac034`, `fac035`, `fac036`, `fac037`, `fac038`, `fac039`, `fac040`, `fac041`, `fac042`, `fac043`, `fac044`, `fac045`, `fac046`, `fac047`, `fac048`, `fac049`, `fac050`, `fac051`, `fac052`, `fac053`, `fac054`, `fac055`, `fac056`, `fac057`, `fac058`, `fac059`, `fac060`, `fac061`, `fac062`, `fac063`, `fac064`, `fac065`, `fac066`, `fac067`, `fac068`, `fac069`, `fac070`, `fac071`, `fac072`, `fac073`, `fac074`, `fac075`, `fac076`, `fac077`, `fac078`, `fac079`, `fac080`, `fac081`, `fac082`, `fac083`, `fac084`, `fac085`, `fac086`, `fac087`, `fac088`, `fac089`, `fac090`, `fac108`, `fac091`, `fac092`, `fac093`, `fac094`, `fac095`, `fac096`, `fac097`, `fac098`, `fac099`, `fac100`, `fac101`, `fac102`, `fac103`, `fac104`, `fac105`, `fac106`, `fac107`, `fac109`, `fac110`, `fac111`, `fac112`, `fac113`, `fac114`, `fac115`, `fac116`, `fac117`, `fac118`, `fac119`, `fac120`, `fac121`, `fac122`, `fac123`, `fac124`, `fac125`, `fac126`, `fac127`, `fac128`, `estatus`) VALUES('', '".$facnia."','".$fasnia."','".$fac001."','".$fac002."','".$fac003."','".$fac004."','".$fac005."','".$fac006."','".$fac007."','".$fac008."','".$fac009."','".$fac010."','".$fac011."','".$fac012."','".$fac013."','".$fac014."','".$fac015."','".$fac016."','".$fac017."','".$fac018."','".$fac019."','".$fac020."','".$fac021."','".$fac022."','".$fac023."','".$fac024."','".$fac025."','".$fac026."','".$fac027."','".$fac028."','".$fac029."','".$fac030."','".$fac031."','".$fac032."','".$fac033."','".$fac034."','".$fac035."','".$fac036."','".$fac037."','".$fac038."','".$fac039."','".$fac040."','".$fac041."','".$fac042."','".$fac043."','".$fac044."','".$fac045."','".$fac046."','".$fac047."','".$fac048."','".$fac049."','".$fac050."','".$fac051."','".$fac052."','".$fac053."','".$fac054."','".$fac055."','".$fac056."','".$fac057."','".$fac058."','".$fac059."','".$fac060."','".$fac061."','".$fac062."','".$fac063."','".$fac064."','".$fac065."','".$fac066."','".$fac067."','".$fac068."','".$fac069."','".$fac070."','".$fac071."','".$fac072."','".$fac073."','".$fac074."','".$fac075."','".$fac076."','".$fac077."','".$fac078."','".$fac079."','".$fac080."','".$fac081."','".$fac082."','".$fac083."','".$fac084."','".$fac085."','".$fac086."','".$fac087."','".$fac088."','".$fac089."','".$fac090."','".$fac108."','".$fac091."','".$fac092."','".$fac093."','".$fac094."','".$fac095."','".$fac096."','".$fac097."','".$fac098."','".$fac099."','".$fac100."','".$fac101."','".$fac102."','".$fac103."','".$fac104."','".$fac105."','".$fac106."','".$fac107."','".$fac109."','".$fac110."','".$fac111."','".$fac112."','".$fac113."','".$fac114."','".$fac115."','".$fac116."','".$fac117."','".$fac118."','".$fac119."','".$fac120."','".$fac121."','".$fac122."','".$fac123."','".$fac124."','".$fac125."','".$fac126."','".$fac127."','".$fac128."','Pendiente');");
				
				if($a) {
					$variable = '0';
					$errores += "Incorrecto nia: ".$facnia." del archivo FH18040201".$i."<br>";
				}
			}
			$completados += "Terminado en la factura : /FH18040201".$i."<br>";
	    	fclose($file);
	    }else{
	    	echo "Error";
	    }
	}
	$db->close();
    if($variable == '1'){
    	echo "Sugoi";
    }else{
    	echo $completados.$errores."<br>"."sugoiE";
    }
        
?>
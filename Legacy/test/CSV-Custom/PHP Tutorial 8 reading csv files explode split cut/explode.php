<?php
	$file = file('Laurel_FordLincolnKIA.csv');
	
	print_r($file);
	sort($file);
	
	
	foreach($file as $line){
			echo "$line<br>";
			
			list($homenetid,$vcondition,$vstock,$vvin,$vyear,$vmake,$vmodel,$vbody,$vtrim,$vmodelnumber,$vdoors,$vexterior,$vinterior,$venginecyl,$venginedispl,$vtransm,$vmiles,$vrprice,$vmrsp,$voptions,$vdealeraddr,$vdealercity,$vdealerzip,$vdealerphone,$vdealerfax,$vspecialfield1,$vspecialfield2,$vspecialfield3,$vspecialfield4,$vstyledescrp,$vecolor_txt,$vecolor_code,$vicolor_txt,$vicolor_code,$vint_upholstery,$vengineblock,$vengineasprtype,$venginedescrp,$vtransmspeed,$vtransmdesc,$vdrivetrain,$vfueltype,$vmpgc,$vmpgh,$vepa,$vwhlb_code,$vspcialprice,$misc_price1,$misc_price2,$misc_price3,$factry_codes,$marketclass,$pasgrcap,$vexteriorhexcode,$vinteriorhexcode,$venginedisplcubinches,$vimagelist)=explode(",", $line);
			
			
			$vehicle_options=explode(",", $vspecialfield1);
			
			echo "<b>Title: </b><ul>";
			foreach($vehicle_options as $vehicle_ops){
				echo "<li>$vehicle_ops</li>";
				
			}
			
			echo "</ul><hr>";
			
			echo "<h1>$vstock | $vyear $vmake $vmodel $vtrim</h1>";
			echo "$vcondition $vyear $vmake $vmodel $vtrim, $vbody $vvin Doors: $vdoors, $voptions";
			echo "<br>";
			echo "$vspecialfield1, $vdealeraddr,$vdealercity,$vdealerzip,$vdealerphone,$vdealerfax,$vspecialfield1,$vspecialfield2,$vspecialfield3,$vspecialfield4,$vstyledescrp,$vecolor_txt,$vecolor_code,$vicolor_txt,$vicolor_code";
			echo "<br>";
			echo "<hr>";
			
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
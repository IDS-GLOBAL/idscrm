<?php

echo '_read_csv.php'.'<br />';


$file =  file("$homenetfile");

	//print_r($file);
	//sort($file);

//Run A Counter To Count The Number Of Loops 
$counter_gridrow = 0;

	foreach($file as $line){
			//echo "$line<br>";
			
			//Run A Increment Counter For the foreach Loop
			$counter_gridrow++;
			
			list($homenetid,$vcondition,$vstock,$vvin,$vyear,$vmake,$vmodel,$vbody,$vtrim,$vmodelnumber,$vdoors,$vexterior,$vinterior,$venginecyl,$venginedispl,$vtransm,$vmiles,$vrprice,$vmrsp,$book_value,$invoice,$certified,$date_instock,$vdescription,$voptions,$categorizedoptions,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$vdealeraddr,$vdealercity,$vdealerstate,$vdealerzip,$vdealerphone,$vdealerfax,$vspecialfield1,$vspecialfield2,$vspecialfield3,$vspecialfield4,$vstyledescrp,$vecolor_txt,$vecolor_code,$vicolor_txt,$vicolor_code,$vint_upholstery,$vengineblock,$vengineasprtype,$venginedescrp,$vtransmspeed,$vtransmdesc,$vdrivetrain,$vfueltype,$vmpgc,$vmpgh,$vepa,$vwhlb_code,$vspcialprice,$misc_price1,$misc_price2,$misc_price3,$factry_codes,$marketclass,$pasgrcap,$vexteriorhexcode,$vinteriorhexcode,$venginedisplcubinches,$vimagelist) = explode(",", $line);
			
	//Skip Line one
	if($counter_gridrow > 1):
	
			echo $counter_gridrow.'<br>';
			echo "<h1>$vstock | $vyear $vmake $vmodel $vtrim</h1>";
			echo "Condition: $vcondition Year: $vyear $vmake $vmodel $vtrim, $vbody $vvin Doors: $vdoors, $vexterior, $vixterior, Cyl: $venginecyl, $voptions, $venginedispl $vtransm Miles: $vmiles $vrprice,$vmrsp,$book_value,$invoice,$certified, Date In Stock: $date_instock, Description: $vdescription | Voptions: $voptions <br>
| Categorized Options: $categorizedoptions,";
			echo "<br>";
			echo " Dealer Address: $vdealeraddr, | Dealer City: $vdealercity, Dealer Zip: $vdealerzip, Dealer Phone: $vdealerphone, Dealer Fax:$vdealerfax, | Special Field: $vspecialfield1,$vspecialfield2,$vspecialfield3,$vspecialfield4,$vstyledescrp,$vecolor_txt, EColor code: $vecolor_code, Color Text: $vicolor_txt,Color Code: $vicolor_code";
			echo "<br>";
			
			echo "<hr>";
			
			include("insert_update_vehicles.php");
			
			echo "<hr>";
	endif;

	}


	






?>
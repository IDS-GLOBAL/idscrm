<?php require_once("db_loggedin.php"); ?>
<?php


if(!$_POST) exit();

echo 'Im going';

print_r($_POST);

if(isset($_POST['vehicle_id'], $_POST['thisdid'],  $_POST['vmileage'], $_POST['vstockno'], $_POST['vbody'], $_POST['vexterior_color'], $_POST['vexterior_color_hex'],  $_POST['vinterior_color'],  $_POST['vinterior_color_hex'],  $_POST['vcylinders'], $_POST['vfueltype'], $_POST['vtransm'], $_POST['vlivestatus'], $_POST['vcondition'], $_POST['vrprice'], $_POST['vspecialprice'], $_POST['vdprice'], $_POST['vcomments'], $_POST['vpurchasecost'], $_POST['vdlrpack'], $_POST['vaddedcost'], $_POST['Alloy_Wheels'], $_POST['Bed_Liner'], $_POST['Illuminated_Lightning'], $_POST['Rear_Window_Defroster'], $_POST['Running_Boards'], $_POST['Sliding_Doors'], $_POST['Tinted_Glass'], $_POST['Air_Conditioning'], $_POST['Memory_Seats'], $_POST['Power_Mirrors'], $_POST['Power_Seats'], $_POST['Power_Door_Locks'], $_POST['Power_Steering'], $_POST['Power_Windows'], $_POST['Passenger_Air_Bag'], $_POST['Side_Air_Bag'], $_POST['Keyless_Entry'], $_POST['Push_Button_Start'], $_POST['Theft_System'], $_POST['AntiLock_Brakes'], $_POST['Leather_Seats'], $_POST['Auto_Updown_Windows'], $_POST['Bluetooth_Handsfree'], $_POST['Climate_Control'], $_POST['Cruise_Control'], $_POST['Navigation_System'], $_POST['Rear_view_monitor'], $_POST['Rear_Ent_Center'], $_POST['Satellite_Radio'], $_POST['SunroofMoonroof'], $_POST['Television'], $_POST['v_warranty_one'], $_POST['v_warranty_two'], $_POST['dlroption1chck'], $_POST['dlroption1'], $_POST['dlroption2chck'], $_POST['dlroption2'], $_POST['dlroption3chck'], $_POST['dlroption3'], $_POST['dlroptequip1chck'], $_POST['dlroptequip1'], $_POST['dlroptequip2chck'], $_POST['dlroptequip2'], $_POST['dlroptequip3chck'], $_POST['dlroptequip3'], $_POST['dlroptequip4chck'], $_POST['dlroptequip4'], $_POST['dlroptequip5chck'], $_POST['dlroptequip5'])):

echo 'I made it';

$vehicle_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vehicle_id']));
$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid'])); 
$vmileage = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmileage'])); 
$vstockno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vstockno'])); 
$vbody = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vbody'])); 
$vexterior_color = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vexterior_color'])); 
$vexterior_color_hex = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vexterior_color_hex'])); 
$vinterior_color = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vinterior_color'])); 
$vinterior_color_hex = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vinterior_color_hex']));
$vengine = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vengine']));  
$vcylinders = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vcylinders'])); 
$vfueltype = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vfueltype'])); 
$vdoors = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vdoors'])); 

$vtransm = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vtransm'])); 
$vlivestatus = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vlivestatus'])); 
$vcondition = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vcondition'])); 
$vrprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vrprice'])); 
$vspecialprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vspecialprice'])); 
$vdprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vdprice']));
$vcomments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vcomments']));
$vpurchasecost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vpurchasecost'])); 
$vdlrpack = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vdlrpack'])); 
$vaddedcost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vaddedcost'])); 


		
		$vehicle_mpg_city =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vehicle_mpg_city'])); 
		$vehicle_mpg_hwy =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vehicle_mpg_hwy'])); 
		$vehicle_mpg_combined = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vehicle_mpg_combined'])); 






$Alloy_Wheels  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Alloy_Wheels']));
$Bed_Liner  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Bed_Liner']));
$Illuminated_Lightning  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Illuminated_Lightning']));
$Rear_Window_Defroster  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Rear_Window_Defroster']));
$Running_Boards  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Running_Boards']));
$Sliding_Doors  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Sliding_Doors']));
$Tinted_Glass  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Tinted_Glass']));
$Air_Conditioning  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Air_Conditioning']));
$Memory_Seats  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Memory_Seats']));
$Power_Mirrors  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Power_Mirrors']));
$Power_Seats  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Power_Seats']));
$Power_Door_Locks  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Power_Door_Locks']));
$Power_Steering  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Power_Steering']));
$Power_Windows  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Power_Windows']));
$Passenger_Air_Bag  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Passenger_Air_Bag']));
$Side_Air_Bag  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Side_Air_Bag']));
$Keyless_Entry  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Keyless_Entry']));
$Push_Button_Start  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Push_Button_Start']));
$Theft_System  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Theft_System']));
$AntiLock_Brakes  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['AntiLock_Brakes']));
$Leather_Seats  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Leather_Seats']));
$Auto_Updown_Windows  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Auto_Updown_Windows']));
$Bluetooth_Handsfree  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Bluetooth_Handsfree']));
$Climate_Control  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Climate_Control']));
$Cruise_Control  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Cruise_Control']));
$Navigation_System  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Navigation_System']));
$Rear_view_monitor  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Rear_view_monitor']));
$Rear_Ent_Center  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Rear_Ent_Center']));
$Satellite_Radio  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Satellite_Radio']));
$SunroofMoonroof  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['SunroofMoonroof']));
$Television  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['Television']));
$v_warranty_one  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['v_warranty_one']));
$v_warranty_two  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['v_warranty_two']));
$dlroption1chck  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroption1chck']));
$dlroption1  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroption1']));
$dlroption2chck  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroption2chck']));
$dlroption2  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroption2']));
$dlroption3chck  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroption3chck']));
$dlroption3  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroption3']));
$dlroptequip1chck  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip1chck']));
$dlroptequip1  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip1']));
$dlroptequip2chck  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip2chck']));
$dlroptequip2  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip2']));
$dlroptequip3chck  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip3chck']));
$dlroptequip3  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip3']));
$dlroptequip4chck  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip4chck']));
$dlroptequip4  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip4']));
$dlroptequip5chck  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip5chck']));
$dlroptequip5  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlroptequip5']));









mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_found_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vid` = '$vehicle_id' LIMIT 1";
$found_vehicle = mysqli_query($idsconnection_mysqli, $query_found_vehicle);
$row_found_vehicle = mysqli_fetch_assoc($found_vehicle);
$totalRows_found_vehicle = mysqli_num_rows($found_vehicle);

$found_vid = $row_found_vehicle['vid'];
$vehicle_did = $row_found_vehicle['did'];
$vtoken = $row_found_vehicle['vtoken'];

if($vehicle_did != $did){  exit(); }

//echo 'See Me On script_update.inventory.php';

//echo '<br />';


echo $update_vehicle_sql = "UPDATE `idsids_idsdms`.`vehicles` SET
			`did` = '$thisdid',
			`vstockno` = '$vstockno',
			`vmileage` = '$vmileage',
			`vecolor_txt` = '$vexterior_color',
			`vecolor` = '$vexterior_color_hex',
			`vicolor_txt` = '$vinterior_color',
			`vicolor` = '$vinterior_color_hex',
			`vcustomcolor` = '$vexterior_color',
			`vbody`  = '$vbody',
			`vcylinders` = '$vcylinders',
			`vfueltype` = '$vfueltype',
			`vdoors` = '$vdoors',
			`vengine` = '$vengine',
			`vtransm` = '$vtransm',
			`vlivestatus` = '$vlivestatus',
			`vcondition` = '$vcondition',
			`vrprice` = '$vrprice',
			`vspecialprice` = '$vspecialprice',
			`vdprice` = '$vdprice',
			`vcomments` = '$vcomments',
			`vpurchasecost` = '$vpurchasecost',
			`vdlrpack` = '$vdlrpack',
			`vaddedcost` = '$vaddedcost',
			`vehicle_mpg_city` = '$vehicle_mpg_city',
			`vehicle_mpg_hwy` = '$vehicle_mpg_hwy',
			`vehicle_mpg_combined` = '$vehicle_mpg_combined',
			`Alloy_Wheels`  = '$Alloy_Wheels',
			`Bed_Liner`  = '$Bed_Liner',
			`Illuminated_Lightning`  = '$Illuminated_Lightning',
			`Rear_Window_Defroster`  = '$Rear_Window_Defroster',
			`Running_Boards`  = '$Running_Boards',
			`Sliding_Doors`  = '$Sliding_Doors',
			`Tinted_Glass`  = '$Tinted_Glass',
			`Air_Conditioning`  = '$Air_Conditioning',
			`Memory_Seats`  = '$Memory_Seats',
			`Power_Mirrors`  = '$Power_Mirrors',
			`Power_Seats`  = '$Power_Seats',
			`Power_Door_Locks`  = '$Power_Door_Locks',
			`Power_Steering`  = '$Power_Steering',
			`Power_Windows`  = '$Power_Windows',
			`Passenger_Air_Bag`  = '$Passenger_Air_Bag',
			`Side_Air_Bag`  = '$Side_Air_Bag',
			`Keyless_Entry`  = '$Keyless_Entry',
			`Push_Button_Start`  = '$Push_Button_Start',
			`Theft_System`  = '$Theft_System',
			`AntiLock_Brakes`  = '$AntiLock_Brakes',
			`Leather_Seats`  = '$Leather_Seats',
			`Auto_Updown_Windows`  = '$Auto_Updown_Windows',
			`Bluetooth_Handsfree`  = '$Bluetooth_Handsfree',
			`Climate_Control`  = '$Climate_Control',
			`Cruise_Control`  = '$Cruise_Control',
			`Navigation_System`  = '$Navigation_System',
			`Rear_view_monitor`  = '$Rear_view_monitor',
			`Rear_Ent_Center`  = '$Rear_Ent_Center',
			`Satellite_Radio`  = '$Satellite_Radio',
			`SunroofMoonroof`  = '$SunroofMoonroof',
			`Television`  = '$Television',
			`v_warranty_one`  = '$v_warranty_one',
			`v_warranty_two`  = '$v_warranty_two',
			`dlroption1chck`  = '$dlroption1chck',
			`dlroption1`  = '$dlroption1',
			`dlroption2chck`  = '$dlroption2chck',
			`dlroption2`  = '$dlroption2',
			`dlroption3chck`  = '$dlroption3chck',
			`dlroption3`  = '$dlroption3',
			`dlroptequip1chck`  = '$dlroptequip1chck',
			`dlroptequip1`  = '$dlroptequip1',
			`dlroptequip2chck`  = '$dlroptequip2chck',
			`dlroptequip2`  = '$dlroptequip2',
			`dlroptequip3chck`  = '$dlroptequip3chck',
			`dlroptequip3`  = '$dlroptequip3',
			`dlroptequip4chck`  = '$dlroptequip4chck',
			`dlroptequip4`  = '$dlroptequip4',
			`dlroptequip5chck`  = '$dlroptequip5chck',
			`dlroptequip5`  = '$dlroptequip5'
WHERE
		`vehicles`.`vid` = '$vehicle_id';
";
$result_update_vehicle_sql = mysqli_query($idsconnection_mysqli, $update_vehicle_sql);
		echo "<script> window.location.replace('inventory.php?vstat=$vlivestatus'); </script>";
		
//echo '<br />';
//echo '<br />';
//echo '<br />';





mysqli_close($idsconnection_mysqli);




if(!$found_vid){
	
		//echo 'No Found ID';		
		//$result_insert_vehicle_sql = mysqli_query($idsconnection_mysqli, $insert_vehicle_sql);

		//$result_insert_vehicle_sql = mysqli_query($idsconnection_mysqli, $insert_vehicle_sql);

}else{

		if($vehicle_did == $did){
	
		//echo 'Found ID Updated';
		//$result_update_vehicle_sql = mysqli_query($idsconnection_mysqli, $update_vehicle_sql);

		
		}else{
		echo "<script> window.location.replace('transfer_vehicle.php?vtoken=$vtoken'); </script>";

		}



}

// Take To Transfer Or Internal Edit If vehicles.did belongs to dealer.id



	

endif;

?>
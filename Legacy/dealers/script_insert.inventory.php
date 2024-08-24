<?php require_once("db_loggedin.php"); ?>
<?php


if(!$_POST) exit;

//print_r($_POST);

if(isset($_POST['token'], $_POST['thisdid'], $_POST['vvin'], $_POST['vmileage'], $_POST['vstockno'], $_POST['vin_year'], $_POST['vin_make'], $_POST['vmodel'], $_POST['vtrim'], $_POST['vcondition'], $_POST['vrprice'], $_POST['vspecialprice'], $_POST['vdprice'], $_POST['vlivestatus'], $_POST['vinlength'])):



$token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['token'])); 
$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid'])); 
$vvin = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vvin']));
$vvin = strtoupper($vvin);
$vmileage = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmileage'])); 
$vstockno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vstockno'])); 
$vin_year = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vin_year'])); 
$vin_make = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vin_make'])); 
$vmodel = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vmodel'])); 
$vtrim = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vtrim'])); 
$vcondition = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vcondition'])); 
$vrprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vrprice'])); 
$vspecialprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vspecialprice'])); 
$vdprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vdprice']));
$vlivestatus = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vlivestatus']));

$vinlength = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vinlength']));





mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_found_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vvin` = '$vvin'";
$found_vehicle = mysqli_query($idsconnection_mysqli, $query_found_vehicle);
$row_found_vehicle = mysqli_fetch_assoc($found_vehicle);
$totalRows_found_vehicle = mysqli_num_rows($found_vehicle);

$found_vid = $row_found_vehicle['vid'];
$vehicle_did = $row_found_vehicle['did'];
$vtoken = $row_found_vehicle['vtoken'];





//echo 'See Me On script_insertupdate.inventory.php';

//echo '<br />';



$update_vehicle_sql = "UPDATE `idsids_idsdms`.`vehicles` SET
				`did` = '$thisdid',
				`did` = '$thisdid',
				`vvin` = '$vvin',
				`vstockno` = '$vstockno',
				`vmileage` = '$vmileage',
				`vyear` = '$vin_year',
				`vmake` = '$vin_make',
				`vmodel` = '$vmodel',
				`vtrim` = '$vtrim',
				`vcondition` = '$vcondition',
				`vrprice` = '$vrprice',
				`vspecialprice` = '$vspecialprice',
				`vdprice` = '$vdprice',
				`vlivestatus` = '$vlivestatus'
WHERE
	`vehicles`.`vid` = '$found_vid';
";

//echo '<br />';
//echo '<br />';
//echo '<br />';



$insert_vehicle_sql = "
		INSERT `idsids_idsdms`.`vehicles` SET
				`vtoken` = '$token',
				`did` = '$thisdid',
				`vvin` = '$vvin',
				`vstockno` = '$vstockno',
				`vmileage` = '$vmileage',
				`vyear` = '$vin_year',
				`vmake` = '$vin_make',
				`vmodel` = '$vmodel',
				`vtrim` = '$vtrim',
				`vcondition` = '$vcondition',
				`vrprice` = '$vrprice',
				`vspecialprice` = '$vspecialprice',
				`vdprice` = '$vdprice',
				`vlivestatus` = '$vlivestatus'
";








if(!$found_vid){
	

		//echo 'No Found ID';
		//echo $insert_vehicle_sql;
		
		$result_insert_vehicle_sql = mysqli_query($idsconnection_mysqli, $insert_vehicle_sql);

		//$result_insert_vehicle_sql = mysqli_query($idsconnection_mysqli, $insert_vehicle_sql);
	
		echo "<script> window.location.href = 'script_last_vehicle_added.php'; </script>";

/*	*/

}else{

		if($vehicle_did == $did){
	
		//echo 'Found ID Updated';
		//$result_update_vehicle_sql = mysqli_query($idsconnection_mysqli, $update_vehicle_sql);
		
		echo "<script> window.location.replace('inventory.edit.php?vid=$vid'); </script>";
		
		}else{
		
		echo "<script> window.location.replace('inventory.edit.php?vid=$vid'); </script>";

		}



}

// Take To Transfer Or Internal Edit If vehicles.did belongs to dealer.id



	

endif;

?>
<?php

	 $log .= ':::Searching For Frazer Dealer In Frazer Database System:::'.'<br />';
	 
$query_find_frazerdms_dealer = "SELECT * FROM `idsids_fazerdms`.`frazer_dealer` WHERE `frazer_dealer`.`frazer_dealer_frzno` = '$newidsfrazerno'";
$find_frazerdms_dealer = mysqli_query($frazerdms_mysqli, $query_find_frazerdms_dealer);
$row_find_frazerdms_dealer = mysqli_fetch_assoc($find_frazerdms_dealer);
$totalRows_find_frazerdms_dealer = mysqli_num_rows($find_frazerdms_dealer);


$frazer_dealer_id = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_id']);
$frazer_dealer_frzno = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_frzno']);
$frazer_dealer_email = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_email']);
$frazer_dealer_company = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_company']);
$frazer_dealer_address = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_address']);
$frazer_dealer_city = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_city']);
$frazer_dealer_state = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_state']);
$frazer_dealer_zip = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_zip']);
$frazer_dealer_phone = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_phone']);
$frazer_dealer_created_at = mysqli_real_escape_string($frazerdms_mysqli, $row_find_frazerdms_dealer['frazer_dealer_created_at']);

//exit;

	$temppassword = 'temp'.$frazer_dealer_phone;
	
	$temppassword = mysqli_real_escape_string($frazerdms_mysqli, $temppassword);

	 $log .= ":::Frazer Dealer Email: { $frazer_dealer_email } And Password Using: {$temppassword } In Frazer Database System:::".'<br />';

	 $log .= ':::Find Pending Dealer Wether System Created Or Online Registered:::'.'<br />';


// This query should find either a pending frazer dealer with Email or frazer number from system creation
$query_find_idsdealer_pending = "SELECT * FROM `idsids_idsdms`.`dealers_pending` WHERE `dealers_pending`.`frazer_customer_no` = '$newidsfrazerno' OR `dealers_pending`.`email` = '$frazeremail' ORDER BY `dealers_pending`.`created_at` DESC LIMIT 1";
$find_idsdealer_pending = mysqli_query($idsconnection_mysqli, $query_find_idsdealer_pending);
$row_find_idsdealer_pending = mysqli_fetch_assoc($find_idsdealer_pending);
$totalRows_find_idsdealer_pending = mysqli_num_rows($find_idsdealer_pending);



	 $log .= ":::Frazer Dealer Email: { $frazer_dealer_email } And Password Using: {$temppassword } In Frazer Database System:::".'<br />';

$dealer_pending_id = $row_find_idsdealer_pending['id'];
$dealer_pending_password = $row_find_idsdealer_pending['password'];

if(!$dealer_pending_password){ 
			$dealer_pending_password = $temppassword;
			$log .= ":::No Find Exisiting Password In Dealers Pending Using::: $dealer_pending_password".'<br />';
		}else{

			$dealer_pending_password = $row_find_idsdealer_pending['password'];
			$log .= ":::YES Found Exisiting Password In Dealers Pending::: $dealer_pending_password".'<br />';

	}


if(!$dealer_pending_id){
	

	
			$log .= ':::NO Pending Dealer Found Creating Pending Dealer:::'.'<br />';

	$create_new_system_pendingdealerstring = "INSERT INTO `idsids_idsdms`.`dealers_pending` SET
												`dudes_id` = '1', 
												`contact` = '$frazer_dealer_company', 
												`contact_phone` = '$frazer_dealer_phone', 
												`company` = '$frazer_dealer_company',
												`phone` = '$frazer_dealer_phone', 
												`address` = '$frazer_dealer_address', 
												`city` = '$frazer_dealer_city ', 
												`state` = '$frazer_dealer_state', 
												`zip` = '$frazer_dealer_zip', 
												`email` = '$frazer_dealer_email', 
												`username` = '$frazer_dealer_email', 
												`password` = '$dealer_pending_password',
												`sla` = 'See http://idscrm.com/privacy.php',
												`token` = '$tkey',
												`package` = 'frazersystem',
												`frazer_customer_no` = '$newidsfrazerno'
												";


$created_newidsdealer_pending = mysqli_query($idsconnection_mysqli, $create_new_system_pendingdealerstring);

		$email_alert_created_newsystemdealer = '1';
		
}else{
	
	
			  $log .= ":::YES Found Pending Dealer Update Off Sent Frazer With Number::: $newidsfrazerno".'<br />';
			 
	$create_new_system_pendingdealerstring = "UPDATE `idsids_idsdms`.`dealers_pending` SET
												`frazer_customer_no` = '$newidsfrazerno'
											  WHERE 
											  	`id` = '$dealer_pending_id'
												";


$created_newidsdealer_pending = mysqli_query($idsconnection_mysqli, $create_new_system_pendingdealerstring);

		$email_alert_updated_pendingdealer = '1';


}


?>
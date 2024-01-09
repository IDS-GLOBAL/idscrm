<?php


  $log .= ':::Creating New System Dealer FRAZER Number:::'.'<br />';

  $log .= ':::Query Pending For A Full Match By FRAZER Number:::'.'<br />';


/*		 
$idsfrazer_connectsystem_pending = mysql_connect('localhost','idsids_faith','benjamin2831', true); // resource id 2 is given
mysql_select_db($database_idsconnection, $idsfrazer_connectsystem_pending);
$query_pull_idsdealer_pending = "SELECT * FROM  dealers_pending WHERE frazer_customer_no = '$newidsfrazerno' or email = '$newidsemail'";
$pull_idsdealer_pending = mysqli_query($idsconnection_mysqli, $query_pull_idsdealer_pending, $idsfrazer_connectsystem_pending);
$row_pull_idsdealer_pending = mysqli_fetch_assoc($pull_idsdealer_pending);
$totalRows_pull_idsdealer_pending = mysqli_num_rows($pull_idsdealer_pending);

$new_pendingdid = $row_pull_idsdealer_pending['id'];
$thispassword = $row_pull_idsdealer_pending['password'];

$thispassword = mysql_real_escape_string($thispassword);




$pull_frazer_dealer_id = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_id']);
$pull_frazer_dealer_frzno = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_frzno']);
$pull_frazer_dealer_email = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_email']);
$pull_frazer_dealer_company = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_company']);
$pull_frazer_dealer_address = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_address']);
$pull_frazer_dealer_city = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_city']);
$pull_frazer_dealer_state = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_state']);
$pull_frazer_dealer_zip = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_zip']);
$pull_frazer_dealer_phone = mysql_real_escape_string($row_pull_idsdealer_pending['frazer_dealer_phone']);
$pull_frazer_dealer_created_at = mysql_real_escape_string( $row_pull_idsdealer_pending['frazer_dealer_created_at']);
*/



	 $log .= ":::Frazer Dealer Email: { $frazer_dealer_email } And Password Using: {$dealer_pending_password } In Frazer Database System:::".'<br />';

	 $log .= ':::Pulling Pending Dealer  Wether System Created Or Online Registered:::'.'<br />';



if($dealer_pending_id){
	
}

		  $log .= ':::Insert/Creating New System Dealer  Status HOLD Pending Dealer Found:::'.'<br />';
	
	$create_new_system_dealerstring = "INSERT INTO `idsids_idsdms`.`dealers` SET
										`dudes_id` = '1',
										`assigned_salesrep` = 'Benjamin Carter',
										`contact` = '$frazer_dealer_company', 
										`contact_phone` = '$frazer_dealer_phone', 
										`company` = '$frazer_dealer_company',
										`company_legalname` = '$frazer_dealer_company',
										`phone` = '$frazer_dealer_phone', 
										`address` = '$frazer_dealer_address', 
										`city` = '$frazer_dealer_city ', 
										`state` = '$frazer_dealer_state', 
										`zip` = '$frazer_dealer_zip', 
										`email` = '$newidsemail',
										`password` = '$dealer_pending_password', 
										`verified` = 'n',
										`status` = '1',
										`sla` = 'Check Agreement, Privacy Policy At IDSCRM.php http://idscrm.com/privacy.php', 
										`token` = '$tkey',
										`feedidfrazer` = '$newidsfrazerno'
									";
$run_create_new_system_dealerstring = mysqli_query($idsconnection_mysqli, $create_new_system_dealerstring);

		$email_alert_created_newsystemdealer = '1';
		

?>
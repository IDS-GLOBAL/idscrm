<?php






$query_find_idsusern_dealersystem = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`email` = '$newidsemail'";
$find_idsusern_dealersystem = mysqli_query($idsconnection_mysqli, $query_find_idsusern_dealersystem);
$row_find_idsusern_dealersystem = mysqli_fetch_assoc($find_idsusern_dealersystem);
$totalRows_find_idsusern_dealersystem = mysqli_num_rows($find_idsusern_dealersystem);

$usedid = $row_find_idsusern_dealersystem['id'];
$found_idsusernemailn_dealersystem = $row_find_idsusern_dealersystem['email'];
$idsfrazer_number_for_systemdealer = $row_find_idsusern_dealersystem['feedidfrazer'];

// Check System For Dealers That Can Login to IDS System
if(!$found_idsusernemailn_dealersystem){
	
	  $log .= "We looked and can not find email: $newidsemail in our system nor the frazer number in our system".'<br />';
	  $log .= 'Create A New Dealer Pending, New System Dealer, Alert System Admins'.'<br />';
	
	include("script_create_prospect_dealer.php");
	
	include("script_create_newsystem_dealer.php");
	

	
	
}else{
//There Are No System Dealers With This Email Address 	
	  $log .= "We Do Have this email in our system".'<br />';
	
	if(!$idsfrazer_number_for_systemdealer){

	 $log .= 'Lets Update This IDS Dealer With This New Frazer Number'.'<br />';
	 $log .= "Congratulations You Just Updated Your Exisiting System Dealer With New FRAZER No $frazerid".'<br />';
	 
	 include("script_update_exisiting_system_dealer.php");

	}else{


	   $log .= "Click Link to sent to $found_idsusernemailn_dealersystem to Claim IDS Account And Or Alarm IDS of Accident because it has frazer number: $idsfrazer_number_for_systemdealer";
	   
	   $email_alert_claim_exisiting_email_in_idssystem = '1';
	   

	}
	
	
	
	
}

?>
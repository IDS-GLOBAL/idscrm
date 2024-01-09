<?php


$log .= 'Check Exisiting And Update'.'<br />';

$ids_find_idsusern_dealersystemconnect = mysqli_connect('localhost', 'idsids_faith', 'benjamin2831', 'idsids_idsdms'); // resource id 2 is given
$query_find_idsusern_dealersystem ="SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`email` = '$newidsemail'";
$find_idsusern_dealersystem = mysqli_query($ids_find_idsusern_dealersystemconnect, $query_find_idsusern_dealersystem);
$row_find_idsusern_dealersystem = mysqli_fetch_assoc($find_idsusern_dealersystem);
$totalRows_find_idsusern_dealersystem = mysqli_num_rows($find_idsusern_dealersystem);

$found_idsuserndid = $row_find_idsusern_dealersystem['id'];
$found_idsusernemailn_dealersystem = $row_find_idsusern_dealersystem['email'];

$found_idsfrazerid = $row_find_idsusern_dealersystem['feedidfrazer'];

		if($found_idsuserndid != 0){
			 $log .= "Email Address already exist $found_idsusernemailn_dealersystem in System".'<br />';
			 $log .= "Frazer Number $found_frazerno_alone AND Did $foundfrazerno_withdid already exist in System".'<br />';
			 $log .= "Danger Can not proceed".'<br />';
			 $log .= "Robot Send System Email A Link To $found_idsusernemailn_dealersystem and Benjamin".'<br />';
			 $log .= "Because Someone is uploading with the same email account: $found_idsusernemailn_dealersystem".'<br />';
			 
			 
			 $email_alert_exisiting_email_in_idssystem = '1';



		}else{
		
			 $log .= 'Lets Do Something About it'.'<br />';
			 $log .= 'Maybe Udpating This system Dealer with email address'.'<br />';
			 $log .= 'Send Email Result'.'<br />';


		$log .= ":::Updating System Dealer By Email With Frazer Number::: $newidsfrazerno ".'<br />';
		
		$ids_connectupdatesystemdealerr = mysqli_connect('localhost', 'idsids_faith', 'benjamin2831', 'idsids_idsdms'); // resource id 2 is given

		$update_new_system_dealerstringg = "UPDATE `idsids_idsdms`.`dealers` SET
												`feedidfrazer` = '$newidsfrazerno'
												WHERE 
												`id` = '$foundfrazerno_withdid'
											";
		$run_update_new_system_dealerstring = mysqli_query($ids_connectupdatesystemdealerr, $update_new_system_dealerstringg);
		
		$email_alert_updated_systemdealer = '1';

		
		}

 $log;

?>
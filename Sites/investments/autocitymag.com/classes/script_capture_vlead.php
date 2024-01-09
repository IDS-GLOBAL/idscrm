<?php require_once("../db_public.php"); ?>
<?php if(isset($_POST['ld_fullname'], $_POST['ld_email'], $_POST['ld_cellphone'], $_POST['ld_message'], $_POST['ld_vid'], $_POST['ld_vdid'])): 


		$ld_fullname = mysqli_real_escape_string($autocity_connection_mysqli, trim($_POST['ld_fullname']));
		$ld_email = mysqli_real_escape_string($autocity_connection_mysqli, trim($_POST['ld_email']));
		$ld_cellphone = mysqli_real_escape_string($autocity_connection_mysqli, trim($_POST['ld_cellphone']));
		$ld_message = mysqli_real_escape_string($autocity_connection_mysqli, trim($_POST['ld_message']));

		$ld_vid = mysqli_real_escape_string($autocity_connection_mysqli, trim($_POST['ld_vid']));
		$ld_vdid = mysqli_real_escape_string($autocity_connection_mysqli, trim($_POST['ld_vdid']));
		$browser = mysqli_real_escape_string($autocity_connection_mysqli, trim($browser));
		$mobiledevice = mysqli_real_escape_string($autocity_connection_mysqli, trim($mobiledevice));

//print_r($_POST);
// cust_salesperson_id
// sales_person_nametxt

// cust_bdc_id	
// cust_mgr_id



$sql_insert_lead = "
INSERT INTO `idsids_idsdms`.`cust_leads` SET
					`cust_lead_ip` = '$ip',
					`cust_lead_token` = '$tkey',
					`cust_lead_broswer` = '$browser',
					`cust_lead_mobile` = '$mobiledevice',
					`cust_perf_commun` = 'mobile',
					`cust_lead_temperature` = 'Hot',
					`cust_status` = 'Pending',
					`cust_phonetype` = 'mobile',
					`cust_leadcost` = '15.00',
					`cust_dealer_id` = '$ld_vdid',
					`cust_vehicle_id` = '$ld_vid',
					`cust_nickname` = '$ld_fullname',
					`cust_email` = '$ld_email',
					`cust_phoneno` = '$ld_cellphone',
					`cust_mobilephone` = '$ld_cellphone',
					`cust_comment` = '$ld_message',
					`cust_lead_type` = '1',
					`cust_lead_source` = 'AutoCityMag'
					
";

$run_sql_capture_lead = mysqli_query($autocity_connection_mysqli, $sql_insert_lead);

echo 'Thank you For Your Message Someone should be in touch with you shortly.';
?>






<?php endif; ?>
<?php mysqli_close($autocity_connection_mysqli); ?>

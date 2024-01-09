<?php

include("db_sales_loggedin.php");

// print_r($_POST);

if(isset($_POST['dlr_appt_creditapp_id'], $_POST['dlr_appt_lead_id'], $_POST['appt_url_goto'], $_POST['thisdid'], $_POST['dlr_appt_vid'], $_POST['dlr_appt_sid'], $_POST['dlr_appt_salesname_txt'], $_POST['dlr_appt_mgr_id'], $_POST['dlr_appt_mgrname_txt'], $_POST['dlr_appt_acid'], $_POST['dlr_appt_acidname_txt'], $_POST['dlr_appt_reprshop_id'], $_POST['dlr_appt_reprshopname_txt'],  $_POST['dlr_appt_title'], $_POST['dlr_appt_notes'], $_POST['dlr_appt_dlrtimezone'], $_POST['dlr_appt_startunixtime'], $_POST['dlr_appt_endunixtime'],  $_POST['dlr_appt_robot_sendemail'])){



	$dlr_appt_robot_sendemail = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_robot_sendemail']));
	$dlr_appt_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_title']));
	$dlr_appt_startunixtime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_startunixtime']));
	$dlr_appt_endunixtime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_endunixtime']));
	$dlr_appt_dlrtimezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_dlrtimezone']));
	
	//str_replace($mixedsearch, $mixedreplace, $mixedsubject);
	$dlr_appt_startunixtime = str_replace(' am', '', $dlr_appt_startunixtime);
	$dlr_appt_startunixtime = str_replace(' pm', '', $dlr_appt_startunixtime);
	
	$dlr_appt_endunixtime = str_replace(' am', '', $dlr_appt_endunixtime);
	$dlr_appt_endunixtime = str_replace(' pm', '', $dlr_appt_endunixtime);
		
	$dlr_appt_startunixtime_milli = strtotime($dlr_appt_startunixtime);
	$dlr_appt_endunixtime_milli  = strtotime($dlr_appt_endunixtime);
	
	

	$appt_url_goto = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['appt_url_goto']));
	$dlr_appt_creditapp_id =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_creditapp_id']));
	$dlr_appt_lead_id =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_lead_id']));

	$dlr_appt_did = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
	
	$dlr_appt_sid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_sid']));
	$dlr_appt_salesname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_salesname_txt']));



	$dlr_appt_mgr_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_mgr_id']));
	$dlr_appt_mgrname_txt  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_mgrname_txt']));
	
	$dlr_appt_acid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_acid']));
	$dlr_appt_acidname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_acidname_txt']));

	$dlr_appt_reprshop_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_reprshop_id']));
	$dlr_appt_reprshopname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_reprshopname_txt']));

	$dlr_appt_vid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_vid']));
	$dlr_appt_vid_descrp = NULL;
	$dlr_appt_notes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_notes']));

	$dlr_appt_task_id=NULL;
	
	$appt_url_goto="appointment.php?appt_token=$tkey";

	$create_new_system_appt = "INSERT INTO `idsids_idsdms`.`dealers_appointments` SET
										`dlr_appt_creditapp_id` = '$dlr_appt_creditapp_id',
										`dlr_appt_lead_id` = '$dlr_appt_lead_id',
										`dlr_appt_token` = '$tkey',
										`dlr_appt_passtime` = '0',
										`dlr_appt_robot_sendemail` = '$dlr_appt_robot_sendemail',
										`dlr_appt_did` = '$did',
										`dlr_appt_sid` = '$dlr_appt_sid',
										`dlr_appt_salesname_txt` = '$dlr_appt_salesname_txt',
										`dlr_appt_mgr_id` = '$dlr_appt_mgr_id',
										`dlr_appt_mgrname_txt` = '$dlr_appt_mgrname_txt',
										`dlr_appt_acid` = '$dlr_appt_acid',
										`dlr_appt_acidname_txt` = '$dlr_appt_acidname_txt',
										`dlr_appt_reprshop_id` = '$dlr_appt_reprshop_id',
										`dlr_appt_reprshopname_txt` = '$dlr_appt_reprshopname_txt',
										`dlr_appt_vid` = '$dlr_appt_vid',
										`dlr_appt_vid_descrp` = '$dlr_appt_vid_descrp',
										`dlr_appt_task_id` = '$dlr_appt_task_id',
										`dlr_appt_task_action_id` = '', 
										`dlr_appt_title` = '$dlr_appt_title',
										`dlr_appt_notes` = '$dlr_appt_notes',
										`appt_url_goto` = '$appt_url_goto',
										`dlr_appt_dlrtimezone` = '$dlr_appt_dlrtimezone',
										`dlr_appt_startunixtime` = '$dlr_appt_startunixtime',
										`dlr_appt_endunixtime` = '$dlr_appt_endunixtime',
										`dlr_appt_startunixtime_milli` = '$dlr_appt_startunixtime_milli',
										`dlr_appt_endunixtime_milli` = '$dlr_appt_endunixtime_milli'
									";
									
$run_create_new_system_apptstring = mysqli_query($idsconnection_mysqli, $create_new_system_appt);

		echo "
<script>
window.location.href = 'appointments.php';
</script>
";

}

include("inc.end.phpmsyql.php");


?>
<?php

include("db_loggedin.php");

//print_r($_POST);

if(isset($_POST['dlr_appt_id'], $_POST['thisdid'], $_POST['dlr_appt_task_id'], $_POST['dlr_appt_task_action_id'],  $_POST['dlr_appt_title'], $_POST['dlr_appt_sid'], $_POST['dlr_appt_salesname_txt'], $_POST['dlr_appt_mgrname_txt'], $_POST['dlr_appt_mgr_id'], $_POST['dlr_appt_acidname_txt'], $_POST['dlr_appt_acid'], $_POST['dlr_appt_reprshop_id'], $_POST['dlr_appt_reprshopname_txt'], $_POST['dlr_appt_startunixtime'], $_POST['dlr_appt_endunixtime'], $_POST['dlr_appt_notes'], $_POST['dlr_appt_dlrtimezone'], $_POST['dlr_appt_robot_sendemail'], $_POST['appointment_completed'],  $_POST['appointment_snooze'])){


//echo 'Ok I Made it';

	$dlr_appt_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_id']));
	$dlr_appt_task_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_task_id']));
	$dlr_appt_robot_sendemail = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_robot_sendemail']));
	$dlr_appt_task_action_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_task_action_id']));
	$dlr_appt_startunixtime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_startunixtime']));
	$dlr_appt_endunixtime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_endunixtime']));
	$dlr_appt_notes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_notes']));


	$dlr_appt_dlrtimezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_dlrtimezone']));
	
	$appointment_snooze = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['appointment_snooze']));
	$appointment_completed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['appointment_completed']));
	
	//str_replace($mixedsearch, $mixedreplace, $mixedsubject);
	
	$dlr_appt_startunixtime = str_replace(' am', '', $dlr_appt_startunixtime);
	$dlr_appt_startunixtime = str_replace(' pm', '', $dlr_appt_startunixtime);
	
	$dlr_appt_endunixtime = str_replace(' am', '', $dlr_appt_endunixtime);
	$dlr_appt_endunixtime = str_replace(' pm', '', $dlr_appt_endunixtime);
		
	$dlr_appt_startunixtime_milli = strtotime($dlr_appt_startunixtime);
	$dlr_appt_endunixtime_milli  = strtotime($dlr_appt_endunixtime);


	$dlr_appt_salesname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_salesname_txt']));
	$dlr_appt_sid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_sid']));
	
	$dlr_appt_mgrname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_mgrname_txt']));
	$dlr_appt_mgr_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_mgr_id']));
	
	
	$dlr_appt_acidname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_acidname_txt']));
	$dlr_appt_acid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_acid']));
	
	
	$dlr_appt_reprshopname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_reprshopname_txt']));
	$dlr_appt_reprshop_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_appt_reprshop_id']));


	$update_new_system_task = "UPDATE `idsids_idsdms`.`dealers_tasks` SET
										`appointment_completed` = '$appointment_completed',
										`appointment_snooze` = '$appointment_snooze',
										`dlr_appt_robot_sendemail` = '$dlr_appt_robot_sendemail',
										`dlr_appt_did` = '$did',
										`dlr_appt_task_id` = '$dlr_appt_task_id', 
										`dlr_appt_task_action_id` = '$dlr_appt_task_action_id',
										`dlr_appt_salesname_txt` = '$dlr_appt_salesname_txt',
										`dlr_appt_sid` = '$dlr_appt_sid',										
										`dlr_appt_mgrname_txt` = '$dlr_appt_mgrname_txt',
										`dlr_appt_mgr_id` = '$dlr_appt_mgr_id',
										`dlr_appt_acidname_txt` = '$dlr_appt_acidname_txt',
										`dlr_appt_acid` = '$dlr_appt_acid',
										`dlr_appt_reprshopname_txt` = '$dlr_appt_reprshopname_txt',
										`dlr_appt_reprshop_id` = '$dlr_appt_reprshop_id',
										`dlr_appt_dlrtimezone` = '$dlr_appt_dlrtimezone',
										`dlr_appt_startunixtime` = '$dlr_appt_startunixtime',
										`appointmentend_unixtime` = '$dlr_appt_endunixtime',
										`dlr_appt_startunixtime_milli` = '$dlr_appt_startunixtime_milli',
										`dlr_appt_endunixtime_milli` = '$dlr_appt_endunixtime_milli',
										`dlr_appt_notes` = '$dlr_appt_notes'
									WHERE
										`dlr_appt_id` = '$dlr_appt_id'
									";
									
$run_update_new_system_taskstring = mysqli_query($idsconnection_mysqli, $update_new_system_task);

}




?>
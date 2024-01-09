<?php

include("db_loggedin.php");

//print_r($_POST);

if(isset($_POST['task_id'], $_POST['thisdid'], $_POST['task_action'], $_POST['task_title'], $_POST['task_sid'], $_POST['task_sid_salesname_txt'], $_POST['task_mgrname_txt'], $_POST['task_mgr_id'], $_POST['task_acidname_txt'], $_POST['task_acid_id'], $_POST['task_reprshopname_txt'], $_POST['task_reprshop_id'], $_POST['taskstart_unixtime'], $_POST['taskend_unixtime'], $_POST['task_message'], $_POST['task_timezone'], $_POST['robot_sendemail'], $_POST['task_completed'],  $_POST['task_snooze'])){


//echo 'Ok I Made it';

	$task_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_id']));
	$task_action = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_action']));
	$robot_sendemail = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['robot_sendemail']));
	$task_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_title']));
	$taskstart_unixtime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['taskstart_unixtime']));
	$taskend_unixtime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['taskend_unixtime']));
	$task_message = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_message']));


	$task_timezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_timezone']));
	
	$task_snooze = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_snooze']));
	$task_completed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_completed']));
	
	//str_replace($mixedsearch, $mixedreplace, $mixedsubject);
	
	$taskstart_unixtime = str_replace(' am', '', $taskstart_unixtime);
	$taskstart_unixtime = str_replace(' pm', '', $taskstart_unixtime);
	
	$taskend_unixtime = str_replace(' am', '', $taskend_unixtime);
	$taskend_unixtime = str_replace(' pm', '', $taskend_unixtime);
		
	$task_starttime_milli = strtotime($taskstart_unixtime);
	$task_endtime_milli  = strtotime($taskend_unixtime);


	$task_sid_salesname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_sid_salesname_txt']));
	$task_sid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_sid']));
	
	$task_mgrname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_mgrname_txt']));
	$task_mgr_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_mgr_id']));
	
	
	$task_acidname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_acidname_txt']));
	$task_acid_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_acid_id']));
	
	
	$task_reprshopname_txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_reprshopname_txt']));
	$task_reprshop_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['task_reprshop_id']));


	 $update_new_system_task = "UPDATE `idsids_idsdms`.`dealers_tasks` SET
										`task_completed` = '$task_completed',
										`task_snooze` = '$task_snooze',
										`robot_sendemail` = '$robot_sendemail',
										`task_did` = '$did',
										`task_action_id` = '$task_action', 
										`task_title` = '$task_title',
										`task_sid_salesname_txt` = '$task_sid_salesname_txt',
										`task_sid` = '$task_sid',										
										`task_mgrname_txt` = '$task_mgrname_txt',
										`task_mgr_id` = '$task_mgr_id',
										`task_acidname_txt` = '$task_acidname_txt',
										`task_acid_id` = '$task_acid_id',
										`task_reprshopname_txt` = '$task_reprshopname_txt',
										`task_reprshop_id` = '$task_reprshop_id',
										`task_timezone` = '$task_timezone',
										`taskstart_unixtime` = '$taskstart_unixtime',
										`taskend_unixtime` = '$taskend_unixtime',
										`task_starttime_milli` = '$task_starttime_milli',
										`task_endtime_milli` = '$task_endtime_milli',
										`task_message` = '$task_message'
									WHERE
										`task_id` = '$task_id'
									";
									
$run_update_new_system_taskstring = mysqli_query($idsconnection_mysqli, $update_new_system_task);

echo "
<script>
window.location.href = 'tasks.php';
</script>
";

}




?>
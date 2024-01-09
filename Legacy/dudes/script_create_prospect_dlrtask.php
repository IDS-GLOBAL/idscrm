<?php require_once('db_admin.php'); ?>
<?php





if(isset($_POST['dlrposted_token'], $_POST['prospctdlrid'], $_POST['dudesid'], $_POST['enter_dlrprospect_task'], $_POST['pick_dlrprospect_task_time_label'], $_POST['pick_dlrprospect_task_time'], $_POST['pick_dlrprospect_task_date_label'], $_POST['pick_dlrprospect_task_date'])){
	



$dlrposted_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlrposted_token']));
$prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
$dudesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudesid']));

	
	


$enter_dlrprospect_task = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['enter_dlrprospect_task']));

$pick_dlrprospect_task_time_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pick_dlrprospect_task_time_label']));

$pick_dlrprospect_task_time = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pick_dlrprospect_task_time']));

$pick_dlrprospect_task_date_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pick_dlrprospect_task_date_label']));

$pick_dlrprospect_task_date = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pick_dlrprospect_task_date']));


	$taskstart_unixtime = $pick_dlrprospect_task_time.' '.$pick_dlrprospect_task_date;
	
	
	
	$taskend_unixtime = date('Y-m-d H:i:s', strtotime($taskstart_unixtime.'+30 mins'));
	$task_starttime_milli = strtotime($taskstart_unixtime);
	$task_endtime_milli = strtotime($taskstart_unixtime.'+30 mins');
	
	$create_prospect_dlrTASK_sql = "
	INSERT INTO `idsids_tracking_idsvehicles`.`dudes_tasks` SET
		`task_dudesid` = '$dudesid',
		`task_prospectdlrid` = '$prospctdlrid',
		`task_title` = '$enter_dlrprospect_task',
		`task_token` = '$tkey',
		`task_completed` = '0',
		`task_timezone` = '$zone_to',
		`taskstart_unixtime` = '$taskstart_unixtime',
		`taskend_unixtime` = '$taskend_unixtime',
		`task_starttime_milli` = '$task_starttime_milli',
		`task_endtime_milli` = '$task_endtime_milli',
		`task_message` = '$enter_dlrprospect_task'
	";
	
$run_create_prospect_dlrTASK_sql = mysqli_query($idsconnection_mysqli, $create_prospect_dlrTASK_sql, $tracking);
	
	
	
	
}

?>


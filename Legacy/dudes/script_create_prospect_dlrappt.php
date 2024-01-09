<?php require_once('db_admin.php'); ?>
<?php




if(isset($_POST['dlrposted_token'], $_POST['prospctdlrid'], $_POST['dudesid'], $_POST['appointment_notes'], $_POST['pick_dlrprospect_appointment_hours_label'], $_POST['pick_dlrprospect_appointment_hours'], $_POST['appointment_endtime_label'], $_POST['appointment_endtime'])){
	
	

$dlrposted_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlrposted_token']));
$prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
$dudesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudesid']));
	

$appointment_notes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['appointment_notes']));

$pick_dlrprospect_appointment_hours_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pick_dlrprospect_appointment_hours_label']));

$pick_dlrprospect_appointment_hours = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pick_dlrprospect_appointment_hours']));


$appointment_endtime_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['appointment_endtime_label']));


$appointment_endtime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['appointment_endtime']));




$dlr_appt_startunixtime = $pick_dlrprospect_appointment_hours.' '.$appointment_endtime;
$dlr_appt_endunixtime = $taskend_unixtime = date('Y-m-d H:i:s', strtotime($dlr_appt_startunixtime.'+30 mins'));
$dlr_appt_startunixtime_milli = strtotime($dlr_appt_startunixtime);
$dlr_appt_endunixtime_milli	= strtotime($dlr_appt_startunixtime.'+30 mins');

	
	$create_prospect_dlrappt_sql = "
	INSERT INTO `idsids_idsdms`.`dealers_appointments` SET
		`dlr_appt_prospectdlrid` = '$prospctdlrid',
		`dlr_appt_title` = '$appointment_notes',
		`dlr_appt_token` = '$dlrposted_token',
		`ids_dudes_id` = '$dudesid',
		`dlr_dudes_demo` = '1',
		`dlr_appt_dlrtimezone` = '$zone_to',
		`dlr_appt_startunixtime` = '$dlr_appt_startunixtime',
		`dlr_appt_endunixtime` = '$appointment_endtime',
		`dlr_appt_startunixtime_milli` = '$dlr_appt_startunixtime_milli',
		`dlr_appt_endunixtime_milli` = '$dlr_appt_endunixtime_milli',
		`dlr_appt_notes` = '$appointment_notes'
	";

$run_create_prospect_dlrappt_sql = mysqli_query($idsconnection_mysqli, $create_prospect_dlrappt_sql);
	
	
	
	
	
	
}

?>
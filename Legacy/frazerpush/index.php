<?php require_once("../Connections/frazerdms.php"); ?>
<?php
// idscrm.com/frazersend/?frazerid=2&id=stewartmcfarland@frazer.com

if(isset($_GET['frazerid'], $_GET['id'])){


@$http_user_agent = $_SERVER['HTTP_USER_AGENT'];
@$ip = $_SERVER['REMOTE_ADDR'];


$activity_log_frazerid =  mysqli_real_escape_string($frazerdms_mysqli, trim($_GET['frazerid']));
$activity_deviceview =   mysqli_real_escape_string($frazerdms_mysqli, trim($http_user_agent));
$frazer_idsemail = mysqli_real_escape_string($frazerdms_mysqli, trim($_GET['id']));
$activity_ip =  mysqli_real_escape_string($frazerdms_mysqli, trim($ip));
$activity_log_text = mysqli_real_escape_string($frazerdms_mysqli, trim('From Frazer Send ID:'. $_GET['id']. ' | '.$_GET['frazerid']));


	$insert_activity_log ="
	INSERT INTO `idsids_fazerdms`.`activity_log` SET
		`activity_log_frazerid` = '$activity_log_frazerid',
		`activity_deviceview` = '$activity_deviceview',
		`frazer_idsemail` = '$frazer_idsemail',
		`activity_ip` = '$activity_ip',
		`activity_log_text` = '$activity_log_text'
	";


	
	$run_insert_activity_log = mysqli_query($frazerdms_mysqli, $insert_activity_log);

	$activity_log_id	= mysqli_insert_id($frazerdms_mysqli);

	mysqli_close($frazerdms_mysqli);


}






?>
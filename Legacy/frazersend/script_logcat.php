<?php


//exit;
@$http_user_agent = $_SERVER['HTTP_USER_AGENT'];
@$ip = $_SERVER['REMOTE_ADDR'];


$log = mysqli_real_escape_string($frazerdms_mysqli, trim($log));

$logcat_system_logs = "INSERT INTO `idsids_fazerdms`.`activity_log` SET
										`activity_log_frazerid` = '$frazerid',
										`frazer_idsemail` = '$newidsemail',
										`activity_ip` = '$ip',
										`activity_log_text` = '$log',
										`activity_deviceview` = '$http_user_agent'
									";

$run_logcat_system_logs = mysqli_query($frazerdms_mysqli, $logcat_system_logs);

?>
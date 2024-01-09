<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php require_once("db_loggedin.php"); ?>
<?php

	if(!$_POST) exit();
	
	
	//print_r($_POST);


if(isset($_POST['wfhuserperm_id'], $_POST['ldfee'], $_POST['fbid'])){



$ldfee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ldfee']));
$wfhuserperm_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfhuserperm_id']));
$fbid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['fbid']));

// need to pull coupon code from dealer table neeed to make exist  11-14-2016
$wfhdelrperm_coupon_code = '';
$wfhdelrperm_leadpackage_code = '';


mysql_select_db($database_wfh_connection, $wfh_connection);
$query_wfhstate_userprofls = "SELECT * FROM `idsids_wefinancehere`.`wfhuserprofile` WHERE `wfhuser_fbid` = '$fbid' LIMIT 1";
$wfhstate_userprofls = mysqli_query($idsconnection_mysqli, $query_wfhstate_userprofls, $wfh_connection);
$row_wfhstate_userprofls = mysqli_fetch_assoc($wfhstate_userprofls);
$totalRows_wfhstate_userprofls = mysqli_num_rows($wfhstate_userprofls);
$found_wfhuser_id = $row_wfhstate_userprofls['wfhuser_id'];

$applicant_name  = $row_wfhstate_userprofls['applicant_name'];
$applicant_fname = $row_wfhstate_userprofls['applicant_fname'];
$applicant_mname = $row_wfhstate_userprofls['applicant_mname'];
$applicant_lname = $row_wfhstate_userprofls['applicant_lname'];
$wfhuser_email_address = $row_wfhstate_userprofls['wfhuser_email_address'];
if($row_wfhstate_userprofls['wfhuser_fbemail']){ $wfhuser_email_address = $row_wfhstate_userprofls['wfhuser_fbemail']; }

$wfhuser_fbid = $row_wfhstate_userprofls['wfhuser_fbid'];

$wfhuserperm_fbid = $row_wfhstate_userprofls['wfhuser_fbid'];

$wfhuserperm_approval_phone = $row_wfhstate_userprofls['applicant_cell_phone'];

$wfhuserperm_ourrank = 'B';
$wfhdelrperm_when_date = $server_time;

$log_vid = '';
if(isset($_POST['log_vid'])){
	$log_vid = $_POST['log_vid'];
}


 $query_update_dealer_perm_sql = "
UPDATE `idsids_wefinancehere`.`wfhuser_approvals_perms` SET
	`wfhuserperm_wfhuser_id` = '$found_wfhuser_id ',
	`wfhuserperm_approval_fname` = '$applicant_fname',
	`wfhuserperm_approval_lname` = '$applicant_lname',
	`wfhuserperm_approval_email` = '$wfhuser_email_address',
	`wfhuserperm_approval_phone` = '$wfhuserperm_approval_phone',
	`wfhuserperm_fbid` = '$wfhuserperm_fbid',
	`wfhuserperm_ip` = '$ip',
	`wfhuserperm_browser` = '$browser',
	`wfhuserperm_ourrank` = '$wfhuserperm_ourrank',
	`wfhdelrperm_okay_perm` = '1',
	`wfhdelrperm_when_date` = '$wfhdelrperm_when_date',
	`wfhdelrperm_leadpackage_code` = '$wfhdelrperm_leadpackage_code',
	`wfhdelrperm_coupon_code` = '$wfhdelrperm_coupon_code',
	`wfhdelrperm_cost` = '$ldfee',
	`wfhdelrperm_charged` = '1',
	`wfhdelrperm_charged_date` = '$server_time'
	WHERE
	`wfhuserperm_id` = '$wfhuserperm_id'

";
	$ran_update_dealer_perm = mysqli_query($wfh_connection_mysqli, $query_update_dealer_perm_sql);


if($found_wfhuser_id){
	

	}else{
	
	//mysqli_query($wfh_connection_mysqli, $query_create_dealer_perm_sql);
    //$wfhuserperm_id = mysqli_insert_id($wfh_connection_mysqli);
	
	}


 $create_dlr_chargesql = "
INSERT INTO `idsids_wefinancehere`.`wfhuser_ledger_log` SET
	`wfhuserperm_id` = '$wfhuserperm_id',
	`wfhuserledger_log_token` = '$tkey',
	`wfhuserledger_log_vid` = '$log_vid',
	`wfhuserledger_log_did` = '$did',
	`wfhuserledger_log_typtransc` = '-',
	`wfhuserledger_log_amount` = '$ldfee'
";


	mysqli_query($wfh_connection_mysqli, $create_dlr_chargesql);
    $wfhuserledger_log_id = mysqli_insert_id($wfh_connection_mysqli);


}


// Now MAKE Cust LEAD / cUSTOMER in IDS DMS WITH DEALER AND SALES PERSO ALSO MANAGER


?>
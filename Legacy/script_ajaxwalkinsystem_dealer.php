<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
//$idsconnection = mysql_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 

$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_faith";
$password_tracking = "benjamin2831";
//$tracking = mysql_connect($hostname_tracking, $username_tracking, $password_tracking) or trigger_error(mysql_error(),E_USER_ERROR); 
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking, $password_tracking) or trigger_error(mysql_error(),E_USER_ERROR); 






?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}




if(isset($_POST['prospctdlrid'], $_POST['systemdealer_id'], $_POST['pending_dealerid'],  $_POST['secret_token'],  $_POST['dudes_token'], $_POST['company_name'], $_POST['company_legalname'], $_POST['company_email'], $_POST['company_password'], $_POST['company_password2'])){




$prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
$pending_dealerid  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['pending_dealerid']));

$systemdealer_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['systemdealer_id']));
$company_name= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_name']));
$company_legalname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_legalname']));

$company_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_password']));
$company_password2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_password2']));




$secret_token= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['secret_token']));
$dudes_token= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_token']));


$update_systemdlr_token_sql = "	
	UPDATE `idsids_idsdms`.`dealers` SET
	`password` = '$company_password',
	`prospct_dlrid` = '$prospctdlrid',
	`status` = '1'
		WHERE
		`id` = '$systemdealer_id'
";


    $_SESSION['MM_Username'] = $_POST['company_email'];
    $_SESSION['MM_UserGroup'] = '1';	      





$ran_update_prospectdlr_token_sql = mysqli_query($idsconnection_mysqli, $update_systemdlr_token_sql);


// update pending dealer with system dealers
$update_systempendingdlr_token_sql = "	
	UPDATE `idsids_idsdms`.`dealers_pending` SET
	`sys_covertdlrs_did` = '$systemdealer_id',
	`prospctdlrid` = '$prospctdlrid'
		WHERE
		`id` = '$pending_dealerid'
";





$ran_update_systempendingdlr_token_sql = mysqli_query($idsconnection_mysqli, $update_systempendingdlr_token_sql);






// update pending dealer with system dealers
$update_systemprospctdlrid_sql = "	
	UPDATE `idsids_tracking_idsvehicles`.`dealer_prospects` SET
	`dlrprospect_locked` = '1',
	`dealer_pending_id` = '$pending_dealerid'
		WHERE
		`id` = '$prospctdlrid'
";





$ran_update_systemprospctdlrid_sql = mysqli_query($idsconnection_mysqli, $update_systemprospctdlrid_sql);










echo "
<script>

window.location.href = 'https://idscrm.com/dealers/dashboard.php?what=dowelcome';

</script>
";

//header('Location: walkin.php');



}






?>
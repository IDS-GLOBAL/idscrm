<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/tracking.php'); ?>
<?php require_once('../Connections/wfh_connection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Usernamemobi'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Usernamemobi'], $_SESSION['MM_UserGroupmobi'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php


$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.`dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
$dudes_access_level  = $row_userDudes['dudes_access_level'];
$dudes_skillset_id = $row_userDudes['dudes_skillset_id'];
$dudes_market_id = $row_userDudes['dudes_market_id'];
$dudes_email_internal = $row_userDudes['dudes_email_internal'];
$dudes_email_personal = $row_userDudes['dudes_email_personal'];
$dudes_dob = $row_userDudes['dudes_dob'];


$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";

$dealerTimezone = $row_userDudes['dudes_Timezone'];

if($dudes_skillset_id != '9'){
  //header("Location: $MM_restrictGoTo");
}


if($dealerTimezone){
$zone_from ='America/Chicago';
$zone_to= $dealerTimezone;
}else{
$zone_from ='America/Chicago';
$zone_to='America/New_York';
}
//date_default_timezone_set($zone_from);

//  $convert_date="2016-04-09 19:51:03";

//  echo $finalDate=zone_conversion_date($convert_date, $zone_from, $zone_to);


function zone_conversion_date($time, $cur_zone, $req_zone)
{   
	global $zone_from;
	global $zone_to;

    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_from);
    $local = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_to);
    $required = date("Y-m-d H:i:s");

    /* return $required; */
    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");

    return $timestamp = $date->format("Y-m-d H:i:s");
}

function get_Datetime_Now() {
	
	global $zone_to;
	
	$tz_object = new DateTimeZone($zone_to);
	//date_default_timezone_set('America/New_York');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');		//06-18-2014 08:49:34
	return $datetime->format('Y\-m\-d\ h:i:s');  	//2014-06-18 08:47:46
	//return $datetime->format('Y\/m\/d\ ');  		//2014/06/18

}

$timevar = get_Datetime_Now();




$server_time = zone_conversion_date($timevar, $zone_from, $zone_to);





// To Find A Sing Dealer 
/* 
$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_query =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_dealer_query'";
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);
$row_dealer_query = mysqli_fetch_array($dealer_query);
$totalRows_dealer_query = mysqli_num_rows($dealer_query);
$thisdid = $row_dealer_query['id'];
$dealer_email = $row_dealer_query['email']; -->
*/

$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_query = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_dealer_query'";
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);

// Check if the query was successful and returned a row
if ($dealer_query) {
    $row_dealer_query = mysqli_fetch_array($dealer_query);

    // Check if a row was fetched
    if ($row_dealer_query) {
        $thisdid = $row_dealer_query['id'];
        $dealer_email = $row_dealer_query['email'];
    } 
	
}



$colname_prspct_dealers = "-1";
if (isset($_GET['dlr_prspct'])) {
  $colname_prspct_dealers = $_GET['dlr_prspct'];
}
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_prspct_dealers =  "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `dealer_prospects`.`id` = '$colname_prspct_dealers' ORDER BY `dealer_prospects`.`state` ASC ";
$prspct_dealers = mysqli_query($tracking_mysqli, $query_prspct_dealers);

if ($prspct_dealers) {
    $row_prspct_dealers = mysqli_fetch_array($prspct_dealers);

    // Check if a row was fetched
    if ($row_prspct_dealers) {
        $totalRows_prspct_dealers = mysqli_fetch_array($prspct_dealers);
		$state_prospect = $colname_prspct_dealers;
		$dlr_prspct_id = $row_prspct_dealers['id'];
    } 
	
}







mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM `idsids_idsdms`.`dealers_pending` ORDER BY `dealers_pending`.`id` DESC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrtickets = "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr` ORDER BY `ticket_submit_dlr`.`id` DESC";
$dlrtickets = mysqli_query($idsconnection_mysqli, $query_dlrtickets);
$row_dlrtickets = mysqli_fetch_array($dlrtickets);
$totalRows_dlrtickets = mysqli_num_rows($dlrtickets);



//  Took out this line global templates for now:      WHERE `email_systm_templates_dudeid` = '$dudesid' 
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_template_types = "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE `dudes_sys_htmlemail_templates`.`email_systm_templates_status`= '1' ORDER BY `dudes_sys_htmlemail_templates`.`email_systm_templates_subject` ASC";
$dealer_template_types = mysqli_query($idsconnection_mysqli, $query_dealer_template_types);
$row_dealer_template_types = mysqli_fetch_array($dealer_template_types);
$totalRows_dealer_template_types = mysqli_num_rows($dealer_template_types);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_template_types_inactive = "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE  `dudes_sys_htmlemail_templates`.`email_systm_templates_status` NOT IN (1) ORDER BY `dudes_sys_htmlemail_templates`.`email_systm_templates_subject` ASC";
$dealer_template_types_inactive = mysqli_query($idsconnection_mysqli, $query_dealer_template_types_inactive);
$row_dealer_template_types_inactive = mysqli_fetch_array($dealer_template_types_inactive);
$totalRows_dealer_template_types_inactive = mysqli_num_rows($dealer_template_types_inactive);




include("../Libary/sessioncookies.php");
include("../Libary/token-generator.php");
?>
<?php 


$onpage_current = $_SERVER['PHP_SELF'];
//$onpage_current = str_replace('/idscrm/dudes/', '', $onpage_current);

//$currentPage = $onpage_current;



?>
<?php //require_once('db_admin.php'); ?>
<?php

$colname_prspct_dealers = "-1";
if (isset($_GET['state'])) {
  $colname_prspct_dealers = $_GET['state'];
}
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_prspct_dealers =  "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `state` = '$colname_prspct_dealers' ORDER BY `state` ASC";
$prspct_dealers = mysqli_query($tracking_mysqli, $query_prspct_dealers);
$row_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$totalRows_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$state_prospect = $colname_prspct_dealers;


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM `idsids_idsdms`.`dealers_pending` ORDER BY `dealers_pending`.`id` ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sys_dealers = "SELECT * FROM `idsids_idsdms`.`dealers` ORDER BY `dealers`.`id` ASC";
$sys_dealers = mysqli_query($idsconnection_mysqli, $query_sys_dealers);
$row_sys_dealers = mysqli_fetch_array($sys_dealers);
$totalRows_sys_dealers = mysqli_num_rows($sys_dealers);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_invoice_dealer = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring`, `idsids_idsdms`.`dealers` WHERE `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`  AND `ids_toinvoices_recurring`.`invoice_date` = '$server_time' ORDER BY `ids_toinvoices_recurring`.`invoice_id` ASC";
$invoice_dealer = mysqli_query($idsconnection_mysqli, $query_invoice_dealer);
$row_invoice_dealer = mysqli_fetch_array($invoice_dealer);
$totalRows_invoice_dealer = mysqli_num_rows($invoice_dealer);

$query_wfh_approvaldeals = "SELECT DISTINCT `wfhuser_approvals_perms`.`wfhuserperm_id`,`wfhuser_approvals`. `wfhuser_approval_id` FROM `idsids_wefinancehere`.`wfhuser_approvals`, `idsids_wefinancehere`.`wfhuser_approvals_perms` WHERE `wfhuser_approvals_perms`.`wfhuserperm_approval_id` = `wfhuser_approvals`.`wfhuser_approval_id`";
$wfh_approvaldeals = mysqli_query($wfh_connection_mysqli, $query_wfh_approvaldeals);
$row_wfh_approvaldeals = mysqli_fetch_array($wfh_approvaldeals);
$totalRows_wfh_approvaldeals = mysqli_num_rows($wfh_approvaldeals);


$query_wfhlatest_fbusrs = "SELECT * FROM `idsids_wefinancehere`.`wfhuserprofile` ORDER BY `wfhuserprofile`.`applicant_digital_signature_date` DESC";
$wfhlatest_fbusrs = mysqli_query($wfh_connection_mysqli, $query_wfhlatest_fbusrs);
$row_wfhlatest_fbusrs = mysqli_fetch_array($wfhlatest_fbusrs);
$totalRows_wfhlatest_fbusrs = mysqli_num_rows($wfhlatest_fbusrs);

$dudesid = $row_userDudes['dudes_id'];
if($dudes_skillset_id != '9'){
  //header("Location: $MM_restrictGoTo");
	$insert_pull_dlrdemos_sql = "`dealers_appointments`.`ids_dudes_id` = '$dudesid'";
}else{
	$insert_pull_dlrdemos_sql = "`dealers_appointments`.`ids_dudes_id` = '$dudesid'";
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_dlrdemos = "SELECT * 
FROM 
`idsids_idsdms`.`dealers_appointments`
	LEFT JOIN `idsids_idsdms`.`dealers`
									ON `dealers_appointments`.`dlr_appt_did` = `dealers`.`id`
	LEFT JOIN `idsids_tracking_idsvehicles`.`dealer_prospects` 
									ON `dealers_appointments`.`dlr_appt_prospectdlrid` = `dealer_prospects`.`id` 
									


WHERE 
$insert_pull_dlrdemos_sql 
GROUP BY `dealers_appointments`.`dlr_appt_id` 
ORDER BY `dealers_appointments`.`dlr_appt_startunixtime` DESC";
$pull_dlrdemos = mysqli_query($idsconnection_mysqli, $query_pull_dlrdemos);
$row_pull_dlrdemos = mysqli_fetch_array($pull_dlrdemos);
$totalRows_pull_dlrdemos = mysqli_num_rows($pull_dlrdemos);


$query_dealer_wfhpurchases = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_amount` IS NOT NULL ORDER BY `wfhuser_ledger_log`.`wfhuserledger_log_created_at` ASC";
$dealer_wfhpurchases = mysqli_query($wfh_connection_mysqli, $query_dealer_wfhpurchases);
$row_dealer_wfhpurchases = mysqli_fetch_array($dealer_wfhpurchases);
$totalRows_dealer_wfhpurchases = mysqli_num_rows($dealer_wfhpurchases);

$query_dealer_wfhpurch_logbatches = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_ledger_batch` WHERE `wfhuserledger_batch_did` = '60' ORDER BY `wfhuser_ledger_batch`.`wfhuserledger_batch_created_at` ASC";
$dealer_wfhpurch_logbatches = mysqli_query($wfh_connection_mysqli, $query_dealer_wfhpurch_logbatches);
$row_dealer_wfhpurch_logbatches = mysqli_fetch_array($dealer_wfhpurch_logbatches);
$totalRows_dealer_wfhpurch_logbatches = mysqli_num_rows($dealer_wfhpurch_logbatches);

$query_pull_credit_packages = "SELECT * FROM `idsids_idsdms`.`ids_credits` ORDER BY `ids_credits`.`credit_pckg_amount` ASC";
$pull_credit_packages = mysqli_query($idsconnection_mysqli, $query_pull_credit_packages);
$row_pull_credit_packages = mysqli_fetch_array($pull_credit_packages);
$totalRows_pull_credit_packages = mysqli_num_rows($pull_credit_packages);

$query_pluscreditsAvilable = "SELECT SUM(`wfhuser_ledger_log`.`wfhuserledger_log_amount`) as `total_pluscredits` FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_typtransc` = '+'";
$pluscreditsAvilable = mysqli_query($wfh_connection_mysqli, $query_pluscreditsAvilable);
$row_pluscreditsAvilable = mysqli_fetch_array($pluscreditsAvilable);
$totalRows_pluscreditsAvilable = mysqli_num_rows($pluscreditsAvilable);

$total_pluscredits = $row_pluscreditsAvilable['total_pluscredits'];
if(!$row_pluscreditsAvilable['total_pluscredits']){ $total_pluscredits = 0; }


$query_minuscreditsAvilable = "SELECT SUM(`wfhuser_ledger_log`.`wfhuserledger_log_amount`) as `total_minuscredits` FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_typtransc` = '-'";
$minuscreditsAvilable = mysqli_query($idsconnection_mysqli, $query_minuscreditsAvilable);
$row_minusminuscreditsAvilable = mysqli_fetch_array($minuscreditsAvilable);
$totalRows_minuscreditsAvilable = mysqli_num_rows($minuscreditsAvilable);

if($row_minusminuscreditsAvilable['total_minuscredits'] > 0){

    $total_minuscredits = $row_minusminuscreditsAvilable['total_minuscredits'];
}else{
    $total_minuscredits = 0.00;
}


$true_total_credits = ($total_pluscredits - $total_minuscredits);

function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
         $number = sprintf('%.2f', $number);
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
} 

?>
<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>












</head>

<body>
<?php //include("analyticstracking.php"); ?>
    <div id="wrapper">
















    
        <?php include("_sidebar.dudes.php"); ?>
















        <div id="page-wrapper" class="gray-bg">









        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.php">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to IDSCRM.COM</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div>
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div>
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div>
                                    <small class="pull-right">0h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">0 days ago at 2:30 am - <?php echo date("m"); ?>.<?php echo date("d"); ?>.<?php echo date("Y"); ?></small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="#">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="$">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 0 messages
                                    <span class="pull-right text-muted small">0 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 0 New Followers
                                    <span class="pull-right text-muted small">0 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">0 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="script-logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>













            <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">All Time</span>
                                <h5>Dealer Opportunities</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $totalRows_dealers_pend; ?></h1>
                                <div class="stat-percent font-bold text-success"><a href="my.dealers.pending.php"><i class="fa fa-bolt"></i>View</a></div>
                                <small>Dealers Pending</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">All Time</span>
                                <h5>Money Makers</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><a href="my.dealers.php"><?php echo $totalRows_sys_dealers; ?></a></h1>
                                <div class="stat-percent font-bold text-info"><a href="my.dealers.php"><i class="fa fa-level-up"></i>View</a> </div>
                                <small>System Dealers</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Annual</span>
                                <h5>Deals</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><a href="cardeals.php"><?php echo $totalRows_wfh_approvaldeals; ?></a></h1>
                                <div class="stat-percent font-bold text-info"><a href="my.dealers.php"><i class="fa fa-level-up"></i>View</a> </div>
                                <small>New Approval Deals</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Today</span>
                                <h5>Face Book Users</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $totalRows_wfhlatest_fbusrs; ?></h1>
                                <div class="stat-percent font-bold text-navy"><a href="my.dealers.php"><i class="fa fa-bolt"></i>View</a></div>
                                <small><a href="my.dealers.php"><i class="fa fa-bolt"></i>New Fb Users</a></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">Permanent</span>
                                <h5>Profiles No Facebook Login.</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $totalRows_wfhlatest_fbusrs; ?></h1>
                                <div class="stat-percent font-bold text-danger"><a href="my.dealers.php"><i class="fa fa-bolt"></i>View</a></div>
                                <small><a href="my.dealers.php"><i class="fa fa-bolt"></i>Latest Fbusrs</a></small>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>IDSCRM Dealer Sales</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-9">
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins">$<?php echo number_format($true_total_credits, 2); ?></h2>
                                            <small>Life Time Total credits</small>
                                            <div class="stat-percent">1% <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 100%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">$<?php echo number_format($total_pluscredits, 2); ?></h2>
                                            <small>Credits Assigned To Dealers</small>
                                            <div class="stat-percent">1% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 100%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">$<?php echo number_format($total_minuscredits, 2); ?></h2>
                                            <small>Credits Used By Dealers</small>
                                            <div id="total_minuscredits" class="stat-percent">1% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 100%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>


                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Trouble Tickets</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3><i class="fa fa-envelope-o"></i> Latest Trouble Tickets</h3>
                                <small><i class="fa fa-tim"></i> We have a <?php echo $totalRows_dlrtickets; ?> tickets waiting for Support.</small>
                            </div>
                            <div class="ibox-content">
                                <div class="feed-activity-list">

                                    <!--div class="feed-element">
                                        <div>
                                            <small class="pull-right text-navy">1m ago</small>
                                            <strong>Monica Smith</strong>
                                            <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</div>
                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                        </div>
                                    </div -->


                                    <?php do { ?>
                                    <div class="feed-element">
                                        <div>
<br />
<small class="pull-right"><a href="ticketd.view.php?sysdealerid=<?php echo $row_dlrtickets['ticket_did']; ?>&amp;ticketid=<?php echo $row_dlrtickets['id']; ?>" class="btn btn-sm btn-primary">View Ticket (<?php echo $row_dlrtickets['id']; ?>)</a></small>
                                          <strong><?php echo $row_dlrtickets['contact_name']; ?> @:<?php echo $row_dlrtickets['ticket_did']; ?> <?php echo $row_dlrtickets['priority']; ?> <?php echo $row_dlrtickets['status_dudes']; ?></strong>
                                          <div><?php echo $row_dlrtickets['what_happened']; ?><?php if($row_dlrtickets['what_you_want_to_happen']){ echo ' | '.$row_dlrtickets['what_you_want_to_happen']; }  ?><br /></div>
                                          <div><small class=""><?php echo $row_dlrtickets['created_at']; ?></small></div>
                                          </div>
                                      </div>
                                      <div class="hr-line-solid"></div>
                                      <?php } while ($row_dlrtickets = mysqli_fetch_array($dlrtickets)); ?>



                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Upcoming Demos</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Presenter</th>
                                                <th>When</th>
                                                <th>Dealer</th>
                                                <th>SalesMan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
<?php do { ?>
                                              <tr id="<?php echo $row_pull_dlrdemos['dlr_appt_id']; ?>">
                                                  <td>
                                                  	<small>Benjamin Carter &amp; <?php echo $row_pull_dlrdemos['dudes_id']; ?></small>\
                                                  </td>
                                                  <td>
                                                  <i class="fa fa-clock-o"></i><?php echo $row_pull_dlrdemos['dlr_appt_startunixtime']; ?> <?php echo $row_pull_dlrdemos['dlr_appt_dlrtimezone']; ?>
                                                  </td>
                                                  <td>
												  <?php echo $row_pull_dlrdemos['company']; ?>
                                                  </td>
                                              </tr>
  <?php } while ($row_pull_dlrdemos = mysqli_fetch_array($pull_dlrdemos)); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Small todo list</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <ul class="todo-list m-t small-list">
                                            <li>
                                                <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                                <span class="m-l-xs todo-completed">Find A New Client</span>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Auction Transactions Worldwide - In Beta</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-hover margin bottom">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 1%" class="text-center">Position.</th>
                                                        <th>Country</th>
                                                        <th class="text-center">Fees Amount</th>
                                                        <th class="text-center">Gross Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td> Dubai
                                                            </td>
                                                        <td class="text-center small">$24,627</td>
                                                        <td class="text-center"><span class="label label-primary">$483,000.00</span></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td> Africa
                                                        </td>
                                                        <td class="text-center small">$13,254</td>
                                                        <td class="text-center"><span class="label label-primary">$327,000.00</span></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td> India
                                                        </td>
                                                        <td class="text-center small">$12,245</td>
                                                        <td class="text-center"><span class="label label-warning">$125,000.00</span></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td> South America</td>
                                                        <td class="text-center small">$10,524</td>
                                                        <td class="text-center"><span class="label label-primary">$344,000.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5</td>
                                                        <td>Germany</td>
                                                        <td class="text-center small">$9,874</td>
                                                        <td class="text-center"><span class="label label-primary">$235,000.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">6</td>
                                                        <td>UK</td>
                                                        <td class="text-center small">$7,365</td>
                                                        <td class="text-center"><span class="label label-primary">$100,000.00</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <div id="world-map" style="height: 300px;"></div>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                </div>
        






        
        <?php include("_footer.php"); ?>



        </div>



        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                        Notes
                    </a></li>
                    <li><a data-toggle="tab" href="#tab-2">
                        Projects
                    </a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">
                        <i class="fa fa-gear"></i>
                    </a></li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> Latest Notes</h3>
                            <small><i class="fa fa-tim"></i> You have 10 new message.</small>
                        </div>

                        <div>

                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a1.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">

                                        There are many variations of passages of Lorem Ipsum available.
                                        <br>
                                        <small class="text-muted">Today 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a2.jpg">
                                    </div>
                                    <div class="media-body">
                                        The point of using Lorem Ipsum is that it has a more-or-less normal.
                                        <br>
                                        <small class="text-muted">Yesterday 2:45 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        Mevolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        <br>
                                        <small class="text-muted">Yesterday 1:10 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                    </div>

                                    <div class="media-body">
                                        Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                                        <br>
                                        <small class="text-muted">Monday 8:37 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a8.jpg">
                                    </div>
                                    <div class="media-body">

                                        All the Lorem Ipsum generators on the Internet tend to repeat.
                                        <br>
                                        <small class="text-muted">Today 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a7.jpg">
                                    </div>
                                    <div class="media-body">
                                        Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                        <br>
                                        <small class="text-muted">Yesterday 2:45 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below.
                                        <br>
                                        <small class="text-muted">Yesterday 1:10 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                    </div>
                                    <div class="media-body">
                                        Uncover many web sites still in their infancy. Various versions have.
                                        <br>
                                        <small class="text-muted">Monday 8:37 pm</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div id="tab-2" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> Latest projects</h3>
                            <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Business valuation</h4>
                                    It is a long established fact that a reader will be distracted.

                                    <div class="small">Completion with: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Contract with Company </h4>
                                    Many desktop publishing packages and web page editors.

                                    <div class="small">Completion with: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Meeting</h4>
                                    By the readable content of a page when looking at its layout.

                                    <div class="small">Completion with: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>The generated</h4>
                                    <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="small">Completion with: 22%</div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Business valuation</h4>
                                    It is a long established fact that a reader will be distracted.

                                    <div class="small">Completion with: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Contract with Company </h4>
                                    Many desktop publishing packages and web page editors.

                                    <div class="small">Completion with: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Meeting</h4>
                                    By the readable content of a page when looking at its layout.

                                    <div class="small">Completion with: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>The generated</h4>
                                    <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="small">Completion with: 22%</div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>

                        </ul>

                    </div>

                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> Settings</h3>
                            <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                        </div>

                        <div class="setings-item">
                    <span>
                        Show notifications
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                    <label class="onoffswitch-label" for="example">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Disable Chat
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox" id="example2">
                                    <label class="onoffswitch-label" for="example2">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Enable history
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                    <label class="onoffswitch-label" for="example3">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Show charts
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                    <label class="onoffswitch-label" for="example4">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Offline users
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox" id="example5">
                                    <label class="onoffswitch-label" for="example5">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Global search
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox" id="example6">
                                    <label class="onoffswitch-label" for="example6">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Update everyday
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                    <label class="onoffswitch-label" for="example7">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-content">
                            <h4>Settings</h4>
                            <div class="small">
                                I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                And typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>






    </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript 
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
-->


    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of Dealers",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
</body>
</html>
<?php
mysqli_free_result($dlrtickets);

mysqli_free_result($dealers_pend);

include("inc.end.phpmsyql.php");
?>

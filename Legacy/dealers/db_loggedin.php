<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/idschatconnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";
// *** Restrict Access To Page: Grant or deny access to this page
// http://webapplayers.com/inspinia_admin-v2.5/
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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
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

$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`email` = '$colname_userDets'";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere
$company = $row_userDets['company'];
$dealer_email = $row_userDets['email'];
$dealer_state = $row_userDets['state'];
$dealer_market_id = $row_userDets['dealer_market_id'];
$dealer_market_sub_id = $row_userDets['dealer_market_sub_id'];
$balance_credits = $row_userDets['balance_credits'];



// Start All For Time Zone

$dealerTimezone = $row_userDets['dealerTimezone'];

if($dealerTimezone){
$zone_from = 'America/New_York';
$zone_to = $dealerTimezone;
}else{
$zone_from ='America/New_York';
$zone_to = 'America/New_York';
}


// SET TIME VARIABLES
$time_now = date("Y-m-d H:i:s");



$converted_time_1 = date("Y-m-d H:i:s", strtotime($time_now . " -90 days"));

$converted_time_2 = date("Y-m-d H:i:s", strtotime($time_now . " -60 days"));

$converted_time_3 = date("Y-m-d H:i:s", strtotime($time_now . " -30 days"));




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

$against_time_now = date("Y-m-d H:i:s");
$against_time_now = zone_conversion_date($against_time_now, $zone_from, $zone_to);


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




$server_time = zone_conversion_date($timevar, $zone_to, $zone_from);
// End All For Time Zone
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_state_taft = "SELECT * FROM `idsids_idsdms`.`states` WHERE `states`.`state_abrv` = '$dealer_state'";
$dealer_state_taft = mysqli_query($idsconnection_mysqli, $query_dealer_state_taft);
$row_dealer_state_taft = mysqli_fetch_assoc($dealer_state_taft);
$totalRows_dealer_state_taft = mysqli_num_rows($dealer_state_taft);
$dealer_tavt_state_link = $row_dealer_state_taft['dealer_tavt_state_link'];


$zero_out = '0.00';
$settingCurrency = $row_userDets['settingCurrency'];
$settingDefaultDPpercntg = $row_userDets['settingDefaultDPpercntg'];
$settingDefaultPromoPriceOff = $row_userDets['settingDefaultPromoPriceOff'];

$settingDefaultAPR = $row_userDets['settingDefaultAPR'];
if(!$settingDefaultAPR || $settingDefaultAPR == NULL ){$settingDefaultAPR = '18.0'; }

$settingDefaultTerm = $row_userDets['settingDefaultTerm'];
if(!$settingDefaultTerm){$settingDefaultTerm = '36'; }

$settingSateSlsTax = $row_userDets['settingSateSlsTax'];
if(!$settingSateSlsTax){
	$settingSateSlsTax = 6.0;
}

$settingDocDlvryFee = $row_userDets['settingDocDlvryFee'];
if(!$settingDocDlvryFee){$settingDocDlvryFee = $zero_out; }


$settingTitleFee = $row_userDets['settingTitleFee'];
if(!$settingTitleFee){ $settingTitleFee = '55.00';};

$settingStateInspectnFee = $row_userDets['settingStateInspectnFee'];
if(!$settingStateInspectnFee){ $settingStateInspectnFee = '30.00';};


$licenseFee = ($settingStateInspectnFee + $settingTitleFee);
$licenseFee = number_format($licenseFee, 2);

$newmatrixcredit_vgoodcredit = $row_userDets['newmatrixcredit_vgoodcredit'];
$newmatrixcredit_jgoodcredit = $row_userDets['newmatrixcredit_jgoodcredit'];
$newmatrixcredit_faircredit = $row_userDets['newmatrixcredit_faircredit'];
$newmatrixcredit_poorcredit = $row_userDets['newmatrixcredit_poorcredit'];
$newmatrixcredit_subprime = $row_userDets['newmatrixcredit_subprime'];
$newmatrixcredit_unknown = $row_userDets['newmatrixcredit_unknown'];

$usedmatrixcredit_vgoodcredit = $row_userDets['usedmatrixcredit_vgoodcredit'];
$usedmatrixcredit_jgoodcredit = $row_userDets['usedmatrixcredit_jgoodcredit'];
$usedmatrixcredit_faircredit = $row_userDets['usedmatrixcredit_faircredit'];
$usedmatrixcredit_poorcredit = $row_userDets['usedmatrixcredit_poorcredit'];
$usedmatrixcredit_subprime = $row_userDets['usedmatrixcredit_subprime'];
$usedmatrixcredit_unknown = $row_userDets['usedmatrixcredit_unknown'];

$usedmatrixcredit_fminimumprofit = $row_userDets['usedmatrixcredit_fminimumprofit'];
$usedmatrixcredit_bminimumprofit = $row_userDets['usedmatrixcredit_bminimumprofit'];

$newmatrixcredit_fminimumprofit = $row_userDets['newmatrixcredit_fminimumprofit'];
$newmatrixcredit_bminimumprofit = $row_userDets['newmatrixcredit_bminimumprofit'];

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

//	UPR Calculator To Get Monthly Payment.
function calcPmt($amount_tofinance, $interest_rate, $finance_months) {

$int = $interest_rate/1200;
$int1 = 1+$int;
$r1 = pow($int1, $finance_months);

$pmt = $amount_tofinance*($int*$r1)/($r1-1);

    return $pmt;

}



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_last_deal_number = "SELECT `deal_id`, `deal_token`, `deal_number` FROM `idsids_idsdms`.`deals_bydealer` WHERE `deals_bydealer`.`deal_dealerID` = '$did' ORDER BY `deal_number` DESC";
$last_deal_number = mysqli_query($idsconnection_mysqli, $query_last_deal_number);
$row_last_deal_number = mysqli_fetch_assoc($last_deal_number);
$totalRows_last_deal_number = mysqli_num_rows($last_deal_number);



$colname_find_sales_person = "-1";
if (isset($_GET['sid'])) {
  $colname_find_sales_person = $_GET['sid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_sales_person = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`salesperson_id` = '$colname_find_sales_person'";
$find_sales_person = mysqli_query($idsconnection_mysqli, $query_find_sales_person);
$row_find_sales_person = mysqli_fetch_assoc($find_sales_person);
$totalRows_find_sales_person = mysqli_num_rows($find_sales_person);
$sid = $row_find_sales_person['salesperson_id'];
$sales_person_name = $row_find_sales_person['salesperson_firstname'].' '.$row_find_sales_person['salesperson_lastname'];

$colname_dlrSlctBySsnDid = "-1";
if (isset($_SESSION['did'])) {
  $colname_dlrSlctBySsnDid = $_SESSION['did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_dlrSlctBySsnDid' LIMIT 1";
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_assoc($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_system_tasks = "SELECT * FROM `idsids_idsdms`.`options_task` ORDER BY `options_task`.`task_id` ASC";
$system_tasks = mysqli_query($idsconnection_mysqli, $query_system_tasks);
$row_system_tasks = mysqli_fetch_assoc($system_tasks);
$totalRows_system_tasks = mysqli_num_rows($system_tasks);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealertask = "SELECT * FROM `idsids_idsdms`.`dealers_tasks` WHERE `dealers_tasks`.`task_did` = '$did' ORDER BY `dealers_tasks`.`task_starttime_milli` DESC";
$find_dealertask = mysqli_query($idsconnection_mysqli, $query_find_dealertask);
$row_find_dealertask = mysqli_fetch_assoc($find_dealertask);
$totalRows_find_dealertask = mysqli_num_rows($find_dealertask);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealerapps = "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_did` = '$did' AND  `credit_app_fullblown`.`application_created_date` BETWEEN  '$converted_time_2' AND '$time_now' ORDER BY `credit_app_fullblown`.`credit_app_fullblown_id` DESC";
$find_dealerapps = mysqli_query($idsconnection_mysqli, $query_find_dealerapps);
$row_find_dealerapps = mysqli_fetch_assoc($find_dealerapps);
$totalRows_find_dealerapps = mysqli_num_rows($find_dealerapps);


$vstat=1;
if (isset($_GET['vstat'])) {
  $vstat = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['vstat']));
  
  if($vstat == '9'){$vstat_text = 'Sold'; $vstatus = "'9'";}
  elseif($vstat == '0'){ $vstat_text = 'Hold'; $vstatus = "'0'";}
  elseif($vstat == 'all'){$vstat_text = 'Hold, Live &amp; Sold'; $vstatus = "'9','1','0'"; }
  else{$vstat_text = 'Live';  $vstatus = "'1'"; }
  
  $vstatsql = "`vehicles`.`vlivestatus` IN ($vstatus)";
   
}else{$vstat_text = 'Live'; $vstatus = "'1'"; $vstatsql = "vehicles.vlivestatus IN ($vstatus)"; }
$query_LiveVehicles = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`did` = '$did' AND $vstatsql ORDER BY `vehicles`.`created_at` DESC ";
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles);

$colname_find_vehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vid` = '$colname_find_vehicle' AND `vehicles`.`did` = '$did'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);


$vid = $row_find_vehicle['vid'];
$vlivestatus = $row_find_vehicle['vlivestatus'];
$vstockno = $row_find_vehicle['vstockno'];
$vyear = $row_find_vehicle['vyear'];
$vmake = $row_find_vehicle['vmake'];
$vmodel = $row_find_vehicle['vmodel'];
$vtrim = $row_find_vehicle['vtrim'];
$vvin = $row_find_vehicle['vvin'];
$vcondition = $row_find_vehicle['vcondition'];

$vmileage = $row_find_vehicle['vmileage'];
$vrprice = $row_find_vehicle['vrprice'];
$vdprice = $row_find_vehicle['vdprice'];
$vthubmnail_file_path = $row_find_vehicle['vthubmnail_file_path'];


$colname_find_vehicle_photos = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle_photos = $_GET['vid'];
}
$query_find_vehicle_photos = "SELECT * FROM `idsids_idsdms`.`vehicle_photos` WHERE `vehicle_photos`.`dealer_id` = '$did' AND `vehicle_photos`.`vehicle_id` = '$colname_find_vehicle_photos' ORDER BY `vehicle_photos`.`sort_orderno` ASC, `vehicle_photos`.`created_at` DESC";
$find_vehicle_photos = mysqli_query($idsconnection_mysqli, $query_find_vehicle_photos);
$row_find_vehicle_photos = mysqli_fetch_assoc($find_vehicle_photos);
$totalRows_find_vehicle_photos = mysqli_num_rows($find_vehicle_photos);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_vehiclesOnHld = "SELECT `vehicles`.`vlivestatus`, `vehicles`.`vid`,
    (SELECT COUNT(*) FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vlivestatus` = '0' AND `vehicles`.`did` = '$did') as HOLD,
    (SELECT COUNT(*) FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vlivestatus` = '1' AND `vehicles`.`did` = '$did') as LIVE,
    (SELECT COUNT(*) FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vlivestatus` = '3' AND `vehicles`.`did` = '$did') as AUCTION,
    (SELECT COUNT(*) FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vlivestatus` = '9' AND `vehicles`.`did` = '$did') as SOLD
FROM `idsids_idsdms`.`vehicles`  GROUP BY `vehicles`.`vid`";
//FROM `idsids_idsdms`.`vehicles`  GROUP BY `vehicles`.`vlivestatus`";
$vehiclesOnHld = mysqli_query($idsconnection_mysqli, $query_vehiclesOnHld);
$row_vehiclesOnHld = mysqli_fetch_assoc($vehiclesOnHld);
$totalRows_vehiclesOnHld = mysqli_num_rows($vehiclesOnHld);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_carYears = "SELECT * FROM `idsids_idsdms`.`auto_years` ORDER BY `auto_years`.`year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_assoc($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_customer_leads = "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leads`.`cust_dealer_id` = '$did' AND  `cust_leads`.`cust_lead_created_at` BETWEEN  '$converted_time_2' AND '$time_now' ORDER BY `cust_leads`.`cust_leadid` DESC";
$customer_leads = mysqli_query($idsconnection_mysqli, $query_customer_leads);
$row_customer_leads = mysqli_fetch_assoc($customer_leads);
$totalRows_customer_leads = mysqli_num_rows($customer_leads);

// We need to run lead count of how many leads unread.
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_find_unreadleads = "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leads`.`cust_dealer_id` = '$did' AND `cust_leads`.`cust_seenbydlr` = '0' AND  `cust_leads`.`cust_lead_created_at` BETWEEN  '$converted_time_2' AND '$time_now' ORDER BY `cust_leads`.`cust_leadid`";
$find_unreadleads = mysqli_query($idsconnection_mysqli, $query_find_unreadleads);
$row_find_unreadleads = mysqli_fetch_assoc($find_unreadleads);
$totalRows_find_unreadleads = mysqli_num_rows($find_unreadleads);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_fb_users = "SELECT * FROM `idsids_idsdms`.`fbuserprofiles` WHERE `fbuserprofiles`.`fbuser_primary_did` = '$did' ORDER BY `fbuserprofiles`.`fbuser_id` DESC";
$fb_users = mysqli_query($idsconnection_mysqli, $query_fb_users);
$row_fb_users = mysqli_fetch_assoc($fb_users);
$totalRows_fb_users = mysqli_num_rows($fb_users);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_true_salesperson = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`main_dealerid` = '$did' AND  `sales_person`.`acct_status` = '1' ORDER BY `sales_person`.`salesperson_firstname` ASC";
$true_salesperson = mysqli_query($idsconnection_mysqli, $query_true_salesperson);
$row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
$totalRows_true_salesperson = mysqli_num_rows($true_salesperson);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_true_salesperson2 = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`main_dealerid` = '$did' AND  `sales_person`.`acct_status` = '1' ORDER BY `sales_person`.`salesperson_firstname` ASC";
$true_salesperson2 = mysqli_query($idsconnection_mysqli, $query_true_salesperson2);
$row_true_salesperson2 = mysqli_fetch_assoc($true_salesperson2);
$totalRows_true_salesperson2 = mysqli_num_rows($true_salesperson2);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_managers = "SELECT * FROM `idsids_idsdms`.`manager_person` WHERE `manager_person`.`dealer_id` = '$did' AND `manager_person`.`acct_status` = '1' ORDER BY `manager_person`.`manager_lastname` ASC";
$managers = mysqli_query($idsconnection_mysqli, $query_managers);
$row_managers = mysqli_fetch_assoc($managers);
$totalRows_managers = mysqli_num_rows($managers);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_manager_nav = "SELECT * FROM `idsids_idsdms`.`manager_person` WHERE `manager_person`.`dealer_id` = '$did' AND `manager_person`.`acct_status` = '1' ORDER BY `manager_person`.`manager_lastname` ASC";
$manager_nav = mysqli_query($idsconnection_mysqli, $query_manager_nav);
$row_manager_nav = mysqli_fetch_assoc($manager_nav);
$totalRows_manager_nav = mysqli_num_rows($manager_nav);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_acct_rep_nav = "SELECT * FROM `idsids_idsdms`.`account_person` WHERE `account_person`.`dealer_id` = '$did' ORDER BY `account_person`.`account_lastname` ASC";
$acct_rep_nav = mysqli_query($idsconnection_mysqli, $query_acct_rep_nav);
$row_acct_rep_nav = mysqli_fetch_assoc($acct_rep_nav);
$totalRows_acct_rep_nav = mysqli_num_rows($acct_rep_nav);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

$query_repair_shops = "SELECT * FROM `idsids_idsdms`.`repair_shops` WHERE `repair_shops`.`repairshops_main_did` = '$did' ORDER BY `repair_shops`.`repairshops_company_name` ASC";
$repair_shops = mysqli_query($idsconnection_mysqli, $query_repair_shops);
$row_repair_shops = mysqli_fetch_assoc($repair_shops);
$totalRows_repair_shops = mysqli_num_rows($repair_shops);



?>
<?php 
/////Definitions


$dcompany = $row_dlrSlctBySsnDid['company'];
$websturl = $row_dlrSlctBySsnDid['website'];
$dname = $row_dlrSlctBySsnDid['contact'];
$demail = $row_dlrSlctBySsnDid['email'];
$dphone = $row_dlrSlctBySsnDid['contact_phone'];
$daddr = $row_dlrSlctBySsnDid['address'];
$dstate = $row_dlrSlctBySsnDid['state'];
$dcity = $row_dlrSlctBySsnDid['city'];
$dzip = $row_dlrSlctBySsnDid['zip'];
$dstorephone = $row_dlrSlctBySsnDid['phone'];
$dstorefax = $row_dlrSlctBySsnDid['fax'];
$dslogan = $row_dlrSlctBySsnDid['slogan'];
$ddisclaim = $row_dlrSlctBySsnDid['disclaimer'];
$mapurl = $row_dlrSlctBySsnDid['mapurl'];
$financenm = $row_dlrSlctBySsnDid['finance'];
$financephn = $row_dlrSlctBySsnDid['finance_contact'];
$intrsalesnm = $row_dlrSlctBySsnDid['sales'];
$intrsalesphn = $row_dlrSlctBySsnDid['sales_contact'];



// The Current Page Viewing or when db_logged in is present

$onpage_current = $_SERVER['PHP_SELF'];
$onpage_current = str_replace('/idscrm/dealers/', '', $onpage_current);



function showphoto($cvid){

global $did;
global $idsconnection_mysqli;
global $database_idsconnection;

			//$cvid = $row_customer_leads['customer_vehicles_id'];
			if(!$cvid) return;
			mysqli_select_db($idsconnection_mysqli, $database_idsconnection);

			$findexisting = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vid` = '$cvid' AND  `vehicles`.`did` = '$did'";
			$findmyresult = mysqli_query($idsconnection_mysqli, $findexisting);
			$vrow = mysqli_fetch_array($findmyresult);
			$vid = $vrow['vid'];

			if(!$vrow['vid']){
				
				echo '';
				
			}else{
					$vstatus = $vrow['vlivestatus'];
					/*
					echo $vrow['vyear'].' ';																								
					echo $vrow['vmake'].' ';												
					echo $vrow['vmake'].' ';
					echo $vrow['vmodel'].' ';
					echo $vrow['vtrim'].' ';					
					echo '<br>';
					
					*/
					$vphoto = $vrow['vthubmnail_file_path'];

                $photo_file_path = str_replace('../', '', $vphoto);
                $photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
                $photo_openurl = "https://images.autocitymag.com/".$photo_file_path;

					
					if(!$vphoto){
					echo '';
					}else{
					echo '<br>';
					//echo "<a class='fancybox' href='inventory.edit.php?vid=$vid'><img class='thumbnail' src='$photo_openurl' width='120px' ></a>";
					echo "<div><a class='fancybox' href='$photo_openurl'><img class='thumbnail' src='$photo_openurl' width='120px' /></a></div>";
				
				if ($vstatus == 0) {$vstatus_txt = "ON HOLD!";}elseif($vstatus == 1) { $vstatus_txt = "LIVE!";}elseif ($vstatus == 9) {	$vstatus_txt =  "SOLD!"; }else { $vstatus_txt =  " ";}
				
				echo '<div align="center">'.$vstatus_txt.'</div>';
				
			}

					
			}
			
			
mysqli_free_result($findmyresult);
return;

}


function created_at($created_at){

			$time_stamp = strtotime($created_at);
			$date_format=date("M d - H:i",$time_stamp);
			//$created_at = $date_format;
			echo $date_format;
			return;
}

?>
<?php
include("../Libary/sessioncookies.php");
include("../Libary/token-generator.php");

// Formats a phone number as (xxx) xxx-xxxx or xxx-xxxx depending on the length.
function format_phone($phone)
{
  $phone = preg_replace("/[^0-9]/", '', $phone);
 
  if (strlen($phone) == 7)
    return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
  elseif (strlen($phone) == 10)
    return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
  else
    return $phone;
}


function runTagsplit($tagsplit){

$voptionsArrays = preg_split("/,/", "$tagsplit");
$voptionsCount = count($voptionsArrays);

//print_r($voptionsArrays);
//$voption1 = $voptionsArrays['0'];

$voption1 = $voptionsArrays['0'];

	for($i=0;$i<count($voptionsArrays); $i++) {
        
	echo "<li><a href=''>". $voptionsArrays["$i"].'</a></li>'; 
    
 	} 
	//echo $i;
 
	//return $tagsplit;
	return;
}


?>
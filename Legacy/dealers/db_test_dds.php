<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/idschatconnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

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
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM dealers WHERE email = ''";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere

$colname_dlrSlctBySsnDid = "-1";
if (isset($_SESSION['did'])) {
  $colname_dlrSlctBySsnDid = $_SESSION['did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid =  "SELECT * FROM dealers WHERE id = ".$did."";;
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_assoc($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);

$colname_LiveVehicles = "-1";
if (isset($_SERVER['did'])) {
  $colname_LiveVehicles = $_SERVER['did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_makeids = "SELECT * FROM car_make";
$makeids = mysqli_query($idsconnection_mysqli, $query_makeids);
$row_makeids = mysqli_fetch_assoc($makeids);
$totalRows_makeids = mysqli_num_rows($makeids);
$vmakeid = $row_makeids['make_id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles = "SELECT * FROM vehicles, car_model WHERE vehicles.vmodelid = car_model.id AND vehicles.did = '$did' AND vehicles.vlivestatus = '1' ORDER BY vehicles.created_at DESC ";
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles);

$colname_find_vehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle =  "SELECT * FROM vehicles WHERE vid = '$colname_find_vehicle' AND did = '$did'";
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vehiclesOnHld = "SELECT * FROM vehicles WHERE vehicles.vlivestatus = '0' ORDER BY vehicles.created_at DESC  ";
$vehiclesOnHld = mysqli_query($idsconnection_mysqli, $query_vehiclesOnHld);
$row_vehiclesOnHld = mysqli_fetch_assoc($vehiclesOnHld);
$totalRows_vehiclesOnHld = mysqli_num_rows($vehiclesOnHld);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM `auto_years` ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_assoc($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM `car_make` ORDER BY `car_make` ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_customer_leads = "SELECT * FROM cust_leads WHERE cust_dealer_id = $did ORDER BY cust_leadid DESC";
$customer_leads = mysqli_query($idsconnection_mysqli, $query_customer_leads);
$row_customer_leads = mysqli_fetch_assoc($customer_leads);
$totalRows_customer_leads = mysqli_num_rows($customer_leads);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fb_users = "SELECT * FROM fbuserprofiles WHERE fbuser_primary_did = $did ORDER BY fbuser_id DESC";
$fb_users = mysqli_query($idsconnection_mysqli, $query_fb_users);
$row_fb_users = mysqli_fetch_assoc($fb_users);
$totalRows_fb_users = mysqli_num_rows($fb_users);

$colname_find_vehicle_photos = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle_photos = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle_photos =  "SELECT * FROM vehicle_photos WHERE vehicle_id = '$colname_find_vehicle_photos' ORDER BY sort_orderno ASC";
$find_vehicle_photos = mysqli_query($idsconnection_mysqli, $query_find_vehicle_photos);
$row_find_vehicle_photos = mysqli_fetch_assoc($find_vehicle_photos);
$totalRows_find_vehicle_photos = mysqli_num_rows($find_vehicle_photos);

$colname_find_vehicle_photo = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle_photo = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle_photo =  "SELECT * FROM vehicle_photos WHERE vehicle_id = ' $colname_find_vehicle_photo' ORDER BY sort_orderno ASC";
$find_vehicle_photo = mysqli_query($idsconnection_mysqli, $query_find_vehicle_photo);
$row_find_vehicle_photo = mysqli_fetch_assoc($find_vehicle_photo);
$totalRows_find_vehicle_photo = mysqli_num_rows($find_vehicle_photo);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_assoc($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_transm = "SELECT DISTINCT `vehicles`.`vtransm` FROM vehicles WHERE `vehicles`.`vtransm` not IN ('NULL')";
$distinct_transm = mysqli_query($idsconnection_mysqli, $query_distinct_transm);
$row_distinct_transm = mysqli_fetch_assoc($distinct_transm);
$totalRows_distinct_transm = mysqli_num_rows($distinct_transm);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_bodystyles = "SELECT * FROM body_styles ORDER BY body_style_name ASC";
$query_bodystyles = mysqli_query($idsconnection_mysqli, $query_query_bodystyles);
$row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
$totalRows_query_bodystyles = mysqli_num_rows($query_bodystyles);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_found_vehicle = "SELECT * FROM vehicles WHERE vvin = ''";
$found_vehicle = mysqli_query($idsconnection_mysqli, $query_found_vehicle);
$row_found_vehicle = mysqli_fetch_assoc($found_vehicle);
$totalRows_found_vehicle = mysqli_num_rows($found_vehicle);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_system_tasks = "SELECT * FROM options_task ORDER BY task_id ASC";
$system_tasks = mysqli_query($idsconnection_mysqli, $query_system_tasks);
$row_system_tasks = mysqli_fetch_assoc($system_tasks);
$totalRows_system_tasks = mysqli_num_rows($system_tasks);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealertask = "SELECT * FROM dealers_tasks WHERE task_did = $did ORDER BY task_starttime_mili DESC";
$find_dealertask = mysqli_query($idsconnection_mysqli, $query_find_dealertask);
$row_find_dealertask = mysqli_fetch_assoc($find_dealertask);
$totalRows_find_dealertask = mysqli_num_rows($find_dealertask);

$colname_find_singledealertask = "-1";
if (isset($_GET['task_token'])) {
  $colname_find_singledealertask = $_GET['task_token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singledealertask =  "SELECT * FROM dealers_tasks WHERE task_token = '$colname_find_singledealertask'";
$find_singledealertask = mysqli_query($idsconnection_mysqli, $query_find_singledealertask);
$row_find_singledealertask = mysqli_fetch_assoc($find_singledealertask);
$totalRows_find_singledealertask = mysqli_num_rows($find_singledealertask);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_chats = "SELECT dealer_chat, dealer_chat_display FROM dealers";
$dealer_chats = mysqli_query($idsconnection_mysqli, $query_dealer_chats);
$row_dealer_chats = mysqli_fetch_assoc($dealer_chats);
$totalRows_dealer_chats = mysqli_num_rows($dealer_chats);

mysql_select_db($database_idschatconnection, $idschatconnection);
$query_find_craftydealer = "SELECT * FROM livehelp_users WHERE email = '$dealer_email'";
$find_craftydealer = mysqli_query($idsconnection_mysqli, $query_find_craftydealer, $idschatconnection);
$row_find_craftydealer = mysqli_fetch_assoc($find_craftydealer);
$totalRows_find_craftydealer = mysqli_num_rows($find_craftydealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_countAllinventory = "SELECT  vehicles.vid, vehicles.did, vehicles.vlivestatus, count( * ) AS total_live, vehicles.vmodel FROM vehicles WHERE vehicles.did = $did AND vehicles.vlivestatus = '1' group by vehicles.vyear
UNION
SELECT vehicles.vid, vehicles.did, vehicles.vlivestatus, count( * ) AS total_hold, vehicles.vmodel FROM vehicles WHERE vehicles.did = $did AND vehicles.vlivestatus = '0' group by vehicles.vyear
";
$countAllinventory = mysqli_query($idsconnection_mysqli, $query_countAllinventory);
$row_countAllinventory = mysqli_fetch_assoc($countAllinventory);
$totalRows_countAllinventory = mysqli_num_rows($countAllinventory);
$found_vid = $row_found_vehicle['vid'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_departments = "SELECT * FROM dealer_depts WHERE dept_did = '$thisdid' AND dealer_depts.dept_status = '1' ORDER BY dept_name ASC";
$qry_departments = mysqli_query($idsconnection_mysqli, $query_qry_departments);
$row_qry_departments = mysqli_fetch_assoc($qry_departments);
$totalRows_qry_departments = mysqli_num_rows($qry_departments);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_nav_depts = "SELECT * FROM dealer_depts WHERE dept_did = '$thisdid' AND dealer_depts.dept_status = '1' ORDER BY dept_name ASC";
$nav_depts = mysqli_query($idsconnection_mysqli, $query_nav_depts);
$row_nav_depts = mysqli_fetch_assoc($nav_depts);
$totalRows_nav_depts = mysqli_num_rows($nav_depts);

$colname_query_dept = "-1";
if (isset($_GET['dept'])) {
  $colname_query_dept = $_GET['dept'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_dept =  "SELECT * FROM dealer_depts WHERE dept_link = '$colname_query_dept' AND dealer_depts.dept_did = '$thisdid'";
$query_dept = mysqli_query($idsconnection_mysqli, $query_query_dept);
$row_query_dept = mysqli_fetch_assoc($query_dept);
$totalRows_query_dept = mysqli_num_rows($query_dept);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM income_interval_options";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salperson_nav = "SELECT * FROM sales_person WHERE main_dealerid = '$did' AND  acct_status = '1' ORDER BY salesperson_firstname ASC";
$salperson_nav = mysqli_query($idsconnection_mysqli, $query_salperson_nav);
$row_salperson_nav = mysqli_fetch_assoc($salperson_nav);
$totalRows_salperson_nav = mysqli_num_rows($salperson_nav);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_true_salesperson = "SELECT * FROM sales_person WHERE main_dealerid = '$did' AND  acct_status = '1' ORDER BY salesperson_firstname ASC";
$true_salesperson = mysqli_query($idsconnection_mysqli, $query_true_salesperson);
$row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
$totalRows_true_salesperson = mysqli_num_rows($true_salesperson);


$colname_find_sales_person = "-1";
if (isset($_GET['s'])) {
  $colname_find_sales_person = $_GET['s'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_sales_person =  "SELECT * FROM sales_person WHERE salesperson_id = '$colname_find_sales_person'";
$find_sales_person = mysqli_query($idsconnection_mysqli, $query_find_sales_person);
$row_find_sales_person = mysqli_fetch_assoc($find_sales_person);
$totalRows_find_sales_person = mysqli_num_rows($find_sales_person);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_random_salesperson = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`main_dealerid` = '$did' AND   `sales_person`.`acct_status` = '1' ORDER BY RAND() limit 1";
$random_salesperson = mysqli_query($idsconnection_mysqli, $query_random_salesperson);
$row_random_salesperson = mysqli_fetch_assoc($random_salesperson);
$totalRows_random_salesperson = mysqli_num_rows($random_salesperson);
$sidr = $row_random_salesperson['salesperson_id'];

$colname_lead_recover = "-1";
if (isset($_GET['token'])) {
  $colname_lead_recover = mysql_real_escape_string($_GET['token']);
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lead_recover =  "SELECT * FROM cust_leads WHERE cust_lead_token = '$colname_lead_recover' ORDER BY cust_leadid ASC LIMIT 1";
$lead_recover = mysqli_query($idsconnection_mysqli, $query_lead_recover);
$row_lead_recover = mysqli_fetch_assoc($lead_recover);
$totalRows_lead_recover = mysqli_num_rows($lead_recover);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_manager_nav = "SELECT * FROM manager_person WHERE dealer_id = '$did' AND acct_status = '1' ORDER BY manager_id ASC";
$manager_nav = mysqli_query($idsconnection_mysqli, $query_manager_nav);
$row_manager_nav = mysqli_fetch_assoc($manager_nav);
$totalRows_manager_nav = mysqli_num_rows($manager_nav);

$colname_find_manager = "-1";
if (isset($_GET['manager_id'])) {
  $colname_find_manager = $_GET['manager_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_manager =  "SELECT * FROM manager_person WHERE dealer_id = '$did' AND manager_id = '$colname_find_manager '";
$find_manager = mysqli_query($idsconnection_mysqli, $query_find_manager);
$row_find_manager = mysqli_fetch_assoc($find_manager);
$totalRows_find_manager = mysqli_num_rows($find_manager);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_acct_rep_nav = "SELECT * FROM account_person WHERE dealer_id = '$did' ORDER BY account_lastname ASC";
$acct_rep_nav = mysqli_query($idsconnection_mysqli, $query_acct_rep_nav);
$row_acct_rep_nav = mysqli_fetch_assoc($acct_rep_nav);
$totalRows_acct_rep_nav = mysqli_num_rows($acct_rep_nav);

$colname_find_acct_rep = "-1";
if (isset($_GET['account_perid'])) {
  $colname_find_acct_rep = $_GET['account_perid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_acct_rep =  "SELECT * FROM account_person WHERE dealer_id = '$did' AND account_person_id = '$colname_find_acct_rep'";
$find_acct_rep = mysqli_query($idsconnection_mysqli, $query_find_acct_rep);
$row_find_acct_rep = mysqli_fetch_assoc($find_acct_rep);
$totalRows_find_acct_rep = mysqli_num_rows($find_acct_rep);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_repair_shops = "SELECT * FROM repair_shops WHERE repairshops_main_did = $did ORDER BY repairshops_company_name ASC";
$repair_shops = mysqli_query($idsconnection_mysqli, $query_repair_shops);
$row_repair_shops = mysqli_fetch_assoc($repair_shops);
$totalRows_repair_shops = mysqli_num_rows($repair_shops);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fetch_dealer_news = "SELECT dealers_news.dlr_news_id, dealers_news.dlr_news_did, dealers_news.dlr_news_team_id, dealers_news.dlr_news_status, dealers_news.dlr_news_email, dealers_news.dlr_news_body, dealers_news.dlr_news_created_at_milli, dealers_news.dlr_news_creatd_at FROM dealers_news WHERE dealers_news.dlr_news_did ORDER BY dealers_news.dlr_news_creatd_at DESC";
$fetch_dealer_news = mysqli_query($idsconnection_mysqli, $query_fetch_dealer_news);
$row_fetch_dealer_news = mysqli_fetch_assoc($fetch_dealer_news);
$totalRows_fetch_dealer_news = mysqli_num_rows($fetch_dealer_news);

$colname_fetch_dealer_news_responses = "-1";
if (isset($_GET['response_news_id'])) {
  $colname_fetch_dealer_news_responses = $_GET['response_news_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fetch_dealer_news_responses =  "SELECT * FROM dealers_news_response WHERE dlr_news_response_news_id = '$colname_fetch_dealer_news_responses' ORDER BY dlr_news_response_created_at DESC";
$fetch_dealer_news_responses = mysqli_query($idsconnection_mysqli, $query_fetch_dealer_news_responses);
$row_fetch_dealer_news_responses = mysqli_fetch_assoc($fetch_dealer_news_responses);
$totalRows_fetch_dealer_news_responses = mysqli_num_rows($fetch_dealer_news_responses);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_cust_leadnotes = "SELECT * FROM cust_lead_notes WHERE lead_cust_leadid = $lead_cust_leadid ORDER BY lead_note_created ASC";
$query_cust_leadnotes = mysqli_query($idsconnection_mysqli, $query_query_cust_leadnotes);
$row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes);
$totalRows_query_cust_leadnotes = mysqli_num_rows($query_cust_leadnotes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_options_years = "SELECT * FROM year_options WHERE year_options.year_id ASC";
$options_years = mysqli_query($idsconnection_mysqli, $query_options_years);
$row_options_years = mysqli_fetch_assoc($options_years);
$totalRows_options_years = mysqli_num_rows($options_years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_options_months = "SELECT * FROM months_options ORDER BY months_options.month_id ASC";
$options_months = mysqli_query($idsconnection_mysqli, $query_options_months);
$row_options_months = mysqli_fetch_assoc($options_months);
$totalRows_options_months = mysqli_num_rows($options_months);

$colname_view_thislead = "-1";
if (isset($_GET['leadid'])) {
  $colname_view_thislead = $_GET['leadid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_view_thislead =  "SELECT * FROM cust_leads WHERE cust_leadid = ''";
$view_thislead = mysqli_query($idsconnection_mysqli, $query_view_thislead);
$row_view_thislead = mysqli_fetch_assoc($view_thislead);
$totalRows_view_thislead = mysqli_num_rows($view_thislead);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_timezones = "SELECT * FROM `idsids_idsdms`.`calendar|timezones` WHERE timezoneStatus = 1 ORDER BY `UTC offset` ASC";
$query_timezones = mysqli_query($idsconnection_mysqli, $query_query_timezones);
$row_query_timezones = mysqli_fetch_assoc($query_timezones);
$totalRows_query_timezones = mysqli_num_rows($query_timezones);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mobile_carriers = "SELECT * FROM `idsids_idsdms`.`mobile_carriers` ORDER BY `carrier_label` ASC";
$mobile_carriers = mysqli_query($idsconnection_mysqli, $query_mobile_carriers);
$row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers);
$totalRows_mobile_carriers = mysqli_num_rows($mobile_carriers);

$colname_view_thistickettoken = "-1";
if (isset($_GET['ticket_token'])) {
  $colname_view_thistickettoken = $_GET['ticket_token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_support_ticket =   "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr` WHERE `ticket_submit_dlr`.`did` = '$did' AND `ticket_token` = '$colname_view_thistickettoken'";
$dlr_support_ticket = mysqli_query($idsconnection_mysqli, $query_dlr_support_ticket);
$row_dlr_support_ticket = mysqli_fetch_assoc($dlr_support_ticket);
$totalRows_dlr_support_ticket = mysqli_num_rows($dlr_support_ticket);

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



function showphoto ($cvid){


			//$cvid = $row_customer_leads['customer_vehicles_id'];

			$findexisting = "SELECT * FROM vehicles WHERE `vid` = '".$cvid."'";
			$findmyresult = mysqli_query($idsconnection_mysqli, $findexisting);
			$vrow = mysql_fetch_array($findmyresult);

			if(!$vrow['vid']){
				
				echo '';
				
			}else{
					$vstatus = $vrow['vlivestatus'];
					echo $vrow['vyear'].' ';																								
					echo $vrow['vmake'].' ';												
					echo $vrow['vmake'].' ';
					echo $vrow['vmodel'].' ';
					echo $vrow['vtrim'].' ';					
					echo '<br>';
					$vphoto=$vrow['vthubmnail_file_path'];
					if(!$vphoto){
					echo '';
					}else{
					echo '<br>';
					echo "<img src='$vphoto' width='40px' >";
					echo '<br>';
					
				if ($vstatus == 0) {
					echo "ON HOLD!";
				}
				if ($vstatus == 1) {
					echo "LIVE!";
				}

				if ($vstatus == 9) {
					echo "SOLD!";
				}

				else { 
					echo " ";
				}
				
				
			}

					
			}
			
			
									

}



?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" name="formTest" id="formTest">
  <p>&nbsp;</p>
  <label for="states">States:</label>
  <select name="states" id="states">
    <?php
do {  
?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDets['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
    <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
  </select>
                                        
                                        <div class="form-group">
                                          <label for="vmake" class="col-sm-10 control-label">Make: </label><br />
                                            <select name="vmake" id="vmake" class="form-control">
                                              <option value="">Select Make</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_vmakes['car_make']?>"><?php echo $row_vmakes['car_make']?></option>
                                              <?php
} while ($row_vmakes = mysqli_fetch_assoc($vmakes));
  $rows = mysqli_num_rows($vmakes);
  if($rows > 0) {
      mysqli_data_seek($vmakes, 0);
	  $row_vmakes = mysqli_fetch_assoc($vmakes);
  }
?>
                                            </select>
  
  </div>
  <p>                                         <select id="vfueltype" name="vfueltype" class="form-control">
<option value="" <?php if (!(strcmp("", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Select Fuel Type</option>
<option value="Gasoline" <?php if (!(strcmp("Gasoline", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Gasoline</option>
<option value="Diesel" <?php if (!(strcmp("Diesel", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Diesel</option>
<option value="Hybrid" <?php if (!(strcmp("Hybrid", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Hybrid</option>
<option value="Electric" <?php if (!(strcmp("Electric", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Electric</option>

                                         </select>
</p>
    
  <p>                                         <select id="vcylinders" name="vcylinders" class="form-control">
<option value="" <?php if (!(strcmp("", $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>Select Cylinders</option>
<option value="3" <?php if (!(strcmp(3, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>3 Cylinders</option>
<option value="4" <?php if (!(strcmp(4, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>4 Cylinders</option>
<option value="6" <?php if (!(strcmp(6, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>6 Cylinders</option>
<option value="8" <?php if (!(strcmp(8, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>8 Cylinders</option>
<option value="10" <?php if (!(strcmp(10, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>10 Cylinders</option>
<option value="12" <?php if (!(strcmp(12, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>12 Cylinders</option>
                                         </select>
</p>
  <p>
    <label for="sales_person">Sales Team Person</label>
    <select name="sales_person" id="sales_person">
      <?php
do {  
?>
      <option value="<?php echo $row_true_salesperson['salesperson_id']?>"><?php echo $row_true_salesperson['salesperson_firstname']?></option>
      <?php
} while ($row_true_salesperson = mysqli_fetch_assoc($true_salesperson));
  $rows = mysqli_num_rows($true_salesperson);
  if($rows > 0) {
      mysqli_data_seek($true_salesperson, 0);
	  $row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
  }
?>
    </select>
  </p>
  <p>
    <label for="account_person">Account Persons</label>
    <select name="account_person" id="account_person">
      <?php
do {  
?>
      <option value="<?php echo $row_acct_rep_nav['account_person_id']?>"><?php echo $row_acct_rep_nav['account_firstname']?></option>
      <?php
} while ($row_acct_rep_nav = mysqli_fetch_assoc($acct_rep_nav));
  $rows = mysqli_num_rows($acct_rep_nav);
  if($rows > 0) {
      mysqli_data_seek($acct_rep_nav, 0);
	  $row_acct_rep_nav = mysqli_fetch_assoc($acct_rep_nav);
  }
?>
    </select>
  </p>
  <p>
    <label for="manger_person">Managers:</label>
    <select name="manger_person" id="manger_person">
      <?php
do {  
?>
      <option value="<?php echo $row_manager_nav['manager_id']?>"><?php echo $row_manager_nav['manager_firstname']?></option>
      <?php
} while ($row_manager_nav = mysqli_fetch_assoc($manager_nav));
  $rows = mysqli_num_rows($manager_nav);
  if($rows > 0) {
      mysqli_data_seek($manager_nav, 0);
	  $row_manager_nav = mysqli_fetch_assoc($manager_nav);
  }
?>
    </select>
  </p>
  <p>
    <label for="repair_shops">Repair Shops</label>
    <select name="repair_shops" id="repair_shops">
      <option value="0">Just Me</option>
      <?php
do {  
?>
      <option value="<?php echo $row_repair_shops['repairshops_id']?>"><?php echo $row_repair_shops['repairshops_company_name']?></option>
      <?php
} while ($row_repair_shops = mysqli_fetch_assoc($repair_shops));
  $rows = mysqli_num_rows($repair_shops);
  if($rows > 0) {
      mysqli_data_seek($repair_shops, 0);
	  $row_repair_shops = mysqli_fetch_assoc($repair_shops);
  }
?>
    </select>
  </p>
  <p>                                         <select id="cust_vbody" name="cust_vbody" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_view_thislead['cust_vbody']))) {echo "selected=\"selected\"";} ?>>Select Body Style</option>
    <?php
do {  
?>
<option value="<?php echo $row_query_bodystyles['body_style_name']?>"<?php if (!(strcmp($row_query_bodystyles['body_style_name'], $row_view_thislead['cust_vbody']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_bodystyles['body_style_name']?></option>
    <?php
} while ($row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles));
  $rows = mysqli_num_rows($query_bodystyles);
  if($rows > 0) {
      mysqli_data_seek($query_bodystyles, 0);
	  $row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
  }
?>
  </select>
</p>
  <p>                                
  <select name="vexterior_color" id="vexterior_color" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_find_vehicle['vecolor']))) {echo "selected=\"selected\"";} ?>>Select Color</option>
    <?php
do {  
?>
    <option value="<?php echo $row_colors_hex['color_hex']?>"<?php if (!(strcmp($row_colors_hex['color_hex'], $row_find_vehicle['vecolor']))) {echo "selected=\"selected\"";} ?>><?php echo $row_colors_hex['color_name']?></option>
    <?php
} while ($row_colors_hex = mysqli_fetch_assoc($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_assoc($colors_hex);
  }
?>
  </select>
</p>
  <p>
                 <select name="vinterior_color" id="vinterior_color" class="form-control">
                   <option value="" <?php if (!(strcmp("", $row_find_vehicle['vicolor']))) {echo "selected=\"selected\"";} ?>>Select Color</option>
                   <?php
do {  
?>
                   <option value="<?php echo $row_colors_hex['color_hex']?>"<?php if (!(strcmp($row_colors_hex['color_hex'], $row_find_vehicle['vicolor']))) {echo "selected=\"selected\"";} ?>><?php echo $row_colors_hex['color_name']?></option>
                   <?php
} while ($row_colors_hex = mysqli_fetch_assoc($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_assoc($colors_hex);
  }
?>
    </select>
</p>
  <p>
                  <select class="form-control m-b" id="vtransm"  name="vtransm">
                    <option value="" <?php if (!(strcmp("", $row_find_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>>Select Transmission</option>
                    <?php
do {  
?>
<option value="<?php echo $row_distinct_transm['vtransm']?>"<?php if (!(strcmp($row_distinct_transm['vtransm'], $row_find_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>><?php echo $row_distinct_transm['vtransm']?></option>
<?php
} while ($row_distinct_transm = mysqli_fetch_assoc($distinct_transm));
  $rows = mysqli_num_rows($distinct_transm);
  if($rows > 0) {
      mysqli_data_seek($distinct_transm, 0);
	  $row_distinct_transm = mysqli_fetch_assoc($distinct_transm);
  }
?>
    </select>

  </p>
  <p>&nbsp;</p>
  <p>
    <label for="mobile_carriers">Mobile Carriers</label>
    <select name="mobile_carriers" id="mobile_carriers">
      <option value="" <?php if (!(strcmp("", $row_userDets['country']))) {echo "selected=\"selected\"";} ?>>Select Carrier</option>
      <?php
do {  
?>
      <option value="<?php echo $row_mobile_carriers['carrier_id']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_id'], $row_userDets['country']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?></option>
      <?php
} while ($row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers));
  $rows = mysqli_num_rows($mobile_carriers);
  if($rows > 0) {
      mysqli_data_seek($mobile_carriers, 0);
	  $row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers);
  }
?>
    </select>
  </p>
  <p>
    <label for="time_zone">Time Zone</label>
    <select name="time_zone" id="time_zone">
      <option value="" <?php if (!(strcmp("", $row_userDets['location']))) {echo "selected=\"selected\"";} ?>>Select Timezone</option>
      <?php
do {  
?>
      <option value="<?php echo $row_query_timezones['timezone_id']?>"<?php if (!(strcmp($row_query_timezones['timezone_id'], $row_userDets['location']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_timezones['TimeZone']?></option>
      <?php
} while ($row_query_timezones = mysqli_fetch_assoc($query_timezones));
  $rows = mysqli_num_rows($query_timezones);
  if($rows > 0) {
      mysqli_data_seek($query_timezones, 0);
	  $row_query_timezones = mysqli_fetch_assoc($query_timezones);
  }
?>
    </select>
  </p>
  <p>&nbsp;</p>
  <p>
    <label for="title_name">Title:</label>
    <select name="title_name" id="title_name">
      <option value="" <?php if (!(strcmp("", $row_lead_recover['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Select</option>
      <option value="Mr." <?php if (!(strcmp("Mr.", $row_lead_recover['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
      <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_lead_recover['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
      <option value="Miss." <?php if (!(strcmp("Miss.", $row_lead_recover['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Miss.</option>
      <option value="Dr." <?php if (!(strcmp("Dr.", $row_lead_recover['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Dr.</option>
    </select>
  </p>
  <p>
  <select id="task_action" class="form-control m-b" name="task_action">
<option value="">Select Action</option>
<?php
do {  
?>
<option value="<?php echo $row_system_tasks['task_action']?>"><?php echo $row_system_tasks['task_label']?></option>
<?php
} while ($row_system_tasks = mysqli_fetch_assoc($system_tasks));
  $rows = mysqli_num_rows($system_tasks);
  if($rows > 0) {
      mysqli_data_seek($system_tasks, 0);
	  $row_system_tasks = mysqli_fetch_assoc($system_tasks);
  }
?>
  </select>
  </p>
  <p>
    <label>
      <input type="checkbox" name="delete_sortedvphotos" value="1234" id="delete_sortedvphotos_0">
      Photo 1234</label>
    <br>
    <label>
      <input type="checkbox" name="delete_sortedvphotos" value="1235" id="delete_sortedvphotos_1">
      Photo 1235</label>
    <br>
    <label>
      <input type="checkbox" name="delete_sortedvphotos" value="1236" id="delete_sortedvphotos_2">
      Photo 1236</label>
    <br>
  </p>
  <p>Tasks</p>
  <?php do { ?>
    <p><?php echo $row_find_dealertask['task_title']; ?></p>
    <?php } while ($row_find_dealertask = mysqli_fetch_assoc($find_dealertask)); ?>
<?php do { ?>
    
    <p>Live: <?php echo $row_countAllinventory['total_live']; ?> <?php //echo $row_countAllinventory['total_hold']; ?> <?php echo $row_countAllinventory['vlivestatus']; ?></p>
    
    <?php } while ($row_countAllinventory = mysqli_fetch_assoc($countAllinventory)); ?>
<p>Loop Custome Lead Notes</p>
<?php do { ?>
  <p><?php echo $row_query_cust_leadnotes['leadnote_id']; ?> <?php echo $row_query_cust_leadnotes['lead_note_nametext']; ?>  <?php echo $row_query_cust_leadnotes['lead_note_body']; ?><?php echo $row_query_cust_leadnotes['lead_note_created']; ?></p>
  <?php } while ($row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes)); ?>
<p>&nbsp;</p>
<p>                                    	<label class="checkbox-inline i-checks"> 
                                    		<input <?php if (!(strcmp($row_lead_recover['cust_close_range'],"Contacted"))) {echo "checked=\"checked\"";} ?> id="cust_close_status_0" type="checkbox" value="contacted"> Contacted </label>
                                        <label class="checkbox-inline i-checks"> 
                                        	<input id="cust_close_status_1" type="checkbox" value="storevisit"> Store Visit </label>
                                        <label class="checkbox-inline i-checks"> 
                                        	<input id="cust_close_status_2" type="checkbox" value="demo"> Demo </label>
                                        <label class="checkbox-inline i-checks"> 
                                        	<input id="cust_close_status_3" type="checkbox" value="writeup"> Write Up </label>
                                        <label class="checkbox-inline i-checks"> 
                                        	<input id="cust_close_status_4" type="checkbox" value="fi"> F&amp;I </label>
</p>
<p>&nbsp;</p>
<p>
  <label for="month_options">How Many Months?</label>
  <select name="month_options" id="month_options">
    <?php
do {  
?>
    <option value="<?php echo $row_options_months['month_value']?>"><?php echo $row_options_months['month_name']?></option>
    <?php
} while ($row_options_months = mysqli_fetch_assoc($options_months));
  $rows = mysqli_num_rows($options_months);
  if($rows > 0) {
      mysqli_data_seek($options_months, 0);
	  $row_options_months = mysqli_fetch_assoc($options_months);
  }
?>
  </select>
</p>
<p>&nbsp;</p>
<p>
  <label for="month_options">How Many Months Update?</label>
  <select name="month_options" id="month_options">
    <?php
do {  
?>
    <option value="<?php echo $row_options_months['month_value']?>"<?php if (!(strcmp($row_options_months['month_value'], $row_lead_recover['cust_home_live_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_options_months['month_name']?></option>
    <?php
} while ($row_options_months = mysqli_fetch_assoc($options_months));
  $rows = mysqli_num_rows($options_months);
  if($rows > 0) {
      mysqli_data_seek($options_months, 0);
	  $row_options_months = mysqli_fetch_assoc($options_months);
  }
?>
  </select>
</p>


<p>
  <label for="year_options">How Many Years?</label>
  <select name="year_options" id="year_options">
    <?php
do {  
?>
    <option value="<?php echo $row_options_years['year_value']?>"><?php echo $row_options_years['year_name']?></option>
    <?php
} while ($row_options_years = mysqli_fetch_assoc($options_years));
  $rows = mysqli_num_rows($options_years);
  if($rows > 0) {
      mysqli_data_seek($options_years, 0);
	  $row_options_years = mysqli_fetch_assoc($options_years);
  }
?>
  </select>
</p>
<p>&nbsp;</p>
<p>
  <label for="year_options">How Many Years Update?</label>
  <select name="year_options" id="year_options">
    <?php
do {  
?>
    <option value="<?php echo $row_options_years['year_value']?>"<?php if (!(strcmp($row_options_years['year_value'], $row_lead_recover['cust_home_live_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_options_years['year_name']?></option>
    <?php
} while ($row_options_years = mysqli_fetch_assoc($options_years));
  $rows = mysqli_num_rows($options_years);
  if($rows > 0) {
      mysqli_data_seek($options_years, 0);
	  $row_options_years = mysqli_fetch_assoc($options_years);
  }
?>
  </select>
</p>
<p>&nbsp;</p>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Sex:</label>

                                    <div class="col-sm-10"><label class="checkbox-inline"> <input <?php if (!(strcmp($row_view_thislead['cust_lead_sex'],"M"))) {echo "checked=\"checked\"";} ?> type="radio"  name="lead_sex" id="lead_sex_0" value="M">Male </label>
                                        <label class="checkbox-inline"> <input <?php if (!(strcmp($row_view_thislead['cust_lead_sex'],"F"))) {echo "checked=\"checked\"";} ?> type="radio"  name="lead_sex" id="lead_sex_1" value="F">Female </label>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>

<p>&nbsp;</p>
                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Other Income Frequency</label>
                                 	<div class="col-sm-10"><select id="cust_gross_other_income_frequency" class="form-control">
                                 	  <?php do {  ?>
                                 	  <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], $row_view_thislead['cust_gross_income_frequency']))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
                                 	  <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
                                    </select>
                                    </div>
                                 
                                 </div>

                                <div class="hr-line-dashed"></div>
<p>&nbsp;</p>
<p><input <?php if (!(strcmp($row_view_thislead['tradeYes'],"Y"))) {echo "checked=\"checked\"";} ?> id="tradeYes" class="form-control" type="checkbox" value="Y"></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</form>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

</body>
</html>
<?php
mysqli_free_result($userDets);

mysqli_free_result($find_vehicle_photos);

mysqli_free_result($find_vehicle_photo);

mysqli_free_result($found_vehicle);

mysqli_free_result($system_tasks);

mysqli_free_result($find_dealertask);

mysqli_free_result($find_singledealertask);

mysqli_free_result($dealer_chats);

mysqli_free_result($find_craftydealer);

mysqli_free_result($repair_shops);

mysqli_free_result($fetch_dealer_news);

mysqli_free_result($fetch_dealer_news_responses);

mysqli_free_result($query_cust_leadnotes);

mysqli_free_result($options_months);

mysqli_free_result($options_years);

mysqli_free_result($countAllinventory);

mysqli_free_result($view_thislead);

mysqli_free_result($query_timezones);

mysqli_free_result($mobile_carriers);

mysqli_free_result($dlr_support_ticket);
?>

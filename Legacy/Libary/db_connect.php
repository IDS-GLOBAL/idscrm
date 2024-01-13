<?php require_once('../Connections/idsconnection.php'); ?>
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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_url = "SELECT * FROM `idsids_idsdms`.dealers WHERE id = '60'";
$dealer_url = mysqli_query($idsconnection_mysqli, $query_dealer_url);
$row_dealer_url = mysqli_fetch_assoc($dealer_url);
$totalRows_dealer_url = mysqli_num_rows($dealer_url);
if($row_dealer_url['id']){$did=$row_dealer_url['id'];}else{$did=85;}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_countLiveInventory = "SELECT count( * ) as total_record FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = '1'";
$countLiveInventory = mysqli_query($idsconnection_mysqli, $query_countLiveInventory);
$row_countLiveInventory = mysqli_fetch_assoc($countLiveInventory);
$totalRows_countLiveInventory = mysqli_num_rows($countLiveInventory);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_vcondtions = "SELECT DISTINCT vehicles.vcondition FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = '1'";
$distinct_vcondtions = mysqli_query($idsconnection_mysqli, $query_distinct_vcondtions);
$row_distinct_vcondtions = mysqli_fetch_assoc($distinct_vcondtions);
$totalRows_distinct_vcondtions = mysqli_num_rows($distinct_vcondtions);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_2vcondtions = "SELECT DISTINCT vehicles.vcondition FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = '1'";
$distinct_2vcondtions = mysqli_query($idsconnection_mysqli, $query_distinct_2vcondtions);
$row_distinct_2vcondtions = mysqli_fetch_assoc($distinct_2vcondtions);
$totalRows_distinct_2vcondtions = mysqli_num_rows($distinct_2vcondtions);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_certifiedVehicles = "SELECT DISTINCT vehicles.vcertified FROM vehicles WHERE vehicles.vcertified = '1' AND vehicles.did = '$did'";
$certifiedVehicles = mysqli_query($idsconnection_mysqli, $query_certifiedVehicles);
$row_certifiedVehicles = mysqli_fetch_assoc($certifiedVehicles);
$totalRows_certifiedVehicles = mysqli_num_rows($certifiedVehicles);
$certified = $row_certifiedVehicles['vcertified'];
if($totalRows_certifiedVehicles > 0){ $certified = 'Certified';}else{$certified = '';}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_makes = "SELECT DISTINCT vehicles.vmake, COUNT(*) as Count  FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = '1' AND vmake not IN ('NULL') GROUP BY vmake ORDER BY vehicles.vmake ASC";
$distinct_makes = mysqli_query($idsconnection_mysqli, $query_distinct_makes);
$row_distinct_makes = mysqli_fetch_assoc($distinct_makes);
$totalRows_distinct_makes = mysqli_num_rows($distinct_makes);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_models = "SELECT DISTINCT vmodel, COUNT(*) as Count FROM vehicles WHERE  vehicles.did ='$did' AND vehicles.vlivestatus = '1' AND vmodel not IN ('NULL') GROUP BY vmodel ORDER BY vehicles.vmodel ASC";
$distinct_models = mysqli_query($idsconnection_mysqli, $query_distinct_models);
$row_distinct_models = mysqli_fetch_assoc($distinct_models);
$totalRows_distinct_models = mysqli_num_rows($distinct_models);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_years = "SELECT DISTINCT vyear, COUNT(*) as Count FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = '1' AND vyear not IN ('NULL') GROUP BY vyear ORDER BY vehicles.vyear DESC";
$distinct_years = mysqli_query($idsconnection_mysqli, $query_distinct_years);
$row_distinct_years = mysqli_fetch_assoc($distinct_years);
$totalRows_distinct_years = mysqli_num_rows($distinct_years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_bodystyles = "SELECT DISTINCT vbody, COUNT(*) as Count FROM vehicles WHERE vehicles.did = '$did' AND vehicles.vlivestatus = '1' AND vbody not IN ('NULL') GROUP BY vbody ORDER BY vehicles.vbody ASC  ";
$distinct_bodystyles = mysqli_query($idsconnection_mysqli, $query_distinct_bodystyles);
$row_distinct_bodystyles = mysqli_fetch_assoc($distinct_bodystyles);
$totalRows_distinct_bodystyles = mysqli_num_rows($distinct_bodystyles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_trades = "SELECT vehicles.`vstockno`, vehicles.`vid`, vehicles.`did`, vehicles.`vlivestatus`, vehicles.`vyear`, vehicles.`vmake`, vehicles.`vmodel`, vehicles.`vtrim` FROM `vehicles` WHERE vehicles.`did` = '$did' AND vehicles.`vlivestatus` = '1' AND vehicles.`vstockno` REGEXP '[a-z]$' ORDER BY vehicles.`vmake`, vehicles.`vmodel` DESC  ";
$distinct_trades = mysqli_query($idsconnection_mysqli, $query_distinct_trades);
$row_distinct_trades = mysqli_fetch_assoc($distinct_trades);
$totalRows_distinct_trades = mysqli_num_rows($distinct_trades);


$thisdid = $did;
include("controller/switch_vehicles.php");

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_vehicles = "SELECT * FROM `vehicles`,`dealers` WHERE $insert";
$slct_vehicles = mysqli_query($idsconnection_mysqli, $query_slct_vehicles);
$row_slct_vehicles = mysqli_fetch_assoc($slct_vehicles);
$totalRows_slct_vehicles = mysqli_num_rows($slct_vehicles);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_vehicles2 = "SELECT * FROM `vehicles`,`dealers` WHERE $insert";
$slct_vehicles2 = mysqli_query($idsconnection_mysqli, $query_slct_vehicles2);
$row_slct_vehicles2 = mysqli_fetch_assoc($slct_vehicles2);
$totalRows_slct_vehicles2 = mysqli_num_rows($slct_vehicles2);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_vehicles3 = "SELECT * FROM `vehicles`,`dealers` WHERE $insert";
$slct_vehicles3 = mysqli_query($idsconnection_mysqli, $query_slct_vehicles3);
$row_slct_vehicles3 = mysqli_fetch_assoc($slct_vehicles3);
$totalRows_slct_vehicles3 = mysqli_num_rows($slct_vehicles3);

$colname_qry_vehicle = "-1";
if (isset($_GET['v'])) {
  $colname_qry_vehicle = $_GET['v'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_vehicle =  sprintf("SELECT * FROM vehicles WHERE vid = %s ORDER BY created_at DESC", GetSQLValueString($colname_qry_vehicle, "int"));
$qry_vehicle = mysqli_query($idsconnection_mysqli, $query_qry_vehicle);
$row_qry_vehicle = mysqli_fetch_assoc($qry_vehicle);
$totalRows_qry_vehicle = mysqli_num_rows($qry_vehicle);

$vehicle_id = $row_qry_vehicle['vid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vphotos = "SELECT * FROM vehicle_photos WHERE vehicle_id = '$vehicle_id' ORDER BY photo_file_name ASC";
$vphotos = mysqli_query($idsconnection_mysqli, $query_vphotos);
$row_vphotos = mysqli_fetch_assoc($vphotos);
$totalRows_vphotos = mysqli_num_rows($vphotos);

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
$query_query_dept =  sprintf("SELECT * FROM dealer_depts WHERE dept_link = %s AND dealer_depts.dept_did = '$thisdid'", GetSQLValueString($colname_query_dept, "text"));
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
$query_timeMonths = "SELECT * FROM months_options";
$timeMonths = mysqli_query($idsconnection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeYears = "SELECT * FROM year_options";
$timeYears = mysqli_query($idsconnection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_autoYears = "SELECT * FROM auto_years";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carMakes = "SELECT * FROM car_make";
$carMakes = mysqli_query($idsconnection_mysqli, $query_carMakes);
$row_carMakes = mysqli_fetch_assoc($carMakes);
$totalRows_carMakes = mysqli_num_rows($carMakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_count_newmakes = "select distinct vehicles.vmake, count(vehicles.vmake) as CountOf from vehicles WHERE vehicles.did = '$thisdid' AND vehicles.vlivestatus = '1' AND vehicles.vcondition = 'New' AND vehicles.vmake IS NOT NULL group by vehicles.vmake ";
$count_newmakes = mysqli_query($idsconnection_mysqli, $query_count_newmakes);
$row_count_newmakes = mysqli_fetch_assoc($count_newmakes);
$totalRows_count_newmakes = mysqli_num_rows($count_newmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_count_usedmakes = "select distinct vehicles.vmake, count(vehicles.vmake) as CountOf from vehicles WHERE vehicles.did = '$thisdid' AND vehicles.vlivestatus = '1' AND vehicles.vcondition = 'Used' AND vehicles.vmake IS NOT NULL group by vehicles.vmake ";
$count_usedmakes = mysqli_query($idsconnection_mysqli, $query_count_usedmakes);
$row_count_usedmakes = mysqli_fetch_assoc($count_usedmakes);
$totalRows_count_usedmakes = mysqli_num_rows($count_usedmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_spotlight_new = "SELECT * FROM `idsids_idsdms`.vehicles WHERE did = '$thisdid' AND vehicles.vlivestatus = '1' AND vehicles.vcondition = 'New' AND vehicles.vthubmnail_file IS NOT NULL ORDER BY created_at ASC LIMIT 15";
$spotlight_new = mysqli_query($idsconnection_mysqli, $query_spotlight_new);
$row_spotlight_new = mysqli_fetch_assoc($spotlight_new);
$totalRows_spotlight_new = mysqli_num_rows($spotlight_new);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_spotlight_used = "SELECT * FROM `idsids_idsdms`.vehicles WHERE did = '$thisdid' AND vehicles.vlivestatus = '1' AND vehicles.vcondition = 'Used'  AND vehicles.vthubmnail_file IS NOT NULL ORDER BY created_at ASC LIMIT 10";
$spotlight_used = mysqli_query($idsconnection_mysqli, $query_spotlight_used);
$row_spotlight_used = mysqli_fetch_assoc($spotlight_used);
$totalRows_spotlight_used = mysqli_num_rows($spotlight_used);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_years = "SELECT * FROM year_options ORDER BY year_id ASC";
$years = mysqli_query($idsconnection_mysqli, $query_years);
$row_years = mysqli_fetch_assoc($years);
$totalRows_years = mysqli_num_rows($years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_months = "SELECT * FROM months_options ORDER BY month_id ASC";
$months = mysqli_query($idsconnection_mysqli, $query_months);
$row_months = mysqli_fetch_assoc($months);
$totalRows_months = mysqli_num_rows($months);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_car_years = "SELECT * FROM car_years ORDER BY car_year DESC";
$car_years = mysqli_query($idsconnection_mysqli, $query_car_years);
$row_car_years = mysqli_fetch_assoc($car_years);
$totalRows_car_years = mysqli_num_rows($car_years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_income_intervals = "SELECT * FROM credit_app_income_intervals ORDER BY income_interval_id ASC";
$income_intervals = mysqli_query($idsconnection_mysqli, $query_income_intervals);
$row_income_intervals = mysqli_fetch_assoc($income_intervals);
$totalRows_income_intervals = mysqli_num_rows($income_intervals);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_makes = "SELECT * FROM car_make";
$makes = mysqli_query($idsconnection_mysqli, $query_makes);
$row_makes = mysqli_fetch_assoc($makes);
$totalRows_makes = mysqli_num_rows($makes);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlmatrix_rates = "SELECT id, company, website, finance, finance_contact, email, disclaimer, newmatrixcredit_vgoodcredit, newmatrixcredit_jgoodcredit, newmatrixcredit_faircredit, newmatrixcredit_poorcredit, newmatrixcredit_subprime, newmatrixcredit_unknown, usedmatrixcredit_vgoodcredit, usedmatrixcredit_jgoodcredit, usedmatrixcredit_faircredit, usedmatrixcredit_poorcredit, usedmatrixcredit_subprime, usedmatrixcredit_unknown, settingDefaultAPR, settingDefaultTerm, settingSateSlsTax, settingDocDlvryFee, settingTitleFee, settingStateInspectnFee, financeform, financeData, financeURL FROM dealers WHERE id = '$thisdid'";
$dlmatrix_rates = mysqli_query($idsconnection_mysqli, $query_dlmatrix_rates);
$row_dlmatrix_rates = mysqli_fetch_assoc($dlmatrix_rates);
$totalRows_dlmatrix_rates = mysqli_num_rows($dlmatrix_rates);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_true_salesperson = "SELECT * FROM sales_person WHERE main_dealerid = '$did' AND  acct_status = '1' ORDER BY salesperson_firstname ASC";
$true_salesperson = mysqli_query($idsconnection_mysqli, $query_true_salesperson);
$row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
$totalRows_true_salesperson = mysqli_num_rows($true_salesperson);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_random_salesperson = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`main_dealerid` = '$did' AND   `sales_person`.`acct_status` = '1' ORDER BY RAND() limit 1";
$random_salesperson = mysqli_query($idsconnection_mysqli, $query_random_salesperson);
$row_random_salesperson = mysqli_fetch_assoc($random_salesperson);
$totalRows_random_salesperson = mysqli_num_rows($random_salesperson);
$sidr = $row_random_salesperson['salesperson_id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_testimony_query = "SELECT * FROM testimonials WHERE testimony_did = '$did' ORDER BY id DESC";
$testimony_query = mysqli_query($idsconnection_mysqli, $query_testimony_query);
$row_testimony_query = mysqli_fetch_assoc($testimony_query);
$totalRows_testimony_query = mysqli_num_rows($testimony_query);

$colname_lead_recover = "-1";
if (isset($_GET['token'])) {
  $colname_lead_recover = mysql_real_escape_string($_GET['token']);
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lead_recover =  sprintf("SELECT * FROM cust_leads WHERE cust_lead_token = %s ORDER BY cust_leadid ASC LIMIT 1", GetSQLValueString($colname_lead_recover, "text"));
$lead_recover = mysqli_query($idsconnection_mysqli, $query_lead_recover);
$row_lead_recover = mysqli_fetch_assoc($lead_recover);
$totalRows_lead_recover = mysqli_num_rows($lead_recover);

?>
<?php
include("../Libary/sessioncookies.php");
?>
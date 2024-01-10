<?php require_once('../Connections/tracking.php'); ?>
<?php require_once('../Connections/idsconnection.php'); ?>
<?php


$currentPage = $_SERVER["PHP_SELF"];

$maxRows_find_dealer_prospects = 100;
$pageNum_find_dealer_prospects = 0;
if (isset($_GET['pageNum_find_dealer_prospects'])) {
  $pageNum_find_dealer_prospects = $_GET['pageNum_find_dealer_prospects'];
}
$startRow_find_dealer_prospects = $pageNum_find_dealer_prospects * $maxRows_find_dealer_prospects;

$colname_find_dealer_prospects = "-1";
if (isset($_GET['state'])) {
  $colname_find_dealer_prospects = $_GET['state'];
}
mysqli_select_db($database_tracking, $tracking);
$query_find_dealer_prospects =  "SELECT * FROM dealer_prospects WHERE `state` = '$colname_find_dealer_prospects' ORDER BY company ASC";
$query_limit_find_dealer_prospects =  sprintf("%s LIMIT %d, %d", $query_find_dealer_prospects, $startRow_find_dealer_prospects, $maxRows_find_dealer_prospects);
$find_dealer_prospects = mysqli_query($idsconnection_mysqli, $query_limit_find_dealer_prospects, $tracking);
$row_find_dealer_prospects = mysqli_fetch_array($find_dealer_prospects);

if (isset($_GET['totalRows_find_dealer_prospects'])) {
  $totalRows_find_dealer_prospects = $_GET['totalRows_find_dealer_prospects'];
} else {
  $all_find_dealer_prospects = mysqli_query($idsconnection_mysqli, $query_find_dealer_prospects);
  $totalRows_find_dealer_prospects = mysqli_num_rows($all_find_dealer_prospects);
}
$totalPages_find_dealer_prospects = ceil($totalRows_find_dealer_prospects/$maxRows_find_dealer_prospects)-1;

$colname_query_dlrprospect = "-1";
if (isset($_GET['prospctdlrid'])) {
  $colname_query_dlrprospect = $_GET['prospctdlrid'];
}
mysqli_select_db($database_tracking, $tracking);
$query_query_dlrprospect =  "SELECT * FROM `idsids_idsdms`.`dealer_prospects` WHERE `dealer_prospects`.`id` = '$colname_query_dlrprospect'";
$query_dlrprospect = mysqli_query($idsconnection_mysqli, $query_query_dlrprospect, $tracking);
$row_query_dlrprospect = mysqli_fetch_array($query_dlrprospect);
$totalRows_query_dlrprospect = mysqli_num_rows($query_dlrprospect);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_array($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_array($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmodels = "SELECT * FROM car_model ORDER BY model ASC";
$vmodels = mysqli_query($idsconnection_mysqli, $query_vmodels);
$row_vmodels = mysqli_fetch_array($vmodels);
$totalRows_vmodels = mysqli_num_rows($vmodels);

mysqli_select_db($database_tracking, $tracking);
$query_qrydlr_prospc_notes = "SELECT * FROM dudes_dlr_prospc_notes WHERE dudes_dlr_notes_did = '1' ORDER BY dudes_dlr_notes_created_at DESC";
$qrydlr_prospc_notes = mysqli_query($idsconnection_mysqli, $query_qrydlr_prospc_notes, $tracking);
$row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes);
$totalRows_qrydlr_prospc_notes = mysqli_num_rows($qrydlr_prospc_notes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_activsystem_templates = "SELECT * FROM dudes_sys_htmlemail_templates WHERE email_systm_templates_status = '1' ORDER BY email_systm_templates_subject ASC";
$find_activsystem_templates = mysqli_query($idsconnection_mysqli, $query_find_activsystem_templates);
$row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
$totalRows_find_activsystem_templates = mysqli_num_rows($find_activsystem_templates);

$colname_find_exst_sysemltmplate = "-1";
if (isset($_GET['templateid'])) {
  $colname_find_exst_sysemltmplate = $_GET['templateid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_exst_sysemltmplate =  "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE `dudes_sys_htmlemail_templates`.`id` = '$colname_find_exst_sysemltmplate'";
$find_exst_sysemltmplate = mysqli_query($idsconnection_mysqli, $query_find_exst_sysemltmplate);
$row_find_exst_sysemltmplate = mysqli_fetch_array($find_exst_sysemltmplate);
$totalRows_find_exst_sysemltmplate = mysqli_num_rows($find_exst_sysemltmplate);




mysqli_select_db($database_tracking, $tracking);
$query_dudes_sys_template_cat = "SELECT * FROM `idsids_idsdms`.`dudes_sys_template_cats`  ORDER BY `sys_template_cat_type_label` ASC";
$dudes_sys_template_cat = mysqli_query($idsconnection_mysqli, $query_dudes_sys_template_cat, $tracking);
$row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat);
$totalRows_dudes_sys_template_cat = mysqli_num_rows($dudes_sys_template_cat);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mobile_carriers = "SELECT * FROM mobile_carriers ORDER BY carrier_label ASC";
$mobile_carriers = mysqli_query($idsconnection_mysqli, $query_mobile_carriers);
$row_mobile_carriers = mysqli_fetch_array($mobile_carriers);
$totalRows_mobile_carriers = mysqli_num_rows($mobile_carriers);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pullactvDudes = "SELECT * FROM dudes WHERE dudes_status = 1 ORDER BY dudes_lname ASC";
$pullactvDudes = mysqli_query($idsconnection_mysqli, $query_pullactvDudes);
$row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
$totalRows_pullactvDudes = mysqli_num_rows($pullactvDudes);

mysqli_select_db($database_tracking, $tracking);
$query_emailstoprospects = "SELECT * FROM emails_senthtml_prospectdlrs ORDER BY senthtml_prospect_created_at DESC";
$emailstoprospects = mysqli_query($idsconnection_mysqli, $query_emailstoprospects, $tracking);
$row_emailstoprospects = mysqli_fetch_array($emailstoprospects);
$totalRows_emailstoprospects = mysqli_num_rows($emailstoprospects);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_ids_directory = "SELECT * FROM dudes ORDER BY dudes_id DESC";
$ids_directory = mysqli_query($idsconnection_mysqli, $query_ids_directory);
$row_ids_directory = mysqli_fetch_array($ids_directory);
$totalRows_ids_directory = mysqli_num_rows($ids_directory);

mysqli_select_db($database_tracking, $tracking);
$query_mydlr_prospects = "SELECT * FROM dealer_prospects WHERE dudes_id = 1 ORDER BY last_modified DESC";
$mydlr_prospects = mysqli_query($idsconnection_mysqli, $query_mydlr_prospects, $tracking);
$row_mydlr_prospects = mysqli_fetch_array($mydlr_prospects);
$totalRows_mydlr_prospects = mysqli_num_rows($mydlr_prospects);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydlr_pending = "SELECT * FROM dealers_pending WHERE dudes_id = 1 ORDER BY id DESC";
$mydlr_pending = mysqli_query($idsconnection_mysqli, $query_mydlr_pending);
$row_mydlr_pending = mysqli_fetch_array($mydlr_pending);
$totalRows_mydlr_pending = mysqli_num_rows($mydlr_pending);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mysystem_dlrs = "SELECT * FROM dealers WHERE dudes_id = 1 ORDER BY company ASC";
$mysystem_dlrs = mysqli_query($idsconnection_mysqli, $query_mysystem_dlrs);
$row_mysystem_dlrs = mysqli_fetch_array($mysystem_dlrs);
$totalRows_mysystem_dlrs = mysqli_num_rows($mysystem_dlrs);

$colname_findsys_dealer = "-1";
if (isset($_GET['sysdealertoken'])) {
  $colname_findsys_dealer = $_GET['sysdealertoken'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_findsys_dealer =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`token` = '$colname_findsys_dealer'";
$findsys_dealer = mysqli_query($idsconnection_mysqli, $query_findsys_dealer);
$row_findsys_dealer = mysqli_fetch_array($findsys_dealer);
$totalRows_findsys_dealer = mysqli_num_rows($findsys_dealer);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_dlrdemos = "SELECT * FROM dealers_appointments WHERE dlr_dudes_demo = '1' ORDER BY dlr_appt_startunixtime ASC";
$pull_dlrdemos = mysqli_query($idsconnection_mysqli, $query_pull_dlrdemos);
$row_pull_dlrdemos = mysqli_fetch_array($pull_dlrdemos);
$totalRows_pull_dlrdemos = mysqli_num_rows($pull_dlrdemos);

$colname_find_dudecatid = "-1";
if (isset($_GET['cat_id'])) {
  $colname_find_dudecatid = $_GET['cat_id'];
}
mysqli_select_db($database_tracking, $tracking);
$query_find_dudecatid =  "SELECT * FROM dudes_sys_template_cats WHERE sys_template_cat_id = '$colname_find_dudecatid'";
$find_dudecatid = mysqli_query($idsconnection_mysqli, $query_find_dudecatid, $tracking);
$row_find_dudecatid = mysqli_fetch_array($find_dudecatid);
$totalRows_find_dudecatid = mysqli_num_rows($find_dudecatid);

$queryString_find_dealer_prospects = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_find_dealer_prospects") == false && 
        stristr($param, "totalRows_find_dealer_prospects") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_find_dealer_prospects = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_find_dealer_prospects =  sprintf("&totalRows_find_dealer_prospects=%d%s", $totalRows_find_dealer_prospects, $queryString_find_dealer_prospects);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">

function MM_jumpMenuGo(objId,targ,restore){ //v9.0
  var selObj = null;  with (document) { 
  if (getElementById) selObj = getElementById(objId);
  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0; }
}

</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php echo $row_find_dudecatid['sys_template_cat_id']; ?>
<p>
  <?php do { ?>
    <?php echo $row_ids_directory['dudes_id']; ?>
    <?php } while ($row_ids_directory = mysqli_fetch_array($ids_directory)); ?>
</p>
<p>Active Dudes</p>
<p><label>Dudes #1</label>&nbsp;</p>
<p>
  <select name="dudes1_id" id="dudes1_id">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dudes_id']))) {echo "selected=\"selected\"";} ?>>Select Rep</option>
    <?php
do {  
?>
    <option value="<?php echo $row_pullactvDudes['dudes_id']?>"<?php if (!(strcmp($row_pullactvDudes['dudes_id'], $row_query_dlrprospect['dudes_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_pullactvDudes['dudes_lname']?></option>
    <?php
} while ($row_pullactvDudes = mysqli_fetch_array($pullactvDudes));
  $rows = mysqli_num_rows($pullactvDudes);
  if($rows > 0) {
      mysqli_data_seek($pullactvDudes, 0);
	  $row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
  }
?>
  </select>
</p>
<p>Demo appointments</p>

<p>System Dealer</p>
<p><?php echo $row_findsys_dealer['company']; ?></p>
<p>Prospect Parking Lot</p>
<?php do { ?>
  <p><?php echo $row_mydlr_prospects['id']; ?><?php echo $row_mydlr_prospects['company']; ?></p>
  <?php } while ($row_mydlr_prospects = mysqli_fetch_array($mydlr_prospects)); ?>
<p>Pending Parking Lot</p>
<?php do { ?>
  <p><?php echo $row_mydlr_pending['id']; ?><?php echo $row_mydlr_pending['company']; ?></p>
  <?php } while ($row_mydlr_pending = mysqli_fetch_array($mydlr_pending)); ?>
<p>System Dealer Parking Lot</p>
<?php do { ?>
  <p><?php echo $row_mysystem_dlrs['id']; ?><?php echo $row_mysystem_dlrs['company']; ?></p>
  <?php } while ($row_mysystem_dlrs = mysqli_fetch_array($mysystem_dlrs)); ?>
<p>Loop Emails Sent To Prospects</p>

<p>&nbsp;</p>
<p>
  <label for="car_years">Select Year</label>
  <select name="car_years" id="car_years">
    <option value="">Select Year</option>
    <?php
do {  
?>
    <option value="<?php echo $row_carYears['year']?>"><?php echo $row_carYears['year']?></option>
    <?php
} while ($row_carYears = mysqli_fetch_array($carYears));
  $rows = mysqli_num_rows($carYears);
  if($rows > 0) {
      mysqli_data_seek($carYears, 0);
	  $row_carYears = mysqli_fetch_array($carYears);
  }
?>
  </select>
</p>
<p>
  <label for="car_make">Select Make</label>
  <select name="car_make" id="car_make">
    <option value="">Select Make</option>
    <?php
do {  
?>
    <option value="<?php echo $row_vmakes['make_id']?>"><?php echo $row_vmakes['car_make']?></option>
    <?php
} while ($row_vmakes = mysqli_fetch_array($vmakes));
  $rows = mysqli_num_rows($vmakes);
  if($rows > 0) {
      mysqli_data_seek($vmakes, 0);
	  $row_vmakes = mysqli_fetch_array($vmakes);
  }
?>
  </select>
</p>
<p>
  <label for="car_model">Select Model</label>
  <select name="car_model" id="car_model">
  </select>
</p>
<p>&nbsp;</p>
<p><label>Dudes #2</label>&nbsp;</p>
<p>
  <select name="dudes2_id" id="dudes2_id">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dudes2_id']))) {echo "selected=\"selected\"";} ?>>Select Rep 2</option>
    <?php
do {  
?>
    <option value="<?php echo $row_pullactvDudes['dudes_id']?>"<?php if (!(strcmp($row_pullactvDudes['dudes_id'], $row_query_dlrprospect['dudes2_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_pullactvDudes['dudes_lname']?></option>
    <?php
} while ($row_pullactvDudes = mysqli_fetch_array($pullactvDudes));
  $rows = mysqli_num_rows($pullactvDudes);
  if($rows > 0) {
      mysqli_data_seek($pullactvDudes, 0);
	  $row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
  }
?>
  </select>
</p>
<p>&nbsp;</p>
<p>wfh_dealer_type_id</p>
<p>                                    <select id="wfh_dealer_type_id" class="form-control">
<option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['wfh_dealer_type_id']))) {echo "selected=\"selected\"";} ?>>Yes</option>
<option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['wfh_dealer_type_id']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>
</p>
<p>&nbsp;</p>
<p>Mobile Carriers:</p>
  <select name="select" id="select">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['contact_mobilecarrier_id']))) {echo "selected=\"selected\"";} ?>>Select Carrier</option>
    <?php
do {  
?>
<option value="<?php echo $row_mobile_carriers['carrier_id']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_id'], $row_query_dlrprospect['contact_mobilecarrier_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?></option>
    <?php
} while ($row_mobile_carriers = mysqli_fetch_array($mobile_carriers));
  $rows = mysqli_num_rows($mobile_carriers);
  if($rows > 0) {
      mysqli_data_seek($mobile_carriers, 0);
	  $row_mobile_carriers = mysqli_fetch_array($mobile_carriers);
  }
?>
  </select>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>dealer_chat</p>
<p>
                                    <select id="dealer_chat" class="form-control">
                                      <option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['dealer_chat']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['dealer_chat']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?php do { ?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Contact Prospect Phone Type</p>
<form id="form2" name="form2" method="post" action="">
  <select name="contact_phone_type" id="contact_phone_type">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Select Phone Type</option>
    <option value="Mobile" <?php if (!(strcmp("Mobile", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Mobile</option>
    <option value="Work" <?php if (!(strcmp("Work", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Work</option>
    <option value="Other" <?php if (!(strcmp("Other", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Other</option>
  </select>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<p>Loop Prospect Notes<?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_id']; ?><?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_dude_name']; ?></p>
  <p><?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_created_at']; ?></p>
  <?php } while ($row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes)); ?>
<p>Loop Latest Prospects</p>
<p><?php echo $row_find_exst_sysemltmplate['id']; ?></p>
<p>Latest Dealer Prospects To Convert By State And WFH MARKET ID's</p>
<p>&nbsp;<?php echo $totalRows_query_dlrprospect ?> </p>
<form name="form" id="form">
  <select name="jumpMenu" id="jumpMenu">
    <option value="prospect.dealers.php?state=<?php echo $row_query_dlrprospect['state']; ?>">50</option>
    <option>100</option>
    <option>200</option>
    <option>300</option>
  </select>
  <input type="button" name="go_button" id= "go_button" value="Go" onclick="MM_jumpMenuGo('jumpMenu','parent',0)" />
</form>
<p>&nbsp;</p>
<p>Test Template Category</p>
<p>                               	  <select name="category_id" class="form-control" id="category_id">
  <option value="" <?php if (!(strcmp("", $row_find_exst_sysemltmplate['email_systm_templates_type_id']))) {echo "selected=\"selected\"";} ?>>Select Category</option>
  <?php
do {  
?>
  <option value="<?php echo $row_dudes_sys_template_cat['sys_template_cat_id']?>"<?php if (!(strcmp($row_dudes_sys_template_cat['sys_template_cat_id'], $row_find_exst_sysemltmplate['email_systm_templates_type_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_dudes_sys_template_cat['sys_template_cat_type_label']?></option>
  <?php
} while ($row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat));
  $rows = mysqli_num_rows($dudes_sys_template_cat);
  if($rows > 0) {
      mysqli_data_seek($dudes_sys_template_cat, 0);
	  $row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat);
  }
?>
                                  </select>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
                            <select id="email_systm_templates_status" class="form-control">
                            <option value="1" <?php if (!(strcmp(1, $row_find_exst_sysemltmplate['email_systm_templates_status']))) {echo "selected=\"selected\"";} ?>>Enabled</option>
                            <option value="0" <?php if (!(strcmp(0, $row_find_exst_sysemltmplate['email_systm_templates_status']))) {echo "selected=\"selected\"";} ?>>Disabled</option>
                            </select>

<p>&nbsp;</p>
<p>&nbsp;</p>
                                            	<select id="days_response" class="form-control">
                                            	  <option value="1" <?php if (!(strcmp(1, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>01 Day Response</option>
                                            	  <option value="2" <?php if (!(strcmp(2, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>02 Day Response</option>
                                            	  <option value="3" <?php if (!(strcmp(3, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>03 Day Response</option>
                                            	  <option value="4" <?php if (!(strcmp(4, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>04 Day Response</option>
                                            	  <option value="5" <?php if (!(strcmp(5, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>05 Day Response</option>
                                            	  <option value="6" <?php if (!(strcmp(6, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>06 Day Response</option>
                                            	  <option value="7" <?php if (!(strcmp(7, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>07 Day Response</option>
                                            	  <option value="8" <?php if (!(strcmp(8, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>08 Day Response</option>
                                            	  <option value="9" <?php if (!(strcmp(9, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>09 Day Response</option>
                                           	    <option value="10" <?php if (!(strcmp(10, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>10 Day Response</option>
                                           	    <option value="11" <?php if (!(strcmp(11, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>11 Day Response</option>
                                           	    <option value="12" <?php if (!(strcmp(12, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>12 Day Response</option>
                                           	    <option value="13" <?php if (!(strcmp(13, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>13 Day Response</option>
                                           	    <option value="14" <?php if (!(strcmp(14, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>14 Day Response</option>
                                           	    <option value="15" <?php if (!(strcmp(15, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>15 Day Response</option>
                                           	    <option value="16" <?php if (!(strcmp(16, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>16 Day Response</option>
                                           	    <option value="17" <?php if (!(strcmp(17, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>17 Day Response</option>
                                           	    <option value="18" <?php if (!(strcmp(18, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>18 Day Response</option>
                                           	    <option value="19" <?php if (!(strcmp(19, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>19 Day Response</option>
                                           	    <option value="20" <?php if (!(strcmp(20, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>20 Day Response</option>
                                           	    <option value="21" <?php if (!(strcmp(21, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>21 Day Response</option>
                                           	    <option value="22" <?php if (!(strcmp(22, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>22 Day Response</option>
                                           	    <option value="23" <?php if (!(strcmp(23, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>23 Day Response</option>
                                           	    <option value="24" <?php if (!(strcmp(24, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>24 Day Response</option>
                                           	    <option value="25" <?php if (!(strcmp(25, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>25 Day Response</option>
                                           	    <option value="26" <?php if (!(strcmp(26, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>26 Day Response</option>
                                           	    <option value="27" <?php if (!(strcmp(27, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>27 Day Response</option>
                                           	    <option value="28" <?php if (!(strcmp(28, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>28 Day Response</option>
                                           	    <option value="29" <?php if (!(strcmp(29, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>29 Day Response</option>
                                           	    <option value="30" <?php if (!(strcmp(30, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>30 Day Response</option>
                                           	    <option value="31" <?php if (!(strcmp(31, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>31 Day Response</option>
                                           	    <option value="32" <?php if (!(strcmp(32, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>32 Day Response</option>
                                           	    <option value="33" <?php if (!(strcmp(33, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>33 Day Response</option>
                                           	    <option value="34" <?php if (!(strcmp(34, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>34 Day Response</option>
                                           	    <option value="35" <?php if (!(strcmp(35, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>35 Day Response</option>
                                           	    <option value="36" <?php if (!(strcmp(36, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>36 Day Response</option>
                                           	    <option value="37" <?php if (!(strcmp(37, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>37 Day Response</option>
                                           	    <option value="38" <?php if (!(strcmp(38, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>38 Day Response</option>
                                           	    <option value="39" <?php if (!(strcmp(39, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>39 Day Response</option>
                                           	    <option value="40" <?php if (!(strcmp(40, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>40 Day Response</option>
                                           	    <option value="41" <?php if (!(strcmp(41, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>41 Day Response</option>
                                           	    <option value="42" <?php if (!(strcmp(42, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>42 Day Response</option>
                                           	    <option value="43" <?php if (!(strcmp(43, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>43 Day Response</option>
                                           	    <option value="44" <?php if (!(strcmp(44, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>44 Day Response</option>
                                           	    <option value="45" <?php if (!(strcmp(45, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>45 Day Response</option>
                                           	    <option value="46" <?php if (!(strcmp(46, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>46 Day Response</option>
                                           	    <option value="47" <?php if (!(strcmp(47, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>47 Day Response</option>
                                           	    <option value="48" <?php if (!(strcmp(48, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>48 Day Response</option>
<option value="49" <?php if (!(strcmp(49, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>49 Day Response</option>
<option value="50" <?php if (!(strcmp(50, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>50 Day Response</option>
<option value="51" <?php if (!(strcmp(51, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>51 Day Response</option>
<option value="52" <?php if (!(strcmp(52, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>52 Day Response</option>
<option value="53" <?php if (!(strcmp(53, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>53 Day Response</option>
<option value="54" <?php if (!(strcmp(54, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>54 Day Response</option>
<option value="55" <?php if (!(strcmp(55, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>55 Day Response</option>
<option value="56" <?php if (!(strcmp(56, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>56 Day Response</option>
<option value="57" <?php if (!(strcmp(57, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>57 Day Response</option>
<option value="58" <?php if (!(strcmp(58, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>58 Day Response</option>
<option value="59" <?php if (!(strcmp(59, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>59 Day Response</option>
                                   	        <option value="60" <?php if (!(strcmp(60, $row_find_exst_sysemltmplate['days_systm_response']))) {echo "selected=\"selected\"";} ?>>60 Day Response</option>
                                                </select>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php do { ?>
  <p><?php echo $row_find_dealer_prospects['id']; ?><?php echo $row_find_dealer_prospects['company']; ?></p>
  <?php } while ($row_find_dealer_prospects = mysqli_fetch_array($find_dealer_prospects)); ?>
<p>&nbsp;
  <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, 0, $queryString_find_dealer_prospects); ?>">First</a>
<p><a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, max(0, $pageNum_find_dealer_prospects - 1), $queryString_find_dealer_prospects); ?>">Previous</a>
<p><a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, min($totalPages_find_dealer_prospects, $pageNum_find_dealer_prospects + 1), $queryString_find_dealer_prospects); ?>">Next</a>
<p><a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, $totalPages_find_dealer_prospects, $queryString_find_dealer_prospects); ?>">Last</a>
<p>
<table border="0">
  <tr>
    <td><?php if ($pageNum_find_dealer_prospects > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, 0, $queryString_find_dealer_prospects); ?>">First</a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_find_dealer_prospects > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, max(0, $pageNum_find_dealer_prospects - 1), $queryString_find_dealer_prospects); ?>">Previous</a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_find_dealer_prospects < $totalPages_find_dealer_prospects) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, min($totalPages_find_dealer_prospects, $pageNum_find_dealer_prospects + 1), $queryString_find_dealer_prospects); ?>">Next</a>
    <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_find_dealer_prospects < $totalPages_find_dealer_prospects) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, $totalPages_find_dealer_prospects, $queryString_find_dealer_prospects); ?>">Last</a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
<p>Latest Demo Request</p>
<p>Latest Conversions (Last 10 Dealerships)</p>
<p>Last Unpaid Overdue Invoices</p>
<p>Latest Lead Purchase By Dealer</p>
<p>&nbsp;</p>
<p>Latest Approvals With Deals</p>
<p>&nbsp;</p>
<p>Latest Trouble Tickets</p>
<p>&nbsp;</p>
<p>All Users In The System Sorting By Active Only and last time logged in.</p>
<p>&nbsp;</p>
<p>Misc Latest Invoices Created This is thhe Pipeline Coming</p>
<p>&nbsp;</p>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</body>
</html>
<?php
mysqli_free_result($find_dealer_prospects);

mysqli_free_result($query_dlrprospect);

mysqli_free_result($qrydlr_prospc_notes);

mysqli_free_result($find_activsystem_templates);

mysqli_free_result($find_exst_sysemltmplate);

mysqli_free_result($mobile_carriers);

mysqli_free_result($pullactvDudes);

mysqli_free_result($emailstoprospects);

mysqli_free_result($ids_directory);

mysqli_free_result($mydlr_prospects);

mysqli_free_result($mydlr_pending);

mysqli_free_result($mysystem_dlrs);

mysqli_free_result($findsys_dealer);

mysqli_free_result($pull_dlrdemos);

mysqli_free_result($find_dudecatid);
?>

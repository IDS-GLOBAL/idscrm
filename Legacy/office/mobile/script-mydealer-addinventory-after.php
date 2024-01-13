<?php require_once('../../Connections/idsconnection.php'); ?>
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
$query_userDudes =  sprintf("SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM dealers_pending ORDER BY id ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM ticket_submit_dlr";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

$colname_myDealer = "-1";
if (isset($_GET['token'])) {
  $colname_myDealer = $_GET['token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_myDealer =  sprintf("SELECT * FROM dealers WHERE id = %s", GetSQLValueString($colname_myDealer, "int"));
$myDealer = mysqli_query($idsconnection_mysqli, $query_myDealer);
$row_myDealer = mysqli_fetch_array($myDealer);
$totalRows_myDealer = mysqli_num_rows($myDealer);
$did = $row_myDealer['id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydealerLeads = "SELECT * FROM cust_leads WHERE cust_dealer_id = '$did' ORDER BY cust_lead_created_at DESC";
$mydealerLeads = mysqli_query($idsconnection_mysqli, $query_mydealerLeads);
$row_mydealerLeads = mysqli_fetch_array($mydealerLeads);
$totalRows_mydealerLeads = mysqli_num_rows($mydealerLeads);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydealerInventoryLive = "SELECT * FROM vehicles WHERE vlivestatus = '1' AND vehicles.did = '$did'";
$mydealerInventoryLive = mysqli_query($idsconnection_mysqli, $query_mydealerInventoryLive);
$row_mydealerInventoryLive = mysqli_fetch_array($mydealerInventoryLive);
$totalRows_mydealerInventoryLive = mysqli_num_rows($mydealerInventoryLive);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryVehbydid = "SELECT * FROM vehicles WHERE did = '$did' ORDER BY created_at DESC";
$queryVehbydid = mysqli_query($idsconnection_mysqli, $query_queryVehbydid);
$row_queryVehbydid = mysqli_fetch_array($queryVehbydid);
$totalRows_queryVehbydid = mysqli_num_rows($queryVehbydid);
$vid = $row_queryVehbydid['vid'];
$makeid =  $row_queryVehbydid['vmakeid'];
$modelid = $row_queryVehbydid['vmodelid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_maketext = "SELECT * FROM car_make WHERE make_id = $makeid";
$maketext = mysqli_query($idsconnection_mysqli, $query_maketext);
$row_maketext = mysqli_fetch_array($maketext);
$totalRows_maketext = mysqli_num_rows($maketext);
$maketext = $row_maketext['car_make'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_modeltext = "SELECT * FROM car_model WHERE id = $modelid";
$modeltext = mysqli_query($idsconnection_mysqli, $query_modeltext);
$row_modeltext = mysqli_fetch_array($modeltext);
$totalRows_modeltext = mysqli_num_rows($modeltext);
$modeltext = $row_modeltext['model'];


//mysqli_query($idsconnection_mysqli, "INSERT INTO vehicle_photos (vehicle_id, dealer_id) values ($vid, $did)");
//mysqli_query($idsconnection_mysqli, "INSERT INTO vehicle_videos (vvideo_vid, vvideo_did) values ($vid, $did)");
//mysqli_query($idsconnection_mysqli, "UPDATE vehicles SET vmake=$maketext, vmodel=$modeltext WHERE vid=$vid");


							// This Ensures The Text Of This Vehicle Gets Added 
							// To The Vehicles Table For Easy Viewing.
							
							$update =  "UPDATE `idsids_idsdms`.`vehicles`
										SET
										`vmake` = '$maketext',
										`vmodel` = '$modeltext'
										WHERE
										`vehicles`.`vid` = $vid
										LIMIT 1
										";
							
							$updateSQL = mysqli_query($idsconnection_mysqli, "$update");






header("Location: mydealer-addinventory.php?token=$did");

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>My Dealer Inventory</title>
</head>
<body>
<?php echo $did; ?>




</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dealers_pend);

mysqli_free_result($DlrTickets);

mysqli_free_result($myDealer);

mysqli_free_result($mydealerLeads);

mysqli_free_result($mydealerInventoryLive);
?>
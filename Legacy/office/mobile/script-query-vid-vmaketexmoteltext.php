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

$user = $row_userDudes['dudes_id'];
$super = '1';

if($user == $super){
	
	$insertif = "";	
	}else{
	$id = $user;		
	$insertif = "WHERE dudes2_id = '$id'";
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydealers = "SELECT * FROM dealers $insertif ORDER BY company ASC";
$mydealers = mysqli_query($idsconnection_mysqli, $query_mydealers);
$row_mydealers = mysqli_fetch_array($mydealers);
$totalRows_mydealers = mysqli_num_rows($mydealers);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastVehicleaddedByDude = "SELECT * FROM vehicles WHERE dudes_id = '$dudesid' ORDER BY created_at DESC";
$lastVehicleaddedByDude = mysqli_query($idsconnection_mysqli, $query_lastVehicleaddedByDude);
$row_lastVehicleaddedByDude = mysqli_fetch_array($lastVehicleaddedByDude);
$totalRows_lastVehicleaddedByDude = mysqli_num_rows($lastVehicleaddedByDude);

$vid = $row_lastVehicleaddedByDude['vid'];

$makeid = $row_lastVehicleaddedByDude['vmakeid'];
$modelid = $row_lastVehicleaddedByDude['vmodelid'];



$colname_dealer = "-1";
if (isset($_GET['token'])) {
  $colname_dealer = $_GET['token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer =  sprintf("SELECT * FROM dealers WHERE id = %s", GetSQLValueString($colname_dealer, "int"));
$dealer = mysqli_query($idsconnection_mysqli, $query_dealer);
$row_dealer = mysqli_fetch_array($dealer);
$totalRows_dealer = mysqli_num_rows($dealer);
$did = $row_dealer['id'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_array($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmodels = "SELECT * FROM car_model";
$vmodels = mysqli_query($idsconnection_mysqli, $query_vmodels);
$row_vmodels = mysqli_fetch_array($vmodels);
$totalRows_vmodels = mysqli_num_rows($vmodels);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_array($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

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

?>
<?php



							$update =  "UPDATE `idsids_idsdms`.`vehicles`
										SET
										`vmake` = '$maketext',
										`vmodel` = '$modeltext'
										WHERE
										`vehicles`.`vid` = $vid
										LIMIT 1
										";
							echo $update;
							//$updateSQL = mysqli_query($idsconnection_mysqli, "$update");






//header("Location: mydealer-inventory-photos.php?vid=$vid");



mysqli_free_result($userDudes);

mysqli_free_result($lastVehicleaddedByDude);
?>

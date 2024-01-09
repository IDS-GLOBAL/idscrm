<?php require_once('../Connections/idsconnection.php'); ?>
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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM `idsids_idsdms`.`dealers_pending` ORDER BY `dealers_pending`.`id` ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr` ORDER BY `ticket_submit_dlr`.`ticket_id` DESC";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);






$colname_DlrTicketId = "-1";
if (isset($_GET['ticketid'])) {
  $colname_DlrTicketId = $_GET['ticketid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTicketId =  "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr` LEFT JOIN `idsids_idsdms`.`dealers` ON
`ticket_submit_dlr`.`ticket_did` = `dealers`.`id`  WHERE `ticket_submit_dlr`.`ticket_id` = '$colname_DlrTicketId'";
$DlrTicketId = mysqli_query($idsconnection_mysqli, $query_DlrTicketId);
$row_DlrTicketId = mysqli_fetch_array($DlrTicketId);
$totalRows_DlrTicketId = mysqli_num_rows($DlrTicketId);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_tckthstry = "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr` LEFT JOIN `idsids_idsdms`.`dealers` ON
`ticket_submit_dlr`.`ticket_did` = `dealers`.`id`  WHERE `ticket_submit_dlr`.`ticket_did` = '$did' ORDER BY created_at ASC";
$dealer_tckthstry = mysqli_query($idsconnection_mysqli, $query_dealer_tckthstry);
$row_dealer_tckthstry = mysqli_fetch_array($dealer_tckthstry);
$totalRows_dealer_tckthstry = mysqli_num_rows($dealer_tckthstry);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticket Preview/Respond</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>


<div class="container">

  <!-- HEADER -->
  
  <?php include('parts/header.php'); ?>

  <!-- CONTENT -->
  <?php include('parts/content-form-ticketpreview.php'); ?>
  
  <!-- FOOTER -->
  
  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>
  
</div>



</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dealer_tckthstry);
?>
<?php
include('parts/end.php');
?>

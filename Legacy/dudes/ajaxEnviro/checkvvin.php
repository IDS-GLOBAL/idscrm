<?php require_once('../../Connections/idsconnection.php'); ?>
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
$query_userDudes =  "SELECT * FROM idsids_idsdms.dudes WHERE dudes_username = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

@$did = $_GET['did'];

?>
<?php


@$vvin = mysqli_real_escape_string($idsconnection_mysqli, $_GET['vvin']);

$string = "SELECT `vid`, `did`, `vvin` FROM `idsids_idsdms`.`vehicles` WHERE `did`='$did' AND `vvin`='$vvin'";

$checkvin = mysqli_query($idsconnection_mysqli, "$string");
$check_num_rows = mysqli_num_rows($checkvin);
//echo $check_num_rows;

if($vvin == NULL)
echo 'Please Enter Vehicle VIN Number';	
else if(strlen($vvin) <17)
echo 'VIN Too Short';

else
{
	include('../../Libary/vin-number-check.php');
	if($check_num_rows==0)
	echo "<div class='safe'>Yes! This VIN Number Is Available For Use For Dealer $did.</div>";
	else if ($check_num_rows==1)
		while($vrow = mysqli_fetch_array($checkvin))
			  {
		$vid=$vrow['vid'];
		$vdid=$vrow['did'];
		
		if($did == $vdid){
				echo "<div class='danger'>Sorry! VIN Number IS Already In USE IT Belongs To YOU $did Please Change Before Submitting <a href='update-inventory.php?vid=$vid' target='_blank'>Click Here...</a></div>";
						 }else{
				echo "<div class='danger'>Sorry! We Have Record That This Vehicle By VIN Belongs To Another Dealer ID: $vdid <p>Please Change Before Submitting or Click Here To Transfer This Vehicle Into Your Inventory <a href='inventory-transfer.php?vid=$vid' target='_blank'>Click Here...</a></p></div><div></div>";
							 }
			   }
}

?>
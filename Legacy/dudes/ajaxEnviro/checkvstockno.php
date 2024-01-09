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


@$vstockno = mysql_real_escape_string($_POST['vstockno']);

$string = "SELECT `vstockno`, `vid` FROM `idsids_idsdms`.`vehicles` WHERE `did`='$did' AND vstockno='$vstockno'";

@$checkstockno = mysqli_query($idsconnection_mysqli, $string);
$check_num_rows = mysqli_num_rows($checkstockno);
//echo $check_num_rows;
//echo $string;

if($vstockno == NULL)
echo 'Please Enter Vehicle Stock Number';	
else if(strlen($vstockno) <4)
echo 'Too Short';

else
{
	if($check_num_rows==0)
	echo "<div class='safe'>Yes! This Stock Number Is Available To Use.</div>";
	else if ($check_num_rows==1)

	while($vrow = mysqli_fetch_array($checkstockno))
			  {
		$vid=$vrow['vid'];
	echo "<div class='danger'>Sorry! Stock Number IS Already In USE Please Change Before Submitting <a href='update-inventory.php?vid=$vid' target='_blank'>Click Here...</a></div>";
			  }
}

?>
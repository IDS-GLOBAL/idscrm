<?php require_once('../../../Connections/idsconnection.php'); ?>
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
$query_userDudes =  "SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectDealer = "SELECT id, company, website, status FROM dealers ORDER BY company ASC";
$selectDealer = mysqli_query($idsconnection_mysqli, $query_selectDealer);
$row_selectDealer = mysqli_fetch_array($selectDealer);
$totalRows_selectDealer = mysqli_num_rows($selectDealer);


?>
<?php
$vstockno=$_GET["vstockno"];
$did=$_GET['did'];

$vcon2 = mysql_connect('localhost', 'idsids_faith', 'benjamin2831');
if (!$vcon2)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("idsids_idsdms", $vcon2);

$sql2="SELECT * FROM vehicles WHERE did = $did AND vstockno = '".$vstockno."'";

$vresult2 = mysqli_query($idsconnection_mysqli, $sql2);

	
if (mysqli_num_rows($vresult2) == 0) { 
				echo  "<div class='safe'> Yes $vstockno Is Safe To Add </div>";
} else { 	
			while($vrow2 = mysql_fetch_array($vresult2))

			  {
			  $vid=$vrow2['vid'];
			  $vdid=$vrow2['did'];
			  $vlivestatus=$vrow2['vlivestatus'];
			  if($vlivestatus == 0){$vstatus = 'On HOLD!';}elseif($vlivestatus == 1){$vstatus = 'LIVE!';}
			  elseif($vlivestatus == 9){$vstatus= 'SOLD!';}			  
		  	  echo "<div class='danger'> Danger This $vstatus Vehicle Stock Found:  ";
			  echo $vrow2['vstockno'].' - '.$vrow2['vvin'].' Vehicle ID: = '.$vrow2['vid']." Which Belongs to Dealer ID: $vdid</div>";
		}
}
mysql_close($vcon2);

?>
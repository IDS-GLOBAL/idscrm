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
$query_last_did_appnumber = "SELECT * FROM `credit_app_fullblown` WHERE `applicant_did` IS NOT NULL ORDER BY `application_created_date` ASC, `applicant_did` ASC, `app_deal_number` ASC";
$last_did_appnumber = mysqli_query($idsconnection_mysqli, $query_last_did_appnumber);
$row_last_did_appnumber = mysqli_fetch_assoc($last_did_appnumber);
$totalRows_last_did_appnumber = mysqli_num_rows($last_did_appnumber);



$row_last_did_appnumber['app_deal_number'];
$row_last_did_appnumber['application_created_date'];


function write_deal_number($credit_app_fullblown_id, $creditapp_did, $caught_app_number){


global $idsconnection;
global $database_idsconnection;

static $credit_app_fullblown_id;
static $creditapp_did;


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_next_appnumber = "SELECT * FROM `credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_did` = '$creditapp_did' ORDER BY app_deal_number DESC LIMIT 1";
$next_appnumber = mysqli_query($idsconnection_mysqli, $query_next_appnumber);
$row_next_appnumber = mysqli_fetch_assoc($next_appnumber);
$totalRows_next_appnumber = mysqli_num_rows($next_appnumber);
echo 'Last App Number'.$found_app_deal_number = $row_next_appnumber['app_deal_number'];

if(!$caught_app_number || $caught_app_number == 0){ 
	
		
		if(!$found_app_deal_number){
			$next_number = 1;
			
		}else{

			$found_app_deal_number++;
			$next_number = $found_app_deal_number; 

		}
		
		
	
}else{

	 	$found_app_deal_number++;
		$next_number = $caught_app_number; 
	
}

		


//echo 'Next Number: '.$next_number;

echo $update_credit_withdealnumber_sql = "
UPDATE `idsids_idsdms`.`credit_app_fullblown` SET
	`app_deal_number` = '$next_number'
	WHERE
	`credit_app_fullblown_id` = '$credit_app_fullblown_id'
";
$run_update_credit_withdealnumber_sql = mysqli_query($idsconnection_mysqli, $update_credit_withdealnumber_sql);

return;



}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
do { 
$credit_app_fullblown_id = $row_last_did_appnumber['credit_app_fullblown_id'];

?>
  App ID: <?php echo $row_last_did_appnumber['credit_app_fullblown_id']; ?> | Created On: <?php echo $row_last_did_appnumber['application_created_date']; ?> Did: <?php echo $row_last_did_appnumber['applicant_did']; ?> | App Number: <?php echo $row_last_did_appnumber['app_deal_number']; ?> <?php  write_deal_number($credit_app_fullblown_id, $row_last_did_appnumber['applicant_did'], $row_last_did_appnumber['app_deal_number']); ?>
  <br />
  <?php } while ($row_last_did_appnumber = mysqli_fetch_assoc($last_did_appnumber)); ?>
</body>
</html>
<?php
mysqli_free_result($last_did_appnumber);

//mysqli_free_result($next_appnumber);
?>

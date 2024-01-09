<?php require_once('db_admin.php'); ?>
<?php


if(!$_POST) exit();









if(isset($_POST['dlrposted_token'], $_POST['dudesid'], $_POST['dudes_script_text'], $_POST['dudes_script_value'])){

$prospctdlrid='';

if(isset($_POST['prospctdlrid'])){	
	$prospctdlrid = mysqli_real_escape_string($tracking_mysqli, trim($_POST['prospctdlrid']));

}


$dudes_sales_pitch_id = mysqli_real_escape_string($tracking_mysqli, trim($_POST['dudes_script_value']));

mysqli_select_db($tracking_mysqli, $database_tracking);
$query_find_pitchtemplatedbyid = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_salespitch` WHERE `dudes_salespitch_id` = '$dudes_sales_pitch_id'";
$find_pitchtemplatedbyid = mysqli_query($tracking_mysqli, $query_find_pitchtemplatedbyid);
$row_find_pitchtemplatedbyid = mysqli_fetch_array($find_pitchtemplatedbyid);
$totalRows_find_pitchtemplatedbyid = mysqli_num_rows($find_pitchtemplatedbyid);




	
	echo $row_find_pitchtemplatedbyid['dudes_salespitch_body'];
	
	
	
	
	
	
	
	
	
	
	
}




include("inc.end.phpmsyql.php");






?>
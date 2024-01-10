<?php require_once('db_admin.php'); ?>
<?php


if(!$_POST) exit();


//echo 'Hello I POSTED ! ';

//print_r($_GET);

//print_r($_POST);







if(isset($_GET['customer_id'])){	
	$colname_view_thiscustomer = mysql_real_escape_string(trim($_GET['customer_id']));


}
	mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
	$query_view_thiscustomer =  "SELECT * FROM `customers` WHERE `idsids_idsdms`.`customer_id` = '$colname_view_thiscustomer'";
	$view_thiscustomer = mysqli_query($idsconnection_mysqli, $query_view_thiscustomer);
	$row_view_thiscustomer = mysqli_fetch_array($view_thiscustomer);
	$totalRows_view_thiscustomer = mysqli_num_rows($view_thiscustomer);
	
	$customer_id = $row_view_thiscustomer['customer_id'];


$colname_view_thislead = '-1';
if (isset($_GET['leadid'])) {
  $colname_view_thislead = $_GET['leadid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_view_thislead =  "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leads`.`cust_salesperson_id` = '$sid' AND `cust_dealer_id` = '$did' OR `cust_salesperson2_id` = '$sid' AND `cust_dealer_id` = '$did' AND cust_leadid = '$colname_view_thislead'";
$view_thislead = mysqli_query($idsconnection_mysqli, $query_view_thislead);
$row_view_thislead = mysqli_fetch_array($view_thislead);
$totalRows_view_thislead = mysqli_num_rows($view_thislead);

$lead_cust_leadid = $row_view_thislead['cust_leadid'];
$cust_dealer_id =  $row_view_thislead['cust_dealer_id'];


if($cust_dealer_id != $did){
  //header('Location: mysales.leads.php');
}

	echo '<br />';

	echo $lead_cust_leadid;

	echo '<br />';

	echo $cust_dealer_id;

	echo '<br />';
	
	echo $customer_id;

	echo '<br />';
	
	
	
	
	
	
	
	
	
	












?>
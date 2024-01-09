<?php


function  showvtumbnail($thisvid){

global $idsconnection_mysqli;
global $database_idsconnection;

static $thisvid;

if(!$thisvid){ exit(); }

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_show_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vid` = '$thisvid' LIMIT 1";
$show_vehicle = mysqli_query($idsconnection_mysqli, $query_show_vehicle);
$row_show_vehicle = mysqli_fetch_assoc($show_vehicle);
$totalRows_show_vehicle = mysqli_num_rows($show_vehicle);

echo $showvthubmnail_file_path = $row_show_vehicle['vthubmnail_file_path'];


}
	
function write_deal_number($credit_app_fullblown_id, $creditapp_did, $caught_app_number){


global $idsconnection_mysqli;
global $database_idsconnection;

static $credit_app_fullblown_id;
static $creditapp_did;
static $caught_app_number;

if(!$credit_app_fullblown_id) return;

if(!$creditapp_did) return;

if($caught_app_number) return;



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_next_appnumber = "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_did` = '$creditapp_did' ORDER BY `app_deal_number` DESC LIMIT 1";
$next_appnumber = mysqli_query($idsconnection_mysqli, $query_next_appnumber);
$row_next_appnumber = mysqli_fetch_assoc($next_appnumber);
$totalRows_next_appnumber = mysqli_num_rows($next_appnumber);

$found_app_deal_number = $row_next_appnumber['app_deal_number'];

if(!$caught_app_number || $caught_app_number == 0){ 
	
		
		if(!$found_app_deal_number){
			$next_number = 1000;
			
		}else{

			$found_app_deal_number++;
			$next_number = $found_app_deal_number; 

		}
		
		
	
}else{

	 	$found_app_deal_number++;
		$next_number = $caught_app_number; 
	
}

		


//echo 'Next Number: '.$next_number;

$update_credit_withdealnumber_sql = "
UPDATE `idsids_idsdms`.`credit_app_fullblown` SET
	`app_deal_number` = '$next_number'
	WHERE
	`credit_app_fullblown_id` = '$credit_app_fullblown_id'
";
$run_update_credit_withdealnumber_sql = mysqli_query($idsconnection_mysqli, $update_credit_withdealnumber_sql);

$caught_app_number = $next_number;

return $caught_app_number;



}


function write_app_number($credit_app_fullblown_id, $creditapp_did, $caught_app_number){

global $idsconnection_mysqli;
global $database_idsconnection;

static $credit_app_fullblown_id;
static $creditapp_did;
static $caught_app_number;


if(!$credit_app_fullblown_id) return;

if(!$creditapp_did) return;

if($caught_app_number) return;


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_next_appnumber = "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_did` = '$creditapp_did' ORDER BY `applicant_did`.`app_number` DESC LIMIT 1";
$next_appnumber = mysqli_query($idsconnection_mysqli, $query_next_appnumber);
$row_next_appnumber = mysqli_fetch_assoc($next_appnumber);
$totalRows_next_appnumber = mysqli_num_rows($next_appnumber);

$found_app_deal_number = $row_next_appnumber['app_number'];

if(!$caught_app_number || $caught_app_number == 0){ 
	
		
		if(!$found_app_deal_number){
			$next_number = 1000;
			
		}else{

			$found_app_deal_number++;
			$next_number = $found_app_deal_number; 

		}
		
		
	
}else{

	 	$found_app_deal_number++;
		$next_number = $caught_app_number; 
	
}

		


//echo 'Next Number: '.$next_number;

$update_credit_withdealnumber_sql = "
UPDATE `idsids_idsdms`.`credit_app_fullblown` SET
	`app_number` = '$next_number'
	WHERE
	`credit_app_fullblown_id` = '$credit_app_fullblown_id'
";
$run_update_credit_withdealnumber_sql = mysqli_query($idsconnection_mysqli, $update_credit_withdealnumber_sql);

echo $caught_app_number = $next_number;

return $caught_app_number;



}


$colname_qryDeal = "-1";
if (isset($_GET['deal_number'])) {
  $colname_qryDeal = $_GET['deal_number'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qryDeal = "SELECT * FROM `idsids_idsdms`.`deals_bydealer`, `idsids_idsdms`.`customers` WHERE `deals_bydealer`.`deal_dealerID` = '$did' AND `deals_bydealer`.`deal_number` = '$colname_qryDeal' AND `deals_bydealer`.`customer_id` = `customers`.`customer_id`";
$qryDeal = mysqli_query($idsconnection_mysqli, $query_qryDeal);
$row_qryDeal = mysqli_fetch_assoc($qryDeal);
$totalRows_qryDeal = mysqli_num_rows($qryDeal);
$sid = $row_qryDeal['salesPerson1ID'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`salesperson_id` = '$sid'";
$salespersons = mysqli_query($idsconnection_mysqli, $query_salespersons);
$row_salespersons = mysqli_fetch_assoc($salespersons);
$totalRows_salespersons = mysqli_num_rows($salespersons);



$mydid = $row_dlrSlctBySsnDid['id'];
$dcompany = $row_dlrSlctBySsnDid['company'];
$websturl = $row_dlrSlctBySsnDid['website'];
$dname = $row_dlrSlctBySsnDid['contact'];
$demail = $row_dlrSlctBySsnDid['email'];
$dphone = $row_dlrSlctBySsnDid['contact_phone'];
$daddr = $row_dlrSlctBySsnDid['address'];
$dstate = $row_dlrSlctBySsnDid['state'];
$dcity = $row_dlrSlctBySsnDid['city'];
$dzip = $row_dlrSlctBySsnDid['zip'];
$dstorephone = $row_dlrSlctBySsnDid['phone'];
$dstorefax = $row_dlrSlctBySsnDid['fax'];
$dslogan = $row_dlrSlctBySsnDid['slogan'];
$ddisclaim = $row_dlrSlctBySsnDid['disclaimer'];
$mapurl = $row_dlrSlctBySsnDid['mapurl'];
$financenm = $row_dlrSlctBySsnDid['finance'];
$financephn = $row_dlrSlctBySsnDid['finance_contact'];
$intrsalesnm = $row_dlrSlctBySsnDid['sales'];
$intrsalesphn = $row_dlrSlctBySsnDid['sales_contact'];

$salesperonName = $row_salespersons['salesperson_firstname'].' '.$row_salespersons['salesperson_lastname'];


// used Before In Dealers
$appid = $colname_qryDeal;



	include("_defintions-deal-applicant.php");



	include("_defintions-deal-coapplicant.php");
	
	
	
?>
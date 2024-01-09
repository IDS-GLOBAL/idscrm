<?php require_once("db_admin.php"); ?>
<?php






print_r($_POST);




if(isset($_POST['token'], $_POST['thisdudesid'],  $_POST['dudes1_id'],  $_POST['dudes2_id'], $_POST['dudes_skillset_id'], $_POST['howmanydefinets'], $_POST['howmanyresults'], $_POST['madeprospect_id'], $_POST['dudes1_id'], $_POST['dudes2_id'], $_POST['company'], $_POST['company_legalname'], $_POST['dealer_type_id'], $_POST['dealer_type_id_label'], $_POST['contact'], $_POST['contact_title'], $_POST['contact_phone'], $_POST['contact_phone_label'], $_POST['contact_mobilecarrier_id'], $_POST['contact_mobilecarrier_label'], $_POST['dmcontact2'], $_POST['dmcontact2_title'], $_POST['dmcontact2_phone'], $_POST['dmcontact2_phone_label'], $_POST['dmcontact2_phone_type'], $_POST['dmcontact2_mobilecarrier_id'], $_POST['dmcontact2_mobilecarrier_label'], $_POST['website'], $_POST['finance_primary_name'], $_POST['finance'], $_POST['finance_contact'], $_POST['finance_contact_email'], $_POST['sales'], $_POST['sales_contact'], $_POST['sales_email'], $_POST['phone'], $_POST['fax'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['dealer_email'], $_POST['dealer_password'], $_POST['dlr_geo_latitude'], $_POST['dlr_geo_longitude'], $_POST['dlr_ok_googlemp'])){


//echo 'You answer this Im ready to take you order';


	$posted_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['token']));

	$thisdudesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdudesid']));
	$dudes1_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes1_id']));
	$dudes2_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes2_id']));
	$company  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company']));
	$company_legalname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_legalname']));
	$dealer_type_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_type_id']));
	if(!$_POST['dealer_type_id']){$dealer_type_id_label= '';}
	$dealer_type_id_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_type_id_label']));
	if($_POST['dealer_type_id_label'] == 'Select Dealer Type'){$dealer_type_id_label = '';}
	
	$contact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact']));
	$contact_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_title']));
	$contact_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_phone']));
	$contact_phone_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_phone_label']));
	
	$contact_mobilecarrier_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_mobilecarrier_id']));
	if($_POST['contact_mobilecarrier_id'] == 'Select Carrier'){$contact_mobilecarrier_id = '';}
	
	$contact_mobilecarrier_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_mobilecarrier_label']));
	if($_POST['contact_mobilecarrier_label'] == 'Select Carrier'){$contact_mobilecarrier_label = '';}

	$dmcontact2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2']));
	$dmcontact2_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_title']));
	$dmcontact2_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone']));
	$dmcontact2_phone_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone_label']));
	$dmcontact2_phone_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone_type']));
	$dmcontact2_mobilecarrier_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_mobilecarrier_id']));
	if($_POST['dmcontact2_mobilecarrier_id'] == 'Select Carrier'){$dmcontact2_mobilecarrier_id = '';}
	
	$dmcontact2_mobilecarrier_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_mobilecarrier_label']));
	if($_POST['dmcontact2_mobilecarrier_label'] == 'Select Carrier'){$dmcontact2_mobilecarrier_label = '';}

	$website = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['website']));
	$finance_primary_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['finance_primary_name']));
	$finance = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['finance']));
	$finance_contact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['finance_contact']));
	$finance_contact_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['finance_contact_email']));
	
	
	$sales = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales']));
	
	$sales_contact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales_contact']));
	
	
	$sales_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales_email']));
	$wfh_dealer_type_id  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_type_id']));
	$wfh_dealer_type_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_type_id_label']));
	
	$phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['phone']));
	$fax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['fax']));
	$address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['address']));
	$city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['city']));
	$state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['state']));
	$county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['county']));

	$zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['zip']));

	$dealer_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_email']));
	$dealer_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_password']));


	$dlr_geo_latitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_geo_latitude']));
	$dlr_geo_longitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_geo_longitude']));
	$dlr_ok_googlemp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_ok_googlemp']));






mysqli_select_db($tracking_mysqli, $database_tracking);
$query_query_dlrprospect = "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `dealer_prospects`.`token` = '$posted_token'";
$query_dlrprospect = mysqli_query($tracking_mysqli, $query_query_dlrprospect);
$row_query_dlrprospect = mysqli_fetch_array($query_dlrprospect);
$totalRows_query_dlrprospect = mysqli_num_rows($query_dlrprospect);


$found_prospect_id = $row_query_dlrprospect['id'];



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_dlrprospect_pnd = "SELECT * FROM `idsids_idsdms`.`dealers_pending` WHERE `dealers_pending`.`token` = '$posted_token'";
$query_dlrprospect_pnd = mysqli_query($idsconnection_mysqli, $query_query_dlrprospect_pnd);
$row_query_dlrprospect_pnd = mysqli_fetch_array($query_dlrprospect_pnd);
$totalRows_query_dlrprospect_pnd = mysqli_num_rows($query_dlrprospect_pnd);


$found_prospect_pending_id = $row_query_dlrprospect_pnd['id'];



$create_prospectdlr_sql = "
INSERT INTO `idsids_tracking_idsvehicles`.`dealer_prospects` SET
		`dudes_id` = '$dudes1_id',
		`dudes2_id` = '$dudes2_id',
		`company` = '$company',
		`company_legalname` = '$company_legalname',
		`dealer_type_id` = '$dealer_type_id',
		`dealer_type_label` = '$dealer_type_id_label',
		`dmcontact2` = '$dmcontact2',
		`dmcontact2_title` = '$dmcontact2_title',
		`dmcontact2_phone` = '$dmcontact2_phone',
		`dmcontact2_phone_type` = '$dmcontact2_phone_type',
		`dmcontact2_mobilecarrier_id` = '$dmcontact2_mobilecarrier_id',
		`dmcontact2_mobilecarrier_label` = '$dmcontact2_mobilecarrier_label',
		`contact` = '$contact',
		`contact_title` = '$contact_title',
		`contact_phone` = '$contact_phone',
		`contact_phone_type` = '$contact_phone_label',
		`contact_mobilecarrier_id` = '$contact_mobilecarrier_id',
		`contact_mobilecarrier_label` = '$contact_mobilecarrier_label',
		`website` = '$website',
		`finance_primary_name` = '$finance_primary_name',
		`finance` = '$finance',
		`finance_contact` = '$finance_contact',
		`finance_contact_email` = '$finance_contact_email',
		`sales` = '$sales',
		`sales_contact` = '$sales_contact',
		`sales_email` = '$sales_email',
		`phone` = '$phone',
		`fax` = '$fax',
		`address` = '$address',
		`city` = '$city',
		`state` = '$state',
		`zip` = '$zip',
		`email` = '$dealer_email',
		`password` = '$dealer_password',
		`token` = '$posted_token',
		`wfh_dealer_type_id` = '$dealer_type_id',
		`wfh_dealer_type_label` = '$dealer_type_id_label',
		`dlr_geo_latitude` = '$dlr_geo_latitude',
		`dlr_geo_longitude` = '$dlr_geo_longitude',
		`dlr_ok_googlemp` = '$dlr_ok_googlemp',
		`status` = '1',
		`wfh_dealer_status` = '1'
		";
	






	//echo '<br />'.'Log Cat Is Taking Your Ordere YIPPPY!';







if(!$found_prospect_id){
	
//echo $create_prospectdlr_sql;
//echo $create_dealers_pending_with_no_frazer_no_sql;

$ran_create_prospectdlr_sql = mysqli_query($tracking_mysqli, $create_prospectdlr_sql);
$found_prospect_id = mysqli_insert_id($tracking_mysqli);

$create_dealers_pending_with_no_frazer_no_sql = "
INSERT INTO `idsids_idsdms`.`dealers_pending` SET
		`prospctdlrid` = '$found_prospect_id',
		`dudes_id` = '$dudes1_id',
		`dudes2_id` = '$dudes2_id',
		`company` = '$company',
		`company_legalname` = '$company_legalname',
		`dealer_type_id` = '$dealer_type_id',
		`dealer_type_label` = '$dealer_type_id_label',
		`dmcontact2` = '$dmcontact2',
		`dmcontact2_title` = '$dmcontact2_title',
		`dmcontact2_phone` = '$dmcontact2_phone',
		`dmcontact2_phone_type` = '$dmcontact2_phone_type',
		`dmcontact2_mobilecarrier_id` = '$dmcontact2_mobilecarrier_id',
		`dmcontact2_mobilecarrier_label` = '$dmcontact2_mobilecarrier_label',
		`contact` = '$contact',
		`contact_title` = '$contact_title',
		`contact_phone` = '$contact_phone',
		`contact_phone_type` = '$contact_phone_label',
		`contact_mobilecarrier_id` = '$contact_mobilecarrier_id',
		`contact_mobilecarrier_label` = '$contact_mobilecarrier_label',
		`website` = '$website',
		`finance_primary_name` = '$finance_primary_name',
		`finance` = '$finance',
		`finance_contact` = '$finance_contact',
		`finance_contact_email` = '$finance_contact_email',
		`sales` = '$sales',
		`sales_contact` = '$sales_contact',
		`sales_email` = '$sales_email',
		`phone` = '$phone',
		`fax` = '$fax',
		`address` = '$address',
		`city` = '$city',
		`state` = '$state',
		`zip` = '$zip',
		`token` = '$posted_token',
		`wfh_dealer_type_id` = '$dealer_type_id',
		`wfh_dealer_type_label` = '$dealer_type_id_label'
		";


// this crates the dealer pending.
$ran_create_dealers_pending_with_no_frazer_no_sql = mysqli_query($idsconnection_mysqli, $create_dealers_pending_with_no_frazer_no_sql);
$dealer_pending_id = mysqli_insert_id($idsconnection_mysqli);


 $update_prospectdlr_wpending_sql = "
UPDATE `idsids_tracking_idsvehicles`.`dealer_prospects` SET
		`dealer_pending_id` = '$dealer_pending_id'
		WHERE
		`id` = '$found_prospect_id'
		";

//echo "It's Time For You to Update.";
//echo $update_prospectdlr_sql;

//This crates the dealer prospect
$ran_update_prospectdlr_wpending_sql = mysqli_query($tracking_mysqli, $update_prospectdlr_wpending_sql);


}else{


	if($found_prospect_pending_id){

 $update_dealers_pending_with_no_frazer_no_sql = "
UPDATE `idsids_idsdms`.`dealers_pending` SET
		`prospctdlrid` = '$found_prospect_id',
		`dudes_id` = '$thisdudesid',
		`dudes2_id` = '$dudes2_id',
		`company` = '$company',
		`company_legalname` = '$company_legalname',
		`dealer_type_id` = '$dealer_type_id',
		`dealer_type_label` = '$dealer_type_id_label',
		`dmcontact2` = '$dmcontact2',
		`dmcontact2_title` = '$dmcontact2_title',
		`dmcontact2_phone` = '$dmcontact2_phone',
		`dmcontact2_phone_type` = '$dmcontact2_phone_type',
		`dmcontact2_mobilecarrier_id` = '$dmcontact2_mobilecarrier_id',
		`dmcontact2_mobilecarrier_label` = '$dmcontact2_mobilecarrier_label',
		`contact` = '$contact',
		`contact_title` = '$contact_title',
		`contact_phone` = '$contact_phone',
		`contact_phone_type` = '$contact_phone_label',
		`contact_mobilecarrier_id` = '$contact_mobilecarrier_id',
		`contact_mobilecarrier_label` = '$contact_mobilecarrier_label',
		`website` = '$website',
		`finance_primary_name` = '$finance_primary_name',
		`finance` = '$finance',
		`finance_contact` = '$finance_contact',
		`finance_contact_email` = '$finance_contact_email',
		`sales` = '$sales',
		`sales_contact` = '$sales_contact',
		`sales_email` = '$sales_email',
		`phone` = '$phone',
		`fax` = '$fax',
		`address` = '$address',
		`city` = '$city',
		`state` = '$state',
		`zip` = '$zip',
		`token` = '$posted_token',
		`wfh_dealer_type_id` = '$dealer_type_id',
		`wfh_dealer_type_label` = '$dealer_type_id_label'
		WHERE
		`id` = '$found_prospect_pending_id'
		";





		
		
 $update_prospectdlr_sql = "
UPDATE `idsids_tracking_idsvehicles`.`dealer_prospects` SET
		`dudes_id` = '$thisdudesid',
		`dudes2_id` = '$dudes2_id',
		`company` = '$company',
		`company_legalname` = '$company_legalname',
		`dealer_type_id` = '$dealer_type_id',
		`dealer_type_label` = '$dealer_type_id_label',
		`dmcontact2` = '$dmcontact2',
		`dmcontact2_title` = '$dmcontact2_title',
		`dmcontact2_phone` = '$dmcontact2_phone',
		`dmcontact2_phone_type` = '$dmcontact2_phone_type',
		`dmcontact2_mobilecarrier_id` = '$dmcontact2_mobilecarrier_id',
		`dmcontact2_mobilecarrier_label` = '$dmcontact2_mobilecarrier_label',
		`contact` = '$contact',
		`contact_title` = '$contact_title',
		`contact_phone` = '$contact_phone',
		`contact_phone_type` = '$contact_phone_label',
		`contact_mobilecarrier_id` = '$contact_mobilecarrier_id',
		`contact_mobilecarrier_label` = '$contact_mobilecarrier_label',
		`website` = '$website',
		`finance_primary_name` = '$finance_primary_name',
		`finance` = '$finance',
		`finance_contact` = '$finance_contact',
		`finance_contact_email` = '$finance_contact_email',
		`sales` = '$sales',
		`sales_contact` = '$sales_contact',
		`sales_email` = '$sales_email',
		`phone` = '$phone',
		`fax` = '$fax',
		`address` = '$address',
		`city` = '$city',
		`state` = '$state',
		`zip` = '$zip',
		`token` = '$posted_token',
		`wfh_dealer_type_id` = '$dealer_type_id',
		`wfh_dealer_type_label` = '$dealer_type_id_label',
		`dlr_geo_latitude` = '$dlr_geo_latitude',
		`dlr_geo_longitude` = '$dlr_geo_longitude',
		`dlr_ok_googlemp` = '$dlr_ok_googlemp',
		`status` = '1',
		`wfh_dealer_status` = '1'
		WHERE
		`id` = '$found_prospect_pending_id'
		";




//echo "It's Time For You to Update.";
//echo $update_prospectdlr_sql;

//This crates the dealer prospect
$ran_update_prospectdlr_sql = mysqli_query($tracking_mysqli, $update_prospectdlr_sql);










	// this updates the dealer pending.
	$ran_update_dealers_pending_with_no_frazer_no_sql = mysqli_query($idsconnection_mysqli, $update_dealers_pending_with_no_frazer_no_sql);
	
	}else{
	// this crates the dealer pending.
	$ran_create_dealers_pending_with_no_frazer_no_sql = mysqli_query($idsconnection_mysqli, $create_dealers_pending_with_no_frazer_no_sql);

	}

	//echo $update_dealers_pending_with_no_frazer_no_sql;

}




echo "
<script>

	setTimeout(function(){
		 
  			window.location.href = 'prospect.dealer.php?prospctdlrid=$found_prospect_id';
  		 
		  }, 3000);



</script>
";



}






















?>
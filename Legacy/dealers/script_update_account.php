<?php require_once("db_loggedin.php"); ?>
<?php


//print_r($_POST);

if(isset($_POST['thisdid'], $_POST['company'], $_POST['company_legalname'], $_POST['contact'], $_POST['dealer_type_id'], $_POST['contact_title'], $_POST['dmcontact2'], $_POST['dmcontact2_title'],  $_POST['address'], $_POST['state'], $_POST['city'], $_POST['zip'], $_POST['phone'], $_POST['fax'], $_POST['accts_payables_name'], $_POST['accts_payables_email'], $_POST['settingCurrency'], $_POST['dealerTimezone'], $_POST['dlr_geo_latitude'], $_POST['dlr_geo_longitude'])){
	
	// echo 'I made it bitches!';




    $thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
    $company = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company']));
    $company_legalname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_legalname']));
    $contact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact'])); //
	$dealer_type_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_type_id'])); 
    $contact_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_title']));
    $dmcontact2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2']));
    $city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['city']));
    $zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['zip']));
    $phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['phone']));
    $fax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['fax']));
    $accts_payables_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['accts_payables_name'])); //
    $accts_payables_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['accts_payables_email'])); //
	$settingCurrency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingCurrency']));
    $dealerTimezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealerTimezone'])); //
    $dlr_geo_latitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_geo_latitude'])); //
    $dlr_geo_longitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_geo_longitude'])); //
	$dlr_ok_googlemp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_ok_googlemp'])); // 


echo $dealer_account_update_sql = "
UPDATE `idsids_idsdms`.`dealers` SET
    `company` = '$company',
    `company_legalname` = '$company_legalname',
    `contact` = '$contact',
    `contact_title` = '$contact_title',
	`dealer_type_id` = '$dealer_type_id',
    `dmcontact2` = '$dmcontact2',
    `city` = '$city',
    `zip` = '$zip',
    `phone` = '$phone',
    `fax` = '$fax',
    `accts_payables_name` = '$accts_payables_name',
    `accts_payables_email` = '$accts_payables_email',
    `settingCurrency` = '$settingCurrency',
    `dealerTimezone` = '$dealerTimezone',
    `dlr_geo_latitude` = '$dlr_geo_latitude',
    `dlr_geo_longitude` = '$dlr_geo_longitude',
	`dlr_ok_googlemp` = '$dlr_ok_googlemp'
WHERE
    `id` = '$did'
	";

$run_dealer_account_update_sql = mysqli_query($idsconnection_mysqli, $dealer_account_update_sql);


}





?>
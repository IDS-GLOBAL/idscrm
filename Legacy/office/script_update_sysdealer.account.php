<?php require_once('db_admin.php'); ?>
<?php
$hostname_idshomenetatuoconnection = "localhost";
$database_idshomenetatuoconnection = "idsids_homenetauto";
$username_idshomenetatuoconnection = "idsids_homntatuo";
$password_idshomenetatuoconnection = "zetEKx9TeVxTQ5WW";
$idshomenetatuoconnection_mysqli = mysqli_connect($hostname_idshomenetatuoconnection, $username_idshomenetatuoconnection, $password_idshomenetatuoconnection) or trigger_error(mysql_error(),E_USER_ERROR); 

$colname_findsys_dealer = "-1";
if (isset($_GET['sysdealertoken'])) {
  $colname_findsys_dealer = $_GET['sysdealertoken'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_findsys_dealer =  "SELECT * FROM idsids_idsdms.dealers WHERE token = '$colname_findsys_dealer'";
$findsys_dealer = mysqli_query($idsconnection_mysqli, $query_findsys_dealer);
$row_findsys_dealer = mysqli_fetch_array($findsys_dealer);
$totalRows_findsys_dealer = mysqli_num_rows($findsys_dealer);
$system_dealerid = $row_findsys_dealer['id']; //hack

if(!$_POST) exit();
print_r($_POST);

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
	$website_url = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['website_url']));
    $accts_payables_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['accts_payables_name'])); //
    $accts_payables_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['accts_payables_email'])); //
	$settingCurrency = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingCurrency']));
    $dealerTimezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealerTimezone'])); //
    $dlr_geo_latitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_geo_latitude'])); //
    $dlr_geo_longitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_geo_longitude'])); //

		$accts_rcvbles_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['accts_rcvbles_name']));
		$accts_rcvbles_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['accts_rcvbles_email']));

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
		`website` = '$website_url',
    `accts_payables_name` = '$accts_payables_name',
		`accts_payables_email` = '$accts_payables_email',
		`accts_rcvbles_name` = '$accts_rcvbles_name',
    `accts_rcvbles_email` = '$accts_rcvbles_email',
    `settingCurrency` = '$settingCurrency',
    `dealerTimezone` = '$dealerTimezone',
    `dlr_geo_latitude` = '$dlr_geo_latitude',
    `dlr_geo_longitude` = '$dlr_geo_longitude'
WHERE
    `id` = '$thisdid'
	";

$run_dealer_account_update_sql = mysqli_query($idsconnection_mysqli, $dealer_account_update_sql);


}



if(isset($_POST['thisdid'], $_POST['feedhomenetfilename'], $_POST['feedhomenetActivated'], $_POST['company'])){


    $thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
    $feedhomenetfilename = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['feedhomenetfilename']));
    $feedhomenetActivated = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['feedhomenetActivated']));
    $company = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company']));

	$filename = "../homenetauto/$feedhomenetfilename";

	if (file_exists($filename)) {

	//PULL SYSDEALER ID
	mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
	$find_quickdealer_query = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$thisdid' LIMIT 1";
	$result_quickdealer = mysqli_query($idsconnection_mysqli, $find_quickdealer_query);
	$row_quickdealer = mysqli_fetch_array($result_quickdealer);
	$quickdealer_email = $row_quickdealer['email'];

	$feedhomenetfilename = $_POST['feedhomenetfilename'];

		echo "The file $filename exists";
	
	
	$file = str_replace ('../homenetauto/' , '' , $filename );
	
	$handle = fopen($filename,"r");
    


    $feedhomenetfilename = mysqli_real_escape_string($idshomenetatuoconnection_mysqli, trim($feedhomenetfilename));

	mysqli_select_db($idshomenetatuoconnection_mysqli, $database_idshomenetatuoconnection);
	$find_homenetautoclients_query = "SELECT * FROM `idsids_homenetauto`.`homenetauto_dealer` WHERE `homenetauto_dealer`.`homenet_dealer_filename` = '$feedhomenetfilename'";
	$result_ofhomenetautoclient = mysqli_query($idshomenetatuoconnection_mysqli, $find_homenetautoclients_query);
	$row_ofhomenetautoclient = mysqli_fetch_array($result_ofhomenetautoclient);
	$totalRows_ofhomenetautoclient = mysqli_num_rows($result_ofhomenetautoclient);	

	$homenet_dealer_id = $row_ofhomenetautoclient['homenet_dealer_id'];

echo $homenetautoclient_updatefeedhomenet_sql = "
UPDATE `idsids_homenetauto`.`homenetauto_dealer` SET
		`homenet_dealer_idsid` = '$thisdid',
		`homenet_dealer_company` = '$company',
		`homenet_dealer_email` = '$quickdealer_email'
	WHERE
		`homenet_dealer_id` = '$homenet_dealer_id'
		";

	$run_homenetautoclient_updatefeedhomenet_sql = mysqli_query($idshomenetatuoconnection_mysqli,  $homenetautoclient_updatefeedhomenet_sql);



echo $dealer_account_updatefeedhomenet_sql = "
UPDATE `idsids_idsdms`.`dealers` SET
		`feedhomenetActivated` = '$feedhomenetActivated',
		`feedhomenetfilename` = '$feedhomenetfilename'
	WHERE
		`id` = '$thisdid'
		";

	$run_dealer_account_update_sql = mysqli_query($idsconnection_mysqli, $dealer_account_updatefeedhomenet_sql);
	
	
	} else {
		echo "The file $filename does not exist";
	}
	
	
	
}

if(isset($_POST['thisdid'], $_POST['feedidfrazer'], $_POST['feedidfrazerActivated'] )){

    $thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
    $feedidfrazer = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['feedidfrazer']));
    $feedidfrazerActivated = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['feedidfrazerActivated']));

echo $dealer_account_updatefeedfrazer_sql = "
UPDATE `idsids_idsdms`.`dealers` SET
		`feedidfrazer` = '$feedidfrazer',
		`feedidfrazerActivated` = '$feedidfrazerActivated'
	WHERE
		`id` = '$thisdid'
		";

	$run_dealer_account_update_sql = mysqli_query($idsconnection_mysqli, $dealer_account_updatefeedfrazer_sql);
}


?>
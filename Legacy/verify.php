<?php require_once('Connections/idsconnection.php'); ?>
<?php

@$rsession = session_id();

if(empty($rsession)) session_start();

@$sessioncookie = "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];


@$PHPSESSID = session_id();


@$cookie = $_COOKIE["PHPSESSID"];

//Visitor Credentials Save With Visitor Information

@$ip = $_SERVER['REMOTE_ADDR'];

@$query_string = $_SERVER['QUERY_STRING'];

@$http_referer = $_SERVER['HTTP_REFERER'];

@$http_user_agent = $_SERVER['HTTP_USER_AGENT'];

$mobileuserjs = "var ismobile=navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i)";

$mobiledevice = "None";
$browser = 'Unknown';

//http://www.htmlgoodies.com/beyond/webmaster/toolbox/article.php/3888106/How-Can-I-Detect-the-iPhone--iPads-User-Agent.htm
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
 {
  //header('Location: http://yoursite.com/iphone');
  //exit();
  $mobiledevice = "iPhone/Ipod";
}

if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') || strstr($_SERVER['HTTP_USER_AGENT'],'android'))
 {
  //header('Location: http://yoursite.com/iphone');
  //exit();
  $mobiledevice = "Android";
}


//http://echopx.com/notes/browser-detection-ie-firefox-safari-chrome
if(strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Internet Explorer";
 }

if(strstr($_SERVER["HTTP_USER_AGENT"], 'Firefox'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Firefox";
 }


if(strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') || strstr($_SERVER['HTTP_USER_AGENT'],'Safari'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$browser = "Safari/Chrome";
 }




$colname_pull_pendingdlr = "-1";
if (isset($_GET['secret'])) {
  $colname_pull_pendingdlr = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['secret']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_pendingdlr =  "SELECT * FROM `idsids_idsdms`.`dealers_pending` WHERE `dealers_pending`.`token` = '$colname_pull_pendingdlr'";
$pull_pendingdlr = mysqli_query($idsconnection_mysqli, $query_pull_pendingdlr);
$row_pull_pendingdlr = mysqli_fetch_assoc($pull_pendingdlr);
$totalRows_pull_pendingdlr = mysqli_num_rows($pull_pendingdlr);


$pending_dealerid =  $row_pull_pendingdlr['id'];
$dealers_secret_token = $row_pull_pendingdlr['token'];

$dealers_pending_email = $row_pull_pendingdlr['email'];
$prospctdlrid = $row_pull_pendingdlr['prospctdlrid'];

if(!$dealers_pending_email){

	//header('Location: https://idscrm.com');  
	echo 'We Have No Email On File!';
	exit(); 
}



$colname_checkexisting_systemdlr = "-1";
if ($row_pull_pendingdlr['email']) {
  $colname_checkexisting_systemdlr = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['email']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_checkexisting_systemdlr =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`email` = '$colname_checkexisting_systemdlr'";
$checkexisting_systemdlr = mysqli_query($idsconnection_mysqli, $query_checkexisting_systemdlr);
$row_checkexisting_systemdlr = mysqli_fetch_assoc($checkexisting_systemdlr);
$totalRows_checkexisting_systemdlr = mysqli_num_rows($checkexisting_systemdlr);

if($totalRows_checkexisting_systemdlr == 0){ 
	  //echo 'Nothing';
	  
}else{

	//header('Location: https://idscrm.com/dealers/');  
	echo 'Srry We Found You In Our System Already, Please Login Or Request Forgot Password!';
	exit(); 

}


$dealer_pending_id = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['id']));
$dealer_type_id = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealer_type_id']));
$dealer_market_id = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealer_market_id']));
$dealer_market_sub_id = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealer_market_sub_id']));
$dudes_id = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dudes_id']));
$dudes2_id = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dudes2_id']));
$assigned_salesrep = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['assigned_salesrep']));
$assigned_salesrep_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['assigned_salesrep_phone']));
$contact = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['contact']));
$contact_title = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['contact_title']));
$contact_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['contact_phone']));
$contact_phone_type = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['contact_phone_type']));
if($row_pull_pendingdlr['contact_phone_type'] == 'Select Phone Type'){
	$contact_phone_type = '';
}

$dmcontact2 = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dmcontact2']));
$dmcontact2_title = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dmcontact2_title']));
$dmcontact2_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dmcontact2_phone']));
$dmcontact2_phone_type = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dmcontact2_phone_type']));

// Cleaning Up Phone Type From 
if($row_pull_pendingdlr['dmcontact2_phone_type'] == 'Select Phone Type'){
	$dmcontact2_phone_type = '';
}
$company = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['company']));
$company_legalname = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['company_legalname']));
$dealerTimezone = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealerTimezone']));
$website = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['website']));
$finance = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['finance']));
$finance_contact = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['finance_contact']));
$sales = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['sales']));
$sales_contact = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['sales_contact']));
$phone = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['phone']));
$fax = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['fax']));
$address = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['address']));
$city = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['city']));
$state = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['state']));
$zip = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['zip']));
$country = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['country']));
$email = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['email']));
$password = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['password']));
$token = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['token']));












/*
$home = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['home']));
$about = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['about']));
$directions = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['directions']));
$contactus = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['contactus']));
$thankyou_page = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['thankyou_page']));
$mapurl = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['mapurl']));
$mapframe = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['mapframe']));
$slogan = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['slogan']));
$disclaimer = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['disclaimer']));
$newmatrixcredit_vgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['newmatrixcredit_vgoodcredit']));
$newmatrixcredit_jgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['newmatrixcredit_jgoodcredit']));
$newmatrixcredit_faircredit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['newmatrixcredit_faircredit']));
$newmatrixcredit_poorcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['newmatrixcredit_poorcredit']));
$newmatrixcredit_subprime = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['newmatrixcredit_subprime']));
$newmatrixcredit_unknown = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['newmatrixcredit_unknown']));
$newmatrixcredit_fminimumprofit = mysqli_real_escape_string($idsconnection_mysqli, trim('750.00'));
$newmatrixcredit_bminimumprofit = mysqli_real_escape_string($idsconnection_mysqli, trim('750.00'));
$usedmatrixcredit_vgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['usedmatrixcredit_vgoodcredit']));
$usedmatrixcredit_jgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['usedmatrixcredit_jgoodcredit']));
$usedmatrixcredit_faircredit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['usedmatrixcredit_faircredit']));
$usedmatrixcredit_poorcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['usedmatrixcredit_poorcredit']));
$usedmatrixcredit_subprime = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['usedmatrixcredit_subprime']));
$usedmatrixcredit_unknown = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['usedmatrixcredit_unknown']));
$usedmatrixcredit_fminimumprofit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['usedmatrixcredit_fminimumprofit']));
$usedmatrixcredit_bminimumprofit = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['usedmatrixcredit_bminimumprofit']));
$settingCurrency = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['settingCurrency']));
$settingDefaultDPpercntg = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['settingDefaultDPpercntg']));
$settingDefaultPromoPriceOff = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['settingDefaultPromoPriceOff']));
$settingDefaultAPR = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['settingDefaultAPR']));
$settingDefaultTerm = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['settingDefaultTerm']));
$settingDocDlvryFee = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['settingDocDlvryFee']));
$settingTitleFee = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['settingTitleFee']));
$settingStateInspectnFee = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['settingStateInspectnFee']));
$dlr_ok_googlemp = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dlr_ok_googlemp']));
$dlr_geo_latitude = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dlr_geo_latitude']));
$dlr_geo_longitude = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dlr_geo_longitude']));
$financeform = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['financeform']));
$financeData = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['financeData']));
$financeURL = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['financeURL']));
$design = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['design']));
$listingdesign = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['listingdesign']));
$color_nav_current = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['color_nav_current']));
$dealer_chat = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealer_chat']));
$dealer_chatname = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealer_chatname']));
$dealer_chat_display = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealer_chat_display']));
$dealer_chat_code = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealer_chat_code']));
$dealer_chat_visitorid = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dealer_chat_visitorid']));
$fuel_pump_display = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['fuel_pump_display']));
$dcommercial_youtube_onoff = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dcommercial_youtube_onoff']));
$dcommercial_youtube_title = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dcommercial_youtube_title']));
$dcommercial_youtube_embed = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dcommercial_youtube_embed']));
$dcommercial_youtube_description = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['dcommercial_youtube_description']));
$craigslist_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['craigslist_nickname']));
$metaDescription = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['metaDescription']));
$metaKeywords = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['metaKeywords']));
$showPricing = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['showPricing']));
$showMileage = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['showMileage']));
$accts_rcvbles_name = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_rcvbles_name']));
$accts_rcvbles_email = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_rcvbles_email']));
$accts_rcvbles_verified = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_rcvbles_verified']));
$accts_rcvbles_password = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_rcvbles_password']));
$accts_rcvbles_password = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_rcvbles_password']));
$accts_payables_name = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_payables_name']));
$accts_payables_email = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_payables_email']));
$accts_payables_verified = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_payables_verified']));
$accts_payables_password = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_payables_password']));
$accts_payables_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['accts_payables_phone']));
$export_tocarsforsale = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['export_tocarsforsale']));
$export_tovast = mysqli_real_escape_string($idsconnection_mysqli, trim($row_pull_pendingdlr['export_tovast']));

*/




























$colname_pull_dudes = "-1";
if (isset($_GET['token'])) {
  $colname_pull_dudes = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['token']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_dudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.`dudes_public_token` = '$colname_pull_dudes'";
$pull_dudes = mysqli_query($idsconnection_mysqli, $query_pull_dudes);
$row_pull_dudes = mysqli_fetch_assoc($pull_dudes);
$totalRows_pull_dudes = mysqli_num_rows($pull_dudes);

$dudes_public_token = $row_pull_dudes['dudes_public_token'];







if(isset($_GET['serect'])){

	if($dealers_secret_token != $_GET['serect']){
		exit();
	}

}else{

	//exit();

}


if(isset($_GET['token'])){


		if($dudes_public_token == $dudes_public_token){
				
				$dudestoken_matched = 'Y';
				
		}else{
		
				$dudestoken_matched = 'N';
				
		}

}else{

	//Do Something
	$dudestoken_matched = 'N';
}



/*
*
* We Removed this have to pull directly from prospect table instead of pending.
`home` = '',
	`about` = '',
	`directions` = '',
	`contactus` = '',
	`thankyou_page` = '',
	`mapurl` = '',
	`mapframe` = '',
	`slogan` = '',
	`disclaimer` = '',
	`newmatrixcredit_vgoodcredit` = '',
	`newmatrixcredit_jgoodcredit` = '',
	`newmatrixcredit_faircredit` = '',
	`newmatrixcredit_poorcredit` = '',
	`newmatrixcredit_subprime` = '',
	`newmatrixcredit_unknown` = '',
	`newmatrixcredit_fminimumprofit` = '750.00',
	`newmatrixcredit_bminimumprofit` = '750.00',
	`usedmatrixcredit_vgoodcredit` = '',
	`usedmatrixcredit_jgoodcredit` = '',
	`usedmatrixcredit_faircredit` = '',
	`usedmatrixcredit_poorcredit` = '',
	`usedmatrixcredit_subprime` = '',
	`usedmatrixcredit_unknown` = '',
	`usedmatrixcredit_fminimumprofit` = '',
	`usedmatrixcredit_bminimumprofit` = '',
	`settingCurrency` = '',
	`settingDefaultDPpercntg` = '',
	`settingDefaultPromoPriceOff` = '',
	`settingDefaultAPR` = '',
	`settingDefaultTerm` = '',
	`settingDocDlvryFee` = '',
	`settingTitleFee` = '',
	`settingStateInspectnFee` = '',
	`dlr_ok_googlemp` = '',
	`dlr_geo_latitude` = '',
	`dlr_geo_longitude` = '',
	`financeform` = '',
	`financeData` = '',
	`financeURL` = '',
	`design` = '',
	`listingdesign` = '',
	`color_nav_current` = '',
	`dealer_chat` = '',
	`dealer_chatname` = '',
	`dealer_chat_display` = '',
	`dealer_chat_code` = '',
	`dealer_chat_visitorid` = '',
	`fuel_pump_display` = '',
	`dcommercial_youtube_onoff` = '',
	`dcommercial_youtube_title` = '',
	`dcommercial_youtube_embed` = '',
	`dcommercial_youtube_description` = '',
	`craigslist_nickname` = '',
	`metaDescription` = '',
	`metaKeywords` = '',
	`showPricing` = '',
	`showMileage` = '',
	`accts_rcvbles_name` = '',
	`accts_rcvbles_email` = '',
	`accts_rcvbles_verified` = '',
	`accts_rcvbles_password` = '',
	`accts_rcvbles_phone` = '',
	`accts_payables_name` = '',
	`accts_payables_email` = '',
	`accts_payables_verified` = '',
	`accts_payables_password` = '',
	`accts_payables_phone` = '',
	`export_tocarsforsale` = '',
	`export_tovast` = ''

*/
$systemdealer_id = '';

$createsystem_dealer_sql = "
INSERT `idsids_idsdms`.`dealers` SET
	`dealer_pending_id` = '$dealer_pending_id',
	`dealer_type_id` = '$dealer_type_id',
	`dealer_market_id` = '$dealer_market_id',
	`dealer_market_sub_id` = '$dealer_market_sub_id',
	`dudes_id` = '$dudes_id',
	`dudes2_id` = '$dudes2_id',
	`assigned_salesrep` = '$assigned_salesrep',
	`assigned_salesrep_phone` = '$assigned_salesrep_phone',
	`contact` = '$contact',
	`contact_title` = '$contact_title',
	`contact_phone` = '$contact_phone',
	`contact_phone_type` = '$contact_phone_type',
	`dmcontact2` = '$dmcontact2',
	`dmcontact2_title` = '$dmcontact2_title',
	`dmcontact2_phone` = '$dmcontact2_phone',
	`dmcontact2_phone_type` = '$dmcontact2_phone_type',
	`company` = '$company',
	`company_legalname` = '$company_legalname',
	`dealerTimezone` = '$dealerTimezone',
	`website` = '$website',
	`finance` = '$finance',
	`finance_contact` = '$finance_contact',
	`sales` = 'sales',
	`sales_contact` = '$sales_contact',
	`phone` = '$phone',
	`fax` = '$fax',
	`address` = '$address',
	`city` = '$city',
	`state` = '$state',
	`zip` = '$zip',
	`country` = '$country',
	`email` = '$email',
	`password` = '$password',
	`token` = '$token'
	";


$run_createsystem_dealer_sql = mysqli_query($idsconnection_mysqli, $createsystem_dealer_sql);
$systemdealer_id = mysqli_insert_id($idsconnection_mysqli);


// Simply Logging Activity
$createsystem_dealeractivity_sql = "
INSERT `idsids_idsdms`.`dealer_activty` SET
	`dealer_actvty_did` = '$dealer_pending_id',
	`token` = '$dealer_type_id',
	`dealer_actvty_logbody` = 'This dealer Registed from email: $dealers_pending_email  verification link And Secret token =  $colname_pull_pendingdlr AND dudes token = $colname_pull_dudes from IP: $ip | Browswer: $browser'
	";
$run_system_dealeractivity_sql= mysqli_query($idsconnection_mysqli, $createsystem_dealeractivity_sql);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Verify</title>

    <link href="dealers/css/bootstrap.min.css" rel="stylesheet">
    <link href="dealers/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="dealers/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="dealers/css/animate.css" rel="stylesheet">
    <link href="dealers/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
<?php include("analyticstracking.php"); ?>
<div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IDSCRM</h1>
                <div id="idssole">
                
                
                			
                
                </div>

            </div>
            <h3>Set Up Your Password</h3>
            <p>Welcome We Are Honored To Have You.</p>
          <form method="post" class="m-t" role="form" enctype="application/x-www-form-urlencoded" action="dealers/walkin.php">
          
          <input id="pending_dealerid" type="hidden" value="<?php echo $pending_dealerid; ?>">
          <input id="prospctdlrid" type="hidden" value="<?php echo $prospctdlrid; ?>">
				<input id="systemdealer_id" value="<?php echo $systemdealer_id; ?>" type="hidden">

                <input id="secret_token" type="hidden" value="<?php echo $row_pull_pendingdlr['token']; ?>">
                <input id="dudes_token" type="hidden" value="<?php echo $row_pull_dudes['dudes_public_token']; ?>">


<input id="dudestoken_matched" value="<?php echo $dudestoken_matched; ?>" type="hidden">

<div class="form-group">
<label class="col-sm-2 control-label">Comany Name</label>
                  <div class="col-sm-10">
                    <input id="company_name" type="text" class="form-control" placeholder="Company Name" required="" value="<?php echo $row_pull_pendingdlr['company']; ?>">
</div>
                  <div class="clearfix"></div>
                </div>
                
                
                <div class="form-group">
                 <label class="col-sm-2 control-label">Comany Legal Name<br /><small class="small">For billing purposes</small></label>
                  <div class="col-sm-10">

                    <input id="company_legalname" type="text" class="form-control" placeholder="Company Legal Name" required="" value="<?php echo $row_pull_pendingdlr['company_legalname']; ?>">
                    </div>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group">
                 <label class="col-sm-2 control-label">Administrator Email: (Locked)</label>
                  <div class="col-sm-10">

                    <input id="company_email" type="email" class="form-control" placeholder="Email" required="" value="<?php echo $row_pull_pendingdlr['email']; ?>" disabled="disabled">
                    </div>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group">
                 <label class="col-sm-2 control-label">Your Password</label>
                  <div class="col-sm-10">
                    <input id="company_password" type="password" class="form-control" placeholder="Password" required="">
                  </div>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group">
                 <label class="col-sm-2 control-label">Confirm Password</label>
                  <div class="col-sm-10">
                    <input id="company_password2"  type="password" class="form-control" placeholder="Confirm Password" required="">
                    </div>
                  <div class="clearfix"></div>
                </div>



                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button id="walkmein_dude" type="button" class="btn btn-primary block full-width m-b">Login</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="https://idscrm.com/">Cancel</a>
            </form>
            <p class="m-t"> <small>Idscrm web app framework based on Bootstrap 3 &copy; 2014 - <?php echo date('Y'); ?></small> </p>
        </div>
</div>

    <!-- Mainly scripts -->
    <script src="dealers/js/jquery-1.10.2.js"></script>
    <script src="dealers/js/bootstrap.min.js"></script>
    <script src="js/plugins/wow/verify.js"></script>
<!-- iCheck -->
    <script src="dealers/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
<?php
mysqli_free_result($pull_pendingdlr);

mysqli_free_result($pull_dudes);

?>

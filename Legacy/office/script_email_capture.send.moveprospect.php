<?php require_once('db_admin.php'); ?>
<?php

//require_once("Mail.php");
require_once("/home/idsids/php/Mail.php");


//print_r($_POST);






if(isset($_POST['dlrposted_token'], $_POST['dudesid'], $_POST['dudes1_id'], $_POST['dudes2_id'], $_POST['prospctdlrid'], $_POST['company'], $_POST['company_legalname'], $_POST['dealer_type_id'], $_POST['dealer_type_id_label'], $_POST['dealer_stillopenclose_label'], $_POST['dealer_stillopenclose'], $_POST['contact'], $_POST['contact_title'], $_POST['contact_phone'], $_POST['contact_phone_label'], $_POST['contact_mobilecarrier_id'], $_POST['contact_mobilecarrier_label'], $_POST['dmcontact2'], $_POST['dmcontact2_title'], $_POST['dmcontact2_phone'], $_POST['dmcontact2_phone_label'], $_POST['dmcontact2_phone_type'], $_POST['dmcontact2_mobilecarrier_id'], $_POST['dmcontact2_mobilecarrier_label'], $_POST['website'], $_POST['finance_primary_name'], $_POST['finance'], $_POST['finance_contact'], $_POST['finance_contact_email'], $_POST['sales'], $_POST['sales_contact'], $_POST['sales_email'], $_POST['phone'], $_POST['fax'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['home_html'], $_POST['about_html'], $_POST['directions_html'], $_POST['contactus'], $_POST['mapurl'], $_POST['mapframe'], $_POST['slogan'], $_POST['disclaimer'], $_POST['newmatrixcredit_vgoodcredit'], $_POST['newmatrixcredit_jgoodcredit'], $_POST['newmatrixcredit_faircredit'], $_POST['newmatrixcredit_poorcredit'], $_POST['newmatrixcredit_subprime'], $_POST['newmatrixcredit_unknown'], $_POST['usedmatrixcredit_vgoodcredit'], $_POST['usedmatrixcredit_jgoodcredit'], $_POST['usedmatrixcredit_faircredit'], $_POST['usedmatrixcredit_poorcredit'], $_POST['usedmatrixcredit_subprime'], $_POST['usedmatrixcredit_unknown'], $_POST['settingDefaultAPR'], $_POST['settingDefaultTerm'], $_POST['settingSateSlsTax'], $_POST['settingDocDlvryFee'], $_POST['settingTitleFee'], $_POST['settingStateInspectnFee'], $_POST['wfh_dealer_type_id'], $_POST['wfh_dealer_type_label'], $_POST['dealer_chat'], $_POST['dealer_chat_label'], $_POST['fuel_pump_display_label'], $_POST['fuel_pump_display'], $_POST['dcommercial_youtube_onoff_label'], $_POST['craigslist_nickname'], $_POST['metaDescription'], $_POST['metaKeywords'], $_POST['showPricing_label'], $_POST['showPricing_id'], $_POST['showMileage_label'], $_POST['showMileage'], $_POST['dealer_listingindex_displayprice_label'], $_POST['dealer_listingindex_displayprice'], $_POST['prospect_dealer_email'], $_POST['prospect_dealer_password'])){
	
//echo 'I made it.'; 

	$posteddudesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudesid']));
	$dudes1_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes1_id']));
	$dudes2_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes2_id']));
	$prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
	$company  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company']));
	$company_legalname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_legalname']));
	$dealer_type_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_type_id']));
	$dealer_type_id_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_type_id_label']));
	if(!$dealer_type_id){$dealer_type_id_label= '';}
	$dealer_stillopenclose_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_stillopenclose_label']));
	$dealer_stillopenclose = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_stillopenclose']));
	$contact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact']));
	$contact_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_title']));
	$contact_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_phone']));
	$contact_phone_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_phone_label']));
	if($_POST['contact_phone_label'] == 'Select Phone Type'){ $contact_phone_label = '';}
	
	$contact_mobilecarrier_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_mobilecarrier_id']));
	$contact_mobilecarrier_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_mobilecarrier_label']));

	if($_POST['contact_mobilecarrier_label'] == 'Select Carrier'){ $contact_mobilecarrier_label = '';}

	$dmcontact2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2']));
	$dmcontact2_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_title']));
	$dmcontact2_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone']));
	$dmcontact2_phone_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone_label']));
	
	
	
	$dmcontact2_phone_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone_type']));
	$dmcontact2_mobilecarrier_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_mobilecarrier_id']));
	$dmcontact2_mobilecarrier_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_mobilecarrier_label']));

	if($_POST['dmcontact2_mobilecarrier_label'] == 'Select Carrier'){ $dmcontact2_mobilecarrier_label = '';}


	$website = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['website']));
	$finance_primary_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['finance_primary_name']));
	$finance = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['finance']));
	$finance_contact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['finance_contact']));
	$finance_contact_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['finance_contact_email']));
	
	
	$sales = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales']));
	
	$sales_contact = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales_contact']));
	
	
	$sales_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sales_email']));
	$wfh_dealer_type_id  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfh_dealer_type_id']));
	$wfh_dealer_type_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wfh_dealer_type_label']));
	
	
	$dlrposted_token  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlrposted_token']));
	
	
	
	
	$dealer_chat = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_chat']));
	$metaDescription = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['metaDescription']));
	$metaKeywords = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['metaKeywords']));
	
	$phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['phone']));
	$fax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['fax']));
	$address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['address']));
	$city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['city']));
	$state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['state']));
	$zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['zip']));
	$home_html = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['home_html']));
	$about_html = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['about_html']));
	$directions_html = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['directions_html']));
	$contactus = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contactus']));
	$mapurl = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['mapurl']));
	$mapframe = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['mapframe']));
	$slogan = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['slogan']));
	$disclaimer = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['disclaimer']));
	$newmatrixcredit_vgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_vgoodcredit']));
	$newmatrixcredit_jgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_jgoodcredit']));
	$newmatrixcredit_faircredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_faircredit']));
	$newmatrixcredit_poorcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_poorcredit']));
	$newmatrixcredit_subprime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_subprime']));
	$newmatrixcredit_unknown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_unknown']));
	$usedmatrixcredit_vgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_vgoodcredit']));
	$usedmatrixcredit_jgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_jgoodcredit']));
	$usedmatrixcredit_faircredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_faircredit']));
	$usedmatrixcredit_poorcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_poorcredit']));
	$usedmatrixcredit_subprime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_subprime']));
	$usedmatrixcredit_unknown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_unknown']));
	$prospect_dealer_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospect_dealer_email']));
	$prospect_dealer_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospect_dealer_password']));


		$settingDefaultAPR = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingDefaultAPR']));
		$settingDefaultTerm = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingDefaultTerm']));
		$settingSateSlsTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingSateSlsTax']));
		$settingDocDlvryFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingDocDlvryFee']));
		$settingTitleFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingTitleFee']));
		$settingStateInspectnFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingStateInspectnFee']));


	if($dealer_stillopenclose == 'Y'){
		$status = '1';
	}else{
		$status = '0';
	}


$fuel_pump_display = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['fuel_pump_display']));
$dcommercial_youtube_onoff_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dcommercial_youtube_onoff_label']));
$craigslist_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['craigslist_nickname']));

$showPricing_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['showPricing_id ']));
$showMileage = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['showMileage']));
$dealer_listingindex_displayprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_listingindex_displayprice']));


 echo $update_prospectdlr_sql = "	
	UPDATE `idsids_tracking_idsvehicles`.`dealer_prospects` SET
		`dudes_id` = '$dudes1_id',
		`dudes2_id` = '$dudes2_id',
		`company` = '$company',
		`company_legalname` = '$company_legalname',
		`dealer_type_id` = '$dealer_type_id',
		`dealer_type_label` = '$dealer_type_id_label',
		`dealer_stillopenclose` = '$dealer_stillopenclose',
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
		`email` = '$prospect_dealer_email',
		`password` = '$prospect_dealer_password',
		`home` = '$home_html',
		`about` = '$about_html',
		`directions` = '$directions_html',
		`contactus` = '$contactus',
		`mapurl` = '$mapurl',
		`mapframe` = '$mapframe',
		`slogan` = '$slogan',
		`disclaimer` = '$disclaimer',
		`newmatrixcredit_vgoodcredit` = '$newmatrixcredit_vgoodcredit',
		`newmatrixcredit_jgoodcredit` = '$newmatrixcredit_jgoodcredit',
		`newmatrixcredit_faircredit` = '$newmatrixcredit_faircredit',
		`newmatrixcredit_poorcredit` = '$newmatrixcredit_poorcredit',
		`newmatrixcredit_subprime` = '$newmatrixcredit_subprime',
		`newmatrixcredit_unknown` = '$newmatrixcredit_unknown',
		`usedmatrixcredit_vgoodcredit` = '$usedmatrixcredit_vgoodcredit',
		`usedmatrixcredit_jgoodcredit` = '$usedmatrixcredit_jgoodcredit',
		`usedmatrixcredit_faircredit` = '$usedmatrixcredit_faircredit',
		`usedmatrixcredit_poorcredit` = '$usedmatrixcredit_poorcredit',
		`usedmatrixcredit_subprime` = '$usedmatrixcredit_subprime',
		`usedmatrixcredit_unknown` = '$usedmatrixcredit_unknown',
		`settingDefaultAPR` = '$settingDefaultAPR',
		`settingDefaultTerm` = '$settingDefaultTerm',
		`settingSateSlsTax` = '$settingSateSlsTax',
		`settingDocDlvryFee` = '$settingDocDlvryFee',
		`settingTitleFee` = '$settingTitleFee',
		`settingStateInspectnFee` = '$settingStateInspectnFee',
		`status` = '$status',
		`wfh_dealer_status` = '$status',
		`wfh_dealer_type_id` = '$wfh_dealer_type_id',
		`wfh_dealer_type_label` = '$wfh_dealer_type_label',
		`dealer_chat` = '$dealer_chat',
		`fuel_pump_display` = '$fuel_pump_display',
		`dcommercial_youtube_onoff` = '$dcommercial_youtube_onoff_label',
		`craigslist_nickname` = '$craigslist_nickname',
		`metaDescription` = '$metaDescription',
		`metaKeywords` = '$metaKeywords',
		`showPricing` = '$showPricing_id',
		`showMileage` = '$showMileage',
		`dealer_listingindex_displayprice` = '$dealer_listingindex_displayprice',
		`last_modified_timezone` = '$zone_to',
		`last_modified` = '$server_time'
		WHERE
		`id` = '$prospctdlrid'
		";




$ran_update_prospectdlr_sql = mysqli_query($idsconnection_mysqli, $update_prospectdlr_sql, $tracking);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_pndng_dlrpspct = "SELECT * FROM `idsids_idsdms`.`dealers_pending` WHERE `prospctdlrid` = '$prospctdlrid'";
$find_pndng_dlrpspct = mysqli_query($idsconnection_mysqli, $query_find_pndng_dlrpspct);
$row_find_pndng_dlrpspct = mysqli_fetch_array($find_pndng_dlrpspct);
$totalRows_find_pndng_dlrpspct = mysqli_num_rows($find_pndng_dlrpspct);


$pndng_dlrpspct_id = $row_find_pndng_dlrpspct['id'];
$pndng_dlrpspct_token = $row_find_pndng_dlrpspct['token'];


$create_dealers_pending_with_no_frazer_no_sql = "
INSERT INTO `idsids_idsdms`.`dealers_pending` SET
		`prospctdlrid` = '$prospctdlrid',
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
		`email` = '$prospect_dealer_email',
		`password` = '$prospect_dealer_password',
		`wfh_dealer_type_id` = '$dealer_type_id',
		`wfh_dealer_type_label` = '$dealer_type_id_label',
		`token` = '$dlrposted_token'
		";

$update_dealers_pending_with_no_frazer_no_sql = "
UPDATE `idsids_idsdms`.`dealers_pending` SET
		`prospctdlrid` = '$prospctdlrid',
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
		`email` = '$prospect_dealer_email',
		`password` = '$prospect_dealer_password',
		`wfh_dealer_type_id` = '$dealer_type_id',
		`wfh_dealer_type_label` = '$dealer_type_id_label',
		`token` = '$dlrposted_token'
		WHERE
		`id` = '$pndng_dlrpspct_id'
		";



if(!$pndng_dlrpspct_id){
	
	$ran_create_dealers_pending_with_no_frazer_no_sql = mysqli_query($idsconnection_mysqli, $create_dealers_pending_with_no_frazer_no_sql);


	}else{


	$ran_update_dealers_pending_with_no_frazer_no_sql = mysqli_query($idsconnection_mysqli, $update_dealers_pending_with_no_frazer_no_sql);


}



}










print_r($_POST);



if(isset($_POST['dudesid'], $_POST['prospctdlrid'], $_POST['email_to2'], $_POST['email_from2'], $_POST['email_template2'], $_POST['email_template_subject2'], $_POST['email_systm_templates_body2'])){
	
	//echo 'I made it.'; 
	
	$senthtml_prospect_prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
	$senthtml_prospect_email_to  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_to2']));
	$senthtml_prospect_email_from = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_from2']));
	$senthtml_prospect_email_systemplate_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template2']));
	$senthtml_prospect_email_subject_post = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template_subject2']));
	$senthtml_prospect_email_systm_templates_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_systm_templates_body2']));
	
	
 $create_emails_senthtml_prospectdlrs_sql = "	
	INSERT INTO `idsids_tracking_idsvehicles`.`emails_senthtml_prospectdlrs` SET
		`senthtml_prospect_dudesid` = '$dudesid',
		`senthtml_draft` = 'N',
		`senthtml_prospect_prospctdlrid` = '$senthtml_prospect_prospctdlrid',
		`senthtml_prospect_email_to` = '$senthtml_prospect_email_to',
		`senthtml_prospect_email_from` = '$senthtml_prospect_email_from',
		`senthtml_prospect_email_subject_post` = '$senthtml_prospect_email_subject_post',
		`senthtml_prospect_email_systemplate_id` = '$senthtml_prospect_email_systemplate_id',
		`senthtml_prospect_email_systm_templates_body` = '$senthtml_prospect_email_systm_templates_body'
		";

$ran_emails_senthtml_prospectdlrs_sql = mysqli_query($idsconnection_mysqli, $create_emails_senthtml_prospectdlrs_sql, $tracking);





/// This is the actual moving from pending into prospect










			 ini_set ("SMTP", "mail.idscrm.com");
			 
			 
			 //$from = "IDSCRM Team <info@idscrm.com>";
			 $from = $senthtml_prospect_email_from;

/*
			if(isset($dudes_email_internal)){
			$additionalbccs = ' '.$dudes_email_internal;
			}else{
			$additionalbccs="";
			}

*/
			 // $To = "Email Recipient <webgoonie@gmail.com>";
			 // $To = $senthtml_prospect_email_to;
			 $To = $_POST['email_to2'];
			 
			 $Replyto = 'support@idscrm.com';

			 // Grouped Together For Receipient BCC Headers
			 // BCC:
			 //$bcc = "idscrm.com@gmail.com".$additionalbccs;
			 $bcc = "idscrm.com@gmail.com";
			 
			 $recipients = $To.",".$bcc;
			
			 //$subject = "You Have A $500 Discount Received";
			 //$subject = "Thank you for contacting Central Auto Sales";
			 $subject = $_POST['email_template_subject2'];  //$senthtml_prospect_email_subject_post;



	$body_html = $_POST['email_systm_templates_body2'];



	$host = "mail.idscrm.com";
	$username = "idsrobot@idscrm.com";
	$password = "idscrmsystem99!";
 
	$headers = array ('From' => $from,
	'To' => $To,
	//'Reply-To' => $Replyto,
	'Subject' => $subject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$smtp = Mail::factory('smtp',
	   array ('host' => $host,
		 'auth' => true,
		 'username' => $username,
		 'password' => $password));
 
	$mail = $smtp->send($recipients, $headers, $body_html);




/*
$gotoemailtemplates = 'emailtemplates.php';

echo "<script>window.top.location.href='".$gotoemailtemplates."'</script>";

*/




}

/*


data: Array
(
    [dudesid] => 1
    [prospctdlrid] => 4517
    [email_to] => mistalawry@hotmail.com
    [email_from] => benjamin@idscrm.com
    [email_template] => 12
    [email_systm_templates_body] => This is that shit I was talking about.<p></p>

                        
)

*****************************************************************************************************
http://stackoverflow.com/questions/3299577/php-how-to-send-email-with-attachment-using-smtp-settings

include('Mail.php');
include('Mail/mime.php');

$text = 'Text version of email';
$html = '<html><body>HTML version of email</body></html>';
$file = './files/example.zip';
$crlf = "rn";
$hdrs = array(
              'From'    => 'someone@domain.pl',
              'To'      => 'someone@domain.pl',
              'Subject' => 'Test mime message'
              );

$mime = new Mail_mime($crlf);

$mime->setTXTBody($text);
$mime->setHTMLBody($html);

$mime->addAttachment($file,'application/octet-stream');

$body = $mime->get();
$hdrs = $mime->headers($hdrs);

$mail =& Mail::factory('mail', $params);
$mail->send('mail@domain.pl', $hdrs, $body); 







 //Convert encodings of subject, sender, recipient and message body to ISO-20222-JP 
    $from_name = mb_encode_mimeheader($from_name, "ISO-2022-JP", "Q"); 
    $to_name = mb_encode_mimeheader($to_name, "ISO-2022-JP", "Q"); 
    $subject = mb_encode_mimeheader($subject, "ISO-2022-JP", "Q"); 
    $mailmsg = mb_convert_encoding($mailmsg, "ISO-2022-JP", "AUTO"); 

    $From = "From: ".$from_name." <fromaddress@domain.com>"; 
    $To = "To: ".$to_name." <toaddress@domain.com>"; 

    $recipients = "toaddress@domain.com"; 
    $headers["From"] = $From; 
    $headers["To"] = $To; 
    $headers["Subject"] = $subject; 
    $headers["Reply-To"] = "reply@address.com"; 
    $headers["Content-Type"] = "text/plain; charset=ISO-2022-JP"; 
    $headers["Return-path"] = "returnpath@address.com"; 
     
    $smtpinfo["host"] = "smtp.server.com"; 
    $smtpinfo["port"] = "25"; 
    $smtpinfo["auth"] = true; 
    $smtpinfo["username"] = "smtp_user"; 
    $smtpinfo["password"] = "smtp_password"; 

    $mail_object =& Mail::factory("smtp", $smtpinfo); 

    $mail_object->send($recipients, $headers, $mailmsg); 
*****************************************************************************************************





*/

?>
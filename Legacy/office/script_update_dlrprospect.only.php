<?php require_once('db_admin.php'); ?>
<?php



//print_r($_POST);

if(isset($_POST['dudesid'], $_POST['dudes1_id'], $_POST['dudes2_id'], $_POST['prospctdlrid'], $_POST['company'], $_POST['company_legalname'], $_POST['dealer_type_id'], $_POST['dealer_type_id_label'], $_POST['dealer_stillopenclose_label'], $_POST['dealer_stillopenclose'], $_POST['contact'], $_POST['contact_title'], $_POST['contact_phone'], $_POST['contact_phone_label'], $_POST['contact_mobilecarrier_id'], $_POST['contact_mobilecarrier_label'], $_POST['dmcontact2'], $_POST['dmcontact2_title'], $_POST['dmcontact2_phone'], $_POST['dmcontact2_phone_label'], $_POST['dmcontact2_phone_type'], $_POST['dmcontact2_mobilecarrier_id'], $_POST['dmcontact2_mobilecarrier_label'], $_POST['website'], $_POST['finance_primary_name'], $_POST['finance'], $_POST['finance_contact'], $_POST['finance_contact_email'], $_POST['sales'], $_POST['sales_contact'], $_POST['sales_email'], $_POST['phone'], $_POST['fax'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['home_html'], $_POST['about_html'], $_POST['directions_html'], $_POST['contactus'], $_POST['mapurl'], $_POST['mapframe'], $_POST['slogan'], $_POST['disclaimer'], $_POST['newmatrixcredit_vgoodcredit'], $_POST['newmatrixcredit_jgoodcredit'], $_POST['newmatrixcredit_faircredit'], $_POST['newmatrixcredit_poorcredit'], $_POST['newmatrixcredit_subprime'], $_POST['newmatrixcredit_unknown'], $_POST['usedmatrixcredit_vgoodcredit'], $_POST['usedmatrixcredit_jgoodcredit'], $_POST['usedmatrixcredit_faircredit'], $_POST['usedmatrixcredit_poorcredit'], $_POST['usedmatrixcredit_subprime'], $_POST['usedmatrixcredit_unknown'], $_POST['settingDefaultAPR'], $_POST['settingDefaultTerm'], $_POST['settingSateSlsTax'], $_POST['settingDocDlvryFee'], $_POST['settingTitleFee'], $_POST['settingStateInspectnFee'], $_POST['dlr_geo_latitude'], $_POST['dlr_geo_longitude'], $_POST['dlr_ok_googlemp'], $_POST['wfh_dealer_type_id'], $_POST['wfh_dealer_type_label'], $_POST['dealer_chat'], $_POST['dealer_chat_label'], $_POST['fuel_pump_display_label'], $_POST['fuel_pump_display'], $_POST['dcommercial_youtube_onoff_label'], $_POST['craigslist_nickname'], $_POST['metaDescription'], $_POST['metaKeywords'], $_POST['showPricing_label'], $_POST['showPricing_id'], $_POST['showMileage_label'], $_POST['showMileage'], $_POST['dealer_listingindex_displayprice_label'], $_POST['dealer_listingindex_displayprice'], $_POST['prospect_dealer_email'], $_POST['prospect_dealer_password'])){
	
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
	$contact_mobilecarrier_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_mobilecarrier_id']));
	$contact_mobilecarrier_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_mobilecarrier_label']));
	$dmcontact2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2']));
	$dmcontact2_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_title']));
	$dmcontact2_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone']));
	$dmcontact2_phone_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone_label']));
	$dmcontact2_phone_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_phone_type']));
	$dmcontact2_mobilecarrier_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_mobilecarrier_id']));
	$dmcontact2_mobilecarrier_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dmcontact2_mobilecarrier_label']));
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



		$dlr_geo_latitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_geo_latitude']));
		$dlr_geo_longitude = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_geo_longitude']));
		$dlr_ok_googlemp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_ok_googlemp']));





	if($dealer_stillopenclose == 'Y'){
		$status = '1';
	}else{
		$status = '0';
	}


$fuel_pump_display = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['fuel_pump_display']));
$dcommercial_youtube_onoff_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dcommercial_youtube_onoff_label']));
$craigslist_nickname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['craigslist_nickname']));

$showPricing_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['showPricing_id']));
$showMileage = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['showMileage']));
$dealer_listingindex_displayprice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_listingindex_displayprice']));


  $update_prospectdlr_sql = "	
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
		`dlr_geo_latitude` = '$dlr_geo_latitude',
		`dlr_geo_longitude` = '$dlr_geo_longitude',
		`dlr_ok_googlemp` = '$dlr_ok_googlemp',
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


*/








}




?>
<?php include("inc.end.phpmsyql.php"); ?>
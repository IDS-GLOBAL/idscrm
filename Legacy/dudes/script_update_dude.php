<?php



if(isset($_POST['posted_dudeid'], $_POST['dudes_firstname'], $_POST['dudes_midname'], $_POST['dudes_lname'], $_POST['dudes_suffix'], $_POST['dudes_ssn'], $_POST['dudes_dob'], $_POST['dudes_jobposition_shift'], $_POST['dudes_region_id'], $_POST['dudes_dma_id'], $_POST['dudes_salespitch_template_id'], $_POST['dudes_workphone_active'], $_POST['dudes_workphone_prfx'], $_POST['dudes_workphone_no'], $_POST['dudes_workphone_type'], $_POST['dudes_workphone_companyown'], $_POST['dudes_workphone_contractorown'], $_POST['dudes_workphone_brand'], $_POST['dudes_workphone_mac_address'], $_POST['dudes_workphone_mac_address_ip'], $_POST['dudes_workphone_router_brand_id'], $_POST['dudes_workphone_router_serialno'], $_POST['dudes_workphone_router_modelno'], $_POST['dudes_workphone_date_shipped'], $_POST['dudes_workphone_date_received'], $_POST['dudes_workphone_purchase_cost'], $_POST['dudes_workphone_purchase_date'], $_POST['dudes_workphone2_prfx'], $_POST['dudes_workphone2_type'], $_POST['dudes_workphone2_type_label'], $_POST['dudes_workphone2_ext'], $_POST['dudes_workaddr1'], $_POST['dudes_workaddr2'], $_POST['dudes_workaddr_city'], $_POST['dudes_workaddr_zip'], $_POST['dudes_workaddr_zip4'], $_POST['dudes_workaddr_county'], $_POST['dudes_workaddr_country'], $_POST['dudes_homephone_no'], $_POST['dudes_home_addr'], $_POST['dudes_home_addr2'], $_POST['dudes_home_state'], $_POST['dudes_home_city'], $_POST['dudes_home_zipcode'], $_POST['dudes_Timezone'], $_POST['dudes_workstation_id'], $_POST['dudes_goal_weeklypresentations'], $_POST['dudes_goal_monthlypresentations'], $_POST['dudes_goal_deals_monthly'], $_POST['dudes_goal_retaindlrs_monthly'], $_POST['dudes_goal_newdlrs_monthly'], $_POST['dudes_goal_mnthly_commission'], $_POST['dudes_goal_daily_commission'], $_POST['dudes_goal_yearly_commission'], $_POST['dudes_goal_residual_commission'], $_POST['dudes_goal_addnewcars_tosystm'], $_POST['dudes_goal_vehicle_photos'], $_POST['dudes_goal_vehicle_windowstickers'], $_POST['dudes_goal_new_websites'], $_POST['dudes_goal_retain_outsideadagencys'], $_POST['dudes_goal_new_outsideadagencys'], $_POST['dudes_professional_motto'], $_POST['dudes_dudes_aboutme_toteam'], $_POST['dudes_dudes_aboutme_todealers'], $_POST['dudes_dudes_aboutme_tocompany'], $_POST['internal_comments_super_admin'])){ 







$posted_dudeid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['posted_dudeid']));

$dudes_firstname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_firstname']));
$dudes_midname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_midname']));
$dudes_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_lname']));
$dudes_suffix = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_suffix']));

/*
DISABLED BECAUSE I WANT THEM TO ACTUALLY VERIFY THEIR EMAILS WITHOUT MANUAL UPATING.
$ddudes_cellphone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_cellphone']));

$dudes_email_internal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_internal']));
$dudes_email_internal_verified = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_internal_verified']));
$dudes_email_internal_active = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_internal_active']));
$dudes_email_personal_verified = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_personal_verified']));
$dudes_email_personal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_personal']));

*/

$dudes_ssn = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_ssn']));
$dudes_dob = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_dob']));
$dudes_jobposition_shift = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_jobposition_shift']));
$dudes_region_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_region_id']));
$dudes_dma_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_dma_id']));
$dudes_salespitch_template_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_salespitch_template_id']));
$dudes_workphone_active = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_active']));
$dudes_workphone_prfx = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_prfx']));
$dudes_workphone_no = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_no']));
$dudes_workphone_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_type']));
$dudes_workphone_companyown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_companyown']));
$dudes_workphone_contractorown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_contractorown']));
$dudes_workphone_brand = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_brand']));
$dudes_workphone_mac_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_mac_address']));
$dudes_workphone_mac_address_ip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_mac_address_ip']));
$dudes_workphone_router_brand_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_router_brand_id']));
$dudes_workphone_router_serialno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_router_serialno']));
$dudes_workphone_router_modelno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_router_modelno']));
$dudes_workphone_date_shipped = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_date_shipped']));
$dudes_workphone_date_received = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_date_received']));
$dudes_workphone_purchase_cost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_purchase_cost']));
$dudes_workphone_purchase_date = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone_purchase_date']));
$dudes_workphone2_prfx = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone2_prfx']));
$dudes_workphone2_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone2_type']));
$dudes_workphone2_type_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone2_type_label']));
$dudes_workphone2_ext = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workphone2_ext']));
$dudes_workaddr1 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workaddr1']));
$dudes_workaddr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workaddr2']));
$dudes_workaddr_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workaddr_city']));
$dudes_workaddr_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workaddr_zip']));
$dudes_workaddr_zip4 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workaddr_zip4']));
$dudes_workaddr_county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workaddr_county']));
$dudes_workaddr_country = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workaddr_country']));
$dudes_homephone_no = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_homephone_no']));
$dudes_home_addr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_home_addr']));
$dudes_home_addr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_home_addr2']));
$dudes_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_home_state']));
$dudes_home_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_home_city']));
$dudes_home_zipcode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_home_zipcode']));
$dudes_Timezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_Timezone']));
$dudes_workstation_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_workstation_id']));
$dudes_goal_weeklypresentations = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_weeklypresentations']));
$dudes_goal_monthlypresentations = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_monthlypresentations']));
$dudes_goal_deals_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_deals_monthly']));
$dudes_goal_retaindlrs_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_retaindlrs_monthly']));
$dudes_goal_newdlrs_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_newdlrs_monthly']));
$dudes_goal_mnthly_commission = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_mnthly_commission']));
$dudes_goal_daily_commission = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_daily_commission']));
$dudes_goal_yearly_commission = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_yearly_commission']));
$dudes_goal_residual_commission = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_residual_commission']));
$dudes_goal_addnewcars_tosystm = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_addnewcars_tosystm']));
$dudes_goal_vehicle_photos = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_vehicle_photos']));
$dudes_goal_vehicle_windowstickers = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_vehicle_windowstickers']));
$dudes_goal_new_websites = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_new_websites']));
$dudes_goal_retain_outsideadagencys = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_retain_outsideadagencys']));
$dudes_goal_new_outsideadagencys = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_goal_new_outsideadagencys']));
$dudes_professional_motto = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_professional_motto']));
$dudes_dudes_aboutme_toteam = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_dudes_aboutme_toteam']));
$dudes_dudes_aboutme_todealers = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_dudes_aboutme_todealers']));
$dudes_dudes_aboutme_tocompany = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudes_dudes_aboutme_tocompany']));
$internal_comments_super_admin = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['internal_comments_super_admin']));



echo $create_dude_sql = "
UPDATE `idsids_idsdms`.`dudes` SET
`dudes_firstname` = '$dudes_firstname',
`dudes_midname` = '$dudes_midname',
`dudes_lname` = '$dudes_lname',
`dudes_suffix` = '$dudes_suffix',
`dudes_ssn` = '$dudes_ssn',
`dudes_dob` = '$dudes_dob',
`dudes_jobposition_shift` = '$dudes_jobposition_shift',
`dudes_region_id` = '$dudes_region_id',
`dudes_dma_id` = '$dudes_dma_id',
`dudes_salespitch_template_id` = '$dudes_salespitch_template_id',
`dudes_workphone_active` = '$dudes_workphone_active',
`dudes_workphone_prfx` = '$dudes_workphone_prfx',
`dudes_workphone_no` = '$dudes_workphone_no',
`dudes_workphone_type` = '$dudes_workphone_type',
`dudes_workphone_companyown` = '$dudes_workphone_companyown',
`dudes_workphone_contractorown` = '$dudes_workphone_contractorown',
`dudes_workphone_brand` = '$dudes_workphone_brand',
`dudes_workphone_mac_address` = '$dudes_workphone_mac_address',
`dudes_workphone_mac_address_ip` = '$dudes_workphone_mac_address_ip',
`dudes_workphone_router_brand_id` = '$dudes_workphone_router_brand_id',
`dudes_workphone_router_serialno` = '$dudes_workphone_router_serialno',
`dudes_workphone_router_modelno` = '$dudes_workphone_router_modelno',
`dudes_workphone_date_shipped` = '$dudes_workphone_date_shipped',
`dudes_workphone_date_received` = '$dudes_workphone_date_received',
`dudes_workphone_purchase_cost` = '$dudes_workphone_purchase_cost',
`dudes_workphone_purchase_date` = '$dudes_workphone_purchase_date',
`dudes_workphone2_prfx` = '$dudes_workphone2_prfx',
`dudes_workphone2_type` = '$dudes_workphone2_type',
`dudes_workphone2_label` = '$dudes_workphone2_type_label',
`dudes_workphone2_ext` = '$dudes_workphone2_ext',
`dudes_workaddr1` = '$dudes_workaddr1',
`dudes_workaddr2` = '$dudes_workaddr2',
`dudes_workaddr_city` = '$dudes_workaddr_city',
`dudes_workaddr_zip` = '$dudes_workaddr_zip',
`dudes_workaddr_zip4` = '$dudes_workaddr_zip4',
`dudes_workaddr_county` = '$dudes_workaddr_county',
`dudes_workaddr_country` = '$dudes_workaddr_country',
`dudes_homephone_no` = '$dudes_homephone_no',
`dudes_home_addr` = '$dudes_home_addr',
`dudes_home_addr2` = '$dudes_home_addr2',
`dudes_home_state` = '$dudes_home_state',
`dudes_home_city` = '$dudes_home_city',
`dudes_home_zipcode` = '$dudes_home_zipcode',
`dudes_Timezone` = '$dudes_Timezone',
`dudes_workstation_id` = '$dudes_workstation_id',
`dudes_goal_weeklypresentations` = '$dudes_goal_weeklypresentations',
`dudes_goal_monthlypresentations` = '$dudes_goal_monthlypresentations',
`dudes_goal_deals_monthly` = '$dudes_goal_deals_monthly',
`dudes_goal_retaindlrs_monthly` = '$dudes_goal_retaindlrs_monthly',
`dudes_goal_newdlrs_monthly` = '$dudes_goal_newdlrs_monthly',
`dudes_goal_mnthly_commission` = '$dudes_goal_mnthly_commission',
`dudes_goal_daily_commission` = '$dudes_goal_daily_commission',
`dudes_goal_yearly_commission` = '$dudes_goal_yearly_commission',
`dudes_goal_residual_commission` = '$dudes_goal_residual_commission',
`dudes_goal_addnewcars_tosystm` = '$dudes_goal_addnewcars_tosystm',
`dudes_goal_vehicle_photos` = '$dudes_goal_vehicle_photos',
`dudes_goal_vehicle_windowstickers` = '$dudes_goal_vehicle_windowstickers',
`dudes_goal_new_websites` = '$dudes_goal_new_websites',
`dudes_goal_retain_outsideadagencys` = '$dudes_goal_retain_outsideadagencys',
`dudes_goal_new_outsideadagencys` = '$dudes_goal_new_outsideadagencys',
`dudes_professional_motto` = '$dudes_professional_motto',
`dudes_dudes_aboutme_toteam` = '$dudes_dudes_aboutme_toteam',
`dudes_dudes_aboutme_todealers` = '$dudes_dudes_aboutme_todealers',
`dudes_dudes_aboutme_tocompany` = '$dudes_dudes_aboutme_tocompany',
`internal_comments_super_admin` = '$internal_comments_super_admin'
WHERE
`dudes_id` = '$posted_dudeid'
";



}


?>
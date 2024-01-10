<?php require_once('db_admin.php'); ?>
<?php

if($dudes_skillset_id != '9'){
  exit();
}

print_r($_POST);
// $_POST['ddudes_jobposition_title_text'], 

if(isset($_POST['posteddudes_id'], $_POST['ddudes_secret_token'], $_POST['ddudes_taxexempt'], $_POST['ddudes_status'], $_POST['ddudes_email_personal'], $_POST['ddudes_email_internal'],  $_POST['dokay_tosenddudereg'], $_POST['ddudes_email_internal_verified'], $_POST['ddudes_email_internal_active'], $_POST['ddudes_cellphone'], $_POST['ddudes_password'], $_POST['ddudes_username'],  $_POST['ddudes_hourlyrate'], $_POST['ddudes_fed_deductions'], $_POST['ddudes_state_deductions'], $_POST['ddudes_jobposition_title_text'], $_POST['ddudes_firstname'], $_POST['ddudes_midname'], $_POST['ddudes_lname'], $_POST['ddudes_suffix'], $_POST['ddudes_ssn'], $_POST['ddudes_dob'], $_POST['ddudes_access_level'], $_POST['ddudes_jobposition_shift'], $_POST['ddudes_region_id'], $_POST['ddudes_dma_id'], $_POST['ddudes_market_id'], $_POST['ddudes_submarket_id'], $_POST['ddudes_salespitch_template_id'], $_POST['ddudes_workphone_active'], $_POST['ddudes_workphone_prfx'], $_POST['ddudes_workphone_no'], $_POST['ddudes_workphone_type'], $_POST['ddudes_workphone_ext'], $_POST['ddudes_workphone_companyown'], $_POST['ddudes_workphone_contractorown'], $_POST['ddudes_workphone_brand'], $_POST['ddudes_workphone_mac_address'], $_POST['ddudes_workphone_mac_address_ip'], $_POST['ddudes_workphone_router_brand_id'], $_POST['ddudes_workphone_router_serialno'], $_POST['ddudes_workphone_router_modelno'], $_POST['ddudes_workphone_date_shipped'], $_POST['ddudes_workphone_date_received'], $_POST['ddudes_workphone_purchase_cost'], $_POST['ddudes_workphone_purchase_date'], $_POST['ddudes_workphone2_prfx'], $_POST['ddudes_workphone2_type'], $_POST['ddudes_workphone2_ext'], $_POST['ddudes_workaddr1'], $_POST['ddudes_workaddr2'], $_POST['ddudes_workaddr_city'], $_POST['ddudes_workaddr_zip'], $_POST['ddudes_workaddr_zip4'], $_POST['ddudes_workaddr_county'], $_POST['ddudes_workaddr_country'], $_POST['ddudes_homephone_no'], $_POST['ddudes_home_addr'], $_POST['ddudes_home_addr2'], $_POST['ddudes_home_state'], $_POST['ddudes_home_city'], $_POST['ddudes_home_zipcode'], $_POST['ddudes_Timezone'], $_POST['ddudes_workstation_id'], $_POST['ddudes_goal_weeklypresentations'], $_POST['ddudes_goal_monthlypresentations'], $_POST['ddudes_goal_deals_monthly'], $_POST['ddudes_goal_retaindlrs_monthly'], $_POST['ddudes_goal_newdlrs_monthly'], $_POST['ddudes_goal_mnthly_commission'], $_POST['ddudes_goal_daily_commission'], $_POST['ddudes_goal_yearly_commission'], $_POST['ddudes_goal_residual_commission'], $_POST['ddudes_goal_addnewcars_tosystm'], $_POST['ddudes_goal_vehicle_photos'], $_POST['ddudes_goal_vehicle_windowstickers'], $_POST['ddudes_goal_new_websites'], $_POST['ddudes_goal_retain_outsideadagencys'], $_POST['ddudes_goal_new_outsideadagencys'], $_POST['ddudes_professional_motto'], $_POST['ddudes_dudes_aboutme_toteam'], $_POST['ddudes_dudes_aboutme_todealers'], $_POST['ddudes_dudes_aboutme_tocompany'], $_POST['internal_comments_super_admin'])){ 


$posteddudes_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['posteddudes_id']));

$ddudes_secret_token = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_secret_token']));

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_ids_directory = "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.`dudes_secret_token` = '$ddudes_secret_token' ORDER BY dudes_id DESC";
$ids_directory = mysqli_query($idsconnection_mysqli, $query_ids_directory);
$row_ids_directory = mysqli_fetch_array($ids_directory);
$totalRows_ids_directory = mysqli_num_rows($ids_directory);


$foundDudesid = $row_ids_directory['dudes_id'];


$founddudes_secret_token = $row_ids_directory['dudes_secret_token'];

$dudes_public_token  = $row_ids_directory['dudes_public_token'];



$dudes_username = $row_ids_directory['dudes_username'];
$dudes_password = $row_ids_directory['dudes_password'];
$dudes_status = $row_ids_directory['dudes_status'];






// $dudes_workphone2_type_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone2_type_label']));

// `dudes_workphone2_label` = '$dudes_workphone2_type_label',

$dudes_username = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_username']));
$dudes_password = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_password']));
$dudes_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_status']));
$dudes_firstname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_firstname']));
$dudes_midname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_midname']));
$dudes_lname = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_lname']));
$dudes_suffix = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_suffix']));

$ddudes_cellphone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_cellphone']));


$dudes_email_internal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_internal']));
$dudes_email_internal_verified = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_internal_verified']));
$dudes_email_internal_active = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_internal_active']));
$dudes_email_personal_verified = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_personal_verified']));
$dudes_email_personal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_email_personal']));

$dudes_ssn = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_ssn']));
$dudes_dob = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_dob']));
$dudes_jobposition_shift_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_jobposition_shift_id']));
$dudes_jobposition_shift = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_jobposition_shift']));
$dudes_salespitch_template_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_salespitch_template_id']));


$dudes_team_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_team_id']));
$dudes_team_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_team_name']));

$dudes_region_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_region_id']));
$dudes_region_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_region_name']));

$dudes_dma_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_dma_id']));
$dudes_salespitch_template_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_salespitch_template_id']));
$dudes_workphone_active = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_active']));
$dudes_workphone_prfx = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_prfx']));
$dudes_workphone_no = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_no']));
$dudes_workphone_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_type']));
$dudes_workphone_ext = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_ext']));
$dudes_workphone_companyown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_companyown']));
$dudes_workphone_contractorown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_contractorown']));
$dudes_workphone_brand = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_brand']));
$dudes_workphone_mac_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_mac_address']));
$dudes_workphone_mac_address_ip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_mac_address_ip']));
$dudes_workphone_router_brand_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_router_brand_id']));
$dudes_workphone_router_serialno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_router_serialno']));
$dudes_workphone_router_modelno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_router_modelno']));
$dudes_workphone_date_shipped = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_date_shipped']));
$dudes_workphone_date_received = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_date_received']));
$dudes_workphone_purchase_cost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_purchase_cost']));
$dudes_workphone_purchase_date = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone_purchase_date']));
$dudes_workphone2_prfx = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone2_prfx']));
$dudes_workphone2_type = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone2_type']));
$dudes_workphone2_ext = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workphone2_ext']));
$dudes_workaddr1 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workaddr1']));
$dudes_workaddr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workaddr2']));
$dudes_workaddr_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workaddr_city']));
$dudes_workaddr_zip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workaddr_zip']));
$dudes_workaddr_zip4 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workaddr_zip4']));
$dudes_workaddr_county = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workaddr_county']));
$dudes_workaddr_country = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workaddr_country']));
$dudes_homephone_no = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_homephone_no']));
$dudes_home_addr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_home_addr']));
$dudes_home_addr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_home_addr2']));
$dudes_home_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_home_state']));
$dudes_home_city = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_home_city']));
$dudes_home_zipcode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_home_zipcode']));
$dudes_Timezone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_Timezone']));
$dudes_workstation_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_workstation_id']));
$dudes_goal_weeklypresentations = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_weeklypresentations']));
$dudes_goal_monthlypresentations = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_monthlypresentations']));
$dudes_goal_deals_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_deals_monthly']));
$dudes_goal_retaindlrs_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_retaindlrs_monthly']));
$dudes_goal_newdlrs_monthly = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_newdlrs_monthly']));
$dudes_goal_mnthly_commission = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_mnthly_commission']));
$dudes_goal_daily_commission = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_daily_commission']));
$dudes_goal_yearly_commission = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_yearly_commission']));
$dudes_goal_residual_commission = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_residual_commission']));
$dudes_goal_addnewcars_tosystm = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_addnewcars_tosystm']));
$dudes_goal_vehicle_photos = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_vehicle_photos']));
$dudes_goal_vehicle_windowstickers = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_vehicle_windowstickers']));
$dudes_goal_new_websites = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_new_websites']));
$dudes_goal_retain_outsideadagencys = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_retain_outsideadagencys']));
$dudes_goal_new_outsideadagencys = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_goal_new_outsideadagencys']));
$dudes_professional_motto = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_professional_motto']));
$dudes_dudes_aboutme_toteam = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_dudes_aboutme_toteam']));
$dudes_dudes_aboutme_todealers = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_dudes_aboutme_todealers']));
$dudes_dudes_aboutme_tocompany = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_dudes_aboutme_tocompany']));

$ddudes_hourlyrate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_hourlyrate']));
$dudes_fed_deductions = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_fed_deductions']));
$ddudes_state_deductions = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_state_deductions']));

$dudes_jobposition_title_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_jobposition_title_id']));
$dudes_jobposition_title = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_jobposition_title_text']));

$ddudes_taxexempt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['ddudes_taxexempt']));
$internal_comments_super_admin = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['internal_comments_super_admin']));













$update_dude_sql = "
UPDATE `idsids_idsdms`.`dudes` SET
`dudes_secret_token` = '$ddudes_secret_token',
`dudes_public_token`  = '$tkey',
`dudes_username` = '$dudes_username',
`dudes_password` = '$dudes_password',
`dudes_status` = '$dudes_status',
`dudes_firstname` = '$dudes_firstname',
`dudes_midname` = '$dudes_midname',
`dudes_lname` = '$dudes_lname',
`dudes_suffix` = '$dudes_suffix',
`dudes_cellphone` = '$ddudes_cellphone',
`dudes_ssn` = '$dudes_ssn',
`dudes_dob` = '$dudes_dob',
`dudes_access_level` = '$dudes_access_level',
`dudes_email_internal` = '$dudes_email_internal',
`dudes_email_internal_verified` = '$dudes_email_internal_verified',
`dudes_email_internal_active` = '$dudes_email_internal_active',
`dudes_email_personal` = '$dudes_email_personal',
`dudes_email_personal_verified` = '$dudes_email_personal_verified',
`dudes_jobposition_title_id` = '$dudes_jobposition_title_id',
`dudes_jobposition_title` = '$dudes_jobposition_title',
`dudes_jobposition_shift_id` = '$dudes_jobposition_shift_id',
`dudes_jobposition_shift` = '$dudes_jobposition_shift',
`dudes_team_id` = '$dudes_team_id',
`dudes_team_name` = '$dudes_team_name',
`dudes_region_id` = '$dudes_region_id',
`dudes_region_name` = '$dudes_region_name',
`dudes_dma_id` = '$dudes_dma_id',
`dudes_salespitch_template_id` = '$dudes_salespitch_template_id',
`dudes_workphone_active` = '$dudes_workphone_active',
`dudes_workphone_prfx` = '$dudes_workphone_prfx',
`dudes_workphone_no` = '$dudes_workphone_no',
`dudes_workphone_type` = '$dudes_workphone_type',
`dudes_workphone_ext` = '$ddudes_workphone_ext',
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
`dudes_hourlyrate` = '$ddudes_hourlyrate',
`dudes_fed_deductions` = '$dudes_fed_deductions',
`dudes_state_deductions` = '$dudes_state_deductions',
`dudes_taxexempt` = '$dudes_taxexempt',
`internal_comments_super_admin` = '$internal_comments_super_admin'
WHERE
`dudes_id` = '$posteddudes_id'
";






//echo $update_dude_sql;
$run_update_dude_sql = mysqli_query($idsconnection_mysqli, $update_dude_sql);



echo "
<script>
setTimeout(function(){

			window.location.href = 'company.directory.php'; 

    },3000);
</script>
";







}


?>
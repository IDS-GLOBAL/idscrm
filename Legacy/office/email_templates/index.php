<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 



$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_faith";
$password_tracking = "benjamin2831";
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking, $password_tracking) or trigger_error(mysql_error(),E_USER_ERROR); 




$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 






?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Usernamemobi'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Usernamemobi'], $_SESSION['MM_UserGroupmobi'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php





$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.`dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);

$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}


$dudes_public_token  = $row_userDudes['dudes_public_token'];
$dudes_facebook_id = $row_userDudes['dudes_facebook_id'];

$dudes_facebook_deny  = $row_userDudes['dudes_facebook_deny'];
$dudes_facebook_email  = $row_userDudes['dudes_facebook_email'];
$dudes_facebook_name  = $row_userDudes['dudes_facebook_name'];

$dudes_dob = $row_userDudes['dudes_dob'];

$dudes_prefix_name  = $row_userDudes['dudes_prefix_name'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";

$dealerTimezone = $row_userDudes['dudes_Timezone'];


$dudes_dob  = $row_userDudes['dudes_dob'];
$dudes_status  = $row_userDudes['dudes_status'];


$dudes_access_level  = $row_userDudes['dudes_access_level'];
$dudes_skillset_id = $row_userDudes['dudes_skillset_id'];

$dudes_email_internal = $row_userDudes['dudes_email_internal'];

$dudes_email_internal_verified  = $row_userDudes['dudes_email_internal_verified'];
$dudes_email_internal_active  = $row_userDudes['dudes_email_internal_active'];
$dudes_home_state = $row_userDudes['dudes_home_state'];
$dudes_email_personal = $row_userDudes['dudes_email_personal'];
$dudes_email_personal_verified  = $row_userDudes['dudes_email_personal_verified'];
$dudes_jobposition_title  = $row_userDudes['dudes_jobposition_title'];
$dudes_jobposition_shift  = $row_userDudes['dudes_jobposition_shift'];
$dudes_team_id  = $row_userDudes['dudes_team_id'];
$dudes_team_name  = $row_userDudes['dudes_team_name'];
$dudes_dma_id  = $row_userDudes['dudes_dma_id'];
$dudes_dma_name  = $row_userDudes['dudes_dma_name'];
$dudes_market_id = $row_userDudes['dudes_market_id'];
$dudes_market_id  = $row_userDudes['dudes_market_id'];
$dudes_market_name  = $row_userDudes['dudes_market_name'];
$dudes_submarket_id  = $row_userDudes['dudes_submarket_id'];
$dudes_submarket_name  = $row_userDudes['dudes_submarket_name'];
$dudes_department_id  = $row_userDudes['dudes_department_id'];
$dudes_department_name  = $row_userDudes['dudes_department_name'];
$dudes_salespitch_template_id  = $row_userDudes['dudes_salespitch_template_id'];
$dudes_cellphone  = $row_userDudes['dudes_cellphone'];
$dudes_workphone_active  = $row_userDudes['dudes_workphone_active'];

$dudes_Timezone = $row_userDudes['dudes_Timezone'];

if($dudes_skillset_id != '9'){
  //header("Location: $MM_restrictGoTo");
}


if($dealerTimezone){
$zone_from ='America/Chicago';
$zone_to= $dealerTimezone;
}else{
$zone_from ='America/Chicago';
$zone_to='America/New_York';
}
//date_default_timezone_set($zone_from);

//  $convert_date="2016-04-09 19:51:03";

//  echo $finalDate=zone_conversion_date($convert_date, $zone_from, $zone_to);


function zone_conversion_date($time, $cur_zone, $req_zone)
{   
	global $zone_from;
	global $zone_to;

    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_from);
    $local = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_to);
    $required = date("Y-m-d H:i:s");

    /* return $required; */
    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");

    return $timestamp = $date->format("Y-m-d H:i:s");
}

function get_Datetime_Now() {
	
	global $zone_to;
	
	$tz_object = new DateTimeZone($zone_to);
	//date_default_timezone_set('America/New_York');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');		//06-18-2014 08:49:34
	return $datetime->format('Y\-m\-d\ h:i:s');  	//2014-06-18 08:47:46
	//return $datetime->format('Y\/m\/d\ ');  		//2014/06/18

}

$timevar = get_Datetime_Now();




$server_time = zone_conversion_date($timevar, $zone_from, $zone_to);



foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}



	$tkey = bin2hex(openssl_random_pseudo_bytes(10));


/*
**  Right here wer are dominiating the template 
**  when we pull it when are customizing it.
**  
**
**
*/
$colname_pulltemplate = "-1";
if (isset($_GET['templateid'])) {
  $colname_pulltemplate = $_GET['templateid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pulltemplate =  "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE `dudes_sys_htmlemail_templates`.`id` = '$colname_pulltemplate'";
$pulltemplate = mysqli_query($idsconnection_mysqli, $query_pulltemplate);
$row_pulltemplate = mysqli_fetch_array($pulltemplate);
$totalRows_pulltemplate = mysqli_num_rows($pulltemplate);

$email_systm_templates_body = $row_pulltemplate['email_systm_templates_body'];
/*
**  Now Below this everythins on ripping out the template will begin
**  Here's a legend right here for you.  12-01-2016
**  
**
**
*/















// To Find A Sing Dealer 
$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_query =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `id` = '$colname_dealer_query'";
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);
$row_dealer_query = mysqli_fetch_array($dealer_query);
$totalRows_dealer_query = mysqli_num_rows($dealer_query);
$thisdid = $row_dealer_query['id'];
$dealer_email = $row_dealer_query['email'];
$dealer_company_name = $row_dealer_query['company'];














$colname_prspct_dealers = "-1";
if (isset($_GET['dlr_prspct'])) {
  $colname_prspct_dealers = $_GET['dlr_prspct'];
}
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_prspct_dealers =  "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `dealer_prospects`.`id` = '$colname_prspct_dealers' LIMIT 1";
$prspct_dealers = mysqli_query($tracking_mysqli, $query_prspct_dealers);
$row_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$totalRows_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$state_prospect = $colname_prspct_dealers;
$dlr_prspct_id = $row_prspct_dealers['id'];
$dealer_company_email_login = $row_prspct_dealers['email'];



    //$dealerinvitation_package  = $row_prspct_dealers['email'];

	//$verify_dealeremail  = $row_prspct_dealers['email'];

	//$verify_dudesemail  = $row_prspct_dealers['email'];
 
	

	$dealer_company_address  = $row_prspct_dealers['address'];

	$dealer_company_city  = $row_prspct_dealers['city'];

	$dealer_company_state  = $row_prspct_dealers['state'];

	$dealer_company_zip  = $row_prspct_dealers['zip'];

	$dealer_company_country  = $row_prspct_dealers['country'];

	$dealer_company_email_login  = $row_prspct_dealers['email'];

	$dealer_company_username  = $row_prspct_dealers['username'];

	$dealer_contact1_title  = $row_prspct_dealers['contact_title'];

	$dealer_contact1_fullname  = $row_prspct_dealers['contact'];

	$dealer_contact1_phone  = $row_prspct_dealers['contact_phone'];

	$dealer_contact1_phone_type  = $row_prspct_dealers['contact_phone_type'];

	$dealer_contact2_fullname  = $row_prspct_dealers['dmcontact2'];

	$dealer_contact2_title  = $row_prspct_dealers['dmcontact2_title'];

	$dealer_contact2_phone  = $row_prspct_dealers['dmcontact2_phone'];

	$dealer_contact2_phone_type  = $row_prspct_dealers['dmcontact2_phone_type'];

	$dealer_company_name  = $row_prspct_dealers['company'];

	$dealer_company_legalname  = $row_prspct_dealers['company_legalname'];

	$dealer_dealerTimezone  = $row_prspct_dealers['dealerTimezone'];

	$dealer_website  = $row_prspct_dealers['website'];

	$dealer_finance_name  = $row_prspct_dealers['finance'];

	$dealer_finance_contact  = $row_prspct_dealers['finance_contact'];
	
	$dealer_finance_contact_email = $row_prspct_dealers['finance_contact_email'];

	$dealer_salesperson_name  = $row_prspct_dealers['sales'];

	$dealer_sales_contact_name  = $row_prspct_dealers['sales'];

	$dealer_sales_contact_phone  = $row_prspct_dealers['sales_contact'];


	$dealer_sales_contact_fax  = $row_prspct_dealers['fax'];

	$dealer_company_token  = $row_prspct_dealers['token'];

	$dealer_company_home_html  = $row_prspct_dealers['home'];

	$dealer_company_about_html  = $row_prspct_dealers['about'];

	$dealer_company_directions_html  = $row_prspct_dealers['directions'];

	$dealer_company_contactus_html  = $row_prspct_dealers['contactus'];


	$dealer_company_slogan  = $row_prspct_dealers['slogan'];

	$dealer_company_disclaimer  = $row_prspct_dealers['disclaimer'];










$email_systm_templates_body = str_replace("{dealer_company_address}","$dealer_company_address","$email_systm_templates_body");


$email_systm_templates_body = str_replace("{dealer_company_city}","$dealer_company_city","$email_systm_templates_body");


$email_systm_templates_body = str_replace("{dealer_company_state}","$dealer_company_state","$email_systm_templates_body");



	
	
	
$email_systm_templates_body = str_replace("{dealer_company_zip}","$dealer_company_zip","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_country}","$dealer_company_country","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_email_login}","$dealer_company_email_login","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_username}","$dealer_company_username","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_contact1_title}","dealer_contact1_title","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_contact1_fullname}","$dealer_contact1_fullname","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_contact1_phone}","$dealer_contact1_phone","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_contact1_phone_type}","$dealer_contact1_phone_type","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_contact2_fullname}","$dealer_contact2_fullname","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_contact2_title}","$dealer_contact2_title","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_contact2_phone}","$dealer_contact2_phone","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_contact2_phone_type}","$dealer_contact2_phone_type","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_name}","$dealer_company_name","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_legalname}","$dealer_company_legalname","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_dealerTimezone}","$dealer_dealerTimezone","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_website}","$dealer_website","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_finance_name}","$dealer_finance_name","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_finance_contact}","$dealer_finance_contact","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_salesperson_name}","$dealer_salesperson_name","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_sales_contact_name}","$dealer_sales_contact_name","$email_systm_templates_body");



	
$email_systm_templates_body = str_replace("{dealer_sales_contact_phone}","$dealer_sales_contact_phone","$email_systm_templates_body");


	
$email_systm_templates_body = str_replace("{dealer_sales_contact_fax}","$dealer_sales_contact_fax","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_token}","$dealer_company_token","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_home_html}","$dealer_company_home_html","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_about_html}","$dealer_company_about_html","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_directions_html}","$dealer_company_directions_html","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_contactus_html}","$dealer_company_contactus_html","$email_systm_templates_body");

	

	
$email_systm_templates_body = str_replace("{dealer_company_slogan}","$dealer_company_slogan","$email_systm_templates_body");

	
$email_systm_templates_body = str_replace("{dealer_company_disclaimer}","$dealer_company_disclaimer","$email_systm_templates_body");






















// Had To Manually add tokens up to ID 12 make sure at the time of dudes creation.
// We are getting tokens.
$dealerinvitation_package = "<a href='https://idscrm.com/verify.php?secret=$dealer_company_token&token=$dudes_public_token'>https://idscrm.com/verify.php?secret=$dealer_company_token&token=$dudes_public_token</a>";

//$dealerinvitation_package = "https://idscrm.com/verify.php?secret=$tkey&token=$dudes_public_token";




	$verify_dudesemail = "<a href='https://idscrm.com/verify.php?token=$dudes_public_token'>https://idscrm.com/verify.php?token=$dudes_public_token</a>";


	$verify_dealeremail = "<a href='https://idscrm.com/verify.php?secret=$dudes_public_token'>https://idscrm.com/verify.php?secret=$dealer_company_token</a>";




 


$email_systm_templates_body = str_replace("{dealerinvitation_package}","$dealerinvitation_package  \n\n","$email_systm_templates_body");


 
$email_systm_templates_body = str_replace("{dealer_company_email_login}","$dealer_company_email_login","$email_systm_templates_body");


$email_systm_templates_body = str_replace("{dealer_company_name}","$dealer_company_name","$email_systm_templates_body");


?>
<?php
echo $email_systm_templates_body;

$steel = "<html>
	<head>
    </head>
    <body>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='center' valign='top'>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='left'>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='left' valign='bottom' style='line-height:11px;font-size:10px;font-family:Arial,Helvetica,sans-serif;padding-bottom:5px;padding-left:15px;padding-right:0px;padding-top:5px;color:#888888'><a id='cdnemailview' href='#' style='color:#28acff' target='_blank' title='This external link will open in a new window'>Preview In Broswer</a></td>
</tr>
</tbody></table>
<table width='100%' bgcolor='#ffffff' border='0' cellpadding='5' cellspacing='0'><tbody><tr><td style='font-family:Arial;font-size:13px'></td></tr></tbody></table>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='center'><table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='center'><table width='336' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td width='168' align='left' valign='top' bgcolor='#e51c24' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-align:center'><a href='http://www.idscrm.com' style='text-decoration:none;color:#ffffff' target='_blank' title='This external link will open in a new window'><img src='https://idscrm.com/css/images/email-idsbox-template-top.jpg' alt='IDSCRM' width='168' height='73' border='0' style='display:block'></a></td>
<td width='84' align='left' valign='top' bgcolor='#e51c24' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-align:center'><a href='https://idscrm.com/dealers/inventory.php?vstat=1' style='text-decoration:none;color:#ffffff' target='_blank' title='This external link will open in a new window'><img src='https://idscrm.com/css/images/email-idsbox-inventory.jpg' alt='Inventory' width='84' height='73' border='0' style='display:block'></a></td>
<td width='84' align='left' valign='top' bgcolor='#e51c24' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-align:center'><a href='https://idscrm.com/dealers/leads.php' style='text-decoration:none;color:#ffffff' target='_blank' title='This external link will open in a new window'><img src='https://idscrm.com/css/images/email-idsbox-leads.jpg' alt='Leads' width='84' height='73' border='0' style='display:block'></a></td>
</tr>
</tbody></table>
</td>
<td><table width='264' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td width='112' align='left' valign='top' bgcolor='#e51c24' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-align:center'><a href='https://idscrm.com/dealers/credit-apps.php' style='text-decoration:none;color:#ffffff' target='_blank' title='This external link will open in a new window'><img src='https://idscrm.com/css/images/email-idsbox-template-applications.jpg' alt='Credit Applications' width='112' height='73' border='0' style='display:block'></a></td>
<td width='152' align='left' valign='top' bgcolor='#e51c24' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#ffffff;text-align:center'><a href='https://idscrm.com/dealers/deals.php'><img src='http://idscrm.com/css/images/email-idsbox-cardeals.jpg' alt='My Car Deals' width='152' height='73' border='0' style='display:block'></a></td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td><table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td width='1' bgcolor='#C4C4C4' valign='top'><img style='display:block' src='http://idscrm.com/css/images/cleardot.gif' width='1' height='1'></td>
<td width='10'>&nbsp;</td>
<td width='580' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:normal;color:#666666;text-decoration:none;line-height:16px;padding-bottom:10px'>
<p>Enter Your Information Here</p>
</td>
<td width='10'>&nbsp;</td>
<td width='1' bgcolor='#C4C4C4' valign='top'><img style='display:block' src='http://idscrm.com/css/images/cleardot.gif' width='1' height='1' border='0'></td>    
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='left' width='600' bgcolor='#000000'><img src='http://idscrm.com/css/images/bottom-blackbar.jpg' width='600' height='6' border='0' style='display:block'></td>
</tr>
</tbody></table>
<table width='600' border='0' cellspacing='0' cellpadding='0' bgcolor='#fcb040'>
<tbody><tr>
<td align='left' valign='bottom' style='font-weight:bold;font-size:13px;font-family:Arial,Helvetica,sans-serif;padding-bottom:0px;padding-left:15px;padding-right:12px;padding-top:15px;text-decoration:none;color:#d60c16'>
Contact Us: <a href='tel:+4045654371'>(404) 565-4371</a> - or - Visit Our Website: <a href='https://idscrm.com'>idscrm.com</a></td>
</tr>
<tr>
<td><table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td width='600' align='left' valign='bottom' style='color:#ffffff;font-size:12px;font-family:Arial,Helvetica,sans-serif;padding-bottom:0px;padding-left:15px;padding-right:0px;padding-top:2px'>Request A Demo  <a href='https://idscrm.com/#getademo' style='color:#E42910; font-weight:bold;' target='_blank' title='This external link will open in a new window'>Here</a>.</td>
</tr>
</tbody></table></td>
</tr>
<tr>
<td width='600' align='left' valign='bottom' style='color:#ffffff;line-height:16px;font-size:11px;font-family:Arial,Helvetica,sans-serif;padding-bottom:10px;padding-left:15px;padding-right:15px;padding-top:10px'>&copy; Copyright 2016 (IDS) INTERGRATED DEALER SYSTEMS, LLC. All rights reserved.<br>
Visit Us: <a href='https:///idscrm.com/#contact' style='font-family:Arial,Helvetica,sans-serif;font-size:11px;font-weight:bold;color:#2424D8;text-decoration:underline;line-height:16px' target='_blank' title='This external link will open in a new window'><span style='color:#2424D8'>Contact Us</span></a>, <a href='https:///idscrm.com/termsofuse.php' style='font-family:Arial,Helvetica,sans-serif;font-size:11px;font-weight:bold;color:#2424D8;text-decoration:underline;line-height:16px' target='_blank' title='This external link will open in a new window'><span style='color:#2424D8'>Terms of Use</span></a> and <a href='http://idscrm.com/privacy.php' style='font-family:Arial,Helvetica,sans-serif;font-size:11px;font-weight:bold;color:#2424D8;text-decoration:underline;line-height:16px' target='_blank' title='This external link will open in a new window'><span style='color:#2424D8'>Privacy Policy</span></a>.<br>
(IDS) INTERGRATED DEALER SYSTEMS LLC. | Atlanta, GA</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
    </body>
</html>
";
?>




<?php
mysqli_free_result($pulltemplate);
?>

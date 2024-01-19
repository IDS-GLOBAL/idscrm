<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection = mysql_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection) or trigger_error(mysql_error(),E_USER_ERROR); 



$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_faith";
$password_tracking = "benjamin2831";
$tracking = mysql_connect($hostname_tracking, $username_tracking, $password_tracking) or trigger_error(mysql_error(),E_USER_ERROR); 
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking, $password_tracking) or trigger_error(mysql_error(),E_USER_ERROR); 




$hostname_wfh_connection = "localhost";
$database_wfh_connection = "idsids_wefinancehere";
$username_wfh_connection = "idsids_wefinance";
$password_wfh_connection = "yrBIBVwHt)6p";
$wfh_connection = mysql_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
$wfh_connection_mysqli = mysqli_connect($hostname_wfh_connection, $username_wfh_connection, $password_wfh_connection) or trigger_error(mysql_error(),E_USER_ERROR); 





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
$query_userDudes =  "SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];


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


// To Find A Sing Dealer 
$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_query =  "SELECT * FROM `dealers` WHERE `id` = %s", GetSQLValueString($colname_dealer_query, "int"));
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);
$row_dealer_query = mysqli_fetch_array($dealer_query);
$totalRows_dealer_query = mysqli_num_rows($dealer_query);
$thisdid = $row_dealer_query['id'];
$dealer_email = $row_dealer_query['email'];



$colname_prspct_dealers = "-1";
if (isset($_GET['dlr_prspct'])) {
  $colname_prspct_dealers = $_GET['dlr_prspct'];
}
mysql_select_db($database_tracking, $tracking);
$query_prspct_dealers =  "SELECT * FROM `dealer_prospects` WHERE `id` = %s ORDER BY `state` ASC", GetSQLValueString($colname_prspct_dealers, "text"));
$prspct_dealers = mysqli_query($idsconnection_mysqli, $query_prspct_dealers, $tracking);
$row_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$totalRows_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$state_prospect = $colname_prspct_dealers;
$dlr_prspct_id = $row_prspct_dealers['id'];


//chdir(dirname(__FILE__));
if(isset($_POST)){
//print_r($_POST);
}

if(!$_FILES){
//print_r($_FILES);
exit;
}


$log ="";
@$ip = $_SERVER['REMOTE_ADDR'];

@$query_string = $_SERVER['QUERY_STRING'];

@$http_referer = $_SERVER['HTTP_REFERER'];

@$http_user_agent = $_SERVER['HTTP_USER_AGENT'];

$mobileuserjs = "var ismobile=navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i)";

	$log .= ' ["IP: '.$ip.'QueryString: '.$query_string.', HttpRefer: '.$http_referer.', HttpUserAgent: '.$http_user_agent.'"] ';


$mobiledevice = "None";
$browser = 'Unknown';

//http://www.htmlgoodies.com/beyond/webmaster/toolbox/article.php/3888106/How-Can-I-Detect-the-iPhone--iPads-User-Agent.htm
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
 {
  //header('Location: http://yoursite.com/iphone');
  //exit();
	$log .=   $mobiledevice = "iPhone/Ipod";
}

if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') || strstr($_SERVER['HTTP_USER_AGENT'],'android'))
 {
  //header('Location: http://yoursite.com/iphone');
  //exit();
	$log .=  $mobiledevice = "Android";
}

//http://echopx.com/notes/browser-detection-ie-firefox-safari-chrome
if(strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$log .= $browser = "Internet Explorer";
 }

if(strstr($_SERVER["HTTP_USER_AGENT"], 'Firefox'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$log .= $browser = "Firefox";
 }


if(strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') || strstr($_SERVER['HTTP_USER_AGENT'],'Safari'))
 {

	//$msie = strstr($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
	$log .= $browser = "Safari/Chrome";
 }







	// Make Dudes Folder
	if (!file_exists("../../vehicles/photos/media/$dudesid")) {
		mkdir("../../vehicles/photos/media/$dudesid", 0777, true);
	}

	// Make Media Folder
	if (!file_exists("../../vehicles/photos/media/$dudesid/media")) {
		mkdir("../../vehicles/photos/media/$dudesid/media", 0777, true);
		
	}










if ($_FILES['file']['name']) {




	$fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];

    $tempFile = $_FILES['file']['tmp_name'];
	//list($vphotowidth, $vphotoheight) = getimagesize( $_FILES['file']['tmp_name']);





            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
				$fileupload = $name . '.' . $ext[1];
                $destination = 'images/' . $filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];
                $dudesid_photo_file_path = "../../vehicles/photos/media/$dudesid/media/" . $filename;//change this URL

				$photo_file_path = "../../vehicles/photos/media/$dudesid/media/$fileupload";
			
				$photo_thumb_fpath = "../../vehicles/photos/media/$dudesid/media/$fileupload";

                //move_uploaded_file($location, $destination);
                move_uploaded_file($location, $dudesid_photo_file_path);




				//echo $open_url = "https://images.autocitymag.com/media/"."$dudesid/media/$fileupload";
				
				$log .= '<a hrer="'.$open_url.'">'.$open_url.'</a>';


        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		$tkey=mysql_real_escape_string(trim($tkey));

				$insert_dudesidphoto_sql = "
				INSERT INTO	`idsids_tracking_idsvehicles`.`dudes_mediaphotos` SET
						`dudesid_dudesid` = '$dudesid',
						`dudesid_photo_teamid` = '',
						`dudesid_photo_status` = '1',
						`dudesid_photo_likes` = '0',
						`dudesid_photo_abuses` = '0',
						`dudesid_photo_byip` = '$ip',
						`dudesid_photo_bymobile` = '$mobiledevice',
						`dudesid_photo_bybrowser` = '$browser',
						`dudesid_photo_geo_latitude` = '',
						`dudesid_photo_geo_longitude` = '',
						`dudesid_photo_album_token` = '$tkey',
						`dudesid_photo_albumname` = '',
						`dudesid_photo_albumcomments` = '...',
						`dudesid_photo_datetaken` = '',
						`dudesid_photo_sort_orderno` = '',
						`dudesid_photo_added_bywho` = '$myname',
						`dudesid_photo_token` = '$tkey',
						`dudesid_photo_file_name` = '$fileupload',
						`dudesid_photo_open_url` = '$open_url',
						`dudesid_photo_file_path` = '$dudesid_photo_file_path',
						`dudesid_photo_file_width` = '',
						`dudesid_photo_file_height` = '',	
						`dudesid_photo_thumb_fname` = '$fileupload',
						`dudesid_photo_caption` = '...'
				";

	$result_dudesidphoto_sql = mysqli_query($idsconnection_mysqli, $insert_dudesidphoto_sql, $tracking);


				echo $open_url = "https://images.autocitymag.com/media/"."$dudesid/media/$fileupload";



	$log_cat_body = mysql_real_escape_string(trim($log));
	
	$run_log_cat_sql ="INSERT INTO `idsids_tracking_idsvehicles`.`dudes_activity` SET
							`dudes_dlr_dude_id` = '$dudesid',
							`dudes_dlr_dude_name` = '$myname',
							`dudes_dlr_body` = '$log_cat_body'
							
						";

	$result_log_cat_sql = mysqli_query($idsconnection_mysqli, $run_log_cat_sql, $tracking);















            }
            else
            {
              echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }













}

?>
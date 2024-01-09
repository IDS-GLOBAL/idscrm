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






if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";
// *** Restrict Access To Page: Grant or deny access to this page
// http://webapplayers.com/inspinia_admin-v2.5/
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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
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

$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`email` = '$colname_userDets'";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere
$company = $row_userDets['company'];
$dealer_email = $row_userDets['email'];
$dealer_state = $row_userDets['state'];
$dealer_market_id = $row_userDets['dealer_market_id'];
$dealer_market_sub_id = $row_userDets['dealer_market_sub_id'];
// Start All For Time Zone

$dealerTimezone = $row_userDets['dealerTimezone'];

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



chdir(dirname(__FILE__));
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









	// Make Dealer Folder
	if (!file_exists("../../vehicles/photos/$did")) {
		mkdir("../../vehicles/photos/$did", 0777, true);
	}

	// Make Media Folder
	if (!file_exists("../../vehicles/photos/$did/media")) {
		mkdir("../../vehicles/photos/$did/media", 0777, true);
		
	}



        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		$tkey = mysqli_real_escape_string($idsconnection_mysqli, trim($tkey));







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
                $did_photo_file_path = "../../vehicles/photos/$did/media/" . $filename;//change this URL

				$photo_file_path = "../../vehicles/photos/$did/media/$fileupload";
			
				$photo_thumb_fpath = "../../vehicles/photos/$did/media/$fileupload";

                //move_uploaded_file($location, $destination);
                move_uploaded_file($location, $did_photo_file_path);




				echo $open_url = "https://images.autocitymag.com/"."$did/media/$fileupload";
				
				$log .= '<a hrer="'.$open_url.'">'.$open_url.'</a>';

				$insert_didphoto_sql = "
				INSERT INTO	`idsids_idsdms`.`dealers_photos` SET
						`did_photo_did` = '$did',
						`did_photo_status` = '1',
						`did_photo_likes` = '0',
						`did_photo_abuses` = '0',
						`did_photo_byip` = '$ip',
						`did_photo_bymobile` = '$mobiledevice',
						`did_photo_bybrowser` = '$browser',
						`did_photo_geo_latitude` = '',
						`did_photo_geo_longitude` = '',
						`did_photo_album_token` = '$tkey',
						`did_photo_albumname` = 'Email',
						`did_photo_albumcomments` = '...',
						`did_photo_datetaken` = '',
						`did_photo_sort_orderno` = '',
						`did_photo_added_bywho` = 'Dealer Account',
						`did_photo_token` = '$tkey',
						`did_photo_file_name` = '$fileupload',
						`did_photo_open_url` = '$open_url',
						`did_photo_file_path` = '$did_photo_file_path',
						`did_photo_file_width` = '',
						`did_photo_file_height` = '',	
						`did_photo_thumb_fname` = '$fileupload',
						`did_photo_caption` = '...'
				";

	$result_didphoto_sql = mysqli_query($idsconnection_mysqli, $insert_didphoto_sql);




	$log_cat_body = mysqli_real_escape_string($idsconnection_mysqli, trim($log));
	
	$run_log_cat_sql ="INSERT INTO `idsids_idsdms`.`log_cat` SET
							`log_cat_did` = '$did',
							`log_cat_body` = '$log_cat_body'
							
						";

	$result_log_cat_sql = mysqli_query($idsconnection_mysqli, $run_log_cat_sql);















            }
            else
            {
              echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }













}

?>
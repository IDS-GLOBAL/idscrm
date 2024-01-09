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

if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

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
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM dealers WHERE email = %s";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere
$dealer_email = $row_userDets['email'];








//echo 'Hello can you read me?';


$log="";

$log .= print_r($_GET);

if(!$_GET['did']) exit;

if(!$_GET['manager_id']) exit;

if(!$_FILES) exit;

//print_r($_FILES);
if (isset($_FILES['file']['name'], $_GET['did'], $_GET['manager_id'], $_GET['changeprofile_final'])) {

// *** Include the class
@include("../resize-class.php");



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


$thisdid = mysql_real_escape_string(trim($_GET['did']));
$mgrid_photo_team_id = mysql_real_escape_string(trim($_GET['mgrid_photo_team_id']));
$manager_id = mysql_real_escape_string(trim($_GET['manager_id']));

$mgrid_photo_datetaken = mysql_real_escape_string(trim($_GET['mgrid_photo_datetaken']));
$mgrid_photo_albumcomments = mysql_real_escape_string(trim($_GET['mgrid_photo_albumcomments']));
$changeprofile_final = mysql_real_escape_string(trim($_GET['changeprofile_final']));

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_mgrid_profile_photos = "SELECT * FROM `idsids_idsdms`.`manager_person_photos` WHERE `manager_person_photos`.`mgrid_photo_did` = '$did' AND `manager_person_photos`.`mgrid_photo_manager_id` = '$manager_id' ORDER BY `manager_person_photos`.`mgrid_photo_sort_orderno` DESC";
$find_mgrid_profile_photos = mysqli_query($idsconnection_mysqli, $query_find_mgrid_profile_photos);
$row_find_mgrid_profile_photos = mysqli_fetch_assoc($find_mgrid_profile_photos);
$totalRows_find_mgrid_profile_photos = mysqli_num_rows($find_mgrid_profile_photos);

$mgrid_photo_sort_orderno = $totalRows_find_mgrid_profile_photos++;


	// Make Dealer Folder
	if (!file_exists("../../vehicles/photos/$did")) {
		mkdir("../../vehicles/photos/$did", 0777, true);
	}

	// Make Media Folder
	if (!file_exists("../../vehicles/photos/$did/media")) {
		mkdir("../../vehicles/photos/$did/media", 0777, true);
		echo 'Made Dealer Media Folder';
	}

	// Make Team Folder
	if (!file_exists("../../vehicles/photos/$did/media/mgrid$manager_id")) {
		mkdir("../../vehicles/photos/$did/media/mgrid$manager_id", 0777, true);
		echo 'Made Manager Photo Folder';
	}
	
	if(!file_exists("../../vehicles/photos/$did/media/mgrid$manager_id/thumbs")){
		mkdir("../../vehicles/photos/$did/media/mgrid$manager_id/thumbs", 0777, true);
		echo 'Made Manager Thumb Folder';

	}


	chdir(dirname(__FILE__));

	$fileupload = basename( $_FILES['file']['name']);

	$fileupload=str_replace(" ","_",$fileupload);// Add _ inplace of blank space in file name, you can remove this line
	$fileupload=str_replace("'","_",$fileupload);// Add _ inplace of ' space in file name, you can remove this line
	$fileupload=str_replace("/","_",$fileupload);// Add _ inplace of / space in file name, you can remove this line
	$fileupload=str_replace(">","_",$fileupload);// Add _ inplace of > space in file name, you can remove this line
	$fileupload=str_replace("<","_",$fileupload);// Add _ inplace of < space in file name, you can remove this line
	$fileupload=str_replace("=","_",$fileupload);// Add _ inplace of = space in file name, you can remove this line

	$fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];
	
    $tempFile = $_FILES['file']['tmp_name'];          //3
	list($vphotowidth, $vphotoheight) = getimagesize( $_FILES['file']['tmp_name']);

	$photo_file_path = "../../vehicles/photos/$did/media/mgrid$manager_id/$fileupload";
	
	$photo_thumb_fpath = "../../vehicles/photos/$did/media/mgrid$manager_id/thumbs/$fileupload";


	$log .= '$photo_file_path: '.$photo_file_path;

function createAquickkToken(){
        
	    $tkey = substr(md5(rand(0,200)),0,20);
		
		$createAquickkToken=mysql_real_escape_string(trim($tkey));
		
return $createAquickkToken;
}


$mgrid_photo_token = createAquickkToken();


$mgrid_photo_album_token = substr(md5(rand(0,200)),0,20);

function get_Datetime_Now() {
	$tz_object = new DateTimeZone('America/New_York');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	//return $datetime->format('m\-d\-Y\ ');
	return $datetime->format('Y\-m\-d\ h:i:s');

}

//$mgrid_photo_datetaken = get_Datetime_Now();







				//echo $_FILES['file']['name'];

                //$name = md5(rand(100, 200));
				$name = $_FILES['file']['name'];
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = 'images/' . $filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];
                
				move_uploaded_file($location, $photo_file_path);
				
				copy($photo_file_path, $photo_thumb_fpath);
				
				$mgrid_photo_file_path = str_replace("../../", "../", $photo_file_path);
				
				$mgrid_photo_thumb_fpath = str_replace("../../", "../", $photo_thumb_fpath);
				
                //echo $photo_file_path;
				echo $open_url = "https://images.autocitymag.com/"."$did/media/mgrid$manager_id/thumbs/$fileupload";
				
				$log .= '<a hrer="'.$open_url.'">'.$open_url.'</a>';

				$insert_mgridphoto_sql = "
				INSERT INTO	`idsids_idsdms`.`manager_person_photos` SET
						`mgrid_photo_did` = '$did',
						`mgrid_photo_manager_id` = '$manager_id',
						`mgrid_photo_team_id` = '$mgrid_photo_team_id',
						`mgrid_photo_status` = '1',
						`mgrid_photo_likes` = '0',
						`mgrid_photo_abuses` = '0',
						`mgrid_photo_byip` = '$ip',
						`mgrid_photo_bymobile` = '$mobiledevice',
						`mgrid_photo_bybrowser` = '$browser',
						`mgrid_photo_geo_latitude` = '',
						`mgrid_photo_geo_longitude` = '',
						`mgrid_photo_album_token` = '$mgrid_photo_album_token',
						`mgrid_photo_albumname` = 'Profile',
						`mgrid_photo_albumcomments` = '$mgrid_photo_albumcomments',
						`mgrid_photo_datetaken` = '$mgrid_photo_datetaken',
						`mgrid_photo_sort_orderno` = '$mgrid_photo_sort_orderno',
						`mgrid_photo_added_bywho` = 'Dealer Account',
						`mgrid_photo_token` = '$mgrid_photo_token',
						`mgrid_photo_file_name` = '$fileupload',
						`mgrid_photo_open_url` = '$open_url',
						`mgrid_photo_file_path` = '$mgrid_photo_file_path',
						`mgrid_photo_file_width` = '$vphotowidth',
						`mgrid_photo_file_height` = '$vphotoheight',	
						`mgrid_photo_thumb_fname` = '$fileupload',
						`mgrid_photo_thumb_fpath` = '$mgrid_photo_thumb_fpath',
						`mgrid_photo_caption` = '$mgrid_photo_albumcomments'
				";

	$result_mgridphoto_sql = mysqli_query($idsconnection_mysqli, $insert_mgridphoto_sql);




	$origfileandname = $photo_file_path;
	$newtumbnailfileandpath = $photo_thumb_fpath;
	
	//$origfileandname = '../vehicles/photos/94/2611/1g2zf55b464252773-2006-pontiac-g6-4-door-sedan-used-sedan-decatur-ga.jpg';
	//$newtumbnailfileandpath = '../vehicles/photos/94/2611/thumbs/1g2zf55b464252773-2006-pontiac-g6-4-door-sedan-used-sedan-decatur-ga.jpg';
	


/*
	// *** 1) Initialise / load image
	$resizeObj = new resize("$origfileandname");

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(640, 480, 'exact');

	// *** 3) Save image
	$resizeObj -> saveImage("$origfileandname", 100);
	

	// *** 1) Initialise / load image
	//$resizeObj = new resize("$newtumbnailfileandpath");

	 //*** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(120, 90, 'auto');

	// *** 3) Save image
	$resizeObj -> saveImage("$newtumbnailfileandpath", 100);

*/

	if($changeprofile_final == 1){
	
		$save_account_person_photo_url_sql = "UPDATE `idsids_idsdms`.`manager_person` SET
									`profile_image` = '$mgrid_photo_file_path',
									`profile_image_open_url` = '$open_url'
								WHERE
									`manager_id` = '$manager_id'
									";
		$run_save_account_person_photo_url_sql = mysqli_query($idsconnection_mysqli, $save_account_person_photo_url_sql);
	
	}

	$log_cat_body = mysql_real_escape_string(trim($log));
	
	$run_log_cat_sql ="INSERT INTO `idsids_idsdms`.`log_cat` SET
							`log_cat_did` = '$did',
							`log_cat_body` = '$log_cat_body'
							
						";

	$result_log_cat_sql = mysqli_query($idsconnection_mysqli, $run_log_cat_sql);

}else{
echo 'Error!';
}






?>
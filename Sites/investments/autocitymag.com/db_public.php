<?php
$hostname_tracking = "localhost";
$database_tracking = "idsids_tracking_idsvehicles";
$username_tracking = "idsids_dudes";
$password_tracking = "VL&4v!PnvWug";
$tracking_mysqli = mysqli_connect($hostname_tracking, $username_tracking, $password_tracking, $database_tracking); 


# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_autocity_connection = "localhost";
$database_autocity_connection = "idsids_idsdms";
$username_autocity_connection = "idsids_autocity";
$password_autocity_connection = "oy#eO94q0[wP";
$autocity_connection_mysqli = mysqli_connect($hostname_autocity_connection, $username_autocity_connection, $password_autocity_connection); 

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

?>
<?php
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


		$tkey = bin2hex(openssl_random_pseudo_bytes(10));


// SET TIME VARIABLES
$time_now = date("Y-m-d H:i:s");



$converted_time_1 = date("Y-m-d H:i:s", strtotime($time_now . " -90 days"));

//	US national format, using () for negative numbers
setlocale(LC_MONETARY, 'en_US.UTF-8');


// Function To Calculate Money without commas.

function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number = sprintf('%.2f', $number); 
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
} 


mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states`";
$states = mysqli_query($autocity_connection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_timeMonths = "SELECT * FROM `idsids_idsdms`.`months_options`";
$timeMonths = mysqli_query($autocity_connection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_timeYears = "SELECT * FROM `idsids_idsdms`.`year_options` ORDER BY `year_name` ASC";
$timeYears = mysqli_query($autocity_connection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_autoYears = "SELECT * FROM `idsids_idsdms`.`auto_years` ORDER BY `year` DESC";
$autoYears = mysqli_query($autocity_connection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);


mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_carMakes = "SELECT * FROM `idsids_idsdms`.`car_make`";
$carMakes = mysqli_query($autocity_connection_mysqli, $query_carMakes);
$row_carMakes = mysqli_fetch_assoc($carMakes);
$totalRows_carMakes = mysqli_num_rows($carMakes);

mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_paydayType = "SELECT * FROM `idsids_idsdms`.`income_interval_options`";
$paydayType = mysqli_query($autocity_connection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

<?php 

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 


# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_frazerdms = "localhost";
$database_frazerdms = "idsids_fazerdms";
$username_frazerdms = "idsids_frazer";
$password_frazerdms = "ultimate2015";
$frazerdms_mysqli = mysqli_connect($hostname_frazerdms, $username_frazerdms, $password_frazerdms, $database_frazerdms); 


		set_time_limit(0);

		chdir(dirname(__FILE__));


        srand((double)microtime()*1000000); 
        
		
		$tkey = bin2hex(openssl_random_pseudo_bytes(10));


		$nowtime = date('Y-m-d H:i:s');
		$against_time_now = date("Y-m-d H:i:s");
		$suboneday = date('Y-m-d H:i:s', strtotime("-1 days"));



if(isset($_GET['frazerid'], $_GET['id'])){

// Url Should Be As Follows
// http://idscrm.com/frazersend/index.php?frazerid={frazerid}&id={email}

		// Define Empty Variables Or Turn Off To Turn On 
		// With Further System Actions to Run SMTP Emails 
		// Depending on Conditions
		
		$did = "";
		$email_alert_created_newsystemdealer = '0';
		$email_alert_updated_systemdealer = '0';
		$email_alert_updated_pendingdealer = '0';
		$email_alert_exisiting_email_in_idssystem = '0';
		$email_password_from_idssystem = '0';

		
		// Assign String Paramaters Into Managable Variables
		$frazeremail = $_GET['id'];

		$frazerid = $_GET['frazerid'];	

		$frazer_file = "../frazerpush/$frazerid/vehicles.csv";
		
		
		$log="";

		$log .= '<b>Frazer ID: </b>'.$frazerid;

		$log .= '<b>Sending Action Email: </b>'.$frazeremail;

		
		chdir(dirname(__FILE__));
		
		include("autoplay.php");

		chdir(dirname(__FILE__));
?>
<?php include('../Connections/idsconnection.php'); ?>
<?php include('../Connections/frazerdms.php'); ?>
<?php




// Find Exisiting IDS System Dealer By Frazer ID
// If Found Process With this DID, If Not Create A New Account
// Assign Password and Email,
// What if a dealer changes email to an exisiting account? Resolve.

		$newidsemail = mysqli_real_escape_string($idsconnection_mysqli, trim($frazeremail));
		$newidsfrazerno = mysqli_real_escape_string($idsconnection_mysqli, trim($frazerid));


//$ids_connectfindmatch =  new mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); // resource id 2 is given
$query_find_idsfrazerdlr = "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`feedidfrazer` = '$newidsfrazerno' AND `dealers`.`email` = '$newidsemail' ORDER BY `dealers`.`created_at` DESC LIMIT 1";
$find_idsfrazerdlr = mysqli_query($idsconnection_mysqli, $query_find_idsfrazerdlr);
$row_find_idsfrazerdlr = mysqli_fetch_assoc($find_idsfrazerdlr);
$totalRows_find_idsfrazerdlr = mysqli_num_rows($find_idsfrazerdlr);
$did = $row_find_idsfrazerdlr['id'];
$feedidfrazer = $row_find_idsfrazerdlr['feedidfrazer'];

// If System Dealer Doesn't Exist Then Check For Exisiting Frazer Dealer In FrazerDMS For FRAZER DEALER
if($feedidfrazer == $frazerid):



	
// The Main Action

	 $log .= ':::YES System Match:::'.'<br />';

	 $log .= '<b>IDS First Match Use This As did: </b>'.$did.'<br />';

	
else:

	//echo $log .= ':::NO System Match:::'.'<br />';
	$email_password_from_idssystem = '1';


	include("process_nomatch_frazerno.php");
 
 
endif;



	include("move_vehicles_photos_idsdealeraccount.php");



$log .= '<br /> COMPLETE';
//echo '<br />'.$log;

include("smtp_admin.php");

include("script_logcat.php");



		//mkdir("../vehicles/photos/$frazerid", 0777, true);
		// "Processing Frazer Dealer $frazerid".'../frazerpush/$frazerid/vehicles.csv';

}

//header("Location: http://idscrm.com");



mysqli_close($frazerdms_mysqli);
mysqli_close($idsconnection_mysqli);


?>
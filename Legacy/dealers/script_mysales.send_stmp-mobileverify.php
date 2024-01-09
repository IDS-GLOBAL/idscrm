<?php require_once("db_sales_loggedin.php"); ?>
<?php

require_once('Mail.php');
require_once('Mail/mime.php');




if(isset($_POST['txt'])){

$six_digit_random_number = mt_rand(100000, 999999);

$txt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['txt'])); 

$salesperson_mobilephone_number = $row_userDets['salesperson_mobilephone_number'];

$salesperson_mobile_carrier_id = $row_userDets['salesperson_mobile_carrier_id'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mobile_carrier = "SELECT * FROM `idsids_idsdms`.`mobile_carriers` WHERE `carrier_id` = '$salesperson_mobile_carrier_id' ORDER BY carrier_label ASC";
$mobile_carrier = mysqli_query($idsconnection_mysqli, $query_mobile_carrier);
$row_mobile_carrier = mysqli_fetch_assoc($mobile_carrier);
$totalRows_mobile_carrier = mysqli_num_rows($mobile_carrier);



		// https://code.tutsplus.com/tutorials/how-to-send-text-messages-with-php--net-17693
		
		$carrier_example = $row_mobile_carrier['carrier_example'];
		$mobile_carrier = str_replace("10digitphonenumber",$salesperson_mobilephone_number,$carrier_example);
		
		
		$smsMessage = 'Enter: '.$six_digit_random_number.' in your account online.';


 ini_set ("SMTP", "mail.idscrm.com");
 
 $SendToEmailX = $salesperson_mobilephone_number;

 $SendToEmailNotify = "";

 $fromX = "idsrobot@idscrm.com";
 $ToX = $SendToEmailX;
 $ToAllX = $SendToEmailNotify;
 $bccX = "bcc@idscrm.com";
 $recipientsX = $ToX;
 $recipientsXML = $ToX;
 
 $subjectX = "Mobile Code To Verify... ";

 $host = "mail.idscrm.com";
 $username = "idsrobot@idscrm.com";
 $password = "idscrmsystem99!";
 
 $headersxmlX = array ('From' => $fromX,
  'To' => $ToX,
  'Subject' => $subjectX,
  'MIME-Version' => '1.0',
  'Content-Type' => "text/plain; charset=utf-8"
   );

 $smtpX = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));


 $mail = $smtpX->send($mobile_carrier, $headersxmlX, $smsMessage);


		$six_digit_random_number = mysqli_real_escape_string($idsconnection_mysqli,trim($six_digit_random_number));

			$query_salespersonmobile_update_sql = "
				UPDATE `idsids_idsdms`.`sales_person` SET
					`salesperson_mobile_tempcode` = '$six_digit_random_number'
					WHERE
					`salesperson_id` = '$sid'
				";
			
		$ran_salespersonmobile_update_sql = mysqli_query($idsconnection_mysqli, $query_salespersonmobile_update_sql);












echo "
<script>

$(document).find('div#mobile_verifysend_block').hide();

$(document).find('div#mobile_verifycode_block').show();

</script>
";


}

?>

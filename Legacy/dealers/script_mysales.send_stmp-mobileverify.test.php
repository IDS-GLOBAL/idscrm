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



	//mail( $mobile_carrier, '', $smsMessage );


 ini_set ("SMTP", "mail.idscrm.com");
 
 //$SendToEmail = "webgoonie@gmail.com";
 //$SendToEmail = "centralautosalesleads@dealerleadtrack.com";
 $SendToEmailX = $salesperson_mobilephone_number;

 $SendToEmailNotify = "";

 //$from = "IDS ROBOT <noreply@idscrm.com>";
 $fromX = "idsrobot@idscrm.com";
 //$to = "Email Recipient <webgoonie@gmail.com>";
 $ToX = $SendToEmailX;
 $ToAllX = $SendToEmailNotify;
 $bccX = "bcc@idscrm.com";
 $recipientsX = $ToX;
 $recipientsXML = $ToX;
 //$to = "Email Recipient <webgoonie@gmail.com>, idscrm.com@gmail.com";
 //$to = "TO: <$emails>";
 
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















/*
	


	$message = wordwrap( $smsMessage, 70 );
	$to = $row_userDets['salesperson_mobilephone_number'] . '@' . $mobile_carrier;
	$result = @mail( $to, '', $message );


exit();

*/



/*
			 ini_set ("SMTP", "mail.idscrm.com");
			 
			 
			 // $from = "IDSCRM Team <info@idscrm.com>";
			 // $from = $row_userDets['salesperson_email'];
			 $from = $row_userDets['salesperson_mobilephone_number'];
			


			if(isset($dudes_email_internal)){
			$additionalbccs = ' '.$dudes_email_internal;
			}else{
			$additionalbccs="";
			}


			 //$to = "Email Recipient <webgoonie@gmail.com>";

			
			 
			 
			 
			 $To = $mobile_carrier;
			 
			 $Replyto = 'support@idscrm.com';

			 // Grouped Together For Receipient BCC Headers
			 // BCC:
			 //$bcc = "idscrm.com@gmail.com".$additionalbccs;
			 $bcc = "idscrm.com@gmail.com";
			 
			 $recipients = $To;
			
			 //$subject = "You Have A $500 Discount Received";
			 //$subject = "Thank you for contacting Central Auto Sales";
			 $subject = $salesperson_mobilephone_number;



	$body_html = 'IDSCRM Mobile Code: '.$six_digit_random_number;




	$host = "mail.idscrm.com";
	$username = "idsrobot@idscrm.com";
	$password = "idscrmsystem99!";
 
	$headers = array ('From' => $from,
	'To' => $To,
//	'Reply-To' => $Replyto,
	'Subject' => ''  //$subject,
	);

	$smtp = Mail::factory('smtp',
	   array ('host' => $host,
		 'auth' => true,
		 'username' => $username,
		 'password' => $password));
 
	$mail = $smtp->send($recipients, $headers, $body_html);


*/

echo "
<script>

$('div#mobile_verifysend_block').hide();

$('div#mobile_verifysend_block').show();
</script>
";
echo '$mobile_carrier: '.$mobile_carrier;


}

/*

*****************************************************************************************************
http://stackoverflow.com/questions/3299577/php-how-to-send-email-with-attachment-using-smtp-settings

*/

/*


$text = 'Text version of email';
$html = '<html><body>HTML version of email</body></html>';
$file = './files/example.zip';
$crlf = "rn";
$hdrs = array(
              'From'    => 'someone@domain.pl',
              'To'      => 'someone@domain.pl',
              'Subject' => 'Test mime message'
              );

$mime = new Mail_mime($crlf);

$mime->setTXTBody($text);
$mime->setHTMLBody($html);

$mime->addAttachment($file,'application/octet-stream');

$body = $mime->get();
$hdrs = $mime->headers($hdrs);

$mail =& Mail::factory('mail', $params);
$mail->send('mail@domain.pl', $hdrs, $body); 







 //Convert encodings of subject, sender, recipient and message body to ISO-20222-JP 
    $from_name = mb_encode_mimeheader($from_name, "ISO-2022-JP", "Q"); 
    $to_name = mb_encode_mimeheader($to_name, "ISO-2022-JP", "Q"); 
    $subject = mb_encode_mimeheader($subject, "ISO-2022-JP", "Q"); 
    $mailmsg = mb_convert_encoding($mailmsg, "ISO-2022-JP", "AUTO"); 

    $From = "From: ".$from_name." <fromaddress@domain.com>"; 
    $To = "To: ".$to_name." <toaddress@domain.com>"; 

    $recipients = "toaddress@domain.com"; 
    $headers["From"] = $From; 
    $headers["To"] = $To; 
    $headers["Subject"] = $subject; 
    $headers["Reply-To"] = "reply@address.com"; 
    $headers["Content-Type"] = "text/plain; charset=ISO-2022-JP"; 
    $headers["Return-path"] = "returnpath@address.com"; 
     
    $smtpinfo["host"] = "smtp.server.com"; 
    $smtpinfo["port"] = "25"; 
    $smtpinfo["auth"] = true; 
    $smtpinfo["username"] = "smtp_user"; 
    $smtpinfo["password"] = "smtp_password"; 

    $mail_object =& Mail::factory("smtp", $smtpinfo); 

    $mail_object->send($recipients, $headers, $mailmsg); 
*/



/*
*****************************************************************************************************

*/








?>

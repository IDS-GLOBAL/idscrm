<?php require_once('db_admin.php'); ?>
<?php

require_once("Mail.php");

//print_r($_POST);
//****
// Decided To Just Keep Emails From Related To idsids_tracking_idsvehicles.emails_senthtml_prospectdlrs
// Because I want to track us sending emails away from dealer emails.
// If so Just create anotther insert table to wrte in to idsids_idsdms database of somsort.
// as of 12/10/2016 there seems to be email_dealers_htmlsent but that seems to be for tracking.
// dealers ending things out to customers. it might show them seeing data
//
//
//****

if(isset($_POST['dudesid'], $_POST['thisdid'], $_POST['email_to'], $_POST['email_from'], $_POST['email_template'], $_POST['email_template_subject'], $_POST['email_systm_templates_body'])){
	
//	echo 'I made it.'; 
	
	$senthtml_prospect_thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
	$senthtml_prospect_email_to  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_to']));
	$senthtml_prospect_email_from = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_from']));
	$senthtml_prospect_email_systemplate_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template']));
	$senthtml_prospect_email_subject_post = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template_subject']));
	$senthtml_prospect_email_systm_templates_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_systm_templates_body']));
	
















			 ini_set ("SMTP", "mail.idscrm.com");
			 
			 
			 //$from = "IDSCRM Team <info@idscrm.com>";
			 $from = $senthtml_prospect_email_from;

/*
			if(isset($dudes_email_internal)){
			$additionalbccs = ' '.$dudes_email_internal;
			}else{
			$additionalbccs="";
			}

*/
			 //$to = "Email Recipient <webgoonie@gmail.com>";
			 $To = $senthtml_prospect_email_to;
			 
			 $Replyto = 'support@idscrm.com';

			 // Grouped Together For Receipient BCC Headers
			 // BCC:
			 //$bcc = "idscrm.com@gmail.com".$additionalbccs;
			 $bcc = "idscrm.com@gmail.com";
			 
			 $recipients = $To.",".$bcc;
			
			 //$subject = "You Have A $500 Discount Received";
			 //$subject = "Thank you for contacting Central Auto Sales";
			 $subject = $_POST['email_template_subject']; //$senthtml_prospect_email_subject_post;



	$body_html = $_POST['email_systm_templates_body'];




	$host = "mail.idscrm.com";
	$username = "idsrobot@idscrm.com";
	$password = "idscrmsystem99!";
 
	$headers = array ('From' => $from,
	'To' => $To,
//	'Reply-To' => $Replyto,
	'Subject' => $subject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$smtp = Mail::factory('smtp',
	   array ('host' => $host,
		 'auth' => true,
		 'username' => $username,
		 'password' => $password));
 
	$mail = $smtp->send($recipients, $headers, $body_html);




	
$create_emails_senthtml_prospectdlrs_sql = "	
	INSERT INTO `idsids_tracking_idsvehicles`.`emails_senthtml_prospectdlrs` SET
		`senthtml_prospect_dudesid` = '$dudesid',
		`senthtml_draft` = 'N',
		`senthtml_prospect_thisdid` = '$senthtml_prospect_thisdid',
		`senthtml_prospect_email_to` = '$senthtml_prospect_email_to',
		`senthtml_prospect_email_from` = '$senthtml_prospect_email_from',
		`senthtml_prospect_email_subject_post` = '$senthtml_prospect_email_subject_post',
		`senthtml_prospect_email_systemplate_id` = '$senthtml_prospect_email_systemplate_id',
		`senthtml_prospect_email_systm_templates_body` = '$senthtml_prospect_email_systm_templates_body'
		";

$ran_emails_senthtml_prospectdlrs_sql = mysqli_query($idsconnection_mysqli, $create_emails_senthtml_prospectdlrs_sql, $tracking);





//echo'Email Sent';


/*
$gotoemailtemplates = 'emailtemplates.php';

echo "<script>window.top.location.href='".$gotoemailtemplates."'</script>";

*/




}

/*


data: Array
(
    [dudesid] => 1
    [thisdid] => 99
    [email_to] => mistalawry@hotmail.com
    [email_from] => benjamin@idscrm.com
    [email_template] => 12
    [email_systm_templates_body] => This is that shit I was talking about.<p></p>

                        
)

*****************************************************************************************************
http://stackoverflow.com/questions/3299577/php-how-to-send-email-with-attachment-using-smtp-settings

include('Mail.php');
include('Mail/mime.php');

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
*****************************************************************************************************





*/

?>
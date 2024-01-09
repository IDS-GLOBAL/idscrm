<?php require_once("db_loggedin.php"); ?>
<?php



//print_r($_POST);

if(isset($_POST['thisdid'], $_POST['cust_leadid'], $_POST['email_to'], $_POST['email_from'], $_POST['email_template_value'], $_POST['email_template_txt'], $_POST['aHTML'])){
	
//	echo 'I made it.'; 

	$senthtml_lead_did = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
	$senthtml_custlead_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cust_leadid']));
	$senthtml_lead_email_to  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_to']));
	$senthtml_lead_email_from = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_from']));
	$senthtml_lead_template_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template_value']));
	$senthtml_lead_subject = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template_txt']));
	$senthtml_lead_htm_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['aHTML']));
	



	
$create_emails_senthtml_prospectdlrs_sql = "	
	INSERT INTO `idsids_idsdms`.`email_dealers_htmlsent` SET
		`senthtml_lead_did` = '$did',
		`senthtml_lead_draft` = 'N',
		`senthtml_lead_token` = '$tkey',
		`senthtml_custlead_id` = '$senthtml_custlead_id',
		`senthtml_lead_email_to` = '$senthtml_lead_email_to',
		`senthtml_lead_email_from` = '$senthtml_lead_email_from',
		`senthtml_lead_subject` = '$senthtml_lead_subject',
		`senthtml_lead_template_id` = '$senthtml_lead_template_id',
		`senthtml_lead_htm_body` = '$senthtml_lead_htm_body'
		";

$ran_emails_senthtml_prospectdlrs_sql = mysqli_query($idsconnection_mysqli, $create_emails_senthtml_prospectdlrs_sql);





/*
$gotoemailtemplates = 'emailtemplates.php';

echo "<script>window.top.location.href='".$gotoemailtemplates."'</script>";

*/




}

/*


data: Array
(
    [thisdid] => 1
    [cust_leadid] => 4517
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
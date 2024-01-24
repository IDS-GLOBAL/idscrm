<?php

# The email address to send to
	$to_email = 'IDSCRM.COM@GMAIL.COM';

# The subject of the email, currently set as 404 Not Found Error or 403 Forbidden Error
	$email_subject = $error_code.' Error';

# The email address you want the error to appear from
	$from_email = 'ROBOT@IDSCRM.COM';
	
# Who or where you want the error to appear from
	$from_name = 'idscrm.com';


# Gather visitor information
	$ip = getenv ("REMOTE_ADDR");				// IP Address
	$server_name = getenv ("SERVER_NAME");		// Server Name
	$request_uri = getenv ("REQUEST_URI");		// Requested URI
	$http_ref = getenv ("HTTP_REFERER");		// HTTP Referer
	$http_agent = getenv ("HTTP_USER_AGENT");	// User Agent
	$error_date = date("D M j Y g:i:s a T");	// Error Date

# Send the email notification
require_once('phpMailer/class.phpmailer.php');
	$mail = new PHPMailer();
	
	$mail->From = $from_email;
	$mail->FromName = $from_name;
	$mail->Subject = $email_subject;
	$mail->AddAddress($to_email);
	$mail->Body = 
	"There was a ".$error_code." error on the ".$server_name." domain".
	"\n\nDetails\n----------------------------------------------------------------------".
	"\nWhen: ".$error_date.
	"\n(Who) IP Address: ".$ip.
	"\n(What) Tried to Access: http://".$server_name.$request_uri.
	"\n(From where) HTTP Referer: ".$http_ref.
	"\n\nUser Agent: ".$http_agent;
	
	$mail->Send();

?>
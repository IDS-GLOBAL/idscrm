<?php require_once("db_loggedin.php"); ?>
<?php
// print_r($_POST);

if(!$_POST){ exit(); }

require_once("Mail.php");




//echo 'POSTING!'.'<br />';

if(isset($_POST['aHTML'])):



				$aHTML = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['aHTML']));
				$email_from = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_from']));
				$email_to = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_to']));

				$email_subject = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template_txt']));



			 ini_set ("SMTP", "mail.idscrm.com");
			 
			 
			 $from = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_from']));
			 
			 $To =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_to']));
			 //$To =  'webgoonie@gmail.com';  // Testing Purposes Only!!!
			 
			 
			 $bcc = "idscrm.com@gmail.com";
			 $recipients = $To.",".$bcc;
			
			 $subject = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template_txt']));




$body = "
<div>
$aHTML
</div>
";




	$host = "mail.idscrm.com";
	$username = "idsrobot@idscrm.com";
	$password = "idscrmsystem99!";
 
	$headers = array ('From' => $from,
	'To' => $To,
	'Subject' => $subject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$smtp = Mail::factory('smtp',
	   array ('host' => $host,
		 'auth' => true,
		 'username' => $username,
		 'password' => $password));
 
	$mail = $smtp->send($recipients, $headers, $body);
	




endif;








?>
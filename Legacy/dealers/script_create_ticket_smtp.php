<?php require_once("db_loggedin.php"); ?>
<?php
//print_r($_POST);

if(!$_POST){ exit(); }

require_once("Mail.php");





				$contact_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_name']));
				$contact_phone = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_phone']));
				$what_happened = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['what_happened']));
				$what_you_want_to_happen = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['what_you_want_to_happen']));
				$comments_bydlr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['comments_bydlr']));
				$accept_terms = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['accept_terms']));
				$priority = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['priority']));
				
				$email_from = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_email']));
				$contact_email = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['contact_email']));
				

				$email_subject = 'New Support Ticket By $company';
				


				$create_ticket_sql = "
					INSERT INTO 	`idsids_idsdms`.`ticket_submit_dlr` SET
						`ticket_token` = '$tkey',
						`did` = '$did',
						`contact_name` = '$contact_name',
						`contact_phone` = '$contact_phone',
						`contact_email` = '$contact_email',
						`priority` = '$priority',
						`what_happened` = '$what_happened',
						`what_you_want_to_happen` = '$what_you_want_to_happen',
						`comments_bydlr` = '$comments_bydlr',
						`accept_terms` = '$accept_terms'
				";
			
				$run_create_ticket_sql = mysqli_query($idsconnection_mysqli, $create_ticket_sql);


			 ini_set ("SMTP", "mail.idscrm.com");
			 
			 
			 //$from = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_from']));
			 $from = 'idsrobot@idscrm.com';


			 //$To =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_to']));
			 $To =  'support@idscrm.com';  // Testing Purposes Only!!!
			 
			 
			 //$bcc = "idscrm.com@gmail.com";
			 $bcc = $dealer_email;
			 
			 $recipients = $To.",".$bcc;
			
			 $subject = 'New Support Ticket By $company';




$body = "
<div>
	What happened: $what_happened
	<hr />
	<br />
	What you want to happen: $what_you_want_to_happen
	<hr />
	<br />
	Commments: $comments_bydlr
	
	<hr />
	<br />
	Priority: $priority
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
 








?>
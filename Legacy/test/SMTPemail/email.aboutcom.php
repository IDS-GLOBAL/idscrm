<?php
function smtpEmail(){

 require_once "Mail.php";
 
 ///usr/sbin/sendmail -t -i;
 
  // /home4/idsids/php
  
  //ini_set ("SMTP", "mail.idscrm.com");
 
 $name ="Steve Doe";
 
 $from = "No Reply <noreply@idscrm.com>";
 $to = "Email Recipient <webgoonie@gmail.com>";
 $subject = "Please Validate Your Email";
 $body = "Hi $name,\n\nHow are you doing today? This Wedensday at work?";
 
 $host = "mail.idscrm.com";
 $username = "idsrobot@idscrm.com";
 $password = "idscrmsystem99!";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }

}
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
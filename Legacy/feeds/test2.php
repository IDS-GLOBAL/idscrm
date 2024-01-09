<?php
$hack = "This is me emailing variables";
$from = "idsrobot@idscrm.com";
$to = "idscrm.com@gmail.com";
$subject = 'Testing Cron Job Smtp';
$body = "<h2>Cron is working, remove test cron job now.</h2>$hack";
//$host = "ssl://gator3247.hostgator.com";
$host = "mail.idscrm.com";
// $port = "25";
 $username = "idsrobot@idscrm.com";
 $password = "idscrmsystem99!";
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp =& Mail::factory('smtp',
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
  ?>
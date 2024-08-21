<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.idscrm.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'idsrobot@idscrm.com';                     //SMTP username
    $mail->Password   = 'ZF7xWD17VnVtK7fq';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('idsrobot@idscrm.com', 'IDSCRM Robot');
    $mail->addAddress('benwellrounded@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('screenmyemails@gmail.com');               //Name is optional
    $mail->addReplyTo('support@idscrm.com', 'Information');
    $mail->addCC('idscrm.com@gmail.com');
    $mail->addBCC('webgoonie@gmail.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


    //Recipients
    $mail->setFrom('idsrobot@idscrm.com', 'IDSCRM ROBOT');
    $mail->addAddress('webgoonie@gmail.com', 'Webgoonie is the Recipient Name');  // Add a recipient

    //Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Test IDSCRM ROBOT';
    $mail->Body    = 'This is the HTML message body from the IDSCRM.com Robot Email Account <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients from the IDSCRM.com Robot Email Account';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
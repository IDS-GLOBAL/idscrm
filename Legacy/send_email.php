<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();  // Set mailer to use SMTP
    $mail->Host = 'mail.idscrm.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;  // Enable SMTP authentication
    $mail->Username = 'idsrobot@idscrm.com';  // SMTP username
    $mail->Password = 'ZF7xWD17VnVtK7fq';  // SMTP password or Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
    //$mail->Port = 587;
    $mail->Port = 465;  // TCP port to connect to

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
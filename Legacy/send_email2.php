<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/vendor/autoload.php';//confirm your web path

// Initialize debugging variables
$debug = '';
$sent = false;

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
   $to = $_POST['email'];
   $subject = 'Test Email';
   $message = 'This is a test email sent from your PHP script.';

   $mail = new PHPMailer(true);

   try {
       //Server settings
       $mail->isSMTP();
       $mail->Host = 'mail.idscrm.com';
       $mail->SMTPAuth = true;
       $mail->Username = 'idsrobot@idscrm.com';  // Gmail username
       $mail->Password = 'ZF7xWD17VnVtK7fq';  // Application password or Gmail password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
       $mail->Port = 587;
       //$mail->Port = 465;

       //Recipients
       $mail->setFrom('idsrobot@idscrm.com', 'IDSCRMRobot');
       $mail->addAddress($to);

       //Content
       $mail->isHTML(true);
       $mail->Subject = $subject;
       $mail->Body    = $message;
       $mail->AltBody = strip_tags($message);

       $mail->send();
       $sent = true;
       $debug = 'Email sent successfully.';
   } catch (Exception $e) {
       $debug = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Test Email</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
   <div class="container mt-5">
       <div class="row justify-content-center">
           <div class="col-md-6">
               <div class="card">
                   <div class="card-header">
                       <h2>Test Email</h2>
                   </div>
                   <div class="card-body">
                       <form action="test_email.php" method="post">
                           <div class="mb-3">
                               <label for="email" class="form-label">Destination Email Address</label>
                               <input type="email" class="form-control" id="email" name="email" required>
                           </div>
                           <button type="submit" class="btn btn-primary">Send Test Email</button>
                       </form>
                       <?php if (!empty($debug)): ?>
                           <div class="mt-3 alert <?php echo $sent ? 'alert-success' : 'alert-danger'; ?>">
                               <?php echo $debug; ?>
                           </div>
                       <?php endif; ?>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
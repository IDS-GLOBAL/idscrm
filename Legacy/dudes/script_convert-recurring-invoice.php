<?php require_once('../Connections/idsconnection.php'); ?>
<?php
require_once("Mail.php");

if(!$_GET) exit;

$get_recurring_invoice_id = mysql_real_escape_string($_GET['invoice_id']);

$get_dealer_id = mysql_real_escape_string($_GET['id']);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_email_dealer_invoice = "SELECT * FROM ids_toinvoices, dealers WHERE ids_toinvoices.invoice_id = '$get_recurring_invoice_id' AND ids_toinvoices.invoice_dealerid AND dealers.id = '$get_dealer_id' ORDER BY ids_toinvoices.invoice_id ASC";
$email_dealer_invoice = mysqli_query($idsconnection_mysqli, $query_email_dealer_invoice);
$row_email_dealer_invoice = mysqli_fetch_array($email_dealer_invoice);
$totalRows_email_dealer_invoice = mysqli_num_rows($email_dealer_invoice);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_check_invoicesent = "SELECT * FROM ids_toinvoices_sent WHERE ids_toinvoices_sent.invoice_sent_invoice_id = '$get_recurring_invoice_id'  AND ids_toinvoices_sent.invoice_sent_did = '$get_dealer_id'";
$check_invoicesent = mysqli_query($idsconnection_mysqli, $query_check_invoicesent);
$row_check_invoicesent = mysqli_fetch_array($check_invoicesent);
$totalRows_check_invoicesent = mysqli_num_rows($check_invoicesent);

?>
<?php


$sendtoclient = $row_email_dealer_invoice['invoice_sendtoclient'];

if($sendtoclient == N):

header("Location: invoice-pending.php");

exit;

else:

//echo $query_email_dealer_invoice;
$emailSentAlready_id = $row_check_invoicesent['invoice_sent_id'];

//if(isset($emailSentAlready_id)){ echo 'Email Sent ID: '.$emailSentAlready_id; }


// Definining Invoice Variables For Email HTML Body

$sendEmailToDealer = $row_email_dealer_invoice['invoice_sendtoclient'];

$emailSentToDealer = $row_email_dealer_invoice['invoice_senttoclient'];

// Definining Invoice Variables For Email Action
$company_name = $row_email_dealer_invoice['company'];
$dealer_email = $row_email_dealer_invoice['email'];

//Set Accounts Receivable To BE Bcc'd on Deal
$accts_payables_name = $row_email_dealer_invoice['accts_payables_name'];
if(isset($row_email_dealer_invoice['accts_payables_email'])){
$accounts_payable = ','.$row_email_dealer_invoice['accts_payables_email'];
}else{
$accounts_payable="";
}



// Definining Invoice Variables For Email HTML Body
$invoice_number = $row_email_dealer_invoice['invoice_number'];
$invoice_date = $row_email_dealer_invoice['invoice_date'];
$invoice_duedate = $row_email_dealer_invoice['invoice_duedate'];
$invoice_amount_due = $row_email_dealer_invoice['invoice_amount_due'];

//If Comments Exist Then Set Array to Variable because it has a position in the body html.
if(isset($row_email_dealer_invoice['invoice_comments'])){
	$invoice_comments = '<p><b>Comments:</b> '.$row_email_dealer_invoice['invoice_comments'].'</p>';
}else{
	$invoice_comments = "<p></p>";
}


$fees_grouped = '';



if(isset($row_email_dealer_invoice['fee_description1'])){ 
$fee_description1 = "<tr><td>".$row_email_dealer_invoice['fee_description1']."</td><td align='center'>".$row_email_dealer_invoice['quantity1']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price1']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount1']."</td><td align='center'>".$row_email_dealer_invoice['tax1']."</td></tr>";

$fees_grouped .= $fee_description1; 
}


if(isset($row_email_dealer_invoice['fee_description2'])){
$fee_description2 = "<tr><td>".$row_email_dealer_invoice['fee_description2']."</td><td align='center'>".$row_email_dealer_invoice['quantity2']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price2']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount2']."</td><td align='center'>".$row_email_dealer_invoice['tax2']."</td></tr>";

	$fees_grouped .= $fee_description2; 
}

if(isset($row_email_dealer_invoice['fee_description3'])){ 
$fee_description3 = "<tr><td>".$row_email_dealer_invoice['fee_description3']."</td><td align='center'>".$row_email_dealer_invoice['quantity3']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price3']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount3']."</td><td align='center'>".$row_email_dealer_invoice['tax3']."</td></tr>";

	$fees_grouped .= $fee_description3;
}


if(isset($row_email_dealer_invoice['fee_description4'])){
	
	$fee_description4 = "<tr><td>".$row_email_dealer_invoice['fee_description4']."</td><td align='center'>".$row_email_dealer_invoice['quantity4']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price4']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount4']."</td><td align='center'>".$row_email_dealer_invoice['tax4']."</td></tr>";
	
	$fees_grouped .= $fee_description4; 
}


if(isset($row_email_dealer_invoice['fee_description5'])){
	
	$fee_description5 = "<tr><td>".$row_email_dealer_invoice['fee_description5']."</td><td align='center'>".$row_email_dealer_invoice['quantity5']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price5']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount5']."</td><td align='center'>".$row_email_dealer_invoice['tax5']."</td></tr>";
	
	$fees_grouped .= $fee_description5; 
}

if(isset($row_email_dealer_invoice['fee_description6'])){
	
	$fee_description6 = "<tr><td>".$row_email_dealer_invoice['fee_description6']."</td><td align='center'>".$row_email_dealer_invoice['quantity6']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price6']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount6']."</td><td align='center'>".$row_email_dealer_invoice['tax6']."</td></tr>";
	
	$fees_grouped .= $fee_description6; 
}

if(isset($row_email_dealer_invoice['fee_description7'])){
	
	$fee_description7 = "<tr><td>".$row_email_dealer_invoice['fee_description7']."</td><td align='center'>".$row_email_dealer_invoice['quantity7']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price7']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount7']."</td><td align='center'>".$row_email_dealer_invoice['tax7']."</td></tr>";
	
	$fees_grouped .= $fee_description7; 
}

if(isset($row_email_dealer_invoice['fee_description8'])){
	
	$fee_description8 = "<tr><td>".$row_email_dealer_invoice['fee_description8']."</td><td align='center'>".$row_email_dealer_invoice['quantity8']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price8']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount8']."</td><td align='center'>".$row_email_dealer_invoice['tax8']."</td></tr>";
	
	$fees_grouped .= $fee_description8; 
}

if(isset($row_email_dealer_invoice['fee_description9'])){
	
	$fee_description9 = "<tr><td>".$row_email_dealer_invoice['fee_description9']."</td><td align='center'>".$row_email_dealer_invoice['quantity9']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price9']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount9']."</td><td align='center'>".$row_email_dealer_invoice['tax9']."</td></tr>";
	
	$fees_grouped .= $fee_description9; 
}

if(isset($row_email_dealer_invoice['fee_description10'])){
	
	$fee_description10 = "<tr><td>".$row_email_dealer_invoice['fee_description10']."</td><td align='center'>".$row_email_dealer_invoice['quantity10']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price10']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount10']."</td><td align='center'>".$row_email_dealer_invoice['tax10']."</td></tr>";
	
	$fees_grouped .= $fee_description10; 
}

if(isset($row_email_dealer_invoice['fee_description11'])){
	
	$fee_description11 = "<tr><td>".$row_email_dealer_invoice['fee_description11']."</td><td align='center'>".$row_email_dealer_invoice['quantity11']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price11']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount11']."</td><td align='center'>".$row_email_dealer_invoice['tax11']."</td></tr>";
	
	$fees_grouped .= $fee_description11; 
}

if(isset($row_email_dealer_invoice['fee_description12'])){
	
	$fee_description12 = "<tr><td>".$row_email_dealer_invoice['fee_description12']."</td><td align='center'>".$row_email_dealer_invoice['quantity12']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price12']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount12']."</td><td align='center'>".$row_email_dealer_invoice['tax12']."</td></tr>";
	
	$fees_grouped .= $fee_description12; 
}

if(isset($row_email_dealer_invoice['fee_description13'])){
	
	$fee_description13 = "<tr><td>".$row_email_dealer_invoice['fee_description13']."</td><td align='center'>".$row_email_dealer_invoice['quantity13']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price13']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount13']."</td><td align='center'>".$row_email_dealer_invoice['tax13']."</td></tr>";
	
	$fees_grouped .= $fee_description13; 
}

if(isset($row_email_dealer_invoice['fee_description14'])){
	
	$fee_description14 = "<tr><td>".$row_email_dealer_invoice['fee_description14']."</td><td align='center'>".$row_email_dealer_invoice['quantity14']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price14']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount14']."</td><td align='center'>".$row_email_dealer_invoice['tax14']."</td></tr>";
	
	$fees_grouped .= $fee_description14; 
}

if(isset($row_email_dealer_invoice['fee_description15'])){
	
	$fee_description15 = "<tr><td>".$row_email_dealer_invoice['fee_description15']."</td><td align='center'>".$row_email_dealer_invoice['quantity15']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_price15']."</td><td align='right'>".'$'.$row_email_dealer_invoice['fee_amount15']."</td><td align='center'>".$row_email_dealer_invoice['tax15']."</td></tr>";
	
	$fees_grouped .= $fee_description15; 
}



$fees .= $fees_grouped;


//Start Email Block

			// Set STMP Mail Server
			ini_set ("SMTP", "mail.idscrm.com");
			 
			 
			// From:
			$sysfrom = "IDS ROBOT <idsrobot@idscrm.com>";
			 
			// TO:
			//$sysSendToEmail = "webgoonie@gmail.com";
			$sysSendToEmail = $dealer_email;
			 
			// BCC:
			$sysbcc = "idscrm.com@gmail.com".$accounts_payable;
			 
			// Grouped Together For Receipient Headers
			$sysTo = $sysSendToEmail;
			$sysrecipients = $sysTo.",".$sysbcc;
			
			// Subject
			$syssubject = "Invoice Ready From IDS";
			
			// Custom Static Variables Based On Conditions
			$thisemail_comments = "New Invoice From IDS Is Ready ";

// HTML Body: (Start With All Content To The Far Right Leave No White Space To Left And Right of Each Line)
$dealer_emailbody = "
<div>
<p><img src='http://idscrm.com/dealer/css/themes/blueberry/images/logo.png' /></p>
<p><h2>Dear $company_name,<h2></p>
<p><b>Thank You For The Opportunity To Serve Your Business.</b></p>
<p>We aim to provide you with easy options for making payments through your dealer account under billing.</p>
<p><b style='color: ##11AA1E'>Invoice Date: </b> $invoice_date | <b style='color: ##11AA1E'>Invoice Due Date: </b> $invoice_duedate</p>
<p><b style='color: ##11AA1E'>Invoice Number: </b> $invoice_number</p>
<hr />
<div>
<table width='100%' border='0' cellpadding='5' cellspacing='5'>
<tr><th align='left'>Description</th><th align='center'>Qty</th><th align='right'>Price</th><th align='right'>Total</th><th align='center'>Taxable</th></tr>
$fees
</table>
</div>
<br />
<p><b style='color: ##11AA1E'>Invoice Amount Due: </b>\$$invoice_amount_due</p>
<hr />
$invoice_comments
<p>You may login to make payment at  https://idscrm.com/dealer/billing.php  under 'Biling', once payment has been made you may disregard this notice.</p>
<p><b>We thank you for your continued business.</b></p>
<p><b>If you have any questions or concerns please don't hesitate to contact us.</b></p>
<hr />
<p style='color: #CCCCCC'><b>Address:</b><i> 227 Sandy Springs Place, Suite D, 227, Sandy Springs GA 30328</i><br />
<b>Phone Number:</b> <i><a href='tel: 404-565-4371'>404-565-4371<a></i><br />
<b>Email:</b> <i>support@idscrm.com</i><br /></p>
<p>Website: <a href='https://www.idscrm.com' target='_blank'>www.IDSCRM.com</a></p>
</div>
";



	$systemhost = "mail.idscrm.com";
	$sysusername = "idsrobot@idscrm.com";
	$syspassword = "idscrmsystem99!";
 
	$sysheaders = array ('From' => $sysfrom,
	'To' => $sysTo,
	'Subject' => $syssubject,
	'MIME-Version' => '1.0',
	'Content-Type' => "text/html; charset=ISO-8859-1\r\n\r\n"
	);

	$syssmtp = Mail::factory('smtp',
	   array ('host' => $systemhost,
		 'auth' => true,
		 'username' => $sysusername,
		 'password' => $syspassword));
//End Email Block


	// True Action That Sends Email
	$sysmail = $syssmtp->send($sysrecipients, $sysheaders, $dealer_emailbody);




//Start Activity Log
	//$row_email_dealer_invoice['invoice_senttoclient'];



	
	$inertDudeActivityStr = "INSERT INTO `idsids_tracking_idsvehicles`.`dudes_activity` (`dudes_dlr_actid`, `dudes_dlr_did`, `dudes_dlr_did_prospctid`, `dudes_dlr_dude_id`, `dudes_dlr_dude_name`, `dudes_dlr_body`, `dudes_dlr_created_at`) VALUES (NULL, '$id', '', '$dudesid', '$myname', 'Edited Invoice for Dealer $id', CURRENT_TIMESTAMP)";
//$inertDudeActivityStr = mysql_real_escape_string($inertDudeActivityStr);


//$result = mysqli_query($idsconnection_mysqli, $inertDudeActivityStr);
// End Activity Log	
	
	
	
	
	header("Location: invoice-pending.php");

endif;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<p><a href="invoice-pending.php" title="Pending Invoices" target="_parent">Go To Pending Invoices</a></p>
<form name="form1" method="post" action="">
  <label>
    <input name="dealer_id" type="text" disabled id="dealer_id" readonly="readonly">
  </label>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
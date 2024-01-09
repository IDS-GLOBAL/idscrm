<?php require_once("db_loggedin.php"); ?>
<?php

$dudesid = $row_userDets['dudes_id']; //$row_qryInvoice['salesPerson1ID'];
$dudesid2 = $row_userDets['dudes2_id']; //$row_qryInvoice['salesPerson1ID'];

$colname_queryInvoice = "-1";
if (isset($_GET['id'])) {
  $colname_queryInvoice = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices` WHERE `invoice_id` = '$colname_queryInvoice'";
$queryInvoice = mysqli_query($idsconnection_mysqli, $query_queryInvoice);
$row_queryInvoice = mysqli_fetch_assoc($queryInvoice);
$totalRows_queryInvoice = mysqli_num_rows($queryInvoice);
$invoicedid = $row_queryInvoice['invoice_dealerid'];
$toinvoicenumber = $row_queryInvoice['invoice_number'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_idsChargefees = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice` WHERE `charges_toinvoicenumber` = '$toinvoicenumber' ORDER BY charges_created_at DESC";
$idsChargefees = mysqli_query($idsconnection_mysqli, $query_idsChargefees);
$row_idsChargefees = mysqli_fetch_assoc($idsChargefees);
$totalRows_idsChargefees = mysqli_num_rows($idsChargefees);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_querySentinvoices = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_sent` WHERE `invoice_sent_id` = `invoice_sent_id` ORDER BY invoice_sent_datetime ASC";
$querySentinvoices = mysqli_query($idsconnection_mysqli, $query_querySentinvoices);
$row_querySentinvoices = mysqli_fetch_assoc($querySentinvoices);
$totalRows_querySentinvoices = mysqli_num_rows($querySentinvoices);


if($did == $invoicedid){
	
}else{
//header("Location: invoices.php");
	
}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons = "SELECT * FROM idsids_idsdms.dudes WHERE dudes_id = '$dudesid'";
$salespersons = mysqli_query($idsconnection_mysqli, $query_salespersons);
$row_salespersons = mysqli_fetch_assoc($salespersons);
$totalRows_salespersons = mysqli_num_rows($salespersons);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons2 = "SELECT * FROM idsids_idsdms.dudes WHERE dudes_id = '$dudesid2'";
$salespersons2 = mysqli_query($idsconnection_mysqli, $query_salespersons2);
$row_salespersons2 = mysqli_fetch_assoc($salespersons2);
$totalRows_salespersons2 = mysqli_num_rows($salespersons2);


$salesperonName = $row_salespersons['dudes_firstname'].' '.$row_salespersons['dudes_lname'];
$salesperonName2 = $row_salespersons2['dudes_firstname'].' '.$row_salespersons2['dudes_lname'];

$invoicecommment1 = 'We would like to thank you for your patience while we take ids to the next level. Your support is very much appreciated. ';

include('inc.definitions-invoice.php');

$invoicecommment2 = 'Please feel free to contact us or your local representative regarding any questions or concerns you may have.';
$invoicecommment3 = 'Call Support @ 404-565-4371 and/or Email us support@idscrm.com. Thank You.';
$invoicecommment4 = '';
$invoicecommment5 = '';

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Invoice</title>

<?php include("inc.head.php"); ?>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        <?php include("_nav_top.php"); ?>
        
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Invoice</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="invoices.php">Invoices</a>
                        </li>
                        <li class="active">
                            <strong>Viewing Invoice</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <!--a href="#" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a -->

                        <!--a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                        <a href="#" class="btn btn-white"><i class="fa fa-check "></i> Save </a -->
                    </div>
                </div>
            </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                
                
                
         <div class="ibox-content m-b-sm border-bottom">
        	<div class="row">
            	<div class="col-md-6">
                
                <a href="invoices.php" class="btn btn-block btn-outline btn-warning">Invoices</a>
                </div>
            	<div class="col-md-6">
                <a href="invoice.history.php" class="btn btn-block btn-outline btn-primary">Payments</a>
                                
                </div>
            </div>
        </div>


                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>From:</h5>

                            <?php if($row_queryInvoice['payment_status'] == 'Paid'): ?>
                                    <h5>Payment Complete!</h5>
                            
                            <?php else: ?>
                                    <h5>Please Complete Payments Using Paypal:</h5>

                            <?php endif; ?>
                                    
                                    
                                    <h5>IDSCRM.com LLC</h5>
                                    <address>
                                        <strong>IDSCRM.com</strong><br>
                                        <abbr title="Phone">P:</abbr> (404) 565-4371
                                    </address>

								<p><strong>IDS Rep #1:</strong> <?php echo $row_salespersons['dudes_firstname']; ?> <?php echo $row_salespersons['dudes_lname']; ?></p>
								<p><strong>IDS Rep #2:</strong> <?php echo $row_salespersons2['dudes_firstname']; ?> <?php echo $row_salespersons2['dudes_lname']; ?></p>
                                    
                                    
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy"><?php echo $row_queryInvoice['invoice_number']; ?></h4>
                                    <span>To:</span>
                                    <address>
										<?php if(!$row_userDets['company_legalname']): ?>
                                        <strong><?php echo $row_userDets['company']; ?></strong><br>
										<?php else: ?>                          
                                        <strong><?php echo $row_userDets['company_legalname']; ?></strong><br>
										<?php endif; ?>
                                        <?php echo $row_userDets['address']; ?><br>
                                        <?php echo $row_userDets['city']; ?>, <?php echo $row_userDets['state']; ?> <?php echo $row_userDets['zip']; ?><br>
                                        <abbr title="Phone">Phone:</abbr> <?php echo $row_userDets['phone']; ?>
                                        <abbr title="Phone">Fax:</abbr> <?php echo $row_userDets['fax']; ?>

                                    </address>
                                    <p>
                                        <span><strong>Invoice Date:</strong> <?php echo date('m/d/y h:i a',strtotime($row_queryInvoice['invoice_date'])); ?></span><br />
                                        <span><strong>Due Date:</strong> <?php echo date('m/d/y h:i a T',strtotime($row_queryInvoice['invoice_duedate'])); ?></span><br />

                                        <span><strong>Pymt Status:</strong> <?php echo $row_queryInvoice['payment_status']; ?></span>
                                    </p>
                                </div>
                            </div>





                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Quanity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Taxed</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php include("inc.invoice-items-ifelse.php"); ?>
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>SubTotal :</strong></td>
                                    <td>$<?php echo $row_queryInvoice['invoice_subtotal']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>TAX <?php echo $row_queryInvoice['sales_taxrate']; ?>%</strong></td>
                                    <td>$<?php echo $row_queryInvoice['invoice_taxtotal']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL:</strong></td>
                                    <td>$<?php echo $row_queryInvoice['invoice_total']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Previous Balance :</strong></td>
                                    <td>$0.00</td>
                                </tr>

                                <tr>
                                    <td><strong>Applied Credit:</strong></td>
                                    <td>$0.00</td>
                                </tr>

                                <tr>
                                    <td><strong>Applied Payment:</strong></td>
                                    <td>$<?php echo $row_queryInvoice['applied_payment']; ?></td>
                                </tr>

                                <tr>
                                    <td><strong>AMOUNT DUE:</strong></td>
                                    <td>$<?php echo $row_queryInvoice['invoice_amount_due']; ?></td>
                                </tr>

                                </tbody>
                            </table>
                            

                            <?php if($row_queryInvoice['payment_status'] == 'UnPaid'): ?>
                            <div class="text-right">
                           		<?php include('../Libary/PayPalCheckout.php'); ?>
                            </div>
                            
                            <?php else: ?>

                            
                            <div class="text-right">
                                <button class="btn btn-success"><i class="fa fa-dollar"></i> Payment Complete</button>
                            </div>
                            
                            
                            <?php endif; ?>

                            <div class="well m-t"><strong>Comments</strong>
							<p><?php echo $invoicecommment1; ?></p>
							<p><?php echo $invoicecommment2; ?></p>                            
							<p><?php echo $invoicecommment3; ?></p>
							<p><?php echo $invoicecommment4; ?></p>                            
							<p><?php echo $invoicecommment5; ?></p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
        <?php include("footer.php"); ?>

        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>


</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
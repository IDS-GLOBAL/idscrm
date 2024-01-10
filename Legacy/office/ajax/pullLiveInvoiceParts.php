<?php require_once('../db_admin.php'); ?>
<?php


if(!$_POST) exit();
if(isset($_POST['goLiveview_invcid'], $_POST['goLiveview_thisdid'])){

			
  $thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_thisdid']));

$colname_queryInvoice = "-1";
if (isset($_POST['goLiveview_invcid'])) {
  $colname_queryInvoice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_invcid']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_LiveInvoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices`, `idsids_idsdms`.`dealers` WHERE `ids_toinvoices`.`invoice_dealerid` = `dealers`.`id` AND `ids_toinvoices`.`invoice_id` = '$colname_queryInvoice'";
$query_LiveInvoice = mysqli_query($idsconnection_mysqli, $query_query_LiveInvoice);
$row_LiveInvoice = mysqli_fetch_array($query_LiveInvoice);
$totalRows_LiveInvoice = mysqli_num_rows($query_LiveInvoice);

$row_LiveInvoiceID = $row_LiveInvoice['invoice_id'];
$recurring_invoice_dealerid = $row_LiveInvoice['invoice_dealerid'];



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastrecurringInvcNum = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices` WHERE `invoice_dealerid` = '$thisdid' ORDER BY `invoice_number` DESC";
$lastrecurringInvcNum = mysqli_query($idsconnection_mysqli, $query_lastrecurringInvcNum);
$row_lastrecurringInvcNum = mysqli_fetch_array($lastrecurringInvcNum);
$totalRows_lastrecurringInvcNum = mysqli_num_rows($lastrecurringInvcNum);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoice_chargestoinvoice = "
SELECT * FROM 
`idsids_idsdms`.`ids_chargestoinvoice`
LEFT JOIN `idsids_idsdms`.`ids_toinvoices`
    ON `ids_chargestoinvoice`.`charges_invoiceToken` = `ids_toinvoices`.`invoice_tokenid`  
     WHERE 
     `ids_toinvoices`.`payment_status` = 'UnPaid' 
     AND 
     `ids_toinvoices`.`invoice_status` = 'Active' 
     AND 
     `ids_toinvoices`.`payment_status` NOT IN ('Paid') 
     AND
        `ids_chargestoinvoice`.`charges_toinvoice_id` = '$row_LiveInvoiceID'
    AND
        `ids_chargestoinvoice`.`charges_dealerid` = '$recurring_invoice_dealerid'
     GROUP BY
    `ids_chargestoinvoice`.`charges_id`
    ORDER BY 
    `ids_chargestoinvoice`.`charges_created_at` DESC
     ";
$inVoice_chargestoinvoice = mysqli_query($idsconnection_mysqli, $query_inVoice_chargestoinvoice);
$row_inVoice_chargestoinvoice = mysqli_fetch_array($inVoice_chargestoinvoice);
$totalRows_inVoice_chargestoinvoice = mysqli_num_rows($inVoice_chargestoinvoice);



 }else{ 
 	
	exit(); 
 
 }
 
?>
  <div class="hr-line-dashed"></div>
  
        <div class="border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>Loaded Live Invoice ID#<?php echo $row_LiveInvoice['invoice_id']; ?></h2>
                <ol class="breadcrumb">
                    <li>
                        <a id="fastclick_reoccuringinvoicesview" class="page-scroll" href="#reoccuringINVoictabs"><strong>Invoice</strong></a>
                    </li>
                    <li class="active">
                        <strong>Viewing Invoice</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>From:</h5>
                                    <address>
                                        <strong>IDSCRM.COM, LLC</strong><br>
                                        309 WINTHROP LN<br>
                                        McDonough GA 30253<br>
                                        <abbr title="Phone">P:</abbr> (404) 565-4371
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No. <span><?php echo $row_LiveInvoice['invoice_number']; ?> </span></h4>
                                    <h4 class="text-navy"><?php echo $row_LiveInvoice['token']; ?></h4>
                                    <address>
                                    <strong>To: </strong> <?php echo $row_LiveInvoice['company']; ?><br />
                                        <?php echo $row_LiveInvoice['address']; ?><br />
                                        <?php echo $row_LiveInvoice['city']; ?>, <?php echo $row_LiveInvoice['state']; ?>
                                        <?php echo $row_LiveInvoice['zip']; ?><br />
                                        <abbr title="Phone">P:</abbr> <?php echo $row_LiveInvoice['phone']; ?><br/>
                                        <abbr title="Phone">F:</abbr> <?php echo $row_LiveInvoice['fax']; ?>
                                    </address>
                                    <p>
                                   	  <span><strong>Opened Date: </strong><?php echo $row_LiveInvoice['invoice_created_at']; ?> </span><br/>
                                        <span><strong>Invoice Date:</strong> <?php echo $row_LiveInvoice['invoice_date']; ?></span><br/>
                                        <span><strong>Due Date:</strong> <?php echo $row_LiveInvoice['invoice_duedate']; ?></span>
                                  </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Current Charges</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Tax</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    
<?php if($totalRows_inVoice_chargestoinvoice != 0): do {  ?>
                                    <tr id='<?php echo $row_inVoice_chargestoinvoice['charges_invoiceToken']; ?>'>
                                        <td><div><strong><?php echo $row_inVoice_chargestoinvoice['charges_fee_description']; ?></strong></div>
                                            <small><?php echo $row_inVoice_chargestoinvoice['charges_hardtime']; ?></small></td>
                                        <td><?php echo $row_inVoice_chargestoinvoice['charges_fee_qty']; ?></td>
                                        <td>$<?php echo $row_inVoice_chargestoinvoice['charges_fee_price']; ?></td>
                                        <td>$0.00 <?php if($row_inVoice_chargestoinvoice['charges_fee_taxed'] == 'Y'){ echo $row_inVoice_chargestoinvoice['charges_fee_taxed']; }else{ echo $row_inVoice_chargestoinvoice['charges_fee_taxed']; } ?> </td>
                                        <td>$<?php echo $row_inVoice_chargestoinvoice['charges_amount']; ?></td>
                                    </tr>
<?php } while ($row_inVoice_chargestoinvoic = mysqli_fetch_array($inVoice_chargestoinvoice)); else: ?>


                                    <tr>
                                        <td><div><strong>No Charges Exist For This Invoice</strong></div>
                                            <small>Try running and old script or something and comb all the singe line items you have to make charges that belong to the invoice token and invoice id so that you can show the life of all your charges of what you been doing.</small></td>
                                        <td>1</td>
                                        <td>$26.00</td>
                                        <td>$5.98</td>
                                        <td>$31,98</td>
                                    </tr>
<?php endif; ?>
                                    

                                  

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td>$<?php echo $row_LiveInvoice['invoice_subtotal']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>TAX : <input value="<?php echo $row_LiveInvoice['sales_taxrate']; ?>" size="4" /></strong></td>
                                    <td>$<?php echo $row_LiveInvoice['invoice_taxtotal']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>$<?php echo $row_LiveInvoice['invoice_total']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>APPLIED PAYMENT :</strong></td>
                                    <td><?php if($row_LiveInvoice['applied_payment']){ echo '$'.$row_LiveInvoice['applied_payment']; }else{ echo '$0.00'; } ?></td>
                                </tr>
                                <tr>
                                    <td><strong>AMOUNT DUE :</strong></td>
                                    <td>$<?php echo $row_LiveInvoice['invoice_amount_due']; ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-right">
                                <button id="make_payment_liveInvoiceBtn" class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                            </div>

                            <div class="well m-t"><strong>Comments</strong>
                                <?php echo $row_LiveInvoice['invoice_comments']; ?>
                            </div>

                            <div class="well m-t"><strong>terms Conditions</strong>
                                <?php echo $row_LiveInvoice['terms_conditions']; ?>
                            </div>

                        </div>
                </div>
            </div>
        </div>
<?php include("inc.end.phpmsyql.php"); ?>
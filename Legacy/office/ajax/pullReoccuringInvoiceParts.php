<?php if(!$_POST) exit(); ?>
<?php require_once('../db_admin.php'); ?>
<?php



//print_r($_POST);
if(isset($_POST['goview_recurinvcid'], $_POST['goview_thisdid'])){

        $reocurring_invoice_id =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_recurinvcid']));
         $goview_thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_thisdid']));

$colname_queryInvoice = "-1";
if (isset($_POST['goview_recurinvcid'])) {
  $colname_queryRecurInvoice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_recurinvcid']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_recurringInvoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring`
INNER JOIN `idsids_idsdms`.`dealers` ON `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id` WHERE `ids_toinvoices_recurring`.`invoice_id` = '$reocurring_invoice_id'
AND `dealers`.`id` = '$goview_thisdid'
";
$query_recurringInvoice = mysqli_query($idsconnection_mysqli, $query_query_recurringInvoice);
$row_recurringInvoice = mysqli_fetch_array($query_recurringInvoice);
$totalRows_recurringInvoice = mysqli_num_rows($query_recurringInvoice);

$verified_recurringInvoiceID = $row_recurringInvoice['invoice_id'];
$verified_invoice_dealerid = $row_recurringInvoice['invoice_dealerid'];



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastrecurringInvcNum = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring` WHERE `invoice_dealerid` = '$goview_thisdid' ORDER BY `invoice_number` DESC";
$lastrecurringInvcNum = mysqli_query($idsconnection_mysqli, $query_lastrecurringInvcNum);
$row_lastrecurringInvcNum = mysqli_fetch_array($lastrecurringInvcNum);
$totalRows_lastrecurringInvcNum = mysqli_num_rows($lastrecurringInvcNum);
$nextreccur_invoice_number = $totalRows_lastrecurringInvcNum;
$nextreccur_invoice_number++;


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoice_recur_chargestoinvoice = "
SELECT * FROM
`idsids_idsdms`.`ids_chargestorecurring`
LEFT JOIN `idsids_idsdms`.`ids_toinvoices`
    ON `ids_chargestorecurring`.`recur_charges_invoiceToken` = `ids_toinvoices`.`invoice_tokenid`
LEFT JOIN `idsids_idsdms`.`ids_fees`
    ON `ids_chargestorecurring`.`recur_charges_fee_id` = `ids_fees`.`fee_id`
     WHERE
     `ids_chargestorecurring`.`recur_charges_dealerid` = '$goview_thisdid'
     AND
     `ids_chargestorecurring`.`recur_charges_invoice_id` = '$colname_queryRecurInvoice'

     GROUP BY
    `ids_chargestorecurring`.`recur_charges_id`
    ORDER BY
		`ids_chargestorecurring`.`recur_charges_lineitem` DESC, `ids_chargestorecurring`.`recur_charges_lineitem` ASC, `ids_chargestorecurring`.`recur_charges_id` DESC

     ";
$inVoice_recur_chargestoinvoice = mysqli_query($idsconnection_mysqli, $query_inVoice_recur_chargestoinvoice);
$row_inVoice_recur_chargestoinvoice = mysqli_fetch_array($inVoice_recur_chargestoinvoice);
$totalRows_inVoice_recur_chargestoinvoice = mysqli_num_rows($inVoice_recur_chargestoinvoice);



 }else{

	exit();

 }

?>
  <div class="hr-line-dashed"></div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Loaded Reoccuring Invoice ID#<?php echo $row_recurringInvoice['invoice_id']; ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a id="fastclick_reoccuringinvoicesview" class="page-scroll" href="#reoccuringINVoictabs"><strong>Reoccuring Invoices</strong></a>
                        </li>
                        <li class="active">
                            <strong>Viewing Reoccuring Invoice</strong>
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
                                    <h4>Invoice No. <span><?php echo $row_recurringInvoice['invoice_number']; ?> </span></h4>
                                    <h4 class="text-navy"><?php echo $row_recurringInvoice['token']; ?></h4>
                                    <address>
                                    <strong>To: </strong> <?php echo $row_recurringInvoice['company']; ?><br />
                                        <?php echo $row_recurringInvoice['address']; ?><br />
                                        <?php echo $row_recurringInvoice['city']; ?>, <?php echo $row_recurringInvoice['state']; ?>
                                        <?php echo $row_recurringInvoice['zip']; ?><br />
                                        <abbr title="Phone">P:</abbr> <?php echo $row_recurringInvoice['phone']; ?><br/>
                                        <abbr title="Phone">F:</abbr> <?php echo $row_recurringInvoice['fax']; ?>
                                    </address>
                                    <p>
                                   	  <span><strong>Opened Date: </strong><?php echo $row_recurringInvoice['invoice_created_at']; ?> </span><br/>
                                        <span><strong>Invoice Date:</strong> <?php echo $row_recurringInvoice['invoice_date']; ?></span><br/>
                                        <span><strong>Due Date:</strong> <?php echo $row_recurringInvoice['invoice_duedate']; ?></span>
                                  </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Item List</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Tax</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>

<?php if($totalRows_inVoice_recur_chargestoinvoice != 0): do{  ?>
                                    <tr>
                                        <td><div><strong><?php echo $row_inVoice_recur_chargestoinvoice['fee_type']; ?> | <?php echo $row_inVoice_recur_chargestoinvoice['fee_description']; ?> </strong></div>
                                            <small><?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_fee_description']; ?></small></td>
                                        <td><?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_fee_qty']; ?></td>
                                        <td>$<?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_fee_price']; ?></td>
                                        <td><?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_fee_taxed']; ?></td>
                                        <td>$<?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_amount']; ?></td>
                                    </tr>
<?php } while ($row_inVoice_recur_chargestoinvoice = mysqli_fetch_array($inVoice_recur_chargestoinvoice));  else: ?>


                                    <tr>
                                        <td><div><strong>Sorry No Charges</strong></div>
                                            <small>....</small></td>
                                        <td>0</td>
                                        <td>$0000</td>
                                        <td>$0.00</td>
                                        <td>$0.00</td>
                                    </tr>
<?php endif; ?>


                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td>$<?php echo $row_recurringInvoice['invoice_subtotal']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>TAX : <input id="sales_taxrate_user_override_reoccuring_input" value="<?php echo $row_recurringInvoice['sales_taxrate']; ?>" size="4" /></strong></td>
                                    <td>$<?php echo $row_recurringInvoice['invoice_taxtotal']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>$<?php echo $row_recurringInvoice['invoice_total']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>APPLIED PAYMENT :</strong></td>
                                    <td>$<?php if(!$row_recurringInvoice['applied_payment']){ echo $row_recurringInvoice['applied_payment']; }else{ echo '0.00'; } ?></td>
                                </tr>
                                <tr>
                                    <td><strong>AMOUNT DUE :</strong></td>
                                    <td>$<?php echo $row_recurringInvoice['invoice_amount_due']; ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-right">
                                <button id="make_payment_reocurringInvoiceBtn" class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                            </div>

                            <div class="well m-t"><strong>Comments</strong>
                                <?php echo $row_recurringInvoice['invoice_comments']; ?>
                            </div>

                            <div class="well m-t"><strong>terms Conditions</strong>
                                <?php echo $row_recurringInvoice['terms_conditions']; ?>
                            </div>

                        </div>
                </div>
            </div>
        </div>
<?php include("inc.end.phpmsyql.php"); ?>

<?php require_once('../db_admin.php'); ?>
<?php

$system_dealerid = '-1';
$colname_queryInvoice = "-1";
if (isset($_POST['goLiveview_thisdid'], $_POST['goview_thisLiveinvcid'])) {
  $colname_queryInvoice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_thisLiveinvcid']));
  $system_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goLiveview_thisdid']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_liveInvoice =  "
SELECT *
FROM
  `idsids_idsdms`.`ids_toinvoices`
INNER JOIN  `idsids_idsdms`.`dealers`
ON `ids_toinvoices`.`invoice_dealerid` = `dealers`.`id`
WHERE
`ids_toinvoices`.`invoice_dealerid` = '$system_dealerid'
  AND
  `ids_toinvoices`.`invoice_id` = '$colname_queryInvoice'";
$query_liveInvoice = mysqli_query($idsconnection_mysqli, $query_query_liveInvoice);
$row_liveInvoice = mysqli_fetch_array($query_liveInvoice);
$totalRows_liveInvoice = mysqli_num_rows($query_liveInvoice);

$live_invoice_id = $row_liveInvoice['invoice_id'];
$live_invoice_dealerid = $row_liveInvoice['invoice_dealerid'];
$dealer_company_name = $row_liveInvoice['company'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastliveInvcNum = "
SELECT * FROM
`idsids_idsdms`.`ids_toinvoices`
  WHERE
    `ids_toinvoices`.`invoice_dealerid` = '$system_dealerid'
    ORDER BY `invoice_number` ASC
";
$lastliveInvcNum = mysqli_query($idsconnection_mysqli, $query_lastliveInvcNum);
$row_lastliveInvcNum = mysqli_fetch_array($lastliveInvcNum);
$totalRows_lastliveInvcNum = mysqli_num_rows($lastliveInvcNum);
$nextlive_invoice_number = $row_lastliveInvcNum['invoice_number'];
$nextlive_invoice_number++;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM `idsids_idsdms`.`ids_fees` ORDER BY `ids_fees`.`fee_type` ASC ";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);





mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoice_chargestoinvoice = "
SELECT * FROM
`idsids_idsdms`.`ids_chargestoinvoice`
LEFT JOIN `idsids_idsdms`.`ids_toinvoices`
    ON `ids_chargestoinvoice`.`charges_invoiceToken` = `ids_toinvoices`.`invoice_tokenid`
LEFT JOIN  `idsids_idsdms`.`ids_fees`
    ON `ids_chargestoinvoice`.`charges_fee_id` = `ids_fees`.`fee_id`
     WHERE
     `ids_toinvoices`.`payment_status` = 'UnPaid'
     AND
     `ids_toinvoices`.`invoice_status` = 'Active'
     AND
     `ids_toinvoices`.`payment_status` NOT IN ('Paid')
     AND
     `ids_toinvoices`.`invoice_dealerid` = '$system_dealerid'
     AND
     `ids_toinvoices`.`invoice_id` = '$live_invoice_id'
     GROUP BY
    `ids_chargestoinvoice`.`charges_id`
    ORDER BY
    `ids_chargestoinvoice`.`charges_lineitem` ASC, `ids_chargestoinvoice`.`charges_created_at` ASC
		
     ";
$inVoice_chargestoinvoice = mysqli_query($idsconnection_mysqli, $query_inVoice_chargestoinvoice);
$row_inVoice_chargestoinvoice = mysqli_fetch_array($inVoice_chargestoinvoice);
$totalRows_inVoice_chargestoinvoice = mysqli_num_rows($inVoice_chargestoinvoice);


?>
<div class="form-horizontal">
    <div class="row">
                    <h3>Loaded Invoice</h3>
                    <h2 id="liveinvcCreateInvc_name_display">Editing Live Invoice</h2>
                    <small>Invoice Sent To Client?: <?php echo $row_liveInvoice['invoice_senttoclient']; ?></small>
                    <small>Sent To Client: <?php echo $row_liveInvoice['invoice_senttoclient_date']; ?></small>
                    

        <!--Not Sure If I wanna keep this because we are running ids across the tabs with tokens as well -->
      <input id="edit_invoice_dealerid" name="edit_invoice_dealerid" type="hidden"  value="">


    </div>
    <div class="contain">

            <div class="row">
                        <div class="form-group">
                            <label for="edit_invoice_number" class="col-sm-2 control-label">Invoice Number</label>
                            <div class="col-sm-10">
                            <input type="text" placeholder="Enter Invoice Number" id="edit_invoice_number" name="edit_invoice_number" class="form-control" value="<?php echo $row_liveInvoice['invoice_number']; ?>">
                            </div>
                        </div>


                        <div class="form-group" id="data_startdate">
                            <label for="edit_invoice_date" class="font-noraml col-sm-2 control-label">Start Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="edit_invoice_date" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>


                        <div class="form-group" id="data_duedate">
                            <label for="edit_invoice_duedate" class="font-noraml col-sm-2 control-label">Due Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="edit_invoice_duedate" type="text" class="form-control" value="<?php echo $row_liveInvoice['invoice_duedate']; ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="dealer_email_recipients" class="col-sm-2 control-label">Dealer Email Recipients</label>
                            <div class="col-sm-10">
                            <input type="text" placeholder="Email Receipents To Get Copy Of Email" id="dealer_email_recipients" class="form-control" value="<?php if(!$row_liveInvoice['dealer_email_recipients']){  echo $row_liveInvoice['email']; }else{echo $row_liveInvoice['dealer_email_recipients'];} ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_live_invoice_terms" class="col-sm-2 control-label">Terms</label>
                            <div class="col-sm-10">
                            <input type="text" placeholder="Terms" id="edit_live_invoice_terms" class="form-control" value="<?php echo $row_liveInvoice['invoice_terms']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dealer_email_recipients" class="col-sm-2 control-label">Invoice Status</label>
                            <div class="col-sm-10">
                                <select id="edit_live_invoice_status" name="edit_live_invoice_status" class="form-control">
                                    
                                        <option value="Active" <?php if (!(strcmp("Active", $row_inVoice_chargestoinvoice['invoice_status']))) {echo "selected=\"selected\"";} ?>>Active</option>
                                        <option value="Inactive" <?php if (!(strcmp("Inactive", $row_inVoice_chargestoinvoice['invoice_status']))) {echo "selected=\"selected\"";} ?>>InActive</option>

                                </select>
                            </div>
                        </div>




            </div>
            <div class="row">
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="invoice_sendtoclient" class="col-sm-2 control-label">Email Client?</label>

                                                        <div class="col-sm-10">
                                                        <select class="form-control m-b" id="edit_invoice_sendtoclient" name="invoice_sendtoclient">
                                                            <option value="Y" selected="selected">YES</option>
                                                            <option value="N">NO</option>
                                                        </select>

                                                        </div>
                                                    </div>




                </div>
                <div class="col-sm-6">


                                                    <div class="form-group">
                                                        <label for="edit_invoice_currency" class="col-sm-2 control-label">Currency Accepted</label>

                                                        <div class="col-sm-10">
                                                        <select class="form-control m-b" id="edit_invoice_currency" name="edit_invoice_currency">
                                                            <option value="USD" selected="selected">USD</option>
                                                        </select>

                                                        </div>
                                                    </div>



                </div>
            </div>

            <div class="row">

                <div class="col-sm-6">

                                                        <div class="form-group">
                                                            <label for="discount_value" class="col-sm-2 control-label">Discount Value</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" placeholder="Discount Value" id="editLive_discount_value" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['discount_value']) { echo '0.00'; }else{echo $row_inVoice_chargestoinvoice['discount_value'];} ?>">
                                                            </div>
                                                        </div>

                </div>
                <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="discount_dollarorpercn" class="col-sm-2 control-label">Discount Dollar or %</label>
                                                            <div class="col-sm-10">
                                                            
                                                            <select class="form-control m-b" id="editLive_discount_dollarorpercn" name="editLive_discount_dollarorpercn">
                                                        <?php $discount_dollarorpercn = $row_inVoice_chargestoinvoice['discount_dollarorpercn']; ?>
                                                        <option value="dollars" <?php if (!(strcmp("dollars", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>$ Dollars</option>
                                                        <option value="percentage" <?php if (!(strcmp("percentage", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>% Percentage</option>
                                                        </select>
                                                            </div>
                                                        </div>

                </div>

            </div>






            <!-- Removed .row to have border box collapse 12-12-2019 -->
            <div class="">


                <div class="hr-line-dashed"></div>

              <div id="update_live_invoice_fees_box">



              <h2></h2>


                <div class="form-group has-warning">
                    <label class="col-sm-2 control-label">Instructions</label>

                    <div  class="col-sm-10">Let's See How We Want To Add Unlimited Fees To this reocurring invoice using javascript and php ajax.</div>
                </div>
                <div id="liveEditInvoiceInnerFees" class="inner-fees">
                    <?php
                     $countmequick=0;
                     do {
                        $countmequick++; 
                          ?>

                    <div class="form-group has-warning">
                    <input id="linenumber_live_<?php echo $countmequick; ?>" class="live-linenumber" type='hidden' value="<?php echo $countmequick; ?>">
                                                            <input id="editLive_livecharge_<?php echo $row_inVoice_chargestoinvoice['charges_id']; ?>" class="editLive_livecharges_id" type='hidden' value="<?php echo $row_inVoice_chargestoinvoice['charges_id']; ?>">

                            <label class="col-sm-1 control-label"><a class="remove_liveEdit_fee_el preloaded"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a>
                            </label>

                        <div class="col-sm-10">
                            <div id="charges_lineitem_create_live_invoice" class="row">
                                        <div class="col-md-2">

                                            <select name="editLive_charges_fee_type" class="form-control preloaded" id="editLive_charges_fee_type">

                                                <option value="" <?php if (!(strcmp("", $row_inVoice_chargestoinvoice['charges_fee_id']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                                <?php do {  ?>
                                                    <option value="<?php echo $row_fees['fee_id']?>" <?php if (!(strcmp($row_fees['fee_id'], $row_inVoice_chargestoinvoice['charges_fee_id']))) {echo "selected=\"selected\"";} ?>>
                                                    <?php echo $row_fees['fee_description']?>
                                                    </option>
                                                    <?php } while ($row_fees = mysqli_fetch_array($fees));
                                                        $rows = mysqli_num_rows($fees);
                                                        if($rows > 0) {
                                                            mysqli_data_seek($fees, 0);
                                                            $row_fees = mysqli_fetch_array($fees);
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                                <input name="editLive_charges_fee_description" type="text" class="form-control" id="editLive_charges_fee_description" placeholder="Description" value="<?php echo $row_inVoice_chargestoinvoice['charges_fee_description']; ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input name="editLive_charges_fee_qty" type="number" class="form-control" id="editLive_charges_fee_qty" placeholder="Qty." value="<?php echo $row_inVoice_chargestoinvoice['charges_fee_qty']; ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input name="editLive_charges_fee_price" type="number" class="form-control" id="editLive_charges_fee_price" placeholder="Price" value="<?php echo $row_inVoice_chargestoinvoice['charges_fee_price']; ?>">
                                        </div>
                                        
                                        
                                        <div class="col-md-2">
                                            <div class="input-group">
                                            <?php
                                                if (is_float($row_inVoice_chargestoinvoice['charges_amount'])) {
                                                    $live_charges_amount = number_format($row_inVoice_chargestoinvoice['charges_amount'], 2);
                                                    }else{ 
                                                        $live_charges_amount = $row_inVoice_chargestoinvoice['charges_amount']; 
                                                        } 
                                                    ?>
                                            <input name="editLive_charges_amount" type="number" class="form-control" id="editLive_charges_amount" placeholder="Total" value="<?php echo $row_inVoice_chargestoinvoice['charges_amount']; ?>">

                                                
                                                <div class="input-group-addon">
                                                                                    
                                            <?php if($row_inVoice_chargestoinvoice['charges_fee_taxed'] == 'Y'){ $charges_fee_taxed = "checked='checked'"; }else{$charges_fee_taxed=''; } ?>

                                            <input id="editLive_charges_fee_taxed" name="editLive_charges_fee_taxed" <?php echo $charges_fee_taxed; ?>  type="checkbox"  value="<?php echo $row_inVoice_chargestoinvoice['charges_fee_taxed']; ?>">
                                                                                    
                                                                                        </div>




                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>

                    <?php } while ($row_inVoice_chargestoinvoice = mysqli_fetch_array($inVoice_chargestoinvoice)); ?>

                    

                </div>


                    <div class="form-group has-warning">

                        <label class="col-sm-2 control-label">&nbsp;</label>

                        <div class="col-sm-10">
                            <div class="col-md-2">
                                <button id="add_new_invoice_lineEdintLiveNewfee_btn" class="btn btn-outline btn-warning dim"><i class="fa fa-plus-o"></i> Add New Line</button>
                            </div>

                        </div>
                    </div>
              </div><!-- End create_sysdealer_invoice_fees_box -->

              <div class="hr-line-dashed"></div>



            </div>

            <div class="row">
                <div class="col-sm-6">

                                                        <div class="form-group">
                                                            <label for="editLive_sales_taxrate" class="col-sm-2 control-label">Sales Taxrate</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" placeholder="sales taxrate" id="editLive_sales_taxrate" name="editLive_sales_taxrate" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['sales_taxrate']){ echo '7.0'; }else{ echo $row_inVoice_chargestoinvoice['sales_taxrate']; } ?>">
                                                            </div>
                                                        </div>

                </div>
                <div class="col-sm-6">

                                                        <div class="form-group">
                                                            <label for="editLive_tax_total" class="col-sm-2 control-label">Tax Total</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" placeholder="tax total" id="editLive_tax_total" name="editLive_tax_total" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['tax_total']) { echo '0.00'; }else{echo $row_inVoice_chargestoinvoice['tax_total'];} ?>">
                                                            </div>
                                                        </div>

                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="invoice_shippinghanding" class="col-sm-2 control-label">Invoice Shipping Handing</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Shipping &amp; Handing" id="editLive_invoice_shippinghanding" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['invoice_shippinghanding']) { echo '0.00'; }else{echo $row_inVoice_chargestoinvoice['invoice_shippinghanding'];} ?>">
                                                        </div>
                                                    </div>

                </div>
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="editLive_invoice_arrival_fee" class="col-sm-2 control-label">Arrival Fee </label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Arrival Fee" id="editLive_invoice_arrival_fee" class="form-control" value="<?php if(!$row_liveInvoice['invoice_arrival_fee']) { echo '0.00'; }else{echo number_format($row_liveInvoice['invoice_arrival_fee'], 2);} ?>">
                                                        </div>
                                                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="editLive_invoice_subtotal" class="col-sm-2 control-label">Invoice Subtotal</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Subtotal" id="editLive_invoice_subtotal" class="form-control" value="<?php if(!$row_liveInvoice['invoice_subtotal']) { echo '0.00'; }else{echo $row_liveInvoice['invoice_subtotal'];} ?>">
                                                        </div>
                                                    </div>


                                                    </div>
                                                    
                                                
                                                    
                
            </div>
            <div class="row">
                <div class="col-sm-6">


                                                    <div class="form-group">
                                                        <label for="editLive_invoice_taxtotal" class="col-sm-2 control-label">Invoice Taxtotal</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Taxtotal" id="editLive_invoice_taxtotal" class="form-control" value="<?php echo $row_liveInvoice['invoice_taxtotal']; ?>">
                                                        </div>
                                                    </div>


                </div>
                <div class="col-sm-6">


                                                    <div class="form-group">
                                                        <label for="editLive_invoice_total" class="col-sm-2 control-label">Invoice Total</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Total" id="editLive_invoice_total" class="form-control" value="<?php echo $row_liveInvoice['invoice_total']; ?>">
                                                        </div>
                                                    </div>



                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="editLive_applied_payment" class="col-sm-2 control-label">Write Off Amount</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Applied Payment" id="editLive_applied_payment" name="editLive_applied_payment" class="form-control" value="<?php if(!$row_liveInvoice['applied_payment']) { echo '0.00'; }else{echo $row_liveInvoice['applied_payment'];} ?>">
                                                        </div>
                                                    </div>


                </div>
                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="editLive_invoice_amount_due" class="col-sm-2 control-label">Invoice Amount Due</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Amount Due" id="editLive_edit_invoice_amount_due" class="form-control" value="<?php if(!$row_liveInvoice['invoice_amount_due']) { echo '0.00'; }else{echo $row_liveInvoice['invoice_amount_due'];} ?>">
                                                        </div>
                                                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                                                    <div class="checkbox m-l m-r-xs">
                                                        <label class="i-checks col-sm-2 control-label"> <input id="editLive_copy_dudes_onEmail" type="checkbox" value="1" checked="checked"><i></i> Copy Invoice To Me </label>
                                                        <div class="col-sm-10">

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="editLive_terms_conditions" class="col-sm-2 control-label">Terms Conditions</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Terms Conditions" id="editLive_terms_conditions" class="form-control" value="<?php echo $row_liveInvoice['terms_conditions']; ?>">
                                                        </div>

                                                    </div>


                </div>
            </div>
            <div class="row">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="invoice_comments" class="col-sm-2 control-label">Invoice Comments</label>
                            <div class="col-sm-10">
                            <input type="text" placeholder="Invoice Comments" id="editLive_invoice_comments" class="form-control" value="<?php echo $row_liveInvoice['invoice_comments']; ?>">
                            </div>
                        </div>

                    </div>

            </div>
            <div class="row">
                                                        <button id="save_edited_live_invoice_loaded" class="btn btn-warning btn-block btn-lg" type="button">Save Live Invoice</button>
            </div>

    </div>

</div>

<script>
    //To have calendar access on ajax load

    console.log('running live invoice total with taxes');
    
    process_livetotal();

            $('#data_startdate .input-group.date').datepicker({
                todayBtn: "linked",
				        format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_duedate .input-group.date').datepicker({
                todayBtn: "linked",
			        	format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });




            console.log('Passing the Next Live Invoice Number from pullLiveInvc From ajax');
            //$('a#go_pdfview_live_invoice').html('<?php //echo $live_invoice_dealerid.' - '.$dealer_company_name; ?>');
            $('input#invoice_number').val('<?php echo $nextlive_invoice_number; ?>');


</script>

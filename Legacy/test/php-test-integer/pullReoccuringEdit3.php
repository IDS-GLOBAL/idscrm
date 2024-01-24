<?php require_once('../db_admin.php'); ?>
<?php
//print_r($_POST);
$goview_thisdid = '-1';
$goview_recurinvcid = "-1";
if (isset($_POST['goview_thisdid'], $_POST['goview_recurinvcid'])) {
  $goview_recurinvcid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_recurinvcid']));
  $goview_thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['goview_thisdid']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_recurringInvoice =  "
SELECT *
FROM
  `idsids_idsdms`.`ids_toinvoices_recurring`
INNER JOIN  `idsids_idsdms`.`dealers`
ON `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`
WHERE
`ids_toinvoices_recurring`.`invoice_dealerid` = '$goview_thisdid'
  AND
  `ids_toinvoices_recurring`.`invoice_id` = '$goview_recurinvcid'";
$query_recurringInvoice = mysqli_query($idsconnection_mysqli, $query_query_recurringInvoice);
$row_recurringInvoice = mysqli_fetch_array($query_recurringInvoice);
$totalRows_recurringInvoice = mysqli_num_rows($query_recurringInvoice);

$recurring_invoice_id = $row_recurringInvoice['invoice_id'];
$recurring_invoice_dealerid = $row_recurringInvoice['invoice_dealerid'];
$dealer_company_name = $row_recurringInvoice['company'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastrecurringInvcNum = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring` WHERE `ids_toinvoices_recurring`.`invoice_id` = '$goview_recurinvcid' ORDER BY `invoice_number` ASC";
$lastrecurringInvcNum = mysqli_query($idsconnection_mysqli, $query_lastrecurringInvcNum);
$row_lastrecurringInvcNum = mysqli_fetch_array($lastrecurringInvcNum);
$totalRows_lastrecurringInvcNum = mysqli_num_rows($lastrecurringInvcNum);
$nextreccur_invoice_number = $row_lastrecurringInvcNum['invoice_number'];
$nextreccur_invoice_number++;



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoice_recur_chargestoinvoice = "SELECT * 
FROM
`idsids_idsdms`.`ids_chargestorecurring`
LEFT JOIN `idsids_idsdms`.`ids_toinvoices`
    ON `ids_chargestorecurring`.`recur_charges_invoiceToken` = `ids_toinvoices`.`invoice_tokenid`
LEFT JOIN `idsids_idsdms`.`ids_fees`
    ON `ids_chargestorecurring`.`recur_charges_fee_id` = `ids_fees`.`fee_id`
     WHERE
     `ids_chargestorecurring`.`recur_charges_dealerid` = '$goview_thisdid'
     AND
     `ids_chargestorecurring`.`recur_charges_invoice_id` = '$goview_recurinvcid'

     GROUP BY
    `ids_chargestorecurring`.`recur_charges_id`
    ORDER BY
		`ids_chargestorecurring`.`recur_charges_lineitem` ASC, `ids_chargestorecurring`.`recur_charges_id` ASC

     ";
$inVoice_recur_chargestoinvoice = mysqli_query($idsconnection_mysqli, $query_inVoice_recur_chargestoinvoice);
$row_inVoice_recur_chargestoinvoice = mysqli_fetch_array($inVoice_recur_chargestoinvoice);
$totalRows_inVoice_recur_chargestoinvoice = mysqli_num_rows($inVoice_recur_chargestoinvoice);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM `idsids_idsdms`.`ids_fees` ORDER BY `ids_fees`.`fee_type` ASC ";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);




$public_sum_recur_charges_sql = "SELECT 
		sum(`recur_charges_fee_price`) AS total_recur_fee_price, 
		sum(`recur_charges_amount`) AS total_recur_amount,
        count(`recur_charges_fee_taxed`) AS charges_fee_taxed
        FROM
        `idsids_idsdms`.`ids_chargestorecurring`
LEFT JOIN `idsids_idsdms`.`ids_toinvoices`
    ON `ids_chargestorecurring`.`recur_charges_invoiceToken` = `ids_toinvoices`.`invoice_tokenid`
LEFT JOIN `idsids_idsdms`.`ids_fees`
    ON `ids_chargestorecurring`.`recur_charges_fee_id` = `ids_fees`.`fee_id`
     WHERE
     `ids_chargestorecurring`.`recur_charges_dealerid` = '$goview_thisdid'
     AND
     `ids_chargestorecurring`.`recur_charges_invoice_id` = '$goview_recurinvcid'

     GROUP BY
    `ids_chargestorecurring`.`recur_charges_id`
    ORDER BY
		`ids_chargestorecurring`.`recur_charges_lineitem` ASC, `ids_chargestorecurring`.`recur_charges_lineitem` ASC, `ids_chargestorecurring`.`recur_charges_id` ASC";
$query_sum_recur_charges = mysqli_query($idsconnection_mysqli, $public_sum_recur_charges_sql);
$row_sum_recur_charges = mysqli_fetch_array($query_sum_recur_charges);
$totalRows_sum_recur_charges = mysqli_num_rows($query_sum_recur_charges);

$total_discount = ($row_sum_recur_charges['total_recur_amount'] - 0) - ($row_sum_recur_charges['total_recur_amount'] -0);

$pin = mt_rand(1000, 9999);


?>
<div class="row">
  <div class="col-sm-12">

                                  <h3>Edit Reoccuring Invoice ID#<?php echo $recurring_invoice_id; ?> 
                                  <small>Create New Automatic Invoicing</small></h3>

                                   <input name="edit_this_recurring_invoice_dealerid"
                                          type="hidden"
                                          id="edit_this_recurring_invoice_dealerid"
                                          value="<?php echo $recurring_invoice_dealerid; ?>">
                                  <input name="edit_this_recurring_invoice_id"
                                  type="hidden"
                                  id="edit_this_recurring_invoice_id"
                                  value="<?php echo $recurring_invoice_id ; ?>">

                                  <div class="row">
    
                                    <div class="form-horizontal">
                                      <div class="form-group">
                                              <label for="edit_recurring_invoice_number" class="col-sm-2 control-label">Recurring Invoice Number</label>
                                              <div class="col-sm-10">
                                                  <input name="edit_recurring_invoice_number"
                                                          type="text"
                                                          class="form-control"
                                                          id="edit_recurring_invoice_number"
                                                          value="<?php echo $row_recurringInvoice['invoice_number']; ?>"
                                                          placeholder="Enter Invoice Number">
                                              </div>
                                      </div>
    
                                       <div class="form-group">
                                          <label for="edit_invoice_typeid" class="col-sm-2 control-label">Type ID</label>
                                          <div class="col-sm-10">
    
                                          <select id="edit_invoice_typeid" name="edit_invoice_typeid" class="form-control m-b">
                                            <option value="0" <?php if (!(strcmp("0", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                            <option value="1" <?php if (!(strcmp("1", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Standard</option>
                                            <option value="2" <?php if (!(strcmp("2", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Shipping</option>
                                            <option value="3" <?php if (!(strcmp("3", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Automatic</option>
                                            <option value="4" <?php if (!(strcmp("4", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>New/Test</option>
                                          </select>
                                          </div>
                                      </div>
    
                                      <div class="form-group" id="edit_recurring_data_invoice_creationdate">
                                          <label for="edit_recurring_invoice_created_at" class="font-noraml col-sm-2 control-label">Recurring Invoice Creation Date</label>
                                          <div class="input-group m-b date">
                                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                              <input id="edit_recurring_invoice_date"
                                              type="text"
                                              class="form-control"
                                              placeholder="<?php echo date('Y-m-d'); ?>"
                                              value="<?php if($row_recurringInvoice['invoice_date']){ echo $row_recurringInvoice['invoice_date']; }else{ echo date('Y-m-d');  } ?>">
                                          </div>
    
                                      </div>
    
    
                                      <div class="form-group">
                                          <label for="edit_invc_cret_evry" class="font-noraml col-sm-2 control-label">After That Create A New Invoice Every</label>
    
    
    
    
                                              <div class="col-sm-10">
                                                  <div class="row">
                                                      <div class="col-sm-6">
                                                          <select name="edit_invc_cret_evry" id="edit_invc_cret_evry" class="form-control">
                                                              <?php for ($x = 0; $x <= 30; $x++) { ?>
                                                                  <option value="<?php echo $x; ?>"<?php if (!(strcmp("$x", $row_recurringInvoice['invc_cret_evry']))) {echo "selected=\"selected\"";} ?>><?php echo $x; ?></option>
                                                              <?php } ?>
                                                          </select>
    
                                                      </div>
                                                      <div class="col-sm-6">
                                                          <select name="edit_invc_cret_evrywhn" id="edit_invc_cret_evrywhn" class="form-control">
                                                          <option value="months"<?php if (!(strcmp("months", $row_recurringInvoice['invc_cret_evrywhn']))) {echo "selected=\"selected\"";} ?>>month(s)</option>
                                                          <option value="days"<?php if (!(strcmp("days", $row_recurringInvoice['invc_cret_evrywhn']))) {echo "selected=\"selected\"";} ?>>day(s)</option>
                                                          <option value="years"<?php if (!(strcmp("years", $row_recurringInvoice['invc_cret_evrywhn']))) {echo "selected=\"selected\"";} ?>>year(s)</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                              </div>
    
    
    
    
    
                                      </div>
    
                                      <div id="edit_recurring_invoice_duedate" class="form-group">
                                          <label for="edit_recurring_invoice_duedate" class="col-sm-2 control-label">Create Next Reccur DueDate On</label>
                                          <div class="input-group m-b date">
                                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="edit_recurring_invoice_duedate" type="text" class="form-control" value="<?php echo $row_recurringInvoice['invoice_duedate']; ?>">
                                          </div>
                                      </div>
    
                                      <div id="edit_recurring_invoice_stopdate" class="form-group has-danger">
                                          <label for="edit_invoice_edit_recurring_stopdate" class="col-sm-2 control-label">Don't Create Any Invoices After</label>
                                          <div class="input-group m-b date has-danger">
                                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="edit_invoice_recurring_stopdate" type="text" class="form-control" value="<?php echo $row_recurringInvoice['invoice_recurring_stopdate']; ?>">
                                          </div>
                                      </div>
    
    
                                      <div class="form-group">
                                          <label for="edit_recurring_daysto_payinvoice" class="col-sm-2 control-label">Dealer Days To Pay</label>
                                          <div class="col-sm-10">
                                          <input type="text" placeholder="Days To Pay Invoice" id="edit_recurring_daysto_payinvoice" class="form-control" value="<?php echo $row_recurringInvoice['daysto_payinvoice']; ?>">
                                          </div>
                                      </div>
    
    
                                      <div class="form-group">
                                          <label for="edit_recurring_dealer_email_recipients" class="col-sm-2 control-label">Dealer Email Recipients</label>
                                          <div class="col-sm-10">
                                          <input type="text" placeholder="Email Recipients" id="edit_recurring_dealer_email_recipients" class="form-control" value="<?php
                                                if(!$row_recurringInvoice['dealer_email_recipients']){echo $row_recurringInvoice['email'];}else{echo  $row_recurringInvoice['email'].', '.$row_recurringInvoice['accts_rcvbles_email'];}if($row_recurringInvoice['accts_payables_email']){echo ', '.$row_recurringInvoice['accts_payables_email'];}?> ">
                                          </div>
                                      </div>
    
                                      <div class="form-group">
                                          <label for="edit_recurring_invoice_sendtoclient" class="col-sm-2 control-label">Email Invoice  To Client?</label>
    
                                          <div class="col-sm-10">
                                          <select class="form-control m-b" id="edit_recurring_invoice_sendtoclient" name="edit_recurring_invoice_sendtoclient">
                                              <?php $edit_recurring_invoice_sendtoclient = $row_recurringInvoice['invoice_sendtoclient']; ?>
                                              <option value="Y"<?php if (!(strcmp("Y", "$edit_recurring_invoice_sendtoclient"))) {echo "selected=\"selected\"";}else if(!$row_recurringInvoice['invoice_sendtoclient']){echo "selected=\"selected\"";} ?>>YES</option>
                                              <option value="N" <?php if (!(strcmp("N", "$edit_recurring_invoice_sendtoclient"))) {echo "selected=\"selected\"";} ?>>NO</option>
                                          </select>
    
                                          </div>
                                      </div>
    
    
                                      <div class="form-group">
                                          <label for="edit_recurring_invoice_currency" class="col-sm-2 control-label">Currency Accepted:</label>
    
                                          <div class="col-sm-10">
                                          <select class="form-control m-b" id="edit_recurring_invoice_currency" name="edit_recurring_invoice_currency">
                                              <?php $recurringinvoice_currency = $row_recurringInvoice['invoice_currency']; ?>
                                              <option value="USD" selected="selected">USD</option>
                                          </select>
    
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="hr-line-dashed"></div>
    
    
    
                                        <div id="update_reocurring_invoice_fees_box">
                                                
                
                
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Instructions</label>
                
                                                    <div  class="col-sm-10">Let's See How We Want To Add Unlimited Fees To this reocurring invoice using javascript and php ajax.</div>
                                                </div>
                                                <div class="inner-fees">
                                                    <?php if($totalRows_inVoice_recur_chargestoinvoice != 0): 
                                                    $countmequick=0; 
                                                    do{ 
                                                        $countmequick++; 
                                                    ?>
                                                    <div class="form-group row">
                                                        <input id="linenumber_<?php echo $countmequick; ?>" class="linenumber" type='hidden' value="<?php echo $countmequick; ?>">
                                                        <input id="recurcharge_<?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_id']; ?>" class="charges_id" type='hidden' value="<?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_id']; ?>">
                                                        <label class="col-sm-1 control-label"><a class="remove_recurEdit_fee_el preloaded" id='<?php echo $countmequick; ?>'><i class="fa fa-minus-square-o" aria-hidden="true"></i></a>
                                                        </label>
                
                                                        <div class="col-sm-10">
                                                                <div id="charges_lineitem_update_reourrcing_invoice" class="row">
                
                
                
                                                                        <div class="col-sm-2">
                                                                            <select name="recurEdit_fee_type" class="form-control preloaded" id="recurEdit_fee_type" title="<?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_id']; ?> ">
                                                                                <option>Select Fee</option>
                                                                                <?php do {  ?>
                                                                                <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_inVoice_recur_chargestoinvoice['recur_charges_fee_id']))) {echo "selected=\"selected\"";} ?>>
                
                
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
                                                                        <div class="col-sm-3">
                                                                            <input id="recurEdit_fee_description" name="recurEdit_fee_description" type="text" class="form-control" placeholder="Description" value="<?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_fee_description']; ?>">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <input name="recurEdit_fee_qty" type="number" class="form-control" id="recurEdit_fee_qty" placeholder="Qty." value="<?php if(!$row_inVoice_recur_chargestoinvoice['recur_charges_fee_qty']){ echo '0'; }else{ echo $row_inVoice_recur_chargestoinvoice['recur_charges_fee_qty']; } ?>">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <input name="recurEdit_fee_price" type="number" class="form-control" id="recurEdit_fee_price" placeholder="Price" value="<?php if (is_float($row_inVoice_recur_chargestoinvoice['recur_charges_amount'])) { echo number_format($row_inVoice_recur_chargestoinvoice['recur_charges_fee_price'], 2); }else{ echo $row_inVoice_recur_chargestoinvoice['recur_charges_fee_price']; } ?>">
                                                                        </div>
                                                                       
                                                                        <div class="col-sm-2">
                                                                            <div class="input-group">
                                                                                        <?php
                if (is_float($row_inVoice_recur_chargestoinvoice['recur_charges_amount'])) {
                    $recur_charges_amount = number_format($row_inVoice_recur_chargestoinvoice['recur_charges_amount'], 2);
                    }else{ 
                        $recur_charges_amount = $row_inVoice_recur_chargestoinvoice['recur_charges_amount']; 
                        } 
?>    
                                                                                    <input id="recurEdit_fee_amount" name="recur_fee_amount" type="number" class="form-control" placeholder="Total" value="<?php echo $recur_charges_amount; ?>">
                                                                                    <div class="input-group-addon">
                                                                                
                                                                                                <?php if($row_inVoice_recur_chargestoinvoice['recur_charges_fee_taxed'] == 'Y'){ $recur_charges_fee_taxed = "checked='checked'"; }else{$recur_charges_fee_taxed=''; } ?>

                                                                                                <input id="recurEdit_fee_taxed" name="recur_fee_taxed" <?php echo $recur_charges_fee_taxed; ?>  type="checkbox"  value="<?php echo $row_inVoice_recur_chargestoinvoice['recur_charges_fee_taxed']; ?>">
                                                                                
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                
                                                                </div><!-- charges_lineitem_update_reourrcing_invoice -->
                                                        </div>
                                                    </div>
                                                    <?php 
                                                } while ($row_inVoice_recur_chargestoinvoice = mysqli_fetch_array($inVoice_recur_chargestoinvoice));
                                                else:

                                                endif; ?>
                                                </div>
                                                <div class="form-group has-warning">
                
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                
                                                    <div class="col-sm-10">
                                                        <div class="col-sm-2">
                                                            <button id="add_new_recur_edit_fee_btn" class="btn btn-outline btn-primary dim"><i class="fa fa-plus-o"></i> Add New Line</button>
                                                        </div>
                
                                                    </div>
                                                </div>
        
        
        
                                        </div>
    
    
    
    
                                    <div class="hr-line-dashed"></div>
    
    
    
                                        <div class="form-group">
                                            <label for="edit_recurring_sales_taxrate" class="col-sm-2 control-label">Sales Taxrate</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Sales Taxrate" id="edit_recurring_sales_taxrate" class="form-control" value="<?php echo $row_recurringInvoice['sales_taxrate']; ?>">
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="edit_recurring_tax_total" class="col-sm-2 control-label">Tax total <small>Useless no need to use...</small></label>
                                            <div class="col-sm-10">
                                            <input type="text" id="edit_recurring_tax_total" name="edit_recurring_tax_total" class="form-control" placeholder="<?php if(!$row_recurringInvoice['tax_total']){ echo '0.00'; }else{ echo number_format($row_recurringInvoice['tax_total'], 2); } ?>" value="" readonly="readonly" disabled="disabled">
                                            </div>
                                        </div>
    
    
                                        <div class="form-group">
                                            <label for="edit_recurring_discount_value" class="col-sm-2 control-label">Discount Value</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Discount Value" id="edit_recurring_discount_value" class="form-control" value="<?php echo $row_recurringInvoice['discount_value']; ?>">
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="edit_recurring_discount_dollarorpercn" class="col-sm-2 control-label">Discount Dollar or %</label>
                                            <div class="col-sm-10">
                                            <select class="form-control m-b" id="edit_recurring_discount_dollarorpercn" name="discount_dollarorpercn">
                                            <?php $discount_dollarorpercn = $row_recurringInvoice['discount_dollarorpercn']; ?>
                                            <option value="dollars" <?php if (!(strcmp("dollars", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>$ Dollars</option>
                                            <option value="percentage" <?php if (!(strcmp("percentage", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>% Percentage</option>
                                            </select>
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="edit_recurring_invoice_shippinghanding" class="col-sm-2 control-label">Invoice Shipping Handing</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Invoice Shipping &amp; Handing" id="edit_recurring_invoice_shippinghanding" class="form-control" value="<?php if($row_recurringInvoice['invoice_shippinghanding']){ echo $row_recurringInvoice['invoice_shippinghanding']; }else{ echo '0.00'; } ?>">
                                            </div>
                                        </div>
    
    
                                        <div class="form-group">
                                            <label for="edit_recurring_invoice_arrival_fee" class="col-sm-2 control-label">Arrival Fee</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Arrival Fee" id="edit_recurring_invoice_arrival_fee" class="form-control" value="<?php if(!$row_recurringInvoice['invoice_arrival_fee']){ echo '0.00'; }else{ echo  number_format($row_recurringInvoice['invoice_arrival_fee'], 2); } ?>">
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="edit_recurring_invoice_subtotal" class="col-sm-2 control-label">Invoice Subtotal</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Invoice Subtotal" id="edit_recurring_invoice_subtotal" class="form-control" value="<?php echo number_format($row_recurringInvoice['invoice_subtotal'], 2); ?>" readonly="readonly" disabled="disabled">
                                            </div>
                                        </div>
    
    
                                       
    
    
                                        <div class="form-group">
                                            <label for="edit_recurring_invoice_comments" class="col-sm-2 control-label">Invoice Comments</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Invoice Comments" id="edit_recurring_invoice_comments" class="form-control" value="<?php echo $row_recurringInvoice['invoice_comments']; ?>">
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="edit_recurring_terms_conditions" class="col-sm-2 control-label">Terms Conditions</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Terms Conditions" id="edit_recurring_terms_conditions" class="form-control" value="<?php echo $row_recurringInvoice['terms_conditions']; ?>">
                                            </div>
    
                                        </div>
    
    
                                        <div class="form-group">
                                            <label for="edit_recurring_invoice_taxtotal" class="col-sm-2 control-label">Invoice Taxtotal</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Invoice Taxtotal" id="edit_recurring_invoice_taxtotal" class="form-control" value="<?php if($row_recurringInvoice['invoice_taxtotal']){ echo number_format($row_recurringInvoice['invoice_taxtotal'], 2); }else{ echo '0.00'; } ?>" readonly="readonly" disabled="disabled">
                                            </div>
                                        </div>
    
    
                                        <div class="form-group">
                                            <label for="edit_recurring_invoice_total" class="col-sm-2 control-label">Invoice Total <?php echo $row_recurringInvoice['invoice_total']; ?></label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Invoice Total" id="edit_recurring_invoice_total" class="form-control" value="<?php if(!$row_recurringInvoice['invoice_total']){ echo '0.00'; }else{ echo number_format($row_recurringInvoice['invoice_total'], 2);  } ?>" readonly="readonly" disabled="disabled">
                                            </div>
                                        </div>
    
    
                                        <div class="form-group">
                                            <label for="edit_recurring_applied_payment" class="col-sm-2 control-label">Write Off Amount</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Applied Payment" id="edit_recurring_applied_payment" class="form-control" value="<?php if(!$row_recurringInvoice['applied_payment']){ echo '0.00'; }else{ echo number_format($row_recurringInvoice['applied_payment'], 2); } ?>">
                                            </div>
                                        </div>
    
    
                                        <div class="form-group">
                                            <label for="edit_recurring_invoice_amount_due" class="col-sm-2 control-label">Invoice Amount Due</label>
                                            <div class="col-sm-10">
                                            <input type="text" id="edit_recurring_invoice_amount_due" class="form-control" placeholder="<?php if(!$row_recurringInvoice['invoice_amount_due']){ echo '0.00'; }else{ echo number_format($row_recurringInvoice['invoice_amount_due'], 2); } ?>" value="" readonly="readonly" disabled="disabled">
                                            </div>
                                        </div>
    
    
    
    
    
                                        <div class="checkbox m-l m-r-xs form-group">
                                            <label for="edit_recurring_invoice_autocharge" class="col-sm-2 control-label"> <input id="edit_recurring_invoice_status" <?php if($row_recurringInvoice['invoice_status'] == 'Active'){ echo "checked='checked'"; } ?> type="checkbox" value="<?php echo $row_recurringInvoice['invoice_status']; ?>"><i></i> Invoice Autocharge </label>
                                            <div class="col-sm-10">
    
                                                <button id="update_this_reorecurring_invoice" class="ladda-button btn btn-primary btn-block btn-lg"   data-style="slide-down">
                                                    <span class="ladda-label">Save Changes - Reoccuring Invoice</span>
                                                    <span class="ladda-spinner"></span>
                                                </button>
                                            </div>
                                        </div>
    
    
    
    
    
                                </div>
    
    
    
                                  </div>
					<div class="hr-line-dashed"></div>
    </div>
</div>

<script>

    // To Activate These I Check For Tax Inputs
   


   
 

    //To have calendar access on ajax load
            $('#edit_recurring_data_invoice_creationdate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#edit_recurring_invoice_duedate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });


            $('#edit_recurring_invoice_stopdate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });


            $('h2 a#dealer_create_invoice_name').html('<?php echo $recurring_invoice_dealerid.' - '.$dealer_company_name; ?>');
            $('input#recurring_invoice_number').val('<?php echo $nextreccur_invoice_number; ?>');
            console.log('Running Tax Total And Sum Total Before Changing');
            run_editrecur_invoice_taxtotal();


</script>

<?php
$new_recurring_invoice_id = mysqli_insert_id($idsconnection_mysqli);

    $dudes_dlr_body = "
    $myname $dudesid Viewed Reccuring Invoice  #$goview_recurinvcid 
    ";
    
    $dudes_dlr_body =  mysqli_real_escape_string($tracking_mysqli , trim($dudes_dlr_body));
    $dudessql_temp_do = "
    INSERT INTO  `idsids_tracking_idsvehicles`.`dudes_activity` SET
    `dudes_dlr_did` = '$goview_thisdid',
    `dudes_dlr_dude_id` = '$dudesid',
    `dudes_dlr_dude_name` = '$myname',
    `dudes_recurring_invoice_id` = '$goview_recurinvcid',
    `dudes_dlr_body` = '$dudes_dlr_body'
    
    ";
    $run_dudessql_temp_do = mysqli_query($tracking_mysqli , $dudessql_temp_do);

    include("inc.end.phpmsyql.php");
    ?>

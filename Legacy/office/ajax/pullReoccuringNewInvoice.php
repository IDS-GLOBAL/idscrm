<?php require_once('../db_admin.php'); ?>
<?php


// Can't use because javascript won't loop through the new ajax loaded items that will need to be created.
// 12-3-2019 11:35 a.m.
// Webgoonie - The Neo Of Web Automotive




$system_dealerid = '-1';
$colname_queryInvoice = "-1";
if (isset($_POST['thisdid'], $_POST['reocurring_invoice_id'])) {
  $colname_queryInvoice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reocurring_invoice_id']));
  $system_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_recurringInvoice =  "
SELECT * 
FROM 
  `idsids_idsdms`.`ids_toinvoices_recurring`
INNER JOIN  `idsids_idsdms`.`dealers` 
ON `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`  
WHERE 
`ids_toinvoices_recurring`.`invoice_dealerid` = '$system_dealerid'
  AND 
  `ids_toinvoices_recurring`.`invoice_id` = '$colname_queryInvoice'";
$query_recurringInvoice = mysqli_query($idsconnection_mysqli, $query_query_recurringInvoice);
$row_recurringInvoice = mysqli_fetch_array($query_recurringInvoice);
$totalRows_recurringInvoice = mysqli_num_rows($query_recurringInvoice);

$recurring_invoice_id = $row_recurringInvoice['invoice_id'];
$recurring_invoice_dealerid = $row_recurringInvoice['invoice_dealerid'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastrecurringInvcNum = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring` WHERE `ids_toinvoices_recurring`.`invoice_dealerid` = '$system_dealerid' ORDER BY `invoice_number` DESC";
$lastrecurringInvcNum = mysqli_query($idsconnection_mysqli, $query_lastrecurringInvcNum);
$row_lastrecurringInvcNum = mysqli_fetch_array($lastrecurringInvcNum);
$totalRows_lastrecurringInvcNum = mysqli_num_rows($lastrecurringInvcNum);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM `idsids_idsdms`.`ids_fees` ORDER BY `ids_fees`.`fee_type` ASC ";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);
?>
<div id="loaded_create_new_invoice">            
                                                                    <input name="recurring_invoice_dealerid" 
                                                                            type="hidden" 
                                                                            id="recurring_invoice_dealerid"  
                                                                            value="<?php echo $system_dealerid; ?>"
                                                                            >
                                                                    
                                                        <div class="row">
                                                                
                                                            <div class="form-horizontal">
                                                                    <div class="form-group">
                                                                        <label for="recurring_invoice_number" class="col-sm-2 control-label">Recurring Invoice Number</label>
                                                                        <div class="col-sm-10">
                                                                        <input name="recurring_invoice_number" 
                                                                                type="text" 
                                                                                disabled="disabled" 
                                                                                class="form-control" 
                                                                                id="recurring_invoice_number" 
                                                                                value="<?php echo $row_lastrecurringInvcNum['invoice_number']; ?>" 
                                                                                readonly="readonly" 
                                                                                placeholder="Enter Invoice Number"
                                                                                >
                                                                        </div>
                                                                    </div>



                                                                    <div class="form-group">
                                                                        <label for="edit_invoice_typeid" class="col-sm-2 control-label">Type ID</label>
                                                                        <div class="col-sm-10">
                                                                        
                                                                        <select id="invoice_typeid" name="invoice_typeid" class="form-control m-b"> 
                                                                            <option value="0" <?php if (!(strcmp("0", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Select</option>
                                                                            <option value="1" <?php if (!(strcmp("1", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Standard</option>
                                                                            <option value="2" <?php if (!(strcmp("2", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Shipping</option>
                                                                            <option value="3" <?php if (!(strcmp("3", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Automatic</option>
                                                                            <option value="4" <?php if (!(strcmp("4", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>New/Test</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group" id="recurring_data_invoice_creationdate">
                                                                        <label for="recurring_invoice_created_at" class="font-noraml col-sm-2 control-label">Recurring Invoice Creation Date</label>
                                                                        <div class="input-group m-b date">
                                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                            <input id="recurring_invoice_date" 
                                                                            type="text" 
                                                                            class="form-control" 
                                                                            placeholder="<?php echo date('Y-m-d'); ?>" 
                                                                            value="<?php if($row_recurringInvoice['invoice_date']){ echo $row_recurringInvoice['invoice_date']; }else{ echo date('Y-m-d');  } ?>">
                                                                        </div>
                                                                
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="invc_cret_evry" class="font-noraml col-sm-2 control-label">After That Create A New Invoice Every</label>




                                                                            <div class="col-sm-10">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <select name="invc_cret_evry" id="invc_cret_evry" class="form-control">
                                                                                            <?php for ($x = 1; $x <= 30; $x++) { ?>
                                                                                                <option value="<?php echo $x; ?>"<?php if (!(strcmp("$x", $row_recurringInvoice['invc_cret_evry']))) {echo "selected=\"selected\"";} ?>><?php echo $x; ?></option>
                                                                                            <?php } ?>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <select name="invc_cret_evrywhn" id="invc_cret_evrywhn" class="form-control">
                                                                                        <option value="months"<?php if (!(strcmp("months", $row_recurringInvoice['invc_cret_evrywhn']))) {echo "selected=\"selected\"";} ?>>month(s)</option>
                                                                                        <option value="days"<?php if (!(strcmp("days", $row_recurringInvoice['invc_cret_evrywhn']))) {echo "selected=\"selected\"";} ?>>day(s)</option>
                                                                                        <option value="years"<?php if (!(strcmp("years", $row_recurringInvoice['invc_cret_evrywhn']))) {echo "selected=\"selected\"";} ?>>year(s)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                    
                                                                        
                                                                        
                                                                    </div>

                                                                    <div id="recurring_data_invoice_duedate" class="form-group" >
                                                                        <label for="recurring_invoice_duedate" class="col-sm-2 control-label">Create The Next Invoice On</label>
                                                                        <div class="input-group m-b date">
                                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="recurring_invoice_duedate" type="text" class="form-control" value="<?php echo $row_recurringInvoice['invoice_duedate']; ?>">
                                                                        </div>
                                                                    </div>

                                                                    <div id="recurring_data_invoice_stopdate" class="form-group has-danger" >
                                                                        <label for="invoice_recurring_stopdate" class="col-sm-2 control-label">Don't Create Any Invoices After</label>
                                                                        <div class="input-group m-b date has-danger">
                                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="invoice_recurring_stopdate" type="text" class="form-control" value="<?php echo $row_recurringInvoice['invoice_recurring_stopdate']; ?>">
                                                                        </div>
                                                                    </div>
                                                                        

                                                                    <div class="form-group">
                                                                        <label for="recurring_daysto_payinvoice" class="col-sm-2 control-label">Dealer Days To Pay</label>
                                                                        <div class="col-sm-10">
                                                                        <input type="text" placeholder="Days To Pay Invoice" id="recurring_daysto_payinvoice" class="form-control" value="<?php echo $row_recurringInvoice['daysto_payinvoice']; ?>">
                                                                        </div>
                                                                    </div>

                                                            
                                                                    <div class="form-group">
                                                                        <label for="recurring_dealer_email_recipients" class="col-sm-2 control-label">Dealer Email Recipients</label>
                                                                        <div class="col-sm-10">
                                                                        <input type="text" placeholder="Email Recipients" id="recurring_dealer_email_recipients" class="form-control" value="<?php
                                                                                if(!$row_recurringInvoice['dealer_email_recipients']){echo $row_recurringInvoice['email'];}else{echo  $row_recurringInvoice['email'].', '.$row_recurringInvoice['accts_rcvbles_email'];}if($row_recurringInvoice['accts_payables_email']){echo ', '.$row_recurringInvoice['accts_payables_email'];}?> ">
                                                                                
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="recurring_invoice_sendtoclient" class="col-sm-2 control-label">Email Invoice  To Client?</label>

                                                                        <div class="col-sm-10">
                                                                        <select class="form-control m-b" id="recurring_invoice_sendtoclient" name="recurring_invoice_sendtoclient">
                                                                            <?php $recurring_invoice_sendtoclient = $row_recurringInvoice['invoice_sendtoclient']; ?>
                                                                            <option value="Y"<?php if (!(strcmp("Y", "$recurring_invoice_sendtoclient"))) {echo "selected=\"selected\"";}else if(!$row_recurringInvoice['invoice_sendtoclient']){echo "selected=\"selected\"";} ?>>YES</option>
                                                                            <option value="N" <?php if (!(strcmp("N", "$recurring_invoice_sendtoclient"))) {echo "selected=\"selected\"";} ?>>NO</option>
                                                                        </select>

                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="recurring_invoice_currency" class="col-sm-2 control-label">Currency Accepted:</label>

                                                                        <div class="col-sm-10">
                                                                        <select class="form-control m-b" id="recurring_invoice_currency" name="recurring_invoice_currency">
                                                                            <?php $recurringinvoice_currency = $row_recurringInvoice['invoice_currency']; ?>
                                                                            <option value="USD" selected="selected">USD</option>
                                                                        </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="hr-line-dashed"></div>
                                                                                    
                                                                                    
                                                                                    
                                                                        <div id="create_reocurring_invoice_fees_box">
                                                                            <h2></h2>
                                                                        
                                                                        
                                                                            <div class="form-group has-warning">
                                                                                <label class="col-sm-2 control-label">Instructions</label>
                                                                            
                                                                                <div  class="col-sm-10">Let's See How We Want To Add Unlimited Fees To this reocurring invoice using javascript and php ajax.</div>
                                                                            </div>
                                                                            <div class="inner-fees">
                                                                            <div class="form-group has-warning">
                                                                                    <label class="col-sm-2 control-label"><a class="remove_fee_el"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a>
                                                                                    </label>

                                                                                <div class="col-sm-10">
                                                                            <div id="charges_lineitem_create_reourrcing_invoice" class="row">
                                                                                        <div class="col-md-2">
                                                                                            <select name="fee_type" class="form-control" id="fee_type">
                                                                                                <option>Select Fee</option>
                                                                                                <?php do {  ?>
                                                                                                    <option value="<?php echo $row_fees['fee_id']?>">
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
                                                                                        <div class="col-md-2">
                                                                                                <input name="fee_description" type="text" class="form-control" id="fee_description" placeholder="Description" value="">
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <input name="fee_qty" type="number" class="form-control" id="fee_qty" placeholder="Qty." value="">
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <input name="fee_price" type="number" class="form-control" id="fee_price" placeholder="Price" value="">
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <input name="fee_amount" type="number" class="form-control" id="fee_amount" placeholder="Total" value="">
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                        <div class="checkbox i-checks">
                                                                                            <label> <input name="fee_taxed" type="checkbox" id="fee_taxed" value=""> <i></i> Taxable </label>
                                                                                        </div>
                                                                        </div>

                                                                        </div>
                                                                    </div>
                                                                   </div>
                                                                  </div>
                                                                 <div class="form-group has-warning">
                                                                    
                                                                    <label class="col-sm-2 control-label">&nbsp;</label>

                                                                    <div class="col-sm-10">
                                                                        <div class="col-md-2">
                                                                            <button id="add_new_fee_btn"><i class="fa fa-plus-o"></i> Add New Line</button>
                                                                        </div>

                                                                    </div>
                                                                  </div>                                            
                                                                                
                                                                                
                                                                                
                                                                 </div>
                                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                                  <div class="hr-line-dashed"></div>

        

                                                                        <div class="form-group">
                                                                            <label for="recurring_sales_taxrate" class="col-sm-2 control-label">Sales Taxrate</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Sales Taxrate" id="recurring_sales_taxrate" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="recurring_tax_total" class="col-sm-2 control-label">Tax Total</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Tax Total" id="recurring_tax_total" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="recurring_discount_value" class="col-sm-2 control-label">Discount Value</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Discount Value" id="recurring_discount_value" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="recurring_discount_dollarorpercn" class="col-sm-2 control-label">Discount Dollar or %</label>
                                                                            <div class="col-sm-10">
                                                                            <select class="form-control m-b" id="recurring_discount_dollarorpercn" name="discount_dollarorpercn">
                                                                            <?php $discount_dollarorpercn = $row_recurringInvoice['discount_dollarorpercn']; ?>
                                                                            <option value="dollars" <?php if (!(strcmp("dollars", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>$ Dollars</option>
                                                                            <option value="percentage" <?php if (!(strcmp("percentage", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>% Percentage</option>
                                                                            </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="recurring_invoice_shippinghanding" class="col-sm-2 control-label">Invoice Shipping Handing</label>
                                                                            <div class="col-sm-10">                                            
                                                                            <input type="text" placeholder="Invoice Shipping &amp; Handing" id="recurring_invoice_shippinghanding" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label for="recurring_invoice_arrival_fee" class="col-sm-2 control-label">Arrival Fee</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Arrival Fee" id="recurring_invoice_arrival_fee" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="recurring_invoice_subtotal" class="col-sm-2 control-label">Invoice Subtotal</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Invoice Subtotal" id="recurring_invoice_subtotal" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label for="recurring_tax_shipping" class="col-sm-2 control-label">Tax Shipping</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Tax Shipping" id="recurring_tax_shipping" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="recurring_tax_arrival_fee" class="col-sm-2 control-label">Tax Arrival Fee</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Tax Arrival Fee" id="recurring_tax_arrival_fee" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label for="recurring_invoice_comments" class="col-sm-2 control-label">Invoice Comments</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Invoice Comments" id="recurring_invoice_comments" class="form-control" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="recurring_terms_conditions" class="col-sm-2 control-label">Terms Conditions</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Terms Conditions" id="recurring_terms_conditions" class="form-control" value="">
                                                                            </div>

                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label for="recurring_invoice_taxtotal" class="col-sm-2 control-label">Invoice Taxtotal</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Invoice Taxtotal" id="recurring_invoice_taxtotal" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label for="recurring_invoice_total" class="col-sm-2 control-label">Invoice Total</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Invoice Total" id="recurring_invoice_total" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label for="recurring_applied_payment" class="col-sm-2 control-label">Applied Payment</label>
                                                                            <div class="col-sm-10">
                                                                            <input type="text" placeholder="Applied Payment" id="recurring_applied_payment" class="form-control" value="0.00">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label for="recurring_invoice_amount_due" class="col-sm-2 control-label">Invoice Amount Due</label>
                                                                            <div class="col-sm-10">
                                                                                <div class="input-group m-b">
                                                                                    <input type="text" placeholder="Invoice Amount Due" id="recurring_invoice_amount_due" class="form-control" value="0.00">
                                                                                    <span class="input-group-append">
                                                                                        <button id="calculateFees" class="btn btn-primary">Calculate</button>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                        
                                                                        <div class="checkbox m-l m-r-xs form-group">
                                                                            <label for="recurring_invoice_autocharge" class="i-checks col-sm-2 control-label"> <input id="recurring_invoice_status" type="checkbox" value="<?php echo $row_recurringInvoice['invoice_status']; ?>"><i></i> Invoice Autocharge </label>
                                                                            <div class="col-sm-10">
                                                                            
                                                                            <button id="recurring_createsave_invoice" class="btn btn-warning btn-block btn-lg" type="button">Create Invoice</button>
                                                                            </div>
                                                                        </div>
                                            
                                                
                                            
                                                
                                                
                                                                 </div>
                                                            
                                                            
                                                                                                
                                                                 </div>
                                                                
                                                                 <div class="hr-line-dashed"></div>
                                                        
                                                                </div>                
                                                      
                                                      
                                                        </div>

</div>                          

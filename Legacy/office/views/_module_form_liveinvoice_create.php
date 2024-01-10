<div class="form-horizontal">
    <div class="row">
                    <h3>Static Invoice</h3>
                    <h2 id="liveinvcCreateInvc_name_display">Load A New Dealer To Invoice</h2>


      <input name="invoice_dealerid" type="hidden" id="invoice_dealerid"  value="">


    </div>
    <div class="row">

            <div class="row">
                        <div class="form-group">
                            <label for="invoice_number" class="col-sm-2 control-label">Invoice Number</label>
                            <div class="col-sm-10">
                            <input type="text" placeholder="Email Receipents To Get Copy Of Email" id="invoice_number" class="form-control" value="">
                            </div>
                        </div>


                        <div class="form-group" id="data_startdate">
                            <label for="invoice_date" class="font-noraml col-sm-2 control-label">Start Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="invoice_date" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>


                        <div class="form-group" id="data_duedate">
                            <label for="invoice_duedate" class="font-noraml col-sm-2 control-label">Due Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="invoice_duedate" type="text" class="form-control" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="dealer_email_recipients" class="col-sm-2 control-label">Dealer Email Recipients</label>
                            <div class="col-sm-10">
                            <input type="text" placeholder="Enter Invoice Number" id="dealer_email_recipients" class="form-control" value="">
                            </div>
                        </div>




            </div>
            <div class="row">
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="invoice_sendtoclient" class="col-sm-2 control-label">Email Client?</label>

                                                        <div class="col-sm-10">
                                                        <select class="form-control m-b" id="invoice_sendtoclient" name="invoice_sendtoclient">
                                                            <option value="Y" selected="selected">YES</option>
                                                            <option value="N">NO</option>
                                                        </select>

                                                        </div>
                                                    </div>




                </div>
                <div class="col-sm-6">


                                                    <div class="form-group">
                                                        <label for="invoice_currency" class="col-sm-2 control-label">Currency Accepted</label>

                                                        <div class="col-sm-10">
                                                        <select class="form-control m-b" id="invoice_currency" name="invoice_currency">
                                                            <option value="USD" selected="selected">USD</option>
                                                        </select>

                                                        </div>
                                                    </div>



                </div>
            </div>


            <div class="row">


                <div class="hr-line-dashed"></div>

              <div id="create_sysdealer_invoice_fees_box">



              <h2></h2>


                <div class="form-group has-warning">
                    <label class="col-sm-2 control-label">Instructions</label>

                    <div  class="col-sm-10">Let's See How We Want To Add Unlimited Fees To this reocurring invoice using javascript and php ajax.</div>
                </div>
                <div id="liveInvoiceInnerFees" class="inner-fees">
                    <div class="form-group has-warning">
                            <label class="col-sm-1 control-label"><a class="remove_fee_el"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a>
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
                                        <div class="col-md-3">
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
                                <button id="add_new_invoice_lineBrandNewfee_btn" class="btn btn-outline btn-warning dim" type="button"><i class="fa fa-plus-o"></i> Add New Line</button>
                            </div>

                        </div>
                    </div>
              </div><!-- End create_sysdealer_invoice_fees_box -->

              <div class="hr-line-dashed"></div>



            </div>

            <div class="row">
                <div class="col-sm-6">

                                                        <div class="form-group">
                                                            <label for="sales_taxrate" class="col-sm-2 control-label">Sales Taxrate</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" placeholder="sales taxrate" id="sales_taxrate" class="form-control" value="">
                                                            </div>
                                                        </div>

                </div>
                <div class="col-sm-6">

                                                        <div class="form-group">
                                                            <label for="tax_total" class="col-sm-2 control-label">Tax Total</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" placeholder="tax total" id="tax_total" class="form-control" value="">
                                                            </div>
                                                        </div>

                </div>
            </div>
            <div class="row">

                <div class="col-sm-6">

                                                        <div class="form-group">
                                                            <label for="discount_value" class="col-sm-2 control-label">Discount Value</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" placeholder="Discount Value" id="discount_value" class="form-control" value="">
                                                            </div>
                                                        </div>

                </div>
                <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="discount_dollarorpercn" class="col-sm-2 control-label">Discount Dollar or %</label>
                                                            <div class="col-sm-10">
                                                            <select class="form-control m-b" id="discount_dollarorpercn" name="discount_dollarorpercn">
                                                                <option value="dollars" selected="selected">$ Dollars</option>
                                                                <option value="percentage">% Percentage</option>
                                                            </select>
                                                            </div>
                                                        </div>

                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="invoice_shippinghanding" class="col-sm-2 control-label">Invoice Shipping Handing</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Shipping &amp; Handing" id="invoice_shippinghanding" class="form-control" value="">
                                                        </div>
                                                    </div>

                </div>
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="invoice_arrival_fee" class="col-sm-2 control-label">Arrival Fee</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Arrival Fee" id="invoice_arrival_fee" class="form-control" value="">
                                                        </div>
                                                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="invoice_subtotal" class="col-sm-2 control-label">Invoice Subtotal</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Subtotal" id="invoice_subtotal" class="form-control" value="">
                                                        </div>
                                                    </div>


                </div>
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="tax_shipping" class="col-sm-2 control-label">Tax Shipping</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Tax Shipping" id="tax_shipping" class="form-control" value="">
                                                        </div>
                                                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="tax_arrival_fee" class="col-sm-2 control-label">Tax Arrival Fee</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Tax Arrival Fee" id="tax_arrival_fee" class="form-control" value="">
                                                        </div>
                                                    </div>

                </div>
                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="invoice_comments" class="col-sm-2 control-label">Invoice Comments</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Comments" id="invoice_comments" class="form-control" value="">
                                                        </div>
                                                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">


                                                    <div class="form-group">
                                                        <label for="invoice_taxtotal" class="col-sm-2 control-label">Invoice Taxtotal</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Taxtotal" id="invoice_taxtotal" class="form-control" value="">
                                                        </div>
                                                    </div>


                </div>
                <div class="col-sm-6">


                                                    <div class="form-group">
                                                        <label for="invoice_total" class="col-sm-2 control-label">Invoice Total</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Total" id="invoice_total" class="form-control" value="">
                                                        </div>
                                                    </div>



                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="applied_payment" class="col-sm-2 control-label">Applied Payment</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Applied Payment" id="applied_payment" class="form-control" value="">
                                                        </div>
                                                    </div>


                </div>
                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="invoice_amount_due" class="col-sm-2 control-label">Invoice Amount Due</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Invoice Amount Due" id="invoice_amount_due" class="form-control" value="">
                                                        </div>
                                                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                                                    <div class="checkbox m-l m-r-xs">
                                                        <label class="i-checks col-sm-2 control-label"> <input id="" type="checkbox"><i></i> Copy Invoice To Me </label>
                                                        <div class="col-sm-10">

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="terms_conditions" class="col-sm-2 control-label">Terms Conditions</label>
                                                        <div class="col-sm-10">
                                                        <input type="text" placeholder="Terms Conditions" id="terms_conditions" class="form-control" value="">
                                                        </div>

                                                    </div>


                </div>
            </div>
            <div class="row">
                    <button id="create_new_live_invoice_loaded" class="btn btn-warning btn-block btn-lg" type="button">Create New Invoice</button>
            </div>

    </div>

</div>

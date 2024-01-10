    <div class="form-horizontal m-t-md">
                        <div class="row white-bg">

                            <div class="col-lg-12">
                                <div class="hr-line-dashed"></div>
                                <div id="pull_vehicle_handle" class="form-group">
                                    <div class="col-sm-12 input-group">

                                    <span class="input-group-addon">
                                            <a id="findDealerToInvoiceViewBtn" href="#">Find Dealer To Invoice
                                            <i class="fa fa-search-plus"></i>
                                            </a>
                                    </span>
                                        <input id="enter_dealerid" type="text" maxlength="6" class="form-control"
                                                value="<?php echo $system_dealerid; ?>"
                                                autocomplete="off"
                                                placeholder="Dealer ID">
                                    <span class="input-group-btn">
                                        <button id="pull_dealercompanyinfo"
                                                type="button"
                                                class="btn btn-primary">
                                                Use Dealer!
                                        </button>
                                    </span>
                                </div>

                            </div>
                        </div>



                        <div class="form-horizontal">

                                <div class="row white-bg">
                                        <div class="col-sm-12 col-md-12 col-lg-12">

                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="panel-options">
                                                        <ul id="reoccuringINVoictabs" class="nav nav-tabs">
                                                            <li id="slct_reocuuringTblinvoice" class="active">
                                                            <a href="#tab-za" data-toggle="tab">Reoccuring Invoices</a></li>
                                                            <li id="create_new_reoccuring_invoice_tablink"><a href="#tab-zb" data-toggle="tab">Create Reocurring</a></li>
                                                            <li id="loadedinvoice"><a href="#tab-zc" data-toggle="tab">View Reocurring Invoice</a></li>
                                                            <li><a href="#tab-zd" data-toggle="tab">Edit Reocurring</a></li>
                                                            <li><a href="#tab-ze" data-toggle="tab">Create Payment</a></li>
                                                            <li><a href="#tab-zf" data-toggle="tab">Billing Activity</a></li>

                                                            <li><a href="#tab-zg" data-toggle="tab">Charges</a></li>
                                                            <li><a href="#tab-zh" data-toggle="tab">Charges From Invoice</a></li>
                                                            <li><a href="#tab-zi" data-toggle="tab">Closed Reocurring</a></li>


                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="panel-body">

                                                    <div id="reoccuringINVoicPane" class="tab-content">
                                                        <!-- " in active " << This fades in tab on load-->
                                                        <div id="tab-za" class="tab-pane fade in active">



                                                            <h3>Current Reoccuring Invoices</h3>

                                                                <div>
                                                                    <?php include("_module_loop_recourring_invoices.php"); ?>
                                                                </div>
                                                                <div class="hr-line-dashed"></div>

                                                        </div>
                                                        <div id="tab-zb" class="tab-pane fade">

                                                            <div id="form_module_rocurring_create_box_view">
                                                                <?php include("_module_form_rocurring_create.php"); ?>
                                                            </div>

                                                        </div>
                                                        <div id="tab-zc" class="tab-pane fade">


                                                                <input id="goview_thisdid" name="goview_thisdid"  value="<?php echo $row_recurringInvoice['invoice_dealerid']; ?>" type="hidden">
                                                                <input id="goview_recurinvcid" name="goview_recurinvcid" value="<?php echo $row_recurringInvoice['invoice_id']; ?>" type="hidden">
                                                                <input id="goview_recur_dealer_token" name="goview_recur_dealer_token" value="<?php echo $row_recurringInvoice['token']; ?>" type="hidden">
                                                                <input id="goview_recur_invoice_token" name="goview_recur_invoice_token" value="<?php echo $row_recurringInvoice['invoice_tokenid']; ?>" type="hidden">

                                                                <h2 id="recurinvcViewdid_name_display">Loaded Display Name</h2>

                                                                <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="ibox">
                                                                                    <div class="ibox-content border-sbottom">
                                                                                        <div class="col-lg-4">
                                                                                                <div class="title-action">

                                                                                                <a id="go_edit_reocurring_invoice" rel="" href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                                                                                                <a id="go_emailview_reocurring_invoice" rel="" href="#" class="btn btn-white"><i class="fa fa-mail"></i> Email View </a>
                                                                                                <a id="go_view_pdf_invoice" href="#" class="btn btn-white"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </a>
                                                                                                <a id="go_print_invoice" href="#" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>


                                                                                                </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                <div id="dlrReocurring_invcvw_bodyvw">

                                                                    <h2>Loaded Invoice</h2>
                                                                    <div class="hr-line-dashed"></div>


                                                                </div>
                                                                <div id="loaded_iframeviewer" style="display: none;" class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">
                                                                                <div class="text-center pdf-toolbar">

                                                                                    <div class="btn-group">
                                                                                        <button id="recur_prev" class="btn btn-white"><i class="fa fa-long-arrow-left"></i> <span class="d-none d-sm-inline">Previous</span></button>
                                                                                        <button id="recur_next" class="btn btn-white"><i class="fa fa-long-arrow-right"></i> <span class="d-none d-sm-inline">Next</span></button>
                                                                                        <button id="recur_zoomin" class="btn btn-white"><i class="fa fa-search-minus"></i> <span class="d-none d-sm-inline">Zoom In</span></button>
                                                                                        <button id="recur_zoomout" class="btn btn-white"><i class="fa fa-search-plus"></i> <span class="d-none d-sm-inline">Zoom Out</span> </button>
                                                                                        <button id="recur_zoomfit" class="btn btn-white"> 100%</button>
                                                                                        <span class="btn btn-white hidden-xs">Page: </span>

                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control" id="recur_page_num">

                                                                                            <div class="input-group-append">
                                                                                                <button type="button" class="btn btn-white" id="recur_page_count">/ 22</button>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                        </div>
                                                                        <div class="text-center m-t-md">
                                                                            <canvas id="recur_the-canvas" class="pdfcanvas border-left-right border-top-bottom b-r-md"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- End loaded_iframevier -->





                                                        </div>
                                                        <div id="tab-zd" class="tab-pane fade">

                                                                    <h2 id="recurinvcdid_name_display">Loaded To Edit Reocurring</h2>

                                                                    <div class="hr-line-dashed"></div>

                                                                    <div id="dlrReocurring_invcEditvw_bodyvw"></div>


                                                        </div>
                                                        <div id="tab-ze" class="tab-pane fade">
                                                                    <h2>Create A Payment</h2>


                                                            <div class="row">
                                                                <div class="col-sm-12">

                                                                <div class="hr-line-dashed"></div>

                                                                <div id="dlrReocurring_invcPymtModl_bodyvw"></div>

                                                                <div class="hr-line-dashed"></div>



                                                                <div class="form-group">
                                                                    <div class="col-sm-4 col-sm-offset-2">
                                                                        <button id="recurring_reset_reoccuring_invoices" class="btn btn-white" type="submit">Reset</button>
                                                                        <button id="recurring_submit_reoccuring_invoices" class="btn btn-warning" type="submit">Save Reocurring Billing Settings</button>
                                                                    </div>
                                                                </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div id="tab-zf" class="tab-pane fade">
                                                                                        <h2>Credit Payment & Agreement Snapshot Information</h2>

                                                                                        <p>This tab will be good to be able to upload a blog of the signed agreement for email purposes and legalities</p>

                                                                                        <div class="hr-line-dashed"></div>
                                                                                        <div class="form-group">
                                                                                            <div class="col-sm-4 col-sm-offset-2">
                                                                                                <button class="btn btn-white" type="submit">Cancel</button>
                                                                                                <button class="btn btn-primary" type="submit">Save changes</button>
                                                                                            </div>
                                                                                        </div>




                                                                                        <div id="tab-zg" class="tab-pane fade">

                                                                                            tab zg

                                                                                            </div>
                                                                                            <div id="tab-zh" class="tab-pane fade">
                                                                                            tab zh
                                                                                            </div>
                                                                                            <div id="tab-zi"  class="tab-pane fade">

                                                                                            tab zi

                                                                                            </div>
                                                                                        </div><!-- End tab-5 -->



                                                    </div><!-- End tab-contnet -->



                                                </div><!-- panel-body -->
                                            </div>

                                        </div>
                                </div>



                            </div>
    </div>

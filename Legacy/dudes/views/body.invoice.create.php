<div class="form-horizontal">





        <div class="row white-bg">
            <div class="col-lg-12">

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-aa" data-toggle="tab">Active Invoices</a></li>
                                <li><a href="#tab-ab" data-toggle="tab">Create Invoice</a></li>
                                <li><a href="#tab-af" data-toggle="tab">Edit Invoice</a></li>
                                <li><a href="#tab-ag" data-toggle="tab">View Live Invoice</a></li>
                                <li><a href="#tab-ac" data-toggle="tab">Payments</a></li>
                                <li><a href="#tab-ad" data-toggle="tab">Create Payment</a></li>
                                <li><a href="#tab-ae" data-toggle="tab">Payment Info</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="tab-content">
                                <div class="tab-pane active" id="tab-aa">

                                    <?php include('_module_loop_livecurrent_invoices.php'); ?>


                                </div>
                                <div class="tab-pane" id="tab-ab">

                                    <?php include('_module_form_liveinvoice_create.php'); ?>

                                </div>
                                <div class="tab-pane" id="tab-ag">


                                    <input id="goLiveview_thisdid" name="goLiveview_thisdid"  value="<?php echo $row_inVoices['invoice_dealerid']; ?>" type="hidden">
                                    <input id="goLiveview_invcid" name="goLiveview_invcid" value="<?php echo $row_inVoices['invoice_id']; ?>" type="hidden">
                                    <input id="goview_thisLiveinvcdidtoken" name="goview_thisLiveinvcdidtoken" value="<?php echo $row_inVoices['invoice_tokenid']; ?>" type="hidden">
                                    <input id="goview_thisLivedidtoken" name="goview_thisLivedidtoken" type="hidden" value="<?php echo $row_inVoices['token']; ?>">

                                    <h2 id="liveinvcViewdid_name_display">Loaded Display Name</h2>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="ibox">
                                                <div class="ibox-content border-sbottom">
                                                    <div class="col-sm-12">
                                                        <div class="title-action">


                                                            <button id="go_edit_live_invoice" class="btn btn-outline btn-warning dim" type="button"><i class="fa fa-pencil"></i> Edit  </button>

                                                            <button id="go_emailview_live_invoice" class="btn btn-outline btn-warning dim" type="button"><i class="fa fa-mail"></i> Email View  </button>
                                                            <button id="go_pdfview_live_invoice" class="btn btn-outline btn-warning dim" type="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>
                                                            <a id="go_print_live_invoice" href="#" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Print Invoice </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="Rowdlrliveinvcvw_bodyvw_row" class="row">
                                        <div id="dlrliveinvcvw_bodyvw">
                                            <h2>Viewing a Live Invoice!</h2>
                                        </div>
                                    </div>

                                    <div  id="loaded_LiveInvoiceiframeviewer" style="display: none;" class="row">
                                        <div class="col-sm-12">
                                            <div class="hr-line-dashed"></div>
                                                    <div>
                                                        <div class="row">
                                                            <div class="text-center pdf-toolbar">

                                                                <div class="btn-group">
                                                                    <button id="prev" class="btn btn-white"><i class="fa fa-long-arrow-left"></i> <span class="d-none d-sm-inline">Previous</span></button>
                                                                    <button id="next" class="btn btn-white"><i class="fa fa-long-arrow-right"></i> <span class="d-none d-sm-inline">Next</span></button>
                                                                    <button id="zoomin" class="btn btn-white"><i class="fa fa-search-minus"></i> <span class="d-none d-sm-inline">Zoom In</span></button>
                                                                    <button id="zoomout" class="btn btn-white"><i class="fa fa-search-plus"></i> <span class="d-none d-sm-inline">Zoom Out</span> </button>
                                                                    <button id="zoomfit" class="btn btn-white"> 100%</button>
                                                                    <span class="btn btn-white hidden-xs">Page: </span>

                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="page_num">

                                                                        <div class="input-group-append">
                                                                            <button type="button" class="btn btn-white" id="page_count">/ 1</button>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <h2>PDF Frame Viewer</h2>
                                                                <canvas id="liveInvoice_canvas" class="pdfcanvas border-left-right border-top-bottom b-r-md"></canvas>
                                                        </div>
                                                    </div>
                                            <div class="hr-line-dashed"></div>
                                        </div>
                                    </div>


                                </div>
                                <div class="tab-pane" id="tab-af">

                                        <h2>Editing Live Invoice!</h2>
                                        <h2 id="liveinvcdid_name_display">No Live Invoice Loaded Yet!...</h2>

                                        <div class="hr-line-dashed"></div>

                                        <div id="dlrLive_invcEditvw_bodyvw"></div>

                                </div>
                                <div class="tab-pane" id="tab-ac"><!-- Dedicated To Payments On Live Invoices -->

                                    <h2>Manage Payment On This Live Invoice!</h2>
                                    <h2 id="liveinvc_paymentdid_name_display">No Live Dealer Payment Name Loaded!!!...</h2>


                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="module_loop_livecurrent_payments"><?php include('_module_loop_livecurrent_payments.php'); ?></div>
                                        </div>
                                    </div>


                                    <div class="hr-line-dashed"></div>


                                </div>
                                <div class="tab-pane" id="tab-ad">

                                    <h2>Create A Payment On This Live Invoice!</h2>
                                    <h2 id="liveinvc_createpaymentdid_name_display">No Payment Information Loaded !!!....</h2>


                                    <p>You might Wanna turn this into a acitivy page and manage the create payment on manage payment part.</p>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="load_dealers_payment_module"></div>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div id="load_payment_module_toolbar" class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button id="payment_module_cancel" class="btn btn-white" type="submit">Cancel</button>
                                            <button id="payment_module_save" class="btn btn-primary" type="submit">Save changes</button>
                                        </div>
                                    </div>




                                </div>
                                <div class="tab-pane" id="tab-ae">
                                    <h2>Payment Acitivy Information</h2>



                                    <p>I said earlier that I might Wanna turn  management payment into payment activity I should at least build it out in this tab.  Also this text is to just give some real estate to the page and make it unique.</p>

                                    <div class="row">
                                        <div class="col-sm-12">

                                                <div id="load_payment_activity"></div>

                                        </div>
                                    </div>


                                    <div class="hr-line-dashed"></div>
                                        <div id="load_payment_activity_toolbar" class="form-group">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <button id="payment_activity_cancel" class="btn btn-white" type="submit">Cancel</button>
                                                <button id="payment_activity_save" class="btn btn-primary" type="submit">Save changes</button>
                                            </div>
                                        </div>





                                </div><!-- End tab-5 -->

                        </div><!-- End tab-contnet -->

                    </div><!-- End panel-body -->



                </div>

            </div>
        </div>






</div>













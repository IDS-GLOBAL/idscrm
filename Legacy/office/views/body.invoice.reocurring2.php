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
                                        <div class="col-lg-12">
                                        
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
                                                            <li><a href="#tab-zf" data-toggle="tab">Payment Info</a></li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="panel-body">

                                                    <div id="reoccuringINVoicPane" class="tab-content">
                                                                                        
                                                        <div id="tab-za" class="tab-pane fade">



                                                            <h3>Current Reoccuring Invoices</h3>
                                                                                            
                                                                <div>
                                                                    <?php include("_module_loop_recourring_invoices.php"); ?>
                                                                </div>
                                                                <div class="hr-line-dashed"></div>
                                                                                    
                                                        </div>                                
                                                        <div id="tab-zb" class="tab-pane fade in active">
                                                        
                                                            <div id="form_module_rocurring_create_box_view">
                                                                <?php include("_module_form_rocurring_create.php"); ?>
                                                            </div>

                                                        </div>
                                                        <div id="tab-zc" class="tab-pane fade">                                
                                                        

                                                                <input id="goview_thisdid" name="goview_thisdid"  value="<?php echo $row_recurringInvoice['invoice_dealerid']; ?>" type="hidden">
                                                                <input id="goview_recurinvcid" name="goview_recurinvcid" value="<?php echo $row_recurringInvoice['invoice_id']; ?>" type="hidden">
                                                                
                                                                <h2 id="recurinvcViewdid_name_display">Loaded Display Name</h2>
                                                                <div id="dlrReocurring_invcvw_bodyvw">
                                                                
                                                                    <h2>Loaded Invoice</h2>
                                                                    <div class="hr-line-dashed"></div>
                                                                
                                                                
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <div id="loaded_iframeviewer">


                                                                    
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
                                                                                        <h4>PDF.js</h4>
                                                                                        <p>
                                                                                            PDF.js is a Portable Document Format (PDF) viewer that is built with HTML5.
                                                                                            PDF.js is community-driven and supported by Mozilla Labs. The goal is to create a general-purpose, web standards-based platform for parsing and rendering PDFs.
                                                                                            Full documentation: <a href="https://github.com/mozilla/pdf.js" target="_blank">https://github.com/mozilla/pdf.js</a>
                                                                                        </p>
                                                            
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                                                                    <button type="button" class="btn btn-white" id="page_count">/ 22</button>
                                                                                                </div>
                                                                                            </div>
                                                            
                                                                                        </div>
                                                            
                                                                                </div>
                                                                        </div>
                                                            
                                                                        <div class="row">
                                                            
                                                                            <div class="text-center m-t-md">
                                                                                <canvas id="the-canvas" class="pdfcanvas border-left-right border-top-bottom b-r-md"></canvas>
                                                                            </div>
                                                            
                                                                        </div>
                                                            
                                                            
                                                            



                                                                    </div><!-- End loaded_iframevier -->
                                                                </div>




                                                        </div>
                                                        <div class="tab-pane" id="tab-zd">
                                                                                        
                                                                    <h2 id="recurinvcdid_name_display">Edit Reocurring</h2>
                                                                    
                                                                    <div class="hr-line-dashed"></div>
                                                                    
                                                                    <div id="dlrReocurring_invcEditvw_bodyvw"></div>
                                                                
                                                                
                                                        </div>
                                                        <div class="tab-pane" id="tab-ze">
                                                                    <h2>Create A Payment</h2>
                                                                
                                                                
                                                                

                                                                <div class="hr-line-dashed"></div>
                                                                
                                                                
                                                                
                                                                <div class="form-group">
                                                                    <div class="col-sm-4 col-sm-offset-2">
                                                                        <button id="recurring_reset_reoccuring_invoices" class="btn btn-white" type="submit">Reset</button>
                                                                        <button id="recurring_submit_reoccuring_invoices" class="btn btn-warning" type="submit">Save Reocurring Billing Settings</button>
                                                                    </div>
                                                                </div>
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                        </div>                               
                                                        <div class="tab-pane" id="tab-zf">
                                                                                            <h2>Credit Payment Information</h2>
                                                                                        
                                                                                        <div class="hr-line-dashed"></div>
                                                                                        <div class="form-group">
                                                                                            <div class="col-sm-4 col-sm-offset-2">
                                                                                                <button class="btn btn-white" type="submit">Cancel</button>
                                                                                                <button class="btn btn-primary" type="submit">Save changes</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                        </div><!-- End tab-5 -->
                                                                                    
                                                    </div><!-- End tab-contnet -->
                                                
                                                
                                                
                                                </div><!-- panel-body -->
                                            </div>

                                        </div>
                                </div>
            
                        
                        
                            </div>
    </div>
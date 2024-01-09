<!-- Start Modals --> 

	<!-- Start Deal Matrix Modal -->                       
                    <div class="row">
                    

	<div id="dealMatrix_Modal" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Task Reminder</h4>
                                            <small class="font-bold">This is a friendly task reminder.</small>
                                        </div>
                                                
                                                <div class="modal-body">
                    <div class="row">
                    	<h2>Deal Matrix Modal</h2>
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Vehicle Pricing Information 
                                    	<small>Change Retail, Special Price And Downpayment Information</small>
                                    </h5>
                                    <div></div>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    
                                    <div class="row">
                                    
                                    
                                    
                                        <div class="col-sm-6 b-r">
                                            <p>Enter Vehicle Sale Pricing Including Downpayments.</p>
                                                <div class="form-group"><label>Retail: </label> <input id="vrprice" type="text" placeholder="Retail: " class="form-control" value="<?php echo $row_find_vehicle['vrprice']; ?>" ></div>
                                                <div class="form-group"><label>Special Internet: </label> <input id="vspecialprice" type="text" placeholder="Special Internet: " class="form-control" value="<?php echo $row_find_vehicle['vspecialprice']; ?>"></div>
            
                                                <div class="form-group">
                                                <label>Down Payment: &nbsp;&nbsp;<span id="dp_roundup" class="pull_left"><a> (+) </a></span> &nbsp;&nbsp;<span id="dp_rounddown" class="pull-right"> <a> (-) </a></span></label> 
                                                <input id="vdprice" type="text" placeholder="Down Payment:" class="form-control" value="<?php echo $row_find_vehicle['vdprice']; ?>"></div>
                                        </div>
                                    
                                    
                                    
                                    
                                        <div class="col-sm-6">

                                            <?php
											$dlr_apr = $row_userDets['settingDefaultAPR'];
											if(!$dlr_apr){ $dlr_apr = '24.9';}
											
											$dlr_term = $row_userDets['settingDefaultTerm'];
											if(!$dlr_term){ $dlr_term = '40';}
											
											$downpayment_percentage = $row_userDets['settingDefaultDPpercntg'];
											if(!$downpayment_percentage){ $downpayment_percentage = '0.10';}
											
											$price_off = $row_userDets['settingDefaultPromoPriceOff'];
											if(!$price_off){ $price_off = '500.00';}
											
											?>
                                            
                                            <h4>Deal Matrix Preview</h4>
                                            <p>Below Is Deal Matrix Results: <a href="settings.php" target="_blank"> Go To Deal Matrix Settings?</a></p>
                                            <p>Internet Price Off: <span id="dlr_disc_int"><?php echo $price_off; ?></span><span id="dlr_disc_func"> Dollars</span></p>
											<p>Discount %of Retail Downpayment: <span id="dlr_dperc_int"><?php echo $downpayment_percentage; ?></span><span id="dlr_disc_func"> Dollars</span></p>
                                            
                                            
                                            <div class="row" style="display:none;">
                                            <div class="col-lg-6">         
                                                With Retail Pricing           
                                                <ul>
                                                    <li id="rtl_price_matrix"></li>
                                                    <li id="dp_price_matrix"></li>
                                                    <li id="spc_price_matrix"></li>
                                                </ul>
                                                </div>                   
            
                                                <div class="col-lg-6">
                                                The Percentage Of Down Paymet:
                                                <ul>
                                                    <li id="rtl_price_matrix"></li>
                                                    <li id="dp_price_matrix"></li>
                                                    <li id="spc_price_matrix"></li>
                                                </ul>
                                                </div>             
											
                                            <div>
                                                  
                                            </div>
                                         </div>
                                            
                                            
                                         
                                            
                                        <p><strong>APR Rate: </strong><span id="dlr_apr"><?php echo $dlr_apr; ?></span></p>

                                        <p><strong>Months:</strong> <span id="dlr_months"><?php echo $dlr_term; ?></span></p>

                                        <p><strong>Monthly Payments: $</strong> <span id="veh_payments"></span></p>
                                        <p><strong> Bi-Weekly Payments: $</strong> <span id="biweekly_payments"></span></p>

                                            
                                        </div>
                                    
                                    
                                    
                                    </div>
                                
                                    
                                    <div>
                                    	<p><a id="run_matrix" class="btn btn-primary btn-lg" href="#">Produce Deal Matrix Results</a>
</p>

                                    	<p><a id="addinventory" class="btn btn-primary btn-lg" href="#">Now Add Inventory</a></p>
                                    </div>
                                                    
                                </div>
                                     
                            </div>
                        </div>
					</div>                                
												</div>
                                            </div>
                                       </div>
</div>                    
					</div>
	<!--End Deal Matrix Modal -->





                 
                    	<div id="addInventory_Modal" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                
                                           <div class="modal-body">
                                                                                    
                                                    <div class="wrapper wrapper-content animated fadeInRight">
                                            
                                                    <div class="row">
                                                    
                                                        
                                                        
                                                        
                                                    
                                                    
                                
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">
                                                                <div class="ibox-content">
                                                                    <h2> Inventory Option Modal</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                
                                                    
                                
                                
                                            </div>
                                                
                                                    <div class="row">
                                                    
                                                    <div align="left" style="margin-left: 10px; margin-top: 20px;">

                                                    <button id="transferinentory" type="button" class="btn btn-lg btn-primary cum" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click To Transfer Inventory</button>
                                                    
                                                    <button id="addinventory" type="button" class="btn btn-lg btn-primary" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click Add Inventory</button>

                                                    
                                                    </div>

                                                    </div>
                                            	
                                                </div>
                                                
                                                
                                                
                                            </div>
                                        </div>
<!-- End Modals --> 

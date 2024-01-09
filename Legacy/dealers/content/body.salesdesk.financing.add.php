<div class="row">


                <div class="col-lg-6 col-md-6 col-sm-6">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Deal Structure Information <small>Powered by: Deal Matrix</small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Deal Structure
                            </h3>
                            <p>
                                Structure your deal below from selling price of vehicle.
                            </p>






                            <div id="deal_info_block" class="form-horizontal m-t-md">
                            
                            <div class="hr-line-dashed"></div>
                            
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Selling Price:</label>
                                    <div class="col-sm-9">
									<input type="number" step="1" id="priceVehicle" value="0.00" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Non-tax Rebate:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nonTaxRebate" value="0.00" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Taxable Price:</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" id="taxablePrice" value="0.00" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Down Payment:</label>
                                    <div class="col-sm-9">
                                       <input type="text" id="downPayment" class="form-control" oninput="updateMysum()" value="0.00">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"><a data-backdrop="static" data-toggle="modal" data-target="#rebateModal" class="btn btn-default ui-state-default">Rebates:</a></div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="rebates" value="0.00" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Trade Allowance:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tradeAllowance" class="form-control" value="0.00">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Trade Payoff:</label>
                                    <div class="col-sm-9">
                                        <input name="tradePayoff" type="text" id="tradePayoff" class="form-control" value="0.00">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"><a data-backdrop="static" data-toggle="modal" data-target="#aftermarketModal" class="btn btn-default ui-state-default">After Market/<br />Options:</a></div>
                                    <div class="col-sm-9">
								<input type="text" class="form-control" id="optionsAftermarket" value="0.00" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"><a data-backdrop="static" data-toggle="modal" data-target="#insuranceModal" class="btn btn-default ui-state-default">Insurance:</a></div>
                                    <div class="col-sm-9">
									<input type="text" id="insuranceCost" value="0.00" readonly="readonly" class="form-control">
                                    </div>
                                </div>

                            <div class="form-group">
                                    <div class="col-sm-3"><a data-backdrop="static" data-toggle="modal" data-target="#extendeservModal" class="btn btn-default ui-state-default">Extended/<br />Service Plan:</a></div>
                                    <div class="col-sm-9">
							<input type="text" class="form-control" id="extServicePlan" value="0.00" size="5" readonly="readonly">
                                    </div>
                                </div>

                            <div class="form-group" id="data_4">
                                    <label class="col-sm-3 control-label">State/Title Fee:</label>
                                    <div class="col-sm-9">
								<input type="text" class="form-control" id="LicenseTitleFee" value="<?php echo $licenseFee; ?>">
                                    </div>
                                </div>
                                

                            <div class="form-group" id="data_4">
                                    <label class="col-sm-3 control-label">Delivery Fee:</label>
                                    

                                    
                                    <div class="col-sm-9">
									<input type="text" id="deliveryFee" value="<?php echo $settingDocDlvryFee; ?>" readonly="readonly" class="form-control">
                                    </div>
                                </div>


                            <div class="form-group" id="data_4">
                                    <label class="col-sm-3 control-label">New Ad Valorem Title Tax (TAVT):</label>
                                    
                                    
                                    <?php
									
									if(!$dealer_tavt_state_link){
										$dealer_tavt_state_link = "#";
										$tavt_fee_required = '0';
										$dealer_tavt_state_link_target = '';
									}else{
										$tavt_fee_required = '1';
										$dealer_tavt_state_link_target = 'target="_blank"';
										
									}
									
									?>
                                    
                                    <input type="hidden" id="tavt_fee_required" readonly="readonly" value="<?php echo $tavt_fee_required; ?>">
                                    <div class="col-sm-9">
									<input type="text" id="tavt_fee" value="0.00" readonly="readonly" class="form-control">
                                    <span class="help-block"><?php echo $dealer_state; ?> State Link: <a href="<?php echo $dealer_tavt_state_link; ?>" <?php echo $dealer_tavt_state_link_target; ?>>Link</a></span>

                                    </div>
                                </div>

                            <div class="form-group" id="data_4">
                                    <label class="col-sm-3 control-label">Fees & Taxes:<br /><input name="noTaxes" type="checkbox" id="noTaxes" value="Y" onclick="updateMysum();">:UnCheck To Use No Taxes</label>
                                    <div class="col-sm-3">
                                    <input type="text" id="settingSateSlsTax" class="form-control" value="<?php echo $settingSateSlsTax; ?>" size="2">
                                    </div>
                                    <div class="col-sm-6">
								<input name="feesSalesTax" type="text" class="form-control" id="feesSalesTax" readonly="readonly">
                                    </div>
                                </div>

                            <div class="form-group" id="data_4">
                                    <label class="col-sm-3 control-label">Amount Due:</label>
                                    <div class="col-sm-9">
								<input name="amountDDue" type="text" class="form-control" id="amountDDue" readonly="readonly">
                                    </div>
                                </div>


<button id="Calculate" type="button" onclick="updateMysum();" value="Calculate" class="btn btn-warning btn-sm">Calculate</button>

                            
                            
                            </div>









                        
                        </div>
                    </div>

                </div><!-- End Deal Structure Information col  -->
                <div class="col-lg-6 col-md-6 col-sm-6">



<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Deal Financial Information <small>Powered by: Deal Matrix</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Deal Performer
                            </h3>
                            <p>
                               How this deal structure performs.
                            </p>
                            
                            <div class="form-horizontal m-t-md">
                                <div class="hr-line-dashed"></div>
                                
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><a data-backdrop="static" data-toggle="modal" data-target="#lineholdersModal" class="btn btn-default ui-state-default">Lien Holder:</a></label>



                                    <div class="col-sm-9">
                                        <select id="leinHolderSelct" class="form-control">
                                                      <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                          		
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">APR:</label>
                                    <div class="col-sm-9">
                                    <?php
									
									if($settingDefaultAPR){
									$use_apr = $settingDefaultAPR;
									}else{
									$use_apr = '18.0';
									}
									?>
                                    
                                    
                                        <input id="apr" data-mask="99.99" type="text" class="form-control" value="<?php echo $use_apr; ?>" placeholder="<?php echo $use_apr; ?>">
                                        <span class="help-block">ie. 18.00</span>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-3 control-label">First Payment:</label>
                                    <div class="col-sm-9">


								<div class="input-daterange input-group" id="datepicker">
<input name="firstpymt" type="text" id="firstpymt" oninput="updateMysum()" data-mask="99" value="30" size="3" class="form-control">                                    <span class="input-group-addon">Days</span>
                                </div>


                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Term:</label>
                                    <div class="col-sm-9">
									<input type="text" id="term" oninput="updateMysum()" data-mask="99" value="<?php echo $settingDefaultTerm; ?>" size="3" class="form-control">
									<span class="help-block">How many months?</span>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-3 control-label">MSRP:</label>
                                    <div class="col-sm-9">
										<input name="msrp" type="text" id="msrp" size="15" class="form-control">
                                        <span class="help-block">Orginal Selling Price</span>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Daily Interest:</label>
                                    <div class="col-sm-9">
                                    
                                    
								<div class="input-daterange input-group" id="datepicker">
									<input type="text" id="dayResults" value="0.0" size="6" readonly="readonly" class="form-control">
                                    <span class="input-group-addon">%</span>
									<input type="text" id="residualDollar" value="0.00" size="7" readonly="readonly" class="form-control">
                                </div>                                    
                                    
                                    
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Weekly Payments:</label>
                                    <div class="col-sm-9">
									<input type="text" class="form-control" id="weeklyPymts" value="0.00" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Bi-Weekly Payments:</label>
                                    <div class="col-sm-9">
									<input type="text" class="form-control" id="biweeklyPymts" value="0.00" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Semi-Monthly Payments:</label>
                                    <div class="col-sm-9">
									<input type="text" class="form-control" id="semimonthlyPymts" value="0.00" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Number Of Bi-Weekly Payments:</label>
                                    <div class="col-sm-9">
									<input type="text" class="form-control" id="biweeklynumPymts" value="0.00" readonly="readonly">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Monthly Payments:</label>
                                    <div class="col-sm-4">
									<input type="text" class="form-control" id="monthlyPymts" value="0.00" readonly="readonly">
                                    </div>
                                    <div class="col-sm-4">
                                    
                                    
                                    <span id="applicant_desired_mo_payment_results"></span>
                                    
                                    </div>
                                    <div>

                                   	<input type="hidden" id="monthlyPymt" value="" readonly="readonly" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Number Of Monthly Payments:</label>
                                    <div class="col-sm-9">
									<input type="text" class="form-control" id="monthlynumPymts" value="0.00" readonly="readonly">

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Total Payments:</label>
                                    <div class="col-sm-9">
									<input type="text" id="totalPayments" value="0.00" readonly="readonly" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Total Finance Charges:</label>
                                    <div class="col-sm-9">
										<input id="totalFinanceCharges" type="text" class="form-control" value="0.00" readonly="readonly">
                                    </div>
                                </div>




<button id="Calculate" type="button" value="Calculate" class="btn btn-warning btn-sm">Calculate</button>




							</div>

                        </div>
                    </div>
                    







                </div><!-- End Deal Financial Information col  -->
</div>

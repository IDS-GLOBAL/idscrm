	<div class="row">
    
  		<div class="col-sm-6">
        
                            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Fees Settings <small><a href="dealmatrix.php" target="_blank">Powered By Deal Matrix</a></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                               Fee Settings Used From Deal Matrix Settings
                            </h3>
                            
                            <div class="form-horizontal m-t-md" action="#">



								<div class="form-group" style="display:none;">
                                    <label class="col-sm-3 control-label">License Fee:</label>
                                    <div class="col-sm-9">
									<input type="text" id="licsFee" value="<?php //echo $licenseFee; ?>" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">State Inspection Fee:</label>
                                    <div class="col-sm-9">
									<input id="stateInspect" class="form-control" value="<?php echo $settingStateInspectnFee; ?>"/>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Title Fee:</label>
                                    <div class="col-sm-9">
									<input type="text" id="titleFee" value="<?php echo $settingTitleFee; ?>" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Total:</label>
                                    <div class="col-sm-9">
									<input type="text" id="licsNtitlefee" value="<?php echo $licenseFee;  ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="hr-line-dashed"></div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">State:</label>
                                    <div class="col-sm-4">
									<input id="stateTaxperc" class="form-control" value="<?php echo $settingSateSlsTax; ?>"/>
                                    </div>
                                    <div class="col-sm-4">
									<input id="stateTaxpercTotal" class="form-control" value=""/>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">County:</label>
                                    <div class="col-sm-4">
									<input id="taxCountyperc" class="form-control" value=""/>
                                    </div>
                                    <div class="col-sm-4">
									<input id="taxCountypercTotal" class="form-control" value=""/>
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">City:</label>
                                    <div class="col-sm-4">
									<input id="taxCityperc" class="form-control" value=""/>
                                    </div>
                                    <div class="col-sm-4">
									<input id="taxCitypercTotal" class="form-control" value=""/>
                                    </div>

                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Tax State:</label>
                                    <div class="col-sm-9">
                                    <input id="taxState" class="form-control" value="<?php echo $dealer_state; ?>" disabled readonly/>
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Default Taxed On:</label>
                                    <div class="col-sm-9">
									<input id="defaultstatetaxread" class="form-control" value="<?php echo $settingSateSlsTax; ?>" readonly disabled/>
                                    </div>
                                </div>



                                
                            </div>
                        
                        
                        </div>
                    </div>

                </div>

        
        		
        
        
        
	</div>
                                    

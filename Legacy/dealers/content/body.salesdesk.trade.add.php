  <div class="row">
  		<div class="col-sm-6">
        
                            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Trade</h5>
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

                            <div class="form-horizontal m-t-md">

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Vehicle Appraised By:</label>
                                    <div class="col-sm-9">
                                        <select name="vTradeVerifiedBy" id="vTradeVerifiedBy" class="form-control">
                                                <option value="">Select Appraiser</option>
                                                <?php do {  ?>
                                                <option value="<?php echo $row_managers['manager_id']?>"><?php echo $row_managers['manager_firstname'].' '.$row_managers['manager_lastname']; ?></option>
                                                <?php } while ($row_managers = mysqli_fetch_array($managers));
                                                  $rows = mysqli_num_rows($managers);
                                                  if($rows > 0) {
                                                      mysqli_data_seek($managers, 0);
                                                      $row_managers = mysqli_fetch_array($managers);
                                                  }
                                                ?>
                                              </select>
                                        <span class="help-block">Manager Who Appraised Vehicle Trade</span>
                                    </div>
                                </div>                            

                                <div class="hr-line-dashed"></div>





								<div class="form-group">
                                    <label class="col-sm-3 control-label">VIN of Trade:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeVin" value="" class="form-control">
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Year:</label>
                                    <div class="col-sm-9">
									<select id="vTradeYr" class="form-control">
									  <option value="">Select Year</option>
									  <?php
do {  
?>
									  <option value="<?php echo $row_autoYears['year']?>"><?php echo $row_autoYears['year']?></option>
									  <?php
} while ($row_autoYears = mysqli_fetch_array($autoYears));
  $rows = mysqli_num_rows($autoYears);
  if($rows > 0) {
      mysqli_data_seek($autoYears, 0);
	  $row_autoYears = mysqli_fetch_array($autoYears);
  }
?>
                                    </select>
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Make:</label>
                                    <div class="col-sm-9">
									<select id="vTradeMk" class="form-control">
									  <option value="">Select Make</option>
									  <?php
do {  
?>
									  <option value="<?php echo $row_vmakes['car_make']?>"><?php echo $row_vmakes['car_make']?></option>
									  <?php
} while ($row_vmakes = mysqli_fetch_array($vmakes));
  $rows = mysqli_num_rows($vmakes);
  if($rows > 0) {
      mysqli_data_seek($vmakes, 0);
	  $row_vmakes = mysqli_fetch_array($vmakes);
  }
?>
                                    </select>
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Model:</label>
                                    <div class="col-sm-9">
									<select id="vTradeModel" class="form-control">
                                    	<option value="">Select Model</option>
                                    </select>
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Trim:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeTrim" value="" class="form-control">
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Trade Mileage:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeMiles" value="" class="form-control">
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Exterior Color:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeColor" value="" class="form-control">
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Trade Allow:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeAllow" value="0.00" class="form-control">
                                    </div>
                                </div>



								<div class="form-group">
                                    <label class="col-sm-3 control-label">Licenses Fee:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeLicsfee" value="0.00" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Tag #:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeTagNo" value="" class="form-control">
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Title:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeTitle" value="" class="form-control">
                                    </div>
                                </div>



<div style="background:#CCC;">

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Lein Holder Of Trade:</label>
                                    <div class="col-sm-9">
									<select id="leinHolderTradeSelct" class="form-control">
                                    	<option value="">Select Lien Holder</option>
                                    </select>
                                    </div>
                                </div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Payoff Company:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradePayoffCompany" value="" class="form-control">
                                    </div>
                                </div>



								<div class="form-group">
                                    <label class="col-sm-3 control-label">Lein Holder No:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeLeinHldrAcctNo" value="" class="form-control">
                                    </div>
                                </div>



								<div class="form-group">
                                    <label class="col-sm-3 control-label">Address:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradePayoffCompanyAddr" value="" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Address 2:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradePayoffCompanyAddr2" value="" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Zip:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradePayoffCompanyZip" value="" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">City/State:</label>
                                    <div class="col-sm-4">
									<input type="text" id="vTradePayoffCompanyCity" value="" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                    <select id="vTradePayoffCompanyState" class="form-control">
                                    	<option>Select State</option>
										<?php do {  ?>
                                        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                        <?php } while ($row_states = mysqli_fetch_array($states));
                                          $rows = mysqli_num_rows($states);
                                          if($rows > 0) {
                                              mysqli_data_seek($states, 0);
                                              $row_states = mysqli_fetch_array($states);
                                          }
                                        ?>
                                    </select>
                                    
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Phone No:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradePayoffCompanyPhoneno" value="" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Lein Acct#:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeLeinHldrAcctNo" value="" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Pay Off Good Thru:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradePayoffGoodUntil" value="" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Per Diem:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradePayoffPerDiem" value="0.00" class="form-control">
                                    </div>
                                </div>


</div>




								<div class="form-group">
                                    <label class="col-sm-3 control-label">Decal:</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeDecal" value="" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Owner(s):</label>
                                    <div class="col-sm-9">
									<input type="text" id="vTradeOwner" value="" class="form-control">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Disclosure Comments:</label>
                                    <div class="col-sm-9">
									<textarea id="vTradeRemarksAttached"class="form-control textarea"></textarea>
                                    </div>
                                </div>




























                                <div class="hr-line-dashed"></div>                        
                        </div>
                    
                    
                    
                    
                    </div>

                </div>

        </div>
        <div class="col-sm-6">
        
        
                            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Trade <small></small></h5>
                        </div>
                        <div class="ibox-content">
                            
                            <div class="form-horizontal m-t-md">


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Pay Off Amount:</label>
                                    <div class="col-sm-9">
									<input id="vTradePayOff" class="form-control" value="0.00"/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">ACV:</label>
                                    <div class="col-sm-9">
									<input id="tradeACV" class="form-control" value="0.00"/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Tag State:</label>
                                    <div class="col-sm-9">
                                    <select id="vTradeTagState" class="form-control">
                                    	<option>Select State</option>
										<?php do {  ?>
                                        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                        <?php } while ($row_states = mysqli_fetch_array($states));
                                          $rows = mysqli_num_rows($states);
                                          if($rows > 0) {
                                              mysqli_data_seek($states, 0);
                                              $row_states = mysqli_fetch_array($states);
                                          }
                                        ?>
                                    </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Tag Expiration:</label>
                                    <div class="col-sm-9">
									<input id="vTradeTagExprDate" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Sticker #:</label>
                                    <div class="col-sm-9">
									<input id="vTradeStikNo" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Open RO Amount:</label>
                                    <div class="col-sm-9">
									<input id="vTradeOpenRO" class="form-control" value="0.00"/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                        
                        
                        </div>
                    </div>

                </div>
        
        
        
        </div>
  </div>                                  

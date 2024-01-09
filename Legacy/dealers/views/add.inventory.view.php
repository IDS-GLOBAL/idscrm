



                            <div class="modal inmodal" id="addModelbyDealer" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Create A New Model</h4>
                                            <small class="font-bold">Because you said your model wasn't listed here we wanted to let you add it.</small>
                                        </div>
                                        
                                        <div id="appointment_body_viewer" class="modal-body">
                                        
                                        <div class="form-group">
                                        <label>Create A New System Model</label>
                      					<input id="vmodel_entered" class="form-control" value="" />			
                                        </div>
                                        
                                        
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button id="cancel_model_toselections" type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="add_model_toselections" type="button" data-dismiss="modal" class="btn btn-warning">Add To Model Selection</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            






        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Start Here...</h5>
                    </div>
                    <div id="start_inventory_content" class="ibox-content">
        



<div class="form-horizontal">

                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">VIN:<br /><div id="vvinfeedback"></div></label>
									




                                    <div class="col-sm-10">
                                    
                                    
                                    
                                        <div id="vin_highlight" class="input-group m-b">
                                        
                        <span class="input-group-addon">VIN <span id="vin_charcount">Empty</span></span>
                        <input id="vvin" type="text" name="vvin" maxlength="17" class="form-control" value=""> 
                       <span class="input-group-btn"> <button id="decode_vin" type="button" class="btn btn-primary">PASS VIN!</button> </span>



                                        </div>
                                        
                                        <div class="row">
                                        	<div class="inline">

                            <div id="vinYearResult" class="col-sm-3">Year</div>
                            <div id="vinMakeResult" class="col-sm-3">Make</div>
                            <div id="vinModelResult" class="col-sm-5">Model</div>
                                            
                                            
                                            </div>
                                            <input id="vin_year" type="hidden" value="" />
                                        </div>
                                    
                                    </div><!-- End Col-sm-10 -->
                                </div>





                                <div class="hr-line-dashed"></div>

 				<div id="vehicle_first_part" style="display:none;">                    
                        
                                <div class="form-group">
                                	<label for="vstockno" class="col-sm-2 control-label">Stock No:</label>
                                    <div class="col-sm-10">
                                        <div id="stock_highlight" class="input-group m-b">   
                                            <span id="uselast6ofvin" class="input-group-addon">Use Last Six of VIN</span>
                                            <input id="vstockno" type="text" class="form-control" value="">
                                            <span class="input-group-btn">
                                            <button id="checkout_vstockno" type="button" class="btn btn-primary">Stock# Check!</button> 
                                            </span>                                                                        
                                        </div>
									</div>
                    			</div>

					<div id="checkvstock_results">
                    
                    </div>
                
                </div>
            
            
                                <div class="hr-line-dashed"></div>

   				<div id="vehicle_second_part" style="display:none;">                    
          			
                    
                    <div class="form-group">
                    <label for="vmileage" class="col-sm-2 control-label">Mileage:</label>
                        <div class="col-sm-10">
					<input id="vmileage" type="text" placeholder="Mileage" class="form-control" value="">
                        </div>
                    </div>
                    


                                <div class="hr-line-dashed"></div>
        

			        





                                <div class="form-group"><label for="vyear" class="col-sm-2 control-label">Year:</label>

                                    <div class="col-sm-10"><select name="vyear" id="vyear" class="form-control">
                                      <option value="">Select Year</option>
                                      <?php do {  ?>
<option value="<?php echo $row_carYears['year']; ?>"><?php echo $row_carYears['year']; ?></option>
<?php
} while ($row_carYears = mysqli_fetch_assoc($carYears));
  $rows = mysqli_num_rows($carYears);
  if($rows > 0) {
      mysqli_data_seek($carYears, 0);
	  $row_carYears = mysqli_fetch_assoc($carYears);
  }
?>
                                    </select></div>
                                </div>
                                
                                
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group">
                                <label for="vmake" class="col-sm-2 control-label">Make:</label>

		                        <div class="col-sm-10"> 
                                 <select id="vmake" class="form-control">
                                    <option value="">Select Make</option>
                                    <?php
do {  
?>
                                    <option value="<?php echo $row_vmakes['make_id']?>"><?php echo $row_vmakes['car_make']?></option>
                                    <?php
} while ($row_vmakes = mysqli_fetch_assoc($vmakes));
  $rows = mysqli_num_rows($vmakes);
  if($rows > 0) {
      mysqli_data_seek($vmakes, 0);
	  $row_vmakes = mysqli_fetch_assoc($vmakes);
  }
?>
                                  </select>

                                    </div>
                                </div>
                                
                                
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label for="vmodel" class="col-sm-2 control-label">Model:</label>

                                    <div class="col-sm-10">                                            
                                    <select id="vmodel" class="form-control">
                                            	<option value="">Select Model</option>

                                    </select>
									</div>
                                
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label for="vtrim" class="col-sm-2 control-label">Trim:</label>

                                    <div class="col-sm-10">                                            
                                    <input id="vtrim" placeholder="Trim" class="form-control" value="">
									</div>
                                
                                </div>
                                <div class="hr-line-dashed"></div>
                                    
                                    <div class="form-group">
                                        
                                        <label class="col-sm-2 control-label">Vehicle Condition:</label>
    
                                        <div class="col-sm-10">
                                            
                                            <select class="form-control" id="vcondition"  name="vcondition">
                                                <option value="" >Select Vehicle Condition</option>
                                                <option value="Used" selected="selected">Used</option>
                                                <option value="New">New</option>
                                                <option value="Trade-In">Trade-In</option>
                                                <option value="Salvage">Salvage</option>
                                            </select>
                                            
                                            </div>
                                    </div>                                    


                                    <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                <label id="vrprice" class="col-sm-2 control-label">Retail Price:</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vrprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label id="vspecialprice" class="col-sm-2 control-label">Special Price:</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vspecialprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>


                                <div class="form-group">
                                <label id="vdprice" class="col-sm-2 control-label">Downpayment Price:</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vdprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>

                                	<div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label for="vlivestatus" class="col-sm-2 control-label">Vehicle Status:</label>
    
                                        <div class="col-sm-10">
                                        <select class="form-control"  id="vlivestatus" >
                                          <option value="0">KEEP ON HOLD</option>
                                          <option value="1">GO LIVE</option>
                                          <option value="9">SOLD!</option>
                                        </select>
                                        </div>
                                    </div>
                                	<div class="hr-line-dashed"></div>




                                <div class="hr-line-dashed"></div>


                                
                                

                </div><!-- End Second Part -->

</div>



                    
                    
                    
                    
                    </div><!-- End ibox contnet-->
                </div>
            </div>
        </div>

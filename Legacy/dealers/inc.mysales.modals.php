<?php











?>








<!-- Start Deal Matrix Modal Window -->                            
                            <div class="modal inmodal" id="dealMatrixModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-simplybuilt modal-icon"></i>
                                            <h4 class="modal-title">Deal Matrix Modal</h4>
                                            <small class="font-bold">How Deals Are Process on Your Behalf.</small>
                                        </div>
                                        <div class="modal-body">

											<div class="row">
                                            	<div class="col-sm-6">
                                                <h5>Deal Settings</h5>
                                                
                                                        
                                                    <div class="form-group">
                                                        <label>Default APR</label> 
                                                        <h5><?php echo $settingDefaultAPR; ?></h5>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Special Internet Price Off</label> 
                                                        <h5><?php if($row_userDets['settingDefaultPromoPriceOff'] == '1'){echo 'ON';}else{ echo 'OFF'; } ?></h5>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Default Term/Months</label> 
                                                        <h5<?php echo $settingDefaultTerm; ?>></h5>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Doc + Delivery Fee</label> 
                                                        <h5>Doc: <?php echo $settingDocDlvryFee; ?> </h5>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Title Fee</label> 
                                                        <h5><?php echo $settingTitleFee; ?></h5>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>State Inspection Fee</label> 
                                                        <h5><?php echo $settingStateInspectnFee; ?></h5>
                                                    </div>



                                                    <div class="form-group">
                                                        <label>Edit Deal Matrix</label> 
                                                        <h5></h5>
                                                        <a href="dealmatrix.php" class="btn btn-primary-btn-sm"></a>
                                                    </div>
													
                                                
                                                </div>
                                                <div class="col-sm-6">
                                                <h5>Rate Settings</h5>
												
                                                <div class="row">
                                                
                                                	<div class="col-sm-6">
                                                    <h3>Used Car Rates</h3>
                                                    <div class="form-group">
                                                        <label>Very Good Credit (720 - 850) - Used Car</label> 
                                                        <h3><?php echo $usedmatrixcredit_vgoodcredit; ?></h3>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Good Credit (675 - 719) - Used Car</label> 
                                                        <h3><?php echo $usedmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fair Credit: (621-674) - Used Car</label> 
                                                        <h3><?php echo $usedmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Poor Credit: (575- 620) - Used Car</label> 
                                                        <h3><?php echo $usedmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sub Prime: (Below - 575) - Used Car</label> 
                                                        <h3><?php echo $usedmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>I am not Sure - No Credit: (0 - ?) - Used Car</label> 
                                                        <h3><?php echo $usedmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Used Car Minimum Frontend Profit:</label> 
                                                        <h3>$ <?php echo $usedmatrixcredit_fminimumprofit; ?></h3>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Used Car Minimum Backend Profit:</label> 
                                                        <h3>$ <?php echo $usedmatrixcredit_bminimumprofit; ?></h3>
                                                    </div>                                                    
                                                    
                                                    
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <h3>New Car Rates</h3>



                                                    <div class="form-group">
                                                        <label>Very Good Credit (720 - 850) - New Car</label> 
                                                        <h3><?php echo $newmatrixcredit_vgoodcredit; ?></h3>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Good Credit (675 - 719) - New Car</label> 
                                                        <h3><?php echo $newmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fair Credit: (621-674) - New Car</label> 
                                                        <h3><?php echo $newmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Poor Credit: (575- 620) - New Car</label> 
                                                        <h3><?php echo $newmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sub Prime: (Below - 575) - New Car</label> 
                                                        <h3><?php echo $newmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>I am not Sure - No Credit: (0 - ?) - New Car</label> 
                                                        <h3><?php echo $newmatrixcredit_jgoodcredit; ?></h3>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>New Car Minimum Frontend Profit:</label> 
                                                        <h3>$ <?php echo $newmatrixcredit_fminimumprofit; ?></h3>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>New Car Minimum Backend Profit:</label> 
                                                        <h3>$ <?php echo $newmatrixcredit_bminimumprofit; ?></h3>
                                                    </div>                                                    






                                                    </div>



												</div>



                                                </div>
                                            </div>









                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close Window</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- End Deal Matrix Modal Window -->














<!-- Start Task Reminder Modal Window -->

                            
                            <div class="modal inmodal" id="newtaskReminder" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Task Reminder</h4>
                                            <small class="font-bold">This is a friendly task reminder.</small>
                                        </div>
                                        
                                        <div class="modal-body">
                                        
                                        
                                        <div class="row">
                                            <div class='col-md-12'>
                                                <div class="form-group">
                                                   
                                                    <h2>Task Action Title</h2>
                                                    
                                                    <p>Task Action To Do Do</p>
                                                                    
                                                </div>
                                            </div>
                                        </div>                                        
                                        
                                        
                                        
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="snoozeTaskReminderModal" type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- End Task Reminder Modal Window -->









<!-- Start Apppointment Modal Window -->
                            <div class="modal inmodal" id="newappointmentModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">New Appointment</h4>
                                            <small class="font-bold">Make A New Appointment Here. <span id="dlr_appt_vid_descrp"></span></small>
                                        </div>
                                        <div class="modal-body">
                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md"><h4>Click Tab For More Options</h4></div>
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#appt-1">Appointment</a></li>
                                    <li class=""><a data-toggle="tab" href="#appt-2">More Options</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="appt-1" class="tab-pane active">



<div class="row">
    <div class='col-md-12'>
    <label>Apppointment Who?</label>
        <div class="form-group">
        
            <input name="dlr_appt_title" type='text' class="form-control" id="dlr_appt_title" value="" />

            <input type="hidden" id="dlr_appt_customer_id" name="dlr_appt_customer_id" value="">
        	
            <input type="hidden" id="dlr_appt_creditapp_id" name="dlr_appt_creditapp_id" value="">

            <input type="hidden" id="dlr_appt_lead_id" name="dlr_appt_lead_id" value="">
            
	        <input type="hidden" id="dlr_appt_vid" name="dlr_appt_vid" value="">
            <input type="hidden" id="appt_url_goto" name="appt_url_goto" value="">
        </div>
    </div>
 </div>



                                    <div class="row">
                                        <div class="col-md-12">



									<div class="panel panel-warning">
                                        <div class="panel-heading">
                            <h3 id="inline">Time &amp; Date Picker</h3>
                                        </div>
                                        <div id="timepicker_panel" class="panel-body" align="center">
                                        	<div id="datetimepicker12"></div>
                                        </div>
                                    </div>

                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>




             <div class="row">
                <div class='col-md-12'>
                
             <div class="row">
                <div class='col-md-6'>

                    <div class="form-group">
                       <label class="font-normal">Appointment Duration?</label>
                        <div class='form-group' id='newdlr_appt_startunixtime'>
                            <select name="appthowlong" type='text' class="form-control" id="appthowlong">
                            	<option value="30:minutes"  selected>30 Minutes</option>
                            	<option value="1:hours"  selected>1 Hour</option>
                            	<option value="90:minutes">1 Hour 30 Minutes</option>
                            	<option value="2:hours">2 Hours</option>
                            	<option value="150:minutes">2 Hours 30 Minutes</option>
                            	<option value="3:hours">3 Hours</option>
                            	<option value="210:minutes">3 Hours 30 Minutes</option>
                            	<option value="4:hours">4 Hours</option>
                            	<option value="5:hours">5 Hours</option>
                            	<option value="6:hours">6 Hours</option>
                            	<option value="8:hours">All Day</option>
                            </select>
                            
                        </div>
                    </div>
                
                </div>
             	<div class="col-md-6">
                	
				<div class="form-group" align="center">
                       <label class="font-normal">IDS Robot Email Remind Me:</label>
                        <div class='form-group' id='newdlr_appt_startunixtime'>
                          
                          
                          <div class="btn-group" data-toggle="buttons" align="center">
                          <br />
                          
                            <input name="dlr_appt_robot_sendemail" type='checkbox' class="js-apptrobotme" id="dlr_appt_robot_sendemail" value="1" />
                          </div>    
                          
                          
                        </div>
                    </div>                    
                    
                </div>
             </div> 
              
                    
                    
                    
                </div>
             </div>






             <div class="row">
                <div class='col-md-12'>
                    <div class="form-group">
                       <label class="font-normal">Appointment Notes:</label>
                        <div class='form-group'>
                            <input name="dlr_appt_notes" type='text' class="form-control" id="dlr_appt_notes" value="" />
                            
                        </div>
                    </div>
                </div>
             </div>

                                        
                                                
                                </div>

                                <div id="appt-2" class="tab-pane">




<div class="row">
    <div class='col-md-12'>
    <label>Pick Who To Assign This Appointment To?</label>


<div class="row" align="justify">

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_sales_person" class="btn btn-primary">Sales Person</button>
        </div>
        
	</div>

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_manager_person" class="btn btn-primary">Manager</button>
        </div>
        
	</div>


    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_account_person" class="btn btn-primary">Collector</button>
        </div>
        
	</div>

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_repair_shops" class="btn btn-primary">Repair Shop</button>
        </div>
        
	</div>

</div>        
        
        
        
        
        
    </div>
 </div>

<div id="see_sales_team" class="row" style="display: block;">
    <div class='col-md-12'>
    <label>Assign Appointment To Sales Team:</label>
        <div class="form-group">
  <select id="dlr_appt_sid" class="form-control m-b" name="dlr_appt_sid">
    <option value="<?php echo $sid; ?>" selected="selected"><?php echo $loggedin_salespersons_name; ?></option>
    <option value="0">House</option>
  </select>
        </div>
    </div>
 </div>


<div id="see_manager_team" class="row" style="display:none;">
    <div class='col-md-12'>
    <label>Assign Appointment Oversee From Manager Team:</label>
        <div class="form-group">
  <select id="dlr_appt_mgr_id" class="form-control m-b" name="dlr_appt_mgr_id">
<option value="0">House</option>
      <?php
	  if($totalRows_manager_nav != 0):
do {  
?>
      <option value="<?php echo $row_manager_nav['manager_id']?>"><?php echo $row_manager_nav['manager_firstname']?> <?php echo $row_manager_nav['manager_lastname']?></option>
      <?php
} while ($row_manager_nav = mysqli_fetch_assoc($manager_nav));
  $rows = mysqli_num_rows($manager_nav);
  if($rows > 0) {
      mysqli_data_seek($manager_nav, 0);
	  $row_manager_nav = mysqli_fetch_assoc($manager_nav);
  }
  endif;
?>
  </select>
        </div>
    </div>
 </div>





<div id="see_collectors_team" class="row" style="display:none;">
    <div class='col-md-12'>
    <label>Assign Appointment From Collectors Team:</label>
        <div class="form-group">
  <select id="dlr_appt_acid" class="form-control m-b" name="dlr_appt_acid">
	<option value="0">House</option>
      <?php
	  if($totalRows_acct_rep_nav != 0):
do {  
?>
      <option value="<?php echo $row_acct_rep_nav['account_person_id']?>"><?php echo $row_acct_rep_nav['account_firstname']?> <?php echo $row_acct_rep_nav['account_lastname']?></option>
      <?php
} while ($row_acct_rep_nav = mysqli_fetch_assoc($acct_rep_nav));
  $rows = mysqli_num_rows($acct_rep_nav);
  if($rows > 0) {
      mysqli_data_seek($acct_rep_nav, 0);
	  $row_acct_rep_nav = mysqli_fetch_assoc($acct_rep_nav);
  }
  endif;
?>

    </select>

        </div>
    </div>
 </div>

<div id="see_repair_shops" class="row" style="display:none;">
    <div class='col-md-12'>
    <label>Assign Appointment For Repair Shop(s):</label>
        <div class="form-group">
  <select id="dlr_appt_reprshop_id" class="form-control m-b" name="dlr_appt_reprshop_id">
      <option value="0">No Repair Shop</option>
      <?php 
	  if($totalRows_repair_shops != 0):
	  do {  
	  ?>
      <option value="<?php echo $row_repair_shops['repairshops_id']?>"><?php echo $row_repair_shops['repairshops_company_name']?></option>
      <?php } while ($row_repair_shops = mysqli_fetch_assoc($repair_shops));
		  $rows = mysqli_num_rows($repair_shops);
		  if($rows > 0) {
			  mysqli_data_seek($repair_shops, 0);
			  $row_repair_shops = mysqli_fetch_assoc($repair_shops);
		  }
		  
	endif;
		?>
    </select>
        </div>
    </div>
 </div>






             <div class="row">
                 <div class='col-md-12'>
    
                         <div class="row">




                            <div class='col-md-6'>
                                <div class="form-group">
                                   <label class="font-normal">Appointment Start:</label>


           <div class="form-group">
				<input class="form-control" id="dlr_appt_starttime_humanread" value="" disabled>
           </div>

            
                                   
                                    <div class='input-group date' id='newdlr_appt_startunixtime' style="display:none;">
                                        <input name="dlr_appt_startunixtime" type='text' class="form-control" id="dlr_appt_startunixtime" value="" disabled="true" />
                                        <span class="input-group-addon"><span id="appt_ical1" class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>


                        
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label class="font-normal">Appointment End:</label>
           <div class="form-group">
				<input class="form-control" id="dlr_appt_endtime_humanread" value="" disabled>
           </div>
                                    
                                    <div class='input-group date' id='newdlr_appt_endunixtime' style="display:none;">
                                        <input name="dlr_appt_endunixtime" type='text' class="form-control" id="dlr_appt_endunixtime" value="" disabled="true" />
                                        <span class="input-group-addon"><span id="appt_ical2" class="glyphicon glyphicon-calendar"></span>
                                        </span>
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








                                                
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="savenewappointmentModal" type="button" class="btn btn-primary">Make Appointment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


<!-- End Apppointment Modal Window -->








                            <div class="modal inmodal" id="quickappointviewerModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Quick Appointment Reminder</h4>
                                            <small class="font-bold">This is a quick appointment viewer.</small>
                                        </div>
                                        
                                        <div id="appointment_body_viewer" class="modal-body">
                                        
                                        
                                        
                                        
                                        
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button id="clear_appointment_viewer" type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="clear_appointment_viewer" type="button" data-dismiss="modal" class="btn btn-warning">Close Window</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



							<div class="modal inmodal" id="mobilesettingsviewerModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Cellular Comunications</h4>
                                            <small class="font-bold">Verify Your Mobile Device</small>
                                        </div>
                                        
                                        <div id="mobile_body_viewer" class="modal-body">
                                        
                                        
                                        
                                        
                                        
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button id="clear_mobile_viewer" type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="clear_mobile_viewer" type="button" data-dismiss="modal" class="btn btn-warning">Close Window</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
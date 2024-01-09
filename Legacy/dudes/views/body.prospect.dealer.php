






              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Prospect Dealer  <small>dealer_pending_id: <?php echo $prospctdlrid; ?> </small></h5>
                    </div>



<input id="prospctdlrid" type="hidden" value="<?php echo $prospctdlrid; ?>" >
<input id="dlrpost_token"  type="hidden" value="<?php echo $prospctdlr_token; ?>">
                        <div id="email_dlrprospectsent_results">
                        
                        </div>



<div class="ibox-content">


<div class="row" align="center">
<div class="col-sm-6">
	<div class="row">
    	<div class="col-sm-6">
            <div class="form-group">
            	<label class="control-label">Rep #1</label>
                <select name="dudes1_id" id="dudes1_id" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dudes_id']))) {echo "selected=\"selected\"";} ?>>Select Rep</option>
    <?php
do {  
?>
    <option value="<?php echo $row_pullactvDudes['dudes_id']?>"<?php if (!(strcmp($row_pullactvDudes['dudes_id'], $row_query_dlrprospect['dudes_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_pullactvDudes['dudes_lname']?>, <?php echo $row_pullactvDudes['dudes_firstname']?> <?php if($row_pullactvDudes['dudes_skillset_id'] > 1){ echo ' '.$row_pullactvDudes['dudes_skillset_id']; }else{ echo ''; } ?></option>
    <?php
} while ($row_pullactvDudes = mysqli_fetch_array($pullactvDudes));
  $rows = mysqli_num_rows($pullactvDudes);
  if($rows > 0) {
      mysqli_data_seek($pullactvDudes, 0);
	  $row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
  }
?>
  </select>
            </div>
        </div>

    	<div class="col-sm-6">
            <div class="form-group">
            	<label class="control-label">Rep #1</label>
                <select name="dudes2_id" id="dudes2_id" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dudes2_id']))) {echo "selected=\"selected\"";} ?>>Select Rep 2</option>
    <?php
do {  
?>
    <option value="<?php echo $row_pullactvDudes['dudes_id']?>"<?php if (!(strcmp($row_pullactvDudes['dudes_id'], $row_query_dlrprospect['dudes2_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_pullactvDudes['dudes_lname']?>, <?php echo $row_pullactvDudes['dudes_firstname']?> <?php if($row_pullactvDudes['dudes_skillset_id'] > 1){ echo ' '.$row_pullactvDudes['dudes_skillset_id']; }else{ echo ''; } ?></option>
    <?php
} while ($row_pullactvDudes = mysqli_fetch_array($pullactvDudes));
  $rows = mysqli_num_rows($pullactvDudes);
  if($rows > 0) {
      mysqli_data_seek($pullactvDudes, 0);
	  $row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
  }
?>
  </select>
            </div>
        </div>


    </div>
    
</div>
<div class="col-sm-6">
                                <button id="save_prospectdlr" class="btn btn-outline btn-info dim" type="button"><i class="fa fa-floppy-o fa-2x"></i></button>

                                <button id="money_prospectdlr" class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-money fa-2x"></i></button>
                                <button id="email_prospectdlr" class="btn btn-outline btn-warning dim" type="button"><i class="fa fa-envelope-o fa-2x"></i></button>
								<button id="appointment_prospectdlr" class="btn btn-outline btn-warning  dim" type="button"><i class="fa fa-calendar fa-2x"></i> </button>
								<button id="task_prospectdlr" class="btn btn-outline btn-warning  dim" type="button"><i class="fa fa-cog fa-2x"></i> </button>
								<button id="pitch_prospectdlr" class="btn btn-outline btn-info  dim" type="button"><i class="fa fa-bullhorn fa-2x"></i> </button>

								</div>                                
                                
<!--
                                <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-check"></i></button>
                                <button class="btn btn-outline btn-success  dim" type="button"><i class="fa fa-upload"></i></button>
                                <button class="btn btn-outline btn-info  dim" type="button"><i class="fa fa-paste"></i> </button>
                                <button class="btn btn-outline btn-warning  dim" type="button"><i class="fa fa-warning"></i></button>
                                <button class="btn btn-outline btn-danger  dim " type="button"><i class="fa fa-heart"></i></button>

-->


</div>

<div class="modal inmodal fade" id="vehicleUploadModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Upload Multiple Photos</h4>
                                            <small id="vehicle_working_upload_text" class="font-bold">This </small>
                                        </div>
                                        <div class="modal-body">


					<input id="this_vehicleid" type="hidden" value="">
					<input id="this_prospctdlrid" type="hidden" value="">
                    
                    <br />


                    <div id="vehicle-dropzone" style="background:#666;">
                    <button id="submit-all">Submit all files</button>
                    <form id="my-dropzone" action="uploads/upload.php" class="dropzone" style="background:#666;">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form>
                    </div>

                    




                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white">Close</button>
<a id="clear_outphotos" class="btn btn-xs btn-primary">Clear Photos</a>

                                            <button id="submit-allv" type="button" class="btn btn-primary"  data-dismiss="modal">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



<div class="modal inmodal" id="moneyProspectDlrModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-clock-o modal-icon"></i>
                                            <h4 class="modal-title">Your Are Moving This Dealer To Pending</h4>
                                            <small>Select A Template And Email It To This Lead</small>
                                        </div>
                                        <div class="modal-body">




<div class="form-horizontal">
                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">To:</label>
                                            	<div class="col-sm-10">
                                               	  <input id="email_to2" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['email']; ?>">
                                                </div>
                                           </div>
                                           
                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">From:</label>
                                            	<div class="col-sm-10">
                                               	  <input id="email_from2" type="text" class="form-control" value="<?php echo $row_userDudes['dudes_email_internal']; ?>" disabled="disabled">
                                                </div>
											</div>

                                            <div class="form-group">
                                            	<label for="email_template2" class="col-sm-2 control-label">Templates:</label>
                                            	<div class="col-sm-10">
                                               	  <select id="email_template2" name="email_template" class="form-control">
                                               	    <option value="">Select</option>
                                               	    <?php
do {  
?>
                                               	    <option value="<?php echo $row_find_activsystem_templates['id']?>"><?php echo $row_find_activsystem_templates['email_systm_templates_subject']?></option>
                                               	    <?php
} while ($row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates));
  $rows = mysqli_num_rows($find_activsystem_templates);
  if($rows > 0) {
      mysqli_data_seek($find_activsystem_templates, 0);
	  $row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
  }
?>
                                                  </select>
                                                </div>
                                           </div>




                    <div class="mail-text">

                        <div id="email_systm_templates_body2" class="summernote">
                            <p id="removeme"></p>

                        </div>
<div class="clearfix"></div>
                        </div>
                    <div class="clearfix"></div>











                                            
                                            
                                        </div>


                                        
                                        
                                                
                                                
                                                
                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="movethis_prospectanemail" data-dismiss="modal" type="button" class="btn btn-primary">Move to Pending And Send Email</button>
                                        </div>
                                    </div>
                                </div>
                            </div>








<div class="modal inmodal" id="emailProspectDlrModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-clock-o modal-icon"></i>
                                            <h4 class="modal-title">Email This Prospect</h4>
                                            <small>Select A Template And Email It To This Lead</small>
                                        </div>
                                        <div class="modal-body">




<div class="form-horizontal">
                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">To:</label>
                                            	<div class="col-sm-10">
                                               	  <input id="email_to" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['email']; ?>">
                                                </div>
                                           </div>
                                           
                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">From:</label>
                                            	<div class="col-sm-10">
                                               	  <input id="email_from" type="text" class="form-control" value="<?php echo $row_userDudes['dudes_email_internal']; ?>" disabled="disabled">
                                                </div>
											</div>

                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">Templates:</label>
                                            	<div class="col-sm-10">
                                               	  <select id="email_template" name="email_template" class="form-control">
                                               	    <option value="">Select</option>
                                               	    <?php
do {  
?>
                                               	    <option value="<?php echo $row_find_activsystem_templates['id']?>"><?php echo $row_find_activsystem_templates['email_systm_templates_subject']?></option>
                                               	    <?php
} while ($row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates));
  $rows = mysqli_num_rows($find_activsystem_templates);
  if($rows > 0) {
      mysqli_data_seek($find_activsystem_templates, 0);
	  $row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
  }
?>
                                                  </select>
                                                </div>
                                           </div>




                    <div class="mail-text">

                        <div id="email_systm_templates_body" class="summernote">
                            <p id="removeme"></p>

                        </div>
<div class="clearfix"></div>
                        </div>
                    <div class="clearfix"></div>











                                            
                                            
                                        </div>


                                        
                                        
                                                
                                                
                                                
                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="sendthis_prospectanemail" data-dismiss="modal" type="button" class="btn btn-primary">Send Email</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


<div class="modal inmodal" id="appointmentModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Set An Appointment</h4>
                                            <small class="font-bold">This is a prospect dealer. your appointment should be to contact them to convert to system dealer.</small>
                                        </div>
                                        <div class="modal-body">
                                        
                                        
                                        
                                        <h3>Appointment Maker</h3>
                                        
                                        
                                        <div class="row">
                                        	<div class="form-group">
                                            <label class="control-label">Start Time</label>
                                            <select id="pick_dlrprospect_appointment_hours" class="form-control">

<?php if(date('D', strtotime($time_now.'+1 hour')) != 'Sun'){ ?>                                       
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+1 hour'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+0 hour')); ?></option>
<?php } ?>


<?php if(date('D', strtotime($time_now.'+1 day')) != 'Sun'){ ?>                                       
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+1 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+1 day')); ?></option>
<?php } ?>

<?php if(date('D', strtotime($time_now.'+2 day')) != 'Sun'){ ?>                                       
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+2 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+2 day')); ?></option>
<?php } ?>

<?php if(date('D', strtotime($time_now.'+3 day')) != 'Sun'){ ?>                                            
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+3 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+3 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+4 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+4 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+4 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+5 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+5 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+5 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+6 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+6 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+6 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+7 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+7 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+7 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+8 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+8 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+8 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+9 day')) != 'Sun'){ ?>

                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+9 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+9 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+10 day')) != 'Sun'){ ?>                                            
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+10 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+10 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+11 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+11 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+11 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+12 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+12 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+12 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+13 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+13 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+13 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+14 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+14 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+14 day')); ?></option>
<?php } ?>
                                        	<option value="99999">Open Request</option>
                                            </select>
                                            </div>
                                        	<div class="form-group">
                                            <label class="control-label">End Time</label>
                                            	
        <select class="form-control" id="appointment_endtime">
            <option value="08:00:00">08:00 am | 8 O'Clock Morning</option>
            <option value="08:30:00">08:30 am | 8 Thirty Morning</option>

            <option value="09:00:00">09:00 am | 9 O'Clock Morning</option>
            <option value="09:30:00">09:30 am | 9 Thirty Morning</option>
            
            <option value="10:00:00" selected="selected">10:00 am | 10 O'Clock Morning</option>
            <option value="10:30:00">10:30 am | 10 Thirty Morning</option>
            
            <option value="11:00:00">11:00 am | 11 O'Clock Morning</option>
            <option value="11:30:00">11:30 am | 11 Thirty Morning</option>

            <option value="12:00:00">12:00 pm | 12 O'Clock Afternoon</option>
            <option value="12:30:00">12:30 am | 12 Thirty Morning</option>

            <option value="13:00:00">01:00 pm | 1 O'Clock Afternoon</option>
            <option value="13:30:00">01:30 am | 1 Thirty Morning</option>

            <option value="14:00:00">02:00 pm | 2 O'Clock Afternoon</option>
            <option value="14:30:00">02:30 am | 2 Thirty Morning</option>

            <option value="15:00:00">03:00 pm | 3 O'Clock Afternoon</option>
            <option value="15:30:00">03:30 am | 3 Thirty Morning</option>

            <option value="16:00:00">04:00 pm | 4 O'Clock Evening</option>
            <option value="16:30:00">04:30 am | 4 Thirty Morning</option>

            <option value="17:00:00">05:00 pm | 5 O'Clock Evening</option>
            <option value="17:30:00">05:30 am | 5 Thirty Morning</option>

            <option value="18:00:00">06:00 pm | 6 O'Clock Evening</option>
            <option value="18:30:00">06:30 am | 6 Thirty Morning</option>

            <option value="00:00:00">After Hours</option>

        </select>
                                                
                                            </div>

                                        	<div class="form-group">
                                            <label  class="control-label">Appointment Notes</label>
                                            	<input id="appointment_notes" class="form-control" type="text" value="" />
                                            </div>

                                        </div>
                                        
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button id="create_prospect_dlrappt" type="button"  data-dismiss="modal" class="btn btn-primary">Make Appointment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



<div class="modal inmodal" id="taskModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Set A New Task</h4>
                                            <small class="font-bold">This is a prospect dealer your about to make task on what to do regarding this dealer, remind yourself to do something.</small>
                                        </div>
                                        <div class="modal-body">
                                        
                                        
                                        
                                        <h3>Prospect Dealer Tasks</h3>
                                        
                                        
                                        <div class="row">
                                        	<div class="form-group">
                                            <label class="control-label">Enter Your Task:</label>
                                          	<input id="enter_dlrprospect_task" class="form-control" type="text" value="" />
                                            </div>
                                        	<div class="form-group">
                                            <label class="control-label">Date Due For Your Task?</label>
                                          	<select id="pick_dlrprospect_task_time" class="form-control">
<?php if(date('D', strtotime($time_now.'+1 hour')) != 'Sun'){ ?>                                       
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+1 hour'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+0 hour')); ?></option>
<?php } ?>
                                            
<?php if(date('D', strtotime($time_now.'+1 day')) != 'Sun'){ ?>                                       
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+1 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+1 day')); ?></option>
<?php } ?>

<?php if(date('D', strtotime($time_now.'+2 day')) != 'Sun'){ ?>                                       
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+2 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+2 day')); ?></option>
<?php } ?>

<?php if(date('D', strtotime($time_now.'+3 day')) != 'Sun'){ ?>                                            
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+3 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+3 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+4 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+4 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+4 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+5 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+5 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+5 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+6 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+6 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+6 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+7 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+7 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+7 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+8 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+8 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+8 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+9 day')) != 'Sun'){ ?>

                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+9 day'));  ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+9 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+10 day')) != 'Sun'){ ?>                                            
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+10 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+10 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+11 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+11 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+11 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+12 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+12 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+12 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+13 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+13 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+13 day')); ?></option>
<?php } ?>
<?php if(date('D', strtotime($time_now.'+14 day')) != 'Sun'){ ?>
                                        	<option value="<?php echo date('Y-m-d', strtotime($time_now.'+14 day')); ?>"><?php echo date('D\,\ M \t\h\e dS', strtotime($time_now.'+14 day')); ?></option>
<?php } ?>
                                        	<option value="99999">Open Request</option>
                                            </select>
                                            </div>

                                        	<div class="form-group">
                                            <label class="control-label">Time Due For Your Task?</label>
                                          	<select id="pick_dlrprospect_task_date" class="form-control">
            <option value="08:00:00">08:00 am | 8 O'Clock Morning</option>
            <option value="08:30:00">08:30 am | 8 Thirty Morning</option>

            <option value="09:00:00">09:00 am | 9 O'Clock Morning</option>
            <option value="09:30:00">09:30 am | 9 Thirty Morning</option>
            
            <option value="10:00:00" selected="selected">10:00 am | 10 O'Clock Morning</option>
            <option value="10:30:00">10:30 am | 10 Thirty Morning</option>
            
            <option value="11:00:00">11:00 am | 11 O'Clock Morning</option>
            <option value="11:30:00">11:30 am | 11 Thirty Morning</option>

            <option value="12:00:00">12:00 pm | 12 O'Clock Afternoon</option>
            <option value="12:30:00">12:30 am | 12 Thirty Morning</option>

            <option value="13:00:00">01:00 pm | 1 O'Clock Afternoon</option>
            <option value="13:30:00">01:30 am | 1 Thirty Morning</option>

            <option value="14:00:00">02:00 pm | 2 O'Clock Afternoon</option>
            <option value="14:30:00">02:30 am | 2 Thirty Morning</option>

            <option value="15:00:00">03:00 pm | 3 O'Clock Afternoon</option>
            <option value="15:30:00">03:30 am | 3 Thirty Morning</option>

            <option value="16:00:00">04:00 pm | 4 O'Clock Evening</option>
            <option value="16:30:00">04:30 am | 4 Thirty Morning</option>

            <option value="17:00:00">05:00 pm | 5 O'Clock Evening</option>
            <option value="17:30:00">05:30 am | 5 Thirty Morning</option>

            <option value="18:00:00">06:00 pm | 6 O'Clock Evening</option>
            <option value="18:30:00">06:30 am | 6 Thirty Morning</option>

            <option value="00:00:00">After Hours</option>
                                            </select>
                                            </div>

                                        </div>
                                        
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button id="create_prospect_dlrtask" type="button" class="btn btn-primary" data-dismiss="modal">Create Task</button>
                                        </div>
                                    </div>
                                </div>
                            </div>





                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Dealer Info</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"> Staff Info</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3">Notes</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-4">Vehicles</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-5">Add Vehicle</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-6">Dealer Package</a></li>
							<li class=""><a data-toggle="tab" href="#tab-7">Geo Location</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">


<div id="dealer_prospect_form">
<div class="form-horizontal">
                            
                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Name:</label>

                                    <div class="col-sm-10"><input id="company" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['company']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>


                            
                                <div class="form-group"><label for="company_legalname" class="col-sm-2 control-label">Company Legal Name:</label>

                                    <div class="col-sm-10"><input id="company_legalname" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['company_legalname']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Primary Business Model:</label>

                                    <div class="col-sm-10">
    <select id="dealer_type_id" class="form-control">
      <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dealer_type_id']))) {echo "selected=\"selected\"";} ?>>Select Dealer Type</option>
      <?php
do {  
?>
<option value="<?php echo $row_qry_dlrtypes['dtype_id']?>"<?php if (!(strcmp($row_qry_dlrtypes['dtype_id'], $row_query_dlrprospect['dealer_type_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_qry_dlrtypes['dtype_label']?></option>
      <?php
} while ($row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes));
  $rows = mysqli_num_rows($qry_dlrtypes);
  if($rows > 0) {
      mysqli_data_seek($qry_dlrtypes, 0);
	  $row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes);
  }
?>
    </select>
                                    <span class="help-block m-b-none">Best description of your finance model.</span>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Dealership Still Open Doing Business:</label>

                                    <div class="col-sm-10">
<select id="dealer_stillopenclose" class="form-control">
<option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['dealer_stillopenclose']))) {echo "selected=\"selected\"";} ?>>Yes</option>
<option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['dealer_stillopenclose']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>


                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>



                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Main Phone Number#:</label>

                                    <div class="col-sm-10"><input id="phone" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['phone']; ?>" data-mask="(999)999-9999"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Fax:</label>

                                    <div class="col-sm-10"><input id="fax" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['fax']; ?>" data-mask="(999)999-9999"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Address</label>

                                    <div class="col-sm-10"><input id="address" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['address']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company City</label>

                                    <div class="col-sm-10"><input id="city" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['city']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>





                                <div class="form-group"><label class="col-sm-2 control-label">Company State:</label>

                                    <div class="col-sm-10">
                                    <select id="state" class="form-control m-b">
<?php do {  ?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_query_dlrprospect['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
<?php
} while ($row_states = mysqli_fetch_array($states));
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






                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Zip Code:</label>

                                    <div class="col-sm-10"><input id="zip" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['zip']; ?>" data-mask="99999"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Primary Finance Company Name:</label>

                                    <div class="col-sm-10"><input id="finance_primary_name" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['finance_primary_name']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Website URL <small>i.e yahoo.com<br />(no - www. or htttp:// or https:// only url):</small></label>

                                    <div class="col-sm-10"><input id="website" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['website']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            






                            
                                <div class="form-group"><label class="col-sm-2 control-label">Dealer Slogan</label>

                                    <div class="col-sm-10"><input id="slogan" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['slogan']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>


                            

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Dealer Disclaimer</label>

                                    <div class="col-sm-10"><input id="disclaimer" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['disclaimer']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Very Good Credit<br /> (720 - 850)</label>

                                    <div class="col-sm-10"><input id="newmatrixcredit_vgoodcredit" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_vgoodcredit']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Good Credit<br /> (675 - 719)</label>

                                    <div class="col-sm-10"><input id="newmatrixcredit_jgoodcredit" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_jgoodcredit']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Fair Credit  <br />(621 - 674)</label>

                                    <div class="col-sm-10"><input id="newmatrixcredit_faircredit" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_faircredit']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Poor Credit <br />(575 - 620)</label>

                                    <div class="col-sm-10"><input id="newmatrixcredit_poorcredit" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_poorcredit']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Slow Credit <br />(Below - 575)</label>

                                    <div class="col-sm-10"><input id="newmatrixcredit_subprime" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_subprime']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Credit Unkown  No Credit <br />(0 - ?) I am not sure</label>

                                    <div class="col-sm-10"><input id="newmatrixcredit_unknown" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_unknown']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Very Good Credit:<br />(720-850)</label>

                                    <div class="col-sm-10"><input id="usedmatrixcredit_vgoodcredit" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_vgoodcredit']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Good Credit:<br /> (675  - 719)</label>

                                    <div class="col-sm-10"><input id="usedmatrixcredit_jgoodcredit" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_jgoodcredit']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Fair Credit:<br /> (621  - 674)</label>

                                    <div class="col-sm-10"><input id="usedmatrixcredit_faircredit" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_faircredit']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Poor Credit:<br /> (575  - 620)</label>

                                    <div class="col-sm-10"><input id="usedmatrixcredit_poorcredit" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_poorcredit']; ?>" data-mask="99.9"></div>
                                </div>


                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Slow Credit:<br /> (Below  - 575)</label>

                                    <div class="col-sm-10"><input id="usedmatrixcredit_subprime" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_subprime']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used No Credit:<br /> (0 - ?) I am not sure:</label>

                                    <div class="col-sm-10"><input id="usedmatrixcredit_unknown" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_unknown']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Slow Credit:<br /> (575  - 620):</label>

                                    <div class="col-sm-10"><input id="usedmatrixcredit_subprime" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_subprime']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used No Credit:<br /> (0 - ?) I am not sure:</label>

                                    <div class="col-sm-10"><input id="usedmatrixcredit_unknown" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_unknown']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Default APR:</label>

                                    <div class="col-sm-10"><input id="settingDefaultAPR" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingDefaultAPR']; ?>" data-mask="99.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Default Month Terms:</label>

                                    <div class="col-sm-10"><input id="settingDefaultTerm" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingDefaultTerm']; ?>" data-mask="99"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Default Sales Tax: (i.e if 6% = 6.0)</label>

                                    <div class="col-sm-10"><input id="settingSateSlsTax" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingSateSlsTax']; ?>"  data-mask="9.9"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Doc &amp; Delivery Fee:</label>

                                    <div class="col-sm-10"><input id="settingDocDlvryFee" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingDocDlvryFee']; ?>" data-mask="999.99"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Title Fee</label>

                                    <div class="col-sm-10"><input id="settingTitleFee" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingTitleFee']; ?>" data-mask="99.99"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">State Inspection Fee</label>

                                    <div class="col-sm-10"><input id="settingStateInspectnFee" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingStateInspectnFee']; ?>" data-mask="99.99"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
        

                            
                                <div class="form-group"><label for="craigslist_nickname" class="col-sm-2 control-label">Craigslist Nickname Or Bird Dog Name Source:</label>

                                    <div class="col-sm-10"><input id="craigslist_nickname" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['craigslist_nickname']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>


                 
                                <div class="form-group"><label class="col-sm-2 control-label">Show Pricing on Website</label>

                                    <div class="col-sm-10">
                                    <select id="showPricing" class="form-control">
                                      <option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['showPricing']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['showPricing']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Show Mileage on Website</label>

                                    <div class="col-sm-10">
                                    <select id="showMileage" class="form-control">
                                      <option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['showMileage']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['showMileage']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>



                            
                                <div class="form-group"><label class="col-sm-2 control-label">Show Price On Website?</label>

                                    <div class="col-sm-10">

                                    <select id="dealer_listingindex_displayprice" class="form-control">
                                      <option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['dealer_listingindex_displayprice']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['dealer_listingindex_displayprice']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>

                                    
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>








                                
                                
                                
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Dealers Email & Password</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">Go!</button> </span> <input type="text" class="form-control" id="prospect_dealer_email" placeholder="Dealer Email" value="<?php echo $row_query_dlrprospect['email']; ?>">
                                        </div>
                                        <div class="input-group"><input type="text" class="form-control" id="prospect_dealer_password" placeholder="Enter Password" value="<?php echo $row_query_dlrprospect['password']; ?>"> <span class="input-group-btn" > <button type="button" class="btn btn-primary">Go!
                                        </button> </span></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="button">Cancel</button>
                                        <button type="button" id="bringup_finalactions" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save Dealer Info</button>
                                    </div>
                                </div>
                            </div>
</div>




                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                   
                                   
                                   <h1>Staff Info</h1>
								   
								   <div id="dealer_staff_prospect_form">
								   <div class="form-horizontal">





                            
                                <div class="form-group"><label for="contact" class="col-sm-2 control-label">#1 Decision Makers Name:</label>

                                    <div class="col-sm-10"><input id="contact" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['contact']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label for="contact_title" class="col-sm-2 control-label">#1 Decision Makers Position Title:</label>

                                    <div class="col-sm-10">
                                    <select id="contact_title" type="text" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['contact_title']))) {echo "selected=\"selected\"";} ?>>Select Postion Title</option>
    <option value="Owner" <?php if (!(strcmp("Owner", $row_query_dlrprospect['contact_title']))) {echo "selected=\"selected\"";} ?>>Owner</option>
    <option value="GM" <?php if (!(strcmp("GM", $row_query_dlrprospect['contact_title']))) {echo "selected=\"selected\"";} ?>>GM</option>
    <option value="Manager" <?php if (!(strcmp("Manager", $row_query_dlrprospect['contact_title']))) {echo "selected=\"selected\"";} ?>>Manager</option>
    <option value="Other" <?php if (!(strcmp("Other", $row_query_dlrprospect['contact_title']))) {echo "selected=\"selected\"";} ?>>Other</option>
                                    </select>
                                    
                                    
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                            
                                <div class="form-group"><label class="col-sm-2 control-label">#1 Decision Makers Phone Number:</label>

                                    <div class="col-sm-10"><input id="contact_phone" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['contact_phone']; ?>" data-mask="(999)999-9999"></div>
                                </div>


                                <div class="hr-line-dashed"></div>
                            
                                <div class="form-group"><label class="col-sm-2 control-label">#1 Decision Makers Mobile Carrier:</label>

                                  <div class="col-sm-10">
                                  <select id="contact_mobilecarrier_id" type="text" class="form-control"{>
                                    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['contact_mobilecarrier_id']))) {echo "selected=\"selected\"";} ?>>Select Carrier</option>
                                    <?php
do {  
?>
                                    <option value="<?php echo $row_mobile_carriers['carrier_id']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_id'], $row_query_dlrprospect['contact_mobilecarrier_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?></option>
                                    <?php
} while ($row_mobile_carriers = mysqli_fetch_array($mobile_carriers));
  $rows = mysqli_num_rows($mobile_carriers);
  if($rows > 0) {
      mysqli_data_seek($mobile_carriers, 0);
	  $row_mobile_carriers = mysqli_fetch_array($mobile_carriers);
  }
?>
  </select>
                                  </div>
                                </div>

                                <div class="hr-line-dashed"></div>






                            
                                <div class="form-group"><label class="col-sm-2 control-label">#1 Decision Makers Phone Type:</label>

                                    <div class="col-sm-10">



<select name="contact_phone_type" id="contact_phone_type" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Select Phone Type</option>
    <option value="Mobile" <?php if (!(strcmp("Mobile", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Mobile</option>
    <option value="Work" <?php if (!(strcmp("Work", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Work</option>
    <option value="Other" <?php if (!(strcmp("Other", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Other</option>
  </select>






                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">#2 Decision Maker Name:</label>

                                    <div class="col-sm-10"><input id="dmcontact2" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dmcontact2']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>



                            
                                <div class="form-group"><label for="dmcontact2_title" class="col-sm-2 control-label">#2 Decision Makers Position Title:</label>

                                    <div class="col-sm-10">
                                    <select id="dmcontact2_title" type="text" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dmcontact2_title']))) {echo "selected=\"selected\"";} ?>>Select Postion Title</option>
    <option value="Owner" <?php if (!(strcmp("Owner", $row_query_dlrprospect['dmcontact2_title']))) {echo "selected=\"selected\"";} ?>>Owner</option>
    <option value="GM" <?php if (!(strcmp("GM", $row_query_dlrprospect['dmcontact2_title']))) {echo "selected=\"selected\"";} ?>>GM</option>
    <option value="Manager" <?php if (!(strcmp("Manager", $row_query_dlrprospect['dmcontact2_title']))) {echo "selected=\"selected\"";} ?>>Manager</option>
    <option value="Other" <?php if (!(strcmp("Other", $row_query_dlrprospect['dmcontact2_title']))) {echo "selected=\"selected\"";} ?>>Other</option>
                                    </select>
                                    
                                    
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">#2 Decision Maker Phone Number:</label>

                                    <div class="col-sm-10"><input id="dmcontact2_phone" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dmcontact2_phone']; ?>" data-mask="(999)999-9999"></div>
                                </div>

                                <div class="hr-line-dashed"></div>








                            
                                <div class="form-group"><label class="col-sm-2 control-label">#2 Decision Maker Phone Type:</label>

                                    <div class="col-sm-10">
<select id="dmcontact2_phone_type" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dmcontact2_phone_type']))) {echo "selected=\"selected\"";} ?>>Select Phone Type</option>
    <option value="Mobile" <?php if (!(strcmp("Mobile", $row_query_dlrprospect['dmcontact2_phone_type']))) {echo "selected=\"selected\"";} ?>>Mobile</option>
    <option value="Work" <?php if (!(strcmp("Work", $row_query_dlrprospect['dmcontact2_phone_type']))) {echo "selected=\"selected\"";} ?>>Work</option>
    <option value="Other" <?php if (!(strcmp("Other", $row_query_dlrprospect['dmcontact2_phone_type']))) {echo "selected=\"selected\"";} ?>>Other</option>
  </select>
                                    </select>


                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                            
                                <div class="form-group"><label class="col-sm-2 control-label">#2 Decision Makers Mobile Carrier:</label>

                                  <div class="col-sm-10">
                                  <select id="dmcontact2_mobilecarrier_id" type="text" class="form-control"{>
                                    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dmcontact2_mobilecarrier_id']))) {echo "selected=\"selected\"";} ?>>Select Carrier</option>
                                    <?php do {  ?>
<option value="<?php echo $row_mobile_carriers['carrier_id']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_id'], $row_query_dlrprospect['dmcontact2_mobilecarrier_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?></option>
<?php
} while ($row_mobile_carriers = mysqli_fetch_array($mobile_carriers));
  $rows = mysqli_num_rows($mobile_carriers);
  if($rows > 0) {
      mysqli_data_seek($mobile_carriers, 0);
	  $row_mobile_carriers = mysqli_fetch_array($mobile_carriers);
  }
?>
  </select>
                                  </div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Finance Managers Name:</label>

                                    <div class="col-sm-10"><input id="finance" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['finance']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Finance Contact Phone Number:<br />If not phone number move to<br />Finance Company Name^</label>

                                    <div class="col-sm-10"><input id="finance_contact" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['finance_contact']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>



                            
                                <div class="form-group"><label class="col-sm-2 control-label">Finance Contact Email:</label>

                                    <div class="col-sm-10"><input id="finance_contact_email" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['finance_contact_email']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>





                            
                                <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Name:</label>

                                    <div class="col-sm-10"><input id="sales" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['sales']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Mobile Number:</label>

                                    <div class="col-sm-10"><input id="sales_contact" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['sales_contact']; ?>" data-mask="(999)999-9999"></div>
                                </div>

                                <div class="hr-line-dashed"></div>


                            
                                <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Email:</label>

                                    <div class="col-sm-10"><input id="sales_email" type="email" class="form-control" value="<?php echo $row_query_dlrprospect['sales_email']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>





								
								
								
								
								
								
								
								
								



								   
								   </div>
								   </div>








                                   
                                   
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                  



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter Your Notes Below Here <small>Log note to complete</small></h5>
                    </div>
                    <div class="ibox-content">

                        <textarea id="prspct_dlr_lognote_body" cols="5" rows="5" class="form-control"></textarea>

                    </div>
                </div>
              </div>
            </div>






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                                   <div class="row">
									<div class="col-md-12">
                                    	<button id="logg_dealerprospect_note"  class="btn btn-block btn-success" type="button">Log Note</button>
                                    </div>
                                   </div>

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>History Notes And Activity</h5>
                    </div>
                    <div class="ibox-content">

                                   

                       <div class="row">
                        <h3>Completed</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>

                        <div id="log_notes_results" class="col-md-12">


                            <ul class="sortable-list connectList agile-list" id="completed">
        
        <?php do { ?>                            
                                <li class="info-element" id="task<?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_id']; ?>">
                                    <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_body']; ?>
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white"><?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_dude_name']; ?></a>
                                        <i class="fa fa-clock-o"></i> <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_created_at']; ?>
                                    </div>
                                </li>
        <?php } while ($row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes)); ?>
        					</ul>
        
                            










                        </div>
                       </div>

                    </div>
                </div>
              </div>
            </div>

                                        
                                   
                                   
                                   
                                        
                                        
                                        
                                        
                                   
                                </div>
                            </div>
                            <div id="tab-4" class="tab-pane">
                                <div class="panel-body">
                                   
                                   
                                   <h1>Prospect Dealers Inventory</h1>
                                   <div class="ibox-content">



<?php $counter_gridrow = 0; ?>
<table id="mydataTable_prospectv" class="table table-striped table-bordered table-hover dataTable">
<thead>
  <tr>
        <th>Photo / Status</th>
        <th>Stock No</th>
        <th>Year Make Model Trim</th>
        <th>Pricing Down Payment</th>
        <th>Action</th>  
  </tr>
</thead>
<tbody>

<?php if($totalRows_prospect_vehicles != 0): do { ?>
<?php $counter_gridrow++; ?>
  <tr>
    <td id="<?php echo $row_prospect_vehicles['vid']; ?>">
    <?php echo $row_prospect_vehicles['vid']; ?><br />
    <?php if($row_prospect_vehicles['vthubmnail_file_path']): ?>
    
  <?php
  $vthubmnail_file_path = $row_prospect_vehicles['vthubmnail_file_path'];
  
    $vthubmnail_file_path = str_replace("../vehicles/photos", "https://images.autocitymag.com/", "$vthubmnail_file_path");
	
	//$vthubmnail_file_path = $row_sysdealer_vehicles['vthubmnail_file_path'];
?>
    
    
    <img src="<?php echo $vthubmnail_file_path; ?>" width="120px" />
    <?php endif; ?>
    
    
    <p>View <?php echo $row_prospect_vehicles['vphoto_count']; ?> Photos</p></td>
    <td>
	<?php
	if($row_prospect_vehicles['vlivestatus'] == 1){
	echo 'Live';
	}elseif($row_prospect_vehicles['vlivestatus'] == 0){
		echo 'Hold';
	}elseif($row_prospect_vehicles['vlivestatus'] == 9){
		echo 'Sold';
	}else{
		echo $row_prospect_vehicles['vlivestatus'];
	}
	?>
    </td>
    <td>
	<?php echo $row_prospect_vehicles['vyear']; ?> <?php echo $row_prospect_vehicles['vmake']; ?> <?php echo $row_prospect_vehicles['vmodel']; ?> <?php echo $row_prospect_vehicles['vtrim']; ?><br />
    <?php echo $row_prospect_vehicles['vvin']; ?>
    </td>
    <td><?php echo $row_prospect_vehicles['vrprice']; ?><?php echo $row_prospect_vehicles['vspecialprice']; ?><?php echo $row_prospect_vehicles['vdprice']; ?></td>
    <td>
    <p class="btn btn-white"><a href="inventory.edit.php?vid=<?php echo $row_prospect_vehicles['vid']; ?>" target="_blank">Edit</a></p>
    <p class="btn btn-white"><a id="<?php echo $row_prospect_vehicles['vid']; ?>" role="button" class="ldexternal_vehicle_photo">Upload Photos</a></p>
    </td>
  </tr>
    <?php } while ($row_prospect_vehicles = mysqli_fetch_array($prospect_vehicles)); else: ?>
	<tr>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
    	<td>
		<a id="novehicles" role="button" class="ldexternal_vehicle_photo" style="display:none;">Upload Photos</a>
        </td>
    </tr>


<?php endif; ?>
</tbody>
<tfoot>
<tr>
    <th>Photo / Status</th>
    <th>Stock No</th>
    <th>Year Make Model Trim</th>
    <th>Pricing Down Payment</th>
    <th>Action</th>  
</tr>
</tfoot>
</table>







                                   </div>
                                   
                                   
                                </div>
                            </div>
                            <div id="tab-5" class="tab-pane">
                                <div class="panel-body">
                                   
                                   
                                   <h1>Add Inventory Under This Dealer</h1>
                    <div class="ibox-content">

<div class="form-horizontal">
                            <input id="pass_vin_good" type="hidden" value="N">
                            <input id="pass_stock_good" type="hidden" value="N">







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

   				<div id="vehicle_second_part" style="display:block;">                    
          			
                    
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
} while ($row_carYears = mysqli_fetch_array($carYears));
  $rows = mysqli_num_rows($carYears);
  if($rows > 0) {
      mysqli_data_seek($carYears, 0);
	  $row_carYears = mysqli_fetch_array($carYears);
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
                                    <?php do {  ?>
                                    <option value="<?php echo $row_vmakes['make_id']?>"><?php echo $row_vmakes['car_make']?></option>
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
                                        <label for="vbody" class="col-sm-2 control-label">Body Style: </label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
<select id="vbody" name="vbody" class="form-control">
<option value="">Select Body Style</option>
<?php do {  ?>
<option value="<?php echo $row_query_bodystyles['body_style_name']?>"><?php echo $row_query_bodystyles['body_style_name']?></option>
<?php
} while ($row_query_bodystyles = mysqli_fetch_array($query_bodystyles));
  $rows = mysqli_num_rows($query_bodystyles);
  if($rows > 0) {
      mysqli_data_seek($query_bodystyles, 0);
	  $row_query_bodystyles = mysqli_fetch_array($query_bodystyles);
  }
?>
  </select>
											</div>
                                      </div>

                                                            
                                    <div class="hr-line-dashed"></div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="vexterior_color" class="col-sm-2 control-label">Exterior Color: </label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
  <select name="vexterior_color" id="vexterior_color" class="form-control">
    <option value="">Select Color</option>
    <?php do { ?>
    <option value="<?php echo $row_colors_hex['color_hex']?>"><?php echo $row_colors_hex['color_name']?></option>
    <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
  </select>


                                    	</div>
                                    </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                         
                                         <label for="vinterior_color" class="col-sm-2 control-label">Interior Color: </label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                 <select name="vinterior_color" id="vinterior_color" class="form-control">
                   <option value="">Select Color</option>
                   <?php do {  ?>
                   <option value="<?php echo $row_colors_hex['color_hex']?>"><?php echo $row_colors_hex['color_name']?></option>
                   <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
    </select>
                                    	</div>
                                    </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vcustomcolor" class="col-sm-2 control-label">Custom Color:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10"><input id="vcustomcolor" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                    <div class="form-group">
                                        <label for="vtransm" class="col-sm-2 control-label">Transmission:</label>
    
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                            
<select class="form-control m-b" id="vtransm"  name="vtransm">
                    <option value="">Select Transmission</option>
                    <?php do {  ?>
<option value="<?php echo $row_distinct_transm['vtransm']?>"><?php echo $row_distinct_transm['vtransm']?></option>
<?php
} while ($row_distinct_transm = mysqli_fetch_array($distinct_transm));
  $rows = mysqli_num_rows($distinct_transm);
  if($rows > 0) {
      mysqli_data_seek($distinct_transm, 0);
	  $row_distinct_transm = mysqli_fetch_array($distinct_transm);
  }
?>
    </select>
                                           
                                           </div>
                                    </div>                                    





                                    <div class="hr-line-dashed"></div>








                                    <div class="form-group">
                                        <label for="vengine" class="col-sm-2 control-label" placeholder="Example 3.8 L">Engine Description:</label>
    
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                            
                                        <input class="form-control"  id="vengine"  name="vengine" value="" placeholder="i.e., 2.5L DOHC" />
                                           
                                           </div>
                                    </div>                                    


                                <div class="hr-line-dashed"></div>


                                    <div class="form-group">
                                        <label for="vcylinders" class="col-sm-2 control-label">Cylinders: </label>
                                     <div class="col-lg-10 col-md-10 col-sm-10">
                                         <select id="vcylinders" name="vcylinders" class="form-control">
                                            <option value="">Select Cylinders</option>
                                            <option value="3">3 Cylinders</option>
                                            <option value="4">4 Cylinders</option>
                                            <option value="6">6 Cylinders</option>
                                            <option value="8">8 Cylinders</option>
                                            <option value="10">10 Cylinders</option>
                                            <option value="12">12 Cylinders</option>
                                         </select>
                                    </div>
                                    </div>
                                    




                                    <div class="hr-line-dashed"></div>


                                
                                    <div class="form-group">
                                        <label for="vfueltype" class="col-sm-2 control-label">Fuel Type: </label>

                                   <div class="col-lg-10 col-md-10 col-sm-10">
                                    <select id="vfueltype" name="vfueltype" class="form-control">
                                        <option value="" >Select Fuel Type</option>
                                        <option value="Gasoline">Gasoline</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Hybrid">Hybrid</option>
                                        <option value="Electric">Electric</option>
                                     </select>
	                                    </div>
                                    </div>


                                    
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vdoors" class="col-sm-2 control-label">Doors:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                    
                                         <select id="vdoors" class="form-control">
                                            <option value="">Select Doors</option>
                                            <option value="2">2 Door</option>
                                            <option value="3">3 Door</option>
                                            <option value="4">4 Door</option>
                                            <option value="5">5 Door</option>
                                            <option value="6">6 Door</option>

                                         </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                        

                                    <div class="form-group">
                                        <label for="vlivestatus" class="col-lg-2 col-md-2 col-sm-2 control-label">Vehicle Status:</label>
    
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                        <select class="form-control"  id="vlivestatus" >
                                          <option value="0">KEEP ON HOLD</option>
                                          <option value="1">GO LIVE</option>
                                          <option value="9">SOLD!</option>
                                        </select>
                                        </div>
                                    </div>
                                <div class="hr-line-dashed"></div>
    
                                    <div class="form-group">
                                        
                                        <label class="col-sm-2 control-label">Vehicle Condition:</label>
    
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                            
                            <select class="form-control" id="vcondition"  name="vcondition">
                                <option value="" >Select Vehicle Condition</option>
                                <option value="Used">Used</option>
                                <option value="New">New</option>
                                <option value="Trade-In">Trade-In</option>
                                <option value="Salvage">Salvage</option>
                            </select>
                            
                            
                                         </div>
                                    </div>                                    


                                    <div class="hr-line-dashed"></div>








                                <div class="form-group"><label id="vrprice" class="col-sm-2 control-label">Retail Price:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vrprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label id="vspecialprice" class="col-sm-2 control-label">Special Price:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vspecialprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>


                                <div class="form-group"><label id="vdprice" class="col-sm-2 control-label">Downpayment Price:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vdprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>








                                <div class="hr-line-dashed"></div>





                                    




















                </div><!-- End Second Part -->

</div>



                    
                    
                    
                    
                    </div><!-- End ibox contnet-->
                </div>
            </div>
        </div>




</div>





            <div class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Console Results Here</h5>
                        </div>
                        <div id="ajax_vehicle_console_results" class="ibox-content">
    
                        
    
                        </div>
                        <div id="createVehicleResult" class="ibox-content">
    
                        
    
                        </div>
                        
                        
                    </div>
            	</div>
            </div>



















            <div id="transfer_vehicle_view_box" class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>We Have A Record This Vehicle Belongs To Another Dealer</h5>
                        </div>
                        <div class="ibox-content">
    
<div class="row">
    <div class="col-sm-12">
        <button id="create_anyway" class="btn btn-warning btn-block btn-lg dim"><i class="fa fa-car fa-5x"></i> Transfer This Vehicle</button>
    </div>
</div>
    
                        </div>
                    </div>
            	</div>
            </div>





            <div id="add_vehicle_view_box" class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Ready To Go</h5>
                        </div>
                        <div class="ibox-content">





<div class="row">
    <div class="col-sm-12">
        <button id="create_anyway" class="btn btn-primary btn-block btn-lg dim"><i class="fa fa-car fa-5x"></i> Add This Vehicle</button>
    </div>
</div>









                        </div>
                    </div>
            	</div>
            </div>





                    </div><!-- End Ibox For Add Dealers Inventory -->


                                   
                                   
                                </div>
                            </div>

                            <div id="tab-6" class="tab-pane">
                                <div class="panel-body">
                                   
                                   
                                   <h1>Select A Package For This Prospect Dealer</h1>
                                   <div>
									<div class="form-horizontal">

									                        <div class="form-group"><label class="col-sm-2 control-label">What type of WeFinancHere.com Dealer Is This?</label>

                                    <div class="col-sm-10">

<select id="wfh_dealer_type_id" class="form-control">
      <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['wfh_dealer_type_id']))) {echo "selected=\"selected\"";} ?>>Select Dealer Type</option>
      <?php
do {  
?>
<option value="<?php echo $row_qry_dlrtypes['dtype_id']?>"<?php if (!(strcmp($row_qry_dlrtypes['dtype_id'], $row_query_dlrprospect['wfh_dealer_type_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_qry_dlrtypes['dtype_label']?></option>
      <?php
} while ($row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes));
  $rows = mysqli_num_rows($qry_dlrtypes);
  if($rows > 0) {
      mysqli_data_seek($qry_dlrtypes, 0);
	  $row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes);
  }
?>
    </select>


                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Want Live Chat Feature?</label>

                                    <div class="col-sm-10">
                                    <select id="dealer_chat" class="form-control">
                                      <option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['dealer_chat']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['dealer_chat']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>

                                    
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Fuel Pump Display Design</label>

                                    <div class="col-sm-10">
                                    <select id="fuel_pump_display" class="form-control">
                                      <option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['fuel_pump_display']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['fuel_pump_display']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>

                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label for="dcommercial_youtube_onoff" class="col-sm-2 control-label">YouTube Or Video Hosting</label>

                                    <div class="col-sm-10">
                                    <select id="dcommercial_youtube_onoff" class="form-control">
                                      <option value="Y" <?php if (!(strcmp("Y", $row_query_dlrprospect['dcommercial_youtube_onoff']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="N" <?php if (!(strcmp("N", $row_query_dlrprospect['dcommercial_youtube_onoff']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>

                                    
                                    
                                    
                                    
                                    
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Home HTML</label>

                                    <div class="col-sm-10"><input id="home" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['home']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>





                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company About Us HTML</label>

                                    <div class="col-sm-10"><input id="about" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['about']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>



                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Directions HTML</label>

                                    <div class="col-sm-10"><input id="directions" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['directions']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>










                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Contact Us HTML</label>

                                    <div class="col-sm-10"><input id="contactus" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['contactus']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Map URL only</label>

                                    <div class="col-sm-10"><input id="mapurl" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['mapurl']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>








                            
                                <div class="form-group"><label class="col-sm-2 control-label">Google Maps I-Frame</label>

                                    <div class="col-sm-10"><input id="mapframe" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['mapframe']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




























								
								
									</div>
								   </div>
                                   
                                </div>
                            </div>

							<div id="tab-7" class="tab-pane">
                                <div class="panel-body">
                                   
                                   
                                   <h1>Geo Map</h1>
                                   
                                   <div id="">
										<div id="" class="form-horizontal">

										




											<div class="form-group"><label for="metaDescription" class="col-sm-2 control-label">Meta Description</label>

												<div class="col-sm-10"><input id="metaDescription" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['metaDescription']; ?>"></div>
											</div>

											<div class="hr-line-dashed"></div>


											<div class="form-group"><label class="col-sm-2 control-label">Meta Key Words</label>

												<div class="col-sm-10"><input id="metaKeywords" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['metaKeywords']; ?>"></div>
											</div>

											<div class="hr-line-dashed"></div>

															


											<div class="form-group"><label for="dlr_geo_latitude" class="col-sm-2 control-label">Geo Latitude:</label>

												<div class="col-sm-10"><input id="dlr_geo_latitude" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dlr_geo_latitude']; ?>"></div>
											</div>

											<div class="hr-line-dashed"></div>


											<div class="form-group"><label class="col-sm-2 control-label">Geo Longitude:</label>

												<div class="col-sm-10"><input id="dlr_geo_longitude" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dlr_geo_longitude']; ?>" ></div>
											</div>

											<div class="hr-line-dashed"></div>

	
											<div class="form-group"><label class="col-sm-2 control-label">Google Map Success:</label>

												<div class="col-sm-10"><input id="dlr_ok_googlemp" type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dlr_ok_googlemp']; ?>" disabled="disabled"></div>
											</div>

											<div class="hr-line-dashed"></div>
											
											
											
	
											<div class="form-group"><label class="col-sm-2 control-label">Pull Map:</label>

												<div class="col-sm-10">
												<button id="pull_googlemap" type="button" class="btn btn-block btn-info">Pull Google Map</button>
												</div>
											</div>
											
											
											<div class="hr-line-dashed"></div>
									
                                                <div id="data_google_maps_view">
                                                
                                                
                                                
                                                </div>

                                                
											<div class="hr-line-dashed"></div>

                                               <div id="map_ajax_results">
                                               
                                               </div>
									
											<div class="hr-line-dashed"></div>
										
										
										</div>
								   </div>
                                </div>
                            </div>












                        </div><!-- End tab-content -->








                    </div>
                </div>

                            















                </div>
              </div>







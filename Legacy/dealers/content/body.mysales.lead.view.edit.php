

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Lead Assignment And Resolution <small>This section sets the status of this lead.</small></h5>
                        </div>
                        <div class="ibox-content">
<div class="row">
		<div class="col-sm-6 b-r">

<div class="form-horizontal">
									                                    
                                    <div class="hr-line-dashed"></div>

                                <div class="form-group">

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
											<label class="col-sm-8 control-label">Sales Person 1 <?php echo $row_view_thislead['cust_salesperson_id']; ?></label>

                                            <select id="cust_salesperson_id" class="form-control m-b" name="cust_salesperson_id">
              <option value=""  <?php if (!(strcmp("", $row_view_thislead['cust_salesperson_id']))) {echo "selected=\"selected\"";} ?>>Select Salesperson</option>
              <?php
do {  
?>
              <option value="<?php echo $row_true_salesperson['salesperson_id']?>"<?php if (!(strcmp($row_true_salesperson['salesperson_id'], $row_view_thislead['cust_salesperson_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_true_salesperson['salesperson_firstname']?>  <?php echo $row_true_salesperson['salesperson_lastname']?></option>
              <?php
} while ($row_true_salesperson = mysqli_fetch_assoc($true_salesperson));
  $rows = mysqli_num_rows($true_salesperson);
  if($rows > 0) {
      mysqli_data_seek($true_salesperson, 0);
	  $row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
  }
?>
              </select>
											
                                            </div>
                                            <div class="col-md-6">
											<label class="col-sm-8 control-label">Sales Person 2</label>
                                            <select id="cust_salesperson2_id" class="form-control m-b" name="cust_salesperson_id">
              <option value=""  <?php if (!(strcmp("", $row_view_thislead['cust_salesperson2_id']))) {echo "selected=\"selected\"";} ?>>Select Salesperson</option>
              <?php do {  ?>
              <option value="<?php echo $row_true_salesperson['salesperson_id']?>"<?php if (!(strcmp($row_true_salesperson['salesperson_id'], $row_view_thislead['cust_salesperson2_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_true_salesperson['salesperson_firstname']?>  <?php echo $row_true_salesperson['salesperson_lastname']?></option>
              <?php
} while ($row_true_salesperson = mysqli_fetch_assoc($true_salesperson));
  $rows = mysqli_num_rows($true_salesperson);
  if($rows > 0) {
      mysqli_data_seek($true_salesperson, 0);
	  $row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
  }
?>
              </select>
                                            </div>

                                            <div class="col-md-6">
											<label class="col-sm-8 control-label">BDC</label>
                                            <select id="cust_bdc_id" class="form-control m-b" name="cust_bdc_id">
              <option value=""  <?php if (!(strcmp("", $row_view_thislead['cust_bdc_id']))) {echo "selected=\"selected\"";} ?>>Select BDC</option>
              <?php do {  ?>
              <option value="<?php echo $row_true_salesperson['salesperson_id']; ?>"<?php if (!(strcmp($row_true_salesperson['salesperson_id'], $row_view_thislead['cust_bdc_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_true_salesperson['salesperson_firstname']?> <?php echo $row_true_salesperson['salesperson_lastname']?></option>
              <?php
} while ($row_true_salesperson = mysqli_fetch_assoc($true_salesperson));
  $rows = mysqli_num_rows($true_salesperson);
  if($rows > 0) {
      mysqli_data_seek($true_salesperson, 0);
	  $row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
  }
?>
              </select>
                                            </div>






                                            <div class="col-md-6">
											<label class="col-sm-8 control-label">Manager</label>
                                            <select id="cust_mgr_id" class="form-control m-b" name="cust_mgr_id">
              <option value=""  <?php if (!(strcmp("", $row_view_thislead['cust_mgr_id']))) {echo "selected=\"selected\"";} ?>>Select Manager</option>
              <?php if($totalRows_managers != 0):     do {  ?>
              <option value="<?php echo $row_managers['manager_id']; ?>"<?php if (!(strcmp($row_managers['manager_id'], $row_view_thislead['cust_mgr_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_managers['manager_firstname']?> <?php echo $row_managers['manager_lastname']?></option>
              <?php
} while ($row_managers = mysqli_fetch_assoc($managers));
  $rows = mysqli_num_rows($managers);
  if($rows > 0) {
      mysqli_data_seek($managers, 0);
	  $row_managers = mysqli_fetch_assoc($managers);
  }
endif; ?>
              </select>
                                            </div>




                                        </div>
                                    </div>
                                
                                </div>

								<div class="form-group">
                                    <div class="col-sm-12 col-sm-offset-2">
                                    </div>
                                </div>                                    
</div>


        
        </div>
		<div class="col-sm-6">


        	<div class="row">
            	<div class="col-sm-12">



								
                                    


                                <div class="form-group"><label class="col-sm-8 control-label" for="cust_close_status">Closing Status:</label>

                                    <div class="col-sm-12">
                                    	<label class="checkbox-inline i-checks"> 
                                    		<input id="cust_close_status_0" type="checkbox" value="contacted" <?php if (!(strcmp($row_view_thislead['cust_close_status_0'],"contacted"))) {echo "checked=\"checked\"";} ?>> Contacted </label>
                                        <label class="checkbox-inline i-checks"> 
                                        	<input id="cust_close_status_1" type="checkbox" value="storevisit" <?php if (!(strcmp($row_view_thislead['cust_close_status_1'],"storevisit"))) {echo "checked=\"checked\"";} ?>> Store Visit </label>
                                        <label class="checkbox-inline i-checks"> 
                                        	<input id="cust_close_status_2" type="checkbox" value="demo" <?php if (!(strcmp($row_view_thislead['cust_close_status_2'],"demo"))) {echo "checked=\"checked\"";} ?>> Demo </label>
                                        <label class="checkbox-inline i-checks"> 
                                        	<input id="cust_close_status_3" type="checkbox" value="writeup" <?php if (!(strcmp($row_view_thislead['cust_close_status_3'],"writeup"))) {echo "checked=\"checked\"";} ?>> Write Up </label>
                                        <label class="checkbox-inline i-checks"> 
                                        	<input id="cust_close_status_4" type="checkbox" value="fi" <?php if (!(strcmp($row_view_thislead['cust_close_status_4'],"fi"))) {echo "checked=\"checked\"";} ?>> F&amp;I </label>


<input id="cust_close_strarrays" type="hidden" value="<?php echo $row_view_thislead['cust_close_status_0']; ?>">
                                        
                                        </div>
                                        
                                       
                                </div>

<div class="hr-line-dashed"></div>
        
                </div>
            </div>
            <div class="row">
            	<div class="col-sm-12">
<br />


<div class="col-sm-12">

<label class="col-sm-8 control-label">Purchase Type:</label>

<select class="form-control m-b" name="cust_finance_type" id="cust_finance_type">
      <option value="" <?php if (!(strcmp("", $row_view_thislead['cust_finance_type']))) {echo "selected=\"selected\"";} ?>>Unknown</option>
      <option value="finance" <?php if (!(strcmp("finance", $row_view_thislead['cust_finance_type']))) {echo "selected=\"selected\"";} ?>>Bank Finance</option>
      <option value="cash" <?php if (!(strcmp("cash", $row_view_thislead['cust_finance_type']))) {echo "selected=\"selected\"";} ?>>Cash & Carry</option>
      <option value="bhph" <?php if (!(strcmp("bhph", $row_view_thislead['cust_finance_type']))) {echo "selected=\"selected\"";} ?>>BHPH - Inhouse</option>
      <option value="lease" <?php if (!(strcmp("lease", $row_view_thislead['cust_finance_type']))) {echo "selected=\"selected\"";} ?>>Lease / Rent To Own</option>
      <option value="ballon" <?php if (!(strcmp("ballon", $row_view_thislead['cust_finance_type']))) {echo "selected=\"selected\"";} ?>>Ballon</option>
      <option value="misc" <?php if (!(strcmp("misc", $row_view_thislead['cust_finance_type']))) {echo "selected=\"selected\"";} ?>>Misc</option>
    </select>

</div>




<div class="col-sm-12">

<label class="col-sm-8 control-label">Reason Lost:</label>

<select class="form-control m-b" name="cust_lostcode" id="cust_lostcode">
      <option value="" <?php if (!(strcmp("", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Other</option>
      <option value="decidedtowait" <?php if (!(strcmp("decidedtowait", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Decided To Wait</option>
      <option value="badcredit" <?php if (!(strcmp("badcredit", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Bad Credit</option>
      <option value="submitdenied" <?php if (!(strcmp("submitdenied", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Sumbited/Denied</option>
      <option value="negativeequity" <?php if (!(strcmp("negativeequity", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Negative Equity</option>
      <option value="vehicleunavilable" <?php if (!(strcmp("vehicleunavilable", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Vehicle Unavailable</option>
      <option value="noresponse" <?php if (!(strcmp("noresponse", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>No Response</option>
      <option value="nothingcanbedone" <?php if (!(strcmp("nothingcanbedone", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Nothing Else Can Be Done</option>
      <option value="boughtelsewhere" <?php if (!(strcmp("boughtelsewhere", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Bought Elsewhere</option>
      <option value="rcvdbadinfo" <?php if (!(strcmp("rcvdbadinfo", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Received Bad Information</option>
      <option value="openautoloan" <?php if (!(strcmp("openautoloan", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Open Auto Loan(s)</option>
      <option value="highmonthlypayment" <?php if (!(strcmp("highmonthlypayment", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>High Monthly Payment</option>
      <option value="downpaymentissue" <?php if (!(strcmp("downpaymentissue", $row_view_thislead['cust_lostcode']))) {echo "selected=\"selected\"";} ?>>Downpayment Issue</option>
    </select>

</div>




<br />                        

                </div>
            </div>





        </div>
</div>




                        </div>
                    </div>
                </div>
            </div>





            <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lead <small>Contact Information</small></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r"><h4 class="">Contact Information</h4>
                                <p>Sign in today for more experience.</p>
                                
                                <div class="hr-line-dashed"></div>
                                


<div class="form-group">
<label class="col-sm-2 control-label">Title:</label>

                                    <div class="col-sm-10">
<select class="form-control m-b" name="cust_titlename" id="cust_titlename">
      <option value="" <?php if (!(strcmp("", $row_view_thislead['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Select</option>
      <option value="Mr." <?php if (!(strcmp("Mr.", $row_view_thislead['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
      <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_view_thislead['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
      <option value="Miss." <?php if (!(strcmp("Miss.", $row_view_thislead['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Miss.</option>
      <option value="Dr." <?php if (!(strcmp("Dr.", $row_view_thislead['cust_titlename']))) {echo "selected=\"selected\"";} ?>>Dr.</option>
    </select>
    									</div>
</div>


    <div class="form-group"><label>First Name</label> <input id="cust_fname" type="text" placeholder="First Name" class="form-control" value="<?php echo $row_view_thislead['cust_fname']; ?>"></div>

    <div class="form-group"><label>Middle Name</label> <input id="cust_mname" type="text" placeholder="First Name" class="form-control" value="<?php echo $row_view_thislead['cust_mname']; ?>"></div>

    
    <div class="form-group"><label>Last Name</label> <input id="cust_lname" type="text" placeholder="Last Name" class="form-control" value="<?php echo $row_view_thislead['cust_lname']; ?>"></div>
    

    
    <div class="form-group"><label class="col-sm-2 control-label">Suffix</label> 
    	<div class="col-sm-10 m-b">
    	<input id="cust_name_suffix" type="text" placeholder="Suffix" class="form-control" value="<?php echo $row_view_thislead['cust_name_suffix']; ?>">
       	</div>
    </div>




                            </div>
                            <div class="col-sm-6"><h4>ID Check?</h4>
                                <p>Lead Contact Information</p>


                                <div class="hr-line-dashed"></div>

<div class="form-horizontal">
                                <div class="form-group"><label class="col-lg-2 control-label">Nick Name</label>

                                    <div class="col-lg-10"><input id="cust_nickname" type="text" placeholder="Nick Name" class="form-control" value="<?php echo $row_view_thislead['cust_nickname']; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Source</label>

                                    <div class="col-lg-10">
                                    <input id="cust_lead_source" type="text" placeholder="Lead Came From?" class="form-control" value="<?php echo $row_view_thislead['cust_lead_source']; ?>">
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Sex:</label>

                                    <div class="col-sm-10"><label class="checkbox-inline"> <input <?php if (!(strcmp($row_view_thislead['cust_lead_sex'],"M"))) {echo "checked=\"checked\"";} ?> type="radio"  name="lead_sex" id="lead_sex_0" value="M">Male </label>
                                        <label class="checkbox-inline"> <input <?php if (!(strcmp($row_view_thislead['cust_lead_sex'],"F"))) {echo "checked=\"checked\"";} ?> type="radio"  name="lead_sex" id="lead_sex_1" value="F">Female </label>
                                        </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <div class="timeago"><?php echo $row_view_thislead['cust_lead_created_at']; ?></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                
                            
                            </div>                                
                                
                                
                                
                            </div>
                        </div>
                    
                    
                    	<div class="row">


    
    <div class="form-group">
    	<div class="row">
        <div class="col-lg-12" align="center">
        <button id="save_lead" class="btn btn-lg btn-primary m-t-n-xs" type="button"><strong>Save</strong></button>
        </div>
        </div>
    </div>



                        
                        </div>
                    
                    </div>
                </div>
            </div>
            
            
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Contact Information</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                                
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-lg-2 control-label">Home:</label>

                                    <div class="col-lg-10"><input id="cust_homephone" type="text" placeholder="Home Phone" class="form-control" value="<?php echo $row_view_thislead['cust_homephone']; ?>" data-mask="(999) 999-9999"></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label" for="cust_mobilephone">Mobile:</label>

                                    <div class="col-lg-10"><input id="cust_mobilephone" type="text" placeholder="Mobile Phone" class="form-control" value="<?php echo $row_view_thislead['cust_mobilephone']; ?>" data-mask="(999) 999-9999"></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label" for="cust_workphone">Work:</label>

                                    <div class="col-lg-10"><input id="cust_workphone" type="text" placeholder="Work Phone" class="form-control" value="<?php echo $row_view_thislead['cust_workphone']; ?>" data-mask="(999) 999-9999"></div>
                                </div>


                                <div class="form-group"><label class="col-lg-2 control-label" for="cust_email">Email:</label>

                                    <div class="col-lg-10"><input id="cust_email" type="text" placeholder="Email" class="form-control" value="<?php echo $row_view_thislead['cust_email']; ?>"></div>
                                </div>
                            
                                <div class="hr-line-dashed"></div>
                                
	<div class="form-group">
	<label class="col-sm-4 control-label">Timeframe Delivey</label>
	
	 <div class="col-sm-8">
	    <select class="form-control m-b" name="cust_close_range" id="cust_close_range">
	      <option value="24 Hours" <?php if (!(strcmp("24 Hours", $row_view_thislead['cust_close_range']))) {echo "selected=\"selected\"";} ?>>24 Hours</option>
	      <option value="36 Hours" <?php if (!(strcmp("36 Hours", $row_view_thislead['cust_close_range']))) {echo "selected=\"selected\"";} ?>>36 Hours</option>
	      <option value="07 Days" <?php if (!(strcmp("07 Days", $row_view_thislead['cust_close_range']))) {echo "selected=\"selected\"";} ?>>07 Days</option>
	      <option value="14 Days" <?php if (!(strcmp("14 Days", $row_view_thislead['cust_close_range']))) {echo "selected=\"selected\"";} ?>>14 Days</option>
	      <option value="30 Days" <?php if (!(strcmp("30 Days", $row_view_thislead['cust_close_range']))) {echo "selected=\"selected\"";} ?>>30 Days</option>
	      <option value="60 Days" <?php if (!(strcmp("60 Days", $row_view_thislead['cust_close_range']))) {echo "selected=\"selected\"";} ?>>60 Days</option>
	    </select>
	 </div>
	</div>
	                                

	<div class="form-group">
	<label class="col-sm-4 control-label">Temperature</label>
	
	 <div class="col-sm-8">
	    <select class="form-control m-b" name="cust_lead_temperature" id="cust_lead_temperature">
	      <option value="Hot" <?php if (!(strcmp("Hot", $row_view_thislead['cust_lead_temperature']))) {echo "selected=\"selected\"";} ?>>Hot</option>
	      <option value="Warm" <?php if (!(strcmp("Warm", $row_view_thislead['cust_lead_temperature']))) {echo "selected=\"selected\"";} ?>>Warm</option>
	      <option value="Cold" <?php if (!(strcmp("Cold", $row_view_thislead['cust_lead_temperature']))) {echo "selected=\"selected\"";} ?>>Cold</option>
	      <option value="Frozen" <?php if (!(strcmp("Frozen", $row_view_thislead['cust_lead_temperature']))) {echo "selected=\"selected\"";} ?>>Frozen</option>
	    </select>
	 </div>
	</div>
                                
                                




                            
                            </div>
                        </div>
                    </div>
                </div>
            
            


                
                
        
            
            
            
            </div>



            <div class="row">
                <div class="col-lg-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Address Information</h5>

                        </div>
                        <div class="ibox-content">
                        
                            <div class="form-horitzontal">                        
<div class="row">

	<div class="col-lg-4 col-md-4 col-sm-4">                        

                                <div class="form-group">
                                <label for="cust_home_address" class="">Street address</label><br />
                                    <input type="text" placeholder="Street Address" id="cust_home_address" class="form-control" value="<?php echo $row_view_thislead['cust_home_address']; ?>"></div>
     </div>
	<div class="col-lg-4 col-md-4 col-sm-4">                        

                                <div class="form-group">
                                <label for="cust_home_address2" class="">Street address2</label><br />
                                    <input type="text" placeholder="Street Address2" id="cust_home_address2" class="form-control" value="<?php echo $row_view_thislead['cust_home_address2']; ?>"></div>
     </div>

	<div class="col-lg-3 col-md-3 col-sm-3">
                                    
                                <div class="form-group"><label for="cust_home_city" class="">City</label>
                                    <input type="text" placeholder="City" id="cust_home_city" class="form-control" value="<?php echo $row_view_thislead['cust_home_city']; ?>"></div>
    </div>

</div>
<div class="row">

	<div class="col-lg-4 col-md-3 col-sm-3">
                                    
                                <div class="form-group"><label for="cust_home_state" class="">State</label>
                                    <select class="form-control m-b" id="cust_home_state" name="cust_home_state">
    <?php
if($row_view_thislead['cust_home_state']){$lead_state = $row_view_thislead['cust_home_state'];}else{$lead_state = $row_userDets['state'];}
do {  
?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $lead_state))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
    <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
  </select></div>
    </div>

	<div class="col-lg-4 col-md-3 col-sm-3">
         <div class="form-group"><label for="cust_home_zip" class="">Zip</label>
               <input type="text" placeholder="Zip" id="cust_home_zip" class="form-control" value="<?php echo $row_view_thislead['cust_home_zip']; ?>" data-mask="99999">
         </div>                                                               
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3">
         <div class="form-group"><label for="cust_home_county" class="">County</label>
               <input type="text" placeholder="County" id="cust_home_county" class="form-control" value="<?php echo $row_view_thislead['cust_home_county']; ?>">
         </div>                                                               
	</div>
    
    
    
</div>


<div class="row">
	<div class="col-md-4">
                                  <div class="checkbox m-l m-r-xs"><label class="i-checks"><br /> <input id="us_country" type="checkbox" value="USA" checked><i></i> United States </label></div>

    </div>
  	<div class="col-md-4">
                                  <div class="checkbox m-l m-r-xs"><label class="i-checks"><br /> <input id="cust_home_okgoogle" type="checkbox" value="NO" <?php if( $row_view_thislead['cust_home_okgoogle'] == 'OK'){ echo 'checked';} ?> disabled="disabled"><i></i> Address Status</label></div>

    </div>
   	<div class="col-md-4"><br />
     <button id="form_map" class="btn btn-white" type="button">Check On Map</button>
    </div>
</div>


<div class="row" style="display:none;">
	<div class="col-md-4">
			<label>Latitutde:</label>
			<input id="geo_latitude" type="text" class="form-control" value="<?php echo $row_view_thislead['geo_latitude']; ?>">
            
    </div>
  	<div class="col-md-4">
			<label>Longitutde:</label>
			<input id="geo_longitude" type="text" class="form-control" value="<?php echo $row_view_thislead['geo_longitude']; ?>">
    </div>
</div>



                            </div>

                        </div>
                        
                    </div>
                </div>
                
                
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Address Status Information <small>...</small></h5>

                        </div>
                        <div class="ibox-content">


                                
                                 <div class="form-group">
                                
                                 	<div class="col-sm-12">
                                     <label  class="control-label">Date Of Move In</label>
                                     
                                    <input id="cust_home_live_movindate" class="form-control" placeholder="Date Of Move In" value="<?php echo $row_view_thislead['cust_home_live_movindate']; ?>" data-mask="99/99/9999">
                                    
                                    
                                    
                                        <div class="row">
                                            <div class="col-md-6"><label>Years</label>
                                            

                                    <select class="form-control m-b" id="cust_home_live_years" name="cust_home_live_years">
    <?php do {  ?>
    <option value="<?php echo $row_options_years['year_value']; ?>"<?php if (!(strcmp($row_options_years['year_value'], $row_view_thislead['cust_home_live_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_options_years['year_name']?></option>
    <?php
} while ($row_options_years = mysqli_fetch_assoc($options_years));
  $rows = mysqli_num_rows($options_years);
  if($rows > 0) {
      mysqli_data_seek($options_years, 0);
	  $row_options_years = mysqli_fetch_assoc($options_years);
  }
?>
  </select>

                                            
                                            </div>
                                            <div class="col-md-6"><label>Months</label>


                                    <select class="form-control m-b" id="cust_home_live_months" name="cust_home_live_months">
    <?php
do {  
?>
    <option value="<?php echo $row_options_months['month_value']; ?>"<?php if (!(strcmp($row_options_months['month_value'], $row_view_thislead['cust_home_live_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_options_months['month_name']?></option>
    <?php
} while ($row_options_months = mysqli_fetch_assoc($options_months));
  $rows = mysqli_num_rows($options_months);
  if($rows > 0) {
      mysqli_data_seek($options_months, 0);
	  $row_options_months = mysqli_fetch_assoc($options_months);
  }
?>
  </select>




                                            </div>


                                        </div>
                                    
                                    
                                    </div>
                                 
                                 </div>
                                <div class="hr-line-dashed"></div>
                        <!--Map Results -->
                        
                                    <div class="row">                        
                                        <div class="col-md-12">
                                                    <div id="api_result">
                                    
                                                    </div>
                                        </div>
                                    </div>

                    	<!--End Map Results -->
                    </div>
                </div>
            </div>
        
        
        
        
        
        
        
        </div>




            <div id="map_seeornot" class="row" style="display:none;">


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Customer Address On Map <small>This section displays google map of above address</small></h5>
                        </div>
                        <div class="ibox-content">
                            
                        
                        

<div class="row">                        
	<div class="col-md-12">
                                  
                                <div id="map_canvas">
                                        
                                </div>

                      
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
                            <h5>Employer Information <small>this section belongs to vehicle trade information.</small></h5>
                        </div>
                        
                        <div class="ibox-content">
                        
                        <div class="form-horizontal">
                        
                        
                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Employer Name</label>
                                 	<div class="col-sm-10"><input id="cust_employer_name" class="form-control" value="<?php echo $row_view_thislead['cust_employer_name']; ?>" placeholder="Employer Name">
                                    </div>
                                 
                                 </div>

                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label for="cust_supervisors_name" class="col-sm-2 control-label">Supervisor Name</label>
                                 	<div class="col-sm-10"><input id="cust_supervisors_name" class="form-control" value="<?php echo $row_view_thislead['cust_supervisors_name']; ?>" placeholder="Supervisor Name">
                                    </div>
                                 
                                 </div>

                                 <div class="form-group"><label for="cust_supervisors_phone" class="col-sm-2 control-label">Supervisor Phone</label>
                                 	<div class="col-sm-10"><input id="cust_supervisors_phone" class="form-control" value="<?php echo $row_view_thislead['cust_supervisors_phone']; ?>" placeholder="Supervisor Phone" data-mask="(999) 999-9999">
                                    </div>
                                 
                                 </div>
                                
                                <div class="hr-line-dashed"></div>

                                
                                <div class="form-group">
                                	<label class="col-sm-2 control-label">Employer Address</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><input id="cust_employer_addr" type="text" class="form-control" placeholder="Employer Address 1" value="<?php echo $row_view_thislead['cust_employer_addr1']; ?>"> <span class="input-group-btn"> <button type="button" class="btn btn-primary">Show More
                                        </button> </span>
                                        
                                 	<div class="col-sm-10"><input id="cust_employer_addr2" class="form-control" value="<?php echo $row_view_thislead['cust_employer_addr2']; ?>" placeholder="Employer Address 2">
                                    </div>
                                    
                                        </div>



                                        <div class="row">
                                            <div class="col-md-3"><label>City</label>
                                            <input id="cust_employer_city" type="text" class="form-control" value="<?php echo $row_view_thislead['cust_employer_city']; ?>" placeholder="Employer City">
                                            </div>
                                            <div class="col-md-3"><label>State</label>


                                    <select class="form-control m-b" id="cust_employer_state" name="cust_employer_state">
    <?php
if($row_view_thislead['cust_employer_state']){$lead_state = $row_view_thislead['cust_employer_state'];}else{$lead_state = $row_userDets['state'];}
do {  
?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $lead_state))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
    <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
  </select>




                                            </div>
                                            <div class="col-md-3"><label>Zip</label><input id="cust_employer_zip" type="text" placeholder="Zip" class="form-control" value="<?php echo $row_view_thislead['cust_employer_zip']; ?>" data-mask="99999"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Employer Phone Number</label>
                                 	<div class="col-sm-10"><input id="cust_employer_phone" class="form-control" value="<?php echo $row_view_thislead['cust_employer_phone']; ?>" placeholder="Employer Phone Number" data-mask="(999) 999-9999">
                                    </div>
                                 
                                 </div>
                                




                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group">
                                 <label  class="col-sm-2 control-label">Date Of Hire</label>
                                 	<div class="col-sm-10">
                                    <input id="cust_employer_dateohire" class="form-control" value="<?php echo $row_view_thislead['cust_employer_dateohire']; ?>" placeholder="Date Of Hire" data-mask="99/99/9999">
                                    
                                    
                                    
                                        <div class="row">
                                            <div class="col-md-4"><label>Years</label>
                                            

                                    <select class="form-control m-b" id="cust_employer_years" name="cust_employer_years">
    <?php do {  ?>
    <option value="<?php echo $row_options_years['year_value']?>"<?php if (!(strcmp($row_options_years['year_value'], $row_view_thislead['cust_employer_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_options_years['year_name']?></option>
    <?php
} while ($row_options_years = mysqli_fetch_assoc($options_years));
  $rows = mysqli_num_rows($options_years);
  if($rows > 0) {
      mysqli_data_seek($options_years, 0);
	  $row_options_years = mysqli_fetch_assoc($options_years);
  }
?>
  </select>

                                            
                                            </div>
                                            <div class="col-md-4"><label>Months</label>


                                    <select class="form-control m-b" id="cust_employer_months" name="cust_employer_months">
    <?php do {  ?>
    <option value="<?php echo $row_options_years['year_value']?>"<?php if (!(strcmp($row_options_years['year_value'], $row_view_thislead['cust_home_live_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_options_years['year_name']?></option>
    <?php
} while ($row_options_years = mysqli_fetch_assoc($options_years));
  $rows = mysqli_num_rows($options_years);
  if($rows > 0) {
      mysqli_data_seek($options_years, 0);
	  $row_options_years = mysqli_fetch_assoc($options_years);
  }
?>
  </select>




                                            </div>


                                        </div>
                                    
                                    
                                    </div>
                                 
                                 </div>



                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Gross Income</label>
                                 	<div class="col-sm-10"><input id="cust_gross_income" class="form-control"  placeholder="Gross Income" value="<?php echo $row_view_thislead['cust_gross_income']; ?>"  type="text">
                                    </div>
                                 
                                 </div>



                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Gross Income Frequency</label>
                                 	<div class="col-sm-10">
<select id="cust_gross_income_frequency" class="form-control">
                                 	  <?php do {  ?>
                                 	  <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], $row_view_thislead['cust_gross_income_frequency']))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
                                 	  <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
                                    </select>

                                    </div>
                                 
                                 </div>

                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Other Income Source</label>
                                 	<div class="col-sm-10">
                                    <input id="cust_other_income" class="form-control" value="<?php echo $row_view_thislead['cust_other_income']; ?>" placeholder="Other Income Source">
                                    
                                    </div>
                                 
                                 </div>


                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Other Income Amount</label>
                                 	<div class="col-sm-10">
                                    <input id="cust_other_income_amount" class="form-control"  type="text" placeholder="Other Income Amount" value="<?php echo $row_view_thislead['cust_other_income_amount']; ?>">
                                    
                                    </div>
                                 
                                 </div>





                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Other Income Frequency</label>
                                 	<div class="col-sm-10">
<select id="cust_gross_other_income_frequency" class="form-control">
                                 	  <?php do {  ?>
                                 	  <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], $row_view_thislead['cust_gross_other_income_frequency']))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
                                 	  <?php
} while ($row_paydayType = mysqli_fetch_assoc($paydayType));
  $rows = mysqli_num_rows($paydayType);
  if($rows > 0) {
      mysqli_data_seek($paydayType, 0);
	  $row_paydayType = mysqli_fetch_assoc($paydayType);
  }
?>
                                    </select>

                                    </div>
                                 
                                 </div>

                                <div class="hr-line-dashed"></div>






                        </div>
                            
                        </div>
                    
                    
                    </div>
                </div>
            </div>



        
        





        
        
        
        
        
        
        
        
        
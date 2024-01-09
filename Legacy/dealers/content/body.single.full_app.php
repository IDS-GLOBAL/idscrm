<?php
include("../ajax/db.php");

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM income_interval_options";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeMonths = "SELECT * FROM months_options";
$timeMonths = mysqli_query($idsconnection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeYears = "SELECT * FROM year_options";
$timeYears = mysqli_query($idsconnection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_autoYears = "SELECT * FROM auto_years";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);


$type='Primary';
$applicant_app_token = "$tkey";

$joint_or_invidividual = "0";

if(isset($_GET['type'])){
	
	$type = $_GET['type'];
	
	if($type == 'Joint'){
		
		$joint_creditapp_nodb = 'CoApplicant';
		
	}else{
	
		$joint_creditapp_nodb = 'Applicant';
	}

}
?>

<!-- Start Credit App Single -->
<div id="manage_creditapp_these">
<input type='hidden' id='applicant_app_token' value='<?php echo $applicant_app_token; ?>' />

<input type='hidden' id='joint_creditapp_joint_creditapp_Applicant_key' value='<?php echo $applicant_app_token; ?>' />

</div>
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $type; ?> Information <small>Key: '<?php echo $applicant_app_token; ?></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Personal Information
                            </h3>






                            <div id="personal_info_block" class="form-horizontal m-t-md">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Title Name:</label>
                                    <div class="col-sm-9">
                                       <select id="applicant_titlename" class="form-control">
                                            <option value="">Select Title</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">First Name:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_fname" type="text" class="form-control" placeholder="First Name" value="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Middle Name Or Intial:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_mname" type="text" class="form-control" placeholder="Middle Name" value="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Last Name:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_lname" type="text" class="form-control" placeholder="Last Name" value="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Perferred Name:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_name" type="text" class="form-control" placeholder="Perferred Name" value="">
                                        <span class="help-block">Name Goes By</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cell Phone:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_cell_phone" type="text" class="form-control" data-mask="(999) 999-9999" placeholder="(123) 456-7890">
                                        <span class="help-block">(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_email_address" type="text" class="form-control" placeholder="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        	<div class="form-group">
													<select class="form-control" id="credit_app_source">
                                                    	<option value="">Select Options</option>
                                                    	<option value="Referral">Referral</option>
                                                    	<option value="Repeat">Repeat</option>
                                                   	  	<option value="Google Search Engine">Google Search Engine</option>
                                                    	<option value="Bing Search Engine">Bing Search Engine</option>
                                                    	<option value="Yahoo Search Engine">Yahoo Search Engine</option>
                                                    	<option value="CarsForSale.com">CarsForSale.com</option>
                                                    	<option value="CarFax.com">CarFax.com</option>
                                                    	<option value="Mail Piece">Mail Piece</option>
                                                    	<option value="Other">Other</option>
                                                    </select>
												</div>
                                        <span class="help-block">Found Out About You How?</span>
                                    </div>
                                </div>                                
                                
                                

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Driver Licenses State:</label>
                                    <div class="col-sm-9">
                                        	<div class="form-group">
                                                        <select class="form-control" id="applicant_driver_state_issued">
                                                          <option value="">Select State</option>
                                                          <?php do {  ?>
                                                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                                          <?php } while ($row_states = mysqli_fetch_assoc($states));
                                                          $rows = mysqli_num_rows($states);
                                                          if($rows > 0) {
                                                              mysqli_data_seek($states, 0);
                                                              $row_states = mysqli_fetch_assoc($states);
                                                          } ?>
                                                    </select>
												</div>
                                        <span class="help-block">Found Out About You How?</span>
                                    </div>
                                </div>                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Licenses Number:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_driver_licenses_number" type="text" class="form-control" placeholder="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">SSN</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_ssn" data-mask="999-99-9999" type="text" class="form-control" placeholder="">
                                        <span class="help-block">999-99-9999</span>
                                    </div>
                                </div>


    
                                <div class="form-group" id="data_3">
                                    <label class="font-noraml">Birth Date:</label>
    DOB(MM/DD/YYYY):                                
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input id="applicant_dob"  data-mask="99/99/9999" type="text" class="form-control" value="">
                                    </div>
                                    
                                </div>
                               <div class="hr-line-dashed"></div>
    
                               
    
                                <div class="form-group" id="data_4">
                                    <label class="font-noraml">Driver License Expiration Date:</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="applicant_driver_licenses_expdate"  data-mask="99/99/9999" type="text" class="form-control" placeholder="07/01/2016" value="">
                                    </div>
                                </div>
    
    
    
                               <div class="hr-line-dashed"></div>


                            
                            
                            </div>










                        </div>
                    </div>
                    
                    <div id="address_information_section">                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Address Information <small>Key: '<?php echo $applicant_app_token; ?></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Current Address Information
                            </h3>
                            
                            <div class="form-horizontal m-t-md">



                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Current Street Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_present_address1" placeholder="Street Address">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

 
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Continue Street Address2:</label>
					<div class="col-sm-9">
                        <input type="text" class="form-control" id="applicant_present_address2" placeholder="Apt. Bldg, Unit">
                        <span class="help-block"></span>
                    </div>
                    
                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">City:</label>
					<div class="col-sm-9">
                        <input type="text" class="form-control" id="applicant_present_addr_city" placeholder="City">
                    </div>
                    </div>
                   
                   <div class="hr-line-dashed"></div>



                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">State:</label>
					<div class="col-sm-9">

                        <select id="applicant_present_addr_state" class="form-control">
                          <option value="">Select State</option>
                          <?php do {  ?>
                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                          <?php } while ($row_states = mysqli_fetch_assoc($states));
                          $rows = mysqli_num_rows($states);
                          if($rows > 0) {
                              mysqli_data_seek($states, 0);
                              $row_states = mysqli_fetch_assoc($states);
                          } ?>
                    </select>
                    </div>
                    </div>
                               

                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">County:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_present_addr_county" placeholder="County">
                        </div>
                    </div>

                                
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Zip:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_present_addr_zip" placeholder="Zip">
                        </div>
                    </div>

                   <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage Co:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_addr_landlord_mortg" placeholder="Mortgage or Landlord Name" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage Address:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_addr_landlord_address" placeholder="Mortgage or Landlord Address" value="">
                        </div>
                    </div>



                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage City:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="applicant_addr_landlord_city" placeholder="Mortgage or Landlord City">
                        </div>
                    </div>





                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage State:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="applicant_addr_landlord_state">
                          <option value="">Select State</option>
                          <?php do {  ?>
                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                          <?php } while ($row_states = mysqli_fetch_assoc($states));
                          $rows = mysqli_num_rows($states);
                          if($rows > 0) {
                              mysqli_data_seek($states, 0);
                              $row_states = mysqli_fetch_assoc($states);
                          } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage Zip:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="applicant_addr_landlord_zip" placeholder="Mortgage or Landlord Zip Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage Phone:</label>
                        <div class="col-sm-9">
                            <input data-mask="(999) 999-9999" type="text" class="form-control" id="applicant_addr_landlord_phone" placeholder="Mortgage or Landlord Phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Who's Name On Current Lease:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="applicant_name_oncurrent_lease" placeholder="Name On Current Lease/Mortgage">
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- form input -->
                        <label class="col-sm-3 control-label">Apartment Or Hourse:</label>
                        <div class="col-sm-9">
    
                            <select id="applicant_apart_or_house" class="form-control">
                                <option value="Apartment">Apartment</option>
                                <option value="House">House</option>
                                <option value="Trailer">Trailer</option>
                                <option value="Other">Other</option>
                              </select>
              
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- form input -->
                        <label class="col-sm-3 control-label">Residence Type:</label>
                        <div class="col-sm-9">
    
                            <select id="applicant_buy_own_rent_other" class="form-control">
                                <option value="Owns Home Outright">Owns Home Outright</option>
                                <option value="Buying Home">Buying Home</option>
                                <option value="Renting/Leasing">Renting/Leasing</option>
                                <option value="Living w/ Relatives">Living w/ Relatives</option>
                                <option value="Owns/Buying Mobile Home">Owns/Buying Mobile Home</option>
                                <option value="Unknown">Unknown</option>
                              </select>
              
                        </div>
                    </div>


   												<div class="hr-line-dashed"></div>
   												<div class="form-group">
													<!-- form input -->
                                                  <label class="col-sm-3 control-label">Monthly Rent/Mortage Payment:</label>
					<div class="col-sm-9">

													<input type="text" class="form-control" id="applicant_house_payment" placeholder="Mortage Payment">
												</div>
                                                </div>
                                <div class="hr-line-dashed"></div>
 
    											<div class="form-group">
													<!-- form input -->
                                                  Time At Current Residence:
                                                
                                                </div>
                                <div class="hr-line-dashed"></div>
                                                <div class="form-group">

                                                <label class="col-sm-3 control-label">Live Years:</label>
												<div class="col-sm-9">
                                                  
                                                  
													<select class="form-control" id="applicant_addr_years">
                                                    	<option value="0">0 Years</option>
                                                    	<option value="1">1 Year</option>
                                                    	<option value="2">2 Years</option>
                                                    	<option value="3">3 Years</option>
                                                    	<option value="4">4 Years</option>
                                                    	<option value="5">5 Years</option>
                                                    	<option value="6">6 Years</option>
                                                    	<option value="7">7 Years</option>
                                                    	<option value="8">8 Years</option>
                                                    	<option value="9">9 Years</option>
                                                    	<option value="10">10 Years</option>
                                                    </select>
												</div>
												</div>


   												<div class="form-group">
													<!-- form input -->
                                                <label class="col-sm-3 control-label">Live Months:</label>
												<div class="col-sm-9">
													<select class="form-control" id="applicant_addr_months">
                                                    	<option value="0">0 Months</option>
                                                    	<option value="1">1 Month</option>
                                                    	<option value="2">2 Months</option>
                                                    	<option value="3">3 Months</option>
                                                    	<option value="4">4 Months</option>
                                                    	<option value="5">5 Months</option>
                                                    	<option value="6">6 Months</option>
                                                    	<option value="7">7 Months</option>
                                                    	<option value="8">8 Months</option>
                                                    	<option value="9">9 Months</option>
                                                    	<option value="10">10 Months</option>
                                                    	<option value="11">11 Months</option>
                                                    </select>
												</div>
                                                </div>


   												<div class="form-group">
													<!-- form input -->
	                                                <label class="col-sm-3 control-label">Residence Changes In The Last Two Years:</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="applicant_residence_changes">
                                                            <option value="0 Changes">0 Changes</option>
                                                            <option value="1 Change">1 Change</option>
                                                            <option value="2 Changes">2 Changes</option>
                                                            <option value="3 Changes">3 Changes</option>
                                                            <option value="4 Changes">4 Changes</option>
                                                            <option value="5 Changes">5 Changes</option>
                                                        </select>
                                                    </div>
                                                </div>






                                    
												<div class="clearfix"></div>
                                <div class="hr-line-dashed"></div>

							</div>


                        </div>
                    </div>
					</div>
                    
                    <div id="prevaddress_information_section">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Previous Address Information <small>Key: '<?php echo $applicant_app_token; ?></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Previous Address Information
                            </h3>
                            
                            <div class="form-horizontal m-t-md">



                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Previous Street Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_previous1_addr1" placeholder="Previous Street Address">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

 
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Continue Previous Street Address:</label>
					<div class="col-sm-9">
                        <input type="text" class="form-control" id="applicant_previous1_addr2" placeholder="Apt. Bldg, Unit">
                        <span class="help-block"></span>
                    </div>
                    
                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">City:</label>
					<div class="col-sm-9">
                        <input type="text" class="form-control" id="applicant_previous1_addr_city" placeholder="City">
                    </div>
                    </div>
                   
                   <div class="hr-line-dashed"></div>



                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">State:</label>
					<div class="col-sm-9">

                        <select id="applicant_previous1_addr_state" class="form-control">
                          <option value="">Select State</option>
                          <?php do {  ?>
                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                          <?php } while ($row_states = mysqli_fetch_assoc($states));
                          $rows = mysqli_num_rows($states);
                          if($rows > 0) {
                              mysqli_data_seek($states, 0);
                              $row_states = mysqli_fetch_assoc($states);
                          } ?>
                    </select>
                    </div>
                    </div>
                               


                                
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Zip:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_previous1_addr_zip" placeholder="Zip">
                        </div>
                    </div>

                                

 
    											<div class="form-group">
													<!-- form input -->
                                                  Time At Previous Residence:
                                                
                                                </div>
                                                <div class="form-group">

                                                <label class="col-sm-3 control-label">Live Years:</label>
												<div class="col-sm-9">
                                                  
                                                  
													<select class="form-control" id="applicant_previous1_live_years">
                                                    	<option value="0">0 Years</option>
                                                    	<option value="1">1 Year</option>
                                                    	<option value="2">2 Years</option>
                                                    	<option value="3">3 Years</option>
                                                    	<option value="4">4 Years</option>
                                                    	<option value="5">5 Years</option>
                                                    	<option value="6">6 Years</option>
                                                    	<option value="7">7 Years</option>
                                                    	<option value="8">8 Years</option>
                                                    	<option value="9">9 Years</option>
                                                    	<option value="10">10 Years</option>
                                                    </select>
												</div>
												</div>


   												<div class="form-group">
													<!-- form input -->
                                                <label class="col-sm-3 control-label">Live Months:</label>
												<div class="col-sm-9">
													<select class="form-control" id="applicant_previous1_live_months">
                                                    	<option value="0">0 Months</option>
                                                    	<option value="1">1 Month</option>
                                                    	<option value="2">2 Months</option>
                                                    	<option value="3">3 Months</option>
                                                    	<option value="4">4 Months</option>
                                                    	<option value="5">5 Months</option>
                                                    	<option value="6">6 Months</option>
                                                    	<option value="7">7 Months</option>
                                                    	<option value="8">8 Months</option>
                                                    	<option value="9">9 Months</option>
                                                    	<option value="10">10 Months</option>
                                                    	<option value="11">11 Months</option>
                                                    </select>
												</div>
                                                </div>


                                    
												<div class="clearfix"></div>
                                <div class="hr-line-dashed"></div>

							</div>


                        </div>
                    </div>
					</div>
                    
                    
                    <div id="employer_information_section">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Work Information <small>Key: '<?php echo $applicant_app_token; ?></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Current Employer Information
                            </h3>
                            <p>
                               Income amount(s) and length(s) of time.
                            </p>
                            
                            <div class="form-horizontal m-t-md">
                            
                                              


	
                            <div class="form-group spacefix1">
                                <!-- form input -->
                              <label class="col-sm-3 control-label">Job Changes In Last Two Years?</label>
                              <div class="col-sm-9">

                                <select class="form-control" id="applicant_job_changes2yr">
                                    <option value="0">0 Jobs</option>
                                    <option value="1">1 Job</option>
                                    <option value="2">2 Jobs</option>
                                    <option value="3">3 Jobs</option>
                                    <option value="4">4 Jobs</option>
                                    <option value="5">5 Jobs</option>
                                </select>
                            </div>
                            
                            </div>
								
                                                           <div class="hr-line-dashed"></div>
									<!-- Resume Details -->
									<div class="resume-details br-lblue animatedd">
										<!-- Heading -->

                                <div class="form-group">
						
                                        <label class="col-sm-3 control-label">Employment Status</label>
										<div class="col-sm-9">

                                        <select id="applicant_employment_type" class="form-control">
                                                <option value="Auto Worker">Auto Worker</option>
                                                <option value="Clerical">Clerical</option>
                                                <option value="Craftsman">Craftsman</option>
                                                <option value="Executive/Managerial">Executive/Managerial</option>
                                                <option value="Farmer">Farmer</option>
                                                <option value="Fisherman">Fisherman</option>
                                                <option value="Government">Government</option>
                                                <option value="Homemaker">Homemaker</option>
                                                <option value="Other">Other</option>
                                                <option value="Professional">Professional</option>
                                                <option value="Sales/Advertising">Sales/Advertising</option>
                                                <option value="Semi-Skilled Labor">Semi-Skilled Labor</option>
                                                <option value="Skilled Labor">Skilled Labor</option>
                                        </select>
                                    	</div>
                                    </div>

									<div class="form-group">
						
                                        <label class="col-sm-3 control-label">Employment Status</label>
										<div class="col-sm-9">

                                        <select id="applicant_employment_status" class="form-control">
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Self Employed">Self Employed</option>
                                            <option value="Retired Income">Retired Income</option>
                                            <option value="Social Security Income">Social Security Income</option>
                                            <option value="Seasonal">Seasonal</option>
                                            <option value="Temp Agency">Temp Agency</option>
                                        </select>
                                    	</div>
                                    </div>
                                    
                                    <div class="form-group">
                        
                        
                                        <label class="col-sm-3 control-label">Current Job Title</label>
                                        <div class="col-sm-9">
                                        <input id="applicant_employer1_position" type="text" class="form-control" value="" placeholder="Job Title/Position"  />
                                        </div>
									</div>
                                    

									<div class="form-group">	
                                   	  <label class="col-sm-3 control-label">Employer Name</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer1_name" type="text" class="form-control" value="" placeholder="Employer Name"  />
                                        </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Employer Phone</label>
                                      <div class="col-sm-9">
                                        <input data-mask="(999) 999-9999" id="applicant_employer1_phone" type="text" class="form-control" value="" placeholder="Previous Employer Phone"  />
                                      </div>
									</div>

									<div class="form-group">

                                   	  <label class="col-sm-3 control-label">Employer Street Address</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer1_addr" type="text" class="form-control" value="" placeholder="Employer Address"  />
                                      </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Employer City</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer1_city" type="text" class="form-control" value="" placeholder="Employer City"  />
                                      </div>
                                    </div>

									<div class="form-group">
                                                  <label class="col-sm-3 control-label">Employer State:</label>
                                                  <div class="col-sm-9">
													<select class="form-control" id="applicant_employer1_state">
													  <option value="">Select State</option>
													  <?php do {  ?>
													  <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
													  <?php } while ($row_states = mysqli_fetch_assoc($states));
													  $rows = mysqli_num_rows($states);
													  if($rows > 0) {
														  mysqli_data_seek($states, 0);
														  $row_states = mysqli_fetch_assoc($states);
													  } ?>
                                                    </select>
                                                    </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Employer Zip Code:</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer1_zip" type="text" class="form-control" value=""  placeholder="Employer Zip Code" />
                                      </div>

									</div>

  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Gross Monthly Income</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer1_salary_bringhome" type="text" class="form-control" value=""  placeholder="Gross Monthly Income" />
                                      </div>
									</div>
                                    
                                    
  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Income Interval:</label>
                                      <div class="col-sm-9">
                                            <select id="applicant_employer1_payday_freq" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Biweekly">Biweekly</option>
                                                <option value="Semimonthly">Semimonthly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Yearly">Yearly</option>
                                            </select>
                                      </div>
									</div>

                                    <div class="form-group">
                                        <!-- form input -->
                                      <label class="">Years And Months Working Here?</label>
                                      <br />
                                    </div>


                                    <div class="form-group">

                                      
                                   	  <label class="col-sm-3 control-label">Years:</label>
                                      <div class="col-sm-9">
                                      
                                        <select class="form-control" id="applicant_employer1_work_years">
                                            <option value="0">0 Years</option>
                                            <option value="1">1 Year</option>
                                            <option value="2">2 Years</option>
                                            <option value="3">3 Years</option>
                                            <option value="4">4 Years</option>
                                            <option value="5">5 Years</option>
                                            <option value="6">6 Years</option>
                                            <option value="7">7 Years</option>
                                            <option value="8">8 Years</option>
                                            <option value="9">9 Years</option>
                                            <option value="10">10 Years</option>
                                        </select>
                                    </div>
                                    </div>


                                    <div class="form-group">
                                        <!-- form input -->
                                   	  <label class="col-sm-3 control-label">Months:</label>
                                      <div class="col-sm-9">

                                        <select class="form-control" id="applicant_employer1_work_months">
                                            <option value="0">0 Months</option>
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Months</option>
                                            <option value="3">3 Months</option>
                                            <option value="4">4 Months</option>
                                            <option value="5">5 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="7">7 Months</option>
                                            <option value="8">8 Months</option>
                                            <option value="9">9 Months</option>
                                            <option value="10">10 Months</option>
                                            <option value="11">11 Months</option>
                                        </select>
                                    </div>
                                    </div>


							<div class="form-group">
                            <label class="col-sm-3 contorl-label">Any Employer Work Comments:</label>
                                <div class="col-sm-9">
                          <textarea id="user_applicant_employer_notes" class="form-control textarea" placeholder="Employer Comments"></textarea>
                                </div>
                            </div>




                           <div class="hr-line-dashed"></div>




  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Other Income Source:</label>
                                      <div class="col-sm-9">
											<select id="other_income_source" class="form-control">
                                              <option value="2nd Job">Second Job</option>
                                              <option value="SSI">Social Security Income</option>
                                              <option value="Child Support">Child Support</option>
                                              <option value="Alimony">Alimony</option>
                                            </select>
                                           </div>
									</div>

  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Other Income Amount:</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_other_income_amount" type="text" class="form-control" value=""  placeholder="Other Income Amount" />
                                      </div>
									</div>

  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Other Income Interval:</label>
                                      <div class="col-sm-9">
                                            <select id="applicant_other_income_when_rcvd" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Biweekly">Biweekly</option>
                                                <option value="Semimonthly">Semimonthly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Yearly">Yearly</option>
                                            </select>
                                      </div>
									</div>
                                                

<br />
												<div class="clearfix"></div>


                                               <div class="hr-line-dashed"></div>
                         
                                        
									</div>
                            
                            
                            
                               
                          		
                                
							</div>


                        </div>
                    </div>
					</div>
                    
                    <div id="prevemployer_information_section">
                    

<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Previous Work Information <small>Key: '<?php echo $applicant_app_token; ?></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Previous Employer Information
                            </h3>
                            <p>
                               Income amount(s) and length(s) of time.
                            </p>
                            
                            <div class="form-horizontal m-t-md">
                            

									<!-- Resume Details -->
									<div class="resume-details br-lblue animatedd">
										<!-- Heading -->

									<div class="form-group">
						
                                        <label class="col-sm-3 control-label">Previous Employer Job Title</label>
										<div class="col-sm-9">

                                        <input id="applicant_employer2_position" type="text" class="form-control" value="" placeholder="Previous Job Title" />
                                    	</div>
                                    </div>

                                    

									<div class="form-group">	
                                   	  <label class="col-sm-3 control-label">Previous Employer Name</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer2_name" type="text" class="form-control" value="" placeholder="Employer Name"  />
                                        </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Previous Employer Phone</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer2_phone" data-mask="(999) 999-9999" type="text" class="form-control" value="" placeholder="Phone"  />
                                      </div>
									</div>

									<div class="form-group">

                                   	  <label class="col-sm-3 control-label">Employer Street Address</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer2_addr" type="text" class="form-control" value="" placeholder="Phone"  />
                                      </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">City</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer2_city" type="text" class="form-control" value="" placeholder="Phone"  />
                                      </div>
                                    </div>

									<div class="form-group">
                                                  <label class="col-sm-3 control-label">State:</label>
                                                  <div class="col-sm-9">
													<select class="form-control" id="applicant_employer2_state">
													  <option value="">Select State</option>
													  <?php do {  ?>
													  <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
													  <?php } while ($row_states = mysqli_fetch_assoc($states));
													  $rows = mysqli_num_rows($states);
													  if($rows > 0) {
														  mysqli_data_seek($states, 0);
														  $row_states = mysqli_fetch_assoc($states);
													  } ?>
                                                    </select>
                                                    </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Zip</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer2_zip" type="text" class="form-control" value=""  placeholder="Zip Code" />
                                      </div>

									</div>

  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Gross Monthly Income</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer2_salary_bringhome" type="text" class="form-control" value=""  placeholder="Monthly Income" />
                                      </div>
									</div>
                                    
                                    
  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Income Interval:</label>
                                      <div class="col-sm-9">
                                            <select id="applicant_employer2_payday_freq" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Biweekly">Biweekly</option>
                                                <option value="Semimonthly">Semimonthly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Yearly">Yearly</option>
                                            </select>
                                      </div>
									</div>

                                    <div class="form-group">
                                        <!-- form input -->
                                      <label class="">Years And Months Working Here?</label>
                                      <br />
                                    </div>


                                    <div class="form-group">

                                      
                                   	  <label class="col-sm-3 control-label">Years:</label>
                                      <div class="col-sm-9">
                                      
                                        <select class="form-control" id="applicant_employer2_work_years">
                                            <option value="0">0 Years</option>
                                            <option value="1">1 Year</option>
                                            <option value="2">2 Years</option>
                                            <option value="3">3 Years</option>
                                            <option value="4">4 Years</option>
                                            <option value="5">5 Years</option>
                                            <option value="6">6 Years</option>
                                            <option value="7">7 Years</option>
                                            <option value="8">8 Years</option>
                                            <option value="9">9 Years</option>
                                            <option value="10">10 Years</option>
                                        </select>
                                    </div>
                                    </div>


                                    <div class="form-group">
                                        <!-- form input -->
                                   	  <label class="col-sm-3 control-label">Months:</label>
                                      <div class="col-sm-9">

                                        <select class="form-control" id="applicant_employer2_work_months">
                                            <option value="0">0 Months</option>
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Months</option>
                                            <option value="3">3 Months</option>
                                            <option value="4">4 Months</option>
                                            <option value="5">5 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="7">7 Months</option>
                                            <option value="8">8 Months</option>
                                            <option value="9">9 Months</option>
                                            <option value="10">10 Months</option>
                                            <option value="11">11 Months</option>
                                        </select>
                                    </div>
                                    </div>

                            
                            </div>


												<div class="clearfix"></div>


                                               <div class="hr-line-dashed"></div>
                         
                                        
									</div>
                            
                            
                            
                               
                          		
                                
							</div>


                        </div>
                    </div>
                    
                    
                    </div>               
                    
                    <div id="realative_information_section">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Nearest Realative<small> Key: '<?php echo $applicant_app_token; ?></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                               Nearest Relative Information
                            </h3>
                            <div class="form-horizontal m-t-md">






										<div class="form-group">
                                        <label class="col-sm-3 control-label">First Name Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_fname" value="" placeholder="First Name Of Nearest Realative">
                                        </div>
                                        </div>


										<div class="form-group">
                                        <label class="col-sm-3 control-label">Last Name Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_lname" value="" placeholder="Last Name Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">Relationship Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_relationship" value="" placeholder="Relationship Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">Phone No. Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_mainphone" value="" placeholder="Phone No. Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">Address Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_address" value="" placeholder="Address Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">City Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_address_city" value="" placeholder="City Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">State Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <select class="form-control" id="applicants_realative1_address_state" placeholder="State Of Nearest Realative">
                                          <option value="">Select State</option>
                                          <?php do {  ?>
                                          <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                          <?php } while ($row_states = mysqli_fetch_assoc($states));
                                          $rows = mysqli_num_rows($states);
                                          if($rows > 0) {
                                              mysqli_data_seek($states, 0);
                                              $row_states = mysqli_fetch_assoc($states);
                                          } ?>
                                        </select>
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">Zip Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_address_zip" value="" placeholder="Zip Of Nearest Relative">
                                        </div>
                                        </div>







                                <div class="hr-line-dashed"></div>
							</div>
                        </div>
                     </div>
                    
                    </div>               
                    
                    
                    
                    <div id="credit_preview_section">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Credit Preview<small> Key: '<?php echo $applicant_app_token; ?></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Credit Preview Information
                            </h3>
                            
                            <div class="form-horizontal m-t-md">


                                <div class="hr-line-dashed"></div>




									<div class="resume-details br-lblue animatedd">
										<!-- Heading -->
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Reason For Purchase?</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" id="applilcant_v_intendeduse" rows="3" placeholder="Comments"></textarea>
                                        </div>
                                        </div>

							<div id="vehicleFoundResult">
                             <input type="hidden" id="cust_vehicle_id" name="cust_vehicle_id" value="">
                                    	

                                        
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Please Enter Stock Number</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_stockno" value="" placeholder="Stock Number" />
                                        </div>
                                        </div>
                                        

                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Vehicle Purchase Vin</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_vin" value="" placeholder="VIN"  />
                                        </div>
                                        </div>



                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Year Make Model</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" id="applilcant_v_ymkmd_txt" value="" placeholder="Year Make &amp; Model" />
                                        </div>
                                        </div>


  </div>
                                        


                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Vehicle Purchase Body Style:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_style" value="" placeholder="Body Style"  />
                                        </div>
                                        </div>

                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Vehicle Purchase Miles:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_inception_miles" value="" placeholder="Miles"  />
                                        </div>
                                        </div>




                                        </div>



                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Down Payment Available:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_cash_down" value="" placeholder="$"  />
                                        </div>
                                        </div>


                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Desired Monthly Payment:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_desired_mo_payment" value="" placeholder="$"  />
                                        </div>
                                        </div>
                                    

                                        

												


                                    
                                    
									
                                    
                                    
                                    
                                    
                                    
                                    
                                   
										<!-- Heading -->
                                    
                                    	<div class="form-group">

                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Year Of Current Vehicle?</label>
                                         
                                         
                                        <div class="col-sm-9">
                                       
                                        <input type="hidden" id="trade_ymk_txt" value="" disabled="disabled" />
                                        
                                        <select class="form-control" id="applilcant_v_trade_year">
                                          <option value="">Select Year</option>
                                          <?php
do {  
?>
                                          <option value="<?php echo $row_autoYears['year']?>"><?php echo $row_autoYears['year']?></option>
                                          <?php
} while ($row_autoYears = mysqli_fetch_assoc($autoYears));
  $rows = mysqli_num_rows($autoYears);
  if($rows > 0) {
      mysqli_data_seek($autoYears, 0);
	  $row_autoYears = mysqli_fetch_assoc($autoYears);
  }
?>
                                        </select>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Make Of Current Vehicle?</label>
                                        
                                        <div class="col-sm-9">
                                        <input class="form-control" id="applilcant_v_trade_make" value="">
                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Model Of Current Vehicle?</label>
                                        
                                        <div class="col-sm-9">
                                        <input class="form-control" id="applilcant_v_trade_model" value="">
                                        
                                        </div>
                                        </div>



                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Are you currently financing this vehicle?</label>
                                        
                                         
                                        	<div class="col-sm-9">
                                      		<select id="applicant_open_autoloan" class="form-control">
                                        		<option value="">Select One</option>
                                        		<option value="Yes">Yes</option>
                                            	<option value="No">No</option>
                                        	</select>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Name Of Finance Company?</label>
                                        <div class="col-sm-9">

                                        <input type="text" id="applilcant_v_trade_lien_holder_name"  name="applilcant_v_trade_lien_holder_name" class="form-control" placeholder="Name Of Finance Company?">
										</div>
                                        </div>

                                                                            
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Current Car Payment?</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_open_autoloan_pymt" value="" placeholder="Current Car Payment?"  />
                                        </div>
                                        </div>
                                        
										<div class="form-group">
                                        <label class="col-sm-3 control-label">Are you interested in refinancing this vehicle?</label>
										<div class="col-sm-9">
                                          <select id="applicant_open_to_refinanceautoloan" class="form-control">
                                            <option value="" selected="selected">Select One</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Rate your payment history on this vehicle?</label>
                                        <div class="col-sm-9">
                                        <select id="applicant_open_autoloan_pymthistry" class="form-control">
                                        	<option value="">Select One</option>
                                            <option value="Excellent">Excellent (No Late Payments)</option>
                                        	<option value="Good">Good (Few Late Payments)</option>
                                        	<option value="Poor">Poor (Consistently Late)</option>
                                        </select>
                                        
										</div>
                                        </div>
                                    

                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Are you interested in trading this vehicle?</label>
                                        <div class="col-sm-9">
                                        <select id="applicant_open_to_trading" class="form-control">
                                        	<option value="">Select One</option>
                                            <option value="No">No</option>
                                        	<option value="Yes">Yes</option>
                                        </select>
                                        </div>
										</div>


                                        
                                    <div id="yesTradeVehicle_block" style="display:block;">
                                        
                                       	<div class="form-group">
                                        <label class="col-sm-3 control-label">Remaining Balance Owed On This Vehicle?</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_trade_owed" value="" placeholder="Balance On Current Vehicle"  />
                                        </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Reason For Trade?</label>
                                        <div class="col-sm-9">
									<input class="form-control" type="text" id="user_comments_trade_notes" placeholder="Reason For Trade?">
										</div>
                                        </div>
									
                                    </div>
                                    
                                    
                                    
												


                                    
                              
                                    
                                    
                                    



                          		
                                
							</div>


                        </div>
                    </div>
					</div>
                    
                    
                    
                    
                    
                    

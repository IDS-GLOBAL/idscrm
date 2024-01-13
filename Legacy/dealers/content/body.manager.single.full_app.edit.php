<?php include("../ajax/manager.db.php"); ?>
<?php

$colname_find_dlr_creditapp = "-1";
if (isset($_GET['app_id'])) {
    $colname_find_dlr_creditapp = $_GET['app_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_creditapp =  "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown_id` = '$colname_find_dlr_creditapp' AND `applicant_did` = '$did'";

$find_dlr_creditapp = mysqli_query($idsconnection_mysqli, $query_find_dlr_creditapp);
$row_find_dlr_creditapp = mysqli_fetch_assoc($find_dlr_creditapp);
$totalRows_find_dlr_creditapp = mysqli_num_rows($find_dlr_creditapp);
$credit_app_id = $row_find_dlr_creditapp['credit_app_fullblown_id'];
//if(!$credit_app_id){ exit; }    //header("Location: creditapp.edit.php"); 

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
$applicant_app_token = $row_find_dlr_creditapp['applicant_app_token'];

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
<script>

$('button#pull_vbystock').on('click', function(){
											   



				var enter_vstockno =  $('input#applilcant_v_stockno').val();
				var thisdid = $('input#thisdid').val();
				
				$.getJSON("script_json.salesdesk.pullstockvehicle.php?enter_vstockno="+enter_vstockno+"&thisdid="+thisdid, function(data){
				
						//console.log(data.result.length);
							
						if (data.result.length == 0) {
							
								console.log("No DATA!")
								
								$('div#pull_vehicle_handle').removeClass('has-success').addClass('has-error');
								alert('No Stock Number Found! Please Try Again');
								return false;
								
								
						}else {
							
  

								console.log("We Have DATA!")

								$(this).hide();
								$('div#pull_vehicle_handle').removeClass('has-error').addClass('has-success');
								
								$.each(data.result, function(obj){


							
									console.log("return_status: "+this['return_status']);
									console.log("vid: "+this['vid']);
									
									$('input#vehicle_id').val(this['vid']);
									
									console.log("vtoken: "+this['vtoken']);
									console.log("did: "+this['did']);
									console.log("vlivestatus: "+this['vlivestatus']);
									console.log("vphoto_count: "+this['vphoto_count']);
									console.log("vthubmnail_file: "+this['vthubmnail_file']);
									console.log("vthubmnail_file_path: "+this['vthubmnail_file_path']);
									console.log("vDateInStock: "+this['vDateInStock']);
									console.log("vyear: "+this['vyear']);


									$('input#applilcant_v_ymkmd_txt').val(this['vyear']+' '+vmake+' '+this['vmodel']+' '+vtrim);

									console.log("vvin: "+this['vvin']);
									
									$('input#applilcant_v_vin').val(this['vvin']);

									if(this['vyear'] != null){
										
										var vyear = this['vyear'];
									}else{
										
										var vyear = '';
										
									}

									console.log('Year: '+vyear);
									
									$('input#applilcant_v_year').val(vyear);
									
									console.log("vmake: "+this['vmake']);

									if(this['vmake'] != null){
										
										var vmake = this['vmake'];


									}else{
										
										var vmake = '';
										
									}

									$('input#applilcant_v_make').val(vmake);

									console.log("vmodel: "+this['vmodel']);
									
									$('input#applilcant_v_model').val(vmodel);
									
									
									

									
									
									

									console.log("vtrim: "+this['vtrim']);


									

									if(this['vtrim'] != null){
										
										var vtrim = this['vtrim'];
									}else{
										
										var vtrim = '';
										
									}

									
									console.log("vcondition: "+this['vcondition']);
									console.log("vcertified: "+this['vcertified']);
									console.log("vstockno: "+this['vstockno']);
									console.log("vmileage: "+this['vmileage']);
									console.log("vpurchasecost: "+this['vpurchasecost']);
									console.log("vdlrpack: "+this['vdlrpack']);
									console.log("vaddedcost: "+this['vaddedcost']);
									console.log("vrprice: "+this['vrprice']);
									if(this['vrprice'] != null){
										


														
										   if (confirm("Found Vehicle By Stock! Would You Like To Use Price Information?") == true) {
											   
												x = "You pressed OK!";
			
													var vrprice = this['vrprice'];
													var vrprice = vrprice.toFixed(2);
													
													$('input#priceVehicle').val(vrprice);
													//console.log('Not NULL: '+vrprice);
			
												return true;
											} else {
												x = "You pressed Cancel!";
												
												$('div#deal_info_block').find('input#priceVehicle').parent().parent().addClass('has-error');
												
												return false;
											}

										
										
									}else{
										
										$('div#deal_info_block').find('input#priceVehicle').parent().parent().addClass('has-error');
										
										
										
									}
									
									//console.log("vdprice: "+this['vdprice']);
									//console.log("vspecialprice: "+this['vspecialprice']);
									//console.log("vecolor_txt: "+this['vecolor_txt']);
									//console.log("vicolor_txt: "+this['vicolor_txt']);
									//console.log("vbody: "+this['vbody']);
									//console.log("vdoors: "+this['vdoors']);
									//console.log("vehicleOptionsBulk: "+this['vehicleOptionsBulk']);
								});
				



						}


						//console.log(data.result);
						//console.log('OBJ: '+obj);
							
							

				
				
				
				});



	
	
	

});
</script>
<!-- Start Credit App Single -->
<div id="manage_<?php echo $joint_creditapp_nodb; ?>_creditapp_these">
<input type='hidden' id='applicant_app_token' value='<?php echo $applicant_app_token; ?>' />
<input type='hidden' id='joint_creditapp_nodb' value='<?php echo $joint_creditapp_nodb; ?>' />

<input type='hidden' id='joint_creditapp_joint_creditapp_CoApplicant_key' value='<?php echo $applicant_app_token; ?>' />
<input type='hidden' id='joint_creditapp_joint_creditapp_Applicant_key' value='<?php echo $applicant_app_token; ?>' />

</div>
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $type; ?> Information <small> Key: '<?php echo $applicant_app_token; ?></small></h5>
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
                                Personal Information From App Number: <?php echo $row_find_dlr_creditapp['app_deal_number']; ?>
                            </h3>
                            <p>
                                Below is the customers information relating to an online credit application.
                            </p>






                            <div id="personal_info_block" class="form-horizontal m-t-md">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Title Name:</label>
                                    <div class="col-sm-9">
                                       <select id="applicant_titlename" class="form-control">
                                      <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Select Title</option>
                                   <option value="Mr." <?php if (!(strcmp("Mr.", $row_find_dlr_creditapp['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
                                <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_find_dlr_creditapp['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
                                <option value="Ms." <?php if (!(strcmp("Ms.", $row_find_dlr_creditapp['applicant_titlename']))) {echo "selected=\"selected\"";} ?>>Ms.</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">First Name:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_fname" type="text" class="form-control" placeholder="First Name" value="<?php echo $row_find_dlr_creditapp['applicant_fname']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Middle Name Or Intial:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_mname" type="text" class="form-control" placeholder="Middle Name" value="<?php echo $row_find_dlr_creditapp['applicant_mname']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Last Name:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_lname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $row_find_dlr_creditapp['applicant_lname']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Perferred Name:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_name" type="text" class="form-control" placeholder="Perferred Name" value="<?php echo $row_find_dlr_creditapp['applicant_name']; ?>">
                                        <span class="help-block">Name Goes By</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cell Phone:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_cell_phone" value="<?php echo $row_find_dlr_creditapp['applicant_cell_phone']; ?>" data-mask="(999) 999-9999" placeholder="">
                                        <span class="help-block">(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_email_address" type="text" class="form-control" placeholder="" value="<?php echo $row_find_dlr_creditapp['applicant_email_address']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        	<div class="form-group">
													<select class="form-control" id="credit_app_source">
												    <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>Select Options</option>
											      <option value="Referral" <?php if (!(strcmp("Referral", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>Referral</option>
										        <option value="Repeat" <?php if (!(strcmp("Repeat", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>Repeat</option>
									          <option value="Google Search Engine" <?php if (!(strcmp("Google Search Engine", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>Google Search Engine</option>
								            <option value="Bing Search Engine" <?php if (!(strcmp("Bing Search Engine", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>Bing Search Engine</option>
							              <option value="Yahoo Search Engine" <?php if (!(strcmp("Yahoo Search Engine", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>Yahoo Search Engine</option>
						                <option value="CarsForSale.com" <?php if (!(strcmp("CarsForSale.com", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>CarsForSale.com</option>
					                  <option value="CarFax.com" <?php if (!(strcmp("CarFax.com", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>CarFax.com</option>
				                    <option value="Mail Piece" <?php if (!(strcmp("Mail Piece", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>Mail Piece</option>
				                    <option value="Other" <?php if (!(strcmp("Other", $row_find_dlr_creditapp['credit_app_source']))) {echo "selected=\"selected\"";} ?>>Other</option>
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
                                                          <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_driver_state_issued']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                                                          <?php
do {  
?>
                                                          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_dlr_creditapp['applicant_driver_state_issued']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
                                        <span class="help-block">Found Out About You How?</span>
                                    </div>
                                </div>                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Licenses Number:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_driver_licenses_number" type="text" class="form-control" placeholder="" value="<?php echo $row_find_dlr_creditapp['applicant_driver_licenses_number']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">SSN</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_ssn" data-mask="999-99-9999" type="text" class="form-control" placeholder="" value="<?php echo $row_find_dlr_creditapp['applicant_ssn']; ?>">
                                        <span class="help-block">999-99-9999</span>
                                    </div>
                                </div>


    
                                <div class="form-group" id="data_3">
                                    <label class="font-noraml">Birth Date:</label>
    DOB(MM/DD/YYYY):                                
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input id="applicant_dob" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_dob']; ?>">
                                    </div>
                                    
                                </div>
                               <div class="hr-line-dashed"></div>
    
                               
    
                                <div class="form-group" id="data_4">
                                    <label class="font-noraml">Driver License Expiration Date:</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="applicant_driver_licenses_expdate" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_driver_licenses_expdate']; ?>">
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
                                Current Address Information
                            </h3>
                            
                            <div class="form-horizontal m-t-md">



                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Current Street Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_present_address1" placeholder="Current Street Address" value="<?php echo $row_find_dlr_creditapp['applicant_present_address1']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

 
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Continue Street Address:</label>
					<div class="col-sm-9">
                        <input type="text" class="form-control" id="applicant_present_address2" placeholder="Apt. Bldg, Unit" value="<?php echo $row_find_dlr_creditapp['applicant_present_address2']; ?>">
                        <span class="help-block"></span>
                    </div>
                    
                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">City:</label>
					<div class="col-sm-9">
                        <input type="text" class="form-control" id="applicant_present_addr_city" placeholder="City" value="<?php echo $row_find_dlr_creditapp['applicant_present_addr_city']; ?>">
                    </div>
                    </div>
                   
                   <div class="hr-line-dashed"></div>



                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">State:</label>
					<div class="col-sm-9">

                        <select id="applicant_present_addr_state" class="form-control">
                          <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_present_addr_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_dlr_creditapp['applicant_present_addr_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
                    </div>
                               

                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">County:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_present_addr_county" placeholder="County" value="<?php echo $row_find_dlr_creditapp['applicant_present_addr_county']; ?>">
                        </div>
                    </div>

                                
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Zip:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_present_addr_zip" placeholder="Zip" value="<?php echo $row_find_dlr_creditapp['applicant_present_addr_zip']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage Co:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_addr_landlord_mortg" placeholder="Mortgage or Landlord Name" value="<?php echo $row_find_dlr_creditapp['applicant_addr_landlord_mortg']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage Address:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_addr_landlord_address" placeholder="Mortgage or Landlord Name" value="<?php echo $row_find_dlr_creditapp['applicant_addr_landlord_address']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage City:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="applicant_addr_landlord_city" placeholder="Mortgage or Landlord City" value="<?php echo $row_find_dlr_creditapp['applicant_addr_landlord_city']; ?>">
                        </div>
                    </div>





                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage State:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="applicant_addr_landlord_state">
                              <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_addr_landlord_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                              <?php
do {  
?>
                              <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_dlr_creditapp['applicant_addr_landlord_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
                    </div>

                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage Zip:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="applicant_addr_landlord_zip" placeholder="Mortgage or Landlord Zip" value="<?php echo $row_find_dlr_creditapp['applicant_addr_landlord_zip']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Landlord/Mortgage Phone:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="applicant_addr_landlord_phone" placeholder="Mortgage or Landlord Phone" value="<?php echo $row_find_dlr_creditapp['applicant_addr_landlord_phone']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Who's Name On Current Lease:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="applicant_name_oncurrent_lease" placeholder="Mortgage or Landlord Phone" value="<?php echo $row_find_dlr_creditapp['applicant_name_oncurrent_lease']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- form input -->
                        <label class="col-sm-3 control-label">Apartment Or Hourse:</label>
                        <div class="col-sm-9">
    
                            <select id="applicant_apart_or_house" class="form-control">
                            <option value="Apartment" <?php if (!(strcmp("Apartment", $row_find_dlr_creditapp['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>Apartment</option>
                          <option value="House" <?php if (!(strcmp("House", $row_find_dlr_creditapp['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>House</option>
                        <option value="Trailer" <?php if (!(strcmp("Trailer", $row_find_dlr_creditapp['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>Trailer</option>
                        <option value="Other" <?php if (!(strcmp("Other", $row_find_dlr_creditapp['applicant_apart_or_house']))) {echo "selected=\"selected\"";} ?>>Other</option>
                              </select>
              
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- form input -->
                        <label class="col-sm-3 control-label">Residence Type:</label>
                        <div class="col-sm-9">
    
                            <select id="applicant_buy_own_rent_other" class="form-control">
                            <option value="Owns Home Outright" <?php if (!(strcmp("Owns Home Outright", $row_find_dlr_creditapp['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Owns Home Outright</option>
                          <option value="Buying Home" <?php if (!(strcmp("Buying Home", $row_find_dlr_creditapp['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Buying Home</option>
                        <option value="Renting/Leasing" <?php if (!(strcmp("Renting/Leasing", $row_find_dlr_creditapp['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Renting/Leasing</option>
                      <option value="Living w/ Relatives" <?php if (!(strcmp("Living w/ Relatives", $row_find_dlr_creditapp['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Living w/ Relatives</option>
                    <option value="Owns/Buying Mobile Home" <?php if (!(strcmp("Owns/Buying Mobile Home", $row_find_dlr_creditapp['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Owns/Buying Mobile Home</option>
                    <option value="Unknown" <?php if (!(strcmp("Unknown", $row_find_dlr_creditapp['applicant_buy_own_rent_other']))) {echo "selected=\"selected\"";} ?>>Unknown</option>
                              </select>
              
                        </div>
                    </div>


   												<div class="hr-line-dashed"></div>
   												<div class="form-group">
													<!-- form input -->
                                                  <label class="col-sm-3 control-label">Monthly Rent/Mortage Payment:</label>
					<div class="col-sm-9">

													<input type="text" class="form-control" id="applicant_house_payment" placeholder="Mortage Payment" value="<?php echo $row_find_dlr_creditapp['applicant_house_payment']; ?>">
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
                                                    	<option value="0 Years">0 Years</option>
                                                    	<option value="1 Year">1 Year</option>
                                                    	<option value="2 Years">2 Years</option>
                                                    	<option value="3 Years">3 Years</option>
                                                    	<option value="4 Years">4 Years</option>
                                                    	<option value="5 Years">5 Years</option>
                                                    	<option value="6 Years">6 Years</option>
                                                    	<option value="7 Years">7 Years</option>
                                                    	<option value="8 Years">8 Years</option>
                                                    	<option value="9 Years">9 Years</option>
                                                    	<option value="10 Years">10 Years</option>
                                                    </select>
												</div>
												</div>


   												<div class="form-group">
													<!-- form input -->
                                                <label class="col-sm-3 control-label">Live Months:</label>
												<div class="col-sm-9">
													<select class="form-control" id="applicant_addr_months">
                                                    	<option value="0 Months">0 Months</option>
                                                    	<option value="1 Month">1 Month</option>
                                                    	<option value="2 Months">2 Months</option>
                                                    	<option value="3 Months">3 Months</option>
                                                    	<option value="4 Months">4 Months</option>
                                                    	<option value="5 Months">5 Months</option>
                                                    	<option value="6 Months">6 Months</option>
                                                    	<option value="7 Months">7 Months</option>
                                                    	<option value="8 Months">8 Months</option>
                                                    	<option value="9 Months">9 Months</option>
                                                    	<option value="10 Months">10 Months</option>
                                                    	<option value="11 Months">11 Months</option>
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
                                Previous Address Information
                            </h3>
                            
                            <div class="form-horizontal m-t-md">



                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Previous Street Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_previous1_addr1" placeholder="Previous Street Address" value="<?php echo $row_find_dlr_creditapp['applicant_previous1_addr1']; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

 
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Continue Previous Street Address:</label>
					<div class="col-sm-9">
                        <input type="text" class="form-control" id="applicant_previous1_addr2" placeholder="Apt. Bldg, Unit" value="<?php echo $row_find_dlr_creditapp['applicant_previous1_addr2']; ?>">
                        <span class="help-block"></span>
                    </div>
                    
                    </div>
                    <div class="hr-line-dashed"></div>


                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">City:</label>
					<div class="col-sm-9">
                        <input type="text" class="form-control" id="applicant_previous1_addr_city" placeholder="City" value="<?php echo $row_find_dlr_creditapp['applicant_previous1_addr_city']; ?>">
                    </div>
                    </div>
                   
                   <div class="hr-line-dashed"></div>



                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">State:</label>
					<div class="col-sm-9">

                        <select id="applicant_previous1_addr_state" class="form-control">
                          <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_previous1_addr_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_dlr_creditapp['applicant_previous1_addr_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
                    </div>
                               


                                
                    <div class="form-group">
                        <!-- form input -->
                      <label class="col-sm-3 control-label">Zip:</label>
                        <div class="col-sm-9">
    
                            <input type="text" class="form-control" id="applicant_previous1_addr_zip" placeholder="Zip" value="<?php echo $row_find_dlr_creditapp['applicant_previous1_addr_zip']; ?>">
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
													  <option value="0 Years" <?php if (!(strcmp("0 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>0 Years</option>
													  <option value="1 Year" <?php if (!(strcmp("1 Year", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>1 Year</option>
													  <option value="2 Years" <?php if (!(strcmp("2 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>2 Years</option>
													  <option value="3 Years" <?php if (!(strcmp("3 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>3 Years</option>
													  <option value="4 Years" <?php if (!(strcmp("4 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>4 Years</option>
													  <option value="5 Years" <?php if (!(strcmp("5 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>5 Years</option>
													  <option value="6 Years" <?php if (!(strcmp("6 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>6 Years</option>
													  <option value="7 Years" <?php if (!(strcmp("7 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>7 Years</option>
													  <option value="8 Years" <?php if (!(strcmp("8 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>8 Years</option>
													  <option value="9 Years" <?php if (!(strcmp("9 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>9 Years</option>
													  <option value="10 Years" <?php if (!(strcmp("10 Years", $row_find_dlr_creditapp['applicant_previous1_live_years']))) {echo "selected=\"selected\"";} ?>>10 Years</option>
                                                    </select>
												</div>
												</div>


   												<div class="form-group">
													<!-- form input -->
                                                <label class="col-sm-3 control-label">Live Months:</label>
												<div class="col-sm-9">
													<select class="form-control" id="applicant_previous1_live_months">
													  <option value="0 Months" <?php if (!(strcmp("0 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>0 Months</option>
													  <option value="1 Month" <?php if (!(strcmp("1 Month", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>1 Month</option>
													  <option value="2 Months" <?php if (!(strcmp("2 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>2 Months</option>
													  <option value="3 Months" <?php if (!(strcmp("3 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>3 Months</option>
													  <option value="4 Months" <?php if (!(strcmp("4 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>4 Months</option>
													  <option value="5 Months" <?php if (!(strcmp("5 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>5 Months</option>
													  <option value="6 Months" <?php if (!(strcmp("6 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>6 Months</option>
													  <option value="7 Months" <?php if (!(strcmp("7 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>7 Months</option>
													  <option value="8 Months" <?php if (!(strcmp("8 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>8 Months</option>
													  <option value="9 Months" <?php if (!(strcmp("9 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>9 Months</option>
													  <option value="10 Months" <?php if (!(strcmp("10 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>10 Months</option>
													  <option value="11 Months" <?php if (!(strcmp("11 Months", $row_find_dlr_creditapp['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>11 Months</option>
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
                                <option value="0" <?php if (!(strcmp(0, $row_find_dlr_creditapp['applicant_job_changes2yr']))) {echo "selected=\"selected\"";} ?>>0 Jobs</option>
                              <option value="1" <?php if (!(strcmp(1, $row_find_dlr_creditapp['applicant_job_changes2yr']))) {echo "selected=\"selected\"";} ?>>1 Job</option>
                            <option value="2" <?php if (!(strcmp(2, $row_find_dlr_creditapp['applicant_job_changes2yr']))) {echo "selected=\"selected\"";} ?>>2 Jobs</option>
                          <option value="3" <?php if (!(strcmp(3, $row_find_dlr_creditapp['applicant_job_changes2yr']))) {echo "selected=\"selected\"";} ?>>3 Jobs</option>
                        <option value="4" <?php if (!(strcmp(4, $row_find_dlr_creditapp['applicant_job_changes2yr']))) {echo "selected=\"selected\"";} ?>>4 Jobs</option>
                        <option value="5" <?php if (!(strcmp(5, $row_find_dlr_creditapp['applicant_job_changes2yr']))) {echo "selected=\"selected\"";} ?>>5 Jobs</option>
                                </select>
                            </div>
                            
                            </div>


                            <div class="form-group" id="data_3">
                                <label class="col-sm-3 control-label">Appointment Date:</label>

                                <div class="input-group date col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="applicant_appt_startunixtime" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_appt_startunixtime']; ?>">
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
                                    <option value="Auto Worker" <?php if (!(strcmp("Auto Worker", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Auto Worker</option>
                              <option value="Clerical" <?php if (!(strcmp("Clerical", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Clerical</option>
                        <option value="Craftsman" <?php if (!(strcmp("Craftsman", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Craftsman</option>
                  <option value="Executive/Managerial" <?php if (!(strcmp("Executive/Managerial", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Executive/Managerial</option>
            <option value="Farmer" <?php if (!(strcmp("Farmer", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Farmer</option>
      <option value="Fisherman" <?php if (!(strcmp("Fisherman", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Fisherman</option>
<option value="Government" <?php if (!(strcmp("Government", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Government</option>
<option value="Homemaker" <?php if (!(strcmp("Homemaker", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Homemaker</option>
<option value="Other" <?php if (!(strcmp("Other", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Other</option>
<option value="Professional" <?php if (!(strcmp("Professional", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Professional</option>
<option value="Sales/Advertising" <?php if (!(strcmp("Sales/Advertising", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Sales/Advertising</option>
<option value="Semi-Skilled Labor" <?php if (!(strcmp("Semi-Skilled Labor", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Semi-Skilled Labor</option>
<option value="Skilled Labor" <?php if (!(strcmp("Skilled Labor", $row_find_dlr_creditapp['applicant_employment_type']))) {echo "selected=\"selected\"";} ?>>Skilled Labor</option>
                                        </select>
                                    	</div>
                                    </div>

									<div class="form-group">
						
                                        <label class="col-sm-3 control-label">Employment Status</label>
										<div class="col-sm-9">

                                        <select id="applicant_employment_status" class="form-control">
                                        <option value="Full Time" <?php if (!(strcmp("Full Time", $row_find_dlr_creditapp['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Full Time</option>
                                      <option value="Part Time" <?php if (!(strcmp("Part Time", $row_find_dlr_creditapp['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Part Time</option>
                                    <option value="Self Employed" <?php if (!(strcmp("Self Employed", $row_find_dlr_creditapp['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Self Employed</option>
                                  <option value="Retired Income" <?php if (!(strcmp("Retired Income", $row_find_dlr_creditapp['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Retired Income</option>
                                  <option value="Social Security Income" <?php if (!(strcmp("Social Security Income", $row_find_dlr_creditapp['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Social Security Income</option>
<option value="Seasonal" <?php if (!(strcmp("Seasonal", $row_find_dlr_creditapp['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Seasonal</option>
                                <option value="Temp Agency" <?php if (!(strcmp("Temp Agency", $row_find_dlr_creditapp['applicant_employment_status']))) {echo "selected=\"selected\"";} ?>>Temp Agency</option>
                                        </select>
                                    	</div>
                                    </div>
                                    
                                    <div class="form-group">
                        
                        
                                        <label class="col-sm-3 control-label">Job Title</label>
                                        <div class="col-sm-9">
                                        <input id="applicant_employer1_position" type="text" class="form-control" placeholder="Job Title/Position"  value="<?php echo $row_find_dlr_creditapp['applicant_employer1_position']; ?>">
                                        </div>
									</div>
                                    

									<div class="form-group">	
                                   	  <label class="col-sm-3 control-label">Empolyer Name</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer1_name" type="text" class="form-control" placeholder="Employer Name" value="<?php echo $row_find_dlr_creditapp['applicant_employer1_name']; ?>">
                                        </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Empolyer Phone</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer1_phone" type="text" class="form-control" placeholder="Empolyer Phone" value="<?php echo $row_find_dlr_creditapp['applicant_employer1_phone']; ?>">
                                      </div>
									</div>

									<div class="form-group">

                                   	  <label class="col-sm-3 control-label">Employer Street Address:</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer1_addr" type="text" class="form-control" placeholder="Employer Street Address"  value="<?php echo $row_find_dlr_creditapp['applicant_employer1_addr']; ?>">
                                      </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Employer Street City:</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer1_city" type="text" class="form-control" placeholder="Employer Street City" value="<?php echo $row_find_dlr_creditapp['applicant_employer1_city']; ?>"   />
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
                                      <input id="applicant_employer1_zip" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer1_zip']; ?>"  placeholder="Employer Zip Code" />
                                      </div>

									</div>

  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Gross Monthly Income</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer1_salary_bringhome" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer1_salary_bringhome']; ?>"  placeholder="Gross Monthly Income" />
                                      </div>
									</div>
                                    
                                    
  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Income Interval:</label>
                                      <div class="col-sm-9">
                                            <select id="applicant_employer1_payday_freq" class="form-control">
                                 	  <?php do {  ?>
                                 	  <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], $row_find_dlr_creditapp['applicant_employer1_payday_freq']))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
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

                                    <div class="form-group">
                                        <!-- form input -->
                                      <label class="">Years And Months Working Here?</label>
                                      <br />
                                    </div>


                                    <div class="form-group">

                                      
                                   	  <label class="col-sm-3 control-label">Years:</label>
                                      <div class="col-sm-9">
                                        <select class="form-control" id="applicant_employer1_work_years">
                                          <option value="0 Years" <?php if (!(strcmp("0 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>0 Years</option>
                                          <option value="1 Year" <?php if (!(strcmp("1 Year", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>1 Year</option>
                                          <option value="2 Years" <?php if (!(strcmp("2 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>2 Years</option>
                                          <option value="3 Years" <?php if (!(strcmp("3 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>3 Years</option>
                                          <option value="4 Years" <?php if (!(strcmp("4 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>4 Years</option>
                                          <option value="5 Years" <?php if (!(strcmp("5 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>5 Years</option>
                                          <option value="6 Years" <?php if (!(strcmp("6 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>6 Years</option>
                                          <option value="7 Years" <?php if (!(strcmp("7 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>7 Years</option>
                                          <option value="8 Years" <?php if (!(strcmp("8 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>8 Years</option>
                                          <option value="9 Years" <?php if (!(strcmp("9 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>9 Years</option>
                                          <option value="10 Years" <?php if (!(strcmp("10 Years", $row_find_dlr_creditapp['applicant_employer1_work_years']))) {echo "selected=\"selected\"";} ?>>10 Years</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="form-group">
                                        <!-- form input -->
                                   	  <label class="col-sm-3 control-label">Months:</label>
                                      <div class="col-sm-9">
                                        <select class="form-control" id="applicant_employer1_work_months">
                                          <option value="0 Months" <?php if (!(strcmp("0 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>0 Months</option>
                                          <option value="1 Month" <?php if (!(strcmp("1 Month", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>1 Month</option>
                                          <option value="2 Months" <?php if (!(strcmp("2 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>2 Months</option>
                                          <option value="3 Months" <?php if (!(strcmp("3 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>3 Months</option>
                                          <option value="4 Months" <?php if (!(strcmp("4 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>4 Months</option>
                                          <option value="5 Months" <?php if (!(strcmp("5 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>5 Months</option>
                                          <option value="6 Months" <?php if (!(strcmp("6 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>6 Months</option>
                                          <option value="7 Months" <?php if (!(strcmp("7 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>7 Months</option>
                                          <option value="8 Months" <?php if (!(strcmp("8 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>8 Months</option>
                                          <option value="9 Months" <?php if (!(strcmp("9 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>9 Months</option>
                                          <option value="10 Months" <?php if (!(strcmp("10 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>10 Months</option>
                                          <option value="11 Months" <?php if (!(strcmp("11 Months", $row_find_dlr_creditapp['applicant_employer1_work_months']))) {echo "selected=\"selected\"";} ?>>11 Months</option>
                                        </select>
                                     </div>
                                    </div>



							<div class="form-group">
                            <label class="col-sm-3 contorl-label">Any Employer Work Comments:</label>
                                <div class="col-sm-9">
                          <textarea id="user_applicant_employer_notes" class="form-control textarea" placeholder="Employer Comments"><?php echo $row_find_dlr_creditapp['user_applicant_employer_notes']; ?></textarea>
                                </div>
                            </div>



                            <div class="form-group" id="data_3">
                                <label class="col-sm-3 control-label">Appointment Date:</label>

                                <div class="input-group date col-sm-9">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="applicant_appt_startunixtime" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_appt_startunixtime']; ?>">
                                </div>
                                
                            </div>

                           <div class="hr-line-dashed"></div>




  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Other Income Source:</label>
                                      <div class="col-sm-9">
                                        <select id="other_income_source" class="form-control">
                              <option value="2nd Job" <?php if (!(strcmp("2nd Job", $row_find_dlr_creditapp['applicant_other_income_source']))) {echo "selected=\"selected\"";} ?>>Second Job</option>
                              <option value="SSI" <?php if (!(strcmp("SSI", $row_find_dlr_creditapp['applicant_other_income_source']))) {echo "selected=\"selected\"";} ?>>Social Security Income</option>
<option value="Child Support" <?php if (!(strcmp("Child Support", $row_find_dlr_creditapp['applicant_other_income_source']))) {echo "selected=\"selected\"";} ?>>Child Support</option>
          <option value="Alimony" <?php if (!(strcmp("Alimony", $row_find_dlr_creditapp['applicant_other_income_source']))) {echo "selected=\"selected\"";} ?>>Alimony</option>
                                            </select>
                                       </div>
									</div>

  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Other Income Amount:</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_other_income_amount" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_other_income_amount']; ?>"  placeholder="Other Income Amount" />
                                      </div>
									</div>

  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Other Income Interval:</label>
                                      <div class="col-sm-9">
                                        <select id="applicant_other_income_when_rcvd" class="form-control">
                                          <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                                          <option value="Weekly" <?php if (!(strcmp("Weekly", $row_find_dlr_creditapp['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Weekly</option>
                                          <option value="Biweekly" <?php if (!(strcmp("Biweekly", $row_find_dlr_creditapp['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Biweekly</option>
                                          <option value="Semimonthly" <?php if (!(strcmp("Semimonthly", $row_find_dlr_creditapp['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Semimonthly</option>
                                          <option value="Monthly" <?php if (!(strcmp("Monthly", $row_find_dlr_creditapp['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Monthly</option>
                                          <option value="Yearly" <?php if (!(strcmp("Yearly", $row_find_dlr_creditapp['applicant_other_income_when_rcvd']))) {echo "selected=\"selected\"";} ?>>Yearly</option>
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
						
                                        <label class="col-sm-3 control-label">Previous Job Title:</label>
										<div class="col-sm-9">

                                        <input id="applicant_employer2_position" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer2_position']; ?>" placeholder="Previous Job Title" />
                                    	</div>
                                    </div>

                                    
									<div class="form-group">	
                                   	  <label class="col-sm-3 control-label">Empolyer Name:</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer2_name" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer2_name']; ?>" placeholder="Employer Name"  />
                                        </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Empolyer Phone:</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer2_phone" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer2_phone']; ?>" placeholder="Empolyer Phone"  />
                                      </div>
									</div>

									<div class="form-group">

                                   	  <label class="col-sm-3 control-label">Employer Street Address</label>
                                      <div class="col-sm-9">
                                        <input id="applicant_employer2_addr" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer2_addr']; ?>" placeholder="Empolyer Address"  />
                                      </div>
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Empolyer City:</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer2_city" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer2_city']; ?>" placeholder="Empolyer City"  />
                                      </div>
                                    </div>

									<div class="form-group">
                                                  <label class="col-sm-3 control-label">Empolyer State:</label>
                                                  <div class="col-sm-9">
                                                    <select class="form-control" id="applicant_employer2_state">
                                                      <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_employer2_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                                                      <?php
do {  
?>
                                                      <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_dlr_creditapp['applicant_employer2_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
									</div>

									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Zip</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer2_zip" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer2_zip']; ?>"  placeholder="Zip Code" />
                                      </div>

									</div>

  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Gross Monthly Income:</label>
                                      <div class="col-sm-9">
                                      <input id="applicant_employer2_salary_bringhome" type="text" class="form-control" value="<?php echo $row_find_dlr_creditapp['applicant_employer2_salary_bringhome']; ?>"  placeholder="Monthly Income" />
                                      </div>
									</div>
                                    
                                    
  									<div class="form-group">
                                   	  <label class="col-sm-3 control-label">Income Interval:</label>
                                      <div class="col-sm-9">
                                        <select id="applicant_employer2_payday_freq" class="form-control">
                                          <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_employer2_payday_freq']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                                          <option value="Weekly" <?php if (!(strcmp("Weekly", $row_find_dlr_creditapp['applicant_employer2_payday_freq']))) {echo "selected=\"selected\"";} ?>>Weekly</option>
                                          <option value="Biweekly" <?php if (!(strcmp("Biweekly", $row_find_dlr_creditapp['applicant_employer2_payday_freq']))) {echo "selected=\"selected\"";} ?>>Biweekly</option>
                                          <option value="Semimonthly" <?php if (!(strcmp("Semimonthly", $row_find_dlr_creditapp['applicant_employer2_payday_freq']))) {echo "selected=\"selected\"";} ?>>Semimonthly</option>
                                          <option value="Monthly" <?php if (!(strcmp("Monthly", $row_find_dlr_creditapp['applicant_employer2_payday_freq']))) {echo "selected=\"selected\"";} ?>>Monthly</option>
                                          <option value="Yearly" <?php if (!(strcmp("Yearly", $row_find_dlr_creditapp['applicant_employer2_payday_freq']))) {echo "selected=\"selected\"";} ?>>Yearly</option>
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
                                          <option value="0 Years" <?php if (!(strcmp("0 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>0 Years</option>
                                          <option value="1 Year" <?php if (!(strcmp("1 Year", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>1 Year</option>
                                          <option value="2 Years" <?php if (!(strcmp("2 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>2 Years</option>
                                          <option value="3 Years" <?php if (!(strcmp("3 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>3 Years</option>
                                          <option value="4 Years" <?php if (!(strcmp("4 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>4 Years</option>
                                          <option value="5 Years" <?php if (!(strcmp("5 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>5 Years</option>
                                          <option value="6 Years" <?php if (!(strcmp("6 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>6 Years</option>
                                          <option value="7 Years" <?php if (!(strcmp("7 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>7 Years</option>
                                          <option value="8 Years" <?php if (!(strcmp("8 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>8 Years</option>
                                          <option value="9 Years" <?php if (!(strcmp("9 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>9 Years</option>
                                          <option value="10 Years" <?php if (!(strcmp("10 Years", $row_find_dlr_creditapp['co_applicant_employer2_work_years']))) {echo "selected=\"selected\"";} ?>>10 Years</option>
                                        </select>
                                     </div>
                                    </div>


                                    <div class="form-group">
                                        <!-- form input -->
                                   	  <label class="col-sm-3 control-label">Months:</label>
                                      <div class="col-sm-9">
                                        <select class="form-control" id="applicant_employer2_work_months">
                                          <option value="0 Months" <?php if (!(strcmp("0 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>0 Months</option>
                                          <option value="1 Month" <?php if (!(strcmp("1 Month", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>1 Month</option>
                                          <option value="2 Months" <?php if (!(strcmp("2 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>2 Months</option>
                                          <option value="3 Months" <?php if (!(strcmp("3 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>3 Months</option>
                                          <option value="4 Months" <?php if (!(strcmp("4 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>4 Months</option>
                                          <option value="5 Months" <?php if (!(strcmp("5 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>5 Months</option>
                                          <option value="6 Months" <?php if (!(strcmp("6 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>6 Months</option>
                                          <option value="7 Months" <?php if (!(strcmp("7 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>7 Months</option>
                                          <option value="8 Months" <?php if (!(strcmp("8 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>8 Months</option>
                                          <option value="9 Months" <?php if (!(strcmp("9 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>9 Months</option>
                                          <option value="10 Months" <?php if (!(strcmp("10 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>10 Months</option>
                                          <option value="11 Months" <?php if (!(strcmp("11 Months", $row_find_dlr_creditapp['applicant_employer2_work_months']))) {echo "selected=\"selected\"";} ?>>11 Months</option>
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
                               Nearest Relative Information
                            </h3>
                            <div class="form-horizontal m-t-md">






										<div class="form-group">
                                        <label class="col-sm-3 control-label">First Name Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_fname" value="<?php echo $row_find_dlr_creditapp['applicants_realative1_fname']; ?>" placeholder="Name Of Nearest Realative">
                                        </div>
                                        </div>


										<div class="form-group">
                                        <label class="col-sm-3 control-label">Last Name Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_lname" value="<?php echo $row_find_dlr_creditapp['applicants_realative1_lname']; ?>" placeholder="Name Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">Relationship Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_relationship" value="<?php echo $row_find_dlr_creditapp['applicants_realative1_relationship']; ?>" placeholder="Relationship Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">Phone No. Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_mainphone" value="<?php echo $row_find_dlr_creditapp['applicants_realative1_mainphone']; ?>" placeholder="Phone No. Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">Address Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_address" value="<?php echo $row_find_dlr_creditapp['applicants_realative1_address']; ?>" placeholder="Address Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">City Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_address_city" value="<?php echo $row_find_dlr_creditapp['applicants_realative1_address_city']; ?>" placeholder="City Of Nearest Realative">
                                        </div>
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">State Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                          <select class="form-control" id="applicants_realative1_address_state" placeholder="State Of Nearest Realative">
                                            <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicants_realative1_address_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                                            <?php
do {  
?>
                                            <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_find_dlr_creditapp['applicants_realative1_address_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
                                        </div>

										<div class="form-group">
                                        <label class="col-sm-3 control-label">Zip Of Nearest Realative:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicants_realative1_address_zip" value="<?php echo $row_find_dlr_creditapp['applicants_realative1_address_zip']; ?>" placeholder="Zip Of Nearest Realative">
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
                            <h5>Credit Preview & Contract Information<small> Key: '<?php echo $applicant_app_token; ?></small></h5>
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
                                Credit Preview Information
                            </h3>
                            
                            <div class="form-horizontal m-t-md">


                                <div class="hr-line-dashed"></div>




									<div class="resume-details br-lblue animatedd">
										<!-- Heading -->
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Reason For Purchase?</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" id="user_applicant_employer_notes" rows="3" placeholder="Comments"><?php echo $row_find_dlr_creditapp['user_applicant_employer_notes']; ?></textarea>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Stock Number?</label>
                                        <div class="col-sm-9 input-group">
                                         
                                         <input type="text" class="form-control" id="applilcant_v_stockno" placeholder="Stock Number" value="<?php echo $row_find_dlr_creditapp['applilcant_v_stockno']; ?>">
                                         <span class="input-group-btn">
                                         <button id="pull_vbystock" type="button" class="btn btn-primary">Pull Stock</button>
                                         </span>
            
                                        </div>
                                       
                                       </div>
                            
                            
							<div id="vehicleFoundResult">
                             <input type="hidden" id="cust_vehicle_id" name="cust_vehicle_id" value="">

                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Year Make Model</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" id="applilcant_v_ymkmd_txt" value="<?php echo $row_find_dlr_creditapp['applilcant_v_ymkmd_txt']; ?>" placeholder="Year Make &amp; Model" />
                                        </div>
                                        </div>
                                    	
                            </div>
                                        
                                       

                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Vehicle Purchase VIN:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_vin" value="<?php echo $row_find_dlr_creditapp['applilcant_v_vin']; ?>" placeholder="VIN"  />
                                        </div>
                                        </div>

                                        <div class="form-group" style="display:block;">
                                        <label class="col-sm-3 control-label">Vehicle Purchase Year:</label><br />

										<div class="col-sm-9">
                                        <input type="text" id="applilcant_v_year" value="<?php echo $row_find_dlr_creditapp['applilcant_v_year']; ?>" class="form-control" placeholder="Year">
                                          </div>
                                        </div>
                                        

                                        <div class="form-group" style="display:block;">
                                        <label class="col-sm-3 control-label">Vehicle Purchase Make:</label><br />

                                        <div class="col-sm-9">
                                        <input type="text" id="applilcant_v_make" value="<?php echo $row_find_dlr_creditapp['applilcant_v_make']; ?>" class="form-control" placeholder="Make">

                                          </div>
                                        </div>
                                        

                                        <div class="form-group" style="display:block;">
                                        <label class="col-sm-3 control-label">Vehicle Purchase Model:</label><br />

                                        <div class="col-sm-9">
                                        <input type="text" id="applilcant_v_model" value="<?php echo $row_find_dlr_creditapp['applilcant_v_model']; ?>" class="form-control" placeholder="Model">
                                           </div>
                                        </div>



                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Vehicle Purchase Body Style:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_style" value="<?php echo $row_find_dlr_creditapp['applilcant_v_style']; ?>" placeholder="Body Style">
                                        </div>
                                        </div>

                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Vehicle Purchase Miles:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_inception_miles" value="<?php echo $row_find_dlr_creditapp['applilcant_v_inception_miles']; ?>" placeholder="Miles">
                                        </div>
                                        </div>

                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Vehicle Cash Price:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_cashprice" value="<?php echo $row_find_dlr_creditapp['applilcant_v_cashprice']; ?>" placeholder="Cash Price">
                                        </div>
                                        </div>


                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Taxes:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_taxes" value="<?php echo $row_find_dlr_creditapp['applilcant_v_taxes']; ?>" placeholder="Cash Price">
                                        </div>
                                        </div>


                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Doc Fees:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_doc_fees" value="<?php echo $row_find_dlr_creditapp['applilcant_v_doc_fees']; ?>" placeholder="Cash Price">
                                        </div>
                                        </div>


                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Title/Lic/Reg/Other Fees:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title_lic_reg_other_fees" value="<?php echo $row_find_dlr_creditapp['title_lic_reg_other_fees']; ?>" placeholder="Cash Price">
                                        </div>
                                        </div>






                                        </div>



                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Down Payment Available:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_cash_down" value="<?php echo $row_find_dlr_creditapp['applilcant_v_cash_down']; ?>" placeholder="$">
                                        </div>
                                        </div>

                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Rebate:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_rebate" value="<?php echo $row_find_dlr_creditapp['applilcant_v_rebate']; ?>" placeholder="$">
                                        </div>
                                        </div>

                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Trade Allowance:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_trade_allowance" value="<?php echo $row_find_dlr_creditapp['applilcant_v_trade_allowance']; ?>" placeholder="$">
                                        </div>
                                        </div>

                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Gap:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_gap" value="<?php echo $row_find_dlr_creditapp['applilcant_v_gap']; ?>" placeholder="$">
                                        </div>
                                        </div>


                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Service Contract:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_srvc_contract" value="<?php echo $row_find_dlr_creditapp['applilcant_v_srvc_contract']; ?>" placeholder="$">
                                        </div>
                                        </div>


                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Credit Life:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_credit_life" value="<?php echo $row_find_dlr_creditapp['applilcant_v_credit_life']; ?>" placeholder="$">
                                        </div>
                                        </div>

                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Disablity:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_disability" value="<?php echo $row_find_dlr_creditapp['applilcant_v_disability']; ?>" placeholder="$">
                                        </div>
                                        </div>

                                    


                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Disablity:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_financed_amount" value="<?php echo $row_find_dlr_creditapp['applilcant_v_financed_amount']; ?>" placeholder="$">
                                        </div>
                                        </div>


                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Term:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_term_months" value="<?php echo $row_find_dlr_creditapp['applilcant_v_term_months']; ?>" placeholder="$">
                                        </div>
                                        </div>


								<div id="pull_acutalpayments_handle" class="form-group">
                                        <label class="col-sm-3 control-label">APR Applicant Rate:</label>

                                    <div class="col-sm-9 input-group">

						
                        			<span class="input-group-addon"><a>Default APR: <?php echo $row_userDets['settingDefaultAPR']; ?></a></span>
			                        <input id="applilcant_v_cust_rate" type="text" maxlength="6" class="form-control" value="<?php echo $row_find_dlr_creditapp['applilcant_v_cust_rate']; ?>" autocomplete="off" placeholder="Applying For APR Rate">
                       			</div>
                                                           
                                </div>                                       




								<div id="pull_acutalpayments_handle" class="form-group">
                                        <label class="col-sm-3 control-label">Actual Payments:</label>

                                    <div class="col-sm-9 input-group">

						
                        			<span class="input-group-addon"><a>Default APR: <?php echo $row_userDets['settingDefaultAPR']; ?></a></span>
			                        <input id="applilcant_v_total_monthpmts_est" type="text" maxlength="6" class="form-control" value="" autocomplete="off" placeholder="$"> 
                       				<span class="input-group-btn"> 
                                    	<button id="tallyupPayments" type="button" class="btn btn-primary">Tally Up Payments!</button> 
                                    </span>
                       			</div>
                                                           
                                </div>                                       

                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Desired Monthly Payment:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_desired_mo_payment" value="<?php echo $row_find_dlr_creditapp['applicant_desired_mo_payment']; ?>" placeholder="Missing">
                                        </div>
                                        </div>


                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">WholeSale Invoice:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_wholesale_invoice" value="<?php echo $row_find_dlr_creditapp['applilcant_v_wholesale_invoice']; ?>" placeholder="$">
                                        </div>
                                        </div>

                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">MSRP:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_msrp" value="<?php echo $row_find_dlr_creditapp['applilcant_v_msrp']; ?>" placeholder="$">
                                        </div>
                                        </div>
												




                                    
                                    
									
                                    
                                    
                                    
                                    
                                    
                                    
                                   
										<!-- Heading -->
                                    
                                    	<div class="form-group">

                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Year Of Current Vehicle?</label>
                                         
                                         
                                        <div class="col-sm-9">
                                       
                                        <input type="hidden" id="trade_ymk_txt" value="<?php echo $row_find_dlr_creditapp['applilcant_v_year']; ?> <?php echo $row_find_dlr_creditapp['applilcant_v_make']; ?> <?php echo $row_find_dlr_creditapp['applilcant_v_model']; ?> <?php echo $row_find_dlr_creditapp['applilcant_v_style']; ?>" disabled="disabled" />
                                        
                                        
                                        <select class="form-control" id="applilcant_v_trade_year">
                                          <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applilcant_v_trade_year']))) {echo "selected=\"selected\"";} ?>>Select Year</option>
                                          <?php
do {  
?>
                                          <option value="<?php echo $row_autoYears['year']?>"<?php if (!(strcmp($row_autoYears['year'], $row_find_dlr_creditapp['applilcant_v_trade_year']))) {echo "selected=\"selected\"";} ?>><?php echo $row_autoYears['year']?></option>
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
                                          <select class="form-control" id="applilcant_v_trade_make">
                                            <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applilcant_v_trade_make']))) {echo "selected=\"selected\"";} ?>>Select Make</option>
                                            <?php
do {  
?>
                                            <option value="<?php echo $row_vmakes['car_make']?>"<?php if (!(strcmp($row_vmakes['car_make'], $row_find_dlr_creditapp['applilcant_v_trade_make']))) {echo "selected=\"selected\"";} ?>><?php echo $row_vmakes['car_make']?></option>
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

                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Model Of Current Vehicle?</label>
                                        
                                        <div class="col-sm-9">
                                          <select class="form-control" id="applilcant_v_trade_model">
                                            <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applilcant_v_trade_model']))) {echo "selected=\"selected\"";} ?>>Models</option>
                                          </select>
                                        </div>
                                        </div>



                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Are you currently financing this vehicle?</label>
                                        
                                         
                                        	<div class="col-sm-9">
                                              <select id="applicant_open_autoloan" class="form-control">
                                                <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_open_autoloan']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                                                <option value="Yes" <?php if (!(strcmp("Yes", $row_find_dlr_creditapp['applicant_open_autoloan']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                                <option value="No" <?php if (!(strcmp("No", $row_find_dlr_creditapp['applicant_open_autoloan']))) {echo "selected=\"selected\"";} ?>>No</option>
                                              </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Are you interested in refinancing this vehicle?</label>
										<div class="col-sm-9">
                                          <select id="applicant_open_to_refinanceautoloan" class="form-control">
                                            <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_open_to_refinanceautoloan']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                                            <option value="Yes" <?php if (!(strcmp("Yes", $row_find_dlr_creditapp['applicant_open_to_refinanceautoloan']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                            <option value="No" <?php if (!(strcmp("No", $row_find_dlr_creditapp['applicant_open_to_refinanceautoloan']))) {echo "selected=\"selected\"";} ?>>No</option>
                                          </select>
                                          </div>
                                        </div>



                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Name Of Finance Company?</label>
                                        <div class="col-sm-9">

                                        <input type="text" id="applilcant_v_trade_lien_holder_name" class="form-control" placeholder="Name Of Finance Company?" value="<?php echo $row_find_dlr_creditapp['applilcant_v_trade_lien_holder_name']; ?>">
										</div>
                                        </div>
                                    
                                    	<div class="form-group">
                                        <label class="col-sm-3 control-label">Current Car Payment?</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applicant_open_autoloan_pymt" value="<?php echo $row_find_dlr_creditapp['applicant_open_autoloan_pymt']; ?>" placeholder="Current Car Payment?"  />
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
                                            <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_open_to_trading']))) {echo "selected=\"selected\"";} ?>>Select One</option>
                                            <option value="No" <?php if (!(strcmp("No", $row_find_dlr_creditapp['applicant_open_to_trading']))) {echo "selected=\"selected\"";} ?>>No</option>
                                            <option value="Yes" <?php if (!(strcmp("Yes", $row_find_dlr_creditapp['applicant_open_to_trading']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                          </select>
                                          </div>
										</div>


                                        
                                    <div id="yesTradeVehicle_block" style="display:block;">
                                        
                                       	<div class="form-group">
                                        <label class="col-sm-3 control-label">Remaining Balance Owed On This Vehicle?</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="applilcant_v_trade_owed" value="<?php echo $row_find_dlr_creditapp['applilcant_v_trade_owed']; ?>" placeholder="Balance On Current Vehicle"  />
                                        </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Reason For Trade?</label>
                                        <div class="col-sm-9">
									<textarea class="form-control" id="user_comments_trade_notes" rows="2" placeholder="Reason For Trade?"><?php echo $row_find_dlr_creditapp['user_comments_trade_notes']; ?></textarea>                                        
										</div>
                                        </div>
									
                                    </div>
                                    
                                    
                                    
												


                                    
                              
                                    
                                    
                                    



                          		
                                
							</div>


                        </div>
                    </div>
					</div>
                    
                    
                    
                    
                    

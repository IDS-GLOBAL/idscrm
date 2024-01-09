<?php include("db_loggedin.php"); ?>
<?php
if(!$row_find_vehicle['vid'])  header("Location: inventory.php");

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_assoc($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_transm = "SELECT DISTINCT `vehicles`.`vtransm` FROM vehicles WHERE `vehicles`.`vtransm` not IN ('NULL')";
$distinct_transm = mysqli_query($idsconnection_mysqli, $query_distinct_transm);
$row_distinct_transm = mysqli_fetch_assoc($distinct_transm);
$totalRows_distinct_transm = mysqli_num_rows($distinct_transm);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_bodystyles = "SELECT * FROM body_styles ORDER BY body_style_name ASC";
$query_bodystyles = mysqli_query($idsconnection_mysqli, $query_query_bodystyles);
$row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
$totalRows_query_bodystyles = mysqli_num_rows($query_bodystyles);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Add Vehicle: <?php echo $row_userDets['company']; ?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

        <?php include("_sidebar.php"); ?>


    <div id="page-wrapper" class="gray-bg">
                
                <?php include("_nav_top.php"); ?>


<div class="wrapper wrapper-content animated fadeInRight">
            
                    
    
                <div class="row">
                
                
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Vehicle Credentials</h5>
                                <input id="vid" type="hidden" value="<?php echo $row_find_vehicle['vid']; ?>" />
                                <input id="thisdid" type="hidden" value="<?php echo $did; ?>" />
    
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            
                            
                            <div class="ibox-content">


                             <div class="row">

                               <div class="form-inline">

								<?php if($row_find_vehicle['vthubmnail_file']){ ?>
                               <div class="form-group">									
								
								<?php	showphoto ($cvid=$row_find_vehicle['vid']);  ?>

                               </div>
                               
                               <?php } ?>
                               
                               <div class="form-group">
                               		<div class="col-lg-12 col-large">VIN: <?php echo $row_find_vehicle['vvin']; ?></div>
                               </div>
                                <div class="hr-line-dashed"></div>
                               
                                
                                    <div class="form-group">
                                         <div id="vinYearResult" class="col-lg-2 col-large"><?php echo $row_find_vehicle['vyear']; ?></div>
                                    </div>

                                    <div class="form-group">
                                         <div id="vinMakeResult" class="col-lg-3 col-large"><?php echo $row_find_vehicle['vmake']; ?></div>
                                    </div>

                                    <div class="form-group">
                                         <div id="vinModelResult" class="col-lg-12 col-large"><?php echo $row_find_vehicle['vmodel']; ?></div>
                                    </div>

                                    <div class="form-group">
                                         <div id="vinTrimResult" class="col-lg-12 col-large"><?php echo $row_find_vehicle['vtrim']; ?></div>
                                    </div>
                                
                                
                                                                            
                                            <input id="vin_year" type="hidden" placeholder="Year Of Vehicle" class="form-control" value="" disabled="disabled">

                                            <input id="vin_make" type="hidden" placeholder="Make Of Vehicle" class="form-control" value="" disabled="disabled">

                               </div>                              
                               <div class="hr-line-dashed"></div>
                               
                               <div class="form-inline">
                                    
                                    

                                    <div class="form-group">
                                         
                                         <label for="vmileage" class="control-label">Mileage: </label><br />
                                         <span class="cnt-step">2</span><input type="text" placeholder="Mileage" id="vmileage" class="form-control" style="width: 100px !important;" value="<?php echo $row_find_vehicle['vmileage']; ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="vstockno" class="control-label">Stock Number: </label>
                                        
                                        <br />
                                         <span class="cnt-step">3</span><input type="text" placeholder="Stock Number" id="vstockno" class="form-control" style="width: 150px !important;" value="<?php echo $row_find_vehicle['vstockno']; ?>"> 
                                        
                                        
                                    </div>




                                    <div class="form-group">
                                        <label for="vbody" class="col-sm-10 control-label">Body Style: </label><br />
                                         <span class="cnt-step">4</span>
<select id="vbody" name="vbody" class="form-control">
<option value="" <?php if (!(strcmp("", $row_find_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Select Body Style</option>
<?php
do {  
?>
<option value="<?php echo $row_query_bodystyles['body_style_name']?>"<?php if (!(strcmp($row_query_bodystyles['body_style_name'], $row_find_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_bodystyles['body_style_name']?></option>
<?php
} while ($row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles));
  $rows = mysqli_num_rows($query_bodystyles);
  if($rows > 0) {
      mysqli_data_seek($query_bodystyles, 0);
	  $row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
  }
?>
  </select>
                                      </div>

                                                            
                                    <div class="hr-line-dashed"></div>
                                    
                                    
                                    
                               <div id="features_wave_one" class="form-inline">
                                    
                                    <div class="form-group">
                                        <label for="vexterior_color" class="col-sm-12 control-label">Exterior Color: </label><br />
                                        <span class="cnt-step">5</span>
  <select name="vexterior_color" id="vexterior_color" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_find_vehicle['vecolor']))) {echo "selected=\"selected\"";} ?>>Select Color</option>
    <?php
do {  
?>
    <option value="<?php echo $row_colors_hex['color_hex']?>"<?php if (!(strcmp($row_colors_hex['color_hex'], $row_find_vehicle['vecolor']))) {echo "selected=\"selected\"";} ?>><?php echo $row_colors_hex['color_name']?></option>
    <?php
} while ($row_colors_hex = mysqli_fetch_assoc($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_assoc($colors_hex);
  }
?>
  </select>


                                    </div>
                                    <div class="form-group">
                                         
                                         <label for="vinterior_color" class="col-sm-12 control-label">Interior Color: </label><br />
                                         <span class="cnt-step">6</span>
                 <select name="vinterior_color" id="vinterior_color" class="form-control">
                   <option value="" <?php if (!(strcmp("", $row_find_vehicle['vicolor']))) {echo "selected=\"selected\"";} ?>>Select Color</option>
                   <?php
do {  
?>
                   <option value="<?php echo $row_colors_hex['color_hex']?>"<?php if (!(strcmp($row_colors_hex['color_hex'], $row_find_vehicle['vicolor']))) {echo "selected=\"selected\"";} ?>><?php echo $row_colors_hex['color_name']?></option>
                   <?php
} while ($row_colors_hex = mysqli_fetch_assoc($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_assoc($colors_hex);
  }
?>
    </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="vcylinders" class="col-sm-10 control-label">Cylinders: </label><br />
                                         <span class="cnt-step">7</span>
                                         <select id="vcylinders" name="vcylinders" class="form-control">
<option value="" <?php if (!(strcmp("", $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>Select Cylinders</option>
<option value="3" <?php if (!(strcmp(3, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>3 Cylinders</option>
<option value="4" <?php if (!(strcmp(4, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>4 Cylinders</option>
<option value="6" <?php if (!(strcmp(6, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>6 Cylinders</option>
<option value="8" <?php if (!(strcmp(8, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>8 Cylinders</option>
<option value="10" <?php if (!(strcmp(10, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>10 Cylinders</option>
<option value="12" <?php if (!(strcmp(12, $row_find_vehicle['vcylinders']))) {echo "selected=\"selected\"";} ?>>12 Cylinders</option>
                                         </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="vfueltype" class="col-sm-10 control-label">Fuel Type: </label><br />
                                         <span class="cnt-step">8</span>
<select id="vfueltype" name="vfueltype" class="form-control">
<option value="" <?php if (!(strcmp("", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Select Fuel Type</option>
<option value="Gasoline" <?php if (!(strcmp("Gasoline", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Gasoline</option>
<option value="Diesel" <?php if (!(strcmp("Diesel", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Diesel</option>
<option value="Hybrid" <?php if (!(strcmp("Hybrid", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Hybrid</option>
<option value="Electric" <?php if (!(strcmp("Electric", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Electric</option>

                                         </select>
                                                                             </div>

                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group alltheway">
                                        <label for="vtransm" class="col-sm-2 control-label">Transmission:</label>
    
                                            <div class="col-lg-10">
                                            <span class="cnt-step">9</span>
<select class="form-control m-b" id="vtransm"  name="vtransm">
                    <option value="" <?php if (!(strcmp("", $row_find_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>>Select Transmission</option>
                    <?php
do {  
?>
<option value="<?php echo $row_distinct_transm['vtransm']?>"<?php if (!(strcmp($row_distinct_transm['vtransm'], $row_find_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>><?php echo $row_distinct_transm['vtransm']?></option>
<?php
} while ($row_distinct_transm = mysqli_fetch_assoc($distinct_transm));
  $rows = mysqli_num_rows($distinct_transm);
  if($rows > 0) {
      mysqli_data_seek($distinct_transm, 0);
	  $row_distinct_transm = mysqli_fetch_assoc($distinct_transm);
  }
?>
    </select>
                                           
                                           </div>
                                    </div>                                    


                                    <div class="form-group alltheway">
                                        <label for="vengine" class="col-sm-2 control-label" placeholder="Example 3.8 L">Engine Desscription:</label>
    
                                        <div class="col-lg-10">
                                        <span class="cnt-step">10</span>
                                        <input class="form-control m-b alltheway"  id="vengine"  name="vengine" value="<?php echo $row_find_vehicle['vengine']; ?>" />
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group alltheway">
                                        <label for="vlivestatus" class="col-sm-2 control-label">Vehicle Status:</label>
    
                                        <div class="col-lg-10">
                                        <span class="cnt-step">11</span>
                                        <select class="form-control m-b"  id="vlivestatus"  name="vlivestatus">
                                          <option value="0" <?php if (!(strcmp(0, $row_find_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>KEEP ON HOLD</option>
                                          <option value="1" <?php if (!(strcmp(1, $row_find_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>GO LIVE</option>
                                          <option value="9" <?php if (!(strcmp(9, $row_find_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>SOLD!</option>
                                        </select></div>
                                    </div>
                                    
    
                                    <div class="form-group alltheway">
                                        
                                        <label class="col-sm-2 control-label">Vehicle Condition:</label>
    
                                            <div class="col-lg-10">
                                            <span class="cnt-step">12</span>
                <select class="form-control m-b" id="vcondition"  name="vcondition">
                <option value="" >Select Vehicle Condition</option>
                <option value="Used" <?php if (!(strcmp("Used", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Used</option>
                <option value="New" <?php if (!(strcmp("New", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>New</option>
                <option value="Trade-In" <?php if (!(strcmp("Trade-In", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Trade-In</option>
                <option value="Salvage" <?php if (!(strcmp("Salvage", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Salvage</option>
                                            </select></div>
                                    </div>                                    
                                    



                        
                             <div class="ibox-content cum">


                                    <div class="hr-line-dashed"></div>
                                                                     
                                     <div class="checkbox m-l m-r-xs">
                                         <div id="createVehicleResult"></div>
                                         <div id="vvinfeedback"></div>
                                         <input id="vinFullpassornot" class="vinFullpassornot" type="hidden" value="" />
                                     </div>

                                    <div class="hr-line-dashed"></div>
                                                                             
                                     <div class="checkbox m-l m-r-xs">
                                         <input id="vinYearpassornot" class="vinYearpassornot" type="hidden" value="" />
                                         <input id="vinMakepassornot" class="vinMakepassornot" type="hidden" value="" />
                                         <input id="vinModelpassornot" class="vinModelpassornot" type="hidden" value="" />
                                         

                                     </div>
                             
                            </div>
                        
                                   
                                        
                                   
                                 
                                 
                                 </div>
                                    
                                    


                        
                        
                                   
                                        
                                   
                                 
                                 
                           </div>
                                
                             </div>
                                 
                            </div>
                            
                            
                            
                        </div>
                    </div><!-- End First Box -->
                    
                    
                    
                    
                    
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Vehicle Cost Section</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <form class="form-horizontal">
                                        <p>Sign in today for more expirience.</p>
                                        <div class="form-group"><label class="col-lg-3 control-label">Purchase Cost</label>
        
                                            <div class="col-lg-9"><input id="vpurchasecost" type="text" class="form-control"  placeholder="Purchase Cost"> 
                                            <span class="help-block m-b-none">Example block-level help text here.</span>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Pack. Fee(s)</label>
        
                                            <div class="col-lg-9"><input id="vdlrpack" type="text" class="form-control" placeholder="Dealer Pack">
                                            <span class="help-block m-b-none">Total Misc Fee(s) also known as dealer pack.</span>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Misc. Fee(s)</label>
        
                                            <div class="col-lg-9"><input id="vaddedcost" type="text" placeholder="Misc. Fee" class="form-control" value="">
                                            <span class="help-block m-b-none">Total Misc Fee(s) also known as dealer pack.</span>
                                            </div>
                                        </div>
                                        
                                        
                                        <input type="hidden" id="idspackfee" value="" />
                                        <input type="hidden" id="vtotal_cost" value="" />
                                        
                                    </form>
                                </div>
                            </div>
                        </div>                	
                
                </div>
                


                <div id="iknowmorebox" style="display: none;">
                
                        <h2>Hi Hide Me/ Show Me</h2>
                
                
                </div>

			<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                        
                        
                                <div align="center">
                                
                                <button id="updatecar"  class="btn btn-primary btn-lg" type="button">Save &amp; Continue</button>

								
                                
                                </div>

                        
                        
                        </div>
                    </div>
                 </div>
			</div>


</div>
            
            
    			<?php include("_footer.php"); ?>
    
    </div>
    
    
    </div>





               
                        	
<!-- Start Modals --> 

	<!-- Start Deal Matrix Modal -->                       
                    <div class="row">
                    

<div id="dealMatrix_Modal" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                
                                                <div class="modal-body">
                    <div class="row">
                    	<h2>Deal Matrix Modal</h2>
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Vehicle Pricing Information <small>Change Retail, Special Price And Downpayment Information</small></h5>
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
                                                <div class="form-group"><label>Retail: </label> <input id="vrprice" type="text" placeholder="Retail: " class="form-control" value="<?php echo $row_find_vehicle['vrprice']; ?>"></div>
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
</p>

                                    	<p><a id="updatecar" class="btn btn-primary btn-lg" href="#"><strong>Save &amp; Finish</a></p>
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

<!-- Start Safe Modal --> 
<div style="display:none;">

                                         <div class="form-group">
                                         <button type="button" id="goFurther">Go Futher</button> 
                                         
                                         </div>

                                         <div class="form-group">
                                         
                                         <button type="button" id="addContinue">Add & Continue</button>
                                         </div>

                                    
                                    <button type="button" class="btn btn-default" id="more_inventoryactions">I Know More</button>
                                    
                                    <button type="button" class="btn btn-default" id="addinventory">Add Inventory</button>



</div>
<!-- End Start Safe Modal --> 



    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

	<!-- Custom -->
	<script src="js/edit.inventory.js"></script>

    <!-- iCheck
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
     -->
    
    
</body>

</html>

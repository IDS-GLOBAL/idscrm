<?php include("db_manager_loggedin.php"); ?>
<?php

//if(!$row_find_vehicle['vid'])  header("Location: inventory.php");
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM `auto_years` ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_assoc($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

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

    <title>IDSCRM | Add Inventory</title>

	<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
					<?php include("_nav_top.manager.php"); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add Vehicle</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.inventory.php?vstat=1">Inventory</a>
                        </li>
                        <li class="active">
                            <strong>Inventory Add</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">



            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Information <small>Enter Information Below Related to this vehicle.</small></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">














<div id="vin_enter_block" class="form-group" style="display:none;">
				<label class="col-sm-2 control-label">Enter Vin: </label>                
                <div class="col-sm-10">
                                    
                                    
                                    
                                        <div class="input-group m-b">
                <input id="vin_char_count" type="text" value="0" />
                <input id="pass_vin_good" type="text" value="0" />
                <input id="transfer_vin" type="text" value="0" />
                
                <input id="vin_code_make" type="text" value="" size="3" />
                <input id="vin_code_model" type="text" value="" size="3" />
                <input id="vin_last_six" type="text" value="" size="6" />
				
                <input id="vinModelpassornot" type="text" value="">
                
                <span id="vin_go_to"></span>
                            

                
                </div>
                </div>
                
                
                
</div>                






















                        
                        




                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">VIN:<br /><div id="vvinfeedback"></div></label>
									




                                    <div class="col-sm-10">
                                    
                                    
                                    
                                        <div id="vin_highlight" class="input-group m-b">
                                        
                        <span class="input-group-addon">VIN <span id="vin_charcount">Empty</span></span>
                        <input id="vvin" type="text" name="vvin" maxlength="17" class="form-control"> 
                       <span class="input-group-btn"> <button id="decode_vin" type="button" class="btn btn-primary">PASS VIN!</button> </span>



                                        </div>
                                        
                                        <div class="row">
                                        	<div class="inline">

                            <div id="vinYearResult" class="col-sm-3">Year</div>
                            <div id="vinMakeResult" class="col-sm-3">Make</div>
                            <div id="vinModelResult" class="col-sm-3">Model</div>
                                            
                                            
                                            </div>
                                        </div>
                                    
                                    </div><!-- End Col-sm-10 -->
                                </div>





                                <div class="hr-line-dashed"></div>

 <div id="vehicle_first_part" style="display:none;">                    
                        
                                <div class="form-group"><label for="vstockno" class="col-sm-2 control-label">Stock No:</label>

                                    <div class="col-sm-10">
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="input-group m-b">
                                    
                                    
                                    
<span id="uselast6ofvin" class="input-group-addon">Use Last Six of VIN</span>
<input id="vstockno" type="text" class="form-control">
    <span class="input-group-btn">
        <button type="button" class="btn btn-primary">Stock Check!</button> 
    </span> 

                                    
                                    
                                    
                                    
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                
                                
                                <div class="form-group"><label for="vcondition" class="col-sm-2 control-label">Condition:</label>

                                    	<div class="col-sm-10">
		                                    <select class="form-control m-b" id="vcondition">
                                                <option value="">Select Vehicle Condition</option>
                                                <option value="Used">Used</option>
                                                <option value="New">New</option>
                                                <option value="Trade-In">Trade-In</option>
                                                <option value="Salvage">Salvage</option>
                                            </select>
                                        </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label for="vlivestatus" class="col-sm-2 control-label">Online Status:</label>

                                    <div class="col-sm-10"><select class="form-control m-b" id="vlivestatus">
                                              <option value="0">KEEP ON HOLD</option>
                                              <option value="1">GO LIVE</option>
                                              <option value="9">SOLD!</option>
                                              
                                            </select></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                        
                        
                        
                        
<p>
                            <button id="continue_add_vehicle" type="button" class="btn btn-block btn-outline btn-primary"><i class="fa fa-arrow-down"></i> Continue</button>
                        </p>                        
                        





</div><!-- End Vehicle Show First Part -->








                        
                        
                        
							</div>                        
                        </div>
                   </div>
               </div>
           </div>



<div id="vehicle_input_section" class="panel blank-panel" style="display:none;">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md"><h4>Add Vehicle</h4></div>
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class=" fa fa-car fa-3x"></i> Vehicle Information</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-tachometer fa-3x"></i> Warranty/Features</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-plug fa-3x"></i> Fees & Cost</a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">





            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Information <small>Enter Information Below Related to this vehicle.</small></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                            
                          
                            
                            

                                <div class="form-group"><label for="vyear" class="col-sm-2 control-label">Year:</label>

                                    <div class="col-sm-10"><select name="vyear" id="vyear" class="form-control">
                                      <option value="">Select Year</option>
                                      <?php
do {  
?>
                                      <option value="<?php echo $row_carYears['year']?>"><?php echo $row_carYears['year']?></option>
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
                                    <option value="<?php echo $row_vmakes['car_make']?>"><?php echo $row_vmakes['car_make']?></option>
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

                                    <div class="col-sm-10">                                            <select id="vmodel" class="form-control">
                                            	<option value="">Select Model</option>

                                            </select>
</div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vtrim" class="col-sm-2 control-label">Trim:</label>

                                    <div class="col-sm-10"><input id="vtrim" type="text" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vbody" class="col-sm-2 control-label">Body Style:</label>

                                    <div class="col-sm-10"><select id="vbody" type="text" class="form-control">
                                      <option value="">Select Body</option>
                                      <?php
do {  
?>
                                      <option value="<?php echo $row_query_bodystyles['body_style_name']?>"><?php echo $row_query_bodystyles['body_style_name']?></option>
                                      <?php
} while ($row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles));
  $rows = mysqli_num_rows($query_bodystyles);
  if($rows > 0) {
      mysqli_data_seek($query_bodystyles, 0);
	  $row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
  }
?>
                                    </select></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vmileage" class="col-sm-2 control-label">Mileage:</label>

                                    <div class="col-sm-10"><input id="vmileage" type="text" class="form-control" placeholder="i.e., 28451"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vecolor_txt" class="col-sm-2 control-label">Exterior Color:</label>

                                    <div class="col-sm-10">
                                <select id="vecolor_txt" class="form-control">
                                  <option value="">Select Color</option>
                                  <?php do {  ?>
                      <option value="<?php echo $row_colors_hex['color_hex']?>"> <?php echo $row_colors_hex['color_name']; ?> </option>
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

                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vicolor_txt" class="col-sm-2 control-label">Interior Color:</label>

                                    <div class="col-sm-10">
                                    <select id="vicolor_txt" class="form-control">
                                  <option value="">Select Color</option>
                                  <?php do {  ?>
                      <option value="<?php echo $row_colors_hex['color_hex']?>"> <?php echo $row_colors_hex['color_name']; ?> </option>
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
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vcustomcolor" class="col-sm-2 control-label">Custom Color:</label>

                                    <div class="col-sm-10"><input id="vcustomcolor" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vtransm" class="col-sm-2 control-label">Transmission:</label>

                                    <div class="col-sm-10">
                                    
                                  <select id="vtransm" class="form-control">
                                          <option value="">Select Transmission</option>
                                            <option value="Manual">Manual</option>
                                            <option value="Automatic Trans.">Automatic Trans.</option>
                                            <option value="Automatic">Automatic</option>
                                            <option value="Variable">Variable</option>
                                            <option value="Manual Trans.">Manual Trans.</option>
                                 </select>

                                    
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>








                                <div class="form-group"><label for="vengine" class="col-sm-2 control-label">Engine Description:</label>

                                    <div class="col-sm-10"><input id="vengine" type="text" class="form-control" placeholder="i.e., 2.5L DOHC"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vcylinders" class="col-sm-2 control-label">Cylinders:</label>

                                    <div class="col-sm-10">
                                    <select id="vcylinders" class="form-control">
                                           	<option value="">Select Cylinders</option>
                                            	<option value="3">3</option>
                                            	<option value="4">4</option>
                                            	<option value="6">6</option>
                                            	<option value="8">8</option>
                                            	<option value="10">10</option>
                                            	<option value="12">12</option>
									</select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vfueltype" class="col-sm-2 control-label">Fuel Type:</label>

                                    <div class="col-sm-10">

                                         <select id="vfueltype" name="vfueltype" class="form-control">
                                            <option value="">Select Fuel Type</option>
                                            <option value="Gasoline">Gasoline</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Hybrid">Hybrid</option>
                                            <option value="Electric">Electric</option>

                                         </select>


                                    
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vdoors" class="col-sm-2 control-label">Doors:</label>

                                    <div class="col-sm-10">
                                    
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
                                <div class="form-group"><label for="vcomments" class="col-sm-2 control-label">Vehicle Comments</label>

                                    <div class="col-sm-10"><textarea id="vcomments" type="text" class="form-control textarea"  placeholder="comments"></textarea></div>
                                </div>







                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label id="vrprice" class="col-sm-2 control-label">Retail Price:</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vrprice" type="text" class="form-control"> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label id="vspecialprice" class="col-sm-2 control-label">Special Price:</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vspecialprice" type="text" class="form-control"> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>


                                <div class="form-group"><label id="vdprice" class="col-sm-2 control-label">Downpayment Price:</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vdprice" type="text" class="form-control"> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>








                                <div class="hr-line-dashed"></div>
                            </div>
                            
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>




                                </div>

                                <div id="tab-2" class="tab-pane">
                                
                                
                                
                                
                                
                                
                                
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Options <small>Window Sticker Options</small></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                            

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vehicle_mpg_city" class="col-sm-2 control-label">Vehicle MPG City:</label>

                                    <div class="col-sm-10"><input id="vehicle_mpg_city" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vehicle_mpg_hwy" class="col-sm-2 control-label">Vehicle MPG Highway:</label>

                                    <div class="col-sm-10"><input id="vehicle_mpg_hwy" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vehicle_mpg_combined" class="col-sm-2 control-label">Vehicle MPG Combined</label>

                                    <div class="col-sm-10"><input id="vehicle_mpg_combined" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                            
                            <div class="form-group"><label class="col-sm-2 control-label">Exterior Options</label>

                                    <div class="col-sm-10">


                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Alloy_Wheels" >Alloy Wheels</label> 

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Bed_Liner">Bed Liner</label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Illuminated_Lightning">Illuminated Ground Lighting</label>


                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Rear_Window_Defroster">Rear Window Defroster </label>
                                        

                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Running_Boards"> Running Boards </label> 



                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Sliding_Doors">Sliding Doors</label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Tinted_Glass">Tinted Glass</label>


                                        
                                        
                                        
                                        
                                        
                                        </div>
                                </div>


                            <div class="hr-line-dashed"></div>


                            <div class="form-group"><label class="col-sm-2 control-label">Interior Options</label>

                                    <div class="col-sm-10">

                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Air_Conditioning"> A/C </label> 
                                   
                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Memory_Seats">  Memory Seats </label>
                                        
                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Power_Mirrors"> Power Mirrors </label> 
                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Power_Seats"> Power Seats </label> 
                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Power_Door_Locks"> Power Door Locks </label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Power_Steering">Power Steering </label>
                                        


                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Power_Windows">Power Windows </label>
                                        
                                        
                                        
                                        
                                        
                                        
                                        </div>
                                </div>

                            <div class="hr-line-dashed"></div>


                            <div class="form-group"><label class="col-sm-2 control-label">Safety Security</label>

                                    <div class="col-sm-10">
                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Passenger_Air_Bag"> Passenger Air Bags </label> 

                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Side_Air_Bag"> Side Air Bags </label> 
                                   
                                   
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Keyless_Entry">Keyless Entry</label>
                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Push_Button_Start">Push Button Start</label>
                                        

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Theft_System">Theft Deterrent System & Alarm</label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="AntiLock_Brakes">Anti-Lock Brakes (ABS)</label>

                                        







                                        </div>


                                </div>





                                <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Comfort & Convenience</label>

                                    <div class="col-sm-10">


                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Leather_Seats">Leather Seats</label>


                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Auto_Updown_Windows"> Auto Up/Down Front Driver's Window</label> 

                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Bluetooth_Handsfree"> Bluetooth Hands-Free </label>


                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Climate_Control"> Climate Control</label> 

                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Cruise_Control"> Cruise Control</label> 
                                    

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Navigation_System"> Navigation System </label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Rear_view_monitor"> Rear View Monitor </label>


                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Rear_Ent_Center"> Rear Ent. Center </label>
                                        

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Satellite_Radio"> Satellite Radio	 </label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="SunroofMoonroof"> Sunroof/Moonroof </label>
                                        
                                        
       
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Television"> Television </label>
                                 
                                        
                                        
                                        
                                        </div>
                                </div>





                                <div class="hr-line-dashed"></div>





                    <div class="form-group">
                    <label class="col-sm-2 control-label">Warranty Information</label>

                                    <div class="col-sm-10">
                                    
                                        <div class="input-group m-b">
                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-white" type="button">1st. Warranty</button>
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button" aria-expanded="false"><span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">30 Days / 3 Month Warranty</a></li>
                                                    <li><a href="#">3 Years / 36,000 Miles</a></li>
                                                    <li><a href="#">3 Years / 36,000 Miles</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Make New Warranty Item</a></li>
                                                </ul>
                                            </div>
                                            <input id="v_warranty_one" type="text" class="form-control"></div>
                                        
                                        
                                        
                                        <div class="input-group m-b">
                                        <input id="v_warranty_two" type="text" class="form-control">

                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-white" type="button">2nd. Warranty</button>
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="#">30 Days / 3 Month Warranty</a></li>
                                                    <li><a href="#">3 Years / 36,000 Miles</a></li>
                                                    <li><a href="#">3 Years / 36,000 Miles</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Make New Warranty Item</a></li>
                                                </ul>
                                            </div>
                                            </div>
                                    



                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroption1chck" type="checkbox"> </span> <input  id="dlroption1"type="text" class="form-control"  placeholder="Extended Dealer Option 1"></div>
                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroption2chck" type="checkbox"> </span> <input  id="dlroption2"type="text" class="form-control"  placeholder="Extended Dealer Option 2"></div>



                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroption3chck" type="checkbox"> </span> <input  id="dlroption3"type="text" class="form-control"  placeholder="Extended Dealer Option 3"></div>




                                    
                                    
                                    </div>
                                </div>




                                <div class="hr-line-dashed"></div>



								<div class="form-group">
									<label class="col-sm-2 control-label">Optional Equipment</label>

                                    <div class="col-sm-10">

                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip1chck" type="checkbox"> </span> <input  id="dlroptequip1"type="text" class="form-control"  placeholder="Addon 1"></div>
                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip2chck" type="checkbox"> </span> <input  id="dlroptequip2"type="text" class="form-control"  placeholder="Addon 2"></div>
                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip3chck" type="checkbox"> </span> <input  id="dlroptequip3"type="text" class="form-control"  placeholder="Addon 3"></div>
                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip4chck" type="checkbox"> </span> <input  id="dlroptequip4"type="text" class="form-control"  placeholder="Addon 4"></div>



                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip5chck" type="checkbox"> </span> <input  id="dlroptequip5"type="text" class="form-control"  placeholder="Addon 5"></div>

                                    
                                    
                                    </div>
                                
                                </div>



                                <div class="hr-line-dashed"></div>




                            
                            
                            
                            
                            
							</div>
                        </div>
                    </div>
                 </div>
             </div><!-- End Vehicle Window Sticker Options -->
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                </div>
                                <div id="tab-3" class="tab-pane">
                                
                                
                                
                                
                                
                                
                                
                                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Options <small>Cost Related To This Vehicle</small></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                            
                            <div class="hr-line-dashed"></div>

                            
							<div class="form-group">
                            	<label for="vpurchasecost" class="col-sm-2 control-label">Purchase Cost:</label>

                                 <div class="col-sm-10"><input id="vpurchasecost" type="text" class="form-control"></div>
                             </div>
                                


							<div class="form-group">
                            	<label for="vdlrpack" class="col-sm-2 control-label">Dealer Pack:</label>

                                 <div class="col-sm-10"><input id="vdlrpack" type="text" class="form-control"></div>
                             </div>



                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                <label for="vaddedcost" class="col-sm-2 control-label">Added Cost:</label>
                                
                                    <div class="col-sm-10">
                                        <input id="vaddedcost" type="text" class="form-control">
                                    </div>
                                </div>



                                <div class="hr-line-dashed"></div>


                            
                            	<div id="createVehicleResult"></div>
                            
                            
                            
							</div>
                        </div>
                    </div>
                 </div>
             </div>
                                
                                
                                
                                
                                
                                
                                
								</div>
                                
                                
                                
                                
                                
                            </div>

                        </div>

                    </div>


        








<div id="save_vehicle_lowerbar" class="wrapper wrapper-content animated fadeInRight" style="display: none;">
        
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Save Vehicle Information</h5>
                        </div>
                        <div class="ibox-content">


<div class="row">
	<div class="col-lg-12">
    

                <div id="save_single_app_action" class="col-lg-12" align="center">
                <h2>Save This Information</h2>
                                        <button class="btn btn-white" type="button">Cancel</button>
                                        <button id="save_vehicle" class="btn btn-primary" type="button">Save changes</button>
                
                
                </div>






    
	</div>
</div>        








                        </div>
                    </div>
                </div>

            </div>
        
        
        
        

        
        
        
        
        
        
        </div>





        
        
        
        
        
        
        
        
        
        
        
        </div>

        <?php include("_footer.php"); ?>

        </div>
        </div>


    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

	<script src="js/custom/page/inventory.vin.js"></script>
	
	<script src="js/custom/page/custom.inventory.add.js"></script>

</body>

</html>

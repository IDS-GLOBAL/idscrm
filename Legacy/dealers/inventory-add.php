<?php include("db_loggedin.php"); ?>
<?php

//if(!$row_find_vehicle['vid'])  header("Location: inventory.php");

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

    <title>IDSCRM | Manually Add Vehicle: <?php echo $row_userDets['company']; ?></title>

	<?php include("inc.head.php"); ?>
</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.php"); ?>
    

        <div id="page-wrapper" class="gray-bg">
                    
					<?php include("_nav_top.php"); ?>

        
                    
                    
                    <div class="row">
                    
                    
                    	<div id="addInventory_Modal" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                
                                                <div class="modal-body">
                                                    
                                                    <div class="row">
                                                    
                                                    
                                                        <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Sign in</h3>
        
                                                            <p>Sign in today for more expirience.</p>
        
                                                            <form role="form">
                                                                <div class="form-group">
                                                                	<label>Year:</label> 
                                                                    	<input id="vin_year" type="text" placeholder="Year Of Vehicle" class="form-control" value="">
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                	<label>Make:</label> 
                                                                    	<input id="vin_make" type="text" placeholder="Make Of Vehicle" class="form-control" value="">
                                                                </div>

                                                                <div class="form-group">
                                                                	<label>Model:</label> 
                                                                    	<input id="vin_model" type="text" placeholder="Model Of Vehicle" class="form-control" value="">
                                                                </div>
                                                                
                                                                <div>



                                                                    
                                                                </div>
                                                            </form>
                                                        </div>
                                                    
                                                        
                                                        <div class="col-sm-6">
                                                            <h4>Is This Correct?</h4>
                                                            
                                                            <p class="text-center">
                                                                <a data-dismiss="modal" title="Cancel Process!"><i class="fa fa-times big-icon"></i></a>
                                                            </p>
                                                            
                                                    </div>
                                                	
                                                    
                                                    </div>
                                                    <div class="row">
                                                    
                                                    <div align="left" style="margin-left: 10px; margin-top: 20px;">
                                                    <button type="button" class="btn btn-lg btn-primary" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
                                                    
                                                    </div>

                                                    </div>
                                            	</div>
                                                
                                                
                                                
                                            </div>
                                        </div>
                                </div>
                    
                    
                    </div>













<div id="testBlock" style="display: block;">

                    <div class="row wrapper border-bottom white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>Data Block: Our attempt to decode your entered vin.<small>Note: Only the results you entered below is what will be used.</small></h2>
        
                                                                    <div id="vehicleDecodeResult"></div>

                            
     			                     <div>


                        				<div class="hr-line-dashed"></div>
                                                                         
                                         <div class="checkbox m-l m-r-xs">
                                             <div id="vvinfeedback"></div>
                                         </div>

                        				<div class="hr-line-dashed"></div>
                                                                                 
                                         <div class="checkbox m-l m-r-xs">
                                             <div id="vinYearResult"></div>
                                             <div id="vinMakeResult"></div>
                                             <div id="vinModelResult"></div>
                                             <div id="vinTrimResult"></div>
                                         </div>

									
                                 
                                </div>
    
        
                            
        
        
        
        
        
        
        
                            
                        </div>
                        
                        <div class="col-lg-2">
        					<!-- Wassup with this? -->
                        </div>
                        
                    </div>
                
                	<div class="wrapper wrapper-content animated fadeInRight">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Manually Add Vehicle <small>only difference is year make model.</small></h5>
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
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                          <div class="form-inline">

                                        
                                        <div class="form-group">
                                            <label for="vvin" class="col-sm-8 control-label">VIN Number: </label><br />
                                            <input type="text" placeholder="VIN Number" id="vvin" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vmileage" class="col-sm-2 control-label">Mileage: </label><br />
                                            <input type="text" placeholder="Mileage" id="vmileage" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label for="vstockno" class="col-sm-10 control-label">Stock Number: </label><br />
                                            <input type="text" placeholder="Stock Number" id="vstockno" class="form-control">
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        
                                        <div class="form-group alltheway">
                                        	<label class="col-sm-2 control-label">Vehicle Status:</label>
        
                                            <div class="col-lg-10"><select class="form-control m-b" id="vlivestatus" name="vlivestatus">
                                              <option value="0">KEEP ON HOLD</option>
                                              <option value="1">GO LIVE</option>
                                              <option value="9">SOLD!</option>
                                              
                                            </select></div>
                                        </div>
                                        
        
                                        <div class="form-group alltheway">
                                        	<label class="col-sm-2 control-label">Vehicle Condition:</label>
        
                                                <div class="col-lg-10">
                    <select class="form-control m-b" name="vcondition" id="vcondition">
                    <option value="" >Select Vehicle Condition</option>
                    <option value="Used" <?php if (!(strcmp("Used", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Used</option>
                    <option value="New" <?php if (!(strcmp("New", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>New</option>
                    <option value="Trade-In" <?php if (!(strcmp("Trade-In", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Trade-In</option>
                    <option value="Salvage" <?php if (!(strcmp("Salvage", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Salvage</option>
                                                </select></div>
                                        </div>                                    
                                        


                            

                                 <div>
                                 	
<div class="form-inline">
                                        
                                        <div class="form-group">
                                            <label for="vyear" class="col-sm-8 control-label">Year: </label><br />

													
                            <select name="vyear" id="vyear" class="form-control">
                              <option value="">Select Year</option>
                              <?php do {  ?>
                              <option value="<?php echo $row_carYears['year']?>"><?php echo $row_carYears['year']?></option>
                              <?php } while ($row_carYears = mysqli_fetch_assoc($carYears));
								  $rows = mysqli_num_rows($carYears);
								  if($rows > 0) {
									  mysqli_data_seek($carYears, 0);
									  $row_carYears = mysqli_fetch_assoc($carYears);
								  }
							  ?>
                            </select>
                                                      
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="vmake" class="col-sm-10 control-label">Make: </label><br />
                                            <select name="vmake" id="vmake" class="form-control">
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


                                        <div class="form-group">
                                            <label for="vmodel" class="col-sm-10 control-label">Model: </label><br />
                                            <select id="vmodel" class="form-control">
                                            	<option value="">Select Model</option>

                                            </select>
                                        </div>
                                        
                                        <div class="form-group" style=" width:5px;">
                                        <label for="vtrim" class="col-sm-10 control-label">Trim:</label><br />
                                        <input id="vtrim" name="vtrim" value="" class="form-control" style="width: 100px !important;">
                                        
                                        </div>

                                        <div class="hr-line-dashed"></div>                      
                                            
                                       
                                     
                                     
                                     </div>                                    	
                                 
                                 </div>

<div>
                                    <div class="form-group">
                                        <label for="vexterior_color" class="col-sm-12 control-label">Exterior Color: </label><br />
                                        <span class="cnt-step">5</span>
                                <select name="vexterior_color" id="vexterior_color" class="form-control">
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
                                    <div class="form-group">
                                         
                                         <label for="vinterior_color" class="col-sm-12 control-label">Interior Color: </label><br />
                                         <span class="cnt-step">6</span>
                              <select name="vinterior_color" id="vinterior_color" class="form-control">
                                <option value="">Select Color</option>
                                <?php
do {  
?>
                                <option value="<?php echo $row_colors_hex['color_hex']?>"><?php echo $row_colors_hex['color_name']?></option>
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
                                        <label for="vfueltype" class="col-sm-10 control-label">Fuel Type: </label><br />
                                         <span class="cnt-step">8</span>
                                         <select id="vfueltype" name="vfueltype" class="form-control">
                                            <option value="">Select Fuel Type</option>
                                            <option value="Gasoline">Gasoline</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Hybrid">Hybrid</option>
                                            <option value="Electric">Electric</option>

                                         </select>
                                    </div>


</div>                            

                                 <div>
                                 	
<div class="form-inline">
                                        
                                        <div class="form-group">
                                            <label for="vbody" class="col-sm-8 control-label">Body Style: </label><br />

													<select name="vbody" id="vbody" class="form-control">
                            							<option value="">Select Body Style</option>
                                                        <option value="3 DR">3 DR</option>
                                                        <option value="Convertible">Convertible</option>
                                                        <option value="Coupe">Coupe</option>
                                                        <option value="Crew Cab Pickup">Crew Cab Pickup</option>
                                                        <option value="Extended Cab Pickup">Extended Cab Pickup</option>
                                                        <option value="Full-size Cargo Van">Full-size Cargo Van</option>
                                                        <option value="Full-size Passenger Van">Full-size Passenger Van</option>
                                                        <option value="Hatchback">Hatchback</option>
                                                        <option value="Mini-Van">Mini-Van</option>
                                                        <option value="Mini-van, Cargo">Mini-van, Cargo</option>
                                                        <option value="Mini-van, Passenger">Mini-van, Passenger</option>
                                                        <option value="Pick-Up">Pick-Up</option>
                                                        <option value="Regular Cab Chassis-Cab">Regular Cab Chassis-Cab</option>
                                                        <option value="Regular Cab Pickup">Regular Cab Pickup</option>
                                                        <option value="Sedan">Sedan</option>
                                                        <option value="Sport Utility">Sport Utility</option>
                                                        <option value="Station Wagon">Station Wagon</option>
                                                        <option value="SUV">SUV</option>
                                                        <option value="Truck">Truck</option>
                                                        <option value="Truck">Truck</option>
                                                        <option value="VAN">VAN</option>
                                                        <option value="VAN">VAN</option>
                                                        <option value="Wagon">Wagon</option>
                                                    </select>
                                                      
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="vtransm" class="col-sm-10 control-label">Transmission: </label><br />
                                            <select name="vtransm" id="vtransm" class="form-control">
                                              <option value="">Select Transmission</option>
                                                <option value="Manual">Manual</option>
                                                <option value="Automatic Trans.">Automatic Trans.</option>
                                                <option value="Automatic">Automatic</option>
                                                <option value="Variable">Variable</option>
                                                <option value="Manual Trans.">Manual Trans.</option>
                                              </select>
  
                                        </div>


                                        <div class="form-group">
                                            <label for="vcylinders" class="col-sm-10 control-label">Cylinders: </label><br />
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

                                        <div class="hr-line-dashed"></div>                      

                                    <div class="form-group alltheway">
                                        <label for="vengine" class="col-sm-2 control-label" placeholder="Example 3.8 L">Engine Desscription:</label>
    
                                        <div class="col-lg-10">
                                        <span class="cnt-step">10</span>
                                        <input class="form-control m-b alltheway"  id="vengine"  name="vengine" value="">
                                        </div>
                                        
                                    </div>
                                            
                                        <div class="hr-line-dashed"></div>                      
                                     
                                     
                                     </div>                                    	
                                 
                                 </div>
                                       
                                <div>
                                    <div class="form-inline">
                                        
                                        <div class="form-group">
                                            <label for="vpurchasecost" class="control-label">Purchase Cost: </label><br />
                                            <input type="text" placeholder="Vehicle Cost" id="vpurchasecost" class="form-control smwdth" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="vdlrpack" class="control-label">Pack. Fees: </label><br />
                                            <input type="text" placeholder="Pack $500.00" id="vdlrpack" class="form-control smwdth">
                                        </div>

                                        <div class="form-group">
                                        	<label class="control-label">Misc. Fee(s):</label><br />
        
                                            <input id="vaddedcost" type="text" class="form-control" placeholder="Misc. Fee">
                                            
                                        </div>
                                        <div class="hr-line-dashed"></div>
										
                                        <div class="form-group">
                                            <label for="vrprice" class="control-label">Retail Price: </label><br />
                                            <input type="text" placeholder="High Price" id="vrprice" class="form-control smwdth">
                                        </div>


                                        <div class="form-group">
                                            <label for="vrprice" class="control-label">Special Price: </label><br />
                                            <input type="text" placeholder="Internet Price" id="vspecialprice" class="form-control smwdth">
                                        </div>


                                        <div class="form-group">
                                            <label for="vdprice" class="control-label">Down Payment: </label><br />
                                            <input type="text" placeholder="Down Payment Price" id="vdprice" class="form-control smwdth">
                                        </div>

                                        <div class="hr-line-dashed"></div>

										<div class="form-group">
                                        <a id="addinventory" class="btn btn-primary btn-lg" href="#">Add Car To Inventory</a>
                                        
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        
                                        
									</div>
								</div>
                                       
                                     
                                     
                                     </div>
                                     
                          
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div><!-- End Test Block -->
                
        <?php include("_footer.php"); ?>
        
        </div>
        
        
        </div>


    </div>


    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>



	<!-- Custom -->
	<script src="js/add-manually.inventory.js"></script>
    
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
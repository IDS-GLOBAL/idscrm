<?php include("db_manager_loggedin.php"); ?>
<?php
if(!$row_find_vehicle['vid'])  header("Location: manager.inventory.php?vstat=1");

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

    <title>IDSCRM | Edit Vehicle: <?php echo $row_userDets['company']; ?></title>

<?php include("inc.head.php"); ?>

</head>

<body>

<div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>


    <div id="page-wrapper" class="gray-bg">
                
                <?php include("_nav_top.manager.php"); ?>





                        	
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
                                            <p>Below Is Deal Matrix Results: <a href="manager.settings.php" target="_blank"> Go To Deal Matrix Settings?</a></p>
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

                                    	<p><a id="updatecar" class="btn btn-primary btn-lg" href="#"><strong>Save &amp; Finish</strong></a></p>
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




	<!-- Start Deal Matrix Modal -->                       
                    <div class="row">
  
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
					</div>
	<!-- End Deal Matrix Modal -->                       

<!-- End Modals --> 




<div class="wrapper wrapper-content animated fadeInRight">










        <div class="ibox-content">


         <div class="row">






								<div class="panel panel-default">
                                
                                        <div class="panel-heading">
                                            Captured Vehicle Information
                                        </div>
                                        <div class="panel-body">
                                        <div class="ibox-content">
                                        
                                       <div class="form-inline">                                         
                                        <div class="col-md-4">
                                         <?php showphoto($cvid=$row_find_vehicle['vid']);  ?>
                                        </div>

                                        
                                        
<div class="col-md-8">

    <h1><?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?>     <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?></h1>

	<div class="hr-line-dashed"></div>

    <h1><?php echo $row_find_vehicle['vvin']; ?></h1>

</div>
                    
                    
                    				</div>
                    
                    
                    
                    
                    
                    </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        </div>
                                    </div>







            
            </div>
        
        
         </div>
                             


























<div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md">
                            <h4>Edit Vehicle</h4>
                            </div>
                            
                            <div class="panel-options">

                            <ul id="sales_desk_tabs" class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-4"><i class="fa fa-car fa-3x"></i> Finance</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-camera fa-3x"></i> Photos</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-6"><i class="fa fa-tachometer fa-3x"></i> Warranty</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-7"><i class="fa fa-plug fa-3x"></i>Fees & Cost</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-8"><i class="fa fa-certificate fa-3x"></i>Cerified</a></li>
                            </ul>
                            
                            
                            </div>
                        
                        
                        
                        </div>

<div class="panel-body">

    <div class="tab-content">
        <div id="tab-4" class="tab-pane active">

            <div class="row">

                
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Vehicle Information</h5>
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


                               <div class="hr-line-dashed"></div>
                               
                               <div class="form-horizontal">
                                    
                                    

                                    
                                    <div class="form-group">
                                        <label for="vlivestatus" class="col-lg-3 col-md-3 col-sm-3 control-label">Vehicle Status:</label>
    
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                        <select class="form-control"  id="vlivestatus" >
                                          <option value="0" <?php if (!(strcmp(0, $row_find_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>KEEP ON HOLD</option>
                                          <option value="1" <?php if (!(strcmp(1, $row_find_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>GO LIVE</option>
                                          <option value="9" <?php if (!(strcmp(9, $row_find_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>SOLD!</option>
                                        </select></div>
                                    </div>
                                <div class="hr-line-dashed"></div>
    
                                    <div class="form-group">
                                        
                                        <label class="col-sm-3 control-label">Vehicle Condition:</label>
    
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            
                <select class="form-control" id="vcondition"  name="vcondition">
                <option value="" >Select Vehicle Condition</option>
                <option value="Used" <?php if (!(strcmp("Used", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Used</option>
                <option value="New" <?php if (!(strcmp("New", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>New</option>
                <option value="Trade-In" <?php if (!(strcmp("Trade-In", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Trade-In</option>
                <option value="Salvage" <?php if (!(strcmp("Salvage", htmlentities($row_find_vehicle['vcondition'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Salvage</option>
                                            </select></div>
                                    </div>                                    


                                    <div class="hr-line-dashed"></div>


                                    <div class="form-group">
                                         
                                         <label for="vmileage" class="col-sm-3 control-label">Mileage: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                         <input type="text" placeholder="Mileage" id="vmileage" class="form-control" placeholder="i.e., 28451" value="<?php echo $row_find_vehicle['vmileage']; ?>">
                                         </div>
                                    </div>
                                <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label for="vstockno" class="col-sm-3 control-label">Stock Number: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                        <input type="text" placeholder="Stock Number" id="vstockno" class="form-control" style="" value="<?php echo $row_find_vehicle['vstockno']; ?>"> 
                                        
                                        </div>
                                    </div>





                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vtrim" class="col-sm-3 control-label">Trim:</label>

                                    <div class="col-lg-9 col-md-9 col-sm-9"><input id="vtrim" type="text" class="form-control" value="<?php echo $row_find_vehicle['vtrim']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>






                                    <div class="form-group">
                                        <label for="vbody" class="col-sm-3 control-label">Body Style: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-9">
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
                                      </div>

                                                            
                                    <div class="hr-line-dashed"></div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="vexterior_color" class="col-sm-3 control-label">Exterior Color: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-9">
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
                                    </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                         
                                         <label for="vinterior_color" class="col-sm-3 control-label">Interior Color: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-9">
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
                                    </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vcustomcolor" class="col-sm-3 control-label">Custom Color:</label>

                                    <div class="col-lg-9 col-md-9 col-sm-9"><input id="vcustomcolor" type="text" class="form-control" value="<?php echo $row_find_vehicle['vcustomcolor']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                    <div class="form-group">
                                        <label for="vtransm" class="col-sm-3 control-label">Transmission:</label>
    
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            
<select class="form-control m-b" id="vtransm"  name="vtransm">
                    <option value="" <?php if (!(strcmp("", $row_find_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>>Select Transmission</option>
                    <?php do {  ?>
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





                                    <div class="hr-line-dashed"></div>








                                    <div class="form-group">
                                        <label for="vengine" class="col-sm-3 control-label" placeholder="Example 3.8 L">Engine Description:</label>
    
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            
                                        <input class="form-control"  id="vengine"  name="vengine" value="<?php echo $row_find_vehicle['vengine']; ?>" placeholder="i.e., 2.5L DOHC" />
                                           
                                           </div>
                                    </div>                                    


                                <div class="hr-line-dashed"></div>


                                    <div class="form-group">
                                        <label for="vcylinders" class="col-sm-3 control-label">Cylinders: </label>
                                     <div class="col-lg-9 col-md-9 col-sm-9">
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
                                    </div>
                                    




                                    <div class="hr-line-dashed"></div>


                                
                                    <div class="form-group">
                                        <label for="vfueltype" class="col-sm-3 control-label">Fuel Type: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-9">
<select id="vfueltype" name="vfueltype" class="form-control">
<option value="" <?php if (!(strcmp("", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Select Fuel Type</option>
<option value="Gasoline" <?php if (!(strcmp("Gasoline", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Gasoline</option>
<option value="Diesel" <?php if (!(strcmp("Diesel", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Diesel</option>
<option value="Hybrid" <?php if (!(strcmp("Hybrid", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Hybrid</option>
<option value="Electric" <?php if (!(strcmp("Electric", $row_find_vehicle['vfueltype']))) {echo "selected=\"selected\"";} ?>>Electric</option>

                                         </select>
	                                    </div>
                                    </div>


                                    
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vdoors" class="col-sm-3 control-label">Doors:</label>

                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                    
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
                                        








                                <div class="form-group"><label id="vrprice" class="col-sm-3 control-label">Retail Price:</label>

                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vrprice" type="text" class="form-control" value="<?php echo $row_find_vehicle['vrprice']; ?>"> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label id="vspecialprice" class="col-sm-3 control-label">Special Price:</label>

                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vspecialprice" type="text" class="form-control" value="<?php echo $row_find_vehicle['vspecialprice']; ?>"> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>


                                <div class="form-group"><label id="vdprice" class="col-sm-3 control-label">Downpayment Price:</label>

                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vdprice" type="text" class="form-control" value="<?php echo $row_find_vehicle['vdprice']; ?>"> <span class="input-group-addon">.00</span></div>
                                    </div>
                                    
                                </div>








                                <div class="hr-line-dashed"></div>





                                    












                        
                         
                                   
                                        
                                   
                                 
                                 
                                    
                                    


                        
                        
                                   
                                        
                                   
                                 
                                 
                           </div>
                                
                             </div>
                                 
                            </div>
                            
                            
                            
                        </div>
                    </div><!-- End First Box -->
                    
                    
                    
                    
                    
                

            </div>




            <div class="row">


                <div class="col-lg-12 col-md-12 col-sm-12">



                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Vehicle Comments:</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="form-horizontal">
                                        <p>Comments:</p>
                                        <div class="form-group"><label class="col-lg-3 control-label">Seller Notes:</label>
        
                                            <div class="col-lg-9"><textarea id="vcomments" type="text" class="form-control textarea"  placeholder="comments"><?php echo $row_find_vehicle['vcomments']; ?></textarea>
                                            	<span class="help-block m-b-none">Enter Your Seller Notes Here.</span>
                                            </div>
                                        </div>











                                    </div>
                                </div>
                            </div>


    
                </div>

            </div>




      </div>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              <div id="tab-5" class="tab-pane">
                              
                              
                              
                                
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Photos</h5>
                        </div>
                        <div class="ibox-content">

                       	<div class="row">
                            <div class="col-lg-12">
                            
                            
                            
                            <p>
                        <a class="btn btn-success" href="vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Upload More Photos</span></a>
                        <a class="btn btn-info" href="sort-vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>"><i class="fa fa-paste"></i> Resort Photos</a>
                    </p>
                            
                            
                            
                            
                            
                            
                            
                            
                            </div>
                    	</div>


                        
                        
                       <div class="row">
                        <div class="col-lg-12">
                     
                        
                        


<?php if($totalRows_find_vehicle_photos != 0): ?>
                                        

                        <?php do { ?>                        
                            <div class="file-box">
                                <div class="file">

                                    <a>
                                        <span class="corner"></span>

                                        <div class="icon">
                                        
                                        <?php 
										
										if($photo_file_path = $row_find_vehicle_photos['photo_file_path']):
										
										
										if(!$photo_file_path){
											$photo_openurl = 'img/thumbs/thumb1.jpg';
										}else{
											$photo_file_path = str_replace('../', '', $photo_file_path);
											$photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
											$photo_openurl = "http://images.autocitymag.com/".$photo_file_path;
										}

										
										
										
										
										
										?>
                                        
                                            <img class="large_image" src="<?php echo $photo_openurl; ?>" width="198px" title="<?php echo $row_find_vehicle_photos['photo_file_name']; ?>" />
                                            
                                        <?php else: ?>
                                        
                                        
                                        <i></i>
                                        
                                        <?php endif; ?>
                                        
                                        
                                            
                                        
                                        
                                            
                                        </div>
                                        <div class="file-name">
                                            <?php echo $row_find_vehicle_photos['v_caption']; ?>
                                            <br/>
                                            <small>Uploaded On: <?php echo created_at($row_find_vehicle_photos['created_at']); ?></small>
                                        </div>
                                    </a>
                                </div>

                            </div>
						<?php } while ($row_find_vehicle_photos = mysqli_fetch_assoc($find_vehicle_photos)); ?>                            


										<?php endif; ?>
                            
                            
                        
                         </div>
                       </div> 
                        
                        
                        
                        
                        
                        
                        
                        
                        </div>
                    </div>
                 </div>
             </div><!-- End Vehicle Photo Options -->
                              
                              
                              
                              
                              </div>
                              <div id="tab-6" class="tab-pane">
                                    
                                    
                                    
                                    
                                
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

                                    <div class="col-sm-10"><input id="vehicle_mpg_city" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vehicle_mpg_hwy" class="col-sm-2 control-label">Vehicle MPG Highway:</label>

                                    <div class="col-sm-10"><input id="vehicle_mpg_hwy" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vehicle_mpg_combined" class="col-sm-2 control-label">Vehicle MPG Combined</label>

                                    <div class="col-sm-10"><input id="vehicle_mpg_combined" type="text" class="form-control" value=""></div>
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
                                        <input type="checkbox" value="1" id="Navigation_System"> Rear Navigation System </label>

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
                                        <div class="input-group m-b"><input id="v_warranty_two" type="text" class="form-control">

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










                              <div id="tab-7" class="tab-pane">
                              
                              


                                
                                
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

                              <div id="tab-8" class="tab-pane">



                              </div>













                          </div><!-- End Tab Panel -->


						</div>
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





               





    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>
    

	<!-- Custom -->
	<script src="js/manager.edit.inventory.js"></script>

    
    
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
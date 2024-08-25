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
$query_query_bodystyles = "SELECT * FROM `body_styles` ORDER BY body_style_name ASC";
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

    <link href="js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">

<?php include("inc.head.php"); ?>

</head>

<body>

<div id="wrapper">

        <?php include("_sidebar.php"); ?>


    <div id="page-wrapper" class="gray-bg">
                
                <?php include("_nav_top.php"); ?>





                        	
<!-- Start Modals --> 





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
                                        
                                       <div class="form-inline v-visualTopblock">                                         
                                        <div class="col-md-4">
                                         
										<?php 
                                        	$photo_openurl = 'img/thumbs/thumb1.jpg';
                                            
											if($photo_file_path = $row_find_vehicle['vthubmnail_file_path']):

											if(!$photo_file_path){
												$photo_openurl = 'img/thumbs/thumb1.jpg';
											}else{
												$photo_file_path = str_replace('../', '', $photo_file_path);
												$photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
												$photo_openurl = "https://images.autocitymag.com/photos/".$photo_file_path;
											}
										?>
                                        <a href="<?php echo $photo_openurl; ?>" class="fancybox">
                                            <img class="thumbnail" src="<?php echo $photo_openurl; ?>" width="198px" title="<?php echo $row_find_vehicle_photos['photo_file_name']; ?>" />
                                        </a>  
                                        <?php else: ?>
                                        
                                        <a href="<?php echo $photo_openurl; ?>" class="fancybox">
                                        <i class="fa fa-photo fa-4x"></i>
                                        </a>  
                                        <?php endif; ?>
                                         
                                         
                                        </div>

                                        
                                        
<div class="col-md-8" style="padding-left:30px;">

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
                                         <input type="text" id="vmileage" class="form-control" placeholder="i.e., 28451" value="<?php echo $row_find_vehicle['vmileage']; ?>">
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
                                                                    
                                                        <?php do {  ?><option value="<?php echo ucfirst($row_distinct_transm['vtransm']); ?>"<?php if (!(strcmp($row_distinct_transm['vtransm'], $row_find_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>><?php echo ucfirst($row_distinct_transm['vtransm']); ?></option>
                                                        
                                                        <?php } while ($row_distinct_transm = mysqli_fetch_assoc($distinct_transm));
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
                                            <option value="2"  <?php if (!(strcmp("2", $row_find_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>2 Door</option>
                                            <option value="3"  <?php if (!(strcmp("3", $row_find_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>3 Door</option>
                                            <option value="4"  <?php if (!(strcmp("4", $row_find_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>4 Door</option>
                                            <option value="5"  <?php if (!(strcmp("5", $row_find_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>5 Door</option>
                                            <option value="6"  <?php if (!(strcmp("6", $row_find_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>6 Door</option>

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
                        <a id="vehicle_edit_uploadphoto" class="btn btn-success" href="upload-vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>">
                            <i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Upload More Photos</span></a>
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

                                    
                                        <span class="corner"></span>

                                        <div class="icon">
                                        
                                        <?php 
										
										if($photo_file_path = $row_find_vehicle_photos['photo_file_path']):
										
										
										if(!$photo_file_path){
											$photo_openurl = 'img/thumbs/thumb1.jpg';
										}else{
											$photo_file_path = str_replace('../', '', $photo_file_path);
											$photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
											$photo_openurl = "http://images.autocitymag.com/photos/".$photo_file_path;
										}

										
										
										
										
										
										?>
                                        <a class="fancybox" href="<?php echo $photo_openurl; ?>">
                                            <img class="large_image" src="<?php echo $photo_openurl; ?>" width="198px" title="<?php echo $row_find_vehicle_photos['photo_file_name']; ?>" />
                                       </a> 
                                        <?php else: ?>
                                        
                                        
                                        <a href="#">
                                        <i class="fa fa-photo fa-4x"></i>
                                        </a>  
                                        
                                        <?php endif; ?>
                                        
                                        
                                            
                                        
                                        
                                            
                                        </div>
                                        <div class="file-name">
                                            <?php echo $row_find_vehicle_photos['v_caption']; ?>
                                            <br/>
                                            <small>Uploaded On: <?php echo created_at($row_find_vehicle_photos['created_at']); ?></small>
                                        </div>
                                    
                                </div>

                            </div>
						<?php } while ($row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos)); ?>                            


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

                                    <div class="col-sm-10"><input id="vehicle_mpg_city" type="text" class="form-control" value="<?php echo $row_find_vehicle['vehicle_mpg_city']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vehicle_mpg_hwy" class="col-sm-2 control-label">Vehicle MPG Highway:</label>

                                    <div class="col-sm-10"><input id="vehicle_mpg_hwy" type="text" class="form-control" value="<?php echo $row_find_vehicle['vehicle_mpg_hwy']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vehicle_mpg_combined" class="col-sm-2 control-label">Vehicle MPG Combined</label>

                                    <div class="col-sm-10"><input id="vehicle_mpg_combined" type="text" class="form-control" value="<?php echo $row_find_vehicle['vehicle_mpg_combined']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                            
                            <div class="form-group"><label class="col-sm-2 control-label">Exterior Options</label>

                                    <div class="col-sm-10">


                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Alloy_Wheels"  <?php if (!(strcmp("1", $row_find_vehicle['Alloy_Wheels']))) {echo "checked=\"checked\"";} ?> >Alloy Wheels</label> 

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Bed_Liner"  <?php if (!(strcmp("1", $row_find_vehicle['Bed_Liner']))) {echo "checked=\"checked\"";} ?>>Bed Liner</label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Illuminated_Lightning"  <?php if (!(strcmp("1", $row_find_vehicle['Illuminated_Lightning']))) {echo "checked=\"checked\"";} ?>>Illuminated Ground Lighting</label>


                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Rear_Window_Defroster"  <?php if (!(strcmp("1", $row_find_vehicle['Rear_Window_Defroster']))) {echo "checked=\"checked\"";} ?>>Rear Window Defroster </label>
                                        

                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Running_Boards"  <?php if (!(strcmp("1", $row_find_vehicle['Running_Boards']))) {echo "checked=\"checked\"";} ?>> Running Boards </label> 



                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Sliding_Doors"  <?php if (!(strcmp("1", $row_find_vehicle['Sliding_Doors']))) {echo "checked=\"checked\"";} ?>>Sliding Doors</label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Tinted_Glass"  <?php if (!(strcmp("1", $row_find_vehicle['Tinted_Glass']))) {echo "checked=\"checked\"";} ?>>Tinted Glass</label>


                                        
                                        
                                        
                                        
                                        
                                        </div>
                                </div>


                            <div class="hr-line-dashed"></div>


                            <div class="form-group"><label class="col-sm-2 control-label">Interior Options</label>

                                    <div class="col-sm-10">

                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Air_Conditioning"  <?php if (!(strcmp("1", $row_find_vehicle['Air_Conditioning']))) {echo "checked=\"checked\"";} ?>> A/C </label> 
                                   
                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Memory_Seats"  <?php if (!(strcmp("1", $row_find_vehicle['Memory_Seats']))) {echo "checked=\"checked\"";} ?>>  Memory Seats </label>
                                        
                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Power_Mirrors"  <?php if (!(strcmp("1", $row_find_vehicle['Power_Mirrors']))) {echo "checked=\"checked\"";} ?>> Power Mirrors </label> 
                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Power_Seats"  <?php if (!(strcmp("1", $row_find_vehicle['Power_Seats']))) {echo "checked=\"checked\"";} ?>> Power Seats </label> 
                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Power_Door_Locks"  <?php if (!(strcmp("1", $row_find_vehicle['Power_Door_Locks']))) {echo "checked=\"checked\"";} ?>> Power Door Locks </label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Power_Steering"  <?php if (!(strcmp("1", $row_find_vehicle['Power_Steering']))) {echo "checked=\"checked\"";} ?>>Power Steering </label>
                                        


                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Power_Windows"  <?php if (!(strcmp("1", $row_find_vehicle['Power_Windows']))) {echo "checked=\"checked\"";} ?>>Power Windows </label>
                                        
                                        
                                        
                                        
                                        
                                        
                                        </div>
                                </div>

                            <div class="hr-line-dashed"></div>


                            <div class="form-group"><label class="col-sm-2 control-label">Safety Security</label>

                                    <div class="col-sm-10">
                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Passenger_Air_Bag" <?php if (!(strcmp("1", $row_find_vehicle['Passenger_Air_Bag']))) {echo "checked=\"checked\"";} ?>> Passenger Air Bags </label> 

                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Side_Air_Bag" <?php if (!(strcmp("1", $row_find_vehicle['Power_Windows']))) {echo "checked=\"checked\"";} ?>> Side Air Bags </label> 
                                   
                                   
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Keyless_Entry" <?php if (!(strcmp("1", $row_find_vehicle['Keyless_Entry']))) {echo "checked=\"checked\"";} ?>>Keyless Entry</label>
                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Push_Button_Start" <?php if (!(strcmp("1", $row_find_vehicle['Push_Button_Start']))) {echo "checked=\"checked\"";} ?>>Push Button Start</label>
                                        

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Theft_System" <?php if (!(strcmp("1", $row_find_vehicle['Theft_System']))) {echo "checked=\"checked\"";} ?>>Theft Deterrent System & Alarm</label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="AntiLock_Brakes" <?php if (!(strcmp("1", $row_find_vehicle['AntiLock_Brakes']))) {echo "checked=\"checked\"";} ?>>Anti-Lock Brakes (ABS)</label>


                                        







                                        </div>


                                </div>





                                <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Comfort & Convenience</label>

                                    <div class="col-sm-10">
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Leather_Seats" <?php if (!(strcmp("1", $row_find_vehicle['Leather_Seats']))) {echo "checked=\"checked\"";} ?>>Leather Seats</label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Auto_Updown_Windows" <?php if (!(strcmp("1", $row_find_vehicle['Auto_Updown_Windows']))) {echo "checked=\"checked\"";} ?>> Auto Up/Down Front Driver's Window</label> 

                                    
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Bluetooth_Handsfree" <?php if (!(strcmp("1", $row_find_vehicle['Bluetooth_Handsfree']))) {echo "checked=\"checked\"";} ?>> Bluetooth Hands-Free </label>


                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Climate_Control" <?php if (!(strcmp("1", $row_find_vehicle['Climate_Control']))) {echo "checked=\"checked\"";} ?>> Climate Control</label> 

                                    <label class="checkbox"> 
                                    	<input type="checkbox" value="1" id="Cruise_Control" <?php if (!(strcmp("1", $row_find_vehicle['Cruise_Control']))) {echo "checked=\"checked\"";} ?>> Cruise Control</label> 
                                    

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Navigation_System" <?php if (!(strcmp("1", $row_find_vehicle['Navigation_System']))) {echo "checked=\"checked\"";} ?>> Rear Navigation System </label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Rear_view_monitor" <?php if (!(strcmp("1", $row_find_vehicle['Rear_view_monitor']))) {echo "checked=\"checked\"";} ?>> Rear View Monitor </label>


                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Rear_Ent_Center" <?php if (!(strcmp("1", $row_find_vehicle['Rear_Ent_Center']))) {echo "checked=\"checked\"";} ?>> Rear Ent. Center </label>
                                        

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Satellite_Radio" <?php if (!(strcmp("1", $row_find_vehicle['Satellite_Radio']))) {echo "checked=\"checked\"";} ?>> Satellite Radio	 </label>

                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="SunroofMoonroof" <?php if (!(strcmp("1", $row_find_vehicle['SunroofMoonroof']))) {echo "checked=\"checked\"";} ?>> Sunroof/Moonroof </label>
                                        
                                        
       
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" id="Television" <?php if (!(strcmp("1", $row_find_vehicle['Television']))) {echo "checked=\"checked\"";} ?>> Television </label>
                                 
                                        
                                        
                                        
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
                                                     <li><a href="#">1 Year / 12,000 Miles</a></li>
                                                    <li><a href="#">2 Years / 24,000 Miles</a></li>
                                                    <li><a href="#">3 Years / 36,000 Miles</a></li>
                                                    <li class="divider"></li>
                                                    <li><a class="newItem_warr_add" href="#">Make New Warranty Item</a></li>
                                                </ul>
                                            </div>
                                            <input id="v_warranty_one" type="text" class="form-control" value="<?php echo $row_find_vehicle['v_warranty_one']; ?>"></div>
                                        <div class="input-group m-b"><input id="v_warranty_two" type="text" class="form-control" value="<?php echo $row_find_vehicle['v_warranty_two']; ?>">

                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-white" type="button">2nd. Warranty</button>
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="#">30 Days / 3 Month Warranty</a></li>
                                                     <li><a href="#">1 Year / 12,000 Miles</a></li>
                                                    <li><a href="#">2 Years / 24,000 Miles</a></li>
                                                    <li><a href="#">3 Years / 36,000 Miles</a></li>
                                                    <li class="divider"></li>
                                                    <li><a  class="newItem_warr_add" href="#">Make New Warranty Item</a></li>
                                                </ul>
                                            </div>
                                            </div>
                                    



                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroption1chck" type="checkbox" <?php if (!(strcmp("1", $row_find_vehicle['dlroption1chck']))) {echo "checked=\"checked\"";} ?> value="1"> </span> <input  id="dlroption1" type="text" class="form-control"  placeholder="Extended Dealer Option 1" value="<?php echo $row_find_vehicle['dlroption1']; ?>"></div>
                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroption2chck" type="checkbox" <?php if (!(strcmp("1", $row_find_vehicle['dlroption2chck']))) {echo "checked=\"checked\"";} ?> value="1"> </span> <input  id="dlroption2" type="text" class="form-control"  placeholder="Extended Dealer Option 2" value="<?php echo $row_find_vehicle['dlroption2']; ?>"></div>



                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroption3chck" type="checkbox" <?php if (!(strcmp("1", $row_find_vehicle['dlroption3chck']))) {echo "checked=\"checked\"";} ?> value="1"> </span> <input  id="dlroption3" type="text" class="form-control"  placeholder="Extended Dealer Option 3" value="<?php echo $row_find_vehicle['dlroption3']; ?>"></div>




                                    
                                    
                                    </div>
                                </div>




                                <div class="hr-line-dashed"></div>



								<div class="form-group">
									<label class="col-sm-2 control-label">Optional Equipment</label>

                                    <div class="col-sm-10">

                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip1chck" type="checkbox" <?php if (!(strcmp("1", $row_find_vehicle['dlroptequip1chck']))) {echo "checked=\"checked\"";} ?> value="1"> </span> <input  id="dlroptequip1"type="text" class="form-control"  placeholder="Addon 1" value="<?php echo $row_find_vehicle['dlroptequip1']; ?>"></div>
                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip2chck" type="checkbox" <?php if (!(strcmp("1", $row_find_vehicle['dlroptequip2chck']))) {echo "checked=\"checked\"";} ?> value="1"> </span> <input  id="dlroptequip2"type="text" class="form-control"  placeholder="Addon 2" value="<?php echo $row_find_vehicle['dlroptequip2']; ?>"></div>
                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip3chck" type="checkbox" <?php if (!(strcmp("1", $row_find_vehicle['dlroptequip3chck']))) {echo "checked=\"checked\"";} ?> value="1"> </span> <input  id="dlroptequip3"type="text" class="form-control"  placeholder="Addon 3" value="<?php echo $row_find_vehicle['dlroptequip3']; ?>"></div>
                                    
                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip4chck" type="checkbox" <?php if (!(strcmp("1", $row_find_vehicle['dlroptequip4chck']))) {echo "checked=\"checked\"";} ?> value="1"> </span> <input  id="dlroptequip4"type="text" class="form-control"  placeholder="Addon 4" value="<?php echo $row_find_vehicle['dlroptequip4']; ?>"></div>



                                    <div class="input-group m-b"><span class="input-group-addon"> <input id="dlroptequip5chck" type="checkbox" <?php if (!(strcmp("1", $row_find_vehicle['dlroptequip5chck']))) {echo "checked=\"checked\"";} ?> value="1"> </span> <input  id="dlroptequip5"type="text" class="form-control"  placeholder="Addon 5" value="<?php echo $row_find_vehicle['dlroptequip5']; ?>"></div>

                                    
                                    
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

                                 <div class="col-sm-10"><input id="vpurchasecost" type="text" class="form-control" value="<?php echo $row_find_vehicle['vpurchasecost']; ?>"></div>
                             </div>
                                


							<div class="form-group">
                            	<label for="vdlrpack" class="col-sm-2 control-label">Dealer Pack:</label>

                                 <div class="col-sm-10"><input id="vdlrpack" type="text" class="form-control" value="<?php echo $row_find_vehicle['vdlrpack']; ?>"></div>
                             </div>



                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                <label for="vaddedcost" class="col-sm-2 control-label">Added Cost:</label>
                                
                                    <div class="col-sm-10">
                                        <input id="vaddedcost" type="text" class="form-control" value="<?php echo $row_find_vehicle['vaddedcost']; ?>">
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
	<script src="js/edit.inventory.js"></script>
    <!-- Fancy box -->
    <script src="js/plugins/fancybox/jquery.fancybox.js"></script>


    <script>
        $(document).ready(function() {
            $('.fancybox').fancybox({
                openEffect	: 'none',
                closeEffect	: 'none'
            });
        });
    </script>
    
    
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
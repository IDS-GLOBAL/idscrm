<?php

$vehicle_id  = $url->segment(2);

//
$found_vehicle_id = '-1';

if(is_numeric($vehicle_id)){ $found_vehicle_id = $vehicle_id; }



$colname_find_vehicle = "-1";
if (is_numeric($vehicle_id)) {
  $colname_find_vehicle = $vehicle_id;
}
mysqli_select_db($autocity_connection_mysqli,  $database_autocity_connection);
$query_find_vehicle = "SELECT * FROM `idsids_idsdms`.`vehicles`
									LEFT JOIN `idsids_idsdms`.`dealers`
									ON `vehicles`.`did` = `dealers`.`id`
							 WHERE `dealers`.`id` =  `vehicles`.`did` AND `vehicles`.`vid` = '$colname_find_vehicle'";
$find_vehicle = mysqli_query($autocity_connection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);

$colname_find_vehicle_photos = "-1";
if (is_numeric($vehicle_id)) {
  $colname_find_vehicle_photos = $vehicle_id;
}
mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_find_vehicle_photos = "SELECT * FROM `idsids_idsdms`.`vehicle_photos` 
									LEFT JOIN `idsids_idsdms`.`vehicles`
									ON `vehicle_photos`.`vehicle_id` = `vehicles`.`vid`
WHERE `vehicle_id` = '$colname_find_vehicle_photos' ORDER BY `vehicle_photos`.`sort_orderno` ASC, `vehicle_photos`.`v_photoid` ASC, `vehicles`.`created_at` DESC";
$find_vehicle_photos = mysqli_query($autocity_connection_mysqli, $query_find_vehicle_photos);
$row_find_vehicle_photos = mysqli_fetch_assoc($find_vehicle_photos);
$totalRows_find_vehicle_photos = mysqli_num_rows($find_vehicle_photos);


$dlr_ok_googlemp = $row_find_vehicle['dlr_ok_googlemp'];
$dlr_geo_latitude = $row_find_vehicle['dlr_geo_latitude'];
$dlr_geo_longitude = $row_find_vehicle['dlr_geo_longitude'];

$vid = $row_find_vehicle['vid'];
$vtoken = $row_find_vehicle['vtoken'];
$vdid = $row_find_vehicle['did'];
$vlivestatus = $row_find_vehicle['vlivestatus'];
$vstockno = $row_find_vehicle['vstockno'];
$vmileage = $row_find_vehicle['vmileage'];
$vyear = $row_find_vehicle['vyear'];
$vmake = $row_find_vehicle['vmake'];
$vmodel = $row_find_vehicle['vmodel'];
$vtrim = $row_find_vehicle['vtrim'];
$vvin = $row_find_vehicle['vvin'];

$vcondition = $row_find_vehicle['vcondition'];
$vbody = $row_find_vehicle['vbody'];
$vecolor_txt = $row_find_vehicle['vecolor_txt'];
$vicolor_txt = $row_find_vehicle['vicolor_txt'];
if(isset($row_find_vehicle['vcustomcolor'])){
$vecolor_txt = $row_find_vehicle['vcustomcolor'];
}
$vcylinders = $row_find_vehicle['vcylinders'];


$vdescript_txt = $row_find_vehicle['vyear'].' '.$row_find_vehicle['vmake'].' '.$row_find_vehicle['vmodel'].' '.$row_find_vehicle['vtrim'];


$vmileage = $row_find_vehicle['vmileage'];
$vrprice = $row_find_vehicle['vrprice'];

	
$vdprice = $row_find_vehicle['vdprice'];
if(!$vdprice){
	$vdprice = ($row_find_vehicle['vrprice']) * (.20);
	$vdprice = number_format($vdprice, 2);
}

$vthubmnail_file_path = $row_find_vehicle['vthubmnail_file_path'];

$vadvalorem_tax = $row_find_vehicle['vadvalorem_tax'];

$dlr_status = $row_find_vehicle['status'];
$wfh_dealer_status = $row_find_vehicle['wfh_dealer_status'];

// Package Codes Defined
$wfh_did_deal_package_id = $row_find_vehicle['wfh_did_deal_package_id'];
$wfh_did_deal_package_code = $row_find_vehicle['wfh_did_deal_package_code'];

$zero_out = 0.00;
$settingCurrency = $row_find_vehicle['settingCurrency'];
$settingDefaultDPpercntg = $row_find_vehicle['settingDefaultDPpercntg'];
$settingDefaultPromoPriceOff = $row_find_vehicle['settingDefaultPromoPriceOff'];



$settingDefaultTerm = $row_find_vehicle['settingDefaultTerm'];
if(!$settingDefaultTerm){$settingDefaultTerm = (int)36; }

$settingDefaultAPR = $row_find_vehicle['settingDefaultAPR'];
if(!$settingDefaultAPR){$settingDefaultTerm = 18.0; }


$settingSateSlsTax = $row_find_vehicle['settingSateSlsTax'];
if(!$settingSateSlsTax){
	$settingSateSlsTax = 6.0;
}

$settingDocDlvryFee = $row_find_vehicle['settingDocDlvryFee'];
if(!$settingDocDlvryFee){$settingDocDlvryFee = 250.00; }

$settingTitleFee = $row_find_vehicle['settingTitleFee'];
if(!$settingTitleFee){ $settingTitleFee = 55.00; };

$settingStateInspectnFee = $row_find_vehicle['settingStateInspectnFee'];
if(!$settingStateInspectnFee){ $settingStateInspectnFee = 30.00; };

$licsNtitlefee= ($settingStateInspectnFee + $settingTitleFee);

// 3.0
$newmatrixcredit_vgoodcredit = $row_find_vehicle['newmatrixcredit_vgoodcredit'];
// 7.0
$newmatrixcredit_jgoodcredit = $row_find_vehicle['newmatrixcredit_jgoodcredit'];
// 12.0
$newmatrixcredit_faircredit = $row_find_vehicle['newmatrixcredit_faircredit'];
// 21.0
$newmatrixcredit_poorcredit = $row_find_vehicle['newmatrixcredit_poorcredit'];
// 23.0
$newmatrixcredit_subprime = $row_find_vehicle['newmatrixcredit_subprime'];
// 29.0
$newmatrixcredit_unknown = $row_find_vehicle['newmatrixcredit_unknown'];


// 3.0
$usedmatrixcredit_vgoodcredit = $row_find_vehicle['usedmatrixcredit_vgoodcredit'];
// 7.0
$usedmatrixcredit_jgoodcredit = $row_find_vehicle['usedmatrixcredit_jgoodcredit'];
// 12.0 
$usedmatrixcredit_faircredit = $row_find_vehicle['usedmatrixcredit_faircredit'];
// 21.0
$usedmatrixcredit_poorcredit = $row_find_vehicle['usedmatrixcredit_poorcredit'];
// 23.0
$usedmatrixcredit_subprime = $row_find_vehicle['usedmatrixcredit_subprime'];
// 29.0
$usedmatrixcredit_unknown = $row_find_vehicle['usedmatrixcredit_unknown'];



$usedmatrixcredit_fminimumprofit = $row_find_vehicle['usedmatrixcredit_fminimumprofit'];
$usedmatrixcredit_bminimumprofit = $row_find_vehicle['usedmatrixcredit_bminimumprofit'];

$newmatrixcredit_fminimumprofit = $row_find_vehicle['newmatrixcredit_fminimumprofit'];
$newmatrixcredit_bminimumprofit = $row_find_vehicle['newmatrixcredit_bminimumprofit'];


// Dealer Type 2 = BuyHerePayHere(dtype_value)
if($row_find_vehicle['dealer_type_id'] == 2){
   
				$disable_sellingprice = 'disabled';	
				
				$disable_term = 'disabled';	 

				$disable_rate = 'disabled';	 

}else{
				$disable_sellingprice = '';	 

				$disable_term = '';	 

				$disable_rate = '';	 
}


mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_vehicles = "SELECT * FROM `idsids_idsdms`.`vehicles`, `idsids_idsdms`.`dealers` WHERE `vlivestatus` = '1' AND `dealers`.`id` = `vehicles`.`did` AND `vehicles`.`vthubmnail_file` IS NOT NULL ORDER BY RAND() LIMIT 50";
$vehicles = mysqli_query($autocity_connection_mysqli, $query_vehicles);
$row_vehicles = mysqli_fetch_assoc($vehicles);
$totalRows_vehicles = mysqli_num_rows($vehicles);



mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_dstnct_vmakes = "SELECT DISTINCT `vehicles`.`vmake`, `vehicles`.`vmodel`, `vehicles`.`vlivestatus` FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vlivestatus` = 1";
$dstnct_vmakes = mysqli_query($autocity_connection_mysqli, $query_dstnct_vmakes);
$row_dstnct_vmakes = mysqli_fetch_assoc($dstnct_vmakes);
$totalRows_dstnct_vmakes = mysqli_num_rows($dstnct_vmakes);

 $sql_where = '';
if(isset($_GET['srch'])){
  $colname_filter_srch =  mysqli_escape_string($autocity_connection_mysqli, trim($_GET['srch']));
  //$sql_where =  "AND `vehicles`.`vmodel` LIKE '%$colname_filter_srch%' ";
  $sql_where .= "AND MATCH(`vehicles`.`vmake`) AGAINST ('%$vmake%' IN BOOLEAN MODE) " ;

}
mysqli_select_db($autocity_connection_mysqli,  $database_autocity_connection);
$query_filter_vehicles = "SELECT * FROM `idsids_idsdms`.`vehicles`
									LEFT JOIN `idsids_idsdms`.`dealers`
									ON `vehicles`.`did` = `dealers`.`id`
									
									
								    WHERE 
										`vehicles`.`vlivestatus` = '1' 
									AND 
										`dealers`.`status` = '1'
									AND
										`dealers`.`id` = '$vdid'
									
									$sql_where
									AND 
										`vehicles`.`vthubmnail_file` 
									IS NOT NULL 
									GROUP BY 
										`vehicles`.`vid`
									ORDER BY RAND()
									LIMIT 5";
$filter_vehicles = mysqli_query($autocity_connection_mysqli, $query_filter_vehicles);
$row_filter_vehicles = mysqli_fetch_assoc($filter_vehicles);
$totalRows_filter_vehicles = mysqli_num_rows($filter_vehicles);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AutoCityMag - <?php echo $vdescript_txt; ?></title>
        
        <base href="/">
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">

        <!--Plugin CSS-->
        <link href="dist/css/plugins.min.css" rel="stylesheet">

        <!--main Css-->
        <link href="dist/css/main.min.css" rel="stylesheet">
    </head>
    <body>

        <!-- Header-->
        <?php require_once("_inc.header.php"); ?>
        <!-- End Header-->

        <!-- Page Inner-->
        <section>
            <div class="background-image-maker gradient gradient-lr"></div>
            <div class="holder-image">
                <img src="dist/images/bg2.jpg" alt="" class="img-fluid d-none" />
            </div>
            <div class="black-overlay overlay-full"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 justify-content-center text-center">
                        <h1 class="text-white c-font-weight-700"><?php echo $vdescript_txt; ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Inner-->

        <!-- Breadcrumb -->
        <section class="py-0 h-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10 col-sm-5 col-lg-3 text-center">
                        <ol class="breadcrumb justify-content-center mb-0 c-bg-primary text-white py-3 position-relative">
                            <li class="breadcrumb-item"><a href="/vehicles/?id=<?php echo $row_find_vehicle_photos['dealer_id']; ?>">Vehicles</a></li>
                            <li class="breadcrumb-item active">Details Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->

        <!-- List Details -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mb-4 mb-lg-0">
                        <div class="car-listing">
                            <div class="flexslider c-bg-dark mb-4">

<?php if( $totalRows_find_vehicle_photos != 0): ?>

<?php $counter_gridrow = 0; ?>

<?php $counter_gridroww = 0; ?>                            
                                <ul class="slides">

<?php do {
								
								$vdid = $row_find_vehicle_photos['dealer_id'];
								$vvid = $row_find_vehicle_photos['vehicle_id'];
								
								$photo_thumb_fpath = $row_find_vehicle_photos['photo_file_name'];
								$vopen_url = 'https://images.autocitymag.com/'."$vdid/"."$vvid/".$photo_thumb_fpath
							?>
                            
                            <?php $counter_gridrow++; ?>

							<?php if($counter_gridrow == 1){ $active = 'active'; }else{ $active = ""; } ?>
                                                            
                                    <li class="position-relative"  data-thumb="<?php echo $vopen_url; ?>">
                                        <img src="<?php echo $vopen_url; ?>" alt="" class="img-fluid" />
                                        <div class="fullscreen position-absolute text-center">
                                            <a href="<?php echo $vopen_url; ?>" class="btn-gallery c-primary"><i class="fa fa-arrows-alt"></i></a>
                                        </div>
                                    </li>

<?php } while ($row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos));
							
		 									  	$rows = mysqli_num_rows($find_vehicle_photos);
												  if($rows > 0) {
													  mysqli_data_seek($find_vehicle_photos, 0);
													  $row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos);
												  }

							?>

<?php endif; ?>
                                </ul>
                            </div>
                            <div class="c-bg-dark rounded-top">
                                <ul class="nav nav-tabs border-0 flex-column flex-sm-row text-white" id="myTab" role="tablist">
                                <?php  if($row_find_vehicle ['vcomments']){
									$activeShow = "";
								 	$activeExpanded = 'false';
								?>

                               
                                    <li class="nav-item mb-0 rounded-left">
                                        <a class="nav-link redial-light border-0 py-3 active" data-toggle="tab" href="#overview" role="tab" aria-expanded="true">Comments</a>
                                    </li>
								<?php }else{$activeShow = "show active"; $activeExpanded='true'; } ?>
                                    <li class="nav-item mb-0">
                                        <a class="nav-link redial-light rounded-0 border-0 py-3 <?php echo $activeShow; ?>" data-toggle="tab" href="#somedetails" role="tab" aria-expanded="<?php echo $activeExpanded; ?>">Details</a>
                                    </li>
                                    <li class="nav-item mb-0">
                                        <a class="nav-link redial-light rounded-0 border-0 py-3" data-toggle="tab" href="#features" role="tab" aria-expanded="false">Features</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent2">
                            <?php  if($row_find_vehicle ['vcomments']){

								 $activeShow = "";
								 $activeExpanded = 'false';
							
							?>
                                <div class="tab-pane fade active show" id="overview" role="tabpanel" aria-expanded="true">
                                    <div class="border c-brd-light border-top-0">
                                        <div class="card-body pt-5">
                                            
                                            <?php if(!$row_find_vehicle ['vcomments']){ echo '<p>No Comments...</p>'; }else{ echo '<p>'.$row_find_vehicle ['vcomments'].'</p>'; } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                           <? }else {$activeExpanded = 'true';  $activeShow = "active show"; } ?>
                                <div class="tab-pane fade <?php echo $activeShow; ?>" id="somedetails" role="tabpanel" aria-expanded="<?php echo $activeExpanded; ?>">
                                    <div class="border c-brd-light border-top-0">
                                        <div class="pt-4"></div>
                                        <div class="list-header p-3">
                                            <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#engine"><i class="flaticon-engine pr-1"></i> Vehicle Information</a>
                                        </div>
                                        <div id="engine" class="collapse show widget-content">
                                            <table class="table table-striped mb-0">
                                                <tbody>
                                                    
                                                    <tr>
                                                    	<td>Body</td>
                                                        <td><?php if($row_find_vehicle['vbody']){ echo $row_find_vehicle['vbody'];  }else{ echo 'Unlisted'; } ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Engine Type</td>
                                                        <td><?php if($row_find_vehicle['vengine']){ echo $row_find_vehicle['vengine'];  }else{ echo 'Unlisted'; } ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Condition</td>
														<td><?php if($row_find_vehicle['vcondition']){ echo $row_find_vehicle['vcondition'];  }else{ echo 'Unlisted'; } ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Stock No</td>
														<td><?php if($row_find_vehicle['vstockno']){ echo $row_find_vehicle['vstockno'];  }else{ echo 'Unlisted'; } ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Odometer</td>
                                                        <td><?php if($row_find_vehicle['vmileage']){ echo $row_find_vehicle['vmileage'];  }else{ echo 'Unlisted'; } ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Of Cylinders</td>
                                                        <td><?php if($row_find_vehicle['vcylinders']){ echo $row_find_vehicle['vcylinders']; }else{ echo 'Unlisted'; } ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fuel Type</td>
                                                        <td><?php if($row_find_vehicle['vfueltype']){ echo $row_find_vehicle['vfueltype']; }else{ echo 'Unlisted'; } ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>VIN</td>
                                                        <td><?php echo $row_find_vehicle['vvin']; ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
<!--
                                        <div class="list-header p-3">
                                            <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#dimensions"><i class="flaticon-transport-7 pr-1"></i> Dimensions</a>
                                        </div>
                                        
                                        <div id="dimensions" class="collapse show widget-content">
                                            <table class="table table-striped mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Length</td>
                                                        <td>3995mm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Width</td>
                                                        <td>1660mm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Height</td>
                                                        <td>1520mm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ground Clearance</td>
                                                        <td>165mm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wheel Base</td>
                                                        <td>2425mm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Front Tread</td>
                                                        <td>1479mm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Rear Tread</td>
                                                        <td>1493mm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Seating Capacity</td>
                                                        <td>5 Comfortable</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cargo Volume</td>
                                                        <td>460-Litres Maximum</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Number of Doors</td>
                                                        <td>5</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tyre Type</td>
                                                        <td>Tubeless, Radial</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wheel Type</td>
                                                        <td>Alloy Wheel</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fuel Tank Capacity</td>
                                                        <td>65 Litres</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    	-->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="features" role="tabpanel" aria-expanded="false">
                                    <div class="border c-brd-light border-top-0">
                                        <div class="card-body pt-4">
                                            <div class="row">
                                                <div class="col-12 col-sm-12">

<?php
$voptions = $row_find_vehicle['vehicleOptionsBulk'];
$voptionsbreak = '12';

	if($row_find_vehicle['importHomnetPhotos']){
	
		$voptionsArrays = preg_split("/~/", "$voptions");

	}else if($row_find_vehicle['frazerid']){
		
		$voptionsArrays = preg_split("/,/", "$voptions");
		
	}else{
	
		$voptionsArrays = preg_split("/`/", "$voptions");
		
	}

	$voptionsCount = count($voptionsArrays);

if(isset($row_find_vehicle['vehicleOptionsBulk'])){
	$voptionsbreak = round(($voptionsCount / 2));
}

//print_r($voptionsArrays);
//$voption1 = $voptionsArrays['0'];

$voption1 = $voptionsArrays['0'];
?>
<?php if($voptionsCount > 1): ?>

<ul title="<?php echo 'Count: '.$voptionsCount.' - '.'Break: '.$voptionsbreak; ?>" class="list-unstyled c-line-height-3 mb-0">
		<?php	for($i=0;$i<count($voptionsArrays); $i++) { ?>

	 <li title="<?php echo $i; ?>"><i class="fa fa-check c-primary pr-2"></i> <?php echo $voptionsArrays["$i"]; ?></li>

<?php if("$i" === "$voptionsbreak"){ 
												echo "</div>
                                                <div class='col-12 col-sm-6'>
                                                    <ul class='list-unstyled c-line-height-3 mb-0'>";
													
                                                    

} ?>

        
    
        <?php } //echo $i; ?>
<?php else: ?>


		<p>No Data To Load Currently..</p>
        
<?php endif; ?>
</ul>  

                                                
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card c-brd-light mb-4">
                            <div class="card-body">
                                <h4><?php echo $vdescript_txt; ?></h4>
                                <ul class="list-unstyled c-line-height-2_5 mb-0">
                                    <li><?php if($vrprice){ echo '<small class="c-light">Price</small> <h4 class="d-inline-block c-primary mb-1">$'.formatMoney($vrprice); }else{ echo '<h4 class="d-inline-block c-primary mb-1">Contact Us About Price'; } ?> </h4></li>
                                    <li><i class="fa fa-map-marker pr-1"></i> <?php  echo $row_find_vehicle['city']; ?>,  <?php echo $row_find_vehicle['state']; ?>   <?php echo $row_find_vehicle['zip']; ?></li>
                                </ul>
                            </div>
                            <table class="table mb-0 c-line-height-1_5 c-brd-light">
                                <tbody>
                                    <tr>
                                        <td class="c-dark c-font-weight-600 b-r"><i class="flaticon-calendar pr-1"></i> Body:</td>
                                        <td><?php echo $vbody; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="c-dark c-font-weight-600 b-r"><i class="flaticon-fuel pr-1"></i> Fuel:</td>
                                        <td><?php if(!$row_find_vehicle['vfueltype']){ echo 'Unlisted'; }else{ echo $row_find_vehicle['vfueltype']; } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="c-dark c-font-weight-600 b-r"><i class="flaticon-transport-2 pr-1"></i> Trans.:</td>
                                        <td><?php if(!$row_find_vehicle['vtransm']){ echo 'Unlisted'; }else{ echo $row_find_vehicle['vtransm']; } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="c-dark c-font-weight-600 b-r"><i class="flaticon-ammunition pr-1"></i> Color:</td>
                                        <td><?php echo $vecolor_txt; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="c-dark c-font-weight-600 b-r"><i class="flaticon-clock pr-1"></i> Driven:</td>
                                        <td><?php if(!$row_find_vehicle['vmileage']){ echo 'Unlisted'; }else{ echo $row_find_vehicle['vmileage']; } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="c-dark c-font-weight-600 b-r"><i class="flaticon-engine pr-1"></i> Engine:</td>
                                        <td><?php if(!$row_find_vehicle['vengine']){ echo 'Unlisted'; }else{ echo $row_find_vehicle['vengine']; } ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card c-brd-light mb-4">
                            <div class="c-bg-light">
                                <div class="card-body p-3">
                                    <h6 class="mb-0 c-dark c-font-weight-600 b-r">Request More Information From This Seller</h6>
                                </div>
                            </div>
                            <div class="card-body py-4 bg-white">
                            	
                                <div id="load_vlead_response"></div>
                                    
                                <div class="form-group">
                                    <input id="ld_fullname" type="text" class="form-control" placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <input id="ld_email" type="email" class="form-control" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <input id="ld_cellphone" type="text" class="form-control" placeholder="Cell Phone" />
                                </div>
                                <div class="form-group">
                                    <textarea id="ld_message" class="form-control" placeholder="Message"></textarea>
                                    <input id="ld_vid" type="hidden" value="<?php echo $row_find_vehicle['vid']; ?>">
                                    <input id="ld_vdid" type="hidden" value="<?php echo $row_find_vehicle['did']; ?>">
                                </div>
                                <div class="form-group" align="center">
                                <button id="send_vehicle_msg" type="button" class="btn btn-primary btn-lg text-uppercase"> Send Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="card c-brd-light mb-4 right-sidebar-widget">
                            <div class="c-bg-light">
                                <div class="card-body p-3">
                                    <h6 class="mb-0 c-dark c-font-weight-600 b-r">Finance Calculator</h6>
                                </div>
                            </div>
                            <div class="card-body py-4 bg-white">
                                <label class="c-dark">Vehicle Price</label>
                                <div class="form-group">
                                    <input id="settingvrprice" type="text" class="form-control" placeholder="$<?php if($row_filter_vehicles['vrprice']){ echo number_format($row_filter_vehicles['vrprice'], 2); } ?>">
                                </div>
                                <label class="c-dark">Down Payment</label>
                                <div class="form-group">
                                    <input id="settingvdprice" type="text" class="form-control" placeholder="$<?php echo $vdprice; ?>" />
                                </div>
                                <label class="c-dark mb-3">Interest Rate (%)</label>
                                <div class="form-group">
                                    <input id="settingDefaultAPR" data-ui-slider="" type="text" value="<?php echo $settingDefaultAPR; ?>" data-slider-min="1" data-slider-max="10" data-slider-step="1" data-slider-value="<?php echo $settingDefaultAPR; ?>" data-slider-orientation="horizontal" class="slider slider-horizontal">
                                </div>
                                <label class="c-dark mb-3">Loan Period (month)</label>
                                <div class="form-group">
                                    <input id="settingDefaultAPR" data-ui-slider="" type="text" value="<?php echo $settingDefaultAPR; ?>" data-slider-min="1" data-slider-max="50" data-slider-step="1" data-slider-value="<?php echo $settingDefaultTerm; ?>" data-slider-orientation="horizontal" class="slider slider-horizontal">
                                </div>
                                <div class="form-group" align="center">
                                    <button class="btn btn-primary btn-lg text-uppercase" type="button" id="calculatePaymentBtn"> Calculate Payment Terms</button>
                                </div>
                                <dl class="row mb-0">
                                    <dt class="col-sm-8 font-weight-normal">Total Loan Amount:</dt>
                                    <dd class="col-sm-4 c-dark text-sm-right"><?php if($vrprice){ echo '$'.formatMoney($vrprice); } else{ echo "$ 0.00"; } ?></dd>

                                    <dt class="col-sm-8 font-weight-normal">Payable Amount:</dt>
                                    <dd class="col-sm-4 c-dark text-sm-right">$ 0.00</dd>

                                    <dt class="col-sm-8 font-weight-normal">Total Interest Payable:</dt>
                                    <dd class="col-sm-4 c-dark text-sm-right">$ 0.00</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End List Details -->

        <!-- Car Featured-->
        <section class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <h3>Related Cars</h3>
                        <p>Other vehicles related to this vehicle</p>
                    </div>
                </div>
                <div class="slider multiple-items2">
                         





    <!-- A GALLERY ENTRY -->
    <?php if($totalRows_filter_vehicles != 0 ): do { ?>
    
    
	
<?php 
	$vid = $row_filter_vehicles['vid'];
	$did = $row_filter_vehicles['did'];
	$vdid = $row_filter_vehicles['did'];
	$img = $row_filter_vehicles['vthubmnail_file'];

	$thumbs = 'thumbs'; 
	$file = $row_filter_vehicles['vthubmnail_file']; 
	//$image = "https://idscrm.com/vehicles/photos/$vdid/$vid/$file";
	$image = "https://images.autocitymag.com/$vdid/$vid/$file";
	$year = $row_filter_vehicles['vyear'];
	$make = $row_filter_vehicles['vmake'];
	$model = $row_filter_vehicles['vmodel'];
	$trim = $row_filter_vehicles['vtrim'];
	$stock = $row_filter_vehicles['vstockno'];
	$vtitle = "$year $make $model $trim";
	$trans = $row_filter_vehicles['vtransm'];
	$ecolor = $row_filter_vehicles['vecolor_txt'];
	$icolor = $row_filter_vehicles['vicolor_txt'];
	$engine = $row_filter_vehicles['vengine'];
	$mileage = $row_filter_vehicles['vmileage'];
	$price = $row_filter_vehicles['vrprice'];
	
	
	 
	
	
	if(!$price || $price == 0){
		
		$price = 'Contact';
	}else {
	$price = '$'.formatMoney(number_format($row_vehicles['vrprice'], 2));
	}
	$truepic = "https://images.autocitymag.com/$did/$vid/$img";

	$file_headers = @get_headers($truepic );
	if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
		break;
	}

?>


                            <div class="">
                                <a href="/vehicle/<?php echo $vid; ?>/"><img src="<?php echo $truepic; ?>" alt="" class="img-fluid rounded-top" /></a>
                                <div class="card c-brd-light car-box">
                                    <div class="card-body">
                                        <h6 class="mb-2"><a href="/vehicle/<?php echo $vid; ?>/"><?php echo $vtitle; ?>/</a></h6>
                                        <ul class="list-unstyled mb-0 c-line-height-2_5">
                                            <li><h6 class="c-primary mb-0"><small class="c-light">Price</small> <?php echo $price; ?> </h6></li>
                                            <li><i class="fa fa-map-marker pr-1"></i> <?php echo $row_filter_vehicles['city']; ?>, <?php echo $row_filter_vehicles['state']; ?></li>
                                        </ul>
                                    </div>
                                    <ul class="list-inline mb-0 p-3 c-brd-light border border-left-0 border-bottom-0 border-right-0">
                                        <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-calendar pr-1"></i> <?php echo $row_filter_vehicles['vyear']; ?> </a></li>
                                        <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-clock pr-1"></i> <?php echo $price; ?></a></li>
                                        <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-fuel pr-1"></i>  <?php echo $row_filter_vehicles['vfueltype']; ?> </a></li>
                                        <li class="list-inline-item"><a href="#" class="c-light"><i class="flaticon-transport-2 pr-1"></i>  <?php echo $row_filter_vehicles['vtransm']; ?> </a></li>
                                    </ul>
                                </div>
                            </div>

 <?php
} while ($row_filter_vehicles = mysqli_fetch_assoc($filter_vehicles));
  $rows = mysqli_num_rows($filter_vehicles);
  if($rows > 0) {
	  mysqli_data_seek($filter_vehicles, 0);
	  $row_filter_vehicles = mysqli_fetch_assoc($filter_vehicles);
  }
mysqli_close($autocity_connection_mysqli);

else:
?>



                            
<div>
                        <a href="#"><img src="dist/images/img5.jpg" alt="" class="img-fluid rounded-top" /></a>
                        <div class="card c-brd-light car-box">
                            <div class="card-body">
                                <h6 class="mb-2"><a href="#">No Listing Available</a></h6>
                                <ul class="list-unstyled mb-0 c-line-height-2_5">
                                    <li><h6 class="c-primary mb-0"><small class="c-light">Price</small> 0.00 </h6></li>
                                    
                                </ul>
                            </div>
                            <ul class="list-inline mb-0 p-3 c-brd-light border border-left-0 border-bottom-0 border-right-0">
                                <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-calendar pr-1"></i> NA </a></li>
                                <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-clock pr-1"></i> NA</a></li>
                                <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-fuel pr-1"></i>  NA </a></li>
                                <li class="list-inline-item"><a href="#" class="c-light"><i class="flaticon-transport-2 pr-1"></i>  NA </a></li>
                            </ul>
                        </div>
                    </div>
                    
<?php endif; ?>
                        
                

                
                
                
                </div>
            </div>
        </section>
        <!-- End Car Featured-->


        

        <!-- Footer Bottom -->
        <?php require_once("_inc.footer.php"); ?>
        <!-- End Footer Bottom -->


        <!-- jQuery -->
        <script src="dist/js/plugins.min.js"></script>
        <script src="dist/js/common.js"></script>
        
    </body>
</html>
<?php //require_once("_inc.end_mysql.php"); ?>
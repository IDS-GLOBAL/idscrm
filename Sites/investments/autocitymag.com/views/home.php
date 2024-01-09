<?php
mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states` ORDER BY `state_id` ASC";
$states = mysqli_query($autocity_connection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);



mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_markets = "SELECT * FROM `idsids_wefinancehere`.`states`, `idsids_wefinancehere`.`markets_dm` WHERE `states`.`state_id` = `markets_dm`.`state_id` AND `markets_dm`.`market_status` = '1'";
$markets = mysqli_query($autocity_connection_mysqli, $query_markets);
$row_markets = mysqli_fetch_assoc($markets);
$totalRows_markets = mysqli_num_rows($markets);

mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_vehicles = "SELECT * FROM `idsids_idsdms`.`vehicles`, `idsids_idsdms`.`dealers` WHERE `vlivestatus` = '1' AND `dealers`.`id` = `vehicles`.`did` AND `vehicles`.`vthubmnail_file` IS NOT NULL ORDER BY RAND() LIMIT 50";
$vehicles = mysqli_query($autocity_connection_mysqli, $query_vehicles);
$row_vehicles = mysqli_fetch_assoc($vehicles);
$totalRows_vehicles = mysqli_num_rows($vehicles);



mysqli_select_db($autocity_connection_mysqli, $database_autocity_connection);
$query_dstnct_vmakes = "SELECT DISTINCT `vehicles`.`vmake`, `vehicles`.`vlivestatus` FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vlivestatus` = '1' AND `vehicles`.`vmake` IS NOT NULL ORDER BY `vehicles`.`vmake` ASC";
$dstnct_vmakes = mysqli_query($autocity_connection_mysqli, $query_dstnct_vmakes);
$row_dstnct_vmakes = mysqli_fetch_assoc($dstnct_vmakes);
$totalRows_dstnct_vmakes = mysqli_num_rows($dstnct_vmakes);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Auto City Mag - Search</title>  
        
        <base href="/">
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
        
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
                        <h1 class="text-white c-font-weight-700">Search AutoCityMag Below</h1>
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Car Listing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->
        
        <!-- List Without Sidebar -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card c-brd-light car-box mb-5">
                            <div class="card-body">
                                <div class="row">
								  <div class="col-12 col-sm-12">
                                  
									<div class="row">

                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Select State</label>
                                        <div class="form-group">
                                            <select id="slct_state" class="form-control rounded">
                                                <option value="">--- Select State ---</option>

									  <?php do { ?>
									  <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']; ?> - <?php echo $row_states['state_name']; ?></option>
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
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Select Market/City</label>
                                        <div class="form-group">
                                            <select id="load_markets" class="form-control rounded">
                                                <option value="">--- All Markets ---</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Make</label>
                                        <div class="form-group">
                                            <select id="slct_makes" class="form-control rounded">
												<option value="">--- All Makes ---</option>
									  <?php do { 
									  $optional_vmake = strtolower($row_dstnct_vmakes['vmake']);
									  ?>
									  <option value="<?php echo ucwords($optional_vmake); ?>"><?php echo ucwords($optional_vmake); ?></option>
									  <?php
											} while ($row_dstnct_vmakes = mysqli_fetch_assoc($dstnct_vmakes));
											  $rows = mysqli_num_rows($dstnct_vmakes);
											  if($rows > 0) {
												  mysqli_data_seek($dstnct_vmakes, 0);
												  $row_dstnct_vmakes = mysqli_fetch_assoc($dstnct_vmakes);
											  }
									   ?>
                                       		</select>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Model</label>
                                        <div class="form-group">
                                            <select id="slct_load_models" class="form-control rounded">
                                            	<option value="">--- Load Models ---</option>
                                            
                                                
                                                
                                            </select>
                                        </div>
                                    </div> 
                                

                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Body Type</label>
                                        <div class="form-group">
                                            <select class="form-control rounded">
                                                <option value="Sedan">Sedan</option>
                                                <option value="Hatchback">Hatchback</option>
                                                <option value="SUV">SUV</option>
                                                <option value="Minivan">Minivan</option>
                                                <option value="Pickup">Pickup</option>
                                                <option value="Coupe Car">Coupe Car</option>
                                                <option value="Convertible">Convertible</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Budget ($)</label>
                                        <div class="form-group">
                                            <select class="form-control rounded">
                                                <option value="20,000 - 1,00,000">20,000 - 1,00,000</option>
                                                <option value="5,00,000 - 10,00,000">5,00,000 - 10,00,000</option>
                                                <option value="10,00,000 - 20,00,000">10,00,000 - 20,00,000</option>
                                                <option value="20,00,000 - 50,00,000">20,00,000 - 50,00,000</option>
                                                <option value="50,00,000 - 100,00,000">50,00,000 - 100,00,000</option>
                                                <option value="above-1-crore">Above 1 Crore</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                    </div>
                                  
                                  		
                                    <div id="search_choice" class="row">
                                    	<div class="col-12 col-sm-12 m-t m-b">
                                        	<button id="search_button" class="btn btn-primary btn-block btn-lg"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                   
                                    <div id="advanced_search_block" class="row" style="display:none;">
    
                                    
                                        <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                            <label class="c-dark">Oldest Year</label>
                                            <div class="form-group">
                                                <select id="autofrom_year" class="form-control rounded">
                                                    <option value="2016">2016 </option>
                                                    <option value="2015">2015 </option>
                                                    <option value="2014">2014 </option>
                                                    <option value="2013">2013 </option>
                                                    <option value="2012">2012 </option>
                                                    <option value="2011">2011 </option>
                                                </select>
                                            </div>
                                        </div> 
                                        
                                        <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                            <label class="c-dark">Earliest Year</label>
                                            <div class="form-group">
                                                <select id="autoto_year" class="form-control rounded">
                                                    <option value="2016">2016 </option>
                                                    <option value="2015">2015 </option>
                                                    <option value="2014">2014 </option>
                                                    <option value="2013">2013 </option>
                                                    <option value="2012">2012 </option>
                                                    <option value="2011">2011 </option>
                                                </select>
                                            </div>
                                        </div> 
                                    
                                        <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                            <label class="c-dark">Fuel Type</label>
                                            <div class="form-group">
                                                <select class="form-control rounded">
                                                    <option value="Petrol">Petrol</option>
                                                    <option value="Diesal">Diesal</option>
                                                    <option value="CNG">CNG</option>
                                                    <option value="Electric">Electric</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                            <label class="c-dark">Transmission</label>
                                            <div class="form-group">
                                                <select class="form-control rounded">
                                                    <option value="Automatic">Automatic</option>
                                                    <option value="Manual">Manual</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                            <label class="c-dark">Colors</label>
                                            <div class="form-group">
                                                <select class="form-control rounded">
                                                    <option value="Gray">Gray</option>
                                                    <option value="White">White</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Black">Black</option>
                                                    <option value="Pink">Pink</option>
                                                    <option value="Red">Red</option>
                                                    <option value="Yellow">Yellow</option>
                                                    <option value="More Colors">More Colors</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-4 col-xl-2">
                                            <label class="mb-4"></label>
                                            <div class="form-group mb-0">
                                                <a id="search_usingfilters" href="#" class="btn btn-primary btn-md btn-block text-uppercase">Search</a>
                                            </div>
                                        </div>
                                    
                                    
                                    </div>


                                  		
                                    <div class="row">
                                    	<div class="col-12 col-sm-12 m-t m-b">
                                        	<div class="col-sm-3 pull-left">
                                        	<a id="advanced_search_button" class="btn btn-block btn-sm mr-auto">[+] Advance Search</a>
                                            </div>
                                        </div>
                                    </div>
                                   

                                  
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="loaded_listings" class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row mb-4">
                            <div class="col-12 col-md-5 col-xl-6 align-self-center">
                                <p class="mb-0"><?php echo $totalRows_vehicles; ?> Vehicles Matching</p>
                            </div>
                            <div class="col-12 col-md-7 col-xl-6 text-right">
                                <div class="d-inline-block pr-md-3 mt-3 mt-md-0">
                                    <div class="selector form-group mb-0 position-relative">
                                        <select class="form-control border-0 pl-4">                                                
                                            <option> Price (High to Low) </option>
                                            <option> Price (Low to High) </option>
                                            <option> Kms (Low to High) </option>
                                            <option> Model (Newest to Oldest) </option>
                                        </select>
                                        <div class="filter position-absolute">
                                            <i class="fa fa-sliders c-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-inline-block mt-3 mt-md-0">
                                    <div class="listing-filter">
                                        <ul class="nav nav-pills justify-content-md-end mb-0">
                                            <li class="nav-item mr-2">
                                                <a class="nav-link redial-light rounded active"><i class="fa fa-th-list"></i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link redial-light rounded"><i class="fa fa-th"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

    <!-- A GALLERY ENTRY -->
    <?php do { ?>
    
    
	
<?php 
	$thevcreated_at = $row_vehicles['created_at'];

	$vid = $row_vehicles['vid'];
	$did = $row_vehicles['did'];
	$vdid = $row_vehicles['did'];
	$img = $row_vehicles['vthubmnail_file'];

	$thumbs = 'thumbs'; 
	$file = $row_vehicles['vthubmnail_file']; 
	//$image = "https://idscrm.com/vehicles/photos/$vdid/$vid/$file";
	$image = "https://images.autocitymag.com/$vdid/$vid/$file";
	$year = $row_vehicles['vyear'];
	$make = $row_vehicles['vmake'];
	$model = $row_vehicles['vmodel'];
	$trim = $row_vehicles['vtrim'];
	$stock = $row_vehicles['vstockno'];
	$vtitle = "$year $make $model $trim";
	$trans = $row_vehicles['vtransm'];
	$ecolor = $row_vehicles['vecolor_txt'];
	$icolor = $row_vehicles['vicolor_txt'];
	$vfueltype = $row_vehicles['vfueltype'];
	$engine = $row_vehicles['vengine'];
	$mileage = $row_vehicles['vmileage'];
	$price = $row_vehicles['vrprice'];
	$sprice = $row_vehicles['vspecialprice'];
	
	if(!$price || $price == 0){
		
		$price = 'Contact';
	}else {
	$price = '$'.formatMoney($row_vehicles['vrprice']);
	}
	$truepic = "https://images.autocitymag.com/$did/$vid/$img";

	$file_headers = @get_headers($truepic );
	if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
		break;
	}

?>
                        
                        <div class="card car-listing-full mb-4">
                            <div class="row">
                                <div class="col-12 col-lg-4 h-283">
                                    <div class="position-relative">
                                        <a href="#">
                                            <div class="background-image-maker rounded-left h-283"></div>
                                            <div class="holder-image">
                                                <img src="<?php echo $truepic; ?>" alt="" class="img-fluid d-none" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5 align-self-center">
                                    <div class="p-4 p-lg-0">
                                        <h6 class="mb-2"><a href="#"><?php echo $vtitle; ?></a></h6>
                                        <ul class="list-unstyled mb-2 c-line-height-2_5">
                                            <li><h6 class="c-primary mb-0"><small class="c-light">Price</small> <?php echo $price; ?> </h6></li>
                                            <li><i class="fa fa-map-marker pr-1"></i> <?php echo $row_vehicles['city']; ?>, <?php echo $row_vehicles['state']; ?></li>
                                        </ul>
                                        <ul class="list-inline">
                                            <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-calendar pr-1"></i> Since <?php echo date("l ", strtotime($row_vehicles['created_at'])); ?> </a></li>
                                            
                                            <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-clock pr-1"></i> <?php echo $price; ?></a></li>
                                            
                                            <?php if($row_vehicles['vfueltype']){ ?>
                                            <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-fuel pr-1"></i>  <?php echo $vfueltype; ?> </a></li>
                                            <?php } ?>
                                            
											<?php if($row_vehicles['zip']){ ?>
                                            <li class="list-inline-item"><a href="#" class="c-light"><i class="fa fa-road pr-1"></i> <?php echo $row_vehicles['zip']; ?> </a></li>
                                            <?php } ?>
                                        </ul>
                                        <a href="vehicle/<?php echo $row_vehicles['vid']; ?>/" class="btn btn-outline-primary text-uppercase btn-lg c-font-weight-700" tabindex="-1">View Details</a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="border border-right-0 border-top-0 border-bottom-0 c-brd-light py-4">
                                        <table class="table mb-0 c-line-height-1 c-brd-light">
                                            <tbody>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Body Type:</td>
                                                    <td><?php if(!$row_vehicles['vbody']){ echo 'Unlisted'; }else{ echo $row_vehicles['vbody']; } ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Make:</td>
                                                    <td><?php if(!$make){ echo 'Unlisted'; }else{ echo $make; } ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Model:</td>
                                                    <td><?php if(!$model){ echo 'Unlisted'; }else{ echo $model; } ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Eng./Cyl.:</td>
                                                    <td><?php if($row_vehicles['vengine']){ echo $row_vehicles['vengine'].'/'; } ?><?php if(!$row_vehicles['vcylinders']){ echo 'Unlisted'; }else{ echo $row_vehicles['vcylinders']; } ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Fuel Type:</td>
                                                    <td><?php if(!$row_vehicles['vfueltype']){ echo 'Unlisted'; }else{ echo $row_vehicles['vfueltype']; } ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Transmission:</td>
                                                    <td><?php if(!$row_vehicles['vtransm']){ echo 'Unlisted'; }else{ echo $row_vehicles['vtransm']; } ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Color:</td>
                                                    <td><?php if(!$row_vehicles['vecolor_txt']){ echo 'Unlisted'; }else{ echo $row_vehicles['vecolor_txt']; } ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                        </div>

 <?php } while ($row_vehicles = mysqli_fetch_assoc($vehicles)); ?>
 


                        
                        <div class="row mt-4">
                            <div class="col-12 col-sm-12">
                                <ul class="pagination mb-0 text-center text-uppercase justify-content-center">
                                    <li class="page-item"><a class="page-link"><i class="fa fa-angle-left pr-1"></i> Prev</a></li>
                                    <li class="page-item d-none d-sm-inline-block"><a class="page-link">1</a></li>
                                    <li class="page-item d-none d-sm-inline-block active"><a class="page-link">2</a></li>
                                    <li class="page-item d-none d-sm-inline-block"><a class="page-link">3</a></li>
                                    <li class="page-item"><a class="page-link" > Next <i class="fa fa-angle-right pl-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    
                    
                    
                    </div>
                </div>
            
            
            </div>
        </section>
        <!-- End List Without Sidebar -->
                
        
        
        <!-- Footer Bottom -->
        <?php require_once("_inc.footer.php"); ?>
        <!-- End Footer Bottom -->

        <!-- jQuery -->
        <script src="dist/js/plugins.min.js"></script>
        <script src="dist/js/common.js"></script>
    </body>
</html>
<?php require_once("_inc.end_mysql.php"); ?>
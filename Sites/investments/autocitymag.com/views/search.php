<?php 


if(isset($_GET['state'])): 


$state = mysqli_escape_string($autocity_connection_mysqli, trim($_GET['state']));

else:

$state = '-1';

endif;


if(isset($_GET['market'])): 



$market = mysqli_escape_string($autocity_connection_mysqli, trim($_GET['market']));
else:


$market = '-1';

endif;

if(isset($_GET['models'])): 



$vmodels = mysqli_escape_string($autocity_connection_mysqli, trim($_GET['models']));
else:


$market = '-1';

endif;


$sql_where = '';
$sql_where_or = '';

$colname_filter_keyword = "-1";
if(isset($_GET['srch'])){
  $colname_filter_srch =  mysqli_escape_string($autocity_connection_mysqli, trim($_GET['srch']));
  //$sql_where =  "AND `vehicles`.`vmodel` LIKE '%$colname_filter_srch%' ";
  $sql_where .= "AND MATCH(`vehicles`.`vmake`, `vehicles`.`vmodel`, `vehicles`.`vtrim`) AGAINST ('%$colname_filter_srch%' IN BOOLEAN MODE) " ;

}
$colname_filter_vehicles = "-1";
if(isset($_GET['state'])){
  $colname_filter_state =  mysqli_escape_string($autocity_connection_mysqli, trim($_GET['state']));
  $sql_where .= " AND `dealers`.`state` = '$colname_filter_state' " ;
}
if(isset($_GET['market'])){
  $colname_filter_market_id =  mysqli_escape_string($autocity_connection_mysqli, trim($_GET['market']));
  //$sql_where_or .= " AND `markets_dm`.`market` = '$colname_filter_market_id' " ;
}
if(isset($_GET['vmake'])){
  $colname_filter_vmakes =  mysqli_escape_string($autocity_connection_mysqli, trim($_GET['vmake']));
  $sql_where_or .= " AND `vehicles`.`vmake` LIKE '%$colname_filter_vmakes%' " ;
}
if(isset($_GET['vmodels'])){
  $colname_filter_vmodels =  mysqli_escape_string($autocity_connection_mysqli, trim($_GET['vmodels']));
  $sql_where_or .= " AND `vehicles`.`vmodel` LIKE '$colname_filter_vmodels' " ;
}

/*
		LEFT JOIN `idsids_idsdms`.`markets_dm`
		ON `markets_dm`.`market` = `dealers`.`dealer_market_id`
		
		LEFT JOIN `idsids_idsdms`.`markets_sub_dm`
		ON `markets_sub_dm`.`market_sub_id` = `dealers`.`dealer_market_sub_id`
									
*/
mysqli_select_db($autocity_connection_mysqli,  $database_autocity_connection);
$query_filter_vehicles = "SELECT * FROM `idsids_idsdms`.`vehicles`
									LEFT JOIN `idsids_idsdms`.`dealers`
									ON `vehicles`.`did` = `dealers`.`id`
									
									
								    WHERE 
										`vehicles`.`vlivestatus` = '1' 
									AND 
										`dealers`.`status` = '1'																		
									
									$sql_where
									$sql_where_or
									AND 
										`vehicles`.`vthubmnail_file` 
									IS NOT NULL 
									GROUP BY 
										`vehicles`.`vid`
									ORDER BY RAND()
									LIMIT 50";
$filter_vehicles = mysqli_query($autocity_connection_mysqli, $query_filter_vehicles);
$row_filter_vehicles = mysqli_fetch_assoc($filter_vehicles);
$totalRows_filter_vehicles = mysqli_num_rows($filter_vehicles);


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
        <title>Auto City Mag</title>  
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
                        <h1 class="text-white c-font-weight-700">Grid Cars Listing</h1>
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
                            <li class="breadcrumb-item active">Searching <?php if(isset($_GET['srch'])){ echo '"'.$_GET['srch'].'"'; } ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->
        
        <!-- Grid Left Sidebar -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card c-brd-light car-box d-block d-lg-none mb-5">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Select City</label>
                                        <div class="form-group">
                                            <select class="form-control rounded">
                                                <option value="">--- Select City ---</option>
                                                <option value="New Delhi">New Delhi</option>
                                                <option value="Bangalore">Bangalore</option>
                                                <option value="Mumbai">Mumbai</option>
                                                <option value="Hyderabad">Hyderabad</option>
                                                <option value="Chennai">Chennai</option>
                                                <option value="Jaipur">Jaipur</option>
                                                <option value="Pune">Pune</option>
                                                <option value="Kolkata">Kolkata</option>
                                                <option value="Gurgaon">Gurgaon</option>
                                                <option value="Ahmedabad">Ahmedabad</option>
                                                <option value="Noida">Noida</option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Indore">Indore</option>
                                                <option value="Kochi">Kochi</option>
                                                <option value="" disabled="">--------------------</option>
                                                <option value="Agra">Agra</option>
                                                <option value="Ahmedabad">Ahmedabad</option>
                                                <option value="Ajmer">Ajmer</option>
                                                <option value="Akola">Akola</option>
                                                <option value="Alibag">Alibag</option>
                                                <option value="Aligarh">Aligarh</option>
                                                <option value="Allahabad">Allahabad</option>
                                                <option value="Alwar">Alwar</option>
                                                <option value="Amalapuram">Amalapuram</option>
                                                <option value="Ambala">Ambala</option>
                                                <option value="Ambernath">Ambernath</option>
                                                <option value="Ambikapur">Ambikapur</option>
                                                <option value="Amethi">Amethi</option>
                                                <option value="Amravati">Amravati</option>
                                                <option value="Amreli">Amreli</option>
                                                <option value="Amritsar">Amritsar</option>
                                                <option value="Amroha">Amroha</option>
                                                <option value="Anantapur">Anantapur</option>
                                                <option value="Aurangabad(bh)">Aurangabad(bh)</option>
                                                <option value="Avadi">Avadi</option>
                                                <option value="Azamgarh">Azamgarh</option>
                                                <option value="Baddi">Baddi</option>
                                                <option value="Badlapur">Badlapur</option>
                                                <option value="Baran">Baran</option>
                                                <option value="Barasat">Barasat</option>
                                                <option value="Baraut">Baraut</option>
                                                <option value="Bardhaman">Bardhaman</option>
                                                <option value="Bardoli">Bardoli</option>
                                                <option value="Bareilly">Bareilly</option>
                                                <option value="Bargarh">Bargarh</option>
                                                <option value="Baripada">Baripada</option>
                                                <option value="Barmer">Barmer</option>
                                                <option value="Barnala">Barnala</option>
                                                <option value="Barpeta">Barpeta</option>
                                                <option value="Barrackpore">Barrackpore</option>
                                                <option value="Barsar">Barsar</option>
                                                <option value="Barshi">Barshi</option>
                                                <option value="Baruipur">Baruipur</option>
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
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Brand</label>
                                        <div class="form-group">
                                            <select class="form-control rounded">
                                                <option value="Ford">Ford </option>
                                                <option value="Volvo">Volvo</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Aston">Aston</option>
                                                <option value="Chevrolet">Chevrolet</option>
                                                <option value="Honda">Honda City i VTEC SV</option>
                                                <option value="Volkswagen">Volkswagen</option>
                                                <option value="Tata">Tata</option>.
                                                <option value="Skoda">Skoda</option>
                                                <option value="Audi">Audi</option>
                                                <option value="Ranault">Ranault</option>
                                                <option value="Nissan">Nissan</option>
                                                <option value="Mahindra">Mahindra</option>
                                                <option value="Toyota">Toyota</option>
                                                <option value="Maruti">Maruti</option>
                                                <option value="Hyundai">Hyundai</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Model</label>
                                        <div class="form-group">
                                            <select class="form-control rounded">
                                                <option value="Ford Mustang">Mustang </option>
                                                <option value="Volvo XC90 Inscription">Volvo XC90 Inscription</option>
                                                <option value="BMW X6 M">BMW X6 M</option>
                                                <option value="Aston Martin DB5">Aston Martin DB5</option>
                                                <option value="Chevrolet Camaro">Chevrolet Camaro</option>
                                                <option value="Honda City i VTEC SV">Honda City i VTEC SV</option>
                                                <option value="Volkswagen Jetta">Volkswagen Jetta</option>
                                                <option value="Tata Aria Pure 4x2">Tata Aria Pure 4x2</option>.
                                                <option value="Skoda Octavia Ambition 1.4 TSI MT">Skoda Octavia Ambition 1.4 TSI MT</option>
                                                <option value="Audi A4 35 TDI Premium">Audi A4 35 TDI Premium</option>
                                                <option value="Renault Fluence E4 D">Renault Fluence E4 D</option>
                                                <option value="Nissan Micra AT">Nissan Micra AT</option>
                                                <option value="Mahindra Scorpio S10 AT 2WD">Mahindra Scorpio S10 AT 2WD</option>
                                                <option value="Toyota Etios G">Toyota Etios G</option>
                                                <option value="Maruti Swift ZXI">Maruti Swift ZXI</option>
                                                <option value="Hyundai I20">Hyundai I20</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                                        <label class="c-dark">Make Year</label>
                                        <div class="form-group">
                                            <select class="form-control rounded">
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
                                        <label class="c-dark">Killometers Driven</label>
                                        <div class="form-group">
                                            <select class="form-control rounded">
                                                <option value="50,000 km">50,000 km</option>
                                                <option value="20,000 km">20,000 km</option>
                                                <option value="15,000 km">15,000 km</option>
                                                <option value="60,000 km">60,000 km</option>
                                                <option value="70,000 km">70,000 km</option>
                                                <option value="30,000 km">30,000 km</option>
                                                <option value="80,000 km">80,000 km</option>
                                                <option value="90,000 km">90,000 km</option>
                                                <option value="100,000 km">100,000 km</option>
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
                                            <a href="#" class="btn btn-primary btn-md btn-block text-uppercase">Search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="sidebar-widget d-none d-lg-block">
                            <div class="card c-brd-light">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo">Location</a>
                                    </div>
                                </div>
                                <div id="demo" class="collapse show widget-content">
                                <form method="get" action="/search/">
                                    <div class="card-body py-4 bg-white">
                                        <div class="form-group position-relative mb-0">
                                            <label class="c-dark">Select State</label>
                                        <div class="form-group">
                                            <select id="slct_state" name="state" class="form-control rounded">
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
                                        <div class="form-group position-relative mb-0">
                                            <label class="c-dark">Select Market</label>
                                        <div class="form-group">
                                            <select id="load_markets" name="market" class="form-control rounded">
                                                <option value="">--- All Markets ---</option>
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<input name="srch" type="hidden" value="<?php echo $colname_filter_srch; ?>">
                                        	<button class="btn btn-primary btn-block" type="submit">Search</button>
                                        </div>
                                            
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <div class="card c-brd-light border-top-0">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo2">Body Type</a>
                                    </div>
                                </div>
                                <div id="demo2" class="collapse show widget-content">
                                    <div class="card-body py-4 bg-white">
                                        <div class="row text-center">
                                            <div class="col-12 col-sm-6 col-xl-4 mb-3">
                                                <div class="car-model">
                                                    <a href="#"><i class="flaticon-transport-1 display-2 d-block"></i> Hatchback</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-xl-4 mb-3">
                                                <div class="car-model">
                                                    <a href="#"><i class="flaticon-transport-4 display-2 d-block"></i> Sedan</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-xl-4 mb-3">
                                                <div class="car-model">
                                                    <a href="#"><i class="flaticon-transport-3 display-2 d-block"></i> SUV</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-xl-4 mb-3">
                                                <div class="car-model">
                                                    <a href="#"><i class="flaticon-transport-5 display-2 d-block"></i> Minivan</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-xl-4 mb-3">
                                                <div class="car-model">
                                                    <a href="#"><i class="flaticon-black-2 display-2 d-block"></i> Minivan</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-xl-4 mb-3">
                                                <div class="car-model">
                                                    <a href="#"><i class="flaticon-transport-6 display-2 d-block"></i> Pickup</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                                <div class="car-model">
                                                    <a href="#"><i class="flaticon-black-1 display-2 d-block"></i> Coupe Car</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-xl-4">
                                                <div class="car-model">
                                                    <a href="#"><i class="flaticon-black display-2 d-block"></i> Convertible</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light border-top-0">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo3">Budget</a>
                                    </div>
                                </div>
                                <div id="demo3" class="collapse show widget-content">
                                    <div class="card-body py-4 bg-white text-center">
                                        <div class="mt-3">
                                            <input id="sl2" data-ui-slider="" type="text" value="" data-slider-min="20000" data-slider-max="100000"  data-slider-value="[20000,100000]" class="slider">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light border-top-0">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo4">Brand Or Model</a>
                                    </div>
                                </div>
                                <div id="demo4" class="collapse show widget-content">
                                    <div class="card-body py-4 bg-white">
                                        <div class="form-group position-relative">
                                            <input type="text" class="form-control" placeholder="e.g. Mustang or Ford Mustang">
                                            <div class="search position-absolute">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox1">
                                            <label for="checkbox1" class="mb-0">Volvo XC90 Inscription</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox2">
                                            <label for="checkbox2" class="mb-0">BMW X6 M</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox3">
                                            <label for="checkbox3" class="mb-0">Aston Martin DB5</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox4">
                                            <label for="checkbox4" class="mb-0">Chevrolet Camaro</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox5">
                                            <label for="checkbox5" class="mb-0">Chevrolet Camaro SS</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox6">
                                            <label for="checkbox6" class="mb-0">Chevrolet Corvette C7</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox7">
                                            <label for="checkbox7" class="mb-0">Ford F-150 Raptor Tune</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox8">
                                            <label for="checkbox8" class="mb-0">Ford Mustang</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox9">
                                            <label for="checkbox9" class="mb-0">Ford Vignale Mondeo Turnier</label>
                                        </div>
                                        <div class="form-group mb-0">								
                                            <input type="checkbox" id="checkbox10">
                                            <label for="checkbox10" class="mb-0">Honda Acura NSXn</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light border-top-0">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo5">Make Year</a>
                                    </div>
                                </div>
                                <div id="demo5" class="collapse show widget-content">
                                    <div class="card-body py-4 bg-white">
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox11">
                                            <label for="checkbox11" class="mb-0">2016</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox12">
                                            <label for="checkbox12" class="mb-0">2015</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox13">
                                            <label for="checkbox13" class="mb-0">2014</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox14">
                                            <label for="checkbox14" class="mb-0">2013</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox15">
                                            <label for="checkbox15" class="mb-0">2012</label>
                                        </div>
                                        <div class="form-group mb-0">								
                                            <input type="checkbox" id="checkbox16">
                                            <label for="checkbox16" class="mb-0">2011</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light border-top-0">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo6">Kilometers Driven</a>
                                    </div>
                                </div>
                                <div id="demo6" class="collapse show widget-content">
                                    <div class="card-body py-4 bg-white text-center">
                                        <div class="mt-3 driven">
                                            <input id="sl3" data-ui-slider="" type="text" value="" data-slider-min="5000" data-slider-max="8000"  data-slider-value="[5000,8000]" class="slider">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light border-top-0">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo7">Fuel Type</a>
                                    </div>
                                </div>
                                <div id="demo7" class="collapse show widget-content">
                                    <div class="card-body py-4 bg-white">
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox17">
                                            <label for="checkbox17" class="mb-0">petrol</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox18">
                                            <label for="checkbox18" class="mb-0">Diesel</label>
                                        </div>
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox19">
                                            <label for="checkbox19" class="mb-0">CNG</label>
                                        </div>
                                        <div class="form-group mb-0">								
                                            <input type="checkbox" id="checkbox20">
                                            <label for="checkbox20" class="mb-0">Electric</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light border-top-0">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo8">Transmission</a>
                                    </div>
                                </div>
                                <div id="demo8" class="collapse show widget-content">
                                    <div class="card-body py-4 bg-white">
                                        <div class="form-group">								
                                            <input type="checkbox" id="checkbox21">
                                            <label for="checkbox21" class="mb-0">Automatic</label>
                                        </div>
                                        <div class="form-group mb-0">								
                                            <input type="checkbox" id="checkbox22">
                                            <label for="checkbox22" class="mb-0">Manual</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light border-top-0">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo9">Color</a>
                                    </div>
                                </div>
                                <div id="demo9" class="collapse show widget-content">
                                    <div class="card-body py-4 bg-white text-center">
                                        <div class="widget-color">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color1">								
                                                        <input type="checkbox" id="color1">
                                                        <label for="color1" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color2">								
                                                        <input type="checkbox" id="color2">
                                                        <label for="color2" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color3">								
                                                        <input type="checkbox" id="color3">
                                                        <label for="color3" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color4">								
                                                        <input type="checkbox" id="color4">
                                                        <label for="color4" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color5">								
                                                        <input type="checkbox" id="color5">
                                                        <label for="color5" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color6">								
                                                        <input type="checkbox" id="color6">
                                                        <label for="color6" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color7">								
                                                        <input type="checkbox" id="color7">
                                                        <label for="color7" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color8">								
                                                        <input type="checkbox" id="color8">
                                                        <label for="color8" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color9">								
                                                        <input type="checkbox" id="color9">
                                                        <label for="color9" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color10">								
                                                        <input type="checkbox" id="color10">
                                                        <label for="color10" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color11">								
                                                        <input type="checkbox" id="color11">
                                                        <label for="color11" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color12">								
                                                        <input type="checkbox" id="color12">
                                                        <label for="color12" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color13">								
                                                        <input type="checkbox" id="color13">
                                                        <label for="color13" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                                <li class="list-inline-item position-relative mb-2">
                                                    <div class="form-group color14">								
                                                        <input type="checkbox" id="color14">
                                                        <label for="color14" class="mb-0"></label>
                                                    </div>  
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="row mb-4">
                            <div class="col-12 col-md-5 col-xl-6 align-self-center">
                                <p class="mb-0"><?php echo $totalRows_filter_vehicles; ?> Vehicles Matching</p>
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
                                                <a class="nav-link redial-light rounded" href="#"><i class="fa fa-th-list"></i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link redial-light rounded active" href="#"><i class="fa fa-th"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

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
		
		$price = 'Contact For Price';
	}else {
	$price = '$'.formatMoney($row_filter_vehicles['vrprice']);
	}
	$truepic = "https://images.autocitymag.com/$did/$vid/$img";

	$file_headers = @get_headers($truepic );
	if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
		break;
	}

?>


                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 mb-4">
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



                            
                            <div class="col-12 col-md-6 col-lg-12 col-xl-6 mb-4">
                                <a href="#"><img src="dist/images/img6.jpg" alt="" class="img-fluid rounded-top" /></a>
                                <div class="card c-brd-light car-box">
                                    <div class="card-body">
                                        <h6 class="mb-2"><a href="listing-details.html">Sorry Not Listing AVailable</a></h6>
                                        <ul class="list-unstyled mb-0 c-line-height-2_5">
                                            <li><h6 class="c-primary mb-0"><small class="c-light">Price</small> N/A </h6></li>
                                            <li><i class="fa fa-map-marker pr-1"></i> N/A, N/A</li>
                                        </ul>
                                    </div>
                                    <ul class="list-inline mb-0 p-3 c-brd-light border border-left-0 border-bottom-0 border-right-0">
                                        <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-calendar pr-1"></i> N/A </a></li>
                                        <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-clock pr-1"></i> N/A</a></li>
                                        <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-fuel pr-1"></i>  N/A </a></li>
                                        <li class="list-inline-item"><a href="#" class="c-light"><i class="flaticon-transport-2 pr-1"></i>  N/A </a></li>
                                    </ul>
                                </div>
                            </div>

<?php endif; ?>
                        
                        </div> 
                        <div class="row mt-4">
                            <div class="col-12 col-sm-12">
                                <ul class="pagination mb-0 text-center text-uppercase justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left pr-1"></i> Prev</a></li>
                                    <li class="page-item d-none d-sm-inline-block"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item d-none d-sm-inline-block active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item d-none d-sm-inline-block"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"> Next <i class="fa fa-angle-right pl-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Grid Left Sidebar -->
                

        
        <!-- Footer Bottom -->
        <?php require_once("_inc.footer.php"); ?>
        <!-- End Footer Bottom -->


        <!-- jQuery -->
        <script src="dist/js/plugins.min.js"></script>
        <script src="dist/js/common.js"></script>
    </body>
</html>
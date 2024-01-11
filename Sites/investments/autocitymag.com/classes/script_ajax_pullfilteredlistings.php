<?php require_once("../db_public.php"); ?>
<?php if(isset($_POST['state'], $_POST['market'])): 


$state = mysqli_escape_string($autocity_connection_mysqli, trim($_POST['state']));
$market = mysqli_escape_string($autocity_connection_mysqli, trim($_POST['market']));

$sql_where = '';
$colname_filter_vehicles = "-1";
if(isset($_POST['state'])){
  $colname_filter_state =  mysqli_escape_string($autocity_connection_mysqli, trim($_POST['state']));
  $sql_where .= "AND `dealers`.`state` = '$colname_filter_state'" ;
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
									 	`dealers`.`id` = `vehicles`.`did`
									
									$sql_where
									 
									AND `dealers`.`id` = `vehicles`.`did` 
									AND `vehicles`.`vthubmnail_file` 
									IS NOT NULL ORDER BY RAND() 
									LIMIT 50";
$filter_vehicles = mysqli_query($autocity_connection_mysqli, $query_filter_vehicles);
$row_filter_vehicles = mysqli_fetch_assoc($filter_vehicles);
$totalRows_filter_vehicles = mysqli_num_rows($filter_vehicles);




?>





                    <div class="col-12 col-lg-12">
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
	$price = $row_filter_vehicles['vspecialprice'];
	
	
	if(!$price || $price == 0){
		
		$price = 'Contact';
	}else {
	$price = '$'.$row_filter_vehicles['vspecialprice'];
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
                                            
                                            <div class="holder-image">
                                                <img src="<?php echo $truepic; ?>" alt="" class="img-fluid" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5 align-self-center">
                                    <div class="p-4 p-lg-0">
                                        <h6 class="mb-2"><a href="#"><?php echo $vtitle; ?></a></h6>
                                        <ul class="list-unstyled mb-2 c-line-height-2_5">
                                            <li><h6 class="c-primary mb-0"><small class="c-light">Price</small> <?php echo formatMoney($price); ?> </h6></li>
                                            <li><i class="fa fa-map-marker pr-1"></i> <?php echo $row_filter_vehicles['city']; ?>, <?php echo $row_filter_vehicles['state']; ?></li>
                                        </ul>
                                        <ul class="list-inline">
                                            <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-calendar pr-1"></i> Since <?php echo date("l ", strtotime($row_filter_vehicles['created_at'])); ?> </a></li>
                                            <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-clock pr-1"></i> <?php echo formatMoney($price); ?></a></li>
                                            <li class="list-inline-item mr-3"><a href="#" class="c-light"><i class="flaticon-fuel pr-1"></i>  ><?php if(!$row_filter_vehicles['vfueltype']){ echo 'N/A'; }else{ echo $row_filter_vehicles['vfueltype']; } ?> </a></li>
                                            <li class="list-inline-item"><a href="#" class="c-light"><i class="flaticon-transport-2 pr-1"></i> <?php echo $trans; ?> </a></li>
                                        </ul>
                                        <a href="vehicle/<?php echo $row_filter_vehicles['vid']; ?>/" class="btn btn-outline-primary text-uppercase btn-lg c-font-weight-700" tabindex="-1">View Details</a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="border border-right-0 border-top-0 border-bottom-0 c-brd-light py-4">
                                        <table class="table mb-0 c-line-height-1 c-brd-light">
                                            <tbody>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Body Type:</td>
                                                    <td><?php echo $row_filter_vehicles['vbody']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Make:</td>
                                                    <td><?php echo $make; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Model:</td>
                                                    <td><?php echo $model; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Fuel Type:</td>
                                                    <td><?php if(!$row_filter_vehicles['vfueltype']){ echo 'Unlisted'; }else{ echo $row_filter_vehicles['vfueltype']; } ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Transmission:</td>
                                                    <td><?php echo $row_filter_vehicles['vtransm']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="c-dark c-font-weight-600 b-r">Color:</td>
                                                    <td><?php echo $row_filter_vehicles['vecolor']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
?>



                        
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





<?php endif; ?>

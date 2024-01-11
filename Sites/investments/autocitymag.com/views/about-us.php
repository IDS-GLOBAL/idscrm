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
        <title>Auto City Mag</title> 
        
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
                        <h1 class="text-white c-font-weight-700">About Us</h1>
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
                            <li class="breadcrumb-item active">About Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->
        
        <!-- About Us -->
        <section class="image-bg">
            <div class="right-block col-12 col-lg-5 position-absolute  mb-5 mb-lg-0">
                <div class="background-image-maker bg-transparent"></div>
                <div class="holder-image">
                    <img src="dist/images/car3.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h3>About AutoCityMag</h3>
                        <p class="lead c-primary c-font-weight-400 font-italic">In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                        <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien.</p>
                    </div> 
                </div>
            </div>
        </section>
        <!-- End About Us -->
        
        <!-- Features -->
        <section class="bg-light">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-12 col-lg-6 pb-4">
                        <h3>Why to Choose AutoCityMag</h3>
                        <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-white feature text-center">
                            <div class="card-body p-5">
                                <div class="feature-icon border rounded-circle mx-auto c-brd-light h2 mb-4">
                                    <span class="lnr lnr-leaf"></span>
                                </div>
                                <h6 class="text-uppercase mb-3">Highly Secured</h6>
                                Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-white feature text-center">
                            <div class="card-body p-5">
                                <div class="feature-icon border rounded-circle mx-auto c-brd-light h2 mb-4">
                                    <span class="lnr lnr-magic-wand"></span>
                                </div>
                                <h6 class="text-uppercase mb-3">Get An Offer</h6>
                                Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-white feature text-center">
                            <div class="card-body p-5">
                                <div class="feature-icon border rounded-circle mx-auto c-brd-light h2 mb-4">
                                    <span class="lnr lnr-thumbs-up"></span>
                                </div>
                                <h6 class="text-uppercase mb-3">Trusted Agents</h6>
                                Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Features -->
        
        <!-- Testimonial-->
        <section class="image-bg">
            <div class="background-image-maker"></div>
            <div class="holder-image">
                <img src="dist/images/bg1.jpg" alt="" class="img-fluid d-none" />
            </div>
            <div class="black-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 d-flex justify-content-center pb-4">
                        <h3 class="text-white mb-0">What Say Our Customers</h3>
                    </div>
                </div>
                <div class="slider testimonial text-white">
                    <div>
                        <div class="card c-brd-primary c-bg-primary mb-5">
                            <div class="card-body p-4">
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                </ul>
                                <h6 class="text-white">John Deo </h6>
                                <blockquote class="mb-0 font-italic c-line-height-2 position-relative">
                                    Maecenas tempus, tellus eget condimntum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                                </blockquote>
                                <span class="sprite"></span>
                            </div>
                        </div>
                        <div class="media ml-5">
                            <img src="dist/images/author3.jpg" alt="" class="rounded-circle img-fluid d-flex mr-2" width="50" />
                            <div class="media-body align-self-center">
                                <h6 class="mb-0 text-white">Marry Anderson</h6>
                                <small>Manager of XYZ</small>
                            </div> 
                        </div>
                    </div>
                    <div>
                        <div class="card c-brd-primary c-bg-primary mb-5">
                            <div class="card-body p-4">
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                </ul>
                                <h6 class="text-white">Customer Support </h6>
                                <blockquote class="mb-0 font-italic c-line-height-2 position-relative">
                                    Maecenas tempus, tellus eget condimntum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                                </blockquote>
                                <span class="sprite"></span>
                            </div>
                        </div>
                        <div class="media ml-5">
                            <img src="dist/images/author1.jpg" alt="" class="rounded-circle img-fluid d-flex mr-2" width="50" />
                            <div class="media-body align-self-center">
                                <h6 class="mb-0 text-white">Alex Anderson</h6>
                                <small>Manager of XYZ</small>
                            </div> 
                        </div>
                    </div>
                    <div>
                        <div class="card c-brd-primary c-bg-primary mb-5">
                            <div class="card-body p-4">
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                </ul>
                                <h6 class="text-white">Customer Support </h6>
                                <blockquote class="mb-0 font-italic c-line-height-2 position-relative">
                                    Maecenas tempus, tellus eget condimntum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                                </blockquote>
                                <span class="sprite"></span>
                            </div>
                        </div>
                        <div class="media ml-5">
                            <img src="dist/images/author2.jpg" alt="" class="rounded-circle img-fluid d-flex mr-2" width="50" />
                            <div class="media-body align-self-center">
                                <h6 class="mb-0 text-white">Marry Anderson</h6>
                                <small>Manager of XYZ</small>
                            </div> 
                        </div>
                    </div>
                    <div>
                        <div class="card c-brd-primary c-bg-primary mb-5">
                            <div class="card-body p-4">
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                </ul>
                                <h6 class="text-white">John Deo </h6>
                                <blockquote class="mb-0 font-italic c-line-height-2 position-relative">
                                    Maecenas tempus, tellus eget condimntum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                                </blockquote>
                                <span class="sprite"></span>
                            </div>
                        </div>
                        <div class="media ml-5">
                            <img src="dist/images/author3.jpg" alt="" class="rounded-circle img-fluid d-flex mr-2" width="50" />
                            <div class="media-body align-self-center">
                                <h6 class="mb-0 text-white">Marry Anderson</h6>
                                <small>Manager of XYZ</small>
                            </div> 
                        </div>
                    </div>
                    <div>
                        <div class="card c-brd-primary c-bg-primary mb-5">
                            <div class="card-body p-4">
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                </ul>
                                <h6 class="text-white">Customer Support </h6>
                                <blockquote class="mb-0 font-italic c-line-height-2 position-relative">
                                    Maecenas tempus, tellus eget condimntum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                                </blockquote>
                                <span class="sprite"></span>
                            </div>
                        </div>
                        <div class="media ml-5">
                            <img src="dist/images/author1.jpg" alt="" class="rounded-circle img-fluid d-flex mr-2" width="50" />
                            <div class="media-body align-self-center">
                                <h6 class="mb-0 text-white">Alex Anderson</h6>
                                <small>Manager of XYZ</small>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonial-->
        
        <!-- Contact -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                       <h3>AutoCityMag Advantage</h3> 
                       <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc.</p>
                       <ul class="list-unstyled mb-0 c-line-height-2_5">
                           <li><i class="fa fa-angle-right pr-2"></i> Cum sociis natoque penatibus et magnis parturient montes, nascetur ridiculus.</li>
                           <li><i class="fa fa-angle-right pr-2"></i> Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</li>
                           <li><i class="fa fa-angle-right pr-2"></i> In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</li>
                           <li><i class="fa fa-angle-right pr-2"></i> Nullam dictum felis eu pede mollis pretium. Integer tincidunt.</li>
                           <li><i class="fa fa-angle-right pr-2"></i> Cras dapibus. Vivamus elementum semper nisi.</li>
                           <li><i class="fa fa-angle-right pr-2"></i> Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</li>
                       </ul>
                    </div>
                    <div class="col-12 col-lg-6">
                        <img src="dist/images/machenic.jpg" alt="" class="img-fluid rounded" />
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact -->
        
        <!-- Footer Bottom -->
        <?php require_once("_inc.footer.php"); ?>
        <!-- End Footer Bottom -->


        
        <!-- jQuery -->
        <script src="dist/js/plugins.min.js"></script>
        <script src="dist/js/common.js"></script>
    </body>
</html>
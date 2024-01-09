<?php require_once("db_public.php"); ?>
<?php

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
                        <h1 class="text-white c-font-weight-700">Contact Us</h1>
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
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->
        
        <!-- Contact -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 pb-3">
                        <h3>Get In Touch</h3>
                        <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12 mb-3">
                                <div class="media">
                                    <div class="d-flex mr-3">
                                        <span class="lnr lnr-map h2"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="c-primary mb-2">HQ Address</h5>
                                        <p>9868 Forest Avenue  Pompano Beach, FL 33060</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12 mb-3">
                                <div class="media">
                                    <div class="d-flex mr-3">
                                        <span class="lnr lnr-phone-handset h2"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="c-primary mb-2">Toll-Free No.</h5>
                                        <p><a href="tel:1800 123 1800" class="c-light"> 1800 123 1800</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12 mb-0 mb-lg-3">
                                <div class="media">
                                    <div class="d-flex mr-3">
                                        <span class="lnr lnr-printer h2"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="c-primary mb-2">Fax</h5>
                                        <p><a href="tel:1800 123 1985" class="c-light"> 1800 123 1985</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                               <div class="media">
                                    <div class="d-flex mr-3">
                                        <span class="lnr lnr-envelope h2"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="c-primary mb-2">Email</h5>
                                        <p><a href="mailto:contact@autocitymag.com" class="c-light"> contact@autocitymag.com</a></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 ml-auto">
                        <div class="heading pb-3">
                            <h6 class="mb-0">Send Us Message</h6>
                            <hr class="c-brd-primary w-25 mx-0">
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="c-dark">Full Name</label>
                                    <input type="text" class="form-control" placeholder="John Deo" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="c-dark">Email address</label>
                                    <input type="text" class="form-control" placeholder="demo@domain.com" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="c-dark">Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="+91 85267 25698" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="c-dark">Select City</label>
                                    <select class="form-control">
                                        <option>New Delhi</option>
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
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label class="c-dark">Message</label>
                                    <textarea class="form-control" placeholder="Enter your text here..."></textarea>
                                </div>
                                <a href="#" class="btn btn-primary text-uppercase btn-lg">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact -->
        
        <!-- Google Map -->
        <div id="markermap"></div>
        <!-- End Google Map -->
        

        <!-- Footer Bottom -->
        <?php require_once("_inc.footer.php"); ?>
        <!-- End Footer Bottom -->
        
        <!-- jQuery -->
        <script src="dist/js/plugins.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb0X-HAAey-LDpdZ26SWV5flKuZb8mr4o"></script>
        <script src="dist/js/gmaps.min.js"></script>
        <script src="dist/js/common.js"></script>
    </body>
</html>
<?php require_once("_inc.end_mysql.php"); ?>
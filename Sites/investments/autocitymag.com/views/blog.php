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
                        <h1 class="text-white c-font-weight-700">Blog Grid</h1>
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
                            <li class="breadcrumb-item active">Blog Single</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->
        
        <!-- Single Blog -->
        <section class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                        <div class="sidebar-widget">
                            <div class="card c-brd-light mb-3">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <h6 class="mb-0">Search</h6>
                                    </div>
                                </div>
                                <div class="card-body py-4 bg-white">
                                    <div class="form-group position-relative mb-0">
                                        <input type="text" class="form-control rounded-0" placeholder="Search">
                                        <div class="search position-absolute">
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light mb-3">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <h6 class="mb-0">Categories</h6>
                                    </div>
                                </div>
                                <div class="card-body py-4 bg-white">
                                    <ul class="list-unstyled mb-0 text-uppercase c-line-height-3 categories">
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> Web Design</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> Featured Blog</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> Photography Idea</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> Design Tutorials</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> News & Events</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> Art & Entertainment</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card c-brd-light mb-3">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <h6 class="mb-0">Archive</h6>
                                    </div>
                                </div>
                                <div class="card-body py-4 bg-white">
                                    <ul class="list-unstyled mb-0 text-uppercase c-line-height-3 categories">
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> May 2017</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> April 2017</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> March 2017</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> Fabuary 2017</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right pr-2"></i> January 2017</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card c-brd-light mb-3">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <h6 class="mb-0">Letest Posts</h6>
                                    </div>
                                </div>
                                <div class="card-body py-4 bg-white">
                                    <div class="media d-block d-sm-flex mb-3">
                                        <div class="d-sm-flex mr-sm-3 mb-3 mb-sm-0"><img src="dist/images/author1.jpg" alt="" class="img-fluid rounded" /></div>
                                        <div class="media-body align-self-center">
                                            <a href="#"><h6 class="mb-0">Standard Post with Gallery</h6></a>
                                            <small>25 May 2017</small>
                                        </div>
                                    </div>
                                    <div class="media d-block d-sm-flex mb-3">
                                        <div class="d-sm-flex mr-sm-3 mb-3 mb-sm-0"><img src="dist/images/author2.jpg" alt="" class="img-fluid rounded" /></div>
                                        <div class="media-body align-self-center">
                                            <a href="#"><h6 class="mb-0">Standard Post with Gallery</h6></a>
                                            <small>25 May 2017</small>
                                        </div>
                                    </div>
                                    <div class="media d-block d-sm-flex">
                                        <div class="d-sm-flex mr-sm-3 mb-3 mb-sm-0"><img src="dist/images/author3.jpg" alt="" class="img-fluid rounded" /></div>
                                        <div class="media-body align-self-center">
                                            <a href="#"><h6 class="mb-0">Standard Post with Gallery</h6></a>
                                            <small>25 May 2017</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card c-brd-light">
                                <div class="c-bg-light">
                                    <div class="card-body p-3">
                                        <h6 class="mb-0">Tags</h6>
                                    </div>
                                </div>
                                <div class="card-body py-4 bg-white">
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Advertisment</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Wordpress</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Sea</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Forest</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Portrait</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Fashion</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Sky</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">General</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Video</a>
                                    <a href="#" class="btn-tags btn btn-sm rounded-0 mr-2 mb-2 text-uppercase">Ecommerce</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <article>
                            <img src="dist/images/blog2.jpg" alt="" class="img-fluid rounded mb-4" />
                        </article>
                        <p>Integer phasellus vel id nisi vulputate platea dui lacinia. Posuere dictumst quis, auctor libero magna mus in a dignissim duis aptent leo lobortis egestas nibh dictumst luctus non, donec et. Penatibus aliquet pede urna pede nascetur facilisi nullam Semper malesuada congue odio proin proin ad. Auctor fames donec vestibulum vestibulum dictum nunc euismod vulputate a ullamcorper felis cubilia. Etiam, faucibus semper tincidunt platea tincidunt. Sapien. Tristique. Amet luctus torquent donec quisque. Cubilia consectetuer, massa Ridiculus litora sem id ornare nisi, convallis Proin nec.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    
                        <blockquote class="blockquote position-relative c-bg-light my-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </blockquote>
                        
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        
                        <div class="my-4">
                           <h6>3 Comments</h6> 
                        </div>
                        <div class="media d-block d-sm-flex mb-5 text-center text-sm-left">
                             <div class="d-sm-flex mr-sm-4 mb-3 mb-sm-0"><img src="dist/images/author1.jpg" alt="" class="img-fluid rounded-circle" /></div>
                             <div class="media-body">
                                 <a href="#"><h6 class="mb-0">Robert Anderson</h6></a>
                                 <small>25 May 2017</small>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                 <a href="#" class="btn btn-outline-primary text-uppercase btn-md rounded-0">Reply</a>
                             </div>
                        </div>
                        <hr>
                        <div class="media d-block d-sm-flex mb-5 ml-sm-5 pt-4 text-center text-sm-left">
                             <div class="d-sm-flex mr-sm-4 mb-3 mb-sm-0"><img src="dist/images/author2.jpg" alt="" class="img-fluid rounded-circle" /></div>
                             <div class="media-body">
                                 <a href="#"><h6 class="mb-0">Kelvin</h6></a>
                                 <small>25 May 2017</small>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                 <a href="#" class="btn btn-outline-primary text-uppercase btn-md rounded-0">Reply</a>
                             </div>
                        </div>
                        <hr>
                        <div class="media d-block d-sm-flex mb-5 text-center text-sm-left">
                             <div class="d-sm-flex mr-sm-4 mb-3 mb-sm-0"><img src="dist/images/author3.jpg" alt="" class="img-fluid rounded-circle" /></div>
                             <div class="media-body">
                                 <a href="#"><h6 class="mb-0">Fill Miller</h6></a>
                                 <small>25 May 2017</small>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                 <a href="#" class="btn btn-outline-primary text-uppercase btn-md rounded-0">Reply</a>
                             </div>
                        </div>
                        
                        <div class="my-4">
                           <h6>Leave A Comments</h6>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-0" placeholder="Your Name" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control  rounded-0" placeholder="Your Email" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control  rounded-0" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <a href="#" class="btn btn-outline-primary btn-lg text-uppercase rounded-0">Submit Comments</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Single Blog -->
                

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
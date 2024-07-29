<?php require_once("db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!--Start Meta Tags -->
    <meta name="keywords" content="idscrm,crm,ids,auto,dealer,dealers,dealership,buy here pay here,buy here,bhph,live,livechat,live chat,cars,trucks,suvs,hybrids,franchise,website development,custom website,hosting,dealer email,leads,business,dealer licenses,frazer">
	<meta name="author" content="WebGoonie">
    <!--End Meta Tags -->
    <title>IDSCRM - Official Login</title>
    <link rel="shortcut icon" href="favicon.ico" />


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Jansy CSS -->
	<link rel="stylesheet" href="css/plugin/jasny-bootstrap/css/jasny-bootstrap.css">


    <!-- Custom styles for this template -->
    <link href="css/home.css" rel="stylesheet">
    <style type="text/css">
	@media (min-width: 768px)
	.modal-dialog.modal-sm {
		position: relative;
		width: 40% !important;
	}    
    </style>
</head>
<body id="page-top" class="landing-page no-skin-config">
<?php include_once("analyticstracking.php") ?>

<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Navigation Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" id="login-window"><img alt="IDSCRM.com" src="images/logo.png" height="40px"> | <strong>Login</strong></a>
                    
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="#page-top">Home</a></li>
                        <li><a class="page-scroll" href="#getademo">Request A Demo</a></li>
                        <li><a class="page-scroll" href="#features">Features</a></li>
                        <!-- li><a class="page-scroll" href="#custom">Custom</a></li -->
                        <li><a class="page-scroll" href="#about">About Us</a></li>
                        <li><a class="page-scroll" href="#pricing">Pricing</a></li>
                        <li><a class="page-scroll" href="#contact">Contact Us</a></li>
                        <!-- li><a class="btn btn-lg btn-primary" id="login-window" data-toggle="modal" data-target="#login_modal">Login</a></li-->
                    </ul>
                </div>
            </div>
        </nav>
        <input type="hidden" id="cookie" value="<?php echo $cookie; ?>">
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
        <li data-target="#inSlider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>CRM - <br />Customer Relationship <br />Managment</h1>
                    <p>IDSCRM.COM</p>
                    <h2>idscrm</h2>
                    <p>
                        <a id="scroll_demo" class="btn btn-lg btn-primary page-scroll" href="#getademo">GET A DEMO</a>
                        <a id="scroll_demo" class="caption-link page-scroll"  href="#getademo">Get Your Account Today with IDSCRM.COM</a>
                    </p>
                </div>
            </div>
            <!-- Set background for slide in css -->
          <div class="header-back two"></div>
        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Now automated<br/>
                        new web apps,<br/>
                        new mobile interface<br/>
                        it's all covered.</h1>
                    <p>Intergrated With Frazer Computing Software.</p>
                    <p>
                        <a class="btn btn-lg btn-primary page-scroll" href="#getademo" role="button">Register</a>
                        <a class="caption-link page-scroll" href="#getademo" role="button">Get Your Account Today with IDSCRM.com</a>
                    </p>
                </div>
                <div class="carousel-image wow zoomIn">
                    <img src="images/ids_laptop.png" alt="laptop"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
          <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>Mobile Ready <br /> Tablet Ready <br />Nothing To Install.</h1>
                    <p>Easy To Use, Packed With Options.</p>
                    <p>
                        <a class="btn btn-lg btn-primary page-scroll" href="#getademo" role="button">Learn more</a>
                        <a class="caption-link page-scroll" href="#getademo" role="button">Get Your Account Today with IDSCRM</a>
                    </p>
                </div>
            </div>
            <!-- Set background for slide in css -->
          <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section id="page-how2getstarted" class="container services">
	<div class="container">
        <div class="row">
        	<div class="col-lg-12 text-center">
            	<h2>Witness one of the most dominant CRM Systems For Any Auto Dealer Anywhere.</h2>
            	<h6>Acheive your sales goals with this easy to use system. Our CRM (Customer Relationship Manager) system captures your customers' information and allows you to communicate and build relationships all online.  Perfect for a dealership looking to use a simple and powerful tool for your every day to day business.  Dealers can update information, write notes, review applications, and schedule appointments right from their IDSCRM back office.  Your IDSCRM supported website will receive more traffice than ever before. This means that we help your grow your business and manage it as well.</h6>
            </div>
        </div>
    	<div class="row">
        	<div class="col-lg-12">
            
            
            
				<div  id="getademo_success" class="row" style="display:none;">
                	<div class="col-md-12 text-center" align="center">
                    	<h2>One of our Representatives will contact you shortly.</h2>
                    	<h6>Please take a moment to view our products and pricing.</h6>
                        
                        <a class="btn btn-primary block full-width m-b page-scroll" href="#pricing">Products And Pricing</a>
                    </div>
                </div>
            
            
            
            
                
              <div id="boxshadow" class="bs-example">
	            
              <div class="navy-line"></div>
            	
                <h2 align="center">Request Access For Your Dealership!</h2>

                <div class="m-t" id="getademo">

                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                            <label for="e_demo">Primary Email</label>
                            <input type="text" name="e_demo" class="form-control" id="e_demo" placeholder="Email" required="">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                            <label for="phone_demo">(US) Phone Number:</label>
                            <input type="text" name="phone_demo" class="form-control" id="phone_demo" placeholder="Phone Number" required="" data-mask="(999)999-9999">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="company_name_demo">Dealership Name:</label>
                            <input type="text" name="company_name_demo" class="form-control" id="company_name_demo" placeholder="Your Company Name" value="" required="">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="contact_demo">Contact Name:</label>
                            <input type="text" name="contact_demo" class="form-control" id="contact_demo" placeholder="Your Personal Name or Decision Makers Name" value="" required="">
                        </div>
                    </div>

                    <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                            <label for="city_demo">City:</label>
                            <input type="text" name="city_demo" class="form-control" id="city_demo" placeholder="City" value="" required="">
                        </div>
                    </div>

                    <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                            <label for="state_demo">State:</label>
                            <select id="state_demo" class="form-control">
                                <optgroup label="Dealership Located">
                                        <option value="" selected="selected">Select State</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">Washington D.C.</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virgina</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virgina</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                        </optgroup>
                            </select>
                        </div>

                </div>
                <div class="col-xs-6 col-md-4">
                                <div class="form-group">
                                    <label for="zip_demo">Zip Code:</label>
                                    <input type="text" name="zip_demo" class="form-control" id="zip_demo" placeholder="Zip Code" value="" required="" data-mask="99999">
                                </div>
                </div>

                <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                            <label for="postion_demo">Best Time To Be Reached?:</label>
                            <select id="postion_demo" class="form-control">
                                <option value="08am" selected="selected">Anytime</option>
                                <option value="09am">09 am</option>
                                <option value="10am">10 am</option>
                                <option value="11am">11 am</option>
                                <option value="12pm">12 pm</option>
                                <option value="01pm">01 pm</option>
                                <option value="02pm">02 pm</option>
                                <option value="03pm">03 pm</option>
                                <option value="04pm">04 pm</option>
                                <option value="05pm">05 pm</option>
                                <option value="06pm">06 pm</option>
                                <option value="07pm">07 pm</option>
                            </select>
                        </div>  
                    </div>


                    <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                            <label for="bmodel_demo">Your Dealership Business Model?:</label>
                            <select id="bmodel_demo" class="form-control">
                                <option value="0" selected="selected">Select</option>
                                <option value="1">New Car Store</option>
                                <option value="3">Special Finance</option>
                                <option value="2">Buy Here Pay Here</option>
                                <option value="4">Rent To Own</option>
                                <option value="5">Whole Sale</option>
                                <option value="6">Cash Only</option>
                                <option value="7">Other</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                            <label for="postion_demo">Do You Use Frazer Software?:</label>
                            <select id="has_frazer" class="form-control">
                                <option value="0" selected="selected">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>

                    
                </div>          




            
        </div>

                


                <a id="go_demo_reg" class="btn btn-primary block full-width m-b"> Request A Demo!</a>
             </div>
            </div><!--//orm -->

            </div>
        </div>
    </div>
</section>

<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2>Lead Management</h2>
            <p>Our main goal is help you manage, store and share opportunities with your team online. That's what our crm does. </p>
            <p><a class="navy-link page-scroll" href="#getademo" role="button">Contact Us For Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Online Inventory</h2>
            <p>Upload, edit, and store photos of your inventory online. Take advantage of the new and exclusive inventory marketing opportunities that IDSCRM has to offer.</p>
            <p><a class="navy-link page-scroll" href="#getademo" role="button">Contact Us For Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Live Chat</h2>
            <p>Have your own website? You can use our live chat feature. We allow your team members to chat internally and with customers online.</p>
            <p><a class="navy-link page-scroll" href="#getademo" role="button">Contact Us For Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Multi-User Access</h2>
            <p>Need to share information with your team members regarding sales/service opportunities? Communication is easier than ever with the IDSCRM back office.</p>
            <p><a class="navy-link page-scroll" href="#getademo" role="button">Contact Us For Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Sales Desking</h2>
            <p>Need to put a quick deal together to see if a deal is even going to work and share with your sales and management team? Sales Desking/Deal Structuring comes with your idscrm back office. </p>
            <p><a class="navy-link page-scroll" href="#getademo" role="button">Contact Us For Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Web Development</h2>
            <p>We can develop a custom mobile responsive website with idscrm.com integrated for your lead capture and lead management online.</p>
            <p><a class="navy-link page-scroll" href="#getademo" role="button">Contact Us For Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Email Hosting</h2>
            <p>Have a custom webesite or just need a professional email account with your company name (i.e. sales@yourdealership.com )?  Need web hosting for customer communications? IDSCRM can provide a unique and professional email account for every member on your team.</p>
            <p><a class="navy-link page-scroll" href="#getademo" role="button">Contact Us For Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Exclusive Marketing</h2>
            <p>Gain access to exclusive marketing channels provided by Internet Dealer Services and it's affilate/partners. Our automotive classified website WEFINANCEHERE.COM built exclusively for IDSCRM dealers will provide an awesome online presence for your inventory and boots your car sales.</p>
            <p><a class="navy-link page-scroll" href="#getademo" role="button">Contact Us For Details &raquo;</a></p>
        </div>

    </div>
</section>


<section class="benefits" style="display:none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Get More and more extra great feautres and benefits.</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small><a href="https://wefinancehere.com" target="_blank">WefinanceHere.com</a></small>
        		<h2>Exclusive Marketing </h2>
                <i class="fa fa-bar-chart big-icon pull-right"></i>
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>
            </div>
            <div class="col-lg-5 features-text">
                <small><a href="https://www.buyherepayhereus.com" title="Buy Here Pay Here US" target="_blank">BuyHerePayHereUs.com</a></small>
          		<h2>Exclusive Marketing</h2>
                <i class="fa fa-bolt big-icon pull-right"></i>
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small><a>AutoCityMag.com</a></small>
            	<h2>Exclusive Marketing </h2>
                <i class="fa fa-clock-o big-icon pull-right"></i>
                <p>Give your sales people a chance to advertise and generate business.  AutoCityMag highlights featured salespeople at dealerships providing online access for the public to interact and do business with.  Give your sales people they're own mini-website from your business and have IDSCRM compliment your opportunities.</p>
            </div>
            <div class="col-lg-5 features-text">
                <small>IDSCRM.com</small>
                <h2>Core Product</h2>
                <i class="fa fa-users big-icon pull-right"></i>
                <p>Use IDSCRM.com as a stand alone or have us integrate with your existing business or have our custom development team implement something especially just for you tailor made.</p>
            </div>
        </div>
    </div>

</section>


<section id="development"  class="container">
    <div class="row">
	
    
    </div>
</section>
  


<!---section id="frazer"  class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Frazer Dealers<br/> <span class="navy"> Easily register with your frazer software.</span> </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center wow fadeInLeft">
            <div>
                <i class="fa fa-mobile fa-5x features-icon"></i>
                <h2>Built Into Your Frazer Software</h2>
                <p>Open up frazer to get started.</p>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-car fa-5x features-icon"></i>
                <h2>Inventory Uploads</h2>
                <p>Open up frazer and go to to Vehicle Uploads</p>
            </div>
        </div>
        <div align="center" class="col-md-6 text-center  wow zoomIn">
            <img id="frazer_box" src="images/frazersoftware-box-web.jpg" alt="dashboard" class="img-responsive" width="50%;">
        </div>
        <div class="col-md-3 text-center wow fadeInRight">
            <div>
                <i class="fa fa-envelope fa-5x features-icon"></i>
                <h2>Email Lead Notification</h2>
                <p>Once your email has been entered there's no need to enter it again.  If you already have an account with IDSCRM.com and just got your frazer service started.  Just enter that email address you already use.</p>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-globe fa-5x features-icon"></i>
                <h2>Online Synchronization</h2>
                <p>Upload your data and get leads and keep current inventory working in your favor.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>New Sleek Interface</h1>
            <p>Our New And Most Innovative Design is Mobile, Desktop, &amp; Tablet Ready.</p>
        </div>
    </div>
    <div class="row features-block">
        <div class="col-lg-6 features-text wow fadeInLeft">
            <small>IDSCRM.com</small>
            <h2>Perfectly designed </h2>
            <p>You'll love your new office.</p>
            <a href="" class="btn btn-primary">Learn more</a>
        </div>
        <div class="col-lg-6 text-right wow fadeInRight">
            <img src="dealers/img/landing/dashboard.png" alt="dashboard" class="img-responsive pull-right">
        </div>
    </div>
</section>


<section id="custom" class="features">
    <div class="container" style="display:none;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Need A New Website?</h1>
                <p>We Can Build A Custom Website and help you manage it from within your CRM account. Take a look below and see what we can do.</p>
            </div>
        </div>

        <div class="row features-block">
            <div class="col-lg-4 features-text m-t-n-lg wow fadeInLeft">
                <small>CentralAuto.com</small>
                <h2>Central Auto Sales</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://wwww.centralauto.com" target="_blank" class="btn btn-primary">Central Auto Sales</a>

            </div>
            <div class="col-lg-4 features-text text-right m-t-n-lg wow zoomIn">
                <small>SterlingAutoLot.com</small>
                <h2>Sterling Auto Consultants</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://idscrm.com/sterlingauto.com" target="_blank" class="btn btn-primary">SterlingAutoLot.com</a>

            </div>
            <div class="col-lg-4 features-text text-right wow fadeInRight">
                <small>Autostarfinance.com</small>
                <h2>AutoStarFinance.com</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://autostarfinance.com" target="_blank" class="btn btn-primary">AutoStarFinance.com</a>

            </div>
        </div>

        <div class="row features-block">
            <div class="col-lg-4 features-text m-t-n-lg wow fadeInLeft">
                <small>CentralAuto.com</small>
                <h2>Central Auto Sales</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://wwww.centralauto.com" target="_blank" class="btn btn-primary">Central Auto Sales</a>

            </div>
            <div class="col-lg-4 features-text text-right m-t-n-lg wow zoomIn">
                <small>SterlingAutoLot.com</small>
                <h2>Sterling Auto Consultants</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://idscrm.com/sterlingauto.com" target="_blank" class="btn btn-primary">SterlingAutoLot.com</a>

            </div>
            <div class="col-lg-4 features-text text-right wow fadeInRight">
                <small>autostarfinance.com</small>
                <h2>AutoStarFinance.com</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://autostarfinance.com" target="_blank" class="btn btn-primary">AutoStarFinance.com</a>

            </div>
        </div>

        <div class="row features-block">
            <div class="col-lg-4 features-text m-t-n-lg wow fadeInLeft">
                <small>CentralAuto.com</small>
                <h2>Central Auto Sales</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://wwww.centralauto.com" target="_blank" class="btn btn-primary">Central Auto Sales</a>

            </div>
            <div class="col-lg-4 features-text text-right m-t-n-lg wow zoomIn">
                <small>SterlingAutoLot.com</small>
                <h2>Sterling Auto Consultants</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://idscrm.com/sterlingauto.com" target="_blank" class="btn btn-primary">SterlingAutoLot.com</a>

            </div>
            <div class="col-lg-4 features-text text-right wow fadeInRight">
                <small>autostarfinance.com</small>
                <h2>AutoStarFinance.com</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://autostarfinance.com" target="_blank" class="btn btn-primary">AutoStarFinance.com</a>

            </div>
        </div>

        <div class="row features-block">
            <div class="col-lg-4 features-text m-t-n-lg wow fadeInLeft">
                <small>CentralAuto.com</small>
                <h2>Central Auto Sales</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://wwww.centralauto.com" target="_blank" class="btn btn-primary">Central Auto Sales</a>

            </div>
            <div class="col-lg-4 features-text text-right m-t-n-lg wow zoomIn">
                <small>SterlingAutoLot.com</small>
                <h2>Sterling Auto Consultants</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://idscrm.com/sterlingauto.com" target="_blank" class="btn btn-primary">SterlingAutoLot.com</a>

            </div>
            <div class="col-lg-4 features-text text-right wow fadeInRight">
                <small>autostarfinance.com</small>
                <h2>AutoStarFinance.com</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://autostarfinance.com" target="_blank" class="btn btn-primary">AutoStarFinance.com</a>

            </div>
        </div>

        <div class="row features-block">
            <div class="col-lg-4 features-text m-t-n-lg wow fadeInLeft">
                <small>CentralAuto.com</small>
                <h2>Central Auto Sales</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://wwww.centralauto.com" target="_blank" class="btn btn-primary">Central Auto Sales</a>

            </div>
            <div class="col-lg-4 features-text text-right m-t-n-lg wow zoomIn">
                <small>SterlingAutoLot.com</small>
                <h2>Sterling Auto Consultants</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://idscrm.com/sterlingauto.com" target="_blank" class="btn btn-primary">SterlingAutoLot.com</a>

            </div>
            <div class="col-lg-4 features-text text-right wow fadeInRight">
                <small>autostarfinance.com</small>
                <h2>AutoStarFinance.com</h2>
                <img src="dealers/img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                <p>IDSCRM.com Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
                <a href="http://autostarfinance.com" target="_blank" class="btn btn-primary">AutoStarFinance.com</a>

            </div>
        </div>


    </div>

</section>

<!--- section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Our Partners</h1>
                <p>Take A Look Below And See Our Company Top Partners.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <img src="https://wefinancehere.com/img/wfh_logo.png" class="img-responsive" alt="">
                    <h4><span class="navy">WeFinance</span> Here.com</h4>
                    <p>We deliver qualified leads and highly qualified customers looking for what you have on your lot.   We market your business online at WeFinanceHere.com and manage your opportunities online using your IDSCRM back office.</p>
                    <ul class="list-inline social-icon">
                        <li><a href="http://wefinancehere.com" target="_blank"><i class="fa fa-globe fa-3x fa-spin"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/wefinancehere" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="images/frazersoftware-box-web.jpg" class="img-responsive" alt="">
                    <h4><span class="navy">Frazer</span> Computing</h4>
                    <p>Frazer is a Dealer Management Software Company with IDSCRM intergrated with easy access and registration from vehicle uploads.</p>
                    <ul class="list-inline social-icon">
                        <li><a href="https://www.frazer.biz" target="_blank"><i class="fa fa-globe fa-3x fa-spin"></i></a>
                        </li>
                        <li>
                        <a href="https://www.frazer.biz/company/integrations/" target="_blank">
                        <i class="fa fa-chain fa-3x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 wow fadeInRight">
                <div class="team-member">
                    <img src="dealers/img/landing/avatar2.jpg" class="img-responsive" alt="Frazer Auto Dealership Software">
                    <h4><span class="navy">Auto</span> CityMag.com <small>Coming Soon</small></h4>
                    <p>AutoCity Magazine is online magazine built and managed auto industry professionals including related business advertising with crm lead capture and exclusive marketing and managing.</p>
                    <ul class="list-inline social-icon">
                        <li><a target="_blank"><i class="fa fa-globe fa-3x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p>All of these are brought to you provide a cost effiecient way to manage your business and increase conversions of new and existing customers.</p>
            </div>
        </div>
    </div>
</section --->




<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Gain Access To Exclusive Marketing Channels.</h1>
                <p>Unlock New Leads, And New Opportunities New Horizons Inside IDSCRM.</p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-3 features-text wow fadeInLeft">
                <small>WefinanceHere.com</small>
                <h2>Proud Partner</h2>
                <p>Each active dealerhip location and inventory listings inventory with an automatice finance program powered by IDSCRM.com</p>
                <a href="https://wefinancehere.com" class="btn btn-primary" target="_blank">Check Out NOW!</a>
            </div>

            <div class="col-lg-3 features-text wow fadeInLeft" style="display:none;">
                <small>BuyHerePayHereUs.com</small>
                <h2>Proud Provider</h2>
                <p>Buy Here Pay Here Dealers located across the country in each market listings inventory and finance portals all managed and powered by IDSCRM.com</p>
                <a href="https://buyherepayhereus.com" class="btn btn-primary" target="_blank">Check Out NOW!</a>
            </div>
            <div class="col-lg-6 text-right m-t-n-lg wow zoomIn">
                <img src="images/auction.jpg" class="img-responsive boxshadow" alt="dashboard">
                <img sr>
            </div>
            <div class="col-lg-3 features-text text-right wow fadeInRight">
                <small>IDSCRM.com</small>
                <h2>Perfectly designed </h2>
                <p>IDSCRM.com is a premium admin dashboard template with flat design concept. It is fully responsive built with the latest mobile Framework. Store a large collection of inventory photos and more with our easy to use interface.</p>
                <a href="#page-how2getstarted" class="btn btn-primary">Learn more</a>
            </div>
        </div>
    </div>

</section>



<section id="about" class="navy-section" style="margin-top: 0">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center wow zoomIn">
                <i class="fa fa-comment big-icon"></i>
                <h1>
                   A Statement From Our Founder
                </h1>
                <div class="testimonials-text">
                    <i>"We Have Expanded Interntaionally Markets Now Open In Africa."</i>
                </div>
                <small>
                    <strong>12.28.2023 - Mr. Carter</strong>
                </small>
            </div>
            <div class="col-lg-12 text-center wow zoomIn">
                <i class="fa fa-comment big-icon"></i>
                <h1>
                    A Question From Our Founder
                </h1>
                <div class="testimonials-text">
                    <i>"Are You Ready To Sell More Cars?"</i>
                </div>
                <small>
                    <strong>09.20.2016 - Mr. Carter</strong>
                </small>
            </div>
        </div>
    </div>

</section>


<section class="comments gray-section" style="margin-top: 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Which device Would You Like To Use?</h1>
                <p>Mobile Responsiveness is key in today's web technology take a look below.</p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-4">
                <div class="bubble">
                    "Desktop Mobile Responsiveness Adapts very nice and sleek fitting any large or extra large screen when viewing and navigating through your opportunities (perfect for office work)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <i class="fa fa-desktop fa-5x features-icon"></i>
                    </a>
                  <div class="media-body">
                        <div class="commens-name">
                            Desktop Monitor
                        </div>
                        <small class="text-muted">i.e. 1980 x 1020 flexible</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "Laptop Or Tablet Responsiveness Adapts very nice and sleek fitting any medium size screen when viewing and navigating through your opportunities  (perfect for plug and go devices)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <i class="fa fa-laptop fa-5x features-icon"></i>
                    </a>
                  <div class="media-body">
                        <div class="commens-name">
                           Laptop/Tablet
                        </div>
                        <small class="text-muted">i.e. 1020 x 768 flexible</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "Mobile Responsiveness Adapts very nice and sleek fitting any small smartphone screen when viewing and navigating through your opportunities (perfect for pocket type devices)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <i class="fa fa-mobile fa-5x features-icon"></i>
                    </a>
                  <div class="media-body">
                        <div class="commens-name">
                            Cellphone
                        </div>
                        <small class="text-muted">i.e. 768 x 400 flexible</small>
                    </div>
                </div>
            </div>



        </div>
    </div>

</section>


<!--- section id="pricing" class="pricing">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>IDSCRM Pricing</h1>
                <p>Take Your to the next level. Multi-user Account Including custom Website Connect Could Change. All Prices Are Monthly.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Basic
                    </li>
                    <li class="pricing-desc">
                        For Small Dealerships
                    </li>
                    <li class="pricing-price">
                        <span>$298</span> / month
                    </li>
                    <li>
                        5 Dashboards
                    </li>
                    <li>
                        5 Team Members
                    </li>
                    <li>
                        5 Email Accounts
                    </li>
                    <li>
                        5 Appointment Calendar
                    </li>
                    <li>
                        $125 Each Additional User
                    </li>
                    <li>
                        <strong>Platform Support</strong>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs page-scroll" href="#getademo">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled selected">
                    <li class="pricing-title">
                        Standard
                    </li>
                    <li class="pricing-desc">
                        For Medium Dealerships
                    </li>
                    <li class="pricing-price">
                        <span>$998</span> / month
                    </li>
                    <li>
                        10 Dashboards
                    </li>
                    <li>
                        10 Team Members
                    </li>
                    <li>
                        10 Email Accounts
                    </li>
                    <li>
                        10 Appointment Calendar
                    </li>
                    <li>
                        $95 Each Additional User
                    </li>
                    <li>
                        <strong>Platform Support</strong>
                    </li>
                    <li class="plan-action">
                        <a class="btn btn-primary btn-xs page-scroll" href="#getademo">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Premium
                    </li>
                    <li class="pricing-desc">
                        Large Dealerships
                    </li>
                    <li class="pricing-price">
                        <span>$1998</span> / month
                    </li>
                    <li>
                        20 Dashboards
                    </li>
                    <li>
                        20 Team Members
                    </li>
                    <li>
                        20 Email Accounts
                    </li>
                    <li>
                        20 Appointment Calendar
                    </li>
                    <li>
                        $75 Each Additional User
                    </li>
                    <li>
                        <strong>Platform Support</strong>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs page-scroll" href="#getademo">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row m-t-lg">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg">
                <p>*With IDSCRM we have brought everything to one place using the most abundant features to deliver right to your account and manage your business on a continuous basis.</p>
            </div>
        </div>
    </div>

</section --->



<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contact Us</h1>
                <p>Give Us A Call Or Send Us An Email</p>
            </div>
        </div>
        <div id="contact_address" class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <address>
                    <strong><span class="navy">Intergrated Dealer Systems (IDSCRM.COM)</span></strong><br />                   
                    
                    <!--- abbr title="Phone">Phone: </abbr> <a href="#">#</a><br />
                    <a href="sms:+1-404-565-4371" class="btn btn-block"><i class="fa fa-phone"></i> Text Us</a  --->
                </address>
            </div>
            <div class="col-lg-4" style="display:none;">
                <p class="text-color">
                    Dealership Back Office Portal, 
                    Lead Management, Inventory Management, Teams, 
                    Sales People, Managers, Collectors, Repair Shops.  Lite Desking.  
                    Data Feeds, Dealer To Dealer Sales (Wholesale). Other Marketing Avenues.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:info@idscrm.com" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                    Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; <?php echo date('Y'); ?> Intergrated Dealer Systems</strong><br/> United States and Canda Based Automotive Solution.</p>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="gray-section contact">
	<div id="debug_console" class="hidden">
    
    </div>
</section>




<?php include("_home_modals.php"); ?>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/jasny-bootstrap/js/jasny-bootstrap.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/idscrm.js"></script>
<script src="js/home.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/wow/wow.min.js"></script>
<script src="js/boot.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });


        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
        });

        // Page scrolling feature
        $('a#scroll_demo').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
        });



    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>

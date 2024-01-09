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
                        <h1 class="text-white c-font-weight-700">Car Compare</h1>
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
                            <li class="breadcrumb-item active">Car Compare</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->

        <!-- Car Compare -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 mb-5">
                        <h5>Compare Jeep Wrangler Unlimited Vs Land Rover Range Rover Velar Vs Mercedes-Benz SLC</h5>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-xl-3 mb-5 mb-xl-0">
                        <div class="card c-brd-light">
                            <div class="card-body c-bg-light text-center">
                                <h6>Add Car to Compare</h6>
                                <form>
                                    <div class="form-group">
                                        <select class="form-control bg-white rounded">
                                            <option>--- Select Brand ---</option>
                                            <option value="Hyundai">Hyundai</option>
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
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control bg-white rounded">
                                            <option>--- Select Model ---</option>
                                            <option value="Hyundai I20">Hyundai Accent</option>
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
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control bg-white rounded">
                                            <option>--- Select Variant ---</option>
                                            <option>--- Petrol ---</option>
                                            <option value="Excutive">Excutive</option>
                                            <option value="GLE">GLE</option>
                                            <option value="GLS 1.6">GLS 1.6</option>
                                            <option value="GLS 1.6 ABS">GLS 1.6 ABS</option>
                                            <option value="GTX Tornado">GTX Tornado</option>
                                            <option value="GVS">GVS</option>
                                            <option value="VIVA">VIVA</option>
                                            <option value="VIVA ABS">VIVA ABS</option>
                                            <option value="GLX">GLX</option>
                                            <option value="GLE 1">GLE 1</option>
                                            <option value="GLE 2">GLE 2</option>
                                            <option value="GLS">GLS</option>
                                            <option>--- Diesel ---</option>
                                            <option value="CRDi">CRDi</option>
                                            <option value="VIVA CRDi">VIVA CRDi</option>
                                            <option value="DLS">DLS</option>
                                            <option>--- LPG ---</option>
                                            <option value="Excutive LPG">Excutive LPG</option>
                                        </select>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-lg btn-block">Add A Car</a>
                                </form>
                            </div>
                            <div class="card-body c-brd-light border border-left-0 border-right-0 border-bottom-0">
                                <div class="form-group mb-0">
                                    <input type="checkbox" id="checkbox1">
                                    <label for="checkbox1" class="mb-0">Hide Common Features</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-9">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <div class="card c-brd-light">
                                    <div class="close text-right pr-1 pt-1">
                                        <a href="#" class="c-secondary"><i class="icon ion-close-circled"></i></a>
                                    </div>
                                    <div class="card-body text-center  pt-0">
                                        <a href="#"><img src="dist/images/jeep.png" alt="" class="img-fluid mb-3" /></a>
                                        <a href="#" class="c-dark c-montserrat">Jeep Wrangler Unlimited</a>
                                        <form>
                                            <div class="form-group my-3">
                                                <select class="form-control bg-white rounded">
                                                    <option>4x4 (Diesel) 71.05 Lakh*</option>
                                                </select>
                                            </div>
                                            <h6 class="c-primary text-left mb-2"><small class="c-light">Price</small> $71.05 Lakh </h6>
                                            <a href="#" class="btn btn-primary btn-md btn-block">View Offer</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <div class="card c-brd-light">
                                    <div class="close text-right pr-1 pt-1">
                                        <a href="#" class="c-secondary"><i class="icon ion-close-circled"></i></a>
                                    </div>
                                    <div class="card-body text-center  pt-0">
                                        <a href="#"><img src="dist/images/range-rover.png" alt="" class="img-fluid mb-3" /></a>
                                        <a href="#" class="c-dark c-montserrat">Land Rover Range Rover Velar</a>
                                        <form>
                                            <div class="form-group my-3">
                                                <select class="form-control bg-white rounded">
                                                    <option>D300 S (Diesel) 1.16 Crore*</option>
                                                </select>
                                            </div>
                                            <h6 class="c-primary text-left mb-2"><small class="c-light">Price</small>  $1.16 Crore </h6>
                                            <a href="#" class="btn btn-primary btn-md btn-block">View Offer</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card c-brd-light">
                                    <div class="close text-right pr-1 pt-1">
                                        <a href="#" class="c-secondary"><i class="icon ion-close-circled"></i></a>
                                    </div>
                                    <div class="card-body text-center  pt-0">
                                        <a href="#"><img src="dist/images/Mercedes.png" alt="" class="img-fluid mb-3" /></a>
                                        <a href="#" class="c-dark c-montserrat">Mercedes-Benz SLC</a>
                                        <form>
                                            <div class="form-group my-3">
                                                <select class="form-control bg-white rounded">
                                                    <option>43 AMG (Perrol) 82.2 Lakh*</option>
                                                </select>
                                            </div>
                                            <h6 class="c-primary text-left mb-2"><small class="c-light">Price</small> $82.20 Lakh </h6>
                                            <a href="#" class="btn btn-primary btn-md btn-block">View Offer</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card c-brd-light car-listing border-top-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0 ">
                                    <thead class="list-header c-dark">
                                        <tr>
                                            <th scope="col"><i class="fa fa-bars pr-1"></i> Overview</th>
                                            <th scope="col">Wrangler Unlimited</th>
                                            <th scope="col">Rang Rover Velar</th>
                                            <th scope="col"><a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#demo"></a> SLC</th>
                                        </tr>
                                    </thead>
                                    <tbody id="demo" class="collapse show widget-content">
                                        <tr>
                                            <td>Vehicle Type</td>
                                            <td>Sport Utilities</td>
                                            <td>Sport Utilities</td>
                                            <td>Convertitbles</td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Type</td>
                                            <td>Diesel</td>
                                            <td>Diesel</td>
                                            <td>Petrol</td>
                                        </tr>
                                        <tr>
                                            <td>Displacement (cc)</td>
                                            <td>2799</td>
                                            <td>2993</td>
                                            <td>2996</td>
                                        </tr>
                                        <tr>
                                            <td>Max Power (bhp @ rpm)</td>
                                            <td>197 @ 3600</td>
                                            <td>244 @ 4000</td>
                                            <td>362 @ 5500</td>
                                        </tr>
                                        <tr>
                                            <td>Max Torque (Nm @ rpm)</td>
                                            <td>460 @ 1600</td>
                                            <td>600 @ 2000</td>
                                            <td>520 @ 2000</td>
                                        </tr>
                                        <tr>
                                            <td>Mileage (ARAI)</td>
                                            <td>12.1 kmpl</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Alternate Fuel</td>
                                            <td>Not Applicable</td>
                                            <td>Not Applicable</td>
                                            <td>Not Applicable</td>
                                        </tr>
                                        <tr>
                                            <td>Transmission Type</td>
                                            <td>Automatic</td>
                                            <td>Automatic</td>
                                            <td>Automatic</td>
                                        </tr>
                                        <tr>
                                            <td>No of gears (Gears)</td>
                                            <td>5</td>
                                            <td>8</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>Air Conditioner</td>
                                            <td>Automatic Climate Control</td>
                                            <td>Automatic - Four Zone</td>
                                            <td>Automatic Climate Control</td>
                                        </tr>
                                        <tr>
                                            <td>Power Windows</td>
                                            <td>Front & Rear</td>
                                            <td>Front & Rear</td>
                                            <td>Front Only</td>
                                        </tr>
                                        <tr>
                                            <td>Central Locking</td>
                                            <td>Remote</td>
                                            <td>Remote</td>
                                            <td>Remote with Boot Opener</td>
                                        </tr>
                                        <tr>
                                            <td>Airbags</td>
                                            <td>2 Airbags</td>
                                            <td>8 Airbags</td>
                                            <td>6 Airbags</td>
                                        </tr>
                                        <tr>
                                            <td>Seat Upholstery</td>
                                            <td>Leather</td>
                                            <td>Leather</td>
                                            <td>Leather</td>
                                        </tr>
                                        <tr>
                                            <td>Front Tyres</td>
                                            <td>245 / 75 R15</td>
                                            <td>245 / 75 R15</td>
                                            <td>235 / 40 R18</td>
                                        </tr>
                                        <tr>
                                            <td>Rear Tyres</td>
                                            <td>245 / 75 R15</td>
                                            <td>245 / 75 R15</td>
                                            <td>255 / 35 R18</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="list-header p-3">
                                <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#Specifications" aria-expanded="true"><i class="fa fa-bars pr-1"></i>  Specifications</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <tbody id="Specifications" class="collapse show widget-content">
                                        <tr>
                                            <td>Length</td>
                                            <td>3995mm</td>
                                            <td>3995mm</td>
                                            <td>3995mm</td>
                                        </tr>
                                        <tr>
                                            <td>Width</td>
                                            <td>1660mm</td>
                                            <td>1660mm</td>
                                            <td>1660mm</td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td>1520mm</td>
                                            <td>1520mm</td>
                                            <td>1520mm</td>
                                        </tr>
                                        <tr>
                                            <td>Ground Clearance</td>
                                            <td>165mm</td>
                                            <td>165mm</td>
                                            <td>165mm</td>
                                        </tr>
                                        <tr>
                                            <td>Wheel Base</td>
                                            <td>2425mm</td>
                                            <td>2425mm</td>
                                            <td>2425mm</td>
                                        </tr>
                                        <tr>
                                            <td>Front Tread</td>
                                            <td>1479mm</td>
                                            <td>1479mm</td>
                                            <td>1479mm</td>
                                        </tr>
                                        <tr>
                                            <td>Rear Tread</td>
                                            <td>1493mm</td>
                                            <td>1493mm</td>
                                            <td>1493mm</td>
                                        </tr>
                                        <tr>
                                            <td>Seating Capacity</td>
                                            <td>5 Comfortable</td>
                                            <td>5 Comfortable</td>
                                            <td>5 Comfortable</td>
                                        </tr>
                                        <tr>
                                            <td>Cargo Volume</td>
                                            <td>460-Litres Maximum</td>
                                            <td>460-Litres Maximum</td>
                                            <td>460-Litres Maximum</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Doors</td>
                                            <td>5</td>
                                            <td>5</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>Tyre Type</td>
                                            <td>Tubeless, Radial</td>
                                            <td>Tubeless, Radial</td>
                                            <td>Tubeless, Radial</td>
                                        </tr>
                                        <tr>
                                            <td>Wheel Type</td>
                                            <td>Alloy Wheel</td>
                                            <td>Alloy Wheel</td>
                                            <td>Alloy Wheel</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="list-header p-3">
                                <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#safety" aria-expanded="true"><i class="fa fa-bars pr-1"></i>  Safety Features</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <tbody id="safety" class="collapse show widget-content">
                                        <tr>
                                            <td>Air Conditioner</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>CD Player</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>AntiLock Braking System</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Power Steering</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Leather Seats</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Central Locking</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Speed Sensing Auto Door Lock</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Impact Sensing Auto Door Unlock</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Parking Sensors</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Traction control</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Electrically Adjustable Mirrors</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Power steering</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="list-header p-3">
                                <a href="#" class="d-block text-btn c-montserrat c-dark c-font-weight-500" data-toggle="collapse" data-target="#Standurd" aria-expanded="true"><i class="fa fa-bars pr-1"></i>  Standurd Features</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <tbody id="Standurd" class="collapse show widget-content">
                                        <tr>
                                            <td>Air Conditioner</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>CD Player</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>AntiLock Braking System</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Power Steering</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Leather Seats</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Central Locking</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Speed Sensing Auto Door Lock</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Impact Sensing Auto Door Unlock</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Parking Sensors</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Traction control</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Electrically Adjustable Mirrors</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Power steering</td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Tank Capacity</td>
                                            <td><i class="fa fa-close text-danger"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Car Compare -->

        <!-- Footer Bottom -->
        <?php require_once("_inc.footer.php"); ?>
        <!-- End Footer Bottom -->

        <!-- jQuery -->
        <script src="dist/js/plugins.min.js"></script>
        <script src="dist/js/common.js"></script>
    </body>
</html>
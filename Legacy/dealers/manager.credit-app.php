<?php require_once("db_manager_loggedin.php"); ?>
<?php
$colname_find_dlr_creditapp = "-1";
if (isset($_GET['app_id'])) {
  $colname_find_dlr_creditapp = $_GET['app_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_creditapp =  sprintf("SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown_id` = %s", GetSQLValueString($colname_find_dlr_creditapp, "int"));
$find_dlr_creditapp = mysqli_query($idsconnection_mysqli, $query_find_dlr_creditapp);
$row_find_dlr_creditapp = mysqli_fetch_assoc($find_dlr_creditapp);
$totalRows_find_dlr_creditapp = mysqli_num_rows($find_dlr_creditapp);
$credit_app_id = $row_find_dlr_creditapp['credit_app_fullblown_id'];

$credit_app_fullblown_id = $row_find_dlr_creditapp['credit_app_fullblown_id'];
$applicant_did = $row_find_dlr_creditapp['applicant_did'];
$app_deal_number = $row_find_dlr_creditapp['app_deal_number'];

include('inc.funky.functions.php');
 
 // Using Funky functions For Assing Credit App An App Number ON View:
 write_deal_number($credit_app_fullblown_id, $applicant_did, $app_deal_number);
 
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Credit Application</title>
	<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

       
        <?php include("_sidebar.manager.php"); ?>

       
        <div id="page-wrapper" class="gray-bg">
       
       
        <?php include("_nav_top.manager.php"); ?>
       
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Credit Application</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.credit-apps.php">Credit Applications</a>
                        </li>
                        <li class="active">
                            <strong>Application View</strong>
                            <input id="credit_app_fullblown_id" type="hidden" value="<?php echo $credit_app_id; ?>" />
                            <input id="applicant_app_token" type="hidden" value="<?php echo $row_find_dlr_creditapp['applicant_app_token']; ?>" />

                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
       





			<div class="row wrapper border-bottom white-bg page-heading">
            
                <div class="col-sm-12">
                    <div class="title-action">
                        <a href="manager.credit-apps.php" class="btn btn-primary btn-sm m-b">Credit Apps</a>                    
                        <a href="manager.creditapp.add.php" class="btn btn-primary btn-sm m-b">Create A New Credit Application</a>
                    </div>
                </div>
            
            </div>





<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>App Number:  <?php echo $app_deal_number; ?></h5>
                    </div>
                    <div class="ibox-content">
                        <p>
                            Choose And Click Your Options Below.
                        </p>
                        <h3 class="font-bold">Application Options</h3>

                <button class="btn btn-primary dim btn-large-dim" type="button"><i class="fa fa-money"></i><br /></button>
                <button class="btn btn-warning dim btn-large-dim" type="button"><i class="fa fa-print"></i></button>
                <button id="editApp" class="btn btn-info  dim btn-large-dim btn-outline" type="button"><i class="fa fa-pencil-square-o"></i></button>

                <!-- button class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa fa-frown-o"></i></button>
                <button class="btn btn-primary  dim btn-large-dim" type="button"><i class="fa fa-smile-o"></i></button -->


                    </div>
                </div>
            </div>




<div id="current_address_section" class="row">

            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Full Name: <?php echo $row_find_dlr_creditapp['applicant_titlename']; ?> <?php echo $row_find_dlr_creditapp['applicant_name']; ?></strong><br>
                            <strong>First Name:</strong> <?php echo $row_find_dlr_creditapp['applicant_fname']; ?><br>
                            <strong>Last Name:</strong> <?php echo $row_find_dlr_creditapp['applicant_lname']; ?> <?php echo $row_find_dlr_creditapp['applicant_suffixname']; ?><br>
                            <abbr title="Phone"><strong>Cell: </strong></abbr> <?php echo $row_find_dlr_creditapp['applicant_cell_phone']; ?><br>
                            <abbr title="Phone"><strong>Home: </strong></abbr> <?php if(!$row_find_dlr_creditapp['applicant_main_phone']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp['applicant_main_phone']; } ?><br>
                            <abbr title="Phone"><strong>Work: </strong></abbr> <?php if(!$row_find_dlr_creditapp['applicant_employer1_phone']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp['applicant_employer1_phone']; } ?><br>

                        </span></address>


                        <address>                                                        
                            <strong>Appointment Time: </strong> <?php if(!$row_find_dlr_creditapp['applicant_driver_licenses_status']){ echo 'Unknown'; }else{ echo $row_find_dlr_creditapp['applicant_appt_startunixtime'];} ?><br />
						</address>
                        
                        
                        <address>                                                        
                            <strong>DL Status: </strong> <?php if(!$row_find_dlr_creditapp['applicant_driver_licenses_status']){ echo 'Unknown'; }else{ echo $row_find_dlr_creditapp['applicant_driver_licenses_status'];} ?><br />
                            <strong>DL Number:</strong> <?php if(!$row_find_dlr_creditapp['applicant_driver_licenses_number']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp['applicant_driver_licenses_number']; } ?><br />
                            <strong>DL State:</strong> <?php if(!$row_find_dlr_creditapp['applicant_driver_state_issued']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp['applicant_driver_state_issued']; } ?><br />
                            <strong>DL Expire Date:</strong> <?php if(!$row_find_dlr_creditapp['applicant_driver_licenses_expdate']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp['applicant_driver_licenses_expdate']; } ?><br />
                            
                            
                        </address>
                        
                        <address>                                                        
                            <strong>Social:</strong> <?php if(!$row_find_dlr_creditapp['applicant_ssn']){ echo 'Missing'; }else{ echo 'xxx-xx-xxxx';} ?><br />
                            <strong>DOB:</strong> <?php if(!$row_find_dlr_creditapp['applicant_dob']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp['applicant_dob']; } ?><br />
                            
                            
                        </address>

                        <address>
                            <strong>Other Name:</strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_other_name']; ?></a>
                        </address>

                        <address>
                            <strong>Email 1:</strong><br>
                            <a href="mailto:<?php echo $row_find_dlr_creditapp['applicant_email_address']; ?>"><?php echo $row_find_dlr_creditapp['applicant_email_address']; ?></a>
                        </address>

                        <address>
                            <strong>Email 2:</strong><br>
                            <a href="mailto:<?php echo $row_find_dlr_creditapp['applicant_email_address2']; ?>"><?php echo $row_find_dlr_creditapp['applicant_email_address2']; ?></a>
                        </address>



                        <address>
                        	<strong>Source:</strong> <?php echo $row_find_dlr_creditapp['credit_app_source']; ?><br />
                        </address>
                        
                        <address>
                        	<strong>Captured On:</strong> <?php echo $row_find_dlr_creditapp['application_created_date']; ?><br />
                        </address>

                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Current Address</h5>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Address1: </strong> <?php echo $row_find_dlr_creditapp['applicant_present_address1']; ?><br>
                            <strong>Address2: </strong> <?php echo $row_find_dlr_creditapp['applicant_present_address2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp['applicant_present_addr_city']; ?>, <?php echo $row_find_dlr_creditapp['applicant_present_addr_state']; ?> <?php echo $row_find_dlr_creditapp['applicant_present_addr_zip']; ?><br>
                            <abbr title="Phone"><strong>County:</strong> </abbr> <?php echo $row_find_dlr_creditapp['applicant_present_addr_county']; ?>

                        </address>

                        <address>
                            <strong>Land Lord Or Mortage Co.</strong><br>
                           <strong> Name:</strong> <a> <strong><?php echo $row_find_dlr_creditapp['applicant_previous1_landlord_name']; ?></strong></a><br />
                            <strong>Phone:</strong> <a href="tel: <?php echo $row_find_dlr_creditapp['applicant_addr_landlord_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp['applicant_addr_landlord_phone']; ?></strong></a><br />
                        </address>



                        <address>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp['applicant_addr_landlord_address']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp['applicant_addr_landlord_city']; ?>, <?php echo $row_find_dlr_creditapp['applicant_addr_landlord_state']; ?> <?php echo $row_find_dlr_creditapp['applicant_addr_landlord_zip']; ?><br>
                        </address>

                        <address>
                            <strong>Live Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_addr_years']; ?></a>
                        </address>

                        <address>
                            <strong>Live Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_addr_months']; ?></a>
                        </address>


                        <address>
                        	<strong>House Payment:</strong> $<?php echo $row_find_dlr_creditapp['applicant_house_payment']; ?>
                        </address>

                        <address>
                            <strong>Map This Address</strong><br>
                            <a href="#"><i class="fa fa-map-marker"></i><strong> Map</strong></a>
                        </address>

                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Applicant Main Info Stats</h5>
                    </div>
                    <div class="ibox-content no-padding">
                        <ul class="list-group">
							<?php if($row_find_dlr_creditapp['applicant_vid']): ?>                        	
                            <li class="list-group-item">
                            	<span class="badge badge-primary"></span>
                                
                                <img src="<?php echo showvtumbnail($row_find_dlr_creditapp['applicant_vid']); ?>" width="120px"  />
                                
                                
                            </li>
                            <?php endif; ?>

                            <li class="list-group-item">
                                <span class="badge badge-primary"><?php echo $row_find_dlr_creditapp['applicant_sid_name']; ?></span>
                               First Sales Person:
                            </li>

                            <li class="list-group-item">
                                <span class="badge badge-primary"><?php echo $row_find_dlr_creditapp['applicant_sid2_name']; ?></span>
                               Second Sales Person:
                            </li>

                            <li class="list-group-item">
                                <span class="badge badge-primary"><?php echo $row_find_dlr_creditapp['applicant_addr_years']; ?></span>
                               Year At This Address
                            </li>
                            <li class="list-group-item ">
                                <span class="badge badge-info"><?php echo $row_find_dlr_creditapp['applicant_addr_months']; ?></span>
                               Months At This Address
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-danger"><?php echo $row_find_dlr_creditapp['applicant_apart_or_house']; ?></span>
                               Apartment Or House
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-success"><?php echo $row_find_dlr_creditapp['applicant_buy_own_rent_other']; ?></span>
                                Buy Own Rent
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-warning"><?php echo $row_find_dlr_creditapp['applicant_residence_changes']; ?></span>
                               Last Two Year Residence Changes
                            </li>
                        </ul>
                    </div>
                </div>
            
            
            </div>

</div>

<div id="current_work_section" class="row">

            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Current Employer 1:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Name: </strong> <?php echo $row_find_dlr_creditapp['applicant_employer1_name']; ?><br>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp['applicant_employer1_addr']; ?><br>
                            <strong>Address 2: </strong> <?php echo $row_find_dlr_creditapp['applicant_employer1_addr2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp['applicant_employer1_city']; ?>, <?php echo $row_find_dlr_creditapp['applicant_employer1_state']; ?> <?php echo $row_find_dlr_creditapp['applicant_employer1_zip']; ?><br>
                        </address>


                        <address>
                            <strong>Phone:</strong> <a href="tel: <?php echo $row_find_dlr_creditapp['applicant_employer1_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp['applicant_employer1_phone']; ?> <?php echo $row_find_dlr_creditapp['applicant_employer1_phone_ext']; ?></strong></a><br />
                        </address>




                        <address>
                            <strong>Work Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_employer1_work_years']; ?></a>
                        </address>

                        <address>
                            <strong>Work Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_employer1_work_months']; ?></a>
                        </address>

                        <address>
                            <strong>User Comments About Emloyer: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['user_applicant_employer_notes']; ?></a>
                        </address>

                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Previous Employer 2:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Name: </strong> <?php echo $row_find_dlr_creditapp['applicant_employer2_name']; ?><br>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp['applicant_employer2_addr']; ?><br>
                            <strong>Address 2: </strong> <?php echo $row_find_dlr_creditapp['applicant_employer2_addr2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp['applicant_employer2_city']; ?>, <?php echo $row_find_dlr_creditapp['applicant_employer2_state']; ?> <?php echo $row_find_dlr_creditapp['applicant_employer2_zip']; ?><br>
                        </address>


                        <address>
                            <strong>Phone:</strong> <a href="tel: <?php echo $row_find_dlr_creditapp['applicant_employer2_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp['applicant_employer2_phone']; ?> <?php echo $row_find_dlr_creditapp['applicant_employer2_phone_ext']; ?></strong></a><br />
                        </address>




                        <address>
                            <strong>Work Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_employer2_work_years']; ?></a>
                        </address>

                        <address>
                            <strong>Work Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_employer2_work_months']; ?></a>
                        </address>


 
                    </div>

                </div>
            
            
            </div>

</div>

<div id="previous_address_section" class="row">

            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Previous Address 1:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp['applicant_previous1_addr1']; ?><br>
                            <strong>Address 2: </strong> <?php echo $row_find_dlr_creditapp['applicant_previous1_addr2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp['applicant_previous1_addr_city']; ?>, <?php echo $row_find_dlr_creditapp['applicant_previous1_addr_state']; ?> <?php echo $row_find_dlr_creditapp['applicant_previous1_addr_zip']; ?><br>
                        </address>


                        <address>
                            <strong>Land Lord Or Mortage Co.</strong><br>
                           <strong> Name: </strong> <strong><?php echo $row_find_dlr_creditapp['applicant_previous1_landlord_name']; ?></strong><br />
                            <strong>Phone:</strong> <a href="tel: <?php echo $row_find_dlr_creditapp['applicant_addr_landlord_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp['applicant_addr_landlord_phone']; ?></strong></a><br />
                        </address>




                        <address>
                            <strong>Live Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_previous1_live_years']; ?></a>
                        </address>

                        <address>
                            <strong>Live Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_previous1_live_months']; ?></a>
                        </address>


                        <address>
                            <strong>User Comments About Previous Address: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['user_comments_previousaddr_notes']; ?></a>
                        </address>




                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Previous Address 2:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp['applicant_previous2_addr1']; ?><br>
                            <strong>Address 2: </strong> <?php echo $row_find_dlr_creditapp['applicant_previous2_addr2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp['applicant_previous2_addr_city']; ?>, <?php echo $row_find_dlr_creditapp['applicant_previous2_addr_state']; ?> <?php echo $row_find_dlr_creditapp['applicant_previous2_addr_zip']; ?><br>
                        </address>


                        <address>
                            <strong>LandLord Or Mortgage Co:</strong><br>
                            <strong>Name: </strong> <?php echo $row_find_dlr_creditapp['applicant_previous2_landlord_name']; ?><br />
                            Phone: <a href="tel: <?php echo $row_find_dlr_creditapp['applicant_previous2_landlord_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp['applicant_previous2_landlord_phone']; ?></strong></a><br />
                        </address>


                        <address>
                            <strong>Live Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_previous2_live_years']; ?></a>
                        </address>

                        <address>
                            <strong>Live Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_previous2_live_months']; ?></a>
                        </address>


 
                    </div>

                </div>
            
            
            </div>
            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Previous Residence Stats</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content no-padding">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge badge-primary">16</span>
                                But I must explain to
                            </li>
                            <li class="list-group-item ">
                                <span class="badge badge-info">12</span>
                                How all this mistaken
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-danger">10</span>
                                But because occasionally
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-success">10</span>
                                But who has any right
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-warning">7</span>
                                On the other hand
                            </li>
                        </ul>
                    </div>
                </div>
            
            
            </div>

</div>


<div id="vehicle_app_section" class="row">

            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Vehicle Application Section:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Vehicle Purchase VIN: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_vin']; ?><br>
                            <strong>Vehicle Purchase Stock No: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_stockno']; ?><br>
                            <strong>Vehicle Purchase Year: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_year']; ?><br>
                            <strong>Vehicle Purchase Make: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_make']; ?><br>
                            <strong>Vehicle Purchase Model: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_model']; ?><br>
                            <strong>Vehicle Purchase Style: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_style']; ?><br>

                            <strong>Vehicle Purchase: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_ymkmd_txt']; ?><br>
                        </address>


                        <address>
                            <strong>Asset Type: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_asset_type']; ?><br>
                            <strong>Intended Use: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_intendeduse']; ?><br>
                            <strong>Vehicle Purchase Condition: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_neworused']; ?><br>
                            <strong>Vehicle Purchase Miles: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_inception_miles']; ?><br>
                        </address>





                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Vehicle Trade Information:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Trade Year: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_trade_year']; ?><br>
                            <strong>Trade Make: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_trade_make']; ?><br>
                            <strong>Trade Model: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_trade_model']; ?><br>
                            <strong>Trade VIN: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_trade_vin']; ?><br>
                            <strong>Trade Lien Holder: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_trade_lien_holder_name']; ?><br>
                        </address>

                        <address>
                            <strong>Last Vehicle Purchase: </strong> <?php echo $row_find_dlr_creditapp['applicant_last_vehicle_purchased']; ?><br>
                            <strong>Open To Refinancing: </strong> <?php echo $row_find_dlr_creditapp['applicant_open_to_refinanceautoloan']; ?><br>
                        </address>










 
                    </div>

                </div>
            
            
            </div>

</div>






<div id="current_work_section" class="row">

            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Contract Information:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    





                        <address>
                            <strong>Financing Amount: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_financed_amount']; ?><br>
                            <strong>Finance Rate: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_cust_rate']; ?><br>
                            <strong>Finance Months: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_term_months']; ?><br>
                            <strong>Monthly Payments: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_total_monthpmts_est']; ?><br>
                            <strong>MSRP: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_msrp']; ?><br>
                            <strong>Invoice/Wholesale: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_wholesale_invoice']; ?>

                        </address>

                        <address>
                            <strong>Gap: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_gap']; ?><br>
                            <strong>Service Contract: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_srvc_contract']; ?><br>
                            <strong>Credit Life: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_credit_life']; ?><br>
                            <strong>Disability: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_disability']; ?><br>
                            <strong>Insurance Service: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_other_ins_svc']; ?><br>
                            <strong>Invoice/Wholesale: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_wholesale_invoice']; ?>

                        </address>

                        <address>
                            <strong>Trade Notes: </strong> <?php echo $row_find_dlr_creditapp['user_comments_trade_notes']; ?><br>
                            <strong>Service Contract: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_srvc_contract']; ?><br>

                        </address>


                        <address>
                            <strong>Phone:</strong>       <br />
                        </address>





                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Highlights:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Perferred Bureau: </strong> <?php echo $row_find_dlr_creditapp['applilcant_v_creditbureau_preferred']; ?><br>
                            <strong>Name Of Bank: </strong> <?php echo $row_find_dlr_creditapp['applicants_bank_name']; ?><br>
                            <strong>Checking Or Savings: </strong> <?php echo $row_find_dlr_creditapp['applicants_checking_savings_type']; ?><br>
                            <strong>Checking Or Savings Acct #: </strong> <?php echo $row_find_dlr_creditapp['applicants_checking_savings_acct#']; ?><br>
                        </address>


                        <address>
                            <strong>Name Of Bank: </strong> <?php echo $row_find_dlr_creditapp['applicant_creditreference1']; ?><br>
                            <strong>Name Of Bank: </strong> <?php echo $row_find_dlr_creditapp['applicant_creditreference1bal']; ?><br>
                            <strong>Name Of Bank: </strong> <?php echo $row_find_dlr_creditapp['applicant_creditreference1monpay']; ?><br>

                        </address>

                        <address>
                            <strong>Credit Reference 2: </strong> <?php echo $row_find_dlr_creditapp['applicant_creditreference2']; ?><br>                            <strong>Creditreference 2 Balance: </strong> <?php echo $row_find_dlr_creditapp['applicant_creditreference2bal']; ?><br>
                            <strong>Creditreference 2 Payment: </strong> <?php echo $row_find_dlr_creditapp['applicant_creditreference2monpay']; ?><br>

                        </address>

                        <address>
                            <strong>Open Auto Loan: </strong> <?php echo $row_find_dlr_creditapp['applicant_open_autoloan']; ?><br>
                            <strong>Open Auto Loan Company Name: </strong> <?php echo $row_find_dlr_creditapp['applicant_open_autoloan_cname']; ?><br>
                            <strong>Open Auto Loan Acctno: </strong> <?php echo $row_find_dlr_creditapp['applicant_open_autoloan_acctno']; ?><br>
                            <strong>Open Auto Loan Present Balance: </strong> <?php echo $row_find_dlr_creditapp['applicant_open_autoloan_presntbal']; ?><br>
                            <strong>Open Loan Payment: </strong> <?php echo $row_find_dlr_creditapp['applicant_open_autoloan_pymt']; ?><br>
                            <strong>Payment History: </strong> <?php echo $row_find_dlr_creditapp['applicant_open_autoloan_pymthistry']; ?><br>



                        </address>






 
                    </div>

                </div>
            
            
            </div>

</div>





<div id="authorization_section" class="row">

            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Authorization:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">









                        <address>
                            <strong>Herby Authorize: </strong> <?php echo $row_find_dlr_creditapp['applicant_hereby_authorize']; ?><br>
                            <strong>Intials Disclosure: </strong> <?php echo $row_find_dlr_creditapp['applicant_initials_disclosure1']; ?><br>
                            <strong>Applicant Acknowledge Equal Opportunity: </strong> <?php echo $row_find_dlr_creditapp['applicant_acknowledge_equal_opportunity']; ?><br>
                            <strong>Applicant Signature: </strong> <?php echo $row_find_dlr_creditapp['applicant_signature']; ?><br>
                        </address>





                        <address>
                            <strong>Under Signed Authorization: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['undersigned_authorization']; ?></a>
                        </address>

                        <address>
                            <strong>Digital Signature: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_digital_signature']; ?></a>
                        </address>

                        <address>
                            <strong>Digital Signature: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['applicant_authorization_text']; ?></a>
                        </address>


                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Co Applicant Authorization:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Co Applicants Email Address: </strong> <?php echo $row_find_dlr_creditapp['co_applicants_email_address']; ?><br>
                            <strong>Co Applicant Herby Authorize: </strong> <?php echo $row_find_dlr_creditapp['co_applicant_hereby_authorize']; ?><br>
                        </address>





                        <address>
                            <strong>Co Applicant Equal Credit Opportunity Act: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['co_equal_credit_opportunity_act']; ?></a>
                        </address>

                        <address>
                            <strong>Co Applicant Digital Signature: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['co_applicant_signature']; ?></a>
                        </address>

                        <address>
                            <strong>Co Applicant Digital Signature: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['coapplicant_digital_signature']; ?></a>
                        </address>


                        <address>
                            <strong>Digital Signature Date: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp['coapplicant_digital_signature_date']; ?></a>
                        </address>


 
                    </div>

                </div>
            
            
            </div>

</div>


<div id="current_work_section" class="row">

            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Nearest Relative:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <address>
                            <strong>Realative 1 First Name: </strong> <?php echo $row_find_dlr_creditapp['applicants_realative1_fname']; ?><br>
                            <strong>Realative 1 Last Name: </strong> <?php echo $row_find_dlr_creditapp['applicants_realative1_lname']; ?><br>
                            <strong>Realative 1 Relationship: </strong> <?php echo $row_find_dlr_creditapp['applicants_realative1_relationship']; ?><br>
                            <strong>Realative 1 Phone:</strong> <?php echo $row_find_dlr_creditapp['applicants_realative1_mainphone']; ?><br>
                            <strong>Realative 1 Address:</strong> <?php echo $row_find_dlr_creditapp['applicants_realative1_address']; ?> <br />
                            <strong>Realative 1 City, State Zip: </strong><?php echo $row_find_dlr_creditapp['applicants_realative1_address_city']; ?>, <?php echo $row_find_dlr_creditapp['applicants_realative1_address_state']; ?> <?php echo $row_find_dlr_creditapp['applicants_realative1_address_zip']; ?><br />
                        </address>

                        <address>
                            <strong>Realative 2 First Name: </strong> <?php echo $row_find_dlr_creditapp['applicants_realative2_fname']; ?><br>
                            <strong>Realative 2 Last Name: </strong> <?php echo $row_find_dlr_creditapp['applicants_realative2_lname']; ?><br>
                            <strong>Realative 2 Relationship: </strong> <?php echo $row_find_dlr_creditapp['applicants_realative2_relationship']; ?><br>
                            <strong>Realative 2 Phone:</strong> <?php echo $row_find_dlr_creditapp['applicants_realative2_mainphone']; ?><br>
                            <strong>Realative 2 Address:</strong> <?php echo $row_find_dlr_creditapp['applicants_realative2_address']; ?> <br />
                            <strong>Realative 2 City, State Zip: </strong><?php echo $row_find_dlr_creditapp['applicants_realative2_city']; ?>, <?php echo $row_find_dlr_creditapp['applicants_realative2_state']; ?> <?php echo $row_find_dlr_creditapp['applicants_realative2_zip']; ?><br />
                        </address>





                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Mother Father Section:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">













                        <address>
                            <strong>Father Name: </strong> <?php echo $row_find_dlr_creditapp['applicants_father_name']; ?><br>
                            <strong>Father Deceased: </strong> <?php echo $row_find_dlr_creditapp['applicants_father_deceased']; ?><br>
                            <strong>Father Main Phone: </strong> <?php echo $row_find_dlr_creditapp['applicants_father_mainphone_number']; ?><br>
                            <strong>Father Address:</strong> <?php echo $row_find_dlr_creditapp['applicants_father_address']; ?><br>
                        </address>

                        <address>
                            <strong>Mother Name: </strong> <?php echo $row_find_dlr_creditapp['applicants_mother_name']; ?><br>
                            <strong>Mother Deceased: </strong> <?php echo $row_find_dlr_creditapp['applicants_mother_deceased']; ?><br>
                            <strong>Mother Main Phone: </strong> <?php echo $row_find_dlr_creditapp['applicants_mother_mainphone_number']; ?><br>
                            <strong>Mother Address:</strong> <?php echo $row_find_dlr_creditapp['applicants_mother_address']; ?><br>
                        </address>



 
                    </div>

                </div>
            
            
            </div>

</div>




<div id="tab_Panel" style="display:none;">

                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md">
                            <h4>
                            

							<?php if(!$row_find_dlr_creditapp['applicant_name']){ ?>
								
<?php echo $row_find_dlr_creditapp['applicant_titlename']; ?>
                            <?php echo $row_find_dlr_creditapp['applicant_fname']; ?> <?php echo $row_find_dlr_creditapp['applicant_mname']; ?> <?php echo $row_find_dlr_creditapp['applicant_lname']; ?> <?php echo $row_find_dlr_creditapp['applicant_suffixname']; ?>
								
							<?php }else{  ?>
                            
                            <?php 
							
								echo $row_find_dlr_creditapp['applicant_name']; 
								
								} 
							?>
                            
							 - Credit Application
                            </h4>
                            </div>
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-4"><i class="fa fa-laptop"></i></a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-desktop"></i></a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-6"><i class="fa fa-signal"></i></a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-7"><i class="fa fa-bar-chart-o"></i></a></li>
                                </ul>
                            
                            
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-4" class="tab-pane active">





            <div class="row">

                <div class="col-lg-6">
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Personal Information <small></small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Personal Information
                            </h3>
                            <p>
                                Below is the customers information relating to an online credit application.
                            </p>






                            <div id="personal_info_block" class="form-horizontal m-t-md">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Title Name:</label>
                                    <div class="col-sm-9">
                                       <select class="form-control" id="title_name">
                                                    	<option value="">Select Title</option>
                                                    	<option value="Mr.">Mr.</option>
                                                    	<option value="Mrs.">Mrs.</option>
                                                    	<option value="Ms.">Ms.</option>
                                                    </select>
                                        <span class="help-block">999-99-999-9999-9</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">First Name:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_fname" type="text" class="form-control" placeholder="First Name" value="<?php echo $row_find_dlr_creditapp['applicant_fname']; ?>">
                                        <span class="help-block">999 99 999 9999 9</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Middle Name Or Intial:</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_mname" type="text" class="form-control" placeholder="Middle Name" value="<?php echo $row_find_dlr_creditapp['applicant_mname']; ?>">
                                        <span class="help-block">999/99/999/9999/9</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input id="applicant_lname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $row_find_dlr_creditapp['applicant_lname']; ?>">
                                        <span class="help-block">192.168.100.200</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Perferred Name</label>
                                    <div class="col-sm-9">
                                        <input id="nick_name" type="text" class="form-control" placeholder="Perferred Name" id="<?php echo $row_find_dlr_creditapp['applicant_name']; ?>">
                                        <span class="help-block">99-9999999</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cell Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="">
                                        <span class="help-block">(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input id="per_email" type="text" class="form-control" placeholder="">
                                        <span class="help-block">$ 999,999,999.99</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
                           <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input id="lead_comment" type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
                           <div class="hr-line-dashed"></div>

                            <div class="form-group" id="data_3">
                                <label class="font-noraml">Birth Date:</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="10/11/2013">
                                </div>
                            </div>
                           <div class="hr-line-dashed"></div>

                            <div class="form-group" id="data_4">
                                <label class="font-noraml">Driver License Expiration Date:</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                </div>
                            </div>



                           <div class="hr-line-dashed"></div>


                            
                            
                            </div>









                            <div class="form-group" id="data_1">
                                <label class="font-noraml">Simple data input format</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>

                            <div class="form-group" id="data_2">
                                <label class="font-noraml">One Year view</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="08/25/2014">
                                </div>
                            </div>



                            <div class="form-group" id="data_4">
                                <label class="font-noraml">Month select</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                </div>
                            </div>

                            <div class="form-group" id="data_5">
                                <label class="font-noraml">Range select</label>
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" name="start" value="05/14/2014"/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" name="end" value="05/22/2014" />
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Address Information <small>http://abpetkov.github.io/switchery/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Current Address Information
                            </h3>
                            <p>
                                Is iOS 7 style switches for your checkboxes.
                            </p>
                            
                            <div class="form-horizontal m-t-md">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
                          		
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input id="lead_comment" type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
							</div>


                        </div>
                    </div>


                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Work Information <small>http://abpetkov.github.io/switchery/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Employer Information
                            </h3>
                            <p>
                                Is iOS 7 style switches for your checkboxes.
                            </p>
                            
                            <div class="form-horizontal m-t-md">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
                          		
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input id="lead_comment" type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
							</div>


                        </div>
                    </div>



                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Credit Preview<small>http://abpetkov.github.io/switchery/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Current Address Information
                            </h3>
                            <p>
                                Is iOS 7 style switches for your checkboxes.
                            </p>
                            
                            <div class="form-horizontal m-t-md">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
                          		
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input id="lead_comment" type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
							</div>


                        </div>
                    </div>

                </div>
                <div class="col-lg-6">


                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Joint App Information <small>http://abpetkov.github.io/switchery/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Current Address Information
                            </h3>
                            <p>
                                Is iOS 7 style switches for your checkboxes.
                            </p>
                            
                            <div class="form-horizontal m-t-md">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
                          		
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Traffic Source:</label>
                                    <div class="col-sm-9">
                                        <input id="lead_comment" type="text" class="form-control" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
							</div>


                        </div>
                    </div>





                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Input Mask <small>http://jasny.github.io/bootstrap/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Input Mask
                            </h3>
                            <p>
                                Input masks allows a user to more easily enter data where you would like them to enter the data in a certain format.
                            </p>
                            <form class="form-horizontal m-t-md" action="#">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ISBN 1</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999-99-999-9999-9" placeholder="">
                                        <span class="help-block">999-99-999-9999-9</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ISBN 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999 99 999 9999 9" placeholder="">
                                        <span class="help-block">999 99 999 9999 9</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ISBN 3</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999/99/999/9999/9" placeholder="">
                                        <span class="help-block">999/99/999/9999/9</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">IPV4</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999.999.999.9999" placeholder="">
                                        <span class="help-block">192.168.100.200</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tax ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="99-9999999" placeholder="">
                                        <span class="help-block">99-9999999</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="">
                                        <span class="help-block">(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Currency</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="$ 999,999,999.99" placeholder="">
                                        <span class="help-block">$ 999,999,999.99</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="99/99/9999" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                </div>
            
            
            </div>











            <div class="row">

                <div class="col-lg-6">
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Data Picker <small>https://github.com/eternicode/bootstrap-datepicker</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Data picker
                            </h3>
                            <p>
                                Simple and easy select a time for a text input using your mouse.
                            </p>

                            <div class="form-group" id="data_1">
                                <label class="font-noraml">Simple data input format</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>

                            <div class="form-group" id="data_2">
                                <label class="font-noraml">One Year view</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="08/25/2014">
                                </div>
                            </div>

                            <div class="form-group" id="data_3">
                                <label class="font-noraml">Decade view</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="10/11/2013">
                                </div>
                            </div>

                            <div class="form-group" id="data_4">
                                <label class="font-noraml">Month select</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                </div>
                            </div>

                            <div class="form-group" id="data_5">
                                <label class="font-noraml">Range select</label>
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" name="start" value="05/14/2014"/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" name="end" value="05/22/2014" />
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Switcher <small>http://abpetkov.github.io/switchery/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Switcher
                            </h3>
                            <p>
                                Is iOS 7 style switches for your checkboxes.
                            </p>
                            <input type="checkbox" class="js-switch" checked />
                            <input type="checkbox" class="js-switch_2" checked />
                            <br/>
                            <br/>
                            <input type="checkbox" class="js-switch_3"  />
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Input Mask <small>http://jasny.github.io/bootstrap/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Input Mask
                            </h3>
                            <p>
                                Input masks allows a user to more easily enter data where you would like them to enter the data in a certain format.
                            </p>
                            <form class="form-horizontal m-t-md" action="#">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ISBN 1</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999-99-999-9999-9" placeholder="">
                                        <span class="help-block">999-99-999-9999-9</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ISBN 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999 99 999 9999 9" placeholder="">
                                        <span class="help-block">999 99 999 9999 9</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ISBN 3</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999/99/999/9999/9" placeholder="">
                                        <span class="help-block">999/99/999/9999/9</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">IPV4</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999.999.999.9999" placeholder="">
                                        <span class="help-block">192.168.100.200</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tax ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="99-9999999" placeholder="">
                                        <span class="help-block">99-9999999</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="">
                                        <span class="help-block">(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Currency</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="$ 999,999,999.99" placeholder="">
                                        <span class="help-block">$ 999,999,999.99</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="99/99/9999" placeholder="">
                                        <span class="help-block">dd/mm/yyyy</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                </div>
            
            
            </div>

                                </div>

                                <div id="tab-5" class="tab-pane">
                                    <strong>One morning, when Gregor Samsa.</strong>

                                    <p>Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. </p>
                                    <p>The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. </p>
                                </div>
                                
                                <div id="tab-6" class="tab-pane">


				<div class="col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Range Slider <small>https://github.com/IonDen/ion.rangeSlider</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Sliders
                            </h3>
                            <p>
                                Are perfect for range select option.
                            </p>
                            <div class="m-b-sm">
                                <small ><strong>Example of:</strong> Set diapason from 0 to 5000, Adding postfix "+" to max value, Set slider type to double, Dollar symbol as prefix, Enable grid  </small>
                            </div>
                            <div id="ionrange_1"></div>

                            <div class="m-b-sm m-t">
                                <small ><strong>Example of:</strong> Set diapason from 0 to 10, Set fractional step value: 0.1, Enable grid  </small>
                            </div>
                            <div id="ionrange_2"></div>

                            <div class="m-b-sm m-t">
                                <small ><strong>Example of:</strong> Set diapason from -50 to +50, Set FROM value to 0, Add degree symbol as postfix  </small>
                            </div>
                            <div id="ionrange_3"></div>

                            <div class="m-b-sm m-t">
                                <small ><strong>Example of:</strong>Change common slider numbers to custom (Month names). Using values array for that. Array can be any length, Slider will change min and max number automaticaly to fit values array length, Step parameter also will be changed to one, to allow to choose items in values array </small>
                            </div>
                            <div id="ionrange_4"></div>

                            <div>
                            <a class="btn btn-white pull-right btn-sm" href="https://github.com/IonDen/ion.rangeSlider" target="_blank">Read about API</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                                </div>
                                
                                <div id="tab-7" class="tab-pane">
                                
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Knob input <small>http://anthonyterrien.com/knob/</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <h3>
                            Knob - Dial
                        </h3>
                        <p>
                            Easily create knob input style.
                        </p>
                        <div class="text-center">
                            <small>Simple knob example</small><br/><br/>
                            <div class="m-r-md inline">
                            <input type="text" value="75" class="dial m-r-sm" data-fgColor="#1AB394" data-width="85" data-height="85" />
                            </div>
                            <div class="m-r-md inline">
                            <input type="text" value="25" class="dial m-r" data-fgColor="#1AB394" data-width="85" data-height="85"/>
                            </div>
                            <div class="m-r-md inline">
                            <input type="text" value="50" class="dial m-r" data-fgColor="#1AB394" data-width="85" data-height="85"/>
                            </div>
                        </div>
                        <div class="text-center">
                            <small>Dynamic knob example</small><br/><br/>
                            <div class="m-r-md inline">
                            <input type="text" value="75" class="dial m-r-sm" data-fgColor="#ED5565" data-width="85" data-height="85" data-cursor=true data-thickness=.3/>
                            </div>
                            <div class="m-r-md inline">
                            <input type="text" value="25" class="dial m-r" data-fgColor="#ED5565" data-width="85" data-height="85" data-step="1000" data-min="-15000" data-max="15000" data-displayPrevious=true/>
                            </div>
                            <div class="m-r-md inline">
                            <input type="text" value="60" class="dial m-r" data-fgColor="#ED5565" data-width="85" data-height="85" data-angleOffset=-125 data-angleArc=250 />
                            </div>
                        </div>
                    </div>
                </div>
                                
                                
                                </div>
                                
                            </div>

                        </div>

                    </div>

</div>












       
        <div class="wrapper wrapper-content animated fadeInRight">
        
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Credit Application ACTIONs </h5>
                        </div>
                        <div class="ibox-content">


<div class="row">
	<div class="col-lg-12">
    

                <div class="col-lg-12">
                
                <button type="button"class="btn btn-primary btn-lg">Request More Information</button>
                
                
                </div>

    
	</div>
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

    <!-- Change To This Page Before Live -->
	<script src="js/custom/page/custom.manager.creditapp.edit.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($find_dlr_creditapp);
?>

<?php require_once("db_loggedin.php"); ?>
<?php

$colname_find_fbuser = "-1";
if (isset($_GET['fbuser_id'])) {
  $colname_find_fbuser = $_GET['fbuser_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_fbuser =  "SELECT * FROM `idsids_idsdms`.`fbuserprofiles` WHERE `fbuserprofiles`.`fbuser_id` = '$colname_find_fbuse'";
$find_fbuser = mysqli_query($idsconnection_mysqli, $query_find_fbuser);
$row_find_fbuser = mysqli_fetch_assoc($find_fbuser);
$totalRows_find_fbuser = mysqli_num_rows($find_fbuser);

$fbuser_id = $row_find_fbuser['fbuser_id'];
$fbuser_primary_did = $row_find_fbuser['fbuser_primary_did'];

$fbuser_email_address = $row_find_fbuser['fbuser_email_address'];
$fbuser_fbemail = $row_find_fbuser['fbuser_fbemail'];



if($fbuser_primary_did != $did){
  header('Location: facebookusers.php');
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_fbdlr_leads = "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_leads`.`fbid` = '$fbuser_id' AND `cust_leads`.`cust_dealer_id` = '$did' ORDER BY cust_lead_created_at DESC";
$find_fbdlr_leads = mysqli_query($idsconnection_mysqli, $query_find_fbdlr_leads);
$row_find_fbdlr_leads = mysqli_fetch_assoc($find_fbdlr_leads);
$totalRows_find_fbdlr_leads = mysqli_num_rows($find_fbdlr_leads);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_fbdlr_creditapps = "SELECT `credit_app_fullblown_id`, `credit_app_locked`, `app_deal_number`, `app_deal_id`, `applicant_did`, `applicant_cell_phone`, `applicant_email_address`, `applicant_email_address2`, `co_applicants_email_address` FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `applicant_email_address` = '$fbuser_email_address' OR `applicant_email_address2` = '$fbuser_email_address' OR `applicant_email_address` = '$fbuser_fbemail' OR `applicant_email_address2` = '$fbuser_fbemail' AND `applicant_did` = '$did' ORDER BY `credit_app_fullblown_id` DESC";
$find_fbdlr_creditapps = mysqli_query($idsconnection_mysqli, $query_find_fbdlr_creditapps);
$row_find_fbdlr_creditapps = mysqli_fetch_assoc($find_fbdlr_creditapps);
$totalRows_find_fbdlr_creditapps = mysqli_num_rows($find_fbdlr_creditapps);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | FB Profile</title>

	<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>



            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Profile</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li>
                            <a href="facebookusers.php">Face Book Users</a>
                        </li>
                        <li class="active">
                            <strong>Profile</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $row_find_fbuser['applicant_name']; ?> Profile Detail</h5>
                        </div>
                        <div>
                            <div class="ibox-content border-left-right">
                                <img alt="image" class="img-responsive" src="<?php echo $row_find_fbuser['fbuser_fbpicture']; ?>?type=normal">
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong>
							<?php echo $row_find_fbuser['applicant_titlename']; ?>
                        	<?php 
							if(!$row_find_fbuser['applicant_name']){
								echo $row_find_fbuser['applicant_fname'].' '.$row_find_fbuser['applicant_lname'];
							}else{
								echo $row_find_fbuser['applicant_name'];
							}
							?>

                                </strong></h4>
                                <p>
                                 <?php echo $row_find_fbuser['fbsex']; ?>
                                </p>
                                <p>
	                                
                                    <a href="https://www.facebook.com/app_scoped_user_id/<?php echo $row_find_fbuser['fbuser_fbid']; ?>/" target="_blank"><i class="fa fa-facebook"></i> See My Facebook Profile</a>
                                </p>
                                
                                <p><i class="fa fa-map-marker"></i> Last time Online: <?php echo $row_find_fbuser['fb_onlinetime']; ?></p>
                                <h5>
                                    Online Session Details: 
                                </h5>
                                <p>
                                   <?php echo $row_find_fbuser['fbprofile_last_ip']; ?>
                                   <?php echo $row_find_fbuser['fbprofile_broswer']; ?> <?php echo $row_find_fbuser['fbprofile_mobile']; ?>
                                </p>

                                <h5>
                                    Sales Person: 
                                </h5>
                                <p>
                                    <?php echo $row_find_fbuser['sales_person_nametxt']; ?>
                                </p>

                                <h5>
                                    Email: 
                                </h5>
                                <p>
									<?php echo $row_find_fbuser['fbuser_email_address']; ?>
                                    <?php echo $row_find_fbuser['fbuser_fbemail']; ?>
                                </p>

                                <h5>
                                   FaceBook Status
                                </h5>
                                <p>
                                    <?php echo $row_find_fbuser['fbuser_status']; ?>
									<?php echo $row_find_fbuser['fbuser_verified']; ?>
                                </p>


                                <h5>
                                Telecommunications
                                </h5>
                                <p>
Mobile Phone: <?php if($row_find_fbuser['applicant_cell_phone']){ echo format_phone($row_find_fbuser['applicant_cell_phone']); }else{ 'Unlisted';} ?><br />
Home Phone: <?php if($row_find_fbuser['applicant_main_phone']){ echo format_phone($row_find_fbuser['applicant_main_phone']); }else{ echo 'Unlisted'; } ?>
                                    
                                </p>
                                <h5>
                                    Driver Licenses: 
                                </h5>
                                <p>
                       <?php echo $row_find_fbuser['applicant_driver_state_issued']; ?> 
					   <?php echo $row_find_fbuser['applicant_driver_licenses_number']; ?> 
					   <br />
					   <?php echo $row_find_fbuser['applicant_driver_licenses_status']; ?>
									
                                </p>
                                <p>
                                </p>
                                <p>
                                </p>
                                <p>
                                </p>

                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Email</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-bank"></i> Convert To Credit App</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                    </div>
                <div class="col-md-8">




                

                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md">
                            <h4>Pane Options</h4>
                            </div>
                            
                            <div class="panel-options">

                                <ul id="sales_desk_tabs" class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-4"><i class="fa fa-bank fa-3x"></i> Finance</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-car fa-3x"></i> Vehicle</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-6"><i class="fa fa-plug fa-3x"></i> Activity</a></li>
                                </ul>
                            
                            
                            </div>
                        
                        
                        
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-4" class="tab-pane active">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Face Book Application</h5>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">


                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Home Address:</strong>
                                        
                                        	<div class="well">
												<?php echo $row_find_fbuser['applicant_present_address1']; ?><br />
                                                <?php if($row_find_fbuser['applicant_present_address2']){ echo $row_find_fbuser['applicant_present_address2'].'<br />'; } ?>
                                                <?php echo $row_find_fbuser['applicant_present_addr_city']; ?> <?php echo $row_find_fbuser['applicant_present_addr_state']; ?> <?php echo $row_find_fbuser['applicant_present_addr_zip']; ?> <?php echo $row_find_fbuser['applicant_present_addr_county']; ?><br />
                                                Years: <u><?php echo $row_find_fbuser['applicant_addr_years']; ?></u>  | Months: <u><?php echo $row_find_fbuser['applicant_addr_months']; ?></u>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>


                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Address:</strong>
                                        
                                        	<div class="well">
												<?php echo $row_find_fbuser['applicant_present_address1']; ?>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>

                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Land Lord:</strong>
                                        
                                        	<div class="well">
											<?php echo $row_find_fbuser['applicant_addr_landlord_mortg']; ?>
											<?php echo $row_find_fbuser['applicant_addr_landlord_address']; ?><?php echo $row_find_fbuser['applicant_addr_landlord_city']; ?><?php echo $row_find_fbuser['applicant_addr_landlord_state']; ?><?php echo $row_find_fbuser['applicant_addr_landlord_zip']; ?><?php echo $row_find_fbuser['applicant_addr_landlord_phone']; ?>
                                            
                                            <?php echo $row_find_fbuser['applicant_name_oncurrent_lease']; ?>
                                            <?php echo $row_find_fbuser['applicant_apart_or_house']; ?> <?php echo $row_find_fbuser['applicant_buy_own_rent_other']; ?> <?php echo $row_find_fbuser['applicant_house_payment']; ?>
                                            </div>
                                            <div class="well">
												<?php echo $row_find_fbuser['user_comments_app_notes']; ?>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>


                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Previous Address 1:</strong>
                                        
                                        	<div class="well">
												<?php echo $row_find_fbuser['applicant_previous1_addr1']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous1_addr2']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_previous1_addr_city']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous1_addr_state']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous1_addr_zip']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_previous1_live_years']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous1_live_months']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_previous1_landlord_name']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous1_landlord_phone']; ?>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>

                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Previous Address 1:</strong>
                                        
                                        	<div class="well">
												<?php echo $row_find_fbuser['applicant_previous2_addr1']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous2_addr2']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_previous2_addr_city']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous2_addr_state']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous2_addr_zip']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_previous2_live_years']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous2_live_months']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_previous2_landlord_name']; ?>
                                                <?php echo $row_find_fbuser['applicant_previous2_landlord_phone']; ?>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>


                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Employer:</strong>
                                        
                                        	<div class="well">
												<?php echo $row_find_fbuser['applicant_employer1_name']; ?>
                                                <?php echo $row_find_fbuser['applicant_employer1_addr']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_employer1_city']; ?>
                                                <?php echo $row_find_fbuser['applicant_employer1_state']; ?>
                                                <?php echo $row_find_fbuser['applicant_employer1_zip']; ?>
                                                <?php echo $row_find_fbuser['applicant_employer1_phone']; ?> <?php echo $row_find_fbuser['applicant_employer1_phone_ext']; ?>
                                               <?php echo $row_find_fbuser['applicant_employer1_work_years']; ?>
                                                <?php echo $row_find_fbuser['applicant_employer1_work_months']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_employer1_position']; ?>
                                                <?php echo $row_find_fbuser['applicant_employer1_department']; ?>
												<?php echo $row_find_fbuser['applicant_employer1_supervisors_name']; ?>
												<?php echo $row_find_fbuser['applicant_employer1_supervisors_phone']; ?>
												<?php echo $row_find_fbuser['applicant_employer1_hours_shift']; ?>
												<?php echo $row_find_fbuser['applicant_employer1_salary_bringhome']; ?>
												<?php echo $row_find_fbuser['applicant_employer1_payday_freq']; ?>
												<?php echo $row_find_fbuser['applicant_employer_form_of_pymt']; ?>
												<?php echo $row_find_fbuser['applicant_other_income_amount']; ?>
												<?php echo $row_find_fbuser['applicant_other_income_source']; ?>
												<?php echo $row_find_fbuser['applicant_other_income_when_rcvd']; ?>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>

                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Address:</strong>
                                        
                                        	<div class="well">
											<?php echo $row_find_fbuser['applicant_if_education_school_sys']; ?>
                                            
                                            
                                            <?php echo $row_find_fbuser['user_applicant_employer_notes']; ?>
                                            
                                            
                                            </div>
                                        
                                        </div>
                                    
                                    </div>


                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Previous Employer:</strong>
                                        
                                        	<div class="well">
											
                                            <?php echo $row_find_fbuser['applicant_employer2_name']; ?>
                                            <?php echo $row_find_fbuser['applicant_employer2_addr']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_city']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_state']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_zip']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_phone']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_phone_ext']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_work_years']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_work_months']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_position']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_department']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_supervisors_name']; ?>
                                            <?php echo $row_find_fbuser['applicant_employer2_supervisors_phone']; ?>
                                            <?php echo $row_find_fbuser['applicant_employer2_hours_shift']; ?>
                                            <?php echo $row_find_fbuser['applicant_employer2_salary_bringhome']; ?>
                                            <?php echo $row_find_fbuser['applicant_employer2_payday_freq']; ?>
											<?php echo $row_find_fbuser['applicant_employer2_form_of_pymt']; ?>
                                            </div>
                                            
                                            
                                        
                                        </div>
                                    
                                    </div>

                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Co Applicant:</strong>
                                        
                                        	<div class="well">
												
                                                <?php echo $row_find_fbuser['co_applicant_name']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_fname']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_mname']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_lname']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_name_relationship']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_dob']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_age']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_ssn']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_ssn4']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_driver_licenses_no']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_driver_licenses_state']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_driver_licenses_status']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_home_phone']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_home_cell']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_email']; ?>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>


                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Co Applicant Address:</strong>
                                        
                                        	<div class="well">
												
                                                
                                                <?php echo $row_find_fbuser['co_applicant_present_addr1']; ?>
                                                
                                                <?php echo $row_find_fbuser['co_applicant_present_addr2']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_present_addr_city']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_present_addr_state']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_present_addr_zip']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_home_pymt']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_present_addr_county']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_present_addr_live_years']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_present_addr_live_months']; ?>
                                                
                                                
                                                
                                                
                                                
                                                
                                            </div>
                                        
                                        </div>
                                    
                                    </div>

                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Co Buyer Employer Information:</strong>
                                        
                                        	<div class="well">
												<?php echo $row_find_fbuser['co_applicant_employer_name']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_phone']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_phone_ext']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_addr']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_addr2']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_city']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_state']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_zip']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_department']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_postion']; ?>
                                        
                                        <?php echo $row_find_fbuser['co_applicant_employer_supervisor_name']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_supervisor_phone']; ?>
                                        
                                        <?php echo $row_find_fbuser['co_applicant_employer_work_months']; ?>
                                        
                                        <?php echo $row_find_fbuser['co_applicant_employer_work_years']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_employer_hours']; ?>
                                        
                                        <?php echo $row_find_fbuser['co_applicant_employer_shift']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_income_source']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_other_income']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_income_bringhome']; ?>
                                        <?php echo $row_find_fbuser['co_applicant_payday_frequency']; ?>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>


                                    <div class="feed-element">
                                    
                                        <div class="media-body ">
                                            <strong>Disclosure / Closure</strong>
                                        
                                        	<div class="well">
												
                                                <?php echo $row_find_fbuser['applicants_bank_name']; ?>
                                                <?php echo $row_find_fbuser['applicants_checking_savings_acct#']; ?>
                                                <?php echo $row_find_fbuser['applicant_initials_disclosure1']; ?>
                                                <?php echo $row_find_fbuser['undersigned_authorization']; ?>
                                                <?php echo $row_find_fbuser['federal_equal_act']; ?>
												<?php echo $row_find_fbuser['applicant_initials_disclosure2']; ?>
                                                <?php echo $row_find_fbuser['information_true_statement']; ?>
                                                <?php echo $row_find_fbuser['applicant_signature']; ?>
                                                <?php echo $row_find_fbuser['co_applicant_signature']; ?>
                                                <?php echo $row_find_fbuser['salesperson_witness_signature']; ?>
                                                <?php echo $row_find_fbuser['applicant_signed_input_date']; ?>
                                                <?php echo $row_find_fbuser['application_created_date']; ?>
                                                
                                                <?php echo $row_find_fbuser['co_applicants_email_address']; ?>
                                                <?php echo $row_find_fbuser['applicant_have_a_computer']; ?>
                                                <?php echo $row_find_fbuser['applicant_level_of_cpu_experience']; ?>
                                                <?php echo $row_find_fbuser['applicant_acknowledge_equal_opportunity']; ?>
												<?php echo $row_find_fbuser['applicant_hereby_authorize']; ?>
                                                <?php echo $row_find_fbuser['equal_credit_opportunity_act']; ?>
                                                <?php echo $row_find_fbuser['applicant_authorization']; ?>
												<?php echo $row_find_fbuser['applicant_authorization_text']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_digital_signature']; ?>
                                                
                                                <?php echo $row_find_fbuser['applicant_digital_signature_date']; ?>
                                                <?php echo $row_find_fbuser['coapplicant_digital_signature']; ?>
                                                <?php echo $row_find_fbuser['coapplicant_digital_signature_date']; ?>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>





                                </div>

                                <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Convert To Credit Application.</button>

                            </div>

                        </div>
                    </div>


                                </div>

                                <div id="tab-5" class="tab-pane">

                    				<h2>Vehicle</h2>

<div class="col-md-9">
                                    <div class="row show-grid">
                                        <div class="col-md-6">
                                            Image
                                            
                                            <img src="<?php echo $vthubmnail_file_path; ?>">
                                            
                                            
                                        </div>
                                        <div class="col-md-6">
Record ID: <?php echo $vid;?><br>
Condition: <?php echo $vcondition; ?><br>
Description: <?php echo $vyear; ?> <?php echo $vmake; ?> <?php echo $vmodel; ?> <?php echo $vtrim ; ?><br>

Status: <?php echo $vlivestatus; ?><br>

Stock No: <?php echo $vstockno; ?><br>


<br>
VIN: <?php echo $vvin; ?><br>




Mileage: <?php echo $vmileage; ?><br>

Retail Price: <?php echo $vrprice; ?><br>

Down Payment: <?php echo $vdprice; ?><br>

                                        </div>
                                    </div>
                                </div>

                                    


<br>



                                    
                                    
                                    
                                    
                                    

                                    
                                </div>


                                <div id="tab-6" class="tab-pane">

                    				<h2>Activity</h2>                    				

<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Activity By This User </h5>
                        </div>
                        <div class="ibox-content">

						  <div class="row">
                           <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                                </thead>
                                <tbody>
<?php do { ?>
                                <tr>
                                    <td><?php echo $row_find_fbdlr_leads['cust_leadid']; ?></td>
                                    <td><?php echo $row_find_fbdlr_leads['cust_lead_created_at']; ?></td>
                                    <td><?php echo $row_find_fbdlr_leads['cust_lead_created_at']; ?></td>
                                    <td><?php echo $row_find_fbdlr_leads['cust_lead_created_at']; ?></td>
                                </tr>

  <?php } while ($row_find_fbdlr_leads = mysqli_fetch_assoc($find_fbdlr_leads)); ?>
                                </tbody>
                            </table>
						   </div>
                          </div>
                                
                                <div class="hr-line-dashed"></div>

						  <div class="row">
                           <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>App ID</th>
                                    <th>Email 1</th>
                                    <th>Email 2</th>
                                    <th>Co App</th>
                                    <th>Created At</th>

                                </tr>
                                </thead>
                                <tbody>

<?php do { ?>






                                <tr>
                                    <td><?php echo $row_find_fbdlr_creditapps['credit_app_fullblown_id']; ?></td>
                                    <td><?php echo $row_find_fbdlr_creditapps['applicant_email_address']; ?></td>
                                    <td> <?php echo $row_find_fbdlr_creditapps['applicant_email_address2']; ?></td>
                                    <td><?php echo $row_find_fbdlr_creditapps['co_applicants_email_address']; ?></td>
                                    <td><?php echo $row_find_fbdlr_leads['cust_lead_created_at']; ?></td>
                                </tr>

  <?php } while ($row_find_fbdlr_creditapps = mysqli_fetch_assoc($find_fbdlr_creditapps)); ?>
                                </tbody>
                            </table>
						   </div>
                          </div>
                          
                          
                          
                        </div>
                    </div>
                </div>
                                    
                                </div>
                                
                            </div>

                        </div>

                    </div>






                
                

                







                
                
                
                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>

        </div>
        </div>


    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($find_fbuser);

mysqli_free_result($find_fbdlr_leads);

mysqli_free_result($find_fbdlr_creditapps);
?>

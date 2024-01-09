


<div id="current_address_section" class="row">

            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Co-Applicant Personal Information</h5>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Full Name: <?php echo $row_find_dlr_creditapp2['applicant_titlename']; ?> <?php echo $row_find_dlr_creditapp2['applicant_name']; ?></strong><br>
                            <strong>First Name:</strong> <?php echo $row_find_dlr_creditapp2['applicant_fname']; ?><br>
                            <strong>Last Name:</strong> <?php echo $row_find_dlr_creditapp2['applicant_lname']; ?> <?php echo $row_find_dlr_creditapp2['applicant_suffixname']; ?><br>
                            <abbr title="Phone"><strong>Cell: </strong></abbr> <?php echo $row_find_dlr_creditapp2['applicant_cell_phone']; ?><br>
                            <abbr title="Phone"><strong>Home: </strong></abbr> <?php if(!$row_find_dlr_creditapp2['applicant_main_phone']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp2['applicant_main_phone']; } ?><br>
                            <abbr title="Phone"><strong>Work: </strong></abbr> <?php if(!$row_find_dlr_creditapp2['applicant_employer1_phone']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp2['applicant_employer1_phone']; } ?><br>

                        </span></address>


                        <address>                                                        
                            <strong>Appointment Time: </strong> <?php if(!$row_find_dlr_creditapp2['applicant_driver_licenses_status']){ echo 'Unknown'; }else{ echo $row_find_dlr_creditapp2['applicant_appt_startunixtime'];} ?><br />
						</address>
                        
                        
                        <address>                                                        
                            <strong>DL Status: </strong> <?php if(!$row_find_dlr_creditapp2['applicant_driver_licenses_status']){ echo 'Unknown'; }else{ echo $row_find_dlr_creditapp2['applicant_driver_licenses_status'];} ?><br />
                            <strong>DL Number:</strong> <?php if(!$row_find_dlr_creditapp2['applicant_driver_licenses_number']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp2['applicant_driver_licenses_number']; } ?><br />
                            <strong>DL State:</strong> <?php if(!$row_find_dlr_creditapp2['applicant_driver_state_issued']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp2['applicant_driver_state_issued']; } ?><br />
                            <strong>DL Expire Date:</strong> <?php if(!$row_find_dlr_creditapp2['applicant_driver_licenses_expdate']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp2['applicant_driver_licenses_expdate']; } ?><br />
                            
                            
                        </address>
                        
                        <address>                                                        
                            <strong>Social:</strong> <?php if(!$row_find_dlr_creditapp2['applicant_ssn']){ echo 'Missing'; }else{ echo 'xxx-xx-xxxx';} ?><br />
                            <strong>DOB:</strong> <?php if(!$row_find_dlr_creditapp2['applicant_dob']){ echo 'Missing'; }else{ echo $row_find_dlr_creditapp2['applicant_dob']; } ?><br />
                            
                            
                        </address>

                        <address>
                            <strong>Other Name:</strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_other_name']; ?></a>
                        </address>

                        <address>
                            <strong>Email 1:</strong><br>
                            <a href="mailto:<?php echo $row_find_dlr_creditapp2['applicant_email_address']; ?>"><?php echo $row_find_dlr_creditapp2['applicant_email_address']; ?></a>
                        </address>

                        <address>
                            <strong>Email 2:</strong><br>
                            <a href="mailto:<?php echo $row_find_dlr_creditapp2['applicant_email_address2']; ?>"><?php echo $row_find_dlr_creditapp2['applicant_email_address2']; ?></a>
                        </address>



                        <address>
                        	<strong>Source:</strong> <?php echo $row_find_dlr_creditapp2['credit_app_source']; ?><br />
                        </address>
                        
                        <address>
                        	<strong>Captured On:</strong> <?php echo $row_find_dlr_creditapp2['application_created_date']; ?><br />
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
                            <strong>Address1: </strong> <?php echo $row_find_dlr_creditapp2['applicant_present_address1']; ?><br>
                            <strong>Address2: </strong> <?php echo $row_find_dlr_creditapp2['applicant_present_address2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp2['applicant_present_addr_city']; ?>, <?php echo $row_find_dlr_creditapp2['applicant_present_addr_state']; ?> <?php echo $row_find_dlr_creditapp2['applicant_present_addr_zip']; ?><br>
                            <abbr title="Phone"><strong>County:</strong> </abbr> <?php echo $row_find_dlr_creditapp2['applicant_present_addr_county']; ?>

                        </address>

                        <address>
                            <strong>Land Lord Or Mortage Co.</strong><br>
                           <strong> Name:</strong> <a> <strong><?php echo $row_find_dlr_creditapp2['applicant_previous1_landlord_name']; ?></strong></a><br />
                            <strong>Phone:</strong> <a href="tel: <?php echo $row_find_dlr_creditapp2['applicant_addr_landlord_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp2['applicant_addr_landlord_phone']; ?></strong></a><br />
                        </address>



                        <address>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp2['applicant_addr_landlord_address']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp2['applicant_addr_landlord_city']; ?>, <?php echo $row_find_dlr_creditapp2['applicant_addr_landlord_state']; ?> <?php echo $row_find_dlr_creditapp2['applicant_addr_landlord_zip']; ?><br>
                        </address>

                        <address>
                            <strong>Live Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_addr_years']; ?></a>
                        </address>

                        <address>
                            <strong>Live Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_addr_months']; ?></a>
                        </address>


                        <address>
                        	<strong>House Payment:</strong> $<?php echo $row_find_dlr_creditapp2['applicant_house_payment']; ?>
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
							<?php if($row_find_dlr_creditapp2['applicant_vid']): ?>                        	
                            <li class="list-group-item">
                            	<span class="badge badge-primary"></span>
                                
                                <img src="<?php echo showvtumbnail($row_find_dlr_creditapp2['applicant_vid']); ?>" width="120px"  />
                                
                                
                            </li>
                            <?php endif; ?>

                            <li class="list-group-item">
                                <span class="badge badge-primary"><?php echo $row_find_dlr_creditapp2['applicant_sid_name']; ?></span>
                               First Sales Person:
                            </li>

                            <li class="list-group-item">
                                <span class="badge badge-primary"><?php echo $row_find_dlr_creditapp2['applicant_sid2_name']; ?></span>
                               Second Sales Person:
                            </li>

                            <li class="list-group-item">
                                <span class="badge badge-primary"><?php echo $row_find_dlr_creditapp2['applicant_addr_years']; ?></span>
                               Year At This Address
                            </li>
                            <li class="list-group-item ">
                                <span class="badge badge-info"><?php echo $row_find_dlr_creditapp2['applicant_addr_months']; ?></span>
                               Months At This Address
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-danger"><?php echo $row_find_dlr_creditapp2['applicant_apart_or_house']; ?></span>
                               Apartment Or House
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-success"><?php echo $row_find_dlr_creditapp2['applicant_buy_own_rent_other']; ?></span>
                                Buy Own Rent
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-warning"><?php echo $row_find_dlr_creditapp2['applicant_residence_changes']; ?></span>
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
                            <strong>Name: </strong> <?php echo $row_find_dlr_creditapp2['applicant_employer1_name']; ?><br>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp2['applicant_employer1_addr']; ?><br>
                            <strong>Address 2: </strong> <?php echo $row_find_dlr_creditapp2['applicant_employer1_addr2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp2['applicant_employer1_city']; ?>, <?php echo $row_find_dlr_creditapp2['applicant_employer1_state']; ?> <?php echo $row_find_dlr_creditapp2['applicant_employer1_zip']; ?><br>
                        </address>


                        <address>
                            <strong>Phone:</strong> <a href="tel: <?php echo $row_find_dlr_creditapp2['applicant_employer1_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp2['applicant_employer1_phone']; ?> <?php echo $row_find_dlr_creditapp2['applicant_employer1_phone_ext']; ?></strong></a><br />
                        </address>




                        <address>
                            <strong>Work Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_employer1_work_years']; ?></a>
                        </address>

                        <address>
                            <strong>Work Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_employer1_work_months']; ?></a>
                        </address>

                        <address>
                            <strong>User Comments About Emloyer: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['user_applicant_employer_notes']; ?></a>
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
                            <strong>Name: </strong> <?php echo $row_find_dlr_creditapp2['applicant_employer2_name']; ?><br>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp2['applicant_employer2_addr']; ?><br>
                            <strong>Address 2: </strong> <?php echo $row_find_dlr_creditapp2['applicant_employer2_addr2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp2['applicant_employer2_city']; ?>, <?php echo $row_find_dlr_creditapp2['applicant_employer2_state']; ?> <?php echo $row_find_dlr_creditapp2['applicant_employer2_zip']; ?><br>
                        </address>


                        <address>
                            <strong>Phone:</strong> <a href="tel: <?php echo $row_find_dlr_creditapp2['applicant_employer2_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp2['applicant_employer2_phone']; ?> <?php echo $row_find_dlr_creditapp2['applicant_employer2_phone_ext']; ?></strong></a><br />
                        </address>




                        <address>
                            <strong>Work Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_employer2_work_years']; ?></a>
                        </address>

                        <address>
                            <strong>Work Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_employer2_work_months']; ?></a>
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
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp2['applicant_previous1_addr1']; ?><br>
                            <strong>Address 2: </strong> <?php echo $row_find_dlr_creditapp2['applicant_previous1_addr2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp2['applicant_previous1_addr_city']; ?>, <?php echo $row_find_dlr_creditapp2['applicant_previous1_addr_state']; ?> <?php echo $row_find_dlr_creditapp2['applicant_previous1_addr_zip']; ?><br>
                        </address>


                        <address>
                            <strong>Land Lord Or Mortage Co.</strong><br>
                           <strong> Name: </strong> <strong><?php echo $row_find_dlr_creditapp2['applicant_previous1_landlord_name']; ?></strong><br />
                            <strong>Phone:</strong> <a href="tel: <?php echo $row_find_dlr_creditapp2['applicant_addr_landlord_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp2['applicant_addr_landlord_phone']; ?></strong></a><br />
                        </address>




                        <address>
                            <strong>Live Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_previous1_live_years']; ?></a>
                        </address>

                        <address>
                            <strong>Live Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_previous1_live_months']; ?></a>
                        </address>


                        <address>
                            <strong>User Comments About Previous Address: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['user_comments_previousaddr_notes']; ?></a>
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
                        <address>
                            <strong>Address 1: </strong> <?php echo $row_find_dlr_creditapp2['applicant_previous2_addr1']; ?><br>
                            <strong>Address 2: </strong> <?php echo $row_find_dlr_creditapp2['applicant_previous2_addr2']; ?><br>
                            <strong>City, State Zip: </strong> <?php echo $row_find_dlr_creditapp2['applicant_previous2_addr_city']; ?>, <?php echo $row_find_dlr_creditapp2['applicant_previous2_addr_state']; ?> <?php echo $row_find_dlr_creditapp2['applicant_previous2_addr_zip']; ?><br>
                        </address>


                        <address>
                            <strong>LandLord Or Mortgage Co:</strong><br>
                            <strong>Name: </strong> <?php echo $row_find_dlr_creditapp2['applicant_previous2_landlord_name']; ?><br />
                            Phone: <a href="tel: <?php echo $row_find_dlr_creditapp2['applicant_previous2_landlord_phone']; ?>"> <strong><?php echo $row_find_dlr_creditapp2['applicant_previous2_landlord_phone']; ?></strong></a><br />
                        </address>


                        <address>
                            <strong>Live Years: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_previous2_live_years']; ?></a>
                        </address>

                        <address>
                            <strong>Live Months: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_previous2_live_months']; ?></a>
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
                            <strong>Vehicle Purchase VIN: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_vin']; ?><br>
                            <strong>Vehicle Purchase Stock No: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_stockno']; ?><br>
                            <strong>Vehicle Purchase Year: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_year']; ?><br>
                            <strong>Vehicle Purchase Make: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_make']; ?><br>
                            <strong>Vehicle Purchase Model: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_model']; ?><br>
                            <strong>Vehicle Purchase Style: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_style']; ?><br>

                            <strong>Vehicle Purchase: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_ymkmd_txt']; ?><br>
                        </address>


                        <address>
                            <strong>Asset Type: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_asset_type']; ?><br>
                            <strong>Intended Use: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_intendeduse']; ?><br>
                            <strong>Vehicle Purchase Condition: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_neworused']; ?><br>
                            <strong>Vehicle Purchase Miles: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_inception_miles']; ?><br>
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
                            <strong>Trade Year: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_trade_year']; ?><br>
                            <strong>Trade Make: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_trade_make']; ?><br>
                            <strong>Trade Model: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_trade_model']; ?><br>
                            <strong>Trade VIN: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_trade_vin']; ?><br>
                            <strong>Trade Lien Holder: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_trade_lien_holder_name']; ?><br>
                        </address>

                        <address>
                            <strong>Last Vehicle Purchase: </strong> <?php echo $row_find_dlr_creditapp2['applicant_last_vehicle_purchased']; ?><br>
                            <strong>Open To Refinancing: </strong> <?php echo $row_find_dlr_creditapp2['applicant_open_to_refinanceautoloan']; ?><br>
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
                            <strong>Financing Amount: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_financed_amount']; ?><br>
                            <strong>Finance Rate: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_cust_rate']; ?><br>
                            <strong>Finance Months: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_term_months']; ?><br>
                            <strong>Monthly Payments: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_total_monthpmts_est']; ?><br>
                            <strong>MSRP: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_msrp']; ?><br>
                            <strong>Invoice/Wholesale: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_wholesale_invoice']; ?>

                        </address>

                        <address>
                            <strong>Gap: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_gap']; ?><br>
                            <strong>Service Contract: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_srvc_contract']; ?><br>
                            <strong>Credit Life: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_credit_life']; ?><br>
                            <strong>Disability: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_disability']; ?><br>
                            <strong>Insurance Service: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_other_ins_svc']; ?><br>
                            <strong>Invoice/Wholesale: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_wholesale_invoice']; ?>

                        </address>

                        <address>
                            <strong>Trade Notes: </strong> <?php echo $row_find_dlr_creditapp2['user_comments_trade_notes']; ?><br>
                            <strong>Service Contract: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_srvc_contract']; ?><br>

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
                            <strong>Perferred Bureau: </strong> <?php echo $row_find_dlr_creditapp2['applilcant_v_creditbureau_preferred']; ?><br>
                            <strong>Name Of Bank: </strong> <?php echo $row_find_dlr_creditapp2['applicants_bank_name']; ?><br>
                            <strong>Checking Or Savings: </strong> <?php echo $row_find_dlr_creditapp2['applicants_checking_savings_type']; ?><br>
                            <strong>Checking Or Savings Acct #: </strong> <?php echo $row_find_dlr_creditapp2['applicants_checking_savings_acct#']; ?><br>
                        </address>


                        <address>
                            <strong>Name Of Bank: </strong> <?php echo $row_find_dlr_creditapp2['applicant_creditreference1']; ?><br>
                            <strong>Name Of Bank: </strong> <?php echo $row_find_dlr_creditapp2['applicant_creditreference1bal']; ?><br>
                            <strong>Name Of Bank: </strong> <?php echo $row_find_dlr_creditapp2['applicant_creditreference1monpay']; ?><br>

                        </address>

                        <address>
                            <strong>Credit Reference 2: </strong> <?php echo $row_find_dlr_creditapp2['applicant_creditreference2']; ?><br>                            <strong>Creditreference 2 Balance: </strong> <?php echo $row_find_dlr_creditapp2['applicant_creditreference2bal']; ?><br>
                            <strong>Creditreference 2 Payment: </strong> <?php echo $row_find_dlr_creditapp2['applicant_creditreference2monpay']; ?><br>

                        </address>

                        <address>
                            <strong>Open Auto Loan: </strong> <?php echo $row_find_dlr_creditapp2['applicant_open_autoloan']; ?><br>
                            <strong>Open Auto Loan Company Name: </strong> <?php echo $row_find_dlr_creditapp2['applicant_open_autoloan_cname']; ?><br>
                            <strong>Open Auto Loan Acctno: </strong> <?php echo $row_find_dlr_creditapp2['applicant_open_autoloan_acctno']; ?><br>
                            <strong>Open Auto Loan Present Balance: </strong> <?php echo $row_find_dlr_creditapp2['applicant_open_autoloan_presntbal']; ?><br>
                            <strong>Open Loan Payment: </strong> <?php echo $row_find_dlr_creditapp2['applicant_open_autoloan_pymt']; ?><br>
                            <strong>Payment History: </strong> <?php echo $row_find_dlr_creditapp2['applicant_open_autoloan_pymthistry']; ?><br>



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
                            <strong>Herby Authorize: </strong> <?php echo $row_find_dlr_creditapp2['applicant_hereby_authorize']; ?><br>
                            <strong>Intials Disclosure: </strong> <?php echo $row_find_dlr_creditapp2['applicant_initials_disclosure1']; ?><br>
                            <strong>Applicant Acknowledge Equal Opportunity: </strong> <?php echo $row_find_dlr_creditapp2['applicant_acknowledge_equal_opportunity']; ?><br>
                            <strong>Applicant Signature: </strong> <?php echo $row_find_dlr_creditapp2['applicant_signature']; ?><br>
                        </address>





                        <address>
                            <strong>Under Signed Authorization: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['undersigned_authorization']; ?></a>
                        </address>

                        <address>
                            <strong>Digital Signature: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_digital_signature']; ?></a>
                        </address>

                        <address>
                            <strong>Digital Signature: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['applicant_authorization_text']; ?></a>
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
                            <strong>Co Applicants Email Address: </strong> <?php echo $row_find_dlr_creditapp2['co_applicants_email_address']; ?><br>
                            <strong>Co Applicant Herby Authorize: </strong> <?php echo $row_find_dlr_creditapp2['co_applicant_hereby_authorize']; ?><br>
                        </address>





                        <address>
                            <strong>Co Applicant Equal Credit Opportunity Act: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['co_equal_credit_opportunity_act']; ?></a>
                        </address>

                        <address>
                            <strong>Co Applicant Digital Signature: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['co_applicant_signature']; ?></a>
                        </address>

                        <address>
                            <strong>Co Applicant Digital Signature: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['coapplicant_digital_signature']; ?></a>
                        </address>


                        <address>
                            <strong>Digital Signature Date: </strong><br>
                            <a><?php echo $row_find_dlr_creditapp2['coapplicant_digital_signature_date']; ?></a>
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
                            <strong>Realative 1 First Name: </strong> <?php echo $row_find_dlr_creditapp2['applicants_realative1_fname']; ?><br>
                            <strong>Realative 1 Last Name: </strong> <?php echo $row_find_dlr_creditapp2['applicants_realative1_lname']; ?><br>
                            <strong>Realative 1 Relationship: </strong> <?php echo $row_find_dlr_creditapp2['applicants_realative1_relationship']; ?><br>
                            <strong>Realative 1 Phone:</strong> <?php echo $row_find_dlr_creditapp2['applicants_realative1_mainphone']; ?><br>
                            <strong>Realative 1 Address:</strong> <?php echo $row_find_dlr_creditapp2['applicants_realative1_address']; ?> <br />
                            <strong>Realative 1 City, State Zip: </strong><?php echo $row_find_dlr_creditapp2['applicants_realative1_address_city']; ?>, <?php echo $row_find_dlr_creditapp2['applicants_realative1_address_state']; ?> <?php echo $row_find_dlr_creditapp2['applicants_realative1_address_zip']; ?><br />
                        </address>

                        <address>
                            <strong>Realative 2 First Name: </strong> <?php echo $row_find_dlr_creditapp2['applicants_realative2_fname']; ?><br>
                            <strong>Realative 2 Last Name: </strong> <?php echo $row_find_dlr_creditapp2['applicants_realative2_lname']; ?><br>
                            <strong>Realative 2 Relationship: </strong> <?php echo $row_find_dlr_creditapp2['applicants_realative2_relationship']; ?><br>
                            <strong>Realative 2 Phone:</strong> <?php echo $row_find_dlr_creditapp2['applicants_realative2_mainphone']; ?><br>
                            <strong>Realative 2 Address:</strong> <?php echo $row_find_dlr_creditapp2['applicants_realative2_address']; ?> <br />
                            <strong>Realative 2 City, State Zip: </strong><?php echo $row_find_dlr_creditapp2['applicants_realative2_city']; ?>, <?php echo $row_find_dlr_creditapp2['applicants_realative2_state']; ?> <?php echo $row_find_dlr_creditapp2['applicants_realative2_zip']; ?><br />
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
                            <strong>Father Name: </strong> <?php echo $row_find_dlr_creditapp2['applicants_father_name']; ?><br>
                            <strong>Father Deceased: </strong> <?php echo $row_find_dlr_creditapp2['applicants_father_deceased']; ?><br>
                            <strong>Father Main Phone: </strong> <?php echo $row_find_dlr_creditapp2['applicants_father_mainphone_number']; ?><br>
                            <strong>Father Address:</strong> <?php echo $row_find_dlr_creditapp2['applicants_father_address']; ?><br>
                        </address>

                        <address>
                            <strong>Mother Name: </strong> <?php echo $row_find_dlr_creditapp2['applicants_mother_name']; ?><br>
                            <strong>Mother Deceased: </strong> <?php echo $row_find_dlr_creditapp2['applicants_mother_deceased']; ?><br>
                            <strong>Mother Main Phone: </strong> <?php echo $row_find_dlr_creditapp2['applicants_mother_mainphone_number']; ?><br>
                            <strong>Mother Address:</strong> <?php echo $row_find_dlr_creditapp2['applicants_mother_address']; ?><br>
                        </address>



 
                    </div>

                </div>
            
            
            </div>

</div>



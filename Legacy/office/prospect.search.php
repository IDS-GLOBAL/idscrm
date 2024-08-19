<?php require_once('db_admin.php'); ?>
<?php




//echo 'P';
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pullactvDudes = "SELECT * FROM dudes WHERE dudes_status = 1 ORDER BY dudes_lname ASC";
$pullactvDudes = mysqli_query($idsconnection_mysqli, $query_pullactvDudes);
$row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
$totalRows_pullactvDudes = mysqli_num_rows($pullactvDudes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_activsystem_templates = "SELECT * FROM `dudes_sys_htmlemail_templates` WHERE `email_systm_templates_status` = '1' ORDER BY `email_systm_templates_subject` ASC";
$find_activsystem_templates = mysqli_query($idsconnection_mysqli, $query_find_activsystem_templates);
$row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
$totalRows_find_activsystem_templates = mysqli_num_rows($find_activsystem_templates);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_dlrtypes = "SELECT * FROM dealer_types ORDER BY dtype_id ASC";
$qry_dlrtypes = mysqli_query($idsconnection_mysqli, $query_qry_dlrtypes);
$row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes);
$totalRows_qry_dlrtypes = mysqli_num_rows($qry_dlrtypes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_array($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_timezones = "SELECT * FROM `calendar|timezones` ORDER BY TimeZone ASC";
$dlr_timezones = mysqli_query($idsconnection_mysqli, $query_dlr_timezones);
$row_dlr_timezones = mysqli_fetch_array($dlr_timezones);
$totalRows_dlr_timezones = mysqli_num_rows($dlr_timezones);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mobile_carriers = "SELECT * FROM mobile_carriers ORDER BY carrier_label ASC";
$mobile_carriers = mysqli_query($idsconnection_mysqli, $query_mobile_carriers);
$row_mobile_carriers = mysqli_fetch_array($mobile_carriers);
$totalRows_mobile_carriers = mysqli_num_rows($mobile_carriers);




?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>

</head>

<body>
<?php include("analyticstracking.php"); ?>
    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Search Or Create New Prospect</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">New Prospect</a>
<input id="howmanyresults" type="hidden" value="" />
<input id="howmanydefinets" type="hidden" value="" />
<input id="madeprospect_id" type="hidden" value="" />
                        
                        
                        
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->




<div class="modal inmodal" id="emailProspectDlrModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-clock-o modal-icon"></i>
                                            <h4 class="modal-title">Email This Prospect</h4>
                                            <small>Select A Template And Email It To This Lead</small>
                                        </div>
                                        <div class="modal-body">




    <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">To:</label>
                                                    <div class="col-sm-10">
                                                    <input id="email_to" type="text" class="form-control" value="">
                                                    </div>
                                            </div>
                                            
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">From:</label>
                                                    <div class="col-sm-10">
                                                    <input id="email_from" type="text" class="form-control" value="<?php echo $row_userDudes['dudes_email_internal']; ?>" disabled="disabled">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Templates:</label>
                                                    <div class="col-sm-10">
                                                        <select id="email_template" name="email_template" class="form-control">
                                                        <option value="">Select</option>
                                                        <?php
                                                            do {  
                                                            ?>
                                                                                                                <option value="<?php echo $row_find_activsystem_templates['id']?>"><?php echo $row_find_activsystem_templates['email_systm_templates_subject']?></option>
                                                                                                                <?php
                                                            } while ($row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates));
                                                            $rows = mysqli_num_rows($find_activsystem_templates);
                                                            if($rows > 0) {
                                                                mysqli_data_seek($find_activsystem_templates, 0);
                                                                $row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                            </div>




                        <div class="mail-text">

                            <div id="email_systm_templates_body" class="summernote">
                                <p id="removeme"></p>

                            </div>

                            <div class="clearfix"></div>

                        </div>

                        <div class="clearfix"></div>











                                                
                                                
                                            </div>


                                            
                                            
                                                    
                                                    
                                                    
                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                <button id="sendthis_prospectanemail" data-dismiss="modal" type="button" class="btn btn-primary">Send Email</button>
                                            </div>
                                        </div>
                                    </div>
    </div>





            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter Prospect Information here <small>Searching For Prospects</small></h5>
                    </div>
                    <div id="prospect_enter_search" class="ibox-content">



<div class="form-horizontal">
                            
                            



                                
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Enter Company Name?</label>

                                    <div class="col-sm-10"><input id="company" type="text" class="form-control" value=""></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Select Continent?</label>

                                    <div class="col-sm-10">
                                    <select id="continent" class="form-control m-b">
                                        <option value="">Select Continent</option>
                                        <option value="NA" selected="selected">North America</option>
                                        <option value="SA">South America</option>
                                        <option value="AF">Africa</option>
                                        <option value="NOT">Not Listed</option>
                                        
                                    </select>




                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Select Country?</label>

                                    <div class="col-sm-10">
                                    <select id="country" class="form-control m-b">
                                        <option value="">Select Country</option>
                                        <option value="USA" selected="selected">USA</option>
                                        <option value="Africa">Africa</option>
                                        <option value="Africa">Mexico</option>
                                        <option value="NOT">Not Listed</option>
                                        
                                    </select>




                                    </div>
                                </div>
                                
                                

                                <div class="hr-line-dashed"></div>



                                

                                <div class="form-group"><label class="col-sm-2 control-label">Select USA State?</label>

                                    <div class="col-sm-10">

                                        <select id="state" class="form-control m-b">
                                        <option value="">Select State</option>
                                        <?php do {  ?>
                                            <option value="<?php echo $row_states['state_abrv']; ?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDudes['dudes_home_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']; ?></option>
                                            <?php } while ($row_states = mysqli_fetch_array($states));
                                            $rows = mysqli_num_rows($states);
                                            if($rows > 0) {
                                                mysqli_data_seek($states, 0);
                                                $row_states = mysqli_fetch_array($states);
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                            <div id="contact_add_box" style="display:none;">

                                                        
                                                            <div class="form-group"><label for="company_legalname" class="col-sm-2 control-label">Company Legal Name:</label>

                                                                <div class="col-sm-10"><input id="company_legalname" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>


                                                            <div class="form-group"><label class="col-sm-2 control-label">Primary Business Model:</label>

                                                                <div class="col-sm-10">
                                                                    <select id="dealer_type_id" class="form-control">
                                                                    <option value="">Select Dealer Type</option>
                                                                    <?php
                                                                        do {  
                                                                        ?>
                                                                        <option value="<?php echo $row_qry_dlrtypes['dtype_id']?>"><?php echo $row_qry_dlrtypes['dtype_label']?></option>
                                                                            <?php
                                                                        } while ($row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes));
                                                                        $rows = mysqli_num_rows($qry_dlrtypes);
                                                                        if($rows > 0) {
                                                                            mysqli_data_seek($qry_dlrtypes, 0);
                                                                            $row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes);
                                                                        }
                                                                    ?>
                                                                    </select>
                                                                <span class="help-block m-b-none">Best description of their finance model.</span>
                                                            </div>
                                                            </div>
                                                            <div class="hr-line-dashed"></div>









                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Company Main Phone Number#:</label>

                                                                <div class="col-sm-10"><input id="phone" type="text" class="form-control" value="" data-mask="(999)999-9999"></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>

                                                        
                                                        
                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Company Fax:</label>

                                                                <div class="col-sm-10"><input id="fax" type="text" class="form-control" value="" data-mask="(999)999-9999"></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>




                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Company Address</label>

                                                                <div class="col-sm-10"><input id="address" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>







                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Company City</label>

                                                                <div class="col-sm-10"><input id="city" type="text" class="form-control" value=""></div>
                                                            </div>


                                                            <div class="hr-line-dashed"></div>


                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Company County</label>

                                                                <div class="col-sm-10"><input id="county" type="text" class="form-control" value=""></div>
                                                            </div>


                                                            <div class="hr-line-dashed"></div>





                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Company Zip Code:</label>

                                                                <div class="col-sm-10"><input id="zip" type="text" class="form-control" value="" data-mask="99999"></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>






                                                        
                                                        
                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Website URL <small>i.e yahoo.com<br />(no - www. or htttp:// or https:// only url):</small></label>

                                                                <div class="col-sm-10"><input id="website" type="text" class="form-control" value=""></div>
                                                            </div>

                                                                        <div class="hr-line-dashed"></div>

                                                                                        


                                                                        <div class="form-group"><label for="dlr_geo_latitude" class="col-sm-2 control-label">Geo Latitude:</label>

                                                                            <div class="col-sm-10"><input id="dlr_geo_latitude" type="text" class="form-control" value=""></div>
                                                                        </div>

                                                                        <div class="hr-line-dashed"></div>


                                                                        <div class="form-group"><label class="col-sm-2 control-label">Geo Longitude:</label>

                                                                            <div class="col-sm-10"><input id="dlr_geo_longitude" type="text" class="form-control" value="" ></div>
                                                                        </div>

                                                                        <div class="hr-line-dashed"></div>

                                
                                                                        <div class="form-group"><button id="pull_dlr_map" class="btn btn-sm btn-primary col-sm-2">Pull Geo Location:</button>

                                                                            <div class="col-sm-10"><input id="dlr_ok_googlemp" type="text" class="form-control" value=""></div>
                                                                        </div>

                                                                        <div class="hr-line-dashed"></div>
                                                                        
                                                                        
                                                            <div id="api_result" style="display:none;"></div>



                                                        
                                                            <div class="form-group"><label for="contact" class="col-sm-2 control-label">#1 Decision Makers Name:</label>

                                                                <div class="col-sm-10"><input id="contact" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>

                                                        
                                                            <div class="form-group"><label for="contact_title" class="col-sm-2 control-label">#1 Decision Makers Position Title:</label>

                                                                <div class="col-sm-10">
                                                                <select id="contact_title" type="text" class="form-control">
                                                                        <option value="">Select Postion Title</option>
                                                                        <option value="Owner">Owner</option>
                                                                        <option value="GM">GM</option>
                                                                        <option value="Manager">Manager</option>
                                                                        <option value="Other">Other</option>
                                                                </select>
                                                                
                                                                
                                                                </div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>
                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">#1 Decision Makers Phone Number:</label>

                                                                <div class="col-sm-10"><input id="contact_phone" type="text" class="form-control" value="" data-mask="(999)999-9999"></div>
                                                            </div>


                                                            <div class="hr-line-dashed"></div>
                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">#1 Decision Makers Mobile Carrier:</label>

                                                            <div class="col-sm-10">
                                                            <select id="contact_mobilecarrier_id" type="text" class="form-control"{>
                                                                <option value="">Select Carrier</option>
                                                                <?php
                                                                    do {  
                                                                    ?>
                                                                                                        <option value="<?php echo $row_mobile_carriers['carrier_id']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_id'], $row_query_dlrprospect['contact_mobilecarrier_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?></option>
                                                                                                        <?php
                                                                    } while ($row_mobile_carriers = mysqli_fetch_array($mobile_carriers));
                                                                    $rows = mysqli_num_rows($mobile_carriers);
                                                                    if($rows > 0) {
                                                                        mysqli_data_seek($mobile_carriers, 0);
                                                                        $row_mobile_carriers = mysqli_fetch_array($mobile_carriers);
                                                                    }
                                                                    ?>
                                                                    </select>
                                                            </div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>






                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">#1 Decision Makers Phone Type:</label>

                                                                <div class="col-sm-10">



                                                                <select name="contact_phone_type" id="contact_phone_type" class="form-control">
                                                                    <option value="">Select Phone Type</option>
                                                                    <option value="Mobile">Mobile</option>
                                                                    <option value="Work">Work</option>
                                                                    <option value="Other">Other</option>
                                                                </select>






                                                                </div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>







                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">#2 Decision Maker Name:</label>

                                                                <div class="col-sm-10"><input id="dmcontact2" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>



                                                        
                                                            <div class="form-group"><label for="dmcontact2_title" class="col-sm-2 control-label">#2 Decision Makers Position Title:</label>

                                                                <div class="col-sm-10">
                                                                <select id="dmcontact2_title" type="text" class="form-control">
                                                                    <option value="">Select Postion Title</option>
                                                                    <option value="Owner">Owner</option>
                                                                    <option value="GM">GM</option>
                                                                    <option value="Manager">Manager</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                                
                                                                
                                                                </div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>




                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">#2 Decision Maker Phone Number:</label>

                                                                <div class="col-sm-10"><input id="dmcontact2_phone" type="text" class="form-control" value="" data-mask="(999)999-9999"></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>








                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">#2 Decision Maker Phone Type:</label>

                                                                <div class="col-sm-10">
                                                                    <select id="dmcontact2_phone_type" class="form-control">
                                                                        <option value="">Select Phone Type</option>
                                                                        <option value="Mobile">Mobile</option>
                                                                        <option value="Work">Work</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                </select>


                                                                </div>
                                                            </div>
                                                            <div class="hr-line-dashed"></div>
                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">#2 Decision Makers Mobile Carrier:</label>

                                                            <div class="col-sm-10">
                                                            <select id="dmcontact2_mobilecarrier_id" type="text" class="form-control"{>
                                                                <option value="">Select Carrier</option>
                                                                <?php do {  ?>
                                                                <option value="<?php echo $row_mobile_carriers['carrier_id']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_id'], $row_query_dlrprospect['dmcontact2_mobilecarrier_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?></option>
                                                                <?php
                                                                } while ($row_mobile_carriers = mysqli_fetch_array($mobile_carriers));
                                                                $rows = mysqli_num_rows($mobile_carriers);
                                                                if($rows > 0) {
                                                                    mysqli_data_seek($mobile_carriers, 0);
                                                                    $row_mobile_carriers = mysqli_fetch_array($mobile_carriers);
                                                                }
                                                                ?>
                                                                </select>
                                                            </div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>









                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Primary Finance Company Name:</label>

                                                                <div class="col-sm-10"><input id="finance_primary_name" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>



                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Finance Managers Name:</label>

                                                                <div class="col-sm-10"><input id="finance" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>







                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Finance Contact Phone Number:</label>

                                                                <div class="col-sm-10"><input id="finance_contact" type="text" class="form-control" value="" data-mask="(999)999-9999"></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>



                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Finance Contact Email:</label>

                                                                <div class="col-sm-10"><input id="finance_contact_email" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>





                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Name:</label>

                                                                <div class="col-sm-10"><input id="sales" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>







                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Mobile Number:</label>

                                                                <div class="col-sm-10"><input id="sales_contact" type="text" class="form-control" value="" data-mask="(999)999-9999"></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>


                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Email:</label>

                                                                <div class="col-sm-10"><input id="sales_email" type="email" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>
                                                            <div class="hr-line-dashed"></div>
                                                            <div class="hr-line-dashed"></div>


                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Dealers Login Email:</label>

                                                                <div class="col-sm-10"><input id="dealer_email" type="email" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>

                                                        
                                                            <div class="form-group"><label class="col-sm-2 control-label">Dealers Login Password:</label>

                                                                <div class="col-sm-10"><input id="dealer_password" type="text" class="form-control" value=""></div>
                                                            </div>

                                                            <div class="hr-line-dashed"></div>

                                                            <div class="hr-line-dashed"></div>
                                                            <div class="hr-line-dashed"></div>










                            </div><!-- End Content add box -->








                            <div id="search_actions_box">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <button id="add_prospectanyway" class="btn btn-danger pull-left" type="button" style="display: none;">Add Anyway</button>
                                                                    
                                                                    <div>
                                                                    <button id="search_prospectfirst" class="ladda-button btn btn-primary pull-right" type="button"  data-style="contract">Search</button>


                                                                
                                                                <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                            </div>




                            </div><!-- End form horizontal -->





                    

                    </div>
                    
                    
                    <div id="prospect_search_results_hook">
                    
                    
                    </div>
                    
                    
                    
                    
                </div>
              </div>
            </div>



            <div id="view_dealerprospect_results" class="row" style="display: none;">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Prospect Results Here <small>From Prospects You Entered</small></h5>
                    </div>
                    <div id="ajax_prospect_search_results" class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>










            <div id="prospect_create_anyway" class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add New Prospect Any Way <small>Sort, search</small></h5>
                        </div>
                        <div class="ibox-content">

                            <div class="row" align="center">

                                <div class="col-sm-6">

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Rep #1</label>
                                                <select name="dudes1_id" id="dudes1_id" class="form-control">
                                                <option value="" <?php if (!(strcmp("", $dudesid))) {echo "selected=\"selected\"";} ?>>Select Rep</option>
                                                    <?php
                                                    do {  
                                                    ?>
                                                                    <option value="<?php echo $row_pullactvDudes['dudes_id']?>"<?php if (!(strcmp($row_pullactvDudes['dudes_id'], $dudesid))) {echo "selected=\"selected\"";} ?>><?php echo $row_pullactvDudes['dudes_lname']?> <?php echo $row_pullactvDudes['dudes_firstname']?></option>
                                                    <?php
                                                    } while ($row_pullactvDudes = mysqli_fetch_array($pullactvDudes));
                                                    $rows = mysqli_num_rows($pullactvDudes);
                                                    if($rows > 0) {
                                                        mysqli_data_seek($pullactvDudes, 0);
                                                        $row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Rep #2</label>
                                                <select name="dudes2_id" id="dudes2_id" class="form-control" disabled>
                                        <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['dudes2_id']))) {echo "selected=\"selected\"";} ?>>Select Rep 2</option>
                                            <?php
                                                do {  
                                                ?>
                                                <option value="<?php echo $row_pullactvDudes['dudes_id']?>"<?php if (!(strcmp($row_pullactvDudes['dudes_id'], $dudesid))) {echo "selected=\"selected\"";} ?>><?php echo $row_pullactvDudes['dudes_lname']?>, <?php echo $row_pullactvDudes['dudes_firstname']?> <?php if($row_pullactvDudes['dudes_skillset_id'] > 1){ echo ' '.$row_pullactvDudes['dudes_skillset_id']; }else{ echo ''; } ?></option>
                                                <?php
                                            } while ($row_pullactvDudes = mysqli_fetch_array($pullactvDudes));
                                            $rows = mysqli_num_rows($pullactvDudes);
                                            if($rows > 0) {
                                                mysqli_data_seek($pullactvDudes, 0);
                                                $row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
                                            }
                                            ?>
                                            </select>
                                            </div>
                                        </div>


                                    </div>
                                    
                                </div>

                                <div class="col-sm-6">
                                                                <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-money fa-3x"></i></button>
                                                                <button id="email_prospectdlr" class="btn btn-outline btn-warning dim" type="button"><i class="fa fa-envelope-o fa-3x"></i></button>


                                </div>      




                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button id="create_prospectanyway" class="btn btn-primary btn-block">Add This Prospect To Your Account</button>
                                        </div>
                                    </div>
                                </div>










                            

                            </div>
                        </div>
                    </div>
                </div>
            


            
            
        
        
            </div><!-- End wrapper wrapper-content animated fadeInRight -->
        
            <?php include("_footer.php"); ?>

        </div>
        </div>


		</div>
	</div>
    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <script src="js/custom/page/prospect.search.js"></script>

    <script type="text/javascript" language="javascript" class="init">

    $(document).ready(function() {
        $('#mydataTable').dataTable({
            "scrollX": true,
            "scrollCollapse": true,
            "paging":         true
        });
    } );

    </script>
    <!-- Ladda -->
    <script src="js/plugins/ladda/spin.min.js"></script>
    <script src="js/plugins/ladda/ladda.min.js"></script>
    <script src="js/plugins/ladda/ladda.jquery.min.js"></script>
    <script>

        $(document).ready(function (){

            
            
            // Bind normal buttons
            $( '.ladda-button' ).ladda( 'bind', { timeout: 2000 } );

            // Bind progress buttons and simulate loading progress
            Ladda.bind( '.progress-demo .ladda-button',{
                callback: function( instance ){
                    var progress = 0;
                    var interval = setInterval( function(){
                        progress = Math.min( progress + Math.random() * 0.1, 1 );
                        instance.setProgress( progress );

                        if( progress === 1 ){
                            instance.stop();
                            clearInterval( interval );
                        }
                    }, 200 );
                }
            });


            var l = $( '.ladda-button-demo' ).ladda();

            l.click(function(){
                // Start loading
                l.ladda( 'start' );

                // Timeout example
                // Do something in backend and then stop ladda
                setTimeout(function(){
                    l.ladda('stop');
                },12000)


            });

        });

    </script>

    <script src="js/custom/google/goog_map.pullmap_dlract.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
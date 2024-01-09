<?php require_once('db_admin.php'); ?>
<?php

mysqli_select_db($tracking_mysqli, $database_tracking);
$query_dudes_sys_template_cat = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_sys_template_cats` ORDER BY `sys_template_cat_type_label` ASC";
$dudes_sys_template_cat = mysqli_query($tracking_mysqli, $query_dudes_sys_template_cat);
$row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat);
$totalRows_dudes_sys_template_cat = mysqli_num_rows($dudes_sys_template_cat);


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullSalespitches = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_salespitch` WHERE `dudes_salespitch_status` = 1 ORDER BY `dudes_salespitch_name` ASC";
$pullSalespitches = mysqli_query($tracking_mysqli, $query_pullSalespitches);
$row_pullSalespitches = mysqli_fetch_array($pullSalespitches);
$totalRows_pullSalespitches = mysqli_num_rows($pullSalespitches);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Create New Pitch <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

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
                <h2>Create A New Pitch Template</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a role="button">Creating New</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Start Your Next Template Pitch Here. <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



<div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                          <a class="btn btn-block btn-primary compose-mail" href="pitchtemplates.php">View Templates</a>
                            <div class="space-25"></div>
                            <h5><?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?>'s Template Options</h5>
                            
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="emailtemplates.php"> <i class="fa fa-envelope-o"></i> Templates <span class="label label-warning pull-right"><?php echo $totalRows_dealer_template_types; ?></span> </a></li>
                                <li><a href="emailtemplates.php"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger pull-right"><?php echo $totalRows_dealer_template_types_inactive; ?></span></a></li>
                            </ul>
                            <h5>Categories</h5>
                            <ul class="category-list" style="padding: 0">
                                <li><a href="#"> <i class="fa fa-circle text-warning"></i> Clients</a></li>
                            </ul>
                            
                            <div class="clearfix"></div>
                            
                            <h5 class="tag-title">Dynamic Packages</h5>
                            <ul class="tag-list" style="padding: 0">
                            	<li><a><i class="fa fa-tag"></i> {dealerinvitation_package} </a></li>
                            	<li><a><i class="fa fa-tag"></i> {verify_dealeremail} </a></li>
                            	<li><a><i class="fa fa-tag"></i> {verify_dudesemail} </a></li>
                            </ul>
                            
                            
                            <div class="clearfix"></div>
                            
                            <h5 class="tag-title">Dynamic Dealer Tags</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_address} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_city} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_state} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_zip} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_country} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_email_login} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_username} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_contact1_title} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_contact1_fullname} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_contact1_phone} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_contact1_phone_type} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_contact2_fullname} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_contact2_title} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_contact2_phone} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_contact2_phone_type} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_name} *Communications Purposes*</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_legalname} *For Billing Purposes*</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_dealerTimezone} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_website} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_finance_name} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_finance_contact} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_salesperson_name} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_sales_contact_name} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_sales_contact_phone} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_sales_contact_fax} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_token} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_home_html} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_about_html} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_directions_html} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_contactus_html} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_slogan} </a></li>
                                <li><a href=""><i class="fa fa-tag"></i> {dealer_company_disclaimer} </a></li>

                            </ul>
                            <div class="clearfix"></div>
                            <h5 class="tag-title">System Subjects</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href=""><i class="fa fa-tag"></i> No Show</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> No Response</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Thanks For Applying</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Call No Answer</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Latest News</a></li>
                            </ul>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">
                <h2>
                    Create New Sales Pitch Template Here
                </h2>
            </div>
                <div class="mail-box">


                <div class="mail-body">

                    <div class="form-horizontal">
                    



                        <div class="form-group">
                        	<label for="pitch_systm_templates_status" class="col-sm-2 control-label">Template Status:</label>

                            <div class="col-sm-10">
                            <select id="pitch_systm_templates_status" class="form-control">
                            	<option value="1">Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group">
                        	<label for="pitch_systm_templates_subject" class="col-sm-2 control-label">Title:</label>

                            <div class="col-sm-10">
                            <input id="pitch_systm_templates_subject" type="text" class="form-control" value="">
                            </div>
                        </div>









					<div class="form-group">



						



                                    <div class="col-sm-12">
                                        <div class="row m-b">
                                        
                                        	<div class="col-md-4">
	                           	 <label>&nbsp;</label>

                                <button id="new_cat" type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal6">
                                    Create A New Category Now
                                </button>
                                            </div>
                                            <div class="col-md-4">
                                           	  <label>Category:</label>
                               	  <select id="category_id" class="form-control">
                               	    <option value="">Select Category</option>
                               	    <?php
do {  
?>
                               	    <option value="<?php echo $row_dudes_sys_template_cat['sys_template_cat_id']?>"><?php echo $row_dudes_sys_template_cat['sys_template_cat_type_label']?></option>
                               	    <?php
} while ($row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat));
  $rows = mysqli_num_rows($dudes_sys_template_cat);
  if($rows > 0) {
      mysqli_data_seek($dudes_sys_template_cat, 0);
	  $row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat);
  }
?>
                                  </select>
                                                
                                                
                                                
                                                
                                                


                            <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Create A New Category Below</h4>
                                        </div>
                                        <div class="modal-body">


										


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Enter Your New Category:</label>
                
                                            <div class="col-sm-9">
                                                <input id="new_category_enter" type="text" class="form-control" value="">
                                            </div>
                                        </div>







                                        
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button id="create_new_category" type="button" class="btn btn-primary" data-dismiss="modal">Create Now</button>
                                        </div>
                                    </div>
                              </div>
                            </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                            </div>
                                            <div class="col-md-4">
                                            	<label>Day Response:</label>
                                            	<select id="days_response" class="form-control">
                                                	<option value="1">01 Day Response</option>
                                                	<option value="2">02 Day Response</option>
                                                	<option value="3">03 Day Response</option>
                                                	<option value="4">04 Day Response</option>
                                                	<option value="5">05 Day Response</option>
                                                	<option value="6">06 Day Response</option>
                                                	<option value="7">07 Day Response</option>
                                                	<option value="8">08 Day Response</option>
                                                	<option value="9">09 Day Response</option>
                                                	<option value="10">10 Day Response</option>
                                                	<option value="11">11 Day Response</option>
                                                	<option value="12">12 Day Response</option>
                                                	<option value="13">13 Day Response</option>
                                                	<option value="14">14 Day Response</option>
                                                	<option value="15">15 Day Response</option>
                                                	<option value="16">16 Day Response</option>
                                                	<option value="17">17 Day Response</option>
                                                	<option value="18">18 Day Response</option>
                                                	<option value="19">19 Day Response</option>
                                                	<option value="20">20 Day Response</option>
                                                	<option value="21">21 Day Response</option>
                                                	<option value="22">22 Day Response</option>
                                                	<option value="23">23 Day Response</option>
                                                	<option value="24">24 Day Response</option>
                                                	<option value="25">25 Day Response</option>
                                                	<option value="26">26 Day Response</option>
                                                	<option value="27">27 Day Response</option>
                                                	<option value="28">28 Day Response</option>
                                                	<option value="29">29 Day Response</option>
                                                	<option value="30">30 Day Response</option>
                                                	<option value="31">31 Day Response</option>
                                                	<option value="32">32 Day Response</option>
                                                	<option value="33">33 Day Response</option>
                                                	<option value="34">34 Day Response</option>
                                                	<option value="35">35 Day Response</option>
                                                	<option value="36">36 Day Response</option>
                                                	<option value="37">37 Day Response</option>
                                                	<option value="38">38 Day Response</option>
                                                	<option value="39">39 Day Response</option>
                                                	<option value="40">40 Day Response</option>
                                                	<option value="41">41 Day Response</option>
                                                	<option value="42">42 Day Response</option>
                                                	<option value="43">43 Day Response</option>
                                                	<option value="44">44 Day Response</option>
                                                	<option value="45">45 Day Response</option>
                                                	<option value="46">46 Day Response</option>
                                                	<option value="47">47 Day Response</option>
                                                	<option value="48">48 Day Response</option>
                                                	<option value="49">49 Day Response</option>
                                                	<option value="50">50 Day Response</option>
                                                	<option value="51">51 Day Response</option>
                                                	<option value="52">52 Day Response</option>
                                                	<option value="53">53 Day Response</option>
                                                	<option value="54">54 Day Response</option>
                                                	<option value="55">55 Day Response</option>
                                                	<option value="56">56 Day Response</option>
                                                	<option value="57">57 Day Response</option>
                                                	<option value="58">58 Day Response</option>
                                                	<option value="59">59 Day Response</option>
                                                	<option value="60">60 Day Response</option>
                                                </select>
                                                
                                            </div>
                                        
                                        
                                        
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div>
                                                    <select id="pullanewpitchtemplate" class="form-control">
                                                    <option value="">Select A Template</option>
                                                    <option value="script1.php">Starter Template #1</option>
                                                    <?php
do {  
?>
                                                    <option value="<?php echo $row_pullSalespitches['dudes_salespitch_id']?>"><?php echo $row_pullSalespitches['dudes_salespitch_name']?></option>
                                                    <?php
} while ($row_pullSalespitches = mysqli_fetch_array($pullSalespitches));
  $rows = mysqli_num_rows($pullSalespitches);
  if($rows > 0) {
      mysqli_data_seek($pullSalespitches, 0);
	  $row_pullSalespitches = mysqli_fetch_array($pullSalespitches);
  }
?>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                      </div>







                  </div>

                </div>

                    <div class="mail-text">

                        <div class="pitch_summernote">
                        
                        <p id="removeme"></p>

                        </div>
<div class="clearfix"></div>
                  </div>
                    <div class="mail-body text-right">
                        <a id="save_dudes_pitchtemplate" class="btn btn-md btn-primary" data-toggle="tooltip" data-placement="top" title="Save"><i class="fa fa-floppy-o"></i> Create Pitch Template</a>
                    </div>
                    <div class="clearfix"></div>



                </div>
            </div>
        </div>
        </div>            


            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        <?php include("_footer.php"); ?>

        </div>
</div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
<script src="js/custom/page/custom.pitchtemplate.add.js"></script>
</body>

</html>
<?php
mysqli_free_result($pullSalespitches);
?>
<?php include("inc.end.phpmsyql.php"); ?>
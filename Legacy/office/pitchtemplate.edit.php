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

$colname_findSalespitch = "-1";
if (isset($_GET['salespitch_id'])) {
  $colname_findSalespitch = $_GET['salespitch_id'];
}
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_findSalespitch =  "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_salespitch` WHERE `dudes_salespitch_id` = '$colname_findSalespitch'";
$findSalespitch = mysqli_query($tracking_mysqli, $query_findSalespitch);
$row_findSalespitch = mysqli_fetch_array($findSalespitch);
$totalRows_findSalespitch = mysqli_num_rows($findSalespitch);



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
                <h2>Edit Sales Pitch Template</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a role="button">Editing</a>
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
                        <h5>Edit This Template Pitch Here. <small>Sort, search</small></h5>
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
                    Update Pitch Template Here
                </h2>
              <input type="hidden" id="dudes_salespitch_id" value="<?php echo $row_findSalespitch['dudes_salespitch_id']; ?>">
            </div>
                <div class="mail-box">


                <div class="mail-body">

                    <div class="form-horizontal">
                    



                        <div class="form-group">
                        	<label for="pitch_systm_templates_status" class="col-sm-2 control-label">Template Status:</label>

                            <div class="col-sm-10">
                            <select id="pitch_systm_templates_status" class="form-control">
                            <option value="1" <?php if (!(strcmp(1, $row_pullSalespitches['dudes_salespitch_status']))) {echo "selected=\"selected\"";} ?>>Enabled</option>
                            <option value="0" <?php if (!(strcmp(0, $row_pullSalespitches['dudes_salespitch_status']))) {echo "selected=\"selected\"";} ?>>Disabled</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group">
                        	<label for="pitch_systm_templates_subject" class="col-sm-2 control-label">Title:</label>

                            <div class="col-sm-10">
                            <input id="pitch_systm_templates_subject" type="text" class="form-control" value="<?php echo $row_findSalespitch['dudes_salespitch_name']; ?>">
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
                               	    <option value="" <?php if (!(strcmp("", $row_pullSalespitches['dudes_cat_id']))) {echo "selected=\"selected\"";} ?>>Select Category</option>
                               	    <?php
do {  
?>
<option value="<?php echo $row_dudes_sys_template_cat['sys_template_cat_id']?>"<?php if (!(strcmp($row_dudes_sys_template_cat['sys_template_cat_id'], $row_pullSalespitches['dudes_cat_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_dudes_sys_template_cat['sys_template_cat_type_label']?></option>
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
                                            	  <option value="1" <?php if (!(strcmp(1, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>01 Day Response</option>
                                            	  <option value="2" <?php if (!(strcmp(2, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>02 Day Response</option>
                                            	  <option value="3" <?php if (!(strcmp(3, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>03 Day Response</option>
                                            	  <option value="4" <?php if (!(strcmp(4, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>04 Day Response</option>
                                            	  <option value="5" <?php if (!(strcmp(5, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>05 Day Response</option>
                                            	  <option value="6" <?php if (!(strcmp(6, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>06 Day Response</option>
                                            	  <option value="7" <?php if (!(strcmp(7, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>07 Day Response</option>
                                            	  <option value="8" <?php if (!(strcmp(8, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>08 Day Response</option>
                                            	  <option value="9" <?php if (!(strcmp(9, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>09 Day Response</option>
                                           	    <option value="10" <?php if (!(strcmp(10, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>10 Day Response</option>
                                           	    <option value="11" <?php if (!(strcmp(11, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>11 Day Response</option>
                                           	    <option value="12" <?php if (!(strcmp(12, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>12 Day Response</option>
                                           	    <option value="13" <?php if (!(strcmp(13, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>13 Day Response</option>
                                           	    <option value="14" <?php if (!(strcmp(14, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>14 Day Response</option>
                                           	    <option value="15" <?php if (!(strcmp(15, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>15 Day Response</option>
                                           	    <option value="16" <?php if (!(strcmp(16, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>16 Day Response</option>
                                           	    <option value="17" <?php if (!(strcmp(17, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>17 Day Response</option>
                                           	    <option value="18" <?php if (!(strcmp(18, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>18 Day Response</option>
                                           	    <option value="19" <?php if (!(strcmp(19, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>19 Day Response</option>
                                           	    <option value="20" <?php if (!(strcmp(20, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>20 Day Response</option>
                                           	    <option value="21" <?php if (!(strcmp(21, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>21 Day Response</option>
                                           	    <option value="22" <?php if (!(strcmp(22, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>22 Day Response</option>
                                           	    <option value="23" <?php if (!(strcmp(23, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>23 Day Response</option>
                                           	    <option value="24" <?php if (!(strcmp(24, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>24 Day Response</option>
                                           	    <option value="25" <?php if (!(strcmp(25, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>25 Day Response</option>
                                           	    <option value="26" <?php if (!(strcmp(26, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>26 Day Response</option>
                                           	    <option value="27" <?php if (!(strcmp(27, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>27 Day Response</option>
                                           	    <option value="28" <?php if (!(strcmp(28, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>28 Day Response</option>
                                           	    <option value="29" <?php if (!(strcmp(29, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>29 Day Response</option>
                                           	    <option value="30" <?php if (!(strcmp(30, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>30 Day Response</option>
                                           	    <option value="31" <?php if (!(strcmp(31, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>31 Day Response</option>
                                           	    <option value="32" <?php if (!(strcmp(32, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>32 Day Response</option>
                                           	    <option value="33" <?php if (!(strcmp(33, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>33 Day Response</option>
                                           	    <option value="34" <?php if (!(strcmp(34, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>34 Day Response</option>
                                           	    <option value="35" <?php if (!(strcmp(35, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>35 Day Response</option>
                                           	    <option value="36" <?php if (!(strcmp(36, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>36 Day Response</option>
                                           	    <option value="37" <?php if (!(strcmp(37, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>37 Day Response</option>
                                           	    <option value="38" <?php if (!(strcmp(38, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>38 Day Response</option>
                                           	    <option value="39" <?php if (!(strcmp(39, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>39 Day Response</option>
                                           	    <option value="40" <?php if (!(strcmp(40, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>40 Day Response</option>
                                           	    <option value="41" <?php if (!(strcmp(41, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>41 Day Response</option>
                                           	    <option value="42" <?php if (!(strcmp(42, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>42 Day Response</option>
                                           	    <option value="43" <?php if (!(strcmp(43, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>43 Day Response</option>
                                           	    <option value="44" <?php if (!(strcmp(44, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>44 Day Response</option>
                                           	    <option value="45" <?php if (!(strcmp(45, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>45 Day Response</option>
                                           	    <option value="46" <?php if (!(strcmp(46, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>46 Day Response</option>
                                           	    <option value="47" <?php if (!(strcmp(47, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>47 Day Response</option>
                                           	    <option value="48" <?php if (!(strcmp(48, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>48 Day Response</option>
<option value="49" <?php if (!(strcmp(49, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>49 Day Response</option>
<option value="50" <?php if (!(strcmp(50, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>50 Day Response</option>
<option value="51" <?php if (!(strcmp(51, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>51 Day Response</option>
<option value="52" <?php if (!(strcmp(52, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>52 Day Response</option>
<option value="53" <?php if (!(strcmp(53, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>53 Day Response</option>
<option value="54" <?php if (!(strcmp(54, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>54 Day Response</option>
<option value="55" <?php if (!(strcmp(55, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>55 Day Response</option>
<option value="56" <?php if (!(strcmp(56, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>56 Day Response</option>
<option value="57" <?php if (!(strcmp(57, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>57 Day Response</option>
<option value="58" <?php if (!(strcmp(58, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>58 Day Response</option>
<option value="59" <?php if (!(strcmp(59, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>59 Day Response</option>
                                   	        <option value="60" <?php if (!(strcmp(60, $row_pullSalespitches['dudes_salespitch_days_response']))) {echo "selected=\"selected\"";} ?>>60 Day Response</option>
                                              </select>
                                                
                                            </div>
                                        
                                        
                                        
                                        </div>
                                        
                                        
                                        
                                    </div>
                      </div>







                  </div>

                </div>

                    <div class="mail-text">

                        <div class="pitch_summernote">
                        <?php echo $row_findSalespitch['dudes_salespitch_body']; ?>
                        <p id="removeme"></p>

                        </div>
<div class="clearfix"></div>
                  </div>
                    <div class="mail-body text-right">
                      <a id="update_dudes_pitchtemplate" class="btn btn-md btn-primary" data-toggle="tooltip" data-placement="top" title="Save"><i class="fa fa-floppy-o"></i> Update Pitch Template</a>
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
<script src="js/custom/page/custom.pitchtemplate.edit.js"></script>
</body>

</html>
<?php
mysqli_free_result($pullSalespitches);

mysqli_free_result($findSalespitch);
?>
<?php include("inc.end.phpmsyql.php"); ?>
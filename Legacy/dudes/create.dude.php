<?php require_once('db_admin.php'); ?>
<?php


//IF NOT SUPER ADMIN YOU CANNOT CREATE DUDE
if($dudes_skillset_id != '9'){
  header("Location: company.directory.php");
}




mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullDudesTeams = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_teams` WHERE `dudes_team_status` = '1' ORDER BY `dudes_teams_id` ASC";
$pullDudesTeams = mysqli_query($tracking_mysqli, $query_pullDudesTeams);
$row_pullDudesTeams = mysqli_fetch_array($pullDudesTeams);
$totalRows_pullDudesTeams = mysqli_num_rows($pullDudesTeams);

mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullJobPostions = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_jobpositions` WHERE `dudes_jobpositions`.`dudes_jobposition_status` = '1'";
$pullJobPostions = mysqli_query($tracking_mysqli, $query_pullJobPostions);
$row_pullJobPostions = mysqli_fetch_array($pullJobPostions);
$totalRows_pullJobPostions = mysqli_num_rows($pullJobPostions);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pullPhonetypes = "SELECT * FROM `idsids_idsdms`.`phone_types`";
$pullPhonetypes = mysqli_query($idsconnection_mysqli, $query_pullPhonetypes);
$row_pullPhonetypes = mysqli_fetch_array($pullPhonetypes);
$totalRows_pullPhonetypes = mysqli_num_rows($pullPhonetypes);



mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullRegions = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_regions` WHERE `dudes_regions`.`dudes_region_status` = '1' ORDER BY `dudes_regions`.`dudes_region_id` ASC";
$pullRegions = mysqli_query($tracking_mysqli, $query_pullRegions);
$row_pullRegions = mysqli_fetch_array($pullRegions);
$totalRows_pullRegions = mysqli_num_rows($pullRegions);



/* */


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullSalesPitches = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_salespitch` WHERE `dudes_salespitch`.`dudes_salespitch_status` = '1' ORDER BY `dudes_salespitch`.`dudes_salespitch_name` ASC";
$pullSalesPitches = mysqli_query($tracking_mysqli, $query_pullSalesPitches);
$row_pullSalesPitches = mysqli_fetch_array($pullSalesPitches);
$totalRows_pullSalesPitches = mysqli_num_rows($pullSalesPitches);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states`";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_array($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_timezones = "SELECT * FROM `idsids_idsdms`.`calendar|timezones` ORDER BY `calendar|timezones`.`TimeZone` ASC";
$dlr_timezones = mysqli_query($idsconnection_mysqli, $query_dlr_timezones);
$row_dlr_timezones = mysqli_fetch_array($dlr_timezones);
$totalRows_dlr_timezones = mysqli_num_rows($dlr_timezones);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_markets = "SELECT * FROM `idsids_idsdms`.`states`, `idsids_idsdms`.`markets_dm` WHERE `states`.`state_id` = `markets_dm`.`state_id`";
$markets = mysqli_query($idsconnection_mysqli, $query_markets);
$row_markets = mysqli_fetch_array($markets);
$totalRows_markets = mysqli_num_rows($markets);


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

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Create A New Dude</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="company.directory.php">Directory</a>
                    </li>
                    <li>
                        <a href="#">Creating A New Dude</a>
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
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <?php echo $totalRows_pullJobPostions; ?>
                    <br>

                    
                    <?php echo $row_pullJobPostions['dudes_jobposition_title']; ?>

                    

                    </div>
                </div>
              </div>
            </div>



        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Personal Credentials <small>Sending Internal Credentials To Login</small></h5>
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
                        <div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Sign in</h3>
                                <p>Sign in today for more expirience.</p>
                                <div role="form">
                                    <div class="form-group"><label>Personal Email</label> <input id="ddudes_email_internal" type="text" placeholder="Enter email" class="form-control" value=""></div>
                                    <div class="form-group"><label>Login/Chat Password</label> <input id="ddudes_password" type="text" placeholder="Password" class="form-control" value=""></div>
                                    <div class="form-group"><label>Chat Username</label> <input id="ddudes_username" type="text" placeholder="Username" class="form-control" value=""></div>

                                    <div>
                                        <button id="send_registration_action" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><strong>Send Registration</strong></button>
                                        <label> <input id="okay_tosenddudereg" type="checkbox" class="i-checks"> Ok To Send? </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6"><h4>Must Be An Exciting New Member?</h4>
                                <p>Hire A New Team Member:</p>
                                <p class="text-center">
                                    <a role="button"><i class="fa fa-sign-in big-icon"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Personal Credentialss</h5>
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
                            <div class="form-horizontal">
                                <p>Sign in today for more expirience.</p>
                                <div class="form-group"><label for="ddudes_email_personal" class="col-lg-2 control-label">Internal Email</label>

                                    <div class="col-lg-10"><input id="ddudes_email_personal" type="email" placeholder="Login Email" class="form-control" value=""> <span class="help-block m-b-none">Example block-level help text here.</span>
                                    </div>
                                </div>
                                <div class="form-group"><label for="ddudes_cellphone" class="col-lg-2 control-label">Cell Phone</label>

                                    <div class="col-lg-10"><input id="ddudes_cellphone" type="text" placeholder="Cell Phone" class="form-control" data-mask="(999)999-9999" value=""></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <div class="checkbox i-checks"><label> <input id="ddudes_email_internal_verified" type="checkbox" value="Y"><i></i> Internal Email Set Up? </label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <div class="checkbox i-checks"><label> <input id="ddudes_email_internal_active" type="checkbox" value="Y"><i></i> Internal Email Active? </label></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button id="save_quick" class="btn btn-sm btn-white qkdudesave" type="button">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Job Postion Skill Set</h5>
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
                            <div id="new_form" role="form" class="form-inline">
                                <div class="form-group">
                                <label for="ddudes_team_id" class="control-label">Teams</label><br />
                                    <select id="ddudes_team_id" class="form-control">
                                      <option value="">Select Team</option>
                                      <?php
do {  
?>
                                      <option value="<?php echo $row_pullDudesTeams['dudes_teams_id']?>"><?php echo $row_pullDudesTeams['dudes_team_name']?></option>
                                      <?php
} while ($row_pullDudesTeams = mysqli_fetch_array($pullDudesTeams));
  $rows = mysqli_num_rows($pullDudesTeams);
  if($rows > 0) {
      mysqli_data_seek($pullDudesTeams, 0);
	  $row_pullDudesTeams = mysqli_fetch_array($pullDudesTeams);
  }
?>
                                  </select>
                                    </div>
                                <div class="form-group">
                                <label class="control-label"></label><br />
                                <button class="btn btn-primary btn-block qkdudesave" type="button">Save</button>
                                </div>

                                
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Wages Rates <small>Example of login in modal box</small></h5>
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
                            <div class="text-center">
                            <a data-toggle="modal" data-backdrop="static" class="btn btn-primary" href="#modal-form">Wages Modal</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Enter Wages</h3>

                                                    <p>Set Hourly Rate Shift etc.</p>

                                                    <div role="form">
                                                        <div class="form-group"><label>Hourly Rate.</label> <input id="ddudes_hourlyrate" type="text" placeholder="Hourly Rate" class="form-control"></div>
                                                        <div class="form-group"><label>Fed Deducts.</label> <input id="ddudes_fed_deductions" type="text" placeholder="Fed Deducts" class="form-control"></div>
                                                        <div class="form-group"><label>State Deducts.</label> <input id="ddudes_state_deductions" type="text" placeholder="State Deducts" class="form-control"></div>
                                                        <div class="form-group">
            <label for="ddudes_taxexempt">Exempt?</label>
             <select id="ddudes_taxexempt" class="form-control">
                <option value="Y">Yes</option>
                <option value="N">No</option>
             </select>
                                                         </div>

                                                        <div>
                                                            <button class="btn btn-block btn-primary pull-right m-t-n-xs" type="button"><strong>Save</strong></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6"><h4>Your Creating A New Member?</h4>
                                                    
                                                    
                                                    <p>You can create an account:</p>
                                                  <div role="form">



<div class="form-group">
	<label for="ddudes_status">Acct. Status</label> 
    <select id="ddudes_status"  class="form-control">
        <option value="1">Active</option>
        <option value="0">Inactve</option>
        <option value="2">Holding</option>
    </select>
</div>

<div class="form-group">
<label for="ddudes_jobposition_title">Job Position</label> 
<select id="ddudes_jobposition_title" class="form-control" name="ddudes_jobposition_title">
    <option value="1">Secretary</option>
    <option value="2">Data Entry</option>
    <option value="3">Sales Rep</option>
    <option value="4">Customer Service</option>
    <option value="5">Dealer Support</option>
    <option value="6">Manager</option>
    <option value="7">Supervisor</option>
    <option value="8">Director</option>
    <option value="9">Programmer</option>
    <option value="10">Graphic Designer</option>
    <option value="11">Photographer</option>
    <option value="12">Media Relations</option>
    <option value="13">Analyst</option>
    <option value="14">Business Analyst</option>
    <option value="15">Programmer</option>
    <option value="16">Graphic Designer</option>
    <option value="17">Vice President</option>
    <option value="18">President</option>
    <option value="19">CFO</option>
    <option value="20">CGO</option>
    <option value="21">CTO</option>
    <option value="22">CEO</option>                                                            
</select>
                                                        </div>
                                                        <div class="form-group"><label>Department</label>



<select id="ddudes_department_id" class="form-control">
    <option value="marketing">Marketing</option>
    <option value="sales">Sales</option>
    <option value="accounting">Accounting</option>
    <option value="collections">Collections</option>
    <option value="customerservice">Customer Service</option>
    <option value="dealersupport">Dealer Support</option>
    <option value="mediarealtions">Media Relations</option>
</select>


                                                         </div>
                                                        <div class="form-group">
                                                        <label for="ddudes_access_level">Access_level</label>
                                                         <select id="ddudes_access_level" class="form-control">
                                                         	<option value="1">1</option>
                                                         	<option value="2">2</option>
                                                         	<option value="3">3</option>
                                                         	<option value="4">4</option>
                                                         	<option value="5">5</option>
                                                         	<option value="6">6</option>
                                                         	<option value="7">7</option>
                                                         </select>

                                                        </div>

                                                        <div>
                                                            <button class="btn btn-primary pull-right m-t-n-xs" type="button"><strong>Save</strong></button>
                                                        </div>
                                                    </div>
                                              
                                            
                                            
                                            
                                            </div>
                                        </div>
                                    	</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary qkdudesave">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
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
                            <div class="form-horizontal">

                    <input type="hidden" id="ddudes_secret_token" name="ddudes_secret_token" value="<?php echo $tkey; ?>" />

                            
                                <div class="form-group"><label class="col-sm-2 control-label">First Name:</label>

                                    <div class="col-sm-10"><input id="ddudes_firstname" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                            
                                <div class="form-group"><label for="ddudes_midname" class="col-sm-2 control-label">Middle Name:</label>

                                    <div class="col-sm-10"><input id="ddudes_midname" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label for="ddudes_lname" class="col-sm-2 control-label">Last Name:</label>

                                    <div class="col-sm-10"><input id="ddudes_lname" type="text" class="form-control " value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_suffix" class="col-sm-2 control-label">
Suffix:</label>

                                    <div class="col-sm-10"><input id="ddudes_suffix" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_ssn" class="col-sm-2 control-label">SSN:</label>

                                    <div class="col-sm-10"><input id="ddudes_ssn" type="text" class="form-control" value="" data-mask="999-99-9999"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label id="ddudes_dob" class="col-sm-2 control-label">Date Of Birth:</label>

                                    <div class="col-sm-10"><input id="ddudes_dob" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_jobposition_shift" class="col-sm-2 control-label">Job Position Shift:</label>

                                    <div class="col-sm-10">
                                    	<select id="ddudes_jobposition_shift" class="form-control">
                                        	<option value="">Select Shift</option>
                                        	<option value="shifta">Morning</option>
                                        	<option value="shiftb">Mid-Day</option>
                                        	<option value="shiftc">Evening</option>
                                        	<option value="shiftd">Night</option>
                                        	<option value="shiftall">ALL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_region_id" class="col-sm-2 control-label">Region:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_region_id" class="form-control">
                                      <option value="">Select Region</option>
                                      <?php do {  ?>
                                      <option value="<?php echo $row_pullRegions['dudes_region_id']?>"><?php echo $row_pullRegions['dudes_region_name']?></option>
<?php
} while ($row_pullRegions = mysqli_fetch_array($pullRegions));
  $rows = mysqli_num_rows($pullRegions);
  if($rows > 0) {
      mysqli_data_seek($pullRegions, 0);
	  $row_pullRegions = mysqli_fetch_array($pullRegions);
  }
?>
                                    </select>
                                    </div>

                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_dma_id" class="col-sm-2 control-label">DMA State:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_dma_id" class="form-control">
                                      <option value="">Select State</option>
<?php do {  ?>
                                      <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_name']?></option>
                                      <?php
} while ($row_states = mysqli_fetch_array($states));
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
                                
                                <div class="form-group">
                                <label for="ddudes_market_id" class="col-sm-2 control-label">Market</label>
								<div class="col-sm-10">
                                    <select id="ddudes_market_id" class="form-control">
                                      <option value="">Select Market</option>
<?php do {  ?>
                                      <option value="<?php echo $row_markets['market_id']?>"><?php echo $row_markets['market']?></option>
                                      <?php
} while ($row_markets = mysqli_fetch_array($markets));
  $rows = mysqli_num_rows($markets);
  if($rows > 0) {
      mysqli_data_seek($markets, 0);
	  $row_markets = mysqli_fetch_array($markets);
  }
?>
                                  </select>
                                </div>
                                </div>
                                <div class="form-group">
                                
                                <label for="ddudes_submarket_id" class="col-sm-2 control-label">Submarket</label>
								<div class="col-sm-10">
                                    <select id="ddudes_submarket_id" class="form-control">
                                    	<option value="1">Submarket A</option>
                                    	<option value="2">Submarket B</option>
                                    	<option value="3">Submarket C</option>
                                    </select>
                                </div>
                                
                                </div>





                                
                                <div class="form-group">
                                <label for="ddudes_salespitch_template_id" class="col-sm-2 control-label">Sales Pitch:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_salespitch_template_id" class="form-control">
                                      <option value="">Select Sales Pitch</option>
<?php do {  ?>
                                      <option value="<?php echo $row_pullSalesPitches['dudes_salespitch_id']?>"><?php echo $row_pullSalesPitches['dudes_salespitch_name']?></option>
                                      <?php
} while ($row_pullSalesPitches = mysqli_fetch_array($pullSalesPitches));
  $rows = mysqli_num_rows($pullSalesPitches);
  if($rows > 0) {
      mysqli_data_seek($pullSalesPitches, 0);
	  $row_pullSalesPitches = mysqli_fetch_array($pullSalesPitches);
  }
?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_active" class="col-sm-2 control-label">Work Phone Active:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_workphone_active" class="form-control">
                                    	<option value="">Work Phone Active?</option>
                                    	<option value="N">NO</option>
                                    	<option value="Y">Yes</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_prfx" class="col-sm-2 control-label">Work Phone Prefix:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_prfx" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label for="ddudes_workphone_no" class="col-sm-2 control-label">Work Number:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_no" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label for="ddudes_workphone_type" class="col-sm-2 control-label">Work Phone Type:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_workphone_type" class="form-control">
                                      <option value="">Type Of Work Phone?</option>
<?php do {  ?>
                                      <option value="<?php echo $row_pullPhonetypes['phone_type_id']?>"><?php echo $row_pullPhonetypes['phone_type_name']?></option>
                                      <?php
} while ($row_pullPhonetypes = mysqli_fetch_array($pullPhonetypes));
  $rows = mysqli_num_rows($pullPhonetypes);
  if($rows > 0) {
      mysqli_data_seek($pullPhonetypes, 0);
	  $row_pullPhonetypes = mysqli_fetch_array($pullPhonetypes);
  }
?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label for="dudes_workphone_ext" class="col-sm-2 control-label">Work Extension:</label>

                                    <div class="col-sm-10">
                                    <input id="dudes_workphone_ext" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label for="ddudes_workphone_companyown" class="col-sm-2 control-label">Company Owns Workphone?:</label>

                                    <div class="col-sm-10">
                                    <input id="ddudes_workphone_companyown" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Dudes work phone Contractor Own ?</label>

                                    <div class="col-sm-10">
                                    <input id="ddudes_workphone_contractorown" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label id="ddudes_workphone_brand" class="col-sm-2 control-label">Work Phone Brand Name:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_brand" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Work Phone Mac Address:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_mac_address" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Workphone Mac Address IP:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_mac_address_ip" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Router Brand:</label>

                                    <div class="col-sm-10"><select id="ddudes_workphone_router_brand_id" class="form-control">
                                    <option value="1">Linix</option>
                                    <option value="2">NetGear</option>
                                    <option value="3">Cisco</option>
                                    <option value="4">Other</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_router_modelno" class="col-sm-2 control-label">Workphone router model no:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_router_modelno" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_router_serialno" class="col-sm-2 control-label">Workphone router serial no:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_router_serialno" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_date_shipped" class="col-sm-2 control-label">Work Phone Date Shipped:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_date_shipped" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_date_received" class="col-sm-2 control-label">Work Phone Date Received:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_date_received" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_purchase_cost" class="col-sm-2 control-label">Work Phone Purchase $Cost:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_purchase_cost" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_purchase_date" class="col-sm-2 control-label">Work Phone Purchase Date:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_purchase_date" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone2_prfx" class="col-sm-2 control-label">Work Phone Prfx#:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone2_prfx" type="text" class="form-control" value=""></div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone_ext" class="col-sm-2 control-label">Work Phone Ext#:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone_ext" type="text" class="form-control" value=""></div>
                                </div>





                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone2_type" class="col-sm-2 control-label">Work Phone Type:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_workphone2_type" class="form-control">
                                      <option value="">Select Type</option>
<?php do {  ?>
                                      <option value="<?php echo $row_pullPhonetypes['phone_type_id']?>"><?php echo $row_pullPhonetypes['phone_type_name']?></option>
                                      <?php
} while ($row_pullPhonetypes = mysqli_fetch_array($pullPhonetypes));
  $rows = mysqli_num_rows($pullPhonetypes);
  if($rows > 0) {
      mysqli_data_seek($pullPhonetypes, 0);
	  $row_pullPhonetypes = mysqli_fetch_array($pullPhonetypes);
  }
?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workphone2_ext" class="col-sm-2 control-label">Work Phone 2 Ext:</label>

                                    <div class="col-sm-10"><input id="ddudes_workphone2_ext" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="" class="col-sm-2 control-label">Work Address 1:</label>

                                    <div class="col-sm-10"><input id="ddudes_workaddr1" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workaddr2" class="col-sm-2 control-label">Work Address 2:</label>

                                    <div class="col-sm-10"><input id="ddudes_workaddr2" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Work Address City:</label>

                                    <div class="col-sm-10"><input id="ddudes_workaddr_city" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workaddr_state" class="col-sm-2 control-label">Work Address State:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_workaddr_state" class="form-control">
                                      <option value="">Select State</option>
<?php do {  ?>
                                      <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                      <?php
} while ($row_states = mysqli_fetch_array($states));
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
                                <div class="form-group"><label for="ddudes_workaddr_zip" class="col-sm-2 control-label">Work Address Zip:</label>

                                    <div class="col-sm-10"><input id="ddudes_workaddr_zip" type="text" class="form-control" value=""  data-mask="99999"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workaddr_zip4" class="col-sm-2 control-label">Work Address Zip4:</label>

                                    <div class="col-sm-10"><input id="ddudes_workaddr_zip4" type="text" class="form-control" value="" data-mask="9999"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workaddr_county" class="col-sm-2 control-label">Work Address County:</label>

                                    <div class="col-sm-10"><input id="ddudes_workaddr_county" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workaddr_country" class="col-sm-2 control-label">Work Address Country:</label>

                                    <div class="col-sm-10"><input id="ddudes_workaddr_country" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_homephone_no" class="col-sm-2 control-label">Home Phone No:</label>

                                    <div class="col-sm-10"><input id="ddudes_homephone_no" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_home_addr" class="col-sm-2 control-label">Home Address 1:</label>

                                    <div class="col-sm-10"><input id="ddudes_home_addr" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_home_addr2" class="col-sm-2 control-label">Home Address 2:</label>

                                    <div class="col-sm-10"><input id="ddudes_home_addr2" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_home_city" class="col-sm-2 control-label">Home City:</label>

                                    <div class="col-sm-10"><input id="ddudes_home_city" type="text" class="form-control" value=""></div>
                                </div>

                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_home_state" class="col-sm-2 control-label">Home State:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_home_state" class="form-control">
                                      <option value="">Select State</option>
                                      <?php do {  ?>
                                      <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
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
                                <div class="form-group"><label for="ddudes_home_zipcode" class="col-sm-2 control-label">Zip Code:</label>

                                    <div class="col-sm-10"><input id="ddudes_home_zipcode" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_Timezone" class="col-sm-2 control-label">Time Zone:</label>

                                    <div class="col-sm-10">
                                    <select id="ddudes_Timezone" class="form-control">
                                      <option value="">Select Time Zone</option>
                                      <?php do { ?>
                                      <option value="<?php echo $row_dlr_timezones['TimeZone']?>"><?php echo $row_dlr_timezones['TimeZone']?></option>
                                      <?php
											} while ($row_dlr_timezones = mysqli_fetch_array($dlr_timezones));
											  $rows = mysqli_num_rows($dlr_timezones);
											  if($rows > 0) {
												  mysqli_data_seek($dlr_timezones, 0);
												  $row_dlr_timezones = mysqli_fetch_array($dlr_timezones);
											  }
										?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workstation_group_id" class="col-sm-2 control-label">Workstation group id:</label>

                                    <div class="col-sm-10"><input id="ddudes_workstation_group_id" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_workstation_id" class="col-sm-2 control-label">Workstation Id:</label>

                                    <div class="col-sm-10"><input id="ddudes_workstation_id" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label for="ddudes_goal_weeklypresentations" class="col-sm-2 control-label">Goal weekly presentations:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_weeklypresentations" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_monthlypresentations" class="col-sm-2 control-label">Goal monthly presentations:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_monthlypresentations" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_deals_monthly" class="col-sm-2 control-label">Monthly Deals:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_deals_monthly" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_retaindlrs_monthly" class="col-sm-2 control-label">Retain Dealers Monthly:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_retaindlrs_monthly" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_newdlrs_monthly" class="col-sm-2 control-label">Goal New Dealers Monthly:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_newdlrs_monthly" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_mnthly_commission" class="col-sm-2 control-label">Goal Monthly Commission:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_mnthly_commission" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_daily_commission" class="col-sm-2 control-label">Goal Daily Commission:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_daily_commission" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label id="ddudes_goal_yearly_commission" class="col-sm-2 control-label">Goal Yearly Commission:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_yearly_commission" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_residual_commission" class="col-sm-2 control-label">Goal Residual Commission:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_residual_commission" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_addnewcars_tosystm" class="col-sm-2 control-label">Add New Cars To System:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_addnewcars_tosystm" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label  for="ddudes_goal_vehicle_photos" class="col-sm-2 control-label">Goal Vehicle Photos:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_vehicle_photos" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_vehicle_windowstickers" class="col-sm-2 control-label">Goal Window Stickers:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_vehicle_windowstickers" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_new_websites" class="col-sm-2 control-label">Goal New Websites Sales?:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_new_websites" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_retain_outsideadagencys" class="col-sm-2 control-label">Retain Outside Ad Agency's:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_retain_outsideadagencys" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_goal_new_outsideadagencys" class="col-sm-2 control-label">Goal New Outside Ad Agencys:</label>

                                    <div class="col-sm-10"><input id="ddudes_goal_new_outsideadagencys" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label  for="ddudes_professional_motto" class="col-sm-2 control-label">Professonal Motto:</label>

                                    <div class="col-sm-10"><input id="ddudes_professional_motto" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_dudes_aboutme_toteam" class="col-sm-2 control-label">About Me To Team:</label>

                                    <div class="col-sm-10"><input id="ddudes_dudes_aboutme_toteam" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="ddudes_dudes_aboutme_todealers" class="col-sm-2 control-label">About Me To Dealers:</label>

                                    <div class="col-sm-10"><input id="ddudes_dudes_aboutme_todealers" type="text" class="form-control" value=""></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label  for="ddudes_dudes_aboutme_tocompany" class="col-sm-2 control-label">About Me To The Company:</label>

                                    <div class="col-sm-10"><input id="ddudes_dudes_aboutme_tocompany" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="internal_comments_super_admin" class="col-sm-2 control-label">Super Admin Comments:</label>

                                    <div class="col-sm-10"><input id="internal_comments_super_admin" type="text" class="form-control" value=""></div>
                                </div>
                                
                                
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-warning" type="button">Cancel</button>
                                        <button id="create_newdude" class="btn btn-primary btn-block" type="button">Save changes</button>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

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

	<script src="js/custom/page/custom.create.dude.js"></script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php require_once("db_loggedin.php"); ?>
<?php

$colname_view_thiscustomer = "-1";
if (isset($_GET['customer_id'])) {
  $colname_view_thiscustomer = $_GET['customer_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_view_thiscustomer =  "SELECT * FROM `idsids_idsdms`.`customers` WHERE customer_id = '$colname_view_thiscustomer'";
$view_thiscustomer = mysqli_query($idsconnection_mysqli, $query_view_thiscustomer);
$row_view_thiscustomer = mysqli_fetch_assoc($view_thiscustomer);
$totalRows_view_thiscustomer = mysqli_num_rows($view_thiscustomer);

$customer_id = $row_view_thiscustomer['customer_id'];
$customer_dealer_id =  $row_view_thiscustomer['customer_dealer_id'];


if($customer_dealer_id != $did){
  header('Location: customers.php');
}

// Just To Be On The SafeSide We Assign the new lead to the same function name in db_loggedin.

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states`";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_customer_leadnotes = "SELECT * FROM `idsids_idsdms`.`customer_notes` WHERE `note_customerid` = '$customer_id' ORDER BY `note_created` DESC";
$query_customer_leadnotes = mysqli_query($idsconnection_mysqli, $query_query_customer_leadnotes);
$row_query_customer_leadnotes = mysqli_fetch_assoc($query_customer_leadnotes);
$totalRows_query_customer_leadnotes = mysqli_num_rows($query_customer_leadnotes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_bodystyles = "SELECT * FROM `idsids_idsdms`.`body_styles` ORDER BY `body_style_name` ASC";
$query_bodystyles = mysqli_query($idsconnection_mysqli, $query_query_bodystyles);
$row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
$totalRows_query_bodystyles = mysqli_num_rows($query_bodystyles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_options_months = "SELECT * FROM `idsids_idsdms`.`months_options` ORDER BY `months_options`.`month_id` ASC";
$options_months = mysqli_query($idsconnection_mysqli, $query_options_months);
$row_options_months = mysqli_fetch_assoc($options_months);
$totalRows_options_months = mysqli_num_rows($options_months);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_options_years = "SELECT * FROM `idsids_idsdms`.`year_options` ORDER BY year_options.year_id ASC";
$options_years = mysqli_query($idsconnection_mysqli, $query_options_years);
$row_options_years = mysqli_fetch_assoc($options_years);
$totalRows_options_years = mysqli_num_rows($options_years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM `idsids_idsdms`.`income_interval_options`";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Customer View</title>

<?php include("inc.head.php"); ?>

<style type="text/css">

input#customer_name_suffix {
    width: 108% !important;
}
select#customer_titlename{
    width: 108% !important;
}

button#save_customer_info {
    width: 90%;
}

div#map_canvas {
	width:100%;
	height:500px;
	min-height: 500px !important;
	display:block;
}

textarea#lead_notes
{
  border:1px solid #999999;
  width:100%;
  margin:5px 0;
  padding:3px;
}

textarea#lead_notes {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}

</style>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        <?php include("_nav_top.php"); ?>
            
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Customer View</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="customers.php">Customers</a>
                        </li>
                        <li class="active">
                            <a href="customer.view.php?customer_id=<?php echo $row_view_thiscustomer['customer_id']; ?>">Customer View</a>
                        </li>
                        <li class="active">
                            <strong>Customer Edit</strong>
                            <input id="customer_id" type="hidden" value="<?php echo $row_view_thiscustomer['customer_id']; ?>">
                        </li>

                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


        <div class="wrapper wrapper-content animated fadeInRight">


			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                    	<a data-backdrop="static" data-toggle="modal" data-target="#dealMatrixModal" class="btn btn-primary btn-lg">ReMarket</a>
                        <a href="customers.php" class="btn btn-primary btn-lg">Customers</a>                    
                        <a class="btn btn-warning btn-lg">Viewing Customer</a>
                    </div>
                </div>
            </div>




<div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md">
                            <h4>Customer View/Options</h4>
                            </div>
                            
                            <div class="panel-options">
								<ul id="customer_view_tabs" class="nav nav-tabs">
                                    <li class="active">
                                    	<a data-toggle="tab" href="#tab-4">
                                        <i class="fa fa-pencil fa-3x"></i>View/Edit</a>
                                    </li>
                                    <li class="">
                                    	<a data-toggle="tab" href="#tab-5">
                                        	<i class="fa fa-clipboard fa-3x"></i> Notes</a>
                                    </li>
                                    <li class="">
                                    	<a data-toggle="tab" href="#tab-6">
                                        	<i class="fa fa-image fa-3x"></i>Driver Licenses</a>
                                    </li>
                                    <li class="">
                                    	<a data-toggle="tab" href="#tab-7">
                                        	<i class="fa fa-building fa-3x"></i> Employer</a>
                                    </li>
                                    <li class="">
                                    	<a data-toggle="tab" href="#tab-8">
                                        	<i class="fa fa-cogs fa-3x"></i>To Do</a>
                                    </li>
                                    <li class="">
                                    	<a data-toggle="tab" href="#tab-9">
                                        	<i class="fa fa-suitcase fa-3x"></i>Actions</a>
                                    </li>

                                </ul>
                                
                            
                            
                            </div>
                        
                        
                        
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-4" class="tab-pane active">

									<?php include("content/body.customer.view.edit.php"); ?>


                                </div>

                                <div id="tab-5" class="tab-pane">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Notes <small>This section displays recorded Notes on this customer.</small></h5>
                        </div>
                    <div class="ibox-content">
                        
                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            <div class="form-group">
                            
                        <label class="col-sm-2">
                        Notes:
                        </label>
                        
                        <div class="col-sm-10">
                        	<textarea class="left-float" id="customer_bodynote" rows="4" cols="50"></textarea>
                        </div>
                        
                        <div class="row">
                        
                        	<div class="col-lg-12" align="center">
                            	<button id="save_customer_notes" class="btn btn-w-m btn-success" type="button">Save Notes</button>
                        		<div class="hr-line-dashed"></div>

                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            
                            

<p>Customer Note History</p>
<p>  </p>
  
<div id="master_customer_notes_layout" class="table-responsive">


                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>Reference </th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

<?php if($row_query_customer_leadnotes['note_id'] > 0):  do { ?>

                    <tr id="notes_view_<?php echo $row_query_customer_leadnotes['note_id']; ?>">
                        <td>
                        	
                        </td>
                        <td>
                        	By: <small><?php echo $row_query_customer_leadnotes['note_nametext']; ?></small>
                        </td>
                        <td>
							
                            <p><?php echo $row_query_customer_leadnotes['note_body']; ?></p>

                        </td>
                        <td>
                        	 <?php echo $row_query_customer_leadnotes['note_created']; ?>
                        </td>
                    </tr>







<?php } while ($row_query_customer_leadnotes = mysqli_fetch_assoc($query_customer_leadnotes)); endif; ?>
                                    </tbody>
                                </table>
                            
</div>


                            
                        		<div class="hr-line-dashed"></div>
                            </div>
                        </div>


                        
                            </div>
                        
                        
                        	</div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                            
                        </div><!-- End Ibox Content For Notes -->
                    </div>
                </div>
            </div>


                                    
                                </div>
                                <div id="tab-6" class="tab-pane">





                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="ibox float-e-margins">
                                                        <div class="ibox-title">
                                                            <h5>Driver Licenses Information <small>This prepares information for deal and paperwork.</small></h5>
                                                        </div>
                                                        <div class="ibox-content">
                                                        
                                                        <div class="form-horizontal">
                                
                                
                                                                <div class="form-group"><label class="col-lg-2 control-label">SSN</label>
                                
                                                                    <div class="col-lg-10">
                                                                    <input id="customer_lead_source" type="type" placeholder="Social Security Number" class="form-control" value="<?php echo $row_view_thiscustomer['customer_ssn']; ?>" data-mask="999-99-9999">
                                                                    </div>
                                                                </div>
                                                                <div class="hr-line-dashed"></div>
                                
                                
                                                                <div class="hr-line-dashed"></div>
                                                                <div class="form-group"><label class="col-sm-2 control-label">Date Of Birth</label>
                                
                                                                    <div class="col-sm-10"><input id="customer_dob" type="text" placeholder="Date Of Birth" class="form-control input-lg m-b" value="<?php echo $row_view_thiscustomer['customer_dob']; ?>">
                                                                        
                                                                        
                                                                    </div>
                                                                 
                                                                 
                                                                </div>
                                                        
                                                        
                                                                <div class="hr-line-dashed"></div>
                                                                <div class="form-group"><label class="col-sm-2 control-label">Licenses Number</label>
                                
                                                                    <div class="col-sm-10"><input id="customer_dlno" type="text" placeholder="Licenses Number" class="form-control input-lg m-b" value="<?php echo $row_view_thiscustomer['customer_dlno']; ?>">
                                                                        
                                                                        
                                                                    </div>
                                                                 
                                                                 
                                                                </div>
                                                                <div class="hr-line-dashed"></div>
                                                                
                                                                 <div class="form-group"><label for="customer_dlstate" class="col-sm-2 control-label">Licenses State</label>
                                                                    <div class="col-sm-10">
                                                                    
                                                                    <select class="form-control m-b" id="customer_dlstate" name="customer_dlstate">
                                    <?php
                                if($row_view_thiscustomer['customer_dlstate']){$lead_state = $row_view_thiscustomer['customer_home_state'];}else{$lead_state = $row_userDets['state'];}
                                do {  
                                ?>
                                    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $lead_state))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
                                    <?php
                                } while ($row_states = mysqli_fetch_assoc($states));
                                  $rows = mysqli_num_rows($states);
                                  if($rows > 0) {
                                      mysqli_data_seek($states, 0);
                                      $row_states = mysqli_fetch_assoc($states);
                                  }
                                ?>
                                  </select>
                                                                    
                                                                    
                                                                    </div>
                                                                 
                                                                 </div>
                                                                
                                
                                
                                
                                
                                                                
                                                                 
                                                                
                                
                                                                
                                
                                
                                
                                
                                
                                
                                
                                                                <div class="hr-line-dashed"></div>
                                                        
                                                        </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                </div>
                                
                                <div id="tab-7" class="tab-pane">
                                                            
                                                                    
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ibox float-e-margins">
                                                    <div class="ibox-title">
                                                        <h5>Employer Information <small>this section belongs to vehicle trade information.</small></h5>
                                                    </div>
                                                    
                                                    <div class="ibox-content">
                                                    
                                                    <div class="form-horizontal">
                                                    
                                                    
                                                            <div class="hr-line-dashed"></div>
                                                            
                                                             <div class="form-group"><label  class="col-sm-2 control-label">Employer Name</label>
                                                                <div class="col-sm-10"><input id="customer_employer_name" class="form-control" value="<?php echo $row_view_thiscustomer['customer_employer_name']; ?>" placeholder="Employer Name">
                                                                </div>
                                                             
                                                             </div>
                            
                                                            <div class="hr-line-dashed"></div>
                                                            
                                                             <div class="form-group"><label for="customer_supervisors_name" class="col-sm-2 control-label">Supervisor Name</label>
                                                                <div class="col-sm-10"><input id="customer_supervisors_name" class="form-control" value="<?php echo $row_view_thiscustomer['customer_supervisors_name']; ?>" placeholder="Supervisor Name">
                                                                </div>
                                                             
                                                             </div>
                            
                                                             <div class="form-group"><label for="customer_supervisors_phone" class="col-sm-2 control-label">Supervisor Phone</label>
                                                                <div class="col-sm-10"><input id="customer_supervisors_phone" class="form-control" value="<?php echo $row_view_thiscustomer['customer_supervisors_phone']; ?>" placeholder="Supervisor Phone" data-mask="(999) 999-9999">
                                                                </div>
                                                             
                                                             </div>
                                                            
                                                            <div class="hr-line-dashed"></div>
                            
                                                            
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Employer Address</label>
                            
                                                                <div class="col-sm-10">
                                                                    <div class="input-group m-b"><input id="customer_employer_addr" type="text" class="form-control" placeholder="Employer Address 1" value="<?php echo $row_view_thiscustomer['customer_employer_addr1']; ?>"> <span class="input-group-btn"> <button type="button" class="btn btn-primary">Show More
                                                                    </button> </span>
                                                                    
                                                                <div class="col-sm-10"><input id="customer_employer_addr2" class="form-control" value="<?php echo $row_view_thiscustomer['customer_employer_addr2']; ?>" placeholder="Employer Address 2">
                                                                </div>
                                                                
                                                                    </div>
                            
                            
                            
                                                                    <div class="row">
                                                                        <div class="col-md-3"><label>City</label>
                                                                        <input id="customer_employer_city" type="text" class="form-control" value="<?php echo $row_view_thiscustomer['customer_employer_city']; ?>" placeholder="Employer City">
                                                                        </div>
                                                                        <div class="col-md-3"><label>State</label>
                            
                            
                                                                <select class="form-control m-b" id="customer_employer_state" name="customer_employer_state">
                                <?php
                            if($row_view_thiscustomer['customer_employer_state']){$lead_state = $row_view_thiscustomer['customer_employer_state'];}else{$lead_state = $row_userDets['state'];}
                            do {  
                            ?>
                                <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $lead_state))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
                                <?php
                            } while ($row_states = mysqli_fetch_assoc($states));
                              $rows = mysqli_num_rows($states);
                              if($rows > 0) {
                                  mysqli_data_seek($states, 0);
                                  $row_states = mysqli_fetch_assoc($states);
                              }
                            ?>
                              </select>
                            
                            
                            
                            
                                                                        </div>
                                                                        <div class="col-md-3"><label>Zip</label><input id="customer_employer_zip" type="text" placeholder="Zip" class="form-control" value="<?php echo $row_view_thiscustomer['customer_employer_zip']; ?>" data-mask="99999"></div>
                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="hr-line-dashed"></div>
                            
                            
                            
                                                            
                                                             <div class="form-group"><label  class="col-sm-2 control-label">Employer Phone Number</label>
                                                                <div class="col-sm-10"><input id="customer_employer_phone" class="form-control" value="<?php echo $row_view_thiscustomer['customer_employer_phone']; ?>" placeholder="Employer Phone Number" data-mask="(999) 999-9999">
                                                                </div>
                                                             
                                                             </div>
                                                            
                            
                            
                            
                            
                                                            <div class="hr-line-dashed"></div>
                                                            
                                                             <div class="form-group">
                                                             <label  class="col-sm-2 control-label">Date Of Hire</label>
                                                                <div class="col-sm-10">
                                                                <input id="customer_employer_hiredate" class="form-control" value="<?php echo $row_view_thiscustomer['customer_employer_hiredate']; ?>" placeholder="Date Of Hire" data-mask="99/99/9999">
                                                                
                                                                
                                                                
                                                                    <div class="row">
                                                                        <div class="col-md-4"><label>Years</label>
                                                                        
                            
                                                                <select class="form-control m-b" id="customer_employer_years" name="customer_employer_years">
                                <?php do {  ?>
                                <option value="<?php echo $row_options_years['year_value']?>"<?php if (!(strcmp($row_options_years['year_value'], $row_view_thiscustomer['customer_employer_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_options_years['year_name']?></option>
                                <?php
                            } while ($row_options_years = mysqli_fetch_assoc($options_years));
                              $rows = mysqli_num_rows($options_years);
                              if($rows > 0) {
                                  mysqli_data_seek($options_years, 0);
                                  $row_options_years = mysqli_fetch_assoc($options_years);
                              }
                            ?>
                              </select>
                            
                                                                        
                                                                        </div>
                                                                        <div class="col-md-4"><label>Months</label>
                            
                            
                                                                <select class="form-control m-b" id="customer_employer_months" name="customer_employer_months">
                                <?php do {  ?>
                                <option value="<?php echo $row_options_years['year_value']?>"<?php if (!(strcmp($row_options_years['year_value'], $row_view_thiscustomer['customer_home_live_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_options_years['year_name']?></option>
                                <?php
                            } while ($row_options_years = mysqli_fetch_assoc($options_years));
                              $rows = mysqli_num_rows($options_years);
                              if($rows > 0) {
                                  mysqli_data_seek($options_years, 0);
                                  $row_options_years = mysqli_fetch_assoc($options_years);
                              }
                            ?>
                              </select>
                            
                            
                            
                            
                                                                        </div>
                            
                            
                                                                    </div>
                                                                
                                                                
                                                                </div>
                                                             
                                                             </div>
                            
                            
                            
                                                            <div class="hr-line-dashed"></div>
                                                            
                                                             <div class="form-group"><label  class="col-sm-2 control-label">Gross Income</label>
                                                                <div class="col-sm-10"><input id="customer_gross_income" class="form-control"  placeholder="Gross Income" value="<?php echo $row_view_thiscustomer['customer_gross_income']; ?>"  type="text">
                                                                </div>
                                                             
                                                             </div>
                            
                            
                            
                                                            <div class="hr-line-dashed"></div>
                                                            
                                                             <div class="form-group"><label  class="col-sm-2 control-label">Gross Income Frequency</label>
                                                                <div class="col-sm-10">
                            <select id="customer_income_frequency" class="form-control">
                                                                  <?php do {  ?>
                                                                  <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], $row_view_thiscustomer['customer_income_frequency']))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
                                                                  <?php
                            } while ($row_paydayType = mysqli_fetch_assoc($paydayType));
                              $rows = mysqli_num_rows($paydayType);
                              if($rows > 0) {
                                  mysqli_data_seek($paydayType, 0);
                                  $row_paydayType = mysqli_fetch_assoc($paydayType);
                              }
                            ?>
                                                                </select>
                            
                                                                </div>
                                                             
                                                             </div>
                            
                                                            <div class="hr-line-dashed"></div>
                                                            
                                                             <div class="form-group"><label  class="col-sm-2 control-label">Other Income Source</label>
                                                                <div class="col-sm-10">
                                                                <input id="customer_income_other" class="form-control" value="<?php echo $row_view_thiscustomer['customer_income_other']; ?>" placeholder="Other Income Source">
                                                                
                                                                </div>
                                                             
                                                             </div>
                            
                            
                                                            <div class="hr-line-dashed"></div>
                                                            
                                                             <div class="form-group"><label  class="col-sm-2 control-label">Other Income Amount</label>
                                                                <div class="col-sm-10">
                                                                <input id="customer_income_other_amount" class="form-control"  type="text" placeholder="Other Income Amount" value="<?php echo $row_view_thiscustomer['customer_income_other_amount']; ?>">
                                                                
                                                                </div>
                                                             
                                                             </div>
                            
                            
                            
                            
                            
                                                            <div class="hr-line-dashed"></div>
                                                            
                                                             <div class="form-group"><label  class="col-sm-2 control-label">Other Income Frequency</label>
                                                                <div class="col-sm-10">
                            <select id="customer_income_other_frequency" class="form-control">
                                                                  <?php do {  ?>
                                                                  <option value="<?php echo $row_paydayType['income_option']?>"<?php if (!(strcmp($row_paydayType['income_option'], $row_view_thiscustomer['customer_income_other_frequency']))) {echo "selected=\"selected\"";} ?>><?php echo $row_paydayType['income_option']?></option>
                                                                  <?php
                            } while ($row_paydayType = mysqli_fetch_assoc($paydayType));
                              $rows = mysqli_num_rows($paydayType);
                              if($rows > 0) {
                                  mysqli_data_seek($paydayType, 0);
                                  $row_paydayType = mysqli_fetch_assoc($paydayType);
                              }
                            ?>
                                                                </select>
                            
                                                                </div>
                                                             
                                                             </div>
                            
                                                            <div class="hr-line-dashed"></div>
                            
                            
                            
                            
                            
                            
                                                    </div>
                                                        
                                                    </div>
                                                
                                                
                                                </div>
                                            </div>
                                        </div>
                            
                            

								</div>

                                
                                <div id="tab-8" class="tab-pane">
                                
										<h2>Customer To Do List</h2>
                                        
                                        <ul>
                                        	<li>Contact This Customer</li>
                                        </ul>

								</div>

                                <div id="tab-9" class="tab-pane">
                                
										Tab 9

								</div>

            

                    </div>

						</div>
</div>





        
        
        
            <div id="save_bottom Information" class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Save This Customer </h5>
                        </div>
                        <div class="ibox-content">
                            
                        
                        

<div class="row">


    
    <div class="form-group">
    	<div class="row">
        <div class="col-lg-12" align="center">
        <button id="save_customer_info" class="btn btn-lg btn-primary m-t-n-xs" type="button"><strong>Save</strong></button>
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
    

    <script src="js/custom/page/custom.customer.edit.js"></script>

    <script src="js/custom/google/goog_map.pullmap.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($view_thiscustomer);

mysqli_free_result($options_months);

mysqli_free_result($options_years);

?>

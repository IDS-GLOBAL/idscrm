<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealer_teams = "SELECT * FROM `idsids_idsdms`.`dealers_teams` WHERE `dealers_teams`.`dlr_team_did` = '$did' AND `dealers_teams`.`dlr_team_status` = '1' ORDER BY `dealers_teams`.`dlr_team_name`";
$find_dealer_teams = mysqli_query($idsconnection_mysqli, $query_find_dealer_teams);
$row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
$totalRows_find_dealer_teams = mysqli_num_rows($find_dealer_teams);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_departments = "SELECT * FROM `idsids_idsdms`.`dealer_depts` WHERE `dept_did` = '$did' ORDER BY `dept_name` ASC";
$find_departments = mysqli_query($idsconnection_mysqli, $query_find_departments);
$row_find_departments = mysqli_fetch_assoc($find_departments);
$totalRows_find_departments = mysqli_num_rows($find_departments);

$dept_id = $row_find_departments ['dept_id'];
$dlr_team_id  = $row_find_dealer_teams['dlr_team_id'];

 if($totalRows_find_dealer_teams == 0){
 
	$insert_system_team_for_salesperson_sql =  "
	INSERT INTO `idsids_idsdms`.`dealers_teams` SET
				`dlr_team_did` = '$did',
				`dlr_team_status` = '1',
				`dlr_team_name` = 'Team A'
	
	";
	$run_insert_system_team_for_salesperson = mysqli_query($idsconnection_mysqli, $insert_system_team_for_salesperson_sql);
	$dlr_team_id = mysqli_insert_id($idsconnection_mysqli);
 
 }



 if($totalRows_find_departments == 0){
 
	$insert_system_dept_for_salesperson_sql =  "
	INSERT INTO `idsids_idsdms`.`dealer_depts` SET
				`dept_did` = '$did',
				`dept_status` = '1',
				`dept_link` = 'sales_dept',
				`dept_name` = 'Sales Dept.'
	
	";
	$run_insert_system_dept_for_salesperson = mysqli_query($idsconnection_mysqli, $insert_system_dept_for_salesperson_sql);
	$dept_id = mysqli_insert_id($idsconnection_mysqli);
 
 }

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Add Sales Person</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>






<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Add A New Sales Person</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="salespeople.php">Sales People</a>
                        </li>
                        <li class="active">
                            <strong><a>Add A New Sales Person</a></strong>
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a href="salespeople.php" class="btn btn-primary btn-lg">Sales People</a>                    
                        <a class="btn btn-warning btn-lg">Add A Sales Person</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">







<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Enter All Necessary Information Below <small>This process will create a new sales person in your account.</small></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">


								<div class="form-group">
                                	<label class="col-sm-2 control-label" for="position_title">Job Title:</label>
                                    <div class="col-sm-10">
                                    	<input id="salesperson_job_title" class="form-control" name="salesperson_job_title" type="text" value="" />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



								<div class="form-group">
                                	<label class="col-sm-2 control-label" for="position_title">Job Position:</label>
                                    <div class="col-sm-10">
                                    	<input id="position_title" class="form-control" name="position_title" type="text" value="" />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="team_id">Department Assign<br /> <br />
                                  <small><a href="department.add.php">Create a department</a></small></label>
                                  <div class="col-sm-10">
                                      <select id="salesperson_department_id" class="form-control m-b">
                                            <option value="">Select Department</option>
                                            <?php if($totalRows_find_departments != 0){ do {  ?>
                                            <option value="<?php echo $row_find_departments['dept_id']; ?>"><?php echo $row_find_departments['dept_name']; ?></option>
                                            <?php
                                            } while ($row_find_departments = mysqli_fetch_assoc($find_departments));
                                              $rows = mysqli_num_rows($find_departments);
                                              if($rows > 0) {
                                                  mysqli_data_seek($find_departments, 0);
                                                  $row_find_departments = mysqli_fetch_assoc($find_departments);
                                              }
											}else{
                                            ?>
                                            <option value="<?php echo $dept_id; ?>">Sales Dept.</option>
                                            <?php }?>
                                      </select>
							      </div>
                               </div>

<div class="form-group">
                                  <label class="col-sm-2 control-label" for="team_id">Team Assign <br /> <br />
                                  <small><a href="team.add.php">Create a new team</a></small></label>
                                  
                                  <div class="col-sm-10">
                                        <select id="team_id" class="form-control">
                                          <option value="">Select Team</option>
                                          <?php if($totalRows_find_departments != 0){ do {  ?>
                                                <option value="<?php echo $row_find_dealer_teams['dlr_team_id']; ?>"><?php echo $row_find_dealer_teams['dlr_team_name']; ?></option>
                                            <?php
											} while ($row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams));
											  $rows = mysqli_num_rows($find_dealer_teams);
											  if($rows > 0) {
												  mysqli_data_seek($find_dealer_teams, 0);
												  $row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
											  }
											}else{
                                            ?>
                                            <option value="<?php echo $dlr_team_id; ?>">Team A</option>
                                            <?php } ?>
                                        </select>

                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="salesperson_catchleads">Allow Leads</label>
                                  <div class="col-sm-10">
                                    <select id="salesperson_catchleads" class="form-control m-b" name="salesperson_catchleads">
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="sid_addinv_2main_dealerid">Allow Sales Person <br />
                                  To Edit Inventory<br />Car Photos?</label>
                                  <div class="col-sm-10">
                                    <select id="sid_addinv_2main_dealerid" class="form-control m-b" name="sid_addinv_2main_dealerid">                                     <option value="0" selected="selected">No Inventory Control</option>
                                      <option value="1">Yes Edit Info Only (Live, Sold, Prices, Options etc)</option>
                                      <option value="2">Yes Upload Photos Only (Sort, Delete)</option>
                                      <option value="3">Yes Full Control</option>

                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                <label class="col-sm-2 control-label" for="salesperson_firstname">First Name:</label>

                                    <div class="col-sm-10">
                                    <input id="salesperson_firstname" name="salesperson_firstname" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                <label class="col-sm-2 control-label" for="salesperson_lastname">Last Name:</label>

                                    <div class="col-sm-10">
                                    <input id="salesperson_lastname" name="salesperson_lastname" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                <label class="col-sm-2 control-label" for="salesperson_nickname">Nick Name:</label>

                                    <div class="col-sm-10">
                                    <input id="salesperson_nickname" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                <label class="col-sm-2 control-label" for="salesperson_email">Email:<br />
                                <small>After you click check this box should check telling you it's safe to continue..</small>
                                </label>

                                    <div class="col-sm-10">

                                        <div id="sales_person_email_okaybox" class="input-group m-b">
										
                                        <span class="input-group-addon"> <input id="pass_salesperson_email" type="checkbox" disabled="disabled"> </span>
                                        
                                        <input id="salesperson_email" name="salesperson_email" type="text" class="form-control"> 
                                        <span class="input-group-btn"> 
                                        <button id="check_salesperson_email" type="button" class="btn btn-primary">Check!</button> 
                                        </span>
                                        </div>


                                    <div id="ajax_salesperson_email_results"></div>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_username">User Name:</label>

                                    <div class="col-sm-10">
                                    
                                    <div id="salesperson_username_okaybox"  class="input-group m-b"><span class="input-group-addon">@</span> 
                                    <input id="salesperson_username" name="salesperson_username" type="text" placeholder="Username" class="form-control">
                                        <span class="input-group-btn"> 
                                        <button id="check_salesperson_username" type="button" class="btn btn-primary">Check!</button> 
                                        </span>
                                    </div>
                                    
                                    <div id="ajax_salesperson_username_results"></div>
                                    
                                    </div>
                                
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group "><label class="col-sm-2 control-label" for="salesperson_password">Password:</label>

                                    <div class="col-sm-10"><input id="salesperson_password" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_confirm_password">Confirm <br />Password:</label>

                                    <div class="col-sm-10"><input id="salesperson_confirm_password" type="text" class="form-control">
                                    <input type="hidden" id="password_good" value="0" />
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_mobilephone_number">Mobile Number:</label>

                                    <div class="col-sm-10"><input id="salesperson_mobilephone_number" type="text" class="form-control" data-mask="(999) 999-9999"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label" for="website_url">Website Url:<br />Leave Off <br />http:// and www.<br /></label>

                                    <div class="col-sm-10"><input id="website_url" name="website_url" type="text" class="form-control" placeholder="domain.com"></div>
                                </div>
                                <div class="hr-line-dashed"></div>







                                <div class="form-group"><label class="col-sm-2 control-label" for="sales_pitch">Sales Pitch:</label>

                                    <div class="col-sm-10"><textarea id="sales_pitch" class="form-control textarea" placeholder="Enter Sales Pitch Here"></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_motto">Motto:</label>

                                    <div class="col-sm-10"><input id="prof_motto" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_hometown">Home Town:</label>

                                    <div class="col-sm-10"><input id="prof_hometown" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_sportsteam">Sports Team Name:</label>

                                    <div class="col-sm-10"><input id="prof_sportsteam" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_dreamvact">Dream Vaction:</label>

                                    <div class="col-sm-10"><input id="prof_dreamvact" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_favfood">Favorite Food:</label>

                                    <div class="col-sm-10"><input id="prof_favfood" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_favtvshow">Favorite Tv Show:</label>

                                    <div class="col-sm-10"><input id="prof_favtvshow" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Goal Monthly Cars Sold:</label>
                                    <div class="col-sm-10"><input id="goal_cars_monthly" type="text" class="form-control" data-mask="99"> <span class="help-block m-b-none">How Many Cars Monthly Should Be This Sales Persons Goal/Quota.</span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Goal Monthly Appointments:</label>
                                    <div class="col-sm-10"><input id="goal_appts_monthly" type="text" class="form-control" data-mask="999"> <span class="help-block m-b-none">How Many Appointments Should Be This Sales Persons Goal/Quota.</span>
                                    </div>
                                </div>






                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button id="save_new_salesperson" class="btn btn-primary" type="button">Save changes</button>
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


	<script src="js/custom/page/custom.salesperson.add.js"></script>

</body>

</html>
<?php
mysqli_free_result($find_dealer_teams);

mysqli_free_result($find_departments);
?>
<?php include("inc.end.phpmsyql.php"); ?>
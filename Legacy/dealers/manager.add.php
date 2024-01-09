<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealer_teams = "SELECT * FROM dealers_teams WHERE dealers_teams.dlr_team_did = '$did' AND dealers_teams.dlr_team_status = '1' ORDER BY dealers_teams.dlr_team_name";
$find_dealer_teams = mysqli_query($idsconnection_mysqli, $query_find_dealer_teams);
$row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
$totalRows_find_dealer_teams = mysqli_num_rows($find_dealer_teams);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_departments = "SELECT * FROM dealer_depts WHERE dept_did = '$did' ORDER BY dept_name ASC";
$find_departments = mysqli_query($idsconnection_mysqli, $query_find_departments);
$row_find_departments = mysqli_fetch_assoc($find_departments);
$totalRows_find_departments = mysqli_num_rows($find_departments);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Add Manager</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>






<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Add A New Manager</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="teams.php">Teams</a>
                        </li>
                        <li class="active">
                            <strong><a>Add A New Manager</a></strong>
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a href="managers.php" class="btn btn-primary btn-lg">Manage Managers</a>                    
                        <a class="btn btn-warning btn-lg">Add New Manager</a>
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
                                  <label class="col-sm-2 control-label" for="manager_acct_status">Account Status</label>
                                  <div class="col-sm-10">
                                    <select id="manager_acct_status" class="form-control m-b" name="manager_acct_status">
                                      <option value="1">Active</option>
                                      <option value="0">InActive</option>
                                    </select>
                                  </div>
                                  <input id="acct_status_changed" type="hidden" value="0" />
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Job Title</label>

                                    <div class="col-sm-10">
                                   <input name="manager_title" type="text" class="form-control" id="manager_title" value=""></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                            
                            
                            
                            
                            
                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="manager_department_id">Department Assign<br /> <br />
                                  <small><a href="department.add.php">Create a department</a></small></label>
                                  <div class="col-sm-10">
                   	  <select id="manager_department_id" class="form-control m-b">
<option value="">Select Department</option>
<?php
do {  
?>
<option value="<?php echo $row_find_departments['dept_id']?>"><?php echo $row_find_departments['dept_name']?></option>
<?php
} while ($row_find_departments = mysqli_fetch_assoc($find_departments));
  $rows = mysqli_num_rows($find_departments);
  if($rows > 0) {
      mysqli_data_seek($find_departments, 0);
	  $row_find_departments = mysqli_fetch_assoc($find_departments);
  }
?>
                      </select>
							      </div>
                               </div>

                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="manager_team_id">Team Assign <br /> <br />
                                  <small><a href="team.add.php">Create a new team</a></small></label>
                                  <div class="col-sm-10">
                                    <select id="manager_team_id" class="form-control m-b" name="manager_team_id">
                                      <?php
do {  
?>
                                      <option value="<?php echo $row_find_dealer_teams['dlr_team_id']?>"><?php echo $row_find_dealer_teams['dlr_team_name']?></option>
                                      <?php
} while ($row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams));
  $rows = mysqli_num_rows($find_dealer_teams);
  if($rows > 0) {
      mysqli_data_seek($find_dealer_teams, 0);
	  $row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
  }
?>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="manager_reassign_leads">Reassign Leads</label>
                                  <div class="col-sm-10">
                                    <select id="manager_reassign_leads" class="form-control m-b" name="manager_reassign_leads">
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="manager_approvedeals">Approve Deals</label>
                                  <div class="col-sm-10">
                                    <select id="manager_approvedeals" class="form-control m-b" name="manager_approvedeals">
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="mgrid_addinv_2main_dealerid">Allow Manager <br />
                                  To Edit Inventory<br />Car Photos?</label>
                                  <div class="col-sm-10">
                              <select id="mgrid_addinv_2main_dealerid" class="form-control m-b" name="mgrid_addinv_2main_dealerid">                                     <option value="0" selected="selected">No Inventory Control</option>
                                      <option value="1">Yes Edit Info Only (Live, Sold, Prices, Options etc)</option>
                                      <option value="2">Yes Upload Photos Only (Sort, Delete)</option>
                                      <option value="3">Yes Full Control</option>
                              </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>





                                <div class="form-group"><label class="col-sm-2 control-label" for="manager_firstname">First Name:</label>

                                    <div class="col-sm-10"><input id="manager_firstname" name="manager_firstname" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="manager_lastname">Last Name:</label>

                                    <div class="col-sm-10"><input id="manager_lastname" name="manager_lastname" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="manager_nickname">Nick Name:</label>

                                    <div class="col-sm-10"><input id="manager_nickname" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div id="manager_person_email_okaybox" class="form-group">
                                <label class="col-sm-2 control-label" for="manager_email">Email:<br />
                                <small>After you click check this box should check telling you it's safe to continue..</small>
                                </label>

                                    <div class="col-sm-10">

                                        <div class="input-group m-b">
										
                                        <span class="input-group-addon"> <input id="pass_managerperson_email" type="checkbox" disabled="disabled"> <input id="manager_email_good" type="hidden" value="0" /></span>
                                        
                                        <input id="manager_email" name="manager_email" type="text" class="form-control"> 
                                        <span class="input-group-btn"> 
                                        <button id="check_managerperson_email" type="button" class="btn btn-primary">Check!</button> 
                                        </span>
                                        </div>

										<div id="ajax_manager_email_results"></div>


                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div id="managerperson_username_okaybox" class="form-group"><label class="col-sm-2 control-label" for="manager_username">User Name:</label>

                                    <div class="col-sm-10">
                                    
                                    <div class="input-group m-b"><span class="input-group-addon">@</span> 
                                    <input id="manager_username" name="manager_username" type="text" placeholder="Username" class="form-control">
                                        <span class="input-group-btn"> 
                                        <button id="check_managerperson_username" type="button" class="btn btn-primary">Check!</button> 
                                        </span>
									                                    
                                    </div>
                                    <div id="ajax_managerperson_username_results"></div>

                                    </div>
                                
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="manager_password">Password:</label>

                                    <div class="col-sm-10"><input id="manager_password" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                

                                <div class="form-group"><label class="col-sm-2 control-label" for="confirm_manager_password">Confirm Password:</label>

                                    <div class="col-sm-10"><input id="confirm_manager_password" type="text" class="form-control"></div>
                                    <input id="pass_managerperson_email" name="pass_managerperson_email" type="hidden" value="0" />
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                

                                <div class="form-group"><label class="col-sm-2 control-label">Main Phone Number:</label>

                                    <div class="col-sm-10">
                                   <input name="manager_main_number" type="text" class="form-control" id="manager_main_number" value="" data-mask="(999) 999-9999"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Phone Ext.:</label>

                                    <div class="col-sm-10">
                                   <input name="manager_phone_ext" type="text" class="form-control" id="manager_phone_ext" value=""></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Mobile Phone Number:</label>

                                    <div class="col-sm-10">
                                   <input name="manager_mobilephone_number" type="text" class="form-control" id="manager_mobilephone_number" value="" data-mask="(999) 999-9999"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label" for="website_url">Website Url:</label>

                                    <div class="col-sm-10"><input id="website_url" name="website_url" type="text" class="form-control"></div>
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

                                <div class="form-group"><label class="col-sm-2 control-label" for="team_goal_cars_monthly">Team Goal Monthly Cars Sold:</label>
                                    <div class="col-sm-10"><input id="team_goal_cars_monthly" type="text" class="form-control"> <span class="help-block m-b-none">How Many Cars Monthly Should Be This Sales Persons Goal/Quota.</span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label" for="team_goal_appts_monthly">Team Goal Monthly Appointments:</label>
                                    <div class="col-sm-10"><input id="team_goal_appts_monthly" type="text" class="form-control"> <span class="help-block m-b-none">How Many Appointments Should Be This Sales Persons Goal/Quota.</span>
                                    </div>
                                </div>






                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="managers.php" class="btn btn-white">Cancel</a>
                                        <button id="save_managerperson" class="btn btn-primary" type="button">Save changes</button>
                                    </div>
                                </div>
                            
                            </div><!-- Ended form -->
                            
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


    <script>
        $(document).ready(function(){
            $('.contact-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
	<script src="js/custom/page/custom.managerperson.add.js"></script>

</body>

</html>
<?php
mysqli_free_result($find_dealer_teams);
?>
<?php include("inc.end.phpmsyql.php"); ?>

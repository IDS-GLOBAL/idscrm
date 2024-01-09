<?php require_once("db_loggedin.php"); ?>
<?php

$colname_query_Salesperson = "-1";
if (isset($_GET['sid'])) {
  $colname_query_Salesperson = $_GET['sid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_Salesperson =  "SELECT * FROM `sales_person` WHERE `sales_person`.`salesperson_id` = %s AND `sales_person`.`main_dealerid` = '$did' ", GetSQLValueString($colname_query_Salesperson, "int"));
$query_Salesperson = mysqli_query($idsconnection_mysqli, $query_query_Salesperson);
$row_query_Salesperson = mysqli_fetch_assoc($query_Salesperson);
$totalRows_query_Salesperson = mysqli_num_rows($query_Salesperson);
$salesperson_team_id = $row_query_Salesperson['team_id'];


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
<?php

$salesperson_id = $row_query_Salesperson['salesperson_id'];
if(!$salesperson_id){ header('Location: salespeople.php'); }




?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Sales Person Update</title>

<?php include("inc.head.php"); ?>

    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

<!-- Start Single Profile Photo Modal -->    
                            <div class="modal inmodal" id="salepersonUploadModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Upload Sales Person Profile Photo</h4>
                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row">

                                           		<div class="col-sm-12">
                                                
                                            <div class="form-group">
											<label>Photo Comments: </label>
											<input id="sid_photo_albumcomments" class="form-control" type="text" value="" />
                                            </div>
                                            <div class="form-group">
											<input id="sid_photo_datetaken" class="form-control" type="hidden" value="<?php echo date('Y-m-d'); ?>" />

                                           	<input id="changesalespersonprofilephoto_final" type="hidden" value="1" />
                                            </div>
                                                
                                                </div>
                                           
                                           </div>
                                           <div class="row">
                                           
                                           		<div class="col-sm-12">
                                                
			                                           <div id="sales_person_onedropbox" class="dropzone">	                                                
                                                
                                                </div>
                                           </div>

                                           
                                           </div>
                                           
                                           
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button id="clearall_one" type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            
                                            <button id="savechangeprofile" type="button" class="btn btn-primary">Save And Change Profile</button>
                                            <button id="savephotoonly" type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- End Single Profile Photo Modal -->    





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
                        <li>
                        	<a href="team.php?dlr_team_id=<?php echo $row_query_Salesperson['team_id']; ?>">Sales Team</a>
                            <input id="team_id" value="<?php echo $row_query_Salesperson['team_id']; ?>" type="hidden" />
                        </li>
                        
                        <li class="active">
                            <strong><a>Sales Person Update</a></strong>
                            <input id="salesperson_id" type="hidden" value="<?php echo $sid; ?>" />
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                    
                        <a href="salespeople.php" class="btn btn-primary btn-lg">Sales People</a>                    
                        <a href="salesperson.add.php" class="btn btn-primary btn-lg">Add A Sales Person</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">



<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Sales Person Photo <small>Change Sales Person Photos Or Upload.</small></h5>
                        </div>
                        <div class="ibox-content">
                        
                        <div class="row">
                        	<div class=" col-sm-7">
                        		<div id="sales_person_photo_block">
                                <?php if($row_query_Salesperson['profile_image']): ?>
                                	<img id="salesperson_photo_url" alt="img" src="<?php echo $row_query_Salesperson['profile_image']; ?>"  class="" width="300px" />
                                <?php else: ?>
                                
                                	<img id="salesperson_photo_url" alt="img" src="img/no-pic-avatar.png" class="" width="300px" />
                                
                                <?php endif; ?>
                                </div>
                        	</div>
                           	<div class="col-sm-5">
                            	<a class="btn btn-primary btn-group-lg" data-backdrop="static" data-toggle="modal" data-target="#salepersonUploadModal"> Upload Photo</a>
                                
                                <a id="upload_singlesalespersonphoto">Change Profile Photo</a>
                            	
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
                            <h5>Enter All Necessary Information Below <small>This process will create a new sales person in your account.</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">


								<div class="form-group">
                                	<label class="col-sm-2 control-label" for="position_title">Job Title:</label>
                                    <div class="col-sm-10">
                                    	<input id="salesperson_job_title" class="form-control" name="salesperson_job_title" type="text" value="<?php echo $row_query_Salesperson['salesperson_job_title']; ?>" />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



								<div class="form-group">
                                	<label class="col-sm-2 control-label" for="position_title">Job Position:</label>
                                    <div class="col-sm-10">
                                    	<input id="position_title" class="form-control" name="position_title" type="text" value="<?php echo $row_query_Salesperson['position_title']; ?>" />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                
                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="team_id">Department Assign:<br /> <br />
                                  <small><a href="department.add.php">Create a department</a></small></label>
                                  <div class="col-sm-10">
                   	  <select id="salesperson_department_id" class="form-control m-b">
                   	    <option value="" <?php if (!(strcmp("", $row_query_Salesperson['salesperson_department_id']))) {echo "selected=\"selected\"";} ?>>Select Department</option>
                   	    <?php
do {  
?>
<option value="<?php echo $row_find_departments['dept_id']?>"<?php if (!(strcmp($row_find_departments['dept_id'], $row_query_Salesperson['salesperson_department_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_find_departments['dept_name']?></option>
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
                                  <label class="col-sm-2 control-label" for="thisteam_id">Team Assign: <br /> <br />
                                  <small><a href="team.add.php">Create a new team</a></small></label>
                                  
                                  <div class="col-sm-10">
                                    <select id="thisteam_id" class="form-control m-b" name="thisteam_id">
                                      <?php
do {  
?>
                                      <option value="<?php echo $row_find_dealer_teams['dlr_team_id']?>"<?php if (!(strcmp($row_find_dealer_teams['dlr_team_id'], $row_query_Salesperson['team_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_find_dealer_teams['dlr_team_name']?></option>
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
                                  <label class="col-sm-2 control-label" for="acct_status">User Status:</label>
                                  <div class="col-sm-10">
                                    <select id="acct_status" class="form-control m-b" name="acct_status">
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Salesperson['acct_status']))) {echo "selected=\"selected\"";} ?>>Active</option>
                                      <option value="0" <?php if (!(strcmp(0, $row_query_Salesperson['acct_status']))) {echo "selected=\"selected\"";} ?>>InActive</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="salesperson_catchleads">Allow Leads:</label>
                                  <div class="col-sm-10">
                                    <select id="salesperson_catchleads" class="form-control m-b" name="salesperson_catchleads">
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Salesperson['salesperson_catchleads']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="0" <?php if (!(strcmp(0, $row_query_Salesperson['salesperson_catchleads']))) {echo "selected=\"selected\"";} ?>>No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="sid_addinv_2main_dealerid">Allow Sales Person: <br />
                                  To Edit Inventory<br />Car Photos?</label>
                                  <div class="col-sm-10">
                                    <select id="sid_addinv_2main_dealerid" class="form-control m-b" name="sid_addinv_2main_dealerid"><option value="0" selected="selected" <?php if (!(strcmp(0, $row_query_Salesperson['sid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>No Inventory Control</option>
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Salesperson['sid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>Yes Edit Info Only (Live, Sold, Prices, Options etc)</option>
                                      <option value="2" <?php if (!(strcmp(2, $row_query_Salesperson['sid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>Yes Upload Photos Only (Sort, Delete)</option>
                                      <option value="3" <?php if (!(strcmp(3, $row_query_Salesperson['sid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>Yes Full Control</option>

                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_firstname">First Name:</label>

                                    <div class="col-sm-10"><input name="salesperson_firstname" type="text" class="form-control" id="salesperson_firstname" value="<?php echo $row_query_Salesperson['salesperson_firstname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_lastname">Last Name:</label>

                                    <div class="col-sm-10"><input name="salesperson_lastname" type="text" class="form-control" id="salesperson_lastname" value="<?php echo $row_query_Salesperson['salesperson_lastname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_nickname">Nick Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="salesperson_nickname" value="<?php echo $row_query_Salesperson['salesperson_nickname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                <label class="col-sm-2 control-label" for="salesperson_email">Email:<br />
                                <small>After you click check this box should check telling you it's safe to continue..</small>
                                </label>

                                    <div class="col-sm-10">

                                        <div class="input-group m-b">
										
                                        <span class="input-group-addon"> <input id="pass_salesperson_email" type="checkbox" disabled="disabled"> </span>
                                        
                                        <input name="salesperson_email" type="text" class="form-control" id="salesperson_email" value="<?php echo $row_query_Salesperson['salesperson_email']; ?>"> 
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
                                    
                                    <div class="input-group m-b"><span class="input-group-addon">@</span> 
                                    <input name="salesperson_username" type="text" class="form-control" id="salesperson_username" value="<?php echo $row_query_Salesperson['salesperson_username']; ?>" placeholder="Username">
                                        <span class="input-group-btn"> 
                                        <button id="check_salesperson_username" type="button" class="btn btn-primary">Check!</button> 
                                        </span>
                                    </div>
                                    
                                    <div id="ajax_salesperson_username_results"></div>
                                    
                                    </div>
                                
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_password">Password:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="salesperson_password" value="<?php echo $row_query_Salesperson['salesperson_password']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_confirm_password">Confirm <br />Password:</label>

                                    <div class="col-sm-10"><input id="salesperson_confirm_password" type="text" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="salesperson_mobilephone_number">Mobile Number:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="salesperson_mobilephone_number" value="<?php echo $row_query_Salesperson['salesperson_mobilephone_number']; ?>" data-mask="(999) 999-9999"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label" for="website_url">Website Url:<br />Leave Off <br />http:// and www.<br /></label>

                                    <div class="col-sm-10"><input id="website_url" type="text" class="form-control" value="<?php echo $row_query_Salesperson['website_url']; ?>" placeholder="domain.com"></div>
                                </div>
                                <div class="hr-line-dashed"></div>






                                <div class="form-group"><label class="col-sm-2 control-label" for="sales_pitch">Sales Pitch:</label>

                                    <div class="col-sm-10">
                                    
                                    	<textarea id="sales_pitch" class="form-control textarea"><?php echo $row_query_Salesperson['sales_pitch']; ?></textarea>
                                    
                                    </div>
                                
                                
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_motto">Motto:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_motto" value="<?php echo $row_query_Salesperson['prof_motto']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_hometown">Home Town:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_hometown" value="<?php echo $row_query_Salesperson['prof_hometown']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_sportsteam">Sports Team Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_sportsteam" value="<?php echo $row_query_Salesperson['prof_sportsteam']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_dreamvact">Dream Vaction:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_dreamvact" value="<?php echo $row_query_Salesperson['prof_dreamvact']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_favfood">Favorite Food:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_favfood" value="<?php echo $row_query_Salesperson['prof_favfood']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_favtvshow">Favorite Tv Show:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_favtvshow" value="<?php echo $row_query_Salesperson['prof_favtvshow']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Goal Monthly Cars Sold:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="goal_cars_monthly" value="<?php echo $row_query_Salesperson['goal_cars_monthly']; ?>"> <span class="help-block m-b-none">How Many Cars Monthly Should Be This Sales Persons Goal/Quota.</span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Goal Monthly Appointments:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="goal_appts_monthly" value="<?php echo $row_query_Salesperson['goal_appts_monthly']; ?>"> <span class="help-block m-b-none">How Many Appointments Should Be This Sales Persons Goal/Quota.</span>
                                    </div>
                                </div>






                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="salesperson.php?sid=<?php echo $sid; ?>" class="btn btn-white">Cancel</a>
                                        <button id="update_salesperson" class="btn btn-primary" type="button">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>







        </div>




		<?php include("footer.php"); ?>

        </div>
        </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>


    <script>
        $(document).ready(function(){
            $('.contact-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
	<script src="js/custom/page/custom.salesperson.edit.js"></script>
	<script src="js/custom/page/custom.salesperson.uploadone.js"></script>
</body>

</html>
<?php
mysqli_free_result($find_dealer_teams);

mysqli_free_result($find_departments);
?>
<?php include("inc.end.phpmsyql.php"); ?>

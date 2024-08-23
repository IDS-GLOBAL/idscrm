<?php require_once("db_loggedin.php"); ?>
<?php
$colname_query_Manager = "-1";
if (isset($_GET['mgrid'])) {
  $colname_query_Manager = $_GET['mgrid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_Manager =  sprintf("SELECT * FROM `manager_person` WHERE `manager_person`.`manager_id` = %s AND `manager_person`.`dealer_id` = '$did' ", GetSQLValueString($colname_query_Manager, "int"));
$query_Manager = mysqli_query($idsconnection_mysqli, $query_query_Manager);
$row_query_Manager = mysqli_fetch_assoc($query_Manager);
$totalRows_query_Manager = mysqli_num_rows($query_Manager);
$managerid = $row_query_Manager['manager_id'];

if(!$managerid){ header('Location: managers.php'); }


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

    <title>IDSCRM | Manager Edit</title>

<?php include("inc.head.php"); ?>

    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

<!-- Start Single Profile Photo Modal -->    
                            <div class="modal inmodal" id="managerpersonUploadModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-camera modal-icon"></i>
                                            <h4 class="modal-title">Upload Sales Person Profile Photo</h4>
                                            <small class="font-bold">Upload one photo at a time.</small>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row">

                                           		<div class="col-sm-12">
                                                
                                            <div class="form-group">
											<label>Photo Comments: </label>
											<input id="mgrid_photo_albumcomments" class="form-control" type="text" value="" />
                                            </div>
                                            <div class="form-group">
											<input id="mgrid_photo_datetaken" class="form-control" type="hidden" value="<?php echo date('Y-m-d'); ?>" />

                                           	<input id="changemanagerpersonprofilephoto_final" type="hidden" value="0" />
                                            </div>
                                                
                                                </div>
                                           
                                           </div>
                                           <div class="row">
                                           
                                           		<div class="col-sm-12">
                                                
			                                           <div id="manager_person_onedropbox" class="dropzone">	                                                
                                                
                                                </div>
                                           </div>

                                           
                                           </div>
                                           
                                           
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button id="clearallmgr_one" type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            
                                            <button id="savechangemgrprofile" type="button" class="btn btn-primary">Save And Change Profile</button>
                                            <button id="savemgrphotoonly" type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- End Single Profile Photo Modal -->    




        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        <?php include("_nav_top.php"); ?>
            
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Edit Manager</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Dashboard</a>
                        </li>
                        <li>
                            <a href="team.php?dlr_team_id=<?php echo $row_query_Manager['team_id']; ?>">Team Members</a>
                            
							<input id="team_id" type="hidden" value="<?php echo $row_query_Manager['team_id']; ?>" />
                            <input id="mgrid_photo_team_id" type="hidden" value="<?php echo $row_query_Manager['team_id']; ?>" />
                        </li>
                        <li class="active">
                            <strong>Editing Manager</strong>
							<input id="manager_id" type="hidden" value="<?php echo $row_query_Manager['manager_id']; ?>" />
							
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                    
                        <a href="managers.php" class="btn btn-primary btn-lg">Managers</a>                    
                        <a href="manager.add.php" class="btn btn-primary btn-lg">Add A Manager</a>
                    </div>
                </div>
            </div>
       

			<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Manager Photo <small>Change Manager Photos Or Upload New Ones.</small></h5>
                        </div>
                        <div class="ibox-content">
                        
                        <div class="row">
                        	<div class=" col-sm-7">
                        		<div id="manager_person_photo_block">
                                <?php if($row_query_Manager['profile_image']): ?>
                                	<img id="managerperson_photo_url" alt="img" src="<?php echo $row_query_Manager['profile_image']; ?>"  class="" width="300px" />
                                <?php else: ?>
                                
                                	<img id="managerperson_photo_url" alt="img" src="img/no-pic-avatar.png" class="img-square" width="300px" />
                                
                                <?php endif; ?>
                                </div>
                        	</div>
                           	<div class="col-sm-5">
                            	<a class="btn btn-primary btn-group-lg" data-backdrop="static" data-toggle="modal" data-target="#managerpersonUploadModal"> Upload Photo</a>
                                
                                <a id="upload_singlemanagerpersonphoto">Change Profile Photo</a>
                            	
                            </div>
                            
                        </div>
                            
                            
                        
                        </div>
                    </div>
                </div>
		</div>


       
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edit Manager Below </h5>
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

                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="manager_acct_status">Account Status</label>
                                  <div class="col-sm-10">
                                    <select id="manager_acct_status" class="form-control m-b" name="manager_acct_status">
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Manager['acct_status']))) {echo "selected=\"selected\"";} ?>>Active</option>
                                      <option value="0" <?php if (!(strcmp(0, $row_query_Manager['acct_status']))) {echo "selected=\"selected\"";} ?>>InActive</option>
                                    </select>
                                  </div>
                                  <input id="acct_status_changed" type="hidden" value="0" />
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Job Title</label>

                                    <div class="col-sm-10">
                                   <input name="manager_title" type="text" class="form-control" id="manager_title" value="<?php echo $row_query_Manager['manager_title']; ?>"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>




                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="team_id">Department Assign<br /> <br />
                                  <small><a href="department.add.php">Create a department</a></small></label>
                                  <div class="col-sm-10">
                   	  <select id="manager_department_id" class="form-control m-b">
                   	    <option value="" <?php if (!(strcmp("", $row_query_Manager['manager_department_id']))) {echo "selected=\"selected\"";} ?>>Select Department</option>
                   	    <?php
do {  
?>
<option value="<?php echo $row_find_departments['dept_id']?>"<?php if (!(strcmp($row_find_departments['dept_id'], $row_query_Manager['manager_department_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_find_departments['dept_name']?></option>
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
                                  <label class="col-sm-2 control-label" for="team_id">Team Assign <br /> <br />
                                  <small><a href="team.add.php">Create a new team</a></small></label>
                                  
                                  <div class="col-sm-10">
                                    <select id="manager_team_id" class="form-control m-b" name="team_id">
                                      <?php
do {  
?>
                                      <option value="<?php echo $row_find_dealer_teams['dlr_team_id']?>"<?php if (!(strcmp($row_find_dealer_teams['dlr_team_id'], $row_query_Manager['team_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_find_dealer_teams['dlr_team_name']?></option>
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
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Manager['manager_reassign_leads']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="0" <?php if (!(strcmp(0, $row_query_Manager['manager_reassign_leads']))) {echo "selected=\"selected\"";} ?>>No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="manager_approvedeals">Approve Deals</label>
                                  <div class="col-sm-10">
                                    <select id="manager_approvedeals" class="form-control m-b" name="manager_approvedeals">
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Manager['manager_approvedeals']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="0" <?php if (!(strcmp(0, $row_query_Manager['manager_approvedeals']))) {echo "selected=\"selected\"";} ?>>No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="mgrid_addinv_2main_dealerid">Allow Manager <br />
                                  To Edit Inventory<br />Car Photos?</label>
                                  <div class="col-sm-10">
                              <select id="mgrid_addinv_2main_dealerid" class="form-control m-b" name="mgrid_addinv_2main_dealerid"><option value="0" selected="selected" <?php if (!(strcmp(0, $row_query_Manager['mgrid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>No Inventory Control</option>
                          <option value="1" <?php if (!(strcmp(1, $row_query_Manager['mgrid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>Yes Edit Info Only (Live, Sold, Prices, Options etc)</option>
                    <option value="2" <?php if (!(strcmp(2, $row_query_Manager['mgrid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>Yes Upload Photos Only (Sort, Delete)</option>
                    <option value="3" <?php if (!(strcmp(3, $row_query_Manager['mgrid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>Yes Full Control</option>
                              </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                                                
                                <div class="form-group"><label class="col-sm-2 control-label">First Name:</label>

                                    <div class="col-sm-10"><input id="manager_firstname" name="manager_firstname" type="text" class="form-control" value="<?php echo $row_query_Manager['manager_firstname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Last Name:</label>

                                    <div class="col-sm-10"><input id="manager_lastname" name="manager_lastname" type="text" class="form-control" value="<?php echo $row_query_Manager['manager_lastname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>




                                <div class="form-group">
                                <label class="col-sm-2 control-label" for="manager_nickname">Nick Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="manager_nickname" value="<?php echo $row_query_Manager['manager_nickname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



   <?php if($row_query_Manager['manager_email_verified'] == 'Y'): ?>
   <?php elseif($row_query_Manager['manager_email_verified']== 'N'):  ?>
	<?php else: ?>
    <?php endif; ?>

                                





                                <div class="form-group"><label class="col-sm-2 control-label">Main Phone Number:</label>

                                    <div class="col-sm-10">
                                   <input name="manager_main_number" type="text" class="form-control" id="manager_main_number" value="<?php echo $row_query_Manager['manager_main_number']; ?>" data-mask="(999) 999-9999"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Phone Ext.:</label>

                                    <div class="col-sm-10">
                                   <input name="manager_phone_ext" type="text" class="form-control" id="manager_phone_ext" value="<?php echo $row_query_Manager['manager_phone_ext']; ?>"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Mobile Phone Number:</label>

                                    <div class="col-sm-10">
                                   <input name="manager_mobilephone_number" type="text" class="form-control" id="manager_mobilephone_number" value="<?php echo $row_query_Manager['manager_mobilephone_number']; ?>" data-mask="(999) 999-9999"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                
                                <div class="form-group"><label class="col-sm-2 control-label" for="website_url">Website Url:</label>

                                    <div class="col-sm-10"><input name="website_url" type="text" class="form-control" id="website_url" value="<?php echo $row_query_Manager['website_url']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="sales_pitch">Sales Pitch:</label>

                                    <div class="col-sm-10"><textarea id="sales_pitch" class="form-control textarea" placeholder="Enter Sales Pitch Here"><?php echo $row_query_Manager['sales_pitch']; ?></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_motto">Motto:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_motto" value="<?php echo $row_query_Manager['prof_motto']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_hometown">Home Town:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_hometown" value="<?php echo $row_query_Manager['prof_hometown']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_sportsteam">Sports Team Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_sportsteam" value="<?php echo $row_query_Manager['prof_sportsteam']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_dreamvact">Dream Vaction:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_dreamvact" value="<?php echo $row_query_Manager['prof_dreamvact']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_favfood">Favorite Food:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_favfood" value="<?php echo $row_query_Manager['prof_favfood']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_favtvshow">Favorite Tv Show:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_favtvshow" value="<?php echo $row_query_Manager['prof_favtvshow']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label" for="team_goal_cars_monthly">Team Goal Monthly Cars Sold:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="team_goal_cars_monthly" value="<?php echo $row_query_Manager['team_goal_cars_monthly']; ?>"> <span class="help-block m-b-none">How Many Cars Monthly Should Be This Managers Team Goal/Quota.</span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label" for="team_goal_appts_monthly">Team Goal Monthly Appointments:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="team_goal_appts_monthly" value="<?php echo $row_query_Manager['team_goal_appts_monthly']; ?>"> <span class="help-block m-b-none">How Many Appointments Should Be This Managers Team Goal/Quota.</span>
                                    </div>
                                </div>










                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="managers.php" class="btn btn-white">Cancel</a>
                                        <button id="update_managerperson" class="btn btn-primary" type="button">Save changes</button>
                                    </div>
                                </div>
                            
                            </div><!-- End Horitizontal Old Form -->
                        
                        
                        
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

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>


    <script>
        $(document).ready(function(){
            $('.contact-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
	<script src="js/custom/page/custom.managerperson.edit.js"></script>
	<script src="js/custom/page/custom.managerperson.uploadone.js"></script>
</body>

</html>

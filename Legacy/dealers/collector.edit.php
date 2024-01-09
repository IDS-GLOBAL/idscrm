<?php require_once("db_loggedin.php"); ?>
<?php
$colname_query_Collector = "-1";
if (isset($_GET['collectorid'])) {
  $colname_query_Collector = $_GET['collectorid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_Collector =  "SELECT * FROM `idsids_idsdms`.`account_person` WHERE `account_person`.`account_person_id` = ' $colname_query_Collector' AND `account_person`.`dealer_id` = '$did' ";
$query_Collector = mysqli_query($idsconnection_mysqli, $query_query_Collector);
$row_query_Collector = mysqli_fetch_assoc($query_Collector);
$totalRows_query_Collector = mysqli_num_rows($query_Collector);
$collectorid = $row_query_Collector['account_person_id'];

if(!$collectorid){ header('Location: collectors.php'); }



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

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Collector Edit</title>


<?php include("inc.head.php"); ?>

    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">


<!-- Start Single Profile Photo Modal -->    
                            <div class="modal inmodal" id="accountpersonUploadModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-camera modal-icon"></i>
                                            <h4 class="modal-title">Upload Account Person Profile Photo</h4>
                                            <small class="font-bold">You Also Have The Option Of Uploading An Choosing To Change Profile Photo.</small>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row">

                                           		<div class="col-sm-12">
                                                
                                            <div class="form-group">
											<label>Photo Comments: </label>
											<input id="acid_photo_albumcomments" class="form-control" type="text" value="" />
                                            </div>
                                            <div class="form-group">
											<input id="acid_photo_datetaken" class="form-control" type="hidden" value="<?php echo date('Y-m-d'); ?>" />

                                           	<input id="changeacountpersonprofilephoto_final" type="hidden" value="1" />
                                            </div>
                                                
                                                </div>
                                           
                                           </div>
                                           <div class="row">
                                           
                                           		<div class="col-sm-12">
                                                
			                                           <div id="account_person_onedropbox" class="dropzone">	                                                
                                                
                                                </div>
                                           </div>

                                           
                                           </div>
                                           
                                           
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button id="clearallacct_one" type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            
                                            <button id="savechangeacctprofile" type="button" class="btn btn-primary">Save And Change Profile</button>
                                            <button id="saveacctphotoonly" type="button" class="btn btn-primary">Save changes</button>
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
                    <h2>Edit Collector</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Dashboard</a>
                        </li>
                        <li>
                            <a href="team.php?dlr_team_id=<?php echo $row_query_Collector['team_id']; ?>">Team Members</a>
                            <input id="acid_photo_team_id" type="hidden" value="<?php echo $row_query_Collector['team_id']; ?>" />
                        </li>
                        <li class="active">
                            <strong>Editing Collector</strong>
                            <input id="account_person_id" type="hidden" value="<?php echo $row_query_Collector['account_person_id']; ?>" />
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                    
                        <a href="collectors.php" class="btn btn-primary btn-lg">Collectors</a>                    
                        <a href="collector.add.php" class="btn btn-primary btn-lg">Add A Collector</a>
                    </div>
                </div>
            </div>




			<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Collector Photo <small>Change Collector Photos Or Upload New Ones.</small></h5>
                        </div>
                        <div class="ibox-content">
                        
                        <div class="row">
                        	<div class=" col-sm-7">
                        		<div id="sales_person_photo_block">
                                <?php if($row_query_Collector['profile_image']): ?>
                                	<img id="accountperson_photo_url" alt="img" src="<?php echo $row_query_Collector['profile_image']; ?>"  class="" width="300px" />
                                <?php else: ?>
                                
                                	<img id="accountperson_photo_url" alt="img" src="img/no-pic-avatar.png" class="" width="300px" />
                                
                                <?php endif; ?>
                                </div>
                        	</div>
                           	<div class="col-sm-5">
                            	<a class="btn btn-primary btn-group-lg" data-backdrop="static" data-toggle="modal" data-target="#accountpersonUploadModal"> Upload Photo</a>
                                
                                <a id="upload_singleacountpersonphoto">Change Profile Photo</a>
                            	
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
                            <h5>Edit Collector Below </h5>
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

                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="collector_acct_status">Account Status:</label>
                                  <div class="col-sm-10">
                                    <select id="collector_acct_status" class="form-control m-b" name="collector_acct_status">
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Collector['acct_status']))) {echo "selected=\"selected\"";} ?>>Active</option>
                                      <option value="0" <?php if (!(strcmp(0, $row_query_Collector['acct_status']))) {echo "selected=\"selected\"";} ?>>InActive</option>
                                    </select>
                                  </div>
                                  <input id="acct_status_changed" type="hidden" value="0" />
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="account_title">Job Title:</label>

                                    <div class="col-sm-10">
                                   <input name="account_title" type="text" class="form-control" id="account_title" value="<?php echo $row_query_Collector['account_title']; ?>"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="account_team_id">Team Assign: <br /> <br />
                                  <small><a href="team.add.php">Create a new team</a></small></label>
                                  <div class="col-sm-10">
                                    <select id="account_team_id" class="form-control m-b" name="account_team_id">
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
                                  <label class="col-sm-2 control-label" for="account_department_id">Department Assign:<br /> <br />
                                  <small><a href="department.add.php">Create a department</a></small></label>
                                  <div class="col-sm-10">
                   	  <select id="account_department_id" class="form-control m-b">
                   	    <option value="" <?php if (!(strcmp("", $row_query_Collector['account_department_id']))) {echo "selected=\"selected\"";} ?>>Select Department</option>
                   	    <?php
do {  
?>
<option value="<?php echo $row_find_departments['dept_id']?>"<?php if (!(strcmp($row_find_departments['dept_id'], $row_query_Collector['account_department_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_find_departments['dept_name']?></option>
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
                                  <label class="col-sm-2 control-label" for="account_outgoing_emails">Allow Outgoing Emails:</label>
                                  <div class="col-sm-10">
                                    <select id="account_outgoing_emails" class="form-control m-b" name="account_outgoing_emails">
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Collector['account_outgoing_emails']))) {echo "selected=\"selected\"";} ?>>Yes</option>
                                      <option value="0" <?php if (!(strcmp(0, $row_query_Collector['account_outgoing_emails']))) {echo "selected=\"selected\"";} ?>>No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="acid_addinv_2main_dealerid">Manage System Vehicles:</label>
                                  <div class="col-sm-10">
                                 <select id="acid_addinv_2main_dealerid" class="form-control m-b" name="acid_addinv_2main_dealerid">
                                   <option value="1" <?php if (!(strcmp(1, $row_query_Collector['acid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>YES</option>
                                  <option value="0" <?php if (!(strcmp(0, $row_query_Collector['acid_addinv_2main_dealerid']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>
                                  </div>
                                  <input id="acid_addinv_2main_dealerid_status_changed" type="hidden" value="0" />
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label" for="account_accept_payments">Accept Payments:</label>
                                  <div class="col-sm-10">
                                    <select id="account_accept_payments" class="form-control m-b" name="account_accept_payments">
                                      <option value="1" <?php if (!(strcmp(1, $row_query_Collector['account_accept_payments']))) {echo "selected=\"selected\"";} ?>>YES</option>
                                      <option value="0" <?php if (!(strcmp(0, $row_query_Collector['account_accept_payments']))) {echo "selected=\"selected\"";} ?>>NO</option>
                                    </select>
                                  </div>
                                  <input id="acct_status_changed" type="hidden" value="0" />
                                </div>
                                <div class="hr-line-dashed"></div>



                                
                                <div class="form-group"><label class="col-sm-2 control-label">First Name:</label>

                                    <div class="col-sm-10"><input id="account_firstname" name="account_firstname" type="text" class="form-control" value="<?php echo $row_query_Collector['account_firstname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Last Name:</label>

                                    <div class="col-sm-10"><input id="account_lastname" name="account_lastname" type="text" class="form-control" value="<?php echo $row_query_Collector['account_lastname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>




                                <div class="form-group"><label class="col-sm-2 control-label" for="account_nickname">Nick Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="account_nickname" value="<?php echo $row_query_Collector['account_nickname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">Main Number:</label>

                                    <div class="col-sm-10">
                                   <input name="account_main_number" type="text" class="form-control" id="account_main_number" value="<?php echo $row_query_Collector['account_main_number']; ?>" data-mask="(999) 999-9999"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Main Number Ext:</label>

                                    <div class="col-sm-10">
                                   <input name="account_phone_ext" type="text" class="form-control" id="account_phone_ext" value="<?php echo $row_query_Collector['account_phone_ext']; ?>"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Mobile Phone Number:</label>

                                    <div class="col-sm-10">
                                   <input name="account_mobilephone_number" type="text" class="form-control" id="account_mobilephone_number" value="<?php echo $row_query_Collector['account_mobilephone_number']; ?>" data-mask="(999) 999-9999"></div>
                                    
                                </div>
                                <div class="hr-line-dashed"></div>



                                
                                <div class="form-group"><label class="col-sm-2 control-label" for="website_url">Website Url:</label>

                                    <div class="col-sm-10"><input name="website_url" type="text" class="form-control" id="website_url" value="<?php echo $row_query_Collector['website_url']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>






                                <div class="form-group"><label class="col-sm-2 control-label" for="sales_pitch">Sales Pitch:</label>

                                    <div class="col-sm-10">
                                      <textarea id="sales_pitch" class="form-control textarea"><?php echo $row_query_Collector['sales_pitch']; ?></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_motto">Motto:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_motto" value="<?php echo $row_query_Collector['prof_motto']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_hometown">Home Town:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_hometown" value="<?php echo $row_query_Collector['prof_hometown']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_sportsteam">Sports Team Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_sportsteam" value="<?php echo $row_query_Collector['prof_sportsteam']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_dreamvact">Dream Vaction:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_dreamvact" value="<?php echo $row_query_Collector['prof_dreamvact']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_favfood">Favorite Food:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_favfood" value="<?php echo $row_query_Collector['prof_favfood']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label" for="prof_favtvshow">Favorite Tv Show:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" id="prof_favtvshow" value="<?php echo $row_query_Collector['prof_favtvshow']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label" for="goal_monthly_monies_collect">Goal Monthly Monies Collect:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="goal_monthly_monies_collect" value="<?php echo $row_query_Collector['goal_monthly_monies_collect']; ?>"> <span class="help-block m-b-none">How Many Cars Monthly Should Be This Sales Persons Goal/Quota.</span>
                                    </div>
                                </div>






                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button id="update_accountperson" class="btn btn-primary btn-lg" type="button">Save changes</button>
                                    </div>
                                </div>
                                
                            </div><!-- End Form Horizontal -->
                            
                            
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
	<script src="js/custom/page/custom.collector.edit.js"></script>
	<script src="js/custom/page/custom.collector.uploadone.js"></script>
</body>

</html>

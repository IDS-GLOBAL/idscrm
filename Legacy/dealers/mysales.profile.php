<?php require_once("db_sales_loggedin.php"); ?>
<?php

$against_time_now = date("Y-m-d H:i:s");
$against_time_now = zone_conversion_date($against_time_now, $zone_from, $zone_to);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM deals_bydealer WHERE deal_dealerID = '$did' ORDER BY deal_number DESC, deal_created_at DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_timezones = "SELECT * FROM `calendar|timezones` WHERE timezoneStatus = 1 ORDER BY `UTC offset` ASC";
$query_timezones = mysqli_query($idsconnection_mysqli, $query_query_timezones);
$row_query_timezones = mysqli_fetch_assoc($query_timezones);
$totalRows_query_timezones = mysqli_num_rows($query_timezones);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mobile_carriers = "SELECT * FROM `mobile_carriers` WHERE `mobile_carrier_status` = '1' ORDER BY carrier_label ASC";
$mobile_carriers = mysqli_query($idsconnection_mysqli, $query_mobile_carriers);
$row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers);
$totalRows_mobile_carriers = mysqli_num_rows($mobile_carriers);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Sales Profile: <?php echo $row_userDets['company']; ?></title>

 <script src="https://use.fontawesome.com/94d5a20675.js"></script>
 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">





        <?php include("_sidebar.sales.php"); ?>




                            
                            
                            
                            
        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.sales.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Viewing Sales Profile</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Viewing Sales Profile</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        
        
            
            
            
            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Products <small>Sort, search</small></h5>
                    </div>
                    <div class="productsbox-content">

                        <div class="ibox-content">
                        
                        <div class="row vertical-align">
                        
                        <div class="col-md-4 <?php if($row_userDets['salesperson_mobile_optin'] == 0){ echo 'widget yellow-bg p-xl';  }else if($row_userDets['salesperson_mobile_optin'] == 1){ echo 'widget lazur-bg p-xl'; } ?>">
                        	
                            <div class="col-sm-6">
							<div class="m-b-md">
                                <small> <?php if($row_userDets['salesperson_mobile_optin'] == 0){ echo 'Not Activated';  }else if($row_userDets['salesperson_mobile_optin'] == 1){ echo 'Activated'; } ?></small>
                            </div>
                                                        
							<button id="mobile_activation_btn" class="btn btn-primary dim btn-large-dim m-b-md" type="button"><i class="fa fa-mobile"></i></button>
                            
                            <div>
                            	<span>Click Icon For Settings</span>
                            </div>
                            </div>
                            <div class="col-sm-6">
							
                            	<div class="row">
							<div class="m-b-md">
                                <ul class="list-unstyled m-t-md">
                                	<li><span><strong>Mobile Optin:</strong></span> <span class="has-error"><?php if($row_userDets['salesperson_mobile_optin'] == 0){ echo 'NO!';  }else if($row_userDets['salesperson_mobile_optin'] == 1){ echo 'YES!'; } ?></span></li>
                                	<li><span><strong>Optin Date:</strong></span> <span class="has-error"><?php if(!$row_userDets['salesperson_mobile_optindate']){ echo 'Empty';  }else{ echo $row_userDets['salesperson_mobile_optindate']; } ?></span></li>
                                	<li><span><strong>Carrier:</strong></span> <span class="has-error"><?php if(!$row_userDets['salesperson_mobile_carrier']){ echo 'Empty';  }else{ echo $row_userDets['salesperson_mobile_carrier']; } ?></span></li>
                                	<li><span><strong>Status:</strong></span> <span class="has-error"><?php if($row_userDets['salesperson_mobile_dnc'] == 1){ echo 'NO CONTACT!';  }else if($row_userDets['salesperson_mobile_dnc'] == 0){ echo 'OKAY CONTACT!';; }else{ echo $row_userDets['salesperson_mobile_dnc']; } ?></span></li>
                                </ul>
                              </div> 
                                
                                </div>
                            
                            </div>
                            
                        </div>
                        
                        
                        </div>
                        
                        <div class="row">
                        
                        


                        
<!--                        
                        
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                            </div>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                            </div>
                            <div class="alert alert-warning alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                            </div>
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                            </div>
                            
                            
-->                            
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
                        <h5>Account Information <small>Edit, save</small></h5>
                    </div>
                    <div class="ibox-content">

  
  
  					<div class="form-horizontal">
                        <div class="form-group"><label for="salesperson_timezone" class="col-sm-2 control-label">Time Zone</label>
                        
                            <div class="col-sm-10">
                            <select id="salesperson_timezone" class="form-control m-b" name="salesperson_timezone">
      <option value="" <?php if (!(strcmp("", $row_userDets['salesperson_timezone_id']))) {echo "selected=\"selected\"";} ?>>Select Timezone</option>
      <?php
do {  
?>
      <option value="<?php echo $row_query_timezones['timezone_id']?>"<?php if (!(strcmp($row_query_timezones['timezone_id'], $row_userDets['salesperson_timezone_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_timezones['TimeZone']?></option>
      <?php
} while ($row_query_timezones = mysqli_fetch_assoc($query_timezones));
  $rows = mysqli_num_rows($query_timezones);
  if($rows > 0) {
      mysqli_data_seek($query_timezones, 0);
	  $row_query_timezones = mysqli_fetch_assoc($query_timezones);
  }
?>
    </select>

							<span class="help-block m-b-none"><?php if($row_userDets['salesperson_timezone']){  echo 'Time Zone: '.$row_userDets['salesperson_timezone']; }else{ echo 'Choose Your Time Zone'; } ?></span>

                            </div>
                            
                        </div>


                        <div class="form-group">
                        <label class="col-sm-2 control-label"  for="salesperson_mobile_carrier">Mobile Carrier</label>
                            <div class="col-sm-10">
                            <select id="salesperson_mobile_carrier" class="form-control m-b" name="salesperson_mobile_carrier">
      <option value="" <?php if (!(strcmp("", $row_userDets['salesperson_mobile_carrier_id']))) {echo "selected=\"selected\"";} ?>>Select Mobile Carrier</option>
      <?php
do {  
?>
      <option value="<?php echo $row_mobile_carriers['carrier_id']?>"<?php if (!(strcmp($row_mobile_carriers['carrier_id'], $row_userDets['salesperson_mobile_carrier_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_mobile_carriers['carrier_label']?></option>
      <?php
} while ($row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers));
  $rows = mysqli_num_rows($mobile_carriers);
  if($rows > 0) {
      mysqli_data_seek($mobile_carriers, 0);
	  $row_mobile_carriers = mysqli_fetch_assoc($mobile_carriers);
  }
?>
    </select>
							<span class="help-block m-b-none"><?php if($row_userDets['salesperson_mobile_carrier']){ echo 'On file: '.$row_userDets['salesperson_mobile_carrier']; }else{ echo 'Choose Your Mobile Carrier'; } ?></span>

                            </div>
                        </div>



                        
                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Mobile Number (Cellphone) </label>
                                <div class="col-sm-10">
                    				
                                    <div class="input-group m-b">
                                    <input name="salesperson_mobilephone_number" type="text" class="form-control" id="salesperson_mobilephone_number" value="<?php echo $row_userDets['salesperson_mobilephone_number']; ?>" placeholder="Mobile Number">
                                    <span class="input-group-btn">
                                        <button id="mobile_activation_btn" type="button" class="btn btn-primary"><i class="fa fa-mobile"></i> Mobile Activation!</button>
                                    </span>

                                    </div>
                                    
                                    <span class="help-block m-b-none">(Important: leave off +1, and 1) your mobile for system communications.</span>
                                </div>
                            </div>  
                        



                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Job title</label>
                                <div class="col-sm-10">
                                	<input id="salesperson_job_title" type="text" name="salesperson_job_title" class="form-control" value="<?php echo $row_userDets['salesperson_job_title']; ?>" placeholder="Job Title"> 
                                    <span class="help-block m-b-none">What is your title as a sales person Mr, Miss, Mrs (i.e. it signifies the name)?</span>
                                </div>
                            </div>  

                            <div class="form-group">
                            	<label class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                	<input id="salesperson_firstname" type="text" name="salesperson_firstname" class="form-control" value="<?php echo $row_userDets['salesperson_firstname']; ?>" placeholder="First Name"> 
                                    <span class="help-block m-b-none">What is your first name?</span>
                                </div>
                            </div>  

                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Last Name </label>
                                <div class="col-sm-10">
                                	<input id="salesperson_lastname" type="text" name="salesperson_lastname" class="form-control" value="<?php echo $row_userDets['salesperson_lastname']; ?>" placeholder="Last Name"> 
                                    <span class="help-block m-b-none">What is your last name?</span>
                                </div>
                            </div>  
                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Nick Name </label>
                                <div class="col-sm-10">
                                	<input id="salesperson_nickname" type="text" class="form-control"  name="salesperson_nickname" value="<?php echo $row_userDets['salesperson_nickname']; ?>" placeholder="Nick Name"> 
                                    <span class="help-block m-b-none">Aside from first and last name this name may be over ride your first and last name when displayed on certain places.</span>
                                </div>
                            </div>  
                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Website Url </label>
                                <div class="col-sm-10">
                                	<input id="website_url" type="text" class="form-control" name="website_url" value="<?php echo $row_userDets['website_url']; ?>" placeholder="yourdomain.com"> 
                                    <span class="help-block m-b-none">(Important: leave off www, and http:// ) A personal link to your website.</span>
                                </div>
                            </div>  
                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Postion Title </label>
                                <div class="col-sm-10">
                                	<input id="position_title" type="text" name="position_title" class="form-control" value="<?php echo $row_userDets['position_title']; ?>" placeholder="Postion Title"> 
                                    <span class="help-block m-b-none">The manner in which a person or a thing is placed (i.e. it signifies the place)?</span>
                                </div>
                            </div>  


                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Hometown</label>
                                <div class="col-sm-10">
                                	<input id="prof_motto" type="text"  name="prof_motto" class="form-control" value="<?php echo $row_userDets['prof_motto']; ?>" placeholder="Professional Motto"> 
                                    <span class="help-block m-b-none">What is your motto or favorite saying?</span>
                                </div>
                            </div>  


                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Hometown</label>
                                <div class="col-sm-10">
                                	<input id="prof_hometown" type="text" class="form-control" name="prof_hometown" value="<?php echo $row_userDets['prof_hometown']; ?>" placeholder="Home Town"> 
                                    <span class="help-block m-b-none">What is the name of the place you were born or grew up in?</span>
                                </div>
                            </div>  


                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Dream Vacation</label>
                                <div class="col-sm-10">
                                	<input id="prof_dreamvact" type="text" name="prof_dreamvact" class="form-control" value="<?php echo $row_userDets['prof_dreamvact']; ?>" placeholder="Dream Vacation"> 
                                    <span class="help-block m-b-none">Where would you like people to know where your dream vacation is</span>
                                </div>
                            </div>  

                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Favorite Food</label>
                                <div class="col-sm-10">
                                	<input id="prof_favfood" type="text" name="prof_favfood" class="form-control" value="<?php echo $row_userDets['prof_favfood']; ?>" placeholder="Favorite Food"> 
                                    <span class="help-block m-b-none">Waht is your favorte food or dish?</span>
                                </div>
                            </div>  

                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Favorite Sports Team</label>
                                <div class="col-sm-10">
                                	<input id="prof_sportsteam" type="text" name="prof_sportsteam" class="form-control" value="<?php echo $row_userDets['prof_sportsteam']; ?>" placeholder="Sports Team"> 
                                    <span class="help-block m-b-none">What is your favorte sports team?</span>
                                </div>
                            </div>  

                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Favorite TV Show</label>
                                <div class="col-sm-10">
                                	<input id="prof_favtvshow" type="text" class="form-control" name="prof_favtvshow" value="<?php echo $row_userDets['prof_favtvshow']; ?>" placeholder="Favorite TV Show"> 
                                    <span class="help-block m-b-none">What TV show do you enjoy most in your spare time?</span>
                                </div>
                            </div>  

                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Monthly Car Goal</label>
                                <div class="col-sm-10">
                                	<input id="goal_cars_monthly" type="text" class="form-control" name="goal_cars_monthly" value="<?php echo $row_userDets['goal_cars_monthly']; ?>" placaeholder="60"> 
                                    <span class="help-block m-b-none">Numbers Only: Enter the number of cars you would like to have personalize your progress.</span>
                                </div>
                            </div>  

                            <div class="form-group">
                            	<label class="col-sm-2 control-label">Monthly Appts. </label>
                                <div class="col-sm-10">
                                	<input id="goal_appts_monthly" type="text" class="form-control" name="goal_appts_monthly" value="<?php echo $row_userDets['goal_appts_monthly']; ?>" placeholder="20"> 
                                    <span class="help-block m-b-none">Numbers Only: Enter the number of appts you would like to have personalize your progress.</span>
                                </div>
                            </div>  













						
                        <div class="form-group">
                        		
                               <a id="save_salersperson_settings" class="btn btn-primary btn-rounded btn-block" href="#"><i class="fa fa-floppy-o"></i> Save Changes</a> 
                                
                                
                        </div>







  
  					</div>
  
  
  
  
  
                    

                    </div>
                </div>
              </div>
            </div>

<!--

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



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="profile-settingsbox-content">

                         <div class="ibox-content">
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                            </div>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                            </div>
                            <div class="alert alert-warning alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                            </div>
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                            </div>
                        </div>                   

                    </div>
                </div>
              </div>
            </div>
            


-->






            
        
        
        </div>
        <?php include("footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.mysales.body.php"); ?>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>

<script src="js/custom/page/custom.mysales.profile.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
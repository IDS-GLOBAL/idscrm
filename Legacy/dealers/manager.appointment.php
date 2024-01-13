<?php require_once("db_manager_loggedin.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_system_tasks = "SELECT * FROM `options_task` ORDER BY `task_id` ASC";
$system_tasks = mysqli_query($idsconnection_mysqli, $query_system_tasks);
$row_system_tasks = mysqli_fetch_assoc($system_tasks);
$totalRows_system_tasks = mysqli_num_rows($system_tasks);




$colname_quick_appointment = "-1";
if (isset($_GET['appt_token'])) {
  $colname_quick_appointment = $_GET['appt_token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_quick_appointment =  sprintf("SELECT * FROM `dealers_appointments` WHERE `dlr_appt_token` = %s", GetSQLValueString($colname_quick_appointment, "text"));
$quick_appointment = mysqli_query($idsconnection_mysqli, $query_quick_appointment);
$row_quick_appointment = mysqli_fetch_assoc($quick_appointment);
$totalRows_quick_appointment = mysqli_num_rows($quick_appointment);






?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Viewing Appointment</title>
        <link href="css/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Mainly scripts -->

<?php include("inc.head.php"); ?>

<style type="text/css">

</style>

<body>

    <div id="wrapper">
        <?php include("_sidebar.php"); ?>


        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>View/Edit Appointment</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.appointments.php">Appointments</a>
                        </li>
                        <li class="active">
                            <strong>View/Edit Appointment</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


        <div class="wrapper wrapper-content">
 <div class="ibox-content">
			<div class="row">
            	<div class="col-lg-12">





                                <div class="row">




<hr />
<h3 id="linked-pickers">Enter The Time Start And End Of Appointment!</h3>
<div class="container">







<div class="row">
                <label>Appointment Complete</label>
                <input <?php if (!(strcmp($row_quick_appointment['appointment_completed'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" class="js-switch" id="appointment_completed" value="1" />
            <div class="hr-line-dashed"></div>

</div>




                    <div class="row">
                        <div class="col-md-6">
                        
                        

                        
                        
                        
                        </div>
                    </div>


		<div class="row">

			<!-- button id="dosomething" class="btn btn-primary btn-lg">Do Something</button -->




			<hr />
		</div>


<div class="row">
    <div class='col-md-6'>
    <label>Appointment Action</label>
    <input id="dlr_appt_id"  name="dlr_appt_id" type="hidden" value="<?php echo $row_quick_appointment['dlr_appt_id']; ?>" />
        <div class="form-group">
  <select id="task_action" class="form-control m-b" name="task_action">
    <option value="" <?php if (!(strcmp("", $row_quick_appointment['dlr_appt_task_action_id']))) {echo "selected=\"selected\"";} ?>>Select Action</option>
    <?php
do {  
?>
    <option value="<?php echo $row_system_tasks['task_action']?>"<?php if (!(strcmp($row_system_tasks['task_action'], $row_quick_appointment['dlr_appt_task_action_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_system_tasks['task_label']?></option>
    <?php
} while ($row_system_tasks = mysqli_fetch_assoc($system_tasks));
  $rows = mysqli_num_rows($system_tasks);
  if($rows > 0) {
      mysqli_data_seek($system_tasks, 0);
	  $row_system_tasks = mysqli_fetch_assoc($system_tasks);
  }
?>
  </select>
        </div>
    </div>
 </div>







                                    <div class="row">
                                        <div class="col-md-6">



									<div class="panel panel-warning">
                                        <div class="panel-heading">
                            <h3 id="inline">Time &amp; Date Picker</h3>
                                        </div>
                                        <div id="timepicker_panel" class="panel-body" align="center">
                                        	<div id="datetimepicker12"></div>
                                        </div>
                                    </div>

                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>







 <div class="row">
    <div class='col-md-6'>
        <div class="form-group">
            <label>Appointment Name:</label>
            <div class='' id='newappointment_title'>
                <input name="dlr_appt_title" type='text' class="form-control" id="dlr_appt_title" value="<?php echo $row_quick_appointment['dlr_appt_title']; ?>" />
                
            </div>
        </div>
    </div>
 </div>





<div class="row">
    <div class='col-md-6'>
    <label>Pick Who This Appointment Is For:</label>


<div class="row" align="justify">

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_appointment_sales_person" class="btn btn-primary">Sales Person</button>
        </div>
        
	</div>

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_appointment_manager_person" class="btn btn-primary">Manager</button>
        </div>
        
	</div>


    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_appointment_account_person" class="btn btn-primary">Collector</button>
        </div>
        
	</div>

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_appointment_repair_shops" class="btn btn-primary">Repair Shop</button>
        </div>
        
	</div>

</div>        
        
        
        
        
        
    </div>
 </div>

<div id="see_appointment_sales_team" class="row" style="display: block;">
    <div class='col-md-6'>
    <label>Assign Appointment To Sales Team:</label>
        <div class="form-group">
  <select id="dlr_appt_sid" class="form-control m-b" name="dlr_appt_sid">
    <option value="0" <?php if (!(strcmp(0, $row_quick_appointment['dlr_appt_sid']))) {echo "selected=\"selected\"";} ?>>House</option>
    <?php
do {  
?>
    <option value="<?php echo $row_true_salesperson['salesperson_id']?>"<?php if (!(strcmp($row_true_salesperson['salesperson_id'], $row_quick_appointment['dlr_appt_sid']))) {echo "selected=\"selected\"";} ?>><?php echo $row_true_salesperson['salesperson_firstname']?></option>
    <?php
} while ($row_true_salesperson = mysqli_fetch_assoc($true_salesperson));
  $rows = mysqli_num_rows($true_salesperson);
  if($rows > 0) {
      mysqli_data_seek($true_salesperson, 0);
	  $row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
  }
?>
  </select>
        </div>
    </div>
 </div>



<div id="see_appointment_manager_team" class="row" style="display: none;">
    <div class='col-md-6'>
    <label>Assign Appointment Oversee From Manager Team:</label>
        <div class="form-group">
  <select id="task_mgr_id" class="form-control m-b" name="task_mgr_id">
    <option value="0" <?php if (!(strcmp(0, $row_quick_appointment['dlr_appt_mgr_id']))) {echo "selected=\"selected\"";} ?>>House</option>
    <?php
do {  
?>
    <option value="<?php echo $row_manager_nav['manager_id']?>"<?php if (!(strcmp($row_manager_nav['manager_id'], $row_quick_appointment['dlr_appt_mgr_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_manager_nav['manager_firstname']?></option>
    <?php
} while ($row_manager_nav = mysqli_fetch_assoc($manager_nav));
  $rows = mysqli_num_rows($manager_nav);
  if($rows > 0) {
      mysqli_data_seek($manager_nav, 0);
	  $row_manager_nav = mysqli_fetch_assoc($manager_nav);
  }
?>
  </select>
        </div>
    </div>
 </div>





<div id="see_appointment_collectors_team" class="row" style="display: none;">
    <div class='col-md-6'>
    <label>Assign Appointment From Collectors Team:</label>
        <div class="form-group">
  <select id="dlr_appt_acid" class="form-control m-b" name="dlr_appt_acid">
    <option value="0" <?php if (!(strcmp(0, $row_quick_appointment['dlr_appt_acid']))) {echo "selected=\"selected\"";} ?>>House</option>
    <?php
do {  
?>
    <option value="<?php echo $row_acct_rep_nav['account_person_id']?>"<?php if (!(strcmp($row_acct_rep_nav['account_person_id'], $row_quick_appointment['dlr_appt_acid']))) {echo "selected=\"selected\"";} ?>><?php echo $row_acct_rep_nav['account_firstname']?></option>
    <?php
} while ($row_acct_rep_nav = mysqli_fetch_assoc($acct_rep_nav));
  $rows = mysqli_num_rows($acct_rep_nav);
  if($rows > 0) {
      mysqli_data_seek($acct_rep_nav, 0);
	  $row_acct_rep_nav = mysqli_fetch_assoc($acct_rep_nav);
  }
?>
  </select>

        </div>
    </div>
 </div>

<div id="see_appointment_repair_shops" class="row" style="display: none;">
    <div class='col-md-6'>
    <label>Assign Appointment For Repair Shop(s):</label>
        <div class="form-group">
  <select id="dlr_appt_reprshop_id" class="form-control m-b" name="dlr_appt_reprshop_id">
    <option value="0" <?php if (!(strcmp(0, $row_quick_appointment['dlr_appt_reprshop_id']))) {echo "selected=\"selected\"";} ?>>No Repair Shop</option>
    <?php
	if($totalRows_repair_shops != 0):
	do {  
	?>
<option value="<?php echo $row_repair_shops['repairshops_id']?>"<?php if (!(strcmp($row_repair_shops['repairshops_id'], $row_quick_appointment['dlr_appt_reprshop_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_repair_shops['repairshops_company_name']?></option>
<?php } while ($row_repair_shops = mysqli_fetch_assoc($repair_shops));
  $rows = mysqli_num_rows($repair_shops);
  if($rows > 0) {
      mysqli_data_seek($repair_shops, 0);
	  $row_repair_shops = mysqli_fetch_assoc($repair_shops);
  }
  endif;
?>
  </select>
        </div>
    </div>
 </div>




 <div class="row">
    <div class='col-md-6'>
        <div class="form-group">
           <label class="font-normal">Time To Start Appointment <small>Use Time Picker At Top To Change</small></label>
           <div class="form-group">
				<input class="form-control" id="dlr_appt_starttime_humanread" value="<?php echo $row_quick_appointment['dlr_appt_starttime_humanread']; ?>" disabled>
           </div>
            <div class='input-group date' id='newappointmentstart' style="display:none;">
                <input name="dlr_appt_startunixtime" type='text' class="form-control" id="dlr_appt_startunixtime" value="<?php echo $row_quick_appointment['dlr_appt_startunixtime']; ?>" disabled="true" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
 </div>
 
    <div class="row">
    	<div class="col-md-6">
 
     <div class="col-md-6">
       <label class="font-normal">How Long Is This Appointment?</label>
        <div class="form-group">
    
            <div class="m-r-md inline">
            <select id="appointment_snooze" class="form-control m-b">
            	<option value="15">15 Minutes</option>
            	<option value="30">30 Minutes</option>
            	<option value="45">45 Minutes</option>
            	<option value="60" selected>1 Hour Even</option>
            	<option value="90">1 Hour 30 Mins.</option>
            	<option value="120">2 Hours</option>
                
            </select>
            </div>
            
            
            
            
        </div>
    </div>

 
        
        </div>
    </div>
    
 <div class="row">
    <div class='col-md-6'>
        <div class="form-group">
            <label class="font-normal">Time To End Appointment:</label>

           <div class="form-group">
				<input class="form-control" id="dlr_appt_endtime_humanread" value="<?php echo $row_quick_appointment['dlr_appt_endtime_humanread']; ?>" disabled>
           </div>
            
            <div class='input-group date' id='newappointmentend' style="display:none;">
                <input name="dlr_appt_endunixtime" type='text' class="form-control" id="dlr_appt_endunixtime" value="<?php echo $row_quick_appointment['dlr_appt_endunixtime']; ?>" disabled="true" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
 </div>


 <div class="row">
    <div class='col-md-6'>
       <label class="font-normal">Appointment Message:</label>
        <div class="form-group">
        <textarea class="form-control message-input" name="dlr_appt_notes" id="dlr_appt_notes" placeholder="Enter Appointment Message"><?php echo $row_quick_appointment['dlr_appt_notes']; ?></textarea>
                        
        </div>
    </div>
 </div>

 <div class="row">
    <div class='col-md-6'>
       <label class="font-normal">Remind Me By Sending An Email Alert:</label>
        <div class="form-group">
        <input <?php if (!(strcmp($row_quick_appointment['dlr_appt_robot_sendemail'],1))) {echo "checked=\"checked\"";} ?> name="dlr_appt_robot_sendemail" type="checkbox" class="robot_sendemail" id="dlr_appt_robot_sendemail" value="1" >
                        
        </div>





    






    
    </div>
 </div>
 
 
</div>

</div>
                    
                    
                </div>
            </div>
                                           <div class="hr-line-dashed"></div>

          </div>
            
            
            <div class="row" style="display:none;">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content no-padding">

                     <div class="summernote"><?php echo $row_quick_appointment['dlr_appt_notes']; ?></div>

                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button id="saveOldAppointment" class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        
		
        <?php include("footer.php"); ?>

        </div>
    
    </div>

<?php include("inc.end.body.php"); ?>
    
			<script src="js/moment-with-locales.js"></script>
			<script src="js/plugins/bootstrap-datetime/bootstrap-datetimepicker.js"></script>



    <script type="text/javascript">
        $(function () {
            $('#datetimepicker12').datetimepicker({
                inline: true,
                sideBySide: true
            });
        });
    </script>


<script src="js/custom/page/custom.appointment.js"></script>



</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
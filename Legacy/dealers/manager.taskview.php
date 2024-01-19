<?php require_once("db_manager_loggedin.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_system_tasks = "SELECT * FROM options_task ORDER BY task_id ASC";
$system_tasks = mysqli_query($idsconnection_mysqli, $query_system_tasks);
$row_system_tasks = mysqli_fetch_assoc($system_tasks);
$totalRows_system_tasks = mysqli_num_rows($system_tasks);

$colname_find_singledealertask = "-1";
if (isset($_GET['task_token'])) {
  $colname_find_singledealertask = $_GET['task_token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singledealertask =  "SELECT * FROM `dealers_tasks` WHERE `dealers_tasks`.`task_did` = '$did' AND `dealers_tasks`.`task_token` = %s", GetSQLValueString($colname_find_singledealertask, "text"));
$find_singledealertask = mysqli_query($idsconnection_mysqli, $query_find_singledealertask);
$row_find_singledealertask = mysqli_fetch_assoc($find_singledealertask);
$totalRows_find_singledealertask = mysqli_num_rows($find_singledealertask);







?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Viewing Task</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">
        <?php include("_sidebar.manager.php"); ?>


        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.manager.php"); ?>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>View/Edit Task</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.tasks.php">View Tasks</a>
                        </li>
                        <li class="active">
                            <strong>View/Edit Task</strong>
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
<h3 id="linked-pickers">Enter The Time Start And End Of This Task!</h3>
<div class="container">

<div class="row">
                <label>Mark Complete</label>
                <input <?php if (!(strcmp($row_find_singledealertask['task_completed'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" class="js-switch" id="task_completed" value="1" />
            <div class="hr-line-dashed"></div>

</div>
<div class="row">
    <div class='col-md-5'>
    <label>Select An Action</label>
    <input id="task_id"  name="task_id" type="hidden" value="<?php echo $row_find_singledealertask['task_id']; ?>" />
        <div class="form-group">
  <select id="task_action" class="form-control m-b" name="task_action">
    <option value="" <?php if (!(strcmp("", $row_find_singledealertask['task_action_id']))) {echo "selected=\"selected\"";} ?>>Select Action</option>
    <?php
do {  
?>
    <option value="<?php echo $row_system_tasks['task_action']?>"<?php if (!(strcmp($row_system_tasks['task_action'], $row_find_singledealertask['task_action_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_system_tasks['task_label']?></option>
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
    <div class='col-md-5'>
        <div class="form-group">
            <label class="font-noraml">Task Title:</label>
            <div class='' id='newtask_title'>
                <input name="task_title" type='text' class="form-control" id="task_title" value="<?php echo $row_find_singledealertask['task_title']; ?>" />
                
            </div>
        </div>
    </div>
 </div>





<div class="row">
    <div class='col-md-5'>
    <label>Pick Who To Assign This Task To?</label>


<div class="row" align="justify">

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_task_sales_person" class="btn btn-primary">Sales Person</button>
        </div>
        
	</div>

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_task_manager_person" class="btn btn-primary">Manager</button>
        </div>
        
	</div>


    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_task_account_person" class="btn btn-primary">Collector</button>
        </div>
        
	</div>

    <div class='col-md-3'>

        <div class="form-group">
			<button id="switch_task_repair_shops" class="btn btn-primary">Repair Shop</button>
        </div>
        
	</div>

</div>        
        
        
        
        
        
    </div>
 </div>

<div id="see_task_sales_team" class="row" style="display: block;">
    <div class='col-md-5'>
    <label>Assign Task To Sales Team:</label>
        <div class="form-group">
  <select id="task_sid" class="form-control m-b" name="task_sid">
    <option value="0" <?php if (!(strcmp(0, $row_find_singledealertask['task_sid']))) {echo "selected=\"selected\"";} ?>>Just Me</option>
    <?php
do {  
?>
    <option value="<?php echo $row_true_salesperson['salesperson_id']?>"<?php if (!(strcmp($row_true_salesperson['salesperson_id'], $row_find_singledealertask['task_sid']))) {echo "selected=\"selected\"";} ?>><?php echo $row_true_salesperson['salesperson_firstname']?></option>
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



<div id="see_task_manager_team" class="row" style="display: none;">
    <div class='col-md-5'>
    <label>Assign Task Oversee From Manager Team:</label>
        <div class="form-group">
  <select id="task_mgr_id" class="form-control m-b" name="task_mgr_id">
    <option value="0" <?php if (!(strcmp(0, $row_find_singledealertask['task_mgr_id']))) {echo "selected=\"selected\"";} ?>>Just Me</option>
    <?php
do {  
?>
    <option value="<?php echo $row_manager_nav['manager_id']?>"<?php if (!(strcmp($row_manager_nav['manager_id'], $row_find_singledealertask['task_mgr_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_manager_nav['manager_firstname']?></option>
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





<div id="see_task_collectors_team" class="row" style="display: none;">
    <div class='col-md-5'>
    <label>Assign Task From Collectors Team:</label>
        <div class="form-group">
  <select id="task_acid" class="form-control m-b" name="task_acid">
    <option value="0" <?php if (!(strcmp(0, $row_find_singledealertask['task_acid_id']))) {echo "selected=\"selected\"";} ?>>Just Me</option>
    <?php
do {  
?>
    <option value="<?php echo $row_acct_rep_nav['account_person_id']?>"<?php if (!(strcmp($row_acct_rep_nav['account_person_id'], $row_find_singledealertask['task_acid_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_acct_rep_nav['account_firstname']?></option>
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

<div id="see_task_repair_shops" class="row" style="display: none;">
    <div class='col-md-5'>
    <label>Assign Task For Repair Shop(s):</label>
        <div class="form-group">
  <select id="task_reprshop_id" class="form-control m-b" name="task_reprshop_id">
    <option value="0" <?php if (!(strcmp(0, $row_find_singledealertask['task_reprshop_id']))) {echo "selected=\"selected\"";} ?>>No Repair Shop</option>
    <?php If($totalRows_repair_shops != 0): do {  ?>
<option value="<?php echo $row_repair_shops['repairshops_id']?>"<?php if (!(strcmp($row_repair_shops['repairshops_id'], $row_find_singledealertask['task_reprshop_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_repair_shops['repairshops_company_name']?></option>
<?php } while ($row_repair_shops = mysqli_fetch_assoc($repair_shops));
  $rows = mysqli_num_rows($repair_shops);
  if($rows > 0) {
      mysqli_data_seek($repair_shops, 0);
	  $row_repair_shops = mysqli_fetch_assoc($repair_shops);
  } endif; 
?>
  </select>
        </div>
    </div>
 </div>




 <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
           <label class="font-normal">Time To Start Task:</label>
            <div class='input-group date' id='newtaskstart'>
                <input name="taskstart_unixtime" type='text' class="form-control" id="taskstart_unixtime" value="<?php echo $row_find_singledealertask['taskstart_unixtime']; ?>" disabled="true" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
 </div>

 <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
            <label class="font-normal">Time To End Task:</label>
            <div class='input-group date' id='newtaskend'>
                <input name="taskend_unixtime" type='text' class="form-control" id="taskend_unixtime" value="<?php echo $row_find_singledealertask['taskend_unixtime']; ?>" disabled="true" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
 </div>


 <div class="row">
    <div class='col-md-5'>
       <label class="font-normal">Task Message:</label>
        <div class="form-group">
        <textarea class="form-control message-input" name="task_message" id="task_message" placeholder="Enter Task Message"><?php echo $row_find_singledealertask['task_message']; ?></textarea>
                        
        </div>
    </div>
 </div>

 <div class="row">
    <div class='col-md-5'>
       <label class="font-normal">Remind Me By Sending An Email Alert:</label>
        <div class="form-group">
        <input <?php if (!(strcmp($row_find_singledealertask['robot_sendemail'],1))) {echo "checked=\"checked\"";} ?> name="robot_sendemail" type="checkbox" class="robot_sendemail" id="robot_sendemail" value="1" >
                        
        </div>
    <div class="col-md-4">
       <label class="font-normal">Snooze For How Many Minutes:</label>
        <div class="form-group">
    
            <div class="m-r-md inline">
                <input type="text" class="dial m-r-sm" id="task_snooze" value="<?php echo $row_find_singledealertask['task_snooze']; ?>" data-fgColor="#1AB394" data-width="85" data-height="85" />
            </div>
        </div>
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

                     <div class="summernote"><?php echo $row_find_singledealertask['task_message']; ?></div>

                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button id="saveOldTask" class="btn btn-primary" type="submit">Save changes</button>
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
<script src="js/custom/page/custom.taskview.js"></script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
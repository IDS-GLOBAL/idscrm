<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealer_teams = "SELECT * FROM `idsids_idsdms`.`dealers_teams` WHERE `dealers_teams`.`dlr_team_did` = '$did' AND `dealers_teams`.`dlr_team_status` = '1' ORDER BY `dealers_teams`.`dlr_team_name`";
$find_dealer_teams = mysqli_query($idsconnection_mysqli, $query_find_dealer_teams);
$row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
$totalRows_find_dealer_teams = mysqli_num_rows($find_dealer_teams);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_Managers = "SELECT * FROM `idsids_idsdms`.`manager_person` WHERE dealer_id =  '$did' ORDER BY manager_lastname ASC";
$Managers = mysqli_query($idsconnection_mysqli, $query_Managers);
$row_Managers = mysqli_fetch_assoc($Managers);
$totalRows_Managers = mysqli_num_rows($Managers);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_hours = "SELECT * FROM `idsids_idsdms`.`time_hours_1`";
$query_hours = mysqli_query($idsconnection_mysqli, $query_query_hours);
$row_query_hours = mysqli_fetch_assoc($query_hours);
$totalRows_query_hours = mysqli_num_rows($query_hours);

$colname_find_dlr_department = "-1";
if (isset($_GET['dept_id'])) {
  $colname_find_dlr_department = $_GET['dept_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_department =  "SELECT * FROM `idsids_idsdms`.`dealer_depts` WHERE `dept_id` = '$colname_find_dlr_department' AND dept_did = '$did' ";
$find_dlr_department = mysqli_query($idsconnection_mysqli, $query_find_dlr_department);
$row_find_dlr_department = mysqli_fetch_assoc($find_dlr_department);
$totalRows_find_dlr_department = mysqli_num_rows($find_dlr_department);
$dept_id = $row_find_dlr_department['dept_id'];

if(!$dept_id){header('Location: departments.php'); }

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Edit Department</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>






<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Update This Department</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="departments.php">Departments</a>
                        </li>
                        <li class="active">
                            <strong><a>Update This  Department</a></strong>
                          <input name="dept_id" type="hidden" id="dept_id" value="<?php echo $row_find_dlr_department['dept_id']; ?>" />
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a href="departments.php" class="btn btn-primary btn-lg">Depatments</a>                    
                        <a href="department.add.php" class="btn btn-primary btn-lg">Add New Department</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">









	<div class="col-lg-12">

            <div class="row">
            
            <div class="col-md-6">
            
                <div class="">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Department Info: Hours, Manager, &amp; Special Holidays</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                    <div class="ibox-content">




					<div class="">

                                <form role="form">
                                    
                                    
                            <div class="form-group">
                            <label for="dept_name">Department Name:</label> <input type="text" class="form-control" id="dept_name" value="<?php echo $row_find_dlr_department['dept_name']; ?>" placeholder="Department Name">
                            
                            <input id="dept_did" name="dept_did" type="hidden" value="<?php echo $did; ?>" />
                            
                            <input id="dept_link" name="dept_link" type="hidden" class="form-control" />
                            
                            </div>
                                    
                                    
                                    
                            <div class="form-group">
                            <label for="dept_phoneno">Department Phone Number</label> <input name="dept_phoneno" type="text" class="form-control" id="dept_phoneno" value="<?php echo $row_find_dlr_department['dept_phoneno']; ?>" data-mask="(999) 999-9999" placeholder="Department Phone Number" >
                            </div>




                            <div class="form-group">
                            <label for="dept_address">Department Address: </label> <input name="dept_address" type="text" class="form-control" id="dept_address" value="<?php echo $row_find_dlr_department['dept_address']; ?>" placeholder="Department Address">
                            </div>






							<h3 class="font-bold">Department Hours</h3>




									<div class="form-group">
										<label class="col-sm-2 control-label">Monday:</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-5">
                                            <label>Open:</label>

                                            <select class="form-control m-b" id="monday_open" name="monday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['monday_open']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['monday_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-md-5">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="monday_closed" name="monday_closed">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['monday_closed']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['monday_closed']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>


									<div class="form-group">
										<label class="col-sm-2 control-label" for="tuesday_open">Tuesday:</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-5">
                                            <label>Open:</label>

                                            <select class="form-control m-b" name="tuesday_open" id="tuesday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['tuesday_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['tuesday_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-md-5">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="tuesday_closed" name="tuesday_closed">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['tuesday_closed']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['tuesday_closed']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>



									<div class="form-group">
										<label class="col-sm-2 control-label">Wednesday:</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-5">
                                            <label>Open:</label>

                                            <select class="form-control m-b" id="wednesday_open" name="wednesday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['wednesday_open']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['wednesday_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-md-5">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="wednesday_closed" name="wednesday_closed">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['wednesday_closed']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['wednesday_closed']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>



									<div class="form-group">
										<label class="col-sm-2 control-label">Thursday:</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-5">
                                            <label>Open:</label>

                                            <select class="form-control m-b" id="thursday_open" name="thursday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['thursday_open']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['thursday_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-md-5">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="thursday_closed" name="thursday_closed">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['thursday_closed']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['thursday_closed']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>




									<div class="form-group">
										<label class="col-sm-2 control-label">Friday:</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-5">
                                            <label>Open:</label>

                                            <select class="form-control m-b" id="friday_open" name="friday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['friday_open']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['friday_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-md-5">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="friday_closed" name="friday_closed">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['friday_closed']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['friday_closed']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>



									<div class="form-group">
										<label class="col-sm-2 control-label">Saturday:</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-5">
                                            <label>Open:</label>

                                            <select class="form-control m-b" id="saturday_open" name="saturday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['saturday_closed']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['saturday_closed']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-md-5">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="saturday_closed" name="saturday_closed">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['saturday_closed']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['saturday_closed']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>



									<div class="form-group">
										<label class="col-sm-2 control-label">Sunday:</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            
                                            
                                            <div class="col-md-5">
                                            <label>Open:</label>

                                            <select class="form-control m-b" id="sunday_open" name="sunday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['sunday_open']))) {echo "selected=\"selected\"";} ?>>Closed
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['sunday_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-md-5">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="sunday_closed" name="sunday_closed">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['sunday_closed']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['sunday_closed']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>








								<div class="clearfix"></div>




                                   
                                    
                                    
                                    
                                </form>
                    
                    
                    </div>





                    </div>
                    </div>
                </div>
            
            </div>    

            <div class="col-sm-6">
                            
                <div class="">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Assign Manager</h5>
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



									<div class="form-group">
                                    <label>Department Manager:</label>
									<select id="dept_mgr_id" class="form-control m-b" name="dept_mgr_id">
									  <option value="" <?php if (!(strcmp("", $row_find_dlr_department['dept_mgr_id']))) {echo "selected=\"selected\"";} ?>>No One</option>
									  <?php
									if($totalRows_Managers != 0):
do {  
?>
									  <option value="<?php echo $row_Managers['manager_id']?>"<?php if (!(strcmp($row_Managers['manager_id'], $row_find_dlr_department['dept_mgr_id']))) {echo "selected=\"selected\"";} ?>>"<?php echo $row_Managers['manager_lastname']?>, <?php echo $row_Managers['manager_firstname']?> "<?php echo $row_Managers['manager_email']?>"</option>
									  <?php
} while ($row_Managers = mysqli_fetch_assoc($Managers));
  $rows = mysqli_num_rows($Managers);
  if($rows > 0) {
      mysqli_data_seek($Managers, 0);
	  $row_Managers = mysqli_fetch_assoc($Managers);
  }
  endif;
?>
                                    </select>
                                    </div>
                        
									<div class="hr-line-dashed"></div>




                <div class="form-group">
				<label>Department Status:</label>
				<select name="dept_status" id="dept_status" class="form-control">
                	<option value="0">InActive</option>
                    <option value="1" selected="selected">Active</option>
                </select>
				</div>

                        
                        
									<div class="hr-line-dashed"></div>                        
                        
                         <div class="clearfix"></div>                     
                        
                        </div>
                    </div>
                </div>
                
                
                
                <div class="">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>System Important Dates</h5>
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
                            </div>
                        </div>
                        <div class="ibox-content">
                        



									<h3 class="m-t-none m-b">&amp; Special Holidays</h3>

									<div class="form-group">
                                    <label>New Years Eve:</label>
									<input name="new_yearseve_comments" type="text" class="form-control" id="new_yearseve_comments" value="<?php echo $row_find_dlr_department['new_yearseve_comments']; ?>" placeholder="Comments about New Years Eve...">

									<div class="col-sm-12">
                                      <div class="row">
                                            
                                            
                                            <div class="col-sm-6">
                                            <label>Open:</label>
                                            <select class="form-control m-b" id="new_yearseve_open" name="new_yearseve_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['new_yearseve_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['new_yearseve_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="new_yearseve_close" name="new_yearseve_close">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['new_yearseve_close']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['new_yearseve_close']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>                                    

                                    </div>



									<div class="form-group">
                                    <label for="new_yearsday_comments">New Years Day:</label>
									<input type="text" class="form-control" id="new_yearsday_comments" value="<?php echo $row_find_dlr_department['new_yearseve_comments']; ?>" placeholder="Comments about New Years Day...">

									<div class="col-sm-12">
                                      <div class="row">
                                            
                                            
                                            <div class="col-sm-6">
                                            <label>Open:</label>
                                            
                                            <select class="form-control m-b" id="new_yearsday_open" name="new_yearsday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['new_yearsday_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['new_yearsday_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <label>Close:</label>
                                            
                                            <select class="form-control m-b" id="new_yearsday_close" name="new_yearsday_close">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['new_yearsday_close']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['new_yearsday_close']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>                                    

                                    </div>




									<div class="form-group">
                                    <label for="independence_day_comments">Independence Day:</label>
									<input name="independence_day_comments" type="text" class="form-control" id="independence_day_comments" value="<?php echo $row_find_dlr_department['independence_day_comments']; ?>" placeholder="Comments about Independence Day...">

									<div class="col-sm-12">
                                      <div class="row">
                                            
                                            
                                            <div class="col-sm-6">
                                            <label for="independence_day_open">Open:</label>

                                            <select class="form-control m-b" id="independence_day_open" name="independence_day_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['independence_day_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['independence_day_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <label for="independence_day_close">Close:</label>
                                            <select class="form-control m-b" id="independence_day_close" name="independence_day_close">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['independence_day_close']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['independence_day_close']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>                                    

                                    </div>




									<div class="form-group">
                                    <label>Veterans Day:</label>
									<input type="text" class="form-control" id="veterans_day_comments" value="<?php echo $row_find_dlr_department['veterans_day_comments']; ?>" placeholder="Comments about Veterans Day...">

									<div class="col-sm-12">
                                      <div class="row">
                                            
                                            
                                            <div class="col-sm-6">
                                            <label for="veterans_day_open">Open:</label>

                                            <select class="form-control m-b" id="veterans_day_open" name="veterans_day_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['veterans_day_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['veterans_day_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <label for="veterans_day_close">Close:</label>
                                            <select class="form-control m-b" id="veterans_day_close" name="veterans_day_close">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['veterans_day_close']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['veterans_day_close']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>                                    

                                    </div>




									<div class="form-group">
                                    <label for="blackfriday_comments">Black Friday:</label>
									<input name="blackfriday_comments" type="text" class="form-control" id="blackfriday_comments" value="<?php echo $row_find_dlr_department['blackfriday_comments']; ?>" placeholder="Comments about Black Friday...">

									<div class="col-sm-12">
                                      <div class="row">
                                            
                                            
                                            <div class="col-sm-6">
                                            <label for="blackfriday_open">Open:</label>

                                            <select class="form-control m-b" id="blackfriday_open" name="blackfriday_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['blackfriday_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['blackfriday_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <label for="blackfriday_close">Close:</label>
                                            <select id="blackfriday_close" class="form-control m-b" name="blackfriday_close">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['blackfriday_close']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['blackfriday_close']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>                                    

                                    </div>




									<div class="form-group">
                                    <label for="thanksgiving_comments">Thanks Giving:</label>
									<input name="thanksgiving_comments" type="text" class="form-control" id="thanksgiving_comments" value="<?php echo $row_find_dlr_department['thanksgiving_comments']; ?>" placeholder="Comments about this day...">

									<div class="col-sm-12">
                                      <div class="row">
                                            
                                            
                                            <div class="col-sm-6">
                                            <label for="thanksgiving_open">Open:</label>

                                            <select class="form-control m-b" id="thanksgiving_open" name="thanksgiving_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['thanksgiving_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['thanksgiving_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <label for="thanksgiving_close">Close:</label>
                                            <select class="form-control m-b" id="thanksgiving_close" name="thanksgiving_close">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['thanksgiving_close']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['thanksgiving_close']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>                                    

                                    </div>




									<div class="form-group">
                                    <label>Christmas Eve:</label>
									<input name="christmas_eve_comments" type="text" class="form-control" id="christmas_eve_comments" value="<?php echo $row_find_dlr_department['christmas_eve_comments']; ?>" placeholder="Comments about Christmas Eve...">

									<div class="col-sm-12">
                                      <div class="row">
                                            
                                            
                                            <div class="col-sm-6">
                                            <label>Open:</label>

                                            <select class="form-control m-b" id="christmas_eve_open" name="christmas_eve_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['christmas_eve_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['christmas_eve_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="christmas_eve_close" name="christmas_eve_close">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['christmas_eve_close']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['christmas_eve_close']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>                                    

                                    </div>




									<div class="form-group">
                                    <label>Christmas Day:</label>
									<input name="christmas_day_comments" type="text" class="form-control" id="christmas_day_comments" value="<?php echo $row_find_dlr_department['christmas_day_comments']; ?>" placeholder="Comments about Christmas Day...">

									<div class="col-sm-12">
                                      <div class="row">
                                            
                                            
                                            <div class="col-sm-6">
                                            <label>Open:</label>

                                            <select class="form-control m-b" id="christmas_day_open" name="christmas_day_open">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['christmas_day_open']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['christmas_day_open']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>


                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <label>Close:</label>
                                            <select class="form-control m-b" id="christmas_day_close" name="christmas_day_close">
                                              <option value="Closed" <?php if (!(strcmp("Closed", $row_find_dlr_department['christmas_day_close']))) {echo "selected=\"selected\"";} ?>>Closed</option>
                                              <?php
do {  
?>
                                              <option value="<?php echo $row_query_hours['hour_name']?>"<?php if (!(strcmp($row_query_hours['hour_name'], $row_find_dlr_department['christmas_day_close']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_hours['hour_name']?></option>
                                              <?php
} while ($row_query_hours = mysqli_fetch_assoc($query_hours));
  $rows = mysqli_num_rows($query_hours);
  if($rows > 0) {
      mysqli_data_seek($query_hours, 0);
	  $row_query_hours = mysqli_fetch_assoc($query_hours);
  }
?>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>                                    

                                    </div>
									
                                    <div class="clearfix"></div>


                        
                        
                        
                        </div>
                    </div>
                </div>
            
            </div>
            
            
            </div>
        
        
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Save Your Changes Below</h5>
                </div>
                <div class="ibox-content">
                
                
                <div class="form-group">
				<button id="update_department" class="btn btn-primary btn-rounded btn-block" type="button"><i class="fa fa-info-circle"></i> Update Department</button>
				</div>


                </div>

            </div>
        
        
        
        </div>







			<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        
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

<script type="text/javascript" src="js/custom/page/department.edit.js"></script>
</body>

</html>
<?php
mysqli_free_result($find_dealer_teams);

mysqli_free_result($find_dlr_department);
?>
<?php include("inc.end.phpmsyql.php"); ?>

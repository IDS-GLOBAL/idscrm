<?php include("db_manager_loggedin.php"); ?>
<?php
http://localhost/idscrm/dealers/credit-app.php?app_id=1077&keytoken=b82e8162b3d2ffd1e962
$colname_find_dlr_creditapp = "-1";
if (isset($_GET['app_id'])) {
  $colname_find_dlr_creditapp = $_GET['app_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_creditapp =  "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown_id` = %s AND `applicant_did` = '$did'", GetSQLValueString($colname_find_dlr_creditapp, "int"));
$find_dlr_creditapp = mysqli_query($idsconnection_mysqli, $query_find_dlr_creditapp);
$row_find_dlr_creditapp = mysqli_fetch_assoc($find_dlr_creditapp);
$totalRows_find_dlr_creditapp = mysqli_num_rows($find_dlr_creditapp);
$credit_app_id = $row_find_dlr_creditapp['credit_app_fullblown_id'];
if(!$credit_app_id){ header("Location: manager.credit-apps.php"); }

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM income_interval_options";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeMonths = "SELECT * FROM months_options";
$timeMonths = mysqli_query($idsconnection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_timeYears = "SELECT * FROM year_options";
$timeYears = mysqli_query($idsconnection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_autoYears = "SELECT * FROM auto_years";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_true_salesperson = "SELECT * FROM `sales_person` WHERE `main_dealerid` = '$did' AND  `acct_status` = '1' ORDER BY `salesperson_firstname` ASC";
$true_salesperson = mysqli_query($idsconnection_mysqli, $query_true_salesperson);
$row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
$totalRows_true_salesperson = mysqli_num_rows($true_salesperson);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Credit Application</title>
<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

       
        <?php include("_sidebar.manager.php"); ?>

       
        <div id="page-wrapper" class="gray-bg">
       
       
        <?php include("_nav_top.manager.php"); ?>
       
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Credit Application</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.credit-apps.php">Credit Application</a>
                        </li>
                        <li class="active">
                            <strong>Update A Credit Application</strong>
                            <input id="credit_app_fullblown_id" type="hidden" value="<?php echo $credit_app_id; ?>" />
                            <input id="applicant_app_token" type="hidden" value="<?php echo $row_find_dlr_creditapp['applicant_app_token']; ?>" />
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>



			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="title-action">
                        <a href="manager.credit-apps.php" class="btn btn-primary btn-sm m-b">Credit Apps</a>                    
                        <a href="manager.creditapp.add.php" class="btn btn-primary btn-sm m-b">Create A New Credit Application</a>
                    </div>
                </div>
            </div>
       




                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md">
                            <h4>
                                                        
							 Create A New Auto Loan Credit Application
                            </h4>
                            </div>
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-4"><i class="fa fa-laptop"></i></a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-desktop"></i></a></li>
                                </ul>
                            
                            
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-4" class="tab-pane active">


            <div class="row">

                <div class="col-sm-6">
                


					<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Personal Information <small></small></h5>
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
                            <h3>
                                Credit App Number
                            </h3>
                            <p>App Number: <?php echo $row_find_dlr_creditapp['app_deal_number']; ?></p>
                            
<div id="salespersons_block" class="form-horizontal m-t-md">

								<div class="form-group">
                                    <label class="col-sm-4 control-label">Sales Person 1:</label>
                                    <div class="col-sm-8">
                                       <select id="applicant_sid" class="form-control">
                                         <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_sid']))) {echo "selected=\"selected\"";} ?>>Select Salesperson</option>
                                         <?php
do {  
?>
                                         <option value="<?php echo $row_true_salesperson['salesperson_id']?>"<?php if (!(strcmp($row_true_salesperson['salesperson_id'], $row_find_dlr_creditapp['applicant_sid']))) {echo "selected=\"selected\"";} ?>><?php echo $row_true_salesperson['salesperson_firstname']?> <?php echo $row_true_salesperson['salesperson_lastname']?></option>
                                         <?php
} while ($row_true_salesperson = mysqli_fetch_assoc($true_salesperson));
  $rows = mysqli_num_rows($true_salesperson);
  if($rows > 0) {
      mysqli_data_seek($true_salesperson, 0);
	  $row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
  }
?>
                                      </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>                            
                            



								<div class="form-group">
                                    <label class="col-sm-4 control-label">Sales Person 2:</label>
                                    <div class="col-sm-8">
                                       <select id="applicant_sid2" class="form-control">
                                         <option value="" <?php if (!(strcmp("", $row_find_dlr_creditapp['applicant_sid2']))) {echo "selected=\"selected\"";} ?>>Select Salesperson</option>
                                         <?php
do {  
?>
                                         <option value="<?php echo $row_true_salesperson2['salesperson_id']?>"<?php if (!(strcmp($row_true_salesperson2['salesperson_id'], $row_find_dlr_creditapp['applicant_sid2']))) {echo "selected=\"selected\"";} ?>><?php echo $row_true_salesperson2['salesperson_firstname']?> <?php echo $row_true_salesperson2['salesperson_lastname']?></option>
                                         <?php
} while ($row_true_salesperson2 = mysqli_fetch_assoc($true_salesperson2));
  $rows = mysqli_num_rows($true_salesperson2);
  if($rows > 0) {
      mysqli_data_seek($true_salesperson2, 0);
	  $row_true_salesperson2 = mysqli_fetch_assoc($true_salesperson2);
  }
?>
                                      </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>                            







</div>
                            
                            
                             
						</div>
					</div>
                
                
                
                
                
                
                
				</div>
                
                <div class="col-sm-6">


					<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Pull An Existing Applicant <small></small></h5>
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
                            <h3>
                                Add A Joint Applicant
                            </h3>
                            <p>Here you can pull one of your exisiting credit applicantions and join to this application.</p>
                             <button id="load_joint_creditapp" type="button" class="btn btn-primary btn-lg">Add A Joint Applicant</button>
						</div>
					</div>

               
				
                
                
                
                </div>

			</div>


            <div class="row">

                <div id="primary_app_section" class="col-sm-12">

                </div>



                <div id="joint_app_section" class="col-sm-6" style="display: none;">

                
                </div>
            
            
            </div>











                                </div>

                                <div id="tab-5" class="tab-pane">
                                   
                                   
            <div class="row">

                <div class="col-sm-6">
                


					<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Purchase Information <small></small></h5>
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
                            <h3>
                                Add A Vehicle
                            </h3>
                            <p>Here you can pull one of your exisiting credit applicantions and join to this application.</p>
                             <button> Add A Vehicle</button>
						</div>
					</div>
                
                
                
                
                
                
                
				</div>
                
                <div class="col-sm-6">


					<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Trade Information <small></small></h5>
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
                            <h3>
                                Add A Vehicle Trade
                            </h3>
                            <p>Here you can pull one of your exisiting vehicles into this credit application.</p>
                             <button>add A Vehicle Trade</button>
						</div>
					</div>

               
				
                
                
                
                </div>

			</div>
                                   
                                   

<div class="rollIn">


<div class="wrapper wrapper-content animated fadeInRight">
        
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Live Inventory </h5>
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


                        <div class="row">
                            <div class="col-sm-12">
                            
                        
                                        <div class="">
                                        


                    <table id="find_livevehicles" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Photo / Status</th>
                        <th>Stock No</th>
                        <th>Year Make Model Trim</th>
                        <th>Pricing</th>
                        <th>Down Payment</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
<?php $counter_gridrow = 0; ?>

<?php do { ?>

<?php $counter_gridrow++; ?>                        

                    <tr class="<?php if($counter_gridrow % 2 == 0){ echo 'gradeC';}elseif($counter_gridrow % 1 == 0){ echo 'gradeX';} ?>">
                        <td class="center">
                        <input id="vehicle_do" type="checkbox" value="<?php echo $row_LiveVehicles['vid']; ?>" name="list" class="checkbox"/>



							<span class="vdatesince">Since: <?php echo $row_LiveVehicles['vDateInStock']; ?></span>
                            
                            <br />

                        	<img src="<?php echo $row_LiveVehicles['vthubmnail_file_path']; ?>" width="120px" />
                            <br />
                       	<?php if($row_LiveVehicles['vlivestatus'] == 0){ echo 'HOLD';}elseif($row_LiveVehicles['vlivestatus'] == 1){ echo 'LIVE';}elseif($row_LiveVehicles['vlivestatus'] == 9){ echo 'SOLD';}; ?>
                        <br />

                        <button class="btn btn-primary" onClick="window.location.href='inventoryedit.php?vid=<?php echo $row_LiveVehicles['vid']; ?>'">Edit</button>

                        </td>
                        <td class="center"><?php echo $row_LiveVehicles['vstockno']; ?></td>
                        <td class="center">
<strong>Description: </strong><br />
<?php echo $row_LiveVehicles['vyear']; ?> <?php echo $row_LiveVehicles['vmake']; ?> <?php echo $row_LiveVehicles['vmodel']; ?> <?php echo $row_LiveVehicles['vtrim']; ?><br /> <br />
<strong>VIN: </strong><?php echo $row_LiveVehicles['vvin']; ?><br /> <br />
<strong>Exterior Color: </strong><?php echo $row_LiveVehicles['vecolor_txt']; ?><br /> <br />
<strong>Interior Color: </strong><?php echo $row_LiveVehicles['vicolor_txt']; ?><br /> <br />
                        </td>
                        <td class="center">
                        <?php if($row_LiveVehicles['vrprice']){ ?><strong>Retail Price: </strong><br /><?php echo $row_LiveVehicles['vrprice']; ?><br /><?php } ?>
                        <?php if($row_LiveVehicles['vspecialprice']){ ?><strong>Special Price: </strong><br /><?php echo $row_LiveVehicles['vspecialprice']; ?><?php } ?>
                        </td>
                        <td class="center"><?php echo $row_LiveVehicles['vdprice']; ?></td>
                        <td class="center">
                        <div class="btn btn-white">
                        	<a href="inventoryedit.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">View/Edit</a>
                        </div>
                        <br />
                        <br />
                        <div class="btn btn-white">
                            <a href="vphotos.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">View Photos</a>
                        </div>
                        <br />
                        <br />
                        <div class="btn btn-white">
                            <a href="upload-vphotos.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">Upload Photos</a>
                        </div>

                        </td>
                    </tr>
<?php } while ($row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles)); ?>
                    </tbody>
                    </tfoot>
                    <tr>
                        <th>Photo / Status</th>
                        <th>Stock No</th>
                        <th>Year Make Model Trim</th>
                        <th>Retail Pricing</th>
                        <th>Down Payment</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>


                                        
                                        
                                        
                                        </div>
                        
                            
                            </div>
                        </div>        








                        </div>
                    </div>
                </div>

            </div>
        
        
        
        

        
        
        
        
        
        
        </div>

</div>                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   

                                   
                                </div>
                            </div>

                        </div>

                    </div>




       
        <div id="save_credit_app_bar" class="wrapper wrapper-content animated fadeInRight" style="display:none;">
        
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Save Credit Application</h5>
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
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">


<div class="row">
	<div class="col-lg-12">
    

                <div class="col-lg-12" align="center">
                <h2>Save This Credit Application</h2>
                <button id="update_creditapp" class="btn btn-primary btn-lg">Update</button>
                
                
                </div>

    
	</div>
</div>        








                        </div>
                    </div>
                </div>

            </div>
        
        
        
        

        
        
        
        
        
        
        </div>
       






       
        <?php include("_footer.php"); ?>

        </div>
	
    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <!-- Change To This Page Before Live -->
	<script src="js/custom/page/custom.manager.creditapp.edit.js"></script>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('table#find_livevehicles').dataTable( {
        "createdRow": function ( row, data, index ) {
            if ( data[3].replace(/[\$,]/g, '') * 1 > 8000 ) {
                $('td', row).eq(3).addClass('highlight');
            }
        }
    } );
} );
</script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
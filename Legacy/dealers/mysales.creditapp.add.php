<?php include("db_sales_loggedin.php"); ?>
<?php

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

// Removed:   AND `credit_app_fullblown`.`applicant_app_joint_token` IS NOT NULL
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_creditapps = "SELECT * FROM `credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_did` = '$did' ORDER BY `credit_app_fullblown`.`credit_app_fullblown_id` DESC";
$find_creditapps = mysqli_query($idsconnection_mysqli, $query_find_creditapps);
$row_find_creditapps = mysqli_fetch_assoc($find_creditapps);
$totalRows_find_creditapps = mysqli_num_rows($find_creditapps);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>New Credit Application</title>
<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

       
        <?php include("_sidebar.php"); ?>

       
        <div id="page-wrapper" class="gray-bg">
       
       
        <?php include("_nav_top.php"); ?>
       
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Credit Application</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="credit-apps.php">Credit Applications</a>
                        </li>
                        <li class="active">
                            <strong>Create A New Application</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>



			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="title-action">
                        <a href="credit-apps.php" class="btn btn-primary btn-sm m-b">Credit Apps</a>                    
                        <a class="btn btn-warning btn-sm m-b">Create A New Credit Application</a>
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
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Start Your Credit Application Process Here
                            </h3>
                            <p>This Credit Application Will Start A New Process Check For Exisiting Customers First.</p>
                            <p align="center">
                             <button id="load_primary_creditapp" class="btn btn-primary btn-lg" type="button">Start Primary Application</button>
                            </p>
                             
                             
                             
                            
<div id="salespersons_block" class="form-horizontal m-t-md">

								<div class="form-group">
                                    <label class="col-sm-4 control-label">Sales Person 1:</label>
                                <div class="col-sm-8">
                                       <select id="applicant_sid" class="form-control">
                                         <option value="0">House</option>
                                         <?php
do {  
?>
                                         <option value="<?php echo $row_true_salesperson['salesperson_id']?>"><?php echo $row_true_salesperson['salesperson_firstname']?> <?php echo $row_true_salesperson['salesperson_lastname']?></option>
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
                                         <option value="0">House</option>
                                         <?php
do {  
?>
                                         <option value="<?php echo $row_true_salesperson['salesperson_id']?>"><?php echo $row_true_salesperson['salesperson_firstname']?> <?php echo $row_true_salesperson['salesperson_lastname']?></option>
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







</div>
                            
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
						</div>
					</div>
                
                
                
                
                
                
                
				</div>
                
                <div id="start_joint_app_section" class="col-sm-6" style="display:none;">


					<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>CoApplicant Information <small></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                               Start Your Co Applicant
                            </h3>
                            <p>Here you can complete two credit apps side by side on desktop view.</p>



                             <p align="center"><button id="load_joint_creditapp" type="button" class="btn btn-primary btn-lg" style="display:block;">Add A Joint Applicant</button></p>





                             <p align="center"><button id="delete_joint_creditapp" type="button" class="btn btn-primary btn-lg" style="display:none;">Delete Joint Applicant</button></p>




                             <p align="center"><button id="recover_joint_creditapp" type="button" class="btn btn-primary btn-lg" style="display:none;">Recover Joint Applicant</button><small></small></p>



<hr />





<!-- Start A Joint Application Modal-->

                            <div class="text-center">
                             <p align="center">
                            <button id="pull_existing_creditapp" type="button" class="btn btn-primary" data-toggle="modal" data-target="#pullExisingcreditappModal" data-backdrop="static" style="display:block;">
                                Pull Existing Credit Application.
                            </button>
                             </p>
                                </div>
                            <div class="modal inmodal" id="pullExisingcreditappModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg"><!--Large Modal -->
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Existing Credit Aplications</h4>
                                            <small class="font-bold">Reuse an Exisiting Credit Application </small>
                                        </div>
                                        <div class="modal-body">
                                            <p>Easily Select the App Number on the credit application you want to use.</p>
                                                    
<div class="row">
	<div class="col-sm-12">
    <div class="ibox-content">
                    <table id="credit_app_selections" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Received When</th>
                        <th>App Number</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php do { ?>
                            <?php
								
								$fullname = $row_find_creditapps['applicant_name'];
								
								$fname = $row_find_creditapps['applicant_fname'];
								
								$lname = $row_find_creditapps['applicant_lname'];
								
								$credit_app_id = $row_find_creditapps['credit_app_fullblown_id'];
								
								$applicant_app_token = $row_find_creditapps['applicant_app_token'];
								
								$credit_app_link = "credit-app.php?app_id=$credit_app_id&keytoken=$applicant_app_token";

								$print_credit_app_link = "autoloanCreditApp-pdf.php?credit_app_id=$credit_app_id&keytoken=$applicant_app_token";

					  			$app_number = $row_find_creditapps['app_number'];

					  			$app_deal_number = $row_find_creditapps['app_deal_number'];
					  
					  ?>
                      <tr id="<?php echo $row_find_creditapps['credit_app_fullblown_id']; ?>" class="">
                          <td>
                          <abbr class="timeago" title="<?php echo $finalDate=zone_conversion_date($row_find_creditapps['application_created_date'], $zone_from, $zone_to); ?>"></abbr>
                          </td>
                          <td align="center">
                          	<span id='usthisexistingappnumber' class="btn btn-white btn-sm">Use: <?php echo $app_number; ?></span>
                          </td>
                          <td>
                           <a href="<?php echo $credit_app_link; ?>">
                            <?php
																
								if(!$fullname){
								
								echo $fname.' '.$lname;
								
								}else{ echo $row_find_creditapps['applicant_name']; }
								
								//echo $row_find_creditapps['applicant_name']; 
								?>
                            </a>
                          </td>
                          <td><a href="<?php echo $credit_app_link; ?>"><?php echo $row_find_creditapps['applicant_main_phone']; ?></a></td>
                          <td><?php echo $row_find_creditapps['applicant_email_address']; ?></td> 
                      </tr>
                        <?php } while ($row_find_creditapps = mysqli_fetch_assoc($find_creditapps)); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Received When</th>
                        <th>App Number</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </tr>
                    </tfoot>
                    </table>
                    </div>
	</div>
</div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group" style="display:none;"><label>Credit App Pulled:</label> <input type="text" placeholder="Applicant" id="pulled_app_id" class="form-control"></div>
                                                    
                                                    
                                                    
                                                    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button id="use_joint_appid" type="button" class="btn btn-primary">Use This Applicant</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


<!--End Modal End Modal  -->

































                             
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
                            </div>

                        </div>

                    </div>




       
        <div id="save_credit_app_bar" class="wrapper wrapper-content animated fadeInRight" style="display:block;">
        
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Save Credit Application</h5>
                        </div>
                        <div class="ibox-content">


<div class="row">
	<div class="col-lg-12">
    

                <div id="save_single_app_action" class="col-lg-12" align="center">
                <h2>Save This Credit Application</h2>
                <button id="create_creditapp" type="button" class="btn btn-primary btn-lg">Save Single Credit Application</button>
                
                
                </div>



                <div id="save_co_app_action" class="col-lg-12" align="center" style="display:none;">
                <h2>Save This Credit Application</h2>
                <button id="create_cocreditapps" type="button" class="btn btn-primary btn-lg">Save Joint Application</button>
                
                
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
	<script src="js/custom/page/mysales.custom.creditapp.add.js"></script>
<script src="js/custom/page/mysales.custom.creditapp.joint.add.js"></script>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

	$('#credit_app_selections').dataTable( {
		"iDisplayLength": 25,
		"order": [[1, 'asc']],
		"ordering": false,
        "scrollCollapse": true,
        "paging":         true
    } );
	
	
} );

</script>

<!--script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('table#find_livevehicles').dataTable( {
		"iDisplayLength": 25,
		"order": [[1, 'asc']],
		"ordering": false,
        "scrollCollapse": true,
        "paging":         true
        }
    } );
} );
</script -->


</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
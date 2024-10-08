<?php include("db_loggedin.php"); ?>
<?php
$colname_find_dlr_creditapp = "-1";
if (isset($_GET['app_id'])) {
  $colname_find_dlr_creditapp = $_GET['app_id'];
}
$query_find_dlr_creditapp = "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown_id` = '$colname_find_dlr_creditapp'";
$find_dlr_creditapp = mysqli_query($idsconnection_mysqli, $query_find_dlr_creditapp);
$row_find_dlr_creditapp = mysqli_fetch_assoc($find_dlr_creditapp);
$totalRows_find_dlr_creditapp = mysqli_num_rows($find_dlr_creditapp);

$credit_app_locked = $row_find_dlr_creditapp['credit_app_locked'];
//if($credit_app_locked  == 1){ header("Location: credit-apps.php"); };

$app_id = $row_find_dlr_creditapp['credit_app_fullblown_id'];


$app_deal_number = $row_find_dlr_creditapp['app_deal_number'];
if($row_find_dlr_creditapp['applilcant_v_stockno']){ $vstockno = $row_find_dlr_creditapp['applilcant_v_stockno']; }

$query_states = "SELECT * FROM states";
$states =mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

$query_paydayType = "SELECT * FROM `idsids_idsdms`.`income_interval_options`";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

$query_timeMonths = "SELECT * FROM `idsids_idsdms`.`months_options`";
$timeMonths = mysqli_query($idsconnection_mysqli, $query_timeMonths);
$row_timeMonths = mysqli_fetch_assoc($timeMonths);
$totalRows_timeMonths = mysqli_num_rows($timeMonths);

$query_timeYears = "SELECT * FROM `idsids_idsdms`.`year_options`";
$timeYears =mysqli_query($idsconnection_mysqli, $query_timeYears);
$row_timeYears = mysqli_fetch_assoc($timeYears);
$totalRows_timeYears = mysqli_num_rows($timeYears);

$query_autoYears = "SELECT * FROM `idsids_idsdms`.`auto_years`";
$autoYears = mysqli_query($idsconnection_mysqli, $query_autoYears);
$row_autoYears = mysqli_fetch_assoc($autoYears);
$totalRows_autoYears = mysqli_num_rows($autoYears);

$query_vmakes = "SELECT * FROM `idsids_idsdms`.`car_make` ORDER BY `car_make` ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);


$query_managers = "SELECT * FROM `idsids_idsdms`.`manager_person` WHERE `dealer_id` = '$did' AND `acct_status` = '1' ORDER BY `manager_lastname` ASC";
$managers = mysqli_query($idsconnection_mysqli, $query_managers);
$row_managers = mysqli_fetch_assoc($managers);
$totalRows_managers = mysqli_num_rows($managers);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sales Desk</title>
<?php include("inc.head.php"); ?>
<style type="text/css">
	div#inventory_actionsbox{
		display:none;
	}
</style>
</head>

<body>
<div id="wrapper">

		<?php include("inc.salesdesk.modals.php"); ?>
       
        <?php include("_sidebar.php"); ?>

       
        <div id="page-wrapper" class="gray-bg">
       
       
        <?php include("_nav_top.php"); ?>
       
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Sales Desk</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Deal Manager</a>
                        </li>
                        <li class="active">
                            <strong>Sales Desk</strong>
                            <input type="hidden" id="salesdeskToken" value="<?php echo $tkey; ?>" />
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
       

			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                    	<a data-backdrop="static" data-toggle="modal" data-target="#dealMatrixModal" class="btn btn-primary btn-lg">Deal Matrix</a>
                        <a href="deals.php" class="btn btn-primary btn-lg">Deals</a>                    
                        <a href="#" class="btn btn-warning btn-lg">Sales Desk</a>
                    </div>
                </div>
            </div>


<div class="row">


                <div class="col-lg-6 col-md-6 col-sm-6">


                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Information <small><a href="inventory.php" target="_blank">Inventory</a></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Pull a vehicle from inventory.
                            </h3>
                            <p>

                                Enter Or Find The Vehicle For This Deal Structure.

                            </p>
                            
                            <div id="pullvehicle_stock_results">Year Make Model Trim</div>
                            
                            <div class="form-horizontal m-t-md">
                          		
                                <div class="hr-line-dashed"></div>
                                <div id="pull_vehicle_handle" class="form-group">
                                    <div class="col-sm-12 input-group">
						
                        			<span class="input-group-addon"><a id="findVehicle" href="#">Find Vehicle <i class="fa fa-search-plus"></i></a></span>
			                        <input id="enter_vstockno" type="text" maxlength="6" class="form-control" value="<?php echo $vstockno; ?>" autocomplete="off" placeholder="Stock Number"> 
                       				<span class="input-group-btn"> 
                                    	<button id="pull_vstockno" type="button" class="btn btn-primary">Pull Vehicle!</button> 
                                    </span>
                       			</div>
                                                           
                                </div>
							</div>


                        </div>
                    </div>                
                
                </div><!-- End Pull Vehicle Information col  -->
                <div id="credit_app_box" class="col-lg-6 col-md-6 col-sm-6">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Customer / Credit App <small><a href="credit-apps.php" target="_blank">Credit Apps</a></small></h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Pull Credit Application
                            </h3>
                            <p>
                            	Pull a previous credit application into this sales desk.
                            </p>
                            <div id="pullcredit_app_results">Names & Budget</div>
                            
                            <div class="form-horizontal m-t-md" action="#">
                            

                                <div class="hr-line-dashed"></div>
                                <div id="pull_creditapp_handle" class="form-group">
                                    <div class="col-sm-12 input-group">
						
                        			<span class="input-group-addon"><a id="pull_credit_app" href="#">Find Credit App <i class="fa fa-search-plus"></i></a></span>
<input id="creditAppno" type="number" min="1" maxlength="4" step="1"  class="form-control" value="<?php echo $app_deal_number; ?>"  placeholder="App Number" autocomplete="off"> 
                       				<span class="input-group-btn"> 
                                    	<button id="pull_appno" type="button" class="btn btn-primary">Pull Credit App!</button> 
                                        <input id="credit_app_fullblown_id" type="hidden" value="<?php echo $app_id; ?>">
                                        
                                        <input id="salesPerson1ID" type="hidden" value="<?php //echo $app_id; ?>">
                                        <input id="salesPerson1Name" type="hidden" value="<?php //echo $app_id; ?>">
                                        <input id="salesPerson2ID" type="hidden" value="<?php //echo $app_id; ?>">
                                        <input id="salesPerson2Name" type="hidden" value="<?php //echo $app_id; ?>">
                                        
                                        
                                        

                                        
                                        
                                        
                                    </span>
                       			</div>


                                
                            </div>
                        
                        
                        </div>
                    </div>

                </div>


                </div><!-- End Pull Credit Application Information col  -->
</div>


                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md">
                            <h4>Sales Desk Options</h4>
                            </div>
                            
                            <div class="panel-options">

                                <ul id="sales_desk_tabs" class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-4"><i class="fa fa-bank fa-3x"></i> Finance</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-car fa-3x"></i> Trade</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-6"><i class="fa fa-plug fa-3x"></i> Misc</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-7"><i class="fa fa-tachometer fa-3x"></i> Fees</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-8"><i class="fa fa-life-buoy fa-3x"></i> Insurance</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-9"><i class="fa fa fa-money fa-3x"></i> Profit Analyzer</a></li>
                                </ul>
                            
                            
                            </div>
                        
                        
                        
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-4" class="tab-pane active">

									<?php include("content/body.salesdesk.financing.add.php"); ?>


                                </div>

                                <div id="tab-5" class="tab-pane">

                    				<?php include("content/body.salesdesk.trade.add.php"); ?>

                                    
                                </div>
                                <div id="tab-6" class="tab-pane">

									<?php include("content/body.salesdesk.misc.add.php"); ?>

                                </div>
                                
                                <div id="tab-7" class="tab-pane">
                                
									<?php include("content/body.salesdesk.fees.add.php"); ?>                                
                                
                                </div>


                                <div id="tab-8" class="tab-pane">
                                	<?php include("content/body.salesdesk.insurance.add.php"); ?>
                                
                                </div>

                                <div id="tab-9" class="tab-pane">
                                	<?php include("content/body.salesdesk.profitanalyzer.add.php"); ?>
                                
                                </div>
                                
                            </div>

                        </div>

                    </div>













       
        <div class="wrapper wrapper-content animated fadeInRight">
        
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Save This Deal</h5>
                        </div>
                        <div class="ibox-content">


<div class="row">
	<div class="col-lg-12">
    

                <div class="col-lg-12" align="center">
                
                            <div class="form-horizontal m-t-md">
                            
                            <div class="hr-line-dashed"></div>
                            
                                <div class="form-group">

                <button id="make_thisdeal" class="btn btn-primary btn-lg"><i class="fa fa-gavel"></i> Make Deal</button>
                
                
                
                				 </div>
                                 



                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="salesMgrID">Sales Manager:</label>
                                    <div class="col-sm-9">
                                        <select id="salesMgrID" class="form-control">
                                          <option value="">Select</option>
                                          <?php do {  ?>
                                          <option value="<?php echo $row_managers['manager_id']?>"><?php echo $row_managers['manager_firstname']?> <?php echo $row_managers['manager_lastname']?></option>
                                          <?php } while ($row_managers = mysqli_fetch_array($managers));
											  $rows = mysqli_num_rows($managers);
											  if($rows > 0) {
												  mysqli_data_seek($managers, 0);
												  $row_managers = mysqli_fetch_array($managers);
											  }
											?>
                                      </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="financeMgrID">Finance Manager:</label>
                                    <div class="col-sm-9">
                                        <select id="financeMgrID" class="form-control">
                                          <option value="">Select</option>
                                          <?php do {  ?>
                                          <option value="<?php echo $row_managers['manager_id']?>"><?php echo $row_managers['manager_firstname']?> <?php echo $row_managers['manager_lastname']?></option>
                                          <?php } while ($row_managers = mysqli_fetch_array($managers));
												  $rows = mysqli_num_rows($managers);
												  if($rows > 0) {
													  mysqli_data_seek($managers, 0);
													  $row_managers = mysqli_fetch_array($managers);
												  }
												?>
                                      </select>
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
       






       
        <?php include("_footer.php"); ?>

        </div>
	
    </div><!-- End Page Wrapper -->




</div><!-- End Wrapper -->
    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>


    <script src="js/incalculate.js"></script>
	<script src="js/custom/page/custom.salesdesk.js"></script>

	<script src="content/js/salesdesk.body.trade.js"></script>
  	<script type="text/javascript" src="json/salesdesk.pullstockvehicle.js"></script>
  	<script type="text/javascript" src="json/salesdesk.pullcreditapp.js"></script> 
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>

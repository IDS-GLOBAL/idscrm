<?php include("db_manager_loggedin.php"); ?>
<?php
$colname_pull_dlr_deal = "-1";
if (isset($_GET['deal_id'])) {
  $colname_pull_dlr_deal = $_GET['deal_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_dlr_deal =  sprintf("SELECT * FROM deals_bydealer WHERE deal_id = %s", GetSQLValueString($colname_pull_dlr_deal, "int"));
$pull_dlr_deal = mysqli_query($idsconnection_mysqli, $query_pull_dlr_deal);
$row_pull_dlr_deal = mysqli_fetch_assoc($pull_dlr_deal);
$totalRows_pull_dlr_deal = mysqli_num_rows($pull_dlr_deal);
$deal_id = $row_pull_dlr_deal['deal_id'];
if(!$deal_id){ header("Location: manager.deals.php"); }

$deal_token = $row_pull_dlr_deal['deal_token'];
$deal_number = $row_pull_dlr_deal['deal_number'];
if(!$deal_number){
	
	if($row_last_deal_number['deal_number']){
 	$deal_number = $row_last_deal_number['deal_number'];

	$deal_number = $deal_number+1;
	}else{
	$deal_number = '1000';
	}
	
}

$colname_find_dlr_creditapp = "-1";
if (isset($_GET['app_id'])) {
  $colname_find_dlr_creditapp = $_GET['app_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_creditapp =  sprintf("SELECT * FROM credit_app_fullblown WHERE credit_app_fullblown_id = %s", GetSQLValueString($colname_find_dlr_creditapp, "int"));
$find_dlr_creditapp = mysqli_query($idsconnection_mysqli, $query_find_dlr_creditapp);
$row_find_dlr_creditapp = mysqli_fetch_assoc($find_dlr_creditapp);
$totalRows_find_dlr_creditapp = mysqli_num_rows($find_dlr_creditapp);

$credit_app_locked = $row_find_dlr_creditapp['credit_app_locked'];
if($credit_app_locked  == 1){ header("Location: credit-apps.php"); };

$app_id = $row_find_dlr_creditapp['credit_app_fullblown_id'];


$app_deal_number = $row_find_dlr_creditapp['app_deal_number'];
if($row_find_dlr_creditapp['applilcant_v_stockno']){ $vstockno = $row_find_dlr_creditapp['applilcant_v_stockno']; }

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
$query_managers = "SELECT * FROM `manager_person` WHERE `dealer_id` = '$did' AND `acct_status` = '1' ORDER BY `manager_lastname` ASC";
$managers = mysqli_query($idsconnection_mysqli, $query_managers);
$row_managers = mysqli_fetch_assoc($managers);
$totalRows_managers = mysqli_num_rows($managers);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Deal View</title>
<?php include("inc.head.php"); ?>

</head>

<body>
<div id="wrapper">

		<?php include("inc.salesdesk.modals.php"); ?>
       
        <?php include("_sidebar.manager.php"); ?>

       
        <div id="page-wrapper" class="gray-bg">
       
       
        <?php include("_nav_top.manager.php"); ?>
       
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Deal View</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Deal Manager</a>
                        </li>
                        <li class="active">
                            <strong>Deal View #<?php echo $deal_number; ?></strong>
                                                        
                            <input type="hidden" id="deal_id" value="<?php echo $deal_id; ?>" />
                            <input type="hidden" id="salesdeskToken" value="<?php echo $deal_token; ?>" />

							<input type="hidden" id="deal_number" value="<?php echo $deal_number; ?>" />
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
                        <a href="manager.deals.php" class="btn btn-primary btn-lg">Deals</a>                    
                        <a href="manager.salesdesk.php" class="btn btn-warning btn-lg">Sales Desk</a>
                    </div>
                </div>
            </div>


<div class="row">


                <div class="col-lg-6 col-md-6 col-sm-6">


                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Vehicle Information <small><a href="manager.inventory.php?vstat=1" target="_blank">Inventory</a></small></h5>
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
						
                        			<span class="input-group-addon"><a>Use Vehicle Details!</a></span>
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
                            <h5>Customer / Credit App <small><a href="creditapps.php" target="_blank">Credit Apps</a></small></h5>
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
						
                        			<span class="input-group-addon"><a id="pull_credit_app">Use Credit App Details</a></span>
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
                        <div class="ibox-content">


<div class="row">
	<div class="col-lg-12">
    

                <div class="col-lg-12" align="center">
                
                            <div class="form-horizontal m-t-md">
                            
                            <div class="hr-line-dashed"></div>
                            
                                <div class="form-group">

                <button id="save_thisdeal" class="btn btn-primary btn-lg"><i class="fa fa-gavel"></i>Save Deal Only</button>

                <button id="close_thisdeal" class="btn btn-primary btn-lg"><i class="fa fa-gavel"></i> Save & Close This Deal</button>                
                
                
                				 </div>
                                 



                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="salesMgrID">Sales Manager:</label>
                                    <div class="col-sm-9">
                                        <select id="salesMgrID" class="form-control">
                                          <option value="">Select</option>
                                          <?php do {  ?>
                                          <option value="<?php echo $row_managers['manager_id']?>"><?php echo $row_managers['manager_firstname']?> <?php echo $row_managers['manager_lastname']?></option>
                                          <?php } while ($row_managers = mysqli_fetch_assoc($managers));
											  $rows = mysqli_num_rows($managers);
											  if($rows > 0) {
												  mysqli_data_seek($managers, 0);
												  $row_managers = mysqli_fetch_assoc($managers);
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
                                          <?php } while ($row_managers = mysqli_fetch_assoc($managers));
												  $rows = mysqli_num_rows($managers);
												  if($rows > 0) {
													  mysqli_data_seek($managers, 0);
													  $row_managers = mysqli_fetch_assoc($managers);
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
	<script src="js/custom/page/custom.deal.js"></script>

	<script src="content/js/salesdesk.body.trade.js"></script>
  	<script type="text/javascript" src="json/salesdesk.pullstockvehicle.js"></script>
  	<script type="text/javascript" src="json/salesdesk.pullcreditapp.js"></script> 
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($find_dlr_creditapp);
?>

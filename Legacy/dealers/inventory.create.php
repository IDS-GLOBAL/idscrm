<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM `idsids_idsdms`.`deals_bydealer` WHERE `deals_bydealer`.`deal_dealerID` = '$did' ORDER BY `deals_bydealer`.`deal_number` DESC, `deal_created_at` DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM `idsids_idsdms`.`car_make` ORDER BY `car_make` ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_assoc($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Create Inventory: <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div id="start_vehicle_add_box" class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add New Inventory</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="inventory.php?vstat=1">Live Invetory</a>
                        </li>
                        <li>
                            <a>Adding New Invetory</a>
                            <input id="pass_vin_good" type="hidden" value="N">
                            <input id="pass_stock_good" type="hidden" value="N">
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">








                        <?php include("views/add.inventory.view.php"); ?>
    














            <div class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Console Results Here</h5>
                        </div>
                        <div id="ajax_vehicle_console_results" class="ibox-content">
    
                        
    
                        </div>
                        <div id="createVehicleResult" class="ibox-content">
    
                        
    
                        </div>
                        
                        
                    </div>
            	</div>
            </div>



















            <div id="transfer_vehicle_view_box" class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>We Have A Record This Vehicle Belongs To Another Dealer</h5>
                        </div>
                        <div class="ibox-content">
    
<div class="row">
    <div class="col-sm-12">
        <button id="create_anyway" class="btn btn-warning btn-block btn-lg dim"><i class="fa fa-car fa-5x"></i> Transfer This Vehicle</button>
    </div>
</div>
    
                        </div>
                    </div>
            	</div>
            </div>





            <div id="add_vehicle_view_box" class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Ready To Go</h5>
                        </div>
                        <div class="ibox-content">





<div class="row">
    <div class="col-sm-12">
        <button id="create_anyway" class="btn btn-primary btn-block btn-lg dim"><i class="fa fa-car fa-5x"></i> Add This Vehicle</button>
    </div>
</div>









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

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
<script src="js/custom/page/custom.inventory.create.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
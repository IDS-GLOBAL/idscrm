<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM deals_bydealer WHERE deal_dealerID = '$did' ORDER BY deal_number DESC, deal_created_at DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM |  Cancel WFH: <?php echo $row_userDets['company']; ?></title>

 <script src="https://use.fontawesome.com/94d5a20675.js"></script>
 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Viewing Blank Page</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>WefinanceHere.com Cancel</a>
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
                        <h5>WefinanceHere.com Exposure <small>.</small></h5>
                    </div>
                    <div class="ibox-content">

                    <h3>Cancel My Account with wefinancehere.com <small>We hate to see you leave however we understand.</small></h3>
                    <div class="form-horizontal">
                    	<div class="form-group">
                        	<label>Enter Why You are canceling.</label>
                        	<input id="entercancel_why" type="text" class="form-control" value="">
                        </div>
                        <div class="form-group">
                        	<button id="submit_cancelation" type="button" class="btn btn-danger btn-block">Submit My Cancelation</button>
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
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
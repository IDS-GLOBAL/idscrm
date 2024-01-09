<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM `idsids_idsdms`.`deals_bydealer` WHERE `deals_bydealer`.`deal_dealerID` = '$did' ORDER BY `deal_number` DESC, `deal_created_at` DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states`";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_bodystyles = "SELECT * FROM `idsids_idsdms`.`body_styles` ORDER BY `body_style_name` ASC";
$query_bodystyles = mysqli_query($idsconnection_mysqli, $query_query_bodystyles);
$row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
$totalRows_query_bodystyles = mysqli_num_rows($query_bodystyles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_options_months = "SELECT * FROM `idsids_idsdms`.`months_options` ORDER BY `months_options`.`month_id` ASC";
$options_months = mysqli_query($idsconnection_mysqli, $query_options_months);
$row_options_months = mysqli_fetch_assoc($options_months);
$totalRows_options_months = mysqli_num_rows($options_months);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_options_years = "SELECT * FROM `idsids_idsdms`.`year_options` ORDER BY `year_options`.`year_id` ASC";
$options_years = mysqli_query($idsconnection_mysqli, $query_options_years);
$row_options_years = mysqli_fetch_assoc($options_years);
$totalRows_options_years = mysqli_num_rows($options_years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM `idsids_idsdms`.`income_interval_options`";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Blank: <?php echo $row_userDets['company']; ?></title>

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
                    <h2>Create A New Lead</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Create Lead</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        
        
			<?php include("content/body.lead.view.edit.php"); ?>
            
            







            



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Save Above Information <small>click button below</small></h5>
                    </div>
                    <div class="ibox-content">

                    		<button type="button" id="save_lead" class="btn btn-block btn-lg btn-primary btn-rounded"><i class="fa fa-floppy-o"></i> Submit</button>

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
    <script src="js/custom/page/custom.lead.create.js"></script>

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
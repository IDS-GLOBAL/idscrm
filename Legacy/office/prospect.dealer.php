<?php require_once('db_admin.php'); ?>
<?php



$colname_query_dlrprospect = "-1";
if (isset($_GET['prospctdlrid'])) {
  $colname_query_dlrprospect = $_GET['prospctdlrid'];
}
$query_query_dlrprospect =  "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `id` = '$colname_query_dlrprospect'";
$query_dlrprospect = mysqli_query($tracking_mysqli, $query_query_dlrprospect);
$row_query_dlrprospect = mysqli_fetch_array($query_dlrprospect);
$totalRows_query_dlrprospect = mysqli_num_rows($query_dlrprospect);
$prospctdlrid = $row_query_dlrprospect['id'];

$prospctdlr_token = $row_query_dlrprospect['token'];
$dlrprospect_locked = $row_query_dlrprospect['dlrprospect_locked'];

if($dlrprospect_locked == 1){
	
	header("Location: dealer.locked.php?prospctdlrid=$prospctdlrid");

}
if(!$prospctdlrid){
	
	header("Location: my.dealers.pending.php");
	
}


if(!$prospctdlr_token){

$prospctdlr_token = $tkey;

$update_prospectdlr_token_sql = "	
	UPDATE `idsids_tracking_idsvehicles`.`dealer_prospects` SET
	`token` = '$prospctdlr_token'
		WHERE
		`id` = '$prospctdlrid'
";


$ran_update_prospectdlr_token_sql = mysqli_query($idsconnection_mysqli, $update_prospectdlr_token_sql);

	
	
}

//echo 'P';
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pullactvDudes = "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_status` = 1 ORDER BY dudes_lname ASC";
$pullactvDudes = mysqli_query($idsconnection_mysqli, $query_pullactvDudes);
$row_pullactvDudes = mysqli_fetch_array($pullactvDudes);
$totalRows_pullactvDudes = mysqli_num_rows($pullactvDudes);

$query_qrydlr_prospc_notes = "SELECT * FROM `dudes_dlr_prospc_notes` WHERE `dudes_dlr_notes_did` = '$prospctdlrid' ORDER BY `dudes_dlr_notes_created_at` DESC";
$qrydlr_prospc_notes = mysqli_query($tracking_mysqli, $query_qrydlr_prospc_notes);
$row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes);
$totalRows_qrydlr_prospc_notes = mysqli_num_rows($qrydlr_prospc_notes);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_activsystem_templates = "SELECT * FROM `dudes_sys_htmlemail_templates` WHERE `email_systm_templates_status` = '1' ORDER BY `email_systm_templates_subject` ASC";
$find_activsystem_templates = mysqli_query($idsconnection_mysqli, $query_find_activsystem_templates);
$row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
$totalRows_find_activsystem_templates = mysqli_num_rows($find_activsystem_templates);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_dlrtypes = "SELECT * FROM idsids_idsdms.dealer_types ORDER BY dtype_id ASC";
$qry_dlrtypes = mysqli_query($idsconnection_mysqli, $query_qry_dlrtypes);
$row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes);
$totalRows_qry_dlrtypes = mysqli_num_rows($qry_dlrtypes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM idsids_idsdms.states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_array($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_timezones = "SELECT * FROM `idsids_idsdms`.`calendar|timezones` ORDER BY TimeZone ASC";
$dlr_timezones = mysqli_query($idsconnection_mysqli, $query_dlr_timezones);
$row_dlr_timezones = mysqli_fetch_array($dlr_timezones);
$totalRows_dlr_timezones = mysqli_num_rows($dlr_timezones);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mobile_carriers = "SELECT * FROM idsids_idsdms.mobile_carriers ORDER BY carrier_label ASC";
$mobile_carriers = mysqli_query($idsconnection_mysqli, $query_mobile_carriers);
$row_mobile_carriers = mysqli_fetch_array($mobile_carriers);
$totalRows_mobile_carriers = mysqli_num_rows($mobile_carriers);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM `idsids_idsdms`.`auto_years` ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_array($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM `idsids_idsdms`.`car_make` ORDER BY `car_make` ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_array($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM `idsids_idsdms`.`colors_hex` ORDER BY `colors_hex`.`color_name`";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_array($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_transm = "SELECT DISTINCT `vehicles`.`vtransm` FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vtransm` not IN ('NULL')";
$distinct_transm = mysqli_query($idsconnection_mysqli, $query_distinct_transm);
$row_distinct_transm = mysqli_fetch_array($distinct_transm);
$totalRows_distinct_transm = mysqli_num_rows($distinct_transm);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_bodystyles = "SELECT * FROM idsids_idsdms.body_styles ORDER BY body_style_name ASC";
$query_bodystyles = mysqli_query($idsconnection_mysqli, $query_query_bodystyles);
$row_query_bodystyles = mysqli_fetch_array($query_bodystyles);
$totalRows_query_bodystyles = mysqli_num_rows($query_bodystyles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_prospect_vehicles = "SELECT * FROM idsids_idsdms.vehicles WHERE `prospctdlrid` = '$prospctdlrid' ORDER BY vmake ASC";
$prospect_vehicles = mysqli_query($idsconnection_mysqli, $query_prospect_vehicles);
$row_prospect_vehicles = mysqli_fetch_array($prospect_vehicles);
$totalRows_prospect_vehicles = mysqli_num_rows($prospect_vehicles);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>

	<!-- Adding Drop Zone For Vehicle Uploads-->
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
 
</head>

<body>
<?php include("analyticstracking.php"); ?>

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Dealer Prospect</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="myaccountbtn">
                    	<a role="button"><?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?></a>
                        <input id="dudesid" type="hidden" value="<?php echo $dudesid; ?>">
                    </li>
                    <li>
                        <a href="#">Working Prospect Dealer</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div id="dealer_box" class="row">
            	<?php include("views/body.prospect.dealer.php"); ?>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealer Store Photos <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">


                    </div>
                </div>
              </div>
            </div>







            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Prospect Last Active <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Prospect Misc Infor <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    	<h1>None at This Time</h1>

                    </div>
                </div>
              </div>
            </div>
            


            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

	<script src="js/custom/prospect.dealer.js"></script>
    <script src="js/custom/page/dropzone.vehicleuploads.js"></script>
    
    
    
    <script src="js/plugins/dropzone/dropzone.js"></script>
    <script src="js/custom/page/custom.inventory.prospectdlr.create.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
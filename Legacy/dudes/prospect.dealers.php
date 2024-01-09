<?php require_once('db_admin.php'); ?>
<?php





mysqli_select_db($tracking_mysqli, $database_tracking);
$query_distnct_dlrprspct_states = "
SELECT DISTINCT
dealer_prospects.state,
count( * ) AS total_state_records
	FROM `dudes_states`, `dealer_prospects`
WHERE dudes_states.state_abrv = dealer_prospects.state
group by
dealer_prospects.state";
$distnct_dlrprspct_states = mysqli_query($tracking_mysqli, $query_distnct_dlrprspct_states);
$row_distnct_dlrprspct_states = mysqli_fetch_array($distnct_dlrprspct_states);
$totalRows_distnct_dlrprspct_states = mysqli_num_rows($distnct_dlrprspct_states);


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_distnct_dlrprspct_cities = "SELECT DISTINCT
`dealer_prospects`.`city`,
count( * ) AS total_city_records
	FROM `idsids_tracking_idsvehicles`.`dealer_prospects`
WHERE 
`dealer_prospects`.`state` = '$dudes_home_state'
group by
`dealer_prospects`.`city`
";
$distnct_dlrprspct_cities = mysqli_query($tracking_mysqli, $query_distnct_dlrprspct_cities);
$row_distnct_dlrprspct_cities = mysqli_fetch_array($distnct_dlrprspct_cities);
$totalRows_distnct_dlrprspct_cities = mysqli_num_rows($distnct_dlrprspct_cities);


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_distnct_dlrprspct_dlrtypes = "SELECT 
`dudes_dealer_types`.`dtype_id`, `dudes_dealer_types`.`dtype_label`,
count( * ) AS total_dlr_types
FROM `idsids_tracking_idsvehicles`.`dudes_dealer_types`, `idsids_tracking_idsvehicles`.`dealer_prospects`
WHERE `dealer_prospects`.`dealer_type_label` = `dudes_dealer_types`.`dtype_label`
group by
`dudes_dealer_types`.`dtype_id`";
$distnct_dlrprspct_dlrtypes = mysqli_query($tracking_mysqli, $query_distnct_dlrprspct_dlrtypes);
$row_distnct_dlrprspct_dlrtypes = mysqli_fetch_array($distnct_dlrprspct_dlrtypes);
$totalRows_distnct_dlrprspct_dlrtypes = mysqli_num_rows($distnct_dlrprspct_dlrtypes);




mysqli_select_db($tracking_mysqli, $database_tracking);
$query_dstates = "SELECT DISTINCT dealer_prospects.`state` FROM `idsids_tracking_idsvehicles`.`dealer_prospects` ORDER BY `dealer_prospects`.`state` DESC";
$dstates = mysqli_query($tracking_mysqli, $query_dstates);
$row_dstates = mysqli_fetch_array($dstates);
$totalRows_dstates = mysqli_num_rows($dstates);








$colname_find_dealer_prospects = "-1";
if (isset($_GET['state'])) {
  $colname_find_dealer_prospects = $_GET['state'];
}
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_find_dealer_prospects = "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `dealer_prospects`.`state` = '$colname_find_dealer_prospects' ORDER BY `dealer_prospects`.`company` ASC";
$find_dealer_prospects = mysqli_query($tracking_mysqli, $query_find_dealer_prospects);
$row_find_dealer_prospects = mysqli_fetch_array($find_dealer_prospects);
$totalRows_find_dealer_prospects = mysqli_num_rows($find_dealer_prospects);




?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>
    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

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
                <h2>Prospect Dealers</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Dealer Prospects</a>
                    </li>
                    <li>
                    	<button id="toggle_dlrprospects" class="btn btn-sm" style="display:none;">Flip Prospecting</button>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div id="work_aprospect_instate" class="row" style="display:none;">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Work This Dealer <small>Here you are working this prospect.</small></h5>
                    </div>
                    <div id="work_dealer_prospect_section" class="ibox-content">

								<h2>No Prospect Selected</h2>
								<input id="prospctdlrid" type="hidden" value="">
                                

                    </div>
                </div>
              </div>
            </div>



            <div id="pick_aprospect_instate" class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-md-2 col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="product_name">Dealer States</label>
                            <select name="prospect_states" id="prospect_states" class="form-control">
    <option value="">Select State</option>
    <?php
do {  
?>
    <option value="<?php echo $row_distnct_dlrprspct_states['state']?>"><?php echo $row_distnct_dlrprspct_states['state']?> (<?php echo $row_distnct_dlrprspct_states['total_state_records']; ?>)</option>
    <?php
} while ($row_distnct_dlrprspct_states = mysqli_fetch_array($distnct_dlrprspct_states));
  $rows = mysqli_num_rows($distnct_dlrprspct_states);
  if($rows > 0) {
      mysqli_data_seek($distnct_dlrprspct_states, 0);
	  $row_distnct_dlrprspct_states = mysqli_fetch_array($distnct_dlrprspct_states);
  }
?>
  </select>
                        </div>
                    </div>
                    <div class=" col-md-3 col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="price">Dealer Cities</label>
                            <select name="prospect_cities" id="prospect_cities" class="form-control">
    <option value="">Select City</option>
    <?php do {  ?>
    <option value="<?php echo $row_distnct_dlrprspct_cities['city']?>"><?php echo $row_distnct_dlrprspct_cities['city']?> (<?php echo $row_distnct_dlrprspct_cities['total_city_records']; ?>)</option>
    <?php
} while ($row_distnct_dlrprspct_cities = mysqli_fetch_array($distnct_dlrprspct_cities));
  $rows = mysqli_num_rows($distnct_dlrprspct_cities);
  if($rows > 0) {
      mysqli_data_seek($distnct_dlrprspct_cities, 0);
	  $row_distnct_dlrprspct_cities = mysqli_fetch_array($distnct_dlrprspct_cities);
  }
?>
  </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="quantity">Dealer Types</label>
                            <select name="prospect_dlrtypes" id="prospect_dlrtypes" class="form-control">
    <option value="">None Selected</option>
    <?php
do {  
?>
    <option value="<?php echo $row_distnct_dlrprspct_dlrtypes['dtype_id']?>"><?php echo $row_distnct_dlrprspct_dlrtypes['dtype_label']?> (<?php echo $row_distnct_dlrprspct_dlrtypes['total_dlr_types']; ?>)</option>
    <?php
} while ($row_distnct_dlrprspct_dlrtypes = mysqli_fetch_array($distnct_dlrprspct_dlrtypes));
  $rows = mysqli_num_rows($distnct_dlrprspct_dlrtypes);
  if($rows > 0) {
      mysqli_data_seek($distnct_dlrprspct_dlrtypes, 0);
	  $row_distnct_dlrprspct_dlrtypes = mysqli_fetch_array($distnct_dlrprspct_dlrtypes);
  }
?>

  </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="prospect_dlr_assigndtome">Dealers Assigned To Me</label>
                            

                            <div class="input-group">
                            <select name="prospect_dlr_assigndtome" id="prospect_dlr_assigndtome" class="form-control">
                                <option value="1" selected>Assigned To Me</option>
                                <option value="0">Not Assigned To Me</option>
                            </select>

							<span class="input-group-btn">
                             <button id="pull_dealer_ajax_results" type="button" class="btn btn-primary btn-sm btn-rounded dim">Pull Results!</button>
                            </span>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>

            </div>





            <div id="pick_aprospectdlr_towork" class="row" style="display:none;" >
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                        <h5> Dealer Prospects</h5>
                        </div>
                    
                        <div id="prospect_dealer_table_results" class="ibox-content">


 							<div class="spiner-example">
                                <div class="sk-spinner sk-spinner-fading-circle">
                                    <div class="sk-circle1 sk-circle"></div>
                                    <div class="sk-circle2 sk-circle"></div>
                                    <div class="sk-circle3 sk-circle"></div>
                                    <div class="sk-circle4 sk-circle"></div>
                                    <div class="sk-circle5 sk-circle"></div>
                                    <div class="sk-circle6 sk-circle"></div>
                                    <div class="sk-circle7 sk-circle"></div>
                                    <div class="sk-circle8 sk-circle"></div>
                                    <div class="sk-circle9 sk-circle"></div>
                                    <div class="sk-circle10 sk-circle"></div>
                                    <div class="sk-circle11 sk-circle"></div>
                                    <div class="sk-circle12 sk-circle"></div>
                                </div>
                            </div>




                        
                        </div>                    
                    
                    
                    
                    
                    
                    </div>
                </div>
        </div>













            <div id="sendtoregistered_que" class="row" style="display:none;">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Convert To Regsitered Que <small>Send a que and welcome kit</small></h5>
                    </div>
                    <div class="ibox-content">






<div class="row">
	<div class="col-md-12" align="center">
    	<button class="btn btn-block btn-danger" type="button" id="covert_to_pending">Save And Send To Pending Que</button>
    </div>
</div>





                    

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
    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>
    <script src="js/custom/prospect.dealers.js"></script>


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
<?php require_once('db_admin.php'); ?>
<?php



$colname_find_dudecatid = "-1";
if (isset($_GET['cat_id'])) {
  $colname_find_dudecatid = $_GET['cat_id'];
}
mysql_select_db($tracking_mysqli, $database_tracking);
 $query_find_dudecatid =  "SELECT * FROM `idsids_idsdms`.`dudes_sys_template_cats` WHERE `dudes_sys_template_cats`.`sys_template_cat_id` = '$colname_find_dudecatid'";
$find_dudecatid = mysqli_query($idsconnection_mysqli, $query_find_dudecatid);
$row_find_dudecatid = mysqli_fetch_array($find_dudecatid);
$totalRows_find_dudecatid = mysqli_num_rows($find_dudecatid);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>

</head>

<body>
<?php include("analyticstracking.php"); ?>
    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Edit This Category</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Power House</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Change Category <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">
                    <label>Change Category Name</label>
                      <input type="text" name="sys_template_cat_type_label" id="sys_template_cat_type_label" class="form-control" value="<?php echo $row_find_dudecatid['sys_template_cat_type_label']; ?>">

                    
					<input id="sys_template_cat_id" type="hidden" value="<?php echo $row_find_dudecatid['sys_template_cat_id']; ?>">

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Save your changes</h5>
                    </div>
                    <div class="ibox-content">

                    	<button type="button" id="change_category_btn" class="btn btn-block btn-primary">Change Category Name</button>

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
<script type="text/javascript" language="javascript" src="js/custom/page/category.edit.js"></script>
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
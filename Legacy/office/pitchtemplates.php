<?php require_once('../Connections/tracking.php'); ?>
<?php require_once('db_admin.php'); ?>
<?php
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_dudes_sys_template_cat = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_sys_template_cats` ORDER BY `sys_template_cat_type_label` ASC";
$dudes_sys_template_cat = mysqli_query($tracking_mysqli, $query_dudes_sys_template_cat);
$row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat);
$totalRows_dudes_sys_template_cat = mysqli_num_rows($dudes_sys_template_cat);


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullSalespitches = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_salespitch` WHERE `dudes_salespitch_status` = 1 ORDER BY `dudes_salespitch_name` ASC";
$pullSalespitches = mysqli_query($tracking_mysqli, $query_pullSalespitches);
$row_pullSalespitches = mysqli_fetch_array($pullSalespitches);
$totalRows_pullSalespitches = mysqli_num_rows($pullSalespitches);

mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullInactvSalespitches = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_salespitch` WHERE `dudes_salespitch_status` = 0 ORDER BY `dudes_salespitch_name` ASC";
$pullInactvSalespitches = mysqli_query($tracking_mysqli, $query_pullInactvSalespitches);
$row_pullInactvSalespitches = mysqli_fetch_array($pullInactvSalespitches);
$totalRows_pullInactvSalespitches = mysqli_num_rows($pullInactvSalespitches);

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
                <h2>Pitch Templates</h2>
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
                        <h5>Active Pitches <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">
                      <table width="100%" border="0">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Category</th>
                          <th scope="col">Title</th>
                          <th scope="col">Status</th>
                          <th scope="col">Actions</th>
                        </tr>
                        <?php do { ?>
                        <tr>
                          <td><?php echo $row_pullSalespitches['dudes_salespitch_id']; ?></td>
                          <td><?php echo $row_pullSalespitches['dudes_cat_label']; ?></td>
                          <td><?php echo $row_pullSalespitches['dudes_salespitch_name']; ?></td>
                          <td><?php echo $row_pullSalespitches['dudes_salespitch_status']; ?></td>
                            <td><a href="pitchtemplate.edit.php?salespitch_id=<?php echo $row_pullSalespitches['dudes_salespitch_id']; ?>">View</a></td>
                        </tr>
                          <?php } while ($row_pullSalespitches = mysqli_fetch_array($pullSalespitches)); ?>
<tr>
                      </table>
                      <p>&nbsp;</p>
                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Inactive Pitches <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

<table width="100%" border="0">
                <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Category</th>
                          <th scope="col">Title</th>
                          <th scope="col">Status</th>
                          <th scope="col">Actions</th>
                        </tr>
                        <?php do { ?>
                          <tr>
                            <td><?php echo $row_pullInactvSalespitches['dudes_salespitch_id']; ?></td>
                            <td><?php echo $row_pullInactvSalespitches['dudes_cat_label']; ?></td>
                            <td><?php echo $row_pullInactvSalespitches['dudes_salespitch_name']; ?></td>
                            <td><?php echo $row_pullInactvSalespitches['dudes_salespitch_status']; ?></td>
                            <td><a href="pitchtemplate.edit.php?salespitch_id=<?php echo $row_pullInactvSalespitches['dudes_salespitch_id']; ?>">View</a></td>
                          </tr>
                          <?php } while ($row_pullInactvSalespitches = mysqli_fetch_array($pullInactvSalespitches)); ?>
                      </table>                    

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
<?php
mysqli_free_result($pullInactvSalespitches);

mysqli_free_result($pullSalespitches);
?>
<?php include("inc.end.phpmsyql.php"); ?>
<?php include("db_loggedin.php"); ?>
<?php
function fileExists($filePath)
{
      return is_file($filePath) && file_exists($filePath);
}



$query_CountVehicles = "
SELECT
(SELECT count(`vehicles`.`vid`) FROM  `idsids_idsdms`.`vehicles` WHERE `vehicles`.`did` = '$did' AND `vehicles`.`vlivestatus` = '1') AS countLive,
(SELECT count(`vehicles`.`vid`) FROM  `idsids_idsdms`.`vehicles` WHERE `vehicles`.`did` = '$did' AND `vehicles`.`vlivestatus` = '0') AS countHold,
(SELECT count(`vehicles`.`vid`) FROM  `idsids_idsdms`.`vehicles` WHERE `vehicles`.`did` = '$did' AND `vehicles`.`vlivestatus` = '9') AS countSold
FROM `idsids_idsdms`.`vehicles`

 WHERE `vehicles`.`did` = '$did' ORDER BY `vehicles`.`created_at` DESC  LIMIT 1";
$CountVehicles = mysqli_query($idsconnection_mysqli, $query_CountVehicles);
$row_CountVehicles = mysqli_fetch_assoc($CountVehicles);
$totalRows_CountVehicles = mysqli_num_rows($CountVehicles);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Inventory: <?php echo $row_userDets['company']; ?></title>

    <link href="js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
                    <?php include("_nav_top.php"); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Viewing <?php echo $vstat_text; ?> Inventory</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Inventory</a>
                        </li>
                        <li class="active">
                            <strong><?php echo $vstat_text; ?> Inventory</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>














<!-- START Inventory Transfer Bar -->
			<div class="row wrapper border-bottom white-bg page-heading" style="display:none;">
                <div class="col-sm-12">
                    <div class="midbar" align="center">







                            <div class="alert alert-warning">
                                You Have New Inventory Incoming <a class="alert-link" href="#">Accept</a> 'OR' <a class="alert-link" href="#">DENY</a>.
                            </div>












                    </div>
                </div>
            </div>
<!-- END View Inventory Bar -->

























            


<!-- START View Inventory Bar -->
			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="midbar" align="center">
   <?php 
		if($vstat == '9'){$inventory_btn_sold = 'btn-danger btn-fw-switch';}else{ $inventory_btn_sold = 'btn-danger'; }
		if($vstat == '0'){$inventory_btn_hold = 'btn-warning btn-fw-switch';}else{ $inventory_btn_hold = 'btn-warning'; }
		if($vstat == '1'){$inventory_btn_live = 'btn-primary btn-fw-switch';}else{ $inventory_btn_live = 'btn-primary'; }
  
		if($vstat == 'all'){
			$inventory_btn_live = 'btn-primary'; $inventory_btn_hold = 'btn-primary'; $inventory_btn_sold = 'btn-primary'; 
		}
	?>
                    
                        <a href="inventory.php?vstat=1" class="btn <?php echo $inventory_btn_live; ?> btn-lg"><i class="fa fa-sun-o"></i><span id='vehicleliveResults'> VIEW <?php echo $row_vehiclesOnHld['LIVE']; ?> LIVE </span></a>
                        <a href="inventory.php?vstat=0" class="btn <?php echo  $inventory_btn_hold; ?> btn-lg"><i class="fa fa-stop-circle-o"></i><span id='vehicleholdResults'> VIEW <?php echo $row_vehiclesOnHld['HOLD']; ?> HOLD </span></a>
                        <a href="inventory.php?vstat=9" class="btn <?php echo $inventory_btn_sold; ?> btn-lg"><i class="fa fa-tag"></i><span id='vehiclesoldResults'> VIEW <?php echo $row_vehiclesOnHld['SOLD']; ?> SOLD </span></a>
                    </div>
                </div>
            </div>
<!-- END View Inventory Bar -->

            
        <div id="inventory_bar" class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="padding:14px 15px 42px;">
                        <h5>Viewing <?php echo $vstat_text; ?> Inventory <small>Sort, search or change status instantly</small></h5>
                        
                          
                            <input id="markTheseVehicles" class="" name="markTheseVehicles" type="hidden" value="">
                          
                            <input id="countLiveVehicles" class="" name="countLiveVehicles" type="hidden" value="<?php echo $row_CountVehicles['countLive']; ?>">
                        
                            <input id="countSoldVehicles" class="" name="countSoldVehicles" type="hidden" value="<?php echo $row_CountVehicles['countSold']; ?>">

                            <input id="countHoldVehicles" class="" name="countHoldVehicles" type="hidden" value="<?php echo $row_CountVehicles['countHold']; ?>">


                        
                    
                    </div>
<?php if($totalRows_LiveVehicles != 0): ?>

                    <div id="inventory_body" class="ibox-content">
						
                        <div id="inventory_actionsbox" align="center">
                        <span>
                          <button id="catchlivevids" data-count="<?php echo $inventory_btn_live; ?>" class="btn <?php echo $inventory_btn_live; ?>">Mark Live</button>
                          <button id="catchholdvids" data-count="<?php echo $inventory_btn_hold; ?>" class="btn <?php echo $inventory_btn_hold; ?> ">Mark Hold</button>
                          <button id="catchsoldvids" data-count="<?php echo $inventory_btn_sold; ?>" class="btn <?php echo $inventory_btn_sold; ?>">Mark Sold</button>
                         </span>
                          
                        </div>
                        
                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Photo / Status</th>
                        <th>Stock No</th>
                        <th>Year Make Model Trim</th>
                        <th>Pricing</th>
                        <th>Down Payment</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $counter_gridrow = 0; ?>

                        <?php do { ?>

                        <?php $counter_gridrow++; ?>                        

                                            <tr class="<?php if($counter_gridrow % 2 == 0){ echo 'gradeC';}elseif($counter_gridrow % 1 == 0){ echo 'gradeX';} ?>">
                                                <td class="center">
                                                <input id="vehicle_do" type="checkbox" value="<?php echo $row_LiveVehicles['vid']; ?>" name="list" class="checkbox"/>



                                                    <span class="vdatesince">Since: <?php echo $row_LiveVehicles['vDateInStock']; ?></span>
                                                    
                                                    <br />
                                                    <a href="<?php echo $row_LiveVehicles['vthubmnail_file_path']; ?>" class="fancybox">
                                                    
                                                    <?php if (file_exists($row_LiveVehicles['vthubmnail_file_path'])) { ?>
                                                        <img class="thumbnail" src="<?php echo $row_LiveVehicles['vthubmnail_file_path']; ?>" width="120px" />
                                                            
                                                    <?php } else { ?>
                                                    
                                                            <img class="thumbnail" src="<?php echo "https://images.autocitymag.com/no-photo.png"; ?>" width="120px" />
                                                            
                                                            
                                                    <?php   } ?>
                                                    
                                                        
                                                        
                                                        
                                                    
                                                    
                                                    </a>
                                                    <br />
                                                <?php if($row_LiveVehicles['vlivestatus'] == 0){ echo 'HOLD';}elseif($row_LiveVehicles['vlivestatus'] == 1){ echo 'LIVE';}elseif($row_LiveVehicles['vlivestatus'] == 9){ echo 'SOLD';}; ?>
                                                <br />

                                                <button class="btn btn-primary" onClick="window.location.href='inventory.edit.php?vid=<?php echo $row_LiveVehicles['vid']; ?>'">Edit</button>

                                                </td>
                                                <td class="center"><?php echo $row_LiveVehicles['vstockno']; ?></td>
                                                <td class="center">
                                                    <strong>Description: </strong><br />
                                                    <?php echo $row_LiveVehicles['vyear']; ?> <?php echo $row_LiveVehicles['vmake']; ?> <?php echo $row_LiveVehicles['vmodel']; ?> <?php echo $row_LiveVehicles['vtrim']; ?><br /> <br />
                                                    <strong>VIN: </strong><?php echo $row_LiveVehicles['vvin']; ?><br /> <br />
                                                    <strong>Exterior Color: </strong><?php echo $row_LiveVehicles['vecolor_txt']; ?><br /> <br />
                                                    <strong>Interior Color: </strong><?php echo $row_LiveVehicles['vicolor_txt']; ?><br /> <br />
                                                </td>
                                                <td class="center">
                                                <?php if($row_LiveVehicles['vrprice']){ ?><strong>Retail Price: </strong><br /><?php echo $row_LiveVehicles['vrprice']; ?><br /><?php } ?>
                                                <?php if($row_LiveVehicles['vspecialprice']){ ?><strong>Special Price: </strong><br /><?php echo $row_LiveVehicles['vspecialprice']; ?><?php } ?>
                                                </td>
                                                <td class="center"><?php echo $row_LiveVehicles['vdprice']; ?></td>
                                                <td class="center">
                                                <div class="vuser_actnbx">
                                                <div class="btn btn-info btn-block p-xs">
                                                    <a href="inventory.edit.php?vid=<?php echo $row_LiveVehicles['vid']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View/Edit</a>
                                                </div>
                                                
                                                <div class="btn btn-info btn-block p-xs">
                                                    <a href="vphotos.php?vid=<?php echo $row_LiveVehicles['vid']; ?>"><i class="fa fa-picture-o" aria-hidden="true"></i> View Photos</a>
                                                </div>
                                                
                                                <div class="btn btn-info btn-block p-xs">
                                                    <a href="upload-vphotos.php?vid=<?php echo $row_LiveVehicles['vid']; ?>"><i class="fa fa-level-up" aria-hidden="true"></i> Upload Photos</a>
                                                </div>
                                                </div>
                                                </td>
                                            </tr>
                        <?php } while ($row_LiveVehicles = mysqli_fetch_array($LiveVehicles)); ?>
                    </tbody>
                    </tfoot>
                    <tr>
                        <th>Photo / Status</th>
                        <th>Stock No</th>
                        <th>Year Make Model Trim</th>
                        <th>Retail Pricing</th>
                        <th>Down Payment</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>

                    </div>

<?php endif; ?>                
                </div>
            </div>
            </div>
            
        </div>
        <?php include("footer.php"); ?>

        </div>
        </div>


    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>
    
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/ids.inventory.js"></script>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable( {
		"iDisplayLength": 25,
	   "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "/swf/copy_csv_xls_pdf.swf"
        },
		"order": [[1, 'asc']],
		"ordering": false,
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    } );
	
	
} );

</script>

    <!-- Fancy box -->
    <script src="js/plugins/fancybox/jquery.fancybox.js"></script>


    <script>
        $(document).ready(function() {
            $('.fancybox').fancybox({
                openEffect	: 'none',
                closeEffect	: 'none'
            });
        });
    </script>

</body>

</html>
<?php require_once("inc.end.phpmsyql.php"); ?>
<?php require_once('db_admin.php'); ?>
<?php




$vstat=1;
if (isset($_GET['vstat'])) {
  $vstat = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['vstat']));
  
  if($vstat == '9'){$vstat_text = 'Sold'; $vstatus = "'9'";}
  elseif($vstat == '0'){ $vstat_text = 'Hold'; $vstatus = "'0'";}
  elseif($vstat == 'all'){$vstat_text = 'Hold, Live &amp; Sold'; $vstatus = "'9','1','0'"; }
  else{$vstat_text = 'Live';  $vstatus = "'1'"; }
  
  $vstatsql = "`vehicles`.`vlivestatus` IN ($vstatus)";
   
}else{$vstat_text = 'Live'; $vstatus = "'1'"; $vstatsql = "vehicles.vlivestatus = $vstatus"; }
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles = "
 SELECT * 
 FROM `idsids_idsdms`.`vehicles`
 LEFT JOIN `idsids_idsdms`.`dealers`
 	ON `vehicles`.`did` = `dealers`.`id`
	
 WHERE $vstatsql 
 GROUP BY
 	`vehicles`.`vid`
 ORDER BY `vehicles`.`created_at` DESC ";
$query_LiveVehicles;
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_array($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles);














mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vehiclesOnHld = "SELECT `vehicles`.`vlivestatus`, `vehicles`.`vid`,
    (SELECT COUNT(*) FROM `idsids_idsdms`.`vehicles` WHERE `vlivestatus` = '0') AS HOLD,
    (SELECT COUNT(*) FROM `idsids_idsdms`.`vehicles` WHERE `vlivestatus` = '1') AS LIVE,
    (SELECT COUNT(*) FROM `idsids_idsdms`.`vehicles` WHERE `vlivestatus` = '3') AS AUCTION,
    (SELECT COUNT(*) FROM `idsids_idsdms`.`vehicles` WHERE `vlivestatus` = '9') AS SOLD
FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vlivestatus` AND `vehicles`.`did` IS NOT NULL GROUP BY `vehicles`.`vid`";
$vehiclesOnHld = mysqli_query($idsconnection_mysqli, $query_vehiclesOnHld);
$row_vehiclesOnHld = mysqli_fetch_array($vehiclesOnHld);
$totalRows_vehiclesOnHld = mysqli_num_rows($vehiclesOnHld);




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

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Full Inventory</h2>
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








<!-- START View Inventory Bar -->
			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="midbar" align="center">
   <?php 
		if($vstat == '9'){$inventory_btn_sold = 'btn-warning';}else{ $inventory_btn_sold = 'btn-primary'; }
		if($vstat == '0'){$inventory_btn_hold = 'btn-warning';}else{ $inventory_btn_hold = 'btn-primary'; }
		if($vstat == '1'){$inventory_btn_live = 'btn-warning';}else{ $inventory_btn_live = 'btn-primary'; }
  
		if($vstat == 'all'){
			$inventory_btn_live = 'btn-primary'; $inventory_btn_hold = 'btn-primary'; $inventory_btn_sold = 'btn-primary'; 
		}
	?>
                    
                        <a href="inventory.php?vstat=1" class="btn <?php echo $inventory_btn_live; ?> btn-lg">VIEW <?php echo $row_vehiclesOnHld['LIVE']; ?> LIVE</a>
                        <a href="inventory.php?vstat=0" class="btn <?php echo  $inventory_btn_hold; ?> btn-lg">VIEW <?php echo $row_vehiclesOnHld['HOLD']; ?> HOLD</a>
                        <a href="inventory.php?vstat=9" class="btn <?php echo $inventory_btn_sold; ?> btn-lg">VIEW <?php echo $row_vehiclesOnHld['SOLD']; ?> SOLD</a>
                    </div>
                </div>
            </div>
<!-- END View Inventory Bar -->







            
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="padding:14px 15px 42px;">
                        <h5>Viewing <?php echo $vstat_text; ?> Inventory <small>Sort, search or change status instantly</small></h5>
                        
                          
                            <input id="markTheseVehicles" class="" name="markTheseVehicles" type="hidden" value="">
                          
                        



                        
                    
                    </div>
<?php if($totalRows_LiveVehicles != 0): ?>

                    <div class="ibox-content">
						
                        <div id="inventory_actionsbox" align="center">
                        <span>
                          <button id="catchlivevids" class="btn <?php echo $inventory_btn_live; ?>">Mark Live</button>
                          <button id="catchholdvids" class="btn <?php echo $inventory_btn_hold; ?> ">Mark Hold</button>
                          <button id="catchsoldvids" class="btn <?php echo $inventory_btn_sold; ?>">Mark Sold</button>
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


<?php
ini_set('memory_limit', '-1');

 do { ?>

<?php $counter_gridrow++; ?>                        

                    <tr class="<?php if($counter_gridrow % 2 == 0){ echo 'gradeC';}elseif($counter_gridrow % 1 == 0){ echo 'gradeX';} ?>">
                        <td class="center">
                        <input id="vehicle_do" type="checkbox" value="<?php echo $row_LiveVehicles['vid']; ?>" name="list" class="checkbox"/>



							<span class="vdatesince">Since: <?php echo $row_LiveVehicles['vDateInStock']; ?></span>
                            
                            <br />

    <?php if($row_LiveVehicles['vthubmnail_file_path']): ?>
    
  <?php
  $vthubmnail_file_path = $row_LiveVehicles['vthubmnail_file_path'];
  
    $vthubmnail_file_path = str_replace("../vehicles/photos", "https://images.autocitymag.com/", "$vthubmnail_file_path");
	
?>
    
    
    <img src="<?php echo $vthubmnail_file_path; ?>" width="120px" />

<?php else: ?>
    <img src="https://images.autocitymag.com/no-photo.png" width="120px" />


<?php endif; ?>



                            <br />
                       	<?php if($row_LiveVehicles['vlivestatus'] == 0){ echo 'HOLD';}elseif($row_LiveVehicles['vlivestatus'] == 1){ echo 'LIVE';}elseif($row_LiveVehicles['vlivestatus'] == 9){ echo 'SOLD';}; ?>
                        
                        <?php if($row_LiveVehicles['vphoto_count']) { echo ' &amp; ('.$row_LiveVehicles['vphoto_count'].') Photos'; }else{ echo '0'; } ?>
                        <br />

                        <button class="btn btn-primary" onClick="window.location.href='inventory.edit.php?vid=<?php echo $row_LiveVehicles['vid']; ?>'">Edit</button>

                        </td>
                        <td class="center"><?php echo $row_LiveVehicles['vstockno']; ?></td>
                        <td class="center">
<strong>Company: </strong><br />
<?php echo $row_LiveVehicles['company']; ?> <br />
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
                        <div class="btn btn-white">
                        	<a href="inventory.edit.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">View/Edit</a>
                        </div>
                        <br />
                        <br />
                        <div class="btn btn-white">
                            <a href="vphotos.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">View Photos</a>
                        </div>
                        <br />
                        <br />
                        <div class="btn btn-white">
                            <a href="upload-vphotos.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">Upload Photos</a>
                        </div>
                        <br />
                        <br />
                        <div class="btn btn-white">
                            <a target="_blank" href="dealer.php?sysdealertoken=<?php echo $row_LiveVehicles['token']; ?>&sysdealerid=<?php echo $row_LiveVehicles['did']; ?>">View Dealer</a>
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



            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        
		
		
		
		
		<?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

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
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
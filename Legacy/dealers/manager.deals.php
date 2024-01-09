<?php  require_once("db_manager_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM `idsids_idsdms`.`deals_bydealer` WHERE `deals_bydealer`.`deal_dealerID` = '$did' ORDER BY `deals_bydealer`.`deal_number` DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Deals: <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.manager.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Viewing Deals</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Deals</a>
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
                        <h5>Deal Manager <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Deal Number</th>
                        <th>Vehicle</th>
                        <th>Sellin Price</th>
                        <th>Lein Holder</th>
                        <th>Buyer(s)</th>
                        <th>Appointment</th>
                        <th>Trade</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php do { ?>
                      
                      <?php
					  $loop_appid = $row_find_dlrdeals['credit_app_id'];
					  
					  $dealID = $row_find_dlrdeals['deal_id'];
					  $link = "manager.deal.php?deal_id=$dealID&app_id=".$loop_appid."&secretkey=".$row_find_dlrdeals['deal_token'];
					  
					  ?>
                      
                      
                      
                      <tr id="<?php echo $row_find_dlrdeals['credit_app_id']; ?>" class="">
                          <td>
                            <a href="<?php echo $link; ?>"><?php echo $row_find_dlrdeals['deal_number']; ?></a>
                          </td>
                          <td><?php showphoto ($row_find_dlrdeals['vehicle_id']); ?>:
                            <?php echo $row_find_dlrdeals['vYear']; ?> <?php echo $row_find_dlrdeals['vMake']; ?> <?php echo $row_find_dlrdeals['vModel']; ?> <?php echo $row_find_dlrdeals['vTrim']; ?><br />
                            <?php echo $row_find_dlrdeals['vBodyType']; ?>
                          </td>
                          <td><?php echo $row_find_dlrdeals['priceVehicle']; ?></td>
                          <td><?php echo $row_find_dlrdeals['vLeinHolderNm']; ?></td> 
                        <td><?php echo $row_find_dlrdeals['credit_app_id']; ?></td>
                        <td><?php echo $row_find_dlrdeals['appointment_id']; ?></td> 
                          <td class="center">
                            <?php echo $row_find_dlrdeals['vTradeYr']; ?>
                            <?php echo $row_find_dlrdeals['vTradeMk']; ?>
                            <?php echo $row_find_dlrdeals['vTradeModel']; ?>
                            <?php echo $row_find_dlrdeals['vTradeTrim']; ?>
                          </td>
                          <td class="center"><a href="<?php echo $link; ?>"><i class="fa fa-newspaper-o"></i> View App</a></td>
                      </tr>
                        <?php } while ($row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals)); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Deal Number</th>
                        <th>Vehicle</th>
                        <th>Sellin Price</th>
                        <th>Lein Holder</th>
                        <th>Buyer(s)</th>
                        <th>Appointment</th>
                        <th>Trade</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>
                    </table>

                    </div>
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
<?php
mysqli_free_result($find_dlrdeals);
?>
<?php include("inc.end.phpmsyql.php"); ?>
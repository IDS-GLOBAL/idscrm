<?php require_once("db_manager_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_leads = "SELECT * FROM `cust_leads` WHERE `cust_leads`.`cust_dealer_id` = '$did' ORDER BY `cust_leads`.`cust_leadid` DESC";
$find_leads = mysqli_query($idsconnection_mysqli, $query_find_leads);
$row_find_leads = mysqli_fetch_assoc($find_leads);
$totalRows_find_leads = mysqli_num_rows($find_leads);

function mark_lead_read($lead_id){

global $did;
global $database_idsconnection;
global $idsconnection;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_thisunreadlead = "SELECT * FROM `cust_leads` WHERE `cust_leads`.`cust_dealer_id` = '$did' AND `cust_leads`.`cust_leadid` = '$lead_id' LIMIT 1";
$find_thisunreadlead = mysqli_query($idsconnection_mysqli, $query_find_thisunreadlead);
$row_find_thisunreadlead = mysqli_fetch_assoc($find_thisunreadlead);
$totalRows_find_thisunreadlead = mysqli_num_rows($find_thisunreadlead);
	
	echo 'Lead Count: #'.$totalRows_find_thisunreadlead;


return;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Leads: <?php echo $row_userDets['company']; ?></title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.manager.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Leads</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.customers.php">Customers</a>
                        </li>
                        <li class="active">
                            <a>Viewing Leads</a>
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
                        <h5>System Leads</h5>
                    </div>
                    <div class="ibox-content">

                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Vehicle</th>
                        <th>Source</th>
                        <th>Time In</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>

<?php if($totalRows_find_leads != 0): do { ?>
    <?php
    $cust_leadid = $row_find_leads['cust_leadid'];
	//customer-lead-preview-pdf.php?leadid=224
	$print_link = "manager.print.lead.pdf.php?leadid=".$cust_leadid;
	
	$cust_seenbydlr = $row_find_leads['cust_seenbydlr'];
	// mark_lead_read($lead_id);
	
	?>
  


                    <tr class="gradeX <?php if($cust_seenbydlr == '0'){ echo 'unseen'; }else{ echo 'seen'; } ?>">
                        <td>
                        <a href="manager.lead.view.php?leadid=<?php echo $cust_leadid; ?>" target="_parent">
                        	<?php 
							if(!$row_find_leads['cust_nickname']){
								echo $row_find_leads['cust_fname'].' '.$row_find_leads['cust_lname'];
							}else{
								echo $row_find_leads['cust_nickname'];
							}
							?>
                            </a>
                        </td>
                        <td>
                        	<a href="manager.lead.view.php?leadid=<?php echo $cust_leadid; ?>" target="_blank">
								<?php echo $row_find_leads['cust_email']; ?>
                            </a>
                        </td>
                        <td><?php  echo format_phone($row_find_leads['cust_phoneno']); ?></td>
                        <td class="center">
							<?php if(isset($row_find_leads['cust_vehicle_id']))
									{
                                	showphoto($row_find_leads['cust_vehicle_id']);
									}
                            ?>
                        </td>
                        <td class="center"><?php echo $row_find_leads['cust_lead_source']; ?></td>
                        <td class="center" title="Time In: <?php echo $row_find_leads['cust_lead_created_at']; ?>">
                        
                        <small class="timeago pull-right"><abbr class="timeago" title="<?php echo $row_find_leads['cust_lead_created_at']; ?>"> ...</abbr></small>
                        
                        </td>
                        <td class="center"><a href="<?php echo $print_link; ?>" target="_blank">Print</a></td>
                    </tr>

<?php } while ($row_find_leads = mysqli_fetch_assoc($find_leads)); endif; ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Vehicle</th>
                        <th>Source</th>
                        <th>Time In</th>
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
    
    <!-- Page-Level Scripts -->
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
		"order": [[ 6, "desc" ]],
		"displayLength": 25,
        "paging":         true
    } );
} );

</script>

<script type="text/javascript" src="js/plugins/timeago/jquery.timeago.js"></script>
<script>

jQuery(document).ready(function() {
  jQuery("abbr.timeago").timeago();
});

</script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
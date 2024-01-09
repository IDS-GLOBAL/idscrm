<?php require_once("db_manager_loggedin.php"); ?>
<?php

$query_dealer_template_types = "SELECT * FROM email_dealer_templates WHERE email_dealer_templates_did = '$did' ORDER BY email_dealer_templates_subject ASC";
$dealer_template_types = mysqli_query($idsconnection_mysqli, $query_dealer_template_types);
$row_dealer_template_types = mysqli_fetch_assoc($dealer_template_types);
$totalRows_dealer_template_types = mysqli_num_rows($dealer_template_types);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Email Templates: <?php echo $row_userDets['company']; ?></title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.manager.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Email Templates</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Email Templates</a>
                        </li>
                        <li class="active">
                            <a>Viewing Templates</a>
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
                        <h5>Email Templates</h5>
                    </div>
                    <div class="ibox-content">

                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Categorey</th>
                        <th>Type</th>
                        <th>Days Response</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

<?php do { ?>
    <?php
	
	?>
  


                    <tr class="gradeX">
                        <td>
                        <a href="manager.emailtemplate.edit.php?templateid=<?php echo $row_dealer_template_types['id']; ?>" target="_parent">
                        	<?php echo $row_dealer_template_types['email_dealer_templates_subject']; ?>
                            </a>
                        </td>
                        <td>
                        	<?php 
								if($row_dealer_template_types['email_dealer_templates_status'] == 1){
								echo 'Enabled';
								}else{
								echo 'Disabled';
								}
							?>
                        
                        </td>
                        <td class="center"><?php echo $row_dealer_template_types['email_dealer_templates_type']; ?></td>
                        <td class="center" title="Time In: <?php echo $row_dealer_template_types['email_dealer_templates_created_at']; ?>">
                        	<?php echo $row_dealer_template_types['days_response']; ?>
                        
                        </td>
                        <td class="center"><a href="manager.emailtemplate.edit.php?templateid=<?php echo $row_dealer_template_types['id']; ?>">
                        View</a></td>
                    </tr>

<?php } while ($row_dealer_template_types = mysqli_fetch_assoc($dealer_template_types)); ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Subject</th>
                        <th>Categorey</th>
                        <th>Type</th>
                        <th>Days Response</th>
                        <th>Actions</th>
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
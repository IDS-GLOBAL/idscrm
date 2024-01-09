<?php require_once('db_admin.php'); ?>
<?php










?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Email Templates: <?php echo $myname; ?></title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Email Templates</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="myaccountbtn">
                    	<a role="button"><?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?></a>
                        <input id="dudesid" type="hidden" value="<?php echo $dudesid; ?>">
                    </li>
                    <li>
                        <a href="#">All Templates</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->

















        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Email Categories</h5>
                    </div>
                    <div class="ibox-content">

                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Label</th>
                        <th>Rep Id</th>
                        <th>Created When</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

<?php do { ?>
    <?php
	
	?>
  


                    <tr class="gradeX">
                        <td>
                        <a href="category.edit.php?cat_id=<?php echo $row_dudes_sys_template_cat['sys_template_cat_id']; ?>" target="_parent">
                        	<?php echo $row_dudes_sys_template_cat['sys_template_cat_type_label']; ?>
                            </a>
                        </td>
                        <td class="center"><?php echo $row_dudes_sys_template_cat['sys_template_cat_type_label']; ?></td>
                        <td id="<?php echo $row_dudes_sys_template_cat['sys_template_cat_dudes_id']; ?>" class="center" title="By: <?php echo $row_dudes_sys_template_cat['sys_template_cat_dudes_id']; ?>">
                        	<?php echo $row_dudes_sys_template_cat['sys_template_cat_dudes_id']; ?>
                        
                        </td>
                        <td class="center" title="Time In: <?php echo $row_dudes_sys_template_cat['sys_template_cat_created_at']; ?>">
                        	<?php echo $row_dudes_sys_template_cat['sys_template_cat_created_at']; ?>
                        
                        </td>
                        <td class="center"><a href="category.edit.php?cat_id=<?php echo $row_dudes_sys_template_cat['sys_template_cat_id']; ?>">
                        View</a></td>
                    </tr>

<?php } while ($row_dudes_sys_template_cat = mysqli_fetch_array($dudes_sys_template_cat)); ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Record</th>
                        <th>Label</th>
                        <th>Rep Id</th>
                        <th>Credit When</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            </div>
            
            
            
        
        
        </div>
        






        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Active Templates</h5>
                    </div>
                    <div class="ibox-content">

                    <table id="mydataTable2" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Scrub Against</th>
                        <th>Category</th>
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
                        <a href="emailtemplate.edit.php?templateid=<?php echo $row_dealer_template_types['id']; ?>" target="_parent">
                        	<?php echo $row_dealer_template_types['email_systm_templates_subject']; ?>
                            </a>
                        </td>
                        <td>
                        	<?php 
								if($row_dealer_template_types['email_systm_templates_status'] == 1){
								echo 'Enabled';
								}else{
								echo 'Disabled';
								}
							?>
                        
                        </td>
                        <td>
                        -
                        </td>
                        <td class="center"><?php echo $row_dealer_template_types['email_systm_templates_type']; ?></td>
                        <!--td><?php //echo $row_dealer_template_types['email_systm_templates_body']; ?></td -->
                        <td class="center" title="Time In: <?php echo $row_dealer_template_types['email_systm_templates_created_at']; ?>  Last Modified: <?php echo $row_dealer_template_types['email_systm_templates_modified_at']; ?>">

                        	<?php echo $row_dealer_template_types['days_systm_response']; ?>
                        
                        </td>
                        <td class="center"><a href="email_templates/view.php?templateid=<?php echo $row_dealer_template_types['id']; ?>" target="_blank">
                        View</a></td>
                    </tr>

<?php } while ($row_dealer_template_types = mysqli_fetch_array($dealer_template_types)); ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Scrub Against</th>
                        <th>Category</th>
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
        





        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Inactive Templates</h5>
                    </div>
                    <div class="ibox-content">

                    <table id="mydataTable3" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th width="30%">Status</th>
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
                        <a href="emailtemplate.edit.php?templateid=<?php echo $row_dealer_template_types_inactive['id']; ?>" target="_parent">
                        	<?php echo $row_dealer_template_types_inactive['email_systm_templates_subject']; ?>
                            </a>
                        </td>
                        <td>
                        	<?php 
								if($row_dealer_template_types_inactive['email_systm_templates_status'] == 1){
								echo 'Enabled';
								}else{
								echo 'Disabled';
								}
							?>
                        
                        </td>
                        <td class="center"><?php echo $row_dealer_template_types_inactive['email_systm_templates_type']; ?></td>
                        <!--td><?php //echo $row_dealer_template_types_inactive['email_systm_templates_body']; ?></td -->
                        <td class="center" title="Time In: <?php echo $row_dealer_template_types_inactive['email_systm_templates_created_at']; ?>  Last Modified: <?php echo $row_dealer_template_types_inactive['email_systm_templates_modified_at']; ?>">

                        	<?php echo $row_dealer_template_types_inactive['days_systm_response']; ?>
                        
                        </td>
                        <td class="center"><a href="emailtemplate.edit.php?templateid=<?php echo $row_dealer_template_types_inactive['id']; ?>">
                        View</a></td>
                    </tr>

<?php } while ($row_dealer_template_types_inactive = mysqli_fetch_array($dealer_template_types_inactive)); ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Subject</th>
                        <th>Status</th>
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
        






        
        























		
		
		<?php include("_footer.php"); ?>

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


	$('#mydataTable2').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
		"order": [[ 6, "desc" ]],
		"displayLength": 25,
        "paging":         true
    } );




	$('#mydataTable3').dataTable({
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
<?php //include("inc.end.phpmsyql.php"); ?>
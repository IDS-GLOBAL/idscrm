<?php require_once("db_manager_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_departments = "SELECT * FROM `dealer_depts` WHERE `dept_did` = $did ORDER BY dept_name ASC";
$pull_departments = mysqli_query($idsconnection_mysqli, $query_pull_departments);
$row_pull_departments = mysqli_fetch_assoc($pull_departments);
$totalRows_pull_departments = mysqli_num_rows($pull_departments);



$company = $row_userDets['company'];
$dept_phoneno = $row_userDets['phone'];

$dept_address = $row_userDets['address'];
$dept_city = $row_userDets['city'];
$dept_state = $row_userDets['state'];
$dept_zip = $row_userDets['zip'];



$company = $row_userDets['company'];
$dept_phoneno = $row_userDets['phone'];

$dept_address = $row_userDets['address'];
$dept_city = $row_userDets['city'];
$dept_state = $row_userDets['state'];
$dept_zip = $row_userDets['zip'];



function create_default_dept($totalRows_pull_departments){

global $idsconnection;
global $database_idsconnection;
global $did;
global $company;
global $dealer_email;
global $dealer_address;
global $dept_address;
global $dept_city;
global $dept_zip;

global $dealer_state;
global $dept_phoneno;

static $totalRows_pull_departments;


$create_default_department_sql = "
INSERT INTO `idsids_idsdms`.`dealer_depts` SET

`dept_did` = '$did',
`dept_status` = '1',
`dept_link` = 'default',
`dept_name` = 'Default',
`dept_address` = '$dept_address $dept_city, $dealer_state, $dept_zip',
`dept_phoneno` = '$dept_phoneno'

";

	if($totalRows_pull_departments == 0){
	
		//echo "Create Default Here $totalRows_pull_departments".'<br />';
		//echo $create_default_department_sql;
		$run_create_default_department_sql = mysqli_query($idsconnection_mysqli, $create_default_department_sql);
		header("Location: manager.departments.php");
		
	}

return;

}

	if($totalRows_pull_departments == 0){
	
		create_default_dept($totalRows_pull_departments);
		
	}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Departments Of <?php echo $row_userDets['company']; ?></title>

<?php include("inc.head.php"); ?>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
                    <?php include("_nav_top.manager.php"); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Viewing <?php echo $vstat_text; ?> Departments</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <a>Departments</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a class="btn btn-warning btn-lg">Departments</a>                    
                        <a href="department.add.php" class="btn btn-primary btn-lg">Add New Department</a>
                    </div>
                </div>
            </div>







            
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="padding:14px 15px 42px;">
                        <h5>Viewing <?php echo $vstat_text; ?> Department <small>Sort, search or change status instantly</small></h5>
                        
                          
                            <input id="markTheseVehicles" class="" name="markTheseVehicles" type="hidden" value="">
                          
                        



                        
                    
                    </div>
<?php if($totalRows_pull_departments != 0): ?>

                    <div class="ibox-content">
						
                        
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Dept Name</th>
                        <th>Status</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
<?php $counter_gridrow = 0; ?>

<?php do { ?>

<?php $counter_gridrow++; ?>                        

                    <tr class="<?php if($counter_gridrow % 2 == 0){ echo 'gradeC';}elseif($counter_gridrow % 1 == 0){ echo 'gradeX';} ?>">
                        <td class="center">




                        <!--a class="btn btn-primary" href='department.edit.php?dept_id=<?php //echo $row_pull_departments['dept_id']; ?>'>Edit</a -->
						
						<?php echo $row_pull_departments['dept_name']; ?>

                        </td>
                        <td class="center">
						<?php 
						if($row_pull_departments['dept_status'] == 1){ echo 'Active'; }else {echo 'Inactive'; }; 
						?>
                        </td>
                        <td class="center"><?php echo $row_pull_departments['dept_phoneno']; ?></td>
                        <td class="center">
                        <div class="btn btn-white">
                        	<a href="department.edit.php?dept_id=<?php echo $row_pull_departments['dept_id']; ?>">View/Edit</a>
                        </div>
                        <br />
                        <br />

                        </td>
                    </tr>
<?php } while ($row_pull_departments = mysqli_fetch_assoc($pull_departments)); ?>
                    </tbody>
                    </tfoot>
                    <tr>
                        <th>Dept Name</th>
                        <th>Status</th>
                        <th>Phone Number</th>
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

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable();

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            //oTable.$('td').editable( '../example_ajax.php', {
            oTable.$('td').editable( NULL, {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>

</html>
<?php
mysqli_free_result($pull_departments);
?>
<?php include("inc.end.phpmsyql.php"); ?>
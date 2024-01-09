<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_Managers = "SELECT * FROM manager_person WHERE dealer_id =  '$did' ORDER BY manager_lastname ASC";
$Managers = mysqli_query($idsconnection_mysqli, $query_Managers);
$row_Managers = mysqli_fetch_assoc($Managers);
$totalRows_Managers = mysqli_num_rows($Managers);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Managers: <?php echo $row_userDets['company']; ?></title>

<?php include("inc.head.php"); ?>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Managers</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <a>Management Team</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a class="btn btn-warning btn-lg">Manage Managers</a>                    
                        <a href="manager.add.php" class="btn btn-primary btn-lg">Add New Manager</a>
                    </div>
                </div>
            </div>


            
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Managers <small>Sort, search</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
<?php if($totalRows_Managers != 0): ?>
                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th align="center">Name</th>
                        <th align="center">Email</th>
                        <th align="center">Mobile Number</th>
                        <th align="center">Manage Inventory</th>
                        <th align="center">Status</th>
                        <th align="center">Options</th>
                    </tr>
                    </thead>
                    <tbody>

						
									    <?php do { ?>
    

                          <?php
							$manager_id = $row_Managers['manager_id'];
							$addinvResult = $row_Managers['mgrid_addinv_2main_dealerid']; 
							$acctStatus = $row_Managers['acct_status'];
							$manager_link = "manager.edit.php?mgrid=$manager_id";
							$profile_image = $row_Managers['profile_image'];
							
							if(!$profile_image){
							$profile_image = 'img/no-pic-avatar.png';
							}
						  ?>
  


                    <tr class="gradeX">
                          <td align="center">
                          <div class="text-center">
                          <a href="<?php echo $manager_link; ?>">
							<?php echo $row_Managers['manager_firstname']; ?> <?php echo $row_Managers['manager_lastname']; ?>
                            
                          <img alt="image" class="m-t-xs img-responsive img-square" src="<?php echo $profile_image; ?>" width="120px">
                            
                            
                          </a>
                          </div>
                          </td>
                        <td>
                        <a href="<?php echo $manager_link; ?>">
							<?php echo $row_Managers['manager_email']; ?>
                        </a>
                        </td>
                        <td>
                        <a href="<?php echo $manager_link; ?>">
							<?php echo $row_Managers['manager_mobilephone_number']; ?>
                        </a>
                        </td>
                        <td align="center" class="center">
                        <a href="<?php echo $manager_link; ?>">
							<?php echo $row_Managers['manager_title']; ?>
                        </a>
                        </td>
                        <td align="center" class="center">
                        <a href="<?php echo $manager_link; ?>">
							<?php if($row_Managers['acct_status'] == 0){ echo 'NO'; }else{ echo 'YES'; } ?>
                        </a>
                        </td>
                        <td class="center">
                        	 <a href="manager.edit.php?mgrid=<?php echo $row_Managers['manager_id']; ?>">View</a>
                        </td>
                    </tr>

								<?php } while ($row_Managers = mysqli_fetch_assoc($Managers)); ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                        <th align="center">Name</th>
                        <th align="center">Email</th>
                        <th align="center">Mobile Number</th>
                        <th align="center">Manage Inventory</th>
                        <th align="center">Status</th>
                        <th align="center">Options</th>
                    </tr>
                    </tfoot>
                    </table>
<?php endif; ?>
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
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
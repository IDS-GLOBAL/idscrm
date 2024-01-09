<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_Collectors = "SELECT * FROM account_person WHERE dealer_id =  '$did' ORDER BY account_lastname ASC";
$Collectors = mysqli_query($idsconnection_mysqli, $query_Collectors);
$row_Collectors = mysqli_fetch_assoc($Collectors);
$totalRows_Collectors = mysqli_num_rows($Collectors);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Collectors: <?php echo $row_userDets['company']; ?></title>

<?php include("inc.head.php"); ?>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Collectors</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Collectors</a>
                        </li>
                        <li class="active">
                            Viewing Collection Team
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>



			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a class="btn btn-warning btn-lg">Manage Collector</a>                    
                        <a href="collector.add.php" class="btn btn-primary btn-lg">Add New Collector</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Collectors <small>Sort, search</small></h5>
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
<?php if($totalRows_Collectors != 0): ?>
                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th align="center">Name</th>
                        <th align="center">Email</th>
                        <th align="center">Mobile Number</th>
                        <th align="center">Title</th>
                        <th align="center">Status</th>
                        <th align="center">Options</th>
                    </tr>
                    </thead>
                    <tbody>

						
									    <?php do { ?>
    

                          <?php
							$account_person_id = $row_Collectors['account_person_id'];
							$addinvResult = $row_Collectors['acid_addinv_2main_dealerid']; 
							$acctStatus = $row_Collectors['acct_status'];
							$collector_link = "collector.edit.php?collectorid=$account_person_id";
							$profile_image = $row_Collectors['profile_image'];
							
							if(!$profile_image){
							$profile_image = 'img/no-pic-avatar.png';
							}
						  ?>
  


                    <tr class="gradeX">
                          <td>
                          <div class="text-center"> 
                          <a href="<?php echo $collector_link; ?>">
							<?php echo $row_Collectors['account_firstname']; ?> <?php echo $row_Collectors['account_lastname']; ?>
                          
                          
                          
                          <img alt="image" class="m-t-xs img-responsive img-square" src="<?php echo $profile_image; ?>" width="120px">
                          
                          
                          
                          
                          
                          </a>
                          </div>
                          </td>
                        <td>
                          <a href="<?php echo $collector_link; ?>">

							<?php echo $row_Collectors['account_email']; ?>
                           </a>
                        </td>
                        <td>
                          <a href="<?php echo $collector_link; ?>">
							<?php echo $row_Collectors['account_mobilephone_number']; ?>
                            </a>
                        </td>
                        <td align="center" class="center">
                          <a href="<?php echo $collector_link; ?>">
							<?php echo $row_Collectors['account_title']; ?>
                         </a>
                        </td>
                        <td align="center" class="center">
                          <a href="<?php echo $collector_link; ?>">
							<?php 
									if($row_Collectors['acct_status'] == 1){ echo 'YES'; }else{ echo 'NO'; } 
							?>
                            </a>
                        </td>
                        <td class="center">
                          <a href="<?php echo $collector_link; ?>">View</a>
                        </td>
                    </tr>

								<?php } while ($row_Collectors = mysqli_fetch_assoc($Collectors)); ?>
  
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
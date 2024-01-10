<?php require_once('db_admin.php'); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sid2maindid = "SELECT * FROM sales_person, dealers WHERE sales_person.main_dealerid = dealers.id  ORDER BY  sales_person.salesperson_id";
$sid2maindid = mysqli_query($idsconnection_mysqli, $query_sid2maindid);
$row_sid2maindid = mysqli_fetch_array($sid2maindid);
$totalRows_sid2maindid = mysqli_num_rows($sid2maindid);

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
                <h2>Dealer Sales People</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Dealer Sales People</a>
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
                        <h5>Sales People <small>Sort, search</small></h5>
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

<?php if($totalRows_sid2maindid != 0): ?>
						
					<?php do { ?>
                                        
										<?php
                                        	$sid = $row_sid2maindid['salesperson_id'];
											$addinvResult = $row_sid2maindid['sid_addinv_2main_dealerid']; 
											$acctStatus = $row_sid2maindid['acct_status'];
											$saleslink = "dealer.salesperson.php?sid=$sid";
											//$profile_image = $row_sid2maindid['ids_profile_image'];
											$profile_image = 'img/no-pic-avatar.png';
											
											if(!$profile_image){
											$profile_image = 'img/no-pic-avatar.png';
											}
										?>
  


                    <tr id="<?php echo $sid; ?>">
                          <td align="center">
							
                            <a href="<?php echo $saleslink; ?>">
						  	<?php echo $row_sid2maindid['salesperson_firstname']; ?>
							<?php echo $row_sid2maindid['salesperson_lastname']; ?>
                            </a>


						
                            <br />
                            <a href="<?php echo $saleslink; ?>">
							<img alt="image" class="m-t-xs img-responsive img-square" src="<?php echo $profile_image; ?>" width="120px">
                            </a>
                        
                 
                          </td>
                        <td>
							<a href="<?php echo $saleslink; ?>">
							<?php echo $row_sid2maindid['salesperson_email']; ?>
                            </a>
                            <br />
                            @<?php echo $row_sid2maindid['company']; ?>
                        </td>
                        <td>
							<a href="<?php echo $saleslink; ?>">
							<?php echo $row_sid2maindid['salesperson_mobilephone_number']; ?>
                            </a>
                            
                            Mobile Opt in: <?php if($row_sid2maindid['salesperson_mobile_optin'] == '1'){ echo 'YES'; }else{  echo 'NO';   } ?> <?php if($row_sid2maindid['salesperson_mobile_optindate']){ echo ' on '.$row_sid2maindid['salesperson_mobile_optindate']; } ?><br />
                            
                            <?php if($row_sid2maindid['salesperson_mobile_dnc']){ ?>
                            Mobile Carrier: <?php echo $row_sid2maindid['salesperson_mobile_carrier']; ?><br />
                            <?php } ?>
                            
                        </td>
                        <td align="center" class="center">
							<a href="<?php echo $saleslink; ?>">
										  	<?php
												if($addinvResult == 1){
												echo 'Yes';
												}else{
												echo 'No';	
												}
												
											?>
							</a>
                        </td>
                        <td align="center" class="center">
							<a href="<?php echo $saleslink; ?>">
   										  	<?php
												if($acctStatus == 1){
												echo 'Yes';
												}else{
												echo 'No';	
												}
												
											?>
							</a>
                        </td>
                        <td class="center">
                        	 <a href="<?php echo $saleslink; ?>">View</a>
                        </td>
                    </tr>

								        <?php } while ($row_sid2maindid = mysqli_fetch_array($sid2maindid)); ?>
<?php endif; ?>
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
                    </div>
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
		"lengthMenu": [[25, 50, -1], [25, 50, "All"]],
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
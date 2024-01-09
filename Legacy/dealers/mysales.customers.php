<?php require_once("db_sales_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_customers = "SELECT * FROM customers WHERE customer_sales_person_id = $sid OR customer_sales_person2_id = $sid AND customer_dealer_id = $did ORDER BY customer_id ASC";
$find_customers = mysqli_query($idsconnection_mysqli, $query_find_customers);
$row_find_customers = mysqli_fetch_assoc($find_customers);
$totalRows_find_customers = mysqli_num_rows($find_customers);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Customers: <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.sales.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.sales.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Customers</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="mysales.dashboard.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <a>Customers</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">



<?php if($totalRows_find_customers != 0): ?>

            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>System Customers<small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th align="center">No.</th>
                      	<th align="center">Name</th>
                        <th align="center">Email</th>
                        <th align="center">Mobile Phone</th>
                        <th align="center">City/ State</th>
                        <th align="center">Zip</th>
                        <th align="center">Status</th>
                        <th align="center">Date/Time</th>
                        <th align="center">Options</th>
                    </tr>
                    </thead>
                    <tbody>

<?php do { ?>
    
  


                    <tr class="gradeX">
                      <td><?php echo $row_find_customers['customer_no']; ?> <?php echo $row_find_customers['customer_lname']; ?></td>
                      <td><?php echo $row_find_customers['customer_fname']; ?> <?php echo $row_find_customers['customer_lname']; ?></td>
                        <td><?php echo $row_find_customers['customer_email']; ?></td>
                        <td>
						<?php echo 'Main Phone: '.format_phone($row_find_customers['customer_phoneno']).'<br />';  ?>
						
						<?php if($row_find_customers['customer_cellphone']){echo 'Cell Phone: '.format_phone($row_find_customers['customer_cellphone']);}  ?>
						
                        </td>
                        <td align="center" class="center"><?php echo $row_find_customers['customer_home_city']; ?> <?php echo $row_find_customers['customer_home_state']; ?></td>
                        <td align="center" class="center"><?php echo $row_find_customers['customer_home_zip']; ?></td>
                        <td class="center"><?php echo $row_find_customers['customer_status']; ?></td>
                        <td class="center"><?php echo $row_find_customers['customer_created_at']; ?></td>
                        <td class="center"><a href="mysales.customer.view.php?customer_id=<?php echo $row_find_customers['customer_id']; ?>" target="_parent">View</a></td>
                    </tr>

<?php } while ($row_find_customers = mysqli_fetch_assoc($find_customers)); ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                    <tr>
                        <th align="center">No.</th>
                      	<th align="center">Name</th>
                        <th align="center">Email</th>
                        <th align="center">Mobile Phone</th>
                        <th align="center">City/ State</th>
                        <th align="center">Zip</th>
                        <th align="center">Status</th>
                        <th align="center">Date/Time</th>
                        <th align="center">Options</th>
                    </tr>
                    </tr>
                    </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            </div>



<?php endif; ?>

        </div>
        <?php include("footer.php"); ?>

        </div>
        </div>


    </div>


    <!-- Mainly scripts -->
	<?php include("inc.end.mysales.body.php"); ?>

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
<?php require_once("db_manager_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_customers = "SELECT * FROM customers WHERE customer_dealer_id = '$did' ORDER BY customer_id ASC";
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.manager.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Customers</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <a>Viewing Customers</a>
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
                        <h5>System Customers</h5>
                    </div>
                    <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
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
    
<?php

$customerlink = "manager.customer.view.php?customer_id=".$row_find_customers['customer_id'];
$created_at = $row_find_customers['customer_created_at'];



$customer_status = $row_find_customers['customer_status'];

if($customer_status == 1 ){ $customer_status = "HOT"; }


?>


                    <tr class="gradeX">
                      <td><a href="<?php echo $customerlink; ?>" target="_parent"><?php echo $row_find_customers['customer_no']; ?></a></td>

                      <td><a href="<?php echo $customerlink; ?>" target="_parent"><?php echo $row_find_customers['customer_fname']; ?> <?php echo $row_find_customers['customer_lname']; ?></a></td>
                        <td><a href="<?php echo $customerlink; ?>" target="_parent"><?php echo $row_find_customers['customer_email']; ?></a></td>
                        <td>
						<?php echo 'Main Phone: '.format_phone($row_find_customers['customer_phoneno']).'<br />';  ?>
						
						<?php if($row_find_customers['customer_cellphone']){echo 'Cell Phone: '.format_phone($row_find_customers['customer_cellphone']);}  ?>
						
                        </td>
                        <td align="center" class="center"><?php echo $row_find_customers['customer_home_city']; ?> <?php echo $row_find_customers['customer_home_state']; ?></td>
                        <td align="center" class="center"><?php echo $row_find_customers['customer_home_zip']; ?></td>
                        <td class="center"><?php echo $customer_status; ?></td>
                        <td class="center"><?php echo created_at($created_at); ?></td>
                        <td class="center"><a href="<?php echo $customerlink; ?>" target="_parent">View</a></td>
                    </tr>

<?php } while ($row_find_customers = mysqli_fetch_assoc($find_customers)); ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                      	<th align="center">No.</th>
	                    <th align="center">Name</th>
                        <th align="center">Email</th>
                        <th align="center">Phone Numbers</th>
                        <th align="center">City/State</th>
                        <th align="center">Zip</th>
                        <th align="center">Status</th>
                        <th align="center">Date/Time</th>
                        <th align="center">Options</th>
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
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable();

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
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

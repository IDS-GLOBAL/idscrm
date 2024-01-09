<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_customers = "SELECT * FROM `idsids_idsdms`.`customers` WHERE `customers`.`customer_dealer_id` = $did ORDER BY `customer_id` ASC";
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

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Customers</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
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
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Customers To Market Too <small>Sort, search</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                      <th>Name</th>
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
                      <td><a href="customer.view.php?customer_id=<?php echo $row_find_customers['customer_id']; ?>"><?php echo $row_find_customers['customer_fname']; ?> <?php echo $row_find_customers['customer_lname']; ?></a></td>
                        <td><?php echo $row_find_customers['customer_email']; ?></td>
                        <td>
						<?php echo 'Main Phone: '.format_phone($row_find_customers['customer_phoneno']).'<br />';  ?>
						
						<?php if($row_find_customers['customer_cellphone']){echo 'Cell Phone: '.format_phone($row_find_customers['customer_cellphone']);}  ?>
						
                        </td>
                        <td align="center" class="center"><?php echo $row_find_customers['customer_home_city']; ?> <?php echo $row_find_customers['customer_home_state']; ?></td>
                        <td align="center" class="center"><?php echo $row_find_customers['customer_home_zip']; ?></td>
                        <td class="center"><?php echo $row_find_customers['customer_status']; ?></td>
                        <td class="center"><?php echo $row_find_customers['customer_created_at']; ?></td>
                        <td class="center"><a href="customer.view.php?customer_id=<?php echo $row_find_customers['customer_id']; ?>">View</a></td>
                    </tr>

<?php } while ($row_find_customers = mysqli_fetch_array($find_customers)); ?>
  
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Name</th>
                        <th>Email</th>
                        <th>Phone Numbers</th>
                        <th align="center">City/State</th>
                        <th align="center">Zip</th>
                        <th>Status</th>
                        <th>Date/Time</th>
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

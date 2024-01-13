<?php require_once("db_loggedin.php"); ?>
<?php




$colname_find_vehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle =  sprintf("SELECT * FROM `vehicles` WHERE `vid` = %s", GetSQLValueString($colname_find_vehicle, "int"));
$find_vehicle = mysqli_query($idsconnection_mysqli, $query_find_vehicle);
$row_find_vehicle = mysqli_fetch_assoc($find_vehicle);
$totalRows_find_vehicle = mysqli_num_rows($find_vehicle);


$vid = $row_find_vehicle['vid'];
$vlivestatus = $row_find_vehicle['vlivestatus'];
$vstockno = $row_find_vehicle['vstockno'];
$vyear = $row_find_vehicle['vyear'];
$vmake = $row_find_vehicle['vmake'];
$vmodel = $row_find_vehicle['vmodel'];
$vtrim = $row_find_vehicle['vtrim'];
$vvin = $row_find_vehicle['vvin'];
$vcondition = $row_find_vehicle['vcondition'];

$vmileage = $row_find_vehicle['vmileage'];
$vrprice = $row_find_vehicle['vrprice'];
$vdprice = $row_find_vehicle['vdprice'];
$vthubmnail_file_path = $row_find_vehicle['vthubmnail_file_path'];


$colname_find_vehicle_photos = "-1";
if (isset($_GET['vid'])) {
  $colname_find_vehicle_photos = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_vehicle_photos =  sprintf("SELECT * FROM `vehicle_photos` WHERE `vehicle_photos`.`dealer_id` = '$did' AND `vehicle_id` = %s ORDER BY `sort_orderno` ASC, created_at DESC", GetSQLValueString($colname_find_vehicle_photos, "int"));
$find_vehicle_photos = mysqli_query($idsconnection_mysqli, $query_find_vehicle_photos);
$row_find_vehicle_photos = mysqli_fetch_assoc($find_vehicle_photos);
$totalRows_find_vehicle_photos = mysqli_num_rows($find_vehicle_photos);







?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Transfer Vehicle</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
                    <?php include("_nav_top.php"); ?>
                    
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Vehicle Transfer</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Transfering Vehicle</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-warning">We Found This Vehicle In Our System Belonging To another Dealer</a>
                    </div>
                </div>
            </div>


<input id="vid" type="hidden" value="<?php echo $row_find_vehicle['vid']; ?>">


            
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    <div class="middle-box text-center animated fadeInRightBig">
                        <h3 class="font-bold"><?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?></h3>

                        <div class="error-desc">
                            Condition: <?php echo $row_find_vehicle['vcondition']; ?><br>

<?php if($row_find_vehicle['vthubmnail_file_path']) { ?>
	<img class=" img-container img-md pull-left" src="<?php echo $row_find_vehicle['vthubmnail_file_path']; ?>" width="240px">

<?php } ?>

                            <br/><a id="trasfer_thisvehicletomyinventory" rel="<?php echo $row_find_vehicle['vid']; ?>" class="btn btn-primary m-t" role="button">Transfer This Vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<div id="transfer_console">

</div>







        
        <?php include("_footer.php"); ?>

        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/idscrm.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/custom/page/custom.transfer_vehicle.js"></script>


</body>

</html>

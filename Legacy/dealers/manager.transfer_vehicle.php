<?php require_once("db_manager_loggedin.php"); ?>
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

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">

                <?php include("_nav_top.manager.php"); ?>

                    
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Vehicle Transfer</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    <div class="middle-box text-center animated fadeInRightBig">
                        <h3 class="font-bold">This is page content</h3>

                        <div class="error-desc">
                            You can create here any grid layout you want. And any variation layout you imagine:) Check out main dashboard and other site. It use many different layout.
                            <br/><a href="manager.php" class="btn btn-primary m-t">Dashboard</a>
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
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/idscrm.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>


</body>

</html>

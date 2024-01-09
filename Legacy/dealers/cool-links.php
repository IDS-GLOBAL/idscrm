<?php include("db_loggedin.php"); ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Cool Links</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

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
                    <h2>Cool Links</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Cool Links</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-primary btn-sm">Add question</a>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInUp">

                        <div class="ibox-content m-b-sm border-bottom">
                            <div class="text-center p-lg">
                                <h2>If you don't find the answer to your question</h2>
                                <span>add your question by selecting </span>
                                <button title="Create new cluster" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> <span class="bold">Add question</span></button> button
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="row">
                                <div class="col-md-7">
                                    <a data-toggle="collapse" href="#faq1" class="faq-question">What About Decoding a 11 Digit Vin ?</a>
                                    <small>Added by <strong>Benjamin Carter</strong> <i class="fa fa-clock-o"></i> 2014-12-09 06:09 pm </small>
                                </div>
                                <div class="col-md-3">
                                    <span class="small font-bold">Benjamin Carter</span>
                                    <div class="tag-list">
                                        <span class="tag-item">General</span>
                                        <span class="tag-item">Links</span>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right">
                                    <span class="small font-bold">Viewed </span><br/>
                                    42 times.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="faq1" class="panel-collapse collapse faq-answer">
                                        <p>
                                            A Good Clean Way To Check 11 Digit Vin.<a href="http://vinwiz.com/" target="_blank">Vin Wiz - http://vinwiz.com/</a>
                                            
                                        </p>
                                    </div>
                                </div>
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
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <script>
        $(document).ready(function(){

            $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true)

                // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

                simpleLoad(btn, false)
            });
        });

        function simpleLoad(btn, state) {
            if (state) {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Loading");
            } else {
                setTimeout(function () {
                    btn.children().removeClass('fa-spin');
                    btn.contents().last().replaceWith(" Refresh");
                }, 2000);
            }
        }
    </script>
</body>

</html>

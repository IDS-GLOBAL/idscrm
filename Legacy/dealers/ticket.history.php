<?php require_once("db_loggedin.php"); ?>
<?php

//forum_main.html is a good record row design also.

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_submited_tickets = "SELECT * FROM `ticket_submit_dlr` WHERE `ticket_submit_dlr`.`did` = '$did' ORDER BY `ticket_submit_dlr`.`created_at` DESC";
$dlr_submited_tickets = mysqli_query($idsconnection_mysqli, $query_dlr_submited_tickets);
$row_dlr_submited_tickets = mysqli_fetch_assoc($dlr_submited_tickets);
$totalRows_dlr_submited_tickets = mysqli_num_rows($dlr_submited_tickets);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Support Tickets</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">


        <?php include("_nav_top.php"); ?>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Support Tickets</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Tickets</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="ticket.create.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New Ticket</a>
                    </div>
                </div>
            </div>












            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInUp">

                        <div class="ibox-content m-b-sm border-bottom">
                            <div class="text-center p-lg">
                                <h2>If you don't see your ticket</h2>
                                <span>Feel Free To create a New One by selecting </span>
                                <button title="Create new cluster" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> <span class="bold">New Ticket</span></button> button
                            </div>
                        </div>





									<?php //echo $row_dlr_submited_tickets['created_at']; ?>
									<?php //echo $row_dlr_submited_tickets['ticket_token']; ?>
                                    <?php //echo $row_dlr_submited_tickets['id']; ?>
                                    <?php //echo $row_dlr_submited_tickets['contact_name']; ?>
                                    <?php //echo $row_dlr_submited_tickets['what_happened']; ?>
                                    <?php //echo $row_dlr_submited_tickets['comments_bydlr']; ?>
                                    <?php //echo $row_dlr_submited_tickets['dudesName']; ?>
                                    <?php //echo $row_dlr_submited_tickets['dudesResponse']; ?>
                                    <?php //echo $row_dlr_submited_tickets['status_dudes']; ?>
                                    <?php //echo $row_dlr_submited_tickets['contact_phone']; ?>
                                    <?php //echo $row_dlr_submited_tickets['contact_email']; ?>









<?php //if ($totalRows_dlr_submited_tickets > 0) { // Show if recordset not empty ?>


						  <?php do { ?>


                        <div class="faq-item">
                            <div class="row">
                                <div class="col-md-7">
                                    <a data-toggle="collapse" href="#faq<?php echo $row_dlr_submited_tickets['id']; ?>" class="faq-question"><?php echo $row_dlr_submited_tickets['what_happened']; ?></a>
                                    <small>Created by <strong><?php echo $row_dlr_submited_tickets['contact_name']; ?></strong> <i class="fa fa-clock-o"></i> <?php echo $row_dlr_submited_tickets['created_at']; ?></small>
                                </div>
                                <div class="col-md-3">
                                    <span class="small font-bold"><?php echo $row_dlr_submited_tickets['contact_name']; ?></span>
                                    <div class="tag-list">
                                        <span class="tag-item"><?php echo $row_dlr_submited_tickets['dudesName']; ?></span>

                                    </div>
                        
                                    <div class="hr-line-dashed"></div>
                                    <a class="btn btn-primary" href="ticket.view.php?ticket_token=<?php echo $row_dlr_submited_tickets['ticket_token']; ?>">View Ticket</a>

                                    
                                    
                                </div>
                                <div class="col-md-2 text-right">
                                    <span class="small font-bold">Priority: </span><br/>
                                    <?php echo $row_dlr_submited_tickets['priority']; ?>
                                    <br /><br />
                                    <span class="small font-bold">Completition Status:</span><br />
                                    <?php echo $row_dlr_submited_tickets['status_dudes']; ?>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="faq<?php echo $row_dlr_submited_tickets['id']; ?>" class="panel-collapse collapse faq-answer">
                                        <p>
                                        Dudes Response:
                                            <?php echo $row_dlr_submited_tickets['dudesResponse']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>





						  <?php } while ($row_dlr_submited_tickets = mysqli_fetch_assoc($dlr_submited_tickets)); ?>

<?php // } // Show if recordset not empty ?>












<br /><br /><br />
<div class="clearfix"></div>


















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

    <!-- Custom and plugin javascript -->
    <script src="js/idscrm.js"></script>
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
<?php include("inc.end.phpmsyql.php"); ?>
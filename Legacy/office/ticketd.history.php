<?php require_once('db_admin.php'); ?>
<?php


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM  `idsids_idsdms`.`ticket_submit_dlr`
LEFT JOIN   `idsids_idsdms`.`dealers` ON `ticket_submit_dlr`.`ticket_did` = `dealers`.`id` 
 WHERE `ticket_submit_dlr`.`ticket_did` = `dealers`.`id` ORDER BY `ticket_submit_dlr`.`ticket_did` DESC";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

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
                <h2>Dealer Ticket History</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Dealer Ticket History</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Viewing History <small>click view ticket</small></h5>
                    </div>
                    <div class="ibox-content">

   

                                    <?php do { ?>
                                    <div class="feed-element">
                                        <div>
                                          <small class="pull-right"><?php echo $row_DlrTickets['id']; ?></small><br />
                                            <small class="pull-right">
                                                <a href="ticketd.view.php?sysdealerid=<?php echo $row_DlrTickets['ticket_did']; ?>&amp;ticketid=<?php echo $row_DlrTickets['ticket_id']; ?>" class="btn btn-sm btn-primary">View Ticket (<?php echo $row_DlrTickets['ticket_id']; ?>)</a>
                                            </small>
                                          <strong><?php echo $row_DlrTickets['contact_name']; ?> @:<?php echo $row_DlrTickets['ticket_did']; ?> <?php echo $row_DlrTickets['priority']; ?> <?php echo $row_DlrTickets['status_dudes']; ?></strong>
                                          <div><?php echo $row_DlrTickets['what_happened']; ?></div>
                                          <small class="text-muted"><?php echo $row_DlrTickets['created_at']; ?></small>
                                          </div>
                                      </div>
                                      <?php } while ($row_DlrTickets = mysqli_fetch_array($DlrTickets)); ?>
                 

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>To View <small>click view ticket</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

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
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>

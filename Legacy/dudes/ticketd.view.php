<?php require_once('db_admin.php'); ?>
<?php
$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.`dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";



$colname_findsys_dealer = "-1";
$colname_findsys_ticketid  = "-1";
if (isset($_GET['sysdealerid'])) {
  $colname_findsys_dealer = $_GET['sysdealerid'];
}
if (isset($_GET['ticketid'])) {
  $colname_findsys_ticketid = $_GET['ticketid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_findsys_dealer =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_findsys_dealer'";
$findsys_dealer = mysqli_query($idsconnection_mysqli, $query_findsys_dealer);
$row_findsys_dealer = mysqli_fetch_array($findsys_dealer);
$totalRows_findsys_dealer = mysqli_num_rows($findsys_dealer);
$system_dealerid = $row_findsys_dealer['id']; //hack
$dealer_state = $row_findsys_dealer['state'];
//if(!$system_dealerid){ header("Location: ticketd.history.php"); }






mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr`
LEFT JOIN `idsids_idsdms`.`dealers` ON  `ticket_submit_dlr`.`ticket_did` = `dealers`.`id` WHERE `ticket_submit_dlr`.`ticket_did` = '$system_dealerid' ORDER BY `ticket_submit_dlr`.`ticket_id` DESC";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);




$colname_DlrTicketId = "-1";
if (isset($_GET['ticketid'])) {
  $colname_DlrTicketId = $_GET['ticketid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTicketId =  "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr` LEFT JOIN `idsids_idsdms`.`dealers` ON
`ticket_submit_dlr`.`ticket_did` = `dealers`.`id`  WHERE `ticket_submit_dlr`.`ticket_id` = '$colname_DlrTicketId'";
$DlrTicketId = mysqli_query($idsconnection_mysqli, $query_DlrTicketId);
$row_DlrTicketId = mysqli_fetch_array($DlrTicketId);
$totalRows_DlrTicketId = mysqli_num_rows($DlrTicketId);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_tckthstry = "SELECT * FROM `idsids_idsdms`.`ticket_submit_dlr` LEFT JOIN `idsids_idsdms`.`dealers` ON
`ticket_submit_dlr`.`ticket_did` = `dealers`.`id` 
LEFT JOIN `idsids_idsdms`.`dudes` ON
`ticket_submit_dlr`.`dudesId` = `dudes`.`dudes_id`

 WHERE `ticket_submit_dlr`.`ticket_did` = '$system_dealerid' GROUP BY `ticket_submit_dlr`.`ticket_id` ORDER BY `ticket_submit_dlr`.`ticket_id` ASC";
$dealer_tckthstry = mysqli_query($idsconnection_mysqli, $query_dealer_tckthstry);
$row_dealer_tckthstry = mysqli_fetch_array($dealer_tckthstry);
$totalRows_dealer_tckthstry = mysqli_num_rows($dealer_tckthstry);

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
                        <a href="#">Viewing Ticket</a>
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
                        <h5>Dealer Preview <small>Ticket Submited By Dealer</small></h5>
                    </div>
                    <div class="ibox-content">


                        <!-- gadget left 1 -->
                        <div class="gadget">
                          <div class="gadget_title gradient37 vertsortable_head">
                            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
                            <h3>Dealer Ticket Preview/Respond</h3>
                          </div>
                          <div class="gadget_content">
                            <div class="subblock">
                              <h2>Company: <?php echo $row_DlrTicketId['company']; ?></h2>
                              <br />
                              <strong>Record ID:</strong> <?php echo $row_DlrTicketId['ticket_id']; ?> | <strong>Contact Name:</strong> <?php echo $row_DlrTicketId['contact_name']; ?>
                              <p>
                              <strong>What Happened?</strong> <u><?php echo $row_DlrTicketId['what_happened']; ?></u>
                              </p>

                              <p>
                              What You Want To Happen? <?php echo $row_DlrTicketId['what_you_want_to_happen']; ?>
                              </p>
                              
                              <p>
                              Comments By Dealer: <?php echo $row_DlrTicketId['comments_bydlr']; ?>
                              </p>

                              
                      
                              <p><a href="#">Learn more &raquo;</a></p>
                            </div>
                          </div>
                        </div>
                                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    <h3>Dealer Ticket Response</h3>
                    </div>
                    <div class="ibox-content">
        
                      <!-- gadget left 2 -->
                      <div class="gadget">
                        <div class="gadget_title gradient37 vertsortable_head">
                          <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
                          
                        </div>
                        <div class="gadget_content">
                          
                          <div class="subblock">
                            <form action="<?php echo $editFormAction; ?>" method="post" enctype="application/x-www-form-urlencoded" id="form-ticketpreview">
                            <input type="hidden" name="id" value="<?php echo $row_DlrTicketId['ticket_id']; ?>" />
                            <input type="hidden" name="dudesId" value="<?php echo $dudesid; ?>" />
                            
                              <div class="form-group  row">
                              
                                <label class="col-lg-2 col-form-label" for="dudesName"><strong>Your Name</strong> (Dealer Will See Your Name)</label>
                                <div class="col-lg-10">
                                    <input name="dudesName" class="form-control" id="dudesName" value="<?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?>" />
                                </div>
                                
                              </div>
                              <div class="form-group  row">
                                <label class="col-lg-2 col-form-label" for="dudesResponse"><strong>Dudes Response</strong> (Large input form example)</label>
                                <div class="col-lg-10">
                                <textarea class="form-control" name="dudesResponse" cols="50" rows="10"  id="dudesResponse"><?php echo $row_DlrTicketId['dudesResponse']; ?></textarea>
                                </div>
                              </div>
                              <div class="form-group  row">
                                <div class="col-lg-2 col-form-label">
                                   <label for="status_dudes"><strong>Ticket Status</strong></label>
                                </div>
                               
                                <div class="col-lg-10">
                                <select id="status_dudes" class="form-control" name="status_dudes">
                                  <option value="Pending">Pending</option>
                                  <option value="Resolved">Resolved</option>
                                  <option value="Need More Information">Need More Information</option>
                                </select>
                                </div>
                              </div>
                              
                              <div class="form-group  row">
                                <label class="col-sm-2 col-form-label" for="check"><strong>Approval Checkbox</strong><br /></label>
                                <div class="col-sm-10">
                                  <div class="i-checks">
                                    <input name="check" type="checkbox" class="checkbox" />Check To Update Your ID: <strong><?php echo $dudesid; ?></strong></input>
                                  </div>
                                  
                                </div>
                                
                              </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <button class="btn btn-block btn-primary" name="submit" type="submit">Submit</button>
                              </div>
                            </div>
                            
                            <input name="dudes_last_modfied" type="hidden" id="dudes_last_modfied"  />
                            <input type="hidden" name="MM_update" value="form-ticketpreview" />
                
                            <p><a href="#">Learn more &raquo;</a></p>
                            </form>
                          </div>
                        
                        </div>
                      </div>
                                  

                    </div>
                </div>
              </div>
            </div>
            



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealer Ticket History </h5>
                    </div>
                    <div class="ibox-content">


                        <!-- gadget right 5 -->
                        <div class="row">
                         
                          <div class="col-sm-12">
                            <div class="table-responsive">
                              <form action="" method="post" id="form_userstable">
                              <table width="100%"  cellspacing="0" cellpadding="0" class="table table-striped">
                              <tr>
                                <th><input name="utc1" id="utc1" type="checkbox" /></th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Issue Statement</th>
                                <th>Priority</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>

                                <?php do { ?>
                    
                    
                    

                                <tr>
                                  <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                                  <td><?php echo $row_dealer_tckthstry['assigned_salesrep']; ?></td>
                                  <td><strong><?php echo $row_dealer_tckthstry['status_dudes']; ?></strong></td>
                                  <td><?php echo $row_dealer_tckthstry['what_happened']; ?></td>
                                  <td><strong><?php echo $row_dealer_tckthstry['priority']; ?></strong></td>
                                 
                                  <td><a href="tickets-bydealers-preview.php?ticketid=<?php echo $row_dealer_tckthstry['ticket_id']; ?>"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                                  <td><a href="tickets-bydealers-preview.php?ticketid=<?php echo $row_dealer_tckthstry['ticket_id']; ?>"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                                </tr>
                                <?php } while ($row_dealer_tckthstry = mysqli_fetch_array($dealer_tckthstry)); ?>
                              </table>
                              </form>
                            </div>
                          </div>
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
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php
mysqli_free_result($dealer_tckthstry);
?>
<?php include("inc.end.phpmsyql.php"); ?>

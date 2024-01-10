<?php require_once('db_admin.php'); ?>
<?php

$colname_prspct_dealers = "-1";
if (isset($_GET['state'])) {
  $colname_prspct_dealers = $_GET['state'];
}
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_prspct_dealers =  "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `dealer_prospects`.`state` = '$colname_prspct_dealers' ORDER BY `id` DESC";
$prspct_dealers = mysqli_query($tracking_mysqli, $query_prspct_dealers);
$row_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$totalRows_prspct_dealers = mysqli_fetch_array($prspct_dealers);
$state_prospect = $colname_prspct_dealers;


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM `idsids_idsdms`.`dealers_pending` ORDER BY id ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_invoice_dealer = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring`, `idsids_idsdms`.`dealers` WHERE `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`  AND `ids_toinvoices_recurring`.`invoice_date` = '$server_time' ORDER BY `ids_toinvoices_recurring`.`invoice_id` ASC";
$invoice_dealer = mysqli_query($idsconnection_mysqli, $query_invoice_dealer);
$row_invoice_dealer = mysqli_fetch_array($invoice_dealer);
$totalRows_invoice_dealer = mysqli_num_rows($invoice_dealer);

mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_wfh_approvaldeals = "SELECT * FROM wfhuser_approvals_perms, wfhuser_approvals WHERE idsids_wefinancehere.wfhuser_approvals_perms.wfhuserperm_approval_id AND wfhuser_approvals.wfhuser_approval_id ORDER BY wfhuser_approvals_perms.wfhuserperm_created_at DESC Limit 100";
$wfh_approvaldeals = mysqli_query($wfh_connection_mysqli, $query_wfh_approvaldeals);
$row_wfh_approvaldeals = mysqli_fetch_array($wfh_approvaldeals);
$totalRows_wfh_approvaldeals = mysqli_num_rows($wfh_approvaldeals);


mysqli_select_db($wfh_connection_mysqli, $database_wfh_connection);
$query_wfhlatest_fbusrs = "SELECT * FROM idsids_wefinancehere.wfhuserprofile ORDER BY wfhuserprofile.applicant_digital_signature_date DESC";
$wfhlatest_fbusrs = mysqli_query($wfh_connection_mysqli, $query_wfhlatest_fbusrs);
$row_wfhlatest_fbusrs = mysqli_fetch_array($wfhlatest_fbusrs);
$totalRows_wfhlatest_fbusrs = mysqli_num_rows($wfhlatest_fbusrs);

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

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Power</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Power House</a>
                    </li>
                    <li class="myaccountbtn">
                    	<a role="button"><?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?></a>
                        <input id="dudesid" type="hidden" value="<?php echo $dudesid; ?>">
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
                        <h5>Latest Support Tickets <small>All Support Tickets</small></h5>
                    </div>
                    <div class="ibox-content">

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="gwlines">
              <tr>
                <th><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>ID</th>
                <th>Created Time</th>
                <th>Dealer Name</th>
                <th>Status</th>
                <th>Location</th>
                <th>E-mail</th>
                <th colspan="2">Actions</th>
              </tr>
             	 <?php do { ?>


              		
                    <tr>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                <td><?php echo $row_DlrTickets['id']; ?></td>
                <td><?php echo $row_DlrTickets['created_at']; ?></td>
                <td><?php echo $row_DlrTickets['contact_name']; ?></td>
                <td><?php echo $row_DlrTickets['status_dudes']; ?></td>
                <td><?php echo $row_DlrTickets['contact_phone']; ?></td>
                <td><a href="#"><?php echo $row_DlrTickets['contact_email']; ?></a></td>
                <td><a href="tickets-bydealers-preview.php?ticketid=<?php echo $row_DlrTickets['id']; ?>"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
				
			<?php } while ($row_dlrtickets = mysqli_fetch_array($dlrtickets)); ?>
              <tr class="last">
                <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                <td>End</td>
                <td>End</td>
                <td>End</td>
                <td>End</td>
                <td>End</td>
                <td><a href="#">End</a></td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              </table>
                    </div>
                </div>
              </div>
            </div>






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Latest Demo Request <small>Regsitered Home Page</small></h5>
                    </div>
                    <div class="ibox-content">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" id="dataTable">
	<thead>
		<tr>
			<th>Dealer ID</th>
			<th>Status</th>
			<th>Company Name</th>
			<th>City</th>
			<th>GA</th>
			<th>Zip</th>
			<th>Website</th>
			<th>Email & Login</th>
			<th>B Phone No.</th>
			<th>Options</th>

		</tr>
	</thead>
	<tbody>
    
	<!--Loop start, you could use a repeat region here-->
		<?php do { ?>
		  <tr>
		    <td><a href="?state=<?php echo $state_prospect; ?>&dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_prspct_dealers['id']; ?></a></td>
    <td><a href="?state=<?php echo $state_prospect; ?>&dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger">
				<?php 
					$status = $row_prspct_dealers['status'];
					if(!$status){ echo ''; }
					if($status == 0){ echo 'OFF'; }
					if($status == 1){ echo 'ON'; }
				?>
				</a>
            </td>
		    <td><a href="dealer-prospect-update.php?dealer=<?php echo $row_prspct_dealers['id']; ?>?dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_prspct_dealers['company']; ?></a></td>
		    <td><a href="?state=<?php echo $state_prospect; ?>&dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_prspct_dealers['city']; ?></a></td>
		    <td><a href="?state=<?php echo $state_prospect; ?>&dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_prspct_dealers['state']; ?></a></td>
		    <td><a href="dealer-prospect-update.php?dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_prspct_dealers['zip']; ?></a></td>
		    <td>
            	<a href="dealer-prospect-update.php?dealer=<?php echo $row_prspct_dealers['id']; ?>" target="_blank">
					<?php echo $row_prspct_dealers['website']; ?>
            	</a>
            </td>
		    
		    <td><a href="?state=<?php echo $state_prospect; ?>&dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_prspct_dealers['email']; ?></a></td>
		    <td><a href="?state=<?php echo $state_prospect; ?>&dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_prspct_dealers['phone']; ?></a></td>
<td>
<a href="dealer-prospect-update.php?dealer=<?php echo $row_prspct_dealers['id']; ?>" class="ajaxtrigger"target="_blank">
            		<img src="images/tab_icon3.png" alt="picture" width="24" height="20" class="tabpimpa" />
            	</a>
            </td>
	      </tr>
		<?php } while ($row_prspct_dealers = mysqli_fetch_array($prspct_dealers)); ?>
<!--Loop end-->


	</tbody>
</table>                    

                    </div>
                </div>
              </div>
            </div>

        
            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Latest Conversions <small>UnResolved</small></h5>
                    </div>
                    <div class="ibox-content">

                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines arborder">
                  <tr>
                    <th><input name="utc1" id="utc1" type="checkbox" /></th>
                    <th>Name</th>
                    <th>Point Of Contact</th>
                    <th>Contact Phone</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>E-mail</th>
                    <th colspan="2">Actions</th>
                  </tr>
                  
<?php if ($totalRows_dealers_pend > 0) { // Show if recordset not empty ?>


				<?php do { ?>
                  <tr>
                    <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                    <td><?php echo $row_dealers_pend['company']; ?></td>
                    <td><?php echo $row_dealers_pend['contact']; ?></td>
                    <td><?php echo $row_dealers_pend['contact_phone']; ?> <?php echo $row_dealers_pend['contact_phone_type']; ?></td>
                    <td><?php echo $row_dealers_pend['created_at']; ?></td>
                    <td><?php echo $row_dealers_pend['city']; ?>, <?php echo $row_dealers_pend['state']; ?></td>
                    <td><a href="mailto:<?php echo $row_dealers_pend['email']; ?>"><?php echo $row_dealers_pend['email']; ?></a></td>
                    <td><a href="dealer-add-pending.php?id=<?php echo $row_dealers_pend['id']; ?>">
                    	<img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" />
                    	</a>
                    </td>
                    <td><a href="?delete_id=<?php echo $row_dealers_pend['id']; ?>"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  </tr>
                <?php } while ($row_dealers_pend = mysqli_fetch_array($dealers_pend)); ?>

<?php } // Show if recordset not empty ?>
                      


                      
<?php if ($totalRows_dealers_pend == 0) { // Show if recordset empty ?>
                <tr class="last">
                  <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td><a href="#">N/A</a></td>
                  <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                </tr>
<?php } // Show if recordset empty ?>
                
                </table>

                    </div>
                </div>
              </div>
            </div>
            

            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Latest Unpaid Invoices <small>Pending</small></h5>
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
                        <h5>Latest Lead Purchase By Dealer <small>from wefinancehere</small></h5>
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
                        <h5>Latest Approvals With Deals <small>Deals with appointments</small></h5>
                    </div>
                    <div class="ibox-content">

<table id="mydataTable2" class="table table-striped table-bordered table-hover dataTable" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Approval</th>
            <th>Device</th>
            <th>Action</th>
        </tr>
    </thead>
 
    <tbody>
                    <?php do { ?>
                    	<tr>


    <td>
Approval id:	<?php echo $row_wfh_approvaldeals['wfhuserperm_approval_id']; ?><br>
Fbid: <?php echo $row_wfh_approvaldeals['wfhuserperm_fbid']; ?><br />
Did:    <?php echo $row_wfh_approvaldeals['wfhuserperm_did']; ?>
    </td>
 	<td>
	<?php if($row_wfh_approvaldeals['wfhuser_approval_email']){ echo 'Email: '.$row_wfh_approvaldeals['wfhuser_approval_email']; }else{ echo 'No Email: '.'<br /'; } ?>
	
	
	Phone: <?php if($row_wfh_approvaldeals['wfhuserperm_approval_phone']){ echo 'Phone: '.$row_wfh_approvaldeals['wfhuserperm_approval_phone']; }else{ echo 'No Phone:'; } ?><br />

    IP: <?php echo $row_wfh_approvaldeals['wfhuser_approval_ip']; ?><br />
    Browser: <?php echo $row_wfh_approvaldeals['wfhuserperm_browser']; ?><br />

 <?php echo $row_wfh_approvaldeals['wfhuserperm_appointment_startunixtime']; ?>
 	</td>
    <td>

Downpayment: <?php echo $row_wfh_approvaldeals['wfhuser_approval_dwpymt']; ?><br />
Max Pymt<?php echo $row_wfh_approvaldeals['wfhuser_approval_mxpymt']; ?><br />
Term <?php echo $row_wfh_approvaldeals['wfhuser_approval_monthterm']; ?><br />
Oncome <?php echo $row_wfh_approvaldeals['wfhuser_approval_month_income']; ?><br />

Budget Affordalbe: <?php echo $row_wfh_approvaldeals['wfhuser_approval_budget_affordable']; ?><br />
Apr: <?php echo $row_wfh_approvaldeals['wfhuser_approval_apr']; ?><br />
Apr Text<?php echo $row_wfh_approvaldeals['cust_creditapr_txt']; ?><br />
 	</td>
    <td>


State: <?php echo $row_wfh_approvaldeals['wfhuser_approval_state']; ?><br />
Market <?php echo $row_wfh_approvaldeals['wfhuser_approval_market']; ?><br />
Open loan: <?php echo $row_wfh_approvaldeals['wfhuser_approval_openloan']; ?><br />
 	</td>
    <td>

Our Fee: <?php echo $row_wfh_approvaldeals['wfhdelrperm_cost']; ?><br />
Dlr Rating: <?php echo $row_wfh_approvaldeals['wfhdelrperm_dlrratewfhuser']; ?><br />
Our Rating: <?php echo $row_wfh_approvaldeals['wfhuserperm_ourrank']; ?><br />
 	</td>
    <td>

<?php echo $row_wfh_approvaldeals['wfhuserperm_approval_risk_factor_lvl']; ?><br />
Vid: <?php echo $row_wfh_approvaldeals['wfhuserperm_vehicle_id']; ?><br />
</td>

</tr>
<?php } while ($row_wfh_approvaldeals = mysqli_fetch_array($wfh_approvaldeals)); ?>

    <tfoot>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Approval</th>
            <th>Device</th>
            <th>Action</th>
        </tr>
    </tfoot>

    </tbody>
</table>

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Latest Facebook Users <small>Latest</small></h5>
                    </div>
                    <div class="ibox-content">

<?php do { ?>
  <p><?php echo $row_wfhlatest_fbusrs['wfhuser_id']; ?></p>
  <?php } while ($row_wfhlatest_fbusrs = mysqli_fetch_array($wfhlatest_fbusrs)); ?>



                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sales People <small>Sales People Active</small></h5>
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
                        <h5>Misc <small>Sort, search</small></h5>
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
                        <h5>Latest Invoices Created <small>Invoices Created</small></h5>
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
	$('#mydataTable2').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
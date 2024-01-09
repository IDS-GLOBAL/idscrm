<?php require_once('db_admin.php'); ?>
<?php
$colname_findsys_dealer = "-1";
if (isset($_GET['sysdealertoken'])) {
  $colname_findsys_dealer = mysqli_real_escape_string($idsconnection_mysqli, trim($_GET['sysdealertoken']));
}
$query_findsys_dealer =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`token` = '$colname_findsys_dealer'";
$findsys_dealer = mysqli_query($idsconnection_mysqli, $query_findsys_dealer);
$row_findsys_dealer = mysqli_fetch_array($findsys_dealer);
$totalRows_findsys_dealer = mysqli_num_rows($findsys_dealer);
$system_dealerid = $row_findsys_dealer['id']; //hack
$dealer_state = $row_findsys_dealer['state'];
if(!$system_dealerid){ header("Location: my.dealers.php"); }

$prospctdlrid  = $row_findsys_dealer['prospct_dlrid']; //hack

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_activsystem_templates = "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE `email_systm_templates_status` = '1' ORDER BY `email_systm_templates_subject` ASC";
$find_activsystem_templates = mysqli_query($idsconnection_mysqli, $query_find_activsystem_templates);
$row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
$totalRows_find_activsystem_templates = mysqli_num_rows($find_activsystem_templates);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_dlrtypes = "SELECT * FROM `idsids_idsdms`.`dealer_types` ORDER BY `dtype_id` ASC";
$qry_dlrtypes = mysqli_query($idsconnection_mysqli, $query_qry_dlrtypes);
$row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes);
$totalRows_qry_dlrtypes = mysqli_num_rows($qry_dlrtypes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states`";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_array($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_timezones = "SELECT * FROM `idsids_idsdms`.`calendar|timezones` ORDER BY TimeZone ASC";
$dlr_timezones = mysqli_query($idsconnection_mysqli, $query_dlr_timezones);
$row_dlr_timezones = mysqli_fetch_array($dlr_timezones);
$totalRows_dlr_timezones = mysqli_num_rows($dlr_timezones);


$query_carYears = "SELECT * FROM `idsids_idsdms`.`auto_years` ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_array($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

$query_vmakes = "SELECT * FROM `idsids_idsdms`.`car_make` ORDER BY `car_make` ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_array($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_array($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

$query_distinct_transm = "SELECT DISTINCT `vehicles`.`vtransm` FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`vtransm` not IN ('NULL')";
$distinct_transm = mysqli_query($idsconnection_mysqli, $query_distinct_transm);
$row_distinct_transm = mysqli_fetch_array($distinct_transm);
$totalRows_distinct_transm = mysqli_num_rows($distinct_transm);

$query_query_bodystyles = "SELECT * FROM `idsids_idsdms`.`body_styles` ORDER BY `body_style_name` ASC";
$query_bodystyles = mysqli_query($idsconnection_mysqli, $query_query_bodystyles);
$row_query_bodystyles = mysqli_fetch_array($query_bodystyles);
$totalRows_query_bodystyles = mysqli_num_rows($query_bodystyles);

$query_sysdealer_vehicles = "SELECT * FROM `idsids_idsdms`.`vehicles` WHERE `vehicles`.`did` = '$system_dealerid' ORDER BY `vmake` ASC";
$sysdealer_vehicles = mysqli_query($idsconnection_mysqli, $query_sysdealer_vehicles );
$row_sysdealer_vehicles = mysqli_fetch_array($sysdealer_vehicles);
$totalRows_sysdealer_vehicles = mysqli_num_rows($sysdealer_vehicles);



$query_qrydlr_notes = "SELECT * FROM `idsids_idsdms`.`dudes_dlr_notes` WHERE `dudes_dlr_notes_did` = '$system_dealerid' ORDER BY `dudes_dlr_notes_created_at` DESC";
$qrydlr_notes = mysqli_query($idsconnection_mysqli, $query_qrydlr_notes);
$row_qrydlr_notes = mysqli_fetch_array($qrydlr_notes);
$totalRows_qrydlr_notes = mysqli_num_rows($qrydlr_notes);

$query_qrydlr_prospc_notes = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_dlr_prospc_notes` WHERE `dudes_dlr_notes_did` = '$prospctdlrid' ORDER BY `dudes_dlr_notes_created_at` DESC";
$qrydlr_prospc_notes = mysqli_query($tracking_mysqli, $query_qrydlr_prospc_notes);
$row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes);
$totalRows_qrydlr_prospc_notes = mysqli_num_rows($qrydlr_prospc_notes);




$query_markets = "SELECT * FROM `idsids_idsdms`.`states`, `idsids_idsdms`.`markets_dm` WHERE `states`.`state_abrv` = '$dealer_state' AND `markets_dm`.`state_id` = `states`.`state_id`";
$markets = mysqli_query($idsconnection_mysqli, $query_markets);
$row_markets = mysqli_fetch_array($markets);
$totalRows_markets = mysqli_num_rows($markets);


$query_pull_submarkets = "SELECT * FROM `idsids_wefinancehere`.`markets_dm`, `idsids_wefinancehere`.`markets_sub_dm`, `idsids_wefinancehere`.`states` WHERE markets_dm.market_id = markets_sub_dm.market_id  AND states.state_id = markets_dm.state_id and states.state_abrv = '$dealer_state'";
$pull_submarkets = mysqli_query($wfh_connection_mysqli, $query_pull_submarkets);
$row_pull_submarkets = mysqli_fetch_array($pull_submarkets);
$totalRows_pull_submarkets = mysqli_num_rows($pull_submarkets);

$query_wfhstatemrkt_usr = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_approvals` WHERE `wfhuser_approval_state` = '$dealer_state'";
$wfhstatemrkt_usr = mysqli_query($wfh_connection_mysqli, $query_wfhstatemrkt_usr);
$row_wfhstatemrkt_usr = mysqli_fetch_array($wfhstatemrkt_usr);
$totalRows_wfhstatemrkt_usr = mysqli_num_rows($wfhstatemrkt_usr);

$query_wfhdlr_purchase_logbatch = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_ledger_batch` WHERE `wfhuserledger_batch_did` = '$system_dealerid' ORDER BY `wfhuserledger_batch_created_at` ASC";
$wfhdlr_purchase_logbatch = mysqli_query($wfh_connection_mysqli, $query_wfhdlr_purchase_logbatch);
$row_wfhdlr_purchase_logbatch = mysqli_fetch_array($wfhdlr_purchase_logbatch);
$totalRows_wfhdlr_purchase_logbatch = mysqli_num_rows($wfhdlr_purchase_logbatch);


$query_dealer_wfhpurchases = "SELECT * FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuserledger_log_did` = '$system_dealerid' ORDER BY wfhuserledger_log_created_at ASC";
$dealer_wfhpurchases = mysqli_query($wfh_connection_mysqli, $query_dealer_wfhpurchases);
$row_dealer_wfhpurchases = mysqli_fetch_array($dealer_wfhpurchases);
$totalRows_dealer_wfhpurchases = mysqli_num_rows($dealer_wfhpurchases);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_credit_packages = "SELECT * FROM `idsids_idsdms`.`ids_credits` ORDER BY credit_pckg_id ASC";
$pull_credit_packages = mysqli_query($idsconnection_mysqli, $query_pull_credit_packages);
$row_pull_credit_packages = mysqli_fetch_array($pull_credit_packages);
$totalRows_pull_credit_packages = mysqli_num_rows($pull_credit_packages);



$query_pluscreditsAvilable = "SELECT SUM(`wfhuser_ledger_log`.`wfhuserledger_log_amount`) as `total_pluscredits` FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_typtransc` = '+' AND `wfhuserledger_log_did` = '$system_dealerid'";
$pluscreditsAvilable = mysqli_query($wfh_connection_mysqli, $query_pluscreditsAvilable);
$row_pluscreditsAvilable = mysqli_fetch_array($pluscreditsAvilable);
$totalRows_pluscreditsAvilable = mysqli_num_rows($pluscreditsAvilable);

$total_pluscredits = $row_pluscreditsAvilable['total_pluscredits'];
if(!$row_pluscreditsAvilable['total_pluscredits']){ $total_pluscredits = 0; }


$query_minuscreditsAvilable = "SELECT SUM(`wfhuser_ledger_log`.`wfhuserledger_log_amount`) as `total_minuscredits` FROM `idsids_wefinancehere`.`wfhuser_ledger_log` WHERE `wfhuser_ledger_log`.`wfhuserledger_log_typtransc` = '-' AND `wfhuserledger_log_did` = '$system_dealerid'";
$minuscreditsAvilable = mysqli_query($wfh_connection_mysqli, $query_minuscreditsAvilable);
$row_minusminuscreditsAvilable = mysqli_fetch_array($minuscreditsAvilable);
$totalRows_minuscreditsAvilable = mysqli_num_rows($minuscreditsAvilable);
$total_minuscredits = $row_minusminuscreditsAvilable['total_minuscredits'];


$true_total_credits = ($total_pluscredits - $total_minuscredits);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM `idsids_idsdms`.`ids_fees`";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);

$query_query_recurringInvoices = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring`, `idsids_idsdms`.`dealers` WHERE `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id` AND `ids_toinvoices_recurring`.`invoice_dealerid` = '$system_dealerid' ORDER BY `ids_toinvoices_recurring`.`invoice_status` ASC, `ids_toinvoices_recurring`.`invoice_id` DESC";
$query_recurringInvoices = mysqli_query($idsconnection_mysqli, $query_query_recurringInvoices);
$row_recurringInvoices = mysqli_fetch_array($query_recurringInvoices);
$totalRows_query_recurringInvoices = mysqli_num_rows($query_recurringInvoices);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoices = "
SELECT * FROM
`idsids_idsdms`.`ids_toinvoices`
LEFT JOIN `idsids_idsdms`.`dealers`
    ON `ids_toinvoices`.`invoice_dealerid` = `dealers`.`id`
     WHERE
     `ids_toinvoices`.`payment_status` = 'UnPaid'
     AND
     `ids_toinvoices`.`invoice_status` = 'Active'
     AND
     ids_toinvoices.`invoice_dealerid` = '$system_dealerid'
     AND
     `ids_toinvoices`.`payment_status`
     NOT IN ('Paid')
     ORDER BY `invoice_created_at` DESC



";
$inVoices = mysqli_query($idsconnection_mysqli, $query_inVoices);
$row_inVoices = mysqli_fetch_array($inVoices);
$totalRows_inVoices = mysqli_num_rows($inVoices);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoicespymts = "
SELECT * FROM
`idsids_idsdms`.`ids_toinvoices`
LEFT JOIN `idsids_idsdms`.`dealers`
    ON `ids_toinvoices`.`invoice_dealerid` = `dealers`.`id`
     WHERE
     `invoice_dealerid` = '$system_dealerid'
     AND
     `ids_toinvoices`.`payment_status` = 'UnPaid'
     AND
     `ids_toinvoices`.`invoice_status` = 'Active'
     AND
     `ids_toinvoices`.`payment_status`
     NOT IN ('Paid')


GROUP BY
    `ids_toinvoices`.`invoice_id`
    ORDER BY
    `ids_toinvoices`.`invoice_created_at` ASC
";
$inVoicespymts = mysqli_query($idsconnection_mysqli, $query_inVoicespymts);
$row_inVoicespymts = mysqli_fetch_array($inVoicespymts);
$totalRows_inVoicespymts = mysqli_num_rows($inVoicespymts);


$colname_queryInvoice = "-1";
if (isset($system_dealerid)) {
  $colname_queryInvoice = $system_dealerid;
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_recurringInvoice =  "
SELECT * FROM
    `idsids_idsdms`.`ids_toinvoices_recurring`
    LEFT JOIN `idsids_idsdms`.`dealers`
    ON `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`
WHERE

     `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`
     AND
     `ids_toinvoices_recurring`.`invoice_dealerid` = '$colname_queryInvoice'
GROUP BY
    `ids_toinvoices_recurring`.`invoice_id`
";
$query_recurringInvoice = mysqli_query($idsconnection_mysqli, $query_query_recurringInvoice);
$row_recurringInvoice = mysqli_fetch_array($query_recurringInvoice);
$totalRows_recurringInvoice = mysqli_num_rows($query_recurringInvoice);

$recurring_invoice_id = $row_recurringInvoice['invoice_id'];
$recurring_invoice_dealerid = $row_recurringInvoice['invoice_dealerid'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastrecurringInvcNum = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring` WHERE `ids_toinvoices_recurring`.`invoice_dealerid` = '$system_dealerid' ORDER BY `invoice_number` DESC";
$lastrecurringInvcNum = mysqli_query($idsconnection_mysqli, $query_lastrecurringInvcNum);
$row_lastrecurringInvcNum = mysqli_fetch_array($lastrecurringInvcNum);
$totalRows_lastrecurringInvcNum = mysqli_num_rows($lastrecurringInvcNum);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastInvcNum = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices` WHERE `ids_toinvoices`.`invoice_dealerid` = '$system_dealerid' ORDER BY `ids_toinvoices`.`invoice_number` DESC";
$lastInvcNum = mysqli_query($idsconnection_mysqli, $query_lastInvcNum);
$row_lastInvcNum = mysqli_fetch_array($lastInvcNum);
$totalRows_lastInvcNum = mysqli_num_rows($lastInvcNum);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>



	<!-- Adding Drop Zone For Vehicle Uploads-->
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

</head>

<body>
<?php include("analyticstracking.php"); ?>


    <div id="wrapper">



        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>


        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2><?php echo $row_findsys_dealer['company']; ?></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><?php echo $row_findsys_dealer['company']; ?></a>
                    </li>
                    <li>
                    	<a href="#">System Dealer</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>System Dealer</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">System Dealer Full View</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div id="dealer_communications_module" class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealer Communications <small>choose your options below</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a  id="thisdlrqckvw" role="button">Quick Open</a>
                                </li>
                                <li><a id="thisdlrfullvw" role="button">Full View</a>
                                </li>
                            </ul>
                        </div>

                    </div>

					<div class="ibox-content">

                    <h3 class="font-bold">Cummincation &amp; Action Buttons</h3>
                    <div class="row">
                    	<div class="col-sm-12">
                        <button class="btn btn-primary dim " type="button"><i class="fa fa-check"></i>&nbsp;Save</button>
                        <button class="btn btn-success dim " type="button"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Upload Store Photos</span></button>
                        <button class="btn btn-info dim " type="button"><i class="fa fa-car"></i> View/Edit Inventory</button>
                        <button id="email_systemdlr" class="btn btn-warning dim " type="button"><i class="fa fa-envelope"></i> <span class="bold">Email Dealer</span></button>
                        <button class="btn btn-info dim " type="button"><i class="fa fa-map-marker"></i>&nbsp;&nbsp; View Map</button>
                        </div>
                      </div>
                      <div class="row">
                      	<div class="col-sm-12">

                        <a class="btn btn-white btn-bitbucket">
                            <i class="fa fa-user-md"></i>
                        </a>
                        <a class="btn btn-white btn-bitbucket">
                            <i class="fa fa-group"></i>
                        </a>
                        <a class="btn btn-white btn-bitbucket">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="btn btn-white btn-bitbucket">
                            <i class="fa fa-star"></i> 1 Star
                        </a>

                        <a class="btn btn-white btn-bitbucket">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> 2 Stars
                        </a>
                        <a class="btn btn-white btn-bitbucket">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 3 Stars
                        </a>
                        <a class="btn btn-white btn-bitbucket">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"> </i><i class="fa fa-star"></i> <i class="fa fa-star"></i> 4 Stars
                        </a>
                        <a class="btn btn-white btn-bitbucket">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 5 Stars
                        </a>
                       </div>
                    </div>








<div class="modal inmodal" id="emailProspectDlrModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-clock-o modal-icon"></i>
                                            <h4 class="modal-title">Email This Dealer</h4>
                                            <small>Select A Template And Email It To This Lead</small>
                                        </div>
                                        <div class="modal-body">




<div class="form-horizontal">
                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">To:</label>
                                            	<div class="col-sm-10">
                                               	  <input id="dealer_email_to" type="text" class="form-control" value="<?php echo $row_findsys_dealer['email']; ?>">
                                                </div>
                                           </div>


                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">CC:</label>

                                            	<div class="col-sm-10">
<select id="dealer_email_cc" class="form-control">
      <option value="">Select CC</option>
<?php if($row_findsys_dealer['accts_payables_email'] == 1){ ?>
<option value="<?php echo $row_findsys_dealer['accts_payables_email']; ?>" <?php if (!(strcmp($row_findsys_dealer['accts_payables_email'], $row_findsys_dealer['accts_payables_email']))) {echo "selected=\"selected\"";} ?>>("<?php echo $row_findsys_dealer['accts_payables_name']; ?>") <?php echo $row_findsys_dealer['accts_payables_email']; ?></option>
<?php } ?>

<?php if($row_findsys_dealer['accts_payables_verified'] == 1){ ?>
<option value="N" <?php if (!(strcmp($row_findsys_dealer['accts_rcvbles_email'], $row_findsys_dealer['accts_rcvbles_email']))) {echo "selected=\"selected\"";} ?>> "( <?php echo $row_findsys_dealer['accts_rcvbles_name']; ?>)" <?php echo $row_findsys_dealer['accts_rcvbles_email']; ?></option>
<?php } ?>
                                    </select>
                                                </div>
                                           </div>

                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">From:</label>
                                            	<div class="col-sm-10">
                                               	  <input id="email_from" type="text" class="form-control" value="<?php echo $row_userDudes['dudes_email_internal']; ?>" disabled="disabled">
                                                </div>
											</div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Scrub Against</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b">
                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-primary" type="button">Pull Category Templates</button>
                                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"><span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </div>
                                            <select id="category_selection" class="form-control">
                                            	<option value="">Selct One</option>
                                            	<option value="campaign">Campaign</option>
                                            	<option value="billing">Billing</option>
                                                <option value="prospctdlr">Prospect</option>
                                                <option value="systmdlr">Dealer</option>

                                            </select>

                                            </div>
                                        <div class="input-group">

                                               	  <select id="email_template" name="email_template" class="form-control">
                                               	    <option value="">Select</option>
                                               	    <?php do {  ?>
                                               	    <option value="<?php echo $row_find_activsystem_templates['id']?>"><?php echo $row_find_activsystem_templates['email_systm_templates_subject']?></option>
                                               	    <?php
} while ($row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates));
  $rows = mysqli_num_rows($find_activsystem_templates);
  if($rows > 0) {
      mysqli_data_seek($find_activsystem_templates, 0);
	  $row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
  }
?>
                                                  </select>


                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-primary" type="button">Pull Template</button>
                                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"><span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>





                    <div class="mail-text">

                        <div id="email_systmdlr_templates_body" class="summernote">
                            <p id="removeme"></p>

                        </div>
<div class="clearfix"></div>
                        </div>
                    <div class="clearfix"></div>













                                        </div>







                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button id="sendthis_dealeranemail" data-dismiss="modal" type="button" class="btn btn-primary">Send Email</button>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                	</div>











                </div>
              </div>







            <div class="row">
                <div class="col-lg-12">
                                <div class="ibox">
                                    <div class="ibox-content">

                            <h2>Current Balance: <?php echo $true_total_credits;  //if($balance_credits > 0.01){echo '$balance_credits'; }else{ echo '0';  }; ?> <small>credits...</small></h2>


                                        <div class="hr-line-dashed"></div>

<div class="form-horizontal">
                                    <div class="form-group">
                                       <label class="col-sm-3 control-label">Choose A Package</label>

                                        <div class="col-sm-9">

                                        <div class="input-group">
<select name="choose_creditpackage" id="choose_creditpackage" class="form-control">
    <option value="">Choose Package</option>
    <?php
do {
?>
    <option value="<?php echo $row_pull_credit_packages['credit_pckg_id']?>"><?php echo $row_pull_credit_packages['credit_pckg_description']?> Charge To Invoice 	<?php echo $row_pull_credit_packages['credit_pckg_chargtoinvoice']?></option>
    <?php
} while ($row_pull_credit_packages = mysqli_fetch_array($pull_credit_packages));
  $rows = mysqli_num_rows($pull_credit_packages);
  if($rows > 0) {
      mysqli_data_seek($pull_credit_packages, 0);
	  $row_pull_credit_packages = mysqli_fetch_array($pull_credit_packages);
  }
?>
  </select>
                                        <span class="input-group-btn">
                                        <button type="button"  id="run_creditpurch_transact" class="btn btn-primary">Go!
                                        </button>
                                        </span>
                                        </div>



                                        </div>
                                    </div>


                                        <div class="hr-line-dashed"></div>
</div>

                                    </div>
                                </div>
                </div>
            </div>







            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>History Log of Credits <small>Credit's Dealer Used And Deposits</small></h5>
                    </div>
					<div id="history_ledger" class="ibox-content">




                            <table class="footable table table-stripped" data-page-size="25" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Token</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>When</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

<?php do{ ?>
                                <tr id="<?php echo $row_dealer_wfhpurchases['wfhuserledger_log_id']; ?>" class="gradeX">
                                    <td>
                                    <?php echo $row_dealer_wfhpurchases['wfhuserledger_log_id']; ?>
                                    </td>
                                    <td>

                                    <small>record: <?php echo $row_dealer_wfhpurchases['wfhuserledger_log_token']; ?></small><br />


                                    <?php echo $row_dealer_wfhpurchases['wfhuserledger_log_descrp']; ?>



                                    </td>
                               		<td>
                                    	 <?php echo $row_dealer_wfhpurchases['wfhuserledger_log_typtransc']; ?>
                                    </td>
                                    <td class="center"><?php echo $row_dealer_wfhpurchases['wfhuserledger_log_amount']; ?></td>
                                    <td><?php echo  date('m/d/y h:i a T',strtotime($row_dealer_wfhpurchases['wfhuserledger_log_created_at'])); ?></td>
                                    <td class="center">
									<?php if($row_dealer_wfhpurchases['wfhuserledger_log_batched_time']){ ?>
									<?php echo 'Processed On: '.date('m/d/y h:i a T',strtotime($row_dealer_wfhpurchases['wfhuserledger_log_batched_time'])); ?>
									<?php }else{ ?>
                                    Pending
                                    <?php } ?>
                                    </td>
                                </tr>
<?php } while ($row_dealer_wfhpurchases = mysqli_fetch_array($dealer_wfhpurchases)); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>







                        </div>
                    </div>
              </div>
            </div>






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealer Products <small>Products Dealer's Using</small></h5>
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
                        <h5>Deal Settings <small>for this dealer</small></h5>
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
                        <h5>Deal Matrix <small>Settings For This Dealer</small></h5>
                    </div>
                    <div class="ibox-content">





                    </div>
                </div>
              </div>
            </div>




















                            <div class="modal inmodal" id="addModelbyDealer" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Create A New Model</h4>
                                            <small class="font-bold">Because you said your model wasn't listed here we wanted to let you add it.</small>
                                        </div>

                                        <div id="appointment_body_viewer" class="modal-body">

                                        <div class="form-group">
                                        <label>Create A New System Model</label>
                      					<input id="vmodel_entered" class="form-control" value="" />
                                        </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button id="cancel_model_toselections" type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="add_model_toselections" type="button" data-dismiss="modal" class="btn btn-warning">Add To Model Selection</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add Inventory To Prospect Dealer Account Start Here...<small>Must have vin#:</small></h5>
                    </div>
                    <div id="start_inventory_content" class="ibox-content">

                            <input id="pass_vin_good" type="hidden" value="N">
                            <input id="pass_stock_good" type="hidden" value="N">




<div class="form-horizontal">

                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">VIN:<br /><div id="vvinfeedback"></div></label>





                                    <div class="col-sm-10">



                                        <div id="vin_highlight" class="input-group m-b">

                        <span class="input-group-addon">VIN <span id="vin_charcount">Empty</span></span>
                        <input id="vvin" type="text" name="vvin" maxlength="17" class="form-control" value="">
                       <span class="input-group-btn"> <button id="decode_vin" type="button" class="btn btn-primary">PASS VIN!</button> </span>



                                        </div>

                                        <div class="row">
                                        	<div class="inline">

                            <div id="vinYearResult" class="col-sm-3">Year</div>
                            <div id="vinMakeResult" class="col-sm-3">Make</div>
                            <div id="vinModelResult" class="col-sm-5">Model</div>


                                            </div>
                                            <input id="vin_year" type="hidden" value="" />
                                        </div>

                                    </div><!-- End Col-sm-10 -->
                                </div>





                                <div class="hr-line-dashed"></div>

 				<div id="vehicle_first_part" style="display: block;">

                                <div class="form-group">
                                	<label for="vstockno" class="col-sm-2 control-label">Stock No:</label>
                                    <div class="col-sm-10">
                                        <div id="stock_highlight" class="input-group m-b">
                                            <span id="uselast6ofvin" class="input-group-addon">Use Last Six of VIN</span>
                                            <input id="vstockno" type="text" class="form-control" value="">
                                            <span class="input-group-btn">
                                            <button id="checkout_vstockno" type="button" class="btn btn-primary">Stock# Check!</button>
                                            </span>
                                        </div>
									</div>
                    			</div>

					<div id="checkvstock_results">

                    </div>

                </div>


                                <div class="hr-line-dashed"></div>

   				<div id="vehicle_second_part" style="display:none;">


                    <div class="form-group">
                    <label for="vmileage" class="col-sm-2 control-label">Mileage:</label>
                        <div class="col-sm-10">
					<input id="vmileage" type="text" placeholder="Mileage" class="form-control" value="">
                        </div>
                    </div>



                                <div class="hr-line-dashed"></div>








                                <div class="form-group"><label for="vyear" class="col-sm-2 control-label">Year:</label>

                                    <div class="col-sm-10"><select name="vyear" id="vyear" class="form-control">
                                      <option value="">Select Year</option>
                                      <?php do {  ?>
<option value="<?php echo $row_carYears['year']; ?>"><?php echo $row_carYears['year']; ?></option>
<?php
} while ($row_carYears = mysqli_fetch_array($carYears));
  $rows = mysqli_num_rows($carYears);
  if($rows > 0) {
      mysqli_data_seek($carYears, 0);
	  $row_carYears = mysqli_fetch_array($carYears);
  }
?>
                                    </select></div>
                                </div>


                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                <label for="vmake" class="col-sm-2 control-label">Make:</label>

		                        <div class="col-sm-10">
                                 <select id="vmake" class="form-control">
                                    <option value="">Select Make</option>
                                    <?php
do {
?>
                                    <option value="<?php echo $row_vmakes['make_id']?>"><?php echo $row_vmakes['car_make']?></option>
                                    <?php
} while ($row_vmakes = mysqli_fetch_array($vmakes));
  $rows = mysqli_num_rows($vmakes);
  if($rows > 0) {
      mysqli_data_seek($vmakes, 0);
	  $row_vmakes = mysqli_fetch_array($vmakes);
  }
?>
                                  </select>

                                    </div>
                                </div>



                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label for="vmodel" class="col-sm-2 control-label">Model:</label>

                                    <div class="col-sm-10">
                                    <select id="vmodel" class="form-control">
                                            	<option value="">Select Model</option>

                                    </select>
									</div>

                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label for="vtrim" class="col-sm-2 control-label">Trim:</label>

                                    <div class="col-sm-10">
                                    <input id="vtrim" placeholder="Trim" class="form-control" value="">
									</div>

                                </div>

                                <div class="hr-line-dashed"></div>



                                    <div class="form-group">
                                        <label for="vbody" class="col-sm-2 control-label">Body Style: </label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
<select id="vbody" name="vbody" class="form-control">
<option value="">Select Body Style</option>
<?php do {  ?>
<option value="<?php echo $row_query_bodystyles['body_style_name']?>"><?php echo $row_query_bodystyles['body_style_name']?></option>
<?php
} while ($row_query_bodystyles = mysqli_fetch_array($query_bodystyles));
  $rows = mysqli_num_rows($query_bodystyles);
  if($rows > 0) {
      mysqli_data_seek($query_bodystyles, 0);
	  $row_query_bodystyles = mysqli_fetch_array($query_bodystyles);
  }
?>
  </select>
											</div>
                                      </div>

                                    <div class="hr-line-dashed"></div>




                                    <div class="form-group">
                                        <label for="vexterior_color" class="col-sm-2 control-label">Exterior Color: </label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
  <select name="vexterior_color" id="vexterior_color" class="form-control">
    <option value="">Select Color</option>
    <?php do { ?>
    <option value="<?php echo $row_colors_hex['color_hex']?>"><?php echo $row_colors_hex['color_name']?></option>
    <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
  </select>


                                    	</div>
                                    </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group">

                                         <label for="vinterior_color" class="col-sm-2 control-label">Interior Color: </label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                 <select name="vinterior_color" id="vinterior_color" class="form-control">
                   <option value="">Select Color</option>
                   <?php do {  ?>
                   <option value="<?php echo $row_colors_hex['color_hex']?>"><?php echo $row_colors_hex['color_name']?></option>
                   <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
    </select>
                                    	</div>
                                    </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label for="vcustomcolor" class="col-sm-2 control-label">Custom Color Name:</label>

                                    <div class="col-sm-10">
                                    <input id="vcustomcolor" placeholder="Custom Color Name" class="form-control" value="">
									</div>

                                </div>



                                <div class="hr-line-dashed"></div>



                                    <div class="form-group">
                                        <label for="vtransm" class="col-sm-2 control-label">Transmission:</label>

                                        <div class="col-lg-10 col-md-10 col-sm-10">

<select class="form-control m-b" id="vtransm"  name="vtransm">
                    <option value="">Select Transmission</option>
                    <?php do {  ?>
<option value="<?php echo $row_distinct_transm['vtransm']?>"><?php echo $row_distinct_transm['vtransm']?></option>
<?php
} while ($row_distinct_transm = mysqli_fetch_array($distinct_transm));
  $rows = mysqli_num_rows($distinct_transm);
  if($rows > 0) {
      mysqli_data_seek($distinct_transm, 0);
	  $row_distinct_transm = mysqli_fetch_array($distinct_transm);
  }
?>
    </select>

                                           </div>
                                    </div>


                                <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label for="vengine" class="col-sm-2 control-label" placeholder="Example 3.8 L">Engine Description:</label>

                                        <div class="col-lg-10 col-md-10 col-sm-10">

                                        <input class="form-control"  id="vengine"  name="vengine" value="" placeholder="i.e., 2.5L DOHC" />

                                           </div>
                                    </div>





                                <div class="hr-line-dashed"></div>


                                    <div class="form-group">
                                        <label for="vcylinders" class="col-sm-2 control-label">Cylinders: </label>
                                     <div class="col-lg-10 col-md-10 col-sm-10">
                                         <select id="vcylinders" name="vcylinders" class="form-control">
                                            <option value="">Select Cylinders</option>
                                            <option value="3">3 Cylinders</option>
                                            <option value="4">4 Cylinders</option>
                                            <option value="6">6 Cylinders</option>
                                            <option value="8">8 Cylinders</option>
                                            <option value="10">10 Cylinders</option>
                                            <option value="12">12 Cylinders</option>
                                         </select>
                                    </div>
                                    </div>





                                    <div class="hr-line-dashed"></div>



                                    <div class="form-group">
                                        <label for="vfueltype" class="col-sm-2 control-label">Fuel Type: </label>

                                   <div class="col-lg-10 col-md-10 col-sm-10">
                                    <select id="vfueltype" name="vfueltype" class="form-control">
                                        <option value="" >Select Fuel Type</option>
                                        <option value="Gasoline">Gasoline</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Hybrid">Hybrid</option>
                                        <option value="Electric">Electric</option>
                                     </select>
	                                    </div>
                                    </div>




                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="vdoors" class="col-sm-2 control-label">Doors:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10">

                                         <select id="vdoors" class="form-control">
                                            <option value="">Select Doors</option>
                                            <option value="2">2 Door</option>
                                            <option value="3">3 Door</option>
                                            <option value="4">4 Door</option>
                                            <option value="5">5 Door</option>
                                            <option value="6">6 Door</option>

                                         </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                    <div class="form-group">
                                        <label for="vlivestatus" class="col-lg-2 col-md-2 col-sm-2 control-label">Vehicle Status:</label>

                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                        <select class="form-control"  id="vlivestatus" >
                                          <option value="0">KEEP ON HOLD</option>
                                          <option value="1">GO LIVE</option>
                                          <option value="9">SOLD!</option>
                                        </select>
                                        </div>
                                    </div>
                                <div class="hr-line-dashed"></div>

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label">Vehicle Condition:</label>

                                        <div class="col-lg-10 col-md-10 col-sm-10">

                            <select class="form-control" id="vcondition"  name="vcondition">
                                <option value="" >Select Vehicle Condition</option>
                                <option value="Used">Used</option>
                                <option value="New">New</option>
                                <option value="Trade-In">Trade-In</option>
                                <option value="Salvage">Salvage</option>
                            </select>


                                         </div>
                                    </div>


                                    <div class="hr-line-dashed"></div>





                                <div class="form-group"><label id="vrprice" class="col-sm-2 control-label">Retail Price:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vrprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>

                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label id="vspecialprice" class="col-sm-2 control-label">Special Price:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vspecialprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>

                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label id="vdprice" class="col-sm-2 control-label">Downpayment Price:</label>

                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input id="vdprice" type="text" class="form-control" value=""> <span class="input-group-addon">.00</span></div>
                                    </div>

                                </div>








                                <div class="hr-line-dashed"></div>













                </div><!-- End Second Part -->

</div>







                    </div><!-- End ibox contnet-->
                </div>
            </div>
        </div>














<div class="modal inmodal fade" id="vehicleUploadModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Upload Multiple Photos</h4>
                                            <small id="vehicle_working_upload_text" class="font-bold">This </small>
                                        </div>
                                        <div class="modal-body">


					<input id="this_vehicleid" type="hidden" value="">
					<input id="this_prospctdlrid" type="hidden" value="">

                    <br />


                    <div id="vehicle-dropzone" style="background:#666;">
                    <button id="submit-all">Submit all files</button>
                    <form id="my-dropzone" action="uploads/upload.php" class="dropzone" style="background:#666;">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form>
                    </div>






                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white">Close</button>
<a id="clear_outphotos" class="btn btn-xs btn-primary">Clear Photos</a>

                                            <button type="button" class="btn btn-primary"  data-dismiss="modal">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Upload Vehicle Photos <small>uploading muliple photos at once.</small></h5>
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
                        <h5>Inventory Import Options <small></small></h5>
                    </div>
                    <div class="ibox-content">











<div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                            	<a href="#tab-a" data-toggle="tab">Frazer Feed</a>
                                            </li>
                                            <li><a href="#tab-b" data-toggle="tab">Homenet Import</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                <div class="tab-content">
                                <div class="tab-pane active" id="tab-a">
                                	<h2>Frazer Settings</h2>




                                <p>Save and activate this dealers frazer settings.</p>
                                <div class="form-group"><label class="col-sm-2 control-label">Frazer Customer Number:</label>

                                    <div class="col-sm-10"><input id="feedidfrazer" type="text" class="form-control" value="<?php echo $row_findsys_dealer['feedidfrazer']; ?>"><span class="help-block m-b-none">Frazer ID/Customer Number.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <div class="checkbox i-checks">
                                            <label> <input id="feedidfrazerActivated" type="checkbox" <?php if (!(strcmp($row_findsys_dealer['feedidfrazerActivated'],1))) {echo "checked=\"checked\"";} ?> <?php if($dudes_super == 'Y'){ echo ''; }else{ echo 'disabled="disabled"'; } ?>> <i></i> &nbsp;&nbsp;Frazer Activated </label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button id="save_frazersettings" class="btn btn-primary" type="button"  <?php if($dudes_super == 'Y'){ echo ''; }else{ echo 'disabled="disabled"'; } ?>>Save</button>
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane" id="tab-b">
                                	<h2>Homenet Auto Settings</h2>




							<div class="form-horizontal">

                                <p>Save and activate this dealers homenet data file.</p>
                                <div class="form-group"><label class="col-lg-2 control-label">Homenet Filename</label>

                                    <div class="col-lg-10">
                                    	<div class="input-group">
             		                            <input name="feedhomenetfilename" type="text" class="form-control" id="feedhomenetfilename" value="<?php echo $row_findsys_dealer['feedhomenetfilename']; ?>" placeholder="Homenet Data File" <?php if($dudes_super == 'Y'){ echo ''; }else{ echo 'disabled="disabled"'; } ?>>
                                                <span class="input-group-btn">
                                                	<button type="button" class="btn <?php if($row_findsys_dealer['feedhomenetActivated'] == 1){ echo 'btn-info'; }else{ echo 'btn-warning'; } ?>"><?php if($row_findsys_dealer['feedhomenetActivated'] == 1){ echo 'Running'; }else{ echo 'Not Running'; } ?></button>
                                                </span>
										</div>
                                    <span class="help-block m-b-none">Enter File Name. <?php echo $row_findsys_dealer['feedhomenetActivated']; ?></span>
                                    </div>
                                	<div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <div class="checkbox i-checks">
                                              <label> <input name="feedhomenetActivated" type="checkbox" id="feedhomenetActivated" <?php if (!(strcmp($row_findsys_dealer['feedhomenetActivated'],1))) {echo "checked=\"checked\"";} ?> <?php if($dudes_super == 'Y'){ echo ''; }else{ echo 'disabled="disabled"'; } ?>><i></i> Activate Homenet </label>
                                              </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button id="save_homenetsettings" class="btn btn-primary" type="button"  <?php if($dudes_super == 'Y'){ echo ''; }else{ echo 'disabled="disabled"'; } ?>>Save</button>
                                    </div>
                                </div>
                            </div>









                                </div><!-- End tab-5 -->
                               </div><!-- End tab-contnet -->



                                </div>
								</div>



































                    </div><!-- End Ibox For Add Dealers Inventory -->





            <div class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Console Results Here</h5>
                        </div>
                        <div id="ajax_vehicle_console_results" class="ibox-content">



                        </div>
                        <div id="createVehicleResult" class="ibox-content">



                        </div>


                    </div>
            	</div>
            </div>



















            <div id="transfer_vehicle_view_box" class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>We Have A Record This Vehicle Belongs To Another Dealer</h5>
                        </div>
                        <div class="ibox-content">

<div class="row">
    <div class="col-sm-12">
        <button id="create_anyway" class="btn btn-warning btn-block btn-lg dim"><i class="fa fa-car fa-5x"></i> Transfer This Vehicle</button>
    </div>
</div>

                        </div>
                    </div>
            	</div>
            </div>





            <div id="add_vehicle_view_box" class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Ready To Go</h5>
                        </div>
                        <div class="ibox-content">





<div class="row">
    <div class="col-sm-12">
        <button id="create_anyway" class="btn btn-primary btn-block btn-lg dim"><i class="fa fa-car fa-5x"></i> Add This Vehicle</button>
    </div>
</div>









                        </div>
                    </div>
            	</div>
            </div>





                </div>
              </div><!-- End class="col-lg-12" -->
            </div><!-- End Row -->



































            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealers Inventory <small>Dealers Inventory</small></h5>
                    </div>
                    <div class="ibox-content">

<?php $counter_gridrow = 0; ?>
<table id="myDealerVehicledataTable" class="table table-striped table-bordered table-hover dataTable" border="0">
<thead>
  <tr>
        <th>Photo / Status</th>
        <th>Stock No</th>
        <th>Year Make Model Trim</th>
        <th>Pricing Down Payment</th>
        <th>Action</th>
  </tr>
</thead>
<tbody>

<?php if($totalRows_sysdealer_vehicles != 0): do { ?>
<?php $counter_gridrow++; ?>
  <tr>
    <td>
    <?php echo $row_sysdealer_vehicles['vid']; ?><br />
    <?php if($row_sysdealer_vehicles['vthubmnail_file_path']): ?>

  <?php
  $vthubmnail_file_path = $row_sysdealer_vehicles['vthubmnail_file_path'];

    $vthubmnail_file_path = str_replace("../vehicles/photos", "https://images.autocitymag.com/", "$vthubmnail_file_path");

	//$vthubmnail_file_path = $row_sysdealer_vehicles['vthubmnail_file_path'];
?>


    <img src="<?php echo $vthubmnail_file_path; ?>" width="120px" />
    <?php endif; ?>


    <p>View <?php echo $row_sysdealer_vehicles['vphoto_count']; ?> Photos</p></td>
    <td>
	<?php
	if($row_sysdealer_vehicles['vlivestatus'] == 1){
	echo 'Live';
	}elseif($row_sysdealer_vehicles['vlivestatus'] == 0){
		echo 'Hold';
	}elseif($row_sysdealer_vehicles['vlivestatus'] == 9){
		echo 'Sold';
	}else{
		echo $row_sysdealer_vehicles['vlivestatus'];
	}
	?>
    </td>
    <td>
	<?php echo $row_sysdealer_vehicles['vyear']; ?> <?php echo $row_sysdealer_vehicles['vmake']; ?> <?php echo $row_sysdealer_vehicles['vmodel']; ?> <?php echo $row_sysdealer_vehicles['vtrim']; ?>
    <br />
    <br />
    <?php echo $row_sysdealer_vehicles['vvin']; ?>
    </td>
    <td>
	Retail: <?php echo $row_sysdealer_vehicles['vrprice']; ?><br />
    Special: <?php echo $row_sysdealer_vehicles['vspecialprice']; ?><br />
	Downpayment: <?php echo $row_sysdealer_vehicles['vdprice']; ?><br />
    </td>
    <td><p><a href="inventory.edit.php?vid=<?php echo $row_sysdealer_vehicles['vid']; ?>" target="_blank">Edit Vehicle</a></p>
    <p><a id="<?php echo $row_sysdealer_vehicles['vid']; ?>" role="button" class="ldexternal_vehicle_photo">Upload Photos</a></p>
  </tr>
    <?php } while ($row_sysdealer_vehicles = mysqli_fetch_array($sysdealer_vehicles)); else: ?>
	<tr>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
    	<td>
		<a id="novehicles" role="button" class="ldexternal_vehicle_photo" style="display:none;">Upload Photos</a>
        </td>
    </tr>


<?php endif; ?>
</tbody>
<tfoot>
<tr>
    <th>Photo / Status</th>
    <th>Stock No</th>
    <th>Year Make Model Trim</th>
    <th>Pricing Down Payment</th>
    <th>Action</th>
</tr>
</tfoot>
</table>



                    </div>
                </div>
              </div>
            </div>





























































            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealers Reocurring Billing <small>Automatic Invoicing</small></h5>
                    </div>
                    <div class="ibox-content">





                     <?php require_once("views/body.invoice.reocurring.php"); ?>





                    </div>
                </div>
              </div>
            </div>




            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealers Billing <small>Dealers Invoices and Invoice History</small></h5>
                    </div>
                    <div class="ibox-content">





                     <?php require_once("views/body.invoice.create.php"); ?>





                    </div>
                </div>
              </div>
            </div>











            <div id="dealer_account_box" class="row">
            <input id="thisdid" type="hidden" value="<?php echo $system_dealerid; ?>">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-title">
                            <h5>Dealership Store &amp; Account Information <small>This section also displays google map of your store address be sure latitude and longitude is saved.</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a  id="thisdlrqckvw" role="button">Quick Open</a>
                                </li>
                                <li><a id="thisdlrfullvw" role="button">Full View</a>
                                </li>
                            </ul>
                        </div>

                        </div>
                        <div class="ibox-content">

                        <div class="form-horizontal">





						<div class="row white-bg">
                                <div class="col-lg-12">

                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                            <a href="#tab-1" data-toggle="tab">Account Information</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">Store Information</a></li>
                                            <li><a href="#tab-3" data-toggle="tab">Financial Information</a></li>
                                            <li><a href="#tab-4" data-toggle="tab">Notification Settings</a></li>
                                            <li><a href="#tab-5" data-toggle="tab">Widget Activation</a></li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">





                                <div class="form-group"><label class="col-sm-2 control-label">Company Name:</label>

                                    <div class="col-sm-10"><input id="company" type="text" class="form-control" value="<?php echo $row_findsys_dealer['company']; ?>"><span class="help-block m-b-none">May be public to advertisement, website and etc.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">Dealership Legal Name:</label>

                                    <div class="col-sm-10"><input id="company_legalname" type="text" class="form-control" value="<?php echo $row_findsys_dealer['company_legalname']; ?>"><span class="help-block m-b-none">Internal not public information mainly for billing purposes.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Primary Business Model:</label>

                                    <div class="col-sm-10">
    <select id="dealer_type_id" class="form-control">
      <option value="" <?php if (!(strcmp("", $row_findsys_dealer['dealer_type_id']))) {echo "selected=\"selected\"";} ?>>Select Dealer Type</option>
      <?php
do {
?>
<option value="<?php echo $row_qry_dlrtypes['dtype_id']?>"<?php if (!(strcmp($row_qry_dlrtypes['dtype_id'], $row_findsys_dealer['dealer_type_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_qry_dlrtypes['dtype_label']?></option>
      <?php
} while ($row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes));
  $rows = mysqli_num_rows($qry_dlrtypes);
  if($rows > 0) {
      mysqli_data_seek($qry_dlrtypes, 0);
	  $row_qry_dlrtypes = mysqli_fetch_array($qry_dlrtypes);
  }
?>
    </select>
                                    <span class="help-block m-b-none">Best description of your finance model.</span>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">1st. Point Of Contact: (Name)</label>

                                    <div class="col-sm-10">
                                    <input class="form-control" id="contact" value="<?php echo $row_findsys_dealer['contact']; ?>">
                                    <span class="help-block m-b-none">Name Of Primary Account Holder, decision maker of this account the owner.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                              <div class="form-group"><label class="col-sm-2 control-label">1st. Point Of Contact: (Title)</label>

                                    <div class="col-sm-10">
                                    <select class="form-control" id="contact_title">
                                      <option value="Owner/CEO" <?php if (!(strcmp("Owner/CEO", $row_findsys_dealer['contact_title']))) {echo "selected=\"selected\"";} ?>>Owner/CEO</option>
                                      <option value="GM" <?php if (!(strcmp("GM", $row_findsys_dealer['contact_title']))) {echo "selected=\"selected\"";} ?>>GM</option>
                                      <option value="Other" <?php if (!(strcmp("Other", $row_findsys_dealer['contact_title']))) {echo "selected=\"selected\"";} ?>>Other</option>
                                    </select>

                                    <span class="help-block m-b-none">Main Account, decision maker title of this account the owner.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">2nd Point Of Contact: Decision Maker:</label>

                                    <div class="col-sm-10"><input id="dmcontact2" type="text" class="form-control" value="<?php echo $row_findsys_dealer['dmcontact2']; ?>"><span class="help-block m-b-none">Main Account, decision maker of this account the owner.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">2nd Point Of Contact: (Title)</label>

                                    <div class="col-sm-10"><input id="dmcontact2_title" type="text" class="form-control" value="<?php echo $row_findsys_dealer['dmcontact2_title']; ?>"><span class="help-block m-b-none">Main Account, decision maker of this account the owner.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Store Address:</label>

                                    <div class="col-sm-10"><input id="address" type="text" class="form-control" value="<?php echo $row_findsys_dealer['address']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">City:</label>

                                    <div class="col-sm-10"><input id="city" type="text" class="form-control" value="<?php echo $row_findsys_dealer['city']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">State:</label>

                                    <div class="col-sm-10">
  <select class="form-control m-b" name="state" id="state">
    <?php
do {
?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_findsys_dealer['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
    <?php
} while ($row_states = mysqli_fetch_array($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_array($states);
  }
?>
  </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label for="zip" class="col-sm-2 control-label">Zip:</label>

                                    <div class="col-sm-10"><input id="zip" type="text" class="form-control" value="<?php echo $row_findsys_dealer['zip']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>




                                <div class="form-group">
                                <label class="col-sm-2 control-label">Country:</label>

                                    <div class="col-sm-10">
									<select class="form-control m-b"id="country">
                                        <option value="USA" selected="selected">United States of America: USA</option>
                                    </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Time Zones:</label>
                                    <div class="col-sm-10">
<select class="form-control m-b" id="dealerTimezone" name="dealerTimezone">
  <option value="America/New_York" selected="selected" <?php if (!(strcmp("America/New_York", $row_findsys_dealer['dealerTimezone']))) {echo "selected=\"selected\"";} ?>>America/New_York</option>
  <?php
do {
?>
  <option value="<?php echo $row_dlr_timezones['TimeZone']?>"<?php if (!(strcmp($row_dlr_timezones['TimeZone'], $row_findsys_dealer['dealerTimezone']))) {echo "selected=\"selected\"";} ?>><?php echo $row_dlr_timezones['TimeZone']?>  | <?php echo $row_dlr_timezones['CountryCode']; ?> | <?php echo $row_dlr_timezones['UTC offset']; ?> | <?php echo $row_dlr_timezones['UTC DST offset']; ?> | <?php echo $row_dlr_timezones['Notes']; ?></option>
  <?php
} while ($row_dlr_timezones = mysqli_fetch_array($dlr_timezones));
  $rows = mysqli_num_rows($dlr_timezones);
  if($rows > 0) {
      mysqli_data_seek($dlr_timezones, 0);
	  $row_dlr_timezones = mysqli_fetch_array($dlr_timezones);
  }
?>
</select>
                                        <span class="help-block">i.e. "America/New_York, America/Chicago, America/Knox_IN, America/Los_Angeles"</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                <label class="col-sm-2 control-label">Pull Map</label>

                                    <div class="col-sm-10">
											<button id="pull_dlr_map" class="btn btn-primary btn-lg btn-outline">Pull Map</button>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                <label class="col-sm-2 control-label">Geo Latitude</label>

                                    <div class="col-sm-10">
<input id="dlr_geo_latitude" type="text" class="form-control" value="<?php echo $row_findsys_dealer['dlr_geo_latitude']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                <label for="dlr_geo_longitude" class="col-sm-2 control-label">Geo Longitude</label>

                                    <div class="col-sm-10">
<input id="dlr_geo_longitude" type="text" class="form-control" value="<?php echo $row_findsys_dealer['dlr_geo_longitude']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>





                                </div>
                                <div class="tab-pane" id="tab-2">



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Main Phone Number:</label>
                                    <div class="col-sm-10">
                                        <input id="phone" type="text" class="form-control" data-mask="1(999) 999-9999" placeholder="<?php echo $row_findsys_dealer['phone']; ?>" value="<?php echo $row_findsys_dealer['phone']; ?>">
                                        <span class="help-block">1(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Main Fax Number:</label>
                                    <div class="col-sm-10">
                                        <input id="fax" type="text" class="form-control" data-mask="1(999) 999-9999" placeholder="<?php echo $row_findsys_dealer['fax']; ?>" value="<?php echo $row_findsys_dealer['fax']; ?>">
                                        <span class="help-block">1(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Main Email: (Login Purposes)</label>
                                    <div class="col-sm-10">
                                        <p id="static_dlremail" class="form-control-static"><?php echo $row_findsys_dealer['email']; ?></p>
                                        <span class="help-block">Main email address this will be used for main communications and also login credentials to main dealer account.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Website Url:</label>
                                    <div class="col-sm-10">
                                        <input id="website_url" class="form-control" value="<?php echo $row_findsys_dealer['website']; ?>">
                                        <span class="help-block">This url should not have http:// nor www.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Accounts Receivables Name:</label>
                                    <div class="col-sm-10">
                                        <input id="accts_rcvbles_name" name="accts_rcvbles_name" type="text" class="form-control" placeholder="" value="<?php echo $row_findsys_dealer['accts_rcvbles_name']; ?>">
                                        <span class="help-block">Will be CC on invoices and bills</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Accounts Receivables Email:</label>
                                    <div class="col-sm-10 input-group">
                                    <span class="input-group-addon">
                                        <input id="accts_rcvbles_verified" name="accts_rcvbles_verified" type="checkbox" class="i-checks" value="<?php echo $row_findsys_dealer['accts_rcvbles_verified']; ?>" <?php if($row_findsys_dealer['accts_rcvbles_verified'] == 1){ echo "checked='checked'"; } ?>>
                                    </span>
                                        <input id="accts_rcvbles_email" name="accts_rcvbles_email" type="text" class="form-control" placeholder="" value="<?php echo $row_findsys_dealer['accts_rcvbles_email']; ?>">
                                        <span class="help-block">Will be CC on invoices and bills</span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Accounts Payable Name:</label>
                                    <div class="col-sm-10">
                                        <input id="accts_payables_name" name="accts_payables_name" type="text" class="form-control" placeholder="" value="<?php echo $row_findsys_dealer['accts_payables_name']; ?>">
                                        <span class="help-block">Will be CC on invoices and bills</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Accounts Paybles Email:</label>
                                    <div class="col-sm-10 input-group">
                                    <span class="input-group-addon">
                                        <input id="accts_payables_verified" name="accts_payables_verified" type="checkbox" class="i-checks" value="<?php echo $row_findsys_dealer['accts_payables_verified']; ?>" <?php if($row_findsys_dealer['accts_payables_verified'] == 1){ echo "checked='checked'"; } ?>>
                                    </span>
                                        <input id="accts_payables_email" name="accts_payables_email" type="text" class="form-control" placeholder="" value="<?php echo $row_findsys_dealer['accts_payables_email']; ?>">
                                        <span class="help-block">Will be CC on invoices and bills</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>








                                </div>


                                <div class="tab-pane" id="tab-3">
                                	<h2>Financial Information</h2>

                                <div class="form-group"><label class="col-sm-2 control-label">Currency Accepted:</label>

                                    <div class="col-sm-10">
									<select class="form-control m-b" id="settingCurrency" name="settingCurrency">
                                        <option value="USD" selected="selected">USD</option>
                                    </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>









                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>

                                </div>

                                <div class="tab-pane" id="tab-4">
                                	<h2>Notification Settings</h2>







                                </div>
                                <div class="tab-pane" id="tab-5">
                                	<h2>Widget Activation</h2>












                                </div><!-- End tab-5 -->
                               </div><!-- End tab-contnet -->



                                </div>
								</div>


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
                        <h5>Notes On The Account</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="form-horizontal">

<div class="form-group">
                        <textarea id="sysdlr_lognote_body" cols="5" rows="5" class="form-control"></textarea>

</div>

                                <div class="hr-line-dashed"></div>



							<button id="log_sys_dlrnote" type="button" class="ladda-button ladda-button-demo btn btn-primary btn-lg btn-rounded" data-style="zoom-in">Submit Note</button>

                                <div class="hr-line-dashed"></div>
<div class="row">
                        <h3>Notes As A System Dealer</h3>

                        <div id="log_sysdlrnotes_results" class="col-md-12">


                            <ul class="sortable-list connectList agile-list" id="completed">

        <?php do { ?>
                                <li class="info-element" id="task<?php echo $row_qrydlr_notes['dudes_dlr_notes_id']; ?>">
                                    <?php echo $row_qrydlr_notes['dudes_dlr_notes_body']; ?>
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white"><?php echo $row_qrydlr_notes['dudes_dlr_notes_dude_name']; ?></a>
                                        <i class="fa fa-clock-o"></i> <?php echo $row_qrydlr_notes['dudes_dlr_notes_created_at']; ?>
                                    </div>
                                </li>
        <?php } while ($row_qrydlr_notes = mysqli_fetch_array($qrydlr_notes)); ?>
        					</ul>












                        </div>
                       </div>

<div class="row">
                        <h3>Notes When This Dealer Was A Prospect</h3>

                        <div id="log_notes_results" class="col-md-12">


                            <ul class="sortable-list connectList agile-list" id="completed">

        <?php do { ?>
                                <li class="info-element" id="task<?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_id']; ?>">
                                    <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_body']; ?>
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white"><?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_dude_name']; ?></a>
                                        <i class="fa fa-clock-o"></i> <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_created_at']; ?>
                                    </div>
                                </li>
        <?php } while ($row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes)); ?>
        					</ul>












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
                        <h5>Save Account Information</h5>
                    </div>
                    <div class="ibox-content" align="center">





							<button id="save_account_settings" class="ladda-button ladda-button-demo btn btn-primary btn-lg btn-rounded" data-style="zoom-in">Save Account Information</button>




                    </div>
                </div>
            	</div>
            </div>









        <?php include("_footer.php"); ?>

        </div><!-- End wrapper wrapper-content animated fadeInRight -->

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <!-- Ladda -->
    <script src="js/plugins/ladda/spin.min.js"></script>
    <script src="js/plugins/ladda/ladda.min.js"></script>
    <script src="js/plugins/ladda/ladda.jquery.min.js"></script>

	<script src="js/custom/page/custom.inventory.create.js"></script>
	<script type="text/javascript" src="js/custom/global-billing.js" language="javascript"  /></script>

   	<script src="js/custom/page/custom.sysdealer.js"></script>
<script src="js/custom/google/goog_map.pullmap_dlract.js"></script>

<script type="text/javascript" language="javascript" class="init">

		$(document).ready(function() {

			$('#mydataTable').dataTable({
				"scrollX": true,
				"scrollCollapse": true,
				"paging":         true
			});
			$('#mydataInvoiceTable').dataTable({
				"scrollX": true,
				"scrollCollapse": true,
				"paging":         true
			});


		} );

</script>

<script src="js/plugins/dropzone/dropzone.js"></script>
<script src="js/custom/page/dropzone.systemdlrvehicleuploads.js"></script>

    <script>
        $(document).ready(function(){
			// https://bootstrap-datepicker.readthedocs.io/en/stable/options.html#format

            $('#recurring_data_invoice_creationdate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });



            $('#recurring_data_invoice_duedate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#recurring_data_invoice_stopdate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });



            $('#data_duedate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });


            $('#data_startdate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });






		});
	</script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>

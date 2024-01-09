<?php require_once('db_admin.php'); ?>
<?php



$query_query_recurringInvoices = "
SELECT * FROM
    `idsids_idsdms`.`ids_toinvoices_recurring`
    LEFT JOIN `idsids_idsdms`.`dealers`
    ON `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`
WHERE
    `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`
    GROUP BY
        `ids_toinvoices_recurring`.`invoice_id`
ORDER BY
    `ids_toinvoices_recurring`.`invoice_status` ASC, `ids_toinvoices_recurring`.`invoice_id` DESC";
$query_recurringInvoices = mysqli_query($idsconnection_mysqli, $query_query_recurringInvoices);
$row_recurringInvoices = mysqli_fetch_array($query_recurringInvoices);
$totalRows_query_recurringInvoices = mysqli_num_rows($query_recurringInvoices);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoices = "
SELECT *
FROM
`idsids_idsdms`.`ids_toinvoices`
    LEFT JOIN `idsids_idsdms`.`dealers`
    ON `ids_toinvoices`.`invoice_dealerid` = `dealers`.`id`
     WHERE
     `ids_toinvoices`.`payment_status` = 'UnPaid'
     AND
     `ids_toinvoices`.`invoice_status` = 'Active'
     AND
     `ids_toinvoices`.`payment_status`
     NOT IN ('Paid')
     GROUP BY
    `ids_toinvoices`.`invoice_id`
    ORDER BY
    `ids_toinvoices`.`invoice_created_at` DESC
";
$inVoices = mysqli_query($idsconnection_mysqli, $query_inVoices);
$row_inVoices = mysqli_fetch_array($inVoices);
$totalRows_inVoices = mysqli_num_rows($inVoices);



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoicespymts = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices` WHERE `ids_toinvoices`.`payment_status` = 'Paid' AND `ids_toinvoices`.`invoice_status` = 'Active' AND `ids_toinvoices`.`payment_status` NOT IN ('UnPaid') ORDER BY `invoice_created_at` DESC";
$inVoicespymts = mysqli_query($idsconnection_mysqli, $query_inVoicespymts);
$row_inVoicespymts = mysqli_fetch_array($inVoicespymts);
$totalRows_inVoicespymts = mysqli_num_rows($inVoicespymts);



$system_dealerid = '-1';
$colname_queryInvoice = "-1";
$inject_sql='';
if (isset($_GET['system_dealerid'])) {
  $colname_queryInvoice = $_GET['system_dealerid'];
  $system_dealerid = $_GET['system_dealerid'];
  $inject_sql .= " AND `ids_toinvoices_recurring`.`invoice_dealerid` = '$colname_queryInvoice' ";
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_recurringInvoice =  "
SELECT * FROM
    `idsids_idsdms`.`ids_toinvoices_recurring`
LEFT JOIN
    `idsids_idsdms`.`dealers`
ON
    `ids_toinvoices_recurring`.`invoice_dealerid` = `dealers`.`id`

WHERE
     `ids_toinvoices_recurring`.`invoice_tokenid` IS NOT NULL

    GROUP BY
    `ids_toinvoices_recurring`.`invoice_id`
ORDER BY
    `ids_toinvoices_recurring`.`invoice_id` DESC
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



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM `idsids_idsdms`.`ids_fees` ORDER BY `ids_fees`.`fee_type` ASC ";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);



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
                <h2>Pure Billing</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">New Billing</a>
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
                        <h5>Start Invoicing Master Template Reoccuring Billing. <small>Automatic Invoicing</small></h5>
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
                        <h5>Active Charges Live Invoices Dealers Billing <small>Dealers Invoices and Invoice History</small></h5>
                    </div>
                    <div class="ibox-content">





                     <?php require_once("views/body.invoice.create.php"); ?>





                    </div>
                </div>
              </div>
            </div>









        </div><!-- End wrapper wrapper-content animated fadeInRight -->














        <?php include("_footer.php"); ?>

        </div>
        </div>
	</div><!-- End wrapper -->


    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>





<script type="text/javascript" src="js/custom/global-billing.js" language="javascript"  /></script>
<script type="text/javascript" src="js/custom/global-billing-taxcal.js" language="javascript"  /></script>
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



            //


            $('#recurring_data_invoice_duedate .input-group.date').datepicker({
                todayBtn: "linked",
				format: 'yyyy-mm-dd',
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#edit_recurring_invoice_stopdate .input-group.date').datepicker({
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

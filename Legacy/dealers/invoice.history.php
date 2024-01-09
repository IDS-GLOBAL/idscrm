<?php require_once("db_loggedin.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoices = "SELECT * FROM ids_toinvoices WHERE invoice_dealerid = '$did' AND ids_toinvoices.payment_status = 'Paid' ORDER BY invoice_number DESC,invoice_created_at ASC";
$inVoices = mysqli_query($idsconnection_mysqli, $query_inVoices);
$row_inVoices = mysqli_fetch_assoc($inVoices);
$totalRows_inVoices = mysqli_num_rows($inVoices);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_reoccuringinVoices = "SELECT * FROM ids_toinvoices WHERE invoice_dealerid = '$did'";
$reoccuringinVoices = mysqli_query($idsconnection_mysqli, $query_reoccuringinVoices);
$row_reoccuringinVoices = mysqli_fetch_assoc($reoccuringinVoices);
$totalRows_reoccuringinVoices = mysqli_num_rows($reoccuringinVoices);


function daysLate ($latedate){

//$nowdate = '07/15/2013';
$nowdate = date('Y-m-d');
$startme = strtotime("$nowdate");
$endme = strtotime("$latedate");

$days_between = ceil(abs($endme - $startme) / 86400);
	
	if("$startme" >= "$endme"){
	echo $days_between;
	}else{
		echo '0';
	}

}




?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Invoice History: <?php echo $row_userDets['company']; ?></title>

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
                    <h2>Payments</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                        	<a href="invoices.php">Invoices</a>
                        </li>
                        <li class="active">
                        	<a href="invoice.history.php">Payment History</a>
                        </li>
                        <li>
                        	<a href="invoice.transactions.php">Transaction Ledger</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        
        <div class="ibox-content m-b-sm border-bottom">
        	<div class="row">
            	<div class="col-md-6">
                
                <a href="invoices.php" class="btn btn-block btn-outline btn-warning">Invoices</a>
                </div>
            	<div class="col-md-6">
                <a class="btn btn-block btn-outline btn-primary">Payments</a>
                                
                </div>
            </div>
        </div>
        
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Invoice History <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th title="Invoice Number:">Invoice Number:</th>
                                    <th title="Status:">Status:</th>
                                    <th title="Payment Status:">Payment Status:</th>
                                    <th title="View Invoice:">View Invoice</th>
                                    <th title="Amount Due:">Amount Paid:</th>
                                    <th title="Invoice Due:">Due Date:</th>
                                    <th title="Invoice Due:">Days Late:</th>
                                    <th title="Options:"style="width:128px">Options:</th> 
                                </tr> 
                    </thead>
                    <tbody>

                        
                          <?php if($totalRows_inVoices != 0): do { ?>
                           <?php 
							$invoiceID = $row_inVoices['invoice_id'];
							$invoiceToken = $row_inVoices['invoice_tokenid'];
							$latedate = $row_inVoices['invoice_duedate'];
							//$unixtime =$row_inVoices['invoice_duedate'];
							$invoice_amount_due = $row_inVoices['invoice_amount_due'];
							$invoice_amount_due = formatMoney($invoice_amount_due , true);    //Actual Cash Value of Trade

							?>

    
  


                    <tr class="gradeX">
                                <td class="center"><input type="checkbox" value="2" name="list" class="checkbox"/></td>
                                <td>
                                

                                  <a href="invoice.php?invoice_token=<?php echo $invoiceToken; ?>&amp;id=<?php echo $row_inVoices['invoice_id']; ?>" title="View Invoice" target="_parent"><?php echo $row_inVoices['invoice_number']; ?></a></td>
                                <td><a href="invoice.php?invoice_token=<?php echo $invoiceToken; ?>&id=<?php echo $row_inVoices['invoice_id']; ?>"><?php echo $row_inVoices['invoice_status']; ?></a></td>
                                <td><a href="invoice.php?invoice_token=<?php echo $invoiceToken; ?>&id=<?php echo $row_inVoices['invoice_id']; ?>"><?php echo $row_inVoices['payment_status']; ?></a></td>
                                <td><a href="invoice.php?invoice_token=<?php echo $invoiceToken; ?>&id=<?php echo $row_inVoices['invoice_id']; ?>">View Invoice</a> / <a href="invoice-print.php?invoice_token=<?php echo $invoiceToken; ?>&amp;id=<?php echo $row_inVoices['invoice_id']; ?>" title="View PDF" target="_blank">Print</a></td>
                                <td><a href="invoice.php?invoice_token=<?php echo $invoiceToken; ?>&amp;id=<?php echo $row_inVoices['invoice_id']; ?>"><?php echo '$ '.$invoice_amount_due; ?></a></td>
                                <td><a href="invoice.php?invoice_token=<?php echo $invoiceToken; ?>&id=<?php echo $row_inVoices['invoice_id']; ?>"><?php echo date("m/d/Y",  strtotime($row_inVoices['invoice_duedate'])); 
 ?></a></td>
                                <td>
<a href="invoice.php?invoice_token=<?php echo $invoiceToken; ?>&amp;id=<?php echo $row_inVoices['invoice_id']; ?>">
<?php                                
//strtotime("$latedate");

echo daysLate($latedate);			
?>
                   </a>             
                                
                                </td>
                                <td>
                            
                  <a class="btn btn-primary" title="Pay This Invoice" href="invoice.php?invoice_token=<?php echo $invoiceToken; ?>&amp;id=<?php echo $row_inVoices['invoice_id']; ?>">
                   View
                  </a>                                
                                
                                
                  <input type="hidden" name="id" value="" />
                                </td>
                              </tr>

<?php } while ($row_inVoices = mysqli_fetch_assoc($inVoices)); endif; ?>
  
                    </tbody>
                    <tfoot>
                          <tr>
                            <td class="center"></td>
                                    <th title="Invoice Number:">Invoice Number:</th>
                                    <th title="Status:">Status:</th>
                                    <th title="Payment Status:">Payment Status:</th>
                                    <th title="View Invoice:">View Invoice</th>
                                    <th title="Amount Due:">Amount Due:</th>
                                    <th title="Invoice Due:">Due Date:</th>
                                    <th title="Invoice Due:">Days Late:</th>
                                    <th title="Options:"style="width:128px">Options:</th> 
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
	<?php include("inc.end.body.php"); ?>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable();
		});
    </script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
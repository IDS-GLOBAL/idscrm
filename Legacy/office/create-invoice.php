<?php require_once('../Connections/idsconnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Usernamemobi'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Usernamemobi'], $_SESSION['MM_UserGroupmobi'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php



$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "invoiceBody")) {
  $insertSQL =  sprintf("INSERT INTO ids_toinvoices (invoice_typeid, invoice_number, invoice_tokenid, invoice_dealerid, invoice_status, invoice_date, invoice_duedate, invoice_sendtoclient, invoice_currency, fee_id1, lineitem1, fee_description1, quantity1, fee_price1, fee_amount1, tax1, fee_id2, lineitem2, fee_description2, quantity2, fee_price2, fee_amount2, tax2, fee_id3, lineitem3, fee_description3, quantity3, fee_price3, fee_amount3, tax3, fee_id4, lineitem4, fee_description4, quantity4, fee_price4, fee_amount4, tax4, fee_id5, lineitem5, fee_description5, quantity5, fee_price5, fee_amount5, tax5, fee_id6, lineitem6, fee_description6, quantity6, fee_price6, fee_amount6, tax6, fee_id7, lineitem7, fee_description7, quantity7, fee_price7, fee_amount7, tax7, fee_id8, lineitem8, fee_description8, quantity8, fee_price8, fee_amount8, tax8, fee_id9, lineitem9, fee_description9, quantity9, fee_price9, fee_amount9, tax9, fee_id10, lineitem10, fee_description10, quantity10, fee_price10, fee_amount10, tax10, fee_id11, lineitem11, fee_description11, quantity11, fee_price11, fee_amount11, tax11, fee_id12, lineitem12, fee_description12, quantity12, fee_price12, fee_amount12, tax12, fee_id13, lineitem13, fee_description13, quantity13, fee_price13, fee_amount13, tax13, fee_id14, lineitem14, fee_description14, quantity14, fee_price14, fee_amount14, tax14, fee_id15, lineitem15, fee_description15, quantity15, fee_price15, fee_amount15, tax15, sales_taxrate, invoice_subtotal, invoice_comments, invoice_taxtotal, invoice_total, applied_payment, invoice_amount_due, payment_status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['invoice_typeid'], "int"),
                       GetSQLValueString($_POST['invoice_number'], "int"),
                       GetSQLValueString($_POST['invoice_tokenid'], "text"),
                       GetSQLValueString($_POST['invoice_dealerid'], "int"),
                       GetSQLValueString($_POST['invoice_status'], "text"),
                       GetSQLValueString($_POST['invoice_date'], "text"),
                       GetSQLValueString($_POST['invoice_duedate'], "text"),
                       GetSQLValueString(isset($_POST['invoice_sendtoclient']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['invoice_currency'], "int"),
                       GetSQLValueString($_POST['fee_id1'], "int"),
                       GetSQLValueString($_POST['lineitem1'], "int"),
                       GetSQLValueString($_POST['fee_description1'], "text"),
                       GetSQLValueString($_POST['quantity1'], "int"),
                       GetSQLValueString($_POST['fee_price1'], "text"),
                       GetSQLValueString($_POST['fee_amount1'], "text"),
                       GetSQLValueString(isset($_POST['tax1']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id2'], "int"),
                       GetSQLValueString($_POST['lineitem2'], "text"),
                       GetSQLValueString($_POST['fee_description2'], "text"),
                       GetSQLValueString($_POST['quantity2'], "int"),
                       GetSQLValueString($_POST['fee_price2'], "text"),
                       GetSQLValueString($_POST['fee_amount2'], "text"),
                       GetSQLValueString(isset($_POST['tax2']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id3'], "int"),
                       GetSQLValueString($_POST['lineitem3'], "int"),
                       GetSQLValueString($_POST['fee_description3'], "text"),
                       GetSQLValueString($_POST['quantity3'], "int"),
                       GetSQLValueString($_POST['fee_price3'], "text"),
                       GetSQLValueString($_POST['fee_amount3'], "text"),
                       GetSQLValueString(isset($_POST['tax3']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id4'], "int"),
                       GetSQLValueString($_POST['lineitem4'], "int"),
                       GetSQLValueString($_POST['fee_description4'], "text"),
                       GetSQLValueString($_POST['quantity4'], "text"),
                       GetSQLValueString($_POST['fee_price4'], "text"),
                       GetSQLValueString($_POST['fee_amount4'], "text"),
                       GetSQLValueString(isset($_POST['tax4']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id5'], "int"),
                       GetSQLValueString($_POST['lineitem5'], "int"),
                       GetSQLValueString($_POST['fee_description5'], "text"),
                       GetSQLValueString($_POST['quantity5'], "int"),
                       GetSQLValueString($_POST['fee_price5'], "text"),
                       GetSQLValueString($_POST['fee_amount5'], "text"),
                       GetSQLValueString(isset($_POST['tax5']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id6'], "int"),
                       GetSQLValueString($_POST['lineitem6'], "int"),
                       GetSQLValueString($_POST['fee_description6'], "text"),
                       GetSQLValueString($_POST['quantity6'], "int"),
                       GetSQLValueString($_POST['fee_price6'], "text"),
                       GetSQLValueString($_POST['fee_amount6'], "text"),
                       GetSQLValueString(isset($_POST['tax6']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id7'], "int"),
                       GetSQLValueString($_POST['lineitem7'], "int"),
                       GetSQLValueString($_POST['fee_description7'], "text"),
                       GetSQLValueString($_POST['quantity7'], "int"),
                       GetSQLValueString($_POST['fee_price7'], "text"),
                       GetSQLValueString($_POST['fee_amount7'], "text"),
                       GetSQLValueString(isset($_POST['tax7']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id8'], "int"),
                       GetSQLValueString($_POST['lineitem8'], "int"),
                       GetSQLValueString($_POST['fee_description8'], "text"),
                       GetSQLValueString($_POST['quantity8'], "int"),
                       GetSQLValueString($_POST['fee_price8'], "text"),
                       GetSQLValueString($_POST['fee_amount8'], "text"),
                       GetSQLValueString(isset($_POST['tax8']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id9'], "int"),
                       GetSQLValueString($_POST['lineitem9'], "int"),
                       GetSQLValueString($_POST['fee_description9'], "text"),
                       GetSQLValueString($_POST['quantity9'], "int"),
                       GetSQLValueString($_POST['fee_price9'], "text"),
                       GetSQLValueString($_POST['fee_amount9'], "text"),
                       GetSQLValueString(isset($_POST['tax9']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id10'], "int"),
                       GetSQLValueString($_POST['lineitem10'], "int"),
                       GetSQLValueString($_POST['fee_description10'], "text"),
                       GetSQLValueString($_POST['quantity10'], "int"),
                       GetSQLValueString($_POST['fee_price10'], "text"),
                       GetSQLValueString($_POST['fee_amount10'], "text"),
                       GetSQLValueString(isset($_POST['tax10']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id11'], "int"),
                       GetSQLValueString($_POST['lineitem11'], "int"),
                       GetSQLValueString($_POST['fee_description11'], "text"),
                       GetSQLValueString($_POST['quantity11'], "int"),
                       GetSQLValueString($_POST['fee_price11'], "text"),
                       GetSQLValueString($_POST['fee_amount11'], "text"),
                       GetSQLValueString(isset($_POST['tax11']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id12'], "int"),
                       GetSQLValueString($_POST['lineitem12'], "int"),
                       GetSQLValueString($_POST['fee_description12'], "text"),
                       GetSQLValueString($_POST['quantity12'], "int"),
                       GetSQLValueString($_POST['fee_price12'], "text"),
                       GetSQLValueString($_POST['fee_amount12'], "text"),
                       GetSQLValueString(isset($_POST['tax12']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id13'], "int"),
                       GetSQLValueString($_POST['lineitem13'], "int"),
                       GetSQLValueString($_POST['fee_description13'], "text"),
                       GetSQLValueString($_POST['quantity13'], "int"),
                       GetSQLValueString($_POST['fee_price13'], "text"),
                       GetSQLValueString($_POST['fee_amount13'], "text"),
                       GetSQLValueString(isset($_POST['tax13']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id14'], "int"),
                       GetSQLValueString($_POST['lineitem14'], "int"),
                       GetSQLValueString($_POST['fee_description14'], "text"),
                       GetSQLValueString($_POST['quantity14'], "int"),
                       GetSQLValueString($_POST['fee_price14'], "text"),
                       GetSQLValueString($_POST['fee_amount14'], "text"),
                       GetSQLValueString(isset($_POST['tax14']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['fee_id15'], "int"),
                       GetSQLValueString($_POST['lineitem15'], "int"),
                       GetSQLValueString($_POST['fee_description15'], "text"),
                       GetSQLValueString($_POST['quantity15'], "int"),
                       GetSQLValueString($_POST['fee_price15'], "text"),
                       GetSQLValueString($_POST['fee_amount15'], "text"),
                       GetSQLValueString(isset($_POST['tax15']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['sales_taxrate'], "text"),
                       GetSQLValueString($_POST['invoice_subtotal'], "text"),
                       GetSQLValueString($_POST['invoice_comments'], "text"),
                       GetSQLValueString($_POST['invoice_taxtotal'], "text"),
                       GetSQLValueString($_POST['invoice_total'], "text"),
                       GetSQLValueString($_POST['applied_payment'], "text"),
                       GetSQLValueString($_POST['invoice_amount_due'], "text"),
                       GetSQLValueString($_POST['payment_status'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script_create_invoice.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $insertGoTo);
}

$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM dudes WHERE dudes_username = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM ticket_submit_dlr";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_selectDealer = "SELECT id, company, website, status FROM dealers ORDER BY company ASC";
$selectDealer = mysqli_query($idsconnection_mysqli, $query_selectDealer);
$row_selectDealer = mysqli_fetch_array($selectDealer);
$totalRows_selectDealer = mysqli_num_rows($selectDealer);

$colname_queryDealer = "-1";
if (isset($_GET['id'])) {
  $colname_queryDealer = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDealer =  "SELECT * FROM dealers WHERE id = '$colname_queryDealer'";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);
$did = $row_queryDealer['id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM ids_fees";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastInvcNum = "SELECT * FROM ids_toinvoices WHERE invoice_dealerid = '$did' ORDER BY invoice_number DESC";
$lastInvcNum = mysqli_query($idsconnection_mysqli, $query_lastInvcNum);
$row_lastInvcNum = mysqli_fetch_array($lastInvcNum);
$totalRows_lastInvcNum = mysqli_num_rows($lastInvcNum);
?>
<?php

//include("../Libary/token-generator.php");
include('../Libary/function_Datetime_Now.php');


        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records


$lastinvoiceno = $row_lastInvcNum['invoice_number'];

//$lastdealno = $row_lastDlrdeal['deal_number'];

if(!$lastinvoiceno){
	$lastinvoiceno = 1;
}else{
	$lastinvoiceno = ($lastinvoiceno + 1);
}



?>
<?php
$mylimit = '15';  // Maximum number value to be set here

$i = '1';

 $itemline = "<table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'><input type='text' name='fee_description' id='fee_description' size='25' value='' /></td>
				<td><input name='quantity' type='text' id='quantity' size='4' /></td>
				<td><input name='fee_price' type='text' id='fee_price' size='4' /></td>
				<td><input name='fee_amount' type='text' id='fee_amount' size='4' /></td>
				<td><input name='utc1' id='utc2' type='checkbox' class='utc' /></td>
			  </tr>
			</table>";



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing | Create Invoice</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      numberOfMonths: 1,
      showButtonPanel: true
    });
  });

  $(function() {
    $( "#datepicker2" ).datepicker({
      numberOfMonths: 3,
      showButtonPanel: true
    });
  });

</script>

<script type="text/javascript">

function sumQty() {

<?php
		for($h=1; $h<=$mylimit; $h++){
		//for($h=1; $h<=$i; $h++){
			
			echo "var amount = document.invoiceBody.fee_price$h.value;
			";
			
			echo "if(!amount){  }else{  
			";
			
			echo "var qty$h = document.invoiceBody.quantity$h.value; 
			";
			echo "var feeprice$h = document.invoiceBody.fee_price$h.value; 
			";
			
			echo "var qtyvalue$h = (feeprice$h -0) * (qty$h -0); 
			";			
			
			echo "document.invoiceBody.fee_amount$h.value = qtyvalue$h.toFixed(2);}
			
			";			
			//echo "alert(line$j);";
		}
?>
}

function sumTaxes() {

//checked="CHECKED"
//var checked = document.invoiceBody.tax1.value;

var thetaxRate = document.invoiceBody.sales_taxrate.value;

<?php
	for($t=1; $t<=$mylimit; $t++){ 
	
	echo "	if(document.getElementById('tax$t').checked == true){
			
			var taxfeeamount$t = document.invoiceBody.fee_amount$t.value;
			
			var taxit$t = (taxfeeamount$t /100) * thetaxRate;
			
			}else {
			
			var taxit$t = 0.00;

			
			}
			";

}
?>
<?php
		echo "var AllTaxes = "; 

		for($k=1; $k<=$mylimit; $k++){

		$keep = ' + ';
		$stop = ';';
		echo "(taxit$k -0)";
		
		if($k == $mylimit){echo $stop;}else{
			echo $keep;
			}
		}

?>

document.invoiceBody.invoice_taxtotal.value = AllTaxes.toFixed(2);
//alert(AllTaxes);


}

function sumForm() {
	
sumQty();

sumTaxes();
<?php

		
		for($j=1; $j<=$mylimit; $j++){
			echo " var line$j = document.invoiceBody.fee_amount$j.value; 
			";
			//echo "alert(line$j);";
		}
		
		echo "var totallines = "; 

		for($k=1; $k<=$mylimit; $k++){

		$bar = ' + ';
		$end = ';';
		echo "(line$k -0)";
		
		if($k == 15){echo $end;}else{
			echo $bar;
			}
		}

?>
//alert(line1);

//alert(totallines);



document.invoiceBody.invoice_subtotal.value = totallines.toFixed(2);

var invoice_subtotal = document.invoiceBody.invoice_subtotal.value;

var invoice_taxtotal = document.invoiceBody.invoice_taxtotal.value;

var invoice_wtaxes = (invoice_subtotal -0) + (invoice_taxtotal -0);

//var sales_taxrate = document.invoiceBody.sales_taxrate.value;
//var invoice_tax = (invoice_subtotal / 100) * sales_taxrate;

//var invoice_taxtotal = (invoice_tax -0) + (invoice_subtotal -0);
document.invoiceBody.invoice_total.value = invoice_wtaxes.toFixed(2);




var applied_payment = document.invoiceBody.applied_payment.value;

if(!applied_payment){

	var applied_payment = '0.00';
}

var invoice_amount_due = (invoice_wtaxes -0) - (applied_payment -0);

document.invoiceBody.invoice_amount_due.value = invoice_amount_due.toFixed(2);

}


</script>


<script>
<?php

		for($i=1; $i<=$mylimit; $i++){
		



echo "
function showFee$i(str)

{

if (str=='')

  {

  document.getElementById('lineitem$i').innerHTML='';

  return;

  } 

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById('lineitem$i').innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open('GET','ajaxEnviro/ajax_getlineitem.php?invoiceToken=$tkey&lineitem=$i&fee_id='+str,true);

xmlhttp.send();

}
";


} 




?>




function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>

<!-- END Vehicle Ajax Script -->


</head>
<body>


<div class="container">

  <!-- HEADER -->
  
  <?php include('parts/header.php'); ?>

  <!-- CONTENT -->
  
  
  
  
  
  <div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
      
      
      
<div class="leftblock vertsortable">
      
      
      
        <!-- gadget left 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Quick contact form</h3>
          </div>
          <div class="gadget_content">

            <div class="subblock">
              <form action="" method="post" name="form_quickcontact" id="form_quickcontact" class="form_quickcontact">
              <ol>
              invoice_tokenid
              
              <li>
              
                <label for="">Token ID:</label>
                <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,1)">
                  <option value="?id=" <?php if (!(strcmp("?id=", $row_queryDealer['id']))) {echo "selected=\"selected\"";} ?>>Select Dealer</option>
                  <?php
do {  
?>
                  <option value="?id=<?php echo $row_selectDealer['id']?>"<?php if (!(strcmp($row_selectDealer['id'], $row_queryDealer['id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_selectDealer['company']?></option>
                  <?php
} while ($row_selectDealer = mysqli_fetch_array($selectDealer));
  $rows = mysqli_num_rows($selectDealer);
  if($rows > 0) {
      mysqli_data_seek($selectDealer, 0);
	  $row_selectDealer = mysqli_fetch_array($selectDealer);
  }
?>
                </select>
                <div class="clr"></div>
              </li>
              
              <li>
              
                <label for="invoice_tokenid">Token ID:</label>
                <input name="invoice_tokenid" class="text" id="invoice_tokenid" value="<?php echo $tkey; ?>" />
                <div class="clr"></div>
              </li>
              
              <li>
              
                <label for="invoice_dealerid">invoice_dealerid</label>
                <input name="invoice_dealerid" class="text" id="invoice_dealerid" value="<?php echo $did; ?>" />
                <div class="clr"></div>
              </li>
              
              
              
              <li>
              
                <label for="name">Your name:</label>
                <input id="name" name="name" class="text" />
                <div class="clr"></div>
              </li><li>
                <label for="email">Your contact email:</label>
                <input id="email" name="email" class="text" />
                <div class="clr"></div>
              </li><li>
                <label for="message">Your questons &amp; comments:</label>
                <textarea id="message" name="message" rows="6" cols="50"></textarea>
                <div class="clr"></div>
              </li><li>
                <a href="#" class="gradient37">Contact us now</a>
                <!-- <input type="image" name="imageField" id="imageField" src="images/button_send.gif" class="send" /> -->
                <div class="clr"></div>
              </li></ol>
              </form>
            </div>
          </div>
        </div>


        <!-- gadget left 1 
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Date &amp; Mail</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <!-- Datepicker 
              <div id="datepicker"></div>
              <div class="clr"></div>
              <p>&nbsp;&nbsp;<a href="#" class="gradient37">+  Add Event</a>&nbsp;&nbsp;<a href="#" class="gradient37">List Events</a></p>
            </div>
          </div>
        </div>
		
        -->-->
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_content">
            <div class="subblock">
              <a href="#"><img src="images/icon_l1.gif" alt="picture" width="32" height="26" class="leftimg" /></a>
              <p class="msg_cnt">12</p><p class="msg_lnk"><a href="#"><strong>Messages &raquo;</strong></a></p>
            </div>
          </div>
        </div>

        <!-- gadget left 3 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Dashboard</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <ul class="grayarrow withlines">
                <li class="first"><a href="#">Admin area example</a></li>
                <li><a href="#">Forms and fields area example</a></li>
                <li class="last"><a href="#">Tables area example</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- gadget left 4 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>News of the day</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <a href="#"><img src="images/icon_l2.gif" alt="picture" width="32" height="26" class="leftimg" /></a>
              <h4 class="big">Notice</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting<br /><a href="#"><strong>Learn More &raquo;</strong></a></p>
            </div>
          </div>
        </div>



      
      
      
      
      <?php //include('parts/modules/invoice-left-module.php'); ?>
      
</div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

<form action="<?php echo $editFormAction; ?>" method="POST" name="invoiceBody" id="invoiceBody" >
        <!-- gadget left 1 -->
        
        <div class="gadget">
        
        	<?php include("parts/navigation/billing-invoice-navigation.php"); ?>
        
        </div>


        <!-- gadget left 1 -->
        <?php if ($totalRows_queryDealer > 0) { // Show if recordset not empty ?>
  <div class="gadget">
    <div class="gadget_title gradient37 vertsortable_head">
      <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
      <h3>Invoice Details</h3>
      </div>
    <div class="gadget_content">
      <div class="subblock">
      
              <!-- form action="" method="post" id="invoiceBody" -->
      
        <p>This Here Is Your Latest Invoices Including Previous Balances, Credits For This Dealer | <a href="invoice-print.php" target="_blank">PDF Invoice.</a></p>
        <table width="100%" border="0" cellspacing="3" cellpadding="3" class="gwlines">
          <tr>
            <th>Invoice Number:</th>
            <th>
                        	<input name="invoice_number" type="text" class="em_blue" value="<?php echo $lastinvoiceno; ?>" />

                <input type="hidden" name="invoice_tokenid" class="text" id="invoice_tokenid" value="<?php echo $tkey; ?>" />
                <input type="hidden" name="invoice_dealerid" class="text" id="invoice_dealerid" value="<?php echo $did; ?>" />

                <input name="invoice_typeid" type="hidden" id="invoice_typeid" value="1" /></th>
            </tr>
          <tr>
            <th>Invoice Date: <?php $nowdate = date('m/d/Y'); ?></th>
            <th><input name="invoice_date" id="datepicker" type="text" value="<?php echo $nowdate; ?>" /> <a href="#">Calendar</a></th>
            </tr>
          <tr>
            <th>Due Date:</th>
            <th><input name="invoice_duedate" id="datepicker2" type="text"  value="<?php echo $nowdate; ?>" /> <a href="#">Calendar</a></th>
            </tr>
          <tr>
            <th>Status</th>
            <th><select name="invoice_status" id="invoice_status">
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
              <option value="OnHold">OnHold</option>
              </select></th>
            </tr>
          <tr>
            <th>Send To Client</th>
            <th><input name="invoice_sendtoclient" type="checkbox" id="invoice_sendtoclient" value="" /></th>
            </tr>
          
          </table>
        

        
        </div>
      
      </div>
  </div>
<!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Add Items Add Discounts | Select Currency: <select name="invoice_currency" id="invoice_currency">
              <option value="USD">USD</option>
                </select></h3>
          </div>
          <div class="gadget_content">
          <div id="currency_select">
                
              </div>
            <div class="subblock">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines2">
              <tr>
                <th width="60px">Actions</th>
                <th width="220px">Fee Select </th>
                <th width="180px">&amp; Description </th>
                <th width="80px">Qty.</th>
                <th width="90px">Price</th>
                <th width="52px">Total</th>
                <th>Taxable</th>
              </tr>
              
				<?php include("parts/invoice-line-items.php"); ?>
                
                
              </table>
            </div>
          </div>
        </div>

        
        
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Create Invoice Below</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
            
            <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <th scope="row">Comments: Visible To Client</th>
    <th scope="row">Sub-Total</th>
    <td><input name="invoice_subtotal" type="text" id="invoice_subtotal" readonly="readonly" /></td>
  </tr>
  <tr>
    <th rowspan="5" scope="row">
    
    	<textarea id="invoice_comments" name="invoice_comments" rows="6" cols="50"></textarea>
    
    </th>
    <th scope="row">Sales Tax
      <input name="sales_taxrate" type="text" id="sales_taxrate" size="1" value="7.0" onchange='sumForm()' />
      %</th>
    <td><input name="invoice_taxtotal" type="text" id="invoice_taxtotal" readonly="readonly" /></td>
  </tr>
  <tr>
    <th scope="row">Total</th>
    <td><input name="invoice_total" type="text" id="invoice_total" readonly="readonly" /></td>
  </tr>
  <tr>
    <th scope="row">Apply Payment</th>
    <td><input type="text" name="applied_payment" id="applied_payment" onchange="sumForm()" /></td>
  </tr>
  <tr>
    <th scope="row">Amount Due</th>
    <td><input name="invoice_amount_due" type="text" id="invoice_amount_due" readonly="readonly" /></td>
  </tr>
  <tr>
    <th scope="row"><input type="button"  value="Calculate" onclick='sumForm()' /></th>
    <td>
    <input name="submit" type="submit" value="Create Invoice" />
    <?php $nowdate = date('m/d/Y'); ?>
    <input name="invoice_harddatetime" type="hidden" id="invoice_harddatetime" value="<?php echo $nowdate; ?>" />
      <input name="payment_status" type="hidden" id="payment_status" value="UnPaid" /></td>
  </tr>
</table>

            
              
            
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>
        <input type="hidden" name="MM_insert" value="invoiceBody" />
</form>
        
          <?php } // Show if recordset not empty ?>

      </div>

      <div class="clr"></div>
    </div>
  </div>
  
  
  <?php //include('parts/content-form-billing.php'); ?>
  
  <!-- FOOTER -->
  
  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>
  
</div>



</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($DlrTickets);

mysqli_free_result($selectDealer);

mysqli_free_result($queryDealer);

mysqli_free_result($fees);

mysqli_free_result($lastInvcNum);
?>
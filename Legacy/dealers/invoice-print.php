<?php require_once('../Connections/idsconnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
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


$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `email` = %s";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere

$colname_dlrSlctBySsnDid = "-1";
if (isset($_SESSION['did'])) {
  $colname_dlrSlctBySsnDid = $_SESSION['did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `id` = '$did'";;
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_assoc($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);
$dudesid = $row_userDets['dudes_id']; //$row_qryInvoice['salesPerson1ID'];
$dudesid2 = $row_userDets['dudes2_id']; //$row_qryInvoice['salesPerson1ID'];
$colname_queryInvoice = "-1";


if (isset($_GET['id'])) {
  $colname_queryInvoice = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices` WHERE `invoice_id` = '$colname_queryInvoice'";
$queryInvoice = mysqli_query($idsconnection_mysqli, $query_queryInvoice);
$row_queryInvoice = mysqli_fetch_assoc($queryInvoice);
$totalRows_queryInvoice = mysqli_num_rows($queryInvoice);
$invoicedid = $row_queryInvoice['invoice_dealerid'];
$invoiceNo = $row_queryInvoice['invoice_number'];


$colname_qryInvoice = "-1";
if (isset($_GET['id'])) {
  $colname_qryInvoice = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qryInvoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices` WHERE `invoice_id` = '$colname_qryInvoice'";
$qryInvoice = mysqli_query($idsconnection_mysqli, $query_qryInvoice);
$row_qryInvoice = mysqli_fetch_assoc($qryInvoice);
$totalRows_qryInvoice = mysqli_num_rows($qryInvoice);
$toinvoicenumber = $row_qryInvoice['invoice_number'];



if("$did" == "$invoicedid"){
	
}else{
header("Location: billing.php");
	
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_last_invoicenumberdid = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices` WHERE `invoice_dealerid` = `invoice_dealerid` ORDER BY `invoice_number` ASC";
$last_invoicenumberdid = mysqli_query($idsconnection_mysqli, $query_last_invoicenumberdid);
$row_last_invoicenumberdid = mysqli_fetch_assoc($last_invoicenumberdid);
$totalRows_last_invoicenumberdid = mysqli_num_rows($last_invoicenumberdid);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_idsChargefees = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice` WHERE `charges_toinvoicenumber` = '$toinvoicenumber' ORDER BY `charges_created_at` DESC";
$idsChargefees = mysqli_query($idsconnection_mysqli, $query_idsChargefees);
$row_idsChargefees = mysqli_fetch_assoc($idsChargefees);
$totalRows_idsChargefees = mysqli_num_rows($idsChargefees);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons = "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_id` = '$dudesid'";
$salespersons = mysqli_query($idsconnection_mysqli, $query_salespersons);
$row_salespersons = mysqli_fetch_assoc($salespersons);
$totalRows_salespersons = mysqli_num_rows($salespersons);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons2 = "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_id` = '$dudesid2'";
$salespersons2 = mysqli_query($idsconnection_mysqli, $query_salespersons2);
$row_salespersons2 = mysqli_fetch_assoc($salespersons2);
$totalRows_salespersons2 = mysqli_num_rows($salespersons2);


?>
<?php 
/////Definitions
function get_Datetime_Now() {
	$tz_object = new DateTimeZone('Brazil/East');
	//date_default_timezone_set('Brazil/East');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');
	return $datetime->format('m\-d\-Y\ ');

}

$timevar = get_Datetime_Now();


$mydid = $row_dlrSlctBySsnDid['id'];
$dcompany = $row_dlrSlctBySsnDid['company'];
$websturl = $row_dlrSlctBySsnDid['website'];
$dname = $row_dlrSlctBySsnDid['contact'];
$demail = $row_dlrSlctBySsnDid['email'];
$dphone = $row_dlrSlctBySsnDid['contact_phone'];
$daddr = $row_dlrSlctBySsnDid['address'];
$dstate = $row_dlrSlctBySsnDid['state'];
$dcity = $row_dlrSlctBySsnDid['city'];
$dzip = $row_dlrSlctBySsnDid['zip'];
$dstorephone = $row_dlrSlctBySsnDid['phone'];
$dstorefax = $row_dlrSlctBySsnDid['fax'];
$dslogan = $row_dlrSlctBySsnDid['slogan'];
$ddisclaim = $row_dlrSlctBySsnDid['disclaimer'];
$mapurl = $row_dlrSlctBySsnDid['mapurl'];
$financenm = $row_dlrSlctBySsnDid['finance'];
$financephn = $row_dlrSlctBySsnDid['finance_contact'];
$intrsalesnm = $row_dlrSlctBySsnDid['sales'];
$intrsalesphn = $row_dlrSlctBySsnDid['sales_contact'];

$salesperonName = $row_salespersons['dudes_firstname'].' '.$row_salespersons['dudes_lname'];
$salesperonName2 = $row_salespersons2['dudes_firstname'].' '.$row_salespersons2['dudes_lname'];

$invoicecommment1 = 'We would like to thank you for your patience while we take ids to the next level. Your support is very much appreciated. ';

include('inc.invoice.definitions.php');

$invoicecommment2 = 'Please feel free to contact us or your local representative regarding any questions or concerns you may have.';
$invoicecommment3 = 'Call Support @ 404-565-4371 and/or Email us support@idscrm.com. Thank You.';
$invoicecommment4 = '';
$invoicecommment5 = '';


?>
<?php

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records
 
                //$row_creditapp_id_did[''];

$tkey2 = $tkey;
$appid = $colname_qryInvoice;



	//include("_defintions-deal-applicant.php");



	//include("_defintions-deal-coapplicant.php");
	
	
	

//mysqli_free_result($userDets);

//mysqli_free_result($dlrSlctBySsnDid);

//mysqli_free_result($last_invoicenumberdid);

//mysqli_free_result($qryInvoice);

//mysqli_free_result($idsChargefees);

//mysqli_free_result($salespersons);

//mysqli_free_result($salespersons2);

//mysqli_free_result($queryInvoice);
?>
<?php


//include('definitions-deal-buyersguide.php');


//include('bg-calculating.php');


//require('functions_deal-pdf-inc.php');


require('fpdf-Invoice.php');
//require('fpdf.php');

class PDF extends FPDF
{
// Page header



//$timevar = get_Datetime_Now();

function Header()
{
	//$k = 'Yes';
	//$get = $_GET['NO'];
    // Logo
	$nowDate = date('m/d/Y');

    $this->Image('idscrm-small-logo.png',12,18,40);
    // Arial bold 15
    $this->SetFont('Arial','',12);
    // Move to the right
    $this->Cell(80, 10, "$nowDate",0,0,'L');

	$this->SetFont('Arial','B',18);
	// Title
    $this->Cell(110,10,"INVOICE ",0,1,'R');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
	$invoice_token = $_GET['invoice_token'];
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
	
    $this->Cell(110,10,"Key: $invoice_token",0,0,'L');


    // Page number
    $this->Cell(-10,10,'Page '.$this->PageNo()."/{nb}",0,0,'C');
	
    $this->Cell(80,10,"(IDS) Intergrated Dealer Systems, LLC",0,0,'R');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

/*

 *	Row 1:

*/




/*  ----------------------------------------------------------------------------------------------------   */

$pdf->SetFont('Arial','B',12);
	$pdf->Cell(120,6,"Please Make Checks Payable To:", 0,1,'L');
$pdf->Cell(120,6,"(IDS) Intenet Dealer Services, LLC", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,8,"Invoice Number ", 1,0,'R', true);
	$pdf->Cell(40,8,"$invoiceNo", 1,1,'R');
	
/*
 *	Row 2:
Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
*/

$pdf->SetFont('Arial','B',12);
if(!$dudesid){

	$pdf->Cell(120,6," ", 0,0,'L');
	
	}else{
	$pdf->Cell(120,6,"#1 $salesperonName", 0,0,'L');		
	}

$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,8,"Invoice Date: ", 1,0,'R', true);
	$pdf->Cell(40,8,"$invoice_date", 1,1,'R');

/*

 *	Row 3:

*/



$pdf->SetFont('Arial','B',12);

if(!$dudesid2){
			$pdf->Cell(120,6," ", 0,0,'L');
}else{
	
			$pdf->Cell(120,6,"#2 $salesperonName2", 0,0,'L');
}
	
	
$pdf->SetFont('Arial','',10);	
	$pdf->Cell(30,8,"Payment Status:", 1,0,'R', true);
	$pdf->Cell(40,8,"$payment_status", 1,1,'R');


/*

 *	Row 4:

*/


$pdf->SetFont('Arial','B',12);


	$pdf->Cell(120,6,"www.IDSCRM.com", 0,0,'L');
$pdf->SetFont('Arial','',10);	
	$pdf->Cell(30,8,"Due Date:", 1,0,'R', true);
	$pdf->Cell(40,8,"$invoice_duedate", 1,1,'R');


/*

 *	Row 5:

*/


	$pdf->Cell(110,5,"227 Sandy Springs Place", 0,1,'L');
	$pdf->Cell(110,5,"Suite D, 227", 0,1,'L');
	$pdf->Cell(190,5,"Sandy Springs, GA    30328", 0,4,'L');


/*

 *	Row 6:

*/


	$pdf->Cell(35,12,"", 0,1,'R');



/*

 *	Row 7:

*/
	$pdf->SetFont('Arial','B',12);

	$pdf->Cell(35,6,"Bill To: $dcompany", 0,1,'L');
	$pdf->SetFont('Arial','',10);

	$pdf->Cell(45,6,"URL: www.$websturl", 0,1,'L');

	$pdf->Cell(110,6,"$daddr $dcity, $dstate  $dzip;   Phone: $dphone -  Fax: $dstorefax", 0,1,'L');



/*

 *	Row 8:

*/


$pdf->SetFont('Times','',10);


	$pdf->Cell(10,8,"Item", 1,0,'L' , true);
	$pdf->Cell(103,8,"Description:", 1,0,'L', true);
	$pdf->Cell(17,8,"Quantity", 1,0,'L' , true);
	$pdf->Cell(20,8,"Unit Price", 1,0,'L' , true);
	$pdf->Cell(20,8,"Amount", 1,0,'L' , true);
	$pdf->Cell(20,8,"Taxed", 1,1,'L' , true);


/*

 *	Row 9:

*/

	

	include('inc.loop-invoice-items-pdf.php');




	$pdf->Cell(190,4,"", 0,1,'C');

/*

 *	Row 10:



	$pdf->Cell(100,20,"$invoice_comments", 1,0,'L');

*/


/*

 *	Row 11 - Subtotal The Rest Loops or displays if possible:

*/

$pdf->SetFont('Arial','B',12);
	$pdf->Cell(120,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"SubTotal ", 1,0,'R');
	$pdf->Cell(40,6,'$ '."$invoice_subtotal", 1,1,'R');

/*

 *	Row 12 - Subtotal The Rest Loops or displays if possible:

*/



$pdf->SetFont('Arial','B',12);
	$pdf->Cell(120,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"$sales_taxrate %   TAX ", 1,0,'R');
	$pdf->Cell(40,6,'$ '."$invoice_taxtotal", 1,1,'R');




/*

 *	Row 13 Sub Total To Show After Loop:

*/


$pdf->SetFont('Arial','B',12);
	$pdf->Cell(120,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"Total ", 1,0,'R', true);
	$pdf->Cell(40,6,'$ '."$invoice_total", 1,1,'R');




/*

 *	Row 14 Amount Due To Show After Loop:

*/


if(!$applied_payment){}else{
	
$pdf->SetFont('Arial','B',12);
	$pdf->Cell(120,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"Applied Payment ", 1,0,'R', true);
	$pdf->Cell(40,6,'$ '."$applied_payment", 1,1,'R');
}

$pdf->SetFont('Arial','B',12);
	$pdf->Cell(120,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"Amount Due ", 1,0,'R', true);
	$pdf->Cell(40,6,'$ '."$invoice_amount_due", 1,1,'R');


/*

 *	Row My Comments:

*/

$pdf->Cell(35,8,"", 0,1,'L');
$pdf->Cell(35,4,"$invoicecommment1", 0,1,'L');
$pdf->Cell(35,4,"$invoicecommment2", 0,1,'L');
$pdf->Cell(35,4,"$invoicecommment3", 0,1,'L');





/*

 *	Row 2:


$pdf->AddPage();

$pdf->SetFont('Times','',12);

for($i=1;$i<=40;$i++)

    $pdf->Cell(0,5,'Printing Dealer Line Charge number '.$i,0,1);
*/	



$pdf->Output();















?>
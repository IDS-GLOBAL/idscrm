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
$dudes_access_level  = $row_userDudes['dudes_access_level'];
$dudes_skillset_id = $row_userDudes['dudes_skillset_id'];
$dudes_market_id = $row_userDudes['dudes_market_id'];
$dudes_email_internal = $row_userDudes['dudes_email_internal'];
$dudes_email_personal = $row_userDudes['dudes_email_personal'];
$dudes_dob = $row_userDudes['dudes_dob'];



$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_query =  "SELECT * FROM `idsids_idsdms`.`dealers` WHERE `dealers`.`id` = '$colname_dealer_query' ";
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);
$row_dealer_query = mysqli_fetch_array($dealer_query);
$totalRows_dealer_query = mysqli_num_rows($dealer_query);
$did = $row_dealer_query['id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid = "SELECT * FROM dealers WHERE id = '$did'";
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_array($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);
$dudesid = $row_dlrSlctBySsnDid['dudes_id']; //$row_qryInvoice['salesPerson1ID'];
$dudesid2 = $row_dlrSlctBySsnDid['dudes2_id']; //$row_qryInvoice['salesPerson1ID'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_last_invoicenumberdid = "SELECT * FROM ids_toinvoices WHERE invoice_dealerid = invoice_dealerid ORDER BY invoice_number ASC";
$last_invoicenumberdid = mysqli_query($idsconnection_mysqli, $query_last_invoicenumberdid);
$row_last_invoicenumberdid = mysqli_fetch_array($last_invoicenumberdid);
$totalRows_last_invoicenumberdid = mysqli_num_rows($last_invoicenumberdid);


$colname_qryInvoice = "-1";
if (isset($_GET['invoice_id'])) {
  $colname_qryInvoice = $_GET['invoice_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qryInvoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring` WHERE `ids_toinvoices_recurring`.invoice_id = '$colname_qryInvoice'";
$qryInvoice = mysqli_query($idsconnection_mysqli, $query_qryInvoice);
$row_qryInvoice = mysqli_fetch_array($qryInvoice);
$totalRows_qryInvoice = mysqli_num_rows($qryInvoice);
$toinvoicenumber = $row_qryInvoice['invoice_number'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_idsChargefees = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice` WHERE `charges_toinvoicenumber` = '$toinvoicenumber' ORDER BY charges_created_at DESC";
$idsChargefees = mysqli_query($idsconnection_mysqli, $query_idsChargefees);
$row_idsChargefees = mysqli_fetch_array($idsChargefees);
$totalRows_idsChargefees = mysqli_num_rows($idsChargefees);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons = "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.`dudes_id` = '$dudesid'";
$salespersons = mysqli_query($idsconnection_mysqli, $query_salespersons);
$row_salespersons = mysqli_fetch_array($salespersons);
$totalRows_salespersons = mysqli_num_rows($salespersons);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersons2 = "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes`.`dudes_id` = '$dudesid2'";
$salespersons2 = mysqli_query($idsconnection_mysqli, $query_salespersons2);
$row_salespersons2 = mysqli_fetch_array($salespersons2);
$totalRows_salespersons2 = mysqli_num_rows($salespersons2);

$colname_queryInvoice = "-1";
if (isset($_GET['recordid'])) {
  $colname_queryInvoice = $_GET['recordid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices_recurring` WHERE `invoice_id` = '$colname_queryInvoice'";
$queryInvoice = mysqli_query($idsconnection_mysqli, $query_queryInvoice);
$row_queryInvoice = mysqli_fetch_array($queryInvoice);
$totalRows_queryInvoice = mysqli_num_rows($queryInvoice);
$invoicedid = $row_queryInvoice['invoice_dealerid'];
$invoiceNo = $row_queryInvoice['invoice_number'];

if("$did" == "$invoicedid"){
	
}else{
//header("Location: billing.php");
	
}
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
$dealertypeid = $row_dlrSlctBySsnDid['dealer_type_id'];
$dcompany = $row_dlrSlctBySsnDid['company'];
$websturl = $row_dlrSlctBySsnDid['website'];
$dmcontact = $row_dlrSlctBySsnDid['contact'];
$dmcontact_title = $row_dlrSlctBySsnDid['contact_title'];
$dmcontact_phone = $row_dlrSlctBySsnDid['contact_phone'];
$dmcontact2 = $row_dlrSlctBySsnDid['dmcontact2'];
$dmcontact2_title = $row_dlrSlctBySsnDid['dmcontact2_title'];
$dmcontact2_phone = $row_dlrSlctBySsnDid['dmcontact2_phone'];

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


include('../dealer/definitions-reocurringinvoice.php');

		$invc_cret_evry = $row_queryInvoice['invc_cret_evry'];	
		$invc_cret_evrywhn = $row_queryInvoice['invc_cret_evrywhn'];
		
		if($invc_cret_evrywhn == 'months'){$invc_cret_evrywhn = 'month(s)';}
		if($invc_cret_evrywhn == 'days'){$invc_cret_evrywhn = 'day(s)';}
		if($invc_cret_evrywhn == 'years'){$invc_cret_evrywhn = 'year(s)';}


		$invoice_recurring_stopdate = $row_queryInvoice['invoice_recurring_stopdate'];


$invoicecommment2 = 'Please feel free to contact us or your local representative regarding any questions or concerns you may have.';
$invoicecommment3 = 'Call Support @ 404-565-4371 and/or Email us support@idscrm.com. Thank You.';
$invoicecommment4 = '';
$invoicecommment5 = '';


$invoice_status = $row_queryInvoice['invoice_status'];
$autocharge = $row_queryInvoice['invoice_autocharge'];
$latefee = $row_queryInvoice['invoice_latefee'];
?>
<?php

        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records
 
                //$row_creditapp_id_did[''];

$invoice_token = '6fe23c5e224fa911b43b';
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



require('../dealer/fpdf-Globaldoc.php');
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

    $this->Image('idscrm-small-logo.png',22,7,45);
    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Move to the right
    $this->Cell(100, 10, "",0,0,'L');

	$this->SetFont('Arial','B',12);
	// Title
    $this->Cell(5,10," ",0,0,'R');
	$this->SetFillColor(180,220,255);
    $this->Cell(90,10,"Contract Sales Agreement ",0,1,'R', true);
    // Line break
    $this->Ln(3);
}

// Page footer
function Footer()
{
	global $invoice_token;
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

$pdf->SetFont('Arial','',6);
$pdf->Cell(145,6,"Internal Use Only ", 0,0,'R');

$pdf->SetFont('Arial','',10);
$pdf->Cell(35,6,"Dealership ID:       $mydid", 0,1,'R');
$pdf->Cell(190,-6,"_________", 0,1,'R');

/*

 *	Row 1:

*/

	$pdf->Ln(10);
	
$pdf->SetFont('Arial','U',12);
	$pdf->Cell(195,-8,"___________________________________________________________________________________", 0,1,'L');

$pdf->SetFont('Arial','B',18);
$pdf->Cell(120,6,"$dcompany", 0,1,'L');



$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(195,8,"Dealership Name | Legal Name Including DBA: (Please Print Legibly)", 0,1,'L', true);

/*  ----------------------------------------------------------------------------------------------------   */

$pdf->SetFont('Arial','',8);
	$pdf->Cell(120,6,"Please Check The Box That Best Fits This Dealer Sellers Preference.", 0,1,'L');

if($dealertypeid == 1){	$pdf->Cell(5,5,"X", 1,0,'L'); }else{ $pdf->Cell(5,5,"", 1,0,'L'); };

	$pdf->Cell(37,5,"Franchise (New Car Store)", 0,0,'L');

if($dealertypeid == 2){	$pdf->Cell(5,5,"X", 1,0,'L'); }else{ $pdf->Cell(5,5,"", 1,0,'L'); };
	$pdf->Cell(37,5,"Buy Here Pay Here (BHPH)", 0,0,'L');

if($dealertypeid == 3){	$pdf->Cell(5,5,"X", 1,0,'L'); }else{ $pdf->Cell(5,5,"", 1,0,'L'); };
	$pdf->Cell(22,5,"Special Finance", 0,0,'L');

if($dealertypeid == 4){	$pdf->Cell(5,5,"X", 1,0,'L'); }else{ $pdf->Cell(5,5,"", 1,0,'L'); };
	$pdf->Cell(40,5,"Wholesale", 0,1,'L');

	$pdf->Ln(5);

$pdf->SetFont('Arial','',10);
$pdf->Cell(40,1,"$daddr", 0,0,'L');
$pdf->Cell(40,1,"$dcity", 0,0,'L');
$pdf->Cell(10,1,"$dstate", 0,0,'L');
$pdf->Cell(10,1,"$dzip", 0,1,'L');

$pdf->SetFont('Arial','',8);
$pdf->Cell(40,1,"_________________________", 0,0,'L');
$pdf->Cell(40,1,"_________________________", 0,0,'L');
$pdf->Cell(10,1,"_____", 0,0,'L');
$pdf->Cell(10,1,"_______", 0,1,'L');

$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,6,"Physical Address", 0,0,'L');
$pdf->Cell(40,6,"City", 0,0,'L');
$pdf->Cell(10,6,"State", 0,0,'L');
$pdf->Cell(10,6,"Zip", 0,1,'L');

	$pdf->Ln(2);


$pdf->SetFont('Arial','',10);
$pdf->Cell(40,1,"$daddr", 0,0,'L');
$pdf->Cell(40,1,"$dcity", 0,0,'L');
$pdf->Cell(10,1,"$dstate", 0,0,'L');
$pdf->Cell(10,1,"$dzip", 0,1,'L');


$pdf->SetFont('Arial','',8);
$pdf->Cell(40,1,"_________________________", 0,0,'L');
$pdf->Cell(40,1,"_________________________", 0,0,'L');
$pdf->Cell(10,1,"_____", 0,0,'L');
$pdf->Cell(10,1,"_______", 0,1,'L');

$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,6,"Billing Address (If Different)", 0,0,'L');
$pdf->Cell(40,6,"City", 0,0,'L');
$pdf->Cell(10,6,"State", 0,0,'L');
$pdf->Cell(40,6,"Zip", 0,1,'L');

	$pdf->Ln(2);



$pdf->SetFont('Arial','',10);
$pdf->Cell(40,1,"$dstorephone ", 0,0,'L');
$pdf->Cell(40,1,"$dstorefax ", 0,0,'L');
$pdf->Cell(40,1,"$demail", 0,1,'L');


$pdf->SetFont('Arial','',8);
$pdf->Cell(40,1,"_________________________", 0,0,'L');
$pdf->Cell(40,1,"_________________________", 0,0,'L');
$pdf->Cell(40,1,"_________________________", 0,1,'L');

$pdf->Cell(40,6,"Main Phone Number", 0,0,'L');
$pdf->Cell(40,6,"Fax Number", 0,0,'L');
$pdf->Cell(45,6,"E-mail Address", 0,1,'L');



	$pdf->Ln(1);

$pdf->SetFont('Arial','',10);
$pdf->Cell(80,1,"$dmcontact     $dmcontact_title", 0,0,'L');
$pdf->Cell(40,1,"$websturl", 0,1,'L');




$pdf->SetFont('Arial','',8);
$pdf->Cell(80,1,"__________________________________________________", 0,0,'L');
$pdf->Cell(40,1,"_________________________", 0,1,'L');



$pdf->Cell(80,6,"Primary Dealership Contact Name And Title", 0,0,'L');
$pdf->Cell(45,6,"Website Address", 0,1,'L');

	$pdf->Ln(1);



$pdf->SetFont('Arial','',10);
$pdf->Cell(80,1,"$dmcontact2      $dmcontact2_title", 0,1,'L');

$pdf->SetFont('Arial','',8);
$pdf->Cell(80,1,"__________________________________________________", 0,1,'L');
$pdf->Cell(125,6,"Secondary Dealership Contact Name And Title", 0,1,'L');


	$pdf->Ln(-47);





$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(125,6,"", 0,0,'R');
	$pdf->Cell(30,8,"Term ", 1,0,'R', true);
	$pdf->Cell(40,8,"$invc_cret_evry $invc_cret_evrywhn", 1,1,'R');




$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(125,6,"", 0,0,'R');
	$pdf->Cell(30,6,"Days To Pay", 1,0,'R', true);
	$pdf->Cell(40,6,"$daysto_payinvoice", 1,1,'R');




$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(125,6,"", 0,0,'R');
	$pdf->Cell(30,6,"Until", 1,0,'R', true);
	
	if(!$invoice_recurring_stopdate){
	$pdf->Cell(40,6,"Pays As Agreed", 1,1,'R');
	}else{
	$pdf->Cell(40,6,"$invoice_recurring_stopdate", 1,1,'R');
	}


$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(125,6,"", 0,0,'R');
	$pdf->Cell(30,6,"Late Fee if Occur", 1,0,'R', true);
	
	if(!$latefee){
	$pdf->Cell(40,6,"Good Faith", 1,1,'R');
	}else{
	$pdf->Cell(40,6,"$latefee", 1,1,'R');
	}



	$pdf->Ln(20);







	



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

	

	include('../dealer/parts/loop-invoice-items-pdf.php');




	$pdf->Cell(190,4,"", 0,1,'C');
	

	//$pdf->AddPage();


/*

 *	Row 10:



	$pdf->Cell(100,20,"$invoice_comments", 1,0,'L');

*/


/*

 *	Row 11 - Subtotal The Rest Loops or displays if possible:

*/
$pdf->SetFont('Arial','B',12);
	$pdf->Cell(195,6,"Payment Options ", 1,1,'C', true);


$pdf->SetFont('Arial','B',12);
	$pdf->Cell(130,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"SubTotal ", 1,0,'R');
	$pdf->Cell(35,6,'$ '."$invoice_subtotal", 1,1,'R');

/*

 *	Row 12 - Subtotal The Rest Loops or displays if possible:

*/



$pdf->SetFont('Arial','B',12);
	$pdf->Cell(130,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"$sales_taxrate %   TAX ", 1,0,'R');
	$pdf->Cell(35,6,'$ '."$invoice_taxtotal", 1,1,'R');




/*

 *	Row 13 Sub Total To Show After Loop:

*/


$pdf->SetFont('Arial','B',12);
	$pdf->Cell(130,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"Total ", 1,0,'R', true);
	$pdf->Cell(35,6,'$ '."$invoice_total", 1,1,'R');




/*

 *	Row 14 Amount Due To Show After Loop:

*/



$pdf->SetFont('Arial','B',12);
	$pdf->Cell(130,6," ", 0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(180,220,255);
	$pdf->Cell(30,6,"Amount Due ", 1,0,'R', true);
	$pdf->Cell(35,6,'$ '."$invoice_amount_due", 1,1,'R');



/*

 *	Active Jargon:

*/


if($invoice_status == 'OnHold'){
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(130,-24,"", 1,1,'L', false);

	$pdf->SetFont('Arial','B',8);
	if($autocharge == 'Y'):
	
	$pdf->Cell(5,5,"X", 1,0,'L', false);
	else:
		$pdf->Cell(5,5,"", 1,0,'L', false);
	endif;
	
	$pdf->Cell(80,6,"Credit Card (VISA, MasterCard, or American Express only)", 0,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(20,6,"Dealer/Advertiser authorizes ", 0,1,'L');

	$pdf->Cell(80,6,"(IDS) Intergrated Dealer Systems, LLC to charge Dealer/Advertiser's credit card account for all fees due ", 0,1,'L');

	$pdf->Cell(80,6,"(under this Sales Order. This charge will read, 'IDSINTERNET' on Dealer/Advertiser's credit", 0,1,'L');
					  
  	$pdf->Cell(80,6,"(credit card statement.)          - Credit Card Authoirzation Form Must Be Attached -", 0,1,'L');


	$pdf->Cell(195,8,"", 1,1,'L');

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(7, -8," ", 1,0,'L', false);
	$pdf->SetFont('Arial','',8);


	$pdf->Cell(195,-8,"Prepayment by Check Dealer will submit payment via check (check #	                  ) at the time of purchase for all fees due under this Agreement.", 0,1,'L');
	
	//Blank Line For Direct Billing
	//This Balances Out The Above Line Being a Negative Number in second argument
	$pdf->Cell(195,8,"", 1,1,'L');

if($autocharge == 'N'){
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(7, 8," X ", 1,0,'L', false);
}else{
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(7, 8,"  ", 1,0,'L', false);
	
}
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(25,10,"  Direct Billing -", 0,0,'L');
	$pdf->SetFont('Arial','',8);

	$pdf->Cell(170,10,"Dealer requests that (IDS) Intergrated Dealer Systems provide the option to have fees for this Service Agreement purchased by ", 0,1,'L');
	$pdf->Cell(195,-10,"", 0,1,'L');
	
	
	$pdf->Cell(195,30,"", 1,1,'L');

$pdf->Cell(190,-44,"to be invoiced in the arrears at the end of the month.  If Intergrated Dealer Systems accepts this request, Dealer will have the option to desingate   ", 0,1,'R');

$pdf->Cell(190,50,"Transaction fees to be included, along with the fees for other services provided by (IDS) Inter Dealer Services during the applicable calendar month,", 0,1,'R');

$pdf->Cell(190,-44,"in monthly invoices sent by (IDS) Intergrated Dealer Systems.  Transaction Services Or Advertisement fees included in the monthly invoice will be        ", 0,1,'R');

$pdf->Cell(190,50,"payable by Dealer during the applicable calendar month, in monthly invoices sent by invoice. If (IDS) Intergrated Dealer Systems. either does not          ", 0,1,'R');

$pdf->Cell(190,-44,"accept this request or revokes it's acceptance of this request at any time  without notice to Dealer, Dealer may still purchase other services via an    ", 0,1,'R');

$pdf->Cell(190,50,"     authorized credit card or prepayment by check.", 0,1,'L');

//$pdf->Cell(160,-5,"", 1,1,'L');

	$pdf->Ln(-20);

	$pdf->AddPage();


	$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10,"Do NOT Activate Four Digit Pin: ", 0,1,'L');

$pdf->Ln(-5);

$pdf->Cell(50,10,"Activate Four Digit Pin'", 0,0,'L');
	$pdf->SetFont('Arial','',10);
$pdf->Cell(30,10,"Please Print Four Digit Password: ___________________________________________ .", 0,1,'L');

$pdf->Ln(-3);

	$pdf->SetFont('Arial','',7);
$pdf->Cell(30,5,"Dealer/Advertiser is responsible for maintaining the confidentiality of the Password. Dealer/Advertiser agrees to change this Password immediately by notifying  ", 0,1,'L');


$pdf->Cell(30,4,"Intergrated Dealer Systems at IDSCRM.com if Dealer/Advertiser finds that this Password has been compromised and to notify Intergrated Dealer Systems about WeFinanceHere.com of ", 0,1,'L');


$pdf->Cell(30,4,"any known or suspected unauthorized use of access or illegal imposing to any service you subscribe as a Dealer/Advertiser's account assigned by us to you. Dealer/Advertiser is ", 0,1,'L');


$pdf->Cell(30,4,"responsible for all action taken on the WeFinanceHere.com Site under Dealer/Advertiser's account.", 0,1,'L');



$pdf->SetFont('Arial','B',7.5);

$pdf->Cell(30,4,"Dealer/Advertiser acknowledges and agrees that this placement is subject to the Standard Terms and Conditions in the Dealer/Advertiser Relationship ", 0,1,'L');

$pdf->Cell(30,4,"Agreement between (IDS) Intergrated Dealer Systems and Dealer/Advertiser or, in the event that Dealer/Advertiser has not entered into an Dealer/Advertiser ", 0,1,'L');


$pdf->Cell(30,4,"Relationship Agreement, the Standard Terms and Conditions printed on the reverse side of this Sales Orders Or The Last Page Of This Agreement.", 0,1,'L');

$pdf->SetFont('Arial','',8);

$pdf->Cell(30,4,"By signing below, Dealer/Advertiser agrees to the placement of Advertisements on the Wefinancehere.com Site and the rates and charges for this ", 0,1,'L');



$pdf->Cell(30,4,"placement as specified in this Service Agreement. The Standard Terms and Conditions and the terms of this Sales Agreement constitutes the entire ", 0,1,'L');


$pdf->Cell(30,4,"agreement between Dealer/Advertiser and WeFinanceHere.com relating to the placement of Advertisements specified in this Service Agreement.", 0,1,'L');


	$pdf->Ln(4);



$pdf->Cell(65,1,"____________________________________", 0,0,'C');
$pdf->Cell(65,1,"____________________________________", 0,0,'C');
$pdf->Cell(65,1,"____________________________________", 0,1,'C');

$pdf->Cell(65,6,"Dealership Authorized Signature", 0,0,'C');
$pdf->Cell(65,6,"Account Manager Signature", 0,0,'C');
$pdf->Cell(65,6,"Intergrated Dealer Systems Approval Signature", 0,1,'C');

	$pdf->Ln(4);

$pdf->Cell(65,1,"____________________________________", 0,0,'C');
$pdf->Cell(65,1,"____________________________________", 0,0,'C');
$pdf->Cell(65,1,"____________________________________", 0,1,'C');

$pdf->Cell(65,6,"Printed Name", 0,0,'C');
$pdf->Cell(65,6,"Printed Name", 0,0,'C');
$pdf->Cell(65,6,"Printed Name", 0,1,'C');

	$pdf->Ln(4);

$pdf->Cell(65,1,"____________________________________", 0,0,'C');
$pdf->Cell(65,1,"____________________________________", 0,0,'C');
$pdf->Cell(65,1,"____________________________________", 0,1,'C');

$pdf->Cell(65,6,"Title", 0,0,'C');
$pdf->Cell(65,6,"Title", 0,0,'C');
$pdf->Cell(65,6,"Title", 0,1,'C');


	$pdf->Ln(4);



$pdf->Cell(65,4,"Signing Date:________________________", 0,0,'L');

$pdf->Cell(65,4,"Signing Date:________________________", 0,0,'L');

$pdf->Cell(65,4,"Signing Date:________________________", 0,1,'L');


/*



	$pdf->Cell(190,15,"Dealer is responsible for maintaining the confidentiality of the Password. Dealer/Advertiser agrees to change this Password immediately by notifying ", 1,1,'L');


$pdf->Cell(190,10,"IDSCRM.com if Dealer finds that this Password hs been compromised and to notify IDSCRM.com of any known or suspected unaurthorized use", 1,1,'L');


$pdf->Cell(190,10,"of Dealers's account.", 1,1,'L');


*/

	$pdf->Ln(120);

}else{
	$pdf->Cell(120,6," ", 0,0,'L');
}




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
<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/idschatconnection.php'); ?>
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
if (!((isset($_SESSION['MM_Managerperson'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Managerperson'], $_SESSION['MM_ManagerpersonAccess'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit();
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_userDets = "-1";
if (isset($_SESSION['MM_Managerperson'])) {
  $colname_userDets = $_SESSION['MM_Managerperson'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM `dealers`, `manager_person` WHERE `dealers`.`id` = `manager_person`.`dealer_id` AND `manager_person`.`manager_email`=%s";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);

$mgrid = $row_userDets['manager_id']; //Hackishere
$did = $row_userDets['dealer_id']; //Hackishere

$colname_dlrSlctBySsnDid = "-1";
if (isset($did)) {
  $colname_dlrSlctBySsnDid = $did;
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid =  "SELECT * FROM dealers WHERE id = '$did'";;
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_assoc($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);

$colname_cust_lead = "-1";
if (isset($_GET['leadid'])) {
  $colname_cust_lead = $_GET['leadid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_cust_lead =  sprintf("SELECT * FROM cust_leads WHERE cust_leadid = %s", GetSQLValueString($colname_cust_lead, "int"));
$cust_lead = mysqli_query($idsconnection_mysqli, $query_cust_lead);
$row_cust_lead = mysqli_fetch_assoc($cust_lead);
$totalRows_cust_lead = mysqli_num_rows($cust_lead);
$vid = $row_cust_lead['cust_vehicle_id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_leadVehicle = "SELECT * FROM vehicles WHERE vid = '$vid'";
$leadVehicle = mysqli_query($idsconnection_mysqli, $query_leadVehicle);
$row_leadVehicle = mysqli_fetch_assoc($leadVehicle);
$totalRows_leadVehicle = mysqli_num_rows($leadVehicle);
$sid1=$row_cust_lead['cust_salesperson_id'];
$sid2=$row_cust_lead['cust_salesperson2_id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salesPerson1 = "SELECT * FROM sales_person WHERE salesperson_id = '$sid1'";
$salesPerson1 = mysqli_query($idsconnection_mysqli, $query_salesPerson1);
$row_salesPerson1 = mysqli_fetch_assoc($salesPerson1);
$totalRows_salesPerson1 = mysqli_num_rows($salesPerson1);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salesPerson2 = "SELECT * FROM sales_person WHERE salesperson_id = '$sid2'";
$salesPerson2 = mysqli_query($idsconnection_mysqli, $query_salesPerson2);
$row_salesPerson2 = mysqli_fetch_assoc($salesPerson2);
$totalRows_salesPerson2 = mysqli_num_rows($salesPerson2);


?>
<?php 
/////Definitions

$leadsource = $row_cust_lead['cust_lead_source'];
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


$salesperonName1 = $row_salesPerson1['salesperson_firstname'].' '.$row_salesPerson1['salesperson_lastname'];

$salesperonName2 = $row_salesPerson2['salesperson_firstname'].' '.$row_salesPerson2['salesperson_lastname'];

$vfile = $row_leadVehicle['vthubmnail_file'];

$link="http://images.autocitymag.com/$did/$vid/$vfile";

$vimage = $link;


$whncreated=$row_cust_lead['cust_lead_created_at'];

if(!$vfile){$vimage = 'logo.png';}
// http://www.fpdf.org/

require('../dealer/fpdf-Lead.php');

class myPDF extends FPDF {



	public $title = "Online Lead";
	public $whncreated;
	
	//Page header method

	function Header() {


		global $vimage;

		// Vehicle Image
		//$this->Image("$vimage",10,6,30);
		// Arial bold 15
		
		$this->SetFont('Times','B',12);

		$w = $this->GetStringWidth($this->title)+138;

		$this->SetDrawColor(0,0,0);

		$this->SetFillColor(255,255,255);

		$this->SetTextColor(0,0,0);

		$this->SetLineWidth(1);

		$this->Cell($w,9,$this->title,1,1,'C',1);

		//$this->Cell($w,9,$this->tkey2,1,1,'C',1);

		$this->Ln(5);



	}



	//Page footer method

	function Footer()       {

		//Position at 1.5 cm from bottom

		$this->SetY(-15);

		$this->SetFont('Arial','I',8);

		//$this->Cell(0,0,$this->apptoken, 0 ,0 ,'L');
		
		$this->Cell(0,10,'Online Lead Page '

				.$this->PageNo().'/{nb}',0,0,'C');
	
		
		//$this->Cell(0,10,'Date: '.$this->appdate, 0 ,2 ,'R');
		$this->Cell(0,10,'IDSCRM.com Online Lead Pritable Version ', 0 ,2 ,'R');

	}



}


$pdf = new myPDF('P', 'mm', 'Letter');

$pdf->AliasNbPages();


/*
 * This is Applicant information
 * Explode Defined variables from url paramater
 * Before String ie. Cell(40 = how long the cell is
 * Before String ie. cell(40,9 = space up an down cell spacing.
 * After title the first digit is for border
 * Second digit is break down a line
 * Third Alphabet is for word alignment 
 */ 
 


/*
 * Online Lead Print Standalone
*/
	
/*
 * Row 1 
 */

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Lead Generated On: '.$whncreated, 0,1,'L');



if($sid1):

$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,'Assigned To Sales Person 1: ', 0,0,'L');
$pdf->Cell(40,10,$salesperonName1, 0,1,'L');

endif;


if($sid2):

$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,'Assigned To Sales Person 2: ', 0,0,'L');
$pdf->Cell(40,10,$salesperonName2, 0,1,'L');

endif;



/*
 * Row 20
*/
if($vid):
$pdf->Cell(100,5,'', 0,0,'R');

$pdf->Cell(45,5,'Vehicle Information: ',0,1,'L');

$pdf->Cell(100,5,'', 0,0,'R');

$pdf->Cell(45,5,'Stock No#'.$row_leadVehicle['vstockno'].' - '.$row_leadVehicle['vyear'].' '.$row_leadVehicle['vmake'].' '.$row_leadVehicle['vmodel'],0,1,'L');
endif;

if($vfile):
$pdf->Image("$vimage",130,70,70,0);
endif;
//$pdf->Image($vimage,120,30,90,0,'JPG');


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,5,'First Name: ',1,0,'L');
$pdf->Cell(100,5,$row_cust_lead['cust_fname'],0,0,'L');


$pdf->Cell(1,5,'',0,1,'L');

$pdf->Cell(45,5,'Middle Name: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_mname'],0,1,'L');


$pdf->Cell(45,5,'Last Name:', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_lname'],0,1,'L');

$pdf->Cell(45,5,'Suffix: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_name_suffix'],0,1,'L');

$pdf->Cell(45,5,'Main Phone: ', 1,0,'L');
$pdf->Cell(30,5,$row_cust_lead['cust_phoneno'],0,0,'L');

if($row_cust_lead['cust_phonetype']):
$pdf->Cell(45,5,'  Type:  '.$row_cust_lead['cust_phonetype'],0,1,'L');
else:
$pdf->Cell(1,5,'',0,1,'L');
endif;

$pdf->Cell(45,5,'Mobile Phone: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_mobilephone'],0,1,'L');


$pdf->Cell(45,5,'Home Phone: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_homephone'],0,1,'L');


$pdf->Cell(45,5,'Work Phone: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_workphone'],0,1,'L');

$pdf->Cell(45,5,'Fax: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_faxphone'],0,1,'L');

$pdf->Cell(45,5,'Email: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_email'],0,1,'L');

$pdf->Cell(45,5,'Address 1: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_home_address'],0,1,'L');

$pdf->Cell(45,5,'Address 2: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_home_address2'],0,1,'L');

if($row_cust_lead['cust_home_address3']):
	$pdf->Cell(45,5,'Address 3 ', 1,0,'L');
	$pdf->Cell(45,5,$row_cust_lead['cust_home_address3'],0,1,'L');
endif;

$pdf->Cell(45,5,'City: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_home_city'],0,1,'L');

$pdf->Cell(45,5,'State: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_home_state'],0,1,'L');

$pdf->Cell(45,5,'Zip: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_home_zip'],0,1,'L');

$pdf->Cell(45,5,'County: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_home_county'],0,1,'L');

$pdf->Cell(45,5,'Lived Years: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_home_live_years'],0,1,'L');

$pdf->Cell(45,5,'Live Months: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_home_live_months'],0,1,'L');

$pdf->Cell(45,5,'Customer Income: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_gross_income'],0,1,'L');

$pdf->Cell(45,5,'Gross Income Interval: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_gross_income_frequency'],0,1,'L');

$pdf->Cell(45,5,'Other Income: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_other_income'],0,1,'L');

$pdf->Cell(45,5,'Other Income Interval: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_gross_other_income_frequency'],0,1,'L');

$pdf->Cell(45,5,'Vehicle Selection: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_vehicle_id'],0,1,'L');

$pdf->Cell(45,5,'Current Customer Status: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_status'],0,1,'L');

$pdf->Cell(45,5,'Employer Name: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_employer_name'],0,1,'L');

$pdf->Cell(45,5,'Employer Addr1: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_employer_addr1'],0,1,'L');


$pdf->Cell(45,5,'Employer Addr2: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_employer_addr2'],0,1,'L');

$pdf->Cell(45,5,'Employer City:  ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_employer_city'],0,1,'L');

$pdf->Cell(45,5,'Employer State:  ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_employer_state'],0,1,'L');

$pdf->Cell(45,5,'Employer Phone No.: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_employer_phone'],0,1,'L');

$pdf->Cell(45,5,'Work Years: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_employer_years'],0,1,'L');

$pdf->Cell(45,5,'Work Months: ', 1,0,'L');
$pdf->Cell(45,5,$row_cust_lead['cust_employer_months'],0,1,'L');

if($row_cust_lead['cust_dealtoday'] == 1){
$pdf->Cell(45,5,'Deal Today: ', 1,0,'L');
$pdf->Cell(45,5,'Yes',0,1,'L');
}else{
	
$pdf->Cell(45,5,'Deal Today: ', 1,0,'L');
$pdf->Cell(45,5,'NO',0,1,'L');
	
	
}






$pdf->Cell(45,5,'', 0,1,'L');
$pdf->Cell(45,5,'Lead Cost: Included', 1,0,'L');
$pdf->Cell(45,5,'*Special Rates May Apply *',0,1,'L');

if($row_cust_lead['cust_lead_source']):

$pdf->Cell(45,5,'Lead Source: '.$leadsource, 1,0,'L');
$pdf->Cell(45,5,'*Special Rates May Apply *',0,1,'L');
else:

$pdf->Cell(45,5,'Lead Source: Website', 1,0,'L');
$pdf->Cell(45,5,'*Subscription *',0,1,'L');


endif;


/*
 * Row 21
*/






/*
 * Row 22
*/





/*
 * Row 23
*/





/*
 * Row 24
*/





/*
 * Row 25
*/





/*
 * Row 26
*/





/*
 * Row 27
*/





/*
 * Row 28
*/





/*
 * Row 29
*/





/*
 * Row 30
*/




/*
 * Row 30
*/













//Emds Everything by displaying it to the browser.
$pdf->Output();



mysqli_free_result($userDets);

mysqli_free_result($cust_lead);

mysqli_free_result($leadVehicle);

mysqli_free_result($salesPerson1);

mysqli_free_result($salesPerson2);
?>

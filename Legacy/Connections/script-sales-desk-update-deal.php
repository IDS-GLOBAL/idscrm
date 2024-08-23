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
$vVIN=$_GET['vVIN'];

$vStockNo=$_GET['vStockNo'];

$customerid=$_GET['customer_id'];

$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  sprintf("SELECT * FROM dealers WHERE email = %s");
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere
$titleFee=$row_userDets['settingTitleFee'];


$docServiceFee = $row_userDets['settingDocDlvryFee'];
$stateSalesTax = $row_userDets['settingSateSlsTax'];
//$warrantyPrice = 

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qryVstock = "SELECT * FROM vehicles WHERE vehicles.did = $did AND vehicles.vstockno = '$vStockNo'";
$qryVstock = mysqli_query($idsconnection_mysqli, $query_qryVstock);
$row_qryVstock = mysqli_fetch_assoc($qryVstock);
$totalRows_qryVstock = mysqli_num_rows($qryVstock);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_customers = "SELECT * FROM customers WHERE customer_id = '$customerid'";
$customers = mysqli_query($idsconnection_mysqli, $query_customers);
$row_customers = mysqli_fetch_assoc($customers);
$totalRows_customers = mysqli_num_rows($customers);
$salesperson1_id = $row_customers['customer_sales_person_id'];
$salesperson2_id = $row_customers['customer_sales_person2_id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salesperson1 = "SELECT * FROM sales_person WHERE salesperson_id = '$salesperson1_id'";
$salesperson1 = mysqli_query($idsconnection_mysqli, $query_salesperson1);
$row_salesperson1 = mysqli_fetch_assoc($salesperson1);
$totalRows_salesperson1 = mysqli_num_rows($salesperson1);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salesperson2 = "SELECT * FROM sales_person WHERE salesperson_id = '$salesperson2_id'";
$salesperson2 = mysqli_query($idsconnection_mysqli, $query_salesperson2);
$row_salesperson2 = mysqli_fetch_assoc($salesperson2);
$totalRows_salesperson2 = mysqli_num_rows($salesperson2);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_Customers = "SELECT * FROM customers WHERE customer_dealer_id = '$did' AND customers.customer_id = '$customerid'";
$qry_Customers = mysqli_query($idsconnection_mysqli, $query_qry_Customers);
$row_qry_Customers = mysqli_fetch_assoc($qry_Customers);
$totalRows_qry_Customers = mysqli_num_rows($qry_Customers);
$salesmgrid = $row_qry_Customers['customer_slsmgr_id'];
$fnimgrid = $row_qry_Customers['customer_fnimgr_id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salesmgr = "SELECT * FROM manager_person WHERE manager_person.dealer_id = '$did' AND manager_person.manager_id = '$salesmgrid'";
$salesmgr = mysqli_query($idsconnection_mysqli, $query_salesmgr);
$row_salesmgr = mysqli_fetch_assoc($salesmgr);
$totalRows_salesmgr = mysqli_num_rows($salesmgr);
$salesmgr = $row_salesmgr['manager_firstname'].' '.$row_salesmgr['manager_lastname'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fNImanager = "SELECT * FROM manager_person WHERE manager_person.dealer_id = '$did' AND manager_person.manager_id = '$fnimgrid'";
$fNImanager = mysqli_query($idsconnection_mysqli, $query_fNImanager);
$row_fNImanager = mysqli_fetch_assoc($fNImanager);
$totalRows_fNImanager = mysqli_num_rows($fNImanager);
$fnimgr = $row_fNImanager['manager_firstname'].' '.$row_fNImanager['manager_lastname'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastCustomerNo = "SELECT customer_id, customer_leads_id, customer_no, customer_dealer_id FROM customers WHERE customer_dealer_id = '$did' ORDER BY customer_no DESC";
$lastCustomerNo = mysqli_query($idsconnection_mysqli, $query_lastCustomerNo);
$row_lastCustomerNo = mysqli_fetch_assoc($lastCustomerNo);
$totalRows_lastCustomerNo = mysqli_num_rows($lastCustomerNo);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_lastDlrdeal = "SELECT * FROM deals_bydealer WHERE deal_dealerID = '$did' ORDER BY deal_number DESC";
$lastDlrdeal = mysqli_query($idsconnection_mysqli, $query_lastDlrdeal);
$row_lastDlrdeal = mysqli_fetch_assoc($lastDlrdeal);
$totalRows_lastDlrdeal = mysqli_num_rows($lastDlrdeal);
?>
<?php
include('../Libary/token-generator.php');
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************


/*

Get Number of Cylinders




Query These Variables for matching records in DB with dealer ID.
	
*/

$lastno = $row_lastCustomerNo['customer_no'];

if(!$lastno){
	$lastno = 1000;
}else{
	$lastno = ($lastno + 1);
}


$lastdealno = $row_lastDlrdeal['deal_number'];

if(!$lastdealno){
	$lastdealno = 1000;
}else{
	$lastdealno = ($lastdealno + 1);
}



?>
<?php

echo $vid = $row_qryVstock['vid'];


$salespersonfname = $row_salesperson1['salesperson_firstname'];
$salespersonlname = $row_salesperson1['salesperson_lastname'];



$salesperson2fname = $row_salesperson2['salesperson_firstname'];
$salesperson2lname = $row_salesperson2['salesperson_lastname'];

$sp1name = $salespersonfname.' '.$salespersonlname;
$sp2name = $salesperson2fname.' '.$salesperson2lname;


$vStockNo=$_GET['vStockNo'];

						if(!$vStockNo){
							
							echo "Sorry Don't Exist ";
					
						}else{
						
							echo "Yes Stock Number Exist ";
						}


$vVIN=$_GET['vVIN'];

$vStockNo2=$row_qryVstock['vstockno'];

$vehiclevin=$row_qryVstock['vvin'];

$vidofvin=$row_qryVstock['vid'];
					
						if(!$vidofvin){
							
							echo "Sorry vVIN Don't Exist ";
							echo '<br>';
						}else{
							
							$resultvidofvin="Yes vVIN Exist ";
							echo $resultvidofvin;
							echo '<br>';
							//header("Location: inventory-edit.php?vid=$vidofvin");
						}



echo $vVIN=$_GET['vVIN']; //1FAHP2EW6CG120264

						if(!$vVIN){
							
							$vVIN=$row_qryVstock['vvin'];
							
						}


echo $vStockNo.' = vStockNo';

echo '<br>';

echo $vStockNo2.' = vstock2';

echo '<br>';

//echo $vVIN.' = vVIN';

echo '<br>';




//$cat=$_GET['cat'];

//$subcat=$_GET['subcat'];

//echo "Value of \$cat = $cat <br>Value of \$subcat = $subcat ";


echo $vcondition=$row_qryVstock['vcondition'];
echo $vyear=$row_qryVstock['vyear'];
echo $vmake=$row_qryVstock['vmake'];
echo $vmodel=$row_qryVstock['vmodel'];
echo $vtrim=$row_qryVstock['vtrim'];
echo $vbody=$row_qryVstock['vbody'];
echo $vecolor_txt=$row_qryVstock['vecolor_txt'];
echo $vmileage=$row_qryVstock['vmileage'];

//This Variable is used if the car was discounted or sold ever advertised price in the system.
// This will not be the selling price of the deal. It's the variable from the retail selling price.
echo $dealvprice=$_GET['dealvprice']; //0


						if (!$dealvprice){
							
							//header("Location: sales-desk.php");
							//header("Location: sales-desk.php");
							echo 'See Me?';
						}

echo $vStockNo=$_GET['vStockNo']; //P11363
echo $dDealno=$_GET['dDealno']; //
echo $priceVehicle=$_GET['priceVehicle']; //

						if (!$priceVehicle == 0.00){
							
							//header("Location: sales-desk.php");
							//header("Location: sales-desk.php");
							echo 'See Me?';
						}




echo $nonTaxRebate=$_GET['nonTaxRebate']; //0.00
echo $taxablePrice=$_GET['taxablePrice']; //0.00
echo $downPayment=$_GET['downPayment']; //0.00

echo $rebates=$_GET['rebates']; //0.00

echo $reBateOne=$_GET['reBateOne']; //0.00
echo $reBateOnedscrp=$_GET['reBateOnedscrp'];
echo $reBateOneTax=$_GET['reBateOneTax'];

echo $reBateTwo=$_GET['reBateTwo']; //0.00
echo $reBateTwodscrp=$_GET['reBateTwodscrp'];
echo $reBateTwoTax=$_GET['reBateTwoTax'];

echo $reBateThree=$_GET['reBateThree']; //0.00
echo $reBateThreedscrp=$_GET['reBateThreedscrp'];
echo $reBateThreeTax=$_GET['reBateThreeTax'];

echo $reBateFour=$_GET['reBateFour']; //0.00
echo $reBateFourdscrp=$_GET['reBateFourdscrp'];
echo $reBateFourTax=$_GET['reBateFourTax'];

echo $reBateFive=$_GET['reBateFive']; //0.00
echo $reBateFivedscrp=$_GET['reBateFivedscrp'];
echo $reBateFiveTax=$_GET['reBateFiveTax'];

echo $tradeAllowance=$_GET['tradeAllowance']; //0.00
echo $tradePayoff=$_GET['tradePayoff']; //0.00

$extSrvcMonths = $_GET['extSrvcMonths'];
$extSrvcCompany = $_GET['extSrvcCompany'];
$extSrvcMiles = $_GET['extSrvcMiles'];
$extSrvcStartDate = $_GET['extSrvcStartDate'];
$extSrvcContractNo = $_GET['extSrvcContractNo'];
$extSrvcStartMiles = $_GET['extSrvcStartMiles'];
$extSrvcPremium = $_GET['extSrvcPremium'];
$extSrvcEndDate = $_GET['extSrvcEndDate'];
$extSrvcEndMiles = $_GET['extSrvcEndMiles'];



echo $optionsAftermarket=$_GET['optionsAftermarket']; //0.00 Total

echo $optAftMktOneCode=$_GET['optAftMktOneCode'];
echo $optAftMktOneList=$_GET['optAftMktOneList']; //0.00
echo $optAftMktOnePrice=$_GET['optAftMktOnePrice'];
echo $optAftMktOneCost=$_GET['optAftMktOneCost'];
echo $optAftMktOneTaxed=$_GET['optAftMktOneTaxed'];

echo $optAftMktTwoCode=$_GET['optAftMktTwoCode'];
echo $optAftMktTwoList=$_GET['optAftMktTwoList']; //0.00
echo $optAftMktTwoPrice=$_GET['optAftMktTwoPrice'];
echo $optAftMktTwoCost=$_GET['optAftMktTwoCost'];
echo $optAftMktTwoTaxed=$_GET['optAftMktTwoTaxed'];

echo $optAftMktThreeCode=$_GET['optAftMktThreeCode'];
echo $optAftMktThreeList=$_GET['optAftMktThreeList']; //0.00
echo $optAftMktThreePrice=$_GET['optAftMktThreePrice'];
echo $optAftMktThreeCost=$_GET['optAftMktThreeCost'];
echo $optAftMktThreeTaxed=$_GET['optAftMktThreeTaxed'];
	 
echo $optAftMktFourCode=$_GET['optAftMktFourCode'];
echo $optAftMktFourList=$_GET['optAftMktFourList']; //0.00
echo $optAftMktFourPrice=$_GET['optAftMktFourPrice'];
echo $optAftMktFourCost=$_GET['optAftMktFourCost'];
echo $optAftMktFourTaxed=$_GET['optAftMktFourTaxed'];

echo $optAftMktFiveCode=$_GET['optAftMktFiveCode'];
echo $optAftMktFiveList=$_GET['optAftMktFiveList']; //0.00
echo $optAftMktFivePrice=$_GET['optAftMktFivePrice'];
echo $optAftMktFiveCost=$_GET['optAftMktFiveCost'];
echo $optAftMktFiveTaxed=$_GET['optAftMktFiveTaxed'];

echo $optAftMktSixCode=$_GET['optAftMktSixCode'];
echo $optAftMktSixList=$_GET['optAftMktSixList']; //0.00
echo $optAftMktSixPrice=$_GET['optAftMktSixPrice'];
echo $optAftMktSixCost=$_GET['optAftMktSixCost'];
echo $optAftMktSixTaxed=$_GET['optAftMktSixTaxed'];

echo $optAftMktSevenCode=$_GET['optAftMktSevenCode'];
echo $optAftMktSevenList=$_GET['optAftMktSevenList']; //0.00
echo $optAftMktSevenPrice=$_GET['optAftMktSevenPrice'];
echo $optAftMktSevenCost=$_GET['optAftMktSevenCost'];
echo $optAftMktSevenTaxed=$_GET['optAftMktSevenTaxed'];


echo $insuranceCost=$_GET['insuranceCost']; //0.00
echo $insurMonths=$_GET['insurMonths']; //0.00
echo $insurCreditlife=$_GET['insurCreditlife']; //0.00
echo $insurAccHealth=$_GET['insurAccHealth']; //0.00


echo $extServicePlan=$_GET['extServicePlan']; //0.00
echo $extSrvcpremium=$_GET['extSrvcpremium']; //0.00
echo $extSrvcdeduct=$_GET['extSrvcdeduct']; //0.00


echo $LicenseTitleFee=$_GET['LicenseTitleFee']; //15.00
echo $deliveryFee=$_GET['deliveryFee']; //270.00
echo $feesSalesTax=$_GET['feesSalesTax']; //
echo $allAdded=$_GET['allAdded']; //
echo $amountDDue=$_GET['amountDDue']; //
echo $leinHolderSelct=$_GET['leinHolderSelct']; //Select+Lender
echo $apr=$_GET['apr']; //7.990
echo $firstpymt=$_GET['firstpymt']; //30
echo $term=$_GET['term']; //48
echo $msrp=$_GET['msrp']; //
echo $dayResults=$_GET['dayResults']; //0.0
echo $residualDollar=$_GET['residualDollar']; //0.00


echo $monthlyPymt=$_GET['monthlyPymt']; //
echo $monthlyPymts=$_GET['monthlyPymts']; //0.00

echo $totalPayments=$_GET['totalPayments']; //0.00

echo $totalFinanceCharges=$_GET['totalFinanceCharges']; //0.00




			//vEngineCyls
			$vengine=$row_qryVstock['vengine'];

//vVin  - Already Used
//vMileage  - Already Used

$vLeinHolderNm =$_GET['vLeinHolderNm'];
$vLeinHolderAddr =$_GET['vLeinHolderAddr'];
$vLeinHolderAddr2 =$_GET['vLeinHolderAddr2'];
$vLeinHolderCity =$_GET['vLeinHolderCity'];
$vLeinHolderState =$_GET['vLeinHolderState'];
$vLeinHolderZip =$_GET['vLeinHolderZip'];
$vLeinHolderLeinNo =$_GET['vLeinHolderLeinNo'];
$vLeinHolderPhnNo =$_GET['vLeinHolderPhnNo'];



$vInsurCompNm =$_GET['vInsurCompNm'];
$vInsurCompAddr =$_GET['vInsurCompAddr'];
$vInsurCompAddr2 =$_GET['vInsurCompAddr2'];
$vInsurCompCity =$_GET['vInsurCompCity'];
$vInsurCompState =$_GET['vInsurCompState'];
$vInsurCompZip =$_GET['vInsurCompZip'];

$receiptNo =$_GET['receiptNo'];
$receiptNo2 =$_GET['receiptNo2'];

$cashDeposit = $_GET['cashDeposit'];

$COD = $_GET['COD'];

echo $tradeACV=$_GET['tradeACV']; //0.00
//$OA
$OA = '';


$vTradeYr = $_GET['vTradeYr'];

// This was used to keep ajax working on sales desk and use those column name for mysql query on GET Method
 $vTradeMk = $_GET['vTradeMk'];
 $vTradeModel = $_GET['vTradeModel'];
echo $trademake=$_GET['trademake']; //0.00
echo @$subcat=$_GET['subcat']; //0.00

$vTradeTrim = $_GET['vTradeTrim'];
$vTradeColor = $_GET['vTradeColor'];
$vTradeVin = $_GET['vTradeVin'];
$vTradeMiles = $_GET['vTradeMiles'];

echo $vTradeAllow=$_GET['vTradeAllow']; //0.00
echo $vTradePayOff=$_GET['vTradePayOff']; //0.00



echo $vTradeLicsfee=$_GET['vTradeLicsfee']; //0.00

$vTradeDecal =$_GET['vTradeDecal'];
$vTradeStikNo =$_GET['vTradeStikNo'];
$vTradeOwner =$_GET['vTradeOwner'];
$vTradeTagNo =$_GET['vTradeTagNo'];
$vTradeTagState =$_GET['vTradeTagState'];
$vTradeTitle =$_GET['vTradeTitle'];
$vTradeTagExprDate =$_GET['vTradeTagExprDate'];
$leinHolderTradeSelct =$_GET['leinHolderTradeSelct'];
$vTradePayoffCompany =$_GET['vTradePayoffCompany'];
$vTradeLeinHldrAcctNo =$_GET['vTradeLeinHldrAcctNo'];
$vTradePayoffCompanyAddr =$_GET['vTradePayoffCompanyAddr'];
$vTradePayoffCompanyAddr2 =$_GET['vTradePayoffCompanyAddr2'];
$vTradeVerifiedBy =$_GET['vTradeVerifiedBy'];
$vTradePayoffCompanyCity =$_GET['vTradePayoffCompanyCity'];
$vTradePayoffCompanyState =$_GET['vTradePayoffCompanyState'];
$vTradePayoffCompanyZip =$_GET['vTradePayoffCompanyZip'];



echo $vTradePayoffGoodUntil = $_GET['vTradePayoffGoodUntil'];
echo $vTradePayoffPerDiem = $_GET['vTradePayoffPerDiem'];
$vTradePayoffCompanyPhoneno=$_GET['vTradePayoffCompanyPhoneno'];

$vTradeRemarksAttached = $_GET['vTradeRemarksAttached'];
$receiptNo = $_GET['receiptNo'];
$receiptNo2 = $_GET['receiptNo2'];

$vTradePayoffPerDiem = $_GET['vTradePayoffPerDiem'];



echo $rebateToReduceSalesPrice = $_GET['rebateToReduceSalesPrice'];
echo $VSIFEE = $_GET['VSIFEE'];
echo $loanProcessingFee = $_GET['loanProcessingFee'];

echo $dealerOptionsTotal = $_GET['optionsAftermarket'];
echo $leinHolderTradeSelct = $_GET['leinHolderTradeSelct'];
echo $vTradeDecal = $_GET['vTradeDecal'];
echo $vTradeStikNo = $_GET['vTradeStikNo'];
echo $vTradeOwner = $_GET['vTradeOwner'];
echo $vTradeTagNo = $_GET['vTradeTagNo'];
echo $vTradeTagState = $_GET['vTradeTagState'];
echo $vTradeTitle = $_GET['vTradeTitle'];
echo $vTradeTagExprDate = $_GET['vTradeTagExprDate'];
echo $vTradeLeinHldrAcctNo=$_GET['vTradeLeinHldrAcctNo'];
echo $vTradePayoffCompanyAddr = $_GET['vTradePayoffCompanyAddr'];
echo $vTradePayoffCompanyAddr2 = $_GET['vTradePayoffCompanyAddr2'];
echo $vTradeOpenRO = $_GET['vTradeOpenRO'];

echo $vTradePayoffPerDiem=$_GET['vTradePayoffPerDiem'];

echo '<br>';
echo '<br>';
echo '<br>';

$licsFee = $_GET['licsFee'];
$titleFee = $_GET['titleFee'];
$stateInspect = $_GET['stateInspect'];
$licsNtitlefee = $_GET['licsNtitlefee'];

$stateTaxperc = $_GET['stateTaxperc'];
$stateTaxpercTotal = $_GET['stateTaxpercTotal'];
$taxCountyperc = $_GET['taxCountyperc'];
$taxCountypercTotal = $_GET['taxCountypercTotal'];
$taxCityperc = $_GET['taxCityperc'];
$taxCitypercTotal = $_GET['taxCitypercTotal'];
$taxState = $_GET['taxState'];
?>
<?php

// Removed Dealer Options4CodeID
// `dealerOptions4CodeID` =  '$optAftMktFourCode',
// On Line 629  warrantyPrice


$dealID = $_GET['deal_id'];


$updateOverwrite =  "UPDATE `idsids_idsdms`.`deals_bydealer`
							SET
							`deal_token` = '$tkey',
							`deal_number` = '$dDealno',
							`deal_dealerID` = '$did',
							`credit_app_id`	= '$vVIN',
							`vehicle_id` = '$vid',
							`customer_id` = '$customerid',							
							`salesPerson1ID` = '$salesperson1_id',
							`salesPerson1Name` = '$sp1name',
							`salesPerson2ID` = '$salesperson2_id',
							`salesPerson2Name` = '$sp2name',
							`salesMgrName` = '$salesmgr',
							`financeMgrName` = '$fnimgr',
							`vStockno` = '$vStockNo',
							`vCondition` = '$vcondition',
							`vYear` = '$vyear',
							`vMake` = '$vmake',
							`vModel` = '$vmodel',
							`vTrim` = '$vtrim',
							`vBodyType` = '$vbody',
							`vColor` = '$vecolor_txt',
							`vEngineCyls` = '$vengine',
							`vVin` = '$vVIN',
							`vMileage` = '$vmileage',
							`vLeinHolderNm` = '$vLeinHolderNm',
							`vLeinHolderAddr` = '$vLeinHolderAddr',							
							`vLeinHolderAddr2` = '$vLeinHolderAddr2',
							`vLeinHolderCity` = '$vLeinHolderCity',
							`vLeinHolderState` = '$vLeinHolderState',
							`vLeinHolderZip` = '$vLeinHolderZip',
							`vLeinHolderLeinNo` = '$vLeinHolderLeinNo',
							`vLeinHolderPhnNo` = '$vLeinHolderPhnNo',
							`vInsurCompNm` = 'vInsurCompNm',
							`vInsurCompAddr` = '$vInsurCompAddr',
							`vInsurCompAddr2` = '$vInsurCompAddr2',
							`vInsurCompCity` = '$vInsurCompCity',
							`vInsurCompState` = '$vInsurCompState',
							`vInsurCompZip` = '$vInsurCompZip',							
							`tradeACV` = '$tradeACV',
							`vTradeYr` = '$vTradeYr',
							`vTradeMk` = '$vTradeMk',
							`vTradeModel` = '$vTradeModel',
							`vTradeTrim` = '$vTradeTrim',	
							`vTradeColor` = '$vTradeColor',
							`vTradeVin` = '$vTradeVin',
							`vTradeMiles` = '$vTradeMiles',
							`vTradeAllow` = '$vTradeAllow',
							`vTradePayoff` = '$vTradePayOff',
							`vTradeLicsfee` = '$vTradeLicsfee',
							`vTradeDecal` = '$vTradeDecal',
							`vTradeStikNo` = '$vTradeStikNo',
							`vTradeOwner` = '$vTradeOwner',
							`vTradeTagNo` = '$vTradeTagNo',
							`vTradeTagState` = '$vTradeTagState',
							`vTradeTitle` = '$vTradeTitle',
							`vTradeTagExprDate` = '$vTradeTagExprDate',
							`leinHolderTradeSelct` = '$leinHolderTradeSelct',																																			
							`vTradePayoffCompany` = '$vTradePayoffCompany',
							`vTradeLeinHldrAcctNo` = '$vTradeLeinHldrAcctNo',
							`vTradePayoffCompanyAddr` = '$vTradePayoffCompanyAddr',
							`vTradePayoffCompanyAddr2` = '$vTradePayoffCompanyAddr2',
							`vTradeVerifiedBy` = '$vTradeVerifiedBy',
							`vTradePayoffCompanyCity` = '$vTradePayoffCompanyCity',
							`vTradePayoffCompanyState` = '$vTradePayoffCompanyState',
							`vTradePayoffCompanyZip` = '$vTradePayoffCompanyZip',
							`vTradePayoffGoodUntil` = '$vTradePayoffGoodUntil',
							`vTradePayoffPerDiem` = '$vTradePayoffPerDiem',
							`vTradePayoffCompanyPhoneno` = 'vTradePayoffCompanyPhoneno',
							`vTradeOpenRO` = '$vTradeOpenRO',
							`vTradeRemarksAttached` = '$vTradeRemarksAttached',
							`receiptNo` = '$receiptNo',
							`receiptNo2` = '$receiptNo2',
							`priceVehicle` = '$priceVehicle',
							`nonTaxRebate` = '$nonTaxRebate',
							`taxablePrice` = '$taxablePrice',
							`downPayment` = '$downPayment',
							`rebates` = '$rebates',
							`reBateOne` = '$reBateOne',
							`reBateOnedscrp` = '$reBateOnedscrp',
							`reBateOneTax` = '$reBateOneTax',
							`reBateTwo` = '$reBateTwo',
							`reBateTwodscrp` = '$reBateTwodscrp',
							`reBateTwoTax` = '$reBateTwoTax',
							`reBateThree` = '$reBateThree',
							`reBateThreedscrp` = '$reBateThreedscrp',
							`reBateThreeTax` = '$reBateThreeTax',
							`reBateFour` = '$reBateFour',
							`reBateFourdscrp` = '$reBateFourdscrp',
							`reBateFourTax` = '$reBateFourTax',
							`reBateFive` = '$reBateFive',
							`reBateFivedscrp` = '$reBateFivedscrp',
							`reBateFiveTax` = '$reBateFiveTax',
							`rebateToReduceSalesPrice` = '$rebateToReduceSalesPrice',
							`VSIFEE` = '$VSIFEE',
							`loanProcessingFee` = '$loanProcessingFee',
							`dealerOptionsTotal` = '$optionsAftermarket',
							`dealerOptions1CodeID` = '$optAftMktOneCode',
							`dealerOptions1List` = '$optAftMktOneList',
							`dealerOptions1` = '$optAftMktOnePrice',
							`dealerOptions1Cost` = '$optAftMktOneCost',
							`dealerOptions1Tax` = '$optAftMktOneTaxed',
							`dealerOptions2CodeID` = '$optAftMktTwoCode',
							`dealerOptions2List` = '$optAftMktTwoList',
							`dealerOptions2` = '$optAftMktTwoPrice',
							`dealerOptions2Cost` = '$optAftMktTwoCost',
							`dealerOptions2Tax` = '$optAftMktTwoTaxed',
							`dealerOptions3CodeID` = '$optAftMktThreeCode',
							`dealerOptions3List` = '$optAftMktThreeList',
							`dealerOptions3` = '$optAftMktThreePrice',
							`dealerOptions3Cost` = '$optAftMktThreeCost',
							`dealerOptions3Tax`	= '$optAftMktThreeTaxed',
							`dealerOptions4CodeID` =  '$optAftMktFourCode',
							`dealerOptions4List` = '$optAftMktFourList',
							`dealerOptions4` = '$optAftMktFourPrice',
							`dealerOptions4Cost` = '$optAftMktFourCost',
							`dealerOptions4Tax` = '$optAftMktFourTaxed',
							`dealerOptions5CodeID` = '$optAftMktFiveCode',
							`dealerOptions5List` = '$optAftMktFiveList',
							`dealerOptions5` = '$optAftMktFivePrice',
							`dealerOptions5Cost` = '$optAftMktFiveCost',
							`dealerOptions5Tax` = '$optAftMktFiveTaxed',
							`dealerOptions6CodeID` = '$optAftMktSixCode',
							`dealerOptions6List` = '$optAftMktSixList',
							`dealerOptions6` = '$optAftMktSixPrice',
							`dealerOptions6Cost` = '$optAftMktSixCost',
							`dealerOptions6Tax` = '$optAftMktSixTaxed',
							`dealerOptions7CodeID` = '$optAftMktSixCode',
							`dealerOptions7List` = '$optAftMktSevenList',
							`dealerOptions7` = '$optAftMktSevenPrice',
							`dealerOptions7Cost` = '$optAftMktSevenCost',
							`dealerOptions7Tax` = '$optAftMktSevenTaxed',
							`insuranceCost` = '$insuranceCost',
							`insurMonths` = '$insurMonths',
							`insurCreditlife` = '$insurCreditlife',
							`insurAccHealth` = '$insurAccHealth',
							`extServicePlan` = '$extServicePlan',
							`extSrvcMonths` = '$extSrvcMonths',
							`extSrvcCompany` = '$extSrvcCompany',
							`extSrvcMiles` = '$extSrvcMiles',
							`extSrvcStartDate` = '$extSrvcStartDate',
							`extSrvcContractNo` = '$extSrvcContractNo',
							`extSrvcStartMiles` = '$extSrvcStartMiles',
							`extSrvcEndDate` = '$extSrvcEndDate',
							`extSrvcPremium` = '$extSrvcPremium',
							`extSrvcdeduct` = '$extSrvcdeduct',
							`extSrvcEndMiles` = '$extSrvcEndMiles',
							`cashDeposit` = '$downPayment',
							`tradePayoff` = '$tradePayoff',
							`COD` = '$COD',
							`tradeAllowance` = '$tradeAllowance',
							`docServiceFee` = '$deliveryFee',
							`stateSalesTax` = '$feesSalesTax',
							`licsFee` = '$licsFee',
							`titleFee` = '$titleFee',
							`stateInspect` = '$stateInspect',							
							`licsNtitlefee` = '$licsNtitlefee',
							`stateTaxperc` = '$stateTaxperc',
							`stateTaxpercTotal` = '$stateTaxpercTotal',							
							`taxCountyperc` = '$taxCountyperc',							
							`taxCountypercTotal` = '$taxCountypercTotal',							
							`taxCityperc` = '$taxCityperc',							
							`taxCitypercTotal` = '$taxCitypercTotal',							
							`taxState` = '$taxState',
							`warrantyPrice` = '$extSrvcpremium',
							`monthlypymts` = '$monthlyPymts',
							`amountDDue` = '$amountDDue',
							`apr` = '$apr',
							`firstpymt` = '$firstpymt',
							`term` = '$term',
							`msrp` = '$msrp',
							`dayResults` = '$dayResults',
							`residualDollar` = '$residualDollar',
							`totalPayments` = '$totalPayments',
							`totalFinanceCharges` = '$totalFinanceCharges',
							`monthlyPymtd` = '$monthlyPymt'
						   WHERE
							`deals_bydealer`.`deal_dealerID` = '$did' AND 						   
							`deals_bydealer`.`deal_id` = '$dealID' 
						   LIMIT 1
						   ";





		$insertCustomer = "INSERT INTO `deals_bydealer` (`deal_token`, `deal_number`, `deal_dealerID`, `vehicle_id`, `customer_id`, `salesPerson1ID`, `salesPerson1Name`, `salesPerson2ID`, `salesPerson2Name`, `salesMgrName`, `financeMgrName`, `vStockno`, `vCondition`, `vYear`, `vMake`, `vModel`, `vTrim`, `vBodyType`, `vColor`, `vEngineCyls`, `vVin`, `vMileage`, `vLeinHolderNm`, `vLeinHolderAddr`, `vLeinHolderAddr2`, `vLeinHolderCity`, `vLeinHolderState`, `vLeinHolderZip`, `vLeinHolderLeinNo`, `vLeinHolderPhnNo`, `vInsurCompNm`, `vInsurCompAddr`, `vInsurCompAddr2`, `vInsurCompCity`, `vInsurCompState`, `vInsurCompZip`, `tradeACV`, `vTradeYr`, `vTradeMk`, `vTradeModel`, `vTradeTrim`, `vTradeColor`, `vTradeVin`, `vTradeMiles`, `vTradeAllow`, `vTradePayOff`, `vTradeLicsfee`, `vTradeDecal`, `vTradeStikNo`, `vTradeOwner`, `vTradeTagNo`, `vTradeTagState`, `vTradeTitle`, `vTradeTagExprDate`, `leinHolderTradeSelct`, `vTradePayoffCompany`, `vTradeLeinHldrAcctNo`, `vTradePayoffCompanyAddr`, `vTradePayoffCompanyAddr2`, `vTradeVerifiedBy`, `vTradePayoffCompanyCity`, `vTradePayoffCompanyState`, `vTradePayoffCompanyZip`, `vTradePayoffGoodUntil`, `vTradePayoffPerDiem`, `vTradePayoffCompanyPhoneno`, `vTradeOpenRO`, `vTradeRemarksAttached`, `receiptNo`, `receiptNo2`, `priceVehicle`, `nonTaxRebate`, `taxablePrice`, `downPayment`, `rebates`, `reBateOne`, `reBateOnedscrp`, `reBateOneTax`, `reBateTwo`, `reBateTwodscrp`, `reBateTwoTax`, `reBateThree`, `reBateThreedscrp`, `reBateThreeTax`, `reBateFour`, `reBateFourdscrp`, `reBateFourTax`, `reBateFive`, `reBateFivedscrp`, `reBateFiveTax`, `rebateToReduceSalesPrice`, `VSIFEE`, `loanProcessingFee`, `dealerOptionsTotal`, `dealerOptions1CodeID`,`dealerOptions1List`, `dealerOptions1`, `dealerOptions1Cost`, `dealerOptions1Tax`, `dealerOptions2CodeID`, `dealerOptions2List`, `dealerOptions2`, `dealerOptions2Cost`, `dealerOptions2Tax`, `dealerOptions3CodeID`, `dealerOptions3List`, `dealerOptions3`, `dealerOptions3Cost`, `dealerOptions3Tax`, `dealerOptions4CodeID`, `dealerOptions4List`, `dealerOptions4`, `dealerOptions4Cost`, `dealerOptions4Tax`, `dealerOptions5CodeID`, `dealerOptions5List`, `dealerOptions5`, `dealerOptions5Cost`, `dealerOptions5Tax`, `dealerOptions6CodeID`,  `dealerOptions6List`, `dealerOptions6`, `dealerOptions6Cost`, `dealerOptions6Tax`, `dealerOptions7CodeID`, `dealerOptions7List`, `dealerOptions7`, `dealerOptions7Cost`, `dealerOptions7Tax`, `insuranceCost`, `insurMonths`, `insurCreditlife`, `insurAccHealth`, `extServicePlan`, `extSrvcMonths`, `extSrvcCompany`, `extSrvcMiles`, `extSrvcStartDate`, `extSrvcContractNo`, `extSrvcStartMiles`, `extSrvcEndDate`, `extSrvcdeduct`, `extSrvcEndMiles`, `cashDeposit`, `tradePayoff`, `COD`, `tradeAllowance`, `docServiceFee`, `stateSalesTax`, `titleFee`, `stateInspect`, `warrantyPrice`, `monthlyPymts`, `amountDDue`, `apr`, `firstpymt`, `term`, `msrp`, `dayResults`, `residualDollar`, `totalPayments`, `totalFinanceCharges`, `monthlyPymtd`)
		VALUES ('$tkey','$lastdealno', '$did', '$vid', '$customerid', '$salesperson1_id', '$sp1name', '$salesperson2_id', '$sp2name', '$salesmgr', '$fnimgr', '$vStockNo', '$vcondition', '$vyear', '$vmake', '$vmodel', '$vtrim', '$vbody', '$vecolor_txt', '$vengine', '$vVIN', '$vmileage',  '$vLeinHolderNm', '$vLeinHolderAddr', '$vLeinHolderAddr2', '$vLeinHolderCity', '$vLeinHolderState', '$vLeinHolderZip', '$vLeinHolderLeinNo', '$vLeinHolderPhnNo', '$vInsurCompNm', '$vInsurCompAddr', '$vInsurCompAddr2', '$vInsurCompCity', '$vInsurCompState', '$vInsurCompZip', '$tradeACV', '$vTradeYr', '$trademake', '$subcat', '$vTradeTrim', '$vTradeColor', '$vTradeVin', '$vTradeMiles', '$vTradeAllow', '$vTradePayOff', '$vTradeLicsfee', '$vTradeDecal', '$vTradeStikNo', '$vTradeOwner', '$vTradeTagNo', '$vTradeTagState',  '$vTradeTitle', '$vTradeTagExprDate', '$leinHolderTradeSelct', '$vTradePayoffCompany', '$vTradeLeinHldrAcctNo', '$vTradePayoffCompanyAddr', '$vTradePayoffCompanyAddr2', '$vTradeVerifiedBy', '$vTradePayoffCompanyCity', '$vTradePayoffCompanyState', '$vTradePayoffCompanyZip', '$vTradePayoffGoodUntil', '$vTradePayoffPerDiem', '$vTradePayoffCompanyPhoneno', '$vTradeOpenRO', '$vTradeRemarksAttached', '$receiptNo', '$receiptNo2', '$priceVehicle', '$nonTaxRebate', '$taxablePrice', '$downPayment', '$rebates', '$reBateOne', '$reBateOnedscrp', '$reBateOneTax', '$reBateTwo', '$reBateTwodscrp', '$reBateTwoTax', '$reBateThree', '$reBateThreedscrp', '$reBateThreeTax', '$reBateFour', '$reBateFourdscrp', '$reBateFourTax', '$reBateFive', '$reBateFivedscrp', '$reBateFiveTax', '$rebateToReduceSalesPrice', '$VSIFEE', '$loanProcessingFee', '$dealerOptionsTotal', '$optAftMktOneCode', '$optAftMktOneList', '$optAftMktOnePrice', '$optAftMktOneCost', '$optAftMktOneTaxed', '$optAftMktTwoCode', '$optAftMktTwoList', '$optAftMktTwoPrice', '$optAftMktTwoCost', '$optAftMktTwoTaxed', '$optAftMktThreeCode', '$optAftMktThreeList', '$optAftMktThreePrice', '$optAftMktThreeCost', '$optAftMktThreeTaxed', '$optAftMktFourCode', '$optAftMktFourList', '$optAftMktFourPrice', '$optAftMktFourCost', '$optAftMktFourTaxed', '$optAftMktFiveCode', '$optAftMktFiveList', '$optAftMktFivePrice', '$optAftMktFiveCost', '$optAftMktFiveTaxed', '$optAftMktSixCode', '$optAftMktSixList', '$optAftMktSixPrice', '$optAftMktSixCost', '$optAftMktSixTaxed', '$optAftMktSevenCode', '$optAftMktSevenList', '$optAftMktSevenPrice', '$optAftMktSevenCost', '$optAftMktSevenTaxed', '$insuranceCost', '$insurMonths', '$insurCreditlife', '$insurAccHealth', '$extServicePlan', '$extSrvcMonths', '$extSrvcCompany', '$extSrvcMiles', '$extSrvcStartDate', '$extSrvcContractNo', '$extSrvcStartMiles', '$extSrvcEndDate', '$extSrvcdeduct', '$extSrvcEndMiles', '$cashDeposit', '$tradePayoff', '$COD', '$tradeAllowance', '$docServiceFee', '$stateSalesTax', '$titleFee', '$stateInspect', '$extSrvcpremium', '$monthlyPymts', '$amountDDue', '$apr', '$firstpymt', '$term', '$msrp', '$dayResults', '$residualDollar', '$totalPayments', '$totalFinanceCharges', '$monthlyPymt')";


$updateOverwrite = mysqli_query($idsconnection_mysqli, "$updateOverwrite");
		//$insertSQL = mysqli_query($idsconnection_mysqli, "$insertCustomer");

header("Location: deals.php");





echo $updateOverwrite;

//echo '<br>'.'<br>'.'<br>';

//echo $insertCustomer;
?>
<html>

<head>
<title>Script After Selecting Inventory To Add</title>
<!-- meta http-equiv="refresh" content="0; url=http://idscrm.com/dealer/deals.php" -->

</head>

<body>

</body>

</html>
<?php
mysqli_free_result($userDets);

mysqli_free_result($qryVstock);

mysqli_free_result($customers);

mysqli_free_result($salesperson1);

mysqli_free_result($salesperson2);

mysqli_free_result($qry_Customers);

mysqli_free_result($fNImanager);

mysqli_free_result($lastCustomerNo);

mysqli_free_result($lastDlrdeal);
?>

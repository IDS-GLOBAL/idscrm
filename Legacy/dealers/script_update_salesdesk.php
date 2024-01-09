<?php

if(!$_POST)exit;

require_once("db_loggedin.php");
//print_r($_POST);

if(isset($_POST['deal_id'], $_POST['amountDDue'], $_POST['tavt_fee_required'], $_POST['tavt_fee'], $_POST['priceVehicle'], $_POST['nonTaxRebate'], $_POST['taxablePrice'], $_POST['downPayment'], $_POST['rebates'], $_POST['reBateOne'], $_POST['reBateOnedscrp'], $_POST['reBateOneTax'], $_POST['reBateTwo'], $_POST['reBateTwodscrp'], $_POST['reBateTwoTax'], $_POST['reBateThree'], $_POST['reBateThreedscrp'], $_POST['reBateThreeTax'], $_POST['reBateFour'], $_POST['reBateFourdscrp'], $_POST['reBateFourTax'], $_POST['reBateFive'], $_POST['reBateFivedscrp'], $_POST['reBateFiveTax'], $_POST['tradeAllowance'], $_POST['tradePayoff'], $_POST['optionsAftermarket'], $_POST['optAftMktOneCode'], $_POST['optAftMktOneList'], $_POST['optAftMktOnePrice'], $_POST['optAftMktOneCost'], $_POST['optAftMktOneTaxed'], $_POST['optAftMktOneTaxedtxt'], $_POST['optAftMktTwoCode'], $_POST['optAftMktTwoList'], $_POST['optAftMktTwoPrice'], $_POST['optAftMktTwoCost'], $_POST['optAftMktTwoTaxed'], $_POST['optAftMktTwoTaxedtxt'], $_POST['optAftMktThreeCode'], $_POST['optAftMktThreeList'], $_POST['optAftMktThreePrice'], $_POST['optAftMktThreeCost'], $_POST['optAftMktThreeTaxed'], $_POST['optAftMktThreeTaxedtxt'], $_POST['optAftMktFourCode'], $_POST['optAftMktFourList'], $_POST['optAftMktFourPrice'], $_POST['optAftMktFourCost'], $_POST['optAftMktFourTaxed'], $_POST['optAftMktFourTaxedtxt'], $_POST['optAftMktFiveCode'], $_POST['optAftMktFiveList'], $_POST['optAftMktFivePrice'], $_POST['optAftMktFiveCost'], $_POST['optAftMktFiveTaxed'], $_POST['optAftMktFiveTaxedtxt'], $_POST['optAftMktSixCode'], $_POST['optAftMktSixList'], $_POST['optAftMktSixPrice'], $_POST['optAftMktSixCost'], $_POST['optAftMktSixTaxed'], $_POST['optAftMktSixTaxedtxt'], $_POST['optAftMktSevenCode'], $_POST['optAftMktSevenCodetxt'], $_POST['optAftMktSevenList'], $_POST['optAftMktSevenPrice'], $_POST['optAftMktSevenCost'], $_POST['optAftMktSevenTaxed'], $_POST['optAftMktSevenTaxedtxt'], $_POST['insuranceCost'], $_POST['insurMonths'], $_POST['insurCreditlife'], $_POST['insurAccHealth'], $_POST['extServicePlan'], $_POST['extSrvcMonths'], $_POST['extSrvcMiles'], $_POST['extSrvcStartDate'], $_POST['extSrvcStartMiles'], $_POST['extSrvcEndDate'], $_POST['extSrvcEndMiles'], $_POST['extSrvcCompany'], $_POST['extSrvcCompanytxt'], $_POST['extSrvcContractNo'], $_POST['extSrvcPremium'], $_POST['extSrvcdeduct'], $_POST['LicenseTitleFee'], $_POST['deliveryFee'], $_POST['noTaxes'], $_POST['settingSateSlsTax'], $_POST['feesSalesTax'], $_POST['leinHolderSelct'], $_POST['leinHolderSelcttxt'], 		$_POST['vLeinHolderNm'], $_POST['vLeinHolderAddr'], $_POST['vLeinHolderAddr2'], $_POST['vLeinHolderCity'], $_POST['vLeinHolderState'], $_POST['vLeinHolderZip'], $_POST['vLeinHolderLeinNo'], $_POST['vLeinHolderPhnNo'], $_POST['apr'], $_POST['firstpymt'], $_POST['term'], $_POST['msrp'], $_POST['dayResults'], $_POST['residualDollar'], $_POST['monthlyPymt'], $_POST['monthlyPymts'], $_POST['totalPayments'], $_POST['totalFinanceCharges'], $_POST['vTradeVerifiedBy'], $_POST['vTradeVerifiedBytxt'], $_POST['vTradeVin'], $_POST['vTradeYr'] , $_POST['vTradeMk'], $_POST['vTradeModel'], $_POST['vTradeTrim'], $_POST['vTradeMiles'], $_POST['vTradeColor'], $_POST['vTradeAllow'], $_POST['vTradeLicsfee'], $_POST['vTradeTagNo'], $_POST['vTradeTitle'], $_POST['leinHolderTradeSelct'], $_POST['vTradePayoffCompany'], $_POST['vTradeLeinHldrAcctNo'], $_POST['vTradePayoffCompanyAddr'], $_POST['vTradePayoffCompanyAddr2'], $_POST['vTradePayoffCompanyZip'], $_POST['vTradePayoffCompanyCity'], $_POST['vTradePayoffCompanyState'], $_POST['vTradePayoffCompanyPhoneno'], $_POST['vTradePayoffGoodUntil'], $_POST['vTradePayoffPerDiem'], $_POST['vTradeDecal'], $_POST['vTradeOwner'], $_POST['vTradeRemarksAttached'], $_POST['vTradePayOff'], $_POST['tradeACV'],$_POST['vTradeTagState'], $_POST['vTradeTagExprDate'], $_POST['vTradeStikNo'], $_POST['vTradeOpenRO'], $_POST['cashDeposit'], $_POST['COD'], $_POST['rebateToReduceSalesPrice'], $_POST['VSIFEE'], $_POST['loanProcessingFee'], $_POST['receiptNo'], $_POST['receiptNo2'], $_POST['licsFee'], $_POST['titleFee'], $_POST['licsNtitlefee'], $_POST['stateTaxperc'], $_POST['stateTaxpercTotal'], $_POST['taxCountyperc'], $_POST['taxCountypercTotal'], $_POST['taxCityperc'], $_POST['taxCitypercTotal'], $_POST['taxState'], $_POST['defaultstatetaxread'], $_POST['stateInspect'], $_POST['vInsurCompNm'], $_POST['vInsurCompAddr'], $_POST['vInsurCompAddr2'], $_POST['vInsurCompCity'], $_POST['vInsurCompState'], $_POST['vInsurCompZip'], $_POST['vInsurComp_slct'])){


	echo 'I made it yo';


    $deal_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['deal_id'])); // 36855a7a779d9cb382bd
    $amountDDue = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['amountDDue'])); //
	$tavt_fee_required = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tavt_fee_required'])); // Taft Fee
	$tavt_fee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tavt_fee'])); // Taft Fee

	$salesPerson1ID = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesPerson1ID']));
	$salesPerson1Name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesPerson1Name']));
	$salesPerson2ID  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesPerson2ID']));
	$salesPerson2Name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesPerson2Name']));
	
	$salesMgrID = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesMgrID']));
	$salesMgrName = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesMgrName']));
	
	$salesMgrName = str_replace('Select', '', $salesMgrName);
	
	
	
	$financeMgrID = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['financeMgrID']));
	$financeMgrName = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['financeMgrName']));
	$financeMgrName = str_replace('Select', '', $financeMgrName);
	
    $priceVehicle = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['priceVehicle'])); // 9995.00
    $nonTaxRebate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['nonTaxRebate'])); 
    $taxablePrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['taxablePrice'])); 
    $downPayment = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['downPayment'])); 
    $rebates = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['rebates'])); 
    $reBateOne = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateOne'])); 
    $reBateOnedscrp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateOnedscrp'])); // 
    $reBateOneTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateOneTax'])); 
    $reBateTwo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateTwo'])); 
    $reBateTwodscrp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateTwodscrp'])); // 
    $reBateTwoTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateTwoTax'])); 
    $reBateThree = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateThree'])); 
    $reBateThreedscrp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateThreedscrp'])); // 
    $reBateThreeTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateThreeTax'])); 
    $reBateFour = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateFour'])); 
    $reBateFourdscrp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateFourdscrp'])); // 
    $reBateFourTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateFourTax'])); 
    $reBateFive = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateFive'])); 
    $reBateFivedscrp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateFivedscrp'])); // 
    $reBateFiveTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['reBateFiveTax'])); 
    $tradeAllowance = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeAllowance'])); 
    $tradePayoff = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradePayoff'])); 
    $optionsAftermarket = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optionsAftermarket'])); 
    $optAftMktOneCode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktOneCode'])); // Select
    $optAftMktOneCodetxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktOneCodetxt'])); // Select

	$optAftMktOneCode = str_replace('Select', '', $optAftMktOneCode);
	$optAftMktOneCodetxt = str_replace('Select', '', $optAftMktOneCodetxt);


    $optAftMktOneList = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktOneList'])); 
    $optAftMktOnePrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktOnePrice'])); 
    $optAftMktOneCost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktOneCost'])); 
    $optAftMktOneTaxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktOneTaxed'])); 
    $optAftMktOneTaxedtxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktOneTaxedtxt'])); 
    $optAftMktTwoCode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktTwoCode'])); // Select
    $optAftMktTwoCodetxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktTwoCodetxt'])); // Select


	$optAftMktTwoCode = str_replace('Select', '', $optAftMktTwoCode);
	$optAftMktTwoCodetxt = str_replace('Select', '', $optAftMktTwoCodetxt);


    $optAftMktTwoList = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktTwoList'])); 
    $optAftMktTwoPrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktTwoPrice'])); 
    $optAftMktTwoCost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktTwoCost'])); 
    $optAftMktTwoTaxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktTwoTaxed'])); 
    $optAftMktTwoTaxedtxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktTwoTaxedtxt'])); 
    $optAftMktThreeCode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktThreeCode'])); // Select
    $optAftMktThreeCodetxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktThreeCodetxt'])); // Select

	$optAftMktThreeCode = str_replace('Select', '', $optAftMktThreeCode);
	$optAftMktThreeCodetxt = str_replace('Select', '', $optAftMktThreeCodetxt);


    $optAftMktThreeList = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktThreeList'])); 
    $optAftMktThreePrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktThreePrice'])); 
    $optAftMktThreeCost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktThreeCost'])); 
    $optAftMktThreeTaxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktThreeTaxed'])); 
    $optAftMktThreeTaxedtxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktThreeTaxedtxt'])); 
	
    $optAftMktFourCode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFourCode'])); // Select
    $optAftMktFourCodetxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFourCodetxt'])); // Select
	
	$optAftMktFourCode = str_replace('Select', '', $optAftMktFourCode);
	$optAftMktFourCodetxt = str_replace('Select', '', $optAftMktFourCodetxt);

	
    $optAftMktFourList = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFourList'])); 
    $optAftMktFourPrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFourPrice'])); 
    $optAftMktFourCost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFourCost'])); 
    $optAftMktFourTaxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFourTaxed'])); 
    $optAftMktFourTaxedtxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFourTaxedtxt'])); 
    
	
	
	$optAftMktFiveCode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFiveCode'])); // Select
    $optAftMktFiveCodetxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFiveCodetxt'])); // Select
	
	$optAftMktFiveCode = str_replace('Select', '', $optAftMktFiveCode);
	$optAftMktFiveCodetxt = str_replace('Select', '', $optAftMktFiveCodetxt);
	
	
    $optAftMktFiveList = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFiveList'])); 
    $optAftMktFivePrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFivePrice'])); 
    $optAftMktFiveCost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFiveCost'])); 
    $optAftMktFiveTaxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFiveTaxed'])); 
    $optAftMktFiveTaxedtxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktFiveTaxedtxt'])); 
	
	
    $optAftMktSixCode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSixCode'])); // Select
    $optAftMktSixCodetxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSixCodetxt'])); // Select

	$optAftMktSixCode = str_replace('Select', '', $optAftMktSixCode);
	$optAftMktSixCodetxt = str_replace('Select', '', $optAftMktSixCodetxt);


    $optAftMktSixList = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSixList'])); 
    $optAftMktSixPrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSixPrice'])); 
    $optAftMktSixCost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSixCost'])); 
    $optAftMktSixTaxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSixTaxed'])); 
    $optAftMktSixTaxedtxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSixTaxedtxt']));

    $optAftMktSevenCode = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSevenCode'])); // Select
    $optAftMktSevenCodetxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSevenCodetxt'])); // Select
	
	$optAftMktSevenCode = str_replace('Select', '', $optAftMktSevenCode);
	$optAftMktSevenCodetxt = str_replace('Select', '', $optAftMktSevenCodetxt);


    $optAftMktSevenList = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSevenList'])); 
    $optAftMktSevenPrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSevenPrice']));
	$optAftMktSevenCost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSevenCost']));
    $optAftMktSevenTaxed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSevenTaxed'])); 
    $optAftMktSevenTaxedtxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['optAftMktSevenTaxedtxt'])); 


    $insuranceCost = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['insuranceCost'])); 
    $insurMonths = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['insurMonths'])); 
    $insurCreditlife = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['insurCreditlife'])); 
    $insurAccHealth= mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['insurAccHealth'])); 
    $extServicePlan = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extServicePlan'])); 
    $extSrvcMonths = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcMonths'])); 
    $extSrvcMiles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcMiles'])); 
    $extSrvcStartDate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcStartDate'])); // 
    $extSrvcStartMiles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcStartMiles'])); 
    $extSrvcEndDate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcEndDate'])); // 
    $extSrvcEndMiles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcEndMiles']));
	
    $extSrvcCompany = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcCompany'])); // Select
    $extSrvcCompanytxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcCompanytxt'])); // Select


    $extSrvcCompany = str_replace('Select', '', $extSrvcCompany); // Select
    $extSrvcCompanytxt = str_replace('Select', '', $extSrvcCompanytxt); // Select


	
	
    $extSrvcContractNo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcContractNo'])); // 
    $extSrvcPremium = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcPremium'])); 
    $extSrvcdeduct = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['extSrvcdeduct'])); 
    $LicenseTitleFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['LicenseTitleFee'])); 
    $deliveryFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['deliveryFee'])); 
    $noTaxes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['noTaxes'])); 
    $settingSateSlsTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingSateSlsTax'])); 
    $feesSalesTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['feesSalesTax'])); //
	
    $leinHolderSelct = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['leinHolderSelct'])); // 
    $leinHolderSelcttxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['leinHolderSelcttxt'])); // Select


    $leinHolderSelct = str_replace('Select', '', $leinHolderSelct); // Select
    $leinHolderSelcttxt = str_replace('Select', '', $leinHolderSelcttxt); // Select



    $apr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['apr'])); // 25.0
    $firstpymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['firstpymt'])); // 30
    $term = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['term'])); 
    $msrp = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['msrp'])); // 
    $dayResults = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dayResults']));
    $residualDollar = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['residualDollar'])); 
    $monthlyPymt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['monthlyPymt'])); // 
    $monthlyPymts = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['monthlyPymts'])); 
    $totalPayments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['totalPayments'])); 
    $totalFinanceCharges = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['totalFinanceCharges'])); 
    $vTradeVerifiedBy = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeVerifiedBy'])); // 
	
    $vTradeVerifiedBytxt = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeVerifiedBytxt'])); // Select Appraiser
    $vTradeVerifiedBytxt = str_replace('Select Appraiser', '',  $vTradeVerifiedBytxt); // Select Appraiser
	
    $leinHolderSelct = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['leinHolderSelct'])); // Select
    $leinHolderSelct = str_replace('Select', '', $leinHolderSelct); // Select

	$vLeinHolderNm = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vLeinHolderNm']));
	$vLeinHolderAddr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vLeinHolderAddr']));
	$vLeinHolderAddr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vLeinHolderAddr2']));
	$vLeinHolderCity = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vLeinHolderCity']));
	$vLeinHolderState = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vLeinHolderState']));
	$vLeinHolderZip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vLeinHolderZip']));
	$vLeinHolderLeinNo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vLeinHolderLeinNo']));
	$vLeinHolderPhnNo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vLeinHolderPhnNo']));

    $vTradeVin = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeVin'])); // 
    $vTradeYr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeYr'])); // 
    $vTradeMk = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeMk'])); // 
    $vTradeModel = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeModel'])); // 
    $vTradeTrim = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeTrim'])); // 
    $vTradeMiles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeMiles'])); // 
    $vTradeColor = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeColor'])); // 
    $vTradeAllow = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeAllow'])); 
    $vTradeLicsfee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeLicsfee'])); 
    $vTradeTagNo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeTagNo'])); // 
    $vTradeTitle = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeTitle'])); // 
    $leinHolderTradeSelct = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['leinHolderTradeSelct'])); // 
    $vTradePayoffCompany = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffCompany'])); // 
    $vTradeLeinHldrAcctNo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeLeinHldrAcctNo'])); // 
    $vTradePayoffCompanyAddr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffCompanyAddr'])); // 
    $vTradePayoffCompanyAddr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffCompanyAddr2'])); // 
    $vTradePayoffCompanyZip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffCompanyZip'])); // 
    $vTradePayoffCompanyCity = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffCompanyCity'])); // 
    $vTradePayoffCompanyState = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffCompanyState'])); // Select State
    $vTradePayoffCompanyState = str_replace('Select State', '', $vTradePayoffCompanyState); // Select State
	
    $vTradePayoffCompanyPhoneno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffCompanyPhoneno'])); // 
    $vTradePayoffGoodUntil = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffGoodUntil'])); // 
    $vTradePayoffPerDiem = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayoffPerDiem'])); 
    $vTradeDecal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeDecal'])); // 
    $vTradeOwner = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeOwner'])); // 
    $vTradeRemarksAttached = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeRemarksAttached'])); // 
    $vTradePayOff = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradePayOff'])); 
    $tradeACV = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tradeACV'])); 
    $vTradeTagState = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeTagState'])); // Select State
    $vTradeTagState = str_replace('Select State', '', $vTradeTagState); // Select State
	
    $vTradeTagExprDate = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeTagExprDate'])); // 
    $vTradeStikNo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeStikNo'])); // 
    $vTradeOpenRO = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vTradeOpenRO'])); 
    $cashDeposit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['cashDeposit'])); 
    $COD = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['COD'])); 
    $rebateToReduceSalesPrice = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['rebateToReduceSalesPrice'])); 
    $VSIFEE = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['VSIFEE'])); 
    $loanProcessingFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['loanProcessingFee'])); 
    $receiptNo = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['receiptNo'])); // 
    $receiptNo2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['receiptNo2'])); // 
    $licsFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['licsFee'])); // 43
    $titleFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['titleFee'])); // 18.00
    $licsNtitlefee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['licsNtitlefee'])); // 43
    $stateTaxperc = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['stateTaxperc']));
    $stateTaxpercTotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['stateTaxpercTotal'])); // 
    $taxCountyperc = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['taxCountyperc'])); // 
    $taxCountypercTotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['taxCountypercTotal'])); // 
    $taxCityperc = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['taxCityperc'])); // 
    $taxCitypercTotal = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['taxCitypercTotal'])); // 
    $taxState = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['taxState']));
    $defaultstatetaxread = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['defaultstatetaxread']));
    $stateInspect = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['stateInspect']));
    $vInsurCompNm = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vInsurCompNm'])); // 
    $vInsurCompAddr = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vInsurCompAddr'])); // 
    $vInsurCompAddr2 = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vInsurCompAddr2'])); // 
    $vInsurCompCity = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vInsurCompCity'])); // 
    $vInsurCompState = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vInsurCompState'])); // Select State
    $vInsurCompState = str_replace('Select State', '', $vInsurCompState); // Select State

    $vInsurCompZip = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vInsurCompZip'])); // 
    $vInsurComp_slct = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vInsurComp_slct'])); // 

    $vInsurComp_slct = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vInsurComp_slct'])); // 
    $vehicle_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vehicle_id'])); // 
    $credit_app_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['credit_app_id'])); // 

 	$deal_number = $row_last_deal_number['deal_number'];
	
	if(!$deal_number) {
		
		$deal_number = '1000';
		
	}else{
		
	 	echo $deal_number = $deal_number+1;
	}


$vStockno = $row_find_vehicle['vstockno'];
$vCondition = $row_find_vehicle['vcondition'];
$vYear = $row_find_vehicle['vyear'];
$vMake = $row_find_vehicle['vmake'];
$vModel = $row_find_vehicle['vmodel'];
$vTrim = $row_find_vehicle['vtrim'];
$vBodyType = $row_find_vehicle['vbody'];
$vColor = $row_find_vehicle['vecolor_txt'];
$vEngineCyls = $row_find_vehicle['vcylinders'];
$vVin = $row_find_vehicle['vvin'];

$vMileage = $row_find_vehicle['vmileage'];





$customer_id = '';
/*
	`tavt_fee_required` = '$tavt_fee_required',
	`tavt_fee` = '$tavt_fee',
	`customer_id` = '$customer_id',
	`salesPerson1ID` = '$salesPerson1ID',
	`salesPerson1Name` = '$salesPerson1Name',
	`salesPerson2ID` = '$salesPerson2ID',
	`salesPerson2Name` = '$salesPerson2Name',

*/

echo $update_salesdesk_sql = "
UPDATE `idsids_idsdms`.`deals_bydealer` SET
	`credit_app_id` = '$credit_app_id',
	`vehicle_id` = '$vehicle_id',
	`customer_id` = '$customer_id',
	`tavt_fee_required` = '$tavt_fee_required',
	`tavt_fee` = '$tavt_fee',
	`salesPerson1ID` = '$salesPerson1ID',
	`salesPerson1Name` = '$salesPerson1Name',
	`salesPerson2ID` = '$salesPerson2ID',
	`salesPerson2Name` = '$salesPerson2Name',
	`salesMgrID` = '$salesMgrID',
	`salesMgrName` = '$salesMgrName',
	`financeMgrID` = '$financeMgrID',
	`financeMgrName` = '$financeMgrName',
	`vStockno` = '$vStockno',
	`vCondition` = '$vCondition',
	`vYear` = '$vYear',
	`vMake` = '$vMake',
	`vModel` = '$vModel',
	`vTrim` = '$vTrim',
	`vBodyType` = '$vBodyType',
	`vColor` = '$vColor',
	`vEngineCyls` = '$vEngineCyls',
	`vVin` = '$vVin',
	`vMileage` = '$vMileage',
    `amountDDue` = '$amountDDue',
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
    `tradeAllowance` = '$tradeAllowance', 
    `tradePayoff` = '$tradePayoff', 
    `dealerOptionsTotal` = '$optionsAftermarket', 
    `dealerOptions1CodeID` = '$optAftMktOneCode',
	`dealerOptionsNm1` = '$optAftMktOneCodetxt',
    `dealerOptions1List` = '$optAftMktOneList', 
    `dealerOptions1` = '$optAftMktOnePrice', 
    `dealerOptions1Cost` = '$optAftMktOneCost', 
    `dealerOptions1Tax` = '$optAftMktOneTaxed', 
    `dealerOptions2CodeID` = '$optAftMktTwoCode',
	`dealerOptionsNm2` = '$optAftMktTwoCodetxt',
    `dealerOptions2List` = '$optAftMktTwoList', 
    `dealerOptions2` = '$optAftMktTwoPrice', 
    `dealerOptions2Cost` = '$optAftMktTwoCost', 
    `dealerOptions2Tax` = '$optAftMktTwoTaxed', 
    `dealerOptions3CodeID` = '$optAftMktThreeCode', 
    `dealerOptionsNm3` = '$optAftMktThreeCodetxt', 
    `dealerOptions3List` = '$optAftMktThreeList', 
    `dealerOptions3` = '$optAftMktThreePrice', 
    `dealerOptions3Cost` = '$optAftMktThreeCost', 
    `dealerOptions3Tax` = '$optAftMktThreeTaxed', 
    `dealerOptions4CodeID` = '$optAftMktFourCode', 
    `dealerOptionsNm4` = '$optAftMktFourCodetxt', 
    `dealerOptions4List` = '$optAftMktFourList', 
    `dealerOptions4` = '$optAftMktFourPrice', 
    `dealerOptions4Cost` = '$optAftMktFourCost', 
    `dealerOptions4Tax` = '$optAftMktFourTaxed', 
    `dealerOptions5CodeID` = '$optAftMktFiveCode', 
    `dealerOptionsNm5` = '$optAftMktFiveCodetxt', 
    `dealerOptions5List` = '$optAftMktFiveList', 
    `dealerOptions5` = '$optAftMktFivePrice', 
    `dealerOptions5Cost` = '$optAftMktFiveCost', 
    `dealerOptions5Tax` = '$optAftMktFiveTaxed', 
    `dealerOptions6CodeID` = '$optAftMktSixCode',
	`dealerOptionsNm6` = '$optAftMktSixCodetxt',
    `dealerOptions6List` = '$optAftMktSixList', 
    `dealerOptions6` = '$optAftMktSixPrice', 
    `dealerOptions6Cost` = '$optAftMktSixCost', 
    `dealerOptions6Tax` = '$optAftMktSixTaxed', 
    `dealerOptions7CodeID` = '$optAftMktSevenCode', 
    `dealerOptionsNm7` = '$optAftMktSevenCodetxt', 
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
    `extSrvcMiles` = '$extSrvcMiles', 
    `extSrvcStartDate` = '$extSrvcStartDate', 
    `extSrvcStartMiles` = '$extSrvcStartMiles', 
    `extSrvcEndDate` = '$extSrvcEndDate', 
    `extSrvcEndMiles` = '$extSrvcEndMiles', 
    `extSrvcCompany` = '$extSrvcCompanytxt', 
    `extSrvcContractNo` = '$extSrvcContractNo', 
    `extSrvcPremium` = '$extSrvcPremium', 
    `extSrvcdeduct` = '$extSrvcdeduct', 
    `docServiceFee` = '$deliveryFee', 
    `noTaxes` = '$noTaxes', 
    `settingSateSlsTax` = '$settingSateSlsTax', 
    `stateSalesTax` = '$feesSalesTax', 
    `vLeinHolderNm` = '$vLeinHolderNm', 
    `apr` = '$apr',
    `firstpymt` = '$firstpymt',
    `term` = '$term', 
    `msrp` = '$msrp', 
    `dayResults` = '$dayResults',
    `residualDollar` = '$residualDollar', 
    `monthlypymts` = '$monthlyPymt', 
    `monthlyPymtd` = '$monthlyPymts', 
    `totalPayments` = '$totalPayments', 
    `totalFinanceCharges` = '$totalFinanceCharges', 
    `vTradeVerifiedBy` = '$vTradeVerifiedBy', 
    `vTradeVerifiedByName` = '$vTradeVerifiedBytxt',
    `vTradeVin` = '$vTradeVin', 
    `vTradeYr` = '$vTradeYr', 
    `vTradeMk` = '$vTradeMk', 
    `vTradeModel` = '$vTradeModel', 
    `vTradeTrim` = '$vTradeTrim', 
    `vTradeMiles` = '$vTradeMiles', 
    `vTradeColor` = '$vTradeColor', 
    `vTradeAllow` = '$vTradeAllow', 
    `vTradeLicsfee` = '$vTradeLicsfee', 
    `vTradeTagNo` = '$vTradeTagNo', 
    `vTradeTitle` = '$vTradeTitle', 
    `leinHolderTradeSelct` = '$leinHolderTradeSelct', 
    `vTradePayoffCompany` = '$vTradePayoffCompany', 
    `vTradeLeinHldrAcctNo` = '$vTradeLeinHldrAcctNo', 
    `vTradePayoffCompanyAddr` = '$vTradePayoffCompanyAddr', 
    `vTradePayoffCompanyAddr2` = '$vTradePayoffCompanyAddr2', 
    `vTradePayoffCompanyZip` = '$vTradePayoffCompanyZip', 
    `vTradePayoffCompanyCity` = '$vTradePayoffCompanyCity', 
    `vTradePayoffCompanyState` = '$vTradePayoffCompanyState',
    `vTradePayoffCompanyPhoneno` = '$vTradePayoffCompanyPhoneno', 
    `vTradePayoffGoodUntil` = '$vTradePayoffGoodUntil', 
    `vTradePayoffPerDiem` = '$vTradePayoffPerDiem', 
    `vTradeDecal` = '$vTradeDecal', 
    `vTradeOwner` = '$vTradeOwner', 
    `vTradeRemarksAttached` = '$vTradeRemarksAttached', 
    `vTradePayOff` = '$vTradePayOff', 
    `tradeACV` = '$tradeACV', 
    `vTradeTagState` = '$vTradeTagState',
    `vTradeTagExprDate` = '$vTradeTagExprDate', 
    `vTradeStikNo` = '$vTradeStikNo', 
    `vTradeOpenRO` = '$vTradeOpenRO', 
    `cashDeposit` = '$cashDeposit', 
    `COD` = '$COD', 
    `rebateToReduceSalesPrice` = '$rebateToReduceSalesPrice', 
    `VSIFEE` = '$VSIFEE', 
    `loanProcessingFee` = '$loanProcessingFee', 
    `receiptNo` = '$receiptNo', 
    `receiptNo2` = '$receiptNo2', 
    `licsFee` = '$licsFee',
    `titleFee` = '$titleFee',
    `licsNtitlefee` = '$licsNtitlefee',
    `stateTaxperc` = '$stateTaxperc',
    `stateTaxpercTotal` = '$stateTaxpercTotal', 
    `taxCountyperc` = '$taxCountyperc', 
    `taxCountypercTotal` = '$taxCountypercTotal', 
    `taxCityperc` = '$taxCityperc', 
    `taxCitypercTotal` = '$taxCitypercTotal', 
    `taxState` = '$taxState',
    `stateInspect` = '$stateInspect',
    `vInsurCompNm` = '$vInsurCompNm', 
    `vInsurCompAddr` = '$vInsurCompAddr', 
    `vInsurCompAddr2` = '$vInsurCompAddr2', 
    `vInsurCompCity` = '$vInsurCompCity',
    `vInsurCompState` = '$vInsurCompState',
    `vInsurCompZip` = '$vInsurCompZip'
	WHERE
	`deal_id` = '$deal_id'
";


$run_update_salesdesk_sql = mysqli_query($idsconnection_mysqli, $update_salesdesk_sql);



/*

	`salesdeskToken` = '',
    `amountDDue` = '',
    `priceVehicle` = '',
    `nonTaxRebate` = '',
    `taxablePrice` = '',
    `downPayment` = '',
    `rebates` = '',
    `reBateOne` = '',
    `reBateOnedscrp` = '',
    `reBateOneTax` = '',
    `reBateTwo` = '',
    `reBateTwodscrp` = '',
    `reBateTwoTax` = '', 
    `reBateThree` = '', 
    `reBateThreedscrp` = '', // 
    `reBateThreeTax` = '', 
    `reBateFour` = '', 
    `reBateFourdscrp` = '', // 
    `reBateFourTax` = '', 
    `reBateFive` = '', 
    `reBateFivedscrp` = '', // 
    `reBateFiveTax` = '', 
    `tradeAllowance` = '', 
    `tradePayoff` = '', 
    `optionsAftermarket` = '', 
    `optAftMktOneCode` = '', // Select
    `optAftMktOneList` = '', 
    `optAftMktOnePrice` = '', 
    `optAftMktOneCost` = '', 
    `optAftMktOneTaxed` = '', 
    `optAftMktOneTaxedtxt` = '', 
    `optAftMktTwoCode` = '', // Select
    `optAftMktTwoList` = '', 
    `optAftMktTwoPrice` = '', 
    `optAftMktTwoCost` = '', 
    `optAftMktTwoTaxed` = '', 
    `optAftMktTwoTaxedtxt` = '', 
    `optAftMktThreeCode` = '', // Select
    `optAftMktThreeList` = '', 
    `optAftMktThreePrice` = '', 
    `optAftMktThreeCost` = '', 
    `optAftMktThreeTaxed` = '', 
    `optAftMktThreeTaxedtxt` = '', 
    `optAftMktFourCode` = '', // Select
    `optAftMktFourList` = '', 
    `optAftMktFourPrice` = '', 
    `optAftMktFourCost` = '', 
    `optAftMktFourTaxed` = '', 
    `optAftMktFourTaxedtxt` = '', 
    `optAftMktFiveCode` = '', // Select
    `optAftMktFiveList` = '', 
    `optAftMktFivePrice` = '', 
    `optAftMktFiveCost` = '', 
    `optAftMktFiveTaxed` = '', 
    `optAftMktFiveTaxedtxt` = '', 
    `optAftMktSixCode` = '', // Select
    `optAftMktSixList` = '', 
    `optAftMktSixPrice` = '', 
    `optAftMktSixCost` = '', 
    `optAftMktSixTaxed` = '', 
    `optAftMktSixTaxedtxt` = '', 
    `optAftMktSevenCode` = '', // Select
    `optAftMktSevenCodetxt` = '', // Select
    `optAftMktSevenList` = '', 
    `optAftMktSevenPrice` = '', 
    `optAftMktSevenTaxed` = '', 
    `optAftMktSevenTaxedtxt` = '', 
    `insuranceCost` = '', 
    `insurMonths` = '', 
    `insurCreditlife` = '', 
    `insurAccHealth` = '', 
    `extServicePlan` = '', 
    `extSrvcMonths` = '', 
    `extSrvcMiles` = '', 
    `extSrvcStartDate` = '', // 
    `extSrvcStartMiles` = '', 
    `extSrvcEndDate` = '', // 
    `extSrvcEndMiles` = '', 
    `extSrvcCompany` = '', // Select
    `extSrvcCompanytxt` = '', // Select
    `extSrvcContractNo` = '', // 
    `extSrvcPremium` = '', 
    `extSrvcdeduct` = '', 
    `LicenseTitleFee` = '', 
    `deliveryFee` = '', 
    `noTaxes` = '', 
    `settingSateSlsTax` = '', 
    `feesSalesTax` = '', // 
    `leinHolderSelct` = '', // 
    `leinHolderSelcttxt` = '', // Select
    `apr` = '',
    `firstpymt` = '',
    `term` = '', 
    `msrp` = '', // 
    `dayResults` = '',
    `residualDollar` = '', 
    `monthlyPymt` = '', // 
    `monthlyPymts` = '', 
    `totalPayments` = '', 
    `totalFinanceCharges` = '', 
    `vTradeVerifiedBy` = '', // 
    `vTradeVerifiedBytxt` = '',
    `vTradeVin` = '', // 
    `vTradeYr` = '', // 
    `vTradeMk` = '', // 
    `vTradeModel` = '', // 
    `vTradeTrim` = '', // 
    `vTradeMiles` = '', // 
    `vTradeColor` = '', // 
    `vTradeAllow` = '', 
    `vTradeLicsfee` = '', 
    `vTradeTagNo` = '', // 
    `vTradeTitle` = '', // 
    `leinHolderTradeSelct` = '', // 
    `vTradePayoffCompany` = '', // 
    `vTradeLeinHldrAcctNo` = '', // 
    `vTradePayoffCompanyAddr` = '', // 
    `vTradePayoffCompanyAddr2` = '', // 
    `vTradePayoffCompanyZip` = '', // 
    `vTradePayoffCompanyCity` = '', // 
    `vTradePayoffCompanyState` = '', // Select State
    `vTradePayoffCompanyPhoneno` = '', // 
    `vTradePayoffGoodUntil` = '', // 
    `vTradePayoffPerDiem` = '', 
    `vTradeDecal` = '', // 
    `vTradeOwner` = '', // 
    `vTradeRemarksAttached` = '', // 
    `vTradePayOff` = '', 
    `tradeACV` = '', 
    `vTradeTagState` = '', // Select State
    `vTradeTagExprDate` = '', // 
    `vTradeStikNo` = '', // 
    `vTradeOpenRO` = '', 
    `cashDeposit` = '', 
    `COD` = '', 
    `rebateToReduceSalesPriceL` = '', 
    `VSIFEE` = '', 
    `loanProcessingFee` = '', 
    `receiptNo` = '', // 
    `receiptNo2` = '', // 
    `licsFee` = '',
    `titleFee` = '',
    `licsNtitlefee` = '',
    `stateTaxperc` = '',
    `stateTaxpercTotal` = '', // 
    `taxCountyperc` = '', // 
    `taxCountypercTotal` = '', // 
    `taxCityperc` = '', // 
    `taxCitypercTotal` = '', // 
    `taxState` = '',
    `defaultstatetaxread` = '',
    `stateInspect` = '', 
    `vInsurCompNm` = '', // 
    `vInsurCompAddr` = '', // 
    `vInsurCompAddr2` = '', // 
    `vInsurCompCity` = '', // 
    `vInsurCompState` = '', // Select State
    `vInsurCompZip` = '', // 
    `vInsurComp_slct` = '', // 


*/



}


?>
// JavaScript Document
$(document).ready(function(){

	var zero_out = '0.00';
	
	$('button#Calculate').on('click', function(){
										 
			updateMysum();									 
	});

	$('input#priceVehicle').on('click', function(){
		
		var price_value = $('input#priceVehicle').val();
		if(price_value == zero_out){		$('input#priceVehicle').val('');     };
		
		
	});

	$('input#priceVehicle').on('keyup', function(){


		updateMysum();
		
	});

	$('input#priceVehicle').on('change', function(obj){
												  
		var priceVehicle = parseInt($('input#priceVehicle').val());
		
		console.log( '1: '+priceVehicle );
		var priceVehicle = priceVehicle.toFixed(2);
		console.log( '2: '+priceVehicle );							   
		
		$('input#priceVehicle').val(priceVehicle);
		
		$('div#deal_info_block').find('input#priceVehicle').parent().parent().addClass('has-success');
		updateMysum();
	});


	$('input#priceVehicle').on('blur', function(obj){

		var price_value = $('input#priceVehicle').val();
		
		if(price_value == '' || price_value == ' ' || !price_value){		
			
			$('input#priceVehicle').val(zero_out);
			
			console.log('Change Price Value: '+price_value);
			
		}else{

			console.log('Change Price Value: '+price_value);

			var priceVehicle = parseInt($('input#priceVehicle').val());
			
			var priceVehicle = priceVehicle.toFixed(2);
			
			$('input#priceVehicle').val(priceVehicle);
			
			$('div#deal_info_block').find('input#priceVehicle').parent().parent().addClass('has-success');
			
		}
		
		updateMysum();
	});





	$('button#make_thisdeal').click(function(){
			
			
		create_salesdesk_deal();	
	
			
			
	});


});





function create_salesdesk_deal(){

	console.log('Running Posting');

	var applicant_vid = $('input#vehicle_id').val();
	var credit_app_id = $('input#credit_app_fullblown_id').val();
	
	var salesdeskToken = $('input#salesdeskToken').val();
	
	
	var salesPerson1ID =  $('input#salesPerson1ID').val();
	var salesPerson1Name =  $('input#salesPerson1Name').val();

	var salesPerson2ID =  $('input#salesPerson2ID').val();
	var salesPerson2Name =  $('input#salesPerson2Name').val();
	
	var slct_salesMgrID = document.getElementById('salesMgrID');
	var salesMgrID = slct_salesMgrID.options[slct_salesMgrID.selectedIndex].value;
	var salesMgrName = slct_salesMgrID.options[slct_salesMgrID.selectedIndex].text;


	var slct_financeMgrID = document.getElementById('financeMgrID');
	var financeMgrID = slct_financeMgrID.options[slct_financeMgrID.selectedIndex].value;
	var financeMgrName = slct_financeMgrID.options[slct_financeMgrID.selectedIndex].text;





	var priceVehicle = $('input#priceVehicle').val();
	var nonTaxRebate = $('input#nonTaxRebate').val();
	var taxablePrice = $('input#taxablePrice').val();
	var downPayment = $('input#downPayment').val();


	var rebates = $('input#rebates').val();

	var reBateOne = $('input#reBateOne').val();
	var reBateOnedscrp = $('input#reBateOnedscrp').val();
	
	var slct_reBateOneTax = document.getElementById('reBateOneTax');
	var reBateOneTax = slct_reBateOneTax.options[slct_reBateOneTax.selectedIndex].value;

	var reBateTwo = $('input#reBateTwo').val();
	var reBateTwodscrp = $('input#reBateTwodscrp').val();
	
	var slct_reBateTwoTax = document.getElementById('reBateTwoTax');
	var reBateTwoTax = slct_reBateTwoTax.options[slct_reBateTwoTax.selectedIndex].value;

	var reBateThree = $('input#reBateThree').val();
	var reBateThreedscrp = $('input#reBateThreedscrp').val();
	
	var slct_reBateThreeTax = document.getElementById('reBateThreeTax');
	var reBateThreeTax = slct_reBateThreeTax.options[slct_reBateThreeTax.selectedIndex].value;

	var reBateFour = $('input#reBateFour').val();
	var reBateFourdscrp = $('input#reBateFourdscrp').val();
	
	var slct_reBateFourTax = document.getElementById('reBateFourTax');
	var reBateFourTax = slct_reBateFourTax.options[slct_reBateFourTax.selectedIndex].value;

	var reBateFive = $('input#reBateFive').val();
	var reBateFivedscrp = $('input#reBateFivedscrp').val();
	
	var slct_reBateFiveTax = document.getElementById('reBateFiveTax');
	var reBateFiveTax = slct_reBateFiveTax.options[slct_reBateFiveTax.selectedIndex].value;

	var tradeAllowance = $('input#tradeAllowance').val();
	
	var tradePayoff = $('input#tradePayoff').val();


	var optionsAftermarket = $('input#optionsAftermarket').val();

	var slct_optAftMktOneCode = document.getElementById('optAftMktOneCode');
	var optAftMktOneCode = slct_optAftMktOneCode.options[slct_optAftMktOneCode.selectedIndex].value;
	var optAftMktOneCodetxt = slct_optAftMktOneCode.options[slct_optAftMktOneCode.selectedIndex].text;


	var optAftMktOneList = $('input#optAftMktOneList').val();
	var optAftMktOnePrice = $('input#optAftMktOnePrice').val();
	var optAftMktOneCost = $('input#optAftMktOneCost').val();
	
	var slct_optAftMktOneTaxed = document.getElementById('optAftMktOneTaxed');
	var optAftMktOneTaxed = slct_optAftMktOneTaxed.options[slct_optAftMktOneTaxed.selectedIndex].value;
	var optAftMktOneTaxedtxt = slct_optAftMktOneTaxed.options[slct_optAftMktOneTaxed.selectedIndex].text;


	var slct_optAftMktTwoCode = document.getElementById('optAftMktTwoCode');
	var optAftMktTwoCode = slct_optAftMktTwoCode.options[slct_optAftMktTwoCode.selectedIndex].value;
	var optAftMktTwoCodetxt = slct_optAftMktTwoCode.options[slct_optAftMktTwoCode.selectedIndex].text;

	var optAftMktTwoList = $('input#optAftMktTwoList').val();
	var optAftMktTwoPrice = $('input#optAftMktTwoPrice').val();
	var optAftMktTwoCost = $('input#optAftMktTwoCost').val();
	
	var slct_optAftMktTwoTaxed = document.getElementById('optAftMktTwoTaxed');
	var optAftMktTwoTaxed = slct_optAftMktTwoTaxed.options[slct_optAftMktTwoTaxed.selectedIndex].value;
	var optAftMktTwoTaxedtxt = slct_optAftMktTwoTaxed.options[slct_optAftMktTwoTaxed.selectedIndex].text;

	var slct_optAftMktThreeCode = document.getElementById('optAftMktThreeCode');
	var optAftMktThreeCode = slct_optAftMktThreeCode.options[slct_optAftMktThreeCode.selectedIndex].value;
	var optAftMktThreeCodetxt = slct_optAftMktThreeCode.options[slct_optAftMktThreeCode.selectedIndex].text;


	var optAftMktThreeList = $('input#optAftMktThreeList').val();
	var optAftMktThreePrice = $('input#optAftMktThreePrice').val();
	var optAftMktThreeCost = $('input#optAftMktThreeCost').val();
	
	
	var slct_optAftMktThreeTaxed = document.getElementById('optAftMktThreeTaxed');
	var optAftMktThreeTaxed = slct_optAftMktThreeTaxed.options[slct_optAftMktThreeTaxed.selectedIndex].value;
	var optAftMktThreeTaxedtxt = slct_optAftMktThreeTaxed.options[slct_optAftMktThreeTaxed.selectedIndex].text;


	var slct_optAftMktFourCode = document.getElementById('optAftMktFourCode');
	var optAftMktFourCode = slct_optAftMktFourCode.options[slct_optAftMktFourCode.selectedIndex].value;
	var optAftMktFourCodetxt = slct_optAftMktFourCode.options[slct_optAftMktFourCode.selectedIndex].text;


	var optAftMktFourList = $('input#optAftMktFourList').val();
	var optAftMktFourPrice = $('input#optAftMktFourPrice').val();
	var optAftMktFourCost = $('input#optAftMktFourCost').val();
	
	var slct_optAftMktFourTaxed = document.getElementById('optAftMktFourTaxed');
	var optAftMktFourTaxed = slct_optAftMktFourTaxed.options[slct_optAftMktFourTaxed.selectedIndex].value;
	var optAftMktFourTaxedtxt = slct_optAftMktFourTaxed.options[slct_optAftMktFourTaxed.selectedIndex].text;


	var slct_optAftMktFiveCode = document.getElementById('optAftMktFiveCode');
	var optAftMktFiveCode = slct_optAftMktFiveCode.options[slct_optAftMktFiveCode.selectedIndex].value;
	var optAftMktFiveCodetxt = slct_optAftMktFiveCode.options[slct_optAftMktFiveCode.selectedIndex].text;


	var optAftMktFiveList = $('input#optAftMktFiveList').val();
	var optAftMktFivePrice = $('input#optAftMktFivePrice').val();
	var optAftMktFiveCost = $('input#optAftMktFiveCost').val();
	
	var slct_optAftMktFiveTaxed = document.getElementById('optAftMktFiveTaxed');
	var optAftMktFiveTaxed = slct_optAftMktFiveTaxed.options[slct_optAftMktFiveTaxed.selectedIndex].value;
	var optAftMktFiveTaxedtxt = slct_optAftMktFiveTaxed.options[slct_optAftMktFiveTaxed.selectedIndex].text;


	var slct_optAftMktSixCode = document.getElementById('optAftMktSixCode');
	var optAftMktSixCode = slct_optAftMktSixCode.options[slct_optAftMktSixCode.selectedIndex].value;
	var optAftMktSixCodetxt = slct_optAftMktSixCode.options[slct_optAftMktSixCode.selectedIndex].text;


	var optAftMktSixList = $('input#optAftMktSixList').val();
	var optAftMktSixPrice = $('input#optAftMktSixPrice').val();
	var optAftMktSixCost = $('input#optAftMktSixCost').val();
	
	var slct_optAftMktSixTaxed = document.getElementById('optAftMktSixTaxed');
	var optAftMktSixTaxed = slct_optAftMktSixTaxed.options[slct_optAftMktSixTaxed.selectedIndex].value;
	var optAftMktSixTaxedtxt = slct_optAftMktSixTaxed.options[slct_optAftMktSixTaxed.selectedIndex].text;

	var slct_optAftMktSevenCode = document.getElementById('optAftMktSevenCode');
	var optAftMktSevenCode = slct_optAftMktSevenCode.options[slct_optAftMktSevenCode.selectedIndex].value;
	var optAftMktSevenCodetxt = slct_optAftMktSevenCode.options[slct_optAftMktSevenCode.selectedIndex].text;

	var optAftMktSevenList = $('input#optAftMktSevenList').val();
	var optAftMktSevenPrice = $('input#optAftMktSevenPrice').val();
	var optAftMktSevenCost = $('input#optAftMktSevenCost').val();
				console.log('optAftMktSevenCost: '+optAftMktSevenCost);

	var slct_optAftMktSevenTaxed = document.getElementById('optAftMktSevenTaxed');
	var optAftMktSevenTaxed = slct_optAftMktSevenTaxed.options[slct_optAftMktSevenTaxed.selectedIndex].value;
	var optAftMktSevenTaxedtxt = slct_optAftMktSevenTaxed.options[slct_optAftMktSevenTaxed.selectedIndex].text;
	



	
	
	
	
	

	var insuranceCost = $('input#insuranceCost').val();
	var insurMonths = $('input#insurMonths').val();
	var insurCreditlife = $('input#insurCreditlife').val();
	var insurAccHealth = $('input#insurAccHealth').val();


	var extServicePlan = $('input#extServicePlan').val();
	var extSrvcMonths = $('input#extSrvcMonths').val();
	var extSrvcMiles = $('input#extSrvcMiles').val();
	var extSrvcStartDate = $('input#extSrvcStartDate').val();
	var extSrvcStartMiles = $('input#extSrvcStartMiles').val();
	var extSrvcEndDate = $('input#extSrvcEndDate').val();
	var extSrvcEndMiles = $('input#extSrvcEndMiles').val();
	var extSrvcEndDate = $('input#extSrvcEndDate').val();
	var extSrvcEndMiles = $('input#extSrvcEndMiles').val();
	
	var slct_extSrvcCompany = document.getElementById('extSrvcCompany');
	var extSrvcCompany = slct_extSrvcCompany.options[slct_extSrvcCompany.selectedIndex].value;
	var extSrvcCompanytxt = slct_extSrvcCompany.options[slct_extSrvcCompany.selectedIndex].text;
	console.log('extSrvcCompanytxt: '+extSrvcCompanytxt);
	
	var extSrvcContractNo = $('input#extSrvcContractNo').val();
	var extSrvcPremium = $('input#extSrvcPremium').val();
	var extSrvcdeduct = $('input#extSrvcdeduct').val();


	var LicenseTitleFee = $('input#LicenseTitleFee').val();
	
	var insuranceCost = $('input#insuranceCost').val();
	var deliveryFee = $('input#deliveryFee').val();
	
	var noTaxes = $('input#noTaxes').val();
	
	var settingSateSlsTax = $('input#settingSateSlsTax').val();
	var feesSalesTax = $('input#feesSalesTax').val();
	var tavt_fee_required = $('input#tavt_fee_required').val();
	var tavt_fee = $('input#tavt_fee').val();
	var amountDDue = $('input#amountDDue').val();




	var slct_leinHolderSelct = document.getElementById('leinHolderSelct');
	var leinHolderSelct = slct_leinHolderSelct.options[slct_leinHolderSelct.selectedIndex].value;
	var leinHolderSelcttxt = slct_leinHolderSelct.options[slct_leinHolderSelct.selectedIndex].text;

	var vLeinHolderNm = $('input#vLeinHolderNm').val();
	var vLeinHolderAddr = $('input#vLeinHolderAddr').val();
	var vLeinHolderAddr2 = $('input#vLeinHolderAddr2').val();
	var vLeinHolderCity = $('input#vLeinHolderCity').val();
	var vLeinHolderState = $('input#vLeinHolderState').val();
	var vLeinHolderZip = $('input#vLeinHolderZip').val();
		var vLeinHolderLeinNo = $('input#vLeinHolderLeinNo').val();
			var vLeinHolderPhnNo = $('input#vLeinHolderPhnNo').val();




	var apr = $('input#apr').val();
	var firstpymt = $('input#firstpymt').val();
	var term = $('input#term').val();
	var msrp = $('input#msrp').val();
	var dayResults = $('input#dayResults').val();
	var residualDollar = $('input#residualDollar').val();
	var monthlyPymt = $('input#monthlyPymt').val();
	var monthlyPymts = $('input#monthlyPymts').val();
	var totalPayments = $('input#totalPayments').val();
	var totalFinanceCharges = $('input#totalFinanceCharges').val();



	var slct_vTradeVerifiedBy = document.getElementById('vTradeVerifiedBy');
	var vTradeVerifiedBy = slct_vTradeVerifiedBy.options[slct_vTradeVerifiedBy.selectedIndex].value;
	var vTradeVerifiedBytxt = slct_vTradeVerifiedBy.options[slct_vTradeVerifiedBy.selectedIndex].text;

	var vTradeVin = $('input#vTradeVin').val();

	var slct_vTradeYr = document.getElementById('vTradeYr');
	var vTradeYr = slct_vTradeYr.options[slct_vTradeYr.selectedIndex].value;

	var slct_vTradeMk = document.getElementById('vTradeMk');
	var vTradeMk = slct_vTradeMk.options[slct_vTradeMk.selectedIndex].value;
	
	var slct_vTradeModel = document.getElementById('vTradeModel');
	var vTradeModel = slct_vTradeModel.options[slct_vTradeModel.selectedIndex].value;
	
	var vTradeTrim = $('input#vTradeTrim').val();
	var vTradeMiles = $('input#vTradeMiles').val();

	var vTradeColor = $('input#vTradeColor').val();
	var vTradeAllow = $('input#vTradeAllow').val();


	var vTradeLicsfee = $('input#vTradeLicsfee').val();

	var vTradeTagNo = $('input#vTradeTagNo').val();

	var vTradeTitle = $('input#vTradeTitle').val();

	var slct_leinHolderTradeSelct = document.getElementById('leinHolderTradeSelct');
	var leinHolderTradeSelct = slct_leinHolderTradeSelct.options[slct_leinHolderTradeSelct.selectedIndex].value;
	
	var vTradePayoffCompany = $('input#vTradePayoffCompany').val();

	var vTradeLeinHldrAcctNo = $('input#vTradeLeinHldrAcctNo').val();

	var vTradePayoffCompanyAddr = $('input#vTradePayoffCompanyAddr').val();

	var vTradePayoffCompanyAddr2 = $('input#vTradePayoffCompanyAddr2').val();

	var vTradePayoffCompanyZip = $('input#vTradePayoffCompanyZip').val();

	var vTradePayoffCompanyCity = $('input#vTradePayoffCompanyCity').val();

	var slct_vTradePayoffCompanyState = document.getElementById('vTradePayoffCompanyState');
	var vTradePayoffCompanyState = slct_vTradePayoffCompanyState.options[slct_vTradePayoffCompanyState.selectedIndex].value;

	var vTradePayoffCompanyPhoneno = $('input#vTradePayoffCompanyPhoneno').val();

	var vTradeLeinHldrAcctNo = $('input#vTradeLeinHldrAcctNo').val();
	
	var vTradePayoffGoodUntil = $('input#vTradePayoffGoodUntil').val();
	var vTradePayoffPerDiem = $('input#vTradePayoffPerDiem').val();
	var vTradeDecal = $('input#vTradeDecal').val();
	var vTradeOwner = $('input#vTradeOwner').val();

	var vTradeRemarksAttached = $('textarea#vTradeRemarksAttached').val();

	var vTradePayOff = $('input#vTradePayOff').val();

	var tradeACV = $('input#tradeACV').val();
	
	var slct_vTradeTagState = document.getElementById('vTradeTagState');
	var vTradeTagState = slct_vTradeTagState.options[slct_vTradeTagState.selectedIndex].value;

	var vTradeTagExprDate = $('input#vTradeTagExprDate').val();

	var vTradeStikNo = $('input#vTradeStikNo').val();

	var vTradeOpenRO = $('input#vTradeOpenRO').val();





	var cashDeposit = $('input#cashDeposit').val();

	var COD = $('input#COD').val();

	var rebateToReduceSalesPrice = $('input#rebateToReduceSalesPrice').val();

	var VSIFEE = $('input#VSIFEE').val();

	var loanProcessingFee = $('input#loanProcessingFee').val();

	var receiptNo = $('input#receiptNo').val();

	var receiptNo2 = $('input#receiptNo2').val();


	var licsFee = $('input#licsFee').val();
	var titleFee = $('input#titleFee').val();
	var licsNtitlefee = $('input#licsNtitlefee').val();
	var stateTaxperc = $('input#stateTaxperc').val();
	var stateTaxpercTotal = $('input#stateTaxpercTotal').val();
	var taxCountyperc = $('input#taxCountyperc').val();
	var taxCountypercTotal = $('input#taxCountypercTotal').val();
	var taxCityperc = $('input#taxCityperc').val();
	var taxCitypercTotal = $('input#taxCitypercTotal').val();
	var taxState = $('input#taxState').val();
	var defaultstatetaxread = $('input#defaultstatetaxread').val();


	var stateInspect = $('input#stateInspect').val();


	var vInsurCompNm = $('input#vInsurCompNm').val();

	var vInsurCompAddr = $('input#vInsurCompAddr').val();

	var vInsurCompAddr2 = $('input#vInsurCompAddr2').val();

	var vInsurCompCity = $('input#vInsurCompCity').val();

	var slct_vInsurCompState = document.getElementById('vInsurCompState');
	var vInsurCompState = slct_vInsurCompState.options[slct_vInsurCompState.selectedIndex].value;

	var vInsurCompZip = $('input#vInsurCompZip').val();

	var slct_vInsurComp_slct = document.getElementById('vInsurComp_slct');
	var vInsurComp_slct = slct_vInsurComp_slct.options[slct_vInsurComp_slct.selectedIndex].value;

	var vehicle_id = $('input#vehicle_id').val();

console.log('Posting: '+vehicle_id);



	
	$.post('script_create_salesdesk.php?vid='+vehicle_id, {
		vehicle_id: applicant_vid,
	    credit_app_id: credit_app_id,
		salesdeskToken: salesdeskToken, 
		amountDDue: amountDDue,

salesPerson1ID: salesPerson1ID,
salesPerson1Name: salesPerson1Name,

salesPerson2ID: salesPerson2ID,
salesPerson2Name: salesPerson2Name,
salesMgrID: salesMgrID,
salesMgrName: salesMgrName,
financeMgrID: financeMgrID,
financeMgrName: financeMgrName,


		priceVehicle: priceVehicle,
		nonTaxRebate: nonTaxRebate,
		taxablePrice: taxablePrice,
		downPayment:downPayment,
		rebates:rebates,
		reBateOne:reBateOne,
		reBateOnedscrp:reBateOnedscrp,
		reBateOneTax:reBateOneTax,
		reBateTwo:reBateTwo,
		reBateTwodscrp:reBateTwodscrp,
		reBateTwoTax:reBateTwoTax,
		reBateThree:reBateThree,
		reBateThreedscrp:reBateThreedscrp,
		reBateThreeTax:reBateThreeTax,
		reBateFour:reBateFour,
		reBateFourdscrp:reBateFourdscrp,
		reBateFourTax:reBateFourTax,
		reBateFive:reBateFive,
		reBateFivedscrp:reBateFivedscrp,
		reBateFiveTax:reBateFiveTax,
		tradeAllowance:tradeAllowance,
		tradePayoff:tradePayoff,		
		optionsAftermarket:optionsAftermarket,
		optAftMktOneCode:optAftMktOneCode,
		optAftMktOneCodetxt:optAftMktOneCodetxt,
		optAftMktOneList:optAftMktOneList,
		optAftMktOnePrice:optAftMktOnePrice,
		optAftMktOneCost:optAftMktOneCost,
		optAftMktOneTaxed:optAftMktOneTaxed,
		optAftMktOneTaxedtxt:optAftMktOneTaxedtxt,
		optAftMktTwoCode:optAftMktTwoCode,
		optAftMktTwoCodetxt:optAftMktTwoCodetxt,
		optAftMktTwoList:optAftMktTwoList,
		optAftMktTwoPrice:optAftMktTwoPrice,
		optAftMktTwoCost:optAftMktTwoCost,
		optAftMktTwoTaxed:optAftMktTwoTaxed,
		optAftMktTwoTaxedtxt:optAftMktTwoTaxedtxt,
		optAftMktThreeCode:optAftMktThreeCode,
		optAftMktThreeCodetxt:optAftMktThreeCodetxt,
		optAftMktThreeList:optAftMktThreeList,
		optAftMktThreePrice:optAftMktThreePrice,
		optAftMktThreeCost:optAftMktThreeCost,
		optAftMktThreeTaxed:optAftMktThreeTaxed,
		optAftMktThreeTaxedtxt:optAftMktThreeTaxedtxt,
		optAftMktFourCode:optAftMktFourCode,
		optAftMktFourCodetxt:optAftMktFourCodetxt,
		optAftMktFourList:optAftMktFourList,
		optAftMktFourPrice:optAftMktFourPrice,
		optAftMktFourCost:optAftMktFourCost,
		optAftMktFourTaxed:optAftMktFourTaxed,
		optAftMktFourTaxed:optAftMktFourTaxed,
		optAftMktFourTaxedtxt:optAftMktFourTaxedtxt,
		optAftMktFiveCode:optAftMktFiveCode,
		optAftMktFiveCodetxt:optAftMktFiveCodetxt,
		optAftMktFiveList:optAftMktFiveList,
		optAftMktFivePrice:optAftMktFivePrice,
		optAftMktFiveCost:optAftMktFiveCost,
		optAftMktFiveTaxed:optAftMktFiveTaxed,
		optAftMktFiveTaxedtxt:optAftMktFiveTaxedtxt,
		optAftMktSixCode:optAftMktSixCode,
		optAftMktSixCodetxt:optAftMktSixCodetxt,
		optAftMktSixList:optAftMktSixList,
		optAftMktSixPrice:optAftMktSixPrice,
		optAftMktSixCost:optAftMktSixCost,
		optAftMktSixTaxed:optAftMktSixTaxed,
		optAftMktSixTaxedtxt:optAftMktSixTaxedtxt,
		optAftMktSevenCode:optAftMktSevenCode,
		optAftMktSevenCodetxt:optAftMktSevenCodetxt,
		optAftMktSevenList:optAftMktSevenList,
		optAftMktSevenPrice:optAftMktSevenPrice,
		optAftMktSevenCost: optAftMktSevenCost,
		optAftMktSevenTaxed:optAftMktSevenTaxed,
		optAftMktSevenTaxedtxt:optAftMktSevenTaxedtxt,
		insuranceCost:insuranceCost,
		insurMonths:insurMonths,
		insurCreditlife:insurCreditlife,
		insurAccHealth:insurAccHealth,
		extServicePlan:extServicePlan,
		extSrvcMonths:extSrvcMonths,
		extSrvcMiles:extSrvcMiles,
		extSrvcStartDate:extSrvcStartDate,
		extSrvcStartMiles:extSrvcStartMiles,
		extSrvcEndDate:extSrvcEndDate,
		extSrvcEndMiles:extSrvcEndMiles,
		extSrvcEndDate:extSrvcEndDate,
		extSrvcEndMiles:extSrvcEndMiles,
		extSrvcCompany:extSrvcCompany,
		extSrvcCompany:extSrvcCompany,
		extSrvcCompanytxt:extSrvcCompany,
		extSrvcContractNo:extSrvcContractNo,
		extSrvcPremium:extSrvcPremium,
		extSrvcdeduct:extSrvcdeduct,
		LicenseTitleFee:LicenseTitleFee,
		insuranceCost:insuranceCost,
		deliveryFee:deliveryFee,
		noTaxes:noTaxes,
		settingSateSlsTax:settingSateSlsTax,
		feesSalesTax:feesSalesTax,
		tavt_fee_required: tavt_fee_required,
		tavt_fee: tavt_fee,
		amountDDue:amountDDue,
		leinHolderSelct:leinHolderSelct,
		leinHolderSelcttxt:leinHolderSelcttxt,
		vLeinHolderNm: vLeinHolderNm,
		vLeinHolderAddr: vLeinHolderAddr,
		vLeinHolderAddr2: vLeinHolderAddr2,
		vLeinHolderCity: vLeinHolderCity,
		vLeinHolderState: vLeinHolderState,
		vLeinHolderZip: vLeinHolderZip,
		vLeinHolderLeinNo: vLeinHolderLeinNo,
		vLeinHolderPhnNo: vLeinHolderPhnNo,
		apr:apr,
		firstpymt:firstpymt,
		term:term,
		msrp:msrp,
		dayResults:dayResults,
		residualDollar:residualDollar,
		monthlyPymt:monthlyPymt,
		monthlyPymts:monthlyPymts,
		totalPayments: totalPayments,
		totalFinanceCharges: totalFinanceCharges,
		
		vTradeVerifiedBy: vTradeVerifiedBy,
		vTradeVerifiedBytxt: vTradeVerifiedBytxt,

		vTradeVin: vTradeVin,
	    vTradeYr: vTradeYr,
	    vTradeMk: vTradeMk,
	 	vTradeModel: vTradeModel,
		vTradeTrim:vTradeTrim,
		vTradeMiles:vTradeMiles,
		vTradeColor:vTradeColor,
		vTradeAllow: vTradeAllow,
		vTradeLicsfee:vTradeLicsfee,
		vTradeTagNo:vTradeTagNo,
		vTradeTitle:vTradeTitle,
		leinHolderTradeSelct: leinHolderTradeSelct,
		vTradePayoffCompany: vTradePayoffCompany,
		vTradeLeinHldrAcctNo: vTradeLeinHldrAcctNo,
		vTradePayoffCompanyAddr: vTradePayoffCompanyAddr,
		vTradePayoffCompanyAddr2: vTradePayoffCompanyAddr2,
		vTradePayoffCompanyZip: vTradePayoffCompanyZip,
		vTradePayoffCompanyCity: vTradePayoffCompanyCity,
		vTradePayoffCompanyState: vTradePayoffCompanyState,
		vTradePayoffCompanyPhoneno: vTradePayoffCompanyPhoneno,
		vTradeLeinHldrAcctNo: vTradeLeinHldrAcctNo,
		vTradePayoffGoodUntil: vTradePayoffGoodUntil,
		vTradePayoffPerDiem: vTradePayoffPerDiem,
		vTradeDecal: vTradeDecal,
		vTradeOwner: vTradeOwner,
		vTradeRemarksAttached: vTradeRemarksAttached,
		vTradePayOff: vTradePayOff,
		tradeACV: tradeACV,	
		vTradeTagState: vTradeTagState,
		vTradeTagExprDate: vTradeTagExprDate,
		vTradeStikNo: vTradeStikNo,
		vTradeOpenRO: vTradeOpenRO,
		cashDeposit: cashDeposit,
		COD: COD,
		rebateToReduceSalesPrice: rebateToReduceSalesPrice,
		VSIFEE: VSIFEE,
		loanProcessingFee: loanProcessingFee,
		receiptNo: receiptNo,
		receiptNo2: receiptNo2,
		licsFee:licsFee,
		titleFee: titleFee,
		licsNtitlefee: licsNtitlefee,
		stateTaxperc: stateTaxperc,
		stateTaxpercTotal: stateTaxpercTotal,
		taxCountyperc: taxCountyperc,
		taxCountypercTotal: taxCountypercTotal,
		taxCityperc: taxCityperc,
		taxCitypercTotal: taxCitypercTotal,
		taxState: taxState,
		defaultstatetaxread: defaultstatetaxread,
		stateInspect: stateInspect,
		vInsurCompNm: vInsurCompNm,
		vInsurCompAddr: vInsurCompAddr,
		vInsurCompAddr2: vInsurCompAddr2,
		vInsurCompCity: vInsurCompCity,
		vInsurCompState: vInsurCompState,
		vInsurCompZip: vInsurCompZip,
		vInsurComp_slct: vInsurComp_slct
		   }, function(data){console.log('Posting Data: '+data);
	});
	
	
}
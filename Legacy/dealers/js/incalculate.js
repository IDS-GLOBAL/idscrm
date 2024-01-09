$(document).ready(function() {	

	

/*
	alert('Loaded!');
	
	$('input#priceVehicle').on('keyup', function() {
			
			 updateMysum();
	});

*/


	$('button.ui-state-default.ui-corner-all.ui-button.ui-state-hover').on('click', function() {
			

			
			updateMysum();
			
			return false;
	
	});





});


function round(x) {

  return Math.round(x*100)/100;

}

function tradeallow(){
	
	var tradeallow = $('input#vTradeAllow').val();
	
	$('input#tradeAllowance').val(tradeallow);


	updateMysum();
}


function updateMysum(){
	
	
	var vprice = $('input#priceVehicle').val();

	if(!vprice){ 
	//alert('No Price Available!'); 
	return false; 
	}
	if (vprice <= '0.00'){ 
	//alert('No Real Value Available!'); 
	return false;
	}

	
	//alert(vprice);
	

	var nonTaxRebate = $('input#nonTaxRebate').val();

	var taxable = (vprice)-(nonTaxRebate);

	var taxablePrice = taxable.toFixed(2);

	$('input#taxablePrice').val(taxablePrice);

	var downPayment = $('input#downPayment').val();


	var reBateOneTax   = $('input#reBateOneTax').val();
	var reBateTwoTax   = $('input#reBateTwoTax').val();
	var reBateThreeTax = $('input#reBateThreeTax').val();
	var reBateFourTax  = $('input#reBateFourTax').val();
	var reBateFiveTax  = $('input#reBateFiveTax').val();


	var reBateOne = $('input#reBateOne').val();
	var reBateTwo = $('input#reBateTwo').val();
	var reBateThree = $('input#reBateThree').val();
	var reBateFour = $('input#reBateFour').val();
	var reBateFive = $('input#reBateFive').val();


	//Some Rebates are taxable and some rebates are not
	var reBates  = (reBateOne -0) + (reBateTwo -0) + (reBateThree -0) + (reBateFour -0) + (reBateFive -0);
	//var reBates  = (reBateOne  + reBateTwo);
	
	
	var reBates = reBates.toFixed(2);

	console.log('reBates: '+reBates);

	$('input#rebates').val(reBates);

						
						
				if (reBateOneTax='Y')
				  {
					var reBate1 = reBateOne;
				  }
				  else
				  {
					var reBate1 = 0.00;
				  }

				if (reBateTwoTax='Y')
				  {
					var reBate2 = reBateTwo;
				  }
				  else
				  {
					var reBate2 = 0.00;
				  }

				if (reBateThreeTax='Y')
				  {
					var reBate3 = reBateThree;
				  }
				  else
				  {
					var reBate3 = 0.00;
				  }
				  

				if (reBateFourTax='Y')
				  {
					var reBate4 = reBateFour;
				  }
				  else
				  {
					var reBate4 = 0.00;
				  }
				  

				if (reBateFiveTax='Y')
				  {
					var reBate5 = reBateFive;
				  }
				  else
				  {
					var reBate5 = 0.00;
				  }
						  

	var rebateTaxes  =	(reBate1 -0) + (reBate2 -0) + (reBate3 -0) + (reBate4 -0) + (reBate5 -0);

	//alert(rebateTaxes);
	//alert(reBateTwoTax);


	
	var tradeAllowance = $('input#tradeAllowance').val();
	var tradePayoff = $('input#tradePayoff').val();

	
	var optAftMktOnePrice = $('input#optAftMktOnePrice').val()
	var optAftMktTwoPrice = $('input#optAftMktTwoPrice').val()
	var optAftMktThreePrice = $('input#optAftMktThreePrice').val()
	var optAftMktFourPrice = $('input#optAftMktFourPrice').val()
	var optAftMktFivePrice = $('input#optAftMktFivePrice').val()
	var optAftMktSixPrice = $('input#optAftMktSixPrice').val()
	var optAftMktSevenPrice = $('input#optAftMktSevenPrice').val()
	
	//Some After Market Products are taxable and some After Market Products are not
	var optionsAftermarkets = (optAftMktOnePrice -0) + (optAftMktTwoPrice -0) + (optAftMktThreePrice -0) + (optAftMktFourPrice -0) + (optAftMktFivePrice -0) + (optAftMktSixPrice -0) + (optAftMktSevenPrice -0);


	
	var optionsAftermarkets = optionsAftermarkets.toFixed(2);
	console.log('optionsAftermarkets: '+optionsAftermarkets);
	
	$('input#optionsAftermarket').val(optionsAftermarkets);


	//var insurMonths = $('input#insurMonths').val();
		//var insurCreditlife = $('input#insurCreditlife').val();
			//var insurAccHealth = $('input#insurAccHealth').val();
	//var insurMonths = document.myform.term.val();
	//$('input#insurMonths.val(insurMonths);
	
	var insuranceCost = ($('input#insurCreditlife').val() -0) + ($('input#insurAccHealth').val() -0);
	var insuranceCost = insuranceCost.toFixed(2);
	console.log('insuranceCost: '+insuranceCost);
	
	$('input#insuranceCost').val(insuranceCost);
	

	var extSrvcPremium = ($('input#extSrvcPremium').val() -0);
	var extSrvcdeduct = ($('input#extSrvcdeduct').val() -0);


	//var extServicePlan = extSrvcPremium.toFixed(2);
	console.log('extSrvcPremium: '+extSrvcPremium);
	$('input#extServicePlan').val(extSrvcPremium.toFixed(2));

	

	var LicenseTitleFee = $('input#LicenseTitleFee').val();	
	var deliveryFee = $('input#deliveryFee').val();
	
	// Adding everything up

			
	// Sales Tax 

	var comBinedTax = ($('input#priceVehicle').val() -0) + 
												
					   (deliveryFee -0) -

					   (tradeAllowance) -
	
					   (nonTaxRebate);

	

	//Sales Tax Formated




                    if ($('input#noTaxes').is(':checked')) {
                        // if so, give robot a 1 value for okay
		
							var taxFormatCombined = comBinedTax;
									console.log('comBinedTax:'+comBinedTax);
									
							var settingSateSlsTax = $('#settingSateSlsTax').val();
							
							var salesTax = (taxFormatCombined / 100) * settingSateSlsTax;	
						
									console.log('input#noTaxes Checked Yes:'+salesTax);
					}else{
							
							var salesTax = 0.00;
									console.log('input#noTaxes Checked No:'+salesTax);
					}			

	
	

	

	//var totalAmount = (vprice*1) + (salesTax * 1);		

	

	var addedUp = (vprice -0) +

				  (optionsAftermarkets -0) +	

				  (extSrvcPremium -0) +

				  (LicenseTitleFee -0) +

				  (deliveryFee -0) +

				  (tradePayoff -0) +

				  (salesTax -0) -

				  (downPayment -0) -
				  
				  (reBates -0) -

				  (tradeAllowance);


	var addedUp = addedUp.toFixed(2);


		
	//alert(extSrvcPremium);

	

	//$('input#reBates.val() = reBates.toFixed(2);

	//$('input#optionsAftermarket.val();
	var salesTax = salesTax.toFixed(2);
	
	console.log('input#feesSalesTax: '+salesTax);
	
	$('input#feesSalesTax').val(salesTax);
	
	
	
	var tavt_fee_required = $('input#tavt_fee_required').val();
	var tavt_fee = $('input#tavt_fee').val();

	
	// The AMOUNT DUE
	$('input#amountDDue').val(addedUp);
	console.log('input#amountDDue: '+addedUp);










	 //This Caculate All Intrest and Monthly Payments on the RIGHT!

	 var princ = $('input#amountDDue').val();

	 var intr  = $('input#apr').val() / 1200;

	 var term  = $('input#term').val();
 
 	 //var figure = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);

 	 var monthlyPymt = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
			
			console.log('monthlyPymt: '+monthlyPymt);
			
	 var totalPayments = (term * monthlyPymt).toFixed(2);

	 var financeCharges = (totalPayments) - (addedUp);	 

	 var financeCharges2 = (totalPayments) - (addedUp);

	 var thirtY = 30;

	 var figure1 = (financeCharges2 / term);

	 var figure1 = figure1.toPrecision(6);

	 //var figure2 = (1 - (Math.pow(1/(1 + intr), term)));

     var figure2 = (figure1  / 30);

     var figure3 = (figure1 / 31);

	 var figure4 = (figure2 - figure3);
	
	 var figure4 = figure4.toFixed(2);
	 
	 $('input#dayResults').val(figure4);



	 // Monthly Payment
 	 $('input#monthlyPymts').val(monthlyPymt);
	 

 	 //Total Payments	 
	 var totalPayments = totalPayments;
	 $('input#totalPayments').val(totalPayments);
	 

	 //Total Finance Charges
	 var financeCharges = financeCharges.toFixed(2);
	 $('input#totalFinanceCharges').val(financeCharges); 

	var dayS = $('input#firstpymt').val();

	 		//alert(dayS);

		
	//var dailyIntrest = (monthlyPymt/30);	

	//var dailyIntrest2 = Math.round(dailyIntrest*100)/100;

	
	var daysOver = 1;

	var daysUnder = 0;	
	
	var empty = '';
	$('input#monthlyPymt').val(empty);

    

	if(dayS > thirtY){

		var trueDays = (dayS-30);
		var dailyIntrest3 = (figure4) * (trueDays);  //.toFixed(2);
		var truePayments = (dailyIntrest3 -0) + (monthlyPymt -0);
		
		 var truePayments = truePayments.toFixed(2);
		$('input#monthlyPymt').val(truePayments);

		var truePayments = truePayments.toFixed(2);
		$('input#monthlyPymts').val(truePayments); 
		var savemonthlyPymt = truePayments;
		//$('input#monthlyPymts.val() = monthlyPymt;		

		//$('input#dayResults.val() = dailyIntrest3;

		//$('input#totalPayments.val();

		//$('input#monthlyPymtd.val() = truePayments; 

		

	}else{
		
		console.log('monthlyPymt Again:'+monthlyPymt);
		var savemonthlyPymt = monthlyPymt;
		console.log('Else: savemonthlyPymt'+savemonthlyPymt);
		
		var monthlyPymt = monthlyPymt;
		$('input#monthlyPymt').val(monthlyPymt);
		
		
		var monthlyPymts = monthlyPymt;
		//$('input#monthlyPymts').val(monthlyPymts);
		$('input#monthlyPymts').val(monthlyPymt);
		

		//$('input#dayResults.val() = daysUnder;

		

	}

	

		 var weeklyPymts = (monthlyPymt / 4);
		 var weeklyPymts = weeklyPymts.toFixed(2);
	
		$('input#weeklyPymts').val(weeklyPymts);

	
		 var biweeklynumPymts = (monthlyPymt / 2);
		 var biweeklynumPymts = biweeklynumPymts.toFixed(2);
	
		$('input#biweeklyPymts').val(biweeklynumPymts);

	
		
		var stevemonthly = (savemonthlyPymt -0) * (4.3482);
		var stevebimonthly = (savemonthlyPymt -0) * (2.1741);
		var stevesemimonthly = (savemonthlyPymt -0) * (2);
		
		console.log('stevemonthly:'+stevemonthly);
		console.log('stevebimonthly:'+stevebimonthly);
		console.log('stevesemimonthly:'+stevesemimonthly);
		var stevesemimonthly = parseFloat(stevesemimonthly).toFixed(2);
		$('input#semimonthlyPymts').val(stevesemimonthly);

	





	 $('input#figure1').val(figure1);

	 

	 $('input#figure2').val(figure2);

	 	 

	 $('input#figure3').val(figure3);



	
////document.vehicleQry.applilcant_v_total_monthpmts_est.val() = princ * intr / (1 - (Math.pow(1/(1 + intr), term)));

// This simple method rounds a number to two decimal places.

}

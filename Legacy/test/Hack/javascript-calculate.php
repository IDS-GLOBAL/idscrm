<?php

$mytax = 5.0;

$licensePlusTitle = '15'; 

$row_dlrSlctBySsnDid['settingDocDlvryFee'] = '270'; 

$row_dlrSlctBySsnDid['settingDefaultAPR'] = '7.990';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



<script type="text/javascript"><!--



function updateMysum() {
	
	var vprice = document.myForm.priceVehicle.value;
	
	
	
	var nonTaxRebate = document.myForm.nonTaxRebate.value;
	
	var taxable = (vprice)-(nonTaxRebate);
	
	var taxablePrice = taxable.toFixed(2);
	
	document.myForm.taxablePrice.value = taxablePrice;

	var downPayment = document.myForm.downPayment.value;

	//Some Rebates are taxable and some rebates are not
	var reBates  = (document.myForm.reBateOne.value -0) + 
				   (document.myForm.reBateTwo.value -0) + 
				   (document.myForm.reBateThree.value -0) + 
				   (document.myForm.reBateFour.value -0) + 
				   (document.myForm.reBateFive.value -0);

									
	var tradeAllowance = document.myForm.tradeAllowance.value;
	
	var tradePayoff = document.myForm.tradePayoff.value;
	

	//Some After Market Products are taxable and some After Market Products are not
	var optionsAftermarket =   (document.myForm.optAftMktOne.value -0) + 
							   (document.myForm.optAftMktTwo.value -0) + 
							   (document.myForm.optAftMktThree.value -0) + 
							   (document.myForm.optAftMktFour.value -0) + 
							   (document.myForm.optAftMktFive.value -0) +
							   (document.myForm.optAftMktSix.value -0) +
							   (document.myForm.optAftMktSeven.value -0);

	var optionsAftermarket = optionsAftermarket.toFixed(2);
	
	
	//var insurMonths = document.myForm.insurMonths.value;
		//var insurCreditlife = document.myForm.insurCreditlife.value;
			//var insurAccHealth = document.myForm.insurAccHealth.value;
	
	var insuranceCost = (document.myForm.insurCreditlife.value -0) + 
						(document.myForm.insurAccHealth.value -0);
	
	
	var insuranceCost = insuranceCost.toFixed(2);
	//document.myForm.insuranceCost.value
	
	var extSrvcpremium = (document.myForm.extSrvcpremium.value -0);
	var extSrvcdeduct = document.myForm.extSrvcdeduct.value;

	//document.myForm.extServicePlan.value = extSrvcpremium.toFixed(2);
	
	// Adding everything up
	

	
	// Sales Tax 
	var comBinedTax = (document.myForm.priceVehicle.value -0) + 
				   (document.myForm.deliveryFee.value -0) -
				   (tradeAllowance)-
				   (nonTaxRebate);
	
	
	//Sales Tax Formated
	var taxFormatCombined= comBinedTax;
	
	var salesTax = (taxFormatCombined / 100) * <?php echo $mytax; ?>;
	//var totalAmount = (vprice*1) + (salesTax * 1);
		
	
	
	var addedUp = (document.myForm.priceVehicle.value -0) +
				  (document.myForm.optAftMktOne.value -0) +	
				  (document.myForm.extServicePlan.value -0) +
				  (document.myForm.LicenseTitleFee.value -0) +
				  (document.myForm.deliveryFee.value -0) +
				  (document.myForm.tradePayoff.value -0) +
				  (salesTax) -
				  (downPayment) -
				  (document.myForm.tradeAllowance.value -0) -

  				  (document.myForm.rebates.value -0);

	

	
	//document.myForm.reBates.value = reBates.toFixed(2);
	//document.myForm.optionsAftermarket.value;
	document.myForm.feesSalesTax.value = salesTax.toFixed(2);

	document.myForm.amountDDue.value = addedUp.toFixed(2);

















	 //This Caculate All Intrest and Monthly Payments on the RIGHT!
	 var princ = document.myForm.amountDDue.value;
	 var intr  = document.myForm.apr.value / 1200;
	 var term  = document.myForm.term.value;
 
 	 //var figure = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
	 
 	 var monthlyPymt = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);

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

	 //document.myForm.dayResults.value = figure1;

	 // Monthly Payment
 	 document.myForm.monthlyPymts.value = monthlyPymt;
 
 
 	 //Total Payments	 
	 document.myForm.totalPayments.value = totalPayments;

	 
	var dayS = document.myForm.firstPymt.value;

	//var dailyIntrest = (monthlyPymt/30);	
	//var dailyIntrest2 = Math.round(dailyIntrest*100)/100;
	

	
	
	
	
	var daysOver = 1;
	var daysUnder = 0;	
	

		
	if(dayS > thirtY){
		
		var trueDays = (dayS-30);
		
		var dailyIntrest3 = (figure4) * (trueDays);  //.toFixed(2);
						
				
		var truePayments = (dailyIntrest3 -0) + (monthlyPymt -0);

		document.myForm.monthlyPymtd.value = truePayments.toFixed(2);		
		//document.myForm.monthlyPymtd.value = monthlyPymt;
		//document.myForm.dayResults.value = dailyIntrest3;
		//document.myForm.totalPayments.value;
		//document.myForm.monthlyPymtd.value = truePayments; 
		
	}else{
		
		//document.myForm.dayResults.value = daysUnder;
		
	}
	
	
	
	
	document.myForm.totalFinanceCharges.value = financeCharges.toFixed(2);
	


	 document.myForm.figure1.value = figure1;
	 
	 document.myForm.figure2.value = figure2;
	 	 
	 document.myForm.figure3.value = figure3;

	
////document.vehicleQry.applilcant_v_total_monthpmts_est.value = princ * intr / (1 - (Math.pow(1/(1 + intr), term)));
// This simple method rounds a number to two decimal places.
}

function round(x) {
  return Math.round(x*100)/100;
}

//--></script>





</head>

<body>
<form action="../script-inventory-add-check.php" name="myForm" id="myForm">
<div id="Main Box">
                            
    <table width="100%">
                                 
                                 
                                 
                                 <tr>
                            	<td>
                            
                            <p>
                              <label>Selling Price [<a href="help-hacked.html#input1" onclick="openWin(this.href); return false" title="Help on filling out input #1.">?</a>]
                                <input name="priceVehicle" type="text" class="ui-state-default" id="priceVehicle" onChange="updateMysum()" />
                              </label>
                            </p>
                            <p>
                              <label>Non-tax Rebate
                                <input name="nonTaxRebate" type="text" class="ui-state-focus" id="nonTaxRebate" value="0.00" readonly="readonly" />
                              </label>
                            </p>
                            <p>
                              <label>Taxable Price:
                                <input name="taxablePrice" type="text" class="ui-state-focus" id="taxablePrice" value="0.00" readonly="readonly" />
                              </label>
                            </p>
                            <p>
                              <label>Down Payment:
                                <input name="downPayment" type="text" id="downPayment" onInput="updateMysum()" value="0.00" />
                              </label>
                            </p>
                            <p>
                              <label>Rebates:[<a href="help-hacked.html#rebates" onclick="openWin(this.href); return false" title="Help on filling out input #1.">?</a>]
                                <input name="rebates" type="text" class="ui-state-focus" id="rebates" value="0.00" />
                              </label>

                           <input type="hidden" name="reBateOne"  value="0.00" />
                           <input type="hidden" name="reBateTwo"  value="0.00" />
                           <input type="hidden" name="reBateThree" value="0.00"  />
                           <input type="hidden" name="reBateFour" value="0.00"  />
                           <input type="hidden" name="reBateFive" value="0.00"  />
                              
                            </p>
                            <p>
                              <label>Trade Allowance:
                           <input name="tradeAllowance" type="text" id="tradeAllowance" value="0.00" />
                              </label>
                            </p>
                            <p>
                              <label>Trade Payoff:
                                <input name="tradePayoff" type="text" id="tradePayoff" value="0.00" />
                              </label>
                            </p>
                            <p>
                              <label>Options / After Market
                                <input name="optionsAftermarket" type="text" class="ui-state-focus" id="optionsAftermarket" value="0.00" />
                              </label>
        
        <input type="hidden" name="optAftMktOne" value="0.00"  />
        <input type="hidden" name="optAftMktTwo" value="0.00"  />
        <input type="hidden" name="optAftMktThree" value="0.00"  />
        <input type="hidden" name="optAftMktFour" value="0.00"  />
        <input type="hidden" name="optAftMktFive" value="0.00"  />
        <input type="hidden" name="optAftMktSix" value="0.00"  />
        <input type="hidden" name="optAftMktSeven" value="0.00"  />                             
                            </p>
                            <p>
                              <label>Insurance
                                <input name="insuranceCost" type="text" class="ui-state-focus" id="insuranceCost" value="0.00" />
                              </label>
        <input type="hidden" name="insurMonths" value="0.00" />
        <input type="hidden" name="insurCreditlife" value="0.00"  />             
        <input type="hidden" name="insurAccHealth" value="0.00"  />
                         

                            </p>
                            <p>
                              <label>Extended Service Plan:
                                <input name="extServicePlan" type="text" id="extServicePlan" value="0.00" />
                              </label>
        <input type="hidden" name="extSrvcpremium" value="0.00"  />
        <input type="hidden" name="extSrvcdeduct" value="0.00"  />        

                            </p>
                            <p>
                              <label>License/Title Fee:
                                <input name="LicenseTitleFee" type="text" class="ui-state-default" id="LicenseTitleFee" value="<?php echo $licensePlusTitle; ?>.00" />
                              </label>
                            </p>
                            <p>
                              <label>Delivery Fee:
                                <input name="deliveryFee" type="text" class="ui-state-default" id="deliveryFee" value="<?php echo $row_dlrSlctBySsnDid['settingDocDlvryFee']; ?>.00" />
                              </label>
                            </p>
                            <p>
                              <label>Fees &amp; Sales Tax:
                                <input name="feesSalesTax" type="text" class="ui-state-focus" id="feesSalesTax" />
                              </label>
                            </p>
                            <p>========================</p>
<p>
<input type="hidden" name="allAdded"  />
  <label>Amount Due:
    <input name="amountDDue" type="text" class="ui-state-focus" id="amountDDue" />
  </label>
</p>
                            
                            	</td>
                            	<td  valign="middle">
                            
                            <p>
                            
                            <input type="button" onclick="updateMysum();" value="Calculate" />
                            
                            </p>
                            
                            <p>
                              <label>Lender:
                                <select name="mylenders" id="mylenders">
                                  <option>Select Lender</option>
                                </select>
                              </label>
                            CASH SALE</p>
                            <p>
                              <label>APR:
                                <input name="apr" type="text" id="apr" onChange="updateMysum()" value="<?php echo $row_dlrSlctBySsnDid['settingDefaultAPR']; ?>" size="6" />
                              </label>
                            </p>
                            <p>
                              <label>Term:
                                <input name="term" type="text" id="term" onInput="updateMysum()" value="72" size="3" />
                              </label>
                              <a href="#">
                            Monthly</a></p>
                            <p>
                              <label>First Payment: (days)
                                <input name="firstPymt" type="text" id="firstPymt" onInput="updateMysum()" value="30" size="3" />
                                <input name="dayResults" style="border:0px" />
                              </label>
                              
                            </p>
                            <p>MSRP
                              <label>
<input name="msrp" type="text" id="msrp" size="15" />
                              </label>
                            </p>
                            <p>
                              <label>Residual:
                                <input name="residual" type="text" id="residual" value="0.0" size="6" />
                                %
                                <input name="residualDollar" type="text" id="residualDollar" value="0.00" size="7" />
                              </label>
                            </p>
                            <p>&nbsp;</p>
                            <p>
                              <label>Monthly Payment:
                                <input name="monthlyPymtd" type="text" class="ui-state-default" id="monthlyPymt" value="" readonly="readonly" />
                              </label>
                              
                              

                            </p>
                            
                            <p>
                              <label>Monthly Payments:
                                <input name="monthlyPymts" type="text" class="ui-state-active" id="monthlyPymts" value="0.00" readonly="readonly" />
                              </label>
                            </p>
                            <p>
                              <label>Total Payments
                                <input name="totalPayments" type="text" id="totalPayments" value="0.00" />
                              </label>
                            </p>
                            <p>
                              <label>Total Finance Charges:
                                <input name="totalFinanceCharges" type="text" id="totalFinanceCharges" value="0.00" />
                              </label>
                            </p>
                            
                            	</td>
                            	<td  valign="middle">
                       
                       
                       
                       <p><label>(princ * intr / <br />
                        <input name="figure1" />
                        </label>
                       </p>
                       
                       <p><label>(1 - (Math.pow(1/(1 + intr), term))) <br />
                        <input name="figure2" />                     </label>  
                       </p>
                       
                       <p>
                        <input name="figure3" />
                       </p>
                                
                                
<div class="column col3" unselectable="on">
						
							<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
								<div class="portlet-header ui-widget-header">Reports<span class="ui-icon ui-icon-circle-arrow-s"></span></div>
								<div class="portlet-content" style="display: block;">
								  <table width="500" border="0" cellspacing="0" cellpadding="0">
								    <tr>
								      <td><a href="#">Customer Value</a></td>
								      <td><a href="#">Buyer's Guide</a></td>
							        </tr>
								    <tr>
								      <td><a href="#">Deal Recap</a></td>
								      <td><a href="#">Profit Recap</a></td>
							        </tr>
								    <tr>
								      <td><a href="#">Sales Recap</a></td>
								      <td><a href="#">Commission Voucher</a></td>
							        </tr>
							      </table>
								</div>
							</div>
                            
							<p></p><p></p><p></p><p></p>
                            
							<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
								<div class="portlet-header ui-widget-header">Forms:<span class="ui-icon ui-icon-circle-arrow-s"></span></div>
								<div class="portlet-content">
								  								  
								  <p>&nbsp;</p>
                                  
                                  <table width="500" border="0" cellspacing="0" cellpadding="0">
								    <tr>
								      <td><a href="#">Accessories Due</a></td>
								      <td><a href="#">Aftermarket</a></td>
							        </tr>
								    <tr>
								      <td><a href="#">Rollback</a></td>
								      <td><a href="#">Misc. Prompts</a></td>
							        </tr>
								    <tr>
								      <td><a href="#">Deal Profit Recap</a></td>
								      <td><a href="#">View VIN</a></td>
							        </tr>
								    <tr>
								      <td><a href="#">Deal Info</a></td>
								      <td><a href="#">Swap VIN</a></td>
							        </tr>
								    <tr>
								      <td><a href="#">Delivery Addr.</a></td>
								      <td><a href="#">Outside Lien</a></td>
							        </tr>
								    <tr>
								      <td><a href="#">Print Forms</a></td>
								      <td>Deal Date</td>
							        </tr>
								    <tr>
								      <td colspan="2" align="center"><div id="close deal" align="center">Close Deal</div></td>
							        </tr>
							      </table>
								</div>
							</div>
						</div>                                
                                
                                </td>
                              </tr>
    </table>
  </div>
                            
</form>


</body>
</html>
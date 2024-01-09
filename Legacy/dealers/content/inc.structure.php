<div id="MainBox">

<form action="#" name="myForm" id="myForm" onsubmit="return validateForm()">

                        
                            <span class="ui-state-default ui-corner-all ui-button ui-state-hover" >
                              <a href="javawindow/vehicle-java.php#input1" onclick="openVWin(this.href); return false" title="">
                            	FIND Stock Number:
                              </a>
                            </span>

                            <input name="vStockNo" type="text" class="ui-state-default" id="vStockNo" onfocus="showVehicle(this.value)" onkeyup="showVehicle(this.value)"  value="" placeholder="Enter Stock Number" />
                            <span id="sprytextfield2">
                            <input name="dDealno" type="text" class="ui-state-default" id="dDealno" onfocus="showcustomer(this.value)" onkeyup="showcustomer(this.value)"  size="30" value="" readonly="readonly" placeholder="Enter Customer Number" />
                            <span class="textfieldRequiredMsg">A value is required.</span></span><span class="ui-state-default ui-corner-all ui-button ui-state-hover" >
                            <a href="javawindow/customer-java.php#input1" onclick="openWin(this.href); return false" title="">
                            	FIND CUSTOMER!
                            </a>
                            </span>


                            

 
					<div id="tabs-1">
                          
                          <div id="Main Box">

							
                   <table cellpadding="3" cellspacing="3" id="main-content" name="main-content">

                                 

                                 

                                 

                                 <tr>

                            	<td valign="top">

                            

                            <table width="100%" border="0" cellspacing="5" cellpadding="3">

  <tr>

    <th scope="row"><label class="btn ui-state-default full-link ui-corner-all ui-state-hover">Selling Price [<a href="javawindow/customer-java.php#input1" onclick="openWin(this.href); return false" title="Help on filling out input #1.">?</a>] </label></th>

    <td><span id="sprytextfield1">
      <input name="priceVehicle" type="text" class="ui-state-default" id="priceVehicle" value="19995.00" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>

  </tr>

  <tr>

    <th scope="row"><label class="desc">Non-tax Rebate </label></th>

    <td><input name="nonTaxRebate" type="text" class="ui-state-focus" id="nonTaxRebate" value="0.00" readonly="readonly" /></td>

  </tr>

  <tr>

    <th scope="row"><label class="desc">Taxable Price: </label></th>

    <td><input name="taxablePrice" type="text" class="ui-state-focus" id="taxablePrice" value="0.00" readonly="readonly" /></td>

  </tr>

  <tr>

    <th scope="row"><label class="desc">Down Payment: </label></th>

    <td><input name="downPayment" type="text" id="downPayment" oninput="updateMysum()" value="0.00" /></td>

  </tr>

  <tr>
    <th colspan="2"  scope="row">&nbsp;</th>
    </tr>
  <tr>

    <th  scope="row"><p>
      <label class="btn ui-state-default full-link ui-corner-all ui-state-hover"><a href="javascript:hideshow(document.getElementById('adiv'))">Rebates:</a>[<a href="help-hacked.html#rebates" onclick="openWin(this.href); return false" title="Help on filling out input #1.">?</a>] <br />
      </label>
      
      
      
      
      <script type="text/javascript">
function hideshow(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}
    </script>
    </p>
    </th>

    <td><label class="desc">

      <input name="rebates" type="text" class="ui-state-focus" id="rebates" value="0.00" readonly="readonly" />

    </label><br />
    
<div id="adiv" style="display: none;">
<hr />
      1: 
      <input id="reBateOne" name="reBateOne" type="text"  value="100.00" size="5" />
      <input name="reBateOnedscrp" type="text" id="reBateOnedscrp" size="10" />
      <select name="reBateOneTax" id="reBateOneTax" title="Taxed?" />
        <option value="Y">Y</option>
        <option value="N">N</option>
      </select>
      <br />

      2: 
      <input id="reBateTwo" name="reBateTwo" type="text"  value="10.00" size="5" />
      <input name="reBateTwodscrp" type="text" id="reBateTwodscrp" size="10" />
      <select name="reBateTwoTax" id="reBateTwoTax" title="Taxed?" />
        <option value="Y">Y</option>
        <option value="N">N</option>
      </select>

      <br />

      3: 
      <input id="reBateThree" name="reBateThree" type="text" value="0.00" size="5" />
      <input name="reBateThreedscrp" type="text" id="reBateThreedscrp" size="10" />
      <select name="reBateThreeTax" id="reBateThreeTax" title="Taxed?" />
        <option value="Y">Y</option>
        <option value="N">N</option>
      </select>
      <br />

      4: 
      <input id="reBateFour" name="reBateFour" type="text" value="0.00" size="5" />
      <input name="reBateFourdscrp" type="text" id="reBateFourdscrp" size="10" />
      <select name="reBateFourTax" id="reBateFourTax" title="Taxed?" />
        <option value="Y">Y</option>
        <option value="N">N</option>
      </select>
      
      <br />

      5: 
      <input id="reBateFive" name="reBateFive" type="text" value="0.00" size="5" />
      <input name="reBateFivedscrp" type="text" id="reBateFivedscrp" size="10" />
      <select name="reBateFiveTax" id="reBateFiveTax" title="Taxed?" />
        <option value="Y">Y</option>
        <option value="N">N</option>
      </select>

      <br />
	<hr />      
</div>      
      </td>

  </tr>

  <tr>

    <th scope="row"><label class="desc">Trade Allowance: </label></th>

    <td><input name="tradeAllowance" type="text" id="tradeAllowance" value="0.00" /></td>

  </tr>

  <tr>

    <th scope="row"><label class="desc">Trade Payoff: </label></th>

    <td><input name="tradePayoff" type="text" id="tradePayoff" value="0.00" /></td>

  </tr>

  <tr>
    <th colspan="2" scope="row">&nbsp;</th>
    </tr>
  <tr>

    <th scope="row">
    
      <p>
        <label class="btn ui-state-default full-link ui-corner-all ui-state-hover"><a href="javascript:hideshow2(document.getElementById('adiv2'))">Options / After Market: </a>
        </label>
        
        
        
        
        
        <script type="text/javascript">
function hideshow2(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}
      </script>
      </p>
    </th>

    <td><label class="desc">

      <input name="optionsAftermarket" type="text" class="ui-state-focus" id="optionsAftermarket" value="0.00" readonly="readonly" />

    </label>
<div id="adiv2" style="display: none;">
<hr />
<br />
<table width="100%" border="0" cellspacing="3" cellpadding="5">
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">Code</th>
    <th scope="col">List Price</th>
    <th scope="col">Price</th>
    <th scope="col">Cost</th>
    <th scope="col">Taxed?</th>
  </tr>
  <tr>
    <th scope="row">1.</th>
    <td><select name="optAftMktOneCode" size="1">
      <option>Select</option>
    </select></td>
    <td><input name="optAftMktOneList" type="text"  id="optAftMktOneList" value="0.00" size="10" /></td>
    <td><input name="optAftMktOnePrice" type="text"  id="optAftMktOnePrice" value="0.00" size="10" /></td>
    <td><input name="optAftMktOneCost" type="text" id="optAftMktOneCost" value="0.00" size="5"  /></td>
    <td><select name="optAftMktOneTaxed" id="optAftMktOneTaxed">
      <?php
do {  
?>
      <option value="<?php echo $row_queryYN['boolean_value']?>"><?php echo $row_queryYN['boolean_value']?></option>
      <?php
} while ($row_queryYN = mysqli_fetch_assoc($queryYN));
  $rows = mysqli_num_rows($queryYN);
  if($rows > 0) {
      mysqli_data_seek($queryYN, 0);
	  $row_queryYN = mysqli_fetch_assoc($queryYN);

  }
?>
    </select></td>
  </tr>
  <tr>
    <th scope="row">2.</th>
    <td><select name="optAftMktTwoCode" id="optAftMktTwoCode" size="1">
      <option>Select</option>
    </select></td>
    <td><input name="optAftMktTwoList" type="text" id="optAftMktTwoList" value="0.00" size="10" /></td>
    <td><input name="optAftMktTwoPrice" type="text" id="optAftMktTwoPrice" value="0.00" size="10" /></td>
    <td><input name="optAftMktTwoCost" type="text" id="optAftMktTwoCost" value="0.00" size="5" /></td>
    <td><select name="optAftMktTwoTaxed" id="optAftMktTwoTaxed">
      <?php
do {  
?>
      <option value="<?php echo $row_queryYN['boolean_value']?>"><?php echo $row_queryYN['boolean_value']?></option>
      <?php
} while ($row_queryYN = mysqli_fetch_assoc($queryYN));
  $rows = mysqli_num_rows($queryYN);
  if($rows > 0) {
      mysqli_data_seek($queryYN, 0);
	  $row_queryYN = mysqli_fetch_assoc($queryYN);
  }
?>
    </select></td>
  </tr>
  <tr>
    <th scope="row">3.</th>
    <td><select name="optAftMktThreeCode" size="1">
      <option>Select</option>
    </select></td>
    <td><input name="optAftMktThreeList" type="text" id="optAftMktThreeList" value="0.00" size="10"  /></td>
    <td><input name="optAftMktThreePrice" type="text" id="optAftMktThreePrice" value="0.00" size="10" /></td>
    <td><input name="optAftMktThreeCost" type="text" id="optAftMktThreeCost" value="0.00" size="5" /></td>
    <td><select name="optAftMktThreeTaxed" id="optAftMktThreeTaxed">
      <?php
do {  
?>
      <option value="<?php echo $row_queryYN['boolean_value']?>"><?php echo $row_queryYN['boolean_value']?></option>
      <?php
} while ($row_queryYN = mysqli_fetch_assoc($queryYN));
  $rows = mysqli_num_rows($queryYN);
  if($rows > 0) {
      mysqli_data_seek($queryYN, 0);
	  $row_queryYN = mysqli_fetch_assoc($queryYN);
  }
?>
    </select></td>
  </tr>
  <tr>
    <th scope="row">4.</th>
    <td><select name="optAftMktFourCode" id="optAftMktFourCode" size="1">
      <option>Select</option>
    </select></td>
    <td><input name="optAftMktFourList" type="text" id="optAftMktFourList" value="0.00" size="10" /></td>
    <td><input name="optAftMktFourPrice" type="text" id="optAftMktFourPrice" value="0.00" size="10" /></td>
    <td><input name="optAftMktFourCost" type="text" id="optAftMktFourCost" value="0.00" size="5" /></td>
    <td><select name="optAftMktFourTaxed" id="optAftMktFourTaxed">
      <?php
do {  
?>
      <option value="<?php echo $row_queryYN['boolean_value']?>"><?php echo $row_queryYN['boolean_value']?></option>
      <?php
} while ($row_queryYN = mysqli_fetch_assoc($queryYN));
  $rows = mysqli_num_rows($queryYN);
  if($rows > 0) {
      mysqli_data_seek($queryYN, 0);
	  $row_queryYN = mysqli_fetch_assoc($queryYN);
  }
?>
    </select></td>
  </tr>
  <tr>
    <th scope="row">5.</th>
    <td><select name="optAftMktFiveCode" size="1">
      <option>Select</option>
    </select></td>
    <td><input name="optAftMktFiveList" type="text" id="optAftMktFiveList" value="0.00" size="10" /></td>
    <td><input name="optAftMktFivePrice" type="text" id="optAftMktFivePrice" value="0.00" size="10" /></td>
    <td><input name="optAftMktFiveCost" type="text" id="optAftMktFiveCost" value="0.00" size="5"  /></td>
    <td><select name="optAftMktFiveTaxed" id="optAftMktFiveTaxed">
      <?php
do {  
?>
      <option value="<?php echo $row_queryYN['boolean_value']?>"><?php echo $row_queryYN['boolean_value']?></option>
      <?php
} while ($row_queryYN = mysqli_fetch_assoc($queryYN));
  $rows = mysqli_num_rows($queryYN);
  if($rows > 0) {
      mysqli_data_seek($queryYN, 0);
	  $row_queryYN = mysqli_fetch_assoc($queryYN);
  }
?>
    </select></td>
  </tr>
  <tr>
    <th scope="row">6.</th>
    <td><select name="optAftMktSixCode" id="optAftMktSixCode" size="1">
      <option>Select</option>
    </select></td>
    <td><input name="optAftMktSixList" type="text" id="optAftMktSixList" value="0.00" size="10" /></td>
    <td><input name="optAftMktSixPrice" type="text" id="optAftMktSixPrice" value="0.00" size="10" /></td>

    <td><input name="optAftMktSixCost" type="text" id="optAftMktSixCost" value="0.00" size="5"  /></td>
    <td><select name="optAftMktSixTaxed" id="optAftMktSixTaxed">
      <?php
do {  
?>
      <option value="<?php echo $row_queryYN['boolean_value']?>"><?php echo $row_queryYN['boolean_value']?></option>
      <?php
} while ($row_queryYN = mysqli_fetch_assoc($queryYN));
  $rows = mysqli_num_rows($queryYN);
  if($rows > 0) {
      mysqli_data_seek($queryYN, 0);
	  $row_queryYN = mysqli_fetch_assoc($queryYN);
  }
?>
    </select></td>
  </tr>
  <tr>
    <th scope="row">7.</th>
    <td><select name="optAftMktSevenCode" id="optAftMktSevenCode" size="1">
      <option>Select</option>
    </select></td>
    <td><input name="optAftMktSevenList" type="text" id="optAftMktSevenList" value="0.00" size="10" /></td>
    <td><input name="optAftMktSevenPrice" type="text" id="optAftMktSevenPrice" value="0.00" size="10" /></td>
    <td><input name="optAftMktSevenCost" type="text" name="optAftMktSevenCost" value="0.00" size="5" /></td>
    <td><select name="optAftMktSevenTaxed" id="optAftMktSevenTaxed">
      <?php
do {  
?>
      <option value="<?php echo $row_queryYN['boolean_value']?>"><?php echo $row_queryYN['boolean_value']?></option>
      <?php
} while ($row_queryYN = mysqli_fetch_assoc($queryYN));
  $rows = mysqli_num_rows($queryYN);
  if($rows > 0) {
      mysqli_data_seek($queryYN, 0);
	  $row_queryYN = mysqli_fetch_assoc($queryYN);
  }
?>
    </select></td>
  </tr>
</table>
      
      <hr />      
</div>
      </td>

  </tr>

  <tr>
    <th colspan="2" scope="row">&nbsp;</th>
    </tr>
  <tr>

    <th scope="row"><p>
      <label class="btn ui-state-default full-link ui-corner-all ui-state-hover"><a href="javascript:hideshow3(document.getElementById('adiv3'))">Insurance: </a></label>
      <br />
      
      
      
      <script type="text/javascript">
function hideshow3(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}
        </script>
    </p>
    </th>

    <td><label class="desc">

      <input name="insuranceCost" type="text" class="ui-state-focus" id="insuranceCost" value="0.00" readonly="readonly" />

    </label>

<div id="adiv3" style="display: none;">
<hr />
      <input type="text" name="insurMonths"  id="insurMonths" value="0.00" /><br />

      <input type="text" name="insurCreditlife" id="insurCreditlife" value="0.00"  /><br />


      <input type="text" name="insurAccHealth" id="insurAccHealth" value="0.00" /><br />
<hr />
</div>      
      </td>

  </tr>

  <tr>
    <th colspan="2" scope="row">&nbsp;</th>
    </tr>
  <tr>

    <th scope="row"><label class="btn ui-state-default full-link ui-corner-all ui-state-hover"><a href="javascript:hideshow4(document.getElementById('adiv4'))">Extended Service Plan:</a> 
    </label>
    <p>
    
	</p>
<script type="text/javascript">
function hideshow4(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}
</script>    
    </th>

    <td><label class="desc">

      <input name="extServicePlan" type="text" class="ui-state-focus" id="extServicePlan" value="0.00" size="5" readonly="readonly" />

    </label><br />
<div id="adiv4" style="display: none;">
<hr />
<table>
    	<tr>
    	  <td>Months:</td>
        	<td>
      <label class="desc"><input name="extSrvcMonths" type="text" id="extSrvcMonths" value="0" size="5" /></label>
      </td>
        	<td>Company:</td>
      <td>
		<label class="desc"><select name="extSrvcCompany" id="extSrvcCompany">
		  <option>Select</option>
		</select></label>
      </td>
    </tr>
    
    <tr>
      <td>Miles:</td>
      <td>
      <label class="desc"><input name="extSrvcMiles" type="text" id="extSrvcMiles" value="0" size="5"  /></label>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;
      
      </td>
    </tr>

    <tr>
      <td>Start Date:</td>
      <td>
      <label class="desc"><input name="extSrvcStartDate" type="text" id="extSrvcStartDate" size="5"  /></label>
      </td>
      <td>Contract No:</td>
      <td>
      <label class="desc"><input name="extSrvcContractNo" type="text" id="extSrvcContractNo" size="5"  /></label>      
      </td>
    </tr>

    <tr>
      <td>Start Miles:</td>
        <td>
      	<label class="desc"><input name="extSrvcStartMiles" type="text" id="extSrvcStartMiles"  value="0" size="5"  /></label>
      </td>
        <td>Premium:</td>
      <td>
      <label class="desc"><input name="extSrvcPremium"  type="text" id="extSrvcPremium" value="0.00" size="5"  /></label>      
      </td>
    </tr>

    <tr>
      <td>End Date:</td>
      <td>
      <label class="desc"><input name="extSrvcEndDate" type="text" id="extSrvcEndDate"  size="5"  /></label>        
     
      </td>
      <td>Deductible:</td>
      <td>
      <label class="desc"><input name="extSrvcdeduct" type="text" id="extSrvcdeduct" value="0.00" size="5"  /></label>
     
      </td>
    </tr>
    
    <tr>
      <td>End Miles:</td>
     
      <td>
      <label class="desc"><input name="extSrvcEndMiles" type="text" id="extSrvcEndMiles" value="0" size="5"  /></label>
		</td>
      <td>&nbsp;</td>
	  <td>&nbsp;
      
      </td>
     </tr>
</table>
<hr />      
</div>      
      </td>

  </tr>

  <tr>

    <th scope="row"><label class="desc">License/Title Fee: </label></th>

    <td><input name="LicenseTitleFee" type="text" class="ui-state-default" id="LicenseTitleFee" value="<?php echo $licensePlusTitle; ?>.00" /></td>

  </tr>

  <tr>

    <th scope="row"><label class="desc">Delivery Fee: </label></th>

    <td><input name="deliveryFee" type="text" class="ui-state-default" id="deliveryFee" value="<?php echo $row_userDets['settingDocDlvryFee']; ?>" /></td>

  </tr>

  <tr>

    <th scope="row"><label class="desc">Fees &amp; Sales Tax: 
      <input name="noTaxes" type="checkbox" id="noTaxes" value="Y" onclick="updateMysum();" /> Check No Taxes
    </label></th>

    <td><input name="feesSalesTax" type="text" class="ui-state-focus" id="feesSalesTax" readonly="readonly" /></td>

  </tr>

  <tr>

    <th colspan="2" scope="row"><p>======================================================</p></th>

    </tr>

  <tr>

    <th scope="row">

          <label class="desc">Amount Due:  </label>

          <input type="hidden" name="allAdded"  />

</th>

    <td><input name="amountDDue" type="text" class="ui-state-focus" id="amountDDue" readonly="readonly" /></td>

  </tr>

  <tr>

    <th scope="row">&nbsp;</th>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <th colspan="2" scope="row">

    

    

    

    </th>

    </tr>
  <tr>
    <th colspan="2" scope="row"></th>
  </tr>
  <tr>
    <th colspan="2" scope="row"><button class="ui-state-default ui-corner-all ui-button ui-state-hover" onclick="findealno()">Make Deal</button></th>
  </tr>

                            </table>

                            

                            	</td>

                            	<td  valign="top">

                            

                            <table width="300" border="0" cellspacing="5" cellpadding="3">

  <tr>

    <td><button id="Make_Deal" class="ui-state-default ui-corner-all ui-button ui-state-hover" onclick="findealno()">Make Deal</button></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td><input type="button" style="padding:6px" onclick="updateMysum();" value="Calculate" /></td>

  </tr>

  <tr>

    <td><label class="btn ui-state-default full-link ui-corner-all ui-state-hover"><a href="javascript:hideshow5(document.getElementById('adiv5'))"><strong>To Be LeinHolder:</strong></a></label></td>

    <td>
    <select name="leinHolderSelct">
              <option>Select</option>
              </select>
    </td>

  </tr>

  <tr>
    <td colspan="2">
    <p>
    
    	<div id="adiv5" style="display: none;">
        <table width="100%" border="1">
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <th scope="row">Name Of Lender:</th>
            <td><label>
              <input type="text" name="vLeinHolderNm" id="vLeinHolderNm" />
            </label></td>
            </tr>        
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <th scope="row">Address:</th>
            <td><label>
              <input type="text" name="vLeinHolderAddr" id="vLeinHolderAddr" />
            </label></td>
            </tr>
          <tr>
            <th scope="row">Address 2:</th>
            <td><label>
              <input type="text" name="vLeinHolderAddr2" id="vLeinHolderAddr2" />
            </label></td>
            </tr>
            
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            </tr>

          <tr>
            <th scope="row">Zip:</th>
            <td><label>
              <input type="text" name="vLeinHolderZip" id="vLeinHolderZip" />
            </label></td>
            </tr>
          <tr>
            <th scope="row">City/State:</th>
            <td><input name="vLeinHolderCity" type="text" id="vLeinHolderCity" size="10" />
              <select name="vLeinHolderState" id="vLeinHolderState">
                <?php
do {  
?>
                <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
              </select></td>
            </tr>

          <tr>
            <th scope="row">Lein Holder No: (Bank)</th>
            <td><input type="text" name="vLeinHolderLeinNo" id="vLeinHolderLeinNo" /></td>
            </tr>
            
          <tr>
            <th scope="row">Phone No: (Phone)</th>
            <td><input type="text" name="vLeinHolderPhnNo" id="vLeinHolderPhnNo" /></td>
            </tr>
            
            
        </table>
        </div>
    
    </p>
    </td>
    </tr>
  <tr>

    <td><label class="desc">APR: </label></td>

    <td><input name="apr" type="text" id="apr" value="<?php echo $dapr; ?>" size="6" /></td>

  </tr>

  <tr>

    <td>First Payment:</td>

    <td><label class="desc">

      <input name="firstpymt" type="text" id="firstpymt" oninput="updateMysum()" value="30" size="3" />

    </label>

      <a href="#"> Monthly</a></td>

  </tr>

  <tr>

    <td><label class="desc">Term: </label></td>

    <td><input name="term" type="text" id="term" oninput="updateMysum()" value="<?php echo $dterm; ?>" size="3" /></td>

  </tr>

  <tr>

    <td><label class="desc">MSRP: </label></td>

    <td><input name="msrp" type="text" id="msrp" size="15" /></td>

  </tr>

  <tr>

    <td><label class="desc"> Daily Intrest: </label></td>

    <td><input name="dayResults" type="text" id="dayResults" value="0.0" size="6" readonly="readonly" />

%

  <input name="residualDollar" type="text" id="residualDollar" value="0.00" size="7" readonly="readonly" /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>
    	<input id="Calculate" type="button" style="padding:6px" onclick="updateMysum();" value="Calculate" />
		<!-- label class="desc">Deferred Monthly Payment: </label -->
	</td>

    <td><input name="monthlyPymt" type="hidden" class="ui-state-default" id="monthlyPymt" value="" readonly="readonly" /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td><label class="desc">Monthly Payments: </label></td>

    <td><input name="monthlyPymts" type="text" class="ui-state-focus" id="monthlyPymts" value="0.00" readonly="readonly"  /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td><label class="desc">Total Payments </label></td>

    <td><input name="totalPayments" type="text" id="totalPayments" value="0.00" readonly="readonly" /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td><label class="desc">Total Finance Charges: </label></td>

    <td><input name="totalFinanceCharges" type="text" id="totalFinanceCharges" value="0.00" readonly="readonly" /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td colspan="2">

    

    

    <table>

    <tr>

    

    

    			<td width="33%"  valign="top">

                                
    <input id="Calculate" type="button" style="padding:6px" onclick="updateMysum();" value="Calculate" />





                                

						                                

                                

               </td>

    

    

    </tr>

    </table>

    

    

    

    </td>

    </tr>

</table>



                            

                            	</td>

                            	

                              </tr>

                            </table>



                          </div>

                    </div>
					<div id="tabs-2">
                    
                            
							
							<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td colspan="2" align="center"><label class="desc">Vehicle Appraised:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
<select name="vTradeVerifiedBy" id="vTradeVerifiedBy">
        <option value="">Select Appraiser</option>
        <?php
do {  
?>
        <option value="<?php echo $row_managers['manager_id']?>"><?php echo $row_managers['manager_firstname'].' '.$row_managers['manager_lastname']; ?></option>
<?php
} while ($row_managers = mysqli_fetch_assoc($managers));
  $rows = mysqli_num_rows($managers);
  if($rows > 0) {
      mysqli_data_seek($managers, 0);
	  $row_managers = mysqli_fetch_assoc($managers);
  }
?>
      </select>
    </label></td>
    </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <th scope="row"><label class="desc">VIN:</label></th>
        <td colspan="2"><label>
          <input name="vTradeVin" type="text" id="vTradeVin" size="50" maxlength="17" />
        </label></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">Year Make Model:</label></th>
        <td><select name="vTradeYr" id="vTradeYr">
          <option value="">Select Year</option>
          <?php
do {  
?>
          <option value="<?php echo $row_carYears['car_year']?>"><?php echo $row_carYears['car_year']?></option>
          <?php
} while ($row_carYears = mysqli_fetch_assoc($carYears));
  $rows = mysqli_num_rows($carYears);
  if($rows > 0) {
      mysqli_data_seek($carYears, 0);
	  $row_carYears = mysqli_fetch_assoc($carYears);
  }
?>
  </select>

            
        </td>
        <td>
        
       <label class="desc"> Make:</label>
    
        </td>
        <td><select name='trademake' id="trademake" onchange="AjaxFunction(this.value);">
          <option value=''>Select One</option>
          <?php
do {  
?>
          <option value="<?php echo $row_carMakes['car_make']?>"><?php echo $row_carMakes['car_make']?></option>
          <?php
} while ($row_carMakes = mysqli_fetch_assoc($carMakes));
  $rows = mysqli_num_rows($carMakes);
  if($rows > 0) {
      mysqli_data_seek($carMakes, 0);
	  $row_carMakes = mysqli_fetch_assoc($carMakes);
  }
?>
        </select></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">Trim/Style:</label></th>
        <td><label>
          <input name="vTradeTrim" type="text" id="vTradeTrim" size="10" />
        </label></td>
        <td><label class="desc">Model:<br/>
        </label></td>
        <td><label>
          <select name='subcat'>
          </select>
          <br />
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">Trade Mileage:</label></th>
        <td><input name="vTradeMiles" type="text" id="vTradeMiles" value="" size="10" /></td>
        <td><label class="desc">Exterior Color:</label></td>
        <td><input name="vTradeColor" type="text" id="vTradeColor" size="20" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">Trade Allow:</label></th>
        <td><label>
          <input name="vTradeAllow" type="text" id="vTradeAllow" value="0.00" />
        </label></td>
        <td><label class="desc">Pay Off Amount:</label></td>
        <td><input name="vTradePayOff" type="text" id="vTradePayOff" value="" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">License Fee:</label></th>
        <td><label class="desc">
          <input name="vTradeLicsfee" type="text" id="vTradeLicsfee" value="0.00" />
        </label></td>
        <td><label class="desc">ACV:</label></td>
        <td><input name="tradeACV" type="text" id="tradeACV" value="0.00" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">Tag#:</label></th>
        <td><label>
          <input type="text" name="vTradeTagNo" id="vTradeTagNo" />
        </label></td>
        <td><label class="desc">Tag State:</label></td>
        <td><input type="text" name="vTradeTagState" id="vTradeTagState" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">Title:</label></th>
        <td><label>
          <input type="text" name="vTradeTitle" id="vTradeTitle" />
        </label></td>
        <td><label class="desc">Tag Expiration:</label></td>
        <td><input type="text" name="vTradeTagExprDate" id="vTradeTagExprDate" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><script type="text/javascript">
function hideshow5(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}
        </script>
        	<label class="desc">
            	<a href="javascript:hideshow5(document.getElementById('adiv6'))">Lein Holder:<br /> (Pay Trade Off To) </a>
            </label>
        </th>
        <td>

        
        
        
          <p> <a href="javascript:hideshow5(document.getElementById('adiv6'))"><strong>Show/Hide</strong></a> </p></td>
        <td colspan="3"><div id="adiv6" style="display: none;">
          <table border="1">
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            </tr>            

          <tr>
            <th scope="row">Lein Holder Of Trade Select:</th>
            <td><select name="leinHolderTradeSelct" id="leinHolderTradeSelct">
              <option>Select</option>
              &nbsp;</select></td>
            </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            </tr>            

          <tr>
            <th scope="row">Company:</th>
            <td><label>
              <input type="text" name="vTradePayoffCompany" id="vTradePayoffCompany" />
            </label></td>
            </tr>            
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            </tr>            
          <tr>
            <th scope="row">Lein Holder No:</th>
            <td><label>
              <input type="text" name="vTradeLeinHldrAcctNo" id="vTradeLeinHldrAcctNo" />
            </label></td>
            </tr>            
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <th scope="row">Address:</th>
            <td><label>
              <input type="text" name="vTradePayoffCompanyAddr" id="vTradePayoffCompanyAddr" />
            </label></td>
            </tr>
          <tr>
            <th scope="row">Address 2:</th>
            <td><label>
              <input type="text" name="vTradePayoffCompanyAddr2" id="vTradePayoffCompanyAddr2" />
            </label></td>
            </tr>
            
          <tr>
            <th scope="row">Zip:</th>
            <td><label>
              <input type="text" name="vTradePayoffCompanyZip" id="vTradePayoffCompanyZip" />
            </label></td>
            </tr>
          <tr>
            <th scope="row">City/State:</th>
            <td><input name="vTradePayoffCompanyCity" type="text" id="vTradePayoffCompanyCity" size="10" />
              <select name="vTradePayoffCompanyState" id="vTradePayoffCompanyState">
                <?php
do {  
?>
                <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
              </select></td>
            </tr>
          <tr>
            <th scope="row">Phone No:</th>
            <td><input type="text" name="vTradePayoffCompanyPhoneno" id="vTradePayoffCompanyPhoneno" /></td>
            </tr>
          <tr>
            <th scope="row">Lein Acct#:</th>
            <td><input type="text" name="vTradeLeinHldrAcctNo" id="vTradeLeinHldrAcctNo" /></td>
            </tr>
          <tr>
            <th scope="row">Pay Off Good Thru:</th>
            <td><input type="text" name="vTradePayoffGoodUntil" id="vTradePayoffGoodUntil" /></td>
            </tr>
          <tr>
            <th scope="row">Per Diem:</th>
            <td><input type="text" name="vTradePayoffPerDiem" id="vTradePayoffPerDiem" /></td>
            </tr>
        </table>
        </div>
        </td>
        </tr>
      <tr>
        <th scope="row"><label class="desc">Decal:</label></th>
        <td><label>
          <input type="text" name="vTradeDecal" id="vTradeDecal" />
        </label></td>
        <td><label class="desc">Sticker #:</label></td>
        <td><input type="text" name="vTradeStikNo" id="vTradeStikNo" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">Owner(s):</label></th>
        <td colspan="2"><label>
          <input type="text" name="vTradeOwner" id="vTradeOwner" />
        </label></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><label class="desc">Disclosure: </label></th>
        <td><label>
          <textarea name="vTradeRemarksAttached" id="vTradeRemarksAttached" cols="45" rows="5"></textarea>
        </label></td>
        <td valign="top"><label><label class="desc">Open RO Amount:</label></label></td>
        <td><textarea name="vTradeOpenRO" rows="5" id="vTradeOpenRO"></textarea></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
							
                    
      

               	  </div>
					<div id="tabs-3">
                    
                    <table width="600" border="1">
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><label class="desc">Customer Cash Deposit:</label></th>
    <td><input type="text" name="cashDeposit" id="cashDeposit" /></td>
    <td><label class="desc">Receipt Number:</label></td>
    <td><input type="text" name="receiptNo" id="receiptNo" /></td>
  </tr>
  <tr>
    <th scope="row"><label class="desc">Cash On Delivery</label></th>
    <td><input type="text" name="COD" id="COD" /></td>
    <td><label class="desc">Receipt Number2:</label></td>
	<td><input type="text" name="receiptNo2" id="receiptNo2" /></td>
  </tr>  
  <tr>
    <th scope="row"><label class="desc">Rebate To Reduce Sales Price:</label></th>
    <td><input type="text" name="rebateToReduceSalesPrice" id="rebateToReduceSalesPrice" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><label class="desc">VSI Fee:</label></th>
    <td><input type="text" name="VSIFEE" id="VSIFEE" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><label class="desc">Loan Processing Fee:</label></th>
    <td><input type="text" name="loanProcessingFee" id="loanProcessingFee" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

                    
                    </div>
					<div id="tabs-5">
                      <table width="400" border="0" cellspacing="5" cellpadding="5">
                        <tr>
                          <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                              <th scope="row"><label class="desc">License Fee</label></th>
                              <td><input type="text" name="licsFee" id="licsFee" value="<?php echo $license; ?>" /></td>
                            </tr>
                            <tr>
                              <th scope="row"><label class="desc">Title Fee</label></th>
                              <td><input name="titleFee" type="text" id="titleFee" value="<?php echo $row_userDets['settingTitleFee']; ?>" /></td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <th scope="row"><label class="desc">Total</label></th>
                              <td><input type="text" name="licsNtitlefee" id="licsNtitlefee" /></td>
                            </tr>
                          </table></td>
                          <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                              <th scope="row"><label class="desc">State Inspection</label></th>
                              <td><input name="stateInspect" type="text" id="stateInspect" value="<?php echo $row_userDets['settingStateInspectnFee']; ?>" /></td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                              <th scope="row"><label class="desc">State</label></th>
                              <td><input name="stateTaxperc" type="text" id="stateTaxperc" value="<?php echo $row_userDets['settingSateSlsTax']; ?>" size="10" /></td>
                              <td><input type="text" name="stateTaxpercTotal" id="stateTaxpercTotal" /></td>
                            </tr>
                            <tr>
                              <th scope="row"><label class="desc">County</label></th>
                              <td><input name="taxCountyperc" type="text" id="taxCountyperc" size="10" /></td>
                              <td><input type="text" name="taxCountypercTotal" id="taxCountypercTotal" /></td>
                            </tr>
                            <tr>
                              <th scope="row"><label class="desc">City</label></th>
                              <td><input name="taxCityperc" type="text" id="taxCityperc" size="10" maxlength="7" /></td>
                              <td><input type="text" name="taxCitypercTotal" id="taxCitypercTotal" /></td>
                            </tr>
                            <tr>
                              <th scope="row"><label class="desc">Tax State</label></th>
                              <td><select name="taxState" id="taxState">
                                <option value="" <?php if (!(strcmp("", $row_userDets['state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
                                <?php
do {  
?>
                                <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDets['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                                <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
                              </select></td>
                              <td ><label class="desc">Default Taxed On: <?php echo $mytax; ?></label></td>
                            </tr>
                            <tr>
                              <th scope="row">&nbsp;</th>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                          </table></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
					</div><!-- End Tabs Display -->
					<div id="tabs-6">
                      <table>
                        <tr>
                                                      <th scope="row"><label class="desc">Insurance Company Name:</label></th>
                                                      <td><input name="vInsurCompNm" type="text" id="vInsurCompNm"  /></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row"><label class="desc">Insurance Company Address:</label></th>
                                                      <td><input name="vInsurCompAddr"  type="text" id="vInsurCompAddr"  /></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row"><label class="desc">Insurance Company Address2:</label></th>
                                                      <td><input name="vInsurCompAddr2"  type="text" id="vInsurCompAddr2"  /></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row"><label class="desc">Insurance Company City:</label></th>
                                                      <td><input name="vInsurCompCity"  type="text" id="vInsurCompCity"  /></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row"><label class="desc">Insurance Company State:</label></th>
                                                      <td>
                                                            <select name="vInsurCompState" id="vInsurCompState">
                                                        <?php
                        do {  
                        ?>
                                                        <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDets['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
                                                        <?php
                        } while ($row_states = mysqli_fetch_assoc($states));
                          $rows = mysqli_num_rows($states);
                          if($rows > 0) {
                              mysqli_data_seek($states, 0);
                              $row_states = mysqli_fetch_assoc($states);
                          }
                        ?>
                                                      </select>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row"><label class="desc">Insurance Company Zip:</label></th>
                                                      <td><input name="vInsurCompZip"  type="text" id="vInsurCompZip"  /></td>
                                                    </tr>
                        </table>
					</div><!-- End Tabs Display -->
  </form>

</div>
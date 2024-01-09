<div class="credit-app" align="center">

  <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="online-creditapp" id="online-creditapp">
  
  <table bgcolor="#FFFFFF" width="100%" border="0" cellspacing="5" cellpadding="5" class="credit-app">
<tr>
	<td valign="top" align="center" height="50">
    	<p>
        	<strong>
            	<h2>Online Auto Loan Credit Application</h2>
                <h1><?php echo $row_slct_dlr['company']; ?></h1>
				<?php echo $row_slct_dlr['address']; ?><br />
                <?php echo $row_slct_dlr['city']; ?>, <?php echo $row_slct_dlr['state']; ?>, <?php echo $row_slct_dlr['zip']; ?><br />
                Phone: <?php echo $row_slct_dlr['phone']; ?><br />
                Fax: <?php echo $row_slct_dlr['fax']; ?>
            </strong>
       </p>
    </td>
</tr>


  <tr>
    <td valign="top">
    
    
    
    <table border="0" cellspacing="5" cellpadding="5" class="credit-app">
      <tr>
        <td colspan="5"><strong>Full Name:</strong>
          <input type="text" name="applicant_name" value="" size="32" />
          <strong>Email: </strong><span id="sprytextfield4">
          <input type="text" name="applicant_email_address" value="" size="32" />
          <span class="textfieldRequiredMsg">Email Required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span><strong>SSN:</strong>
          <input name="applicant_ssn" type="text" value="" size="10" maxlength="5">-
          <input name="applicant_ssn4" type="text" value="" size="4" maxlength="4"> 
          Last 4</td>
      </tr>
      <tr>
        <td><strong>Age:</strong> 
          <input name="applicant_age" type="text" id="applicant_age" size="3" maxlength="3">
        </td>
        <td><strong>Date Of Birth</strong>: <br />
          <input type="text" name="applicant_dob" value="" size="20"></td>
          
          <td><strong>Driver License No. &amp; State:</strong></td>
        <td colspan="2"><input type="text" name="applicant_driver_licenses_number" value="" size="15">
          <select name="applicant_driver_state_issued">
            <option value="" >Select State</option>
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
        <td valign="top"><strong>Present Address:</strong></td>
        <td><textarea name="applicant_present_address1" cols="20"></textarea></td>
        <td colspan="1"><strong>Main Phone Number:</strong></td>
        <td><span id="sprytextfield2">
          <input type="text" name="applicant_main_phone" value="" size="15" />
          <span class="textfieldRequiredMsg"><br />A value is required.</span><span class="textfieldInvalidFormatMsg"><br />Example format. (123) 456-1587</span></span></td>
      </tr>
      <tr>
        <td colspan="1"><strong>City: </strong></td>
        <td><input type="text" name="applicant_present_addr_city" value="" size="20" /></td>
        <td><strong>State:</strong>
          <select name="applicant_present_addr_state">
          <option value="" >Select State</option>
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
        <td colspan="2"><strong>Zip Code: </strong>          <input type="text" name="applicant_present_addr_zip" value="" size="10"></td>
      </tr>
      <tr>
        <td colspan="2">
        
        <table class="credit-app">
          <tr>
            <td><strong>About Your Home:</strong></td>
            <td><input type="radio" name="applicant_buy_own_rent_other" value="Buy" >
              Buy </td>
            <td><input type="radio" name="applicant_buy_own_rent_other" value="Own" >
              Own </td>
            <td><input type="radio" name="applicant_buy_own_rent_other" value="Rent" >
              Rent </td>
            <td><input type="radio" name="applicant_buy_own_rent_other" value="Other" >
              Other </td>
          </tr>
        </table></td>
        <td valign="top"><strong>Monthly Payment: </strong></td>
        <td><input type="text" name="applicant_house_payment" value="$" size="10"></td>
      </tr>
      <tr>
        <td><strong>How Many Years:</strong></td>
        <td><select name="applicant_previous1_live_years">
          <option value="" >Select Years</option>
          <?php
do {  
?>
          <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
          <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
        </select></td>
        <td><strong>How Many Months:</strong></td>
        <td><select name="applicant_previous1_live_months">
          <option value="" >Select Months</option>
          <?php
do {  
?>
          <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
          <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
        </select></td>
      </tr>
      <tr>
        <td><strong>Previous Address:</strong></td>
        <td><textarea name="applicant_previous1_addr1" cols="20" rows="2"></textarea></td>
        <td>&nbsp;
        	  
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>City: </strong></td>
        <td><input type="text" name="applicant_previous1_addr_city" value="" size="20"></td>
        <td><strong>State:
          </strong>          <select name="applicant_previous1_addr_state">
            <option value="" >Select State</option>
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
          </select>
            </td>
        <td><strong>Zip:</strong>          <input name="applicant_previous1_addr_zip" type="text" id="applicant_previous1_addr_zip" value="" size="5"></td>
        </tr>
      	
        <tr>
        	<td colspan="5"><br />&nbsp;</td>
        </tr>
      
      <tr>
        <td><strong>Present Employer:</strong></td>
        <td><input type="text" name="applicant_employer1_name" value="" size="20"></td>
        <td><strong>Position: </strong></td>
        <td colspan="2"><input type="text" name="applicant_employer1_position" value="" size="20"></td>
      </tr>
      <tr>
        <td><strong>Employer's Address:</strong></td>
        <td><textarea name="applicant_employer1_addr" cols="20" rows="2"></textarea></td>
        <td><strong>Phone No: </strong></td>
        <td colspan="2"><input type="text" name="applicant_employer1_phone" value="" size="20"></td>
      </tr>
      <tr>
        <td> <strong>Employer's City:</strong></td>
        <td><input type="text" name="applicant_employer1_city" value="" size="20"></td>
        <td><strong>State:
          </strong>          <select name="applicant_employer1_state">
            <option value="">Select State</option>
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
        <td colspan="2"><strong>Zip:          
          <input type="text" name="applicant_employer1_zip" value="" size="5">
        </strong></td>
      </tr>
      <tr>
        <td><strong>Length Of Employment:</strong></td>
        <td><select name="applicant_employer1_work_years">
          <option value="" >Select Years</option>
          <?php
do {  
?>
          <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
          <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
        </select>
          <br /></td>
        <td><strong>Months:</strong></td>
        <td colspan="2"><select name="applicant_employer1_work_months">
          <option value="" >Select Months</option>
          <?php
do {  
?>
          <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
          <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
        </select></td>
      </tr>
      <tr>
        <td><strong>Salary Bring Home:</strong></td>
        <td colspan="3"><input type="text" name="applicant_employer1_salary_bringhome" id="applicant_employer1_salary_bringhome" /></td>
      </tr>
      <tr>
        <td><strong>Salary / Wage Frequency:</strong></td>
        <td colspan="3">
        
        <table class="credit-app">
            <tr>
              <td><input type="radio" name="applicant_employer1_payday_freq" value="Daily" >
                Daily</td>
              <td><input type="radio" name="applicant_employer1_payday_freq" value="Weekly" >
                Weekly</td>
              <td><input type="radio" name="applicant_employer1_payday_freq" value="Bi-Weekly" >
                Bi-Weekly</td>
              <td><input type="radio" name="applicant_employer1_payday_freq" value="Monthly" >
                Monthly</td>
              <td><input type="radio" name="applicant_employer1_payday_freq" value="Annually" >
                Annually</td>
              </tr>
            </table>
        
        </td>
        </tr>
      <tr>
        <td><br /><br /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Previous Employer:</strong></td>
        <td><input name="applicant_employer2_name" type="text" id="applicant_employer2_name" value="" size="32"></td>
        <td><strong>Position:</strong></td>
        <td colspan="2"><input name="applicant_employer2_position" type="text" id="applicant_employer2_position" value="" size="32"></td>
      </tr>
      <tr>
        <td><strong>Previous Employer Address:</strong></td>
        <td><input name="applicant_employer2_addr" type="text" id="applicant_employer2_addr" value="" size="32"></td>
        <td><strong>Phone No:</strong></td>
        <td colspan="2"><input name="applicant_employer2_phone" type="text" id="applicant_employer2_phone" value="" size="32">  </td>
      </tr>
      <tr>
        <td><strong>Previous Employer City:</strong></td>
        <td><input name="applicant_employer2_city" type="text" id="applicant_employer2_city" value="" size="32"></td>
        <td> <strong>State: </strong>          
        	<select name="applicant_employer2_state" id="applicant_employer2_state">
            <option value="" >Select State</option>
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
        <td colspan="2">
          <strong>Zip:</strong>          <input name="applicant_employer2_zip" type="text" id="applicant_employer2_zip" value="" size="5"></td>
      </tr>
      <tr>
        <td><strong>Previous Employer Salary Gross:</strong></td>
        <td colspan="3"><input type="text" name="applicant_employer2_salary_bringhome" id="applicant_employer2_salary_bringhome" /></td>
      </tr>
      <tr>
        <td><strong>Previous Employer Salry / Wage:</strong></td>
        <td colspan="3">
        
        
        <table class="credit-app">
            <tr>
              <td><input type="radio" name="applicant_employer2_payday_freq" value="Daily" >
                Daily</td>
              <td><input type="radio" name="applicant_employer2_payday_freq" value="Weekly" >
                Weekly</td>
              <td><input type="radio" name="applicant_employer2_payday_freq" value="Bi-Weekly" >
                Bi-Weekly</td>
              <td><input type="radio" name="applicant_employer2_payday_freq" value="Monthly" >
                Monthly</td>
              <td><input type="radio" name="applicant_employer2_payday_freq" value="Annually" >
                Annually</td>
              </tr>
            </table>
        
        
        </td>
        </tr>
      <tr>
        <td><strong>Length Of Employment:</strong></td>
        <td><select name="applicant_employer2_work_years" id="applicant_employer2_work_years">
          <option value="" >Select Years</option>
          <?php
do {  
?>
          <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
          <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
        </select></td>
        <td><strong>Months:</strong></td>
        <td colspan="2"><select name="applicant_employer2_work_months" id="applicant_employer2_work_months">
          <option value="" >Select Months</option>
          <?php
do {  
?>
          <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
          <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
        </select></td>
      </tr>
      <tr>
        <td><strong>Other Monthly Income:</strong></td>
        <td><input type="text" name="applicant_other_income_amount" value="" size="32"></td>
        <td><strong>Income Source:</strong></td>
        <td colspan="2"><input type="text" name="applicant_other_income_source" value="" size="32"></td>
      </tr>
      <tr>
        <td><strong>Name Of Nearest Realative:</strong></td>
        <td><input type="text" name="applicants_realative1_name" value="" size="32"></td>
        <td><strong>Relationship:</strong></td>
        <td colspan="2"><input type="text" name="applicants_realative1_relationship" value="" size="32"></td>
      </tr>
      <tr>
        <td><strong>Realative's Address:</strong></td>
        <td><input type="text" name="applicants_realative1_address" value="" size="32"></td>
        <td><strong>Phone No:</strong></td>
        <td colspan="2"><input type="text" name="applicants_realative1_mainphone" value="" size="32"></td>
      </tr>
      <tr>
        <td><strong>City:</strong></td>
        <td><input type="text" name="applicants_realative1_address_city" value="" size="20"></td>
        <td><strong>State:</strong><select name="applicants_realative1_address_state" id="applicants_realative1_address_state">
  <option value="">Select State</option>
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
        <td colspan="2"><strong>Zip Code:</strong>          <input type="text" name="applicants_realative1_address_zip" value="" size="5"></td>
      </tr>
    </table>
    
    
    
    </td>
  </tr>

	
    <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <th colspan="2" scope="col">ADDITIONAL AUTHORIZATION INFORMATION SECTION</th>
        </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td><input name="applicant_hereby_authorize" type="text" id="applicant_hereby_authorize" size="5" maxlength="3"><br />
          Intials</td>
        <td><p>The undersigned hereby authorizes selling dealer to initiate a credit invesitgation based upon the following information, which information has been voluntarily provided by myself and warrants the truth and accuracy of this information.  The undersigned further warrants that a bankruptcy proceeds is neither presently in progress nor anticipated and acknowledges receipt of this credit application.</p>
          </td>
      </tr>
      <tr>
        <td><input name="equal_credit_opportunity_act" type="text" value="" size="5" maxlength="3"><br />Intials</td>
        <td><p>The Federal Equal Credit Opportunity Act prohibits creditors from discriminating against credit applicants on the basis of race, color, religion, national origin, sex, marital status, age (provided that the applicant has the capacity to contract); because all or part of the applicant income derives from any public assistance program; or because the applicant has in good faith exercised any right under the Consumer Credit Protection Act. The Federal agency that administers compliance with this law concerning this creditor is the Federal Trade Commission, Equal Credit Opportunity, Washington, D.C. 20580.</p></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><p>By signing below, you hereby acknowledge that all of the information contained herein is true and correct.  You further acknowledge that selling dealer  (and assignees of selling dealer who may hereafter purchase the dealer’s interest in any financing agreement between you and selling dealer) are relying upon the information contained herein in determining whether to extend credit to you.  Finally, you acknowledge and agree that providing false information on this application will represent a default of any financing agreement entered into between you and selling dealer in connections with this application.</p></td>
        </tr>
    </table>
    
    	
    
    </td>
  </tr>
    
    
	<tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th colspan="2" scope="col"><h2>Digital Signature</h2>
          <p>&nbsp;</p></th>
        </tr>
      <tr>
        <td><strong>Print Signature Name:</strong><span id="sprytextfield3">
          <input type="text" name="applicant_digital_signature" value="" size="32" />
<span class="textfieldRequiredMsg">Please Print Your Name.</span></span></td>
        <td><strong>Date Signed:</strong>          <input type="text" name="applicant_digital_signature_date" value="" size="20"></td>
      </tr>
    </table>
    
    	
    
    </td>
  </tr>

<tr>
	<td align="center">
    
    <div align="center">
	  <input type="submit" name="submit" id="submit" value="Submit" />
	</div>
	

	</td>
</tr>


</table>
  
   <input type="hidden" name="applicant_did" value="<?php echo $did; ?>">
  <input type="hidden" name="applicant_app_token" value="<?php echo $tkey; ?>">
  <input type="hidden" name="credit_app_type" value="2">
  <input type="hidden" name="applicant_sales_souce_lot" value="Website">
  <input name="credit_app_source" type="hidden" id="credit_app_source" value="Website" />
  <input type="hidden" name="MM_insert" value="online-creditapp">
  </form>

</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "phone_number", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email", {validateOn:["blur"]});
//-->
</script>

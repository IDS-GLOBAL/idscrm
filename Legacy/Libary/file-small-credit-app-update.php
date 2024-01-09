<div class="credit-app" align="center">

  <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="online-creditapp" id="online-creditapp">
  
  <table bgcolor="#FFFFFF" width="100%" border="0" cellspacing="5" cellpadding="5" class="credit-app">
<tr bgcolor="#CCCCCC">
	<td valign="top" align="center" height="50">
    	
        	
            	<h2 align="center">Online Credit Application Information </h2><br />
                <h1 align="center"><?php echo $row_slct_dlr['company']; ?></h1>
		
        <div align="center">
			<strong>
            	<?php echo $row_slct_dlr['address']; ?><br />
                <?php echo $row_slct_dlr['city']; ?>, <?php echo $row_slct_dlr['state']; ?>, <?php echo $row_slct_dlr['zip']; ?><br />
                Phone: <?php echo $row_slct_dlr['phone']; ?><br />
                Fax: <?php echo $row_slct_dlr['fax']; ?><br />
            </strong>
       </div>
       
    </td>
</tr>


  <tr>
    <td valign="top">
    
    
    
    <table border="0" cellspacing="5" cellpadding="5" class="credit-app">
      <tr>
      	<td colspan="5">
        <input name="credit_app_fullblown_id" type="hidden" id="credit_app_fullblown_id" value="<?php echo $row_dlr_credit_apps['credit_app_fullblown_id']; ?>">
        <input type="hidden" name="applicant_did"  id="applicant_did" value="<?php echo $did; ?>" />
        <input type="hidden" name="applicant_sid" id="applicant_sid" value="<?php echo $sid; ?>" />
        <input type="hidden" name="applicant_vid" id="applicant_vid" value="<?php echo $vid; ?>" />
        
		<input type="hidden" name="applicant_app_token" value="<?php echo $tkey; ?>">

        <input name="credit_app_type" type="hidden" value="" />
                
        <input name="credit_app_source" type="hidden" value="website" />
        
        <input name="joint_or_invidividual" type="hidden" value="individual" />
        
        </td>
      </tr>
      <tr>
        <td colspan="5"><strong>Full Name:</strong><span id="sprytextfield2">
          <input type="text" name="applicant_name" value="<?php echo $row_dlr_credit_apps['applicant_name']; ?>" size="32">
          </span><strong>Email: </strong><span id="sprytextfield1">
          <input type="text" name="applicant_email_address" value="<?php echo $row_dlr_credit_apps['applicant_email_address']; ?>" size="32">
          </span><strong>SSN:</strong>
          <input name="applicant_ssn" type="text" value="<?php echo $row_dlr_credit_apps['applicant_ssn']; ?>" size="10" maxlength="5">-
          <input name="applicant_ssn4" type="text" value="<?php echo $row_dlr_credit_apps['applicant_ssn4']; ?>" size="4" maxlength="4"> 
          Last 4</td>
      </tr>
      <tr>
        <td><strong>Age:</strong> 
          <input name="applicant_age" type="text" id="applicant_age" value="<?php echo $row_dlr_credit_apps['applicant_age']; ?>" size="3" maxlength="3">
        </td>
        <td><strong>Date Of Birth</strong>: <br />
          <input type="text" name="applicant_dob" value="<?php echo $row_dlr_credit_apps['applicant_dob']; ?>" size="20"></td>
          
          <td><strong>Driver License No. &amp; State:</strong></td>
        <td colspan="2"><input type="text" name="applicant_driver_licenses_number" value="<?php echo $row_dlr_credit_apps['applicant_driver_licenses_number']; ?>" size="15">
          <select name="applicant_driver_state_issued">
            <option value=""  <?php if (!(strcmp("", $row_dlr_credit_apps['applicant_driver_state_issued']))) {echo "selected=\"selected\"";} ?>>Select State</option>
            <?php
do {  
?>
            <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_dlr_credit_apps['applicant_driver_state_issued']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
        <td><textarea name="applicant_present_address1" cols="20"><?php echo $row_dlr_credit_apps['applicant_present_address1']; ?></textarea></td>
        <td colspan="1"><strong>Main Phone Number:</strong></td>
        <td>
          <input type="text" name="applicant_main_phone" value="<?php echo $row_dlr_credit_apps['applicant_main_phone']; ?>" size="15">
          </td>
      </tr>
      <tr>
        <td colspan="1"><strong>City: </strong></td>
        <td><input type="text" name="applicant_present_addr_city" value="<?php echo $row_dlr_credit_apps['applicant_present_addr_city']; ?>" size="20" /></td>
        <td><strong>State:</strong>
          <select name="applicant_present_addr_state" title="<?php echo $row_dlr_credit_apps['applicant_present_addr_state']; ?>">
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
        <td colspan="2"><strong>Zip Code: </strong>          <input type="text" name="applicant_present_addr_zip" value="<?php echo $row_dlr_credit_apps['applicant_present_addr_zip']; ?>" size="10"></td>
      </tr>
      <tr>
        <td colspan="2">
        
        <table class="credit-app">
          <tr>
            <td><strong>About Your Home:</strong></td>
            <td><input <?php if (!(strcmp($row_dlr_credit_apps['applicant_buy_own_rent_other'],"Buy"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_buy_own_rent_other" value="Buy" >
              Buy </td>
            <td><input <?php if (!(strcmp($row_dlr_credit_apps['applicant_buy_own_rent_other'],"Own"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_buy_own_rent_other" value="Own" >
              Own </td>
            <td><input <?php if (!(strcmp($row_dlr_credit_apps['applicant_buy_own_rent_other'],"Rent"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_buy_own_rent_other" value="Rent" >
              Rent </td>
            <td><input <?php if (!(strcmp($row_dlr_credit_apps['applicant_buy_own_rent_other'],"Other"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_buy_own_rent_other" value="Other" >
              Other </td>
          </tr>
        </table></td>
        <td valign="top"><strong>Monthly Payment: </strong></td>
        <td><input type="text" name="applicant_house_payment" value="<?php echo $row_dlr_credit_apps['applicant_house_payment']; ?>" size="10"></td>
      </tr>
      <tr>
        <td><strong>How Many Years:</strong></td>
        <td><select name="applicant_addr_years" id="applicant_addr_years" title="<?php echo $row_dlr_credit_apps['applicant_addr_years']; ?>">
          <option value=""  <?php if (!(strcmp("", $row_dlr_credit_apps['applicant_addr_years']))) {echo "selected=\"selected\"";} ?>>Select Years</option>
          <?php
do {  
?>
          <option value="<?php echo $row_year_options['year_value']?>"<?php if (!(strcmp($row_year_options['year_value'], $row_dlr_credit_apps['applicant_addr_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_year_options['year_name']?></option>
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
        <td><select name="applicant_addr_months" id="applicant_addr_months" title="<?php echo $row_dlr_credit_apps['applicant_addr_months']; ?>">
          <option value=""  <?php if (!(strcmp("", $row_dlr_credit_apps['applicant_addr_months']))) {echo "selected=\"selected\"";} ?>>Select Months</option>
          <?php
do {  
?>
          <option value="<?php echo $row_month_options['month_value']?>"<?php if (!(strcmp($row_month_options['month_value'], $row_dlr_credit_apps['applicant_addr_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_month_options['month_name']?></option>
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
        <td><textarea name="applicant_previous1_addr1" cols="20" rows="2"><?php echo $row_dlr_credit_apps['applicant_previous1_addr1']; ?></textarea></td>
        <td><strong>State: </strong>
          <select name="applicant_previous1_addr_state">
            <option value=""  <?php if (!(strcmp("", $row_dlr_credit_apps['applicant_previous1_addr_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
            <?php
do {  
?>
            <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_dlr_credit_apps['applicant_previous1_addr_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
            <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
          </select></td>
        <td><strong>Zip:</strong>
          <input type="text" name="applicant_present_addr_zip2" value="<?php echo $row_dlr_credit_apps['applicant_previous1_addr_zip']; ?>" size="5"></td>
        </tr>
      <tr>
        <td><strong>City: </strong></td>
        <td><input type="text" name="applicant_previous1_addr_city" value="<?php echo $row_dlr_credit_apps['applicant_previous1_addr_city']; ?>" size="20"></td>
        <td><strong>How Many Years:</strong>  <br />
          <select name="applicant_previous1_addr_state" title="<?php echo $row_dlr_credit_apps['applicant_previous1_live_years']; ?>">
            <option value=""  <?php if (!(strcmp("", $row_dlr_credit_apps['applicant_addr_years']))) {echo "selected=\"selected\"";} ?>>Select Years</option>
            <?php
do {  
?>
            <option value="<?php echo $row_year_options['year_value']?>"<?php if (!(strcmp($row_year_options['year_value'], $row_dlr_credit_apps['applicant_addr_years']))) {echo "selected=\"selected\"";} ?>><?php echo $row_year_options['year_name']?></option>
            <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
          </select>
            </td>
        <td><strong>How Many Months:</strong><br />
          <select name="applicant_previous1_live_months" id="applicant_previous1_live_months">
            <option value="" <?php if (!(strcmp("", $row_dlr_credit_apps['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>>Select Months</option>
            <?php
do {  
?>
            <option value="<?php echo $row_month_options['month_value']?>"<?php if (!(strcmp($row_month_options['month_value'], $row_dlr_credit_apps['applicant_previous1_live_months']))) {echo "selected=\"selected\"";} ?>><?php echo $row_month_options['month_name']?></option>
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
        	<td colspan="5"><br /><strong>Employment Information</strong></td>
        </tr>
      
      <tr>
        <td><strong>Present Employer:</strong></td>
        <td><input type="text" name="applicant_employer1_name" value="<?php echo $row_dlr_credit_apps['applicant_employer1_name']; ?>" size="20"></td>
        <td><strong>Position: </strong></td>
        <td colspan="2"><input type="text" name="applicant_employer1_position" value="<?php echo $row_dlr_credit_apps['applicant_employer1_position']; ?>" size="20"></td>
      </tr>
      <tr>
        <td><strong>Employer's Address:</strong></td>
        <td><textarea name="applicant_employer1_addr" cols="20" rows="2"><?php echo $row_dlr_credit_apps['applicant_employer1_addr']; ?></textarea></td>
        <td><strong>Phone No: </strong></td>
        <td colspan="2"><input type="text" name="applicant_employer1_phone" value="<?php echo $row_dlr_credit_apps['applicant_employer1_phone']; ?>" size="20"></td>
      </tr>
      <tr>
        <td> <strong>Employer's City:</strong></td>
        <td><input type="text" name="applicant_employer1_city" value="<?php echo $row_dlr_credit_apps['applicant_employer1_city']; ?>" size="20"></td>
        <td><strong>State:
          </strong>          <select name="applicant_employer1_state">
            <option value="" <?php if (!(strcmp("", $row_dlr_credit_apps['applicant_employer1_state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
            <?php
do {  
?>
            <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_dlr_credit_apps['applicant_employer1_state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_abrv']?></option>
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
          <input type="text" name="applicant_employer1_zip" value="<?php echo $row_dlr_credit_apps['applicant_employer1_zip']; ?>" size="5">
        </strong></td>
      </tr>
      <tr>
        <td><strong>Length Of Employment:</strong></td>
        <td><select name="applicant_employer1_work_years" title="<?php echo $row_dlr_credit_apps['applicant_employer1_work_years']; ?>">
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
        <td colspan="2"><select name="applicant_employer1_work_months" title="<?php echo $row_dlr_credit_apps['applicant_employer1_work_months']; ?>">
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
        <td colspan="3"><input name="applicant_employer1_salary_bringhome" type="text" id="applicant_employer1_salary_bringhome" value="<?php echo $row_dlr_credit_apps['applicant_employer1_salary_bringhome']; ?>" /></td>
      </tr>
      <tr>
        <td><strong>Salary / Wage:</strong></td>
        <td colspan="3">
        
        <table class="credit-app">
            <tr>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Daily"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Daily" >
                Daily</td>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Weekly"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Weekly" >
                Weekly</td>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Bi-Weekly"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Bi-Weekly" >
                Bi-Weekly</td>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Monthly"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Monthly" >
                Monthly</td>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Annually"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Annually" >
                Annually</td>
              </tr>
            </table>
        
        </td>
        </tr>
      <tr>
        <td colspan="5">
          Please Go Back 5 Years</td>
        </tr>
      <tr>
        <td><strong>Previous Employer:</strong></td>
        <td><input type="text" name="applicant_employer1_name2" value="<?php echo $row_dlr_credit_apps['applicant_employer2_name']; ?>" size="32"></td>
        <td><strong>Position:</strong></td>
        <td colspan="2"><input type="text" name="applicant_employer1_position2" value="<?php echo $row_dlr_credit_apps['applicant_employer2_position']; ?>" size="32"></td>
      </tr>
      <tr>
        <td><strong>Previous Employer Address:</strong></td>
        <td><input type="text" name="applicant_employer2_addr" id="applicant_employer2_addr" value="<?php echo $row_dlr_credit_apps['applicant_employer2_addr']; ?>" size="32" /></td>
        <td><strong>Phone No:</strong></td>
        <td colspan="2"><input name="applicant_employer2_phone" type="text" id="applicant_employer2_phone" value="<?php echo $row_dlr_credit_apps['applicant_employer2_phone']; ?>" size="32" /></td>
      </tr>
      <tr>
        <td><strong>Previous Employer City:</strong></td>
        <td><input type="text" name="applicant_employer1_city2" value="<?php echo $row_dlr_credit_apps['applicant_employer2_city']; ?>" size="32"></td>
        <td> <strong>State: </strong>          <select name="applicant_employer1_state2" title="<?php echo $row_dlr_credit_apps['applicant_employer2_state']; ?>">
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
          <strong>Zip:</strong>          <input type="text" name="applicant_employer1_zip2" value="<?php echo $row_dlr_credit_apps['applicant_employer2_zip']; ?>" size="5"></td>
      </tr>
      <tr>
        <td><strong>Previous Employer Salary Bring Home:</strong></td>
        <td colspan="3"><input name="applicant_employer2_salary_bringhome" type="text" id="applicant_employer2_salary_bringhome" value="<?php echo $row_dlr_credit_apps['applicant_employer2_salary_bringhome']; ?>" /></td>
      </tr>
      <tr>
        <td><strong>Previous Employer Salry / Wage:</strong></td>
        <td colspan="3">
        
        
        <table class="credit-app">
            <tr>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Daily"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Daily" >                
                Daily</td>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Weekly"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Weekly" >
                Weekly</td>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Bi-Weekly"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Bi-Weekly" >
                Bi-Weekly</td>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Monthly"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Monthly" >
                Monthly</td>
              <td><input  <?php if (!(strcmp($row_dlr_credit_apps['applicant_employer2_payday_freq'],"Annually"))) {echo "checked=\"checked\"";} ?> type="radio" name="applicant_employer1_payday_freq" value="Annually" >
                Annually</td>
              </tr>
            </table>
        
        
        </td>
        </tr>
      <tr>
        <td><strong>Length Of Employment:</strong></td>
        <td><select name="applicant_employer1_work_years2" title="<?php echo $row_dlr_credit_apps['applicant_employer2_work_years']; ?>">
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
        <td colspan="2"><select name="applicant_employer1_work_months2" title="<?php echo $row_dlr_credit_apps['applicant_employer2_work_months']; ?>">
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
        <td><input type="text" name="applicant_other_income_amount" value="<?php echo $row_dlr_credit_apps['applicant_other_income_amount']; ?>" size="32"></td>
        <td><strong>Income Source:</strong></td>
        <td colspan="2"><input type="text" name="applicant_other_income_source" value="<?php echo $row_dlr_credit_apps['applicant_other_income_source']; ?>" size="32"></td>
      </tr>
      <tr>
        <td><strong>Name Of Nearest Realative:</strong></td>
        <td><input type="text" name="applicants_realative1_name" value="<?php echo $row_dlr_credit_apps['applicants_realative1_name']; ?>" size="32"></td>
        <td><strong>Relationship:</strong></td>
        <td colspan="2"><input type="text" name="applicants_realative1_relationship" value="<?php echo $row_dlr_credit_apps['applicants_realative1_relationship']; ?>" size="32"></td>
      </tr>
      <tr>
        <td><strong>Realative's Address:</strong></td>
        <td><input type="text" name="applicants_realative1_address" value="<?php echo $row_dlr_credit_apps['applicants_realative1_address']; ?>" size="32"></td>
        <td><strong>Phone No:</strong></td>
        <td colspan="2"><input type="text" name="applicants_realative1_mainphone" value="<?php echo $row_dlr_credit_apps['applicants_realative1_mainphone']; ?>" size="32"></td>
      </tr>
      <tr>
        <td><strong>City:</strong></td>
        <td><input type="text" name="applicants_realative1_address_city" value="<?php echo $row_dlr_credit_apps['applicants_realative1_address_city']; ?>" size="20"></td>
        <td><strong>State:</strong><select name="applicants_realative1_address_state" id="applicants_realative1_address_state" title="<?php echo $row_dlr_credit_apps['applicants_realative1_address_state']; ?>">
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
        <td colspan="2"><strong>Zip Code:</strong>          <input type="text" name="applicants_realative1_address_zip" value="<?php echo $row_dlr_credit_apps['applicants_realative1_address_zip']; ?>" size="5"></td>
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
        <td><input name="applicant_hereby_authorize" type="text" id="applicant_hereby_authorize" value="<?php echo $row_dlr_credit_apps['applicant_hereby_authorize']; ?>" size="5" maxlength="3" readonly="readonly"><br />
          Intials</td>
        <td><p>The undersigned hereby authorizes selling dealer to initiate a credit invesitgation based upon the following information, which information has been voluntarily provided by myself and warrants the truth and accuracy of this information.  The undersigned further warrants that a bankruptcy proceeds is neither presently in progress nor anticipated and acknowledges receipt of this credit application.</p>
          </td>
      </tr>
      <tr>
        <td><input name="equal_credit_opportunity_act" type="text" value="<?php echo $row_dlr_credit_apps['equal_credit_opportunity_act']; ?>" size="5" maxlength="3"><br />
          Intials</td>
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
        <td><strong>Print Signature Name:</strong>          <input type="text" name="applicant_digital_signature" value="<?php echo $row_dlr_credit_apps['applicant_digital_signature']; ?>" size="32"></td>
        <td><strong>Date Signed:</strong>          <input type="text" name="applicant_digital_signature_date" value="<?php echo $row_dlr_credit_apps['applicant_digital_signature_date']; ?>" size="20"></td>
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
  
  <input type="hidden" name="MM_insert" value="online-creditapp">
  <input type="hidden" name="MM_update" value="online-creditapp">
</form>

</div>


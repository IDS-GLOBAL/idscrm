<?php require_once('../../Connections/idsconnection.php'); ?>
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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_dlr = "SELECT * FROM dealers WHERE id = 47";
$slct_dlr = mysqli_query($idsconnection_mysqli, $query_slct_dlr);
$row_slct_dlr = mysqli_fetch_assoc($slct_dlr);
$totalRows_slct_dlr = mysqli_num_rows($slct_dlr);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Full Blown Credit Application</title>
<style type="text/css">
<!--
.credit-app {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body bgcolor="#000000">


<div class="credit-app" align="center">
<table bgcolor="#FFFFFF" width="900" height="800" border="1" cellspacing="5" cellpadding="5" class="credit-app">
<tr bgcolor="#CCCCCC">
	<td valign="top" align="center" height="50">
    	<p>
        	<strong>
            	Application Information<br /> 
				<?php echo $row_slct_dlr['address']; ?><br />
                <?php echo $row_slct_dlr['city']; ?>, <?php echo $row_slct_dlr['state']; ?>, <?php echo $row_slct_dlr['zip']; ?><br />
                Phone: <?php echo $row_slct_dlr['phone']; ?><br />
                Fax: <?php echo $row_slct_dlr['fax']; ?>
            </strong>
        </p>
    </td>
</tr>


  <tr>
    <td valign="top"><table border="0" cellspacing="5" cellpadding="5" class="credit-app">
      <tr>
        <td colspan="5"><strong>Full Name:</strong>
          <input type="text" name="applicant_name" value="" size="32">
          <strong>Email: </strong>
          <input type="text" name="applicant_email_address" value="" size="32">
          <strong>SSN:</strong>
          <input name="applicant_ssn" type="password" value="" size="10" maxlength="7">-
          <input name="applicant_ssn4" type="text" value="" size="4" maxlength="4"></td>
      </tr>
      <tr>
        <td><strong>Age:</strong>
          <select name="applicant_age">
            <option value="" >Select Age</option>
          </select></td>
        <td>Date Of Birth: <br />
          <input type="text" name="applicant_dob" value="" size="20"></td>
          
          <td><strong>Driver License No. &amp; State:</strong></td>
        <td colspan="2"><input type="text" name="applicant_driver_licenses_number" value="" size="15">
          <select name="applicant_driver_state_issued">
            <option value="" >Select State</option>
          </select></td>
      </tr>
      <tr>
        <td valign="top"><strong>Present Address:</strong></td>
        <td><textarea name="applicant_present_address1" cols="20"></textarea></td>
        <td colspan="1"><strong>Main Phone Number:</strong></td>
        <td><input type="text" name="applicant_main_phone" value="" size="15"></td>
      </tr>
      <tr>
        <td colspan="1"><strong>City: </strong>
          <input type="text" name="applicant_present_addr_city" value="" size="11"></td>
        <td><strong>State:</strong>
          <select name="applicant_present_addr_state">
            <option value="" >Select State</option>
          </select></td>
        <td><strong>Zip Code: </strong></td>
        <td colspan="2"><input type="text" name="applicant_present_addr_zip" value="" size="10"></td>
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
        </select></td>
        <td><strong>How Many Months:</strong></td>
        <td><select name="applicant_previous1_live_months">
          <option value="" >Select Months</option>
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
        <td>City: </td>
        <td><input type="text" name="applicant_previous1_addr_city" value="" size="20"></td>
        <td colspan="3">State:
          <select name="applicant_previous1_addr_state">
            <option value="" >Select State</option>
            </select>
          Zip :
          <input type="text" name="applicant_previous1_addr_zip" value="" size="10"></td>
        </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
        </tr>
      <tr>
        <td>Present Employer:</td>
        <td><input type="text" name="applicant_employer1_name" value="" size="20"></td>
        <td>Position: </td>
        <td colspan="2"><input type="text" name="applicant_employer1_position" value="" size="20"></td>
      </tr>
      <tr>
        <td>Employer's Address:</td>
        <td><textarea name="applicant_employer1_addr" cols="20" rows="2"></textarea></td>
        <td>Phone No: </td>
        <td colspan="2"><input type="text" name="applicant_employer1_phone" value="" size="20"></td>
      </tr>
      <tr>
        <td>Present Employer's City:</td>
        <td><input type="text" name="applicant_employer1_city" value="" size="20"></td>
        <td>State:
          <select name="applicant_employer1_state">
            <option>Select State</option>
          </select></td>
        <td colspan="2">Zip:          <input type="text" name="applicant_employer1_zip" value="" size="5"></td>
      </tr>
      <tr>
        <td>Length Of Employment:</td>
        <td><select name="applicant_employer1_work_years">
          <option value="" >Select Years</option>
        </select>
          <br /></td>
        <td>Months</td>
        <td colspan="2"><select name="applicant_employer1_work_months">
          <option value="" >Select Months</option>
        </select></td>
      </tr>
      <tr>
        <td>Present Employer's Salary / Wage:</td>
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
        <td>Previous Employer:</td>
        <td><input type="text" name="applicant_employer1_name2" value="" size="32"></td>
        <td>Position:</td>
        <td colspan="2"><input type="text" name="applicant_employer1_position2" value="" size="32"></td>
      </tr>
      <tr>
        <td>Previous Employer City:</td>
        <td><input type="text" name="applicant_employer1_city2" value="" size="32"></td>
        <td> State: 
          <select name="applicant_employer1_state2">
            <option value="" >Select State</option>
          </select></td>
        <td colspan="2">
          Zip:
          <input type="text" name="applicant_employer1_zip2" value="" size="5"></td>
      </tr>
      <tr>
        <td>Previous Employer Salry / Wage:</td>
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
        <td>Length Of Employment:</td>
        <td><select name="applicant_employer1_work_years2">
          <option value="" >Select Years</option>
        </select></td>
        <td>Months:</td>
        <td colspan="2"><select name="applicant_employer1_work_months2">
          <option value="" >Select Months</option>
        </select></td>
      </tr>
      <tr>
        <td>Other Monthly Income</td>
        <td><input type="text" name="applicant_other_income_amount" value="" size="32"></td>
        <td>Source:</td>
        <td colspan="2"><input type="text" name="applicant_other_income_source" value="" size="32"></td>
      </tr>
      <tr>
        <td>Name Of Nearest Realative</td>
        <td><input type="text" name="applicants_realative1_name" value="" size="32"></td>
        <td>Relationship:</td>
        <td colspan="2"><input type="text" name="applicants_realative1_relationship" value="" size="32"></td>
      </tr>
      <tr>
        <td>Realative's Address:</td>
        <td><input type="text" name="applicants_realative1_address" value="" size="32"></td>
        <td>Phone No:</td>
        <td colspan="2"><input type="text" name="applicants_realative1_mainphone" value="" size="32"></td>
      </tr>
      <tr>
        <td>City:</td>
        <td><input type="text" name="applicants_realative1_address_city" value="" size="20"></td>
        <td>State
          <select name="applicants_realative1_address_state" id="applicants_realative1_address_state">
            <option>Select State</option>
          </select></td>
        <td colspan="2">Zip Code:          <input type="text" name="applicants_realative1_address_zip" value="" size="5"></td>
      </tr>
    </table></td>
  </tr>



  <tr bgcolor="#CCCCCC">
    <td valign="top" align="center"><strong>Co - Applicant Information<br />Complete This Section Only If Joint Application</strong></td>
  </tr>



  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2">Full Name:</td>
        <td>SSN:</td>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td>Age:</td>
        <td>Date of birth:</td>
        <td>Driver License No. &amp; State:</td>
        <td bgcolor="#CCCCCC">&nbsp;</td>
        <td bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td>Present Address:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Phone Number:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>City &amp; State:</td>
        <td>&nbsp;</td>
        <td>Zip Code:</td>
        <td colspan="2">Email: </td>
        </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Monthly Payment:</td>
        <td>How Long Years:</td>
        <td>How Long Months:</td>
      </tr>
      <tr>
        <td>Present Employer Name:</td>
        <td colspan="2">&nbsp;</td>
        <td>Position:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Present Employer Address:</td>
        <td colspan="2">&nbsp;</td>
        <td>Phone No:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Present Employer City &amp; State:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Zip Code:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Present Employer Slary / Wage</td>
        <td colspan="2">&nbsp;</td>
        <td>Length Of Employment:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Other Monthly Income:</td>
        <td colspan="2">&nbsp;</td>
        <td>Source:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Banking Insitituion:</td>
        <td colspan="2">&nbsp;</td>
        <td>Account No:</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    	
    </td>
  </tr>




  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th colspan="2" scope="col">BANKING INFORMATION</th>
        </tr>
      <tr>
        <td>INSTITUION NAME:</td>
        <td>ACCOUNT NO:</td>
      </tr>
      <tr>
        <td>INSTITUION NAME:</td>
        <td>ACCOUNT NO:</td>
      </tr>
    </table>
    
    	
    
    </td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th colspan="4" scope="col">CREDITORS</th>
        </tr>
      <tr>
        <td>CREDITOR:</td>
        <td>ACCOUNT NO:</td>
        <td>MONTHLY PAYMENT:</td>
      </tr>
      <tr>
        <td>CREDITOR:</td>
        <td>ACCOUNT NO:</td>
        <td>MONTHLY PAYMENT:</td>
      </tr>
    </table></td>
  </tr>
</table>
</div><!--end credit-app -->





</body>
</html>
<?php
mysqli_free_result($slct_dlr);
?>

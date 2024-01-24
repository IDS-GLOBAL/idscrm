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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "online-creditapp")) {
  $insertSQL =  "INSERT INTO credit_app_fullblown (applicant_did, applicant_app_token, applicant_driver_licenses_number, applicant_driver_state_issued, applicant_ssn, applicant_ssn4, applicant_dob, applicant_age, applicant_name, applicant_main_phone, applicant_present_address1, applicant_present_addr_city, applicant_present_addr_state, applicant_present_addr_zip, applicant_buy_own_rent_other, applicant_house_payment, applicant_previous1_addr1, applicant_previous1_addr_city, applicant_previous1_addr_state, applicant_previous1_live_years, applicant_previous1_live_months, applicant_employer1_name, applicant_employer1_addr, applicant_employer1_city, applicant_employer1_state, applicant_employer1_zip, applicant_employer1_phone, applicant_employer1_work_years, applicant_employer1_work_months, applicant_employer1_position, applicant_employer1_payday_freq, applicant_other_income_amount, applicant_other_income_source, applicants_realative1_name, applicants_realative1_relationship, applicants_realative1_mainphone, applicants_realative1_address, applicants_realative1_address_city, applicants_realative1_address_state, applicants_realative1_address_zip, applicant_email_address, applicant_hereby_authorize, equal_credit_opportunity_act, applicant_digital_signature, applicant_digital_signature_date) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['applicant_did'], "int"),
                       GetSQLValueString($_POST['applicant_app_token'], "text"),
                       GetSQLValueString($_POST['applicant_driver_licenses_number'], "text"),
                       GetSQLValueString($_POST['applicant_driver_state_issued'], "text"),
                       GetSQLValueString($_POST['applicant_ssn'], "text"),
                       GetSQLValueString($_POST['applicant_ssn4'], "text"),
                       GetSQLValueString($_POST['applicant_dob'], "text"),
                       GetSQLValueString($_POST['applicant_age'], "text"),
                       GetSQLValueString($_POST['applicant_name'], "text"),
                       GetSQLValueString($_POST['applicant_main_phone'], "text"),
                       GetSQLValueString($_POST['applicant_present_address1'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_buy_own_rent_other'], "text"),
                       GetSQLValueString($_POST['applicant_house_payment'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_work_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_work_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_position'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_payday_freq'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_amount'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_source'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_zip'], "text"),
                       GetSQLValueString($_POST['applicant_email_address'], "text"),
                       GetSQLValueString($_POST['applicant_hereby_authorize'], "text"),
                       GetSQLValueString($_POST['equal_credit_opportunity_act'], "text"),
                       GetSQLValueString($_POST['applicant_digital_signature'], "text"),
                       GetSQLValueString($_POST['applicant_digital_signature_date'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "../../goldencarsales.com/thankyou.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $insertGoTo));
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_dlr = "SELECT * FROM dealers WHERE id = 47";
$slct_dlr = mysqli_query($idsconnection_mysqli, $query_slct_dlr);
$row_slct_dlr = mysqli_fetch_assoc($slct_dlr);
$totalRows_slct_dlr = mysqli_num_rows($slct_dlr);
$did = $row_slct_dlr['id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_month_options = "SELECT * FROM months_options";
$month_options = mysqli_query($idsconnection_mysqli, $query_month_options);
$row_month_options = mysqli_fetch_assoc($month_options);
$totalRows_month_options = mysqli_num_rows($month_options);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_year_options = "SELECT * FROM year_options";
$year_options = mysqli_query($idsconnection_mysqli, $query_year_options);
$row_year_options = mysqli_fetch_assoc($year_options);
$totalRows_year_options = mysqli_num_rows($year_options);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Individual Credit Application</title>
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
  <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="online-creditapp" id="online-creditapp">
  
  <table bgcolor="#FFFFFF" width="100%" border="0" cellspacing="5" cellpadding="5" class="credit-app">
<tr bgcolor="#CCCCCC">
	<td valign="top" align="center" height="50">
    	
        	<strong>
            	<h2>Online Credit Application Information </h2><br />
                <h1><?php echo $row_slct_dlr['company']; ?></h1>
				<?php echo $row_slct_dlr['address']; ?><br />
                <?php echo $row_slct_dlr['city']; ?>, <?php echo $row_slct_dlr['state']; ?>, <?php echo $row_slct_dlr['zip']; ?><br />
                Phone: <?php echo $row_slct_dlr['phone']; ?><br />
                Fax: <?php echo $row_slct_dlr['fax']; ?>
            </strong>
       
    </td>
</tr>


  <tr>
    <td valign="top">
    
    
    
    <table border="0" cellspacing="5" cellpadding="5" class="credit-app">
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
          <input name="applicant_age" type="text" id="applicant_age" size="3" maxlength="3">
        </td>
        <td>Date Of Birth: <br />
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
        <td><input type="text" name="applicant_main_phone" value="" size="15"></td>
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
        <td><strong>Zip:</strong>          <input type="text" name="applicant_present_addr_zip2" value="" size="5"></td>
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
        <td><strong>Salary / Wage:</strong></td>
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
        <td><input type="text" name="applicant_employer1_name2" value="" size="32"></td>
        <td><strong>Position:</strong></td>
        <td colspan="2"><input type="text" name="applicant_employer1_position2" value="" size="32"></td>
      </tr>
      <tr>
        <td><strong>Previous Employer City:</strong></td>
        <td><input type="text" name="applicant_employer1_city2" value="" size="32"></td>
        <td> <strong>State: </strong>          <select name="applicant_employer1_state2">
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
          <strong>Zip:</strong>          <input type="text" name="applicant_employer1_zip2" value="" size="5"></td>
      </tr>
      <tr>
        <td><strong>Previous Employer Salry / Wage:</strong></td>
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
        <td><strong>Length Of Employment:</strong></td>
        <td><select name="applicant_employer1_work_years2">
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
        <td colspan="2"><select name="applicant_employer1_work_months2">
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
        <td><strong>Source:</strong></td>
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
        <td><strong>Print Name:</strong>          <input type="text" name="applicant_digital_signature" value="" size="32"></td>
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
  <input type="hidden" name="MM_insert" value="online-creditapp">
  </form>

</div><!--end credit-app -->





</body>
</html>
<?php
mysqli_free_result($slct_dlr);

mysqli_free_result($month_options);

mysqli_free_result($states);

mysqli_free_result($year_options);
?>

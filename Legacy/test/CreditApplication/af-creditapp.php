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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "af_creditapp")) {
  $insertSQL =  "INSERT INTO credit_app_fullblown (applicant_did, applicant_sid, applicant_vid, applicant_app_token, applicant_driver_licenses_number, applicant_driver_licenses_status, applicant_driver_state_issued, applicant_ssn, applicant_dob, applicant_age, applicant_sales_souce_lot, applicant_name, applicant_maiden_name, applicant_main_phone, applicant_cell_phone, applicant_present_address1, applicant_present_address2, applicant_present_addr_city, applicant_present_addr_state, applicant_present_addr_zip, applicant_present_addr_county, applicant_addr_years, applicant_addr_months, applicant_addr_landlord_mortg, applicant_addr_landlord_address, applicant_addr_landlord_phone, applicant_name_oncurrent_lease, applicant_apart_or_house, applicant_buy_own_rent_other, applicant_house_payment, applicant_previous1_addr1, applicant_previous1_live_years, applicant_previous1_live_months, applicant_previous1_landlord_name, applicant_previous1_landlord_phone, applicant_employer1_addr, applicant_employer1_city, co_applicant_name, co_applicant_ssn, co_applicant_home_phone, co_applicant_home_cell, co_applicant_present_addr1, co_applicant_present_addr2, co_applicant_present_addr_city, co_applicant_present_addr_zip, co_applicant_present_addr_county, co_applicant_present_addr_live_years, co_applicant_present_addr_live_months, co_applicant_employer_name, co_applicant_employer_phone, co_applicant_employer_addr, co_applicant_employer_department, co_applicant_employer_supervisor_name, co_applicant_employer_work_months, co_applicant_employer_work_years, co_applicant_payday_frequency, applicant_last_vehicle_purchased, applicants_bank_name, applicants_checking_savings_acct#, applicant_signature, co_applicant_signature, salesperson_witness_signature, applicant_signed_input_date, applicant_hereby_authorize, equal_credit_opportunity_act) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['applicant_did'], "int"),
                       GetSQLValueString($_POST['applicant_sid'], "int"),
                       GetSQLValueString($_POST['applicant_vid'], "int"),
                       GetSQLValueString($_POST['applicant_app_token'], "text"),
                       GetSQLValueString($_POST['applicant_driver_licenses_number'], "text"),
                       GetSQLValueString($_POST['applicant_driver_licenses_status'], "text"),
                       GetSQLValueString($_POST['applicant_driver_state_issued'], "text"),
                       GetSQLValueString($_POST['applicant_ssn'], "text"),
                       GetSQLValueString($_POST['applicant_dob'], "text"),
                       GetSQLValueString($_POST['applicant_age'], "text"),
                       GetSQLValueString($_POST['applicant_sales_souce_lot'], "text"),
                       GetSQLValueString($_POST['applicant_name'], "text"),
                       GetSQLValueString($_POST['applicant_maiden_name'], "text"),
                       GetSQLValueString($_POST['applicant_main_phone'], "text"),
                       GetSQLValueString($_POST['applicant_cell_phone'], "text"),
                       GetSQLValueString($_POST['applicant_present_address1'], "text"),
                       GetSQLValueString($_POST['applicant_present_address2'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_county'], "text"),
                       GetSQLValueString($_POST['applicant_addr_years'], "text"),
                       GetSQLValueString($_POST['applicant_addr_months'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_mortg'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_address'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_name_oncurrent_lease'], "text"),
                       GetSQLValueString($_POST['applicant_apart_or_house'], "text"),
                       GetSQLValueString($_POST['applicant_buy_own_rent_other'], "text"),
                       GetSQLValueString($_POST['applicant_house_payment'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_landlord_name'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_ssn'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_cell'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr1'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr2'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_county'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_live_years'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_live_months'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_addr'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_department'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_supervisor_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_work_months'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_work_years'], "int"),
                       GetSQLValueString($_POST['co_applicant_payday_frequency'], "text"),
                       GetSQLValueString($_POST['applicant_last_vehicle_purchased'], "text"),
                       GetSQLValueString($_POST['applicants_bank_name'], "text"),
                       GetSQLValueString($_POST['applicants_checking_savings_acct#'], "text"),
                       GetSQLValueString($_POST['applicant_signature'], "text"),
                       GetSQLValueString($_POST['co_applicant_signature'], "text"),
                       GetSQLValueString($_POST['salesperson_witness_signature'], "text"),
                       GetSQLValueString($_POST['applicant_signed_input_date'], "text"),
                       GetSQLValueString($_POST['applicant_hereby_authorize'], "text"),
                       GetSQLValueString($_POST['equal_credit_opportunity_act'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Credit Applicaiton - AF</title>
</head>
<style type="text/css">
ul.noindent {
margin: 0;
padding: 0;
}

ul.noident li {
list-type: none;
margin: 0;
padding: 5px 0 5px 0;
}
</style>
<body>


<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="af_creditapp" id="af_creditapp">
<table width="979" border="1" align="center">
  <tr>
    <td width="969"><table width="967" border="0">
      <tr>
        <td width="680" valign="top">
          <p><img src="http://autofinancenow.com/images/hbg.jpg" width="680" height="76" /></p></td>
        <td width="294" valign="top">
        <li><font size="-1">5486 Old Dixie Highway</font></li>
         <li><font size="-1">Forest Park, GA 30297</font></li>  
         <li><font size="-1">www.autofinancenow.com</font></li>       </td>
      </tr>
    </table>

      
      <p>&nbsp;      </p>
      <p>
        <input type="hidden" name="applicant_did"  id="applicant_did" value="<?php echo $did; ?>" />
        <input type="hidden" name="applicant_sid" id="applicant_sid" value="<?php echo $sid; ?>" />
        <input type="hidden" name="applicant_vid" id="applicant_vid" value="<?php echo $vid; ?>" />
        <input name="applicant_app_token" type="hidden" id="applicant_app_token" value="<?php echo $tkey; ?>" />
      </p>
      <hr />
      <br />
      <table width="969" border="0">
  <tr>
    
    <td width="963"><table width="920" border="0">
      <tr>
        <td width="160"><table width="156" border="0">
  <tr>
    <td>Drivers License #</td>
  </tr>
  <tr>
    <th align="left" scope="row">
      <input name="applicant_driver_licenses_number" type="text" id="applicant_driver_licenses_number" size="20" maxlength="30" />
        </th>
  </tr>
</table></td>
        <td width="59"><table width="50" border="0">
          <tr>
            <td>Status</td>
          </tr>
          <tr>
            <td>
              <input name="applicant_driver_licenses_status" type="text" id="applicant_driver_licenses_status" size="8" maxlength="2" />
                      </td>
          </tr>
        </table></td>
        <td width="91"><table width="88" border="0">
          <tr>
            <td>State Issued</td>
          </tr>
          <tr>
            <td align="center"><select name="applicant_driver_state_issued" id="applicant_driver_state_issued">
              <option>DL State</option>
            </select></td>
          </tr>
        </table></td>
        <td width="178"><table width="175" border="0">
          <tr>
            <td>Social Security#</td>
          </tr>
          <tr>
            <td>
              <input name="applicant_ssn" type="text" id="applicant_ssn" size="9" maxlength="13" />
                      </td>
          </tr>
        </table></td>
        <td width="156"><table width="125" border="0">
          <tr>
            <td>Date of Birth</td>
          </tr>
          <tr>
            <td><table width="125" border="0">
              <tr>
                <td>
                  <input name="applicant_dob" type="text" id="applicant_dob" size="15" maxlength="20" />
                    
                </td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="66"><table width="59" border="0">
          <tr>
            <td>Age</td>
          </tr>
          <tr>
            <td>
              <input name="applicant_age" type="text" id="applicant_age" size="2" maxlength="2" />
                      </td>
          </tr>
        </table></td>
        <td width="180"><table width="150" border="0">
          <tr>
            <td>Sales Source (Lot)</td>
          </tr>
          <tr>
            <td>
              <input name="applicant_sales_souce_lot" type="text" id="applicant_sales_souce_lot" size="14" maxlength="20" />
            </td>
          </tr>
        </table></td>
      </tr>
    </table>
    <hr width="100%" size="1" color="#333333" />
    <table width="920" border="0">
  <tr>
    <td><table width="225" border="0">
      <tr>
        <td>Applicant Name</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_name" type="text" id="applicant_name" size="30" maxlength="40" />
                </td>
      </tr>
    </table></td>
    <td><table width="225" border="0">
      <tr>
        <td>
Other Name Known By (Maiden)</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_maiden_name" type="text" id="applicant_maiden_name" size="30" maxlength="40" />
                </td>
      </tr>
    </table></td>
    <td><table width="178" border="0">
      <tr>
        <td>Cell # or Pager #</td>
      </tr>
      <tr>
        <td><table width="141" border="0">
          <tr>
            <td>
              <input name="applicant_cell_phone" type="text" id="applicant_cell_phone" size="20" maxlength="20" />
            </td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
 <hr width="100%" size="1" color="#333333" />
 <table width="920" border="0">
  <tr>
    <td><table width="140" border="0">
      <tr>
        <td width="138">Present Addres/Street</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_present_address1" type="text" id="applicant_present_address1" size="20" maxlength="40" />
                </td>
      </tr>
    </table></td>
    <td><table width="80" border="0">
      <tr>
        <td width="74">Bldg./Apt.#</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_present_address2" type="text" id="applicant_present_address2" size="5" maxlength="8" />
                </td>
      </tr>
    </table></td>
    <td><table width="101" border="0">
      <tr>
        <td>City</td>
        <td>State</td>
      </tr>
      <tr>
        <td><input name="applicant_present_addr_city" type="text" id="applicant_present_addr_city" size="10" maxlength="20" /></td>
        <td><select name="applicant_present_addr_state" id="applicant_present_addr_state">
          <option>Select State</option>
        </select></td>
      </tr>
    </table></td>
    <td><table width="107" border="0">
      <tr>
        <td>Home Phone#</td>
      </tr>
      <tr>
        <td><table width="141" border="0">
          <tr>
            <td>
            	
                <input name="applicant_main_phone" type="text" id="applicant_main_phone" size="20" maxlength="20" />
              
              </td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td><table width="64" border="0">
      <tr>
        <td>Zip</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_present_addr_zip" type="text" id="applicant_present_addr_zip" size="5" maxlength="5" />
                </td>
      </tr>
    </table></td>
    <td><table width="78" border="0">
      <tr>
        <td colspan="2">How Long</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_addr_years" type="text" id="applicant_addr_years" size="4" maxlength="10" placeholder="Years" />
        </td>
        <td>
          <input name="applicant_addr_months" type="text" id="applicant_addr_months" size="4" maxlength="10" placeholder="Months" /> 

                </td>
      </tr>
    </table></td>
    <td><table width="200" border="0">
      <tr>
        <td>County</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_present_addr_county" type="text" id="applicant_present_addr_county" size="15" maxlength="20" />
                </td>
      </tr>
    </table>    </td>
  </tr>
</table>
 <hr width="100%" size="1" color="#333333" />
 <table width="935" border="0">
  <tr>
    <td width="229"><table width="222" border="0">
      <tr>
        <td>Landlord/Mortgage Co.</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_addr_landlord_mortg" type="text" id="applicant_addr_landlord_mortg" size="20" maxlength="30" />
                </td>
      </tr>
    </table></td>
    <td width="306"><table width="303" border="0">
      <tr>
        <td>Address</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_addr_landlord_address" type="text" id="applicant_addr_landlord_address" size="40" maxlength="60" />
                </td>
      </tr>
    </table></td>
    <td width="145"><table width="145" border="0">
      <tr>
        <td>Phone #</td>
      </tr>
      <tr>
        <td><table width="141" border="0">
          <tr>
            <td>
              <input name="applicant_addr_landlord_phone" type="text" id="applicant_addr_landlord_phone" size="15" maxlength="20" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="237"><table width="222" border="0">
      <tr>
        <td>Name Leased To</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_name_oncurrent_lease" type="text" id="applicant_name_oncurrent_lease" size="30" maxlength="30" />
                </td>
      </tr>
    </table></td>
  </tr>
</table>
<hr width="100%" size="1	" color="#333333" />

<table border="0">
  <tr>
    <td valign="top">
      
      <table width="300">
        <tr>
          <td colspan="2"><strong>Check One:</strong></td>
          </tr>
        <tr>
          <td><label>
            <input type="radio" name="applicant_apart_or_house" value="House" id="applicant_apart_or_house_0" />
            House</label></td>
          
          <td><label>
            <input type="radio" name="applicant_apart_or_house" value="Apt." id="applicant_apart_or_house_1" />
            Apt.</label></td>
          </tr>
      </table></td>
    <td valign="top">
    
    <table width="300">
      <tr>
        <td colspan="3"><strong>Check One:</strong></td>
        </tr>
      <tr>
        <td><label>
          <input type="radio" name="applicant_buy_own_rent_other" value="Buy" id="mortage_type_0" />
          Buy</label></td>
        <td><label>
          <input type="radio" name="applicant_buy_own_rent_other" value="Rent" id="mortage_type_1" />
          Rent</label></td>
        <td><label>
          <input type="radio" name="applicant_buy_own_rent_other" value="Own" id="mortage_type_2" />
          Own</label></td>
      </tr>
    </table>
    
    </td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th scope="col"><strong>Payment Amount: 
          
        </strong></th>
      </tr>
      <tr>
        <td><strong>
          <input type="text" name="applicant_house_payment" id="applicant_house_payment" />
        </strong></td>
      </tr>
    </table></td>
  </tr>
</table>
	<br />
  	<strong>VERFICATION </strong>
  	<br />
<hr width="100%" size="3	" color="#333333" />
<table width="918" border="0">
  <tr>
    <td><table width="311" border="0">
      <tr>
        <td>Previous Address <em><strong>(must go back 5 years)</strong></em><strong></strong></td>
      </tr>
      <tr>
        <td>
        
        <table>
        	<tr>
            	<td><textarea name="applicant_previous1_addr1" cols="30" rows="2" id="applicant_previous1_addr1"></textarea>
       <br /></td>
                
                </tr>
         </table>
      </tr>
    </table></td>
    <td><table width="87" border="0">
      <tr>
        <td colspan="2">How Long</td>
      </tr>
      <tr>
        <td><select name="applicant_previous1_live_years" id="applicant_previous1_live_years">
          <option>Years</option>
        </select></td>
        <td><select name="applicant_previous1_live_months" id="applicant_previous1_live_months">
          <option>Months</option>
        </select></td>
      </tr>
    </table></td>
    <td><table width="312" border="0">
      <tr>
        <td>Next Previous Address</td>
      </tr>
      <tr>
        <td><textarea name="applicant_previous1_addr1" cols="30" rows="2" id="applicant_previous1_addr1"></textarea></td>
      </tr>
    </table></td>
    <td><table width="87" border="0">
      <tr>
        <td colspan="2">How Long</td>
      </tr>
      <tr>
        <td><select name="applicant_previous1_live_years2" id="applicant_previous1_live_years2">
          <option>Years</option>
        </select></td>
        <td><select name="applicant_previous1_live_months2" id="applicant_previous1_live_months2">
          <option>Months</option>
        </select></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="311"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Apartment Complex or Landlord Name</td>
      </tr>
      <tr>
        <td><input name="applicant_addr_landlord_mortg2" type="text" id="applicant_addr_landlord_mortg2" size="30" /></td>
      </tr>
    </table></td>
    <td width="179"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Phone #</td>
      </tr>
      <tr>
        <td><input name="applicant_addr_landlord_phone2" type="text" id="applicant_addr_landlord_phone2" size="16" maxlength="20" /></td>
      </tr>
    </table></td>
    <td width="312"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Apartment Complex or Landlord Name</td>
      </tr>
      <tr>
        <td><input name="applicant_previous1_landlord_name" type="text" id="applicant_previous1_landlord_name" size="30" /></td>
      </tr>
    </table></td>
    <td width="120"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Phone #</td>
      </tr>
      <tr>
        <td><input name="applicant_previous1_landlord_phone" type="text" id="applicant_previous1_landlord_phone" size="16" maxlength="20" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />
<strong>VERFICATION </strong>
<br />
<hr width="100%" size="3	" color="#333333" />
<table width="940" border="0">
  <tr>
    <td width="311"><table width="311" border="0">
      <tr>
        <td>Present Employer Name</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_previous1_addr1" type="text" id="applicant_previous1_addr1" size="40" maxlength="60" />
        
        </td>
      </tr>
    </table></td>
    <td width="179"><table width="87" border="0">
      <tr>
        <td>Street Address</td>
        </tr>
      <tr>
        <td><input type="text" name="applicant_employer1_addr" id="applicant_employer1_addr" /></td>
        </tr>
    </table></td>
    <td width="312"><table width="312" border="0">
      <tr>
        <td>City</td>
        </tr>
      <tr>
        <td>
          <input name="applicant_employer1_city" type="text" id="applicant_employer1_city" size="30" maxlength="50" />
          
          </td>
        </tr>
    </table></td>
    <td width="120"><table width="87" border="0">
      <tr>
        <td colspan="2">Phone #</td>
        </tr>
      <tr>
        <td><select name="applicant_previous1_live_years" id="applicant_previous1_live_years">
          <option>Years</option>
          </select></td>
        <td><select name="applicant_previous1_live_months" id="applicant_previous1_live_months">
          <option>Months</option>
          </select></td>
        </tr>
    </table></td>
  </tr>
</table>
<font size="2">Alimony, Child Support, or Separate Maintenance need not be revealed if you do not wish to have it considered as a basis for repaying the loan. </font>

<br /><br />
<strong>VERFICATION </strong>
<hr align="left" width="100%" size="3	" color="#333333" />
<table width="940" border="0">
  <tr>
    <td width="311"><table width="400" border="0">
      <tr>
        <td>** Spouse/Significant Other/Girlfriend/Boyfriend/Ex Name</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_name" type="text" id="co_applicant_name" size="50" maxlength="60" />
        
        </td>
      </tr>
    </table></td>
    <td width="179"><table width="118" border="0">
      <tr>
        <td>Social Security#</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_ssn" type="text" id="co_applicant_ssn" size="10" maxlength="9" />
        
        </td>
      </tr>
    </table></td>
    <td width="312"><table width="246" border="0">
      <tr>
        <td>Home Phone#</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_home_phone" type="text" id="co_applicant_home_phone" size="16" maxlength="20" />
        
        </td>
      </tr>
    </table></td>
    <td width="120"><table width="87" border="0">
      <tr>
        <td>Cell# or Pager#</td>
      </tr>
      <tr>
        <td>
        <table width="141" border="0">
          <tr>
            <td>
              <input name="co_applicant_home_cell" type="text" id="co_applicant_home_cell" size="16" maxlength="20" /></td>
            </tr>
        </table>
        
        
                </td>
      </tr>
    </table></td>
  </tr>
</table>


<table width="960" border="0">
  <tr>
    <td width="264"><table width="255" border="0">
      <tr>
        <td>Present Address/Street</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_present_addr1" type="text" id="co_applicant_present_addr1" size="30" maxlength="40" />
        
        </td>
      </tr>
    </table></td>
    <td width="106"><table width="91" border="0">
      <tr>
        <td>Bld./Apt.#</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_present_addr2" type="text" id="co_applicant_present_addr2" size="6" maxlength="10" />
        
        </td>
      </tr>
    </table></td>
    <td width="186"><table width="173" border="0">
      <tr>
        <td width="149">City</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_present_addr_city" type="text" id="co_applicant_present_addr_city" size="30" maxlength="40" />
        
        </td>
      </tr>
    </table></td>
    <td width="128"><table width="101" border="0">
      <tr>
        <td>Zip</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_present_addr_zip" type="text" id="co_applicant_present_addr_zip" size="10" maxlength="11" />
        
        </td>
      </tr>
    </table></td>
    <td width="85"><table width="75" border="0">
      <tr>
        <td colspan="2">How Long</td>
        </tr>
      <tr>
        <td><select name="co_applicant_present_addr_live_years" id="co_applicant_present_addr_live_years">
          <option>Years</option>
        </select></td>
        <td><select name="co_applicant_present_addr_live_months" id="co_applicant_present_addr_live_months">
          <option>Months</option>
        </select></td>
      </tr>
    </table></td>
    <td width="165"><table width="148" border="0">
      <tr>
        <td>County</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_present_addr_county" type="text" id="co_applicant_present_addr_county" size="15" maxlength="25" />
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="960" border="0">
  <tr>
    <td width="413"><table width="311" border="0">
      <tr>
        <td>Employe</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_employer_name" type="text" id="co_applicant_employer_name" size="50" maxlength="50" />
        
        </td>
      </tr>
    </table></td>
    <td width="237"><table width="161" border="0">
      <tr>
        <td>Employer Phone#</td>
      </tr>
      <tr>
        <td><table width="141" border="0">
          <tr>
            <td width="35">
              <input name="co_applicant_employer_phone" type="text" id="co_applicant_employer_phone" size="16" maxlength="20" />
                       </td>
          
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="296"><table width="293" border="0">
      <tr>
        <td>Address</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_employer_addr" type="text" id="co_applicant_employer_addr" size="25" maxlength="30" />
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="960" border="0">
  <tr>
    <td width="216"><table width="157" border="0">
      <tr>
        <td>Salary(bring home)</td>
      </tr>
      <tr>
        <td>
          <input type="text" name="	co_applicant_income_bringhome" id="	co_applicant_income_bringhome" />
        
        </td>
      </tr>
    </table></td>
    <td width="253"><table width="200" border="0">
      <tr>
        <td>Pay Day</td>
      </tr>
      <tr>
        <td>
          <input type="text" name="co_applicant_payday_frequency" id="co_applicant_payday_frequency" />
        
        </td>
      </tr>
    </table></td>
    <td width="109"><table width="80" border="0">
      <tr>
        <td colspan="2">How Long</td>
        </tr>
      <tr>
        <td><select name="co_applicant_employer_work_years" id="co_applicant_employer_work_years">
          <option>Years</option>
        </select></td>
        <td><select name="co_applicant_employer_work_months" id="co_applicant_employer_work_months">
          <option>Months</option>
        </select></td>
      </tr>
    </table></td>
    <td width="117"><table width="86" border="0">
      <tr>
        <td>Dept. </td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_employer_department" type="text" id="co_applicant_employer_department" size="10" maxlength="15" />
        
        </td>
      </tr>
    </table></td>
    <td width="243"><table width="227" border="0">
      <tr>
        <td>Supervisor</td>
      </tr>
      <tr>
        <td>
          <input name="co_applicant_employer_supervisor_name" type="text" id="co_applicant_employer_supervisor_name" size="25" maxlength="30" />
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<font size="-1">**Note that dealer is relying on this information as a basis for repayment of the applicants obligations.</font>
<hr width="100%" size="1" color="#333333"  align="left"/>
<table width="940" border="0">
  <tr>
    <td><table width="434" border="0">
      <tr>
        <td>Additional Applicant Information- Where Last Vehicle Purchased</td>
      </tr>
      <tr>
        <td>
          <input name="applicant_last_vehicle_purchased" type="text" id="applicant_last_vehicle_purchased" size="60" maxlength="40" />
        
        </td>
      </tr>
    </table></td>
    <td><table width="239" border="0">
      <tr>
        <td>Bank Name</td>
      </tr>
      <tr>
        <td>
          <input name="applicants_bank_name" type="text" id="applicants_bank_name" size="30" maxlength="40" />
        
        </td>
      </tr>
    </table></td>
    <td><table width="276" border="0">
      <tr>
        <td>Checking or Savings Account#</td>
      </tr>
      <tr>
        <td>
          <input name="applicants_checking_savings_acct#" type="text" id="applicants_checking_savings_acct#" size="40" maxlength="40" />
        
        </td>
      </tr>
    </table>
    
    
    </td>
  </tr>
</table><hr color="#666666" />
<table width="962" border="0">
  <tr>
  
    <td><table width="955" border="0">
      <tr>
        <td width="29" align="right" valign="top"><input name="applicant_hereby_authorize" type="text" id="applicant_hereby_authorize" size="3" maxlength="4" /></td>
        <td width="916">The undersigned hereby authorizes selling dealer to initiate a credit investigation based upon the following information, which information has been voluntarily provided by myself and warrants the truth and accuracy of this information.  The undersign further warrants that a bankruptcy proceeding is neither presently in progress nor anticipated and acknowledges receipt of this credit application. </td>
      </tr>
    </table></td>
  </tr>
</table>
<hr />
<table width="955" border="0">
      <tr>
        <td width="38" align="right" valign="top"><input name="equal_credit_opportunity_act" type="text" id="equal_credit_opportunity_act" size="3" maxlength="3" /></td>
        <td width="861">The Federal Equal Credit Opportunity Act prohibits creditors from discriminating against credit applicants on the basis of race, color, religion, national origin, sex maritual status, age (provided that the applicant has the capacity to contract); because all or part of the applicant's income derives from any public assistance program; or because the applicant has in good faith exercised any right under the Consumer Credit Protection Act.  The federal agency that administers compliance with this law concerning this creditor is the Federal Trade Commission, Equal Credit Opportunity, Washington, DC 20580.</td>
      </tr>
    </table>
    <br />
    
<table width="959" border="0">
  <tr>
    <td align="center"><table width="240" border="0">
      <tr>
        <td>Applicant Signature</td>
      </tr>
      <tr>
        <td><input name="applicant_signature" type="text" id="applicant_signature" size="30" maxlength="40" /></td>
      </tr>
    </table></td>
    <td><table width="240" border="0">
      <tr>
        <td>Co-Applicant Signature</td>
      </tr>
      <tr>
        <td><input name="co_applicant_signature" type="text" id="co_applicant_signature" size="30" maxlength="40" /></td>
      </tr>
    </table></td>
    <td><table width="240" border="0">
      <tr>
        <td>Salesman or Witness Signature</td>
      </tr>
      <tr>
        <td><input name="salesperson_witness_signature" type="text" id="salesperson_witness_signature" size="30" maxlength="40" /></td>
      </tr>
    </table></td>
    <td><table width="164" border="0">
      <tr>
        <td>Date</td>
      </tr>
      <tr>
        <td><input name="applicant_signed_input_date" type="text" id="applicant_signed_input_date" size="10" maxlength="8" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><p>&nbsp;
      </p>
      <p>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </p></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	</td>
  </tr>
 
</table>

      

    
  
  
  </table>
<input type="hidden" name="MM_insert" value="af_creditapp" />
</form>

</body>
</html>

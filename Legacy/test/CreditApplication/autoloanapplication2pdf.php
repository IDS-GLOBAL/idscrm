<?php 
//*************
// Pdf Writer
//*************
require_once("../../dwzExport/PdfExport.php");
?>
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
$query_slct_dlr = "SELECT * FROM dealers";
$slct_dlr = mysqli_query($idsconnection_mysqli, $query_slct_dlr);
$row_slct_dlr = mysqli_fetch_assoc($slct_dlr);
$totalRows_slct_dlr = mysqli_num_rows($slct_dlr);
?>
<?php
//************************************
//  http://www.DwZone-it.com
//  Import Export Tools - Pdf Writer
//  Version 1.1.7
//************************************
$dwzPdf_slct_dlr = new dwzPdfExport();
$dwzPdf_slct_dlr->Init();
$dwzPdf_slct_dlr->SetPath("../../");
$dwzPdf_slct_dlr->SetFilePath("");
$dwzPdf_slct_dlr->SetFileName("");
$dwzPdf_slct_dlr->SetNumberOfRecord("ALL");
$dwzPdf_slct_dlr->SetStartOn("ONLOAD", "apppoor.pdf");
$dwzPdf_slct_dlr->SetFieldLabel("true");
$dwzPdf_slct_dlr->SetRecordset($slct_dlr);
$dwzPdf_slct_dlr->AddItem("Sales Rep", "assigned_salesrep", "String", "10", "Left");
$dwzPdf_slct_dlr->AddItem("Phone Number", "assigned_salesrep_phone", "String", "20", "Left");
$dwzPdf_slct_dlr->AddItem("contact", "contact", "String", "10", "Left");
$dwzPdf_slct_dlr->AddItem("contact_phone", "contact_phone", "String", "10", "Left");
$dwzPdf_slct_dlr->AddItem("company", "company", "String", "10", "Left");
$dwzPdf_slct_dlr->AddItem("website", "website", "String", "10", "Left");
$dwzPdf_slct_dlr->SetHeaderSettings("Arial;12;#000000;false;false;false;#FFFFFF");
$dwzPdf_slct_dlr->SetCellSettings("Arial;12;#000000;false;false;false;#FFFFFF;0;#000000;0.3");
$dwzPdf_slct_dlr->SetGeneralSettings("Letter;L;25;25;25;25;false;Center;1");
$dwzPdf_slct_dlr->Execute();
//***********************
// Pdf Writer
//***********************
?>
<html>
<head>
<title>Auto Application Form</title>
</head>

<body>


<form action="" method="post" name="af_creditapplcation" />

        <table width="88%" border="1" style="border-style:solid" align="center">
          <tr>
            <td bordercolor="#666666">
           <table width="100%" border="0">
          <tr>
            <td width="57%"><img src="autoloan.jpg" width="600" height="100"></td>
            <td width="43%"><div style="font-size:12px">5486 Old Dixie Highway &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;404-366-7550 office</div>
                 <div style="font-size:12px">Forest Park, GA 30297 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 404-363-3031</div>
                 <div style="font-size:12px">www.autofinancenow.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;800-307-9233 toll free</div></td>
          </tr>
        </table>
         <hr size="1" color="#333333">
           
           <table border="0">
          <tr>
            <td><div>Drivers License#</div>
              <input type="text" size="24" maxlength="24"></td>
            <td><div>Status</div><input type="text" size="4" maxlength="4" ></td>
            <td><div>State Issued</div>
              
                    <select name="select" id="select">
                    <option value="Alabama">Alabama</option>
                    <option value="Alaska">Alaska</option>
                    <option value="Arizona">Arizona</option>
                    <option value="	Arkansas">	Arkansas</option>
                    <option value="California">California</option>
                    <option value="Colorado">Colorado</option>
                    <option value="Connecticut">Connecticut</option>
                    <option value="	Delaware">	Delaware</option>
                    <option value="Florida">Florida</option>
                    <option value="	Georgia">	Georgia</option>
                    <option value="	Hawaii">	Hawaii</option>
                    <option value="	Idaho">	Idaho</option>
                    <option value="Illinois">Illinois</option>
                    <option value="	Indiana">	Indiana</option>
                    <option value="	Iowa">	Iowa</option>
                    <option value="	Kansas">	Kansas</option>
                    <option value="Kentucky">Kentucky</option>
                    <option value="	Louisiana">	Louisiana</option>
                    <option value="	Maine">	Maine</option>
                    <option value="	Maryland">	Maryland</option>
                    <option value="Massachusetts">Massachusetts</option>
                    <option value="	Michigan">	Michigan</option>
                    <option value="	Minnesota">	Minnesota</option>
                    <option value="	Mississippi">Mississippi</option>
                    <option value="	Missouri">	Missouri</option>
                    <option value="	Montana">	Montana</option>
                    <option value="Nebraska">		Nebraska</option>
                    <option value="Nevada">		Nevada</option>
                    <option value="New Hampshire">	New Hampshire</option>
                    <option value="New Jersey">New Jersey</option>
                    <option value="New Mexico">New Mexico</option>
                    <option value="New York">New York</option>
                    <option value="North Carolina">North Carolina</option>
                    <option value="North Dakota">North Dakota</option>
                    <option value="Ohio">Ohio</option>
                    <option value="Oklahoma">Oklahoma</option>
                    <option value="Oregon">Oregon</option>
                    <option value="Pennsylvania">Pennsylvania</option>
                    <option value="Rhode Island">Rhode Island</option>
                    <option value="South Carolina">South Carolina</option>
                    <option value="South Dakota">South Dakota</option>
                    <option value="Tennessee">	Tennessee</option>
                    <option value="Texas">	Texas</option>
                    <option value="Utah">	Utah</option>
                    <option value="Vermont">Vermont</option>
                    <option value="Virginia">	Virginia</option>
                    <option value="Washington">		Washington</option>
                    <option value="West Virginia">	West Virginia</option>
                    <option value="Wisconsin">	Wisconsin</option>
                    <option value="Wyoming">Wyoming</option>
                  </select>
              </form></td>
            <td><div>Social Security#</div><input type="text" size="3" maxlength="3"><input type="text" size="2" maxlength="2" ><input type="text" size="4" maxlength="4" ></form></td>
            <td><div>Date of Birth&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(yyyy)</div>      
                <select name="select" id="select">
                    <option value='01'>January</option>
                    <option value='02'>February</option>
                    <option value='03'>March</option>
                    <option value='04'>April</option>
                    <option value='05'>May</option>
                    <option value='06'>June</option>
                    <option value='07'>July</option>
                    <option value='08'>August</option>
                    <option value='09'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
            <option value='12'>December</option></select>
                            <select name="select" id="select">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="	04">04</option>
                    <option value="05">05</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="	07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    
                    
                    
                    
                    </select><input type="text" size="4" maxlength="4" ></form>
              </td>
            <td><div>Age</div><input type="text" size="2" maxlength="2"></td>
            <td><div>Sales Source(Lot)</div><input type="text" size="24" maxlength="24"></td>
          </tr>
        </table>
        
            <table border="0">
          <tr>
            <td><div>Applicant Name</div><input type="text" size="50" maxlength="50"></td>
            <td><div>Other Name Known By(Maiden)</div><input type="text" size="50" maxlength="50"></td>
            <td><div>Cell# or Pager#</div><input type="text" size="12" maxlength="10"> &nbsp;<font color="#990000"><font size="-1">example:8005558897</font></font></td>
          </tr>
        </table>
          
           <table width="100%" border="0">
          <tr>
            <td><div>Present Address/Street</div><input type="text" size="50" maxlength="50"></td>
            <td><div>Bldg./Apt#</div><input type="text" size="10" maxlength="10"></td>
            <td><div>City</div><input type="text" size="20" maxlength="20"></td>
            <td><div>Home Phone#</div><input type="text" size="10" maxlength="10"></td>
            <td><div>Zip</div><input type="text" size="5" maxlength="5"></td>
            <td><div>How Long</div><input type="text" size="12" maxlength="2"></td>
            <td><div>County</div><input type="text" size="25" maxlength="25"></td>
          </tr>
        </table>
         
            
         <table width="100%" border="0">
          <tr>
            <td><div>Landlord/Mortgage Co.</div><input type="text" size="50" maxlength="50"></td>
            <td><div>Address</div><input type="text" size="40" maxlength="50"></td>
            <td><div>Phone#</div><input type="text" size="12" maxlength="10"></td>
            <td><div>Name Leased To</div><input type="text" size="35" maxlength="35"></td>
          </tr>
        </table>
           <br>
         <table width="100%" border="0">
          <tr>
            <td width="26%"><div style="background-color:#CCCCCC">Check One:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="House" type="checkbox" value="House">House &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Apt." type="checkbox" value="Apt.">Apt.</div></td>
            <td width="28%"><div style="background-color:#CCCCCC">Check One:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Buy" type="checkbox" value="Buy">Buy &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Rent" type="checkbox" value="Rent">Rent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Own" type="checkbox" value="Own">Own</div></td>
            <td width="46%"><div>Payment Amount <hr align="left" width="60%" size="2" color="#000000">
            </div></td>
          </tr>
        </table>
           <br>
           
            <div>VERIFICATION</div><hr width="100%" size="2" color="#000000" align="left">
            
            <table border="0">
          <tr>
            <td><div>Previous Address (must go back 5 years)</div><input type="text" size="50" maxlength="50"></td>
            <td><div>How Long</div><input type="text" size="4" maxlength="2"></td>
            <td><div>Next Previous Address</div><input type="text" size="50" maxlength="50"></td>
            <td><div>How Long</div><input type="text" size="4" maxlength="2"></td>
          </tr>
        </table>
        
            
            <table width="100%" border="0">
              <tr>
                <td><div>Apartment Complex or Landlord Name</div><input type="text" size="50" maxlength="50"></td>
                <td><div>Phone#</div><input type="text" size="10" maxlength="10"></td>
                <td><div>Apartment Complex or Landlord Name</div><input type="text" size="50" maxlength="50"></td>
                <td><div>Phone#</div><input type="text" size="10" maxlength="10"></td>
              </tr>
            </table>
            <br>
            <div>VERIFICATION</div><hr width="100%" size="2" color="#000000" align="left">
            
            <table border="0">
          <tr>
            <td><div>Present Employer Name</div><input type="text" size="50" maxlength="50"></td>
            <td><div>Street Address</div><input type="text" size="35" maxlength="35"></td>
            <td><div>City</div><input type="text" size="20" maxlength="20"></td>
            <td><div>Phone#</div><input type="text" size="4" maxlength="2"></td>
            <td><div>How Long</div><input type="text" size="4" maxlength="2"></td>
          </tr>
        </table>
        
            
            <table width="100%" border="0">
              <tr>
                <td><div>Salary(bring home)</div><input type="text" size="14" maxlength="6"></td>
                <td><div>Pay Day</div><input type="text" size="10" maxlength="10"></td>
                <td><div>Dept.</div><input type="text" size="10" maxlength="10"></td>
                <td><div>Supervisor</div><input type="text" size="25" maxlength="25"></td>
                <td><div>Hours/Shift</div><input type="text" size="8" maxlength="10"></td>
                <td><div>*Other Income</div><input type="text" size="14" maxlength="6"></td>
              </tr>
            </table><div><font size="-1">Alimony, Child Support, or Seperate Maintenance need not be revealed if you do not wish to have it considered as a basis for repaying the loan.</font></div>	
            <br>
            <div>VERIFICATION</div><hr width="100%" size="2" color="#000000" align="left">
            
            <table border="0">
          <tr>
            <td><div>Previous Employer (must go back 5 years)</div><input type="text" size="40" maxlength="40"></td>
            <td><div>How Long</div><input type="text" size="4" maxlength="4"></td>
            <td><div>Phone#</div><input type="text" size="10" maxlength="10"></td>
            <td><div>Next Previous Employer/Phone#</div><input type="text" size="30" maxlength="30"></td>
          </tr>
        </table>
        <br>
            <div>VERIFICATION</div><hr width="100%" size="2" color="#000000" align="left">
            
            <table border="0">
          <tr>
            <td><div>Spouse/Significant Other/Girlfriend/Boyfriend/Ex Name</div><input type="text" size="50" maxlength="50"></td>
            <td><div>Social Security#</div>
              <input type="text" size="10" maxlength="10"></td>
            <td><div>Home Phone#</div><input type="text" size="12" maxlength="10"></td>
            <td><div>Cell# or Pager#</div><input type="text" size="12" maxlength="10"></td>
              </tr>
        </table>
            
            
            
            
            <table width="100%" border="0">
              <tr>
                <td><div>Present Address/Street</div><input type="text" size="50" maxlength="50"></td>
                <td><div>Bldg./Apt.#</div><input type="text" size="10" maxlength="10"></td>
                <td><div>City</div><input type="text" size="20" maxlength="20"></td>
                <td><div>Zip</div><input type="text" size="5" maxlength="5"></td>
                <td><div>How Long</div><input type="text" size="4" maxlength="2"></td>
                <td><div>County</div><input type="text" size="25" maxlength="25"></td>
              </tr>
            </table>
            <table width="100%" border="0">
          <tr>
            <td><div>Employe</div><input type="text" size="25" maxlength="25"></td>
            <td><div>Employer Phone#</div><input type="text" size="10" maxlength="10"></td>
            <td><div>Address</div><input type="text" size="50" maxlength="50"></td>
          </tr>
        </table>
        
            <table width="100%" border="0">
          <tr>
            <td><div>Salary(bring home)</div><input type="text" size="8" maxlength="8"></td>
            <td><div>PayDay</div><input type="text" size="15" maxlength="15"></td>
            <td><div>HowLong</div><input type="text" size="4" maxlength="2"></td>
            <td><div>Dept.</div><input type="text" size="25" maxlength="25"></td>
            <td><div>Supervisor</div><input type="text" size="25" maxlength="25"></td>
              </tr>
        
        </table>
                <hr align="left" width="100%" size="2" color="#000000">
        <div><font size="-1" style="bold">**Note that dealer is relying on this information as a basis for repayment of the applicants obligations.</font></div>
        <br>
        <table width="100%" border="0" >
          <tr>
            <td><div style="background-color:#CCCCCC">Additional Applicant Information - Where Last Vehicle Purchased</div><textarea name="" cols="55"></textarea></td>
            <td><div style="background-color:#CCCCCC">Bank Name</div><textarea name="" cols="30"></textarea></td>
            <td><div style="background-color:#CCCCCC">Checking or Savings Account#</div><textarea name="" cols="40"></textarea></td>
          </tr>
        </table>
                <hr width="85%" size="1.5" color="#000000" align="left">
              <div><input name="" type="checkbox" value="">The undersigned hereby authorizes selling dealer to initiate a credit investigation based upon the following information, which information has been voluntarily provided by myself and warrants the truth and accuracy of this information.  The undersign further warrants that a bankruptcy proceeding is neither presently in progress nor anticipated and acknowledges receipt of this credit application.</div>
                <br>
              <div><input name="" type="checkbox" value="">The Federal Equal Credit Opportunity Act prohibits creditors from discriminating against credit applicants on the basis of race, color, religion, national origin, sex maritual status, age (provided that the applicant has the capacity to contract); because all or part of the applicant's income derives from any public assistance program; or because the applicant has in good faith exercised any right under the Consumer Credit Protection Act.  The federal agency that administers compliance with this law concerning this creditor is the Federal Trade Commission, Equal Credit Opportunity, Washington, DC 20580.</div>
                <br>
              <table width="100%" border="0">
          <tr>
            <td width="25%">Applicant Signature<br>
              <br><br><hr color="#666666"></td>
            <td width="30%">Co-Applicant Signature<br>
              <br><br><hr color="#666666"></td>
            <td width="28%">Salesman or Witness Signature<br>
              <br><br><hr color="#666666"></td>
            <td width="17%">Date<br>
              <br><br><hr color="#666666"></td>
          </tr>
        </table>
        
                
                
                
            </td>
          </tr>
        </table>

</form>

	










</body>
</html>
<?php
mysqli_free_result($slct_dlr);
?>
<?php



?>
<html>
<head>
	<title>Change Vehicle Information</title>



</head>
<body>

Body | Doors | Exterior | Interior | | Comments | Engine | Transmission | Trim Code | Location | Comments


<p>
<label>Interior Type</label>
<select>
<option value="Cloth">Cloth</option>
<option value="Leather">Leather</option>
<option value="Vinyl">Vinyl</option>
<option value="Other">Other</option>
</select>


<p>
<label>Stock Type</label>
<select>
<option value="New-Car">New-Car</option>
<option value="New-Truck">New-Truck</option>
<option value="Used-Car">Used-Car</option>
<option value="Used-Truck">Used-Truck</option>
<option value="Other">Other</option>
</select>


</p>

<hr />
Price
Days In Stock
Expected Date

<br />
Last Mileage
Arrival Mileage
Arrived Date


<form>

<p>
<label>Stock Type:</label>
<select type="menu" name="vStockType" id="vStockType">
<option value="">Select One</option>
<option value="Demo">Demo</option>
<option value="Program">Program</option>
<option value="Certified">Certified</option>
</select>
</p>

<br />

<p>
<label>In Service Date:</label>
<input type="text" name="inServiceDate" id="inServiceDate" value="">
</p>

<br />

<p>
<label>Weight:</label>
<input type="text" name="vweight" id="vweight" value="">
</p>

<br />

<p>
<label>Licenses Fee:</label>
<input type="text" name="licsFee" id="licsFee" value="">
</p>

<br />

<p>
<label>Disclosure:</label>
<input type="text" name="vdisclosure" id="vdisclosure" value="">
</p>


<p>
<label>Manufatured Date:</label>
<input type="text" name="manfDate" id="manfDate" value="">
</p>


<p>
<label>Vehicle Buyer:</label>
<select type="menu" name="vBuyer" id="vBuyer">
<option value="">Select One</option>
<option value="">Bobby Herron</option>
</select>
</p>

<p>
<label>Vehicle Orgin:</label>
<select type="menu" name="vOrgin" id="vOrgin" value="" >
<option value="">Select One</option>
<option value="Factory">Factory</option>
<option value="Trade-In">Trade-In</option>
<option value="Consignment">Consigment</option>
<option value="Unknown">Unknown</option>
<option value="Dealer-Trade">Dealer-Trade</option>
<option value="Select-Customer">Select Customer</option>
</select>

<label>Customer No.</label>
<input type="text" name="custNumber" id="custNumber" size="10" value="" >
</p>

<p>
<label>Prior Use</label>
<select type="menu" name="priorUse" id="priorUse">
<option value="">SelectOne </option>
<option value="C">C-Company-Executive, Factory-Executive Vehicle</option>
<option value="D">D-Demonstrator</option>
<option value="P">P Program, Off-Use or Rental-Vehicle</option>
<option value="T">T Trade-In Vehicle</option>
<option value="W">W Wholesale-Vehicle</option>
<option value="R">R Reposessed-Vehicle</option>
<option value="B">B BuyBack Vehicle</option>
<option value="S">S Spot Delivered Vehicle</option>
</select>
</p>


<p>
<label>Tag:</label>
<input type="text" name="vTag" id="vTag" value="" >


<label>Decal:</label>
<input type="text" name="vDecal" id="vDecal" value="" >

</p>

<p>
<label>State/Expiration / States</label>
<select>
<option value="">Select One</option>
</select>

<label>Date:</label>
<input type="text" name="vStateExpDate" id="vStateExpDate" value="" ></p>

<p>
<label>Title</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>


<p>
<label>Ignition</label>
<input type="text" name="vIgnition" id="vIgnition" value="" >
</p>


<p>
<label>Trunk</label>
<input type="text" name="vTrunk" id="vTrunk" value="" >
</p>


<p>
<label>Chip</label>
<input type="text" name="vChip" id="vChip" value="" >
</p>


<p>
<label>Radio</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>

<hr />


<p>
<label>Sales Price</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Estimated Cost</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Scheduled Cost</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Spiff</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Factory Incentive</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Total Cost</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Pack</label>
<input type="text" name="vdealerPack" id="vdealerPack" value="" >
</p>
<p>
<label>Hold Back</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Plus Spiff</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Less Incentive</label>
<input type="text" name="vTitle" id="vTitle" value="Y" readonly="readonly" size="4" >
</p>
<p>
<label>Other Charges</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Commissionable Cost</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>MSRP</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Invoice Date</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Incentive Start Date:</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Incentive Stop Date:</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Vehicle AGE</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Approx FP Charges</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>FP Amount</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>
<p>
<label>Radio</label>
<input type="text" name="vTitle" id="vTitle" value="" >
</p>

<hr />

<!-- Extended Service Warranty -->
<p>
<label>Extended Service Company</label>
<select type="text" name="extendedSrvCompany" id="extendedSrvCompany" value="">
<option value="">Select One</option>
<option value="N/A">N/A</option>
</select>
</p>


<p>
<label>Contract Number</label>
<input type="text" name="extendedContractNo" id="extendedContractNo" value="">
</p>



<p>
<label>Expiration Date</label>
<input type="text" name="extendedExpirationDate" id="extendedExpirationDate" value="">
</p>

<p>
<label>Miles</label>
<input type="text" name="extendedContractNo" id="extendedContractNo" value="">
</p>


<p>
<label>Deductible</label>
<input type="text" name="contractDeductible" id="contractDeductible" value="">
</p>


<p>
<label>Factory Warranty Months</label>
<input type="text" name="factoryWarrantyMos" id="factoryWarrantyMos" value="">
</p>


<p>
<label>Factory Warranty Months</label>
<input type="text" name="factoryWarrantyMiles" id="factoryWarrantyMiles" value="">
</p>

<hr />

Purchase Orders

<p>
	Vendor Name | PO# | PDate | Description | Amount
</p>

<hr />

Outstanding RO's

<p>
	RO# | OP | OP Code | Pay | Tech. | Complaiant/Cause
</p>


<hr />

Service History
<p>
	RO# | OP Code | Pay | Description | Date | Advisor | Tech | Mileage | Parts | Labor
</p>

<hr />

Inspection

<p>
View Inspection Notes | Print Inspection Notes
</p>

<p>
	Add Inspection Comments 
</p>

{Four Points To A Vehicle Front:Rear}

<hr />
<p>
Internet Price <br />
NADA <br />
KBB <br />
Black Book <br />
</p>
<hr />

Misc

</form>







</bodY>
</html>
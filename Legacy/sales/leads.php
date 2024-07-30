<?php include('db_sales-functions.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Leads</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/calendarDateInput.js"></script>
<script language="JavaScript" SRC="calendar/calendar.js"></script>
<script language="JavaScript">

	var cal = new CalendarPopup();

</script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

<!-- HEADER -->

	<?php include('parts/top-header.php'); ?>
    
    
    
    
    
<!-- START MAIN CONTENT ------------------------------------------------------>
  
	
	

	
				<div class="content">

    
    <div class="block_gr vertsortable">

      <!-- gadget Welcome -->
      <!-- message -->
      <div class="gadget jsi_msg jsi_msg_yellow"><p><strong>Leads To Your Dealership</strong> That hasn't been assigned to a salesperson. <a href="#">Click To Get Permission For Some Of These Leads.</a></p></div>
      
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3><?php echo $totalRows_didleads_notassigned ?> Vehicle Leads Not Assigned To You <span>This is A Quick Snapshot Of The Latest Leads</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th width="40" class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Vehicle</th>
                <th width="90">Make</th>
                <th width="90">Model</th>
                <th width="90">Source</th>
                <th width="90">Date Captured</th>
                <th width="120">Status</th>
                <th width="50">Actions</th>
              </tr>
              
                <?php do { ?>
              <tr class="last">
                  <td><input name="utc4" id="utc4" type="checkbox" /></td>
                  <td>
                  	<?php 
					$fname = $row_didleads_notassigned['cust_fname'];
					
					if(!$fname){echo "<a href='#'>No Name Specified</a>";}else{
						echo $row_didleads_notassigned['cust_fname'];
						echo ' ';
						echo $row_didleads_notassigned['cust_lname'];
					}
					?>

                  </td>
                  <td>
				  	<?php echo $row_didleads_notassigned['vcondition']; ?>
                  </td>
                  <td>
				  	<?php echo $row_didleads_notassigned['vyear'].' '; ?>
                    <?php echo $row_didleads_notassigned['vmake']; ?>
                  </td>
                  <td><?php echo $row_didleads_notassigned['vmodel']; ?> <?php echo $row_didleads_notassigned['vtrim']; ?></td>
                  <td><?php
				  		$lsource = $row_didleads_notassigned['cust_lead_source'];
						if($lsource){
						echo 'Website';
						}else{echo $row_didleads_notassigned['cust_lead_source']; }
					   ?>
                  </td>
                  <td><?php echo $row_didleads_notassigned['cust_lead_created_at']; ?></td>
                  <td>
                  <?php 
				  		$status = $row_didleads_notassigned['cust_status'];
				  		if(!$status){ echo 'Pending';}else{
						echo $row_didleads_notassigned['cust_status'];
						}
				  ?>
                  </td>
                  <td><a href="lead-preview.php?leadid=<?php echo $row_didleads_notassigned['cust_leadid']; ?>"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
				<?php } while ($row_didleads_notassigned = mysqli_fetch_assoc($didleads_notassigned)); ?>
              
			  
			  <?php //include('salesmod/leadisplay.php'); ?>


                
            </table>
            </form>
          </div>
        </div>
      </div>
      
      <div class="gadget jsi_msg jsi_msg_red"><p><strong>Leads Saved To You</strong> The latest leads assigned to you. <a href="#">Click Here To View All</a></p></div>
	 
      
      <!-- gadget usertable -->
      <!-- gadgets horisontal -->
      <!-- gadget usertable -->

    <!-- Start Customer Assigned Leads -->

      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Customer Leads Assigned To You <span>This is A Quick Snapshot Of Your Lastest Leads</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th width="40" class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Phone Nmber</th>
                <th width="90">Date Captured</th>
                <th width="120">Status</th>
                <th>E-mail</th>
                <th width="50">Actions</th>
              </tr>
              
              
              <?php include('salesmod/leadisplay.php'); ?>


                
            </table>
            </form>
          </div>
        </div>
      </div>

<!-- End Customer Assigned Leads -->
    </div>
    
    
    
    
    
    
    
    <!-- START LEFT TOWER BLOCK -->
    
    
    
    <div class="block_sm vertsortable">

      <!-- gadget calendar -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Calendar <span>...</span></h3>
          <div class="gadget_content">
            <div id="datepicker"></div>
            <div class="clr"></div>
            <p><a href="customer-add.php" class="bg_grey">+ Add Appt.</a> &nbsp; <a href="appointments.php" class="bg_grey">List Appts.</a></p>
          </div>
        </div>
      </div>

     <!-- gadget dashboard -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Dashboard <span>...</span></h3>
          <div class="gadget_content">
            <ul class="dashboard">
            
              <li class="li1"><a href="#">Dashboard</a></li>
              
              <li class="li3"><a href="add-inventory.php">Add Inventory</a></li>
              
              <li class="li2"><a href="#">Tutorials</a></li>
              
              <li class="li4"><a href="#">Search Customer</a></li>
              
              <li class="li5"><a href="#">Upload Photos</a></li>
              
              <li class="li6"><a href="#">View Photos</a></li>
              
              <li class="li7"><a href="#">My Settings</a></li>
            
            </ul>
          </div>
        </div>
      </div>

      <!-- gadget leadcapture -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Quick Capture Lead<span>...</span></h3>
          
          <div class="gadget_content">
            
			<form name="form_quickcontact"  method="POST" id="form_quickcontact" class="form_quickcontact">
            <ol>
             <li>
              <label for="cust_nickname">Customer Nick Name:</label>
              <input id="cust_nickname" name="cust_nickname" class="text" />
              <div class="clr"></div>
            </li>
            
            <li>
              <label for="cust_fname">Customer First Name:</label>
              <input type="text" id="cust_fname" name="cust_fname" class="text" />
              <div class="clr"></div>
            </li>

             <li>
              <label for="cust_lname">Customer Last Name:</label>
              <input id="cust_lname" name="cust_lname" class="text" />
              <div class="clr"></div>
            </li>

            
            <li>
              <label for="email">Customer Phone Number:</label>
              <span id="sprytextfield4">
              <input id="cust_phoneno2" name="cust_phoneno2" class="text" />
              <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
              <div class="clr"></div>
            </li>
			
            <li>
              <label for="cust_phonetype">Phone Type:</label>
              <select name="cust_phonetype" id="cust_phonetype">
                    	    <option value="mobile">Mobile</option>
                    	    <option value="home">Home</option>
                    	    <option value="work">Work</option>
              </select>
              
              
              <div class="clr"></div>
            </li>
            
            <li>
              <label for="email">Customer Email:</label>
              <span id="sprytextfield5">
              <input id="cust_email" name="cust_email" class="text" /><br />
              	<span class="textfieldRequiredMsg">A valid email is required.</span>
              	<span class="textfieldInvalidFormatMsg">Unproper Format.</span>
              </span>
              <div class="clr"></div>
            </li>
            
                        
            <li>
              <label for="cust_lead_sp_comment">Notes & Comments:</label>
              <textarea id="cust_lead_sp_comment" name="cust_lead_sp_comment" rows="3" cols="1"></textarea>
              <div class="clr"></div>
            </li>
            
            <li>
            <label for="cust_lead_temperature">Customer Status:</label>
            <select name="cust_lead_temperature" id="cust_lead_temperature">
              			<option value="Hot">Hot</option>
              			<option value="Warm">Warm</option>
              			<option value="Cold">Cold</option>
            </select>
            <div class="clr"></div>
            </li>
            
            
            <li>
              <input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $sid; ?>">
              <input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $did; ?>">
              <input name="cust_lead_token" type="hidden" id="cust_lead_token" value="<?php echo $tkey; ?>">
              <div class="clr"></div>
            </li>
            <li>
              <input type="submit" value="Save Customer" >
              
               
               
               <!--<a href="script-sales-template.php" class="bg_grey">Save Customer</a>
               <input type="image" name="imageField" id="imageField" src="images/button_send.gif" class="send" /> Post Action -->
              
              
              
              
              <div class="clr"></div>
            </li></ol>
			</form>
            
          </div>
          
        </div>
      </div>

    </div>
    
    
    
    
    
    
    
    
    
        <?php //include('parts/left-tower.php') ?>
    
    <!-- END LEFT TOWER BLOCK -->
    
    
    <div class="clr"></div>
  </div>
















	<?php //include('custom_pages/dashboard_page.php'); ?>
<!-- END MAIN CONTENT -->













<!-- FOOTER -->
  
	
	
	<?php include('parts/sales_footer.php'); ?>
    
<!-- END FOOTER -->    
    
    
    


























<!-- DIALOGS -->
  
  	<?php //include('dialogs/crm-power.php'); ?>
  

  
  
  
<!-- START Include Brought Out And Pasted For Spry -->


				
                
                
                
                
                
                
                
                
                
                
                
<div id="dialogboxes">
    
    
    <!-- Dialog Box Form  -->

  

    <div id="dialog1" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
         <div id="closewindow"><a href="dashboard.php" target="_parent">Close</a></div><!-- End Close window --> 
          <h3>Over The Phone Prompt<span>Belows Is Your - Script</span></h3>
          <div class="gadget_content">

            <p>
            	<strong>
                Note: Remember The longer you have the customer on the phone the better your chances are in converting them.
                </strong> 
                <br /><br />
                Collect Customers Name, Phone Number, and Email Address.  Offer to send them something.
                <br /><br />
                
            </p>
            
            
            <div class="cust-input">

              
              <form method="POST" name="ovrphngoal" id="ovrphngoal">
              
              <table cellpadding="5" cellspacing="5">
              	<tr>
                  <td>
                <strong>Cust. Name:</strong></td>
                   
                   <td>
                	<p><span id="sprytextfield1">
                	  <input type="text" name="cust_nickname" id="cust_nickname" /><br />
               	     <span class="textfieldRequiredMsg">Customers Name Missing.</span>
                     </span>
                    </p>
                </td></tr>
                <tr>
                <td><strong>Phone No:</strong></td>
                  <td>
                    <p>
            <span id="sprytextfield2">
                    	<input type="text" name="cust_phoneno" id="cust_phoneno" /> 
                    	                    	<br />
                    	 <span class="textfieldRequiredMsg">Phone Number Missing</span>
                    	 <span class="textfieldInvalidFormatMsg">Example (404) 555-1234.</span>
            </span>
            
                    </p>
                  </td>
                </tr>
                <tr>
                  <td><strong>Phone Type:</strong></td>
                  <td>
                      <label>
                      <select name="cust_phonetype" id="cust_phonetype">
                    	    <option value="mobile">Mobile</option>
                    	    <option value="home">Home</option>
                    	    <option value="work">Work</option>
               	        </select>
                  	  </label>
                  </td>
                </tr>
                <tr>
                  <td><strong>Email: </strong></td>
                  <td>
                    <p>
                    <span id="sprytextfield3">
                    <input type="text" name="cust_email" id="cust_email"><br />
                    <span class="textfieldRequiredMsg">A valid email address is required.</span>
                    <span class="textfieldInvalidFormatMsg">Keep Typing...</span></span>
                    </p>
                  </td>
               </tr>
               
               <tr>
                  <td valign="top">
                  	<strong>Your Comments:</strong>
                  </td>
               
                  <td>
                  <p>
                  	<textarea name="cust_lead_sp_comment" cols="25" rows="1"></textarea>
                  </p>
                  </td>
               </tr>
               
               <tr>
                  <td>
                    <label for="cust_lead_temperature">Customer Status:</label>
                   </td>
                   <td>
		            	<select name="cust_lead_temperature" id="cust_lead_temperature">
        		    		<option value="Hot">Hot</option>
              				<option value="Warm">Warm</option>
              				<option value="Cold">Cold</option>
            			</select>

                  </td>
               
                  <td>
                  <input name="cust_lead_token" type="hidden" value="<?php echo $tkey; ?>">
                  </td>
                </tr>
                <tr>
                  <td><strong>&nbsp;</strong></td>
                  <td>
                  <p>
                  
					                
                    

                    
                                      
                  </p>
                  </td>
                </tr>
                <tr>
                <td colspan="2" align="center">
                
                	<input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $row_userSets['salesperson_id']; ?>" />
                  	<input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $row_userSets['main_dealerid']; ?>" />
                  
                   <p><br />
                   <input class="bg_grey" type="submit" name="submit" id="submit" value="Start The CRM Power Process Now">
                   <!-- <a href="#" class="bg_grey" type="submit" name="submit">Start The Process Now - CRM Power</a> -->
                </p>
                </td></tr></table>
              <input type="hidden" name="MM_insert" value="ovrphngoal">
              </form>
              
              
            </div>
            
            
          <p>
            	 
                <br />
            </p>
          
          </div><!-- End gadget_content -->
         
        </div>
      </div>
  </div>


    <!-- Empty -->
    
    		
    
    <!-- Mask to cover the whole screen -->
    <div id="mask"></div>
  </div>

<!-- END Include Brought Out And Pasted For Spry -->  
  
  

  
	
  
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "phone_number", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "phone_number", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["blur"]});
//-->
</script>
</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($spleads);

mysqli_free_result($didleads_notassigned);

?>

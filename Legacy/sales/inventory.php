<?php include('db_sales-functions.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Dashboard</title>
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
<script language="JavaScript" SRC="js/idsSalesperson.js"></script>
<script language="JavaScript">

	var cal = new CalendarPopup();

</script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">




<script type='text/javascript' src='scripts/jquery-1.6.1.min.js'></script>
<script type='text/javascript' src='scripts/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='scripts/jquery.dataTables.columnFilter.js'></script>
<script type='text/javascript' src='scripts/jquery.dataTables.pagination.js'></script>
<link type='text/css' href='css/demo_table_jui.css' rel='stylesheet'/>
<style type="text/css">
@import url("css/custom/redmond/jquery.ui.all.css");
	#dataTable {padding: 0;margin:0;width:100%;}
	#dataTable_wrapper{width:100%;}
	#dataTable_wrapper th {cursor:pointer} 
	#dataTable_wrapper tr.odd {color:#000000; background-color:#ffffff}
	#dataTable_wrapper tr.odd:hover {color:#333333; background-color:#cccccc}
	#dataTable_wrapper tr.odd td.sorting_1 {color:#ffffff; background-color:#ffcc00}
	#dataTable_wrapper tr.odd:hover td.sorting_1 {color:#000000; background-color:#666666}
	#dataTable_wrapper tr.even {color:#ffffff; background-color:#666666}
	#dataTable_wrapper tr.even:hover, tr.even td.highlighted{color:#eeeeee; background-color:#00cccc}
	#dataTable_wrapper tr.even td.sorting_1 {color:#ffffff; background-color:#66ccff}
	#dataTable_wrapper tr.even:hover td.sorting_1 {color:#333333; background-color:#ffff00}
</style>





</head>
<body>
<div class="container">

<!-- HEADER -->

	<?php include('parts/top-header.php'); ?>
    
    
    
    
    
<!-- START MAIN CONTENT ------------------------------------------------------>
  
	
	

	
				<div class="content">
    <!-- GREAT BLOCK -->
    <div class="block_gr vertsortable">

      <!-- gadget Welcome -->
      <!-- message
      <div class="gadget jsi_msg jsi_msg_yellow"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
      <div class="gadget jsi_msg jsi_msg_red"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
	  -->
      
      <!-- gadget usertable -->
      <!-- gadgets horisontal -->
      

      
      <!-- gadget usertable -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>This Is Your Dealerships Inventory Online</h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <script type="text/javascript">
$(document).ready(function() {
	oTable = $('#dataTable').dataTable({
		"bJQueryUI": true,
		"bRetrieve": true,
		"bScrollCollapse": false,
		"sScrollY": "100%",
		"bAutoWidth": true,
		"bPaginate": true,
		"sPaginationType": "two_button", //full_numbers,two_button
		"bStateSave": true,
		"bInfo": true,
		"bFilter": true,
		"iDisplayLength": 25,
		"bLengthChange": true,
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
	});
} );
</script>
<table cellpadding="10" cellspacing="5" border="0" id="dataTable">
	<thead>
		<tr>
			<th>Photo</th>
			<th>Stock No.</th>
			<th>Year Make Model</th>
			<th>Color</th>
			<th>Price</th>
			<th>Action</th>

		</tr>
	</thead>
	<tbody>
	<!--Loop start, you could use a repeat region here-->
                <?php do { ?>
  <?php
				$vyear=$row_salespersoninventory['vyear'];
                $vmake=$row_salespersoninventory['vmake'];
                $vmodel=$row_salespersoninventory['vmodel'];
				$vtrim=$row_salespersoninventory['vtrim'];
				$vehicle = "$vyear $vmake $vmodel $vtrim";
				$vphoto= $row_salespersoninventory['vid'];
    ?>
<tr>
      <td>
        <a href="update-inventory.php?vid=<?php echo $row_salespersoninventory['vid']; ?>">
          <?php echo showphoto($vphoto); ?>
          </a>
        
        </td>
      <td>
        <a href="update-inventory.php?vid=<?php echo $row_salespersoninventory['vid']; ?>">
          <?php echo $row_salespersoninventory['vstockno']; ?>
          </a>
        </td>
      <td>
        <a href="update-inventory.php?vid=<?php echo $row_salespersoninventory['vid']; ?>">
	  <?php echo $vehicle; ?><br>
<?php echo $row_salespersoninventory['vvin']; ?><br>
          </a>
        </td>
      <td>
        Exterior: <?php echo $row_salespersoninventory['vecolor_txt']; ?><br>
        Interior: <?php echo $row_salespersoninventory['vicolor_txt']; ?><br>
        </td>
      <td> Asking: <?php echo $row_salespersoninventory['vrprice']; ?><br>
        Internet: <?php echo $row_salespersoninventory['vspecialprice']; ?><br>
        DownPymt: <?php echo $row_salespersoninventory['vdprice']; ?><br></td>
      <td>
        
        <a href="update-inventory.php?vid=<?php echo $row_salespersoninventory['vid']; ?>">
          <img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" />  
          </a>
        </td>
    </tr>
               <?php } while ($row_salespersoninventory = mysqli_fetch_assoc($salespersoninventory)); ?>
	<!--Loop ends, repeat region stopped here-->    
    
                        <?php if ($totalRows_salespersoninventory == 0) { // Show if recordset empty ?>


    
<tr>
		  <td>No Inventory To View </td>
		  <td>&nbsp;</td>
		  <td>Please Add Some</td>
		  
		  <td>?</td>
		  <td>
          ?</td>
		  <td>N/A</td>
		  </tr>
  <?php } // Show if recordset empty ?>          
          
		<!--Loop end-->
	</tbody>
</table>
            </form>
          </div>
        </div>
      </div>

    </div>
    
    
    
    <!-- START LEFT TOWER BLOCK -->
    
    
    
    <div class="block_sm vertsortable">


     <!-- gadget dashboard -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Dashboard <span>...</span></h3>
          <div class="gadget_content">
                        <ul class="dashboard">
            
              <li class="li1"><a href="coming-soon.php">Dashboard</a></li>
              
              <li class="li3"><a href="add-inventory.php">Add Inventory</a></li>
              
              <li class="li2"><a href="coming-soon.php">Tutorials</a></li>
              
              <li class="li4"><a href="customers.php">Search Customer</a></li>


              <li class="li4"><a href="appointments.php">Appointments</a></li>

              <li class="li5"><a href="coming-soon.php">Upload Photos</a></li>
              
              <li class="li6"><a href="coming-soon.php">View Photos</a></li>
              
              <li class="li7"><a href="coming-soon.php">My Settings</a></li>
            
            </ul>

          </div>
        </div>
      </div>

      <!-- gadget leadcapture -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Quick Capture Lead<span>...</span></h3>
          
          <div class="gadget_content">
            
			<form name="form_quickcontact"  action="<?php echo $editFormAction; ?>" method="POST" id="form_quickcontact" class="form_quickcontact">
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
              <input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id">
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
            <input type="hidden" name="MM_insert" value="form_quickcontact">
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

              
              <form method="POST" action="<?php echo $editFormAction; ?>" name="ovrphngoal" id="ovrphngoal">
              
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
              <input type="hidden" name="MM_insert" value="ovrphngoal" />
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


mysqli_free_result($salespersoninventory);

?>

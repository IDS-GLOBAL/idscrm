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
              
              <li class="li6"><a href="myprofile.php">My Profile</a></li>
              
              <li class="li7"><a href="#" onclick="MyWindow=window.open('http://www.idscrm.com/sales/calculator.php','MyWindow','toolbar=no,location=no,directories=no,status=no, menubar=no,scrollbars=yes'); return false;" id="tooltip">Calculator</a></li>
            
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
              <input id="cust_phoneno" name="cust_phoneno" class="text" />
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
              <input id="cust_email" name="cust_email" class="text" />
              <div class="clr"></div>
            </li>
            
            <li>
              <label for="cust_lead_sp_comment">Notes & Comments:</label>
              <textarea id="cust_lead_sp_comment" name="cust_lead_sp_comment" rows="6" cols="50"></textarea>
            </li>
            <li>
              <input name="cust_salesperson_id" type="hidden" id="cust_salesperson_id" value="<?php echo $sid; ?>">
              <input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $did; ?>">
              <input name="cust_lead_token" type="hidden" id="cust_lead_token" value="&lt;php echo $tkey; ?&gt;">
              <div class="clr"></div>
            </li>
            <li>
              <a href="script-sales-template.php" class="bg_grey">Save Customer</a>
              <!-- <input type="image" name="imageField" id="imageField" src="images/button_send.gif" class="send" /> Post Action -->
              <div class="clr"></div>
            </li></ol>
            <input type="hidden" name="MM_insert" value="form_quickcontact">
        </form>
            
          </div>
          
          
        </div>
      </div>

    </div>
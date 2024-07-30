   <div class="content">

    <!-- GREAT BLOCK -->
    <div class="block_gr vertsortable">

      <!-- gadget paragraph -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Your Customer Lead <span>John Doe , Phone Number, Email Address, Appt. Date</span></h3>
          <div class="gadget_content">
              <p>
           	  Complete Your Customer Profile And Assign Them To A Vehicle Below.</p>
              <p>Be sure you save this page from beliving.</p>
              Note: You can send this customer a email with link, directions, mobile friendly view, and also allow them to select inventory you should be able to send.
              <form name="form1" method="post" action="">
                <p>
                  <label>Customer Nick Name:
                    <input name="cust_nickname" type="text" id="cust_nickname" value="<?php echo $clnickname; ?>" />
                  </label>
                </p>
                <p>
                  <label>Customer First Name:
                    <input type="text" name="cust_fname" id="cust_fname" />
                  </label>
                </p>
                <p>
                  <label>Customer Mid. Name
                    <input type="text" name="cust_mname" id="cust_mname" />
                  </label>
                </p>
                <p>
                  <label>Customer Last Name:
                    <input type="text" name="cust_lname" id="cust_lname" />
                  </label>
                </p>
                <p>
                  <label>Customer Lead Token Id:
                    <input name="cust_lead_token" type="text" id="cust_lead_token" value="<?php echo cltoken; ?>" />
                  </label>
                </p>
                <p>Send A Work Up To This Customer By Email, <br />
					Follow Up Within So Many Hours, <br />
					Track This Customer For 72 Hours... <br />
                </p>
                <table width="500">
                  <tr>
                    <td><label>
                      <input type="checkbox" name="HuntThisCustomerInside" value="1" id="HuntThisCustomerInside_0" />
                      Send A Work Up To This Customer</label></td>
                 
                    <td><label>
                      <input type="checkbox" name="Hunt This Customer Inside" value="2" id="HuntThisCustomerInside_1" />
                      Track This Customer For 72 Hours</label></td>
                  </tr>
                </table>
                <br />
                <hr />
                <br />
                <p>
					<label>Schedule A Test Date! For This Customer:</label>
                    <input type="text" name="cust_date_td" id="cust_date_td" />
                &nbsp;</p>
                <p>
                  <label>Cust Lead Id:
                    <input name="cust_leadid" type="text" id="cust_leadid" value="<?php echo $clid; ?>" />
                  </label>
                  <label>Dealer Id Belongs To:
                    <input name="cust_dealer_id" type="text" id="cust_dealer_id" value="<?php echo $did; ?>" />
                  </label>
                  <label>Sales Person ID:
                    <input name="cust_salesperson_id" type="text" id="cust_salesperson_id" value="<?php echo $sid; ?>" />
                  </label>
                  <label>Vehicle ID:
                    <input name="cust_vehicle_id" type="text" id="cust_vehicle_id" value="<?php echo $vid; ?>" />
                  </label>
                </p>
              </form>
              <p>&nbsp;
           	  </p>
              <p>&nbsp;</p>
            <p><a href="#">Learn more &raquo;</a></p>
          </div>
        </div>
      </div>
      
      <!-- gadget usertable -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Available Inventory<span>Choose A Vehicle Below To Send To A Customer</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>Type</th>
                <th>Stock No.</th>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Color</th>
                <th align="center">Required Down &raquo;</th>
                <th>Asking Price &raquo;</th>
                <th>Special Price &raquo;</th>
                <th>Status</th>
              </tr>
                <?php do { ?>
                                <tr>
                                  <td><input name="utc3" id="utc3" type="checkbox" /></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vcondition']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vstockno']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vyear']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['make']; ?></td>
                                  <td><?php echo $row_salespersoninventory['model']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['color_name']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vdprice']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vrprice']; ?></td>
                                  <td align="center"><?php echo $row_salespersoninventory['vspecialprice']; ?><br /></td>
                                  <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
                                </tr>
               <?php } while ($row_salespersoninventory = mysqli_fetch_assoc($salespersoninventory)); ?>
            </table>
            </form>
          </div>
        </div>
      </div>

      
      
      <!-- gadget right 2 -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Add Inventory<span>What you add will be avialable for your store.</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_example" class="form_example">
            <ol>
              <li>
                <label for="name"><strong>Name</strong> (Small input form example)</label>
                <input id="name" name="name" class="text medium" />
              </li>
              <li>
                <label for="address"><strong>Address</strong> (Large input form example)</label>
                <input id="address" name="address" class="text large" />
              </li>
              <li>
                <label for="descr"><strong>Description</strong> (Large input form example)</label>
                <textarea id="descr" name="descr" rows="6" cols="50"></textarea>
              </li>
              <li>
                <label for="multiply"><strong>Multiply</strong> (small input form example)</label>
                <input id="multiply" name="multiply" type="hidden" value="" />
                <input id="multiply1" name="multiply1" class="text small" />
                <input id="multiply2" name="multiply2" class="text small" />
                <input id="multiply3" name="multiply3" class="text small" />
                <div class="clr"></div>
                <label for="multiply1" class="small">example</label>                
                <label for="multiply2" class="small">example</label>                
                <label for="multiply3" class="small">example</label>                
                <div class="clr"></div>
              </li>
              <li>
                <label for="dropdown"><strong>Drop down box</strong></label>
                <select id="dropdown" name="dropdown">
                  <option selected="selected" value="Standart Results">Example 1</option>
                  <option value="Example 2">Example 2</option>
                  <option value="Example 3">Example 3</option>
                  <option value="Example 4">Example 4</option>
                  <option value="Example 5">Example 5</option>
                  <option value="Example 6">Example 6</option>
                </select>
              </li>
              <li>
                <label for="date"><strong>Date</strong></label>
                <input id="date" name="date" type="hidden" value="" />
                <input id="dateyear" name="dateyear" maxlength="4" class="text year" /> /
                <input id="datemonth" name="datemonth" maxlength="2" class="text date" /> /
                <input id="dateday" name="dateday" maxlength="2" class="text date" />
                <div class="clr"></div>
                <label for="dateyear" class="year">YYYY</label>                
                <label for="datemonth" class="date">MM</label>                
                <label for="dateday" class="date">DD</label>                
                <div class="clr"></div>
              </li>
              <li>
                <label for="check"><strong>Checkbox</strong></label>
                <input name="check" type="checkbox" class="checkbox" />Lorem Ipsum is simply dummy text of the printing and typesetting industry.</input>
              </li>
            </ol>
            </form>
            <p><a href="#">Learn more &raquo;</a></p>
          </div>
        </div>
      </div>


    </div><!-- End Main Boady View -->

    <!-- SMALLER BLOCK -->
    <?php include('parts/left-tower.php') ?>

    <div class="clr"></div>

  </div>

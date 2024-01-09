<div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
      <div class="leftblock vertsortable">
      
      <?php include('modules/top-left-module.php'); ?>
      
      </div>
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Create Your Invoices Here</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>This Here Is Your Latest Invoices Including Previous Balances, Credits For This Dealer | Start A New Invoice For A Dealer (account).</p>
              <p><a href="create-invoice.php">Create Invoice &raquo;</a></p>
            </div>
          </div>
        </div>
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Form Example 2</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
            
              <form action="" method="post" enctype="application/x-www-form-urlencoded" class="form_example" id="create_invoice">
              <ol>
                <li>
                  <label for="deaelrID"><strong>Select A Dealer To Invoice:</strong></label>
                  <select id="deaelrID" name="deaelrID">
                    <option value="">Select A Dealer</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_selectDealer['id']?>"><?php echo '<b>'.$row_selectDealer['company'].'</b>'; ?> | <?php echo 'www.'.$row_selectDealer['website']?> <?php $status = $row_selectDealer['status']; if($status ==1){echo 'Active';}else{ echo 'Inactive';} ?></option>
                    <?php
} while ($row_selectDealer = mysqli_fetch_array($selectDealer));
  $rows = mysqli_num_rows($selectDealer);
  if($rows > 0) {
      mysqli_data_seek($selectDealer, 0);
	  $row_selectDealer = mysqli_fetch_array($selectDealer);
  }
?>
                  </select>
                </li>

                <li>
                  <label for="name"><strong>Name</strong> (Small input form example)</label>
                  <input id="name" name="name" class="text medium" />
                </li>
                <li>
                  <label for="Item Charge"><strong>Item Charge</strong> (Medium input form example)</label>
                  <input id="address" name="address" class="text  medium" />
                </li>

                <li>
                  <label for="Item Charge"><strong>Item Charge</strong> (Large input form example)</label>
                  <input id="address" name="address" class="text large" />
                </li>
                <li>
                  <label for="comments"><strong>Invoice Comments</strong> (Large input form example)</label>
                  <textarea id="comments" name="comments" rows="6" cols="50"></textarea>
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
                  <label for="deaelrID"><strong>Drop down box</strong></label>
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
                  <label for="check"><strong>Check If Reoccuring:</strong></label>
                  <input name="reoccuring" type="checkbox" class="checkbox" />Check If This Invoice Is To Be Set To <strong>Reoccuring</strong>
                  </input>
                </li>
                <li>
                  <input name="submit" type="button" value="Submit" />
                  
                </li>

              </ol>
              </form>
            
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>

        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Latest Overdue Invoices</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              <tr>
                <th width="40"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Username</th>
                <th width="90">Date</th>
                <th width="120">Location</th>
                <th>E-mail</th>
                <th colspan="2">Actions</th>
              </tr>
              <tr>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mwwweefail@yahoo.com">mwwweefail@yahoo.com</a></td>
                <td width="28"><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td width="28"><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              <tr>
                <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mail@yahoo.com">mail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              <tr class="last">
                <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:m13dail@yahoo.com">m13dail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              </table>
              </form>
            </div>
          </div>
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>
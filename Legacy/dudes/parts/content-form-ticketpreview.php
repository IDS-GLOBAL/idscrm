<div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
		<?php include('parts/left-sidebar.php'); ?>      
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Dealer Ticket Preview/Respond</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <strong>Record ID:</strong> <?php echo $row_DlrTicketId['id']; ?> | <strong>Contact Name:</strong> <?php echo $row_DlrTicketId['contact_name']; ?>
              <p>
              <strong>What Happened?</strong> <u><?php echo $row_DlrTicketId['what_happened']; ?></u>
              </p>

              <p>
              What You Want To Happen? <?php echo $row_DlrTicketId['what_you_want_to_happen']; ?>
              </p>
              
              <p>
              Comments By Dealer: <?php echo $row_DlrTicketId['comments_bydlr']; ?>
              </p>

              
			
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Dealer Ticket Preview/Respond 2</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="<?php echo $editFormAction; ?>" method="post" enctype="application/x-www-form-urlencoded" class="form_example" id="form-ticketpreview">
              <input type="hidden" name="id" value="<?php echo $row_DlrTicketId['id']; ?>" />
              <input type="hidden" name="dudesId" value="<?php echo $dudesid; ?>" />
              
              <ol>
                <li>
                  <label for="dudesName"><strong>Your Name</strong> (Dealer Will See Your Name)</label>
                  <input name="dudesName" class="text medium" id="dudesName" value="<?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?>" />
                </li>
                <li>
                  <label for="dudesResponse"><strong>Dudes Response</strong> (Large input form example)</label>
                  <textarea name="dudesResponse" cols="50" rows="10"  id="dudesResponse"><?php echo $row_DlrTicketId['dudesResponse']; ?></textarea>
                </li>
                <li>
                  <label for="status_dudes"><strong>status_dudes</strong></label>
                  <select id="status_dudes" name="status_dudes">
                    <option value="Pending">Pending</option>
                    <option value="Resolved">Resolved</option>
                    <option value="Need More Information">Need More Information</option>
                  </select>
                </li>
                
                <li>
                  <label for="check"><strong>Approval Checkbox</strong></label>
                  <input name="check" type="checkbox" class="checkbox" />Check To Update Your ID: <strong><?php echo $dudesid; ?></strong></input>
                </li>
              </ol>
              <input name="submit" type="submit" value="Submit">
              <input name="dudes_last_modfied" type="hidden" id="dudes_last_modfied"  />
              <input type="hidden" name="MM_update" value="form-ticketpreview" />
  </form>
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>

        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Administration Options</h3>
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

<?php do { ?>
  
  
  

              <tr>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                <td><?php echo $row_dealer_tckthstry['dudesName']; ?></td>
                <td><?php echo $row_dealer_tckthstry['status_dudes']; ?></td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><?php echo $row_dealer_tckthstry['dudesResponse']; ?></td>
                <td width="28"><a href="tickets-bydealers-preview.php?<?php echo $row_dealer_tckthstry['id']; ?>"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td width="28"><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
    <?php } while ($row_dealer_tckthstry = mysqli_fetch_array($dealer_tckthstry)); ?>
              </table>
              </form>
            </div>
          </div>
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>
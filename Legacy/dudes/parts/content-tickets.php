<div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      <?php include('left-sidebar.php'); ?>

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Tickets</h3>
          </div>
          <div class="gadget_content" style="display: none;">
            <div class="subblock">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>
        
        <!-- gadget message 1 -->
        <div class="gadget">
          <!-- error -->
          <div class="gadget_title gradient37">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Important warning</h3>
          </div>
          <div class="gadget_content error_msg em_orange" style="display: none;">
            <p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#"><strong>Lorem Ipsum has been the industry</strong></a> standard dummy text ever since the 1500s</p>
          </div>
        </div>

        <!-- gadget message 2 -->
        <div class="gadget">
          <!-- error -->
          <div class="gadget_title gradient37">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Critical Important message</h3>
          </div>
          <div class="gadget_content error_msg em_red" style="display: none;">
            <p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#"><strong>Lorem Ipsum has been the industry</strong></a> standard dummy text ever since the 1500s</p>
          </div>
        </div>

        <!-- gadget message 3 -->
        <div class="gadget">
          <!-- error -->
          <div class="gadget_title gradient37">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Important message</h3>
          </div>
          <div class="gadget_content error_msg em_blue" style="display: none;">
            <p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#"><strong>Lorem Ipsum has been the industry</strong></a> standard dummy text ever since the 1500s</p>
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
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="gwlines">
              <tr>
                <th><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>ID</th>
                <th>Created Time</th>
                <th>Dealer Name</th>
                <th>Status</th>
                <th>Location</th>
                <th>E-mail</th>
                <th colspan="2">Actions</th>
              </tr>
             	 <?php do { ?>


              		
                    <tr>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                <td><?php echo $row_DlrTickets['id']; ?></td>
                <td><?php echo $row_DlrTickets['created_at']; ?></td>
                <td><?php echo $row_DlrTickets['contact_name']; ?></td>
                <td><?php echo $row_DlrTickets['status_dudes']; ?></td>
                <td><?php echo $row_DlrTickets['contact_phone']; ?></td>
                <td><a href="#"><?php echo $row_DlrTickets['contact_email']; ?></a></td>
                <td><a href="tickets-bydealers-preview.php?ticketid=<?php echo $row_DlrTickets['id']; ?>"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
				
			<?php } while ($row_DlrTickets = mysqli_fetch_array($DlrTickets)); ?>
              <tr class="last">
                <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                <td>End</td>
                <td>End</td>
                <td>End</td>
                <td>End</td>
                <td>End</td>
                <td><a href="#">End</a></td>
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
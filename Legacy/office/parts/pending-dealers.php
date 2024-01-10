<div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      <?php include('parts/navigation/left-navigation.php'); ?>

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Pending Dealers</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_tabexample" class="form_example">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines arborder">
                  <tr>
                    <th><input name="utc1" id="utc1" type="checkbox" /></th>
                    <th>Name</th>
                    <th>Point Of Contact</th>
                    <th>Contact Phone</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>E-mail</th>
                    <th colspan="2">Actions</th>
                  </tr>
                  
<?php if ($totalRows_dealers_pend > 0) { // Show if recordset not empty ?>


				<?php do { ?>
                  <tr>
                    <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                    <td><?php echo $row_dealers_pend['company']; ?></td>
                    <td><?php echo $row_dealers_pend['contact']; ?></td>
                    <td><?php echo $row_dealers_pend['contact_phone']; ?> <?php echo $row_dealers_pend['contact_phone_type']; ?></td>
                    <td><?php echo $row_dealers_pend['created_at']; ?></td>
                    <td><?php echo $row_dealers_pend['city']; ?>, <?php echo $row_dealers_pend['state']; ?></td>
                    <td><a href="mailto:<?php echo $row_dealers_pend['email']; ?>"><?php echo $row_dealers_pend['email']; ?></a></td>
                    <td><a href="dealer-add-pending.php?id=<?php echo $row_dealers_pend['id']; ?>">
                    	<img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" />
                    	</a>
                    </td>
                    <td><a href="?delete_id=<?php echo $row_dealers_pend['id']; ?>"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  </tr>
                <?php } while ($row_dealers_pend = mysqli_fetch_array($dealers_pend)); ?>

<?php } // Show if recordset not empty ?>
                      


                      
<?php if ($totalRows_dealers_pend == 0) { // Show if recordset empty ?>
                <tr class="last">
                  <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td><a href="#">N/A</a></td>
                  <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                </tr>
<?php } // Show if recordset empty ?>
                
                </table>
                <p>
                <select id="dropdown" name="dropdown" class="cntresults">
                  <option selected="selected" value="10">10 results</option>
                  <option value="20">20 results</option>
                  <option value="30">30 results</option>
                  <option value="50">50 results</option>
                  <option value="100">100 results</option>
                </select>
                <a href="#" class="pnbtn">&laquo;</a> <input id="page" name="page" class="text mini ie_mini" value="1 / 5" /> <a href="#" class="pnbtn">&raquo;</a></p>
                <div class="clr"></div>
              </form>
              <p> </p>
            </div>
          </div>
        </div>

        
      </div>

      <div class="clr"></div>
    </div>
  </div>
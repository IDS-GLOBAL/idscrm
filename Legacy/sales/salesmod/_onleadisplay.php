<?php do { ?>
                <tr>
                  <td><input name="utc2" id="utc2" type="checkbox" /></td>
                  <td title="<?php echo $row_spleads['cust_nickname']; ?>"><?php echo $row_spleads['cust_fname']; ?>&nbsp;<?php echo $row_spleads['cust_lname']; ?></td>
                  <td title="<?php echo $row_spleads['cust_phonetype']; ?>"><?php echo $row_spleads['cust_phoneno']; ?></td>
                  <td><?php echo $row_spleads['cust_lead_created_at']; ?></td>
                  <td><?php echo $row_spleads['cust_lead_temperature']; ?></td>
                  <td><?php echo $row_spleads['cust_email']; ?></a>
                  </td>
                  <td width="28"><a href="customer-lead-edit.php?lead=<?php echo $row_spleads['cust_leadid']; ?>"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
                </tr>
 <?php } while ($row_spleads = mysqli_fetch_assoc($spleads)); ?>
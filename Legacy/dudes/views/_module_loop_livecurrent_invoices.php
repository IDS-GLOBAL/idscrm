                                                        
  <h3>Latest Invoices</h3>
  
  <div class="row">
      
      
      
      
      <h2>Looping Invoices </h2>
      <table id="activelive_InvoiceTable" class="table table-bordered">
      <thead>
          <tr class="em_orange">
              <th scope="col">No.</th>
              <th scope="col">ID</th>
              <th scope="col">Amount Due</th>
              <th scope="col">Dealer Name</th>
              <th scope="col">Status</th>
              <th scope="col">Run Date</th>
              <th scope="col">Next Due Date</th>
              <th scope="col">Days To Pay</th>
              <th scope="col">Stop Date</th>
              <th scope="col">Edit</th>
          </tr>
      </thead>
      <tbody>
                              <?php do{ ?>
                                  <tr>
                                      <td class="liveinvc_dealerid" id="<?php echo $row_inVoices['invoice_dealerid']; ?>">
                                          <span class="liveinvcid btn btn-warning btn-circle" id="<?php echo $row_inVoices['invoice_id']; ?>">
                                          <?php echo $row_inVoices['invoice_number']; ?>
                                          </span>
                                      </td>
                                      <td class="liveinvc_number" id="<?php echo $row_inVoices['invoice_number']; ?>">
                                          <span class="liveinvcdid btn btn-warning btn-circle" id="<?php echo $row_inVoices['invoice_dealerid']; ?>">
                                          <?php echo $row_inVoices['invoice_id']; ?>
                                          </span>
                                      </td>
                                      <td class="liveinvc_token" id="<?php echo $row_inVoices['invoice_tokenid']; ?>">
                                          <?php echo $row_inVoices['invoice_amount_due']; ?>
                                      </td>
                                      <td class="liveinvc_name_display" title="<?php echo $row_inVoices['contact']; ?> or <?php echo $row_inVoices['dmcontact2']; ?>">
                                          <a href="dealer.php?sysdealertoken=<?php echo $row_inVoices['token']; ?>&sysdealerid=<?php echo $row_inVoices['invoice_dealerid']; ?>" target="_blank">
                                          <?php echo $row_inVoices['invoice_dealerid']; ?> - <?php echo $row_inVoices['company']; ?><br />
                                          <span class="dm_contact_contact_names">Contact 1: <?php echo $row_inVoices['contact']; ?>  <?php if($row_inVoices['dmcontact2']){ echo 'or Contact 2: '.$row_inVoices['dmcontact2']; } ?></span>
                                          </a>
                                      </td>
                                      <td class="liveinvc_dealer_token" id="<?php echo $row_inVoices['token']; ?>">
                                          
                                          <button class="btn btn-outline btn-warning  dim" type="button">
                                          <?php echo $row_inVoices['invoice_status']; ?>
                                          </button>
                                      </td>
                                      <td>
                                            <?php echo $row_inVoices['invoice_date']; ?>
                                      </td>
                                      <td>
                                          <a href="<?php echo $row_inVoices['invoice_id']; ?>"><?php echo $row_inVoices['invoice_duedate']; ?></a>
                                      </td>
                                      <td class="liveinvc_duedate" id="<?php echo $row_inVoices['invoice_duedate']; ?>" title="Creating Every <?php echo $row_inVoices['invoice_duedate']; ?> 
                                          <?php echo $row_inVoices['invoice_duedate']; ?> "><?php echo $row_inVoices['invoice_duedate']; ?> 
                                      </td>
                                      <td>
                                          <?php if(!$row_inVoices['invoice_duedate']){echo 'None';}else{ echo $row_inVoices['invoice_duedate'];} ?>
                                      </td>
                                      <td>
                                          <a id="edit_this_Live_looping_invoice" rel="<?php echo $row_inVoices['invoice_id']; ?>" href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa"></a>
                                      </td>
                                  </tr>
                            
                                    <?php } while ($row_inVoices = mysqli_fetch_array($inVoices)); ?>
      </tbody>                                                 
      
      
      
      <tfoot>
              <th scope="col">No.</th>
              <th scope="col">ID</th>
              <th scope="col">Amount Due</th>
              <th scope="col">Dealer Name</th>
              <th scope="col">Status</th>
              <th scope="col">Run Date</th>
              <th scope="col">Next Due Date</th>
              <th scope="col">Days To Pay</th>
              <th scope="col">Stop Date</th>
              <th scope="col">Edit</th>
      </tfoot>
    </table>
      
      
      
      
      
      
      
      
  </div>
  
  <div class="hr-line-dashed"></div>
<div id="Reoccuring_do" class="row">
                                                                    <div class="col-sm-12">


                                                                        <table id="reoccuring_dealer_billing_table" class="table table-bordered">
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
                                                                        <?php if ($totalRows_query_recurringInvoices > 0) { // Show if recordset not empty ?>
                                                                        <tbody>
                                                                            <?php do { ?>
                                                                                <tr>
                                                                                    <td id="<?php echo $row_recurringInvoices['invoice_dealerid']; ?>">
                                                                                        <span class="recurinvcid btn btn-info btn-rounded" id="<?php echo $row_recurringInvoices['invoice_id']; ?>">
                                                                                        <?php echo $row_recurringInvoices['invoice_number']; ?>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="recurinvcdid btn btn-info btn-rounded" id="<?php echo $row_recurringInvoices['invoice_dealerid']; ?>">
                                                                                        <?php echo $row_recurringInvoices['invoice_id']; ?>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td class="recurinvctoken" id="<?php echo $row_recurringInvoices['invoice_tokenid']; ?>">
                                                                                        <?php echo $row_recurringInvoices['invoice_amount_due']; ?>
                                                                                    </td>
                                                                                    <td class="recurinvcdid_name" title="<?php echo $row_recurringInvoices['contact']; ?> or <?php echo $row_recurringInvoices['dmcontact2']; ?>">
                                                                                        <a href="dealer.php?sysdealertoken=<?php echo $row_recurringInvoices['token']; ?>&sysdealerid=<?php echo $row_recurringInvoices['invoice_dealerid']; ?>" target="_blank">
                                                                                        <?php echo $row_recurringInvoices['invoice_dealerid']; ?> - <?php echo $row_recurringInvoices['company']; ?>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td class="recurinvcdidtoken" id="<?php echo $row_recurringInvoices['token']; ?>">
                                                                                        <a href="<?php echo $row_recurringInvoices['invoice_id']; ?>"><?php echo $row_recurringInvoices['invoice_status']; ?></a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="<?php echo $row_recurringInvoices['invoice_id']; ?>"><?php echo $row_recurringInvoices['invoice_date']; ?></a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="<?php echo $row_recurringInvoices['invoice_id']; ?>"><?php echo $row_recurringInvoices['invoice_duedate']; ?></a>
                                                                                    </td>
                                                                                    <td title="Creating Every <?php echo $row_recurringInvoices['invc_cret_evry']; ?> 
                                                                                        <?php echo $row_recurringInvoices['invc_cret_evrywhn']; ?> "><?php echo $row_recurringInvoices['daysto_payinvoice']; ?> 
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php if(!$row_recurringInvoices['invoice_recurring_stopdate']){echo 'None';}else{ echo $row_recurringInvoices['invoice_recurring_stopdate'];} ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a id="edit_this_reocurring_invoice" rel="<?php echo $row_recurringInvoices['invoice_id']; ?>" href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa"></a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } while ($row_recurringInvoices = mysqli_fetch_array($query_recurringInvoices)); ?>
                                                                        </tbody>
                                                                        <?php } // Show if recordset not empty ?>
                                                                                                                        
                                                                                                            
                                                                        <?php if ($totalRows_query_recurringInvoices == 0) { // Show if recordset empty ?>
                                                                            <tbody>
                                                                                <tr>
                                                                                <td>-</td>
                                                                                <td>No Fees Available</td>
                                                                                <td>-</td>
                                                                                <td>No Fees Available</td>
                                                                                <td>No Fees Available</td>
                                                                                <td>?</td>
                                                                                <td>No Fees Available</td>
                                                                                <td>No Fees Available</td>
                                                                                <td>&nbsp;</td>
                                                                                <td>&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        <?php } // Show if recordset empty ?>
                                                                        </table>                                        
                                                                    </div>
                                                                </div>

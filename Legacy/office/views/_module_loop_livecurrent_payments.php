<div class="row">
        
        
        
        
        <h2>Payments</h2>
        <table id="mydataInvoiceTable" class="table table-bordered" border="0">
        <thead>
            <tr class="em_orange">
                <th scope="col">ID:</th>
                <th scope="col">No.</th>
                <th scope="col">Created</th>
            </tr>
            </thead>
            <tbody>
        <?php do{ ?>
            <tr>
                <td title="<?php echo $row_inVoicespymts['invoice_tokenid']; ?>"><?php echo $row_inVoicespymts['invoice_id'];  ?></td>
                <td><?php echo $row_inVoicespymts['invoice_number'];  ?></td>
                <td><?php echo $row_inVoicespymts['invoice_created_at'];  ?></td>
            </tr>
        <?php } while ($row_inVoicespymts = mysqli_fetch_array($inVoicespymts)); ?>
            </tbody>
            <tfoot>
            <th>ID:</th>
                <th>No.</th>
                <th>Created</th>
            </tfoot>
        </table>
    
</div>
    
        
        
        
  
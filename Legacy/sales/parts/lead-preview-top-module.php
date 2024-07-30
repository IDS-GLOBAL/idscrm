      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Lead Preview Module Options <span>View & Update Information On This Lead Below...</span></h3>
          <div class="gadget_content">
          <p>
          	Status: 
			<?php 
			$status = $row_spleads['cust_lead_type'];
			
			 if(!$status){ 'Sorry No Status';}else{echo $status;} 
			
			?>
          </p>
            <h3>Online Lead Preview</h3>
            
            <p>
              	<a href="#">Facebook &raquo;</a> | 
            	<a href="#">Twitter &raquo;</a> | 
                <a href="#">Google +  &raquo;</a>
            </p>
          </div>
        </div>
      </div>

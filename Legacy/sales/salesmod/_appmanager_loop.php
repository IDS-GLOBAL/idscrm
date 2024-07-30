			  <?php do { ?>
			    <tr>
			      <th width="40" class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
			      <th width="100">
					<a href="sales-creditapplication-update.php?credit_app_id=<?php echo $row_credit_apps['credit_app_fullblown_id']; ?>">
						<?php
								$fullname = $row_credit_apps['applicant_name'];
								$fname = $row_credit_apps['applicant_fname'];
								
								if(!$fullname){
								 echo $row_credit_apps['applicant_fname'].' ';
								 echo $row_credit_apps['applicant_lname'];  
								}else{
								echo $fullname;	
								}
						?>
				  </a> </th>
			      <th width="90"><?php echo $row_credit_apps['credit_app_last_modified']; ?></th>
			      <th width="90"><?php echo $row_credit_apps['application_created_date']; ?></th>
			      <th width="120">Pending Approval</th>
			      <th width="50">
                  	
                    <?php 
					
					$apptype = $row_credit_apps['credit_app_type'];
					
					$appid = $row_credit_apps['credit_app_fullblown_id'];
					
					if($apptype =='3'){
                    	echo "<a href='sales-creditapplication-update.php?credit_app_id=$appid'>Actions</a>";
						}
					elseif($apptype =='4'){
                                    echo "<a href='sales-creditapplication-sub-prime-update.php?credit_app_id=$appid'>Actions</a>";
									}
									else { echo 'No Action'; }
                    ?>
					</th>
		        </tr>
			    <?php } while ($row_credit_apps = mysqli_fetch_assoc($credit_apps)); ?>

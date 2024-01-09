            
            
                <div class="wrapper wrapper-content project-manager">
                    <h4>Send Them A Message</h4>
                    
                    <img src="img/zender_logo.png" class="img-responsive">
                    
                    
                    <p class="small">
                    You Can Send This Sales Person A Message
                    </p>
                    
                    <p class="small font-bold">
                        <span><i class="fa fa-circle text-warning"></i> High priority</span>
                    </p>
                    
                    <h5>Project tag</h5>
                    
                    <ul class="tag-list" style="padding: 0">
                        <li><a href=""><i class="fa fa-tag"></i> Zender</a></li>
                        <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                        <li><a href=""><i class="fa fa-tag"></i> Passages</a></li>
                        <li><a href=""><i class="fa fa-tag"></i> Variations</a></li>
                    </ul>
                    
                    <h5>Project files</h5>
                    
                    <ul class="list-unstyled project-files">
                        <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                        <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                        <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                        <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                    </ul>
                    
                    <div class="text-center m-t-md">
                    
                        <a href="#" class="btn btn-xs btn-primary" style="padding:3px;">+ Create Album</a>
                        
                        <a id="external_upload_salesperson_photos" class="btn btn-xs btn-primary" style="padding:3px;">Add Photos</a>
                        <br />
                        <br />
                        <a href="#" class="btn btn-xs btn-primary" style="padding:3px;">Add Video</a>
                        
                        <br />
						<br />

                        <a id="clear_outphotos" class="btn btn-xs btn-primary">Clear Photos</a>

                    </div>
                </div>
            
            
            


                                <div>
<hr />

                                    <div class="users-list">

		<?php 
		//echo '$totalRows: '.$totalRows_sales_person_team;
		if($totalRows_sales_person_team != 0):
		
		$sales_person_team = mysqli_query($idsconnection_mysqli, $query_sales_person_team);
		$row_sales_person_team = mysqli_fetch_assoc($sales_person_team);

		
		//mysqli_data_seek($sales_person_team, 0); 
		?>
        <?php do { ?>

                                        <div class="chat-user">
                                            <span class="pull-right label label-primary">Active</span>
				<?php if(!$row_sales_person_team['profile_image']): ?>                                            
                                            
                            <img class="chat-avatar" src="img/logo.png" alt="" >

				<?php else: ?>

							<img class="chat-avatar" src="<?php echo $row_sales_person_team['profile_image']; ?>" alt="" >
				<?php endif; ?>                                            
                                            
                                            <div class="chat-user-name">
                                                <a href="salesperson.php?sid=<?php echo $row_sales_person_team['salesperson_id']; ?>"><?php echo $row_sales_person_team['salesperson_firstname']; ?> <?php echo $row_sales_person_team['salesperson_lastname']; ?></a>
                                            </div>
                                        </div>
          <?php } while ($row_sales_person_team = mysqli_fetch_assoc($sales_person_team)); ?>                               

<?php endif; ?>
                                    

                                    </div>
<hr />
                                </div>

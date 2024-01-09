         <!-- Slide button -->
  		<div class="quick-button">
            <!-- Button textwith icon -->
            <span class="quick-button-arrow"><i class="fa fa-chevron-down"></i></span> 
         </div>
         
         <!-- Content -->
         <div class="quick-content" style="display: none;">
         
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
  


<?php if($row_find_craftydealer['isonline'] == 'Y'): ?>                 
                  <div class="row">
                  	<div class="col-md-12">
                     <!-- Block 1 -->
                     <div class="quick-chart">
                     
                        <!-- Chart -->

<iframe name="chatFrame" src="https://idscrm.com/livechat/admin_connect.php?rand=<?php echo date("YmdHis"); ?>" frameborder="0" style="overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>
                        
                        
                     </div>
                    </div>
                  </div>
                  <div class="row">
                  	<div class="col-md-12">
                     <!-- Block 1 -->
                     <div class="chat_typebox">
                     
                        <!-- Chart -->

<iframe name="chat_bot" src="https://idscrm.com/livechat/admin_chat_bot.php" frameborder="0" style="overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>
                        
                        
                     </div>
                    
                    </div>
                  </div>

<?php else: ?>


                     <!-- Block 1 -->
                     <div class="quick-chart">
                     
                     <h2>No Chat Display</h2>
                     
                     <a href="https://idscrm.com/livechat" target="_blank">Login To Use Live Chat</a>

                        
                        
                        
                     </div>

<?php endif; ?>                  






                  
                  
                  </div>
                  
                  
                  <div class="col-md-6">
                  
                     <ul class="nav nav-tabs" id="quick-tab">
                       <li class="active"><a href="#q-visitors"><i class="fa fa-users"></i></a></li>
                       <li><a href="#q-settings"><i class="fa fa-desktop"></i></a></li>
                       <li><a href="#q-server"><i class="fa fa-home"></i></a></li>
                       <li><a href="#q-post"><i class="fa fa-cloud"></i></a></li>
                       <li><a href="#q-tasks"><i class="fa fa-gift"></i></a></li>
                     </ul>

                     <div class="tab-content">

					   <div class="tab-pane fade active in" id="q-visitors">
                           <h4>Chat Visitors</h4>
<?php if($row_find_craftydealer['isonline'] == 'Y'): ?>                 
                           
<iframe name="chat_users" src="http://idscrm.com/livechat/admin_users_refresh.php" frameborder="0" style="overflow:hidden;min-height:462px;width:100%" height="100%" width="100%"></iframe>
<?php endif; ?>                           
                           
                           
                       </div>                     
                       <div class="tab-pane fade" id="q-settings">
                       
                           <!-- Heading -->
                           <h4>Quick Chat Settings</h4>
						   

                           <!-- Tab item starts -->
                           <div class="tab-item">
                           
                              Turn Chat On or Off
                              
                              <!-- Switch Chat -->
                              <div class="btn-group pull-right" data-toggle="buttons">
 									<input <?php if (!(strcmp($row_dealer_chats['dealer_chat'],1))) {echo "checked=\"checked\"";} ?> name="dealer_chat" type="checkbox" class="js-chatswitch" id="dealer_chat" value="1" />
                               </div>
                               
                             <div class="clearfix"></div>
                           </div>
                           <!-- Tab item ends -->
                           
                           <!-- Tab item starts -->
                           <div class="tab-item">
                           
                              Effect Your Chat Status
                              
                              <!-- Radio button -->
                              <div class="btn-group pull-right" data-toggle="buttons">
 									<input <?php if (!(strcmp($row_dealer_chats['dealer_chat_display'],1))) {echo "checked=\"checked\"";} ?> name="dealer_chat_status" type="checkbox" class="js-chatstatus" id="dealer_chat_status" value="1" />
                               </div>

                             <div class="clearfix"></div>
                           </div>
                           <!-- Tab item ends -->
                           
                           
                           <!-- Tab item starts -->
                           <div class="tab-item">
                           
                              <strong>Currency Settings - </strong>Set the currency
                              
                              <div class="quick-buttons pull-right">
                                Space                              
                              </div>
                              
                           </div>
                           <!-- Tab item ends -->   

                           <!-- Tab item starts -->
                           <div class="tab-item">
                              <div class="row">
                                 <div class="col-md-6">
                                 	<h2>Chat Visitors</h2>

                                    <div class="clearfix"></div>
                                 </div>
                                 <div class="col-md-6">
                                 	<h2>Chat Sounds</h2>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                           </div>
                           <!-- Tab item ends -->
                           
                           <hr>
                           
                           <div class="tab-buttons pull-right">
                              <a href="#" class="btn btn-info btn-sm">Save Changes</a> <a href="#" class="btn btn-default btn-sm">Reset</a> 
                           </div>
                           <div class="clearfix"></div>
                           
                       </div>
                                              
                       <div class="tab-pane fade" id="q-server">
                           <h4>Server Status</h4>
                           <div class="quick-server-status">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <!-- Server status starts -->
                                          <table class="table">
                                          
                                            <tbody>
                                            <tr>
                                              <td>Your Domain</td>
                                              <td><?php echo $row_userDets['website']; ?></td>
                                            </tr>  

                                            <tr>
                                              <td>User Name: </td>
                                              <td><?php echo $row_find_craftydealer['username']; ?></td>
                                            </tr>  

                                            <tr>
                                              <td>Chat Login: </td>
                                              <td><a href="https://idscrm.com/livechat" target="_blank">IDS LIVE CHAT</a></td>
                                            </tr>  
                                            
                                            <tr>
                                              <td>IP Address</td>
                                              <td><span class="label label-danger"><?php echo $row_find_craftydealer['ipaddress']; ?></span></td>
                                            </tr>
                                            <tr>
                                              <td>First Department</td>
                                              <td><?php echo $row_find_craftydealer['firstdepartment']; ?></td>
                                            </tr>  

                                           <tr>
                                              <td>Your Online Status</td>
                                              <td><span class="label label-success"><?php echo $row_find_craftydealer['isonline']; ?></span></td>
                                            </tr>                                            


                                           <tr>
                                              <td>Your Greeting</td>
                                              <td><span class="label label-success"><?php echo $row_find_craftydealer['greeting']; ?></span></td>
                                            </tr>                                            
                                            
                                          </tbody></table>
                                       <!-- Server status ends -->
                                    </div>
                                    <div class="col-md-6">
                                       <!-- Server status starts -->
                                       <table class="table">
                                       
                                            <tbody><tr>
                                              <td colspan="2">
                                                Disk Space <span class="pull-right"><small>400GB / 1000 TB</small></span>
                                                <div class="clearfix"></div>
                                                <!-- Progress bar -->
                                                <div class="progress progress-striped">
                                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                  </div>
                                                </div>
                                              </td>
                                            </tr> 
                                            
                                            <tr>
                                              <td colspan="2">
                                                Bandwidth <span class="pull-right"><small>10000GB / 10000TB</small></span>
                                                <div class="clearfix"></div>
                                                <!-- Progress bar -->
                                                <div class="progress progress-striped">
                                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                  </div>
                                                </div>
                                              </td>
                                            </tr> 
                                            
                                            <tr>
                                              <td colspan="2">
                                                MySQL DB <span class="pull-right"><small>5 / 20</small></span>
                                                <div class="clearfix"></div>
                                                <!-- Progress bar -->
                                                <div class="progress progress-striped">
                                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                  </div>
                                                </div>
                                              </td>
                                            </tr> 
                                            
                                            <tr>
                                              <td colspan="2">
                                                Supported Applications 
                                                <!-- Button toolbar starts -->
                                                <div class="btn-toolbar">
                                                   <div class="btn-group">
                                                     <button type="button" class="btn btn-default btn-xs">CMS</button>
                                                     <button type="button" class="btn btn-info btn-xs">WordPress</button>
                                                   </div>
                                                   
                                                   <div class="btn-group">
                                                     <button type="button" class="btn btn-default btn-xs">Forum</button>
                                                     <button type="button" class="btn btn-info btn-xs">phpBB</button>
                                                   </div>
                                                   
                                                </div>
                                                <!-- Button toolbar ends -->
                                              </td>
                                            </tr>
                                            
                                       </tbody></table>
                                       <!-- Server status ends -->
                                    </div>
                                 </div>
                           </div>
                       </div>
                       
                       <div class="tab-pane fade" id="q-post">
                           <h4>Quick Post</h4>
                           <div class="quick-post-form">
                           
                                    <!-- Alert -->
                                     <div class="alert alert-dismissable alert-info">
                                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                       <i class="fa fa-warning-sign"></i> This is a dismissable alert. Click <strong>x</strong> mark to close.
                                     </div>
                                     
                                       <!-- Quick post form starts -->
                                          <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                             <!-- Form title -->
                                              <label class="col-md-2 control-label">Title</label>
                                              <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Enter Title">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                             <!-- Form content -->
                                              <label class="col-md-2 control-label">Content</label>
                                              <div class="col-md-10">
                                                <textarea class="form-control" rows="3" placeholder="Enter Content"></textarea>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-md-2 control-label">Category</label>
                                              <div class="col-md-10">
                                                <!-- Checkbox for category -->
                                                   <div class="btn-group" data-toggle="buttons">
                                                     <label class="btn btn-info btn-xs">
                                                       <input type="checkbox"> Design
                                                     </label>
                                                     <label class="btn btn-default btn-xs">
                                                       <input type="checkbox"> Mobile
                                                     </label>
                                                     <label class="btn btn-info btn-xs">
                                                       <input type="checkbox"> SEO
                                                     </label>
                                                     <label class="btn btn-default btn-xs">
                                                       <input type="checkbox"> Dev
                                                     </label>
                                                     <label class="btn btn-info btn-xs">
                                                       <input type="checkbox"> Content
                                                     </label>
                                                   </div>
                                              </div>
                                            </div>     
                                            <div class="form-group">
                                              <label class="col-md-2 control-label">Tags</label>
                                              <div class="col-md-10">
                                                <!-- Radio button for tags -->
                                                <div class="btn-group" data-toggle="buttons">
                                                  <label class="btn btn-xs btn-default">
                                                    <input type="radio" name="options"> code
                                                  </label>
                                                  <label class="btn btn-xs btn-default">
                                                    <input type="radio" name="options"> tuts
                                                  </label>
                                                  <label class="btn btn-xs btn-default">
                                                    <input type="radio" name="options"> soft
                                                  </label>
                                                  <label class="btn btn-xs btn-default">
                                                    <input type="radio" name="options"> fun
                                                  </label>
                                                  <label class="btn btn-xs btn-default">
                                                    <input type="radio" name="options"> dev
                                                  </label>
                                                  <label class="btn btn-xs btn-default">
                                                    <input type="radio" name="options"> des
                                                  </label>
                                                </div>
                                              </div>
                                            </div>  
                                            <hr>
                                            <div class="form-group">
                                              <div class="col-md-offset-2 col-md-10">
                                                <!-- Buttons -->
                                                <button type="submit" class="btn btn-info btn-sm">Publish</button>
                                                <button type="submit" class="btn btn-success btn-sm">Save Draft</button>
                                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                              </div>
                                            </div>
                                          </form>
                                       <!-- Quick post form ends -->
                           </div>
                       </div>
                       
                       <div class="tab-pane fade" id="q-tasks">
                           <h4>Tasks</h4>
                           
                           <!-- Quick tasks starts -->
                           <div class="quick-tasks jstasks">
                              <ul>
                                 <!-- Checkbox - Task - Flag -->
                                 <li class="task-important"> <input type="checkbox"> <span>Lorem dolor sit ipsum dolor sit amet dolor feugiat sit consectetur.</span> </li>
                                 <li class="task-normal"> <input type="checkbox"> <span>Mauris dolor sit adipiscing dui in ipsum dolor feugiat sit posuere.</span> </li>
                                 <li class="task-pending"> <input type="checkbox"> <span>Ut non dolor sit feugiat justo sit amet dolor feugiat sit consequat.</span> </li>
                                 <li class="task-normal"> <input type="checkbox"> <span>Nullam dolor sit placerat dictum augue dolor feugiat sit et commodo.</span> </li>
                                 <li class="task-normal"> <input type="checkbox"> <span>Vivamus dolor sit aliquet nisl condntum dolor feugiat sit sagittis.</span> </li>
                                 <li class="task-important"> <input type="checkbox"> <span>Duis dolor sit eu sem sit amet purus dolor feugiat sit interum euis.</span> </li>
                              </ul>
                           </div>
                           <!-- Quick tasks ends -->
                           
                       </div>
                     </div>
                  </div>   
               </div>
            </div>
         </div>

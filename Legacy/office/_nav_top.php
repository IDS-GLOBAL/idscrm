<div class="row border-bottom">

<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                
                
                
                
              
                
                
                <!--form role="search" class="navbar-form-custom" method="post" action="search.php">
                    <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control" name="querysearch" id="querysearch">
                    </div>
                </form -->
                
                
                
                
                
                
                
                
                
                
            </div>
            
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">
                    <a href="account.php" target="_parent">
                    "Hi <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?>! "
                    </a>
                    </span>
                    <input type="hidden" id="dudes_secret_token" name="dudes_secret_token" value="<?php echo $tkey; ?>" />
                    <input id="thisdudesid" type="hidden" value="<?php echo $dudesid; ?>" />
                    <input id="dudes_skillset_id" type="hidden" value="<?php echo $dudes_skillset_id; ?>" />

<input id="dudes_public_token" type="hidden" value="<?php echo $dudes_public_token; ?>" />
<input id="dudes_facebook_id" type="hidden" value="<?php echo $dudes_facebook_id; ?>" />



<input id="dudes_facebook_deny" type="hidden" value="<?php echo $dudes_facebook_deny; ?>" />
<input id="dudes_facebook_email" type="hidden" value="<?php echo $dudes_facebook_email; ?>" />
<input id="dudes_facebook_name" type="hidden" value="<?php echo $dudes_facebook_name; ?>" />
<input id="dudes_prefix_name" type="hidden" value="<?php echo $dudes_prefix_name; ?>" />
<input id="myfname" type="hidden" value="<?php echo $myfname; ?>" />
<input id="mylname" type="hidden" value="<?php echo $mylname; ?>" />
<input id="myname" type="hidden" value="<?php echo $myname; ?>" />
<input id="dudes_Timezone" type="hidden" value="<?php echo $dudes_Timezone; ?>" />
<input id="dudes_dob" type="hidden" value="<?php echo $dudes_dob; ?>" />
<input id="dudes_status" type="hidden" value="<?php echo $dudes_status; ?>" />
<input id="dudes_access_level" type="hidden" value="<?php echo $dudes_access_level; ?>" />
<input id="dudes_email_internal" type="hidden" value="<?php echo $dudes_email_internal; ?>" />
<input id="dudes_email_internal_verified" type="hidden" value="<?php echo $dudes_email_internal_verified; ?>" />
<input id="dudes_email_internal_active" type="hidden" value="<?php echo $dudes_email_internal_active; ?>" />
<input id="dudes_email_personal" type="hidden" value="<?php echo $dudes_email_personal; ?>" />
<input id="dudes_email_personal_verified" type="hidden" value="<?php echo $dudes_email_personal_verified; ?>" />
<input id="dudes_jobposition_title" type="hidden" value="<?php echo $dudes_jobposition_title; ?>" />
<input id="dudes_jobposition_shift" type="hidden" value="<?php echo $dudes_jobposition_shift; ?>" />
<input id="dudes_team_id" type="hidden" value="<?php echo $dudes_team_id; ?>" />
<input id="dudes_team_name" type="hidden" value="<?php echo $dudes_team_name; ?>" />
<input id="dudes_dma_id" type="hidden" value="<?php echo $dudes_dma_id; ?>" />
<input id="dudes_dma_name" type="hidden" value="<?php echo $dudes_dma_name; ?>" />
<input id="dudes_market_id" type="hidden" value="<?php echo $dudes_market_id; ?>" />
<input id="dudes_market_name" type="hidden" value="<?php echo $dudes_market_name; ?>" />
<input id="dudes_submarket_id" type="hidden" value="<?php echo $dudes_submarket_id; ?>" />
<input id="dudes_submarket_name" type="hidden" value="<?php echo $dudes_submarket_name; ?>" />
<input id="dudes_department_id" type="hidden" value="<?php echo $dudes_department_id; ?>" />
<input id="dudes_department_name" type="hidden" value="<?php echo $dudes_department_name; ?>" />
<input id="dudes_salespitch_template_id" type="hidden" value="<?php echo $dudes_salespitch_template_id; ?>" />
<input id="dudes_cellphone" type="hidden" value="<?php echo $dudes_cellphone; ?>" />
<input id="dudes_workphone_active" type="hidden" value="<?php echo $dudes_workphone_active; ?>" />

                    <input id="vstat" class="" name="vstat" type="hidden" value="">
                    <input type="hidden" id="vehicle_id" name="vehicle_id" value="" />


                    <input id="page_refer" type="hidden" value="<?php echo $onpage_current; ?>" />
                    
                </li>
                <li>
                    <a class="count-info" data-toggle="dropdown" href="inventory.php" title=" Inventory">
                        <i class="fa fa-car fa-spin"></i>  <span class="label label-warning">1</span>
                    </a>
                </li>
               
                
                <!-- Credit Applications -->
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="Credit Apps">
                        <i class="fa fa-database"></i>  <span class="label label-warning">16</span>
                    </a>
                    <!--ul class="dropdown-menu dropdown-messages">
                    
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div>
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div>
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div>
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>See More Activity</strong>
                                </a>
                            </div>
                        </li>
                    </ul -->
                </li>
                
                
                
                
                <!-- Unread Leads -->
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="Leads">
                        <i class="fa fa-child"></i>  <span class="label label-primary">1</span>
                    </a>
                    <!--ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul -->
                </li>


                <li>
                    <a href="script-logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

</nav>

</div>
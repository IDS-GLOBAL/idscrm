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
                    <span class="m-r-sm text-muted welcome-message"><a href="account.php" target="_parent">Hi! "<?php echo $row_userDets['company']; ?>"  It's <?php echo date("M d Y h:i a D", strtotime($server_time)); ?>  <?php echo $zone_to; ?>.</a></span>
                    <input type="hidden" id="token" name="token" value="<?php echo $tkey; ?>" />
                    <input id="thisdid" type="hidden" value="<?php echo $did; ?>" />
                    <input id="mgrid" type="hidden" value="<?php echo $mgrid; ?>" />
                    <input id="vstat" class="" name="vstat" type="hidden" value="<?php echo $vstatus; ?>">
                    <input type="hidden" id="vehicle_id" name="vehicle_id" value="<?php echo $row_find_vehicle['vid']; ?>" />


                    <input id="page_refer" type="hidden" value="<?php echo $onpage_current; ?>" />
                    
                </li>
                <li>
                    <a class="count-info" data-toggle="dropdown" href="manager.inventory.php" title="<?php echo $vstat_text; ?> Inventory">
                        <i class="fa fa-car fa-spin"></i>  <span class="label label-warning"><?php echo $totalRows_LiveVehicles; ?></span>
                    </a>
                </li>
               
                
                <!-- Credit Applications -->
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="manager.credit-apps.php" title="Credit Apps">
                        <i class="fa fa-database"></i>  <span class="label label-warning">-</span>
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
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="manager.leads.php" title="Leads">
                        <i class="fa fa-child"></i>  <span class="label label-primary"> <?php echo $totalRows_find_unreadleads; ?></span>
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
                    <a href="manager.logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

</nav>

</div>
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
                    <span class="m-r-sm text-muted welcome-message"><a href="mysales.account.php" target="_parent">Welcome "<?php echo $loggedin_salespersons_name; ?>" of <?php echo $row_userDets['company']; ?> It's <?php echo date("F l Y h:i", strtotime("$timevar")); ?>  <?php echo $dealerTimezone; ?> time</a>.</span>
                    
                    <input type="hidden" id="token" name="token" value="<?php echo $tkey; ?>" />
                    <input id="thisdid" type="hidden" value="<?php echo $did; ?>" />
                    <input id="thissid" type="hidden" value="<?php echo $sid; ?>" />
                    <input id="vstat" class="" name="vstat" type="hidden" value="<?php echo $vstatus; ?>">
                    <input type="hidden" id="vehicle_id" name="vehicle_id" value="<?php echo $row_find_vehicle['vid']; ?>" />


                    <input id="page_refer" type="hidden" value="<?php echo $onpage_current; ?>" />
                    
                </li>
                <li>
                    <a class="count-info" data-toggle="dropdown" href="mysales.inventory.php" title="<?php echo $vstat_text; ?> Inventory">
                        <i class="fa fa-car"></i>  <span class="label label-warning"><?php echo $totalRows_LiveVehicles; ?></span>
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
                        <i class="fa fa-child <?php if($totalRows_find_unreadleads != 0){ echo 'fa-spin'; }else{  } ?>"></i>  <span class="label label-primary"> <?php echo $totalRows_find_unreadleads; ?></span>
                    </a>

<?php if($totalRows_find_unreadleads != 0): ?>
                    <ul class="dropdown-menu dropdown-alerts">
						<?php do { ?>
                        <li class="divider"></li>
                        <li>
                            <a href="mysales.lead.view.php?leadid=<?php echo $row_find_unreadleads['cust_leadid']; ?>">
                                <div>
                                    <i class="fa fa-user-circle fa-fw"></i> <?php echo $row_find_unreadleads['cust_nickname']; ?> <?php echo $row_find_unreadleads['cust_lead_source']; ?>
                                    <span class="pull-right text-muted small"><abbr class="timeago" title="<?php echo $finalDate=zone_conversion_date($row_find_unreadleads['cust_lead_created_at'], $zone_from, $zone_to); ?>"> <?php echo $row_find_unreadleads['cust_lead_created_at']; ?></abbr></span>

                                    
                                    
                                    
                                </div>
                            </a>
                        </li>
						<?php } while ($row_find_unreadleads = mysqli_fetch_array($find_unreadleads)); ?>
                    </ul>
<?php endif; ?>
                </li>


                <li>
                    <a href="mysales.logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

</nav>

</div>
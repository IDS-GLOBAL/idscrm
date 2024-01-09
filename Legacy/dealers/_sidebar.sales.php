
<?php include("inc.chatwindow.php"); ?>

<?php include("inc.mysales.modals.php"); ?>

<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">

                        <div class="dropdown profile-element"> <span>
                            <img alt="image"  src="img/logo.png" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <!-- span class="clear" --> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold"><?php echo $row_userDets['company']; ?></strong>
                                </span> 
                             <span class="text-muted text-xs block">Quick Links <b class="caret"></b></span></span>  
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="mysales.profile.php">My Account</a></li>
                                <li><a href="http://webmail.idscrm.com/" target="_blank">Web Mailbox</a></li>
                                <li class="divider"></li>
                                <li>$dealerTimezone: <?php echo $row_userDets['salesperson_timezone']; ?></li>
                                <li>$zone_from: <?php echo $zone_from; ?></li>
                                <li>$zone_to: <?php echo $zone_to; ?></li>
                                <li>$timevar: <?php echo $timevar; ?></li>
                                <li>$server_time: <?php echo $server_time; ?></li>
                                <li class="divider"></li>

                                <li><a href="mysales.logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IDScrm
                        </div>

                    </li>
                    <!-- li class="active" -->
                    <li class="active">
                        <a href="mysales.dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>



                    <!-- li>
                        <a><i class="fa fa-tasks"></i> <span class="nav-label">To Do (Tasks)</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li class="active">
                                <a href="mysales.todos.php">View Todos</a>
                            </li>
                        </ul>
                    </li -->


                    <li>
                        <a><i class="fa fa-calendar"></i> <span class="nav-label">Appointments</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li class="active">
                                <a href="mysales.appointments.php">View Appointments</a>
                            </li>
                            <li>
                                <a data-backdrop="static" data-toggle="modal" data-target="#newappointmentModal">New Appointment</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Customers</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mysales.customers.php">Customers</a></li>
                            <li><a href="mysales.leads.php">Leads</a></li>
                            <li><a href="mysales.facebookusers.php">Facebook Users</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Applications</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mysales.credit-apps.php">Credit Applications</a></li>
                        </ul>
                    </li>



                    <!--li>
                        <a><i class="fa fa-user-plus"></i> <span class="nav-label">Team Members</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="mysales.teams.php">Teams</a>
                            </li>
                            
                            <li>
                                <a href="mysales.salespeople.php">Sales People</a>
                            </li>
                            <li>
                                <a href="mysales.managers.php">Managers</a>
                            </li>
                            <li>
                                <a href="mysales.collectors.php">Collectors</a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Marketing</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">AutoCityMag.com</a><span class="pull-right label label-primary">SPECIAL</span></li>
                        </ul>
                    </li>


                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Email Templates </span><span class="label label-warning pull-right">3/10</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mysales.emailtemplates.php">View Templates</a></li>
                            <li><a href="mysales.emailtemplate.add.php">Create Email Template</a></li>
                            <li><a href="mysales.emailtemplatessent.php">Emails Sent</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Deal Manager</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mysales.salesdesk.php">Sales Desk</a></li>
							<li><a href="mysales.dealmatrix.php">Sales Desk Settings</a></li>
                            <li><a href="mysales.deals.php">View Deals</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-car"></i> <span class="nav-label">Inventory</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mysales.inventory.php?vstat=1">Live Inventory</a></li>
                            <li><a href="mysales.inventory.php?vstat=0">View Hold Inventory</a></li>
                            <li><a href="mysales.inventory.php?vstat=9">View Sold Inventory</a></li>
                            <li><a href="mysales.inventory.php?vstat=all" title="Everything">View All Inventory</a></li>
                            <li><a href="mysales.inventory.add.php">Add Inventory By VIN</a></li>
                            <li><a href="mysales.inventory-add.php">Add Inventory No VIN</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Repair Shop</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mysales.repairshops.php">Repair Shops</a></li>
                            <li><a href="mysales.myrepairshops.php">My Repair Shops</a></li>
                            <li><a href="mysales.ticketsubmit.php">Make A Ticket</a></li>
                            <li><a href="#">View Repair Shop Calendar</a></li>
                            <li><a href="#">Make A Repair Appointment</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mysales.inventory.report.php">Inventory Report</a></li>
                            <li><a href="mysales.lead.report.php">Lead Report</a></li>
                            <li><a href="mysales.appointment.report.php">Appointment Report</a></li>
                        </ul>
                    </li>


                    <li class="special_link">
                        <a href="#"><i class="fa fa-life-saver"></i> <span class="nav-label">Submit A Ticket</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li><a href="mysales.ticket.view.php">View Trouble Tickets</a></li>
                            <li><a href="ticket.create.php">Create A Trouble Ticket</a></li>
                        </ul>
                    </li>


                    <li class="special_link">
                        <a href="#"><i class="fa fa-angellist"></i> <span class="nav-label">Links &amp; Tips</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="coollinks.php">Cool Links</a></li>
                            <li><a href="knowledgebase.php">Knowledge Base</a></li>
                            <li><a href="videotutorials.php">Video Tutorials</a></li>
                        </ul>
                    </li>


                    <li class="special_link">
                        <a href="#"><i class="fa fa-tablet"></i> <span class="nav-label">My Website</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mysales.website.home.php">Home</a></li>
                            <li><a href="mysales.website.home.php">About Us</a></li>
                            <li><a href="mysales.website.home.php">Directions</a></li>
                            <li><a href="mysales.website.home.php">Contact Us</a></li>
                            <li><a href="mysales.website.home.php">Store Info</a></li>
                            <li><a href="mysales.testimonies.php">Testimonies</a></li>
                        </ul>
                    </li>


                    <li class="special_link">
                        <a href="#"><i class="fa fa-angellist"></i> <span class="nav-label">Buy/Order</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="ids-store.php">IDS Store</a></li>
                        </ul>
                    </li -->
                    
                    
                    
                    
                    
                    
                
                </ul>

            </div>
        </nav>
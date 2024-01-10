
<?php include("inc.chatwindow.php"); ?>

<?php include("inc.modals.php"); ?>

<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">

                        <div class="dropdown profile-element"> <span>
                            <img alt="image"  src="https://idscrm.com/dealers/img/logo.png" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                             </span> <span class="text-muted text-xs block">Quick Links <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a id="ids_myaccount_link" href="account.php">My Account</a></li>
                                <li><a id="myprofile_link" href="profile.php">My Profile</a></li>
<?php if($dudes_skillset_id == '9'){ ?>
                                <li><a id="ids_invoices_link" href="invoices.php">Billing</a></li>
<?php }else{ ?>
                                <li><a id="ids_invoices_link" href="#">Billing</a></li>
<?php } ?>
                                
                                <li><a id="ids_webmail_link" href="http://webmail.idscrm.com/" target="_blank">Mailbox</a></li>
                                <li><a ice:repeating="ids_accountsettings_link" href="settings.php">Settings</a></li>
                                <li class="divider"></li>
                                <li><a id="ids_logoutdudes_link" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IDScrm
                        </div>

                    </li>
                    <!-- li class="active" -->
                    

                        
<?php if($dudes_skillset_id == '9'){ ?>

                    <li>
                        <a role="button"><i class="fa fa-th-large"></i> <span class="nav-label">Power</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
							<li><a href="power.php">Power View</a></li>
							<li><a href="dashboard.php">Dashboard View</a></li>
							<li><a href="map.php">Map View</a></li>
						</ul>
                    </li>

<?php }else{?>

                    <li>
                        <a role="button"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                        <ul class="nav nav-second-level collapse">
							<li><a href="dashboard.php">Dashboard View</a></li>
   							<li><a href="map.php">Map View</a></li>

						</ul>
                    </li>



<?php }?>


                    <li>
                        <a role="button"><i class="fa fa-envelope"></i> <span class="nav-label">Email Templates </span><span class="label label-warning pull-right"><?php echo $totalRows_dealer_template_types_inactive; ?>/<?php echo $totalRows_dealer_template_types; ?></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="emailtemplates.php">View Templates</a></li>
                            <li><a href="emailtemplate.add.php">Create Email Template</a></li>
                            <li><a href="emailtemplates.sent.php">Emails Sent</a></li>
                        </ul>
                    </li>



                    <li>
                        <a role="button"><i class="fa fa fa-book"></i> <span class="nav-label">Script Templates </span><span class="label label-warning pull-right"><?php echo $totalRows_dealer_template_types_inactive; ?>/<?php echo $totalRows_dealer_template_types; ?></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="pitchtemplates.php">View Templates</a></li>
                            <li><a href="pitchtemplate.add.php">Create Script Template</a></li>
                        </ul>
                    </li>





                    <li>
                        <a><i class="fa fa-calendar"></i> <span class="nav-label">Demo Appointments</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li class="active">
                                <a href="demo.appointments.php">Demos</a>
                            </li>
                            <!--li>
                                <a data-backdrop="static" data-toggle="modal" data-target="#newappointmentModal">New Appointment</a>
                            </li -->
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Dealers</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
	                        <li><a href="prospect.search.php">New Prospect</a></li>
                            <li><a href="prospect.dealers.php">Prospects</a></li>
                            <li><a href="my.dealers.php">My Dealers</a></li>
<?php if($dudes_skillset_id == '9'){ ?>
                        	<li><a href="my.dealers.pending.php">Dealers Pending</a></li>
                        	<li><a href="my.dealers.system.php">System Dealers Only</a></li>
<?php }?>                            

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Deals</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="cardeals.php">Pending Deals</a></li>
                             <li><a href="cardeals.php">Completed Deals</a></li>
                        </ul>
                    </li>


                    <li>
                        <a><i class="fa fa-tasks"></i> <span class="nav-label">To Do (Tasks)</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li class="active">
                                <a href="tasks.php">View Tasks</a>
                            </li>
                            <li>
                                <a href="task.new.php">New Task</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-car"></i> <span class="nav-label">Vehicles</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">Search Vehicles</a></li>
                            <li><a href="inventory.php"  title="Everything">All Live Vehicles</a></li>
                            <li><a href="#">All Sold Vehicles</a></li>
                            <li><a href="#">All Hold Vehicles</a></li>
                            <li><a href="inventory.transfers.php" title="Everything">Vehicle Transfers</a></li>
                            <li><a href="#">Create Dealer Inventory</a></li>
<?php if($dudes_skillset_id == '9'){ ?>

                            <li><a href="create.make-models.php">Create Make&amp;Models</a></li>
<?php } ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Billing</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        
                        
<?php if($dudes_skillset_id == '9'){ ?>
                        	<li><a href="billing.php" target="_blank">Old Billing</a></li>
                        	<li><a href="billing-new.php" target="_blank">New Billing</a></li>
<?php }?>                            
                            
                            <li><a href="#">Create A Invoice</a></li>
							<li><a href="#">Create A New Charge</a></li>
                            <li><a href="#">Payments</a></li>
                            <li><a href="#">Post A Payment</a></li>
                            <li><a href="#">Find A Invoice</a></li>
                            <li><a href="#">Invoice Report</a></li>
                            <li><a href="#">WFH Lates Purchases</a></li>
                            <li><a href="#">WFH Batch Report</a></li>
                            <li><a href="#">WFH Running Ledger</a></li>
                            <li><a href="#">Payment Report</a></li>
                            <li><a href="#">Create Recurring Invoices</a></li>
							<li><a href="#">Create Fees</a></li>
                            <li><a href="#">Recurring/Invoice Agreements</a></li>
							<li><a href="#">Create A Credit</a></li>
                            <li><a href="#">View Deals</a></li>
                            <li><a href="#">Create Invoice</a></li>
							<li><a href="#">Create A Charge</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Sales Funnel</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">WeFinanceHere.com</a><span class="pull-right label label-primary">SPECIAL</span></li>
                            <li><a href="#">AutoCityMag.com</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-folder-open-o"></i> <span class="nav-label">Departments</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="departments.php">View Departments</a></li>
                            <li><a href="department.add.php">Create A New Department</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Commission</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="departments.php">View Departments</a></li>

<?php if($dudes_skillset_id == '9'){ ?>
                            <li><a href="department.add.php">Create A New Department</a></li>
<?php } ?>
                            
                        </ul>
                    </li>



                    <li>
                        <a><i class="fa fa-user-plus"></i> <span class="nav-label">Team Members</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="company.directory.php">Company Directory</a>
                            </li>

                            <li>
                                <a href="#">Teams</a>
                            </li>
                            
                            <li>
                                <a href="dealer.salespeople.php">Sales People</a>
                            </li>
<?php if($dudes_skillset_id == '9'){ ?>
                            <li>
                                <a href="create.dude.php">New Dude</a>
                            </li>
<?php } ?>
                            <li>
                                <a href="#">Managers</a>
                            </li>
                            <li>
                                <a href="#">Collectors</a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Repair Shop</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="repairshops.php">Repair Shops</a></li>
                            <li><a href="myrepairshops.php">My Repair Shops</a></li>
                            <li><a href="#">Make A Ticket</a></li>
                            <li><a href="#">Move car To Repair Shop</a></li>
                            <li><a href="#">View Repair Shop Calendar</a></li>
                            <li><a href="#">Make A Repair Appointment</a></li>

                        </ul>
                    </l>



                    <!--li>
                        <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="soon.php">Inventory Views</a></li>
                            <li><a href="inventory.report.php">Inventory Report</a></li>
                            <li><a href="inventory.report.php">Lead Report</a></li>
                            <li><a href="inventory.report.php">Appointment Report</a></li>
                        </ul>
                    </li -->

                    <li class="special_link">
                        <a href="#"><i class="fa fa-tablet"></i> <span class="nav-label">My Profile</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Directions</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Store Info</a></li>
                            <li><a href="#">Testimonies</a></li>
                            <li><a href="#">Thank You Page</a></li>
                        </ul>
                    </li>


                    <li class="special_link">
                        <a href="#"><i class="fa fa-life-saver"></i> <span class="nav-label">Support</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="ticketi.history.php">View Internal Trouble Ticket(s)</a></li>
                            <li><a href="ticketi.create.php">Create A Internal Trouble Ticket</a></li>
                             <li><a href="ticketd.history.php">View Dealer Trouble Ticket(s)</a></li>
                            <li><a href="ticketd.create.php">Create A Dealer Trouble Ticket</a></li>
                        </ul>
                    </li>


                    <li class="special_link">
                        <a href="#"><i class="fa fa-angellist"></i> <span class="nav-label">Links &amp; Tips</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="soon.php">Cool Links</a></li>
                            <li><a href="soon.php">Knowledge Base</a></li>
                            <li><a href="soon.php">Video Tutorials</a></li>
                        </ul>
                    </li>


                    <li class="special_link">
                        <a href="#"><i class="fa fa-angellist"></i> <span class="nav-label">Buy/Order</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="ids-store.php">IDS Store</a></li>
                        </ul>
                    </li>

                    <li class="special_link">
                        <a href="#"><i class="fa fa-angellist"></i> <span class="nav-label">Time Clock</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="dudes.clockin.php">Time Clock/In or Out</a></li>
                            <li><a href="dudes.clockinhistory.php">Time Clock History</a></li>
                        </ul>
                    </li>
                    
                    
                </ul>

            </div>
        </nav>

<?php include("inc.chatwindow.php"); ?>

<?php include("inc.modals.php"); ?>

<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">

                        <div class="dropdown profile-element"> <span>
                            <img alt="image"  src="img/logo.png" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $row_userDets['company']; ?></strong>
                             </span> <span class="text-muted text-xs block">Quick Link <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="account.php">My Account</a></li>
                                <li><a href="invoices.php">Billing</a></li>
                                <li><a href="http://webmail.idscrm.com/" target="_blank">Mailbox</a></li>
                                <li><a href="account.php">Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IDScrm
                        </div>

                    </li>
                    <!-- li class="active" -->
                    <li class="active">
                        <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>

                    <li>
                        <a><i class="fa fa-calendar"></i> <span class="nav-label">Appointments</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li class="active">
                                <a href="appointments.php">View Appointments</a>
                            </li>
                            <!--li>
                                <a data-backdrop="static" data-toggle="modal" data-target="#newappointmentModal">New Appointment</a>
                            </li -->
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Customers</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="customers.php">Customers</a></li>
                            <li><a href="leads.php">Leads</a></li>
                            <li><a href="facebookusers.php">Facebook Users</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Applications</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="credit-apps.php">Credit Applications</a></li>
                        </ul>
                    </li>


                    <li>
                        <a><i class="fa fa-tasks"></i> <span class="nav-label">To Do (Tasks)</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li class="active">
                                <a href="tasks.php">View Tasks</a>
                            </li>
                            <li>
                                <a href="tasknew.php">New Task</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-car"></i> <span class="nav-label">Inventory</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="inventory.php?vstat=1">Live Inventory</a></li>
                            <li><a href="inventory.php?vstat=0">View Hold Inventory</a></li>
                            <li><a href="inventory.php?vstat=9">View Sold Inventory</a></li>
                            <li><a href="inventory.php?vstat=all" title="Everything">View All Inventory</a></li>
                            <li><a href="inventory.create.php">Add Inventory</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Deal Manager</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="salesdesk.php">Sales Desk</a></li>
							<li><a href="dealmatrix.php">Sales Desk Settings</a></li>
                            <li><a href="deals.php">View Deals</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Email Templates </span><span class="label label-warning pull-right">3/10</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="emailtemplates.php">View Templates</a></li>
                            <li><a href="emailtemplate.add.php">Create Email Template</a></li>
                            <li><a href="emailtemplatessent.php">Emails Sent</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Marketing</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="wfh.start.php">WeFinanceHere.com</a><span class="pull-right label label-primary">SPECIAL</span></li>
                            <li><a href="autocity.start.php">AutoCityMag.com</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Departments</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="departments.php">View Departments</a></li>
                            <li><a href="department.add.php">Create A New Department</a></li>
                        </ul>
                    </li>



                    <li>
                        <a><i class="fa fa-user-plus"></i> <span class="nav-label">Team Members</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="teams.php">Teams</a>
                            </li>
                            
                            <li>
                                <a href="salespeople.php">Sales People</a>
                            </li>
                            <li>
                                <a href="managers.php">Managers</a>
                            </li>
                            <li>
                                <a href="collectors.php">Collectors</a>
                            </li>

                        </ul>
                    </li>


                    <!--li>
                        <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Repair Shop</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="repairshops.php">Repair Shops</a></li>
                            <li><a href="myrepairshops.php">My Repair Shops</a></li>
                            <li><a href="#">Make A Ticket</a></li>
                            <li><a href="#">Move car To Repair Shop</a></li>
                            <li><a href="#">View Repair Shop Calendar</a></li>
                            <li><a href="#">Make A Repair Appointment</a></li>

                        </ul>
                    </li -->



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
                        <a href="#"><i class="fa fa-tablet"></i> <span class="nav-label">My Website</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="website.home.php">Home</a></li>
                            <li><a href="website.aboutus.php">About Us</a></li>
                            <li><a href="website.directions.php">Directions</a></li>
                            <li><a href="website.contactus.php">Contact Us</a></li>
                            <li><a href="website.storeinfo.php">Store Info</a></li>
                            <li><a href="website.testimonies.php">Testimonies</a></li>
                            <li><a href="website.thankyou.php">Thank You Page</a></li>
                        </ul>
                    </li>


                    <li class="special_link">
                        <a href="#"><i class="fa fa-life-saver"></i> <span class="nav-label">Submit A Ticket</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li><a href="ticket.history.php">View Trouble Ticket(s)</a></li>
                            <li><a href="ticket.create.php">Create A Trouble Ticket</a></li>
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
                        <a href="dealmatrix.php"><i class="fa fa-magic"></i> <span class="nav-label">Deal Matrix</span> 
                        <span class="label label-info pull-right">NEW</span></a>
                    </li>

                    <!--li class="special_link">
                        <a href="#"><i class="fa fa-cart-plus"></i> <span class="nav-label">Auction Cars</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="auction.php">Car Auction</a></li>
                            <li><a href="auction-move.php">Move Cars To Auction</a></li>
							<li><a href="auction-settings.php">Auction Settings</a></li>
							<li><a href="auction-purchases.php">Auction Purchases</a></li>
							<li><a href="auction-pass.php">Auction Purchases</a></li>
                        </ul>
                    </li-->

                    <li class="special_link">
                        <a href="#"><i class="fa fa-angellist"></i> <span class="nav-label">Buy/Order</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="ids-store.php">IDS Store</a></li>
                        </ul>
                    </li>
                    
                    <li class="special_link">
                        <a href="#"><i class="fa fa-cc-paypal"></i> <span class="nav-label">Billing</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="invoices.php">Invoices</a></li>
                            <!-- li><a href="invoice-history.php">Billing History</a></li>
							<li><a href="invoice-agreement.php">Billing Agreement(s)</a></li>
							<li><a href="invoice-manage.php">Manage Billing</a></li -->
                        </ul>
                    </li>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!--li class="special_link">
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="form_basic.html">Basic form</a></li>
                            <li><a href="form_advanced.html">Advanced Plugins</a></li>
                            <li><a href="form_wizard.html">Wizard</a></li>
                            <li><a href="form_file_upload.html">File Upload</a></li>
                            <li><a href="form_editors.html">Text Editor</a></li>
                        </ul>
                    </li>
                    
                    <li class="special_link">
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span>  <span class="pull-right label label-primary">SPECIAL</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="projects.html">Projects</a></li>
                            <li><a href="project_detail.html">Project detail</a></li>
                            <li><a href="file_manager.html">File manager</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="pin_board.html">Pin board</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul>
                    </li>
                    <li class="special_link">
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="search_results.html">Search results</a></li>
                            <li><a href="lockscreen.html">Lockscreen</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="500.html">500 Page</a></li>
                            <li><a href="empty_page.html">Empty page</a></li>
                        </ul>
                    </li>

                    <li class="special_link">
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="draggable_panels.html">Draggable Panels</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="video.html">Video</a></li>
                            <li><a href="tabs_panels.html">Tabs & Panels</a></li>
                            <li><a href="notifications.html">Notifications & Tooltips</a></li>
                            <li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
                        </ul>
                    </li>
                    <li class="special_link">
                        <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
                    </li>
                    <li class="special_link">
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="table_basic.html">Static Tables</a></li>
                            <li><a href="table_data_tables.html">Data Tables</a></li>
                        </ul>
                    </li>
                    <li class="special_link">
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="basic_gallery.html">Basic Gallery</a></li>
                            <li><a href="carousel.html">Bootstrap Carusela</a></li>

                        </ul>
                    </li>
                    <li class="special_link">
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                        </ul>
                    </li>
                    <li class="special_link">
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports & Graphs</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graph_flot.html">Flot Charts</a></li>
                            <li><a href="graph_morris.html">Morris.js Charts</a></li>
                            <li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                            <li><a href="graph_chartjs.html">Chart.js</a></li>
                            <li><a href="graph_peity.html">Peity Charts</a></li>
                            <li><a href="graph_sparkline.html">Sparkline Charts</a></li>
                        </ul>
                    </li>

                    <li class="special_link">
                        <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
                    </li>
                    <li class="special_link">
                        <a href="angularjs.html"><i class="fa fa-google"></i> <span class="nav-label">AngularJS</span><span class="label pull-right">NEW</span></a>
                    </li-->
                
                
                </ul>

            </div>
        </nav>
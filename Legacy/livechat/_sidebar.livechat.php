
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php print $username; ?></strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                
                
                    <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label"><?php echo $lang['livehelp']; ?></span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="live.php"><?php echo $lang['txt91']; ?></a></li>
                        <li><a href="edit_quick.php"><?php echo $lang['txt32']; ?></a></li>
                        <li><a href="edit_quick.php?typeof=IMAGE"><?php echo $lang['txt30']; ?></a></li>
                        <li class="active"><a href="edit_quick.php?typeof=URL"><?php echo $lang['txt28']; ?></a></li>
                        <li><a href="autoinvite.php"><?php echo $lang['txt132']; ?></a></li>

                        <li><a href="admin.php?page=edit_smile.php&tab=settings">Emotion Icons</a></li>
                        <li><a href="admin.php?page=edit_layer.php&tab=settings">Edit Layer Images </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label"><?php echo $lang['operators']; ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="operators.php?editit=<?php echo $myid ?>"><?php echo $lang['EDIT']; ?> Your account</a></li>
<?php if ($isadminsetting=="Y" ) { ?>	
                        <li><a href="admin.php?page=departments.php&tab=dept"><?php echo $lang['CREATE']; ?>/<?php echo $lang['EDIT']; ?>/<?php echo $lang['DELETE']; ?></a></li>
<?php } ?>          
                    </ul>
                </li>



<?php if( ($isadminsetting == "Y") || ($isadminsetting == "N") || ($isadminsetting == "R") ){ ?>


<?php if ($isadminsetting != "R") {  ?>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label"><?php echo $lang['dept']; ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="operators.php?editit=<?php echo $myid ?>"><?php echo $lang['EDIT']; ?> Your account</a></li>
<?php if ($isadminsetting=="Y" ) { ?>
 
                        <li><a href="admin.php?page=departments.php&tab=dept"><?php echo $lang['CREATE']; ?>/<?php echo $lang['EDIT']; ?>/<?php echo $lang['DELETE']; ?></a></li>
<?php } ?>
					</ul>
                </li>
<?php } ?>




                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label"><?php echo $lang['data']; ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="admin.php?page=data.php&tab=data&alttab=0"><?php echo $lang['txt100']; ?></a></li>
                        <li><a href="admin.php?page=data.php&tab=data&alttab=1">Messages</a></li>
                        <li><a href="admin.php?page=data.php&tab=data&alttab=2"><?php echo $lang['EDIT']; ?></a></li>
                        <li><a href="admin.php?page=data.php&tab=data&alttab=2"><?php echo $lang['txt98']; ?>t</a></li>
                        <li><a href="admin.php?page=data.php&tab=data&alttab=3"><?php echo $lang['txt99']; ?></a></li>
                        <li><a href="admin.php?page=data.php&tab=data&alttab=4">Paths</a></li>
                        <li><a href="admin.php?page=data.php&tab=data&alttab=5"><?php echo $lang['keywords']; ?></a></li>
                        <li><a href="aadmin.php?page=data.php&tab=data&alttab=6"><?php echo $lang['users']; ?></a></li>
                    </ul>
                </li>
<?php } ?>



            </ul>

        </div>
    </nav>



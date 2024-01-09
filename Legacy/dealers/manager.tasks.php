<?php require_once("db_manager_loggedin.php"); ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Tasks</title>

<?php include("inc.head.php"); ?>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.manager.php"); ?>

        <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">                            
                            
<a class="btn btn-primary" href="manager.tasknew.php">(+) New Task</a>

                            
                            <div class="space-25"></div>
                            <h5>Folders</h5>
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="#"> <i class="fa fa-inbox "></i> Undone <span class="label label-warning pull-right">16</span> </a></li>
                                <li><a href="#"> <i class="fa fa-envelope-o"></i> Coming Up</a></li>
                                <li><a href="#"> <i class="fa fa-certificate"></i> Expring Soon</a></li>
                                <li><a href="#"> <i class="fa fa-file-text-o"></i> Over Due <span class="label label-danger pull-right">2</span></a></li>
                                <li><a href="#"> <i class="fa fa-trash-o"></i> Completed</a></li>
                            </ul>
                            <h5>Categories</h5>
                            <ul class="category-list" style="padding: 0">
                                <li><a href="#"> <i class="fa fa-circle text-navy"></i> Appointments </a></li>
                                <li><a href="#"> <i class="fa fa-circle text-danger"></i> Prepare Vehicle</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-primary"></i> Sales Team</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-info"></i> Management Team</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-warning"></i> Call Back</a></li>
                            </ul>

                            <h5 class="tag-title">Labels</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href="#"><i class="fa fa-tag"></i> Family</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Work</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Home</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Children</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Holidays</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Music</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Photography</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Film</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            <div id="dynamic_table_push" class="col-lg-9 animated fadeInRight"></div>
            
         
         
         
         
         
         
         </div>
        </div>
       
        <?php include("footer.php"); ?>

        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
<?php include("inc.end.body.php"); ?>
<script src="js/custom/page/tasks.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
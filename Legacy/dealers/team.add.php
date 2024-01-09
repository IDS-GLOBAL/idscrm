<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealer_teams = "SELECT * FROM dealers_teams WHERE dealers_teams.dlr_team_did AND dealers_teams.dlr_team_status ORDER BY dealers_teams.dlr_team_name";
$find_dealer_teams = mysqli_query($idsconnection_mysqli, $query_find_dealer_teams);
$row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
$totalRows_find_dealer_teams = mysqli_num_rows($find_dealer_teams);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Add A New Team</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>






<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Add A New Team</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="teams.php">Teams</a>
                        </li>
                        <li class="active">
                            <strong><a>Add A New Team</a></strong>
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a href="teams.php" class="btn btn-primary btn-lg">Manage Teams</a>                    
                        <a class="btn btn-warning btn-lg">Add New Team</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">







<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Team Name:</label>

                                    <div class="col-sm-10"><input id="dlr_team_name" name="dlr_team_name" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Team Description/Comments:</label>
                                    <div class="col-sm-10">
                                    
                                    <textarea id="dlr_team_description" name="dlr_team_description" class="form-control textarea"  rows="4"></textarea>
                                    <span class="help-block m-b-none">This will be the text on team preview.</span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                


								<div class="form-group"><label class="col-sm-2 control-label">Team Status</label>

                                    <div class="col-sm-10">
                                    <select id="dlr_team_status" class="form-control m-b" name="dlr_team_status">
                                        <option value="1" selected="selected">Make Active</option>
                                        <option value="0">Make Inactive</option>
                                    </select>
                                    <span class="help-block m-b-none">Status Of Team.</span>
                                	</div>
								</div>




                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button id="create_new_team" class="btn btn-primary" type="button">Create New Team</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>







        </div>




		<?php include("footer.php"); ?>

        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>


    <script>
        $(document).ready(function(){
            $('.contact-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
	<script src="js/custom/page/custom.team.add.js"></script>
</body>

</html>
<?php
mysqli_free_result($find_dealer_teams);
?>
<?php include("inc.end.phpmsyql.php"); ?>

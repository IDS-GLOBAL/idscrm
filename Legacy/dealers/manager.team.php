<?php require_once("db_manager_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealer_teams = "SELECT * FROM dealers_teams WHERE dealers_teams.dlr_team_did AND dealers_teams.dlr_team_status ORDER BY dealers_teams.dlr_team_name";
$find_dealer_teams = mysqli_query($idsconnection_mysqli, $query_find_dealer_teams);
$row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
$totalRows_find_dealer_teams = mysqli_num_rows($find_dealer_teams);

$colname_find_singledealerteam = "-1";
if (isset($_GET['dlr_team_id'])) {
  $colname_find_singledealerteam = $_GET['dlr_team_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singledealerteam =  sprintf("SELECT * FROM `dealers_teams` WHERE `dealers_teams`.`dlr_team_id` = %s AND `dealers_teams`.`dlr_team_did` = '$did'", GetSQLValueString($colname_find_singledealerteam, "text"));
$find_singledealerteam = mysqli_query($idsconnection_mysqli, $query_find_singledealerteam);
$row_find_singledealerteam = mysqli_fetch_assoc($find_singledealerteam);
$totalRows_find_singledealerteam = mysqli_num_rows($find_singledealerteam);
$team_id = $row_find_singledealerteam['dlr_team_id'];
$dlr_team_photo_url = $row_find_singledealerteam['dlr_team_photo_url'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_team_posts = "SELECT * FROM `idsids_idsdms`.`dealers_news` WHERE dealers_news.dlr_news_team_id = '$team_id' AND dealers_news.dlr_news_did = '$did' ORDER BY dealers_news.dlr_news_id DESC";
$find_team_posts = mysqli_query($idsconnection_mysqli, $query_find_team_posts);
$row_find_team_posts = mysqli_fetch_assoc($find_team_posts);
$totalRows_find_team_posts = mysqli_num_rows($find_team_posts);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_team_profile_photos = "SELECT * FROM dealers_teams_photos WHERE dealers_teams_photos.team_photo_did = '$did' AND dealers_teams_photos.team_photo_team_id = '$team_id' ORDER BY dealers_teams_photos.team_photo_sort_orderno DESC";
$find_team_profile_photos = mysqli_query($idsconnection_mysqli, $query_find_team_profile_photos);
$row_find_team_profile_photos = mysqli_fetch_assoc($find_team_profile_photos);
$totalRows_find_team_profile_photos = mysqli_num_rows($find_team_profile_photos);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_team_members = "SELECT dealers_teams.dlr_team_id, dealers_teams.dlr_team_did, dealers_teams.dlr_team_status, manager_person.dealer_id, manager_person.profile_image, manager_person.manager_id, manager_person.manager_firstname, manager_person.manager_lastname, sales_person.salesperson_id, sales_person.main_dealerid, sales_person.profile_image, sales_person.acct_status, sales_person.team_id, account_person.account_person_id, account_person.account_title, account_person.profile_image, account_person.dealer_id, account_person.acct_status FROM dealers_teams, manager_person, sales_person, account_person WHERE sales_person.team_id AND account_person.team_id AND manager_person.team_id = '$team_id' ORDER BY manager_person.manager_id ASC, sales_person.salesperson_id ASC, account_person.account_person_id ASC";
$find_team_members = mysqli_query($idsconnection_mysqli, $query_find_team_members);
$row_find_team_members = mysqli_fetch_assoc($find_team_members);
$totalRows_find_team_members = mysqli_num_rows($find_team_members);

if(!$row_find_singledealerteam['dlr_team_id']){header("Location: manager.team.add.php");}



$team_photo_date_taken = get_Datetime_Now();

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Team</title>

<?php include("inc.head.php"); ?>
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

</head>

<body>




                            <div class="modal inmodal" id="messageteamModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-envelope modal-icon"></i>
                                            <h4 class="modal-title">Send A Message To The <?php echo $row_find_singledealerteam['dlr_team_name']; ?> Team</h4>
                                            <small>Type Your Message To Send To (<?php echo $totalRows_find_team_members; ?>) Team Member(s)</small>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <h5>Body</h5>
                                            
                                            <div id="send_this_message" class="">
                                            <textarea id="team_msg_tosend" class="form-control textarea"></textarea>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button id="canel_this_message" type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button id="push_this_message" type="button" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal inmodal" id="oldteamgalleryModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-camera modal-icon"></i>
                                            <h4 class="modal-title">Team Photo Gallery</h4>
                                            <small>Previous Used Team Photos</small>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <h5>Team Profile Photo Gallery</h5>
                                            
                                            <div id="load_team_gallery">
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>








					<div class="modal inmodal fade" id="newteamphotoModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Load A New Team Photo</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                            
                                            <div id="loadTeamphoto_zone" class="dropzone">
                                            
                                            </div>
                                            
                                            <div class="form-group">

											<h5>Photo Comments: </h5>
                                            <input id="team_photo_albumcomments" type="text" class="form-control" />
											<h5>Photo Date Taken: </h5>
                                            <input id="team_photo_date_taken" type="hidden" class="form-control" placeholder="Enter Take Taken" value="<?php echo $team_photo_date_taken; ?>" />                                            
                                            
                                            <input id="change_profile_pic" type="hidden" value="0" />
                                            
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="clearall" type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button id="savephotoonly" type="button" class="btn btn-primary" data-dismiss="modal">Save Photo Only</button>

                                            <button id="savechangeprofile" type="button" class="btn btn-primary" data-dismiss="modal">Save And Change Photo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>






    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
      
        <?php include("_nav_top.manager.php"); ?>
      
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Team</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.teams.php">Teams</a>
                        </li>
                        <li class="active">
                            <strong><?php echo $row_find_singledealerteam['dlr_team_name']; ?> Team Profile</strong>
                            <input id="team_id" type="hidden" value="<?php echo $row_find_singledealerteam['dlr_team_id']; ?>">
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a href="manager.teams.php" class="btn btn-primary btn-lg">Manage Teams</a>                    
                        <a href="manager.team.add.php" class="btn btn-primary btn-lg">Add New Team</a>
                    </div>
                </div>
            </div>





      
<div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
            
<div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $row_find_singledealerteam['dlr_team_name']; ?></h5>
                            <div class="ibox-tools">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-camera"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li>
									<a id="upload_singleteamphoto" data-backdrop="static" data-toggle="modal" data-target="#newteamphotoModal"><i class="fa fa-camera-retro"></i> Load New Photo</a>
                                    </li>
                                    <li>

                                    <a id="load_up_teamgallery" data-backdrop="static" data-toggle="modal" data-target="#oldteamgalleryModal"><i class="fa fa-th"></i> Pick From Gallery</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                
                                <?php if($row_find_singledealerteam['dlr_team_photo_url']): ?>
                                
                                <img id="dlr_team_photo_url" alt="image" class="img-responsive" src="<?php echo $row_find_singledealerteam['dlr_team_photo_url']; ?>">
                                
								<?php else: ?>
                                
                                <img id="dlr_team_photo_url" alt="image" class="img-responsive" src="img/big_team.png">
                                
                                <?php endif; ?>
                                
                            </div>
                            <div class="ibox-content profile-content">
                                <p>
                                					  <?php 
					  	if($row_find_singledealerteam['dlr_team_status'] == 1){
							echo '<button class="btn btn-primary dim" type="button"><i class="fa fa-check"></i><span class="bold"> Active</span></button>';
							
						}elseif($row_find_singledealerteam['dlr_team_status'] == 0){
							echo '<button class="btn btn-warning  dim" type="button"><i class="fa fa-warning"></i><span class="bold"> Inactive</span></button>';
						}else{}
					  
					  ?>

                                </p>
                              	
                                <h5>Team Description</h5>
                                
                                <div>
                                    <?php echo $row_find_singledealerteam['dlr_team_description']; ?>
                    			</div>
                                
                                <div class="row m-t-lg">
                                    <div class="col-md-4">
                                        <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                                        <h5><strong><?php echo $totalRows_find_team_posts; ?></strong> Posts</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                        <h5><strong><?php echo $totalRows_find_team_profile_photos; ?></strong> Photos</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="bar">5,3,2,-1,-3,-2,2,3,5,2, 5,3,2,-1,-3,-2,2,3,5,2</span>
                                        <h5><strong><?php echo $totalRows_find_team_members; ?></strong> Team Members</h5>
                                    </div>
                                </div>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="team.edit.php?dlr_team_id=<?php echo $row_find_singledealerteam['dlr_team_id']; ?>" class="btn btn-primary btn-sm btn-block"><i class="fa fa-pencil"></i> Edit</a>
                                        </div>
                                        <div class="col-md-6">
                <a id="load_up_team_message" data-backdrop="static" data-toggle="modal" data-target="#messageteamModal"  class="btn btn-primary btn-sm btn-block">
                <i class="fa fa-envelope"></i> Message Team</a>
                                            
                                            
                                            </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                    </div>
            
            
            
            
            
<div class="col-md-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Team News</h5>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">

                                        <?php do { ?>

                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                        <?php if($row_find_team_posts['dlr_news_profile_pic']){ ?>
                                            <img alt="image" class="" src="<?php echo $row_find_team_posts['dlr_news_profile_pic']; ?>">
                                            <?php }else{ ?>

                                            <img alt="image" class="" src="img/logo.png">
                                            
                                            
                                            <?php } ?>
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right"><?php echo $row_find_team_posts['dlr_news_creatd_at']; ?> ago</small>
                                            <strong><?php echo $row_find_team_posts['dlr_news_name']; ?></strong><br>
                                            <small class="text-muted">Today <?php echo $row_find_team_posts['dlr_news_creatd_at']; ?></small>
                                            <div class="well">
											<?php echo $row_find_team_posts['dlr_news_body']; ?>
                                              </div>
                                            <div class="pull-right">
                                              <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                              <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                              <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                                              </div>
                                          </div>
                                    </div>
                                          <?php } while ($row_find_team_posts = mysqli_fetch_assoc($find_team_posts)); ?>
                                </div>

                                <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>

                            </div>

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

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>

    <!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Peity -->
<script src="js/demo/peity-demo.js"></script>

<script src="js/custom/page/custom.team.js"></script>
</body>

</html>
<?php
mysqli_free_result($find_team_posts);

mysqli_free_result($find_team_profile_photos);

mysqli_free_result($find_team_members);

mysqli_free_result($find_dealer_teams);
?>
<?php include("inc.end.phpmsyql.php"); ?>
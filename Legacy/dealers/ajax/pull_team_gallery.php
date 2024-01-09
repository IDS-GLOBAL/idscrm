<?php require_once('db.php');  ?>
<?php


$colname_find_singledealerteam = "-1";
if (isset($_GET['dlr_team_id'])) {
  $colname_find_singledealerteam = $_GET['dlr_team_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singledealerteam =  "SELECT * FROM `idsids_idsdms`.`dealers_teams` WHERE `dealers_teams`.`dlr_team_id` = '$colname_find_singledealerteam' AND `dealers_teams`.`dlr_team_did` = '$did'";
$find_singledealerteam = mysqli_query($idsconnection_mysqli, $query_find_singledealerteam);
$row_find_singledealerteam = mysqli_fetch_assoc($find_singledealerteam);
$totalRows_find_singledealerteam = mysqli_num_rows($find_singledealerteam);
$team_id = $row_find_singledealerteam['dlr_team_id'];
$dlr_team_photo_url = $row_find_singledealerteam['dlr_team_photo_url'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_team_profile_photos = "SELECT * FROM `idsids_idsdms`.`dealers_teams_photos` WHERE `dealers_teams_photos`.`team_photo_did` = '$did' AND `dealers_teams_photos`.`team_photo_albumname` = 'Profile' AND `dealers_teams_photos`.`team_photo_team_id` = '$team_id' ORDER BY `dealers_teams_photos`.`team_photo_id` DESC";
$find_team_profile_photos = mysqli_query($idsconnection_mysqli, $query_find_team_profile_photos);
$row_find_team_profile_photos = mysqli_fetch_assoc($find_team_profile_photos);
$totalRows_find_team_profile_photos = mysqli_num_rows($find_team_profile_photos);



?>

						 <?php 
						 if($totalRows_find_team_profile_photos != 0):
						 do { 
						 ?>
                         <a id="choose_profile_photo" title="<?php echo $row_find_team_profile_photos['team_photo_albumcomments']; ?>">
                          <img alt="image" src="<?php echo $row_find_team_profile_photos['team_photo_file_path']; ?>" width="120px" />
                         </a> 
						  <?php 
						  } while ($row_find_team_profile_photos = mysqli_fetch_assoc($find_team_profile_photos));
						  
						  else:
						  ?>
						  <p>No Team Images Available </p>
						  
						  <?php
                          endif
						  ?>
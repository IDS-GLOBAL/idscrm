<?php require_once('db.php');  ?>
<?php


$colname_find_singledealerteam = "-1";
if (isset($_GET['team_id'])) {
  $colname_find_singledealerteam = $_GET['team_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_singledealerteam =  "SELECT * FROM `idsids_idsdms`.`dealers_teams` WHERE `dealers_teams`.`dlr_team_id` = '$colname_find_singledealerteam'";
$find_singledealerteam = mysqli_query($idsconnection_mysqli, $query_find_singledealerteam);
$row_find_singledealerteam = mysqli_fetch_assoc($find_singledealerteam);
$totalRows_find_singledealerteam = mysqli_num_rows($find_singledealerteam);
$team_id = $row_find_singledealerteam['dlr_team_id'];
$dlr_team_photo_url = $row_find_singledealerteam['dlr_team_photo_url'];

if($dlr_team_photo_url){
echo $dlr_team_photo_url;
}else{
echo $dlr_team_photo_url;	
//echo 'img/logo.png';
}

?>
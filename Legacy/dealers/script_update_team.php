<?php
	
	include("db_loggedin.php");



if(isset($_POST['dlr_team_id'], $_POST['dlr_team_status'], $_POST['dlr_team_name'], $_POST['dlr_team_description'])):

//	print_r($_POST);

		$dlr_team_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_team_status']));
		$dlr_team_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_team_name']));
		$dlr_team_description = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_team_description']));
		$dlr_team_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_team_id']));
		
		//, $_POST['dlr_news_team_id']
		//$dlr_news_team_id = mysql_real_escape_string($trim($_POST['dlr_news_team_id']));


	$create_new_dealers_team_sql = "
		UPDATE `idsids_idsdms`.`dealers_teams` SET
		`dlr_team_status` = '$dlr_team_status',
		`dlr_team_name` = '$dlr_team_name',
		`dlr_team_description` = '$dlr_team_description'
		WHERE
		`dlr_team_id` = '$dlr_team_id'
	
	";
	
	$ran_new_dealers_team_sql = mysqli_query($idsconnection_mysqli, $create_new_dealers_team_sql) or die(mysqli_connect_error());
	$row_new_dealers_team = mysqli_insert_id($idsconnection_mysqli);

	//print_r($row_new_dealers_team);

	mysqli_close($idsconnection_mysqli);


	

	$dlr_news_team_id = $row_new_dealers_team;
	$dlr_news_profile_pic = 'img/logo.png';
	
	$create_new_dealer_response = "INSERT INTO `idsids_idsdms`.`dealers_news` SET
										`dlr_news_token` = '$tkey',
										`dlr_news_name` = 'Dealer Account',
										`dlr_news_team_id` = '$dlr_team_id',
										`dlr_news_did` = '$did',
										`dlr_news_body` = '$dlr_team_name was just changed. Description: $dlr_team_description',
										`dlr_news_profile_pic` = '$dlr_news_profile_pic'
									";
									
	$run_create_new_dealer_responsestring = mysqli_query($idsconnection_mysqli, $create_new_dealer_response);

endif;

?>
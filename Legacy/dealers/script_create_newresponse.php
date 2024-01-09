<?php

include("db_loggedin.php");

// print_r($_POST);

if(isset($_POST['thisdid'], $_POST['post_msg'], $_POST['dlr_news_id'])){


	$dlr_news_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dlr_news_id']));
	$post_msg = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['post_msg']));
	$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
	$dlr_news_response_profile_pic = 'img/logo.png';
	
$create_new_dealer_news_forsalesperson = "INSERT INTO `idsids_idsdms`.`dealers_news_response` SET
										`dlr_news_response_token` = '$tkey',
										`dlr_news_response_name` = 'Dealer Account',
										`dlr_news_response_news_id` = '$dlr_news_id',
										`dlr_news_response_body` = '$post_msg',
										`dlr_news_response_did` = '$did',
										`dlr_news_response_profile_pic` = '$dlr_news_response_profile_pic'
									";
									
$run_create_new_dealer_news_forsalesperson = mysqli_query($idsconnection_mysqli, $create_new_dealer_news_forsalesperson);

}




?>
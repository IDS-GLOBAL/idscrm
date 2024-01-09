<?php

include("db_loggedin.php");



// print_r($_POST);


if(isset($_POST['dept_did'], $_POST['dept_mgr_id'], $_POST['dept_status'], $_POST['dept_link'], $_POST['dept_name'], $_POST['dept_phoneno'], $_POST['dept_address'], $_POST['monday_open'],  $_POST['monday_closed'], $_POST['tuesday_open'], $_POST['tuesday_closed'], $_POST['wednesday_open'], $_POST['wednesday_closed'], $_POST['thursday_open'], $_POST['thursday_closed'], $_POST['friday_open'], $_POST['friday_closed'], $_POST['saturday_open'], $_POST['saturday_closed'], $_POST['sunday_open'], $_POST['sunday_closed'], $_POST['new_yearseve_comments'], $_POST['sunday_closed'], $_POST['new_yearseve_open'], $_POST['new_yearseve_comments'], $_POST['new_yearseve_close'], $_POST['new_yearseve_open'], $_POST['new_yearsday_comments'], 
$_POST['new_yearseve_close'], $_POST['new_yearsday_open'],  $_POST['new_yearsday_comments'], $_POST['new_yearsday_close'],
$_POST['new_yearsday_open'], $_POST['independence_day_comments'], $_POST['new_yearsday_close'], $_POST['independence_day_open'],
$_POST['independence_day_comments'], $_POST['independence_day_close'], $_POST['independence_day_open'], $_POST['veterans_day_comments'], $_POST['independence_day_close'], $_POST['veterans_day_open'], $_POST['veterans_day_comments'],
$_POST['veterans_day_close'], $_POST['veterans_day_open'], $_POST['blackfriday_comments'], $_POST['veterans_day_close'], $_POST['blackfriday_open'], $_POST['blackfriday_comments'], $_POST['blackfriday_close'], $_POST['blackfriday_open'], $_POST['thanksgiving_comments'], $_POST['blackfriday_close'], $_POST['thanksgiving_open'], $_POST['thanksgiving_comments'], $_POST['thanksgiving_close'], $_POST['thanksgiving_open'], $_POST['christmas_eve_comments'], $_POST['thanksgiving_close'], $_POST['christmas_eve_open'], $_POST['christmas_eve_comments'], $_POST['christmas_eve_close'], $_POST['christmas_eve_open'], $_POST['christmas_day_comments'], $_POST['christmas_eve_close'], $_POST['christmas_day_open'], $_POST['christmas_day_comments'], $_POST['christmas_day_close'], $_POST['christmas_day_open']));


// echo 'I made it';

$dept_did = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dept_did']));
$dept_mgr_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dept_mgr_id']));
$dept_status = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dept_status']));
$dept_link = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dept_link']));
$dept_name = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dept_name']));
$dept_phoneno = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dept_phoneno']));
$dept_address = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dept_address']));
$monday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['monday_open']));
$monday_closed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['monday_closed']));
$tuesday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tuesday_open']));
$tuesday_closed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['tuesday_closed']));
$wednesday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wednesday_open']));
$wednesday_closed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['wednesday_closed']));
$thursday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thursday_open']));
$thursday_closed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thursday_closed']));
$friday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['friday_open']));
$friday_closed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['friday_closed']));
$saturday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['saturday_open']));
$saturday_closed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['saturday_closed']));
$sunday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sunday_open']));
$sunday_closed = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sunday_closed']));


$new_yearseve_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['new_yearseve_comments']));
$new_yearseve_close = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['new_yearseve_close']));
$new_yearseve_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['new_yearseve_open']));

$new_yearsday_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['new_yearsday_comments']));
$new_yearsday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['new_yearsday_open']));
$new_yearsday_close = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['new_yearsday_close']));

$independence_day_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['independence_day_comments']));
$independence_day_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['independence_day_open']));
$independence_day_close = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['independence_day_close']));

$veterans_day_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['veterans_day_comments']));
$veterans_day_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['veterans_day_open']));
$veterans_day_close = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['veterans_day_close']));


$blackfriday_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['blackfriday_comments']));
$blackfriday_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['blackfriday_open']));
$blackfriday_close = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['blackfriday_close']));

$thanksgiving_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thanksgiving_comments']));
$thanksgiving_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thanksgiving_open']));
$thanksgiving_close = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thanksgiving_close']));


$christmas_eve_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['christmas_eve_comments']));
$christmas_eve_close = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['christmas_eve_close']));
$christmas_eve_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['christmas_eve_open']));

$christmas_day_comments = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['christmas_day_comments']));
$christmas_day_open = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['christmas_day_open']));
$christmas_day_close = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['christmas_day_close']));





$create_department_sql = "
	INSERT INTO `idsids_idsdms`.`dealer_depts` SET
		`dept_did` = '$dept_did',
		`dept_mgr_id` = '$dept_mgr_id',
		`dept_status` = '$dept_status',
		`dept_link` = '$dept_link',
		`dept_name` = '$dept_name',
		`dept_phoneno` = '$dept_phoneno',
		`dept_address` = '$dept_address',
		`monday_open` = '$monday_open',
		`monday_closed` = '$monday_closed',
		`tuesday_open` = '$tuesday_open',
		`tuesday_closed` = '$tuesday_closed',
		`wednesday_open` = '$wednesday_open',
		`wednesday_closed` = '$wednesday_closed',
		`thursday_open` = '$thursday_open',
		`thursday_closed` = '$thursday_closed',
		`friday_open` = '$friday_open',
		`friday_closed` = '$friday_closed',
		`saturday_open` = '$saturday_open',
		`saturday_closed` = '$saturday_closed',
		`sunday_open` = '$sunday_open',
		`sunday_closed` = '$sunday_closed',
		`new_yearseve_comments`  = '$new_yearseve_comments',
		`new_yearseve_open`  = '$new_yearseve_open',
		`new_yearseve_close`  = '$new_yearseve_close',
		`new_yearsday_comments`  = '$new_yearsday_comments',
		`new_yearsday_open`  = '$new_yearsday_open',
		`new_yearsday_close` = '$new_yearsday_close',
		`independence_day_comments`  = '$independence_day_comments',
		`independence_day_open` = '$independence_day_open',
		`independence_day_close` = '$independence_day_close',
		`veterans_day_comments`  = '$veterans_day_comments',
		`veterans_day_open`  = '$veterans_day_open',
		`veterans_day_close`  = '$veterans_day_close',
		`blackfriday_comments`  = '$blackfriday_comments',
		`blackfriday_open`  = '$blackfriday_open',
		`blackfriday_close`  = '$blackfriday_close',
		`thanksgiving_comments`  = '$thanksgiving_comments',
		`thanksgiving_open`  = '$thanksgiving_open',
		`thanksgiving_close`  = '$thanksgiving_close',
		`christmas_eve_comments`  = '$christmas_eve_comments',
		`christmas_eve_open`  = '$christmas_eve_open',
		`christmas_eve_close`  = '$christmas_eve_close',
		`christmas_day_comments`  = '$christmas_day_comments',
		`christmas_day_open`  = '$christmas_day_open',
		`christmas_day_close`  = '$christmas_day_close'
";

$run_department_creation = mysqli_query($idsconnection_mysqli, $create_department_sql);

include("inc.end.phpmsyql.php");

?>
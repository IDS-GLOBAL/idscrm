<?php require_once("db_loggedin.php"); ?>
<?php


//print_r($_POST);

if(isset($_POST['thisdid'], $_POST['aHTML'])){
	
	// echo 'I made it bitches!';




    $thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
    $home_page_html = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['aHTML']));



$dealer_website_home_update_sql = "
UPDATE `idsids_idsdms`.`dealers` SET
    `home` = '$home_page_html'
WHERE
    `id` = '$did'
	";

$run_dealer_website_home_update_sql = mysqli_query($idsconnection_mysqli, $dealer_website_home_update_sql);


}





?>
<?php require_once("db_loggedin.php"); ?>
<?php


//print_r($_POST);

if(isset($_POST['dealer_market_id'], $_POST['primary_state'])){
	
	// echo 'I made it bitches!';




    $dealer_market_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dealer_market_id']));
    $primary_state = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['primary_state']));
    //$dealer_market_sub_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['markets_dm']));


//     `dealer_market_sub_id` = '$dealer_market_sub_id'

$dealer_markets_update_sql = "
UPDATE `idsids_idsdms`.`dealers` SET
    `dealer_market_id` = '$dealer_market_id'
WHERE
    `id` = '$did'
	";

$run_dealer_market_update_sql = mysqli_query($idsconnection_mysqli, $dealer_markets_update_sql);


$log_cat_body = "Dealer $did updated markets with market_id = $dealer_market_id AND SUB Market = $dealer_market_sub_id";

$dealer_markets_update_logcat = "
INSERT INTO `idsids_idsdms`.`log_cat` SET
    `log_cat_did` = '$did',
    `log_cat_body` = '$log_cat_body'
";

$run_dealer_markets_update_logcat = mysqli_query($idsconnection_mysqli, $dealer_markets_update_logcat);


}





?>
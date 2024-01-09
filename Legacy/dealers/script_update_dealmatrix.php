<?php

include("db_loggedin.php"); 

//print_r($_POST);

if(isset($_POST['usedmatrixcredit_vgoodcredit'], $_POST['usedmatrixcredit_jgoodcredit'], $_POST['usedmatrixcredit_faircredit'], $_POST['usedmatrixcredit_poorcredit'], $_POST['usedmatrixcredit_subprime'], $_POST['usedmatrixcredit_unknown'], $_POST['usedmatrixcredit_fminimumprofit'], $_POST['usedmatrixcredit_bminimumprofit'], $_POST['newmatrixcredit_vgoodcredit'], $_POST['newmatrixcredit_jgoodcredit'], $_POST['newmatrixcredit_faircredit'], $_POST['newmatrixcredit_poorcredit'], $_POST['newmatrixcredit_subprime'], $_POST['newmatrixcredit_unknown'], $_POST['newmatrixcredit_fminimumprofit'], $_POST['newmatrixcredit_bminimumprofit'], $_POST['usedmatrixcredit_poorcredit'], $_POST['settingDefaultAPR'], $_POST['settingSateSlsTax'], $_POST['settingDocDlvryFee'], $_POST['settingTitleFee'], $_POST['settingStateInspectnFee'])){
	
	// echo 'I made it bitches!';




    $thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
    $usedmatrixcredit_vgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_vgoodcredit']));
    $usedmatrixcredit_jgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_jgoodcredit'])); //
    $usedmatrixcredit_faircredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_faircredit'])); //
    $usedmatrixcredit_poorcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_poorcredit'])); //
    $usedmatrixcredit_subprime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_subprime'])); //
    $usedmatrixcredit_unknown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_unknown'])); //
    $usedmatrixcredit_fminimumprofit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_fminimumprofit'])); //
    $usedmatrixcredit_bminimumprofit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['usedmatrixcredit_bminimumprofit'])); //
    $newmatrixcredit_vgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_vgoodcredit'])); //
    $newmatrixcredit_jgoodcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_jgoodcredit'])); //
    $newmatrixcredit_faircredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_faircredit'])); //
    $newmatrixcredit_poorcredit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_poorcredit'])); //
    $newmatrixcredit_subprime = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_subprime'])); //
    $newmatrixcredit_unknown = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_unknown'])); //
    $newmatrixcredit_fminimumprofit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_fminimumprofit'])); //
    $newmatrixcredit_bminimumprofit = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['newmatrixcredit_bminimumprofit'])); //
    $settingDefaultTerm = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingDefaultTerm'])); //24
    $settingDefaultAPR = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingDefaultAPR'])); //26.00
    $settingSateSlsTax = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingSateSlsTax'])); //6.0
    $settingDocDlvryFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingDocDlvryFee'])); //175.00
    $settingTitleFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingTitleFee'])); //50
    $settingStateInspectnFee = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['settingStateInspectnFee'])); //25



$dealmatrix_update_sql = "
UPDATE `idsids_idsdms`.`dealers` SET
    `usedmatrixcredit_vgoodcredit` = '$usedmatrixcredit_vgoodcredit',
    `usedmatrixcredit_jgoodcredit` = '$usedmatrixcredit_jgoodcredit',
    `usedmatrixcredit_faircredit` = '$usedmatrixcredit_faircredit',
    `usedmatrixcredit_poorcredit` = '$usedmatrixcredit_poorcredit',
    `usedmatrixcredit_subprime` = '$usedmatrixcredit_subprime',
    `usedmatrixcredit_unknown` = '$usedmatrixcredit_unknown',
    `usedmatrixcredit_fminimumprofit` = '$usedmatrixcredit_fminimumprofit',
    `usedmatrixcredit_bminimumprofit` = '$usedmatrixcredit_bminimumprofit',
    `newmatrixcredit_vgoodcredit` = '$newmatrixcredit_vgoodcredit',
    `newmatrixcredit_jgoodcredit` = '$newmatrixcredit_jgoodcredit',
    `newmatrixcredit_faircredit` = '$newmatrixcredit_faircredit',
    `newmatrixcredit_poorcredit` = '$newmatrixcredit_poorcredit',
    `newmatrixcredit_subprime` = '$newmatrixcredit_subprime',
    `newmatrixcredit_unknown` = '$newmatrixcredit_unknown',
    `newmatrixcredit_fminimumprofit` = '$newmatrixcredit_fminimumprofit',
    `newmatrixcredit_bminimumprofit` = '$newmatrixcredit_bminimumprofit',
    `settingDefaultTerm` = '$settingDefaultTerm',
    `settingDefaultAPR` = '$settingDefaultAPR',
    `settingSateSlsTax` = '$settingSateSlsTax',
    `settingDocDlvryFee` = '$settingDocDlvryFee',
    `settingTitleFee` = '$settingTitleFee',
    `settingStateInspectnFee` = '$settingStateInspectnFee'
WHERE
    `id` = '$did'
	";

$run_dealmatrix_update_sql = mysqli_query($idsconnection_mysqli, $dealmatrix_update_sql);


}





?>
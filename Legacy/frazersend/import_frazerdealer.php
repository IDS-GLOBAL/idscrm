<?php 
//*************
//  CSV Import
//*************
require_once("../dwzExport/idsfrazerhack.CsvImport.php");
require_once('../Connections/frazerdms.php');
?>
<?php
//************************************
//  http://www.DwZone-it.com
//  Import Export Tools - CSV Import
//  Version 1.1.7
//************************************
set_time_limit(5600);
$dwzCsvImport_1 = new dwzCsvImport();
$dwzCsvImport_1->Init();
$dwzCsvImport_1->SetExtraData("../");
$dwzCsvImport_1->SetStartOn("ONLOAD", "");
$dwzCsvImport_1->SetProgressBar("@_@200");
$dwzCsvImport_1->SetRedirectPage("");
$dwzCsvImport_1->SetDisplayErrors("true");
$dwzCsvImport_1->SetFilePath("../frazerpush/$frazerid/vehicles.csv");
$dwzCsvImport_1->SetConnection($hostname_frazerdms, $database_frazerdms, $username_frazerdms, $password_frazerdms);
$dwzCsvImport_1->SetTable("frazer_dealer");
$dwzCsvImport_1->SetTableUniqueKey("frazer_dealer_frzno");
$dwzCsvImport_1->SetColIsNum("true");
$dwzCsvImport_1->SetOnDuplicateEntry("Skip");
$dwzCsvImport_1->SetCsvUniqueKey("2");
$dwzCsvImport_1->SetFieldSeparator(",");
$dwzCsvImport_1->SetSkipFirstLine("true");
$dwzCsvImport_1->SetEncloseField("DA");
$dwzCsvImport_1->AddItem("frazer_dealer_email", "Csv", "S", "", "1");
$dwzCsvImport_1->AddItem("frazer_dealer_frzno", "Csv", "Ni", "", "2");
$dwzCsvImport_1->AddItem("frazer_dealer_company", "Csv", "S", "", "3");
$dwzCsvImport_1->AddItem("frazer_dealer_address", "Csv", "S", "", "4");
$dwzCsvImport_1->AddItem("frazer_dealer_city", "Csv", "S", "", "5");
$dwzCsvImport_1->AddItem("frazer_dealer_state", "Csv", "S", "", "6");
$dwzCsvImport_1->AddItem("frazer_dealer_zip", "Csv", "S", "", "7");
$dwzCsvImport_1->AddItem("frazer_dealer_phone", "Csv", "S", "", "8");
$dwzCsvImport_1->Execute();
//***********************
// Csv Import
//***********************
?>
<?php
//***********************
// Csv Import
//***********************
$dwzCsvImport_1->InsertProgressJs();
//***********************
// Csv Import
//***********************
?>
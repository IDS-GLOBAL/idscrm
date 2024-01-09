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
$dwzCsvImport_1->SetTable("frazer_vehicles");
$dwzCsvImport_1->SetTableUniqueKey("vehicle_vin");
$dwzCsvImport_1->SetColIsNum("false");
$dwzCsvImport_1->SetOnDuplicateEntry("Update");
$dwzCsvImport_1->SetCsvUniqueKey("14");
$dwzCsvImport_1->SetFieldSeparator(",");
$dwzCsvImport_1->SetSkipFirstLine("true");
$dwzCsvImport_1->SetEncloseField("DA");
$dwzCsvImport_1->AddItem("vehicle_frazer_id", "Csv", "Ni", "", "2");
$dwzCsvImport_1->AddItem("vehicle_condition", "Csv", "S", "", "9");
$dwzCsvImport_1->AddItem("vehicle_year", "Csv", "Ni", "", "10");
$dwzCsvImport_1->AddItem("vehicle_make", "Csv", "S", "", "11");
$dwzCsvImport_1->AddItem("vehicle_model", "Csv", "S", "", "12");
$dwzCsvImport_1->AddItem("vehicle_trim", "Csv", "S", "", "13");
$dwzCsvImport_1->AddItem("vehicle_vin", "Csv", "S", "", "14");
$dwzCsvImport_1->AddItem("vehicle_stock", "Csv", "S", "", "15");
$dwzCsvImport_1->AddItem("vehicle_mileage", "Csv", "Ni", "", "16");
$dwzCsvImport_1->AddItem("vehicle_exterior_color", "Csv", "S", "", "17");
$dwzCsvImport_1->AddItem("vehicle_interior_color", "Csv", "S", "", "18");
$dwzCsvImport_1->AddItem("vehicle_engine", "Csv", "S", "", "19");
$dwzCsvImport_1->AddItem("vehicle_body", "Csv", "S", "", "20");
$dwzCsvImport_1->AddItem("vehicle_type", "Csv", "S", "", "21");
$dwzCsvImport_1->AddItem("vehicle_transm", "Csv", "S", "", "22");
$dwzCsvImport_1->AddItem("vehicle_drivetrain", "Csv", "S", "", "23");
$dwzCsvImport_1->AddItem("vehicle_cylinders", "Csv", "Ni", "", "24");
$dwzCsvImport_1->AddItem("vehicle_comments", "Csv", "S", "", "25");
$dwzCsvImport_1->AddItem("vehicle_bulkoptions", "Csv", "S", "", "26");
$dwzCsvImport_1->AddItem("vehicle_certified", "Csv", "Ni", "", "27");
$dwzCsvImport_1->AddItem("vehicle_mpg_city", "Csv", "S", "", "28");
$dwzCsvImport_1->AddItem("vehicle_mpg_hwy", "Csv", "S", "", "29");
$dwzCsvImport_1->AddItem("vehicle_mpg_combined", "Csv", "S", "", "30");
$dwzCsvImport_1->AddItem("vehicle_rprice", "Csv", "Ni", "", "31");
$dwzCsvImport_1->AddItem("vehicle_iprice", "Csv", "Ni", "", "32");
$dwzCsvImport_1->AddItem("vehicle_dprice", "Csv", "Ni", "", "33");
$dwzCsvImport_1->AddItem("vehicle_dpack", "Csv", "Ni", "", "34");
$dwzCsvImport_1->AddItem("vehicle_dvcost", "Csv", "S", "", "35");
$dwzCsvImport_1->AddItem("vehicle_daysonlot", "Csv", "Ni", "", "36");
$dwzCsvImport_1->AddItem("vehicle_purchase_date", "Csv", "S", "", "37");
$dwzCsvImport_1->AddItem("vehicle_photos", "Csv", "S", "", "38");
$dwzCsvImport_1->AddItem("vehicle_update_on", "Entered", "S", "$nowtime", "None");
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
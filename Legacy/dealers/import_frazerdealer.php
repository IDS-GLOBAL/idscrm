<?php 
//*************
//  CSV Import
//*************
require_once("../dwzExport/CsvImport.php");
require_once('../Connections/frazerdms.php');
?>
<?php require_once('../Connections/frazerdms.php'); ?>
<?php


$colname_import_frazerid = "-1";
if (isset($_GET['id'])) {
  $colname_import_frazerid = $_GET['id'];
}
mysql_select_db($database_frazerdms, $frazerdms);
$query_import_frazerid =  "SELECT * FROM `idsids_fazerdms`.`frazer_dealer` WHERE `frazer_dealer_email` = $colname_import_frazerid";
$import_frazerid = mysqli_query($idsconnection_mysqli, $query_import_frazerid, $frazerdms);
$row_import_frazerid = mysqli_fetch_assoc($import_frazerid);
$totalRows_import_frazerid = mysqli_num_rows($import_frazerid);

$frazer_dealer_id = $row_import_frazerid['frazer_dealer_id'];

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
$dwzCsvImport_1->SetFilePath("$frazer_file");
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="">
  <input name="csv_import_progress_key" type="hidden" id="csv_import_progress_key" value="<?php echo $dwzCsvImport_1->GetProgressKey(); ?>" />
</form>
</body>
</html>
<?php
mysqli_free_result($import_frazerid);
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

<?php
//*****************
//  Advanced Search
//*****************
require_once("dwzSearch/dwzSearch.php");
?>
<?php require_once('../../../Connections/idsconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Recordset1 = 3;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['Id'])) {
  $colname_Recordset1 = $_GET['Id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_Recordset1 =  "SELECT CITY, NAME, ADDRESS, DataStart, category.category, IDcategory, Visibile FROM clienti inner join category on category.IDcategory = clienti.CATEGORY WHERE Id > %s ORDER BY id", GetSQLValueString($colname_Recordset1, "int"));
$query_limit_Recordset1 =  "%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($idsconnection_mysqli, $query_limit_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysqli_query($idsconnection_mysqli, $query_Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_raCat = "SELECT * FROM category";
$raCat = mysqli_query($idsconnection_mysqli, $query_raCat);
$row_raCat = mysqli_fetch_assoc($raCat);
$totalRows_raCat = mysqli_num_rows($raCat);
?>
<?php
//**************************
//  Advanced Search
//  http://www.DwZone-it.com
//  Version: 1.0.2
//**************************
$dwzSearch_1 = new dwzSearch();
$dwzSearch_1->Init();
$dwzSearch_1->SetFormName("form1");
$dwzSearch_1->SetSubmitName("Submit");
$dwzSearch_1->AddFilter("CITY", "None", "CitySearch", "CITY", "", "S", "0");
$dwzSearch_1->AddFilter("Visibile", "=", "", "visible", "", "B", "0");
$dwzSearch_1->AddFilter("DataStart", "Between", "", "FromDate", "ToDate", "D", "0");
$dwzSearch_1->AddFilter("IDcategory", "=", "", "Category", "", "N", "0");
$dwzSearch_1->SetRecordset($Recordset1, "Recordset1");
$dwzSearch_1->SetSql($query_Recordset1);
$dwzSearch_1->SetConnection($hostname_aaa, $database_aaa, $username_aaa, $password_aaa);
$dwzSearch_1->Create();
if($dwzSearch_1->HasFilter()){
	$dwzSearch_1->FilterRecordset();
}
//**************************
//  Advanced Search
//  End code
//**************************
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="get" action="DbSearch.php">
  <table width="479" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>
      <td colspan="4" align="center">Search form </td>
    </tr>
    <tr>
      <td width="56">City</td>
      <td width="144"><input name="CITY" type="text" id="CITY" value="<?php echo $_REQUEST['CITY'] ?>" /></td>
      <td width="132"><select name="CitySearch" id="CitySearch">
        <option value="All" >All the word</option>
        <option value="One" >One of them</option>
        <option value="=" >Exact value</option>
        <option value="&lt;" >Minor then</option>
        <option value="&lt;=" >Minor or equal</option>
        <option value="&gt;" >Greater then</option>
        <option value="&gt;=" >Greater or equal</option>
        <option value="&lt;&gt;" >Not equal</option>
        <option value="Like" >Like</option>
      </select></td>
      <td width="123" rowspan="3" valign="top"><div align="center">
        <input type="submit" name="Submit" value="Search &gt;&gt;" />
        <br />
        <br />
        <input type="button" name="Submit2" value="Reset" onclick="javascript:location.href='Demo_1.asp'" />
      </div></td>
    </tr>
    <tr>
      <td>Date</td>
      <td colspan="2" nowrap="nowrap">from
        <input name="FromDate" type="text" id="FromDate" value="<?php echo $_REQUEST['FromDate'] ?>" size="15" />
        to
      <input name="ToDate" type="text" id="ToDate" value="<?php echo $_REQUEST['ToDate'] ?>" size="15" /></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><select name="Category" id="Category">
        <option selected="selected" value="" <?php if (!(strcmp("", $_REQUEST['Category']))) {echo "selected=\"selected\"";} ?>>search</option>
        <?php
do {  
?>
        <option value="<?php echo $row_raCat['IdCategory']?>"<?php if (!(strcmp($row_raCat['IdCategory'], $_REQUEST['Category']))) {echo "selected=\"selected\"";} ?>><?php echo $row_raCat['IdCategory']?></option>
        <?php
} while ($row_raCat = mysqli_fetch_assoc($raCat));
  $rows = mysqli_num_rows($raCat);
  if($rows > 0) {
      mysqli_data_seek($raCat, 0);
	  $row_raCat = mysqli_fetch_assoc($raCat);
  }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Visible</td>
      <td><label>
        <input type="checkbox" name="visible" id="visible" />
      </label></td>
      <td><input name="dwzDebug" type="checkbox" id="dwzDebug" value="1" /></td>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>record: <?php echo $totalRows_Recordset1 ?></p>
<table width="500" border="1">
  <tr>
    <td>name</td>
    <td>city</td>
    <td>addredd</td>
    <td>data</td>
    <td>IdCat</td>
    <td>category</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['NAME']; ?></td>
      <td><?php echo $row_Recordset1['CITY']; ?></td>
      <td><?php echo $row_Recordset1['ADDRESS']; ?></td>
      <td><?php echo $row_Recordset1['DataStart']; ?></td>
      <td><?php echo $row_Recordset1['IDcategoria']; ?></td>
      <td><?php echo $row_Recordset1['categoria']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($raCat);
?>

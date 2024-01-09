<?php include("db_loggedin.php"); ?>
<?php
//if(!$row_find_vehicle['vid'])  header("Location: inventory.php");
if($_POST['querysearch']){



//$searchvehicles = '?vehs='.mysql_real_escape_string(trim($_GET['srchvs']));
//$searchleads = '&leads='.mysql_real_escape_string(trim($_GET['srchlds']));
//$searchapps = '&apps='.mysql_real_escape_string(trim($_GET['srchapps']));
//$searchusers = '&usrs='.mysql_real_escape_string(trim($_GET['srchusers']));

//$search_results = $searchvehicles.''.$searchleads.''.$searchapps.''.$searchusers;

$search_results = 'search='.mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['querysearch']));



header("Location: search_results.php?".$search_results);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Search Populating</title>
</head>

<body>
</body>
</html>
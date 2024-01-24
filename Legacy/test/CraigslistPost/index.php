<?php require_once('../../Connections/idsconnection.php'); ?>
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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slctDlr = "SELECT * FROM dealers WHERE id = '23'";
$slctDlr = mysqli_query($idsconnection_mysqli, $query_slctDlr);
$row_slctDlr = mysqli_fetch_assoc($slctDlr);
$totalRows_slctDlr = mysqli_num_rows($slctDlr);
?>
<?php

//include('libs/db_functions.php');

?>
<?php
 
header("Content-Type: application/xml; charset=ISO-8859-1");
 
 
require_once ('mysql_connect.php');                   
 
$query_details = "SELECT * FROM dealers WHERE id = '23'";   
 
$result_details = mysqli_query ($query_details) or die("Query failed with error: ".mysql_error());
 
$row_details = mysql_fetch_array($result_details);                                
 
$xml = '<?xml version="1.0" encoding="ISO-8859-1" ?><rss version="2.0"><channel>';
 
for ($counter = 1; $counter <= count($row_details); $counter += 1)
      {
        $row = $result_details[$counter];                                                        
        $xml.='<title>'. $row['company'] .'</title><description>'. 
        $row['website'].'</description><link>'. $row['website'] .'</link>';            
        $query_items = "SELECT * FROM vehicles WHERE did = ".$counter;                                                                      
        $result_items = mysqli_query ($query_items) or die("Query failed with 
        error: ".mysql_error());                               
 
            while($row = mysql_fetch_array($result_items))
            {            
                $xml .= '<item>
                         <title>'. $row["vid"] .'</title>
                         <link>'. $row["vmake"] .'</link>
                         <description>'. $row["vmodel"].'</description></item>';
            }
 
          }    
 
         $xml .= '</channel>';
         $xml .= '</rss></xml>';
 
        echo $xml;                     
 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
//echo $row_slctDlr['company'];






/*
try 
{
		
	    if (!move_uploaded_file( ... )) {
        throw new Exception('Could not move file');
    	}
		
	


	//include("libs/try.php");
	
    $error = 'Throw this error';
    //throw new Exception($error);
    echo 'Never get here'. "\n";


}
catch (Exception $e)
{

	echo 'Exception caught: ' . $e->getMessage() . "\n";

}



echo 'Is Working';

//include("libs/catch.php");
*/
?>



</body>
</html>
<?php
mysqli_free_result($slctDlr);
?>

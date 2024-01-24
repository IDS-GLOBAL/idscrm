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
$did = 19;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryApp = "SELECT * FROM credit_app_fullblown WHERE applicant_did = $did";
$queryApp = mysqli_query($idsconnection_mysqli, $query_queryApp);
$row_queryApp = mysqli_fetch_assoc($queryApp);
$totalRows_queryApp = mysqli_num_rows($queryApp);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qryVstkno = "SELECT * FROM vehicles WHERE vehicles.did = $did ";
$qryVstkno = mysqli_query($idsconnection_mysqli, $query_qryVstkno);
$row_qryVstkno = mysqli_fetch_assoc($qryVstkno);
$totalRows_qryVstkno = mysqli_num_rows($qryVstkno);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Desk</title>








<!-- Start Vehicle Ajax Script -->
<script>
function showVehicle(str)
{
if (str=="")
  {
  document.getElementById("txtvHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtvHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getvehicle.php?vstock="+str,true);
xmlhttp.send();
}
</script>
<!-- END Vehicle Ajax Script -->








<!-- Start Credit Application Script -->
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?appid="+str,true);
xmlhttp.send();
}
</script>
<!-- END Credit Application Script -->





<!-- Start Search -->
<script>
function showResult(str)
{
if (str.length==0)
  { 
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","livesearch.php?q="+str,true);
xmlhttp.send();
}
</script>
<!-- End Search -->





</head>

<body>

<div>
       <form id="salesDeskQry" name="salesDeskQry" method="post" action="">

	<ul>
      <li>
            	<label>Stock Number:
        <input name="vStockNo" id="vStockNo" type="text" onchange="showVehicle(this.value)" placeholder="Enter Stock Number" />
         </label>
         
               
        <label>Application ID:
            <input type="text" size="30"  onchange="showUser(this.value)">
            <!-- input type="text" size="30" onkeyup="showResult(this.value)" -->
	         <!--input name="creditappID" id="creditappID" type="text" value="" / -->
        </label>
        
        			
        
          
          <input name="customerName" id="customerName" type="text" placeholder="Customer Name"/>
          
        <div id="livesearch"></div> <!--Ajax Results From Live Search -->

                
        </li>
        
        <li>
        <div>
         <table>
            <tr>
			  <td>                   
                <label>VIN: </label>
                  <input name="vVin" id="vVin" type="submit" value="VIN"/>
              </td>
              <td>
            	<div id="txtvHint"><b>Vehicle info will be listed here.</b></div>
              </td>
           </tr>
         </table>
         </div>
        </li>
	</ul>
  </form>    
</div>









<div>
<form id="queryCreditApp" name="queryCreditApp">
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <?php
do {  
?>
  <option value="<?php echo $row_queryApp['credit_app_fullblown_id']?>"><?php echo $row_queryApp['applicant_app_token']?></option>
  <?php
} while ($row_queryApp = mysqli_fetch_assoc($queryApp));
  $rows = mysqli_num_rows($queryApp);
  if($rows > 0) {
      mysqli_data_seek($queryApp, 0);
	  $row_queryApp = mysqli_fetch_assoc($queryApp);
  }
?>
</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

</div>







</body>
</html>
<?php
mysqli_free_result($queryApp);

mysqli_free_result($qryVstkno);
?>

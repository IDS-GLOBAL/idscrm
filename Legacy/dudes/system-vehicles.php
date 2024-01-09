<?php require_once('../Connections/idsconnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Usernamemobi'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Usernamemobi'], $_SESSION['MM_UserGroupmobi'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php


$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_username` = '$colname_userDudes'";
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_vehicles = "SELECT * FROM dealers, vehicles WHERE vehicles.did = dealers.id  AND vehicles.vlivestatus = 1 ORDER BY vehicles.created_at DESC";
$dealer_vehicles = mysqli_query($idsconnection_mysqli, $query_dealer_vehicles);
$row_dealer_vehicles = mysqli_fetch_array($dealer_vehicles);
$totalRows_dealer_vehicles = mysqli_num_rows($dealer_vehicles);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tables</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>


<script type='text/javascript' src='scripts/jquery-1.6.1.min.js'></script>
<script type='text/javascript' src='scripts/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='scripts/jquery.dataTables.columnFilter.js'></script>
<script type='text/javascript' src='scripts/jquery.dataTables.pagination.js'></script>
<link type='text/css' href='css/demo_table_jui.css' rel='stylesheet'/>
<style type="text/css">
@import url("css/custom/sunny/jquery.ui.all.css");
	#dataTable {padding: 0;margin:0;width:100%;}
	#dataTable_wrapper{width:100%;}
	#dataTable_wrapper th {cursor:pointer} 
	#dataTable_wrapper tr.odd {color:#000000; background-color:#ffff00}
	#dataTable_wrapper tr.odd:hover {color:#ffffff; background-color:#ff9900}
	#dataTable_wrapper tr.odd td.sorting_1 {color:#000000; background-color:#ffcc00}
	#dataTable_wrapper tr.odd:hover td.sorting_1 {color:#ffffff; background-color:#ff6600}
	#dataTable_wrapper tr.even {color:#000000; background-color:#ffffff}
	#dataTable_wrapper tr.even:hover, tr.even td.highlighted{color:#eeeeee; background-color:#cc6600}
	#dataTable_wrapper tr.even td.sorting_1 {color:#000000; background-color:#00cccc}
	#dataTable_wrapper tr.even:hover td.sorting_1 {color:#ffffff; background-color:#cc3300}
</style>
</head>
<body>
<div class="container">

  <!-- HEADER -->
  
	<?php include('parts/header.php'); ?>


  <!-- CONTENT -->
  
  
  <div class="content">
    
    <script type="text/javascript">
$(document).ready(function() {
	oTable = $('#dataTable').dataTable({
		"bJQueryUI": true,
		"bScrollCollapse": true,
		"sScrollY": "100%",
		"bAutoWidth": true,
		"bPaginate": true,
		"sPaginationType": "full_numbers", //full_numbers,two_button
		"bStateSave": true,
		"bInfo": true,
		"bFilter": true,
		"iDisplayLength": 20,
		"bLengthChange": true,
		"aLengthMenu": [[20, 50, 100, 200, -1], [20, 50, 100, 200, "All"]]
	});
} );
</script>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" id="dataTable">
	<thead>
		<tr>
			<th>Dealer ID</th>
			<th>Company Name</th>
			<th>Stock</th>
			<th>Year Make Model</th>
			<th>Pricing</th>
			<th>Retail</th>
			<th>GA</th>
			<th>Zip</th>
			<th>Website</th>
			<th>Email & Login</th>
			<th>B Phone No.</th>
			<th>Options</th>

		</tr>
	</thead>
	<tbody>
    
	<!--Loop start, you could use a repeat region here-->
		<?php do { ?>
		  <tr>
		    <td><?php echo $row_dealer_vehicles['id']; ?></td>
		    <td><?php echo $row_dealer_vehicles['company']; ?></td>
		    <td><?php echo $row_dealer_vehicles['vstockno']; ?></td>
		    <td>
			<?php echo $row_dealer_vehicles['vyear']; ?> 
            <?php echo $row_dealer_vehicles['vmake']; ?> 
            <?php echo $row_dealer_vehicles['vmodel']; ?>
            </td>
		    <td><strong>Down: </strong><?php echo $row_dealer_vehicles['vdprice']; ?></td>
		    <td><strong>Retail: </strong><?php echo $row_dealer_vehicles['vrprice']; ?></td>
		    <td><?php echo $row_dealer_vehicles['state']; ?></td>
		    <td><?php echo $row_dealer_vehicles['zip']; ?></td>
		    <td>
            	<a href="http://<?php echo $row_dealer_vehicles['website']; ?>" target="_blank">
					<?php echo $row_dealer_vehicles['website']; ?>
            	</a>
            </td>
		    
		    <td><?php echo $row_dealer_vehicles['email']; ?></td>
		    <td><?php echo $row_dealer_vehicles['phone']; ?></td>
		    <td>
            	<a href="dealer-view-update.php?dealer=<?php echo $row_dealer_vehicles['id']; ?>">
            		<img src="images/tab_icon3.gif" alt="picture" width="24" height="20" class="tabpimpa" />
            	</a>
            </td>
	      </tr>
		<?php } while ($row_dealer_vehicles = mysqli_fetch_array($dealer_vehicles)); ?>
<!--Loop end-->


	</tbody>
</table>
    
    
    
  </div>
  
  
  
  
  
  	<?php //include('parts/all-dealer_vehicles.php'); ?>
  
  
  <!-- FOOTER -->
  
  
  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>

</div>

</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dealer_vehicles);
?>

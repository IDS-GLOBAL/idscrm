<?php require_once('../Connections/idsconnection.php'); ?>
<?php require_once('../Connections/tracking.php'); ?>
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


$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_dlr_update")) {
  $updateSQL =  sprintf("UPDATE dealer_prospects SET contact=%s, contact_phone=%s, contact_phone_type=%s, dmcontact2=%s, dmcontact2_phone=%s, company=%s, website=%s, finance=%s, finance_contact=%s, sales=%s, sales_contact=%s, phone=%s, fax=%s, address=%s, city=%s, `state`=%s, zip=%s, mapframe=%s, disclaimer=%s, status=%s WHERE id=%s",
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['contact_phone'], "text"),
                       GetSQLValueString($_POST['contact_phone_type'], "text"),
                       GetSQLValueString($_POST['dmcontact2'], "text"),
                       GetSQLValueString($_POST['dmcontact2_phone'], "text"),
                       GetSQLValueString($_POST['company'], "text"),
                       GetSQLValueString($_POST['website'], "text"),
                       GetSQLValueString($_POST['finance'], "text"),
                       GetSQLValueString($_POST['finance_contact'], "text"),
                       GetSQLValueString($_POST['sales'], "text"),
                       GetSQLValueString($_POST['sales_contact'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['fax'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['zip'], "text"),
                       GetSQLValueString($_POST['mapframe'], "text"),
                       GetSQLValueString($_POST['disclaimer'], "text"),
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_tracking);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "script_prospect_update.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( sprintf("Location: %s", $updateGoTo));
}

$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  sprintf("SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);

$maxRows_dealers = 5000;
$pageNum_dealers = 0;
if (isset($_GET['pageNum_dealers'])) {
  $pageNum_dealers = $_GET['pageNum_dealers'];
}
$startRow_dealers = $pageNum_dealers * $maxRows_dealers;

$colname_dealers = "-1";
if (isset($_GET['state'])) {
  $colname_dealers = $_GET['state'];
  $state = $_GET['state'];
}
mysql_select_db($database_tracking);
$query_dealers =  sprintf("SELECT * FROM dealer_prospects WHERE `state` = %s ORDER BY `state` ASC", GetSQLValueString($colname_dealers, "text"));
$query_limit_dealers =  sprintf("%s LIMIT %d, %d", $query_dealers, $startRow_dealers, $maxRows_dealers);
$dealers = mysqli_query($idsconnection_mysqli, $query_limit_dealers);
$row_dealers = mysqli_fetch_array($dealers);

if (isset($_GET['totalRows_dealers'])) {
  $totalRows_dealers = $_GET['totalRows_dealers'];
} else {
  $all_dealers = mysqli_query($idsconnection_mysqli, $query_dealers);
  $totalRows_dealers = mysqli_num_rows($all_dealers);
}
$totalPages_dealers = ceil($totalRows_dealers/$maxRows_dealers)-1;

mysql_select_db($database_tracking);
$query_dstates = "SELECT DISTINCT `dealer_prospects`.`state` FROM `dealer_prospects` ORDER BY dealer_prospects.`state` ASC";
$dstates = mysqli_query($idsconnection_mysqli, $query_dstates);
$row_dstates = mysqli_fetch_array($dstates);
$totalRows_dstates = mysqli_num_rows($dstates);

$queryString_dealers = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_dealers") == false && 
        stristr($param, "totalRows_dealers") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_dealers = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_dealers =  sprintf("&totalRows_dealers=%d%s", $totalRows_dealers, $queryString_dealers);
$dudesid = $row_userDudes['dudes_id'];



foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

$colname_dealer_query = "-1";
if (isset($_GET['dealer'])) {
  $colname_dealer_query = $_GET['dealer'];
  $dudes_dlr_notes_did = $colname_dealer_query;
}
mysql_select_db($database_tracking);
$query_dealer_query =  "SELECT * FROM dealer_prospects WHERE id = '$colname_dealer_query'";
$dealer_query = mysqli_query($idsconnection_mysqli, $query_dealer_query);
$row_dealer_query = mysqli_fetch_array($dealer_query);
$totalRows_dealer_query = mysqli_num_rows($dealer_query);
$did = $row_dealer_query['id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Prospect Dealers</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  
    <script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
  <style>
  .ui-menu { width: 150px; }
  </style>
  
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
#statemenu {
	padding: 10px;
}
</style>
<script type="text/javascript">
<!--
function MM_jumpMenuGo(objId,targ,restore){ //v9.0
  var selObj = null;  with (document) { 
  if (getElementById) selObj = getElementById(objId);
  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0; }
}
//-->
</script>
</head>
<body>
<div class="container">

  <!-- HEADER -->
  
	<?php include('parts/header.php'); ?>
    
  <?php if ($totalRows_dealer_query > 0) { // Show if recordset not empty ?>
  
  <div id="dealerProspectUpdateView">
    
    <div class="gadget">
      <div class="gadget_title gradient37 vertsortable_head">
        <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
        <h3>Dealer Information Section</h3>
        </div>
      <div class="gadget_content">
        <div class="subblock">
          <form name="form_dlr_update" action="<?php echo $editFormAction; ?>" method="POST" id="form_dlr_update" class="form_example">
            <ol>
              <li>
                <label for="status"><strong>Account Status Change:</strong>
                  <?php 
			  		$status = $row_dealer_query['status'];
			  		if($status = 0){echo 'Off (Account Is Currently OFF!)';}
					if($status = 1){echo 'ON!!! (Active Account!)';}
					
			  ?>
                  </label>
                <select id="status" name="status" onchange="chngActstat(this)">
                  <option value="0" <?php if (!(strcmp(0, $row_dealer_query['status']))) {echo "selected=\"selected\"";} ?>>Off Status - Disable</option>
                  <option value="1" <?php if (!(strcmp(1, $row_dealer_query['status']))) {echo "selected=\"selected\"";} ?>>On Status - Enable</option>
                  </select>
                </li>
              
              <li>
                <label for="contact"><strong>DM Contact Name</strong> (#1 Owner/Decision Maker Name) </label><input name="id" type="hidden" value="<?php echo $did; ?>" />
                <input name="contact" class="text medium" id="contact" value="<?php echo $row_dealer_query['contact']; ?>" />
                </li>
              <li>
                <label for="Decion_Maker-Info"><strong>DM Contact Information</strong> (#1 Owner/Decision Maker)</label>
                <input name="contact_phone" class="text small" id="contact_phone" value="<?php echo $row_dealer_query['contact_phone']; ?>" />
                <input name="contact_phone_type" class="text small" id="contact_phone_type" value="<?php echo $row_dealer_query['contact_phone_type']; ?>" />
                <div class="clr"></div>
                <label for="contact_phone" class="small">Direct Phone Number</label>                
                <label for="fax" class="small">Phone Type:</label>                
                <div class="clr"></div>
                </li>
              
              <li>
                <label for="contact"><strong>DM Contact Name</strong> (#2 Owner/Decision Maker Name) </label>
                <input name="dmcontact2" class="text medium" id="dmcontact2" value="<?php echo $row_dealer_query['dmcontact2']; ?>" />
                </li>
              
              
              <li>
                <label for="Decion_Maker-Info"><strong>DM Contact Information</strong> (#2 Owner/Decision Maker)</label>
                <input name="contact_phone" class="text small" id="contact_phone" value="<?php echo $row_dealer_query['dmcontact2_phone']; ?>" />
                <input name="dmcontact2_phone" class="text small" id="dmcontact2_phone" value="<?php echo $row_dealer_query['dmcontact2_phone']; ?>" />
                <div class="clr"></div>
                <label for="contact_phone" class="small">Direct Phone Number</label>                
                <label for="fax" class="small">Phone Type:</label>                
                <div class="clr"></div>
                </li>
              
              
              <li>
                <label for="company"><strong>Company Name:</strong> (The Legal Name Of Business)</label>
                <input name="company" class="text large" id="company" value="<?php echo $row_dealer_query['company']; ?>" />
                </li>
              <li>
                <label for="address"><strong>Address</strong> (city state &amp; zip):</label>
                <input name="address" class="text large" id="address" value="<?php echo $row_dealer_query['address']; ?>" />
                </li>
              
              <li>
                <label for="multiply"><strong>Location</strong> (city state &amp; zip):</label>
                <input name="city" class="text small" id="city" value="<?php echo $row_dealer_query['city']; ?>" />
                <input name="state" class="text small" id="state" value="<?php echo $row_dealer_query['state']; ?>" />
                <input name="zip" class="text small" id="zip" value="<?php echo $row_dealer_query['zip']; ?>" />
                <div class="clr"></div>
                <label for="contact_phone" class="small">City</label>                
                <label for="state" class="small">State</label>                
                <label for="zip" class="small">Zip</label>                
                <div class="clr"></div>
                </li>
              
              
              <!-- Webiste -->
              
              <li>
                <label for="website" class="small"><strong>Website Url:</strong></label>
                <input name="website" id="website" value="<?php echo $row_dealer_query['website']; ?>" />
                <div class="clr"></div>
                </li>
              
              <!-- Website -->
              
              
              
              
              <!-- Finance -->
              
              <li>
                <label for="finance" class="small"><strong>Main Phone Number:</strong></label>                
                <label for="finance_c ontact" class="small"><strong>Fax Number:</strong></label>                
                <div class="clr"></div>
                </li>
              
              <li>
                
                <div class="clr"></div>
                <input id="phone" name="phone" class="text small" value="<?php echo $row_dealer_query['phone']; ?>" />
                <input id="fax" name="fax" class="text small" value="<?php echo $row_dealer_query['fax']; ?>" />
                <div class="clr"></div>
                
                </li>
              
              <hr />                
              
              <li>
                <label for="finance_info"><strong>Finance</strong> (Finance Dept. info)</label>
                <input id="finance" name="finance" class="text small" value="<?php echo $row_dealer_query['finance']; ?>" />
                <input id="finance_contact" name="finance_contact" class="text small" value="<?php echo $row_dealer_query['finance_contact']; ?>" />
                <div class="clr"></div>
                <label for="sales_contact" class="small">Finance Contact Name:</label>
                <label for="sales" class="small">Finance Phone:</label>       
                <div class="clr"></div>
                
                <div class="clr"></div>
                
                </li>
              
              
              <!-- Sales -->
              
              <li>
                <label for="sales_info"><strong>Sales</strong> (Sales Dept info.)</label>
                <input id="sales" name="sales" class="text small" value="<?php echo $row_dealer_query['sales']; ?>" />
                <input id="sales_contact" name="sales_contact" class="text small" value="<?php echo $row_dealer_query['sales_contact']; ?>" />
                <div class="clr"></div>
                <label for="sales_contact" class="small">Sales Contact Name:</label>
                <label for="sales" class="small">Sales Phone:</label>       
                <div class="clr"></div>
                </li>
              
              <hr />                
              
              <li>
                <label for="disclaimer"><strong>Map I-Frame:</strong> (Copy & Paste The Goolgle Map Here)</label>
                <textarea id="mapframe" name="mapframe" rows="6" cols="50"><?php echo $row_dealer_query['mapframe']; ?></textarea>
                </li>
              
              
              <hr />
              
              <li>
                <label for="disclaimer"><strong>Disclaimer:</strong> (Create Or Edit Disclaimer Here)</label>
                <textarea id="disclaimer" name="disclaimer" rows="6" cols="50"><?php echo $row_dealer_query['disclaimer']; ?></textarea>
                </li>
              
              
              <!--                  hhhhhhhhhhhhhhhhhhhhhhhhhhhh                  -->
              
              <hr />                
              
              </ol>
            <p>
              <label for="submit">Submit</label>
              <input type="submit" name="submit" id="submit" value="Submit" />
              </p>
            <input type="hidden" name="MM_update" value="form_dlr_update" />
            <input type="hidden" name="MM_update" value="form_dlr_update" />
            </form>
          <p><a href="#">Learn more &raquo;</a></p>
          
          </div>
        </div>
      </div>
    
  </div>
  
  <?php } // Show if recordset not empty ?>
  
  
<!-- CONTENT -->
  <table border="0">
    <tr>
      <td><?php if ($pageNum_dealers > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_dealers=%d%s", $currentPage, 0, $queryString_dealers); ?>">First</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_dealers > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_dealers=%d%s", $currentPage, max(0, $pageNum_dealers - 1), $queryString_dealers); ?>">Previous</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_dealers < $totalPages_dealers) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_dealers=%d%s", $currentPage, min($totalPages_dealers, $pageNum_dealers + 1), $queryString_dealers); ?>">Next</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_dealers < $totalPages_dealers) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_dealers=%d%s", $currentPage, $totalPages_dealers, $queryString_dealers); ?>">Last</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
  <div class="stateselect" id="statemenu"> 
    <form name="form" id="form">
      <select name="jumpMenuState" id="jumpMenuState">
        <option value="" <?php if (!(strcmp("", $row_dstates['state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
        <?php
do {  
?>
        <option value="?state=<?php echo $row_dstates['state']?>"<?php if (!(strcmp($row_dstates['state'], $row_dstates['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_dstates['state']?></option>
        <?php
} while ($row_dstates = mysqli_fetch_array($dstates));
  $rows = mysqli_num_rows($dstates);
  if($rows > 0) {
      mysqli_data_seek($dstates, 0);
	  $row_dstates = mysqli_fetch_array($dstates);
  }
?>
      </select>
      <input type="button" name="go_button" id= "go_button" value="Go" onclick="MM_jumpMenuGo('jumpMenuState','parent',0)" />
    </form>
  Content for class "stateselect" id "statemenu" Goes Here</div>
  
  
  
  
  
  
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
		"iDisplayLength": 100,
		"bLengthChange": true,
		"aLengthMenu": [[500, 1000, 2500, 5000, -1], [500, 1000, 2500, 5000, "All"]]
	});
} );
</script>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" id="dataTable">
	<thead>
		<tr>
			<th>Dealer ID</th>
			<th>Status</th>
			<th>Company Name</th>
			<th>City</th>
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
		    <td><a href="?state=<?php echo $state; ?>&dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_dealers['id']; ?></a></td>
    <td><a href="?state=<?php echo $state; ?>&dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger">
				<?php 
					$status = $row_dealers['status'];
					if(!$status){ echo ''; }
					if($status == 0){ echo 'OFF'; }
					if($status == 1){ echo 'ON'; }
				?>
				</a>
            </td>
		    <td><a href="dealer-prospect-update.php?dealer=<?php echo $row_dealers['id']; ?>?dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_dealers['company']; ?></a></td>
		    <td><a href="?state=<?php echo $state; ?>&dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_dealers['city']; ?></a></td>
		    <td><a href="?state=<?php echo $state; ?>&dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_dealers['state']; ?></a></td>
		    <td><a href="dealer-prospect-update.php?dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_dealers['zip']; ?></a></td>
		    <td>
            	<a href="dealer-prospect-update.php?dealer=<?php echo $row_dealers['id']; ?>" target="_blank">
					<?php echo $row_dealers['website']; ?>
            	</a>
            </td>
		    
		    <td><a href="?state=<?php echo $state; ?>&dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_dealers['email']; ?></a></td>
		    <td><a href="?state=<?php echo $state; ?>&dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger"><?php echo $row_dealers['phone']; ?></a></td>
<td>
<a href="dealer-prospect-update.php?dealer=<?php echo $row_dealers['id']; ?>" class="ajaxtrigger"target="_blank">
            		<img src="images/tab_icon3.png" alt="picture" width="24" height="20" class="tabpimpa" />
            	</a>
            </td>
	      </tr>
		<?php } while ($row_dealers = mysqli_fetch_array($dealers)); ?>
<!--Loop end-->


	</tbody>
</table>
    
    
    
</div>
  
  
  
  
  
  	<?php //include('parts/all-dealers.php'); ?>
  
  
  <!-- FOOTER -->
  
  
  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>

</div>

</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dealers);

mysqli_free_result($dstates);
?>

<?php require_once('../Connections/idsconnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
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

$colname_userSets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userSets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userSets =  "SELECT * FROM sales_person WHERE salesperson_email = %s", GetSQLValueString($colname_userSets, "text"));
$userSets = mysqli_query($idsconnection_mysqli, $query_userSets);
$row_userSets = mysqli_fetch_assoc($userSets);
$totalRows_userSets = mysqli_num_rows($userSets);
$sid = $row_userSets['salesperson_id']; //$sid
$sidmaindid = $row_userSets['main_dealerid']; //$did
$did = $row_userSets['main_dealerid']; //$did

foreach ($row_userSets as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_salespersoninventory = "SELECT * FROM vehicles WHERE did = $sidmaindid";
$salespersoninventory = mysqli_query($idsconnection_mysqli, $query_salespersoninventory);
$row_salespersoninventory = mysqli_fetch_assoc($salespersoninventory);
$totalRows_salespersoninventory = mysqli_num_rows($salespersoninventory);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pure_customers = "SELECT * FROM customers WHERE customer_sales_person_id = '$sid' OR customer_sales_person2_id = '$sid'";
$pure_customers = mysqli_query($idsconnection_mysqli, $query_pure_customers);
$row_pure_customers = mysqli_fetch_assoc($pure_customers);
$totalRows_pure_customers = mysqli_num_rows($pure_customers);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_customerAppts2 = "SELECT * FROM customers WHERE `customer_sales_person_id` = '$sid' OR `customer_sales_person2_id` = '$sid' AND `customer_date_td` IS NOT NULL";
$customerAppts2 = mysqli_query($idsconnection_mysqli, $query_customerAppts2);
$row_customerAppts2 = mysqli_fetch_assoc($customerAppts2);
$totalRows_customerAppts2 = mysqli_num_rows($customerAppts2);


?>
<?php
include('../Libary/functionShowVehiclePhoto.php');

include('../Libary/functionSalesPersonNotification.php');

include('../Libary/token-generator.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Appointments</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>



<link href='../test/JQuery-FullCalendar/fullcalendar-1.6.1/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='../test/JQuery-FullCalendar/fullcalendar-1.6.1/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<!--script src='../test/JQuery-FullCalendar/fullcalendar-1.6.1/jquery/jquery-1.9.1.min.js'></script -->
<script src='../test/JQuery-FullCalendar/fullcalendar-1.6.1/jquery/jquery-ui-1.10.2.custom.min.js'></script>
<script src='../test/JQuery-FullCalendar/fullcalendar-1.6.1/fullcalendar/fullcalendar.min.js'></script>
<script>


	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				//right: 'month,basicWeek,basicDay'
				right: 'month,agendaWeek,agendaDay'
				
			},
			editable: true,
			
			
			events: [
					
					<?php do { ?>
						<?php
						$id = $row_customerAppts2['customer_id'];
						$title = $row_customerAppts2['customer_title']; 
						$fname = $row_customerAppts2['customer_fname'];
						$lname = $row_customerAppts2['customer_lname'];
						$title = "$title $fname $lname";
						$hour = $row_customerAppts2['customer_hour_td'];
						$minu = $row_customerAppts2['customer_min_td'];
						if(!$minu){$ampm = '';}else{$ampm = ':00';}
						?>
							{
								title  : '<?php echo $title; ?>',
								start  : '<?php echo $row_customerAppts2['customer_date_td']; ?> <?php echo "$hour$minu$ampm"; ?>',
								url: 'customer-update.php?customerid=<?php echo $id; ?>',
								allDay : false // will make the time show

							},
<?php } while ($row_customerAppts2 = mysqli_fetch_assoc($customerAppts2)); ?>                                            

							{
								title  : 'End Of The Month',
								start  : '07/31/2013 19:00:30',
								allDay : false // will make the time show
							},
							{
								title  : 'End Of The Month',
								start  : '08/31/2013 19:00:00',
								allDay : false // will make the time show
							},
							{
								title  : 'End Of The Month',
								start  : '09/31/2013 19:00:00',
								allDay : false // will make the time show
							},
							{
								title  : 'End Of The Month',
								start  : '10/31/2013 19:00:00',
								allDay : false // will make the time show
							},
							{
								title  : 'End Of The Month',
								start  : '11/31/2013 19:00:00',
								allDay : false // will make the time show
							},
							{
								title  : 'Happy New Years',
								start  : '12/31/2013 19:00:00',
								allDay : false // will make the time show
							}
							
							
					]
		});
		
	});
</script>

<style>


</style>
	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* Fix IE6 Transparent PNG */
	  DD_belatedPNG.fix('.logo, ul#dashboard-buttons li a, .response-msg, #search-bar input');

	</script>
	<![endif]-->



<script type='text/javascript' src='scripts/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='scripts/jquery.dataTables.columnFilter.js'></script>
<script type='text/javascript' src='scripts/jquery.dataTables.pagination.js'></script>
<link type='text/css' href='css/demo_table_jui.css' rel='stylesheet'/>
<style type="text/css">
@import url("css/custom/redmond/jquery.ui.all.css");
	#dataTable {padding: 0;margin:0;width:100%;}
	#dataTable_wrapper{width:100%; height:100%;}
	#dataTable_wrapper th {cursor:pointer} 
	#dataTable_wrapper tr.odd {color:#000000; background-color:#ffffff}
	#dataTable_wrapper tr.odd:hover {color:#333333; background-color:#cccccc}
	#dataTable_wrapper tr.odd td.sorting_1 {color:#ffffff; background-color:#ffcc00}
	#dataTable_wrapper tr.odd:hover td.sorting_1 {color:#000000; background-color:#666666}
	#dataTable_wrapper tr.even {color:#ffffff; background-color:#666666}
	#dataTable_wrapper tr.even:hover, tr.even td.highlighted{color:#eeeeee; background-color:#00cccc}
	#dataTable_wrapper tr.even td.sorting_1 {color:#ffffff; background-color:#66ccff}
	#dataTable_wrapper tr.even:hover td.sorting_1 {color:#333333; background-color:#ffff00}
</style>



</head>
<body>
<div class="container">
  <!-- HEADER -->
  
  <?php include('parts/top-header.php') ?>
<!-- CONTENT -->
  <div class="content">

    <!-- Calendar -->
    <div class="block_gr2 vertsortable">

      <!-- gadget left 1 
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Inventory Account Preview <span>View & Add Inventory...</span></h3>
          <div class="gadget_content">
            <h3>Choose One Of The Options  Below</h3>
            <p>+
           	  <a href="add-inventory.php">Add Inventory &raquo;</a> |
                <a href="inventory-pdf.php">Print PDF &raquo;</a>
            </p>
          </div>
        </div>
      </div>
      -->



<div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3> Your Appointment Calendar<span> Of Your Customers</span></h3>
          <div class="gadget_content">

                    <div id='calendar'></div>

				

          </div>
        </div>
      </div>


    </div>

    <!-- GREAT BLOCK -->
    <div class="block_gr2 vertsortable">

      <!-- gadget left 1 
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Inventory Account Preview <span>View & Add Inventory...</span></h3>
          <div class="gadget_content">
            <h3>Choose One Of The Options  Below</h3>
            <p>+
           	  <a href="add-inventory.php">Add Inventory &raquo;</a> |
                <a href="inventory-pdf.php">Print PDF &raquo;</a>
            </p>
          </div>
        </div>
      </div>
      -->



<div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3> Appointment Log:<span></span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <script type="text/javascript">
$(document).ready(function() {
	oTable = $('#dataTable').dataTable({
		"bJQueryUI": true,
		"bRetrieve": true,
		"bScrollCollapse": false,
		"sScrollY": "500px",
		"bAutoWidth": true,
		"bPaginate": true,
		"sPaginationType": "two_button", //full_numbers,two_button
		"bStateSave": false,
		"bInfo": true,
		"bFilter": true,
		"iDisplayLength": 25,
		"bLengthChange": true,
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
	});
} );
</script>
<table cellpadding="10" cellspacing="5" border="0" id="dataTable">
	<thead>
		<tr>
		  <th>Date</th>
		  <th>Appt. Time</th>
		  <th>Customer No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Vehicle</th>

		</tr>
	</thead>
	<tbody>
	<!--Loop start, you could use a repeat region here-->
    
                <?php do { ?>
                  <?php
				$title = $row_pure_customers['customer_title']; 
				$fname = $row_pure_customers['customer_fname'];
				$lname = $row_pure_customers['customer_lname']; 
				$name= "$title $fname $lname";
				
				$cvid=$row_pure_customers['customer_vehicles_id'];
				?>
                  <tr>
                    <td><a href="customer-update.php?customerid=<?php echo $row_pure_customers['customer_id']; ?>"><?php echo $row_pure_customers['customer_date_td']; ?></a></td>
                    <td><?php echo $row_pure_customers['customer_hour_td']; ?><?php echo $row_pure_customers['customer_min_td']; ?></td>
                    <td><a href="<?php echo $row_pure_customers['customer_id']; ?>">No. <?php echo $row_pure_customers['customer_no']; ?></a></td>
                    <td><?php echo $row_pure_customers['customer_email']; ?></td>
                    <td><?php echo $name; ?></td>
                    <td>
                      M: <?php echo $row_pure_customers['customer_cellphone']; ?><br>
                      H: <?php echo $row_pure_customers['customer_phoneno']; ?><br>
                      W: <?php echo $row_pure_customers['customer_employer_phone']; ?><br>
                    </td>
                    <td><?php echo showphoto($cvid); ?></td>
                  </tr>
                  <?php } while ($row_pure_customers = mysqli_fetch_assoc($pure_customers)); ?>
                <?php if ($totalRows_pure_customers == 0) { // Show if recordset empty ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Other browsers</td>
    <td>All others</td>
    <td>-</td>
    <td>
      M: <?php echo $row_pure_customers['customer_cellphone']; ?><br>
      H: <?php echo $row_pure_customers['customer_phoneno']; ?><br>
      W: <?php echo $row_pure_customers['customer_employer_phone']; ?><br>
    </td>
    <td>&nbsp;
    
    </td>
  </tr>
  <?php } // Show if recordset empty ?>
<!--Loop end-->
	</tbody>
</table>
            </form>
          </div>
        </div>
      </div>




      <!-- gadget usertable -->
<!--
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Customers <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th width="40" class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Username</th>
                <th width="90">Date</th>
                <th width="120">Location</th>
                <th>E-mail</th>
                <th width="50">Actions</th>
              </tr>
              <tr>
                <td><input name="utc2" id="utc2" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mwwweefail@yahoo.com">mwwweefail@yahoo.com</a></td>
                <td width="28"><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
              <tr>
                <td><input name="utc3" id="utc3" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mail@yahoo.com">mail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
              <tr class="last">
                <td><input name="utc4" id="utc4" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:m13dail@yahoo.com">m13dail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
            </table>
            </form>
          </div>
        </div>
      </div>
-->
    </div>


    <!-- SMALLER BLOCK -->

    <?php //include('parts/inventory-tower.php') ?>
<div class="clr"></div>
  </div>
  
  <!-- FOOTER -->

	
	<?php include('parts/sales_footer.php') ?>

  
  <!-- DIALOGS -->
  <div id="dialogboxes">
    <!-- dialog 1 -->
    <div id="dialog1" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
          <h3>Thank you for <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's standard dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.<br /><br /></p>
            <p><a href="#" class="bg_grey">Start Demo - Login Now</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- dialog 2 -->
    <div id="dialog2" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
          <h3>Welcome to Admin Area <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's standard dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.</p>
            <div class="gadget jsi_msg jsi_msg_yellow"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
            <div class="gadget jsi_msg jsi_msg_red"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
            <form action="" method="post" id="loginform" class="form_login">
            <ol><li>
              <label for="login">Your Login:</label>
              <input id="login" name="login" class="text" />
              <div class="clr"></div>
            </li><li>
              <label for="pwd">Your Password:</label>
              <input id="pwd" name="pwd" class="text" type="password" />
              <div class="clr"></div>
            </li></ol>
            </form>
            <p class="bot24px"><a href="#" class="blackbutton">Start Demo - Login Now</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Mask to cover the whole screen -->
    <div id="mask"></div>
  </div>
  
</div>

</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($salespersoninventory);

mysqli_free_result($pure_customers);
?>

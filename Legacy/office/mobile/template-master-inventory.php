<?php require_once('../../Connections/idsconnection.php'); ?>
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
$query_userDudes =  sprintf("SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";
foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM dealers_pending ORDER BY id ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_DlrTickets = "SELECT * FROM ticket_submit_dlr";
$DlrTickets = mysqli_query($idsconnection_mysqli, $query_DlrTickets);
$row_DlrTickets = mysqli_fetch_array($DlrTickets);
$totalRows_DlrTickets = mysqli_num_rows($DlrTickets);

$colname_myDealer = "-1";
if (isset($_GET['id'])) {
  $colname_myDealer = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_myDealer =  sprintf("SELECT * FROM dealers WHERE id = %s", GetSQLValueString($colname_myDealer, "int"));
$myDealer = mysqli_query($idsconnection_mysqli, $query_myDealer);
$row_myDealer = mysqli_fetch_array($myDealer);
$totalRows_myDealer = mysqli_num_rows($myDealer);
$did = $row_myDealer['id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydealerLeads = "SELECT * FROM cust_leads WHERE cust_dealer_id = '$did' ORDER BY cust_lead_created_at DESC";
$mydealerLeads = mysqli_query($idsconnection_mysqli, $query_mydealerLeads);
$row_mydealerLeads = mysqli_fetch_array($mydealerLeads);
$totalRows_mydealerLeads = mysqli_num_rows($mydealerLeads);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydealerInventoryLive = "SELECT * FROM vehicles WHERE vlivestatus = '1' AND vehicles.did = '$did'";
$mydealerInventoryLive = mysqli_query($idsconnection_mysqli, $query_mydealerInventoryLive);
$row_mydealerInventoryLive = mysqli_fetch_array($mydealerInventoryLive);
$totalRows_mydealerInventoryLive = mysqli_num_rows($mydealerInventoryLive);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>jQuery Mobile Nested List : Jquery-Inventory</title>
<link type='text/css' href='jquery.mobile-1.0/jquery.mobile-1.0.css' rel='stylesheet'/>
<link type='text/css' href='css/jqm-docs.css' rel='stylesheet'/>
<script type='text/javascript' src='jquery.mobile-1.0/jquery-1.6.4.min.js'></script>
<script type='text/javascript' src='jquery.mobile-1.0/jquery.mobile-1.0.min.js'></script>
</head>

<body>
<div data-role="page">
        <div id="jqm-homeheader">
				  <h1 id="jqm-logo"><img src="images/jquery-mobile-logo-small.png" alt="jQuery Mobile Framework" /></h1>
				  <p>A Touch-Optimized Web Framework for Smartphones &amp; Tablets</p>
			  </div>
				<div data-role="content" data-theme="a">
					<ul data-role="listview" data-filter="true" data-inset="true">
					  
			      <li data-theme="a">
				      <h3>Animals</h3>
				      <p>All your favorites from aarkvarks to zebras.</p>
			
				      <ul data-theme="a">

					      <li>Pets
						      <ul data-theme="a">
							      <li><a href="index.html">Canary</a></li>
							      <li><a href="index.html">Cat</a></li>
							      <li><a href="index.html">Dog</a></li>
							      <li><a href="index.html">Gerbil</a></li>
							      <li><a href="index.html">Iguana</a></li>

							      <li><a href="index.html">Mouse</a></li>
						      </ul>
					      </li>
					      <li>Farm animals
						      <ul data-theme="a">
							      <li><a href="index.html">Chicken</a></li>
							      <li><a href="index.html">Cow</a></li>
							      <li><a href="index.html">Duck</a></li>

							      <li><a href="index.html">Horse</a></li>
							      <li><a href="index.html">Pig</a></li>
							      <li><a href="index.html">Sheep</a></li>
						      </ul>
					      </li>
					      <li>Wild animals
						      <ul data-theme="a">
							      <li><a href="index.html">Aardvark</a></li>

							      <li><a href="index.html">Alligator</a></li>
							      <li><a href="index.html">Ant</a></li>
							      <li><a href="index.html">Bear</a></li>
							      <li><a href="index.html">Beaver</a></li>
							      <li><a href="index.html">Cougar</a></li>
							      <li><a href="index.html">Dingo</a></li>

							      <li><a href="index.html">Eagle</a></li>
							      <li><a href="index.html">Elephant</a></li>
							      <li><a href="index.html">Ferret</a></li>
							      <li><a href="index.html">Frog</a></li>
							      <li><a href="index.html">Giraffe</a></li>
							      <li><a href="index.html">Lion</a></li>

							      <li><a href="index.html">Monkey</a></li>
							      <li><a href="index.html">Panda bear</a></li>
							      <li><a href="index.html">Polar bear</a></li>
							      <li><a href="index.html">Tiger</a></li>
							      <li><a href="index.html">Zebra</a></li>
						      </ul>

					      </li>
				      </ul>
			      </li>
			      <li>

				      <h3>Colors</h3>
				      <p>Fresh colors from the magic rainbow.</p>
	
				      <ul data-theme="a">

					      <li><a href="index.html">Blue</a></li>
					      <li><a href="index.html">Green</a></li>
					      <li><a href="index.html">Orange</a></li>
					      <li><a href="index.html">Purple</a></li>
					      <li><a href="index.html">Red</a></li>
					      <li><a href="index.html">Yellow</a></li>

					      <li><a href="index.html">Violet</a></li>
				      </ul>
			      </li>
			      <li>
				      <h3>Vehicles</h3>
				      <p>Everything from cars to planes.</p>
				
				      <ul data-theme="a">

					      <li>Cars
						      <ul data-theme="a">
							      <li><a href="index.html">Acura</a></li>
							      <li><a href="index.html">Audi</a></li>
							      <li><a href="index.html">BMW</a></li>
							      <li><a href="index.html">Cadillac</a></li>
							      <li><a href="index.html">Chrysler</a></li>

							      <li><a href="index.html">Dodge</a></li>
							      <li><a href="index.html">Ferrari</a></li>
							      <li><a href="index.html">Ford</a></li>
							      <li><a href="index.html">GMC</a></li>
							      <li><a href="index.html">Honda</a></li>
							      <li><a href="index.html">Hyundai</a></li>

							      <li><a href="index.html">Infiniti</a></li>
							      <li><a href="index.html">Jeep</a></li>
							      <li><a href="index.html">Kia</a></li>
							      <li><a href="index.html">Lexus</a></li>
							      <li><a href="index.html">Mini</a></li>
							      <li><a href="index.html">Nissan</a></li>

							      <li><a href="index.html">Porsche</a></li>
							      <li><a href="index.html">Subaru</a></li>
							      <li><a href="index.html">Toyota</a></li>
							      <li><a href="index.html">Volkswagon</a></li>
							      <li><a href="index.html">Volvo</a></li>
						      </ul>

					      </li>
					      <li>Planes
						      <ul data-theme="a">
							      <li><a href="index.html">Boeing</a></li>
							      <li><a href="index.html">Cessna</a></li>
							      <li><a href="index.html">Derringer</a></li>
							      <li><a href="index.html">Embraer</a></li>

							      <li><a href="index.html">Gulfstream</a></li>
							      <li><a href="index.html">Piper Aircraft</a></li>
							      <li><a href="index.html">Raytheon</a></li>
						      </ul>
					      </li>
					      <li>Construction
						      <ul data-theme="a">
							      <li><a href="index.html">Caterpillar</a></li>

							      <li><a href="index.html">Ford</a></li>
							      <li><a href="index.html">John Deere</a></li>

						      </ul>
					      </li>				
				      </ul>
			      </li>
            
            
					</ul>
				</div>
			</div>
</body>
</html>
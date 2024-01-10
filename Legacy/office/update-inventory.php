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


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_example")) {
  $updateSQL = sprintf( "UPDATE vehicles SET dudes_id=%s, vlivestatus=%s, vDateInStock=%s, vtrim=%s, vvin=%s, vcondition=%s, vcertified=%s, vstockno=%s, vmileage=%s, vpurchasecost=%s, vrprice=%s, vdprice=%s, vspecialprice=%s, vecolor=%s, vicolor=%s, vecolor_txt=%s, vicolor_txt=%s, vcustomcolor=%s, vbody=%s, vtransm=%s, vengine=%s, vdoors=%s, Air_Conditioning=%s, Alloy_Wheels=%s, AntiLock_Brakes=%s, Child_Seat=%s, Cruise_Control=%s, Driver_Air_Bag=%s, Keyless_Entry=%s, Leather_Seats=%s, On_Star_Equipped=%s, Rear_Ent_Center=%s, Navigation_System=%s, Passenger_Air_Bag=%s, Power_Door_Locks=%s, Power_Mirrors=%s, Power_Seats=%s, Power_Steering=%s, Power_Windows=%s, Memory_Seats=%s, Rear_Air_Conditioning=%s, Rear_Window_Defroster=%s, Rear_Wiper=%s, Side_Air_Bag=%s, SunroofMoonroof=%s, Television=%s, Tilt_Wheel=%s, Tinted_Glass=%s, Sliding_Doors=%s, CD_Player=%s, CD_Changer=%s, Bluetooth=%s, Satellite_Radio=%s, carfax=%s, autocheck=%s, vcomments=%s WHERE vid=%s",
                       GetSQLValueString($_POST['dudes_id'], "int"),
                       GetSQLValueString($_POST['vlivestatus'], "int"),
                       GetSQLValueString($_POST['vDateInStock'], "text"),
                       GetSQLValueString($_POST['vtrim'], "text"),
                       GetSQLValueString($_POST['vvin'], "text"),
                       GetSQLValueString($_POST['vcondition'], "text"),
                       GetSQLValueString(isset($_POST['vcertified']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['vstockno'], "text"),
                       GetSQLValueString($_POST['vmileage'], "text"),
                       GetSQLValueString($_POST['vpurchasecost'], "text"),
                       GetSQLValueString($_POST['vrprice'], "text"),
                       GetSQLValueString($_POST['vdprice'], "text"),
                       GetSQLValueString($_POST['vspecialprice'], "int"),
                       GetSQLValueString($_POST['vecolor'], "text"),
                       GetSQLValueString($_POST['vicolor'], "text"),
                       GetSQLValueString($_POST['vecolor_txt'], "text"),
                       GetSQLValueString($_POST['vicolor_txt'], "text"),
                       GetSQLValueString($_POST['vcustomcolor'], "text"),
                       GetSQLValueString($_POST['vbody'], "text"),
                       GetSQLValueString($_POST['vtransm'], "text"),
                       GetSQLValueString($_POST['vengine'], "text"),
                       GetSQLValueString($_POST['vdoors'], "text"),
                       GetSQLValueString(isset($_POST['Air_Conditioning']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Alloy_Wheels']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['AntiLock_Brakes']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Child_Seat']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Cruise_Control']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Driver_Air_Bag']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Keyless_Entry']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Leather_Seats']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['On_Star_Equipped']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Rear_Ent_Center']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Navigation_System']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Passenger_Air_Bag']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Power_Door_Locks']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Power_Mirrors']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Power_Seats']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Power_Steering']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Power_Windows']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Memory_Seats']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Rear_Air_Conditioning']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Rear_Window_Defroster']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Rear_Wiper']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Side_Air_Bag']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['SunroofMoonroof']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Television']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Tilt_Wheel']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Tinted_Glass']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Sliding_Doors']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['CD_Player']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['CD_Changer']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Bluetooth']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Satellite_Radio']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['carfax'], "int"),
                       GetSQLValueString($_POST['autocheck'], "int"),
                       GetSQLValueString($_POST['vcomments'], "text"),
                       GetSQLValueString($_POST['vid'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $updateSQL);

  $updateGoTo = "script_update_inventory.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: $updateGoTo");
}

$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =   sprintf("SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
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

$colname_query_vehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_query_vehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_vehicle =   sprintf("SELECT * FROM vehicles, dealers WHERE dealers.id = vehicles.did AND vehicles.vid = %s", GetSQLValueString($colname_query_vehicle, "int"));
$query_vehicle = mysqli_query($idsconnection_mysqli, $query_query_vehicle);
$row_query_vehicle = mysqli_fetch_array($query_vehicle);
$totalRows_query_vehicle = mysqli_num_rows($query_vehicle);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_colors_hex = "SELECT * FROM colors_hex ORDER BY colors_hex.color_name";
$colors_hex = mysqli_query($idsconnection_mysqli, $query_colors_hex);
$row_colors_hex = mysqli_fetch_array($colors_hex);
$totalRows_colors_hex = mysqli_num_rows($colors_hex);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Vehicle Inventory</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->


<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      numberOfMonths: 1,
      showButtonPanel: true
    });
  });

  $(function() {
    $( "#datepicker2" ).datepicker({
      numberOfMonths: 3,
      showButtonPanel: true
    });
  });

</script>


<script type="text/javascript" src="js/idsdudes.js"></script>


</head>
<body>
<div class="container">

  <!-- HEADER -->
  <?php include('parts/header.php'); ?>

  <!-- CONTENT -->
  <div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      <div class="leftblock vertsortable">

        <!-- gadget left 1 -->
        

        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_content">
            <div class="subblock">
              <a href="#"><img src="images/icon_l1.gif" alt="picture" width="32" height="26" class="leftimg" /></a>
              <p class="msg_cnt">12</p><p class="msg_lnk"><a href="#"><strong>Messages &raquo;</strong></a></p>
            </div>
          </div>
        </div>

        <!-- gadget left 3 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Dashboard</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <ul class="grayarrow withlines">
                <li class="first"><a href="#">Admin area example</a></li>
                <li><a href="#">Forms and fields area example</a></li>
                <li class="last"><a href="#">Tables area example</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- gadget left 4 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>News of the day</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <a href="#"><img src="images/icon_l2.gif" alt="picture" width="32" height="26" class="leftimg" /></a>
              <h4 class="big">Notice</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting<br /><a href="#"><strong>Learn More &raquo;</strong></a></p>
            </div>
          </div>
        </div>

        <!-- gadget left 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Quick contact form</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_quickcontact" class="form_quickcontact">
              <ol><li>
                <label for="name">Your name:</label>
                <input id="name" name="name" class="text" />
                <div class="clr"></div>
              </li><li>
                <label for="email">Your contact email:</label>
                <input id="email" name="email" class="text" />
                <div class="clr"></div>
              </li><li>
                <label for="message">Your questons &amp; comments:</label>
                <textarea id="message" name="message" rows="6" cols="50"></textarea>
                <div class="clr"></div>
              </li><li>
                <a href="#" class="gradient37">Contact us now</a>
                <!-- <input type="image" name="imageField" id="imageField" src="images/button_send.gif" class="send" /> -->
                <div class="clr"></div>
              </li></ol>
              </form>
            </div>
          </div>
        </div>

      </div>

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Form Example 1</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>Previewing: "<?php echo $row_query_vehicle['vyear']; ?> <?php echo $row_query_vehicle['vmake']; ?> <?php echo $row_query_vehicle['vmodel']; ?> <?php echo $row_query_vehicle['vtrim']; ?>&quot;</p>
              <p>This Vehicle Belongs To: <strong><a href="dealer-view-update.php?dealer=<?php echo $row_query_vehicle['id']; ?>"><?php echo $row_query_vehicle['company']; ?></a></strong></p>
              <p><a href="#">Change Year Make Model Here</a></p>
            </div>
          </div>
        </div>
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Form Example 2</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form name="form_example" action="<?php echo $editFormAction; ?>" method="POST" id="form_example" class="form_example">
              <ol>
              <li>
                  <label for="multiply"><strong>
                    <input name="vid" type="hidden" id="vid" value="<?php echo $row_query_vehicle['vid']; ?>" />
                    <input name="dudes_id" type="hidden" id="dudes_id" value="<?php echo $row_userDudes['dudes_id']; ?>" />
                    Vehicle Status: </strong> (small input form example)</label>
		  
          <select name="vcondition" class="field select small" id="vcondition" tabindex="1">
            <option value="" <?php if (!(strcmp("", $row_query_vehicle['vcondition']))) {echo "selected=\"selected\"";} ?>>Select Vehicle Condition</option>
            <option value="Used" <?php if (!(strcmp("Used", $row_query_vehicle['vcondition']))) {echo "selected=\"selected\"";} ?>>Used</option>
            <option value="New" <?php if (!(strcmp("New", $row_query_vehicle['vcondition']))) {echo "selected=\"selected\"";} ?>>New</option>
            <option value="Trade-In" <?php if (!(strcmp("Trade-In", $row_query_vehicle['vcondition']))) {echo "selected=\"selected\"";} ?>>Trade-In</option>
            <option value="Salvage" <?php if (!(strcmp("Salvage", $row_query_vehicle['vcondition']))) {echo "selected=\"selected\"";} ?>>Salvage</option>
          </select>
          
<select name="vlivestatus" class="field select small" id="vlivestatus" tabindex="3">
<option value="0" <?php if (!(strcmp(0, $row_query_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>KEEP ON HOLD</option>
<option value="1" <?php if (!(strcmp(1, $row_query_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>GO LIVE</option>
<option value="9" <?php if (!(strcmp(9, $row_query_vehicle['vlivestatus']))) {echo "selected=\"selected\"";} ?>>SOLD!</option>
                    </select>
                                    
                  <div class="clr"></div>
                </li>
                <li>
                <label>Stock Number:</label>
                                  <input name="vstockno" class="text small" id="vstockno" value="<?php echo $row_query_vehicle['vstockno']; ?>" />
                                  
 </li>
 <li>                                 
            <label>Enter Or Change Vehicle Trim</label>                      
<span>                                  <strong><?php echo $row_query_vehicle['vyear']; ?> <?php echo $row_query_vehicle['vmake']; ?> <?php echo $row_query_vehicle['vmodel']; ?></strong>
<input name="vtrim" class="text small" id="vtrim" value="<?php echo $row_query_vehicle['vtrim']; ?>" placeholder="Missing Trim" />
</span>

                </li>
                <li>
                  <label for="vcertified"><strong>Vehicle Certified?</strong></label>
                  <input <?php if (!(strcmp($row_query_vehicle['vcertified'],1))) {echo "checked=\"checked\"";} ?> name="vcertified" type="checkbox" class="checkbox" id="vcertified" value="1" />
                  Check This Box If The Dealer Has Notified You That This Vehicle Is Certifed. <a href="#" title="What Is Certified? Certified Is A Special Class For A Car That It Has A Top Notch Inspection, Matching Tires, And Still Has A Manufacuter Warranty.  The Dealer Incurrs A Fee To Sell This Vehicle, Normally this fee comes from the service department. But It Brings More Money When Banks Are Financing, But Has An Extra Fee To Sell It At The Dealers Expense. Check only if you know for sure.">?</a>
                  </input>
                </li>
              <li>
                  <label for="multiply"><strong>Unique Vehicle Information</strong> (Vin & Mielage)</label>
                  <input id="vvin" name="vvin" type="text" value="<?php echo $row_query_vehicle['vvin']; ?>" />
                  <input name="vmileage" class="text small" id="vmileage" value="<?php echo $row_query_vehicle['vmileage']; ?>" />
                  <div class="clr"></div>
                  <label for="vvin" class="small">VIN: </label>                
                  <label for="vmileage" class="small">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Mileage: </label>
                  <div class="clr"></div>
                </li>
              <li>
                <label for="vecolor"><strong>Color Information</strong> (Exterior &amp; Interior Or  Custom Exterior Color)</label>
                <select name="vecolor" id="vecolor" title="Exterior Color">
                  <option value="" <?php if (!(strcmp("", $row_query_vehicle['vecolor']))) {echo "selected=\"selected\"";} ?>>Select Exterior</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_colors_hex['color_id']?>"<?php if (!(strcmp($row_colors_hex['color_id'], $row_query_vehicle['vecolor']))) {echo "selected=\"selected\"";} ?>><?php echo $row_colors_hex['color_name']?></option>
<?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
                </select>
                
                
                <select name="vicolor" id="vicolor" title="Interior Color">
                  <option value="" <?php if (!(strcmp("", $row_query_vehicle['vicolor_txt']))) {echo "selected=\"selected\"";} ?>>Select Interior Color</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_colors_hex['color_id']?>"<?php if (!(strcmp($row_colors_hex['color_id'], $row_query_vehicle['vicolor_txt']))) {echo "selected=\"selected\"";} ?>><?php echo $row_colors_hex['color_name']?></option>
                  <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
                </select>
                
                
                <input name="vcustomcolor" class="text small" id="vcustomcolor" title="Custom Color Name" value="<?php echo $row_query_vehicle['vcustomcolor']; ?>" />
                <div class="clr"></div>
                <label for="vrprice" class="small">Exterior Color:
                  <input type="hidden" name="vecolor_txt" id="vecolor_txt" />
                </label>                
                <label for="vspecialprice" class="small">Interior Color:
                  <input type="hidden" name="vicolor_txt" id="vicolor_txt" />
                </label>                
                <label for="vdownpayment" class="small">Custom Color:</label>                
                <div class="clr"></div>
              </li>
                
                
                
                
                <li>
                  <label for="multiply"><strong>Vehicle Pricing:</strong> (Visible To Audience And Dealer Instantly)</label>
                  <input name="vrprice" class="text small" id="vrprice" value="<?php echo $row_query_vehicle['vrprice']; ?>" />
                  <input name="vspecialprice" class="text small" id="vspecialprice" value="<?php echo $row_query_vehicle['vspecialprice']; ?>" />
                  <input name="vdprice" class="text small" id="vdprice" value="<?php echo $row_query_vehicle['vdprice']; ?>" />
                  <input name="vpurchasecost" class="text small" id="vpurchasecost" value="<?php echo $row_query_vehicle['vpurchasecost']; ?>" readonly="readonly" />

                  <div class="clr"></div>
                  <label for="vrprice" class="small">Retail Price</label>                
                  <label for="vspecialprice" class="small">Special Internet Price</label>                
                  <label for="vdprice" class="small">Downpayment Price</label>
                  <label for="vpurchasecost" class="small">Vehicle Purchase Cost</label>
                  <div class="clr"></div>
                </li>
                <li>
                  <label for="vtransm"><strong>Transmission:</strong></label>
                  <select id="vtransm" name="vtransm">
                    <option value="" <?php if (!(strcmp("", $row_query_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>>Select Transmission</option>
                    <option value="Automatic Trans." <?php if (!(strcmp("Automatic Trans.", $row_query_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>>Automatic Trans.</option>
<option value="Manual Trans." <?php if (!(strcmp("Manual Trans.", $row_query_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>>Manual Trans.</option>
                    <option value="5 Speed" <?php if (!(strcmp("5 Speed", $row_query_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>>5 Speed</option>
                    <option value="Electric Trans." <?php if (!(strcmp("Electric Trans.", $row_query_vehicle['vtransm']))) {echo "selected=\"selected\"";} ?>>Electric Trans.</option>
                  </select>


                  
										<select name="vengine" id="vengine">
										  <option value="" <?php if (!(strcmp("", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>Select Engine Size</option>
										  <option value="4 Cylinder" <?php if (!(strcmp("4 Cylinder", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>4 Cylinder</option>
										  <option value="6 Cylinder" <?php if (!(strcmp("6 Cylinder", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>6 Cylinder</option>
										  <option value="8 Cylinder" <?php if (!(strcmp("8 Cylinder", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>8 Cylinder</option>
										  <option value="10 Cylinder" <?php if (!(strcmp("10 Cylinder", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>10 Cylinder</option>
										  <option value="12 Cylinder" <?php if (!(strcmp("12 Cylinder", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>12 Cylinder</option>
										  <option value="3 Cylinder" <?php if (!(strcmp("3 Cylinder", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>3 Cylinder</option>
										  <option value="Electric" <?php if (!(strcmp("Electric", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>Electric</option>
										  <option value="Rotary Turbo" <?php if (!(strcmp("Rotary Turbo", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>Rotatry Turbo</option>
										  <option value="Smart Engine" <?php if (!(strcmp("Smart Engine", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>Smart Engine</option>
										  <option value="Unavailable" <?php if (!(strcmp("Unavailable", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>Unavailable</option>
										  <option value="Other" <?php if (!(strcmp("Other", $row_query_vehicle['vengine']))) {echo "selected=\"selected\"";} ?>>Other</option>
                    </select>

										<select name="vbody" id="vbody">
										  <option value="" <?php if (!(strcmp("", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Select Body Style</option>
										  <option value="Coupe" <?php if (!(strcmp("Coupe", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Coupe</option>
										  <option value="Sedan" <?php if (!(strcmp("Sedan", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Sedan</option>
										  <option value="SUV" <?php if (!(strcmp("SUV", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>SUV</option>
										  <option value="Pick-Up" <?php if (!(strcmp("Pick-Up", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Pick-Up</option>
										  <option value="Convertible" <?php if (!(strcmp("Convertible", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Convertible</option>
										  <option value="Hatchback" <?php if (!(strcmp("Hatchback", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Hatchback</option>
										  <option value="Truck" <?php if (!(strcmp("Truck", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Truck</option>
										  <option value="Van" <?php if (!(strcmp("Van", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Van</option>
										  <option value="Mini-Van" <?php if (!(strcmp("Mini-Van", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Mini-Van</option>
										  <option value="Wagon" <?php if (!(strcmp("Wagon", $row_query_vehicle['vbody']))) {echo "selected=\"selected\"";} ?>>Wagon</option>
			        </select>


                                          <select name="vdoors" id="vdoors">
                                            <option value="" <?php if (!(strcmp("", $row_query_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>Select Doors</option>
                                            <option value="2 Dors" <?php if (!(strcmp("2 Dors", $row_query_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>2 Doors</option>
                                            <option value="4 Doors" <?php if (!(strcmp("4 Doors", $row_query_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>4 Doors</option>
                                            <option value="6 Doors" <?php if (!(strcmp("6 Doors", $row_query_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>6 Doors</option>
                                            <option value="3 Doors" <?php if (!(strcmp("3 Doors", $row_query_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>3 Doors</option>
                                            <option value="5 Doors" <?php if (!(strcmp("5 Doors", $row_query_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>5 Doors</option>
                                            <option value="Other" <?php if (!(strcmp("Other", $row_query_vehicle['vdoors']))) {echo "selected=\"selected\"";} ?>>Other</option>
                                          </select>                                
                                          
                </li>
                
                <li>
                  <label for="vcomments"><strong>Description</strong> (Large input form example)</label>
                  <textarea id="vcomments" name="vcomments" rows="6" cols="50"><?php echo $row_dealer_vehicles['vcomments']; ?></textarea>
                </li>

                <li>
                  <label for="date"><strong>Date in Stock</strong> </label>
                <input id="datepicker" name="vDateInStock" type="text" value="<?php echo $row_dealer_vehicles['vDateInStock']; ?>" />
                  <div class="clr"></div>
                  <label for="datemonth" class="date">MM</label>                
                  <label for="dateday" class="date">DD</label>
                  <label for="dateyear" class="year">YYYY</label>                
                  
                  <div class="clr"></div>
                  
                  <div ></div>
 
                </li>
                
                <li>
                
                <table width="800" cellpadding="5" cellspacing="5">
  <tbody><tr>
    <td valign="top">

<table cellpadding="5">
<tbody><tr valign="baseline">
      <td align="right">Air Conditioning:</td>
      <td><input name="Air_Conditioning" type="checkbox" value="1" checked="checked"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Alloy Wheels:</td>
      <td><input checked="checked" type="checkbox" name="Alloy_Wheels" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">AntiLock Brakes:</td>
      <td><input checked="checked" type="checkbox" name="AntiLock_Brakes" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Child Seat:</td>
      <td><input type="checkbox" name="Child_Seat" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Cruise Control:</td>
      <td><input type="checkbox" name="Cruise_Control" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Driver Air Bag:</td>
      <td><input checked="checked" type="checkbox" name="Driver_Air_Bag" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Keyless Entry:</td>
      <td><input type="checkbox" name="Keyless_Entry" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Leather Seats:</td>
      <td><input checked="checked" type="checkbox" name="Leather_Seats" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">On Star Equipped:</td>
      <td><input type="checkbox" name="On_Star_Equipped" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Rear Ent Center:</td>
      <td><input type="checkbox" name="Rear_Ent_Center" value="0"></td>
    </tr>
</tbody></table>

	</td>   
    <td valign="top">

<table cellpadding="5">
    
    
    
    <tbody><tr valign="baseline">
      <td align="right">Navigation System:</td>
      <td><input type="checkbox" name="Navigation_System" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Passenger Air Bag:</td>
      <td><input checked="checked" type="checkbox" name="Passenger_Air_Bag" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power Door Locks:</td>
      <td><input checked="checked" type="checkbox" name="Power_Door_Locks" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power Mirrors:</td>
      <td><input checked="checked" type="checkbox" name="Power_Mirrors" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power Seats:</td>
      <td><input checked="checked" type="checkbox" name="Power_Seats" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power Steering:</td>
      <td><input checked="checked" type="checkbox" name="Power_Steering" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Power Windows:</td>
      <td><input checked="checked" type="checkbox" name="Power_Windows" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Memory Seats:</td>
      <td><input type="checkbox" name="Memory_Seats" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Rear Air Conditioning:</td>
      <td><input type="checkbox" name="Rear_Air_Conditioning" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Rear Window Defroster:</td>
      <td><input checked="checked" type="checkbox" name="Rear_Window_Defroster" value="1"></td>
    </tr>
</tbody></table>    
	
    </td>   
    <td valign="top">

<table cellpadding="5">
    
    
    
    
    
    
    <tbody><tr valign="baseline">
      <td align="right">Rear Wiper:</td>
      <td><input type="checkbox" name="Rear_Wiper" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Side Air Bag:</td>
      <td><input type="checkbox" name="Side_Air_Bag" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Sunroof/Moonroof:</td>
      <td><input type="checkbox" name="SunroofMoonroof" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Television:</td>
      <td><input type="checkbox" name="Television" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Tilt Wheel:</td>
      <td><input checked="checked" type="checkbox" name="Tilt_Wheel" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Tinted Glass:</td>
      <td><input type="checkbox" name="Tinted_Glass" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Sliding Doors:</td>
      <td><input type="checkbox" name="Sliding_Doors" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">CD Player:</td>
      <td><input checked="checked" type="checkbox" name="CD_Player" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">CD Changer:</td>
      <td><input type="checkbox" name="CD_Changer" value="0"></td>
    </tr>
    <tr valign="baseline">
      <td align="right">Bluetooth:</td>
      <td><input type="checkbox" name="Bluetooth" value="0"></td>
    </tr>
</tbody></table>

	</td>   
    <td valign="top">

<table cellpadding="5">
<tbody><tr valign="baseline">
      <td align="right">Satellite_Radio:<br>
      <input type="checkbox" name="Satellite_Radio" value="0">
      </td>
      <td>
      
      
      </td>
    </tr>
    
    
    
    <tr valign="baseline">
      <td align="right">Carfax:<br>
        <select name="carfax">
          <option value="0" selected="">Car Fax Off</option>
          <option value="1">Car Fax On</option>
        </select></td>
      <td><br> <br>
      </td>
    </tr>
    
    
    
    
    <tr valign="baseline">
      <td align="right">Autocheck:<br>
        <select name="autocheck">
          <option value="0" selected="">Auto Check Off</option>
          <option value="1">Auto Check On</option>
        </select></td>
      <td><br> <br>
      </td>
    </tr>
</tbody></table>
	
    </td>   
  </tr>
</tbody></table>
                
                
                </li>
              </ol>
              <input type="hidden" name="MM_update" value="form_example" />
              <input type="submit" name="Submit" id="submit" value="Update" />
              </form>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>

        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Administration Options</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              <tr>
                <th width="40"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Username</th>
                <th width="90">Date</th>
                <th width="120">Location</th>
                <th>E-mail</th>
                <th colspan="2">Actions</th>
              </tr>
              <tr>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mwwweefail@yahoo.com">mwwweefail@yahoo.com</a></td>
                <td width="28"><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td width="28"><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              <tr>
                <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mail@yahoo.com">mail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              <tr class="last">
                <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:m13dail@yahoo.com">m13dail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              </table>
              </form>
            </div>
          </div>
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>
  
  <!-- FOOTER -->
  <div class="footer">
    <div class="footer_res">
      <ul>
        <li class="first"><a href="index.html">Home</a></li>
        <li><a href="">Administration</a></li>
        <li><a href="">Settings</a></li>
        <li><a href="">Contact</a></li>
      </ul>
      <div class="clr"></div>
      <a href="#"><img src="images/logo_footer.jpg" width="300" height="116" alt="logo" class="logo" /></a>
      <p class="aright"><a href="http://www.dreamtemplate.com"><img src="images/icon_f1.gif" alt="picture" width="27" height="23" /></a>Website Administration by <a href="http://www.webappskins.com"><strong>WebAppSkins</strong></a></p>
      <div class="clr"></div>
    </div>
  </div>

  <!-- DIALOGS -->
  <div id="dialogboxes">
    <!-- dialog 1 -->
    <div id="dialog1" class="window">
      <div class="gadget gadget_noclearance">
        <div class="gadget_title gradient37">
          <a href="#" class="close closegadget"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
          <h3>Thank you for</h3>
        </div>
        <div class="gadget_content">
          <div class="subblock">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's standard dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.</p>
            <div class="linehr"></div>
            <p><a href="#" class="gradient37">Start Demo - Login Now</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- dialog 2 -->
    <div id="dialog2" class="window">
      <div class="gadget gadget_noclearance">
        <div class="gadget_title gradient37">
          <a href="#" class="close closegadget"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
          <h3>Welcome to Admin Area</h3>
        </div>
        <div class="gadget_content">
          <div class="subblock">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's standard dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.</p>
            <div class="gadget">
              <div class="gadget_title gradient37"><h3>Critical Error message</h3></div>
              <div class="gadget_content error_msg em_orange"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing</p></div>
            </div>
            <div class="gadget">
              <div class="gadget_title gradient37"><h3>Error message</h3></div>
              <div class="gadget_content error_msg em_blue"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing</p></div>
            </div>
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
            <p><a href="#" class="gradient37">Start Demo - Login Now</a></p>
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
mysqli_free_result($userDudes);

mysqli_free_result($dealer_vehicles);

mysqli_free_result($query_vehicle);

mysqli_free_result($colors_hex);
?>

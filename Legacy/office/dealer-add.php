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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_dealer_pending")) {
  $insertSQL =  "INSERT INTO dealers_pending (dudes_id, contact, contact_phone, contact_phone_type, dmcontact2, dmcontact2_phone, dmcontact2_phone_type, company, website, finance, finance_contact, sales, sales_contact, phone, fax, address, city, `state`, zip, email, username, password, sla) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['dudes_id'], "int"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['contact_phone'], "text"),
                       GetSQLValueString($_POST['contact_phone_type'], "text"),
                       GetSQLValueString($_POST['dmcontact2'], "text"),
                       GetSQLValueString($_POST['dmcontact2_phone'], "text"),
                       GetSQLValueString($_POST['dmcontact2_phone_type'], "text"),
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
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString(isset($_POST['sla']) ? "true" : "", "defined","1","0"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);

  $insertGoTo = "script-add-dealer.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header( "Location: %s", $insertGoTo));
}

if ((isset($_GET['delete_id'])) && ($_GET['delete_id'] != "")) {
  $deleteSQL =  "DELETE FROM dealers_pending WHERE id=%s",
                       GetSQLValueString($_GET['delete_id'], "int"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $deleteSQL);
}

$colname_userDudes = "-1";
if (isset($_SESSION['MM_Usernamemobi'])) {
  $colname_userDudes = $_SESSION['MM_Usernamemobi'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDudes =  "SELECT * FROM dudes WHERE dudes_username = %s", GetSQLValueString($colname_userDudes, "text"));
$userDudes = mysqli_query($idsconnection_mysqli, $query_userDudes);
$row_userDudes = mysqli_fetch_array($userDudes);
$totalRows_userDudes = mysqli_num_rows($userDudes);
$dudesid = $row_userDudes['dudes_id'];

foreach ($row_userDudes as $col => $val) {
  $_SESSION[$col] = $val;
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealers_pend = "SELECT * FROM dealers_pending ORDER BY id ASC";
$dealers_pend = mysqli_query($idsconnection_mysqli, $query_dealers_pend);
$row_dealers_pend = mysqli_fetch_array($dealers_pend);
$totalRows_dealers_pend = mysqli_num_rows($dealers_pend);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_array($states);
$totalRows_states = mysqli_num_rows($states);
?>
<?php 
        srand((double)microtime()*1000000); 
        
	    $tkey = substr(md5(rand(0,9999999)),0,20);
		
		//echo  $tkey; into insert records
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forms</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style_moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_IE.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
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
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Date &amp; Mail</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <!-- Datepicker -->
              <div id="datepicker"></div>
              <div class="clr"></div>
              <p>&nbsp;&nbsp;<a href="#" class="gradient37">+  Add Event</a>&nbsp;&nbsp;<a href="#" class="gradient37">List Events</a></p>
            </div>
          </div>
        </div>

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
            <h3>Administration Information Published With This Profile</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>ID: <?php echo $row_userDudes['dudes_id']; ?> <br />
              	 Name: <?php echo $row_userDudes['dudes_prefix_name']; ?> <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> <br />
                 
                 Username: <?php echo $row_userDudes['dudes_username']; ?> <br />
                 Status: 	<?php 
				 				$status = $row_userDudes['dudes_status'];
				 				if($status == 0){echo 'Disabled';}
				 				if($status == 1){echo 'Active';}
								if($status == 2){echo 'Super Admin';}
				 			?>
              </p>
              
              
              <p>&nbsp;</p>
              
              
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>
        
        <!-- gadget left 2 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Add A Dealer (Pending)</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form name="add_dealer_pending" action="<?php echo $editFormAction; ?>" method="POST" id="add_dealer_pending" class="form_example">
              <ol>
              
              <input name="dudes_id" type="hidden" value="<?php echo $row_userDudes['dudes_id']; ?>" />
              <input name="token" type="hidden" value="<?php echo $tkey; ?>" />
              
                <li>
                  <label for="company"><strong>Company Name: </strong> (Dealership Name)</label>
                  <input id="company" name="company" class="text large" />
                </li>
              
              
              
                <li>
                  <label for="password"><strong>URL: </strong> ( leave off http: &amp; www )</label>
                  <input id="website" name="website" class="text medium" />
                </li>
                
                
                <li>
                  <label for="multiply"><strong>Decision Maker 1:</strong> (The Authorized Decision Maker For Any &amp; All Approvals)</label>
                  <input id="multiply" name="multiply" type="hidden" value="" />
                  <input id="contact" name="contact" class="text small" />
                  <input id="contact_phone" name="contact_phone" class="text small" />
                  <select id="contact_phone_type" name="contact_phone_type">
                    <option selected="selected" value="Phone Type">Phone Type</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Work">Work</option>
                    <option value="Home">Home</option>
                    <option value="Pager">Pager</option>
                    <option value="Google Voice">Google Voice</option>
                  </select>
                  <div class="clr"></div>
                  <label for="city" class="small">Name 1</label>                
                  <label for="state" class="small">Direct Phone Number</label>                
                  <label for="zip" class="small">Phone Type</label>                
                  <div class="clr"></div>
                </li>
                
                
                
                <li>
                  <label for="multiply"><strong>Decision Maler 2: </strong> (Succeeds When Primary Decision Maker Absent)</label>
                  <input id="multiply" name="multiply" type="hidden" value="" />
                  <input id="dmcontact2" name="dmcontact2" class="text small" />
                  <input id="dmcontact2_phone" name="dmcontact2_phone" class="text small" />
					
                    <select id="dmcontact2_phone_type" name="dmcontact2_phone_type">
                    <option selected="selected" value="Phone Type">Phone Type</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Work">Work</option>
                    <option value="Home">Home</option>
                    <option value="Pager">Pager</option>
                    <option value="Google Voice">Google Voice</option>
                  </select>                  
                  
                  <div class="clr"></div>
                  <label for="city" class="small">Name 2</label>                
                  <label for="state" class="small">Direct Phone Number</label>                
                  <label for="zip" class="small">Phone Type</label>                
                  <div class="clr"></div>
                </li>
                
                
                <li>
                  <label for="multiply"><strong>Company Public Information</strong> (SEO, Customer Visiblity, And Map Directions.)</label>
                  <input id="phone" name="phone" class="text small" />
                  <input id="fax" name="fax" class="text small" />
                  <div class="clr"></div>
                  <label for="city" class="small">Main Phone:</label>                
                  <label for="state" class="small">Fax</label>                
                  <div class="clr"></div>
                </li>

                
                
                
                
                <li>
                  <label for="company"><strong>Company Address:</strong> (ie. 123 Name Street)</label>
                  <input id="address" name="address" class="text large" />
                </li>
                
                <li>
                  <label for="multiply"><strong>City State &amp; Zip: </strong>(small input form example)</label>
                  <input id="multiply" name="multiply" type="hidden" value="" />
                  <input id="city" name="city" class="text small" />
                  <select name="state" class="form_login" id="state">
                    <option value="">Select State</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_name']?></option>
                    <?php
} while ($row_states = mysqli_fetch_array($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_array($states);
  }
?>
                  </select>
                  <input id="zip" name="zip" class="text small" />
                  <div class="clr"></div>
                  <label for="city" class="small">City</label>                
                  <label for="state" class="small">State</label>                
                  <label for="zip" class="small">Zip</label>                
                  <div class="clr"></div>
                </li>
                
                <li>
                  <label for="multiply"><strong>Finance:</strong> (Finance Manager Or Finance Lead Person)</label>
                  <input id="finance" name="finance" class="text small" />
                  <input id="finance_contact" name="finance_contact" class="text small" />
                  <div class="clr"></div>
                  <label for="city" class="small">Sales Manager Name</label>                
                  <label for="state" class="small">Sales Manager Phone</label>                
                  <div class="clr"></div>
                </li>
                
                <li>
                  <label for="multiply"><strong>Sales:  </strong> (Sales &amp;  Internet Manager)</label>
                  <input id="sales" name="sales" class="text small" />
                  <input id="sales_contact" name="sales_contact" class="text small" />
                  <div class="clr"></div>
                  <label for="city" class="small">Sales Manager</label>                
                  <label for="state" class="small">Contact Phone No.</label>                
                  <div class="clr"></div>
                </li>
                
                
                
                <li>
                  <label for="password"><strong>Username: </strong> (this will special logins and authorization) </label>
                  <input id="username" name="username" class="text medium" />
                </li>
 
                
                <li>
                  <label for="email"><strong>Email: </strong> (this will be used for login) </label>
                  <input id="email" name="email" class="text large" />
                </li>
                
                <li>
                  <label for="password"><strong>Password: </strong> (this will be used for login) </label>
                  <input id="password" name="password" class="text medium" />
                </li>
                
                
                <li>
                  <label for="descr"><strong>Service Level Agreement:</strong> (SLA)</label>
                  <textarea id="descr" name="descr" rows="20" cols="50"></textarea>
                </li>
                
                
                
                <li>
                  <label for="sla"><strong>Agree To Serivce Level Agreement</strong></label>
                  <input name="sla" type="checkbox" class="checkbox" id="sla" value="1" />
                  Checking This Box Will Notify The Dealer With Instructions With Their User Credentials.</input>
                </li>
                
              </ol>
              <p>
                <input type="submit" name="submit" id="submit" value="Submit" />
              </p>
              <p>
                <input type="hidden" name="MM_insert" value="add_dealer_pending" />
                
              </p>
              </form>
              <p><a href="#" target="_blank">Tips &raquo;</a></p>
            </div>
          </div>
        </div>

        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Pending Dealers In The System</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">
              
                  <tr>
                <th><input name="utc1" id="utc1" type="checkbox" /></th>
                <th>Name</th>
                <th>Point Of Contact</th>
                <th>Contact Phone</th>
                <th>Date</th>
                <th>Location</th>
                <th>E-mail</th>
                <th colspan="2">Actions</th>
              </tr>
              
              
              <?php if ($totalRows_dealers_pend > 0) { // Show if recordset not empty ?>
                  <?php do { ?>
                    <tr>
                      <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                      <td><?php echo $row_dealers_pend['company']; ?></td>
                      <td><?php echo $row_dealers_pend['contact']; ?></td>
                      <td><?php echo 'Main: '.$row_dealers_pend['phone']; ?><br />
					  	  <?php echo $row_dealers_pend['phone']; ?> <br />
                      </td>
                      <td><?php echo $row_dealers_pend['created_at']; ?></td>
                      <td><?php echo $row_dealers_pend['city']; ?>, <?php echo $row_dealers_pend['state']; ?></td>
                      <td><a href="mailto:<?php echo $row_dealers_pend['email']; ?>"><?php echo $row_dealers_pend['email']; ?></a></td>
                      <td><a href="dealer-add-pending.php?id=<?php echo $row_dealers_pend['id']; ?>"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                      <td><a href="?delete_id=<?php echo $row_dealers_pend['id']; ?>"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                    </tr>
                    <?php } while ($row_dealers_pend = mysqli_fetch_array($dealers_pend)); ?>
<?php } // Show if recordset not empty ?>
                      
                      
<?php if ($totalRows_dealers_pend == 0) { // Show if recordset empty ?>
                <tr class="last">
                  <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td>N/A</td>
                  <td><a href="#">N/A</a></td>
                  <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                  <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                </tr>
<?php } // Show if recordset empty ?>
              
              </table>
              </form>
            </div>
          </div>
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>
  
  
  
  
  
  <?php //include('parts/content-form.php'); ?>
  
  <!-- FOOTER -->
  
  <?php include('parts/footer.php'); ?>

  <!-- DIALOGS -->
  
  <?php include('parts/dialogs.php'); ?>
  
</div>



</body>
</html>
<?php
mysqli_free_result($userDudes);

mysqli_free_result($dealers_pend);

mysqli_free_result($states);
?>
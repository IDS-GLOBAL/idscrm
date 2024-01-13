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

$colname_userDets = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_userDets = $_SESSION['MM_Username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets =  "SELECT * FROM dealers WHERE email = %s";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);
$did = $row_userDets['id']; //Hackishere
$colname_dlrSlctBySsnDid = "-1";
if (isset($_SESSION['$did'])) {
  $colname_dlrSlctBySsnDid = $_SESSION['$did'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlrSlctBySsnDid =  "SELECT * FROM dealers WHERE id = ".$did."";;
$dlrSlctBySsnDid = mysqli_query($idsconnection_mysqli, $query_dlrSlctBySsnDid);
$row_dlrSlctBySsnDid = mysqli_fetch_assoc($dlrSlctBySsnDid);
$totalRows_dlrSlctBySsnDid = mysqli_num_rows($dlrSlctBySsnDid);

$maxRows_all_msgsbyDid = 10;
$pageNum_all_msgsbyDid = 0;
if (isset($_GET['pageNum_all_msgsbyDid'])) {
  	$pageNum_all_msgsbyDid = $_GET['pageNum_all_msgsbyDid'];
}
$startRow_all_msgsbyDid = $pageNum_all_msgsbyDid * $maxRows_all_msgsbyDid;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_all_msgsbyDid = "SELECT * FROM messages WHERE did = $did ORDER BY messages.created_at";

$query_limit_all_msgsbyDid =  sprintf("%s LIMIT %d, %d", $query_all_msgsbyDid, $startRow_all_msgsbyDid, $maxRows_all_msgsbyDid);

$all_msgsbyDid = mysqli_query($idsconnection_mysqli, $query_limit_all_msgsbyDid);
$row_all_msgsbyDid = mysqli_fetch_assoc($all_msgsbyDid);

if (isset($_GET['totalRows_all_msgsbyDid'])) {
  $totalRows_all_msgsbyDid = $_GET['totalRows_all_msgsbyDid'];
} else {
  $all_all_msgsbyDid = mysqli_query($idsconnection_mysqli, $query_all_msgsbyDid);
  $totalRows_all_msgsbyDid = mysqli_num_rows($all_all_msgsbyDid);
}
$totalPages_all_msgsbyDid = ceil($totalRows_all_msgsbyDid/$maxRows_all_msgsbyDid)-1;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_msgCSS = "SELECT * FROM messages_css";
$msgCSS = mysqli_query($idsconnection_mysqli, $query_msgCSS);
$row_msgCSS = mysqli_fetch_assoc($msgCSS);
$totalRows_msgCSS = mysqli_num_rows($msgCSS);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_cust_leads_emails = "SELECT * FROM cust_leads_emails WHERE cust_leads_emails.cust_leads_emails_did = $did ORDER BY cust_leads_emails.cust_leads_emails_created_at DESC";
$query_cust_leads_emails = mysqli_query($idsconnection_mysqli, $query_query_cust_leads_emails);
$row_query_cust_leads_emails = mysqli_fetch_assoc($query_cust_leads_emails);
$totalRows_query_cust_leads_emails = mysqli_num_rows($query_cust_leads_emails);
?>
<?php

/**
 * This Takes The Subject in email response and displays x-amount of characters
 * Trims text to a space then adds ellipses if desired
 * @param string $input text to trim
 * @param int $length in characters to trim to
 * @param bool $ellipses if ellipses (...) are to be added
 * @param bool $strip_html if html tags are to be stripped
 * @return string 
 */
function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}

$length = 100;

?>



<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>IDS Dealer Portal</title>
    
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/ui/ui.core.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/live_search.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/cookie.js"></script>
	<script type="text/javascript" src="js/ui/ui.sortable.js"></script>
	<script type="text/javascript" src="js/ui/ui.draggable.js"></script>
	<script type="text/javascript" src="js/ui/ui.resizable.js"></script>
	<script type="text/javascript" src="js/ui/ui.dialog.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	
	<link href="css/ui/ui.base.css" rel="stylesheet" media="all" />

	<link href="css/themes/blueberry/ui.css" rel="stylesheet" title="style" media="all" />

	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* Fix IE6 Transparent PNG */
	  DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');

	</script>
	<![endif]-->
	<!--[if IE 7]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->
</head>
<body id="sidebar-left">
	<div id="page_wrapper"><!-- Continues on -->
		
        <div id="page-header">
			
            <div id="page-header-wrapper">
				
              <?php include('parts/user-session-bar.php') ?>
              <?php include('parts/dealer-navigation.php') ?>
				
                <div id="search-bar">
					<form method="post" action="http://www.google.com/"><input type="text" name="q" value="" />
                    </form>
				</div>
                
	        </div>
            
       </div>

<script type="text/javascript" src="js/ui/ui.tabs.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	// Tabs
	$('#tabs, #tabs2, #tabs5').tabs();
});
</script>

<script type="text/javascript" src="js/tablesorter.js"></script>
<script type="text/javascript" src="js/tablesorter-pager.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	/* Table Sorter */
	$("#sort-table")
	.tablesorter({
		widgets: ['zebra'],
		headers: { 
		            // assign the secound column (we start counting zero) 
		            0: { 
		                // disable it by setting the property sorter to false 
		                sorter: false 
		            }, 
		            // assign the third column (we start counting zero) 
		            6: { 
		                // disable it by setting the property sorter to false 
		                sorter: false 
		            } 
		        } 
	})
	
	.tablesorterPager({container: $("#pager")}); 

	$(".header").append('<span class="ui-icon ui-icon-carat-2-n-s"></span>');

	
});

 	/* Check all table rows */

var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "check_all"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "check_none"; }
}


</script>








<!--Start View Beyond Includes -->  

		<div id="sub-nav"><div class="page-title">
			<h1>System Email Messages</h1>
		</div>
           <?php include('parts/dialog-status-bar-buttons.php'); ?>
</div>
		<div id="page-layout"><div id="page-content">
			<div id="page-content-wrapper">
				<div class="inner-page-title">
					<h2>System Emails / Messages</h2>
					<span>This page helps identify system emails sent to customers</span>
				</div>
                
				<!--
                	<div class="content-box">
					<div class="response-msg error ui-corner-all">
						<span> Error message</span>
                        Sorry an error has just occured.
                    </div>
					<div class="response-msg notice ui-corner-all">
						<span>Notice message</span>
						You have a message that should be notied.
					</div>
	
					<div class="response-msg inf ui-corner-all">
						<span>Information message</span>
						Internal messages..
					</div>
	
					<div class="response-msg success ui-corner-all">
						<span>Success message</span>
						Your sent message was sucessful.
					</div>
				</div>
                -->
				
                
                
                
                <div class="other-box gray-box ui-corner-all">
				  <div class="cont ui-corner-all">
					  <h3>Below Are Your Messages | <?php echo $row_all_msgsbyDid['msg_title']; ?></h3>
						
                    <p>The messages here include snippets from internal and public messesages and notifications that are related to your vehicles and important information.</p>
                      <p>It is very important that you narrow down the full body test and continue to read more by update id master detail page set.					</p>
					</div>
				</div>
                
                
                
                
                <div class="content-box">
	
					<div class="response-msg success2 ui-corner-all">
						<span>Successful Email Messages Sent</span>
						
                       <p>
                       
                          <div class="hastable">
                          <table id="sort-table" border="1" cellpadding="5" cellspacing="5">
                            <tr>
                              <td>Email Subject</td>
                              <td>Customer Email</td>
                              <td>Message Body</td>
                              <td>Email Status</td>
                              <td>Email Sent On Date/Time</td>
                            </tr>
                            <?php do { ?>
                              <tr>
                                <td><?php echo $row_query_cust_leads_emails['cust_leads_emails_subject']; ?></td>
                                <td><?php echo $row_query_cust_leads_emails['cust_leads_emails_email']; ?></td>
                                <td>
									<?php
										$input = $row_query_cust_leads_emails['cust_leads_emails_body'];
										echo trim_text($input, $length); 
									?>
                                </td>
                                <td align="center"><?php echo $row_query_cust_leads_emails['cust_leads_emails_status']; ?></td>
                                <td><?php
										$time = $row_query_cust_leads_emails['cust_leads_emails_created_at'];  
										$timestamp = date($time);
										echo $timestamp;
									?>
                                </td>
                              </tr>
                              <?php } while ($row_query_cust_leads_emails = mysqli_fetch_assoc($query_cust_leads_emails)); ?>
                          </table>
                          </div>
                       
                       </p>

                        
                        
					</div>
				</div><!--End Content Box-->
                
                
                
                <div class="clearfix"></div>
				<div class="inner-page-title">
					<h3>Other information boxes that you might use</h3>
				</div>
			
            	
                
              
            
            
            
            <!-- Start Messages Loop -->
                <?php do { ?>
                
                <?php //include('parts/pieces/system_messasages-inc.php'); ?>
                
				<?php } while ($row_all_msgsbyDid = mysqli_fetch_assoc($all_msgsbyDid)); ?>
<!-- End Messages Loop -->                
                
                
                
             <!--   
			  	<div class="response-msg error ui-corner-all">
					
						<h3>Unread Message Notice Box</h3>
						<p>This message box can either be used for unread messages or for your imporant message sent internally.</p>
					
				</div>
				
                <div class="inner-page-title">
					<h2>Same boxes</h2>
					<span>But this time, we will add class="float-left width50" so that the boxes align two in a row.</span>
				</div>
				
                <div class="other-box gray-box float-left width50 ui-corner-all">
					<div class="cont ui-corner-all">
						<h3>Grey Box</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					</div>
				</div>
				
                <div class="other-box yellow-box float-right width50 ui-corner-all">
					<div class="cont ui-corner-all">
						<h3>Notice Box</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					</div>
				</div>
			-->
                <div class="clearfix"></div>
				
                <i class="note">* If you would like to remove the rounded corners, you should remove the ui-corner-all class.</i>
				
                <!--
                
                
                <div class="content-box">
					<div class="inner-page-title">
						<h2>Dealer Tips!</h2>
						<span>But this time, we will add class="float-left width50" so that the boxes align two in a row.</span>
					</div>
					<div class="other-box gray-box float-left width50 ui-corner-all">
						<div class="cont ui-corner-all">
							<h3>Grey Box</h3>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
						</div>
					</div>
					<div class="other-box yellow-box float-right width50 ui-corner-all">
						<div class="cont ui-corner-all">
							<h3>Notice Box</h3>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
						</div>
					</div>
					<div class="clearfix"></div>
					<i class="note">* Observer that you can even add the title in a content box.</i>
				</div>
				
                
                -->
				<?php include('parts/sidebars/msg-sidebar.php'); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php include('footer.php'); ?></div>
</body>
</html>
<?php
mysqli_free_result($userDets);

mysqli_free_result($all_msgsbyDid);

mysqli_free_result($msgCSS);

mysqli_free_result($query_cust_leads_emails);
?>

<?php require_once('../../Connections/idsconnection.php'); ?>
<?php


$colname_pulltemplate = "-1";
if (isset($_GET['templateid'])) {
  $colname_pulltemplate = $_GET['templateid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pulltemplate =  "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE `dudes_sys_htmlemail_templates`.`id` = '$colname_pulltemplate'";
$pulltemplate = mysqli_query($idsconnection_mysqli, $query_pulltemplate);
$row_pulltemplate = mysqli_fetch_array($pulltemplate);
$totalRows_pulltemplate = mysqli_num_rows($pulltemplate);

?>
<?php
$email_systm_templates_body = $row_pulltemplate['email_systm_templates_body'];

echo "<html>
	<head>
    </head>
    <body>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='center' valign='top'>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='left'>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='left' valign='bottom' style='line-height:11px;font-size:10px;font-family:Arial,Helvetica,sans-serif;padding-bottom:5px;padding-left:15px;padding-right:0px;padding-top:5px;color:#888888'><a id='cdnemailview' href='https://idscrm.com' style='color:#28acff' target='_blank' title='This external link will open in a new window'>Sent From IDSCRM</a></td>
</tr>
</tbody></table>
<table width='100%' bgcolor='#fff' border='0' cellpadding='5' cellspacing='0'><tbody><tr><td style='font-family:Arial;font-size:13px'></td></tr></tbody></table>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='center'><table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='center'><table width='336' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td width='168' align='left' valign='top' bgcolor='#fff' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#fff;text-align:center'><a href='https://idscrm.com' style='text-decoration:none;color:#fff' target='_blank' title='This external link will open in a new window'><img src='https://idscrm.com/css/images/email-idsbox-template-top.jpg' alt='IDSCRM' width='168' height='73' border='0' style='display:block'></a></td>
<td width='84' align='left' valign='top' bgcolor='#fff' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#fff;text-align:center'><a href='https://idscrm.com/dealers/inventory.php?vstat=1' style='text-decoration:none;color:#fff' target='_blank' title='This external link will open in a new window'><img src='https://idscrm.com/css/images/email-idsbox-inventory.jpg' alt='Inventory' width='84' height='73' border='0' style='display:block'></a></td>
<td width='84' align='left' valign='top' bgcolor='#fff' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#fff;text-align:center'><a href='https://idscrm.com/dealers/leads.php' style='text-decoration:none;color:#fff' target='_blank' title='This external link will open in a new window'><img src='https://idscrm.com/css/images/email-idsbox-leads.jpg' alt='Leads' width='84' height='73' border='0' style='display:block'></a></td>
</tr>
</tbody></table>
</td>
<td><table width='264' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td width='112' align='left' valign='top' bgcolor='#fff' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#fff;text-align:center'><a href='https://idscrm.com/dealers/credit-apps.php' style='text-decoration:none;color:#fff' target='_blank' title='This external link will open in a new window'><img src='https://idscrm.com/css/images/email-idsbox-template-applications.jpg' alt='Credit Applications' width='112' height='73' border='0' style='display:block'></a></td>
<td width='152' align='left' valign='top' bgcolor='#fff' style='font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;color:#fff;text-align:center'><a href='https://idscrm.com/dealers/deals.php'><img src='https://idscrm.com/css/images/email-idsbox-cardeals.jpg' alt='My Car Deals' width='152' height='73' border='0' style='display:block'></a></td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td><table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td width='1' bgcolor='#C4C4C4' valign='top'><img style='display:block' src='https://idscrm.com/css/images/cleardot.gif' width='1' height='1'></td>
<td width='10'>&nbsp;</td>
<td width='580' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:normal;color:#666666;text-decoration:none;line-height:16px;padding-bottom:10px'>
<p>Enter Your Information Here</p>
</td>
<td width='10'>&nbsp;</td>
<td width='1' bgcolor='#C4C4C4' valign='top'><img style='display:block' src='https://idscrm.com/css/images/cleardot.gif' width='1' height='1' border='0'></td>    
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td align='left' width='600' bgcolor='#000000'><img src='https://idscrm.com/css/images/bottom-blackbar.jpg' width='600' height='6' border='0' style='display:block'></td>
</tr>
</tbody></table>
<table width='600' border='0' cellspacing='0' cellpadding='0' bgcolor='#fcb040'>
<tbody><tr>
<td align='left' valign='bottom' style='font-weight:bold;font-size:13px;font-family:Arial,Helvetica,sans-serif;padding-bottom:0px;padding-left:15px;padding-right:12px;padding-top:15px;text-decoration:none;color:#d60c16'>
Contact Us: <a href='tel:4045654371'>(404) 565-4371</a> - or - Visit Our Website: <a href='https://idscrm.com'>idscrm.com</a></td>
</tr>
<tr>
<td><table width='600' border='0' cellspacing='0' cellpadding='0'>
<tbody><tr>
<td width='600' align='left' valign='bottom' style='color:#fff;font-size:12px;font-family:Arial,Helvetica,sans-serif;padding-bottom:0px;padding-left:15px;padding-right:0px;padding-top:2px'>Request A Demo  <a href='https://idscrm.com/#getademo' style='color:#E42910; font-weight:bold;' target='_blank' title='This external link will open in a new window'>Here</a>.</td>
</tr>
</tbody></table></td>
</tr>
<tr>
<td width='600' align='left' valign='bottom' style='color:#fff;line-height:16px;font-size:11px;font-family:Arial,Helvetica,sans-serif;padding-bottom:10px;padding-left:15px;padding-right:15px;padding-top:10px'>&copy; Copyright 2016 (IDS) INTERGRATED DEALER SYSTEMS, LLC. All rights reserved.<br>
Visit Us: <a href='https://idscrm.com/#contact' style='font-family:Arial,Helvetica,sans-serif;font-size:11px;font-weight:bold;color:#2424D8;text-decoration:underline;line-height:16px' target='_blank' title='This external link will open in a new window'><span style='color:#2424D8'>Contact Us</span></a>, <a href='https://idscrm.com/termsofuse.php' style='font-family:Arial,Helvetica,sans-serif;font-size:11px;font-weight:bold;color:#2424D8;text-decoration:underline;line-height:16px' target='_blank' title='This external link will open in a new window'><span style='color:#2424D8'>Terms of Use</span></a> and <a href='https://idscrm.com/privacy.php' style='font-family:Arial,Helvetica,sans-serif;font-size:11px;font-weight:bold;color:#2424D8;text-decoration:underline;line-height:16px' target='_blank' title='This external link will open in a new window'><span style='color:#2424D8'>Privacy Policy</span></a>.<br>
(IDS) INTERNET DEALER SERVICES, LLC. | Atlanta, GA<br>
If you don not want these emails anymore from us, you can <a href='https://idscrm.com/unsubscribe.php' style='font-family:Arial,Helvetica,sans-serif;font-size:11px;font-weight:bold;color:#2424D8;text-decoration:underline;line-height:16px' target='_blank' title='This external link will open in a new window'><span style='color:#2424D8'>unsubscribe here</span></a>.
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
    </body>
</html>
";
?>




<?php
mysqli_free_result($pulltemplate);
?>

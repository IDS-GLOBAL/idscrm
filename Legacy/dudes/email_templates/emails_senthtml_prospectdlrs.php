<?php require_once('../../Connections/tracking.php'); ?>
<?php


$colname_view_email_system_template = "-1";
if (isset($_GET['view'])) {
  $colname_view_email_system_template = $_GET['view'];
}
mysql_select_db($database_tracking, $tracking);
$query_view_email_system_template =  "SELECT * FROM `idsids_idsdms`.`emails_senthtml_prospectdlrs` WHERE `emails_senthtml_prospectdlrs`.`senthtml_prospect_id` = '$colname_view_email_system_template'";
$view_email_system_template = mysqli_query($idsconnection_mysqli, $query_view_email_system_template, $tracking);
$row_view_email_system_template = mysqli_fetch_array($view_email_system_template);
$totalRows_view_email_system_template = mysqli_num_rows($view_email_system_template);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Alerts e.g. approaching your limit</title>
<link href="styles.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="alert alert-warning">
							Warning: You're approaching your limit. Please upgrade.
						</td>
					</tr>
					<tr>
						<td class="content-wrap">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										<p>To: <?php echo $row_view_email_system_template['senthtml_prospect_email_to']; ?></p>
										<p>From: <?php echo $row_view_email_system_template['senthtml_prospect_email_from']; ?></p></td>
								</tr>
								<tr>
									<td class="content-block">
									<?php echo $row_view_email_system_template['senthtml_prospect_email_systm_templates_body']; ?>			
                                    </td>
								</tr>
								<tr>
									<td class="content-block">
										<a href="emailtemplates.php" title="Email Templates" target="_parent" class="btn-primary">Upgrade my account</a>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										Thanks for choosing IDSCRM Account
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					<table width="100%">
						<tr>
							<td class="aligncenter content-block"><a href="unsubscribe.idscrm.com">Unsubscribe</a> from these alerts.</td>
						</tr>
					</table>
				</div></div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>
<?php
mysqli_free_result($view_email_system_template);
?>

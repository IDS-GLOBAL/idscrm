<?php require_once('db_admin.php'); ?>
<?php





if(isset($_POST['dudesid'], $_POST['prospctdlrid'], $_POST['email_to'], $_POST['email_from'], $_POST['email_template'], $_POST['email_template_subject'], $_POST['email_systm_templates_body'])){
	
//	echo 'I made it.'; 
	
	$senthtml_prospect_prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
	$senthtml_prospect_email_to  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_to']));
	$senthtml_prospect_email_from = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_from']));
	$senthtml_prospect_email_systemplate_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template']));
	$senthtml_prospect_email_subject_post = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_template_subject']));
	$senthtml_prospect_email_systm_templates_body = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['email_systm_templates_body']));
	
	
$create_emails_senthtml_prospectdlrs_sql = "	
	INSERT INTO `idsids_tracking_idsvehicles`.`emails_senthtml_prospectdlrs` SET
		`senthtml_prospect_dudesid` = '$dudesid',
		`senthtml_draft` = 'Y',
		`senthtml_prospect_prospctdlrid` = '$senthtml_prospect_prospctdlrid',
		`senthtml_prospect_email_to` = '$senthtml_prospect_email_to',
		`senthtml_prospect_email_from` = '$senthtml_prospect_email_from',
		`senthtml_prospect_email_subject_post` = '$senthtml_prospect_email_subject_post',
		`senthtml_prospect_email_systemplate_id` = '$senthtml_prospect_email_systemplate_id',
		`senthtml_prospect_email_systm_templates_body` = '$senthtml_prospect_email_systm_templates_body'
		";

//$ran_emails_senthtml_prospectdlrs_sql = mysqli_query($idsconnection_mysqli, $create_emails_senthtml_prospectdlrs_sql, $tracking);


$run_emails_senthtml_prospectdlrs = mysqli_query($tracking_mysqli, $create_emails_senthtml_prospectdlrs_sql);
$senthtml_prospect_id = mysqli_insert_id($tracking_mysqli);





mysql_select_db($database_tracking , $tracking);
$sys_senthtml_prospect_sql = "SELECT * FROM `emails_senthtml_prospectdlrs` WHERE `senthtml_prospect_id` = '$senthtml_prospect_id'";
$query_sys_senthtml_prospect = mysqli_query($idsconnection_mysqli, $sys_senthtml_prospect_sql, $tracking);
$row_sys_senthtml_prospect = mysqli_fetch_array($query_sys_senthtml_prospect);
$totalRows_sys_senthtml_prospect  = mysqli_num_rows($query_sys_senthtml_prospect);



$gotoemailtemplates = "email_templates/emails_senthtml_prospectdlrs.php?view=$senthtml_prospect_id";

echo "<script>window.top.location.href='".$gotoemailtemplates."'</script>";



/*


data: Array
(
    [dudesid] => 1
    [prospctdlrid] => 4517
    [email_to] => mistalawry@hotmail.com
    [email_from] => benjamin@idscrm.com
    [email_template] => 12
    [email_systm_templates_body] => This is that shit I was talking about.<p></p>

                        
)


*/








}




?>
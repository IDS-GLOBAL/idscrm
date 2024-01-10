<?php require_once('db_admin.php'); ?>
<?php
ini_set('memory_limit', '-1');

// Superadmin hack view
// Change the or to left joins on pending and system dealers stop bullshitting 02/18/2019 2:15 a.m.
if($dudesid == 9){
	
	$insert_mydlr_prospect_sql = "`dudes2_id` = '$dudesid' AND `last_modified` AND `dlrprospect_locked` IS NULL";
	
	}else{
		
	$insert_mydlr_prospect_sql = "`dudes_id` = '$dudesid' OR `dudes2_id` = '$dudesid' AND `last_modified` AND `dlrprospect_locked` IS NULL ";
	
}
$query_mydlr_prospects = "SELECT 
`dealer_prospects`.`id`,
`dealer_prospects`.`dlrprospect_locked`,
`dealer_prospects`.`dealer_pending_id`,
`dealer_prospects`.`dudes_id`,
`dealer_prospects`.`assigned_salesrep`,
`dealer_prospects`.`assigned_salesrep_phone`,
`dealer_prospects`.`dudes2_id`,
`dealer_prospects`.`contact`,
`dealer_prospects`.`dmcontact2`,
`dealer_prospects`.`dmcontact2_title`,
`dealer_prospects`.`dmcontact2_phone`,

`dealer_prospects`.`dmcontact2_phone_type`,
`dealer_prospects`.`dmcontact2_phone`,
`dealer_prospects`.`contact_phone_type`,
`dealer_prospects`.`contact_phone`,
`dealer_prospects`.`sales_email`,
`dealer_prospects`.`finance_primary_name`,
`dealer_prospects`.`finance`,
`dealer_prospects`.`finance_contact`,
`dealer_prospects`.`finance_contact_email`,
`dealer_prospects`.`company`,
`dealer_prospects`.`company_legalname`,
`dealer_prospects`.`dealer_type_label`,
`dealer_prospects`.`sales`,
`dealer_prospects`.`phone`,
`dealer_prospects`.`fax`,
`dealer_prospects`.`address`,
`dealer_prospects`.`city`,
`dealer_prospects`.`state`,
`dealer_prospects`.`zip`,
`dealer_prospects`.`email`,
`dealer_prospects`.`token`,
`dealer_prospects`.`dealer_chat`,
`dealer_prospects`.`created_at`,
`dealer_prospects`.`feedidfrazer`,
`dealer_prospects`.`feedhomenetfilename`,
`dealer_prospects`.`dudes_id` AS `dudes1_id`,
`dealer_prospects`.`dudes2_id`  AS `dudes2_id`,
`dealer_prospects`.`company`,
`dealer_prospects`.`dealer_type_id`,
`dudes`.`dudes_firstname`,
`dudes`.`dudes_lname`
FROM 
`idsids_tracking_idsvehicles`.`dealer_prospects`
	LEFT JOIN `idsids_idsdms`.`dudes` AS `dudes1_id` ON (`dealer_prospects`.`dudes_id` =  '$dudesid')
	LEFT JOIN `idsids_idsdms`.`dudes` AS `dudes2_id` ON (`dealer_prospects`.`dudes2_id` = '$dudesid')
	JOIN `idsids_idsdms`.`dudes` on `dealer_prospects`.`dudes_id` = `dudes`.`dudes_id`
WHERE 
	`dealer_prospects`.`dudes_id` IS NOT NULL
GROUP BY
	`dealer_prospects`.`id`
ORDER BY `dealer_prospects`.`id` DESC LIMIT 100";
$mydlr_prospects = mysqli_query($idsconnection_mysqli, $query_mydlr_prospects);
$row_mydlr_prospects = mysqli_fetch_assoc($mydlr_prospects);
$totalRows_mydlr_prospects = mysqli_num_rows($mydlr_prospects);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mydlr_pending = "
SELECT 
`dealers_pending`.`id`,
`dealers_pending`.`sys_covertdlrs_did`,
`dealers_pending`.`prospctdlrid`,
`dealers_pending`.`dudes_id`,
`dealers_pending`.`assigned_salesrep`,
`dealers_pending`.`assigned_salesrep_phone`,
`dealers_pending`.`dudes2_id`,
`dealers_pending`.`contact`,
`dealers_pending`.`contact_phone`,
`dealers_pending`.`contact_phone_type`,
`dealers_pending`.`dmcontact2`,
`dealers_pending`.`dmcontact2_phone`,
`dealers_pending`.`dmcontact2_phone_type`,
`dealers_pending`.`finance_contact`,
`dealers_pending`.`finance_primary_name`,
`dealers_pending`.`finance_contact_email`,
`dealers_pending`.`company`,
`dealers_pending`.`company_legalname`,
`dealers_pending`.`dealer_type_label`,
`dealers_pending`.`sales_email`,
`dealers_pending`.`sales_contact`,
`dealers_pending`.`sales`,
`dealers_pending`.`phone`,
`dealers_pending`.`fax`,
`dealers_pending`.`address`,
`dealers_pending`.`city`,
`dealers_pending`.`state`,
`dealers_pending`.`zip`,
`dealers_pending`.`email`,
`dealers_pending`.`token`,
`dealers_pending`.`created_at`,
`dealers_pending`.`frazer_customer_no`,
`dealers_pending`.`dudes_id` AS `dudes1_id`,
`dealers_pending`.`dudes2_id`  AS `dudes2_id`,
`dealers_pending`.`company`,
`dealers_pending`.`dealer_type_id`,
`dudes`.`dudes_firstname`,
`dudes`.`dudes_lname`
FROM 
`idsids_idsdms`.`dealers_pending`
	LEFT JOIN `idsids_idsdms`.`dudes` AS `dudes1_id` ON (`dealers_pending`.`dudes_id` =  '$dudesid')
	LEFT JOIN `idsids_idsdms`.`dudes` AS `dudes2_id` ON (`dealers_pending`.`dudes2_id` = '$dudesid')
	JOIN `idsids_idsdms`.`dudes` on `dealers_pending`.`dudes_id` = `dudes`.`dudes_id`

WHERE 
	`dealers_pending`.`dudes_id` IS NOT NULL
GROUP BY
	`dealers_pending`.`id`
ORDER BY `dealers_pending`.`id` DESC LIMIT 100
";
$mydlr_pending = mysqli_query($idsconnection_mysqli, $query_mydlr_pending);
$row_mydlr_pending = mysqli_fetch_assoc($mydlr_pending);
$totalRows_mydlr_pending = mysqli_num_rows($mydlr_pending);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mysystem_dlrs = "SELECT 
`dealers`.`id`,
`dealers`.`token`,
`dealers`.`dealer_pending_id`,
`dealers`.`prospct_dlrid`,
`dealers`.`dudes_id`,
`dealers`.`assigned_salesrep`,
`dealers`.`assigned_salesrep_phone`,
`dealers`.`dudes2_id`,
`dealers`.`contact`,
`dealers`.`contact_title`,
`dealers`.`contact_phone`,
`dealers`.`contact_phone_type`,
`dealers`.`dmcontact2`,
`dealers`.`dmcontact2_title`,
`dealers`.`finance`,
`dealers`.`finance_contact`,
`dealers`.`contact_phone_type`,
`dealers`.`contact_phone`,
`dealers`.`contact_phone_type`,
`dealers`.`dmcontact2_phone`,
`dealers`.`dmcontact2_phone_type`,
`dealers`.`finance_contact`,
`dealers`.`company`,
`dealers`.`company_legalname`,
`dealers`.`dealer_type_id`,
`dealers`.`phone`,
`dealers`.`fax`,
`dealers`.`address`,
`dealers`.`city`,
`dealers`.`state`,
`dealers`.`zip`,
`dealers`.`email`,
`dealers`.`sales1`,
`dealers`.`accts_rcvbles_name`,
`dealers`.`accts_rcvbles_email`,
`dealers`.`accts_rcvbles_verified`,
`dealers`.`accts_rcvbles_password`,
`dealers`.`accts_rcvbles_phone`,
`dealers`.`accts_payables_name`,
`dealers`.`accts_payables_email`,
`dealers`.`accts_payables_verified`,
`dealers`.`accts_payables_phone`,
`dealers`.`leadsidsemail`,
`dealers`.`token`,
`dealers`.`created_at`,
`dealers`.`feedidfrazer`,
`dudes`.`dudes_id`,
`dealers`.`dudes_id` AS `dudes1_id`,
`dealers`.`dudes2_id`  AS `dudes2_id`,
`dudes`.`dudes_firstname`,
`dudes`.`dudes_lname`,
`dealers`.`company`,
`dealers`.`dealer_type_id`
FROM 
`idsids_idsdms`.`dealers`
	LEFT JOIN `idsids_idsdms`.`dudes` AS `dudes1_id` ON (`dealers`.`dudes_id` =  '$dudesid')
	LEFT JOIN `idsids_idsdms`.`dudes` AS `dudes2_id` ON (`dealers`.`dudes2_id` = '$dudesid')
	JOIN `idsids_idsdms`.`dudes` on `dealers`.`dudes_id` = `dudes`.`dudes_id`
WHERE 
	`dealers`.`dudes_id` IS NOT NULL
GROUP BY
	`dealers`.`id`
ORDER BY `dealers`.`id` DESC LIMIT 100";
$mysystem_dlrs = mysqli_query($idsconnection_mysqli, $query_mysystem_dlrs);
$row_mysystem_dlrs = mysqli_fetch_assoc($mysystem_dlrs);
$totalRows_mysystem_dlrs = mysqli_num_rows($mysystem_dlrs);





mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_activsystem_templates = "SELECT * FROM `idsids_idsdms`.`dudes_sys_htmlemail_templates` WHERE `email_systm_templates_status` = '1' ORDER BY `email_systm_templates_subject` ASC";
$find_activsystem_templates = mysqli_query($idsconnection_mysqli, $query_find_activsystem_templates);
$row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
$totalRows_find_activsystem_templates = mysqli_num_rows($find_activsystem_templates);





/*

$maxRows_note = 10;
$pageNum_note = 0;
if (isset($_GET['pageNum_note'])) {
  $pageNum_note = $_GET['pageNum_note'];
}
$startRow_note = $pageNum_note * $maxRows_note;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_note = "SELECT * FROM dudes_dlr_notes WHERE dudes_dlr_notes.dudes_dlr_notes_did = '$did' ORDER BY dudes_dlr_notes_id DESC";
$query_limit_note =  sprintf("%s LIMIT %d, %d", $query_note, $startRow_note, $maxRows_note);
$note = mysqli_query($idsconnection_mysqli, $query_limit_note);
$row_note = mysqli_fetch_array($note);

if (isset($_GET['totalRows_note'])) {
  $totalRows_note = $_GET['totalRows_note'];
} else {
  $all_note = mysqli_query($idsconnection_mysqli, $query_note);
  $totalRows_note = mysqli_num_rows($all_note);
}
$totalPages_note = ceil($totalRows_note/$maxRows_note)-1;

*/



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>
<link href="css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>








        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Dealer Parking Lot</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="myaccountbtn">
                    	<a role="button"><?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?></a>
                        <input id="dudesid" type="hidden" value="<?php echo $dudesid; ?>">
                    </li>
                    <li>
                        <a href="#">My Parking Lot</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div id="myparkinglot_box" class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->









            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View Flip <small>Sort, search</small></h5>
                    </div>


						<div class="ibox-content">
                            <p>
                                Below are optional views of your parking lot broken down into 3  categories. <code>Prospect Parking Lot, Pending Parking Lot, System Dealer Parking Lot.</code>.
                            </p>

                            <h3 class="font-bold">Switch Your View <small>by using the buttons below.</small></h3>
                            <p align="center">
                                <button id="flip_prospects" class="btn btn-warning btn-rounded">View (<?php echo $totalRows_mydlr_prospects; ?>) Prospects</button>
                                <button id="flip_pendingdlrs" class="btn btn-danger btn-rounded">View (<?php echo $totalRows_mydlr_pending; ?>) Pending</button>
                                <button id="flip_sysdealers" class="btn btn-success btn-rounded">View (<?php echo $totalRows_mysystem_dlrs; ?>) System Dealers</button>
                            </p>
                         </div>


                </div>
              </div>
            </div>





            <div id="work_aprospect_instate" class="row" style="display:none;">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Work a prospect <small>Click Below To See</small></h5>
                    </div>
                    
                    
                    
                     <div class="ibox-content">
                     </div>
                
                
                
                </div>
              </div>
            </div>





            <div id="view_aprospect_instate" class="row" style="display:none;">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealer Quick View <small>Click Below To See</small></h5>
                    </div>
                    
                    
                    
                     <div id="mydealer_ajax_view" class="ibox-content">
                     </div>
                
                
                
                </div>
              </div>
            </div>




            <div id="view_prospects_block" class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Your Prospect Dealer Parking Lot <small>All prospect dealers assigned to you</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a  id="thisdlrqckvw" role="button">Quick Open</a>
                                </li>
                                <li><a id="thisdlrfullvw" role="button">Full View</a>
                                </li>
                            </ul>
                        </div>

                    </div>


						<input id="prospctdlrid" value="" type="hidden">
                        <div id="email_dlrprospectsent_results"></div>
                        
                    <div class="ibox-content">




<table id="mydataTable1" class="table table-striped table-bordered table-hover dataTable" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Company</th>
            <th>Emails</th>
            <th>Phones</th>
            <th>State</th>
            <th>Action</th>
        </tr>
    </thead>
 
    <tbody>
<?php do { ?>
        <tr id="<?php echo $row_mydlr_prospects['id']; ?>">
            <td>
	            <?php echo $row_mydlr_prospects['id']; ?>
            </td>
            <td title="Legal Name: <?php echo $row_mydlr_prospects['company_legalname']; ?>">
				<h4><?php echo $row_mydlr_prospects['company']; ?></h4>
                
                
                
                <?php
				if(isset($row_mydlr_prospects['dudes_id'])){
									echo $row_mydlr_prospects['dudes_firstname'].' '.$row_mydlr_prospects['dudes_lname'].'<br />';

				}
				?>
                
                
            </td>
            <td>
				Admin: <?php echo $row_mydlr_prospects['email']; ?><br />
                F&I Mrgr: <?php echo $row_mydlr_prospects['finance_contact_email']; ?><br />
				1 Sales Per: <?php echo $row_mydlr_prospects['sales_email']; ?><br />
                
            </td>
            <td title="All Numbers">
            	Store #: <?php echo $row_mydlr_prospects['phone']; ?> <?php echo $row_mydlr_prospects['contact_phone_type']; ?><br />
	            DM#1: <?php echo $row_mydlr_prospects['contact_phone']; ?> <?php echo $row_mydlr_prospects['contact_phone_type']; ?><br />
	            DM#2: <?php echo $row_mydlr_prospects['dmcontact2_phone']; ?> <?php echo $row_mydlr_prospects['dmcontact2_phone_type']; ?><br />
	            F&amp;I Mrgr: <?php echo $row_mydlr_prospects['finance_contact']; ?><br />
                FAX:  <?php echo $row_mydlr_prospects['fax']; ?><br />
            </td>
            <td>
				<?php echo $row_mydlr_prospects['city']; ?> <?php echo $row_mydlr_prospects['state']; ?> <?php echo $row_mydlr_prospects['zip']; ?> 
            </td>
            <td>
           		<a id="prospctdlrid" class="btn btn-w-m btn-warning" rel="<?php echo $row_mydlr_prospects['id']; ?>" role="button">View Dealer</a>
                <br />
                <?php echo $row_mydlr_prospects['created_at']; ?>

            </td>

  <?php } while ($row_mydlr_prospects = mysqli_fetch_array($mydlr_prospects)); ?>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Company</th>
            <th>Emails</th>
            <th>Phones</th>
            <th>State</th>
            <th>Action</th>
        </tr>
    </tfoot>

    </tbody>
</table>














                    

                    </div>
                </div>
              </div>
            </div>



<div id="view_pendingdlrs_block" class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Your Pending Dealers Parking Lot <small>Dealers you sent an invitation to register.</small></h5>
						  <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a  id="thisdlrqckvw" role="button">Quick Open</a>
                                </li>
                                <li><a id="thisdlrfullvw" role="button">Full View</a>
                                </li>
                            </ul>
                          </div>

                    </div>
                    <div class="ibox-content">



<p>Your Pending Dealer Parking Lot</p>
<table id="mydataTable2" class="table table-striped table-bordered table-hover dataTable" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Company</th>
            <th>Emails</th>
            <th>Phones</th>
            <th>State</th>
            <th>Action</th>
        </tr>
    </thead>
 
    <tbody>
<?php do { ?>
        <tr id="<?php echo $row_mydlr_pending['id']; ?>">
            <td>
	            <?php echo $row_mydlr_pending['id']; ?>
            </td>
            <td title="Legal Name: <?php echo $row_mydlr_pending['company_legalname']; ?>">
				<h4><?php echo $row_mydlr_pending['company']; ?></h4>
                <?php
				if(isset($row_mydlr_pending['dudes_id'])){
									echo $row_mydlr_pending['dudes_firstname'].' '.$row_mydlr_pending['dudes_lname'].'<br />';

				}
				?>

            </td>
            <td>
				Admin: <?php echo $row_mydlr_pending['email']; ?><br />
                F&I Mrgr: <?php echo $row_mydlr_pending['finance_contact_email']; ?><br />
				1 Sales Per: <?php echo $row_mydlr_pending['sales']; ?><br />
                
            </td>
            <td title="All Numbers">
            	Store #: <?php echo $row_mydlr_pending['phone']; ?> <?php echo $row_mydlr_pending['contact_phone_type']; ?><br />
	            DM#1: <?php echo $row_mydlr_pending['contact_phone']; ?> <?php echo $row_mydlr_pending['contact_phone_type']; ?><br />
	            DM#2: <?php echo $row_mydlr_pending['dmcontact2_phone']; ?> <?php echo $row_mydlr_pending['dmcontact2_phone_type']; ?><br />
	            F&amp;I Mrgr: <?php echo $row_mydlr_pending['finance_contact']; ?><br />
                FAX:  <?php echo $row_mydlr_pending['fax']; ?><br />
            </td>
            <td>
				<?php echo $row_mydlr_pending['city']; ?> <?php echo $row_mydlr_pending['state']; ?> <?php echo $row_mydlr_pending['zip']; ?> 
            </td>
            <td>
           		<a href="my.pending.dealer.php?pendingdlrtoken=<?php echo $row_mydlr_pending['token']; ?>" target="_blank" class="btn btn-w-m btn-danger" id="pendingdlrtoken" rel="<?php echo $row_mydlr_pending['id']; ?>">View Pnd Dealer</a>
				<br />
                <?php echo $row_mydlr_pending['created_at']; ?>

            </td>

  <?php } while ($row_mydlr_pending = mysqli_fetch_array($mydlr_pending)); ?>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Company</th>
            <th>Emails</th>
            <th>Phones</th>
            <th>State</th>
            <th>Action</th>
        </tr>
    </tfoot>

    </tbody>
</table>








                    </div>
                </div>
              </div>
            </div>



<div id="view_sysdealers_block" class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Your System Dealers Parking Lot<small>Dealers that belong to you or your helping out with.</small></h5>
						<div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a  id="thisdlrqckvw" role="button">Quick Open</a>
                                </li>
                                <li><a id="thisdlrfullvw" role="button">Full View</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="ibox-content">

<p>System Dealer Parking Lot Is What The Dealer Ordered</p>

<table id="mydataTable3" class="table table-striped table-bordered table-hover dataTable" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Company</th>
            <th>Emails</th>
            <th>Phones</th>
            <th>State</th>
            <th>Action</th>
        </tr>
    </thead>
 
    <tbody>
<?php

 do { ?>
        <tr id="<?php echo $row_mysystem_dlrs['id']; ?>">
            <td>
	            <?php echo $row_mysystem_dlrs['id']; ?>
            </td>
            <td title="Legal Name: <?php echo $row_mysystem_dlrs['company_legalname']; ?>">
				<h4><?php echo $row_mysystem_dlrs['company']; ?></h4>
                                <?php
				if(isset($row_mysystem_dlrs['dudes_id'])){
									echo $row_mysystem_dlrs['dudes_firstname'].' '.$row_mysystem_dlrs['dudes_lname'].'<br />';

				}
				?>

            </td>
            <td>
				Admin Email: <?php echo $row_mysystem_dlrs['email']; ?><br />
                Accts Payable: <?php echo $row_mysystem_dlrs['finance_contact']; ?><br />
                Leads Email: <?php echo $row_mysystem_dlrs['leadsidsemail']; ?><br />
				Accts Payables Email: <?php echo $row_mysystem_dlrs['accts_payables_email']; ?><br />
				Accts. Rcvbles Email: <?php echo $row_mysystem_dlrs['accts_rcvbles_email']; ?><br />
            </td>
            <td title="<?php echo $row_mysystem_dlrs['contact_title']; ?> = <?php echo $row_mysystem_dlrs['contact']; ?> or <?php echo $row_mysystem_dlrs['dmcontact2']; ?> = <?php echo $row_mysystem_dlrs['dmcontact2_title']; ?>">
            	Store #: <?php echo $row_mysystem_dlrs['phone']; ?> <?php echo $row_mysystem_dlrs['contact_phone_type']; ?><br />
	            DM#1: <?php echo $row_mysystem_dlrs['contact_phone']; ?> <?php echo $row_mysystem_dlrs['contact_phone_type']; ?><br />
	            DM#2: <?php echo $row_mysystem_dlrs['dmcontact2_phone']; ?> <?php echo $row_mysystem_dlrs['dmcontact2_phone_type']; ?><br />
	            F&amp;I Mrgr: <?php echo $row_mysystem_dlrs['finance_contact']; ?><br />
                FAX:  <?php echo $row_mysystem_dlrs['fax']; ?><br />
            </td>
            <td>
				<?php echo $row_mysystem_dlrs['city']; ?> <?php echo $row_mysystem_dlrs['state']; ?> <?php echo $row_mysystem_dlrs['zip']; ?> 
            </td>
            <td>
           		<a id="sysdealerid" rel="<?php echo $row_mysystem_dlrs['id']; ?>" href="dealer.php?sysdealertoken=<?php echo $row_mysystem_dlrs['token']; ?>&sysdealerid=<?php echo $row_mysystem_dlrs['id']; ?>" target="_blank" class="btn btn-w-m btn-success">View Sys Dealer</a>
                                <br />
                <?php echo $row_mysystem_dlrs['created_at']; ?>

            </td>
  <?php } while ($row_mysystem_dlrs = mysqli_fetch_array($mysystem_dlrs)); ?>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Company</th>
            <th>Emails</th>
            <th>Phones</th>
            <th>State</th>
            <th>Action</th>
        </tr>
    </tfoot>

    </tbody>
</table>  

                    </div>
                </div>
              </div>
            </div>



            


            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <script src="js/custom/my.dealers.js"></script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbYYY54ZOHlFuHK7v-Fq3kWQYgwim8xec&language=eng"></script>


<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable1').dataTable( {
		"iDisplayLength": 25,
	   "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "/swf/copy_csv_xls_pdf.swf"
        },
		"order": [[1, 'asc']],
		"ordering": false,
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    } );

	$('#mydataTable2').dataTable( {
		"iDisplayLength": 25,
	   "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "/swf/copy_csv_xls_pdf.swf"
        },
		"order": [[1, 'asc']],
		"ordering": false,
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    } );

	$('#mydataTable3').dataTable( {
		"iDisplayLength": 25,
	   "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "/swf/copy_csv_xls_pdf.swf"
        },
		"order": [[1, 'asc']],
		"ordering": false,
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    } );

	
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
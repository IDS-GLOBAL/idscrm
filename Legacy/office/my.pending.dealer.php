<?php require_once('db_admin.php'); ?>
<?php


$colname_pullPndngDlr = "-1";
if (isset($_GET['pendingdlrtoken'])) {
  $colname_pullPndngDlr = $_GET['pendingdlrtoken'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pullPndngDlr =  "SELECT * FROM `idsids_idsdms`.`dealers_pending` WHERE `dealers_pending`.`token` = '$colname_pullPndngDlr'";
$pullPndngDlr = mysqli_query($idsconnection_mysqli, $query_pullPndngDlr);
$row_pullPndngDlr = mysqli_fetch_array($pullPndngDlr);
$totalRows_pullPndngDlr = mysqli_num_rows($pullPndngDlr);
$prospctdlrid = $row_pullPndngDlr['id'];

mysqli_select_db($tracking_mysqli, $database_tracking);
$query_qrydlr_prospc_notes = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_dlr_prospc_notes` WHERE `dudes_dlr_prospc_notes`.`dudes_dlr_notes_did` = '$prospctdlrid' ORDER BY `dudes_dlr_prospc_notes`.`dudes_dlr_notes_created_at` DESC";
$qrydlr_prospc_notes = mysqli_query($tracking_mysqli , $query_qrydlr_prospc_notes);
$row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes);
$totalRows_qrydlr_prospc_notes = mysqli_num_rows($qrydlr_prospc_notes);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Pending Dealer</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Pending Dealer</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->




        <div class="row">
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        
                                        <div class="row">
                                        	<div class="col-sm-12" align="center">
                                            <a id="convert_pendingdlr" href="https://idscrm.com/verify.php?secret=<?php echo $row_pullPndngDlr['token']; ?>&token=<?php echo $row_userDudes['dudes_public_token']; ?>" target="_blank" class="btn btn-warning dim btn-xs">Covert To System Dealer.</a>
                                            <a id="viewprospect_dlr" href="prospect.dealer.php?prospctdlrid=<?php echo $row_pullPndngDlr['prospctdlrid']; ?>" target="_blank" class="btn btn-warning dim btn-xs m-l-md">View As A Prospect.</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-sm-12">
                                            <h3><small>Company: </small><?php echo $row_pullPndngDlr['company']; ?></h3>
                                            <h4><small>Bill To: </small><?php echo $row_pullPndngDlr['company_legalname']; ?></h4>
                                            </div>
                                        </div>
                                  </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-primary">Active</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Email:</dt> <dd><a href="#" class="text-navy"><?php echo $row_pullPndngDlr['email']; ?> </a> </dd>
                                        <dt>Username:</dt> <dd><a href="#" class="text-navy"><?php echo $row_pullPndngDlr['username']; ?> </a> </dd>
                                        <dt>Password:</dt> <dd><a href="#" class="text-navy"><?php echo $row_pullPndngDlr['password']; ?> </a> </dd>

                                        <dt>Main Phone#:</dt> <dd><?php echo $row_pullPndngDlr['phone']; ?></dd>
                                        <dt>Fax:</dt> <dd><?php echo $row_pullPndngDlr['fax']; ?></dd>
                                        <dt>Address:</dt> <dd><?php echo $row_pullPndngDlr['address']; ?></dd>
                                        <dt>City:</dt> <dd><?php echo $row_pullPndngDlr['city']; ?></dd>
                                        <dt>State:</dt> <dd><?php echo $row_pullPndngDlr['state']; ?></dd>
                                        <dt>Zip:</dt> <dd><?php echo $row_pullPndngDlr['zip']; ?></dd>
                                        <dt>Cntct1:</dt> <dd><?php echo $row_pullPndngDlr['contact']; ?></dd>
                                        <dt>Cntct1 Ttl:</dt> <dd><?php echo $row_pullPndngDlr['contact_title']; ?></dd>
                                        <dt>Cntct1 Phn:</dt> <dd><?php echo $row_pullPndngDlr['contact_phone']; ?></dd>
                                        <dt>Cntct1 Phn Typ:</dt> <dd><?php echo $row_pullPndngDlr['contact_phone_type']; ?></dd>
                                        
                                        <dt>Business Model:</dt> <dd><?php echo $row_pullPndngDlr['dealer_type_label']; ?></dd>


                                        <dt>Company Legal Name:</dt> <dd><a href="#" class="text-navy"> <?php echo $row_pullPndngDlr['company_legalname']; ?></a> </dd>

                                        <dt>Dlr Type Id:</dt> <dd><?php echo $row_pullPndngDlr['wfh_dealer_type_id']; ?></dd>
                                        <dt>Dlr Type:</dt> <dd><?php echo $row_pullPndngDlr['wfh_dealer_type_label']; ?></dd>

                                        <dt>Market ID:</dt> <dd><?php echo $row_pullPndngDlr['dealer_market_id']; ?></dd>
                                        <dt>Market Sub Id:</dt> <dd><?php echo $row_pullPndngDlr['dealer_market_sub_id']; ?></dd>

                                        
                                        <dt>Business Model:</dt> <dd><?php echo $row_pullPndngDlr['dealer_type_label']; ?></dd>
                                        <dt>Prospect Dealer ID:</dt> <dd>  <?php echo $row_pullPndngDlr['prospctdlrid']; ?></dd>
                                        <dt>System Converted DID:</dt> <dd><a href="#" class="text-navy"><?php echo $row_pullPndngDlr['sys_covertdlrs_did']; ?> </a> </dd>

                                    </dl>
                                </div>
                                <div class="col-lg-12" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd><?php echo $row_pullPndngDlr['dealerTimezone']; ?></dd>
                                        <dt>Created At:</dt> <dd> 	<?php echo $row_pullPndngDlr['created_at']; ?>7 </dd>
                                        <dt>Participants:</dt>
                                        <dd class="project-people">
                                        <a href="<?php echo $row_pullPndngDlr['dudes_id']; ?>"><img alt="image" class="img-circle" src="img/no-pic-avatar.png"></a>
                                        <a href="<?php echo $row_pullPndngDlr['dudes2_id']; ?>"><img alt="image" class="img-circle" src="img/no-pic-avatar.png"></a>
                                        </dd>

                                        <dt>Cntct2:</dt> <dd><?php echo $row_pullPndngDlr['dmcontact2']; ?></dd>
                                        <dt>Cntct2 Title:</dt> <dd><?php echo $row_pullPndngDlr['dmcontact2_title']; ?></dd>
                                        <dt>Cntct2 Phone:</dt> <dd><?php echo $row_pullPndngDlr['dmcontact2_phone']; ?></dd>
                                        <dt>Cntct2 Phone Type:</dt> <dd><?php echo $row_pullPndngDlr['dmcontact2_phone_type']; ?></dd>
                                        <dt>Mbl Crier Id:</dt> <dd><?php echo $row_pullPndngDlr['dmcontact2_mobilecarrier_id']; ?></dd>
                                        <dt>Mbl Crier Label:</dt> <dd><?php echo $row_pullPndngDlr['dmcontact2_mobilecarrier_label']; ?></dd>
                                        <dt>Website:</dt> <dd><?php echo $row_pullPndngDlr['website']; ?></dd>
                                        <dt>Prmry Fnc Nm:</dt> <dd><?php echo $row_pullPndngDlr['finance_primary_name']; ?></dd>

                                        <dt>F&I Mgr. Name:</dt> <dd><?php echo $row_pullPndngDlr['finance']; ?></dd>
                                        <dt>F&I Mgr. Contact:</dt> <dd><?php echo $row_pullPndngDlr['finance_contact']; ?></dd>
                                        <dt>F&I Mgr Email:</dt> <dd><?php echo $row_pullPndngDlr['finance_contact_email']; ?></dd>
                                        <dt>Sls Person Name:</dt> <dd><?php echo $row_pullPndngDlr['sales']; ?></dd>
                                        <dt>Sls Cntct:</dt> <dd><?php echo $row_pullPndngDlr['sales_contact']; ?></dd>
                                        <dt>Sls Email:</dt> <dd><?php echo $row_pullPndngDlr['sales_email']; ?></dd>



                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Completed:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                            <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab-1" data-toggle="tab">Users messages</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">Last activity</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">
                                
                                   

                       <div class="row">
                        <h3>Completed</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>

                        <div id="log_notes_results" class="col-md-12">


                            <ul class="sortable-list connectList agile-list" id="completed">
        
        <?php do { ?>                            
                                <li class="info-element" id="task<?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_id']; ?>">
                                    <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_body']; ?>
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white"><?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_dude_name']; ?></a>
                                        <i class="fa fa-clock-o"></i> <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_created_at']; ?>
                                    </div>
                                </li>
        <?php } while ($row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes)); ?>
        					</ul>
        
                            










                        </div>
                       </div>


                                </div>
                                <div class="tab-pane" id="tab-2">

                                    <h3>Tab 2 - Currently Disabled</h3>

                                </div>
                                </div>

                                </div>

                                </div>
                                </div>
                            </div>
                        </div>
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

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php
mysqli_free_result($pullPndngDlr);

?>
<?php include("inc.end.phpmsyql.php"); ?>
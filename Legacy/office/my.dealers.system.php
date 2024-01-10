<?php require_once('db_admin.php'); ?>
<?php

// Superadmin hack view
if($dudesid == 9){
	
	$insert_mydlr_prospect_sql = "`dudes2_id` = '$dudesid' AND `last_modified` AND `dlrprospect_locked` IS NULL";
	
	}else{
		
	$insert_mydlr_prospect_sql = "`dudes_id` = '$dudesid' OR `dudes2_id` = '$dudesid' AND `last_modified` AND `dlrprospect_locked` IS NULL ";
	
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_mysystem_dlrs = "SELECT * FROM `dealers` WHERE `dudes_id` = '$dudesid' OR `dudes2_id` = '$dudesid' ORDER BY `company` ASC";
$mysystem_dlrs = mysqli_query($idsconnection_mysqli, $query_mysystem_dlrs);
$row_mysystem_dlrs = mysqli_fetch_array($mysystem_dlrs);
$totalRows_mysystem_dlrs = mysqli_num_rows($mysystem_dlrs);





mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_activsystem_templates = "SELECT * FROM `dudes_sys_htmlemail_templates` WHERE `email_systm_templates_status` = '1' ORDER BY `email_systm_templates_subject` ASC";
$find_activsystem_templates = mysqli_query($idsconnection_mysqli, $query_find_activsystem_templates);
$row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
$totalRows_find_activsystem_templates = mysqli_num_rows($find_activsystem_templates);





function display_dudes_name($dudesId){

global $database_idsconnection;
global $idsconnection;

if($dudesId == 0) return false;
$dudesId = mysql_real_escape_string(trim($dudesId));
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_thisuserDudes ="SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_id` = '$dudesId'";
$userthisDudes = mysqli_query($idsconnection_mysqli, $query_thisuserDudes);
$row_userthisDudes = mysqli_fetch_array($userthisDudes);
$totalRows_userthisDudes = mysqli_num_rows($userthisDudes);

if($totalRows_userthisDudes != 0){
echo '<em>'.$row_userthisDudes['dudes_firstname'].' '.$row_userthisDudes['dudes_lname'].'</em>';
}


return;
}


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
                        <h5>System Dealer Only View <small>Sort, search</small></h5>
                    </div>


						<div class="ibox-content">
                            <p>
                                Below are optional views of your parking lot broken down into 3  categories. <code>Prospect Parking Lot, Pending Parking Lot, System Dealer Parking Lot.</code>.
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




<div id="view_sysdealers_block" class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Your System Only Dealers Parking Lot <small> Dealers that belong to you or your helping out with them.</small></h5>
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

<p>System Dealer Parking Lot</p>

<table id="mydataTable3" class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
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
        <tr id="<?php echo $row_mysystem_dlrs['id']; ?>">
            <td>
	            <?php echo $row_mysystem_dlrs['id']; ?>
            </td>
            <td title="Legal Name: <?php echo $row_mysystem_dlrs['company_legalname']; ?>">
				<?php echo $row_mysystem_dlrs['company']; ?>
            </td>
            <td>
				Admin Email: <?php echo $row_mysystem_dlrs['email']; ?><br />
                Accts Payable: <?php echo $row_mysystem_dlrs['finance_contact1']; ?><br />
                Leads Email: <?php echo $row_mysystem_dlrs['leadsidsemail']; ?><br />
				Accts Payables Email: <?php echo $row_mysystem_dlrs['accts_payables_email']; ?>
				Accts. Rcvbles Email: <?php echo $row_mysystem_dlrs['accts_rcvbles_email']; ?>
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

    <script src="js/custom/my.dealers.system.js"></script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbYYY54ZOHlFuHK7v-Fq3kWQYgwim8xec&language=eng"></script>


<script type="text/javascript" language="javascript">

$(document).ready(function() {

	$('#mydataTable3').dataTable( {
		"iDisplayLength": 25,
	   "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "/swf/copy_csv_xls_pdf.swf"
        },
		"order": [[1, 'asc']],
		"ordering": true,
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    } );

	
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
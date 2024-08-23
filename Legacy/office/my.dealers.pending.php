<?php require_once('db_admin.php'); ?>
<?php
ini_set('memory_limit', '-1');



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
	`dealers_pending`.`sys_covertdlrs_did` IS  NULL
GROUP BY
	`dealers_pending`.`id`
ORDER BY `dealers_pending`.`id` DESC
";
$mydlr_pending = mysqli_query($idsconnection_mysqli, $query_mydlr_pending);
$row_mydlr_pending = mysqli_fetch_assoc($mydlr_pending);
$totalRows_mydlr_pending = mysqli_num_rows($mydlr_pending);















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
<?php include("analyticstracking.php"); ?>
    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Pending Dealers</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Pending Dealers</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->



			

			<div id="view_pendingdlrs_block" class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Your Pending Dealers View <small>Dealers you sent an invitation to register.</small></h5>
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
				1 Sales Per: <?php echo $row_mydlr_pending['sales_email']; ?><br />
                
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


			


            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

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


	
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
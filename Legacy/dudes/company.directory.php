<?php require_once('db_admin.php'); ?>
<?php




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_ids_directory = "SELECT * FROM dudes ORDER BY dudes_id DESC";
$ids_directory = mysqli_query($idsconnection_mysqli, $query_ids_directory);
$row_ids_directory = mysqli_fetch_array($ids_directory);
$totalRows_ids_directory = mysqli_num_rows($ids_directory);




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
                <h2>Internal Profile</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Internal Profile</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Company Directory <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">


<table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Emails</th>
            <th>Phones</th>
            <th>State</th>
            <th>Action</th>
        </tr>
    </thead>
 
    <tbody>
<?php do { ?>
    
        <tr id="<?php echo $row_ids_directory['dudes_id']; ?>">
            <td>
			<?php echo $row_ids_directory['dudes_id']; ?> &amp; 
            <?php
			
			$status = $row_ids_directory['dudes_status'];
			if($status == 0){ echo 'InActive'; }elseif($status == 1){ echo 'Active'; }else{ echo $status.':?'; }
			
			?> @<?php echo $row_ids_directory['dudes_access_level']; ?>
            </td>
            <td><?php echo $row_ids_directory['dudes_firstname']; ?>
           		<?php echo $row_ids_directory['dudes_lname']; ?>
           </td>
            <td>
				Internal: <?php echo $row_ids_directory['dudes_email_internal']; ?> <br />
				Personal: <?php echo $row_ids_directory['dudes_email_personal']; ?>
            </td>
            <td>
			
			
			Cell: <?php echo $row_ids_directory['dudes_cellphone']; ?><br />
			Work: <?php echo $row_ids_directory['dudes_workphone_no']; ?> Ext: <?php echo $row_ids_directory['dudes_workphone_ext']; ?>
            
            </td>
            <td><?php echo $row_ids_directory['dudes_home_state']; ?></td>
            <td>
            	<?php if($dudes_skillset_id == '9'){ ?>
            <a href="update.dude.php?idsmbmrid=<?php echo $row_ids_directory['dudes_id']; ?>">Power</a>
            <br />
<?php } ?>

            <a href="internal.profile.php?idsmbmrid=<?php echo $row_ids_directory['dudes_id']; ?>">Profile</a>
            </td>
        </tr>
  <?php } while ($row_ids_directory = mysqli_fetch_array($ids_directory)); ?>

    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
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
            


            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>


<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable( {
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
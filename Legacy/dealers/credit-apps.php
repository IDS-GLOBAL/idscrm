<?php require_once("db_loggedin.php"); ?>
<?php




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_creditapps = "SELECT * FROM `credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_did` = '$did' AND `credit_app_fullblown`.`application_created_date`  BETWEEN  '$converted_time_2' AND '$time_now'	 ORDER BY `credit_app_fullblown`.`credit_app_fullblown_id` DESC";
$find_creditapps = mysqli_query($idsconnection_mysqli, $query_find_creditapps) or die(mysqli_error());
$row_find_creditapps = mysqli_fetch_assoc($find_creditapps);
$totalRows_find_creditapps = mysqli_num_rows($find_creditapps);


function write_app_number($credit_app_fullblown_id, $creditapp_did, $caught_app_number){

global $idsconnection_mysqli;
global $database_idsconnection;


$credit_app_fullblown_id;
$creditapp_did;
$caught_app_number;

if(!$credit_app_fullblown_id) return;

if(!$creditapp_did) return;

if(!$caught_app_number) return;


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_next_appnumber = "SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown`.`applicant_did` = '$creditapp_did' AND `credit_app_fullblown`.`application_created_date` BETWEEN  '$converted_time_2' AND '$time_now' ORDER BY `credit_app_fullblown`.`app_number` DESC LIMIT 1";
$next_appnumber = mysqli_query($idsconnection_mysqli, $query_next_appnumber);
$row_next_appnumber = mysqli_fetch_assoc($next_appnumber);
$totalRows_next_appnumber = mysqli_num_rows($next_appnumber);

$found_app_deal_number = $row_next_appnumber['app_number'];

	if(!$caught_app_number || $caught_app_number == 0){ 
	
			
			if(!$found_app_deal_number){
				$next_number = 1000;
				
			}else{
	
				$found_app_deal_number++;
				$next_number = $found_app_deal_number; 
	
			}
		
		
	
	}else{

			$found_app_deal_number++;
			$next_number = $caught_app_number; 
	
	}
	
	return;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Credit Applications: <?php echo $row_userDets['company']; ?></title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Credit Applications</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Credit Applications</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a class="btn btn-warning btn-lg">Credit Apps</a>                    
                        <a href="creditapp.add.php" class="btn btn-primary btn-lg">Create A New Credit Application</a>
                    </div>
                </div>
            </div>









        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Credit applications <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <table id="mydataTable" class="table table-striped table-bordered table-hover dataTable" >
                    <thead>
                    <tr>
                        <th>Received When</th>
                        <th>App Number</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php do { ?>
                            <?php
								
								$applicant_name = $row_find_creditapps['applicant_name'];
								
								$fname = $row_find_creditapps['applicant_fname'];
								
								$lname = $row_find_creditapps['applicant_lname'];
								
								$credit_app_id = $row_find_creditapps['credit_app_fullblown_id'];
								
								$applicant_app_token = $row_find_creditapps['applicant_app_token'];

					  			$app_number = $row_find_creditapps['app_number'];  //This is a waste of time a complete error you ask me be caution.

					  			$app_deal_number = $row_find_creditapps['app_deal_number'];
								
								$applicant_did = $row_find_creditapps['applicant_did'];
								
								
								
								$joint_or_invidividual = $row_find_creditapps['joint_or_invidividual'];
								
								$applicant_app_joint_token = $row_find_creditapps['applicant_app_joint_token'];
								
								// Check If Joint Or Individual provide two differnt links to it.
								if($joint_or_invidividual == 1){

								$credit_app_link = "credit-app.joint.php?app_id=$credit_app_id&keytoken=$applicant_app_token&app_token2=$applicant_app_joint_token";

								$print_credit_app_link = "autoloanCreditApp.joint-pdf.php?credit_app_id=$credit_app_id&keytoken=$applicant_app_token&app_token2=$applicant_app_joint_token";



								}else{

								$credit_app_link = "credit-app.php?app_id=$credit_app_id&keytoken=$applicant_app_token";

								$print_credit_app_link = "autoloanCreditApp-pdf.php?credit_app_id=$credit_app_id&keytoken=$applicant_app_token";


								}

					$created_at = $row_find_creditapps['application_created_date'];
					  
					  ?>
                      <tr id="<?php echo $row_find_creditapps['credit_app_fullblown_id']; ?>" class="">
                          <td>
                            <a href="<?php echo $credit_app_link; ?>"><?php echo created_at($created_at);  ?></a>
                          </td>
                          <td>
                          	<?php echo $app_deal_number; 

								   if(!$app_deal_number){
								 
									 write_app_number($credit_app_id, $applicant_did, $app_deal_number);
									 
									}							
							
							?>
                          </td>
                          <td>
                           <a href="<?php echo $credit_app_link; ?>">
                            <?php
																
								if(!$applicant_name){
								
								echo $fname.' '.$lname;
								
								}else{ echo $row_find_creditapps['applicant_name']; }
								
								//echo $row_find_creditapps['applicant_name']; 
								?>
                            </a>
                          </td>
                          <td><a href="<?php echo $credit_app_link; ?>"><?php echo $row_find_creditapps['applicant_main_phone']; ?></a></td>
                          <td><a href="<?php echo $credit_app_link; ?>"><?php echo $row_find_creditapps['applicant_email_address']; ?></a></td> 
                          <td class="center">
                          <a href="<?php echo $credit_app_link; ?>">
						  <?php 
						  	if($joint_or_invidividual == 1){ echo 'Joint'; }else{ echo 'Invidividual'; } 
						  ?>
                          </a>
                          </td>
                          <td class="center">
                          
                          	<a class="btn btn-white btn-sm" href="<?php echo $credit_app_link; ?>">
                            <i class="fa fa-file-archive-o"></i> View App
                            </a>

                          	<a class="btn btn-white btn-sm" href="<?php echo $print_credit_app_link; ?>" target="_blank">
                            <i class="fa fa-print"></i> Print App
                            </a>
                            
                            
                            </td>
                      </tr>
                        <?php } while ($row_find_creditapps = mysqli_fetch_array($find_creditapps)); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Received When</th>
                        <th>App Number</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            </div>
            
            
            
        
        
        </div>
        <?php include("footer.php"); ?>

        </div>
        </div>


    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>
    

    <!-- Page-Level Scripts -->
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable( {
		"iDisplayLength": 25,
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
<?php
mysqli_free_result($find_creditapps);
?>

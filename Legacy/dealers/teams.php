<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealer_teams = "SELECT * FROM dealers_teams WHERE dealers_teams.dlr_team_did = '$did' ORDER BY dealers_teams.dlr_team_name";
$find_dealer_teams = mysqli_query($idsconnection_mysqli, $query_find_dealer_teams);
$row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
$totalRows_find_dealer_teams = mysqli_num_rows($find_dealer_teams);

$company = $row_userDets['company'];
$dept_phoneno = $row_userDets['phone'];

$dept_address = $row_userDets['address'];
$dept_city = $row_userDets['city'];
$dept_state = $row_userDets['state'];
$dept_zip = $row_userDets['zip'];



function create_default_dept($totalRows_find_dealer_teams){

global $idsconnection;
global $database_idsconnection;
global $did;
global $company;
global $dealer_email;
global $dealer_address;
global $dept_address;
global $dept_city;
global $dept_zip;

global $dealer_state;
global $dept_phoneno;

static $totalRows_find_dealer_teams;


$create_default_department_sql = "
INSERT INTO `idsids_idsdms`.`dealers_teams` SET

`dlr_team_did` = '$did',
`dlr_team_status` = '1',
`dlr_team_name` = 'Default Team',
`dlr_team_description` = 'Team Default'

";

	if($totalRows_find_dealer_teams == 0){
	
		//echo "Create Default Here $totalRows_pull_departments".'<br />';
		//echo $create_default_department_sql;
		$run_create_default_team_sql = mysqli_query($idsconnection_mysqli, $create_default_department_sql);
		header("Location: teams.php");
		
	}

return;

}

	if($totalRows_find_dealer_teams == 0){
	
		create_default_dept($totalRows_find_dealer_teams);
		
	}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Teams</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>






<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Teams</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong><a>Teams</a></strong>
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a class="btn btn-warning btn-lg">Manage Teams</a>                    
                        <a href="team.add.php" class="btn btn-primary btn-lg">Add New Team</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <?php 
			
			if($totalRows_find_dealer_teams != 0):
			
			do { 
			?>
              <div class="col-lg-4">
                <div class="contact-box"> <a href="team.php?dlr_team_id=<?php echo $row_find_dealer_teams['dlr_team_id']; ?>">
                  <div class="col-sm-4">
                    <div class="text-center"> 
                    <?php if($row_find_dealer_teams['dlr_team_photo_url']): ?>
                    
                    <img alt="image" class="m-t-xs img-responsive" src="<?php echo $row_find_dealer_teams['dlr_team_photo_url']; ?>">
                    
                    
					<?php else: ?>

                    <img alt="image" class="m-t-xs img-responsive" src="img/logo.png">

                    <?php endif; ?>
                   
                      
                      
                      <div class="m-t-xs font-bold text-center">
					  <?php 
					  	if($row_find_dealer_teams['dlr_team_status'] == 1){
							echo '<button class="btn btn-primary dim" type="button"><i class="fa fa-check"></i><span class="bold">Active</span></button>';
							
						}elseif($row_find_dealer_teams['dlr_team_status'] == 0){
							echo '<button class="btn btn-warning  dim" type="button"><i class="fa fa-warning"></i><span class="bold">Inactive</span></button>';
						}
					  
					  ?>
                      </div>
                    </div>
                  </div>
                  <div id="team_block" class="col-sm-8 team_block">
                    <h3><strong><?php echo $row_find_dealer_teams['dlr_team_name']; ?></strong></h3>
                    <p><i class="fa fa-map-marker"></i> <?php echo $row_find_dealer_teams['dlr_team_created_at']; ?></p>
                    <p><?php echo $row_find_dealer_teams['dlr_team_description']; ?></p>
                  </div>
                  <div class="clearfix"></div>
                </a> </div>
              </div>
              <?php 
			  
			  } while ($row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams));
			  
			  endif;
			  ?>
        </div>
        </div>




		<?php include("footer.php"); ?>

        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>


    <script>
        $(document).ready(function(){
            $('.contact-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>

</body>

</html>
<?php
mysqli_free_result($find_dealer_teams);
?>
<?php include("inc.end.phpmsyql.php"); ?>

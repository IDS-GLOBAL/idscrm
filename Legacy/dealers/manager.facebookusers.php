<?php require_once("db_manager_loggedin.php"); ?>
<?php


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_fbleads = "SELECT * FROM `fbuserprofiles` WHERE `fbuserprofiles`.`fbuser_primary_did` = '$did' ORDER BY `fbuserprofiles`.`fbuser_id` DESC";
$find_fbleads = mysqli_query($idsconnection_mysqli, $query_find_fbleads);
$row_find_fbleads = mysqli_fetch_assoc($find_fbleads);
$totalRows_find_fbleads = mysqli_num_rows($find_fbleads);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Facebook Joined Your Online App: <?php echo $row_userDets['company']; ?></title>

	<?php include("inc.head.php"); ?>

<style type="text/css">
img#profil_pic {
    margin-top: 5px;
}
</style>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.manager.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Face Book Users</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.customers.php">Customers</a>
                        </li>
                        <li class="active">
                            <a>Facebook Users</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            



        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

<?php do { ?>

        
            <div class="col-lg-4">
                <div class="contact-box">
                    
                    <div class="col-sm-4">
                        
                        
                        <div class="text-center">
<?php
$popvehicle_id = "";
if($row_find_fbleads['fbuser_primary_vid']){
 $popvehicle_id = '&vid='.$row_find_fbleads['fbuser_primary_vid'].'&vstat=1';
}
?>
                        
<a href="manager.fbuser.php?fbuser_id=<?php echo $row_find_fbleads['fbuser_id']; ?>&fbuser_fbid=<?php echo $row_find_fbleads['fbuser_fbid']; ?><?php echo $popvehicle_id; ?>">                            
<img src="<?php echo $row_find_fbleads['fbuser_fbpicture']; ?>?type=normal" id="profil_pic" class="pic_ready">
</a>                            
                            <div class="m-t-xs font-bold"><?php echo $row_find_fbleads['fbuser_username']; ?></div>
                        </div>
                        
                        
                        <div class="floating_button">
						<button class="btn btn-outline btn-success  dim" type="button"><i class="fa fa-facebook"></i></button>
                        </div>
                        
                        
                        
                    </div>
                    <div class="col-sm-8">
                        <h3><strong>
                        	<?php 
							if(!$row_find_fbleads['applicant_name']){
								echo $row_find_fbleads['applicant_fname'].' '.$row_find_fbleads['applicant_lname'];
							}else{
								echo $row_find_fbleads['applicant_name'];
							}
							?>
                        </strong></h3>
                        
                        <p><i class="fa fa-map-marker"></i> last online: <?php echo $row_find_fbleads['fb_onlinetime']; ?></p>
                        <address>
                            <strong><?php if($row_find_fbleads['fbuser_fbemail']){ echo $row_find_fbleads['fbuser_fbemail']; }else{ echo 'Not Opted In'; } ?></strong><br>
                            <abbr title="Phone">Phone:</abbr> <?php if($row_find_fbleads['applicant_main_phone']){ echo format_phone($row_find_fbleads['applicant_main_phone']); }else{ echo 'N/A'; } ?><br />
                            <abbr title="Mobile">Cell:</abbr> <?php if($row_find_fbleads['applicant_cell_phone']){ echo format_phone($row_find_fbleads['applicant_cell_phone']); }else{ echo 'N/A'; } ?><br />
                        </address>
                        <div>Joined: <?php echo $row_find_fbleads['application_created_date']; ?></div>
                        <div title="<?php echo $row_find_fbleads['fbprofile_broswer']; ?> <?php $row_find_fbleads['fbprofile_mobile']; ?>" <?php echo $row_find_fbleads['fbprofile_broswer']; ?>>IP <?php echo $row_find_fbleads['fbprofile_last_ip']; ?></div>
                    </div>
                    <div class="clearfix"></div>
                        
                </div>
            </div>

<?php } while ($row_find_fbleads = mysqli_fetch_assoc($find_fbleads)); ?>
        
        
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
<?php include("inc.end.phpmsyql.php"); ?>
<?php

mysqli_free_result($find_fbleads);


?>
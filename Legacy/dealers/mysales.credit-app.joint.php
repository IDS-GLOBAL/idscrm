<?php include("db_sales_loggedin.php"); ?>
<?php
$colname_find_dlr_creditapp = "-1";
if (isset($_GET['app_id'])) {
  $colname_find_dlr_creditapp = $_GET['app_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_creditapp =  sprintf("SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `credit_app_fullblown_id` = %s", GetSQLValueString($colname_find_dlr_creditapp, "int"));
$find_dlr_creditapp = mysqli_query($idsconnection_mysqli, $query_find_dlr_creditapp);
$row_find_dlr_creditapp = mysqli_fetch_assoc($find_dlr_creditapp);
$totalRows_find_dlr_creditapp = mysqli_num_rows($find_dlr_creditapp);
$credit_app_id = $row_find_dlr_creditapp['credit_app_fullblown_id'];

$credit_app_fullblown_id = $row_find_dlr_creditapp['credit_app_fullblown_id'];
$applicant_did = $row_find_dlr_creditapp['applicant_did'];
$app_deal_number = $row_find_dlr_creditapp['app_deal_number'];

include('inc.funky.functions.php');
 
 // Using Funky functions For Assing Credit App An App Number ON View:
 write_deal_number($credit_app_fullblown_id, $applicant_did, $app_deal_number);
 
 
 
$colname_find_dlr_creditapp = "-1";
if (isset($_GET['app_token2'])) {
  $colname_find_dlr_creditapp2 = mysql_real_escape_string(trim($_GET['app_token2']));
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_creditapp2 =  sprintf("SELECT * FROM `idsids_idsdms`.`credit_app_fullblown` WHERE `applicant_app_joint_token` = %s", GetSQLValueString($colname_find_dlr_creditapp2, "int"));
$find_dlr_creditapp2 = mysqli_query($idsconnection_mysqli, $query_find_dlr_creditapp2);
$row_find_dlr_creditapp2 = mysqli_fetch_assoc($find_dlr_creditapp2);
$totalRows_find_dlr_creditapp2 = mysqli_num_rows($find_dlr_creditapp2);
$credit_app_id2 = $row_find_dlr_creditapp2['credit_app_fullblown_id'];


 
 
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Credit Application</title>
	<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

       
        <?php include("_sidebar.php"); ?>

       
        <div id="page-wrapper" class="gray-bg">
       
       
        <?php include("_nav_top.php"); ?>
       
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Joint Credit Application</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="credit-apps.php">Credit Applications</a>
                        </li>
                        <li class="active">
                            <strong>Application View</strong>
                            <input id="credit_app_fullblown_id" type="hidden" value="<?php echo $credit_app_id; ?>" />
                            <input id="applicant_app_token" type="hidden" value="<?php echo $row_find_dlr_creditapp['applicant_app_token']; ?>" />

                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
       





			<div class="row wrapper border-bottom white-bg page-heading">
            
                <div class="col-sm-12">
                    <div class="title-action">
                        <a href="mysales.credit-apps.php" class="btn btn-primary btn-sm m-b">Credit Apps</a>                    
                        <a href="mysales.creditapp.add.php" class="btn btn-primary btn-sm m-b">Create A New Credit Application</a>
                    </div>
                </div>
            
            </div>





<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>App Number:  <?php echo $app_deal_number; ?></h5>
                    </div>
                    <div class="ibox-content">
                        <p>
                            Choose And Click Your Options Below.
                        </p>
                        <h3 class="font-bold">Application Options</h3>

                <button class="btn btn-primary dim btn-large-dim" type="button"><i class="fa fa-money"></i><br /></button>
                <button class="btn btn-warning dim btn-large-dim" type="button"><i class="fa fa-print"></i></button>
                <button id="editApp" class="btn btn-info  dim btn-large-dim btn-outline" type="button"><i class="fa fa-pencil-square-o"></i></button>

                <!-- button class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa fa-frown-o"></i></button>
                <button class="btn btn-primary  dim btn-large-dim" type="button"><i class="fa fa-smile-o"></i></button -->


                    </div>
                </div>
            </div>



<div id="tab_Panel" style="display: block;">

                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md">
                            <h4>
                            

							<?php if(!$row_find_dlr_creditapp['applicant_name']){ ?>
								
<?php echo $row_find_dlr_creditapp['applicant_titlename']; ?>
                            <?php echo $row_find_dlr_creditapp['applicant_fname']; ?> <?php echo $row_find_dlr_creditapp['applicant_mname']; ?> <?php echo $row_find_dlr_creditapp['applicant_lname']; ?> <?php echo $row_find_dlr_creditapp['applicant_suffixname']; ?>
								
							<?php }else{  ?>
                            
                            <?php 
							
								echo $row_find_dlr_creditapp['applicant_name']; 
								
								} 
							?>
                            
							 - Credit Application
                            </h4>
                            </div>
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a class="widget style1 navy-bg" data-toggle="tab" href="#tab-4"><i class="fa fa-laptop"></i></a></li>
                                    <li class=""><a class="widget style1 navy-bg" data-toggle="tab" href="#tab-5"><i class="fa fa-desktop"></i></a></li>
                                </ul>
                            
                            
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-4" class="tab-pane active">


									<?php include("content/body.credit.application.view.php"); ?>



                                </div>

                                <div id="tab-5" class="tab-pane">
                                
                               	<?php include("content/body.credit.application.joint.view.php"); ?>
                                
                                </div>
                                
                                
                            </div>

                        </div>

                    </div>

</div>












       
        <div class="wrapper wrapper-content animated fadeInRight">
        
        
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Credit Application ACTIONs </h5>
                        </div>
                        <div class="ibox-content">


<div class="row">
	<div class="col-lg-12">
    

                <div class="col-lg-12">
                
                <button type="button"class="btn btn-primary btn-lg">Request More Information</button>
                
                
                </div>

    
	</div>
</div>        








                        </div>
                    </div>
                </div>

            </div>
        
        
        
        

        
        
        
        
        
        
        </div>
       






       
        <?php include("_footer.php"); ?>

        </div>
	
    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <!-- Change To This Page Before Live -->
	<script src="js/custom/page/custom.creditapp.edit.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($find_dlr_creditapp);
?>

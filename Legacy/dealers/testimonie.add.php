<?php require_once("db_loggedin.php"); ?>
<?php

$colname_find_dlr_testimonies = "-1";
if (isset($_GET['testimonie'])) {
  $colname_find_dlr_testimonies = $_GET['testimonie'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
echo $query_find_dlr_testimonies = "SELECT * FROM `idsids_idsdms`.`testimonials` WHERE `testimonials`.`testimony_did` = '$did' AND `testimonials`.`id` = '$colname_find_dlr_testimonies'";
$find_dlr_testimonies = mysqli_query($idsconnection_mysqli, $query_find_dlr_testimonies);
$row_find_dlr_testimonies = mysqli_fetch_assoc($find_dlr_testimonies);
$totalRows_find_dlr_testimonies = mysqli_num_rows($find_dlr_testimonies);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Testimony Create</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>






<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Create A New Testimony</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="teams.php">Testimony</a>
                        </li>
                        <li class="active">
                            <strong><a>Create A New Testimony</a></strong>
                            <input id="testimony_token" type="hidden" value="<?php echo $tkey; ?>" />
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                        <a href="testimonies.php" class="btn btn-primary btn-lg">Manage Testimonies</a>                    
                        <a class="btn btn-warning btn-lg">Create New Testimony</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">







<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Creating A New Testimony <small> Editing this testimony will be what viewers will see.</small></h5>
                            <div class="ibox-tools">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-camera"></i>
                                </a>
                            </div>
                        </div>
                        <div id="testimony_block" class="ibox-content">
                            <form method="post" class="form-horizontal">
                                
                                <div class="form-group" align="center">


<?php if(!$row_find_dlr_testimonies['uploaded_image']): ?>

<img alt="image" class="m-t-xs img-responsive img-square" src="img/no-pic-avatar.png">

<?php else: ?>                                
                                <img id="dlr_testimonies_uploaded_image" src="<?php echo $row_find_dlr_testimonies['uploaded_image']; ?>" alt="image" class="img-responsive" />

<?php endif; ?>

                                
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Public Name:</label>
                                    <div class="col-sm-10"><input id="name" type="text" class="form-control" value="<?php echo $row_find_dlr_testimonies['name']; ?>"> <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label for="testimony_status" class="col-sm-2 control-label">Public</label>

                                    <div class="col-sm-10"><select class="form-control m-b" id="testimony_status" name="testimony_status">
                                    <option value="0" <?php if (!(strcmp("", $row_find_dlr_testimonies['testimony_status']))) {echo "selected=\"selected\"";} ?>>InActive</option>
                                    <option value="1" <?php if (!(strcmp("", $row_find_dlr_testimonies['testimony_status']))) {echo "selected=\"selected\"";} ?>>Active</option>
                                    </select>

                               	  </div>
                                    
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Private Email:</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="email" value="<?php echo $row_find_dlr_testimonies['email']; ?>"> <span class="help-block m-b-none">The public display of the customer name.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">Private Phone:</label>
                                    <div class="col-sm-10"><input id="phone" name="phone" type="text" class="form-control" data-mask="(999) 999-9999"> <span class="help-block m-b-none">This is customers number to call them.</span>
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Testimony Title:</label>
                                    <div class="col-sm-10"><input id="subject" name="subject" type="text" class="form-control"> <span class="help-block m-b-none">Title of testimony also is the email subject.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Testimony Body:</label>
                                    <div class="col-sm-10"><textarea type="text" class="form-control" id="body" name="body"><?php echo $row_find_dlr_testimonies['body']; ?></textarea> <span class="help-block m-b-none">Testimony Body</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>





                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                    <button id="cancel_testimonie" class="btn btn-white" type="button">Cancel</button>
                    <button id="save_testimonie" class="btn btn-primary" type="button">Save changes</button>
                                    </div>
                                </div>
                            </form>
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

	<script type="text/javascript" src="js/custom/page/custom.testimonie.add.js"></script>

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
mysqli_free_result($find_dlr_testimonies);
?>
<?php include("inc.end.phpmsyql.php"); ?>

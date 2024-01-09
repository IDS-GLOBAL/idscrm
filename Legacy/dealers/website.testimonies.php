<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlr_testimonies = "SELECT * FROM testimonials WHERE testimony_did = '$did' ORDER BY date_created_at ASC";
$find_dlr_testimonies = mysqli_query($idsconnection_mysqli, $query_find_dlr_testimonies);
$row_find_dlr_testimonies = mysqli_fetch_assoc($find_dlr_testimonies);
$totalRows_find_dlr_testimonies = mysqli_num_rows($find_dlr_testimonies);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Testimony's</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>






<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Testimony</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            Testimonies
                        </li>
                        <li class="active">
                            <strong>Viewing Testimonies</strong>
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                    
                        <a href="testimonie.add.php" class="btn btn-primary btn-lg">Create New Testimony</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <?php do { ?>
              <div class="col-lg-4">
                <div class="contact-box"> 
                  <div class="col-sm-4">
                    <div class="text-center"> 

                    <?php if($row_find_dlr_testimonies['uploaded_image']): ?>
                    <img alt="image" class="m-t-xs img-responsive" src="<?php echo $row_find_dlr_testimonies['uploaded_image']; ?>">
                    <?php else: ?>

					<img alt="image" class="m-t-xs img-responsive" src="img/no-pic-avatar.png" width="73px" height="73px">
                    
                    <?php endif; ?>
                    
                    
                    
                    
                      <div class="m-t-xs font-bold text-center">
                      <a href="testimonie.edit.php?testimonie=<?php echo $row_find_dlr_testimonies['id']; ?>" target="_parent">
					  <?php 
					  	if($row_find_dlr_testimonies['testimony_status'] == 1){
							echo '<button class="btn btn-primary dim" type="button"><i class="fa fa-check"></i><span class="bold"> Active</span></button>';
							
						}elseif($row_find_dlr_testimonies['testimony_status'] == 0){
							echo '<button class="btn btn-warning  dim" type="button"><i class="fa fa-warning"></i><span class="bold"> Inactive</span></button>';
						}
					  
					  ?>
                      </a>
                      </div>
                    </div>
                  </div>
                  <div id="team_block" class="col-sm-8 team_block">
                    <h3><strong><?php echo $row_find_dlr_testimonies['name']; ?></strong></h3>
                    <p><i class="fa fa-map-marker"></i> <?php echo $row_find_dlr_testimonies['date_created_at']; ?></p>
                    <p><?php echo $row_find_dlr_testimonies['body']; ?></p>
                  </div>
                  <div class="clearfix"></div>
                </a> </div>
              </div>
              <?php } while ($row_find_dlr_testimonies = mysqli_fetch_assoc($find_dlr_testimonies)); ?>
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

mysqli_free_result($findrepairshopsevenmine);
?>
<?php include("inc.end.phpmsyql.php"); ?>

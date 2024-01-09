<?php include("db_manager_loggedin.php"); ?>
<?php



if(!$row_find_vehicle['vid'])  header("Location: manager.inventory.php?vstat=1");

if($row_find_vehicle['did'] != $did)  header("Location: manager.inventory.php?vstat=1");


if(isset($_GET['dropzonevid'])){
	
	$getvid = $_GET['dropzonevid'];
	header("Location: manager.upload-vphotos.php?vid=$getvid");
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Vehicle Photos</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
       
                    <?php include("_nav_top.manager.php"); ?>
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Photos Of <?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?> Vehicle</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                             <a href="manager.inventory.edit.php?vid=<?php echo $row_find_vehicle['vid']; ?>">Vehicle</a>
                        </li>
                        <li class="active">
                            <strong>Vehicle Photos</strong>
                        </li>
                        <li class="active">
                             <a href="manager.upload-vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>">Upload More Photos</a>
                        </li>

                    </ol>
                </div>
            </div>
       
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                                <h5><?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?></h5>
                                
                                <?php 
								$created_at = $row_find_vehicle['created_at']; 
								?>
                                <a href="#" class="file-control active"><?php showphoto($vid); ?></a><br />
                                <a href="#" class="file-control">Condition: <?php echo $row_find_vehicle['vcondition']; ?></a><br />
                                <a href="#" class="file-control">Stock No: <?php echo $row_find_vehicle['vstockno']; ?></a><br />
                                <a href="#" class="file-control" title="Online Since: ">Online Since: <?php echo created_at($created_at); ?></a><br />
                                <div class="hr-line-dashed"></div>

                                <button id="gotoUploadPhotos" class="btn btn-primary btn-block" onClick="window.location.href = 'inventory.edit.php?vid=<?php echo $row_find_vehicle['vid']; ?>'">Vehicle Edit</button>

                                <button id="gotoUploadPhotos" class="btn btn-primary btn-block" onClick="window.location.href = 'upload-vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>'">Upload Photos</button>

                                <button id="gotoUploadPhotos" class="btn btn-primary btn-block" onClick="window.location.href = 'sort-vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>'">Resort Photos</button>
                                
                                <div class="hr-line-dashed"></div>
                                <h5>Featured Options:</h5>
                                <ul class="folder-list" style="padding: 0">

<!-- li><a href="manager.vehicle.brochure.php?vid=<?php //echo $row_find_vehicle['vid']; ?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Brochure</a></li>
<li><a href="manager.vehicle.windowsticker.php?vid=<?php //echo $row_find_vehicle['vid']; ?>" target="_blank"><i class="fa fa-file-word-o"></i> Window Sticker</a></li>
<li><a href="manager.vehicle.buyersguide.php?vid=<?php //echo $row_find_vehicle['vid']; ?>" target="_blank"><i class="fa fa-file-archive-o"></i> Buyers Guide</a></li>
<li><a href="manager.salesdesk.php?vid=<?php //echo $row_find_vehicle['vid']; ?>" target="_blank"><i class="fa fa-money"></i> Work A Deal</a></li>
<li><a href="manager.email.vehicle.php"  target="_blank"><i class="fa fa-folder"></i> Send To A Customer</a></li -->

                                </ul>
                                <h5 class="tag-title">Vehicle Features</h5>
                                <ul class="tag-list" style="padding: 0">
                                	
									<?php

									$tagsplit = $row_find_vehicle['vehicleOptionsBulk'];
									$voptionsArrays = preg_split("/,/", "$tagsplit");
									$voptionsCount = count($voptionsArrays);

									$tagsplit = $row_find_vehicle['vehicleOptionsBulk'];
									
									
									if($tagsplit){
									echo runTagsplit($tagsplit);
									}
									
									
									
									?>
                                    
                                    
                                    
                                    
                                    
                                    <li class="cum"><a href="">Blank</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">


<?php if($totalRows_find_vehicle_photos != 0): ?>
                                        

                        <?php do { ?>                        
                            <div class="file-box">
                                <div class="file">

                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                        
                                        <?php 
										
										if($photo_file_path = $row_find_vehicle_photos['photo_file_path']):
										
										
										if(!$photo_file_path){
											$photo_openurl = 'img/thumbs/thumb1.jpg';
										}else{
											$photo_file_path = str_replace('../', '', $photo_file_path);
											$photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
											$photo_openurl = "http://images.autocitymag.com/".$photo_file_path;
										}

										
										
										
										
										
										?>
                                        
                                            <img class="large_image" src="<?php echo $photo_openurl; ?>" width="198px" title="<?php echo $row_find_vehicle_photos['photo_file_name']; ?>" />
                                            
                                        <?php else: ?>
                                        
                                        
                                        <i></i>
                                        
                                        <?php endif; ?>
                                        
                                        
                                            
                                        </div>
                                        <div class="file-name">
                                            <?php echo $row_find_vehicle_photos['v_caption']; ?>
                                            <br/>
                                            <small>Uploaded On: <?php echo created_at($row_find_vehicle_photos['created_at']); ?></small>
                                        </div>
                                    </a>
                                </div>

                            </div>
						<?php } while ($row_find_vehicle_photos = mysqli_fetch_assoc($find_vehicle_photos)); ?>                            


										<?php endif; ?>
                            
                            

                        </div>
                    </div>
                    </div>
                </div>
                </div>
       
        <?php include("_footer.php"); ?>

        </div>
            </div>

    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
</body>

</html>

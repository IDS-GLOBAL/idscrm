<?php include("db_loggedin.php"); ?>
<?php


if(!$row_find_vehicle['vid'])  header("Location: inventory.php");

if($row_find_vehicle['did'] != $did)  header("Location: inventory.php");


if(isset($_GET['dropzonevid'])){
	
	$getvid = $_GET['dropzonevid'];
	header("Location: upload-vphotos.php?vid=$getvid");
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Vehicle Photos</title>

<?php include("inc.head.php"); ?>
	
    <link href="js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
       
                    <?php include("_nav_top.php"); ?>
       
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Photos Of <?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?> Vehicle</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                             <a href="inventory.edit.php?vid=<?php echo $row_find_vehicle['vid']; ?>">Vehicle</a>
                        </li>
                        <li class="active">
                            <strong>Vehicle Photos</strong>
                        </li>
                        <li class="active">
                             <a href="upload-vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>">Upload More Photos</a>
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
                                <?php 
								

										
										if($photo_file_path = $row_find_vehicle['vthubmnail_file_path']):
										
										
										if(!$photo_file_path){
											$photo_openurl = 'img/thumbs/thumb1.jpg';
										}else{
											$photo_file_path = str_replace('../', '', $photo_file_path);
											$photo_file_path = str_replace('vehicles/', '', $photo_file_path);	
											$photo_openurl = "https://images.autocitymag.com/".$photo_file_path;
											//"https://www.idscrm.com/vehicles/photos/"
										}

										
										
										
										
										
										?>
                                        <a href="<?php echo $photo_openurl; ?>" class="fancybox">
                                            <img class="thumbnail" src="<?php echo $photo_openurl; ?>" width="198px" title="<?php echo $row_find_vehicle_photos['photo_file_name']; ?>" />
                                        </a>  
                                        <?php else: ?>
                                        
                                        <a href="#">
                                        <i class="fa fa-photo fa-4x"></i>
                                        </a>  
                                        <?php endif; ?>




								
								<br />
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

<!--li><a href="vehicle.brochure.php?vid=<?php //echo $row_find_vehicle['vid']; ?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Brochure</a></li>
<li><a href="vehicle.windowsticker.php?vid=<?php //echo $row_find_vehicle['vid']; ?>" target="_blank"><i class="fa fa-file-word-o"></i> Window Sticker</a></li-->
<li><a href="vehicle.buyersguide.php?vid=<?php echo $row_find_vehicle['vid']; ?>" target="_blank"><i class="fa fa-file-archive-o"></i> Buyers Guide</a></li>
<li><a href="salesdesk.php?vid=<?php echo $row_find_vehicle['vid']; ?>" target="_blank"><i class="fa fa-money"></i> Work A Deal</a></li>
<!--li><a href="email.vehicle.php"  target="_blank"><i class="fa fa-folder"></i> Send To A Customer</a></li-->

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
                                        <a class="fancybox" href="<?php echo $photo_openurl;  ?>">
                                            <img name="<?php echo $row_find_vehicle_photos['v_photoid']; ?>" class="large_image" src="<?php echo $photo_openurl; ?>" width="198px" title="<?php echo $row_find_vehicle_photos['photo_file_name']; ?>" />
                                        </a>    
                                        <?php else: ?>
                                        
                                        
                                        <i></i>
                                        
                                        <?php endif; ?>
                                        
                                        
                                            
                                        </div>
                                        <div class="file-name">
                                            <?php echo $row_find_vehicle_photos['v_caption']; ?>
                                            <br/>
                                            <small>Uploaded On: <?php echo created_at($row_find_vehicle_photos['created_at']); ?></small>
                                        </div>
                                    
                                </div>

                            </div>
						<?php } while ($row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos)); ?>                            


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
	<?php include("inc.end.body.php"); ?>

    <script>
        $(document).ready(function(){
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>

    <!-- Fancy box -->
    <script src="js/plugins/fancybox/jquery.fancybox.js"></script>


    <script>
        $(document).ready(function() {
            $('.fancybox').fancybox({
                openEffect	: 'none',
                closeEffect	: 'none'
            });
        });
    </script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
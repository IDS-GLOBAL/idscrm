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

    <title>IDSCRM | Vehicle File Upload</title>

<?php include("inc.head.php"); ?>

    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
	
    <link href="js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        
                    <?php include("_nav_top.php"); ?>
        
        
            <div id="vehicle_upload_box_page" class="row wrapper border-bottom white-bg page-heading">
             
             <div class="row">   
                <div class="col-lg-10">
                    <h2>Vehicle Multiple Photo Upload</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="inventory.php">Vehicles</a>
                        </li>
                        <li class="active" title="Edit This: <?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?>">
                            <strong><a href="inventory.edit.php?vid=<?php echo $vid; ?>">Vehicle Edit: <?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?></a></strong>
                        </li>
                        <li>
                        	<a href="vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>">Currently: <?php echo $totalRows_find_vehicle_photos; ?> Photos.</a>
                        </li>
                    </ol>
                </div>
             </div>
                
            <div class="row">
                <div class="col-lg-2">
                
                
                <?php //showphoto ($cvid=$row_find_vehicle['vid']); ?>
                
                <?php if($row_find_vehicle['vthubmnail_file_path']){
				$vphoto = $row_find_vehicle['vthubmnail_file_path'];

                $photo_file_path = str_replace('../', '', $vphoto);
                $photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
                $photo_openurl = "https://images.autocitymag.com/photos/".$photo_file_path;
				echo "<a class='fancybox' href='$photo_openurl'><img class='thumbnail' src='$photo_openurl'></a>";
				 ?>
                
                
                <?php } ?>
                
                

                </div>
           	</div>
            
           </div>
  




    
        
        
        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Drag &amp; Drop Your Photos Into The Area Below or Click Below To Browse For Them. </h5>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>This: <?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?></span>
                    </div>
                    <div class="ibox-content photoDropzonebox">
                        <form id="myAwesomeDropzone" class="dropzone">
                            <div class="dropzone-previews"></div>
                              <!-- Now setup your input fields -->
                              <input type="hidden" id="dropzonedid" name="dropzonedid" value="<?php echo $did; ?>" />
                              <input type="hidden" id="dropzonevid" name="dropzonevid" value="<?php echo $row_find_vehicle['vid']; ?>" />

                            <button id="uploadPhotos" type="submit" class="btn btn-primary pull-right">Upload Photos!</button>
                        </form>
                        <div>
                            <div class="m text-right"><small>Place photos into section above.  </small> </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            </div>








            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Existing Vehicle Photos <small>photos already uploaded...</small></h5>
                        </div>
                        <div class="ibox-content">

                       	<div class="row">
                            <div class="col-lg-12">
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            </div>
                    	</div>


                        
                        
                       <div class="row">
                        <div class="col-lg-12">
                     
                        
                        


<?php if($totalRows_find_vehicle_photos != 0): ?>
                                        

                        <?php do { ?>                        
                            <div class="file-box">
                                <div class="file">

                                    <a>
                                        <span class="corner"></span>

                                        <div class="icon">
                                        
                                        <?php 
										
										if($photo_file_path = $row_find_vehicle_photos['photo_file_path']):
										
										
										if(!$photo_file_path){
											$photo_openurl = 'img/thumbs/thumb1.jpg';
										}else{
											$photo_file_path = str_replace('../', '', $photo_file_path);
											$photo_file_path = str_replace('vehicles/photos/', '', $photo_file_path);	
											$photo_openurl = "http://images.autocitymag.com/photos/".$photo_file_path;
										}

										
										
										
										
										
										?>
                                        <a class="fancybox" href="<?php echo $photo_openurl; ?>" title="<?php echo $row_find_vehicle_photos['photo_file_name']; ?>">
                                            <img class="large_image" src="<?php echo $photo_openurl; ?>" width="198px" title="<?php echo $row_find_vehicle_photos['photo_file_name']; ?>" />
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
                                    </a>
                                </div>

                            </div>
						<?php } while ($row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos)); ?>                            


										<?php endif; ?>
                            
                            
                        
                         </div>
                       </div> 
                        
                        
                        
                        
                        
                        
                        
                        
                        </div>
                    </div>
                 </div>
             </div><!-- End Vehicle Photo Options -->






        <?php include("_footer.php"); ?>

        </div>
        </div>


    </div>
    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100% !important; }
  #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }
  #sortable li.ui-state-default.ui-sortable-handle.ui-sortable-helper:focus{ margin-top: -50px !important; }
  </style>
  <script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });
  </script>



    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>


	<script src="js/custom/page/custom.upload-vphotos.js" language="javascript"></script>
    <script src="js/savephotosort.js" type="text/javascript" language="javascript"></script>

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
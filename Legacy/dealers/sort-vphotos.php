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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        
                    <?php include("_nav_top.php"); ?>
        
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    
                <h2>Rearrange Vehicle Photos Below:</h2>
                    
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
                        	<a href="upload-vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>">Currently: <?php echo $totalRows_find_vehicle_photos; ?> Photos.</a>
                        </li>
                    </ol>

                </div>
                <div class="col-lg-2">

                </div>
            </div>
  

        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                	<div class="ibox float-e-margins">
                        <div class="ibox-title">Rearrange And Save Or Delete Saved Vehicle Photos <button id="save_sortedphotos" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Sorted Photos</button> <button class="pull-right btn btn-danger" id="delete_sortedphotos"><i class="fa fa-minus-circle" aria-hidden="true"></i> Delete Sorted Photos</button></div>
                        <div id="box_vehiclePhotos" class="ibox-content">
                        
                        <div id="photogallery">

                       <div> 
  						  <ul id="sortable" class="thumbs">

                        <?php do { ?>
                            <li class="ui-state-default">
                            <input name="sort_order" type="text" id="<?php echo $row_find_vehicle_photos['v_photoid']; ?>" class="sorting" value="<?php echo $row_find_vehicle_photos['sort_orderno']; ?>" size="2" readonly="readonly" />
                                <img name="<?php echo $row_find_vehicle_photos['v_photoid']; ?>" class="large_image" src="<?php echo $row_find_vehicle_photos['photo_file_path']; ?>" width="90px"  title="<?php echo $row_find_vehicle_photos['sort_orderno']; ?>" />
                            <input name="delete_order" type="checkbox" id="<?php echo $row_find_vehicle_photos['v_photoid']; ?>" class="delete_sortedvphotos" value="<?php echo $row_find_vehicle_photos['sort_orderno']; ?>" size="2" readonly="readonly" />
                               
                            </li>
  
    
						<?php } while ($row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos)); ?>
                            </ul>
                         </div>   
                         
                         
    					</div>
    
    
                        
                        
                        
                        
                        
                        <div class="clearfix"></div>
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

    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-ui.js"></script>
    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 100% !important; }
        #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }
        #sortable li.ui-state-default.ui-sortable-handle.ui-sortable-helper:focus{ margin-top: -50px !important; }
    </style>


    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>


    <script src="js/savephotosort.js" type="text/javascript" language="javascript"></script>


</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
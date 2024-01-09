<?php include("db_manager_loggedin.php"); ?>
<?php


if(!$row_find_vehicle['vid'])  header("Location: manager.inventory.php?vstat=1");

if($row_find_vehicle['did'] != $did)  header("Location: manager.inventory.php?vstat=1");

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

</head>

<body>

    <div id="wrapper">

            <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        
                    <?php include("_nav_top.manager.php"); ?>
        
        
            <div class="row wrapper border-bottom white-bg page-heading">
             
             <div class="row">   
                <div class="col-lg-10">
                    <h2>Vehicle Multiple Photo Upload</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="manager.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="manager.inventory.php">Vehicles</a>
                        </li>
                        <li class="active" title="Edit This: <?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?>">
                            <strong><a href="manager.inventory.edit.php?vid=<?php echo $vid; ?>">Vehicle Edit: <?php echo $row_find_vehicle['vyear']; ?> <?php echo $row_find_vehicle['vmake']; ?> <?php echo $row_find_vehicle['vmodel']; ?> <?php echo $row_find_vehicle['vtrim']; ?></a></strong>
                        </li>
                        <li>
                        	<a href="manager.vphotos.php?vid=<?php echo $row_find_vehicle['vid']; ?>">Currently: <?php echo $totalRows_find_vehicle_photos; ?> Photos.</a>
                        </li>
                    </ol>
                </div>
             </div>
                
            <div class="row">
                <div class="col-lg-2">
                
                <?php showphoto ($cvid=$row_find_vehicle['vid']); ?>

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
                    <div class="ibox-content">
                        <form id="myAwesomeDropzone" class="dropzone">
                            <div class="dropzone-previews"></div>
                              <!-- Now setup your input fields -->
                              <input type="hidden" id="dropzonedid" name="dropzonedid" value="<?php echo $did; ?>" />
                              <input type="hidden" id="dropzonevid" name="dropzonevid" value="<?php echo $row_find_vehicle['vid']; ?>" />

                            <button id="uploadPhotos" type="submit" class="btn btn-primary pull-right">Upload Photos!</button>
                        </form>
                        <div>
                            <div class="m text-right"><small>This page uses DropzoneJS which is an open source library that provides drag'n'drop file uploads with image previews: <a href="https://github.com/enyo/dropzone" target="_blank">https://github.com/enyo/dropzone</a></small> </div>
                        </div>
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


	<script src="js/customdropzone.upload.js" language="javascript"></script>
    <script src="js/savephotosort.js" type="text/javascript" language="javascript"></script>


</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
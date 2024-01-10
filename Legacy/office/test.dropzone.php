<?php require_once('db_admin.php'); ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

</head>

<body>
<?php include("analyticstracking.php"); ?>
    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Testing Drop Zone</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Drop Zone Test</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">
<p> <a id="external_upload_dudes_photo" class="btn btn-xs btn-primary" style="padding:3px;"> Click Here To Add Photos</a></p>
                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Testing Dropzone Here #8 <small>from test-8.php and test-8.js</small></h5>
                    </div>
                    <div class="ibox-content">







                    <div id="vehicle-dropzone" style="background:#666;">
                    <button id="submit-all">Submit all files</button>
                    <form id="my-dropzone" action="uploads/upload.php" class="dropzone" style="background:#666;">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form>
                    </div>













                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">



<p>Clear Photos In DropZone:</p>

<p><a id="clear_outphotos" class="btn btn-xs btn-primary">Clear Photos</a></p>
                    

                    </div>
                </div>
              </div>
            </div>
            


            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>
	<script src="js/plugins/dropzone/dropzone.js"></script>


    <!--script src="js/custom/page/custom.profile.dropzone.js"></script -->

	<script src="js/custom/page/custom.test.dropzone.js"></script>    
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
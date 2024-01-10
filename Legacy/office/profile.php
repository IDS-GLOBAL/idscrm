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
                <h2>Profile</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Profile</a>
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
                        <h5>My Profile <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content" align="center">

                    <a id="external_upload_dude_photo" class="pull-left"><span class="label label-primary">Upload Photos</span></a>
<br>

                                    <img src="img/no-pic-avatar.png" width="221px" />


            <a data-toggle="modal" data-target="#upmyphotosModal" class="pull-right"><span class="label label-primary">Create An Album</span></a>
<br>


                    </div>
                </div>
              </div>
            </div>










            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Make Profile Wall Post <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">


<div class="row">

   <div class="col-md-12 ">


                            <div id="dudes_wallpost" class="">
                                        
                            </div>
                


        <div id="dudes_wallpost_footer">
            <div class="input-group m-b">

<button id="post-news" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="left" title="Post News">
<i class="fa fa-envelope-o"></i> Post</button>


			</div>

			<div class="clearfix"></div>                    
		</div>                    


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
                        <h5>Dropzone Area</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

						<p class="no-margin">You can upload only 1 JPEG file at a time!</p>


                    <div id="profile-dropzone" style="background:#666;">
                    <button id="submit-all">Submit all files</button>
                    <form id="my-dropzone" action="uploads/upload.php" class="dropzone" style="background:#666;">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form>
                    </div>
                        

					<div>
                    <p>Clear Photos In DropZone:</p>
                    
                    <p><a id="clear_outphotos" class="btn btn-xs btn-primary">Clear Photos</a></p>
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





<!-- DROPZONE -->
<script src="js/plugins/dropzone/dropzone.js"></script>




<script src="js/custom/page/custom.profile.dropzone.js"></script>





</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
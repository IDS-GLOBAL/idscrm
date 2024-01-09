<?php require_once("db_loggedin.php"); ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | About Us Page Website</title>

<?php include("inc.head.php"); ?>

<style type="text/css">
	.click2edit.wrapper, .note-editor .note-editable { min-height: 600px; margin-top: 20px; }
</style>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Website About Us Page</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Dash Board</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Edit About Us Page</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        
        
        
        
        
        
        <div class="wrapper wrapper-content">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edit You Webiste About Us Page Here</h5>
                            <button id="edit" class="btn btn-primary btn-sm m-l-sm" onClick="edit()" type="button">Edit</button>
                            <button id="save" class="btn btn-primary  btn-sm" onClick="save()" type="button">Save</button>
                        </div>
                        <div class="ibox-content no-padding">

                            <div class="click2edit wrapper">
                            
                            	<?php echo $row_userDets['about']; ?>
                            
                            </div>

                        </div>
                    </div>
                </div>
            </div>









            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Photo Gallery</h5>
                    </div>
                    <div class="ibox-content no-padding">


                    </div>
                </div>
            </div>
           </div>



            







        </div><!-- End Wrapper wrapper-content -->
        


        
        
        
        
        <?php include("footer.php"); ?>

        </div>
       </div>
      </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/idscrm.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

	<!-- Toastr script -->
    <script src="js/plugins/toastr/toastr.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>


    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>
    <script type="text/javascript" src="js/custom/page/custom.website.aboutus.js"></script>


</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
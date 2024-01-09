<?php require_once("db_manager_loggedin.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_dealer_template_cat = "SELECT * FROM `email_dealer_templates_types` WHERE `email_dealer_templates_types`.`email_dealer_templates_type_did` = '$did' ORDER BY `email_dealer_templates_types`.`email_dealer_templates_type_Label` ASC";
$query_dealer_template_cat = mysqli_query($idsconnection_mysqli, $query_query_dealer_template_cat);
$row_query_dealer_template_cat = mysqli_fetch_assoc($query_dealer_template_cat);
$totalRows_query_dealer_template_cat = mysqli_num_rows($query_dealer_template_cat);

$query_dealer_template_types = "SELECT * FROM `email_dealer_templates` WHERE `email_dealer_templates_did` = '$did' ORDER BY `email_dealer_templates_subject` ASC";
$dealer_template_types = mysqli_query($idsconnection_mysqli, $query_dealer_template_types);
$row_dealer_template_types = mysqli_fetch_assoc($dealer_template_types);
$totalRows_dealer_template_types = mysqli_num_rows($dealer_template_types);

$query_dealer_template_types_inactive = "SELECT * FROM `email_dealer_templates` WHERE `email_dealer_templates_did` = '$did' AND `email_dealer_templates_status` NOT IN (1) ORDER BY `email_dealer_templates_subject` ASC";
$dealer_template_types_inactive = mysqli_query($idsconnection_mysqli, $query_dealer_template_types_inactive);
$row_dealer_template_types_inactive = mysqli_fetch_assoc($dealer_template_types_inactive);
$totalRows_dealer_template_types_inactive = mysqli_num_rows($dealer_template_types_inactive);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | New Template</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">
        <?php include("_sidebar.manager.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.manager.php"); ?>

        <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            <a class="btn btn-block btn-primary compose-mail" href="emailtemplates.php">View Templates</a>
                            <div class="space-25"></div>
                            <h5>Template Options</h5>
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="emailtemplates.php"> <i class="fa fa-envelope-o"></i> Templates <span class="label label-warning pull-right"><?php echo $totalRows_dealer_template_types; ?></span> </a></li>
                                <li><a href="emailtemplates.php"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger pull-right"><?php echo $totalRows_dealer_template_types_inactive; ?></span></a></li>
                            </ul>
                            <h5>Categories</h5>
                            <ul class="category-list" style="padding: 0">
                                <li><a href="#"> <i class="fa fa-circle text-warning"></i> Clients</a></li>
                            </ul>

                            <h5 class="tag-title">Dealer Subjects</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href=""><i class="fa fa-tag"></i> Custm Dealer 1</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Custm Dealer 2</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Custm Dealer 3</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Custm Dealer 4</a></li>
                            </ul>
                            <div class="clearfix"></div>
                            <h5 class="tag-title">System Subjects</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href=""><i class="fa fa-tag"></i> No Show</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> No Response</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Thanks For Applying</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Call No Answer</a></li>
                                <li><a href=""><i class="fa fa-tag"></i> Latest News</a></li>
                            </ul>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">
                <h2>
                    Create New Email Template
                </h2>
            </div>
                <div class="mail-box">


                <div class="mail-body">

                    <div class="form-horizontal">
                    



                        <div class="form-group">
                        	<label for="email_dealer_templates_status" class="col-sm-2 control-label">Template Status:</label>

                            <div class="col-sm-10">
                            <select id="email_dealer_templates_status" class="form-control">
                            	<option value="1">Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group">
                        	<label for="email_dealer_templates_subject" class="col-sm-2 control-label">Subject:</label>

                            <div class="col-sm-10">
                            <input id="email_dealer_templates_subject" type="text" class="form-control" value="">
                            </div>
                        </div>









					<div class="form-group">



						



                                    <div class="col-sm-12">
                                        <div class="row">
                                        	<div class="col-md-4">
	                           	 <label>&nbsp;</label>

                                <button id="new_cat" type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal6">
                                    Create New Category
                                </button>
                                            </div>
                                            <div class="col-md-4">
                                           	  <label>Category:</label>
                               	  <select id="category_id" class="form-control">
                               	    <option value="">Select Category</option>
                               	    <?php
do {  
?>
                               	    <option value="<?php echo $row_query_dealer_template_cat['id']?>"><?php echo $row_query_dealer_template_cat['email_dealer_templates_type_label']?></option>
                               	    <?php
} while ($row_query_dealer_template_cat = mysqli_fetch_assoc($query_dealer_template_cat));
  $rows = mysqli_num_rows($query_dealer_template_cat);
  if($rows > 0) {
      mysqli_data_seek($query_dealer_template_cat, 0);
	  $row_query_dealer_template_cat = mysqli_fetch_assoc($query_dealer_template_cat);
  }
?>
                                  </select>
                                                
                                                
                                                
                                                
                                                


                            <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Create A New Category</h4>
                                        </div>
                                        <div class="modal-body">


										


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">New Category:</label>
                
                                            <div class="col-sm-9">
                                                <input id="new_category_enter" type="text" class="form-control" value="">
                                            </div>
                                        </div>







                                        
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button id="create_new_category" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                        </div>
                                    </div>
                              </div>
                            </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                            </div>
                                            <div class="col-md-4">
                                            	<label>Day Response:</label>
                                            	<select id="days_response" class="form-control">
                                                	<option value="1">01 Day Response</option>
                                                	<option value="2">02 Day Response</option>
                                                	<option value="3">03 Day Response</option>
                                                	<option value="4">04 Day Response</option>
                                                	<option value="5">05 Day Response</option>
                                                	<option value="6">06 Day Response</option>
                                                	<option value="7">07 Day Response</option>
                                                	<option value="8">08 Day Response</option>
                                                	<option value="9">09 Day Response</option>
                                                	<option value="10">10 Day Response</option>
                                                	<option value="11">11 Day Response</option>
                                                	<option value="12">12 Day Response</option>
                                                	<option value="13">13 Day Response</option>
                                                	<option value="14">14 Day Response</option>
                                                	<option value="15">15 Day Response</option>
                                                	<option value="16">16 Day Response</option>
                                                	<option value="17">17 Day Response</option>
                                                	<option value="18">18 Day Response</option>
                                                	<option value="19">19 Day Response</option>
                                                	<option value="20">20 Day Response</option>
                                                	<option value="21">21 Day Response</option>
                                                	<option value="22">22 Day Response</option>
                                                	<option value="23">23 Day Response</option>
                                                	<option value="24">24 Day Response</option>
                                                	<option value="25">25 Day Response</option>
                                                	<option value="26">26 Day Response</option>
                                                	<option value="27">27 Day Response</option>
                                                	<option value="28">28 Day Response</option>
                                                	<option value="29">29 Day Response</option>
                                                	<option value="30">30 Day Response</option>
                                                	<option value="31">31 Day Response</option>
                                                	<option value="32">32 Day Response</option>
                                                	<option value="33">33 Day Response</option>
                                                	<option value="34">34 Day Response</option>
                                                	<option value="35">35 Day Response</option>
                                                	<option value="36">36 Day Response</option>
                                                	<option value="37">37 Day Response</option>
                                                	<option value="38">38 Day Response</option>
                                                	<option value="39">39 Day Response</option>
                                                	<option value="40">40 Day Response</option>
                                                	<option value="41">41 Day Response</option>
                                                	<option value="42">42 Day Response</option>
                                                	<option value="43">43 Day Response</option>
                                                	<option value="44">44 Day Response</option>
                                                	<option value="45">45 Day Response</option>
                                                	<option value="46">46 Day Response</option>
                                                	<option value="47">47 Day Response</option>
                                                	<option value="48">48 Day Response</option>
                                                	<option value="49">49 Day Response</option>
                                                	<option value="50">50 Day Response</option>
                                                	<option value="51">51 Day Response</option>
                                                	<option value="52">52 Day Response</option>
                                                	<option value="53">53 Day Response</option>
                                                	<option value="54">54 Day Response</option>
                                                	<option value="55">55 Day Response</option>
                                                	<option value="56">56 Day Response</option>
                                                	<option value="57">57 Day Response</option>
                                                	<option value="58">58 Day Response</option>
                                                	<option value="59">59 Day Response</option>
                                                	<option value="60">60 Day Response</option>
                                                </select>
                                                
                                            </div>
                                        
                                        
                                        
                                        </div>
                                    </div>
                      </div>







                  </div>

                </div>

                    <div class="mail-text">

                        <div class="summernote">
                            
                            

                        </div>
<div class="clearfix"></div>
                        </div>
                    <div class="mail-body text-right">
                        <a id="save_etemplate" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Save"><i class="fa fa-floppy-o"></i> Create</a>
                    </div>
                    <div class="clearfix"></div>



                </div>
            </div>
        </div>
        </div>
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

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });



        });
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };

    </script>
    <script src="js/custom/page/custom.emailtemplate.add.js"></script>
</body>

</html>
<?php
mysqli_free_result($query_dealer_template_cat);
?>
<?php include("inc.end.phpmsyql.php"); ?>
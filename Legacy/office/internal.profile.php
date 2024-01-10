<?php require_once('db_admin.php'); ?>
<?php


$colname_dudes_profile = "-1";
if (isset($_GET['idsmbmrid'])) {
  $colname_dudes_profile = $_GET['idsmbmrid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dudes_profile =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_id` = ' $colname_dudes_profile'";
$dudes_profile = mysqli_query($idsconnection_mysqli, $query_dudes_profile);
$row_dudes_profile = mysqli_fetch_array($dudes_profile);
$totalRows_dudes_profile = mysqli_fetch_array($dudes_profile);




$colname_ids_directory = "-1";
if (isset($_GET['idsmbmrid'])) {
  $colname_ids_directory = $_GET['idsmbmrid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_ids_directory =  "SELECT * FROM `idsids_idsdms`.`dudes` WHERE `dudes_id` = '$colname_ids_directory'";
$ids_directory = mysqli_query($idsconnection_mysqli, $query_ids_directory);
$row_ids_directory = mysqli_fetch_array($ids_directory);
$totalRows_ids_directory = mysqli_num_rows($ids_directory);

 $theirname = $row_ids_directory['dudes_firstname'].' '.$row_ids_directory['dudes_lname'];
                          




?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Internal Profile</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="company.directory.php">Directory</a>
                    </li>
                    <li>
                        <a href="#">Internal Profile</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->



            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="img/no-pic-avatar.png" height="128px" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    
                                </h2>
                                <h4><?php echo $row_ids_directory['dudes_jobposition_title']; ?></h4>
                                <small>
                                    <?php echo $row_ids_directory['dudes_professional_motto']; ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_weeklypresentations']; ?></strong> weekly presentations
                            </td>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_monthlypresentations']; ?></strong>  monthly presentations
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_deals_monthly']; ?></strong> deals monthly
                            </td>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_appts_monthly']; ?></strong> appts monthly
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_retaindlrs_monthly']; ?></strong> retain dealers monthly
                            </td>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_newdlrs_monthly']; ?></strong> new dealers monthly
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_mnthly_commission']; ?></strong> goal monthly commission
                            </td>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_daily_commission']; ?></strong> goal daily commission
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_yearly_commission']; ?></strong> goal annual commission
                            </td>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_addnewcars_tosystm']; ?></strong> goal add new cars to system
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_vehicle_photos']; ?></strong> vehicles w/photos
                            </td>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_vehicle_windowstickers']; ?></strong> vehicle window stickers
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_new_websites']; ?></strong> New Website Sales
                            </td>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_retain_outsideadagencys']; ?></strong> new outside adagencys
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_residual_commission']; ?></strong> monhtly residual income
                            </td>
                            <td>
                                <strong><?php echo $row_ids_directory['dudes_goal_new_outsideadagencys']; ?></strong> new outsideadagencys
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <small>Time Zone: <?php echo $row_ids_directory['dudes_Timezone']; ?></small>
                    <h2 class="no-margins"><?php echo $row_ids_directory['dudes_market_name']; ?> / <?php echo $row_ids_directory['dudes_submarket_name']; ?></h2>
                    <div id="sparkline1"></div>
                </div>


            </div>




            <div class="row">

                <div class="col-lg-3">

                    <div class="ibox">
                        <div class="ibox-content">
                                <h3>About <?php echo $theirname; ?> The Company</h3>

                            <p class="small">
                            <?php echo $row_ids_directory['dudes_dudes_aboutme_tocompany']; ?>
                            </p>

                            <p class="small font-bold">
                                <span><i class="fa fa-circle text-navy"></i> <?php echo $row_ids_directory['dudes_last_loggedin']; ?></span>
                                </p>

                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">
                                <h3>About <?php echo $theirname; ?> To Dealers</h3>

                            <p class="small">
                            <?php echo $row_ids_directory['dudes_dudes_aboutme_tocompany']; ?>
                            </p>

                            <p class="small font-bold">
                                <span><i class="fa fa-circle text-navy"></i> <?php echo $row_ids_directory['dudes_last_loggedin']; ?></span>
                                </p>

                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">
                            <h3><?php echo $theirname; ?> Team Members</h3>
                            <p class="small">
							<?php echo $row_ids_directory['dudes_dudes_aboutme_toteam']; ?>
                            </p>
                            <div class="user-friends">
                                <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/no-pic-avatar.png"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/no-pic-avatar.png"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a8.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/no-pic-avatar.png"></a>
                            </div>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Department </h3>
                            <ul class="list-unstyled file-list">
                                <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                                <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                                <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                                <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                                <li><a href=""><i class="fa fa-file-powerpoint-o"></i> Presentation.pptx</a></li>
                                <li><a href=""><i class="fa fa-file"></i> 10_08_2015.docx</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Send Me A Private message</h3>

                            <p class="small">
                                Send private message to <?php echo $theirname; ?>
                            </p>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="email" class="form-control" placeholder="Message subject">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" placeholder="Your message" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block">Send</button>

                        </div>
                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="social-feed-box">

                        <div class="pull-right social-action dropdown">
                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu m-t-xs">
                                <li><a href="#">Config</a></li>
                            </ul>
                        </div>
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="img/no-pic-avatar.png">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <?php echo $theirname; ?>
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>

                            <div class="btn-group">
                                <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                            </div>
                        </div>
                        <div class="social-footer">
                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="img/no-pic-avatar.png">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <?php echo $theirname; ?>
                                    </a>
                                    Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                                    <small class="text-muted">12.06.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="img/a2.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <?php echo $theirname; ?>
                                    </a>
                                    Making this the first true generator on the Internet. It uses a dictionary of.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                                    <small class="text-muted">10.07.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="img/a3.jpg">
                                </a>
                                <div class="media-body">
                                    <textarea class="form-control" placeholder="Write comment..."></textarea>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="social-feed-box">

                        <div class="pull-right social-action dropdown">
                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu m-t-xs">
                                <li><a href="#">Config</a></li>
                            </ul>
                        </div>
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="img/no-pic-avatar.png">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <?php echo $theirname; ?>
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>
                            <p>
                                Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>
                            <div class="btn-group">
                                <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                            </div>
                        </div>
                        <div class="social-footer">
                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="img/no-pic-avatar.png">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <?php echo $theirname; ?>
                                    </a>
                                    Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                                    <small class="text-muted">12.06.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="img/a2.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <?php echo $theirname; ?>
                                    </a>
                                    Making this the first true generator on the Internet. It uses a dictionary of.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                                    <small class="text-muted">10.07.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="img/a8.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <?php echo $theirname; ?>
                                    </a>
                                    Making this the first true generator on the Internet. It uses a dictionary of.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                                    <small class="text-muted">10.07.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="img/a3.jpg">
                                </a>
                                <div class="media-body">
                                    <textarea class="form-control" placeholder="Write comment..."></textarea>
                                </div>
                            </div>

                        </div>

                    </div>




                </div>
                <div class="col-lg-4 m-b-lg">
                    <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-briefcase"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Meeting</h2>
                                <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                                </p>
                                <a href="#" class="btn btn-sm btn-primary"> More info</a>
                                    <span class="vertical-date">
                                        Today <br>
                                        <small>Dec 24</small>
                                    </span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon blue-bg">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Send documents to Mike</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="#" class="btn btn-sm btn-success"> Download document </a>
                                    <span class="vertical-date">
                                        Today <br>
                                        <small>Dec 24</small>
                                    </span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon lazur-bg">
                                <i class="fa fa-coffee"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Coffee Break</h2>
                                <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                                <a href="#" class="btn btn-sm btn-info">Read more</a>
                                <span class="vertical-date"> Yesterday <br><small>Dec 23</small></span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon yellow-bg">
                                <i class="fa fa-phone"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Phone with Jeronimo</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-comments"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Chat with Monica and Sandra</h2>
                                <p>Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
                                <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
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


<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable( {
		"iDisplayLength": 25,
	   "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "/swf/copy_csv_xls_pdf.swf"
        },
		"order": [[1, 'asc']],
		"ordering": false,
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    } );
	
	
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>